<x-layout>
    <div class="container">
        <div class="row">
            @foreach($products as $product)
            <div class="col-md-4">
                <a href="{{ route('products.show', $product->id) }}">
                    {{ $product->name }}
                </a>
                @foreach($product->categories as $category)
                <a href="{{ route('categories.show', $category->id) }}">
                    <span class="badge bg-primary">
                        {{ $category->name }}
                    </span>
                </a>
                @endforeach
            </div>
            @endforeach
        </div>
    </div>
</x-layout>