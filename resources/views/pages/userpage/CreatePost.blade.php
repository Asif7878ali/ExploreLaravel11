<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Create a Post</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet" />
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" defer></script>
    <script src="{{ asset('js/imagePreview.js') }}" defer ></script>
</head>
<body>
    <div class="container mt-5">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <div class="card">
                    <div class="card-header text-center">
                        <h4>Create a Post</h4>
                    </div>
                    <div class="card-body">
                        <!-- Success Alert -->
                        @if (session('success'))
                            <div class="alert alert-success alert-dismissible fade show">
                                <strong>Success!</strong>
                                {{ session()->get('success') }}
                                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
                            </div>
                        @endif

                        <form method="POST" action="{{route('post.store')}}" enctype="multipart/form-data">
                            @csrf
                              <!-- Image -->
                            <div class="mb-3">
                                <label for="image">Choose Post Image</label>
                                <input type="file" class="form-control" id="image" name="image" accept="image/*" required>
                                <img id="imagePreview" src="#" alt="Image Preview" class="img-fluid mt-2" style="display: none; max-height: 200px;"/>
                            </div>

                            <!-- Title -->
                            <div class="mb-3">
                                <label for="title" class="form-label">Title</label>
                                <input type="text" class="form-control" id="title" name="title"
                                    placeholder="Title" value="{{ old('title') }}" required />

                                @error('title')
                                    <div class="alert alert-danger p-1" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            
                            <!-- Description -->
                             <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <input type="text" class="form-control" id="description" name="description"
                                    placeholder="Enter a Description" value="{{ old('description') }}" required />

                                @error('description')
                                    <div class="alert alert-danger p-1" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                             <!-- Post Privacy -->
                             <div class="col">
                                <label for="post" class="form-label">Post Privacy</label>
                                <select class="form-select" id="post" name="post" required>
                                    <option value="">Select</option>
                                    <option value="1" {{ old('post') == '1' ? 'selected' : '' }}>Private</option>
                                    <option value="0" {{ old('post') == '0' ? 'selected' : '' }}>Public</option>
                                </select>

                                @error('post')
                                    <div class="alert alert-danger p-1" role="alert">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>

                            <!-- Submit Button -->
                            <div class="d-grid mt-2">
                                <button type="submit" class="btn btn-primary">Post</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</body>
</html>