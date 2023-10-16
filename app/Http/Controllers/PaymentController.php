<?php

namespace App\Http\Controllers;

use App\Models\Payment;
use App\Models\Room;
use App\Models\Tenant;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class PaymentController extends Controller
{
    public function index()
    {
        $payments = Payment::paginate();

        return view('payment.index', compact('payments'))
            ->with('i', (request()->input('page', 1) - 1) * $payments->perPage());
    }

    public function create()
    {
        $payment = new Payment();
        $rooms = Room::all();
        $tenants = Tenant::all();
        return view('payment.create', compact('payment', 'tenants', 'rooms'));
    }

    public function store(Request $request)
    {
        request()->validate(Payment::$rules);

        $payment = Payment::create($request->all());

        return redirect()->route('payments.index')
            ->with('success', 'Payment created successfully.');
    }

    public function show($id)
    {
        $payment = Payment::find($id);

        return view('payment.show', compact('payment'));
    }

    public function edit($id)
    {
        $payment = Payment::find($id);

        return view('payment.edit', compact('payment'));
    }

    public function update(Request $request, Payment $payment)
    {
        request()->validate(Payment::$rules);

        $payment->update($request->all());

        return redirect()->route('payments.index')
            ->with('success', 'Payment updated successfully');
    }

    public function destroy($id)
    {
        $payment = Payment::find($id)->delete();

        return redirect()->route('payments.index')
            ->with('success', 'Payment deleted successfully');
    }

    public function fetchPaymentFromPaystack()
    {
        // Replace 'YOUR_PAYSTACK_SECRET_KEY' with your actual Paystack secret key.
        $paystackSecretKey = 'sk_live_80cae2d059bcab2663e6bfa9c3269da29df5f017';

        $response = Http::withHeaders([
            'Authorization' => 'Bearer ' . $paystackSecretKey,
        ])->get('https://api.paystack.co/transaction');

        if ($response->successful()) {
            $transactions = $response->json();

            // Calculate total payment amount from Paystack transactions and format it as needed.
            $totalAmount = $this->calculateTotalAmount($transactions);

            return view('payment.paystack', compact('transactions', 'totalAmount'));
        } else {
            return back()->with('error', 'Failed to fetch payment data from Paystack');
        }
    }

    private function calculateTotalAmount($transactions)
    {
        $totalAmount = 0;

        foreach ($transactions as $transaction) {
            $totalAmount += $transaction['amount'] / 100; // Convert amount to the desired currency format
        }

        return $totalAmount;
    }
}
