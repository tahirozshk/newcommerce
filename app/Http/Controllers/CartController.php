<?php

namespace App\Http\Controllers;

use App\Models\CartItem;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CartController extends Controller
{
    /**
     * Display the shopping cart.
     */
    public function index(Request $request): View
    {
        $cartItems = [];
        $subtotal = 0;
        $totalShipping = 0;

        // Only authenticated users can access cart
        $items = CartItem::with('product')
            ->where('user_id', auth()->id())
            ->get();

        foreach ($items as $item) {
            $product = $item->product;
            if (! $product) {
                continue;
            }

            $quantity = max(1, (int) $item->quantity);
            $price = (float) $product->price;
            $shippingCost = 8.00;

            $lineSubtotal = $price * $quantity;
            $lineShipping = $shippingCost * $quantity;

            $subtotal += $lineSubtotal;
            $totalShipping += $lineShipping;

            $cartItems[] = [
                'id' => $product->id,
                'name' => $product->name,
                'price' => $price,
                'original_price' => $product->original_price,
                'image' => $product->primaryImage,
                'quantity' => $quantity,
                'discount' => $product->discount,
                'brand' => 'CYPRUS EXPRESS',
                'reference' => 'REF-'.$product->id,
                'shipping_from' => 'United States',
                'shipping_cost' => $shippingCost,
                'stock' => $product->stock,
                'size' => 'M',
            ];
        }

        $tax = $subtotal * 0.1;
        $total = $subtotal + $totalShipping + $tax;

        return view('cart', [
            'cartItems' => $cartItems,
            'subtotal' => $subtotal,
            'totalShipping' => $totalShipping,
            'tax' => $tax,
            'total' => $total,
        ]);
    }

    /**
     * Add a product to the cart.
     */
    public function add(Request $request, Product $product): RedirectResponse
    {
        $quantity = max(1, (int) $request->input('quantity', 1));

        // Only authenticated users can add to cart
        $item = CartItem::firstOrNew([
            'user_id' => auth()->id(),
            'product_id' => $product->id,
        ]);

        $currentQuantity = (int) $item->quantity;
        $newQuantity = $currentQuantity + $quantity;

        if ($product->stock > 0) {
            $newQuantity = min($newQuantity, $product->stock);
        }

        $item->quantity = $newQuantity;
        $item->save();

        return redirect()
            ->route('cart')
            ->with('success', 'Product added to cart.');
    }

    /**
     * Update quantity of a product in the cart.
     */
    public function update(Request $request, Product $product): RedirectResponse
    {
        $quantity = max(1, (int) $request->input('quantity', 1));

        if ($product->stock > 0) {
            $quantity = min($quantity, $product->stock);
        }

        // Only authenticated users can update cart
        $item = CartItem::where('user_id', auth()->id())
            ->where('product_id', $product->id)
            ->first();

        if (! $item) {
            return redirect()->route('cart');
        }

        $item->quantity = $quantity;
        $item->save();

        return redirect()
            ->route('cart')
            ->with('success', 'Cart updated.');
    }

    /**
     * Remove a product from the cart.
     */
    public function remove(Request $request, Product $product): RedirectResponse
    {
        // Only authenticated users can remove from cart
        CartItem::where('user_id', auth()->id())
            ->where('product_id', $product->id)
            ->delete();

        return redirect()
            ->route('cart')
            ->with('success', 'Item removed from cart.');
    }

    /**
     * Clear the cart.
     */
    public function clear(Request $request): RedirectResponse
    {
        // Only authenticated users can clear cart
        CartItem::where('user_id', auth()->id())->delete();

        return redirect()
            ->route('cart')
            ->with('success', 'Cart cleared.');
    }
}


