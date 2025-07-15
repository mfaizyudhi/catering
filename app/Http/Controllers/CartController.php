<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Cart;
use \Binafy\LaravelCart\Models\CartItem;
use App\Models\Product;

class CartController extends Controller
{
    private $cart;
    private $cart_items;

    public function __construct()
    {
        $this->cart = Cart::query()->firstOrCreate(
            [
                'user_id' => auth()->guard('customer')->user()->id
            ]
        );
    }

    public function add(Request $request)
    {
        // Validate the request
        $validator = \Validator::make($request->all(), [
            'product_id' => 'required|exists:products,id',
            'quantity' => 'required|integer|min:1',
        ]);

        if ($validator->fails()) {
            return redirect()->back()
                ->with('error', 'Invalid input data.')
                ->withErrors($validator)
                ->withInput();
        }

        // Find the product
        $product = Product::findOrFail($request->product_id);

        // Check if the product is available
        if ($product->stock < $request->quantity) {
            return redirect()->back()->with('error', 'Stok tidak mencukupi untuk produk ini.');
        }

        $cartItem = new CartItem([
            'itemable_id' => $product->id,
            'itemable_type' => $product::class,
            'quantity' => $request->quantity,
        ]);

        $this->cart->items()->save($cartItem);

        return redirect()->route('cart.index')->with('success', 'Item added to cart.');
    }

    public function remove($id)
    {
        $cartItem = $this->cart->items()
            ->where('id', $id)
            ->firstOrFail();

        $cartItem->delete();

        return redirect()->route('cart.index')
            ->with('success', 'Item berhasil dihapus dari keranjang');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'action' => 'required|in:increase,decrease'
        ]);

        $cartItem = $this->cart->items()
            ->where('id', $id)
            ->with('itemable')
            ->firstOrFail();

        $product = $cartItem->itemable;
        $newQuantity = $request->action === 'increase'
            ? $cartItem->quantity + 1
            : max(1, $cartItem->quantity - 1);

        // Cek stok hanya untuk increase
        if ($request->action === 'increase' && $product->stock < $newQuantity) {
            return redirect()->back()
                ->with('error', 'Stok tidak mencukupi. Stok tersedia: ' . $product->stock);
        }

        $cartItem->update(['quantity' => $newQuantity]);

        return redirect()->route('cart.index')
            ->with([
                'success' => 'Jumlah produk berhasil diupdate',
                'updated_item_id' => $id
            ]);
    }
   public function checkout()
{
    $user = auth()->guard('customer')->user();
    if (!$user) return redirect()->route('customer.login');

    // Ambil cart dari model yang benar
    $cart = \App\Models\Cart::with(['items.itemable']) // <- ini Binafy punya
        ->where('user_id', $user->id)
        ->first();

    if (!$cart) {
        logger()->error('Cart not found for user: ' . $user->id);
        return redirect()->back()->with('error', 'Keranjang tidak ditemukan');
    }

    return view('theme.hexashop.checkout', [
        'cart' => $cart,
        'cart_items' => $cart->items
    ]);
}


}
