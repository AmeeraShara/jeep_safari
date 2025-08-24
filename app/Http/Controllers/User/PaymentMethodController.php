<?php

namespace App\Http\Controllers\User;

use App\Models\Customer;
use App\Models\PaymentMethod;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;


class PaymentMethodController extends Controller
{
public function index($customerId)
{
    $customer = Customer::findOrFail($customerId);
    $paymentMethods = PaymentMethod::where('customer_id', $customerId)->get();

    // Pass to the existing blade (no separate index file needed)
    return view('user.payment', compact('customer', 'paymentMethods'));
}

    public function store(Request $request, $customerId)
    {
        $request->validate([
            'cardholder_name' => 'required|string',
            'card_number' => 'required|string',
            'expiry_month' => 'required|string',
            'expiry_year' => 'required|string',
            'cvv' => 'required|string',
        ]);

        PaymentMethod::create([
            'customer_id' => $customerId,
            'cardholder_name' => $request->cardholder_name,
            'card_number' => $request->card_number,
            'expiry_month' => $request->expiry_month,
            'expiry_year' => $request->expiry_year,
            'cvv' => $request->cvv,
            'is_default' => false,
        ]);

        return redirect()->route('user.payment', ['customer' => $customerId]);
    }
    public function destroy($customerId, $paymentId)
{
    $payment = PaymentMethod::where('customer_id', $customerId)
                            ->where('id', $paymentId)
                            ->firstOrFail();
    $payment->delete();

    return redirect()->route('user.payment', $customerId)
                     ->with('success', 'Payment method deleted.');
}
public function setDefault($customerId, $paymentId)
{
    // Reset all payment methods for the customer
    PaymentMethod::where('customer_id', $customerId)->update(['is_default' => false]);

    // Set the selected payment method as default
    $payment = PaymentMethod::where('customer_id', $customerId)
                            ->where('id', $paymentId)
                            ->firstOrFail();
    $payment->is_default = true;
    $payment->save();

    return redirect()->route('user.payment', $customerId)
                     ->with('success', 'Payment method set as default.');
}


}