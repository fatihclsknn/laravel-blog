@extends('front.layouts.master')
@section('title','Hakkımızda')
@section('content')

    <section class="s-content site-page">
        <div class="row">
            <div class="column large-12">

                <section>

                    <div class="s-content__media">
                        <img src="{{ asset($about->image) }}" alt="">
                    </div> <!-- end s-content__media -->

                    <div class="s-content__primary">

                        <h1 class="s-content__title">{{ $about->title }}</h1>

                        <p class="lead">
                            {!! $about->content !!}
                        </p>
                        <hr>



                    </div> <!-- end s-content__primary -->

                </section>

            </div> <!-- end column -->
        </div> <!-- end row -->
    </section> <!-- end s-content -->


@endsection
