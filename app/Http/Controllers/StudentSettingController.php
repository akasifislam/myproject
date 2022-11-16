<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class StudentSettingController extends Controller
{
    public function infoUpdate(Request $request)
    {
        // return $request->hasFile('image');
        $id = auth()->id();
        $this->validate($request, [
            'firstname' => 'required',
            'lastname' => 'required',
            'email' => "required|unique:users,email,{$id}",
        ]);

        try {
            $user = User::find($id);
            $user->firstname = $request->firstname;
            $user->lastname = $request->lastname;
            $user->email = $request->email;
            $user->phone = $request->phone;
            $user->nationality = $request->nationality;
            $user->profession = $request->profession;
            $user->about = $request->about;
            if ($request->hasFile('image')) {
                $file = $request->file('image');
                $imageName = time() . '_' . uniqid() . '.' . $file->getClientOriginalExtension();
                Storage::putFileAs('public/user', $file, $imageName);

                $url = 'storage/user/' . $imageName;
                $user->image = $url;
            }
            $updated = $user->save();

            if ($updated) {
                flashSuccess('Profile Updated Successfully');
                return redirect(route('user.profile'));
            }
        } catch (\Exception $e) {
            flashError();
            return back();
        }
    }


    public function passwordUpdate(Request $request)
    {

        $request->validate([
            'current_password' => 'required',
            'password' => 'required|string|min:8|confirmed',
            'password_confirmation' => 'required',
        ]);

        try {
            $id = Auth::user()->id;
            $student = User::find($id);

            $password_check = Hash::check($request->current_password, $student->password);
            if ($password_check) {

                $student->update([
                    'password' => bcrypt($request->password),
                    'updated_at' => Carbon::now(),
                ]);
            }

            return back();
        } catch (\Exception $e) {
            flashError();
            return back();
        }
    }
}
