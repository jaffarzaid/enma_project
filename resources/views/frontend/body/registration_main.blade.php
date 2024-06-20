@extends('frontend.master_index')

@section('dynamic')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12 m-5">
            <h2 class="mbr-section-title pb-2 mbr-bold mbr-fonts-style align-center display-2 text-primary">
                Trainee Registration 
            </h2>
            <div class="line-wrap">
                <div class="line"></div>
            </div>
        </div>
    </div>
    <div class="row row-content justify-content-center">
        <div class="card p-3 col-12 col-md-6 col-lg-3">
            <div class="card-wrapper">
                <div class="card-img">
                    <img src="{{ asset('frontend/assets/images/03.jpg') }}" title="">
                    <div class="image-btn">
                        @if ($trainee_type == 'Job Seeker')
                            <a href="{{ route('display.job_seeker.registration') }}" class="btn btn-primary">First Time Registration</a>
                        @elseif ($trainee_type == 'Employee')
                            <a href="{{ route('display.employee.registration') }}" class="btn btn-primary">First Time Registration</a>
                        @else
                            <a href="{{ route('display.student.registration') }}" class="btn btn-primary">First Time Registration</a>
                        @endif
                    </div>
                </div>
            </div>
        </div>

        <div class="card p-3 col-12 col-md-6 col-lg-3">
            <div class="card-wrapper">
                <div class="card-img">
                    <img src="{{ asset('frontend/assets/images/09.jpg') }}" title="">
                    <div class="image-btn">
                        @if ($trainee_type == 'Job Seeker')
                            <a href="{{ route('job_seeker_reenrollment') }}" class="btn btn-primary">Current Trainee Registration</a>
                        @elseif ($trainee_type == 'Employee')
                            <a href="{{ route('employee.reenrollment') }}" class="btn btn-primary">Current Trainee Registration</a>
                        @else
                            <a href="{{ route('univ_stu.reenrollment') }}" class="btn btn-primary">Current Trainee Registration</a>
                        @endif
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection