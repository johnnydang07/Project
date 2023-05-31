<x-admin>
    <div class="container">
        <div class="row">
            <div class="col-md-12 col-sm-12">
                <form action="{{ route('products.update', $product->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <h1 class="text-center">Sửa Sản Phẩm</h1>
                    <h5 class="mt-3">Tên sản phẩm</h5>
                    <div class="form-floating mb-4">
                        <input type="text" class="form-control" id="floatingInput" name="name" id="name"
                            placeholder="name@example.com" value="{{ $product->name }}">
                        <label for="name">Nhập sản phẩm</label>
                    </div>
                    <h5 class="mt-3">Mô tả sản phẩm</h5>
                    <div class="form-floating mb-4">
                        <input type="text" class="form-control" id="floatingInput" name="description"
                            id="description" placeholder="name@example.com" value="{{ $product->description }}"> 
                        <label for="description">Nhập mô tả</label>
                    </div>
                    <h5 class="mt-3">Giá sản phẩm</h5>
                    <div class="form-floating mb-4">
                        <input type="text" class="form-control" id="floatingInput" name="price" id="price"
                            placeholder="name@example.com" value="{{ $product->price }}">
                        <label for="price">Nhập giá</label>
                    </div>
                    <h5 class="mt-3">Giảm giá sản phẩm</h5>
                    <div class="form-floating mb-4">
                        <input type="text" class="form-control" id="floatingInput" name="disprice" id="disprice"
                            placeholder="name@example.com" value="{{ $product->disprice }}">
                        <label for="disprice">Nhập giảm giá(nếu có)</label>
                    </div>
                    <h5 class="mt-3">Hình ảnh sản phẩm</h5>
                    <input type="file" name="photo" id="photo" value="{{ $product->photo }}">
                    <h5 class="mt-4">Số lượng sản phẩm</h5>
                    <div class="form-floating mb-4">
                        <input type="text" class="form-control" id="floatingInput" name="quantity" id="quantity"
                            placeholder="name@example.com" value="{{ $product->quantity }}">
                        <label for="quantity">Nhập số lượng</label>
                    </div>
                    <div class="mb-3">
                        <label for="quantity" class="form-label">Categories:</label>
                        @foreach ($categories as $category)
                        @php
                            $checked = '';
                            if(in_array($category->id, $product->categories->pluck('id')->all()))
                            {
                                 $checked = 'checked';
                            }
                        @endphp
                            <label class="form-check-label">
                                <input type="checkbox" class="form-check-input" name="categories[]" id=""
                                    value="{{ $category->id }}"> {{ $category->name }}
                            </label>
                        @endforeach
                    </div>
                    <button type="submit" class="btn btn-primary">Sửa</button>
                </form>
            </div>
        </div>
    </div>
</x-admin>
