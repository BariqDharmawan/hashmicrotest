@extends('layouts.app')

@section('content')
    <h1>Input user 1</h1>
    <form action="{{ route('user-compare.update', $userCompare->id) }}" method="post" data-input-name="username[]" 
    class="user-to-compare" data-placeholder-user="Input user">
        @csrf @method('PUT')
        <input type="text" value="{{ $userCompare->word_1 }}" name="username_1" placeholder="Input user 1" required>
        <input type="text" name="username_2" value="{{ $userCompare->word_2 }}" placeholder="Input user 2" required>
        <button type="submit">Edit & Compare it</button>
    </form>

    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif
@endsection