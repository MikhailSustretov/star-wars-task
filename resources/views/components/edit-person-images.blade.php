<div class="container col-md-9 mb-3 mt-3">

    <div class="container mb-3 rounded-3 text-center">
        <div class="border border-2 border-secondary row">
            @if($images->count())
                <h3 class="mb-3 mt-3">Select the images you want to delete</h3>
                @foreach($images as $image)
                    <div class="col col-2" id="{{$image->id}}">
                        <form class="image-form">
                            <img src="/storage/{{$image->title}}"
                                 class="img-thumbnail" alt="{{$image->id}}">
                            <button id="button-delete" type="submit" class="btn-danger mt-3 mb-3">
                                Delete image
                            </button>
                        </form>
                    </div>
                @endforeach
            @endif

            <div class="row justify-content-center align-items-center">

                <form method="POST" action="{{route('images.create', ['person'=>$person->id])}}" id="person-form"
                      enctype="multipart/form-data"
                >
                    @csrf
                    @method('post')

                    <div class="container col-md-9 mb-3 mt-3">
                        <h3 class="mb-3 mt-3">Select the images you want to add</h3>
                        <x-form.input type="file" label_name="" multiple name="image[]"></x-form.input>
                        <x-form.error name="image"></x-form.error>
                        <x-form.error name="image.*"></x-form.error>

                        <button type="submit" class="btn btn-primary mb-3 w-100">Add images</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
