@extends('layouts.app')
@section('title')
    Tanti catti
@endsection
@section('content')
    <div class="container grid grid-cols-8 grid-flow-row gap-1">
        @foreach($cats as $cat)
            <div class="w-36 h-36 rounded-full justify-center items-center flex flex-col border-2 border-black bg-[{{$cat->getColor()}}]">
                <div class="flex gap-2">
                    @if($cat->getEyesNumber())
                        @for($i = 0; $i < $cat->getEyesNumber(); $i++)
                            <div class="w-4 h-4 rounded-full bg-black border-4 border-white"></div>
                        @endfor
                    @else
                        <div class="w-4 h-4 rounded-full text-pink-500 justify-center items-center flex">x</div>
                        <div class="w-4 h-4 rounded-full text-pink-500 justify-center items-center flex">x</div>
                    @endif
                </div>
                <p>{{ $cat->getTailsNumber() }}</p>
            </div>
        @endforeach
    </div>
@endsection
