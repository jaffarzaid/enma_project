@extends('backend.master_admin')

@section('dynamic')

    <span class="count_top"><i class="fa fa-home"></i> <span class="green"> / Edit Trainer</span></span>
    <br>    
    <div class="card mt-3">
        <div class="card-body">
            <form method="POST" action="{{ route('update.trainer', $current_trainer->id) }}">
                @csrf
                <div class="row">
                    {{-- Trainer Name --}}
                    <div class="col-md-4">
                        <label for="updated_trainer_name" class="form-label">Trainer Name <span class="text-danger"> *</span></label>
                        <input type="text" name="updated_trainer_name" id="updated_trainer_name" class="form-control" value="{{ $current_trainer->name }}" placeholder="Name">
                        @error('updated_trainer_name')
                            <span style="color: red;">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Trainer CPR --}}
                    <div class="col-md-4">
                        <label for="updated_trainer_cpr" class="form-label">Trainer CPR <span class="text-danger"> *</span></label>
                        <input type="number" name="updated_trainer_cpr" id="updated_trainer_cpr" class="form-control" value="{{ $current_trainer->cpr }}" placeholder="Add only digits!">
                        @error('updated_trainer_cpr')
                            <span style="color: red;">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- License Code --}}
                    <div class="col-md-4">
                        <label for="updated_license_code" class="form-label">License Code <span class="text-danger"> *</span></label>
                        <input type="text" name="updated_license_code" id="updated_license_code" class="form-control" value="{{ $current_trainer->license_code }}">
                        @error('updated_license_code')
                            <span style="color: red;">{{ $message }}</span>
                        @enderror
                    </div>

                    
                    {{-- Training Code/Field --}}
                    <div class="col-md-4 mt-3">
                        <label for="updated_training_fields" class="form-label">Training Field <span class="text-danger">
                                *</span></label>
                        <select class="form-control" name="updated_training_fields" id="updated_training_fields">
                            <option value="Cybersecurity" {{ $current_trainer->training_code === 'Cybersecurity' ? 'selected': '' }}> Cybersecurity</option>
                            <option value="Insurance" {{ $current_trainer->training_code === 'Insurance' ? 'selected' : '' }}>Insurance</option>
                            <option value="Big Data Science" {{ $current_trainer->training_code === 'Big Data Science' ? 'selected' : '' }}>Big Data Science</option>
                            <option value="Artificial Intelligence" {{ $current_trainer->training_code == 'Artificial Intelligence' ? 'selected' : '' }}>Artificial Intelligence</option>
                            <option value="Tallent Management" {{ $current_trainer->training_code === 'Tallent Management' ? 'selected' : '' }}>Tallent Management</option>
                            <option value="Strategy" {{ $current_trainer->training_code === 'Strategy' ? 'selected' : '' }}>Strategy</option>
                            <option value="Coorporate Governance" {{ $current_trainer->training_code === 'Coorporate Governance' ? 'selected' : '' }}>Coorporate Governance</option>
                            <option value="Networking" {{ $current_trainer->training_code === 'Networking' ? 'selected' : '' }}>Networking</option>
                            <option value="Health & Safety" {{ $current_trainer->training_code === 'Health & Safety' ? 'selected' : '' }}>Health & Safety</option>
                            <option value="Supply Chain" {{ $current_trainer->training_code === 'Supply Chain' ? 'selected' : '' }}>Supply Chain</option>
                        </select>
                        @error('updated_training_fields')
                            <span style="color: red;">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Nationality --}}
                    <div class="col-md-4 mt-3">
                        <label for="updated_nationality" class="form-label">Nationality <span class="text-danger">
                                *</span></label>
                        <div class="form-check">
                            <input type="radio" name="updated_nationality" class="form-check-input" value="Bahraini" id="updated_nationality" {{ $current_trainer->nationality == 'Bahraini' ? 'checked' : '' }}>
                            <label class="form-check-label" for="updated_nationality">
                                Bahraini
                            </label>
                        </div>
                        <div class="form-check">
                            <input type="radio" name="updated_nationality" class="form-check-input" value="Non-Bahraini" id="updated_nationality" {{ $current_trainer->nationality == 'Non-Bahraini' ? 'checked' : '' }}>
                            <label class="form-check-label" for="updated_nationality">
                                Non-Bahraini
                            </label>
                        </div>
                        @error('updated_nationality')
                            <span style="color: red;">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Employment Status --}}
                    <div class="col-md-4 mt-3">
                        <label for="updated_employment_status" class="form-label">Employement Status <span class="text-danger">
                                *</span></label>
                        <select class="form-control" name="updated_employment_status">
                            <option value="Full Time" {{ $current_trainer->employment_status === 'Full Time' ? 'selected' : '' }}>Full Time</option>
                            <option value="Part Time" {{ $current_trainer->employment_status === 'Part Time' ? 'selected' : '' }}>Part Time</option>
                            <option value="Visitor" {{ $current_trainer->employment_status === 'Visitor' ? 'selected' : '' }}>Visitor</option>
                        </select>
                        @error('updated_employment_status')
                            <span style="color: red;">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Issue Date --}}
                    <div class="col-md-6 mt-3">
                        <label for="updated_issue_date" class="form-label">Issue Date <span class="text-danger"> *</span></label>
                        <input type="date" name="updated_issue_date" id="updated_issue_date" value="{{ $current_trainer->issue_date }}" class="form-control">
                        @error('updated_issue_date')
                            <span style="color: red;">{{ $message }}</span>
                        @enderror
                    </div>

                    
                    {{-- Expiry Date --}}
                    <div class="col-md-6 mt-3">
                        <label for="updated_expiry_date" class="form-label">Expiry Date <span class="text-danger"> *</span></label>
                        <input type="date" name="updated_expiry_date" id="updated_expiry_date" value="{{ $current_trainer->expiry_date }}" class="form-control">
                        @error('updated_expiry_date')
                            <span style="color: red;">{{ $message }}</span>
                        @enderror
                    </div>

                    <div class="col-md-12 mt-3 text-center">
                        <button type="submit" class="btn btn-success">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
