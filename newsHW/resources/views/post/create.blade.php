@extends('layouts.app')

@section('content')
    <h1>{{$title}}</h1>

    <form method="post" action="{{ route('post.store') }}" enctype="multipart/form-data">
        @csrf
        <div class="form-group row">
            <label for="title" class="col-sm-2 col-form-label">Title</label>
            <div class="col-sm-10">
                <input type="text" name="title" class="form-control" id="title" placeholder="Title">
            </div>
        </div>
        <div class="form-group row">
            <label for="description_short" class="col-sm-2 col-form-label">Short description</label>
            <div class="col-sm-10">
                <input type="text" name="description_short" class="form-control" id="description_short" placeholder="Short description">
            </div>
        </div>

        <div class="form-group row">
            <label for="image" class="col-sm-2 col-form-label">Choose Image</label>
            <div class="col-sm-10">
                <input id="image" type="file" name="image">
            </div>
        </div>
{{--        <div class="form-group row">--}}
{{--            <label for="description" class="col-sm-2 col-form-label">Description</label>--}}
{{--            <div class="col-sm-10">--}}
{{--                <input type="text" name="description" class="form-control" id="description" placeholder="Description">--}}
{{--            </div>--}}
{{--        </div>--}}
        <div class="form-group row">
            <label for="url" class="col-sm-2 col-form-label">Url</label>
            <div class="col-sm-10">
                <input type="text" name="url" class="form-control" id="url" placeholder="Url">
            </div>
        </div>

        <div class="form-group row">
            <label for="description" class="col-sm-2 col-form-label">Опис</label>
            <div class="col-sm-10">
                <textarea id="description" name="description"></textarea>
            </div>
        </div>

        <div class="form-group row">
            <label for="category" class="col-sm-2 col-form-label">Category</label>
            <div class="col-sm-10">
                <select class="custom-select" id="category" name="id_category">
                    <option selected>Choose...</option>

                    @foreach($categories as $categor)
                        <option value={{ $categor->id ?? '' }}>{{ $categor->name ?? '' }}</option>
                    @endforeach

                </select>

            </div>
        </div>
        <input class="btn btn-success" name='submit' type="submit" value='Save' />
    </form>

    <!-- Include Editor JS files. -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/froala-editor@3.1.0/js/froala_editor.pkgd.min.js"></script>

    <!-- Initialize the editor. -->
    <script>
        //var csrf_token = $('meta[name="csrf-token"]').attr('content');
        new FroalaEditor('#description', {
            attribution: false,
            // Set the file upload URL.
            imageUploadURL: '/posts/upload',

            imageUploadParams: {
                id: 'my_editor',
                _token: "{{ csrf_token() }}"
            },
        });
        //setTimeout(() => document.querySelector("div.fr-wrapper.show-placeholder > div").style.display = 'none', 400);

    </script>
    <style>
        div.fr-wrapper.show-placeholder > div:first-child {
            display: none !important;
            visibility: hidden !important;
        }
    </style>
@endsection
