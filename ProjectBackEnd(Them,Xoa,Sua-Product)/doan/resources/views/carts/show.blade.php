<x-layout>
    <div class="container-fluid">
        <?php
        $content = Cart::content();
        ?>
        <div class="row">
            <div class="col-md-6 col-sm-12">
                <h1>CART</h1>
                <div class="d-flex">
                    <p>Ban co muon dang ki tai khoang?</p>
                    <a href="">
                        <p>Dang ki o day</p>
                    </a>
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Full name">
                </div>
                <div class="row">
                    <div class="col-md-7 col-sm-12">
                        <div class="mb-3">
                            <input type="email" class="form-control" id="exampleFormControlInput1"
                                placeholder="@gmail">
                        </div>
                    </div>
                    <div class="col-md-5 col-sm-12">
                        <div class="mb-3">
                            <input type="number" class="form-control" id="exampleFormControlInput1"
                                placeholder="Phone">
                        </div>
                    </div>
                </div>
                <div class="mb-3">
                    <input type="text" class="form-control" id="exampleFormControlInput1" placeholder="Address">
                </div>
                <div class="text-end">
                    <button class="btn btn-dark">Thanh toan</button>
                </div>
            </div>
            <div class="col-md-6 col-sm-12 bg-body bg-body-tertiary">
                <nav class="navbar navbar-expand-sm navbar-light bg-light">
                    <div class="container-fluid">
                        <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                            data-bs-target="#navbarSupportedContent1" aria-controls="navbarSupportedContent1    "
                            aria-expanded="false" aria-label="Toggle
                            navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>
                        <br>
                        <div class="collapse navbar-collapse" id="navbarSupportedContent1">
                            <ul class="navbar-nav">
                                <li class="nav-item">
                                    <div
                                        class="row border-bottom
                                        border-dark-subtle">
                                        @foreach ($content as $v_content)
                                            <div class="col-md-12 col-sm-12">
                                                <div class="row">
                                                    <div
                                                        class="col-md-10
                                                    col-sm-6">
                                                        <div class="d-flex">
                                                            <a class="nav-link
                                                            active"
                                                                aria-current="page" href="">
                                                                <img src="{{ url('/photoforproducts/ao1.png') }}"
                                                                    alt="" class="img-fluid">
                                                            </a>
                                                            <p>
                                                                {{ $v_content->name }}
                                                                <br><br>
                                                                {{ $v_content->options->size }}
                                                            </p>
                                                        </div>
                                                    </div>
                                                    <div
                                                        class="col-md-1
                                                    col-sm-6">
                                                        <span class="price-clother">
                                                            {{ $v_content->price }}
                                                        </span><br>
                                                        <span>
                                                            {{ $v_content->qty }}
                                                        </span>
                                                    </div>
                                                    <div class="col-md-1">
                                                        <form action="{{ route('carts.destroy', $v_content->rowId) }}"
                                                            method="post">
                                                            @csrf
                                                            @method('DELETE')
                                                            <button type="submit">X</button>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        @endforeach
                                    </div>
                                    <div class="row my-5">
                                        <div
                                            class="d-flex
                                            justify-content-between">
                                            <div class="col-md-6">
                                                <p>Tong Tien</p>
                                                <p>Phi Ship</p>
                                                <p class="border-top border-dark-subtle my-5">Tong tat ca</p>
                                            </div>
                                            <div class="col-md-6">
                                                <p>
                                                    <span>
                                                        {{ Cart::priceTotal() }}
                                                    </span>
                                                </p>
                                                <p><span>30,000</span></p>
                                                <p class="border-top border-dark-subtle my-5">
                                                    <span>
                                                        {{ Cart::total() }}
                                                    </span>
                                                </p>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                            </ul>
                        </div>
                    </div>
                </nav>
            </div>
        </div>
    </div>
</x-layout>
