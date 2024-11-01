<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>AdminDashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" defer></script>
</head>

<body>
    <div class="container my-4">
        <h1>Admin Panel</h1>
        <!-- Authenticated User Info -->
        @auth
            <div>
                <strong>Admin:- </strong> {{ auth()->user()->name }}<br>
                <strong>Email:- </strong> {{ auth()->user()->email }}
            </div>
        @endauth
        <form action="{{ route('logout') }}" method="POST" class="d-flex justify-content-end">
            @csrf
            <button type="submit" class="btn btn-danger btn-sm">Logout</button>
        </form>
        <!-- Success Alert -->
        @if (session('success'))
            <div class="alert alert-danger alert-dismissible fade show">
                <strong>Success!</strong>
                {{ session()->get('success') }}
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        @endif

        {{-- Search --}}
        <form action={{ route('searchuser') }} method="GET" class="input-group mt-2" id="searchForm">
            <input type="search" name="search" class="form-control rounded" placeholder="Search User" />
            <button type="submit" class="btn btn-primary">Search</button>
        </form>
        {{-- {{dd($usersdetail)}} --}}
        @if ($usersdetail->isEmpty())
            <div class="text-center">
                <p>User Not Found</p>
            </div>
        @else
            <table class="table table-hover">
                <thead>
                    <tr>

                        <th scope="col">Name</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">Address</th>
                        <th scope="col">MobileNumber</th>
                        <th scope="col">Gender</th>
                        <th scope="col">is_Admin</th>
                        <th scope="col">Created_at</th>
                        <th scope="col">Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($usersdetail as $user)
                        <tr>

                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                            <td>{{ Str::limit($user->address, 25, '...') }}</td>
                            <td>{{ $user->number }}</td>
                            <td>{{ $user->gender }}</td>
                            <td>
                                @if ($user->admin === 1)
                                    <span class="badge badge-pill bg-primary badge-primary">Yes</span>
                                @else
                                    <span class="badge badge-secondary bg-secondary">No</span>
                                @endif
                            </td>
                            <td>{{$user->created_at}}</td>
                            <td>
                                <a href={{ route('userProfile.show', $user->user_id) }}
                                    class="btn btn-success btn-sm">View</a>
                                <a href={{ route('userProfile.edit', $user->user_id) }}
                                    class="btn btn-primary btn-sm">Edit</a>
                                <button type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"
                                    class="btn btn-danger btn-sm">Delete</button>
                            </td>
                        </tr>
                    @endforeach

                </tbody>
            </table>

                {{-- Pagination --}}
                <div class="d-flex justify-content-center mt-3">
                  {{ $usersdetail->links() }}
              </div>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
                aria-hidden="true">
                <div class="modal-dialog" role="document">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Delete User</h5>
                        </div>
                        <div class="modal-body">
                            Are You want to Sure Delete this User
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-secondary btn-sm"
                                data-bs-dismiss="modal">Cancel</button>
                            <form action="{{ route('userProfile.destroy', $user->user_id) }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="btn btn-danger btn-sm">Delete</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    @endif

</body>

</html>
