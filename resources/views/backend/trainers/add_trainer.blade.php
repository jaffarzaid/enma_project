@extends('backend.master_admin')

@section('dynamic')

    <span class="count_top"><i class="fa fa-home"></i> <span class="green"> / Add Trainer</span></span>
    <br>    
    <div class="card mt-3">
        <div class="card-body">
            <form method="POST" action="{{ route('store.trainer') }}">
                @csrf
                <div class="row">
                    {{-- Trainer Name --}}
                    <div class="col-md-4">
                        <label for="trainer_name" class="form-label">Trainer Name <span class="text-danger"> *</span></label>
                        <input type="text" name="trainer_name" id="trainer_name" class="form-control" placeholder="Name">
                        @error('trainer_name')
                            <span style="color: red;">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Trainer CPR --}}
                    <div class="col-md-4">
                        <label for="trainer_cpr" class="form-label">Trainer CPR <span class="text-danger"> *</span></label>
                        <input type="number" name="trainer_cpr" id="trainer_cpr" class="form-control" placeholder="Add only digits!">
                        @error('trainer_cpr')
                            <span style="color: red;">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- License Code --}}
                    <div class="col-md-4">
                        <label for="license_code" class="form-label">License Code <span class="text-danger"> *</span></label>
                        <input type="text" name="license_code" id="license_code" class="form-control">
                        @error('license_code')
                            <span style="color: red;">{{ $message }}</span>
                        @enderror
                    </div>

                    
                    {{-- Training Code/Field --}}
                    <div class="col-md-4 mt-3">
                        <label for="trainer_field" class="form-label">Training Field <span class="text-danger">
                                *</span></label>
                        <select class="form-control" name="training_fields" id="trainer_field">
                            <option value="Full Time">Cybersecurity</option>
                            <option value="Big Data Science">Big Data Science</option>
                            <option value="Artificial Intelligence">Artificial Intelligence</option>
                            <option value="Tallent Management">Tallent Management</option>
                            <option value="Strategy">Strategy</option>
                            <option value="Coorporate Governance">Coorporate Governance</option>
                            <option value="Networking">Networking</option>
                            <option value="Health & Safety">Health & Safety</option>
                            <option value="Supply Chain">Supply Chain</option>
                        </select>
                        @error('training_fields')
                            <span style="color: red;">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Nationality --}}
                    <div class="col-md-4 mt-3">
                        <label for="trainer_license_code" class="form-label">Nationality <span class="text-danger">
                                *</span></label>
                        <div class="form-check">
                            <input type="radio" name="nationality" class="form-check-input" value="Bahraini" id="nationality">
                            <label class="form-check-label" for="nationality">
                                Bahraini
                            </label>
                        </div>
                        <div class="form-check">
                            <input type="radio" name="nationality" class="form-check-input" value="Non-Bahraini" id="nationality">
                            <label class="form-check-label" for="nationality">
                                Non-Bahraini
                            </label>
                        </div>
                        @error('nationality')
                            <span style="color: red;">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Employment Status --}}
                    <div class="col-md-4 mt-3">
                        <label for="trainer_license_code" class="form-label">Employement Status <span class="text-danger">
                                *</span></label>
                        <select class="form-control" name="employment_status">
                            <option value="Full Time">Full Time</option>
                            <option value="Part Time">Part Time</option>
                            <option value="Part Time">Visitor</option>
                        </select>
                        @error('employment_status')
                            <span style="color: red;">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Issue Date --}}
                    <div class="col-md-6 mt-3">
                        <label for="issue_date" class="form-label">Issue Date <span class="text-danger"> *</span></label>
                        <input type="date" name="issue_date" id="issue_date" class="form-control">
                        @error('issue_date')
                            <span style="color: red;">{{ $message }}</span>
                        @enderror
                    </div>

                    
                    {{-- Expiry Date --}}
                    <div class="col-md-6 mt-3">
                        <label for="expiry_date" class="form-label">Expiry Date <span class="text-danger"> *</span></label>
                        <input type="date" name="expiry_date" id="expiry_date" class="form-control">
                        @error('expiry_date')
                            <span style="color: red;">{{ $message }}</span>
                        @enderror
                    </div>


                    <div class="col-md-12 mt-3 text-center">
                        <button type="submit" class="btn btn-round btn-success">Add</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
