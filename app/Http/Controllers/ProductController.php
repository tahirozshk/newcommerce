<?php

namespace App\Http\Controllers;

use App\Models\Product;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ProductController extends Controller
{
    /**
     * Show all products with filters and sorting.
     */
    public function index(Request $request): View
    {
        $query = Product::query()
            ->where('is_active', true)
            ->with('category');

        // Category filter
        if ($request->filled('category')) {
            $query->whereHas('category', function ($q) use ($request) {
                $q->where('slug', $request->category);
            });
        }

        // Price filter
        if ($request->filled('min_price')) {
            $query->where('price', '>=', $request->min_price);
        }
        if ($request->filled('max_price')) {
            $query->where('price', '<=', $request->max_price);
        }

        // Rating filter
        if ($request->filled('min_rating')) {
            $query->where('rating', '>=', $request->min_rating);
        }

        // Badge filter
        if ($request->filled('badge')) {
            $query->where('badge', $request->badge);
        }

        // Search
        if ($request->filled('q')) {
            $searchTerm = $request->q;
            $query->where(function ($q) use ($searchTerm) {
                $q->where('name', 'LIKE', "%{$searchTerm}%")
                  ->orWhere('description', 'LIKE', "%{$searchTerm}%");
            });
        }

        // Sorting
        $sortBy = $request->get('sort', 'default');
        switch ($sortBy) {
            case 'price_asc':
                $query->orderBy('price', 'asc');
                break;
            case 'price_desc':
                $query->orderBy('price', 'desc');
                break;
            case 'newest':
                $query->orderBy('created_at', 'desc');
                break;
            case 'popular':
                $query->orderBy('reviews_count', 'desc');
                break;
            case 'rating':
                $query->orderBy('rating', 'desc');
                break;
            default:
                $query->orderBy('created_at', 'desc');
        }

        $products = $query->paginate(12)->withQueryString();

        // Get all categories for filter sidebar
        $categories = Category::query()
            ->withCount('products')
            ->orderBy('name')
            ->get();

        // Calculate price range
        $priceRange = Product::query()
            ->where('is_active', true)
            ->selectRaw('MIN(price) as min_price, MAX(price) as max_price')
            ->first();

        return view('products.index', [
            'products' => $products,
            'categories' => $categories,
            'priceRange' => $priceRange,
            'filters' => $request->only(['category', 'min_price', 'max_price', 'min_rating', 'badge', 'sort', 'q']),
        ]);
    }

    /**
     * Show a product detail page.
     */
    public function show(int $id): View
    {
        $product = Product::query()
            ->with('category')
            ->where('is_active', true)
            ->findOrFail($id);

        $similarProducts = Product::query()
            ->where('is_active', true)
            ->where('id', '!=', $product->id)
            ->when($product->category_id, function ($query) use ($product) {
                $query->where('category_id', $product->category_id);
            })
            ->orderByDesc('rating')
            ->take(4)
            ->get();

        // Check if product is in wishlist
        $isInWishlist = false;
        if (auth()->check()) {
            $isInWishlist = \App\Models\Wishlist::where('user_id', auth()->id())
                ->where('product_id', $product->id)
                ->exists();
        }

        return view('product-detail', [
            'product' => $product,
            'similarProducts' => $similarProducts,
            'isInWishlist' => $isInWishlist,
        ]);
    }

    /**
     * Display hot deals page.
     */
    public function deals(Request $request): View
    {
        $query = Product::query()
            ->where('is_active', true)
            ->where('is_hot_deal', true);

        // Filter by discount range
        if ($request->has('discount_min') && $request->discount_min != '') {
            $query->where('discount', '>=', $request->discount_min);
        }
        if ($request->has('discount_max') && $request->discount_max != '') {
            $query->where('discount', '<=', $request->discount_max);
        }

        // Sorting
        $sort = $request->input('sort', 'discount_desc');
        switch ($sort) {
            case 'price_asc':
                $query->orderBy('price', 'asc');
                break;
            case 'price_desc':
                $query->orderBy('price', 'desc');
                break;
            case 'newest':
                $query->orderBy('created_at', 'desc');
                break;
            case 'rating':
                $query->orderBy('rating', 'desc');
                break;
            default:
                $query->orderByDesc('discount'); // Default: highest discount first
                break;
        }

        $products = $query->with('category')->paginate(12);

        return view('deals', [
            'products' => $products,
        ]);
    }

    /**
     * Display new arrivals page.
     */
    public function newArrivals(Request $request): View
    {
        $query = Product::query()
            ->where('is_active', true)
            ->where('is_new_arrival', true);

        // Filter by date range (optional - can be implemented later)
        // if ($request->has('period') && $request->period == 'week') {
        //     $query->where('created_at', '>=', now()->subWeek());
        // } elseif ($request->has('period') && $request->period == 'month') {
        //     $query->where('created_at', '>=', now()->subMonth());
        // }

        // Sorting
        $sort = $request->input('sort', 'newest');
        switch ($sort) {
            case 'price_asc':
                $query->orderBy('price', 'asc');
                break;
            case 'price_desc':
                $query->orderBy('price', 'desc');
                break;
            case 'rating':
                $query->orderBy('rating', 'desc');
                break;
            default:
                $query->latest(); // Default: newest first
                break;
        }

        $products = $query->with('category')->paginate(12);

        return view('new-arrivals', [
            'products' => $products,
        ]);
    }
}


