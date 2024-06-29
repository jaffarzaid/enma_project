@extends('backend.master_admin')

@section('dynamic')
    @php
        use Carbon\Carbon;
    @endphp
    <span class="count_top"><i class="fa fa-home"></i>
        <span class="green"> / Trainee History </span>
    </span>
    <br>
    <div class="card m-3">
        <div class="card-body">

            {{-- Name --}}
            <h6 class="card-title">Name: <label
                    class="text-danger">{{ $current_trainee->f_name . ' ' . $current_trainee->s_name . ' ' . $current_trainee->l_name }}</label>
            </h6>

            {{-- CPR --}}
            <h6 class="card-title">CPR: <label class="text-danger">{{ $current_trainee->cpr }}</label></h6>

            {{-- Phone --}}
            <h6 class="card-title">Phone:
                <label class="text-danger">{{ $current_trainee->phone1 }}</label>
                <span class="text-danger">/</span>
                <label class="text-danger">{{ $current_trainee->phone2 }}</label>
            </h6>

            {{-- Qualification --}}
            <h6 class="card-title">Qualification: <label class="text-danger">{{ $current_trainee->qualification }}</label>
            </h6>

            {{-- Specialization --}}
            <h6 class="card-title">Specialization: <label class="text-danger">{{ $current_trainee->specialization }}</label>
            </h6>

            <table class="table table-bordered table-hover text-center">
                <thead>
                    <tr>
                        <th scope="col">No</th>
                        <th scope="col">Course Name</th>
                        <th scope="col">Approval Status</th>
                        <th scope="col">Sponsorship Name</th>
                        <th scope="col">Training Service</th>
                        <th scope="col">Trainee Type</th>
                        <th scope="col">Application Date</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($all_trainingEntities as $key => $item)
                        @if (
                            !empty($item->tamkeen_course_name) ||
                                !empty($item->preparatory_course_name) ||
                                !empty($item->non_bahraini_course_name))
                            <tr>
                                <th scope="row">{{ $key + 1 }}</th>
                                <td>
                                    @if (!empty($item->tamkeen_course_name))
                                        {{ $item->tamkeen_course_name }}
                                    @elseif (!empty($item->preparatory_course_name))
                                        {{ $item->preparatory_course_name }}
                                    @elseif (!empty($item->non_bahraini_course_name))
                                        {{ $item->non_bahraini_course_name }}
                                    @else
                                        No Course Name
                                    @endif
                                </td>
                                <td>
                                    @if (!empty($item->tamkeen_course_name))
                                        {!! $item->tamkeen_approval_status == 'Accepted'
                                            ? '<h6><span class="badge badge-success">Accepted</span></h6>'
                                            : '<h6><span class="badge badge-danger">Rejected</span></h6>' !!}
                                    @elseif (!empty($item->preparatory_course_name))
                                        {!! $item->preparatory_approval_status == 'Accepted'
                                            ? '<h6><span class="badge badge-success">Accepted</span></h6>'
                                            : '<h6><span class="badge badge-danger">Rejected</span></h6>' !!}
                                    @elseif (!empty($item->non_bahraini_course_name))
                                        {!! $item->non_bahraini_approval_status == 'Accepted'
                                            ? '<h6><span class="badge badge-success">Accepted</span></h6>'
                                            : '<h6><span class="badge badge-danger">Rejected</span></h6>' !!}
                                    @endif
                                </td>
                                <td>
                                    @if (!empty($item->tamkeen_course_name))
                                        {{ $item->tamkeen_program_sponsorship }}
                                    @elseif (!empty($item->preparatory_course_name))
                                        {{ $item->preparatory_program_sponsorship }}
                                    @elseif (!empty($item->non_bahraini_course_name))
                                        {{ $item->non_bahraini_program_sponsorship }}
                                    @endif
                                </td>
                                <td>
                                    @if (!empty($item->tamkeen_course_name))
                                        {{ $item->tamkeen_training_service }}
                                    @elseif (!empty($item->preparatory_course_name))
                                        {{ $item->preparatory_training_service }}
                                    @elseif (!empty($item->non_bahraini_course_name))
                                        {{ $item->non_bahraini_training_service }}
                                    @endif
                                </td>
                                <td>
                                    @if (!empty($item->tamkeen_course_name))
                                        {{ $item->tamkeen_trainee_type }}
                                    @elseif (!empty($item->preparatory_course_name))
                                        {{ $item->preparatory_trainee_type }}
                                    @elseif (!empty($item->non_bahraini_course_name))
                                        {{ $item->non_bahraini_trainee_type }}
                                    @endif
                                </td>
                                <td>
                                    @if (!empty($item->tamkeen_course_name))
                                        {{ Carbon::parse($item->tamkeen_creation)->format('Y-m-d') }}
                                    @elseif (!empty($item->preparatory_course_name))
                                        {{ Carbon::parse($item->preparatory_creation)->format('Y-m-d') }}
                                    @elseif (!empty($item->non_bahraini_course_name))
                                        {{ Carbon::parse($item->non_bahraini_creation)->format('Y-m-d') }}
                                    @endif
                                </td>
                            </tr>
                        @endif
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
