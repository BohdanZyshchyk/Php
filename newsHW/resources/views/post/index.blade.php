@extends('layouts.app')

@section('title',$title ?? '')


@section('content')
    <div class="row">
        <div class="col-lg-8 col-md-10 mx-auto">
            @foreach($posts as $post)
                <div class="post-preview">
                    <a href="post.html">
                        <h2 class="post-title">
                            {{ $post->title ?? '' }}
                        </h2>
                        <h3 class="post-subtitle">
                            Problems look mighty small from 150 miles up
                        </h3>
                    </a>
                    <p class="post-meta">Posted by
                        <a href="#">Start Bootstrap</a>
                        on {{ date('F d, Y', strtotime($post->created_at ?? '')) }}</p>
                </div>
                <hr>
{{--                <li>--}}
{{--                    <h3>{{ $post->title ?? '' }}</h3>--}}
{{--                    <p>{{ $post->description_short ?? '' }}</p>--}}
{{--                </li>--}}
            @endforeach

            <!-- Pager -->
            <div class="clearfix">
                <a class="btn btn-primary float-right" href="#">Older Posts &rarr;</a>
            </div>
        </div>
    </div>
@endsection
