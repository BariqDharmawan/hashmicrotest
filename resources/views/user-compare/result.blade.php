@extends('layouts.app')

@section('content')
    <h1>Perbandingan kata</h1>

    <table>
        <thead>
            <tr>
                <th>Kata 1</th>
                <th>Kata 2</th>
                <th>Persentase perbandingan</th>
                <th>Diinput tgl</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($userCompares as $userCompare)
            <tr>
                <td>{{ $userCompare->word_1 }}</td>
                <td>{{ $userCompare->word_2 }}</td>
                <td>{{ $userCompare->result_percentage }}</td>
                <td>{{ $userCompare->created_at->format('d F Y H:i') }}</td>
                <td>
                    <a href="{{ route('user-compare.edit', $userCompare->id) }}">edit</a>
                    <form action="{{ route('user-compare.destroy', $userCompare->id) }}" method="post" 
                        onsubmit="return confirm('are you sure?')">
                        @csrf @method('DELETE')
                        <button type="submit">delete</button>
                    </form>
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
    
    @if (session('success'))
        <p>{{ session('success') }}</p>
    @endif
@endsection