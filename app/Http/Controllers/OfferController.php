<?php

namespace App\Http\Controllers;

use App\Models\Offer;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\View\View;

class OfferController extends Controller
{
    /**
     * Show all offers
     */
    public function index(): View
    {
        $offers = Offer::all();
        return view('offers.index', ['offers' => $offers]);
    }
    /**
     * Show products with a specific offer
     */
    public function show(string $id): View
    {
        // Validate ID format
        if (!is_numeric($id) || $id < 1) {
            abort(404, 'ID de oferta inválido');
        }
        /*$offers = $this->getOffers();*/
        // Find offer by ID
        $offer = Offer::find($id);
        if (!$offer) {
            abort(404, 'Oferta no encontrada');
        }
        // Load and enrich products
        /*$products = $this->getProducts();*/
        // Filter products by offer (un producto solo puede tener una oferta)
        $offerProducts = $offer->products()->with(['category'])->get();
        /*$offerProducts = $this->enrichProductsWithOffers($offerProducts);*/
        return view('offers.show', compact('offer', 'offerProducts'));
    }
}
