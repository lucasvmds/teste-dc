@props([
    'label',
    'name',
    'error',
])

<label class="m-2 input-component">
    <span class="form-label">{{$label}}</span>
    <input {{$attributes}} name="{{$name}}" data-field="{{$error ?? $name}}" class="form-control">
    <x-form.error error="{{$error ?? $name}}" />
</label>