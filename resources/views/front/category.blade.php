@extends('front.layouts.master')
@section('title','Kategoiler')
@section('content')



    <section class="s-pageheader">
        <div class="row current-cat">
            <div class="column">
                <h1 class="h2">
                    {{$category->title}} ({{$articles->count()}})

                </h1>
            </div>
        </div>
    </section>

    <section class="s-bricks with-top-sep">

        <div class="masonry">

            <!-- brick-wrapper -->
            <div class="bricks-wrapper h-group">

                <div class="grid-sizer"></div>

                @foreach($articles as $article)
                <article class="brick entry format-standard animate-this">

                    <div class="entry__thumb">
                        <a href="{{ route('front.singlePost',$article->slug) }}" class="thumb-link">
                            <img src="{{ $article->image }}"alt="">
                        </a>
                    </div>  <!-- end entry__thumb -->

                    <div class="entry__text">
                        <div class="entry__header">

                            <div class="entry__meta">
                                <span class="entry__cat-links" >
                                    <a href="{{ route('front.category',$category->slug) }}"> {{$category->title}}</a>
                                </span>
                            </div>

                            <h1 class="entry__title"><a href="{{ route('front.singlePost',$article->slug) }}">{{ $article->title }}</a></h1>

                        </div>
                        <div class="entry__excerpt">
                            <p>
                                {!! Str::limit($article->content,'250') !!}
                            </p>
                        </div>
                      <div class="form-group">
                          <a href="{{ route('front.singlePost',$article->slug) }}" class="form-control">Devamını Oku...</a>
                      </div>
                    </div> <!-- end entry__text -->

                </article> <!-- end article -->
                @endforeach



            </div> <!-- end brick-wrapper -->

        </div> <!-- end masonry -->


    </section> <!-- end s-bricks -->




@endsection
