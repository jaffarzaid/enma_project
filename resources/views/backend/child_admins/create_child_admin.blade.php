@extends('backend.master_admin')

@section('dynamic')
    <span class="count_top"><i class="fa fa-home"></i> <span class="green"> / Create Child Admin</span></span>
    <br>
    <div class="card mt-3">
        <div class="card-body">
            <form method="POST" action="{{ route('register') }}">
                @csrf
                <div class="row">
                    {{-- Trainer Name --}}
                    <div class="col-md-6">
                        <label for="name" class="form-label">Employee Name <span class="text-danger"> *</span></label>
                        <input type="text" name="name" id="name" class="form-control" placeholder="Name" required>
                        @error('name')
                            <span style="color: red;">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Employee Email --}}
                    <div class="col-md-6">
                        <label for="email" class="form-label">Employess Email <span class="text-danger">
                                *</span></label>
                        <input type="email" name="email" id="email" class="form-control"
                            pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}" placeholder="Email" required>
                        @error('email')
                            <span style="color: red;">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Employee Password --}}
                    <div class="col-md-6 mt-3">
                        <label for="license_code" class="form-label">Password <span class="text-danger"> *</span></label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
                        @error('password')
                            <span style="color: red;">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Employee Password Confirmation --}}
                    <div class="col-md-6 mt-3">
                        <label for="password_confirmation" class="form-label">Confirm Password <span class="text-danger">
                                *</span></label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Confirm Password" required>
                        @error('password_confirmation')
                            <span style="color: red;">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Access Type: Viewer / Not Viewer --}}
                    <div class="col-md-6 mt-3">
                        <h2>Access Type</h2>
                        <p style="padding: 5px;">
                            <input type="checkbox" name="hobbies[]" id="hobby1" value="ski" class="flat" /> Veiwer
                        </p>

                    </div>

                    {{-- Access to Sections --}}
                    <div class="col-md-6 mt-3">
                        <h2>Sections</h2>
                        <p style="padding: 5px;">
                            <input type="checkbox" name="list_of_trainees" id="hobby1" value="ski" class="flat" /> List of Trainees
                            <br />
                            <input type="checkbox" name="courses" id="hobby2" value="run" class="flat" /> Courses
                            <br />
                            <input type="checkbox" name="list_of_trainers" id="hobby3" value="eat" class="flat" /> List of Trainers
                            <br />
                            <input type="checkbox" name="examination" id="hobby4" value="sleep" class="flat" /> Examination
                            <br />
                            <input type="checkbox" name="child_admin" id="hobby4" value="sleep" class="flat" /> child_admin
                            <br />
                        </p>
                    </div>
                    <div class="col-md-12 mt-3 text-center">
                        <button type="submit" class="btn btn-primary">Create</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
