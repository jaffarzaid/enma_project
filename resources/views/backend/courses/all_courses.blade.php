@extends('backend.master_admin')

@section('dynamic')
    <span class="count_top"><i class="fa fa-home"></i> <span class="green"> / All Courses</span></span>
    <br>

    <div class="card mt-3">
        <div class="card-body">
            <div class="row">
                <table class="table table-bordered table-hover text-center">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Awarding Body</th>
                            <th scope="col">Course Code</th>
                            <th scope="col">Course Name</th>
                            <th scope="col">License Code</th>
                            <th scope="col">No. of hours</th>
                            <th scope="col">MOL Approval</th>
                            <th scope="col">Issue Date</th>
                            <th scope="col">Expiry Date</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($courses as $key => $course)
                            <tr>
                                <th scope="row">{{ $key + 1 }}</th>
                                <td>{{ $course->awarding_body }}</td>
                                <td>{{ $course->course_code }}</td>
                                <td class="text-left">{{ $course->course_name }}</td>
                                <td>{{ $course->license_code }}</td>
                                <td>{{ $course->num_of_hours }}</td>
                                <td>{{ $course->mol_level }}</td>
                                <td>{{ $course->issue_date }}</td>
                                <td>
                                    @if ($course->expiry_date < Carbon\Carbon::now())
                                        {{-- <span class="text-danger"><b>{{ $trainer->expiry_date }}</b></span> --}}
                                        <span class="badge badge-danger" style="font-size: 13px;">{{ $course->expiry_date }}</span>
                                    @else
                                        {{ $course->expiry_date }}
                                    @endif
                                </td>
                                {{-- Action --}}
                                <td>
                                    <a class="btn btn-sm btn-primary" href="{{ route('edit.course', $course->id) }}" title="Edit"><i class="fa fa-edit p-1"></i></a>
                                    <a class="btn btn-sm btn-info" href="{{ route('view.course', $course->id) }}" title="View"><i class="fa fa-eye p-1"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $courses->links() }}
            </div>
        </div>
    </div>
@endsection
