<?php

namespace Modules\Order\Http\Controllers;

use App\Traits\IncrementInstructorData;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Modules\Order\Entities\Payment;
use Modules\Order\Traits\OrderTraits;
use Stripe;
use Razorpay\Api\Api;
use Illuminate\Support\Facades\Session;
use Exception;
use Modules\Order\Entities\Order;

class OrderController extends Controller
{
    use IncrementInstructorData, OrderTraits;

    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function orderPurchase()
    {
        $orders = Order::with('payment', 'student')->get();
        return view('order::order.index', compact('orders'));
    }

    /**
     * Stripe method.
     *
     * @return \Illuminate\Http\Response
     */
    public function stripePost(Request $request)
    {
        $order_total = \Cart::getTotal();

        if (session('discount')) {
            $order_total = $order_total - session('discount');
        }

        Stripe\Stripe::setApiKey(env('STRIPE_SECRET'));
        $stripeData = Stripe\Charge::create([
            "amount" => $order_total * 100,
            "currency" => "usd",
            "source" => $request->stripeToken,
            "description" => "Test Desription",
        ]);

        if ($stripeData) {
            $method = 'stripe';
            return $this->stripePaymentPlace($stripeData, $method);
        } else {
            session()->flash('error', 'Payment Failed!');
            return back();
        }
    }


    /**
     * razorpay method
     *
     * @return response()
     */
    public function razorStore(Request $request)
    {
        $input = $request->all();
        $api = new Api(env('RAZORPAY_KEY'), env('RAZORPAY_SECRET'));

        $payment = $api->payment->fetch($input['razorpay_payment_id']);

        if (count($input)  && !empty($input['razorpay_payment_id'])) {
            try {
                $response = $api->payment->fetch($input['razorpay_payment_id'])->capture(array('amount' => $payment['amount']));
            } catch (Exception $e) {
                return  $e->getMessage();
                Session::put('error', $e->getMessage());
                return redirect()->back();
            }
        }

        return $this->razorPaymentPlace($input, 'razor');
    }

    /**
     * razor payment store
     *
     * @return response()
     */
    public function razorPaymentPlace($data, $method)
    {
        $payment = Payment::create([
            'method'  => $method,
            'payment_id' => $data['razorpay_payment_id'],
        ]);


        if ($payment->id) {
            return $this->orderPlace($payment->id);
        } else {
            session()->flash('error', 'Payment Failed!');
            return back();
        }
    }

    /**
     * stripe payment store
     *
     * @return response()
     */
    public function stripePaymentPlace($data, $method)
    {
        $payment = Payment::create([
            'method'  => $method,
            'card_no' => $data->payment_method_details->card->last4,
            'expiry_date' => $data->payment_method_details->card->exp_month . '/' . $data->payment_method_details->card->exp_year,
            'card_type' => $data->payment_method_details->card->brand,
            'payment_id' => $data->id,
            'currency' => $data->currency,
        ]);

        if ($payment->id) {
            return $this->orderPlace($payment->id);
        } else {
            session()->flash('error', 'Payment Failed!');
            return back();
        }
    }

    // public function orderPlace()
    // {
    //     // return \Cart::getContent();
    //     $order_total = \Cart::getTotal();
    //     $user_id = auth()->user()->id;

    //     // order data place
    //     $order = $this->orderDataPlace($order_total, $user_id);

    //     // order details data place
    //     $orderDetails = $this->orderDetailsDataPlace($order, $user_id);

    // if ($orderDetails) {
    //     \Cart::clear();

    //     session()->forget(['discount', 'percent', 'numeric', 'coupon']);

    //     flashSuccess('Order Purchased Successfully');
    //     return redirect(route('user.profile'));
    // }
    // }

    // public function orderDataPlace($order_total, $user_id)
    // {
    // $order = new Order();
    // $order->order_no = sprintf(mt_rand(1, 9999));
    // $order->user_id = $user_id;

    // if (session('discount')) {
    //     $order->total = $order_total - session('discount');

    //     $coupon = session('coupon');
    //     $coupon->total_uses += 1;
    //     $coupon->save();

    //     if (session('percent')) {
    //         $order->discount_type = 'Discount';
    //         $order->discount = session('percent');
    //     } else {
    //         $order->discount_type = 'Numeric';
    //         $order->discount = session('discount');
    //     }
    // } else {
    //     $order->total = $order_total;
    // }

    // $order->save();

    // return $order;
    // }

    // public function orderDetailsDataPlace($order, $user_id)
    // {
    //     foreach (\Cart::getContent() as $content) {
    //         OrderDetails::create([
    //             'order_id' => $order->id,
    //             'user_id' =>  $user_id,
    //             'course_id' => $content->id,
    //             'course_price' => $content->price,
    //         ]);

    //         $course = Course::findOrFail($content->id);
    //         $course->total_purchase += 1;
    //         $course->save();

    //         CourseEnroll::create([
    //             'course_id' => $content->id,
    //             'student_id' => $user_id,
    //         ]);

    //         $this->totalEnrolledIncrement($content->id);
    //     }

    //     return true;
    // }
}
