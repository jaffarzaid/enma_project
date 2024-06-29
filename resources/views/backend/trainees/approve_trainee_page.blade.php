@extends('backend.master_admin')

@section('dynamic')
    <span class="count_top"><i class="fa fa-home"></i> <span class="green"> / Edit Trainee Data</span></span>
    <br>
    <div class="card mt-3">
        <div class="card-body">

            {{-- Personal Information Section --}}
            <h3 class="mb-3">Personal Information</h3>
            <div class="row">
                {{-- Trainee 1st Name --}}
                <div class="col-md-3">
                    <label for="trainee_f_name" class="form-label">First Name <span class="text-danger">
                            *</span></label>
                    <input type="text" name="trainee_f_name" id="trainee_f_name" class="form-control"
                        value="{{ $current_trainee->f_name }}" placeholder="Name" readonly>
                </div>

                {{-- Trainee 2nd Name --}}
                <div class="col-md-3">
                    <label for="trainee_s_name" class="form-label">Second Name <span class="text-danger">
                            *</span></label>
                    <input type="text" name="trainee_s_name" id="trainee_s_name" class="form-control"
                        value="{{ $current_trainee->s_name }}" placeholder="Add only digits!" readonly>
                </div>

                {{-- Trainee 3rd Name --}}
                <div class="col-md-3">
                    <label for="trainee_l_name" class="form-label">Last Name <span class="text-danger"> *</span></label>
                    <input type="text" name="trainee_l_name" id="trainee_l_name" class="form-control"
                        value="{{ $current_trainee->l_name }}" readonly>
                </div>

                {{-- Gender --}}
                <div class="col-md-3 mt-3">
                    <label for="trainee_gender" class="form-label">Gender <span class="text-danger">
                            *</span></label>
                    <div class="form-check">
                        <input type="radio" name="trainee_gender" class="form-check-input" value="Male"
                            id="nationality_male" {{ $current_trainee->gender == 'Male' ? 'checked' : '' }} disabled>
                        <label class="form-check-label" for="nationality_male">
                            Male
                        </label>
                    </div>
                    <div class="form-check">
                        <input type="radio" name="trainee_gender" class="form-check-input" value="Female"
                            id="nationality_female" {{ $current_trainee->gender == 'Female' ? 'checked' : '' }} disabled>
                        <label class="form-check-label" for="nationality_female">
                            Female
                        </label>
                    </div>
                </div>

                {{-- Trainee CPR --}}
                <div class="col-md-3 mt-3">
                    <label for="trainee_cpr" class="form-label">Trainee CPR <span class="text-danger"> *</span></label>
                    <input type="text" name="trainee_cpr" id="trainee_cpr" class="form-control"
                        value="{{ $current_trainee->cpr }}" readonly>
                </div>

                {{-- Nationality --}}
                <div class="col-md-3 mt-3">
                    <label for="nationality" class="form-control-label mbr-fonts-style display-8">Nationality <span
                            style="color: red;"> *</span></label>
                    <input type="text" name="trainee_cpr" id="trainee_cpr" class="form-control"
                        value="{{ $current_trainee->nationality }}" readonly>
                </div>

                {{-- Phone 1 --}}
                <div class="col-md-3 mt-3">
                    <label for="phone_1" class="form-label">Phone 1 <span class="text-danger"> *</span></label>
                    <input type="number" name="phone_1" id="phone_1" class="form-control"
                        value="{{ $current_trainee->phone1 }}" readonly>
                </div>

                {{-- Phone 2 --}}
                <div class="col-md-3 mt-3">
                    <label for="phone_2" class="form-label">Phone 2 <span class="text-danger"> *</span></label>
                    <input type="number" name="phone_2" id="phone_2" class="form-control"
                        value="{{ $current_trainee->phone2 }}" readonly>
                </div>

                {{-- Birthday --}}
                <div class="col-md-4 mt-3">
                    <label for="birthday" class="form-label">Birthday <span class="text-danger"> *</span></label>
                    <input type="date" name="birthday" id="birthday" class="form-control"
                        value="{{ $current_trainee->birthday }}" readonly>
                </div>

                {{-- Address --}}
                <div class="col-md-4 mt-3">
                    <label for="address" class="form-label">Address <span class="text-danger"> *</span></label>
                    <input type="text" name="address" id="address" class="form-control"
                        value="{{ $current_trainee->address }}" readonly>
                </div>

                {{-- Email --}}
                <div class="col-md-4 mt-3">
                    <label for="email" class="form-label">Email <span class="text-danger"> *</span></label>
                    <input type="email" name="email" id="email" class="form-control"
                        value="{{ $current_trainee->email }}" readonly>
                </div>

                {{-- Emergency Contact Name --}}
                <div class="col-md-4 mt-3">
                    <label for="emergency_name" class="form-label">Emergency Contact Name <span class="text-danger">
                            *</span></label>
                    <input type="text" name="emergency_name" id="emergency_name" class="form-control"
                        value="{{ $current_trainee->emergency_name }}" readonly>
                </div>

                {{-- Emergency Contact Relationship --}}
                <div class="col-md-4 mt-3">
                    <label for="emergency_relationship" class="form-label">Emergency Contact Relationship <span
                            class="text-danger"> *</span></label>
                    <input type="text" name="emergency_relationship" id="emergency_relationship" class="form-control"
                        value="{{ $current_trainee->emergency_relationship }}" readonly>
                </div>

                {{-- Emergency Contact Phone --}}
                <div class="col-md-4 mt-3">
                    <label for="emergency_phone" class="form-label">Emergency Contact Phone <span class="text-danger">
                            *</span></label>
                    <input type="number" name="emergency_phone" id="emergency_phone" class="form-control"
                        value="{{ $current_trainee->emergency_phone }}" readonly>
                </div>

                {{-- CPR --}}
                {{-- <div class="col-md-6 mt-3">
                        <label for="cpr_file" class="form-label">CPR File</label>
                        <input type="file" name="cpr_file" id="cpr_file" class="form-control">
                        @error('cpr_file')
                            <span style="color: red;">{{ $message }}</span>
                        @enderror
                    </div> --}}

                {{-- Passport --}}
                {{-- <div class="col-md-6 mt-3">
                        <label for="passport_file" class="form-label">Passport File</label>
                        <input type="file" name="passport_file" id="passport_file" class="form-control">
                        @error('passport_file')
                            <span style="color: red;">{{ $message }}</span>
                        @enderror
                    </div> --}}
            </div>

            {{-- Academic Qualification --}}
            <div class="mt-5"></div>
            <h3 class="mb-3">Academic Qualification</h3>
            <div class="row">
                {{-- Qualification --}}
                <div class="col-md-3 mt-3">
                    <label for="trainee_qualification" class="form-control-label mbr-fonts-style display-8">Qualification
                        <span style="color: red;">
                            *</span></label>
                    <input type="text" name="emergency_phone" id="emergency_phone" class="form-control"
                        value="{{ $current_trainee->qualification }}" readonly>
                </div>

                {{-- Specialization --}}
                <div class="col-md-3 mt-3">
                    <label for="trainee_specialization"
                        class="form-control-label mbr-fonts-style display-8">Specialization <span style="color: red;">
                            *</span></label>
                    <input type="text" name="emergency_phone" id="emergency_phone" class="form-control"
                        value="{{ $current_trainee->specialization }}" readonly>
                </div>

                {{-- GPA --}}
                <div class="col-md-3 mt-3">
                    <label for="gpa" class="form-label">GPA <span class="text-danger"> *</span></label>
                    <input type="number" name="gpa" id="gpa" class="form-control"
                        value="{{ $current_trainee->gpa }}" step="0.01" readonly>
                </div>

                {{-- Language of Instruction --}}
                <div class="col-md-3 mt-3">
                    <label for="instruction_lang" class="form-label">Language of Instruction<span class="text-danger">
                            *</span></label>
                    <div style="display: flex;">
                        <div data-for="male" class="form-check" style="margin-right: 10px;">
                            <input type="radio" value="Arabic" name="instruction_lang" class="form-check-input"
                                id="arabic" required
                                {{ $current_trainee->instruction_language == 'Arabic' ? 'checked' : '' }} disabled>
                            <label for="arabic" class="form-check-label">Arabic</label>
                        </div>
                        <div data-for="female" class="form-check">
                            <input type="radio" value="English" name="instruction_lang" class="form-check-input"
                                id="english" {{ $current_trainee->instruction_language == 'English' ? 'checked' : '' }}
                                disabled>
                            <label for="english" class="form-check-label">English</label>
                        </div>
                        <div data-for="female" class="form-check">
                            <input type="radio" value="Bilingual" name="instruction_lang" class="form-check-input"
                                id="bilingual">
                            <label for="bilingual" class="form-check-label">Bilingual</label disabled>
                        </div>
                    </div>
                    @error('instruction_lang')
                        <span style="color: red;">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Education Certificates --}}
                {{-- <div class="col-md-6 mt-3">
                        <label for="education_certificate_file" class="form-label">Education Certificates</label>
                        <input type="file" name="education_certificate_file" id="education_certificate_file"
                            class="form-control">
                        @error('education_certificate_file')
                            <span style="color: red;">{{ $message }}</span>
                        @enderror
                    </div> --}}

                {{-- Education Transcript --}}
                {{-- <div class="col-md-6 mt-3">
                        <label for="education_transcripts_file" class="form-label">Education Transcripts</label>
                        <input type="file" name="education_transcripts_file" id="education_transcripts_file"
                            class="form-control">
                        @error('education_transcripts_file')
                            <span style="color: red;">{{ $message }}</span>
                        @enderror
                    </div> --}}

                {{-- Studying Status --}}
                <div class="col-md-6 mt-3">
                    <label for="instruction_lang" class="form-label">Studying Status<span class="text-danger">
                            *</span></label>
                    <div style="display: flex;">
                        <div data-for="male" class="form-check" style="margin-right: 10px;">
                            <input type="radio" name="study_status" value="Yes" class="form-check-input"
                                id="arabic" required {{ $current_trainee->studying_status == 'Yes' ? 'checked' : '' }}
                                disabled>
                            <label class="form-check-label">Yes</label>
                        </div>
                        <div data-for="female" class="form-check">
                            <input type="radio" name="study_status" value="No" class="form-check-input"
                                id="english" {{ $current_trainee->studying_status == 'No' ? 'checked' : '' }} disabled>
                            <label class="form-check-label">No</label>
                        </div>
                    </div>
                </div>


                {{-- Specification of study --}}
                <div class="col-md-6 mt-3">
                    <label for="study_status_specification" class="form-label">Studying Status Specification</label>
                    <input type="text" name="study_status_specification" id="study_status_specification"
                        class="form-control" value="{{ $current_trainee->study_status_specification }}" readonly>
                    @error('study_status_specification')
                        <span style="color: red;">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            {{-- Professional Certificates --}}
            <div class="mt-5"></div>
            <h3 class="mb-3">Professional Certificates</h3>
            <div class="row">
                {{-- Professional Certificate Name --}}
                <div class="col-md-3 mt-3">
                    <label for="pro_certificate_name" class="form-label">Professional Certificate Name</label>
                    <input type="text" name="pro_certificate_name" id="pro_certificate_name" class="form-control"
                        value="{{ $current_trainee->pro_certificate_name }}" readonly>
                </div>

                {{-- Professional Certificate Specialization --}}
                <div class="col-md-3 mt-3">
                    <label for="pro_certificate_specialization" class="form-label">Professional Certificate
                        Specialization</label>
                    <input type="text" name="pro_certificate_specialization" id="pro_certificate_specialization"
                        class="form-control" value="{{ $current_trainee->pro_certificate_specialization }}" readonly>
                </div>

                {{-- Awarding Body --}}
                <div class="col-md-3 mt-3">
                    <label for="pro_awarding_body" class="form-label">Awarding Body</label>
                    <input type="text" name="pro_awarding_body" id="pro_awarding_body" class="form-control"
                        value="{{ $current_trainee->pro_awarding_body }}" readonly>
                </div>

                {{-- Year --}}
                <div class="col-md-3 mt-3">
                    <label for="pro_year" class="form-label">Year</label>
                    <input type="number" name="pro_year" id="pro_year" class="form-control"
                        value="{{ $current_trainee->pro_year }}" readonly>
                </div>
            </div>

            {{-- Experience --}}
            <div class="mt-5"></div>
            <h3 class="mb-3">Experience</h3>
            <div class="row">
                {{-- Job Title --}}
                <div class="col-md-3 mt-3">
                    <label for="job_title" class="form-label">Job Title</label>
                    <input type="text" name="job_title" id="job_title" class="form-control"
                        value="{{ $current_trainee->job_title }}" readonly>
                </div>

                {{-- Job Nature --}}
                <div class="col-md-3 mt-3">
                    <label for="job_nature" class="form-label">Job Nature</label>
                    <input type="text" name="job_nature" id="job_nature" class="form-control"
                        value="{{ $current_trainee->job_nature }}" readonly>
                </div>

                {{-- Employer --}}
                <div class="col-md-3 mt-3">
                    <label for="employer" class="form-label">Employer</label>
                    <input type="text" name="employer" id="employer" class="form-control"
                        value="{{ $current_trainee->employer }}" readonly>
                </div>

                {{-- Experience --}}
                <div class="col-md-3 mt-3">
                    <label for="num_of_experience" class="form-label">Number of Experience</label>
                    <input type="number" name="num_of_experience" id="num_of_experience" class="form-control"
                        value="{{ $current_trainee->num_of_experience }}" readonly>
                </div>
            </div>

            {{-- Health & Safety Information --}}
            <div class="mt-5"></div>
            <h3 class="mb-3">Health & Safety Information</h3>
            <div class="row">
                {{-- Didability / Injury --}}
                <div class="col-md-6 mt-3">
                    <label for="studying_status" class="form-label">Has the trainee any significant injury,
                        disability, and/or medical
                        conditions?<span class="text-danger"> *</span></label>
                    <div style="display: flex;">
                        <div class="form-check" style="margin-right: 10px;">
                            <input type="radio" value="Yes" name="health_injury_disability"
                                class="form-check-input" id="studying_status_yes" required
                                {{ $current_trainee->health_injury_disability == 1 ? 'checked' : '' }} disabled>
                            <label for="health_injury_disability_yes" class="form-check-label">yes</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" value="No" name="health_injury_disability"
                                class="form-check-input" id="studying_status_no"
                                {{ $current_trainee->health_injury_disability == 0 ? 'checked' : '' }} disabled>
                            <label for="health_injury_disability_no" class="form-check-label">No</label>
                        </div>
                    </div>
                    @error('health_injury_disability')
                        <span style="color: red;">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Request Help --}}
                <div class="col-md-6 mt-3">
                    <label for="studying_status" class="form-label">Does the trainee need help to exit the
                        building?<span class="text-danger"> *</span></label>
                    <div style="display: flex;">
                        <div class="form-check" style="margin-right: 10px;">
                            <input type="radio" value="Yes" name="studying_status" class="form-check-input"
                                id="studying_status_yes" required
                                {{ $current_trainee->request_help == 1 ? 'checked' : '' }} disabled>
                            <label for="studying_status_yes" class="form-check-label">yes</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" value="No" name="studying_status" class="form-check-input"
                                id="studying_status_no" {{ $current_trainee->request_help == 0 ? 'checked' : '' }}
                                disabled>
                            <label for="studying_status_no" class="form-check-label">No</label>
                        </div>
                    </div>
                    @error('studying_status')
                        <span style="color: red;">{{ $message }}</span>
                    @enderror
                </div>
            </div>

            {{-- Training Service --}}
            <div class="mt-5"></div>
            <h3 class="mb-3">Training Services</h3>
            <div class="row">
                {{-- Training Service Type --}}
                <div class="col-md-4 mt-3">
                    <label class="form-label">Selected Service<span class="text-danger"> *</span></label>
                    <div style="display: flex; align-items: center;">
                        <div class="form-check" style="margin-right: 10px;">
                            <input type="radio" name="training_service_type" class="form-check-input"
                                id="tutorial_course" value="Tutorial Course"
                                @if ($latestCourse && $latestCourse->training_service === 'Tutorial Course') checked @endif
                                disabled>
                            <label for="tutorial_course" class="form-check-label">Tutorial Course</label>
                        </div>
                        <div class="form-check" style="margin-right: 10px;">
                            <input type="radio" name="training_service_type" class="form-check-input"
                                id="preparatory_course" value="Preparatory Course"
                                @if ($latestCourse && $latestCourse->training_service === 'Preparatory Course') checked @endif
                                disabled>
                            <label for="preparatory_course" class="form-check-label">Preparatory Course</label>
                        </div>
                        <div class="form-check">
                            <input type="radio" name="training_service_type" class="form-check-input" id="examination"
                                value="Examination"
                                @if ($latestCourse && $latestCourse->training_service === 'Examination') checked @endif
                                disabled>
                            <label for="examination" class="form-check-label">Examination</label>
                        </div>
                    </div>
                </div>

                {{-- Course Name --}}
                <div class="col-md-4 mt-3">
                    <label class="form-label">Selected Course<span class="text-danger"> *</span></label>
                    <input type="text" name="selected_course" class="form-control" id="selected_course"
                        value="{{ $selectedCourse ?? '' }}" readonly>
                </div>

                {{-- Program Sponsership --}}
                <div class="col-md-4 mt-3">
                    <label class="form-label">Program Sponsorship<span class="text-danger"> *</span></label>
                    <input type="text" name="selected_course" class="form-control" id="selected_course"
                        value="{{ $sponsorship }}" readonly>
                </div>

                <div class="col-md-6 mt-3">
                    <form method="POST" action="{{ route('reject.trainee', $current_trainee->id) }}">
                        @csrf
                        {{-- Reason for Rejection --}}
                        <div class="col-md-12 mt-3">
                            <label for="trainee_gender" class="form-label">Reason for Rejection</label>
                            <div class="form-check">
                                <input type="radio" name="rejection_reason" class="form-check-input" id="r_1"
                                    value="No Proper Educational Qualification">
                                <label class="form-check-label" for="r_1">
                                    No Proper Educational Qualification
                                </label>
                            </div>
                            <div class="form-check">
                                <input type="radio" name="rejection_reason" class="form-check-input" id="r_2"
                                    value="No Relevant Work Experience">
                                <label class="form-check-label" for="r_2">
                                    No Relevant Work Experience
                                </label>
                            </div>
                            <div class="form-check">
                                <input type="radio" name="rejection_reason" class="form-check-input" id="r_3"
                                    value="Low Level English Proficiency">
                                <label class="form-check-label" for="r_3">
                                    Low Level English Proficiency
                                </label>
                            </div>
                            <div class="form-check">
                                <input type="radio" name="rejection_reason" class="form-check-input" id="r_4"
                                    value="Low Score on Pre-Assessment Test">
                                <label class="form-check-label" for="r_4">
                                    Low Score on Pre-Assessment Test
                                </label>
                            </div>
                            <div class="form-check">
                                <input type="radio" name="rejection_reason" class="form-check-input" id="r_5"
                                    value="Others">
                                <label class="form-check-label" for="r_5">
                                    Others
                                </label>
                            </div>
                        </div>

                        {{-- Note --}}
                        <div class="col-md-12 mt-3">
                            <label class="form-label" for="note">Note</label>
                            <textarea id="note" class="form-control" name="note"></textarea>
                        </div>

                        <div class="col-md-12 mt-3 text-center">
                            <button type="submit" class="btn btn-danger">Decline</button>
                        </div>
                    </form>
                </div>

                {{-- Approve Form --}}
                <div class="col-md-6 mt-3">
                    <form method="POST" action="{{ route('approve.trainee', $current_trainee->id) }}">
                        @csrf
                        <div class="col-md-12 mt-3">

                        </div>
                        <div class="col-md-12 mt-3 text-center">
                            <button type="submit" class="btn btn-success">Approve</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
