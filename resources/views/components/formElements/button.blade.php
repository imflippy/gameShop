@if($type == 'submit')
        <div class="{{ $class ?? 'col-12' }}"><input type="submit" name="{{ $name ?? '' }}" id="{{ $id ?? '' }}" class="{{ $classInput ?? '' }}" value="{{ $value ?? '' }}"></div>
    @elseif($type == 'button')
        <button type="button" name="{{ $name ?? '' }}" id="{{ $id ?? '' }}" class="{{ $classInput ?? '' }}">{{ $value ?? '' }}</button>
    @endif


