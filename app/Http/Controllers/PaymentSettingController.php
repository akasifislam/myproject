<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PaymentSettingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth:admin');
    }

    public function pymentForm()
    {
        return view('backend.payments');
    }

    public function stripeUpdate(Request $request)
    {
        $request->validate([
            'sk' => 'required',
            'pk' => 'required',
        ]);

        function setStripe($name, $value)
        {
            $path = base_path('.env');
            if (file_exists($path)) {
                file_put_contents($path, str_replace(
                    $name . '=' . env($name),
                    $name . '=' . $value,
                    file_get_contents($path)
                ));
            }
        }
        setStripe('STRIPE_KEY', $request->sk);
        setStripe('STRIPE_SECRET', $request->pk);

        flashSuccess('Stripe Keys Updated Successfully');
        return back();
    }

    public function razorpayUpdate(Request $request)
    {
        $request->validate([
            'sk' => 'required',
            'pk' => 'required',
        ]);

        function setRazorpay($name, $value)
        {
            $path = base_path('.env');
            if (file_exists($path)) {
                file_put_contents($path, str_replace(
                    $name . '=' . env($name),
                    $name . '=' . $value,
                    file_get_contents($path)
                ));
            }
        }
        setRazorpay('RAZORPAY_KEY', $request->sk);
        setRazorpay('RAZORPAY_SECRET', $request->pk);

        flashSuccess('RazorPay Keys Updated Successfully');
        return back();
    }
}
