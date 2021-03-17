@extends('front.layouts.master')
@section('title','Ana Sayfa')
@section('content')
    <section class="s-bricks">
        <div class="masonry">
            <div class="bricks-wrapper h-group">

                <div class="grid-sizer"></div>

                <div class="brick entry featured-grid animate-this">
                    <div class="entry__content">

                        <div class="featured-post-slider">
                         @foreach($news as $new)
                            <div class="featured-post-slide">
                                <div class="f-slide">

                                    <div class="f-slide__background" style="background-image:url('front/images/thumbs/featured/featured-1.jpg');"></div>
                                    <div class="f-slide__overlay"></div>

                                    <div class="f-slide__content">
                                        <ul class="f-slide__meta">
                                            <li>{{ \Carbon\Carbon::parse($new->created_at)->format('j F, Y') }}</li>
                                            <li><a href="#" >{{ $new->	author }}</a></li>
                                        </ul>

                                        <h1 class="f-slide__title"><a href="{{ route('front.singlePost',$new->slug) }}" title="">{{ $new->title }}</a></h1>
                                    </div>

                                </div> <!-- f-slide -->
                            </div> <!-- featured-post-slide -->
                            @endforeach
                        </div> <!-- end feature post slider -->

                        <div class="featured-post-nav">
                            <button class="featured-post-nav__prev">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M12.707 17.293L8.414 13H18v-2H8.414l4.293-4.293-1.414-1.414L4.586 12l6.707 6.707z"></path></svg>
                            </button>
                            <button class="featured-post-nav__next">
                                <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24"><path d="M11.293 17.293l1.414 1.414L19.414 12l-6.707-6.707-1.414 1.414L15.586 11H6v2h9.586z"></path></svg>
                            </button>
                        </div> <!-- featured-post-nav -->

                    </div> <!-- end entry content -->
                </div> <!-- end entry, featured grid -->
               @foreach($articles as $article)
                <article class="brick entry format-standard animate-this">

                    <div class="entry__thumb">
                        <a href="{{ route('front.singlePost',$article->slug) }}" class="thumb-link">
                            <img src="../{{ $article->image }}" alt="">
                        </a>
                    </div> <!-- end entry__thumb -->

                    <div class="entry__text">
                        <div class="entry__header">

                            <div class="entry__meta">
                                <span class="entry__cat-links">
                                    <a href="{{ route('front.category',$article->getCategory->slug) }}">{{ $article->getCategory->title }}</a>

                                </span>
                            </div>

                            <h1 class="entry__title"><a href="{{ route('front.singlePost',$article->slug) }}">{{ $article->title }}</a></h1>

                        </div>
                        <div class="entry__excerpt">
                            <p>{!! Str::limit($article->content,'250') !!}
                            </p>
                        </div>
                        <div class="form-group">
                            <a href="{{ route('front.singlePost',$article->slug) }}" class="form-control">Devamını Oku...</a>
                        </div>
                    </div> <!-- end entry__text -->


                </article> <!-- end entry -->

                @endforeach

            </div> <!-- end brick-wrapper -->

        </div> <!-- end masonry -->


    </section> <!-- end s-bricks -->
@endsection
