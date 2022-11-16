<?php

namespace Modules\Coupon\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Contracts\Support\Renderable;
use Modules\Coupon\Entities\Coupon;
use Modules\Coupon\Http\Requests\CouponRequest;

class CouponController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    /**
     * Display a listing of the resource.
     * @return Renderable
     */
    public function index()
    {
        $coupons = Coupon::all();
        return view('coupon::coupons.index', compact('coupons'));
    }

    /**
     * Show the form for creating a new resource.
     * @return Renderable
     */
    public function create()
    {
        return view('coupon::coupons.create');
    }

    /**
     * Store a newly created resource in storage.
     * @param Request $request
     * @return Renderable
     */
    public function store(CouponRequest $request)
    {
        try {
            Coupon::create($request->validated());

            flashSuccess('Coupon Created Successfully!');
            return back();
        } catch (\Exception $e) {
            flashError();
            return back();
        }
    }

    /**
     * Show the form for editing the specified resource.
     * @param int $id
     * @return Renderable
     */
    public function edit(Coupon $coupon)
    {
        return view('coupon::coupons.edit', compact('coupon'));
    }

    /**
     * Update the specified resource in storage.
     * @param Request $request
     * @param int $id
     * @return Renderable
     */
    public function update(CouponRequest $request, Coupon $coupon)
    {
        try {
            $coupon->update($request->validated());

            flashSuccess('Coupon Updated Successfully!');
            return redirect()->route('coupon.index');
        } catch (\Exception $e) {
            flashError();
            return back();
        }
    }

    /**
     * Remove the specified resource from storage.
     * @param int $id
     * @return Renderable
     */
    public function destroy(Coupon $coupon)
    {
        try {
            $coupon->delete();
            flashSuccess('Coupon Deleted Successfully!');
            return back();
        } catch (\Exception $e) {
            flashError();
            return back();
        }
    }

    public function status(Request $request)
    {
        try {
            Coupon::findOrFail($request->id)->update(['status' => $request->status]);

            if ($request->status == 1) {
                return response()->json(['message' => 'Coupon Activated Successfully']);
            } else {
                return response()->json(['message' => 'Coupon Inactivated Successfully']);
            }
        } catch (\Exception $e) {
            return responseError();
        }
    }
}
