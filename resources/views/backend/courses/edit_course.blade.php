@extends('backend.master_admin')


@section('dynamic')
<span class="count_top"><i class="fa fa-home"></i> <span class="green"> / Edit Course</span></span>
    <br>
<div class="card mt-3">
    <div class="card-body">
        <form method="POST" action="{{ route('update.course', $current_course->id) }}">
            @csrf
            <div class="row">
                {{-- Awarding Body --}}
                <div class="col-md-4">
                    <label for="awarding_body" class="form-label">Awarding Body <span class="text-danger"> *</span></label>
                    <select class="form-control" name="awarding_body" id="awarding_body">
                        <option value="DASCA" {{ $current_course->awarding_body === 'DASCA' ? 'selected' : '' }}>DASCA</option>
                        <option value="ARTIBA" {{ $current_course->awarding_body === 'ARTIBA' ? 'selected' : '' }}>ARTIBA</option>
                        <option value="TMI" {{ $current_course->awarding_body === 'TMI' ? 'selected' : '' }}>TMI</option>
                        <option value="TSI" {{ $current_course->awarding_body === 'TSI' ? 'selected' : '' }}>TSI</option>
                        <option value="Life Office Management Association" {{ $current_course->awarding_body === 'Life Office Management Association' ? 'selected' : '' }}>Life Office Management Association</option>
                    </select>
                    @error('awarding_body')
                        <span style="color: red;">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Course Code --}}
                <div class="col-md-4">
                    <label for="course_code" class="form-label">Course Code <span class="text-danger"> *</span></label>
                    <select class="form-control" name="course_code" id="course_code">
                        <option value="DA/ABDE" {{ $current_course->course_code === 'DA/ABDE' ? 'selected' : '' }}>DA/ABDE</option>
                        <option value="DA/ABDA" {{ $current_course->course_code === 'DA/ABDA' ? 'selected' : '' }}>DA/ABDA</option>
                        <option value="DA/SBDA" {{ $current_course->course_code === 'DA/SBDA' ? 'selected' : '' }}>DA/SBDA</option>
                        <option value="AR/AIE" {{ $current_course->course_code === 'AR/AIE' ? 'selected' : '' }}>AR/AIE</option>
                        <option value="DA/SDS" {{ $current_course->course_code === 'DA/SDS' ? 'selected' : '' }}>DA/SDS</option>
                        <option value="DA/SBDE" {{ $current_course->course_code === 'DA/SBDE' ? 'selected' : '' }}>DA/SBDE</option>
                        <option value="TMI/STMP" {{ $current_course->course_code === 'TMI/STMP' ? 'selected' : '' }}>TMI/STMP</option>
                        <option value="TMI/TMP" {{ $current_course->course_code === 'TMI/TMP' ? 'selected' : '' }}>TMI/TMP</option>
                        <option value="TSI/ABSP" {{ $current_course->course_code === 'TSI/ABSP' ? 'selected' : '' }}>TSI/ABSP</option>
                        <option value="TSI/SBSP" {{ $current_course->course_code === 'TSI/SBSP' ? 'selected' : '' }}>TSI/SBSP</option>
                        {{--LOMA  --}}
                        <option value="ACS 100" {{ $current_course->course_code === 'ACS 100' ? 'selected' : '' }}>ACS 100</option>
                        <option value="LOMA 290" {{ $current_course->course_code === 'LOMA 290' ? 'selected' : '' }}>LOMA 290</option>
                        <option value="LOMA 280" {{ $current_course->course_code === 'LOMA 280' ? 'selected' : '' }}>LOMA 280</option>
                        <option value="LOMA 301" {{ $current_course->course_code === 'LOMA 301' ? 'selected' : '' }}>LOMA 301</option>
                        <option value="LOMA 307" {{ $current_course->course_code === 'LOMA 307' ? 'selected' : '' }}>LOMA 307</option>
                        <option value="LOMA 320" {{ $current_course->course_code === 'LOMA 320' ? 'selected' : '' }}>LOMA 320</option>
                        <option value="LOMA 311" {{ $current_course->course_code === 'LOMA 311' ? 'selected' : '' }}>LOMA 311</option>
                        <option value="LOMA 335" {{ $current_course->course_code === 'LOMA 335' ? 'selected' : '' }}>LOMA 335</option>
                        <option value="LOMA 357" {{ $current_course->course_code === 'LOMA 357' ? 'selected' : '' }}>LOMA 357</option>
                        <option value="LOMA 371" {{ $current_course->course_code === 'LOMA 371' ? 'selected' : '' }}>LOMA 371</option>
                        <option value="LOMA 361" {{ $current_course->course_code === 'LOMA 361' ? 'selected' : '' }}>LOMA 361</option>
                    </select>
                    @error('course_code')
                        <span style="color: red;">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Course Name --}}
                <div class="col-md-4">
                    <label for="course_name" class="form-label">Course Name <span class="text-danger"> *</span></label>
                    <select class="form-control" name="course_name" id="course_name">
                        <option value="Level 3 Certificate in Occupational Safety and Health" {{ $current_course->course_name === 'LOMA 361' ? 'selected' : '' }}>Level 3 Certificate in Occupational Safety and Health</option>
                        <option value="Award in General Insurance" {{ $current_course->course_name === 'Award in General Insurance' ? 'selected' : '' }}>Award in General Insurance</option>
                        <option value="Associate Big Data Engineer" {{ $current_course->course_name === 'Associate Big Data Engineer' ? 'selected' : '' }}>Associate Big Data Engineer</option>
                        <option value="Associate Big Data Analyst" {{ $current_course->course_name === 'Associate Big Data Analyst' ? 'selected' : '' }}>Associate Big Data Analyst</option>
                        <option value="Senior Big Data Analyst" {{ $current_course->course_name === 'Senior Big Data Analyst' ? 'selected' : '' }}>Senior Big Data Analyst</option>
                        <option value="Artificial Intelligence of Engineer" {{ $current_course->course_name === 'Artificial Intelligence of Engineer' ? 'selected' : '' }}>Artificial Intelligence of Engineer</option>
                        <option value="Senior Data Scientist" {{ $current_course->course_name === 'Senior Data Scientist' ? 'selected' : '' }}>Senior Data Scientist</option>
                        <option value="Senior Big Data Engineer" {{ $current_course->course_name === 'Senior Big Data Engineer' ? 'selected' : '' }}>Senior Big Data Engineer</option>
                        <option value="Senior Talent Management Practitioner" {{ $current_course->course_name === 'Senior Talent Management Practitioner' ? 'selected' : '' }}>Senior Talent Management Practitioner</option>
                        <option value="Talent Management Practitioner" {{ $current_course->course_name === 'Talent Management Practitioner' ? 'selected' : '' }}>Talent Management Practitioner</option>
                        <option value="Associate Business Strategy Professional" {{ $current_course->course_name === 'Associate Business Strategy Professional' ? 'selected' : '' }}>Associate Business Strategy Professional</option>
                        <option value="Senior Business Strategy Professional" {{ $current_course->course_name === 'Senior Business Strategy Professional' ? 'selected' : '' }}>Senior Business Strategy Professional</option>
                        {{-- LOMA --}}
                        <option value="Foundations of Customer Service" {{ $current_course->course_name === 'Foundations of Customer Service' ? 'selected' : '' }}>Foundations of Customer Service</option>
                        <option value="Insurance Company Operations" {{ $current_course->course_name === 'Insurance Company Operations' ? 'selected' : '' }}>Insurance Company Operations</option>
                        <option value="Principle of Insurance" {{ $current_course->course_name === 'Principle of Insurance' ? 'selected' : '' }}>Principle of Insurance</option>
                        <option value="Insurance Administration" {{ $current_course->course_name === 'Insurance Administration' ? 'selected' : '' }}>Insurance Administration</option>
                        <option value="Business and Financial Concepts for Insurance Professionals" {{ $current_course->course_name === 'Business and Financial Concepts for Insurance Professionals' ? 'selected' : '' }}>Business and Financial Concepts for Insurance Professionals</option>
                        <option value="Insurance Marketing" {{ $current_course->course_name === 'Insurance Marketing' ? 'selected' : '' }}>Insurance Marketing</option>
                        <option value="Business Law for Financial Services Professional" {{ $current_course->course_name === 'Business Law for Financial Services Professional' ? 'selected' : '' }}>Business Law for Financial Services Professional</option>
                        <option value="Operational Excellence in Financial Services" {{ $current_course->course_name === 'Operational Excellence in Financial Services' ? 'selected' : '' }}>Operational Excellence in Financial Services</option>
                        <option value="Institutional Investing: Principles and Practices" {{ $current_course->course_name === 'Institutional Investing: Principles and Practices' ? 'selected' : '' }}>Institutional Investing: Principles and Practices</option>
                        <option value="Risk Management and Product Design for Insurance Companies" {{ $current_course->course_name === 'Risk Management and Product Design for Insurance Companies' ? 'selected' : '' }}>Risk Management and Product Design for Insurance Companies</option>
                        <option value="Risk Management and Product Design for Insurance Companies" {{ $current_course->course_name === 'Risk Management and Product Design for Insurance Companies' ? 'selected' : '' }}>Risk Management and Product Design for Insurance Companies</option>
                    </select>
                    @error('course_name')
                        <span style="color: red;">{{ $message }}</span>
                    @enderror
                </div>

                {{-- License Code --}}
                <div class="col-md-4 mt-3">
                    <label for="license_code" class="form-label">License Code <span class="text-danger"> *</span></label>
                    <input type="text" name="license_code" id="license_code" class="form-control" value="{{ $current_course->license_code }}">
                    @error('license_code')
                        <span style="color: red;">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Num of Hourses --}}
                <div class="col-md-4 mt-3">
                    <label for="num_of_hours" class="form-label">Number of Hours <span class="text-danger"> *</span></label>
                    <input type="number" name="num_of_hours" id="num_of_hours" class="form-control" value="{{ $current_course->num_of_hours }}">
                    @error('num_of_hours')
                        <span style="color: red;">{{ $message }}</span>
                    @enderror
                </div>

                {{-- MOL Approval --}}
                <div class="col-md-4 mt-3">
                    <label for="mol_approval" class="form-label">MOL Approval <span class="text-danger"> *</span></label>
                    <input type="text" name="mol_approval" id="mol_approval" value="Achieved" class="form-control" readonly value="{{ $current_course->mol_level }}">
                    @error('mol_approval')
                        <span style="color: red;">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Issue Date --}}
                <div class="col-md-4 mt-3">
                    <label for="issue_date" class="form-label">Issue Date <span class="text-danger"> *</span></label>
                    <input type="date" name="issue_date" id="issue_date" class="form-control" value="{{ $current_course->issue_date }}">
                    @error('issue_date')
                        <span style="color: red;">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Expiry Date --}}
                <div class="col-md-4 mt-3">
                    <label for="expiry_date" class="form-label">Expiry Date <span class="text-danger"> *</span></label>
                    <input type="date" name="expiry_date" id="expiry_date" class="form-control" value="{{ $current_course->expiry_date }}">
                    @error('expiry_date')
                        <span style="color: red;">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Trainer --}}
                <div class="col-md-4 mt-3">
                    <label for="trainer_name" class="form-label">Trainer Name <span class="text-danger">
                            *</span></label>
                    <select class="form-control" name="trainer_name" id="trainer_name">
                        @foreach ($trainers as $trainer)
                            <option value="{{ $trainer->id }}" {{ $trainer->id == $current_course->trainer_id ? 'selected' : '' }}>{{ $trainer->name }}</option>
                        @endforeach
                    </select>
                    @error('trainer_name')
                        <span style="color: red;">{{ $message }}</span>
                    @enderror
                </div>

                <div class="col-md-12 mt-3 text-center">
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection