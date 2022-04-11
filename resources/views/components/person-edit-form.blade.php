<form method="POST" action="{{route('people.update', ['person'=>$person])}}" id="person-form"
      class="border border-dark col-7 rounded-3 mt-3">
    @csrf
    @method('patch')

    <div class="container col-md-9 mb-3 mt-3">

        <x-form.input type="text" name="name" value="{{old('name',$person->name)}}"/>

        <x-form.input type="number" name="height" value="{{old('height',$person->height)}}"/>

        <x-form.input type="number" name="mass" value="{{old('mass',$person->mass)}}"/>

        <x-form.input type="text" name="hair_color" value="{{old('hair_color',$person->hair_color)}}"/>

        <x-form.input type="text" name="birth_year" value="{{old('birth_year',$person->birth_year)}}"/>

        <label for="gender_id">Gender</label>
        <x-form.select name="gender_id">
            @foreach($genders as $gender)
                <option
                    value="{{old('gender_id',$gender->id)}}" {{$person->gender_id==$gender->id?'selected':''}}>
                    {{$gender->gender}}
                </option>
            @endforeach
        </x-form.select>

        <label for="homeworld_id">Homeworld</label>
        <x-form.select name="homeworld_id">
            @foreach($homeworlds as $homeworld)
                <option
                    value="{{old('homeworld_id',$homeworld->id)}}" {{$person->homeworld_id==$homeworld->id?'selected':''}}>
                    {{$homeworld->name}}</option>
            @endforeach
        </x-form.select>
        <x-form.error name="homeworld_id"></x-form.error>

        <label for="films[]">Films</label>
        <select class="form-select form-controls mb-3" name="films[]" id="films" multiple>
            @foreach($films as $film)
                <option value="{{$film->id}}"

                @foreach($person->films as $personFilm)
                    {{$personFilm->id==$film->id?'selected':''}}
                    @endforeach

                >{{$film->title}}</option>
            @endforeach
        </select>
        <x-form.error name="films"></x-form.error>

        <x-form.input type="text" name="created" class="hasDatepicker" value="{{$person->created}}"/>

        <x-form.input type="url" name="url" value="{{$person->url}}"/>
        <button type="submit" class="btn btn-primary">Update</button>
    </div>

</form>
