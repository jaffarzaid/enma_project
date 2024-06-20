@extends('frontend.master_index')

@section('dynamic')
<script src="{{ asset('JS/reenrollment_trainee_validation.js') }}"></script>
<div class="container-fluid">
    <div class="row justify-content-center">
        <div class=" col-md-8 col-lg-5" data-form-type="formoid">
            <form action="{{ route('store.old_trainee.data') }}" method="POST" class="mbr-form form-with-styler" enctype="multipart/form-data">
                @csrf
                {{-- Holding type of a trainee --}}
                <input type="hidden" name="trainee_type" value="{{ $trainee_type }}">

                <div class="dragArea row input-main">
                    <div class="col-md-12">
                        <h1
                            class="mbr-fonts-style mbr-fonts-style mbr-section-title text-primary align-center display-3 p-3">
                            New Training Request</h1>
                    </div>
                   
                    {{-- CPR --}}
                    <div class="col-md-12">
                        <h1 class="mbr-fonts-style mbr-fonts-style mbr-section-title text-primary display-7 p-3">
                            Trainee CPR <span style="color: red;"> *</span></h1>
                    </div>
                    <div class="col-md-12 form-group mb-3">
                        <input type="number" name="trainee_cpr" required class="form-control display-7">
                        @error('trainee_cpr')
                                <span style="color: red;">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Training Services --}}
                    <div class="col-md-12">
                        <h1 class="mbr-fonts-style mbr-fonts-style mbr-section-title text-primary display-7 p-3">
                            Training Services <span style="color: red;"> *</span></h1>
                    </div>
                    <div class="col-md-12 form-group mb-3">
                        <div class="col-md-12 form-group mb-3">
                            <div style="display: flex;">
                                <div class="form-check" style="margin-right: 10px;">
                                    <input type="radio" name="training_service_type" class="form-check-input m-1"
                                        id="tutorial_course" value="Tutorial Course">
                                    <label for="tutorial_course" class="form-check-label">Tutorial Course</label>
                                </div>
                                <div class="form-check" style="margin-right: 10px;">
                                    <input type="radio" name="training_service_type" class="form-check-input m-1"
                                        id="preparatory_course" value="Preparatory Course">
                                    <label for="preparatory_course" class="form-check-label">Preparatory
                                        Course</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" name="training_service_type" class="form-check-input m-1"
                                        id="examination" value="Examination">
                                    <label for="examination" class="form-check-label">Examination</label>
                                </div>
                            </div>
                            @error('training_service_type')
                                <span style="color: red;">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>

                    <div class="col-md-12 form-group mb-3">
                        <label for="lastname-form3-1p" class="form-control-label mbr-fonts-style display-8">Select a
                            Course <span style="color: red;"> *</span></label>
                        <select name="selected_course" class="form-control display-7" id="select-formbuilder-1t">
                            @if (isset($job_seeker_courses))
                                @foreach ($job_seeker_courses as $course)
                                    <option value="{{ $course->id }}">{{ $course->course_name }}</option>
                                @endforeach
                            @elseif(isset($employee_courses))
                                @foreach ($employee_courses as $course)
                                    <option value="{{ $course->id }}">{{ $course->course_name }}</option>
                                @endforeach
                            @elseif (isset($student_courses))
                                @foreach ($student_courses as $course)
                                    <option value="{{ $course->id }}">{{ $course->course_name }}</option>
                                @endforeach
                            @elseif (isset($expat_courses))
                                @foreach ($expat_courses as $course)
                                    <option value="{{ $course->id }}">{{ $course->course_name }}</option>
                                @endforeach
                            @endif
                        </select>
                        @error('selected_course')
                            <span style="color: red;">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Sponsership Information --}}
                    <div class="col-md-12">
                        <h1 class="mbr-fonts-style mbr-fonts-style mbr-section-title text-primary display-7 p-3">
                            Sponsership Information</h1>
                    </div>

                    <div class="col-md-12 form-group mb-3">
                        <label for="gender-form3-1p" class="form-control-label mbr-fonts-style display-8">Program
                            Sponsership <span style="color: red;"> *</span></label>
                        <div class="form-group">
                            <div class="form-check" style="margin-bottom: 10px;">
                                <input type="radio" value="Self" name="sponsorship_name"
                                    class="form-check-input" id="sponsership_value_self">
                                <label for="sponsership_value_self" class="form-check-label">Self</label>
                            </div>
                            <div class="form-check" style="margin-bottom: 10px;">
                                <input type="radio" value="Employer" name="sponsorship_name"
                                    class="form-check-input" id="sponsership_value_emp">
                                <label for="sponsership_value_emp" class="form-check-label">Employer</label>
                            </div>
                            <div class="form-check" style="margin-bottom: 10px;">
                                <input type="radio" value="Tamkeen" name="sponsorship_name"
                                    class="form-check-input" id="sponsorship_value_tmk">
                                <label for="sponsorship_value_tmk" class="form-check-label">Tamkeen</label>
                            </div>
                            <div class="form-check" style="display: flex; align-items: center;">
                                <input type="radio" value="Others" name="sponsorship_name"
                                    class="form-check-input" id="sponsership_value_others">
                                <label for="sponsership_value_others" class="form-check-label m-1"
                                    style="margin-right: 10px;">Others</label>
                                <input type="text" name="sponsorship_name" class="form-control"
                                    id="sponsership_other_input" style="width: 200px;" disabled>
                            </div>
                        </div>
                        @error('sponsorship_name')
                            <span style="color: red;">{{ $message }}</span>
                        @enderror
                    </div>


                    {{-- Declaration --}}
                    <div class="col-md-12">
                        <h1 class="mbr-fonts-style mbr-fonts-style mbr-section-title text-primary display-7 p-3">
                            Declaration <span style="color: red;"> *</span></h1>
                    </div>

                    <div class="form-check">
                        <input type="checkbox" name="declaration_1" class="form-check-input" id="dec_1"
                            required>
                        <label for="dec_1" class="form-check-label">
                            I confirm that the information that I have provided in this application is accurate, correct
                            and complete and that the
                            documents submitted along with this application form are genuine. I understand that
                            withholding any information
                            requested or giving false information may make me ineligible for enrollment, admission, or
                            compel my expulsion
                            from the institution.
                        </label>
                        @error('')
                        @enderror
                    </div>
                    <div class="form-check">
                        <input type="checkbox" name="declaration_2" class="form-check-input" id="dec_2"
                            required>
                        <label for="dec_2" class="form-check-label">
                            I, also, hereby acknowledge that I have read and understood the Enma Terms and Conditions
                            and Enma Code of Conduct in its entirety and agree to abide by them.
                        </label>
                    </div>

                    <div class="form-check">
                        <input type="checkbox" name="declaration_3" class="form-check-input" id="dec_3"
                            required>
                        <label for="dec_3" class="form-check-label">
                            I understand and agree that this declaration is final and irrevocable,
                            and that it is not subject to cancellation or amendments.
                        </label>
                    </div>


                    {{-- Signature --}}
                    <div class="col-md-12 mt-3">
                        <h1 class="mbr-fonts-style mbr-fonts-style mbr-section-title text-primary display-7 p-3">
                            Signature <span style="color: red;"> *</span></h1>
                    </div>
                    <div class="col-md-12 form-group mb-3">
                        <input type="text" name="stu_signature" required class="form-control display-7"
                            placeholder="Add Your Name">
                    </div>

                    <div class="input-group-btn col-md-12 text-center m-3">
                        <button type="submit" class="btn btn-form btn-primary display-4">SEND</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>



@endsection