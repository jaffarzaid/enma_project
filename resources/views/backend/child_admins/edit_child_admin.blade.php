@extends('backend.master_admin')

@section('dynamic')
    <span class="count_top"><i class="fa fa-home"></i> <span class="green"> / Create Child Admin</span></span>
    <br>
    <div class="card mt-3">
        <div class="card-body">
            <form method="POST" action="{{ route('update.child.admin', $curr_child_admin->id) }}">
                @csrf
                <div class="row">
                    {{-- Trainer Name --}}
                    <div class="col-md-6">
                        <label for="emp_name" class="form-label">Employee Name <span class="text-danger"> *</span></label>
                        <input type="text" name="emp_name" id="emp_name" class="form-control" value="{{ $curr_child_admin->name }}" placeholder="Name" required>
                        @error('emp_name')
                            <span style="color: red;">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Employee Email --}}
                    <div class="col-md-6">
                        <label for="email" class="form-label">Employess Email <span class="text-danger">
                                *</span></label>
                        <input type="emp_email" name="emp_email" id="emp_email" class="form-control" pattern="[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}" value="{{ $curr_child_admin->email }}" required>
                        @error('emp_email')
                            <span style="color: red;">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Employee Password --}}
                    <div class="col-md-6 mt-3">
                        <label for="password" class="form-label">Password</label>
                        <input type="password" name="password" id="password" class="form-control" placeholder="Password">
                        @error('password')
                            <span style="color: red;">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Employee Password Confirmation --}}
                    <div class="col-md-6 mt-3">
                        <label for="password_confirmation" class="form-label">Confirm Password</label>
                        <input type="password" name="password_confirmation" id="password_confirmation" class="form-control" placeholder="Confirm Password">
                        @error('password_confirmation')
                            <span style="color: red;">{{ $message }}</span>
                        @enderror
                    </div>

                    {{-- Access Type: Viewer / Not Viewer --}}
                    <div class="col-md-6 mt-3">
                        <h2>Access Type</h2>
                        <p style="padding: 5px;">
                            <input type="checkbox" name="viewer_account" id="viewer_account" class="flat" {{ $curr_child_admin->is_viewer == 1 ? 'checked' : '' }} /> Veiwer
                        </p>
                    </div>

                    {{-- Access to Sections --}}
                    <div class="col-md-6 mt-3">
                        <h2>Sections</h2>
                        <p style="padding: 5px;">
                            <input type="checkbox" name="list_of_trainees" {{ $curr_child_admin->list_of_trainees == 1 ? 'checked' : '' }} class="flat" /> Trainees
                            <br />
                            <input type="checkbox" name="list_of_trainers" {{ $curr_child_admin->list_of_trainers == 1 ? 'checked' : '' }} class="flat" /> Trainers
                            <br />
                            <input type="checkbox" name="courses" {{ $curr_child_admin->courses == 1 ? 'checked' : '' }} class="flat" /> Courses
                            <br />
                            <input type="checkbox" name="examination" {{ $curr_child_admin->examination == 1 ? 'checked' : '' }} class="flat" /> Examination
                            <br />
                            <input type="checkbox" name="learning_support" {{ $curr_child_admin->learning_support == 1 ? 'checked' : '' }} class="flat" /> Learning Support
                            <br />
                            <input type="checkbox" name="reading_materials" {{ $curr_child_admin->reading_materials == 1 ? 'checked' : '' }} class="flat" /> Reading Materials
                            <br />
                            {{-- <input type="checkbox" name="child_admin" {{ $curr_child_admin->child_admin == 1 ? 'checked' : '' }} class="flat" /> child_admin --}}
                            <br />
                        </p>
                    </div>
                    <div class="col-md-12 mt-3 text-center">
                        <button type="submit" class="btn btn-primary">Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
@endsection
