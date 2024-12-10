<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CheckoutController extends Controller
{
    public function showCheckout(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'address' => 'required|string|max:255',
            'number_phone' => 'required|string|max:15|regex:/^[0-9]+$/'
        ]);
        $user = auth()->user();
        $selectedItemIds = $request->input('selected_items', []);

        $name = $request->input('name');
        $address = $request->input('address');
        $number_phone = $request->input('number_phone');

        if (empty($selectedItemIds)) {
            return back()->with('error', 'Pilih setidaknya satu item untuk checkout.');
        }

        $cart = Cart::where('user_id', $user->id)->first();

        if (!$cart) {
            session()->flash('error', 'Silahkan Belanja dulu');
            return back();
        }

        $cartItems = CartItem::whereIn('id', $selectedItemIds)
            ->where('cart_id', $cart->id)
            ->with('product')
            ->get();

        if ($cartItems->isEmpty()) {
            return redirect()->route('show.cart')->with('error', 'Item yang dipilih tidak valid.');
        }

        $total = $cartItems->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });

        return view('components.checkout-modal', compact('cartItems', 'total', 'name', 'address', 'number_phone'));
    }

    public function processCheckout(Request $request)
    {
        $user = auth()->user();
        $selectedItemIds = $request->input('cart_items', []);

        $cart = Cart::where('user_id', $user->id)->first();

        if (!$cart) {
            return redirect()->route('show.cart')->with('error', 'Silahkan belanja terlebih dahulu.');
        }


        $cartItems = CartItem::whereIn('id', $selectedItemIds)
            ->where('cart_id', $cart->id)
            ->with('product')
            ->get();


        if ($cartItems->isEmpty()) {
            return redirect()->route('show.cart')->with('error', 'Item yang dipilih tidak valid.');
        }

        $total_amount = $cartItems->sum(function ($item) {
            return $item->product->price * $item->quantity;
        });

        // Validasi input
        $request->validate([
            'address' => 'required|string|max:255',
            'proof' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);

        $filename = null;

        if ($request->hasFile('proof')) {
            $file = $request->file('proof');
            $filename = time() . '_' . $file->getClientOriginalName();

            $file->storeAs('public/payment_proofs', $filename);
        }

        DB::beginTransaction();


        try {
            $order = Order::create([
                'user_id' => $user->id,
                'total_amount' => $total_amount,
                'payment_method' => 'bank_transfer',
                'order_date' => now(),
                'payment_proof' => $filename
            ]);

            // Pindahkan item dari cart ke order
            foreach ($cartItems as $item) {
                OrderItem::create([
                    'order_id' => $order->id,
                    'product_id' => $item->product_id,
                    'quantity' => $item->quantity,
                    'price' => $item->product->price,
                ]);

                // Kurangi stok produk
                $item->product->decrement('stock', $item->quantity);

                // Hapus item dari keranjang
                $item->delete();
            }

            DB::commit();

            return redirect()->route('home')->with('success', 'Pesanan berhasil dibuat!');
        } catch (\Exception $e) {
            dd('Error ' . $e->getMessage());
            DB::rollBack();
            return redirect('/cart')->with('error', 'Terjadi kesalahan saat memproses pesanan Anda.');
        }
    }
}