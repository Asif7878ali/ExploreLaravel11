<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Post Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" defer></script>
</head>

<body>
    {{-- Posts --}}
    {{-- {{dd($postdetail->all())}} --}}
    <div class="container my-5">
        <div class="row">
            @foreach ($userPosts as $post)
                <div class="card m-3" style="width: 18rem;">
                    <img src="{{ asset('storage/' . $post->post_image) }}" class="card-img-top img-fluid"
                        alt="Card image cap" style="height: 200px; object-fit: cover;">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p class="card-text">{{Str::limit($post->description, 30 ,'...') }}</p>
                        <span class="mt-auto">
                            Created at: {{ $post->created_at}}
                        </span>
                        <div class="mt-3">
                            <a href={{ route('post.edit', $post->post_id) }} class="btn btn-warning">Edit</a>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#exampleModal">Delete</button>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
            aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Delete Post</h5>
                    </div>
                    <div class="modal-body">
                        Are You want to Sure Delete this Post
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary btn-sm" data-bs-dismiss="modal">Cancel</button>
                        <form action="{{ route('post.destroy', $post->post_id) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
    </div>
</body>

</html>
