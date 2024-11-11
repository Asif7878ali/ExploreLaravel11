<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" defer></script>
</head>

<body>
    <div class="position-relative overflow-hidden">
        <div class="d-flex min-vh-100" lc-helper="video-bg">
            <video style="z-index:1;object-fit: cover; object-position: 50% 50%;"
                class="position-absolute w-100 min-vh-100" autoplay="" preload="" muted="" loop=""
                playsinline="">
                <!-- adjust object-position to tweak cropping on mobile -->
                <source src="https://cdn.livecanvas.com/media/nature/video.mp4" type="video/mp4">
            </video>
            <div style="z-index:2" class="align-self-center text-center text-light col-md-8 offset-md-2">
                <div class="lc-block mb-4">
                    <div editable="rich">
                        <h1 class="display-1 fw-bolder">Welcome Our Crud System Management </h1>
                    </div>
                </div>

                <div class="lc-block">
                    <div editable="rich">
                        <p class="lead">Create Your Free Account here with no upfrount fee.</p>
                    </div>
                </div>

                <div class="lc-block">
                  <a href={{route('login')}}  class="btn btn-primary btn-sm">Login</a>
                  <a href={{route('userProfile.create')}} class="btn btn-info btn-sm">Signup</a>    
                </div>

                <div class="lc-block m-2">
                    <a href="{{route('post.index')}}"  class="btn btn-success btn-lg">Posts</a>
                  </div>

            </div>
        </div>
    </div>
  <!-- End of Footer -->
  
</body>

</html>
