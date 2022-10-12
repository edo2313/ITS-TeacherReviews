@extends('layouts.app')
@section('title')
    Lista degli studenti
@endsection
@section('content')
    <div class="container">
        <h1>Lista degli studenti</h1>
        <ul>
            @foreach($students as $student)
                <li>
                    <a href="/students/{{$student['id']}}">
                        {{$student['name']}}
                    </a>
                </li>
            @endforeach
        </ul>
    </div>
@endsection
