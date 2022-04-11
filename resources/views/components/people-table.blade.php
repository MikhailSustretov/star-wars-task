<div class="mt-3 d-flex justify-content-center">
{{--    {{dd($people)}}--}}
    {{$people->withQueryString()->links()}}
</div>

<table class="table table-hover table-success table-striped">
    <tr class="table-primary">
        @foreach($column_names as $column_name)
            <th class="table-light">{{$column_name}}</th>
        @endforeach
        <th>Actions</th>
    </tr>

    @foreach($people as $person)
        <tr>
            <td class="table-light">{{$person->name}}</td>

            <td class="table-light col-3">
                @if($person->images->count())
                    @component('components.carousel', ['items' => $person->images]) @endcomponent
                @else
                    <b>Person hasn't images yet</b>
                @endif
            </td>

            <td class="table-light">{{$person->height}}</td>

            <td class="table-light">{{$person->mass}}</td>

            <td class="table-light">{{$person->hair_color}}</td>

            <td class="table-light">{{$person->birth_year}}</td>

            <td class="table-light">{{$person->gender->gender}}</td>

            <td class="table-light">{{$person->homeworld->name}}</td>

            <td class="table-light col-2">
                @foreach($person->films as $film)
                    {{$film->title}}
                    <br>
                @endforeach
            </td>

            <td class="table-light">{{$person->created}}</td>

            <td class="table-light">
                <a href="{{$person->url}}">{{$person->url}}</a></td>

            <td>
                <div>
                    <form action="{{route('people.edit', ['person'=>$person])}}" method="get">
                        <input type="submit" value="Edit" class="btn btn-primary mb-2">
                    </form>
                </div>
                <div>
                    <form action="{{route('people.destroy', ['person'=>$person])}}" method="post">
                        @csrf
                        @method('delete')
                        <input type="submit" value="Delete" class="btn btn-danger">
                    </form>
                </div>
            </td>
        </tr>
    @endforeach
</table>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
