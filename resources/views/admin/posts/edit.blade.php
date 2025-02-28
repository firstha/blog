@extends('layouts.app')

@section('content')
<div class="container-fluid">

<!-- Content Row -->
        <div class="card shadow">
            <div class="card-header">
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">{{ __('edit post')}}</h1>
                    <a href="{{ route('admin.posts.index') }}" class="btn btn-success btn-sm shadow-sm">{{ __('Go Back') }}</a>
                </div>
            </div>
            <div class="card-body">
                <form action="{{ route('admin.posts.update', $posts->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('put')
                    <div class="form-group">
                        <label for="category">{{ __('Category') }}</label>
                        <select class="form-control" name="category_id" id="category">
                            @foreach (categories as category)
                                <option {{ $category->id === $posts->category->id ? 'selected' : null }} value="{{ $category->id }}">{{ $category->name }}</option>
                            @endforeach
                        </select>
                    </div>
                    <div class="form-group">
                        <label for="title">{{ __('Title') }}</label>
                        <input type="text" class="form-control" id="title" placeholder="{{ __('title') }}" name="title" value="{{ old('title', $post->title) }}" />
                    </div>
                    <div class="form-group">
                        <label for="excerpt">{{ __('Excerpt') }}</label>
                        <select name="excerpt" id="excerpt">{{ old('excerpt', $post->excerpt) }}</select>
                    </div>
                    <div class="form-group">
                        <label for="description">{{ __('Description') }}</label>
                        <select name="description" id="description">{{ old('description', $post->description) }}</select>
                    </div>
                    <div class="form-group">
                        <label for="banner">{{ __('Banner') }}</label>
                        <input type="fike" class="form-control" id="banner" placeholder="{{ __('banner') }}" name="banner" value="{{ old('banner') }}" />
                    </div>
                    <button type="submit" class="btn btn-success">{{ __('Save')}}</button>
                </form>
            </div>
        </div>
    

    <!-- Content Row -->

</div>
@endsection


@push('style-alt')
<link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
@endpush

@push('script-alt')
<script
        src="https://code.jquery.com/jquery-3.6.3.min.js"
        integrity="sha256-pvPw+upLPUjgMXY0G+8O0xUf+/Im1MZjXxxgOcBQBXU="
        crossorigin="anonymous"
    >
    </script>
<script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
<script>
      $('.select-multiple').select2();
</script>
@endpush