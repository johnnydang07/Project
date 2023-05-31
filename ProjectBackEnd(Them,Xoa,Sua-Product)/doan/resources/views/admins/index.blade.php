<x-admin>
    <table class="table table-dark table-borderless table-hover">
        <tr>
            <th>ID</th>
            <th>Ten</th>
            <th>Mo ta</th>
            <th>Gia</th>
            <th>Giam gia</th>
            <th>Hinh anh</th>
            <th>Ngay nhap</th>
            <th>Action</th>
        </tr>
        @foreach ($products as $product)
            <tr>
                <td>{{ $product->id }}</td>
                <td>{{ $product->name }}</td>
                <td>{{ $product->description }}</td>
                <td>{{ $product->price }}</td>
                <td>{{ $product->disprice }}</td>
                <td><img src="{{ asset('photoforproducts/'.$product->photo) }}" alt="" class="w-25"></td>
                <td>{{ $product->created_at }}</td>
                <td>
                    <button type="button" class="btn btn-light">Xoa</button>
                    <button type="button" class="btn btn-light">Sua</button>
                </td>
            </tr>
        @endforeach
    </table>
</x-admin>
