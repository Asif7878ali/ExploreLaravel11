<x-layout>
    <!-- Navbar -->
    <x-navbar />
    {{-- {{dd($post)}} --}}
    @if ($post)
        <div class="card mt-5 cardcenter" style="max-width: 540px;">
            <div class="row g-0">
                <div class="col-md-4">
                    <img class="setimagesinhle" src="{{ asset('storage/' . $post->post_image) }}" />
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
                            {{-- {{dd($comment)}} --}}
                            <strong>{{ $comment->users->name ?? 'Anonymous' }}</strong>
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
    @else
        <p class="text-center mt-5">No Post Found</p>
    @endif

    <!-- Footer -->
    <x-footer />
</x-layout>
