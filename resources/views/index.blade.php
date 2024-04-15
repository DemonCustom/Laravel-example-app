@extends('layouts.app')

@section('content')
    <section id="home" class="main-home parallax-section">
        <div class="overlay"></div>
        <div id="particles-js"></div>
        <div class="container">
            <div class="row">

                <div class="col-md-12 col-sm-12">
                    <h1>Hello! This is Neuron.</h1>
                    <h4>Responsive Blog HTML CSS Website Template</h4>
                    <a href="#blog" class="smoothScroll btn btn-default">Discover More</a>
                </div>

            </div>
        </div>
    </section>
    <section id="blog">
        <div class="container">
            <div class="row">
                <div class="col-md-offset-1 col-md-10 col-sm-12">
                    @foreach ($posts as $post)
                        <div class="blog-post-thumb">
                            <div class="blog-post-image">
                                <a href="{{ route('posts.show', $post->slug) }}">
                                    <img src="{{ asset('storage/' . $post->poster) }}" class="img-responsive"
                                        alt="Blog Image">
                                </a>
                            </div>

                            <div class="blog-post-title">
                                <h3> <a href="{{ route('posts.show', $post->slug) }}"></a>{{ $post->name }}</h3>
                            </div>

                            <div class="blog-post-format">
                                <span><a href="#"><img src="{{ asset('assets/images/author-image2.jpg') }}"
                                            class="img-responsive img-circle"> Ser Jones</a></span>
                                <span><i
                                        class="fa fa-date"></i>{{ $post->created_at->transLatedFormat('j F Y ') }}</span>
                                <span><i class="fa fa-comment-o"></i>{{ trans_choice(':count комментарий | :count комментария | :count комментариев |', $post->comments->count()) }}</span>
                            </div>

                            <div class="blog-post-des">
                                {!! nl2br($post->description) !!}
                                <a href="{{ route('posts.show', $post->slug) }}" class="btn btn-default">Читать далее...</a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </section>
@endsection
