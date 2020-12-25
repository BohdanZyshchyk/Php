@extends("partials.mainLayout")

@section("content")

    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

    <form class="mb-4">
        <div class="d-flex justify-content-between mt-4">
            <div class="mb-3 mr-4 " style="width:70%">
                <label for="inputPassword5" class="form-label label">Title</label>
                <input type="text" id="inputPassword5" name="title" class="form-control "
                       aria-describedby="passwordHelpBlock">
            </div>
            <div class="mb-3 w-25">
                <label for="inputPassword5" class="form-label label">Category</label>
                <select class="form-select" aria-label="Default select example" name="category">
                    @foreach($categories as $category)
                        <option value={{$category["name"]}}>{{$category["name"]}}</option>
                    @endforeach
                </select>
            </div>
        </div>

        <div class="mb-3 mr-4 w-100">
            <label for="inputPassword5" class="form-label label">Short Description</label>
            <textarea id="short_description" name="short_description" class="w-100" aria-describedby="passwordHelpBlock"></textarea>
        </div>

        <label for="inputPassword5" class="form-label label"> Description</label>
        <div id="editor" class="mb-4 ">

        </div>

        <p class="label">Tags: </p>
        @foreach($tags as $tag )
            <div class="form-check form-check-inline">
                <input class="form-check-input" type="checkbox" id={{$tag["name"]}} value={{$tag["name"]}}>
                <label class="form-check-label" for="{{$tag["name"]}}">{{$tag["name"]}}</label>
            </div>
        @endforeach
        <div class="d-flex w-100 justify-content-center mt-4">
            <button type="submit" class="w-25 btn btn-dark mb-3">Post</button>
        </div>
    </form>


    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <script>
        var toolbarOptions = [
            ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
            ['blockquote', 'code-block', 'image'],
            [{'header': 1}, {'header': 2}],               // custom button values
            [{'list': 'ordered'}, {'list': 'bullet'}],
            [{'script': 'sub'}, {'script': 'super'}],      // superscript/subscript
            [{'indent': '-1'}, {'indent': '+1'}],          // outdent/indent
            [{'direction': 'rtl'}],                         // text direction
            [{'size': ['small', false, 'large', 'huge']}],  // custom dropdown
            [{'header': [1, 2, 3, 4, 5, 6, false]}],
            [{'color': []}, {'background': []}],          // dropdown with defaults from theme
            [{'font': []}],
            [{'align': []}],
            ['clean']                                         // remove formatting button
        ];
        var quill = new Quill('#editor', {
            modules: {
                toolbar: toolbarOptions
            },
            theme: 'snow',
            placeholder: 'description',
        });
    </script>


    <!-- Include Editor JS files. -->
    <script type="text/javascript" src="https://cdn.jsdelivr.net/npm/froala-editor@3.1.0/js/froala_editor.pkgd.min.js"></script>

    <!-- Initialize the editor. -->
    <script>
        //var csrf_token = $('meta[name="csrf-token"]').attr('content');
        new FroalaEditor('#short_description', {
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
        div.fr-wrapper > div:first-child {
            display: none !important;
            visibility: hidden !important;
        }
    </style>
@endsection
