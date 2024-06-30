<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;

class TransactionController extends Controller
{
  public function getAdminTransaction()
  {
    $transactions = Order::where('status', 'pending')->with('user')->get();

    $paymentStatuses = ['paid' => 'Verify', 'canceled' => 'Reject'];

    return view('pages.admin.transaction', [
      'transactions' => $transactions,
      'paymentStatuses' => $paymentStatuses,
    ]);
  }

  public function getUserTransaction()
  {
    return view('pages.user.transaction');
  }

  public function verifyPayment(Request $request, $id)
  {
    $order = Order::findOrFail($id);

    $request->validate([
      'status' => 'required',
    ]);

    try {
      $order->update([
        'status' => $request->status,
      ]);
      return redirect()->route('admin.orders')->with('success', 'Status pembayaran berhasil diperbarui.');
    } catch (\Exception $e) {
      dd($e->getMessage());
    }
  }
}
