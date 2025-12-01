<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\View\View;

class HomeController extends Controller
{
    /**
     * Display the home page with dynamic products and categories.
     */
    public function index(): View
    {
        // Sadece parent kategorileri al ve 5 ile sınırla
        $categories = Category::whereNull('parent_id')
            ->orderBy('name')
            ->take(6)
            ->get();

        $featuredProducts = Product::query()
            ->where('is_active', true)
            ->where('is_featured', true)
            ->orderByDesc('rating')
            ->take(8)
            ->get();

        $hotDeals = Product::query()
            ->where('is_active', true)
            ->where('is_hot_deal', true)
            ->orderByDesc('discount')
            ->take(4)
            ->get();

        $newArrivals = Product::query()
            ->where('is_active', true)
            ->where('is_new_arrival', true)
            ->latest()
            ->take(4)
            ->get();

        // Banner slider için ürünler
        $bannerProducts = Product::query()
            ->where('is_active', true)
            ->where(function ($query) {
                $query->where('is_featured', true)
                    ->orWhere('is_hot_deal', true)
                    ->orWhere('is_new_arrival', true);
            })
            ->with('category')
            ->orderByDesc('rating')
            ->take(5)
            ->get();

        // Eğer yeterli ürün yoksa, aktif ürünlerden ekle
        if ($bannerProducts->count() < 3) {
            $additionalProducts = Product::query()
                ->where('is_active', true)
                ->whereNotIn('id', $bannerProducts->pluck('id'))
                ->with('category')
                ->latest()
                ->take(5 - $bannerProducts->count())
                ->get();
            
            $bannerProducts = $bannerProducts->merge($additionalProducts);
        }

        return view('home', [
            'categories' => $categories,
            'featuredProducts' => $featuredProducts,
            'hotDeals' => $hotDeals,
            'newArrivals' => $newArrivals,
            'bannerProducts' => $bannerProducts,
        ]);
    }
}


