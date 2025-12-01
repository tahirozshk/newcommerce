<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoryController extends Controller
{
    /**
     * Show all categories.
     */
    public function index(): View
    {
        $categories = Category::query()
            ->withCount('products')
            ->orderBy('name')
            ->get();

        // Get popular products for the bottom section
        $popularProducts = Product::query()
            ->where('is_active', true)
            ->orderByDesc('reviews_count')
            ->take(4)
            ->get();

        return view('categories.index', [
            'categories' => $categories,
            'popularProducts' => $popularProducts,
        ]);
    }

    /**
     * Show products in a specific category with filters.
     */
    public function show(Request $request, Category $category): View
    {
        $query = Product::query()
            ->where('is_active', true)
            ->where('category_id', $category->id);

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
        $allCategories = Category::query()
            ->withCount('products')
            ->orderBy('name')
            ->get();

        // Calculate price range for this category
        $priceRange = Product::query()
            ->where('is_active', true)
            ->where('category_id', $category->id)
            ->selectRaw('MIN(price) as min_price, MAX(price) as max_price')
            ->first();

        return view('categories.show', [
            'category' => $category,
            'products' => $products,
            'allCategories' => $allCategories,
            'priceRange' => $priceRange,
            'filters' => $request->only(['min_price', 'max_price', 'min_rating', 'badge', 'sort']),
        ]);
    }
}

