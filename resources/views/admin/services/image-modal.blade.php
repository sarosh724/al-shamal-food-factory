<!DOCTYPE html>
<html lang="en">
<head>
    <!-- Other head elements -->

    <!-- Fancybox CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.css">
</head>
<body>
    <div id="images-list">
        @if(count($service -> images))
            <div>
                <table class="table table-striped table-bordered table-sm dataTable">
                    <tbody>
                    <tr>
                        <th>Uploaded at</th>
                        <th style="width:175px">Actions</th>
                    </tr>
                    @foreach($service -> images as $image)
                        <tr id="row_{{$image->id}}">
                            <td>{{showDateTime($image->created_at)}}</td>
                            <td>
                                <a href="{{$image -> path}}" data-fancybox="gallery" class="btn btn-sm btn-primary mr-1">
                                    <i class="fa fa-eye mr-1"></i>View
                                </a>
                                <a href="javascript:void(0)" class="btn btn-sm btn-danger btn-image-remove mr-1" data-id="{{$image->id}}">
                                    <i class="fa fa-trash mr-1"></i>Delete
                                </a>
                            </td>
                        </tr>
                    @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </div>

    <form method="post" name="upload-image-form" id="upload-image-form" enctype='multipart/form-data'>
        @csrf
        <div class="row" id="images"></div>

        <div class="d-none image-clone">
            <div class="col-md-12 mb-1 mt-2 image">
                <div class="row">
                    <div class="col-md-9">
                        <input type="file" class="form-control" name="images[]" id="images">
                    </div>
                    <div class="col-md-3">
                        <button class="btn btn-sm btn-danger mr-1 btn-remove" style="margin-top: 4px;">
                            <i class="fa fa-trash mr-1"></i>Remove
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-md-3">
                <div class="my-3">
                    <a href="javascript:void(0);" class="btn btn-sm btn-primary btn-add-image">
                        <i class="fa fa-plus"></i> Add Image
                    </a>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3">
                <div class="field">
                    <button type="submit" class="btn btn-sm btn-success btn-save">Save</button>
                </div>
            </div>
        </div>
    </form>

    <!-- Fancybox JS -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/fancybox/3.5.7/jquery.fancybox.min.js"></script>

    <script>
        $("#upload-image-form").validate({
            rules: {
                images: {
                    required: true
                },
            },

            submitHandler: function(form) {
                var formData = new FormData();
                formData.append('service_id', <?= $service->id ?>);

                for (let image of $('input[name="images[]"]')) {
                    formData.append("images[]", image.files[0]);
                }

                $.ajax({
                    url: '{{route('admin.services.upload-image')}}',
                    type: "POST",
                    cache: false,
                    processData: false,
                    data: formData,
                    contentType: false,
                    success: function(res) {
                        if (res.type == 'success') {
                            toast(res.message, 'success')
                            $('#global-modal').modal('hide');
                            table.ajax.reload();
                        } else {
                            toast(res.message, 'error')
                        }
                    },
                    error: function(xhr, error, thrown) {
                        if (xhr.status === 401) {
                            toast("The session has been expired", "error");
                            setTimeout(function() {
                                window.location.href = "{{route('login')}}";
                            }, 3000);
                        } else {
                            toast('Server error loading dialog', 'error');
                        }
                    }
                });
            }
        });

        var image_count;
        $(document).ready(function() {
            $(".btn-save").hide();
            image_count = 0;
        });

        $(".btn-add-image").click(function() {
            $("#images").append($(".image-clone").find('.image').clone());
            image_count++;
            if (image_count > 0) {
                $(".btn-save").show();
            }
        });

        $("#images").on('click', '.btn-remove', function() {
            $(this).closest('.image').remove();
            image_count--;
            if (image_count <= 0) {
                $(".btn-save").hide();
            }
        });

        $("#images-list").on("click", ".btn-image-remove", function() {
            var image_id = $(this).data('id');
            $("#row_" + image_id).remove();
            if ($('.btn-image-remove').length == 0) {
                $("#images-list").html('');
            }
            $.ajax({
                url: "{{route('admin.services.delete-image', '')}}/" + image_id,
                type: "DELETE",
                dataType: "json",
                cache: false,
                success: function(res) {
                    if (res.type == 'success') {
                        toast(res.message, "success");
                    } else {
                        toast(res.message, "error");
                    }
                },
                error: function(xhr, error, thrown) {
                    if (xhr.status === 401) {
                        toast("The session has been expired", "error");
                        setTimeout(function () {
                            window.location.href = "{{route('login')}}";
                        }, 3000);
                    } else {
                        toast('Server error loading dialog', 'error');
                    }
                }
            });
        });

        $(document).ready(function() {
            $('[data-fancybox="gallery"]').fancybox({
                buttons: [
                    "zoom",
                    "share",
                    "slideShow",
                    "fullScreen",
                    "download",
                    "thumbs",
                    "close"
                ]
            });
        });
    </script>
</body>
</html>
