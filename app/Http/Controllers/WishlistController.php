<?php

namespace App\Http\Controllers;

use App\Models\Wishlist;
use App\Models\Product;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class WishlistController extends Controller
{
    /**
     * Display the wishlist.
     */
    public function index(): View
    {
        $wishlistItems = Wishlist::with('product')
            ->where('user_id', auth()->id())
            ->get()
            ->map(function ($item) {
                return $item->product;
            })
            ->filter();

        return view('wishlist', [
            'products' => $wishlistItems,
        ]);
    }

    /**
     * Add a product to the wishlist.
     */
    public function add(int $id): RedirectResponse
    {
        $product = Product::findOrFail($id);

        // Check if already in wishlist
        $exists = Wishlist::where('user_id', auth()->id())
            ->where('product_id', $product->id)
            ->exists();

        if (!$exists) {
            Wishlist::create([
                'user_id' => auth()->id(),
                'product_id' => $product->id,
            ]);

            return redirect()->back()->with('success', 'Product added to wishlist.');
        }

        return redirect()->back()->with('info', 'Product is already in your wishlist.');
    }

    /**
     * Remove a product from the wishlist.
     */
    public function remove(int $id): RedirectResponse
    {
        $product = Product::findOrFail($id);
        
        Wishlist::where('user_id', auth()->id())
            ->where('product_id', $product->id)
            ->delete();

        return redirect()->back()->with('success', 'Product removed from wishlist.');
    }
}

