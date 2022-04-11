@props(['name'])

<select {{$attributes(['class'=>'form-control mb-3'])}} name="{{$name}}" id="{{$name}}">

    {{$slot}}

</select>
<x-form.error name="{{$name}}"></x-form.error>
