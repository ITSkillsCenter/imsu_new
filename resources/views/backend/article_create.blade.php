@extends('layouts.master',['title'=>'Create Article'])

@section('extrastyle')

<style>
    .chibueze-zone {
        max-width: 100%;
        height: 200px;
        padding: 10px;
        display: flex;
        align-items: center;
        justify-content: center;
        text-align: center;
        font-family: "Quicksand", sans-serif;
        font-weight: 500;
        font-size: 20px;
        cursor: pointer;
        color: #cccccc;
        border: 1.7px dashed #009578;
        border-radius: 10px;
    }

    .chibueze-zone--over {
        border-style: solid;
    }

    .chibueze-zone__input {
        display: none;
    }

    .chibueze-zone__thumb {
        width: 100%;
        height: 100%;
        border-radius: 10px;
        overflow: hidden;
        background-color: #cccccc;
        background-size: cover;
        position: relative;
    }

    .chibueze-zone__thumb::after {
        content: attr(data-label);
        position: absolute;
        bottom: 0;
        left: 0;
        width: 100%;
        padding: 5px 0;
        color: #ffffff;
        background: rgba(0, 0, 0, 0.75);
        font-size: 14px;
        text-align: center;
    }
</style>


@endsection

@section('content')

<div class="page-inner">
    @include('layouts.includes.crumbMenu',['pageTitle'=>'Create Article','Title'=>'Article'])

    <div class="row">
        <div class="col-md-12">
            @include('homepage.flash_message')
            <form action="{{route('store-article')}}" method="post" enctype="multipart/form-data">
                @csrf
                <div class="row">
                    <div class="col-md-9 col-lg-9">

                        <div class="card no-margin-bottom">
                            <div class="card-header">
                                <div class="card-title">Write New Article</div>
                            </div>
                            <div class="card-body" id="create-article">

                                <div class="form-group">
                                    <label for="title">Title:</label>
                                    <input type="text" class="form-control" name="heading" id="title" required>
                                </div>

                                <div class="form-group">
                                    <label for="title">Type:</label>
                                    <select name="type" id="" class="form-control" required>
                                        <option value="">Select Type</option>
                                        <option value="article">Article</option>
                                        <option value="event">Event</option>
                                        <option value="slider">Slider</option>
                                        <option value="announcement">Announcement</option>
                                        <option value="menu">Menu</option>
                                    </select>
                                </div>

                                <div class="form-group">
                                    <label for="title">Category:</label>
                                    <select name="category_id" id="" class="form-control" required>
                                        <option value="">Select Category</option>
                                        @foreach($categories as $cate)
                                        <option value="{{ $cate->id }}">{{ $cate->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                
                                <div class="form-group">
                                    <label for="title">Start Date (For events):</label>
                                    <input type="text" class="form-control" name="start_date" required>
                                </div>

                                <div class="form-group">
                                    <label for="title">End Date (For events):</label>
                                    <input type="text" class="form-control" name="end_date" required>
                                </div>

                                <div class="form-group">
                                    <label for="pwd">Description:</label>
                                    <textarea name="content" id="editor1" class="form-control"></textarea>
                                </div>

                                <div class="form-group">
                                    <label for="keyword">SEO Keywords:</label>
                                    <input type="text" class="form-control" name="keywords" id="keyword" required>
                                </div>
                                <div class="form-group">
                                    <label for="seo_descr">SEO Meta Description:</label>
                                    <textarea name="seo_description" id="seo_descr" class="form-control" required></textarea>
                                </div>

                                <div class="checkbox">
                                    <label><input type="checkbox" name="is_comment_enabled"> Allow comments for this article</label>
                                </div>
                                <div class="checkbox">
                                    <label><input type="checkbox" name="is_page"> This is a page not blog post</label>
                                </div>
                                {{-- <button type="submit" class="btn btn-default">Submit</button> --}}
                            </div>
                            <div class="card-footer">
                                <button type="submit" class="btn btn-success">Submit</button>
                            </div>
                        </div>

                    </div>
                    <div class="col-lg-3 col-md-3">

                        <div class="card">
                            <div class="card-header">
                                <h3 class="card-title">
                                    Article Feature Image
                                </h3>
                            </div>
                            <div class="card-body">
                                <div class="chibueze-zone">
                                    <span class="chibueze-zone__prompt">Drop file here or click to upload</span>
                                    <input type="file" name="article_image" class="chibueze-zone__input">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </form>
        </div>
    </div>


</div>
@endsection


@section('extrascript')
{{-- <script src="https://cdn.ckeditor.com/4.16.1/full-all/ckeditor.js"></script> --}}
<script src="{{ URL::asset('admin_student/plugins/ckeditor/ckeditor.js') }}"></script>
<script>
    CKEDITOR.replace('editor1', {
        height: 500
    });
</script>
<script>
    document.querySelectorAll(".chibueze-zone__input").forEach((inputElement) => {
        const dropZoneElement = inputElement.closest(".chibueze-zone");

        dropZoneElement.addEventListener("click", (e) => {
            inputElement.click();
        });

        inputElement.addEventListener("change", (e) => {
            if (inputElement.files.length) {
                updateThumbnail(dropZoneElement, inputElement.files[0]);
            }
        });

        dropZoneElement.addEventListener("dragover", (e) => {
            e.preventDefault();
            dropZoneElement.classList.add("chibueze-zone--over");
        });

        ["dragleave", "dragend"].forEach((type) => {
            dropZoneElement.addEventListener(type, (e) => {
                dropZoneElement.classList.remove("chibueze-zone--over");
            });
        });

        dropZoneElement.addEventListener("drop", (e) => {
            e.preventDefault();

            if (e.dataTransfer.files.length) {
                inputElement.files = e.dataTransfer.files;
                updateThumbnail(dropZoneElement, e.dataTransfer.files[0]);
            }

            dropZoneElement.classList.remove("chibueze-zone--over");
        });
    });

    /**
     * Updates the thumbnail on a drop zone element.
     *
     * @param {HTMLElement} dropZoneElement
     * @param {File} file
     */
    function updateThumbnail(dropZoneElement, file) {
        let thumbnailElement = dropZoneElement.querySelector(".chibueze-zone__thumb");

        // First time - remove the prompt
        if (dropZoneElement.querySelector(".chibueze-zone__prompt")) {
            dropZoneElement.querySelector(".chibueze-zone__prompt").remove();
        }

        // First time - there is no thumbnail element, so lets create it
        if (!thumbnailElement) {
            thumbnailElement = document.createElement("div");
            thumbnailElement.classList.add("chibueze-zone__thumb");
            dropZoneElement.appendChild(thumbnailElement);
        }

        thumbnailElement.dataset.label = file.name;

        // Show thumbnail for image files
        if (file.type.startsWith("image/")) {
            const reader = new FileReader();

            reader.readAsDataURL(file);
            reader.onload = () => {
                thumbnailElement.style.backgroundImage = `url('${reader.result}')`;
            };
        } else {
            thumbnailElement.style.backgroundImage = null;
        }
    }
</script>
@endsection