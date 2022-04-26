<x-layout>

    <x-header-text>Choose a Home World to see its people</x-header-text>
    <div class="row justify-content-center align-items-center">
        <form action='{{route('homeworlds.show')}}' method="post" class="col-8">
            @csrf
            <div class="container col-md-5 mb-3 mt-3">
                <x-form.select name="homeworld_id" class="text-center text-uppercase">
                    @foreach($homeworlds as $homeworld)
                        <option value="{{$homeworld->id}}"
                                {{(isset($homeworld_data) && $homeworld_data->id===$homeworld->id)?'selected':''}}>
                            {{$homeworld->name}}</option>
                    @endforeach
                </x-form.select>
                <div class="text-center">
                    <button type="submit" class="btn btn-primary w-100">Show planet's people data</button>
                </div>
            </div>
        </form>
    </div>
    <hr>
    <x-header-text>{{$homeworld_data->name}}'s people</x-header-text>

    @component('components.people-table', ['column_names' => $column_names, 'people'=>$people]) @endcomponent
</x-layout>