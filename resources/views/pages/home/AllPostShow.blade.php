<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Posts</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" defer></script>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg navbar-light bg-body-tertiary">
        <!-- Container wrapper -->
        <div class="container">
            <h4>Post Management</h4>
            <div class="collapse navbar-collapse" id="navbarButtonsExample">
                <!-- Left links -->
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link" href="/">Home</a>
                    </li>
                </ul>
                <!-- Left links -->

                <div class="d-flex align-items-center">
                    <a href={{route('login')}} data-mdb-ripple-init class="btn btn-link px-3 me-2">
                        Login
                    </a>
                    <a href={{route('userProfile.create')}} data-mdb-ripple-init class="btn btn-primary me-3">
                        Sign up for free
                    </a>
                </div>
            </div>
        </div>       
    </nav>
     {{-- Posts --}}
     {{-- {{dd($postdetail->all())}} --}}
     <div class="container my-5">
        <div class="row">
            @foreach ($postdetail as $post)
                <div class="col-12 col-md-4 mb-4 d-flex align-items-stretch">
                    <div class="card" style="width: 100%;">
                        <img src="{{ asset('storage/' . $post->post_image) }}" class="card-img-top img-fluid" alt="Card image cap" style="height: 200px; object-fit: cover;">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title">{{ $post->title }}</h5>
                            <p class="card-text">{{ $post->description }}</p>
                            <span class="btn btn-primary mt-auto">Written by: {{ $post->user->name ?? 'Unknown' }}</span>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
    
    
</body>

</html>
