<x-layout>
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-sm-6">Cart</div>
            <div class="col-md-6 col-sm-6 text-end">
                <img src="{{ asset('photoforproducts/kevin.png') }}" alt="" class="img-fluid">
                <h6>{{ $user->name }}</h6>
            </div>
        </div>
    </div>
    <div class="container-fluid mt-5">
        <div class="row">
            @foreach ($products as $product)
                <div class="col-md-3 col-sm-6">
                    <a href="{{ route('products.show', $product->id) }}"><img
                            src="{{ url('/photoforproducts/ao1.png') }}" alt="" class="img-fluid">
                    </a>
                    <div class="d-flex">
                        <h2 class="mx-3"><a href="{{ route('products.show', $product->id) }}">{{ $product->name }}</a>
                        </h2>
                        <div class="product-price text-end mx-5">
                            <span>
                                @php
                                    if ($product->disprice != null) {
                                        echo ceil((($product->price - $product->disprice) / $product->price) * 100) . '%';
                                    }
                                @endphp
                            </span>
                            <br>
                            <span>{{ number_format($product->price - $product->disprice) . '₫' }}</span><br>
                            <strike>
                                @php
                                    if ($product->disprice != null) {
                                        echo number_format($product->price) . '₫';
                                    }
                                @endphp
                            </strike>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</x-layout>
