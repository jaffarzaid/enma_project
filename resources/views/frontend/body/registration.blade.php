@extends('frontend.master_index')

@section('dynamic')
    <div class="container-fluid">
        <div class="row justify-content-center">
            <div class=" col-md-8 col-lg-5" data-form-type="formoid">
                <form action="" method="POST" class="mbr-form form-with-styler">
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
                            <input type="text" name="firstname" data-form-field="First Name" required="required"
                                class="form-control display-7" id="firstname-form3-1p">
                        </div>

                        {{-- 2nd Name --}}
                        <div data-for="secondname" class="col-md-4 form-group mb-3">
                            <label for="lastname-form3-1p" class="form-control-label mbr-fonts-style display-8">Second Name
                                <span style="color: red;"> *</span></label>
                            <input type="text" name="lastname" data-form-field="Last Name" class="form-control display-7"
                                required="required" id="secondname-form3-1p">
                        </div>

                        {{-- Last Name --}}
                        <div data-for="lastname" class="col-md-4 form-group mb-3">
                            <label for="lastname-form3-1p" class="form-control-label mbr-fonts-style display-8">Last Name
                                <span style="color: red;"> *</span></label>
                            <input type="text" name="lastname" data-form-field="Last Name" class="form-control display-7"
                                required="required" id="lastname-form3-1p">
                        </div>

                        {{-- CPR --}}
                        <div data-for="cpr" class="col-md-4 form-group mb-3">
                            <label for="cpr-form3-1p" class="form-control-label mbr-fonts-style display-8">CPR <span
                                    style="color: red;"> *</span></label>
                            <input type="number" name="email" data-form-field="Email" class="form-control display-7"
                                required="required" id="cpr-form3-1p">
                        </div>

                        {{-- Gender --}}
                        <div data-for="gender" class="col-md-4 form-group mb-3">
                            <label for="gender-form3-1p" class="form-control-label mbr-fonts-style display-8">Gender <span
                                    style="color: red;"> *</span></label>
                            <div style="display: flex;">
                                <div data-for="male" class="form-check" style="margin-right: 10px;">
                                    <input type="radio" value="Male" name="gender" data-form-field="male"
                                        class="form-check-input" id="male">
                                    <label for="male-formbuilder-1r" class="form-check-label">Male</label>
                                </div>
                                <div data-for="female" class="form-check">
                                    <input type="radio" value="Female" name="gender" data-form-field="female"
                                        class="form-check-input" id="female">
                                    <label for="female-formbuilder-1r" class="form-check-label">Female</label>
                                </div>
                            </div>
                        </div>

                        {{-- Nationality --}}
                        <div data-for="phone" class="col-md-4 form-group mb-3">
                            <label for="phone-form3-1p" class="form-control-label mbr-fonts-style display-8">Nationality
                                <span style="color: red;"> *</span></label>
                            <div style="display: flex;">
                                <div data-for="male" class="form-check" style="margin-right: 10px;">
                                    <input type="radio" value="Male" name="gender" data-form-field="male"
                                        class="form-check-input" id="male">
                                    <label for="male-formbuilder-1r" class="form-check-label">Bahraini</label>
                                </div>
                                <div data-for="female" class="form-check">
                                    <input type="radio" value="Female" name="gender" data-form-field="female"
                                        class="form-check-input" id="female">
                                    <label for="female-formbuilder-1r" class="form-check-label">Non-Bahraini</label>
                                </div>
                            </div>
                        </div>

                        {{-- Phone 1 --}}
                        <div data-for="lastname" class="col-md-6 form-group mb-3">
                            <label for="lastname-form3-1p" class="form-control-label mbr-fonts-style display-8">Phone 1
                                <span style="color: red;"> *</span></label>
                            <input type="number" name="lastname" data-form-field="Last Name"
                                class="form-control display-7" required="required" id="lastname-form3-1p">
                        </div>

                        {{-- Phone 2 --}}
                        <div data-for="lastname" class="col-md-6 form-group mb-3">
                            <label for="lastname-form3-1p" class="form-control-label mbr-fonts-style display-8">Phone 2
                                <span style="color: red;"> *</span></label>
                            <input type="number" name="lastname" data-form-field="Last Name"
                                class="form-control display-7" required="required" id="lastname-form3-1p">
                        </div>

                        {{-- Birthday --}}
                        <div data-for="lastname" class="col-md-4 form-group mb-3">
                            <label for="lastname-form3-1p" class="form-control-label mbr-fonts-style display-8">Birthday
                                <span style="color: red;"> *</span></label>
                            <input type="date" name="lastname" data-form-field="Last Name"
                                class="form-control display-7" required="required" id="lastname-form3-1p">
                        </div>

                        {{-- Home Address --}}
                        <div data-for="lastname" class="col-md-4 form-group mb-3">
                            <label for="lastname-form3-1p" class="form-control-label mbr-fonts-style display-8">Home
                                Address <span style="color: red;"> *</span></label>
                            <input type="text" name="lastname" data-form-field="Last Name"
                                class="form-control display-7" required="required" id="lastname-form3-1p">
                        </div>

                        {{-- Email --}}
                        <div data-for="email" class="col-md-4 form-group mb-3">
                            <label for="lastname-form3-1p" class="form-control-label mbr-fonts-style display-8">Email
                                <span style="color: red;"> *</span></label>
                            <input type="email" name="lastname" data-form-field="Last Name"
                                class="form-control display-7" required="required" id="lastname-form3-1p"
                                pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}">
                        </div>

                        {{-- Emergency Name --}}
                        <div data-for="lastname" class="col-md-4 form-group mb-3">
                            <label for="lastname-form3-1p" class="form-control-label mbr-fonts-style display-8">Emergency
                                Contact Name <span style="color: red;"> *</span></label>
                            <input type="text" name="lastname" data-form-field="Last Name"
                                class="form-control display-7" required="required" id="lastname-form3-1p">
                        </div>

                        {{-- Relationship --}}
                        <div data-for="lastname" class="col-md-4 form-group mb-3">
                            <label for="lastname-form3-1p"
                                class="form-control-label mbr-fonts-style display-8">Relationship <span
                                    style="color: red;"> *</span></label>
                            <input type="text" name="lastname" data-form-field="Last Name"
                                class="form-control display-7" required="required" id="lastname-form3-1p">
                        </div>

                        {{-- Emergency Contact --}}
                        <div data-for="lastname" class="col-md-4 form-group mb-3">
                            <label for="lastname-form3-1p" class="form-control-label mbr-fonts-style display-8">Emergency
                                Phone <span style="color: red;"> *</span></label>
                            <input type="number" name="lastname" data-form-field="Last Name"
                                class="form-control display-7" required="required" id="lastname-form3-1p">
                        </div>

                        {{-- CPR File --}}
                        <div data-for="cpr_file" class="col-md-6 form-group mb-3">
                            <label for="lastname-form3-1p" class="form-control-label mbr-fonts-style display-8">Upload CPR
                                File <span style="color: red;"> *</span></label>
                            <input type="file" name="lastname" data-form-field="Last Name"
                                class="form-control display-7" required="required" id="cpr_file-form3-1p">
                        </div>

                        {{-- Passport File --}}
                        <div data-for="passport_file" class="col-md-6 form-group mb-3">
                            <label for="lastname-form3-1p" class="form-control-label mbr-fonts-style display-8">Upload
                                Passport File <span style="color: red;"> *</span></label>
                            <input type="file" name="lastname" data-form-field="Last Name"
                                class="form-control display-7" required="required" id="passport_file-form3-1p">
                        </div>


                        {{-- Personal Information --}}
                        <div class="col-md-12">
                            <h1 class="mbr-fonts-style mbr-fonts-style mbr-section-title  display-7 p-3">Academic
                                Qualification</h1>
                        </div>

                        {{-- Academic Qualification --}}
                        <div data-for="passport_file" class="col-md-4 form-group mb-3">
                            <label for="lastname-form3-1p"
                                class="form-control-label mbr-fonts-style display-8">Qualification <span
                                    style="color: red;"> *</span></label>
                            <select name="select" data-form-field="select" class="form-control display-7"
                                id="select-formbuilder-1t">
                                <option value="PhD">PhD</option>
                                <option value="Master">Master</option>
                                <option value="Bachelor">Bachelor</option>
                                <option value="Associate">Associate</option>
                            </select>
                        </div>

                        {{-- Specialization --}}
                        <div data-for="passport_file" class="col-md-4 form-group mb-3">
                            <label for="lastname-form3-1p"
                                class="form-control-label mbr-fonts-style display-8">Specialization <span
                                    style="color: red;"> *</span></label>
                            <select name="select" data-form-field="select" class="form-control display-7"
                                id="select-formbuilder-1t">
                                <option value="PhD">Business</option>
                                <option value="Master">Engineering</option>
                                <option value="Bachelor">Others</option>
                            </select>
                        </div>

                        {{-- GPA --}}
                        <div data-for="passport_file" class="col-md-4 form-group mb-3">
                            <label for="lastname-form3-1p" class="form-control-label mbr-fonts-style display-8">GPA <span
                                    style="color: red;"> *</span></label>
                            <input type="number" name="lastname" data-form-field="Last Name"
                                class="form-control display-7" required="required" id="lastname-form3-1p"
                                step="0.01">
                        </div>

                        {{-- Language of Instruction --}}
                        <div data-for="gender" class="col-md-4 form-group mb-3">
                            <label for="gender-form3-1p" class="form-control-label mbr-fonts-style display-8">Language of
                                Instruction <span style="color: red;"> *</span></label>
                            <div style="display: flex;">
                                <div data-for="male" class="form-check" style="margin-right: 10px;">
                                    <input type="radio" value="Male" name="gender" data-form-field="male"
                                        class="form-check-input" id="male">
                                    <label for="male-formbuilder-1r" class="form-check-label">Arabic</label>
                                </div>
                                <div data-for="female" class="form-check">
                                    <input type="radio" value="Female" name="gender" data-form-field="female"
                                        class="form-check-input" id="female">
                                    <label for="female-formbuilder-1r" class="form-check-label">English</label>
                                </div>
                                <div data-for="female" class="form-check">
                                    <input type="radio" value="Female" name="gender" data-form-field="female"
                                        class="form-check-input" id="female">
                                    <label for="female-formbuilder-1r" class="form-check-label">Bilingual</label>
                                </div>
                            </div>
                        </div>

                        {{-- Educational Certificate --}}
                        <div data-for="certificates_file" class="col-md-4 form-group mb-3">
                            <label for="lastname-form3-1p" class="form-control-label mbr-fonts-style display-8">Upload
                                Educational Certificate <span style="color: red;"> *</span></label>
                            <input type="file" name="lastname" data-form-field="Last Name"
                                class="form-control display-7" required="required" id="certificates_file-form3-1p">
                        </div>

                        {{-- Transcript --}}
                        <div data-for="certificates_file" class="col-md-4 form-group mb-3">
                            <label for="lastname-form3-1p" class="form-control-label mbr-fonts-style display-8">Upload
                                Transcripts <span style="color: red;"> *</span></label>
                            <input type="file" name="lastname" data-form-field="Last Name"
                                class="form-control display-7" required="required" id="certificates_file-form3-1p">
                        </div>

                        {{-- Professoinal Certification --}}
                        <div class="col-md-12">
                            <h1 class="mbr-fonts-style mbr-fonts-style mbr-section-title  display-7 p-3">Professoinal
                                Certification</h1>
                        </div>

                        {{-- Certification Name --}}
                        <div data-for="cer_name" class="col-md-3 form-group mb-3">
                            <label for="cer_name" class="form-control-label mbr-fonts-style display-8">Cetification Name
                            </label>
                            <input type="text" name="lastname" data-form-field="cer_name" class="form-control"
                                id="cer_name" placeholder="AWS AI & Machine Learning">
                        </div>

                        {{-- Certification Specialization --}}
                        <div data-for="cer_name" class="col-md-3 form-group mb-3">
                            <label for="cer_name" class="form-control-label mbr-fonts-style display-8">Specialization
                            </label>
                            <input type="text" name="lastname" data-form-field="cer_name" class="form-control"
                                id="cer_name" placeholder="Artificial Intellegence">
                        </div>

                        {{-- Awarding Body --}}
                        <div data-for="awarding_body" class="col-md-3 form-group mb-3">
                            <label for="awarding_body" class="form-control-label mbr-fonts-style display-8">Awarding Body
                            </label>
                            <input type="text" name="lastname" data-form-field="cer_name" class="form-control"
                                id="awarding_body" placeholder="AIE">
                        </div>

                        {{-- Year --}}
                        <div data-for="awarding_body" class="col-md-3 form-group mb-3">
                            <label for="pro_year" class="form-control-label mbr-fonts-style display-8">Year </label>
                            <input type="text" name="lastname" data-form-field="cer_name" class="form-control"
                                id="pro_year" placeholder="2020">
                        </div>



                        {{-- Experience --}}
                        <div class="col-md-12">
                            <h1 class="mbr-fonts-style mbr-fonts-style mbr-section-title  display-7 p-3">Work Experience
                            </h1>
                        </div>

                        {{-- Job Title --}}
                        <div class="col-md-3 form-group mb-3">
                            <label for="job_title" class="form-control-label mbr-fonts-style display-8">Job Title </label>
                            <input type="text" name="lastname" class="form-control" id="job_title"
                                placeholder="Manager">
                        </div>

                        {{-- Job Nature --}}
                        <div class="col-md-3 form-group mb-3">
                            <label for="job_nature" class="form-control-label mbr-fonts-style display-8">Job Title
                            </label>
                            <input type="text" name="lastname" class="form-control" id="job_nature"
                                placeholder="Accounts">
                        </div>

                        {{-- Employer --}}
                        <div class="col-md-3 form-group mb-3">
                            <label for="employer" class="form-control-label mbr-fonts-style display-8">Employer </label>
                            <input type="text" name="employer" class="form-control" id="employer"
                                placeholder="Hospital">
                        </div>

                        {{-- Num of Experience --}}
                        <div class="col-md-3 form-group mb-3">
                            <label for="num_experience" class="form-control-label mbr-fonts-style display-8">No. of
                                Experience </label>
                            <input type="number" name="num_experience" class="form-control" id="num_experience"
                                placeholder="3">
                        </div>


                        {{-- Health & Safety Information --}}
                        <div class="col-md-12">
                            <h1 class="mbr-fonts-style mbr-fonts-style mbr-section-title  display-7 p-3">Health & Safety
                                Information</h1>
                        </div>

                        <div class="col-md-6 form-group mb-3">
                            <label for="job_nature" class="form-control-label mbr-fonts-style display-8">Do you have any significant injury, disability, and/or medical conditions? <span style="color: red;">*</span></label>
                            <div style="display: flex;">
                                <div class="form-check" style="margin-right: 10px;">
                                    <input type="radio" value="Yes" name="injury_status" class="form-check-input" id="injury_status_yes" required onclick="toggleFileUpload()">
                                    <label for="injury_status_yes" class="form-check-label">Yes</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" value="No" name="injury_status" class="form-check-input" id="injury_status_no" required onclick="toggleFileUpload()">
                                    <label for="injury_status_no" class="form-check-label">No</label>
                                </div>
                            </div>
                        </div>
                    
                        <div class="col-md-6 form-group mb-3">
                            <label for="emergency_exit" class="form-control-label mbr-fonts-style display-8">In the event of an emergency, do you need help to exit the building? <span style="color: red;">*</span></label>
                            <div style="display: flex;">
                                <div class="form-check" style="margin-right: 10px;">
                                    <input type="radio" value="Yes" name="emergency_exit" class="form-check-input" id="emergency_exit_yes" required onclick="toggleFileUpload()">
                                    <label for="emergency_exit_yes" class="form-check-label">Yes</label>
                                </div>
                                <div class="form-check">
                                    <input type="radio" value="No" name="emergency_exit" class="form-check-input" id="emergency_exit_no" required onclick="toggleFileUpload()">
                                    <label for="emergency_exit_no" class="form-check-label">No</label>
                                </div>
                            </div>
                        </div>
                    
                        <div class="col-md-6 form-group mb-3" id="file_upload_field" style="display: none;">
                            <label for="file_upload" class="form-control-label mbr-fonts-style display-8">Upload File <span style="color: red;">*</span></label>
                            <input type="file" name="file_upload" id="file_upload" required>
                        </div>


                            {{-- <div data-for="message" class="col-md-12 form-group mb-3">
                            <label for="message-form3-1p"
                                class="form-control-label mbr-fonts-style display-7">Message</label>
                            <textarea name="message" data-form-field="Message" class="form-control display-7" id="message-form3-1p"></textarea>
                        </div> --}}
                            <div class="input-group-btn col-md-12">
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
