@extends('backend.master_admin')

@section('dynamic')
    <span class="count_top"><i class="fa fa-home"></i> <span class="green"> / Add Trainer</span></span>
    <br>
    <div class="card mt-3">
        <div class="card-body">
            <div class="row">
                {{-- Trainer Name --}}
                <div class="col-md-4">
                    <label for="trainer_name" class="form-label">Trainer Name <span class="text-danger"> *</span></label>
                    <input type="text" name="trainer_name" value="{{ $current_trainer->name }}" id="trainer_name" class="form-control" readonly>
                </div>

                {{-- Trainer CPR --}}
                <div class="col-md-4">
                    <label for="trainer_cpr" class="form-label">Trainer CPR <span class="text-danger"> *</span></label>
                    <input type="number" name="trainer_cpr" id="trainer_cpr" value="{{ $current_trainer->cpr }}" class="form-control" readonly  >
                </div>

                {{-- License Code --}}
                <div class="col-md-4">
                    <label for="license_code" class="form-label">License Code <span class="text-danger"> *</span></label>
                    <input type="text" name="license_code" id="license_code" value="{{ $current_trainer->license_code }}" class="form-control" readonly>
                </div>


                {{-- Training Code/Field --}}
                <div class="col-md-4 mt-3">
                    <label for="trainer_field" class="form-label">Training Field <span class="text-danger">*</span></label>
                    <input type="text" name="training_fields" id="trainer_field" value="{{ $current_trainer->training_field }}" class="form-control" readonly>
                </div>

                {{-- Nationality --}}
                <div class="col-md-4 mt-3">
                    <label for="nationality" class="form-label">Nationality <span class="text-danger">
                            *</span></label>
                    <div class="form-check">
                        <input type="radio" name="nationality" class="form-check-input" value="Bahraini" id="nationality" {{ $current_trainer->nationality === 'Bahraini' ? 'checked' : '' }} disabled>
                        <label class="form-check-label" for="nationality">Bahraini</label>
                    </div>
                    <div class="form-check">
                        <input type="radio" name="nationality" class="form-check-input" value="Bahraini" id="nationality" {{ $current_trainer->nationality === 'Non-Bahraini' ? 'checked' : '' }} disabled>
                        <label class="form-check-label" for="nationality">Non-Bahraini</label>
                    </div>
                    @error('nationality')
                        <span style="color: red;">{{ $message }}</span>
                    @enderror
                </div>

                {{-- Employment Status --}}
                <div class="col-md-4 mt-3">
                    <label for="employment_status" class="form-label">Employement Status <span class="text-danger">*</span></label>
                    <input type="text" name="employment_status" id="employment_status" value="{{ $current_trainer->employment_status }}" class="form-control" readonly>
                </div>

                {{-- Issue Date --}}
                <div class="col-md-3 mt-3">
                    <label for="issue_date" class="form-label">Issue Date <span class="text-danger"> *</span></label>
                    <input type="date" name="issue_date" id="issue_date" class="form-control" value="{{ $current_trainer->issue_date }}" readonly>
                    @error('issue_date')
                        <span style="color: red;">{{ $message }}</span>
                    @enderror
                </div>


                {{-- Expiry Date --}}
                <div class="col-md-3 mt-3">
                    <label for="expiry_date" class="form-label">Expiry Date <span class="text-danger"> *</span></label>
                    <input type="date" name="expiry_date" id="expiry_date" class="form-control" value="{{ $current_trainer->expiry_date }}" readonly>
                </div>

                {{-- Created By --}}
                <div class="col-md-3 mt-3">
                    <label for="entered_by" class="form-label">Entered By <span class="text-danger">*</span></label>
                    <input type="text" name="entered_by" id="entered_by" value="{{ $current_trainer->entered_by }}" class="form-control" readonly>
                </div>

                {{-- Edited By --}}
                <div class="col-md-3 mt-3">
                    <label for="edited_by" class="form-label">Edited By <span class="text-danger">*</span></label>
                    <input type="text" name="edited_by" id="edited_by" value="{{ isset($current_trainer->edited_by) ? $current_trainer->edited_by : '' }}" class="form-control" readonly>
                </div>
            </div>

        </div>
    </div>
@endsection
