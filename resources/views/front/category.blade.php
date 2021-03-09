@extends('front.layouts.master')
@section('title','Kategoiler')
@section('content')



    <section class="s-pageheader">
        <div class="row current-cat">
            <div class="column">
                <h1 class="h2">{{ $category->title }}

                </h1>
            </div>
        </div>
    </section>
    <section class="s-bricks with-top-sep">

        <div class="masonry">

            <!-- brick-wrapper -->
            <div class="bricks-wrapper h-group">

                <div class="grid-sizer"></div>


                <article class="brick entry format-standard animate-this">

                    <div class="entry__thumb">
                        <a href="single-standard.html" class="thumb-link">
                            <img src="{{ asset('front/images/thumbs/masonry/tulips-600.jpg') }}"
                                 srcset="{{ asset('front/images/thumbs/masonry/tulips-600.jpg') }} 1x, {{ asset('front/images/thumbs/masonry/tulips-1200.jpg') }} 2x" alt="">
                        </a>
                    </div>  <!-- end entry__thumb -->

                    <div class="entry__text">
                        <div class="entry__header">

                            <div class="entry__meta">
                                <span class="entry__cat-links">
                                    <a href="#">Health</a>
                                </span>
                            </div>

                            <h1 class="entry__title"><a href="single-standard.html">10 Interesting Facts About Caffeine.</a></h1>

                        </div>
                        <div class="entry__excerpt">
                            <p>
                                Lorem ipsum Sed eiusmod esse aliqua sed incididunt aliqua incididunt mollit id et sit proident dolor nulla sed commodo est ad minim elit reprehenderit nisi officia aute incididunt velit sint in aliqua cillum in consequat consequat in culpa in anim.
                            </p>
                        </div>
                    </div> <!-- end entry__text -->

                </article> <!-- end article -->



            </div> <!-- end brick-wrapper -->

        </div> <!-- end masonry -->


    </section> <!-- end s-bricks -->





@endsection
