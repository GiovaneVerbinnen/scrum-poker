<x-button {{ $attributes->merge([
    'class' => 'bg-primary-400 hover:bg-primary-500 rounded-lg'
])}}>
{{ $slot }}
</x-button>
