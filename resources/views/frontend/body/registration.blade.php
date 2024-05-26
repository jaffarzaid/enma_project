@extends('frontend.master_index')

@section('dynamic')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class=" col-md-8 col-lg-5" data-form-type="formoid">
                <form action="{{ route('store.student.data') }}" method="POST" class="mbr-form form-with-styler">
                    @csrf
                    <div class="dragArea row input-main">
                        <div class="col-md-12">
                            <h1 class="mbr-fonts-style mbr-fonts-style mbr-section-title align-center display-3 p-3">
                                Registration Form</h1>
                        </div>

                        {{-- Personal Information --}}
                        <div class="col-md-12">
                            <h1 class="mbr-fonts-style mbr-fonts-style mbr-section-title  display-7 p-3">Personal
                                Information</h1>
                        </div>

                        {{-- 1st Name --}}
                        <div class="col-md-4 form-group mb-3" data-for="firstname">
                            <label for="firstname-form3-1p" class="form-control-label mbr-fonts-style display-8">First Name
                                <span style="color: red;"> *</span></label>
                            <input type="text" name="first_name" data-form-field="First Name"
                                class="form-control display-7" id="firstname-form3-1p">
                            @error('first_name')
                                <span style="color: red;">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- 2nd Name --}}
                        <div data-for="secondname" class="col-md-4 form-group mb-3">
                            <label for="lastname-form3-1p" class="form-control-label mbr-fonts-style display-8">Second Name
                                <span style="color: red;"> *</span></label>
                            <input type="text" name="second_name" class="form-control display-7"
                                id="secondname-form3-1p">
                            @error('second_name')
                                <span style="color: red;">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Last Name --}}
                        <div data-for="lastname" class="col-md-4 form-group mb-3">
                            <label for="lastname-form3-1p" class="form-control-label mbr-fonts-style display-8">Last Name
                                <span style="color: red;"> *</span></label>
                            <input type="text" name="last_name" class="form-control display-7" id="lastname-form3-1p">
                            @error('last_name')
                                <span style="color: red;">{{ $message }}</span>
                            @enderror
                        </div>


                        {{-- Nationality --}}
                        <div data-for="phone" class="col-md-4 form-group mb-3">
                            <label for="phone-form3-1p" class="form-control-label mbr-fonts-style display-8">Nationality
                                <span style="color: red;"> *</span></label>
                            <select name="nationality" class="form-control display-7" id="select-formbuilder-1t" >
                                <option value="Bahraini">Bahraini</option>
                                <option value="Kuwaiti">Kuwaiti</option>
                                <option value="Omani">Omani</option>
                                <option value="Qatari">Qatari</option>
                                <option value="Saudi">Saudi</option>
                                <option value="Emirati">Emirati</option>
                                <option value="Others">Others</option>
                            </select>
                            @error('nationality')
                                <span style="color: red;">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- CPR --}}
                        <div class="col-md-4 form-group mb-3">
                            <label for="cpr_value" class="form-control-label mbr-fonts-style display-8">CPR <span
                                    style="color: red;"> *</span></label>
                            <input type="number" name="cpr" class="form-control display-7" id="cpr_value">
                            @error('cpr')
                                <span style="color: red;">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Gender --}}
                        <div data-for="gender" class="col-md-4 form-group mb-3">
                            <label for="gender-form3-1p" class="form-control-label mbr-fonts-style display-8">Gender <span
                                    style="color: red;"> *</span></label>
                            <div style="display: flex;">
                                <div data-for="male" class="form-check" style="margin-right: 10px;">
                                    <input type="radio" value="Male" name="gender" class="form-check-input" id="male">
                                    <label for="male-formbuilder-1r" class="form-check-label">Male</label>
                                </div>
                                <div data-for="female" class="form-check">
                                    <input type="radio" value="Female" name="gender" class="form-check-input" id="female">
                                    <label for="female-formbuilder-1r" class="form-check-label">Female</label>
                                </div>
                            </div>
                            @error('gender')
                                <span style="color: red;">{{ $message }}</span>
                            @enderror
                        </div>

                        
                        {{-- Phone 1 --}}
                        <div class="col-md-6 form-group mb-3">
                            <label for="phone_1" class="form-control-label mbr-fonts-style display-8">Phone 1 <span style="color: red;"> *</span></label>
                            <input type="number" name="phone_1" class="form-control display-7" id="phone_1">
                            @error('phone_1')
                                <span style="color: red;">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Phone 2 --}}
                        <div class="col-md-6 form-group mb-3">
                            <label for="phone_2p" class="form-control-label mbr-fonts-style display-8">Phone 2
                                <span style="color: red;"> *</span></label>
                            <input type="number" name="phone_2" class="form-control display-7" id="phone_2">
                            @error('phone_2')
                                <span style="color: red;">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Birthday --}}
                        <div class="col-md-4 form-group mb-3">
                            <label for="birthday_date" class="form-control-label mbr-fonts-style display-8">Birthday
                                <span style="color: red;"> *</span></label>
                            <input type="date" name="birthday_date" class="form-control display-7" id="birthday_date">
                            @error('birthday_date')
                                <span style="color: red;">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Home Address --}}
                        <div class="col-md-4 form-group mb-3">
                            <label for="home_address" class="form-control-label mbr-fonts-style display-8">Home
                                Address <span style="color: red;"> *</span></label>
                            <input type="text" name="home_address" class="form-control display-7" id="home_address">
                            @error('home_address')
                                <span style="color: red;">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Email --}}
                        <div class="col-md-4 form-group mb-3">
                            <label for="student_email" class="form-control-label mbr-fonts-style display-8">Email
                                <span style="color: red;"> *</span></label>
                            <input type="email" name="student_email" class="form-control display-7" id="student_email"
                                pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}">
                            @error('student_email')
                                <span style="color: red;">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Emergency Name --}}
                        <div class="col-md-4 form-group mb-3">
                            <label for="emergency_name" class="form-control-label mbr-fonts-style display-8">Emergency
                                Contact Name <span style="color: red;"> *</span></label>
                            <input type="text" name="emergency_name" class="form-control display-7" id="emergency_name">
                            @error('emergency_name')
                                <span style="color: red;">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Relationship --}}
                        <div class="col-md-4 form-group mb-3">
                            <label for="emr_relationship" class="form-control-label mbr-fonts-style display-8">Relationship 
                                <span style="color: red;"> *</span></label>
                            <input type="text" name="emr_relationship" class="form-control display-7" id="emr_relationship">
                            @error('emr_relationship')
                                <span style="color: red;">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Emergency Contact --}}
                        <div class="col-md-4 form-group mb-3">
                            <label for="emr_phone" class="form-control-label mbr-fonts-style display-8">Emergency
                                Phone <span style="color: red;"> *</span></label>
                            <input type="number" name="emr_phone" class="form-control display-7" id="emr_phone">
                            @error('emr_phone')
                                <span style="color: red;">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- CPR File --}}
                        <div class="col-md-6 form-group mb-3">
                            <label for="cpr_file" class="form-control-label mbr-fonts-style display-8">Upload CPR
                                File <span style="color: red;"> *</span></label>
                            <input type="file" name="cpr_file" class="form-control display-7" id="cpr_file">
                            @error('cpr_file')
                                <span style="color: red;">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Passport File --}}
                        <div class="col-md-6 form-group mb-3">
                            <label for="passport_file" class="form-control-label mbr-fonts-style display-8">Upload
                                Passport File <span style="color: red;"> *</span></label>
                            <input type="file" name="passport_file" class="form-control display-7" id="passport_file">
                            @error('passport_file')
                                <span style="color: red;">{{ $message }}</span>
                            @enderror
                        </div>


                        {{-- Personal Information --}}
                        <div class="col-md-12">
                            <h1 class="mbr-fonts-style mbr-fonts-style mbr-section-title  display-7 p-3">Academic
                                Qualification</h1>
                        </div>

                        {{-- Academic Qualification --}}
                        <div class="col-md-4 form-group mb-3">
                            <label for="qualification"
                                class="form-control-label mbr-fonts-style display-8">Qualification <span
                                    style="color: red;"> *</span></label>
                            <select name="qualification" class="form-control display-7"
                                id="select-formbuilder-1t">
                                <option value="PhD">PhD</option>
                                <option value="Master">Master</option>
                                <option value="Bachelor">Bachelor</option>
                                <option value="Associate">Associate</option>
                            </select>
                            @error('qualification')
                                <span style="color: red;">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Specialization --}}
                        <div class="col-md-4 form-group mb-3">
                            <label for="specialization"
                                class="form-control-label mbr-fonts-style display-8">Specialization <span
                                    style="color: red;"> *</span></label>
                            <select name="specialization" class="form-control display-7" id="specialization">
                                <option value="PhD">Business</option>
                                <option value="Master">Engineering</option>
                                <option value="Bachelor">Others</option>
                            </select>
                            @error('specialization')
                                <span style="color: red;">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- GPA --}}
                        <div class="col-md-4 form-group mb-3">
                            <label for="student_gpa" class="form-control-label mbr-fonts-style display-8">GPA <span
                                    style="color: red;"> *</span></label>
                            <input type="number" name="student_gpa" class="form-control display-7" id="student_gpa" step="0.01">
                            @error('student_gpa')
                                <span style="color: red;">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Language of Instruction --}}
                        <div class="col-md-4 form-group mb-3">
                            <label for="gender-form3-1p" class="form-control-label mbr-fonts-style display-8">Language of
                                Instruction <span style="color: red;"> *</span></label>
                            <div style="display: flex;">
                                <div data-for="male" class="form-check" style="margin-right: 10px;">
                                    <input type="radio" value="Arabic" name="instruction_lang" class="form-check-input" id="male">
                                    <label for="male-formbuilder-1r" class="form-check-label">Arabic</label>
                                </div>
                                <div data-for="female" class="form-check">
                                    <input type="radio" value="English" name="instruction_lang" class="form-check-input" id="female">
                                    <label for="female-formbuilder-1r" class="form-check-label">English</label>
                                </div>
                                <div data-for="female" class="form-check">
                                    <input type="radio" value="Bilingual" name="instruction_lang" class="form-check-input" id="female">
                                    <label for="female-formbuilder-1r" class="form-check-label">Bilingual</label>
                                </div>
                            </div>
                            @error('instruction_lang')
                                <span style="color: red;">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Educational Certificate --}}
                        <div class="col-md-4 form-group mb-3">
                            <label for="edu_certificate" class="form-control-label mbr-fonts-style display-8">Upload
                                Educational Certificate <span style="color: red;"> *</span></label>
                            <input type="file" name="edu_certificate" class="form-control display-7" id="edu_certificate">
                            @error('edu_certificate')
                                <span style="color: red;">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Transcript --}}
                        <div class="col-md-4 form-group mb-3">
                            <label for="edu_transcripts" class="form-control-label mbr-fonts-style display-8">Upload
                                Transcripts <span style="color: red;"> *</span></label>
                            <input type="file" name="edu_transcripts" class="form-control display-7" id="edu_transcripts">
                            @error('edu_transcripts')
                                <span style="color: red;">{{ $message }}</span>
                            @enderror
                        </div>

                        {{-- Professoinal Certification --}}
                        <div class="col-md-12">
                            <h1 class="mbr-fonts-style mbr-fonts-style mbr-section-title  display-7 p-3">Professoinal Certification</h1>
                        </div>

                        {{-- Certification Name --}}
                        <div class="col-md-3 form-group mb-3">
                            <label for="pro_cer_name" class="form-control-label mbr-fonts-style display-8">Cetification Name</label>
                            <input type="text" name="pro_cer_name" class="form-control" id="pro_cer_name" placeholder="AWS AI & Machine Learning">
                        </div>

                        {{-- Certification Specialization --}}
                        <div class="col-md-3 form-group mb-3">
                            <label for="pro_cer_spec" class="form-control-label mbr-fonts-style display-8">Specialization</label>
                            <input type="text" name="pro_cer_spec" class="form-control" id="pro_cer_spec" placeholder="Artificial Intellegence">
                        </div>

                        {{-- Awarding Body --}}
                        <div class="col-md-3 form-group mb-3">
                            <label for="pro_cer_awbd" class="form-control-label mbr-fonts-style display-8">Awarding Body</label>
                            <input type="text" name="pro_cer_awbd" class="form-control" id="pro_cer_awbd" placeholder="AIE">
                        </div>

                        {{-- Year --}}
                        <div class="col-md-3 form-group mb-3">
                            <label for="pro_cer_year" class="form-control-label mbr-fonts-style display-8">Year </label>
                            <input type="number" name="pro_cer_year" class="form-control" id="pro_cer_year" placeholder="2020">
                        </div>


                        {{-- Experience --}}
                        <div class="col-md-12">
                            <h1 class="mbr-fonts-style mbr-fonts-style mbr-section-title  display-7 p-3">Work Experience</h1>
                        </div>

                        {{-- Job Title --}}
                        <div class="col-md-3 form-group mb-3">
                            <label for="stu_job_title" class="form-control-label mbr-fonts-style display-8">Job Title </label>
                            <input type="text" name="stu_job_title" class="form-control" id="stu_job_title" placeholder="Manager">
                        </div>

                        {{-- Job Nature --}}
                        <div class="col-md-3 form-group mb-3">
                            <label for="stu_job_natu" class="form-control-label mbr-fonts-style display-8">Job Title</label>
                            <input type="text" name="stu_job_natu" class="form-control" id="stu_job_natu" placeholder="Accounts">
                        </div>

                        {{-- Employer --}}
                        <div class="col-md-3 form-group mb-3">
                            <label for="employer" class="form-control-label mbr-fonts-style display-8">Employer </label>
                            <input type="text" name="employer" class="form-control" id="employer" placeholder="Ministry of Labor">
                        </div>

                        {{-- Num of Experience --}}
                        <div class="col-md-3 form-group mb-3">
                            <label for="num_experience" class="form-control-label mbr-fonts-style display-8">No. of Experience </label>
                            <input type="number" name="num_experience" class="form-control" id="num_experience" placeholder="3">
                        </div>


                        {{-- Health & Safety Information --}}
                        <div class="col-md-12">
                            <h1 class="mbr-fonts-style mbr-fonts-style mbr-section-title  display-7 p-3">Health & Safety Information</h1>
                        </div>

                        <div class="col-md-6 form-group mb-3">
                            <label for="stu_injury_status" class="form-control-label mbr-fonts-style display-8">Do you have any
                                significant injury, disability, and/or medical conditions? <span
                                    style="color: red;">*</span></label>
                            <div style="display: flex;">
                                <div class="form-check" style="margin-right: 10px;">
                                    <input type="radio" value="Yes" name="stu_injury_status" class="form-check-input" id="stu_injury_status" required onclick="toggleFileUpload()">
                                    <label for="stu_injury_status_yes" class="form-check-label" id="stu_injury_status_yes">Yes</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" value="No" name="stu_injury_status" class="form-check-input"
                                        id="stu_injury_status" required onclick="toggleFileUpload()">
                                    <label for="stu_injury_status_no" class="form-check-label" id="stu_injury_status_no">No</label>
                                </div>
                            </div>
                            @error('stu_injury_status')
                                <span style="color: red;">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-6 form-group mb-3">
                            <label for="emergency_exit" class="form-control-label mbr-fonts-style display-8">In the event
                                of an emergency, do you need help to exit the building? <span
                                    style="color: red;">*</span></label>
                            <div style="display: flex;">
                                <div class="form-check" style="margin-right: 10px;">
                                    <input type="radio" value="Yes" name="emergency_exit" class="form-check-input"
                                        id="emergency_exit_yes" required onclick="toggleFileUpload()">
                                    <label for="emergency_exit_yes" class="form-check-label">Yes</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" value="No" name="emergency_exit" class="form-check-input"
                                        id="emergency_exit_no" required onclick="toggleFileUpload()">
                                    <label for="emergency_exit_no" class="form-check-label">No</label>
                                </div>
                            </div>
                            @error('emergency_exit')
                                <span style="color: red;">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="col-md-6 form-group mb-3" id="file_upload_field" style="display: none;">
                            <label for="file_upload" class="form-control-label mbr-fonts-style display-8">Upload File
                                <span style="color: red;">*</span></label>
                            <input type="file" name="health_injury_disability_file" id="file_upload">
                            @error('health_injury_disability_file')
                                <span style="color: red;">{{ $message }}</span>
                            @enderror
                        </div>


                        {{-- Program of Interest --}}
                        <div class="col-md-12">
                            <h1 class="mbr-fonts-style mbr-fonts-style mbr-section-title  display-7 p-3">Program of Interest</h1>
                        </div>

                        <div class="col-md-4 form-group mb-3">
                            <label for="lastname-form3-1p" class="form-control-label mbr-fonts-style display-8">Select a Couse <span style="color: red;"> *</span></label>
                            <select name="selected_course" class="form-control display-7"
                                id="select-formbuilder-1t">
                                <option value="Test Course 1">Test Courses 1</option>
                                <option value="Test Course 2">Test Courses 2</option>
                                <option value="Test Course 3">Test Courses 3</option>
                            </select>
                            @error('selected_course')
                                <span style="color: red;">{{ $message }}</span>
                            @enderror
                        </div>


                        {{-- Sponsership Information --}}
                        <div class="col-md-12">
                            <h1 class="mbr-fonts-style mbr-fonts-style mbr-section-title  display-7 p-3">Sponsership Information</h1>
                        </div>
                        
                        <div class="col-md-4 form-group mb-3">
                            <label for="gender-form3-1p" class="form-control-label mbr-fonts-style display-8">Program Sponsership <span style="color: red;"> *</span></label>
                            <div style="display: flex;">
                                <div class="form-check" style="margin-right: 10px;">
                                    <input type="radio" value="Self" name="sponsorship_value" class="form-check-input" id="sponsership_value_self">
                                    <label for="sponsership_value_self" class="form-check-label">Self</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" value="Tamkeen" name="sponsorship_value" class="form-check-input" id="sponsership_value_tmk">
                                    <label for="sponsership_value_tmk" class="form-check-label">Tamkeen</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" value="Employer" name="sponsorship_value" class="form-check-input" id="sponsership_value_emp">
                                    <label for="sponsership_value_emp" class="form-check-label">Employer</label>
                                </div>
                            </div>
                            @error('sponsorship_value')
                                <span style="color: red;">{{ $message }}</span>
                            @enderror
                        </div>


                        {{-- Declaration --}}
                        <div class="col-md-12">
                            <h1 class="mbr-fonts-style mbr-fonts-style mbr-section-title  display-7 p-3">Declaration <span style="color: red;"> *</span></h1>
                        </div>

                        <div class="form-check">
                            <input type="checkbox" name="declaration_1" class="form-check-input" id="dec_1" required>
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
                            <input type="checkbox" name="declaration_2" class="form-check-input" id="dec_2">
                            <label for="dec_2" class="form-check-label">
                                I, also, hereby acknowledge that I have read and understood the Enma Terms and Conditions
                                and Enma Code of Conduct in its entirety and agree to abide by them.
                            </label>
                        </div>

                        <div class="form-check">
                            <input type="checkbox" name="declaration_3" class="form-check-input" id="dec_3">
                            <label for="dec_3" class="form-check-label">
                                I understand and agree that this declaration is final and irrevocable,
                                and that it is not subject to cancellation or amendments.
                            </label>
                        </div>


                        {{-- Signature --}}
                        <div class="col-md-12 mt-3">
                            <h1 class="mbr-fonts-style mbr-fonts-style mbr-section-title  display-7 p-3">Signature <span style="color: red;"> *</span></h1>
                        </div>
                        <div class="col-md-12 form-group mb-3">
                            <input type="text" name="stu_signature" required class="form-control display-7" placeholder="Add Your Name">
                        </div>



                        {{-- <div data-for="message" class="col-md-12 form-group mb-3">
                            <label for="message-form3-1p"
                                class="form-control-label mbr-fonts-style display-7">Message</label>
                            <textarea name="message" data-form-field="Message" class="form-control display-7" id="message-form3-1p"></textarea>
                        </div> --}}
                        <div class="input-group-btn col-md-12 text-center m-3">
                            <button type="submit" class="btn btn-form btn-primary display-4">SEND</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <script>
        function toggleFileUpload() {
            var injuryStatus = document.querySelector('input[name="injury_status"]:checked');
            var emergencyExit = document.querySelector('input[name="emergency_exit"]:checked');
            var fileUploadField = document.getElementById('file_upload_field');

            if ((injuryStatus && injuryStatus.value === 'Yes') || (emergencyExit && emergencyExit.value === 'Yes')) {
                // Display file upload field
                fileUploadField.style.display = 'block';
            } else {
                // Hide file upload field
                fileUploadField.style.display = 'none';
            }
        }
    </script>
@endsection