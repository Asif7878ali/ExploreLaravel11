<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Public Post</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" defer></script>

</head>

<body class="d-flex align-items-center justify-content-center">
    {{-- {{dd($post)}} --}}
    <div class="card mt-5" style="max-width: 540px;">
        <div class="row g-0">
            <div class="col-md-4">
                <img src="https://mdbcdn.b-cdn.net/wp-content/uploads/2020/06/vertical.webp"
                    alt="Trendy Pants and Shoes" class="img-fluid rounded-start" />
            </div>
            <div class="col-md-8">
                <div class="card-body">
                    <h5 class="card-title">{{ $post->title }}</h5>
                    <p class="card-text">
                        {{ $post->description }}
                    </p>
                    <p class="card-text">
                        <small class="text-muted">Last updated {{ $post->created_at }}</small>
                    </p>
                </div>

            </div>
        </div>
        <!-- Comment Section -->
        <div class="card-footer">
            <h6 class="fw-bold">Comments</h6>
            <!-- Display existing comments -->
            <div class="comments mt-3">
                @forelse ($post->comments as $comment)
                    <div class="mb-3">
                        <strong>{{ $comment->user->name ?? 'Anonymous' }}</strong>
                        <p>{{ $comment->comment }}</p>
                        <p><small class="text-muted">{{ $comment->created_at ?? 'Unknown' }}</small></p>
                    </div>
                    <hr>
                @empty
                    <p>No Comments</p>
                @endforelse
            </div>
        </div>
    </div>
</body>

</html>
