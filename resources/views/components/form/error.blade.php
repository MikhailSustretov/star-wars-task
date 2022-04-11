@props(['name'])

@error($name)
<p class="fw-bold mt-2 small text-danger">{{$message}}</p>
@enderror
