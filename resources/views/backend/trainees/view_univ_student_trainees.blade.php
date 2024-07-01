@extends('backend.master_admin')

@section('dynamic')
    <span class="count_top"><i class="fa fa-home"></i> <span class="green"> / All Univeristy Student Trainees</span></span>
    <br>

    <div class="card mt-3">
        <div class="card-body">
            <div class="row">
                <table class="table table-bordered table-hover text-center">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Trainee Name</th>
                            <th scope="col">CPR</th>
                            <th scope="col">Nationality</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Email</th>
                            <th scope="col">Qualification</th>
                            <th scope="col">Specialization</th>
                            <th scope="col">Approval Status</th>
                            <th scope="col">Sponsorship Name</th>
                            <th scope="col">Trainee Type</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($univ_student_trainees as $trainee)
                            @php
                                $isUniversityStudent = false;
                                $hasOtherType = false;

                                // Check if the trainee is marked as a University Student in tamkeen_registered_courses
                                if (
                                    isset($trainee_tm[$trainee->id]) &&
                                    $trainee_tm[$trainee->id]->trainee_type == 'University Student'
                                ) {
                                    $isUniversityStudent = true;
                                }

                                // Check if the trainee is marked as a University Student in preparatory_registered_courses
                                if (
                                    isset($trainee_pre[$trainee->id]) &&
                                    $trainee_pre[$trainee->id]->trainee_type == 'University Student'
                                ) {
                                    $isUniversityStudent = true;
                                }

                                // Check if the trainee is marked as a University Student in non_bahraini_registered_courses
                                if (
                                    isset($trainee_non_bh[$trainee->id]) &&
                                    $trainee_non_bh[$trainee->id]->trainee_type == 'University Student'
                                ) {
                                    $isUniversityStudent = true;
                                }

                                // Check if the trainee has other types in tamkeen_registered_courses
                                if (
                                    isset($trainee_tm[$trainee->id]) &&
                                    $trainee_tm[$trainee->id]->trainee_type != 'University Student'
                                ) {
                                    $hasOtherType = true;
                                }

                                // Check if the trainee has other types in preparatory_registered_courses
                                if (
                                    isset($trainee_pre[$trainee->id]) &&
                                    $trainee_pre[$trainee->id]->trainee_type != 'University Student'
                                ) {
                                    $hasOtherType = true;
                                }

                                // Check if the trainee has other types in non_bahraini_registered_courses
                                if (
                                    isset($trainee_non_bh[$trainee->id]) &&
                                    $trainee_non_bh[$trainee->id]->trainee_type != 'University Student'
                                ) {
                                    $hasOtherType = true;
                                }
                            @endphp

                            {{-- Apply the logic similar to SQL NOT EXISTS condition --}}
                            @if ($isUniversityStudent && !$hasOtherType)
                                <tr>
                                    <td>{{ ++$rowNum }}</td>
                                    <td class="text-left">
                                        {{ $trainee->f_name . ' ' . $trainee->s_name . ' ' . $trainee->l_name }}</td>
                                    <td>{{ $trainee->cpr }}</td>
                                    <td>{{ $trainee->nationality }}</td>
                                    <td>{{ $trainee->phone1 . ' / ' . $trainee->phone2 }}</td>
                                    <td>{{ $trainee->email }}</td>
                                    <td>{{ $trainee->qualification }}</td>
                                    <td>{{ $trainee->specialization }}</td>
                                    <td>
                                        @php
                                            $status = '';
                                            if (
                                                isset($trainee_tm[$trainee->id]) &&
                                                property_exists($trainee_tm[$trainee->id], 'approval_status')
                                            ) {
                                                $status = $trainee_tm[$trainee->id]->approval_status;
                                            } elseif (
                                                isset($trainee_pre[$trainee->id]) &&
                                                property_exists($trainee_pre[$trainee->id], 'approval_status')
                                            ) {
                                                $status = $trainee_pre[$trainee->id]->approval_status;
                                            } elseif (
                                                isset($trainee_non_bh[$trainee->id]) &&
                                                property_exists($trainee_non_bh[$trainee->id], 'approval_status')
                                            ) {
                                                $status = $trainee_non_bh[$trainee->id]->approval_status;
                                            }
                                        @endphp
                                        @if ($status === 'Pending')
                                            <h6><span class="badge badge-warning">Pending</span></h6>
                                        @elseif ($status === 'Accepted')
                                            <h6><span class="badge badge-success">Accepted</span></h6>
                                        @else
                                            <h6><span class="badge badge-danger">Rejected</span></h6>
                                        @endif
                                    </td>
                                    <td>
                                        @php
                                            $latest_sponsorship = '';
                                            if (isset($trainee_tm[$trainee->id])) {
                                                $latest_sponsorship = $trainee_tm[$trainee->id]->program_sponsorship;
                                            }
                                            if (isset($trainee_pre[$trainee->id])) {
                                                $latest_sponsorship = $trainee_pre[$trainee->id]->program_sponsorship;
                                            }
                                            if (isset($trainee_non_bh[$trainee->id])) {
                                                $latest_sponsorship =
                                                    $trainee_non_bh[$trainee->id]->program_sponsorship;
                                            }
                                        @endphp
                                        {{ $latest_sponsorship }}
                                    </td>
                                    <td>
                                        @php
                                            $latest_type = '';
                                            if (isset($trainee_tm[$trainee->id])) {
                                                $latest_type = $trainee_tm[$trainee->id]->trainee_type;
                                            }
                                            if (isset($trainee_pre[$trainee->id])) {
                                                $latest_type = $trainee_pre[$trainee->id]->trainee_type;
                                            }
                                            if (isset($trainee_non_bh[$trainee->id])) {
                                                $latest_type = $trainee_non_bh[$trainee->id]->trainee_type;
                                            }
                                        @endphp
                                        {{ $latest_type }}
                                    </td>
                                    <td>
                                        <a class="btn btn-sm btn-primary" href="{{ route('edit.trainer', $trainee->id) }}"
                                            title="Edit"><i class="fa fa-edit"></i></a>
                                        <a class="btn btn-sm btn-info"
                                            href="{{ route('read.trainee.details', $trainee->id) }}" title="View"><i
                                                class="fa fa-eye"></i></a>
                                        <a class="btn btn-sm btn-secondary"
                                            href="{{ route('trainee.history.details', $trainee->id) }}"
                                            title="Trainee History"><i class="fa fa-history"></i></a>
                                    </td>
                                </tr>
                            @endif
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
