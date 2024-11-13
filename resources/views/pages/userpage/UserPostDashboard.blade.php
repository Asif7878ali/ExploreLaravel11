<x-layout>
    <!-- Navbar -->
    <x-navbar />
    {{-- Posts --}}
    <div class="container my-5">
        <div class="row">
            @foreach ($userPosts as $post)
                <div class="card m-3" style="width: 18rem;">
                    <img src="{{ asset('storage/' . $post->post_image) }}" class="card-img-top img-fluid"
                        alt="Card image cap" style="height: 200px; object-fit: cover;">
                    <div class="card-body d-flex flex-column">
                        <h5 class="card-title">{{ $post->title }}</h5>
                        <p class="card-text">{{ Str::limit($post->description, 30, '...') }}</p>
                        <span class="mt-auto">
                            Created at: {{ $post->created_at }}
                        </span>
                        <div class="mt-3">
                            <a href={{ route('post.edit', $post->post_id) }} class="btn btn-warning">Edit</a>
                            <button type="button" class="btn btn-danger" data-bs-toggle="modal"
                                data-bs-target="#deleteModalPost{{ $post->post_id }}">Delete</button>
                        </div>
                    </div>
                </div>
                 <!-- Modal -->
                 <x-postDeleteModal :post="$post" />
            @endforeach
        </div>
    </div>
    </div>
    <!-- Footer -->
    <x-footer />
</x-layout>