<x-layout>
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://jqueryui.com/resources/demos/style.css">

    <x-header-text>Edit StarWars Person!</x-header-text>
    <ul class="nav nav-tabs justify-content-center" id="myTab" role="tablist">
        <li class="nav-item" role="presentation">
            <button class="nav-link active" id="edit-fields-tab" data-bs-toggle="tab" data-bs-target="#edit-fields"
                    type="button"
                    role="tab" aria-controls="edit-fields" aria-selected="true">Edit Person's Fields
            </button>
        </li>
        <li class="nav-item">

            <button class="nav-link" id="edit-images-tab" data-bs-toggle="tab" data-bs-target="#edit-images"
                    type="button"
                    role="tab" aria-controls="edit-images" aria-selected="false">Edit Person's Images
            </button>
        </li>
    </ul>

    <div class="tab-content" id="edit-person-tab-content">
        <div class="tab-pane fade show active" id="edit-fields" role="tabpanel" aria-labelledby="edit-fields-tab">
            <div class="row justify-content-center align-items-center">

                @component('components.person-edit-form',
                            [
                                'person'=>$person,
                                'genders'=>$genders,
                                'homeworlds'=>$homeworlds,
                                'films'=>$films
                            ])
                @endcomponent
            </div>

        </div>

        <div class="tab-pane fade" id="edit-images" role="tabpanel" aria-labelledby="edit-images-tab">

            @component('components.edit-person-images', ['images'=>$person->images, 'person'=>$person])
            @endcomponent

        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>
    <script src="{{asset('js/validation.js')}}"></script>
    <script>
        $(function () {
            $("#created").datepicker({dateFormat: 'yy-mm-dd'})
                .on('change', function (ev) {
                    $(this).valid();
                });
        });
    </script>
    <script>
        $(document).ready(function () {
            $('.image-form').submit(function (e) {
                e.preventDefault();

                let img = $(this).find('.img-thumbnail');
                let button = $(this).find('.btn-danger');

                $.ajax({
                    url: '/images/' + img.attr('alt'),
                    type: 'delete',
                    dataType: 'json',
                    success: function () {
                        img.remove();
                        button.remove();
                    },
                    error: function (xhr, ajaxOptions, thrownError) {
                        alert(thrownError + "\r\n" + xhr.statusText + "\r\n" + xhr.responseText);
                    }
                })
            })
        });

    </script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
            integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
            crossorigin="anonymous"></script>
</x-layout>
