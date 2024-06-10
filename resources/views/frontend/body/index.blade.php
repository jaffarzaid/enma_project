@extends('frontend.master_index')

@section('dynamic')
    <section data-bs-version="5.1" class="features2 educationm4_features2 counters cid-ufgPJtSW1N" id="features2-1w">



        <div class="mbr-overlay" style="opacity: 0.8; background-color: rgb(35, 35, 35);"></div>
        <div class="container">
            <h2 class="mbr-section-title pb-2 mbr-bold mbr-fonts-style align-left display-2">Investing in Knowledge...</h2>
            <div class="line-wrap">
                <div class="line"></div>
            </div>

            <h3 class="mbr-section-sub-title pb-4 mbr-normal mbr-fonts-style align-left display-7">Qualified professionals
                will be assessed on their knowledge and skills, as evidenced by their ability to perform specific jobs. You
                can choose from a variety of top-ranked certifications that will position you as a sought-after professional
                and expert in your field.</h3>

            {{-- Tamkeen Supported Courses + Expat --}}
            <div class="media-container-row justify-content-center">
                <div class=""></div>
                <div class="card p-3 col-12 col-md-10 col-lg-8 m-3 border rounded" style="max-width: 500px;">
                    <div class="row">
                        {{-- Job Seeker --}}
                        <div class="col-12 col-md-4">
                            <a href="{{ route('display.registration') }}">
                                <div class="card-img p-3">
                                    {{-- <span class="mbr-iconfont mbri-search"></span> --}}
                                    <i class="fas fa-search fa-2x"></i>
                                </div>
                                <div class="card-box">
                                    <p class="card-title mbr-fonts-style pt-3 mbr-white align-center">Job Seeker</p>
                                    <div class="line-wrap2">
                                        <div class="line2"></div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        {{-- Employee --}}
                        <div class="col-12 col-md-3">
                            <a href="{{ route('display.registration') }}">
                                <div class="card-img pb-3">
                                    <i class="fa-solid fa-user-tie fa-2x"></i>
                                </div>
                                <div class="card-box">
                                    <p class="card-title mbr-fonts-style pt-3 mbr-white align-center">Employee</p>
                                    <div class="line-wrap2">
                                        <div class="line2"></div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        {{-- University Student --}}
                        <div class="col-12 col-md-5">
                            <a href="{{ route('display.registration') }}">
                                <div class="card-img pb-3">
                                    <i class="fa-solid fa-school fa-2x"></i>
                                </div>
                                <div class="card-box">
                                    <p class="card-title mbr-fonts-style pt-3 mbr-white align-center">University Student</p>
                                    <div class="line-wrap2">
                                        <div class="line2"></div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <p class="mbr-text mbr-fonts-style mbr-white mbr-normal align-center display-7">
                                Tamkeen Support
                            </p>
                        </div>
                    </div>
                </div>

                {{-- Expat --}}
                <div class="card p-3 col-12 col-md-6 col-lg-3 m-3">
                    <a href="{{ route('display.registration') }}">
                        <div class="card-img pb-3">
                            <span class="mbr-iconfont mbri-file"></span>
                        </div>
                        <div class="card-box">
                            <p class="card-title mbr-fonts-style pt-3 mbr-white align-center">Expat</p>
                            <div class="line-wrap2">
                                <div class="line2"></div>
                            </div>
                        </div>
                    </a>
                </div>
            </div>

            {{-- Tamkeen + MOL Portal --}}
            <div class="media-container-row justify-content-center">
                <div class=""></div>
                <div class="card p-3 col-12 col-md-10 col-lg-8 m-3 border rounded" style="max-width: 500px;">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <a href="https://services.tamkeen.bh/NeoTamkeenPortal/Login" target="__blank">
                                <div class="card-img p-3">
                                    <i class="fas fa-search fa-2x"></i>
                                </div>
                                <div class="card-box">
                                    <p class="card-title mbr-fonts-style pt-3 mbr-white align-center">Tamkeen Portal</p>
                                    <div class="line-wrap2">
                                        <div class="line2"></div>
                                    </div>
                                </div>
                            </a>
                        </div>
                        <div class="col-12 col-md-6">
                            <a href="https://jobs.mlsd.gov.bh/" target="__blank">
                                <div class="card-img pb-3">
                                    <i class="fa-solid fa-user-tie fa-2x"></i>
                                </div>
                                <div class="card-box">
                                    <p class="card-title mbr-fonts-style pt-3 mbr-white align-center">MOL Portal</p>
                                    <div class="line-wrap2">
                                        <div class="line2"></div>
                                    </div>
                                </div>
                            </a>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <p class="mbr-text mbr-fonts-style mbr-white mbr-normal align-center display-7">
                                Student Registration Links
                            </p>
                        </div>
                    </div>
                </div>
                {{-- Gap --}}
                <div class="card p-3 col-12 col-md-6 col-lg-3 m-3"></div>
            </div>

            {{-- Financial Facilities --}}
            <div class="media-container-row justify-content-center">
                <div class=""></div>
                <div class="card p-3 col-12 col-md-10 col-lg-8 m-3 border rounded" style="max-width: 500px;">
                    <div class="row">
                        <div class="col-12 col-md-6">
                            <a href="https://ilabank.com/" target="__blank">
                                <div class="card-img p-3">
                                    <i class="fa-brands fa-cc-visa fa-2x"></i>
                                </div>
                                <div class="card-box">
                                    <p class="card-title mbr-fonts-style pt-3 mbr-white align-center">Ila Bank</p>
                                    <div class="line-wrap2">
                                        <div class="line2"></div>
                                    </div>
                                </div>
                            </a>

                        </div>
                        <div class="col-12 col-md-6">
                            <a href="https://www.albaraka.bh/en-gb" target="_blank">
                                <div class="card-img pb-3">
                                    <i class="fa-brands fa-cc-visa fa-2x"></i>
                                </div>
                                <div class="card-box">
                                    <p class="card-title mbr-fonts-style pt-3 mbr-white align-center">Albaraka Bank</p>
                                </div>
                            </a>
                            <div class="line-wrap2">
                                <div class="line2"></div>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-12">
                            <p class="mbr-text mbr-fonts-style mbr-white mbr-normal align-center display-7">
                                Financial Facilities
                            </p>
                        </div>
                    </div>
                </div>

                {{-- Gap --}}
                <div class="card p-3 col-12 col-md-6 col-lg-3 m-3"></div>
            </div>

        </div>
    </section>
@endsection
