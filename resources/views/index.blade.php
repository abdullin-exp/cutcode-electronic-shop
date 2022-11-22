@extends('layouts.app')

@section('content')
    @auth
        <form method="post" action="{{ route('logOut') }}">
            @csrf
            @method('DELETE')
            <button type="submit">выйти</button>
        </form>
    @endauth
@endsection
