@extends('layouts.app')

@section('content')
<h1>{{$title}}</h1>
<ul>
    @foreach($posts as $post)

        <li>
            <h3>{{ $post->title ?? '' }}</h3>

        </li>
    <div>
        {!! $post->description ?? '' !!}
    </div>
@endforeach
</ul>
@endsection
