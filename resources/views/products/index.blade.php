<?php
    $onSaleOption = $_SERVER['REQUEST_URI'] == '/products-on-sale';
?>



@extends('layouts.app')
@section('title', 'Todos los Productos - Muebles Kuatropatas')
@push('styles')
    <style>
        .product-grid {
            display: grid;
            grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
            gap: 2rem;
        }
    </style>
@endpush
@section('content')
    <div class="container mx-auto px-6 py-8">
        @if ($onSaleOption)
            <div class="bg-gradient-to-r from-orange-500 to-red-500 rounded-lg shadowlg
            p-8 mb-8 text-white">
                <h1 class="text-3xl font-bold text-gray-900 mb-4">🏷 ¡Productos en Oferta!</h1>
            </div>
            <div class="mb-8">
                <p class="mb-4 text-gray-600">Descubre todos los muebles exclusivos con precios de ocasión.</p>
                <p class="text-gray-600 text-2xl font-bold">Mostrando {{sizeof($products)}} productos en oferta.</p>
            </div>
        @else            
            <div class="mb-8">
                <h1 class="text-3xl font-bold text-gray-900 mb-4">Todos los Productos</h1>
                <p class="text-gray-600">Descubre nuestra amplia gama de muebles de segunda mano.</p>
            </div>
        @endif
        <div class="product-grid">
            @forelse($products as $product)
                <x-product-card :product="$product" />
                @empty
                <div class="col-span-full text-center py-12">
                    <p class="text-gray-500 text-lg">No hay productos disponibles.
                    </p>
                </div>
            @endforelse
        </div>
    </div>
@endsection