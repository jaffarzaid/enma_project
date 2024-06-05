@extends('backend.master_admin')


@section('dynamic')
<span class="count_top"><i class="fa fa-home"></i> <span class="green"> / View Course Data</span></span>
    <br>
<div class="card mt-3">
    <div class="card-body">
        <form method="POST" action="{{ route('update.course', $current_course->id) }}">
            @csrf
            <div class="row">
                {{-- Awarding Body --}}
                <div class="col-md-4">
                    <label for="awarding_body" class="form-label">Awarding Body </label>
                    <input type="test" name="expiry_date" id="expiry_date" class="form-control" value="{{ $current_course->awarding_body }}" readonly>
                </div>

                {{-- Course Code --}}
                <div class="col-md-4">
                    <label for="course_code" class="form-label">Course Code <span class="text-danger"> *</span></label>
                    <input type="test" name="expiry_date" id="expiry_date" class="form-control" value="{{ $current_course->course_code }}" readonly>
                </div>

                {{-- Course Name --}}
                <div class="col-md-4">
                    <label for="course_name" class="form-label">Course Name <span class="text-danger"> *</span></label>
                    <input type="test" name="expiry_date" id="expiry_date" class="form-control" value="{{ $current_course->course_name }}" readonly>
                </div>

                {{-- License Code --}}
                <div class="col-md-4 mt-3">
                    <label for="license_code" class="form-label">License Code </label>
                    <input type="text" name="license_code" id="license_code" class="form-control" value="{{ $current_course->license_code }}" readonly>
                </div>

                {{-- Num of Hourses --}}
                <div class="col-md-4 mt-3">
                    <label for="num_of_hours" class="form-label">Number of Hours </label>
                    <input type="number" name="num_of_hours" id="num_of_hours" class="form-control" value="{{ $current_course->num_of_hours }}" readonly>
                </div>

                {{-- MOL Approval --}}
                <div class="col-md-4 mt-3">
                    <label for="mol_approval" class="form-label">MOL Approval </label>
                    <input type="text" name="mol_approval" id="mol_approval" value="Achieved" class="form-control" readonly value="{{ $current_course->mol_level }}" readonly>
                </div>

                {{-- Issue Date --}}
                <div class="col-md-4 mt-3">
                    <label for="issue_date" class="form-label">Issue Date </label>
                    <input type="date" name="issue_date" id="issue_date" class="form-control" value="{{ $current_course->issue_date }}" readonly>
                </div>

                {{-- Expiry Date --}}
                <div class="col-md-4 mt-3">
                    <label for="expiry_date" class="form-label">Expiry Date </label>
                    <input type="date"  id="expiry_date" class="form-control" value="{{ $current_course->expiry_date }}" readonly>
                </div>

                {{-- Trainer --}}
                <div class="col-md-4 mt-3">
                    <label for="trainer_name" class="form-label">Trainer Name </label>
                    <input type="test"  id="expiry_date" class="form-control" value="{{ $current_course->trainer_name }}" readonly>
                </div>

                {{-- Entered By --}}
                <div class="col-md-6 mt-3">
                    <label for="trainer_name" class="form-label">Entered By </label>
                    <input type="test" id="expiry_date" class="form-control" value="{{ $current_course->entered_by }}" readonly>
                </div>

                {{-- Edited By --}}
                <div class="col-md-6 mt-3">
                    <label for="trainer_name" class="form-label">Edited By </label>
                    <input type="test" id="expiry_date" class="form-control" value="{{ isset($current_course->edited_by) ? $current_course->edited_by : ''  }}" readonly>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection