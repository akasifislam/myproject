<?php

namespace Modules\Order\Traits;

use Modules\Course\Entities\Course;
use Modules\Order\Entities\OrderDetails;
use Illuminate\Support\Str;
use App\Models\CourseEnroll;
use Modules\Order\Entities\Order;

trait OrderTraits
{
    /**
     * Order place
     *
     * @return \Illuminate\Http\Response
     */
    protected function orderPlace($paymentId)
    {
        $order_total = \Cart::getTotal();
        $user_id = auth()->user()->id;

        // order place
        $order = new Order();
        $order->order_no = Str::random(6);
        $order->user_id = $user_id;
        $order->payment_id = $paymentId;

        if (session('discount')) {
            $order->total = $order_total - session('discount');

            $coupon = session('coupon');
            $coupon->total_uses += 1;
            $coupon->save();

            if (session('percent')) {
                $order->discount_type = 'Discount';
                $order->discount = session('percent');
            } else {
                $order->discount_type = 'Numeric';
                $order->discount = session('discount');
            }
        } else {
            $order->total = $order_total;
        }

        $order->save();

        // order details place
        foreach (\Cart::getContent() as $content) {
            OrderDetails::create([
                'order_id' => $order->id,
                'user_id' =>  $user_id,
                'course_id' => $content->id,
                'course_price' => $content->price,
            ]);

            $course = Course::findOrFail($content->id);
            $course->total_purchase += 1;
            $course->save();

            CourseEnroll::create([
                'course_id' => $content->id,
                'student_id' => $user_id,
            ]);

            $this->totalEnrolledIncrement($content->id);
        }

        //
        \Cart::clear();
        session()->forget(['discount', 'percent', 'numeric', 'coupon']);
        flashSuccess('Order Purchased Successfully');
        return redirect(route('user.profile'));
    }
}
