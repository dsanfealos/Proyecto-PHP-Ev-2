<div class="bg-white mx-8 rounded-lg border-black border-2 shadow-lg p-6 product-card cursor-pointer flex flex-col h-full {{ $class }}">
    <div class="w-full h-48 mb-4">
        <img class="w-full img-fluid h-full object-contain rounded-md shadow-sm" 
             src="{{ $category->icon }}" 
             alt="{{ $category->name }}">
    </div>

    <div class="flex flex-col flex-grow items-center justify-center">
        <h4 class="text-xl font-bold mb-2 text-gray-900">{{ $category->name }}</h4>
        <p class="text-gray-700 mb-4 flex-grow">{{ $category->description }}</p>
        
        <div class="mt-auto">
            <a href="{{ route('categories.show', $category->id) }}"
                class="block text-center bg-primary-600 mt-auto text-white px-4 py-1 rounded-lg hover:bg-primary-700 transition">
                Ver Productos
            </a>
        </div>
    </div>
</div>