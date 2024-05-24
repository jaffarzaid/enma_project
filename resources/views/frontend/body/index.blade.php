@extends('frontend.master_index')

@section('dynamic')
    <section data-bs-version="5.1" class="header1 educationm4_header1 cid-udum8uYnVs mbr-fullscreen" id="header1-1m">
        <div class="mbr-overlay" style="opacity: 0.3; background-color: rgb(0, 0, 0);"></div>
        <div class="container align-center">
            <div class="row justify-content-start">
                <div class="mbr-white col-lg-8 col-md-10">
                    <h1 class="mbr-section-title mbr-bold align-left mbr-white pb-4 mbr-fonts-style display-1">
                        <div>Investing in Knowledge...</div>
                    </h1>
                    <p class="mbr-text align-left pb-1 mbr-fonts-style display-7">
                        Qualified professionals will be assessed on their knowledge and skills, as evidenced by their
                        ability to perform specific jobs. You can choose from a variety of top-ranked certifications that
                        will position you as a
                        sought-after professional and expert in your field.
                    </p>
                    <div class="mbr-section-btn align-left">
                        <a class="btn btn-md btn-primary display-4" href="{{ route('display.registration') }}"> Sign Up</a>
                        <a class="btn btn-md btn-white-outline display-4" href="https://enma.institute/" target="_blank">Learn More</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="mbr-arrow hidden-sm-down" aria-hidden="true">
            <a href="#next">
                <i class="mbri-arrow-down mbr-iconfont"></i>
            </a>
        </div>
    </section>
@endsection
