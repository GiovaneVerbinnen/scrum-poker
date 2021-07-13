@extends('layouts.dark')

@section('content')
    @if (session('participant'))
        <livewire:room-page :room='$room' is-participant />

    @else
    <livewire:create-participant :room="$room" />

    @endif
@endsection
