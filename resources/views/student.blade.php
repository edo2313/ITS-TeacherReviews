@extends('layouts.app')

@section('title')
    Studente {{$student['id']}}
@endsection

@section('content')
    <h2>{{$student['name']}}</h2>
    @if(isset($student['reviews']))
        @foreach($student['reviews'] as $review)
            <b>{{$review['teacher']}}:</b> {{$review['grade']}}
        @endforeach
    @else
        <p>Non ci sono recensioni</p>
    @endif
@endsection
