<!-- Header con navegación -->
<header class="bg-orange-300 shadow-lg relative">
    <div class="container mx-auto px-6 py-4">
        <div class="flex items-center justify-between">
        <!-- Logo -->
            <div class="flex items-center space-x-4">
                <a href="{{ route('welcome') }}" class="text-2xl font-bold textprimary-
                    600">
                    🛋️ Muebles Kuatropatas
                </a>
            </div>
            <!-- Navegación usando partial -->
            @include('partials.navigation')
            <!-- Carrito -->
            @php
                $cart = session('cart', []);
                $totalQuantity = array_sum(array_column($cart, 'quantity'));
            @endphp
            <div class="flex items-center space-x-4">
            <a href="{{ route('cart.index') }}" 
                class="text-gray-700 hover:text-primary-600 transition">
                    🛒 Carrito ( {{ $totalQuantity }} )
            </a>
            </div>
            
            <div class="flex items-center space-x-4">
                <div class="hidden sm:flex sm:items-center sm:ms-6">
                    <div class="inline-flex items-center px-3 py-2 border border-transparent text-sm leading-4 
                    font-medium rounded-md text-gray-500 bg-white hover:text-gray-700 focus:outline-none transition 
                    ease-in-out duration-150">{{ Auth::user()->name ?? "Invitado"}}</div>                    
                </div>
            </div>
            
        </div>
    </div>
</header>