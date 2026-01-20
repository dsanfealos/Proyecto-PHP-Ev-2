<div class="bg-orange-500 rounded-lg border-orange-700 border-2 shadow-lg p-6 product-card cursor-pointer {{
    $class }}">
    <div class="text-4xl text-primary-500 mb-4">{{ $category->icon }}</div>
    <h4 class="text-xl font-bold mb-2 text-gray-900">{{ $category->name }}</h4>
    <p class="text-gray-700 mb-4">{{ $category->description }}</p>
    <a href="{{ route('categories.show', $category->id) }}"
        class="text-primary-600 font-semibold hover:text-primary-700 transition">
        Ver Productos →
    </a>
</div>