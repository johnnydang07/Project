<x-layout>
    <a href="{{ route('products.create') }}" class="btn btn-primary">Add product</a>
    <div class="container-fluid mt-5">
        <div class="row">
      
            @foreach ($products as $product)
                <div class="col-md-3 col-sm-6">
                    
                    <a href="{{ route('products.show', $product->id) }}"><img src="{{ url('/photoforproducts/ao1.png') }}"
                            alt="" class="img-fluid">
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
                    <tr>
                <td>{{ $product->id }}</td>
                <td><img src="{{URL::asset('photoforproducts')}}/{{  $product->photo  }}" alt="" class="image-fluid" width="100"></td>
                <td><a href="{{ route('products.show', $product->id) }}">{{ $product->name }}</a></td>
                <td>
                    <a href="{{ route('products.edit', $product->id) }}" class="btn btn-primary">Edit</a>
                    <form action="{{ route('products.destroy', $product->id) }}" method="POST" onsubmit="return ConfirmDelete()">
                    @method('Delete')
                    @csrf
                    <button onclick="return confirm('Do you want to delete?')" type="submit" class="btn btn-danger">Delete</button>
                    </form>
                </td>
                </tr>
                </div>
                
            @endforeach
        </div>
    </div>
</x-layout>
