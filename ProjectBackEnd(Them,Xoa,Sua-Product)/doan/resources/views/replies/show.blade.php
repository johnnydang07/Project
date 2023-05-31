<x-layout>
    <div class="cotainer">
        <div class="row mt-5">
            <div class="col-md-6 col-sm-12 text-end">
                <a href="{{ route('products.index') }}"><img src="{{ asset('photoforproducts/' . $product->photo) }}"
                        alt="" class="img-fluid"></a>
            </div>
            <div class="col-md-6 col-sm-12 mt-5">
                <input type="hidden" name="id" value="{{ $product->id }}">
                <h1 class="font-brand">{{ $product->name }}</h1>
                <div class="d-flex">
                    <h2>
                        <span>
                            @php
                                echo ceil((($product->price - $product->disprice) / $product->price) * 100) . '% OFF';
                            @endphp
                        </span>
                    </h2>
                    <h2><strike>{{ number_format($product->price) . '₫' }}</strike></h2>
                    <h2><span>{{ number_format($product->price - $product->disprice) . '₫' }}</span></h2>
                </div>
                <h5>
                    <p>please select size</p>
                </h5>
                <form action="{{ route('carts.store') }}" method="post">
                    @csrf
                    <input type="hidden" name="id" value="{{ $product->id }}">
                    <input type="hidden" name="name" id="" value="{{ $product->name }}">
                    <input type="hidden" name="photo" id="" value="{{ $product->photo }}">
                    <input type="hidden" name="price" id=""
                        value="{{ $product->price - $product->disprice }}">
                    <div class="d-flex">
                        @foreach ($sizes as $size)
                            <div data-value="{{ $size->name }}" class="block-radio">
                                <input type="radio" class="btn-check" name="size" id="option.{{ $size->id }}"
                                    autocomplete="off" value="{{ $size->name }}">
                                <label class="btn btn-light"
                                    for="option.{{ $size->id }}">{{ $size->name }}</label>
                            </div>
                        @endforeach
                    </div>
                    <input type="number" name="quantity" id="" value="1" min="1" class="mt-3">
                    <div class="d-flex">
                        <button class="add-help btn btn-dark mt-2" type="submit">
                            <p class="font-add-help">add to
                                cart
                            </p>
                        </button>
                        <a class="btn btn-dark mx-2 mt-2">
                            <p class="font-add-help">help
                                me</p>
                        </a>
                    </div>
                </form>
                <p>{{ $product->description }}</p>
            </div>
        </div>
    </div>
    <div class="container">
        <form action="{{ route('comments.store', $product->id) }}" method="POST">
            @csrf
            <h3>binh luan</h3>
            <input type="hidden" name="product_id" id="product_id" value="{{ $product->id }}">
            <div class="form-floating">
                <textarea class="form-control" placeholder="Leave a comment here" name="content" id="floatingTextarea2"
                    style="height: 100px"></textarea>
                <label for="floatingTextarea2">Comments</label>
            </div>
            <button type="submit" class="btn btn-dark mt-3">Binh Luan</button>
        </form>
        @if ($success = Session::get('success'))
            <div class="alert alert-success" role="alert">
                {{ $success }}
            </div>
        @endif
        @foreach ($product->comments as $comment)
            <div class="border w-100 h-100 mt-4">
                <div class="people-one">
                    <h6>{{ $comment->content }}</h6>
                    <div class="mx-3 my-1 d-flex">
                        <form action="{{ route('comments.destroy', $comment->id) }}" method="post">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-dark mx-1">Xoa</button>
                        </form>
                        <a href="{{ route('comments.edit', $comment->id) }}"><button
                                class="btn btn-dark mx-1">Sua</button></a>
                        <button class="btn btn-dark mx-1">Tra Loi</button>
                    </div>
                </div>
            </div>
        @endforeach
        <div class="mx-5">
            <input type="text">
            <h6>aaaa</h6>
            <button class="btn btn-dark mx-1">Xoa</button>
            <button class="btn btn-dark mx-1">Sua</button>
            <button class="btn btn-dark mx-1">Tra Loi</button>
        </div>
    </div>
</x-layout>
