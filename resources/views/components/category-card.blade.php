<div class="bg-orange-500 mx-8 rounded-lg border-orange-700 border-2 shadow-lg p-6 product-card cursor-pointer flex flex-col h-full {{ $class }}">
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
                class="text-primary-600 font-semibold hover:text-primary-700 transition">
                Ver Productos →
            </a>
        </div>
    </div>
</div>