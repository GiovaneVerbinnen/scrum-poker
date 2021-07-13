<button {{ $attributes->merge([
    'class' => 'outline-none active:scale-90 transform-gpu transition-all duration-75 '
]) }} >{{ $slot }}</button>
