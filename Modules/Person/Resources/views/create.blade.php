<x-layout>

    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.1/themes/base/jquery-ui.css">
    <link rel="stylesheet" href="https://jqueryui.com/resources/demos/style.css">

    <x-header-text>Add StarWars Person!</x-header-text>

    <div class="container">
        <div class="row justify-content-center align-items-center">

            <form method="POST" action="{{route('people.store')}}" id="person-form" enctype="multipart/form-data"
                  class="border border-dark col-7 rounded-3">
                @csrf

                <div class="container col-md-9 mb-3 mt-3">

                    <x-form.input type="text" name="name" value="{{old('name')}}"/>

                    <x-form.input type="number" name="height" value="{{old('height')}}"/>

                    <x-form.input type="number" name="mass" value="{{old('mass')}}"/>

                    <x-form.input type="text" name="hair_color" value="{{old('hair_color')}}"/>

                    <x-form.input type="text" name="birth_year" value="{{old('birth_year')}}"/>

                    <label for="gender_id">Gender</label>
                    <x-form.select name="gender_id">
                        @foreach($genders as $gender)
                            <option
                                    value="{{$gender->id}}" {{old('gender_id')==$gender->id?'selected':''}}>{{$gender->name}}</option>
                        @endforeach
                    </x-form.select>

                    <label for="homeworld_id">Homeworld</label>
                    <x-form.select name="homeworld_id">
                        @foreach($homeworlds as $homeworld)
                            <option
                                    value="{{$homeworld->id}}" {{old('homeworld_id')==$homeworld->id?'selected':''}}>
                                {{$homeworld->name}}</option>
                        @endforeach
                    </x-form.select>

                    <label for="films[]">Films</label>
                    <x-form.select class="form-select" name="films[]" id="films" multiple>

                        @foreach($films as $film)
                            <option value="{{$film->id}}">{{$film->title}}</option>
                        @endforeach
                    </x-form.select>
                    <x-form.error name="films"></x-form.error>

                    <x-form.input type="text" name="created" class="hasDatepicker" value="{{old('created')}}"/>

                    <x-form.input type="file" label_name="Choose files" multiple name="image[]"></x-form.input>
                    <x-form.error name="image"></x-form.error>
                    <x-form.error name="image.*"></x-form.error>

                    <x-form.input type="url" name="url" value="{{old('url')}}"/>

                    <button type="submit" class="btn btn-primary">Create</button>
                </div>
            </form>

            <script src="https://code.jquery.com/jquery-3.6.0.js"></script>
            <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/jquery-validation@1.19.3/dist/jquery.validate.js"></script>
            <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js"
                    integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13"
                    crossorigin="anonymous"></script>
            <script src="{{url('js/datepicker.js')}}"></script>
            <script src="{{asset('js/validation.js')}}"></script>
        </div>
    </div>
</x-layout>
