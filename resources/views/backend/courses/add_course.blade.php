@extends('backend.master_admin')


@section('dynamic')
    <span class="count_top"><i class="fa fa-home"></i> <span class="green"> / Add Courses</span></span>
    <br>
    <div class="card mt-3">
        <div class="card-body">
            <form method="POST" action="{{ route('store.course') }}">
                @csrf
                <div class="row">
                    {{-- Awarding Body --}}
                    <div class="col-md-4">
                        <label for="awarding_body" class="form-label">Awarding Body <span class="text-danger">
                                *</span></label>
                        <select class="form-control" name="awarding_body" id="awarding_body">
                            <option value="ARTIBA">ARTIBA</option>
                            <option value="British Safety Council (BSC)">British Safety Council (BSC)</option>
                            <option value="ARTIBA">Chartered Insurance Institute (CII)</option>
                            <option value="DASCA">DASCA</option>
                            <option value="TMI">TMI</option>
                            <option value="TSI">TSI</option>
                            <option value="Life Office Management Association">Life Office Management Association</option>
                        </select>
                        @error('awarding_body')
                            <span style="color: red;">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Course Code --}}
                    <div class="col-md-4">
                        <label for="course_code" class="form-label">Course Code <span class="text-danger"> *</span></label>
                        <select class="form-control" name="course_code" id="course_code">
                            <option value="DA/ABDE">DA/ABDE</option>
                            <option value="DA/ABDA">DA/ABDA</option>
                            <option value="DA/SBDA">DA/SBDA</option>
                            <option value="AR/AIE">AR/AIE</option>
                            <option value="DA/SDS">DA/SDS</option>
                            <option value="DA/SBDE">DA/SBDE</option>
                            <option value="TMI/STMP">TMI/STMP</option>
                            <option value="TMI/TMP">TMI/TMP</option>
                            <option value="TSI/ABSP">TSI/ABSP</option>
                            <option value="TSI/SBSP">TSI/SBSP</option>
                            {{-- LOMA  --}}
                            <option value="ACS 100">ACS 100</option>
                            <option value="LOMA 290">LOMA 290</option>
                            <option value="LOMA 280">LOMA 280</option>
                            <option value="LOMA 301">LOMA 301</option>
                            <option value="LOMA 307">LOMA 307</option>
                            <option value="LOMA 320">LOMA 320</option>
                            <option value="LOMA 311">LOMA 311</option>
                            <option value="LOMA 335">LOMA 335</option>
                            <option value="LOMA 357">LOMA 357</option>
                            <option value="LOMA 371">LOMA 371</option>
                            <option value="LOMA 361">LOMA 361</option>
                        </select>
                        @error('course_code')
                            <span style="color: red;">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Course Name --}}
                    <div class="col-md-4">
                        <label for="course_name" class="form-label">Course Name <span class="text-danger"> *</span></label>
                        <select class="form-control" name="course_name" id="course_name">
                            <option value="Accounting and Financial Reporting in Life Insurance Companies">Accounting and
                                Financial Reporting in Life Insurance Companies</option>
                            <option value="Artificial Intelligence of Engineer">Artificial Intelligence of Engineer</option>
                            <option value="Associate Big Data Engineer">Associate Big Data Engineer</option>
                            <option value="Associate Big Data Analyst">Associate Big Data Analyst</option>
                            <option value="Award in General Insurance">Award in General Insurance</option>
                            <option value="Business Law for Financial Services Professional">Business Law for Financial
                                Services Professional</option>
                            <option value="Business and Financial Concepts for Insurance Professionals">Business and
                                Financial Concepts for Insurance Professionals</option>
                            <option value="Insurance Company Operations">Insurance Company Operations</option>
                            <option value="Principle of Insurance">Principle of Insurance</option>
                            <option value="Foundations of Customer Service">Foundations of Customer Service</option>
                            <option value="Insurance Administration">Insurance Administration</option>
                            <option value="Insurance Marketing">Insurance Marketing</option>
                            <option value="Institutional Investing: Principles and Practices">Institutional Investing:
                                Principles and Practices</option>
                            <option value="Level 3 Certificate in Occupational Safety and Health">Level 3 Certificate in
                                Occupational Safety and Health</option>
                            <option value="Operational Excellence in Financial Services">Operational Excellence in Financial
                                Services</option>
                            <option value="Risk Management and Product Design for Insurance Companies">Risk Management and
                                Product Design for Insurance Companies</option>
                            <option value="Risk Management and Product Design for Insurance Companies">Risk Management and
                                Product Design for Insurance Companies</option>
                            <option value="Senior Big Data Analyst">Senior Big Data Analyst</option>
                            <option value="Senior Data Scientist">Senior Data Scientist</option>
                            <option value="Senior Big Data Engineer">Senior Big Data Engineer</option>
                            <option value="Senior Talent Management Practitioner">Senior Talent Management Practitioner
                            </option>
                            <option value="Talent Management Practitioner">Talent Management Practitioner</option>
                            <option value="Associate Business Strategy Professional">Associate Business Strategy
                                Professional</option>
                            <option value="Senior Business Strategy Professional">Senior Business Strategy Professional
                            </option>
                            {{-- LOMA --}}
                        </select>
                        @error('course_name')
                            <span style="color: red;">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- License Code --}}
                    <div class="col-md-4 mt-3">
                        <label for="license_code" class="form-label">License Code <span class="text-danger">
                                *</span></label>
                        <input type="text" name="license_code" id="license_code" class="form-control">
                        @error('license_code')
                            <span style="color: red;">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Num of Hourses --}}
                    <div class="col-md-4 mt-3">
                        <label for="num_of_hours" class="form-label">Number of Hours <span class="text-danger">
                                *</span></label>
                        <input type="number" name="num_of_hours" id="num_of_hours" class="form-control">
                        @error('num_of_hours')
                            <span style="color: red;">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- MOL Approval --}}
                    <div class="col-md-4 mt-3">
                        <label for="mol_approval" class="form-label">MOL Approval <span class="text-danger">
                                *</span></label>
                        <input type="text" name="mol_approval" id="mol_approval" value="Achieved"
                            class="form-control" readonly>
                        @error('mol_approval')
                            <span style="color: red;">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Issue Date --}}
                    <div class="col-md-2 mt-3">
                        <label for="issue_date" class="form-label">Issue Date <span class="text-danger"> *</span></label>
                        <input type="date" name="issue_date" id="issue_date" class="form-control">
                        @error('issue_date')
                            <span style="color: red;">{{ $message }}</span>
                        @enderror
                    </div>


                    {{-- Expiry Date --}}
                    <div class="col-md-2 mt-3">
                        <label for="expiry_date" class="form-label">Expiry Date <span class="text-danger">
                                *</span></label>
                        <input type="date" name="expiry_date" id="expiry_date" class="form-control">
                        @error('expiry_date')
                            <span style="color: red;">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Trainer --}}
                    <div class="col-md-3 mt-3">
                        <label for="trainer_name" class="form-label">Trainer Name <span class="text-danger">
                                *</span></label>
                        <select class="form-control" name="trainer_name" id="trainer_name">
                            @foreach ($trainers as $trainer)
                                <option value="{{ $trainer->id }}">{{ $trainer->name }}</option>
                            @endforeach
                        </select>
                        @error('trainer_name')
                            <span style="color: red;">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Course Type --}}
                    <div class="col-md-5 mt-3">
                        <label for="trainer-type" class="form-control-label mbr-fonts-style display-8">Course Type </label>
                        <div style="display: flex;">
                            <div class="form-check mr-1" style="margin-right: 10px;">
                                <input type="checkbox" name="job_seeker" class="form-check-input" id="job_seeker">
                                <label for="job_seeker" class="form-check-label">Job Seeker</label>
                            </div>

                            <div class="form-check mr-1">
                                <input type="checkbox" name="employee" class="form-check-input" id="employee">
                                <label for="employee" class="form-check-label">Employee</label>
                            </div>

                            <div class="form-check mr-1">
                                <input type="checkbox" name="univ_student" class="form-check-input" id="univ_student">
                                <label for="univ_student" class="form-check-label">University Student</label>
                            </div>

                            <div class="form-check">
                                <input type="checkbox" name="expat" class="form-check-input" id="expat">
                                <label for="expat" class="form-check-label">Expact</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-12 mt-3 text-center">
                        <button type="submit" class="btn btn-primary">Add</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
