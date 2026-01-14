<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CategoryController extends Controller
{
    /**
     * Show all categories
     */
    public function index(): View
    {
        $categories = Category::all();
        return view('categories.index', ['categories' => $categories]);
    }
    /**
     * Show products from a specific category
     */
    public function show(string $id): View

    {
        // Validate ID format
        if (!is_numeric($id) || $id < 1) {
            abort(404, 'ID de categoría inválido');
        }
        /*$categories = $this->getCategories();*/
        // Find category by ID
        $category = Category::find($id);
        if (!$category) {
            abort(404, 'Categoría no encontrada');
        }
        // Load and enrich products
       /* $products = $this->getProducts();*/
        // Filter products by category
        $categoryProducts = $category->products()->with(['offer'])->get();
        /*foreach ($categoryProducts as &$product) {
            $catId = $product['category_id'];
            // Asignamos el array de la categoría si existe el ID en el array de categorías
            $product['category'] = $categories[$catId] ?? null;
        }
        $categoryProducts = $this->enrichProductsWithOffers($categoryProducts);*/
        return view('categories.show', compact('category', 'categoryProducts'));
    }
}