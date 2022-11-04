@props([
    'label',
    'name',
    'error',
])

<label class="m-2 form-check">
    <span class="form-check-label">{{$label}}</span>
    <input {{$attributes}} name="{{$name}}" data-field="{{$error ?? $name}}" class="form-check-input">
    <x-form.error error="{{$error ?? $name}}" />
</label>