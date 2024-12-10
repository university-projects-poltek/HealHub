<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\CartItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CartController extends Controller
{
  public function index()
  {
    $userId = auth()->id();
    $cart = Cart::where('user_id', $userId)->first();

    if(!$cart) {
      session()->flash('error', 'Silahkan Belanja dulu');
      return back();
    }

    $cartItems = CartItem::where('cart_id', $cart->id)->with('product')->get();
    
    return view('pages.user.cart', [
      'cartItems' => $cartItems,
    ]);
  }

  public function addToCart(Request $request)
  {
    $request->validate([
      'product_id' => 'required|exists:products,id',
      'quantity' => 'required|integer|min:1'
    ]);

    $cart = Cart::firstOrCreate(['user_id' => auth()->id()]);

    CartItem::updateOrCreate(
      [
          'cart_id' => $cart->id,
          'product_id' => $request->product_id,
      ],
      [
          'quantity' => DB::raw('quantity + ' . $request->quantity)
      ]
  );

  return redirect()->route('show.cart')->with('success', 'Success add to cart.');
  }

  public function removeItem(Request $request)
  {
      // Validasi request jika diperlukan
      $request->validate([
        'item_id' => 'required|exists:cart_items,id',
    ]);

    try {
        // Ambil item_id dari input form
        $itemId = $request->input('item_id');

        // Hapus item dari database
        CartItem::destroy($itemId);

        // Redirect atau kembali ke halaman sebelumnya dengan pesan sukses
        return redirect()->back()->with('success', 'Item berhasil dihapus dari keranjang.');
    } catch (\Exception $e) {
        // Tangani jika terjadi kesalahan, misalnya tampilkan pesan error
        return redirect()->back()->with('error', 'Gagal menghapus item dari keranjang. Silakan coba lagi.');
    }
  }

  public function update(Request $request, $id)
    {
        $cartItem = CartItem::find($id);
        if ($cartItem) {
            $cartItem->quantity = $request->input('quantity');
            $cartItem->save();
            return back()->with('success', 'Success change quantity');
        }
        return back()->with('error', 'Failed change quantity');
    }

  public static function cartItemLength()
  {
    $userId = auth()->id();
    $cart = Cart::where('user_id', $userId)->first();

    if(!$cart) {
      return null;
    }

    $cartItems = CartItem::where('cart_id', $cart->id)->count();

    return $cartItems;
  }
}
