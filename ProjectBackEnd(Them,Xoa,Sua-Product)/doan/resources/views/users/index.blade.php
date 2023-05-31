<x-layout>
    <div class="container">
        <div class="text-center mt-5">
            <label for="">
                <h5>sign in</h5>
            </label><br>
            <form method="post" action="{{ route('login.custom') }}">
                @csrf
                <input type="email" name="email" id="email" class="p-1" placeholder="email dang nhap"><br>
                <input type="password" name="password" id="password" class="p-1 mt-3 form-login" placeholder="mat khau"><br>
                <div class="d-flex justify-content-center mt-3">
                    <button class="mx-5 btn btn-dark" type="submit">sign in</button>
                    <a class="mx-5 btn btn-dark">quen mat khau</a>
                </div>
            </form>
        </div>
        <div class="text-center mt-5">
            <label for="">
                <h5>register</h5>
            </label><br>
            <form action="{{ route('users.store') }}" method="POST">
                @csrf
                <input type="text" name="name" class="p-1" placeholder="ho va ten"><br>
                <input type="email" name="email" class="p-1 mt-3" placeholder="email"><br>
                <input type="password" name="password" class="p-1 mt-3" placeholder="mat khau"><br>
                <div class="d-flex justify-content-center mt-3">
                    <button type="submit" class="mx-5 btn btn-dark">create account</button>
                </div>
            </form>
        </div>
    </div>
</x-layout>
