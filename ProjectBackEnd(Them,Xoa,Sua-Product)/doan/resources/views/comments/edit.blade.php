<x-layout>
    <div class="container mt-5">
        <h3>Sua binh luan</h3>
        <form action="{{ route('comments.update', $comment->id) }}" method="post">
            @csrf
            @method('PUT')
            <div class="form-floating">
                <textarea class="form-control" placeholder="Leave a comment here" name="content" id="floatingTextarea2"
                    style="height: 100px">{{ $comment->content }}</textarea>
                <label for="floatingTextarea2">Comments</label>
            </div>
            <button type="submit" class="btn btn-dark mt-3">Binh Luan</button>
        </form>
    </div>
</x-layout>
