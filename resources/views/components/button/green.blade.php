<x-button {{ $attributes->merge([
    'class' => 'bg-green-400 hover:bg-green-500 rounded-lg'
])}}>
{{ $slot }}
</x-button>
