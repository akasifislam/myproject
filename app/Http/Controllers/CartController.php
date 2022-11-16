<?php

namespace App\Http\Controllers;

use App\Models\Instructor;
use Illuminate\Http\Request;
use Modules\Coupon\Entities\Coupon;
use Modules\Course\Entities\Course;

class CartController extends Controller
{
    protected function allCarts()
    {
        return \Cart::getContent();
    }

    public function carts()
    {
        $carts = $this->allCarts();
        return view('frontend.carts', compact('carts'));
    }

    public function cartAdd(Course $course)
    {
        $cartExist = $course->cartAlreadyExists($course->id);

        if ($cartExist) {
            flashSuccess('Cart Already Added');
            return back();
        } else {
            $this->cartValueInsert($course);
        }

        session()->forget('discount', 'percent', 'numeric');
        flashSuccess('Cart Added Successfully');
        return back();
    }

    public function cartRemove(Course $course)
    {
        \Cart::remove($course->id);
        session()->forget('discount', 'percent', 'numeric');

        flashSuccess('Cart Added Successfully');
        return back();
    }

    public function applyCode(Request $request)
    {
        $this->validate($request, [
            'coupon_code' => 'required',
        ]);

        $code = Coupon::where('code', $request->coupon_code)
            ->where('expire_date', '>=', date('Y-m-d'))
            ->where('max_use', '>=', 'total_uses')
            ->whereStatus(true)
            ->first();

        session()->forget('discount', 'percent', 'numeric');

        if ($code) {
            if ($code->type == 'Percentage') {
                $discount_percentage_price = $code->discount / 100;
                $discount_price = $discount_percentage_price * \Cart::getTotal();

                session(['discount' => $discount_price, 'percent' => $code->discount, 'coupon' => $code]);

                flashSuccess("You got $code->discount% discount");
                return back();
            } else {
                session(['discount' => $code->discount, 'numeric' => $code->discount, 'coupon' => $code]);

                flashSuccess("You got $$code->discount discount");
                return back();
            }
        } else {
            flashError('Coupon Code is Wrong');
            return back();
        }
    }

    public function checkout($token)
    {
        $carts = $this->allCarts();
        $subTotal = \Cart::getSubTotal();
        $total = \Cart::getTotal();

        if ($carts->count() >= 1) {
            return view('frontend.checkout', compact('carts', 'subTotal', 'total'));
        } else {
            abort(404);
        }
    }

    public function courseBuy(Course $course)
    {
        $this->cartValueInsert($course);

        session()->forget('discount', 'percent', 'numeric');

        flashSuccess('Cart Added Successfully');

        return redirect()->route('carts');
    }

    public function cartValueInsert($course)
    {
        if ($course->discount_price) {
            \Cart::add([
                'id' => $course->id,
                'name' => $course->title,
                'quantity' => 1,
                'price' => $course->discount_price,
                'attributes' => array(
                    'without_discount_price' => $course->price,
                    'image' => $course->thumbnail,
                ),
                'associatedModel' => $course
            ]);
        } else {
            \Cart::add([
                'id' => $course->id,
                'name' => $course->title,
                'quantity' => 1,
                'price' => $course->price,
                'attributes' => array(
                    'image' => $course->thumbnail,
                ),
                'associatedModel' => $course
            ]);
        }
    }
}
