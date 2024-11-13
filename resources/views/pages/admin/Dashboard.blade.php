<x-layout>
    <!-- Navbar -->
    <x-navbar />
    <!-- Admin Panel -->
    <div class="container my-4">
        <h1>Admin Panel</h1>
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
         {{-- Table --}}
        @if (!$usersdetail->isEmpty())
            <table class="table table-hover">
                <thead>
                    <tr>
                        <th scope="col">Name</th>
                        <th scope="col">E-mail</th>
                        <th scope="col">Address</th>
                        <th scope="col">Mobile Number</th>
                        <th scope="col">Gender</th>
                        <th scope="col">Is Admin</th>
                        <th scope="col">Created At</th>
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
                                    <span class="badge badge-pill bg-primary">Yes</span>
                                @else
                                    <span class="badge bg-secondary">No</span>
                                @endif
                            </td>
                            <td>{{ $user->created_at }}</td>
                            <td>
                                <a href="{{ route('userProfile.show', $user->user_id) }}" class="btn btn-success btn-sm">View</a>
                                <a href="{{ route('userProfile.edit', $user->user_id) }}" class="btn btn-primary btn-sm">Edit</a>
                                <button type="button" data-bs-toggle="modal" data-bs-target="#deleteModalUser{{ $user->user_id }}" class="btn btn-danger btn-sm">Delete</button>
                            </td>
                        </tr>
                         <!-- Modal -->
                         <x-userDeleteModal :user="$user" />
                    @endforeach
                </tbody>
            </table>
           <!-- Pagination -->
            <div class="d-flex justify-content-center mt-3">
                {{ $usersdetail->links() }}
            </div>
        @else
            <div class="text-center">
                <p>User Not Found</p>
            </div>
        @endif
    </div>
    <!-- Footer -->
    <x-footer />
</x-layout>