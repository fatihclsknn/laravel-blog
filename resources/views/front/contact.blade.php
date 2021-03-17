@extends('front.layouts.master')
@section('title','İletisim')

@section('content')

    <!-- content
    ================================================== -->
    <section class="s-content site-page">
        <div class="row">
            <div class="column large-12">

                <section>

                    <div class="s-content__media">
                        <img src="{{ asset($contact->image) }}" alt="">
                    </div> <!-- end s-content__media -->

                    <div class="s-content__primary">

                        <h1 class="s-content__title">{{ $contact->title }}</h1>

                        <p class="lead">
                            {!! $contact->content !!}
                        </p>
                        <hr>


                        <form name="cForm" id="cForm" class="s-content__form" method="POST" action="">

                            @csrf
                            <fieldset>

                                <div class="form-field">
                                    <input name="cName" type="text" id="cName" class="h-full-width" placeholder="Your Name" value="">
                                </div>

                                <div class="form-field">
                                    <input name="cEmail" type="text" id="cEmail" class="h-full-width" placeholder="Your Email" value="">
                                </div>

                                <div class="form-field">
                                    <input name="subject" type="text" id="cWebsite" class="h-full-width" placeholder="Subject"  value="">
                                </div>

                                <div class="message form-field">
                                    <textarea name="cMessage" id="cMessage" class="h-full-width" placeholder="Your Message" ></textarea>
                                </div>

                                <button type="submit" class="submit btn btn--primary btn--medium h-full-width">Submit</button>

                            </fieldset>
                        </form> <!-- end form -->

                    </div> <!-- end s-content__primary -->

                </section>

            </div> <!-- end column -->
        </div> <!-- end row -->
    </section> <!-- end s-content -->

@endsection
