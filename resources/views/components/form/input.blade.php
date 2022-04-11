@props(['name', 'value', 'label_name'])

<div class="mb-3">
    <x-form.label class="label" name="{{$label_name ?? $name}}"></x-form.label>

    <input
        class="form-control"
        name="{{$name}}"
        id="{{$name}}"
        @if(isset($value))
        value="{{$value}}"
        @endif
        {{$attributes}}
        autocomplete="off"
    >
    <x-form.error name="{{$name}}"></x-form.error>

</div>
