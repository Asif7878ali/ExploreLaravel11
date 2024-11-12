<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Posts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" defer></script>
    <style>
        .card-custom {
            background-color: #f5f0f0;
            color: black;
            border-radius: 15px;
            overflow: hidden;
        }
        .card-custom img {
            object-fit: cover;
            height: 200px;
            width: 400px;
        }
        .card-custom .card-body {
            flex: 1;
            padding: 1.5rem;
        }
        .topcard{
            width: 500px;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <x-navbar/>

    <!-- Posts Section -->
    <div class="container my-5">
        <div class="row">
             <!-- Success Alert -->
             @if (session('success'))
             <div class="alert alert-success alert-dismissible fade show">
                 <strong>Success!</strong>
                 {{ session()->get('success') }}
                 <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
             </div>
             @elseif(session('error'))
                <div class="alert alert-danger alert-dismissible fade show">
                 <strong>Error!</strong>
                 {{ session()->get('error') }}
                 <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
               </div>
             @endif 
             {{-- Posts --}}
            @foreach ($postdetail as $post)
            <div class="container mt-4 topcard">
                <div class="card shadow-sm border-0">
                    <div class="row g-0">
                        <!-- Image Section -->
                        <div class="col-md-4">
                            <img src="https://images.unsplash.com/photo-1725994390784-1ab5232a387d?q=80&w=1887&auto=format&fit=crop&ixlib=rb-4.0.3&ixid=M3wxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8fA%3D%3D" class="img-fluid rounded-start " alt="Post Image">
                        </div>
                        
                        <!-- Content Section -->
                        <div class="col-md-8">
                            <div class="card-body">
                                <h5 class="card-title">{{ $post->title }}</h5>
                                <p class="card-text">
                                    {{ Str::limit($post->description, 80 ,'...') }}
                                </p>
                                <p class="card-text"><small class="text-muted">Posted on: {{ $post->created_at }}</small></p>
                                <p class="card-text"><small class="text-muted">Written by: {{ $post->user->name ?? 'Unknown' }}</small></p>
                            </div>
                        </div>
                    </div>
            
                    <!-- Comment Section -->
                    <div class="card-footer">                       
                        <!-- Add New Comment -->
                        <form class="mt-4" method="POST" action="{{route('comment')}}">
                            @csrf
                            <input type="hidden" name="post_id" value={{$post->post_id}}>
                            <div class="mb-3">
                                <textarea name='comment' class="form-control" rows="2" placeholder="Write a comment..." required></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary btn-sm">Post Comment</button>
                        </form>
                    </div>
                </div>
            </div>
            
            @endforeach
        </div>

        <!-- Pagination -->
        <div class="d-flex justify-content-center mt-4">
            {{ $postdetail->links() }}
        </div>
    </div>

    <!-- Footer -->
    <x-footer/>
</body>
</html>