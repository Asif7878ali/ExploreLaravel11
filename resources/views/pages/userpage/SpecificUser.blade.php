<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>UserDetail</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" defer></script>
</head>
<body>
     <!-- Navbar -->
     <x-navbar/>
    <div class="container my-5">
        <h1 class="text-center mb-4">User Details</h1>
        <div  class="d-flex justify-content-end m-2">
            <a href={{route('post.show', $user->user_id)}} class="btn btn-danger btn-sm">Dashboard</a>
        </div>
        <div class="card p-4">
            <div class="row mb-3">
                <div class="col-md-3 font-weight-bold">Name:</div>
                <div class="col-md-9" id="userName">{{$user->name}}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-3 font-weight-bold">Email:</div>
                <div class="col-md-9" id="userEmail">{{$user->email}}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-3 font-weight-bold">Address:</div>
                <div class="col-md-9" id="userAddress">{{$user->address}}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-3 font-weight-bold">Phone Number:</div>
                <div class="col-md-9" id="userPhone">{{$user->number}}</div>
            </div>
            <div class="row mb-3">
                <div class="col-md-3 font-weight-bold">Gender</div>
                <div class="col-md-9" id="userPhone">{{$user->gender}}</div>
            </div>
            <div class="row mb-3 d-flex">
                <div class="col-md-3 font-weight-bold">Admin</div>
                  @if ($user->admin === 1)
                  <span class="badge badge-pill bg-primary w-25">Yes</span>
                  @else
                  <span class="badge badge-secondary bg-secondary p-2 w-25">No</span>
                  @endif
            </div>
            <!-- Add more fields as needed -->
        </div>
        <div class="d-flex justify-content-end mt-4">
            <a href={{route('userProfile.edit', $user->user_id)}} class="btn btn-primary btn-lg me-3">Edit</a>
            <form action="{{ route('logout') }}" method="POST" class="d-inline">
                @csrf
                <button type="submit" class="btn btn-danger btn-lg">Logout</button>
            </form>
            <a href={{route('post.create')}} class="btn btn-primary btn-lg me-3">Create a Post</a>
        </div>

    </div>
                               <!-- Footer -->
                               <x-footer/>
  </body>
</html>