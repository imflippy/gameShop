<div class="{{ $class ?? 'col-12 mb-30' }}">
    @if(isset($label))
        <label>{{ $label }}</label>
    @endif
    <input type="{{ $type ?? 'text' }}" value="{{ $value ?? ''}}" id="{{ $id ?? '' }}" name="{{ $name ?? '' }}" placeholder="{{ $placeholder ?? '' }}">
</div>
