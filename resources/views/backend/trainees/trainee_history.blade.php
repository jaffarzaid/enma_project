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

            {{-- Nationality --}}
            <h6 class="card-title">Nationality: <label class="text-danger">{{ $current_trainee->nationality }}</label></h6>

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
                    {{-- Loop to display courses taken By Bahraini National supported by Tamkeen --}}
                    @if ($current_trainee->nationality == 'Bahraini')
                        @foreach ($all_training_tmk_courses as $item)
                            <tr>
                                <th scope="row">{{ ++$rowNum }}</th>
                                <td class="text-left">
                                    @if (!empty($item->tamkeen_course_name))
                                        {{ $item->tamkeen_course_name }}
                                    @else
                                        No Course Name
                                    @endif
                                </td>
                                <td>
                                    @if (!empty($item->tamkeen_approval_status))
                                        @if ($item->tamkeen_approval_status == 'Accepted')
                                            <h6><span class="badge badge-success">Accepted</span></h6>
                                        @elseif ($item->tamkeen_approval_status == 'Pending')
                                            <h6><span class="badge badge-warning">Pending</span></h6>
                                        @else
                                            <h6><span class="badge badge-danger">Rejected</span></h6>
                                        @endif
                                    @else
                                        <h6><span class="badge badge-secondary">Not Available</span></h6>
                                    @endif
                                </td>
                                <td>
                                    {{ $item->tamkeen_program_sponsorship ?? '' }}
                                </td>
                                <td>
                                    {{ $item->tamkeen_training_service ?? '' }}
                                </td>
                                <td>
                                    {{ $item->tamkeen_trainee_type ?? '' }}
                                </td>
                                <td>
                                    {{ isset($item->tamkeen_creation) ? \Carbon\Carbon::parse($item->tamkeen_creation)->format('Y-m-d') : '' }}
                                </td>
                            </tr>
                        @endforeach

                        {{-- Loop to display Preparatory courses taken By Bahraini National --}}
                        @foreach ($all_preparatory_courses as $item)
                            <tr>
                                <th scope="row">{{ ++$rowNum }}</th>
                                <td class="text-left">
                                    @if (!empty($item->preparatory_course_name))
                                        {{ $item->preparatory_course_name }}
                                    @else
                                        No Course Name
                                    @endif
                                </td>
                                <td>
                                    @if (!empty($item->preparatory_approval_status))
                                        @if ($item->preparatory_approval_status == 'Accepted')
                                            <h6><span class="badge badge-success">Accepted</span></h6>
                                        @elseif ($item->preparatory_approval_status == 'Pending')
                                            <h6><span class="badge badge-warning">Pending</span></h6>
                                        @else
                                            <h6><span class="badge badge-danger">Rejected</span></h6>
                                        @endif
                                    @else
                                        <h6><span class="badge badge-secondary">Not Available</span></h6>
                                    @endif
                                </td>
                                <td>
                                    {{ $item->preparatory_program_sponsorship ?? '' }}
                                </td>
                                <td>
                                    {{ $item->preparatory_training_service ?? '' }}
                                </td>
                                <td>
                                    {{ $item->preparatory_trainee_type ?? '' }}
                                </td>
                                <td>
                                    {{ isset($item->preparatory_creation) ? \Carbon\Carbon::parse($item->preparatory_creation)->format('Y-m-d') : '' }}
                                </td>
                            </tr>
                        @endforeach
                    @endif

                    {{-- Loop to display courses taken By Non-Bahraini Nationals --}}
                    @if ($current_trainee->nationality != 'Bahraini')
                        @foreach ($all_nonBh_courses as $item)
                            <tr>
                                <th scope="row">{{ ++$rowNum }}</th>
                                <td class="text-left">
                                    @if (!empty($item->non_bh_course_name))
                                        {{ $item->non_bh_course_name }}
                                    @else
                                        No Course Name
                                    @endif
                                </td>
                                <td>
                                    @if (!empty($item->non_bh_approval_status))
                                        @if ($item->non_bh_approval_status == 'Accepted')
                                            <h6><span class="badge badge-success">Accepted</span></h6>
                                        @elseif ($item->non_bh_approval_status == 'Pending')
                                            <h6><span class="badge badge-warning">Pending</span></h6>
                                        @else
                                            <h6><span class="badge badge-danger">Rejected</span></h6>
                                        @endif
                                    @else
                                        <h6><span class="badge badge-secondary">Not Available</span></h6>
                                    @endif
                                </td>
                                <td>
                                    {{ $item->non_bh_program_sponsorship ?? '' }}
                                </td>
                                <td>
                                    {{ $item->non_bh_training_service ?? '' }}
                                </td>
                                <td>
                                    {{ $item->non_bh_trainee_type ?? '' }}
                                </td>
                                <td>
                                    {{ isset($item->non_bh_creation) ? \Carbon\Carbon::parse($item->non_bh_creation)->format('Y-m-d') : '' }}
                                </td>
                            </tr>
                        @endforeach

                        {{-- Loop to display Preparatory courses taken By Non-Bahraini National --}}
                        @foreach ($all_preparatory_courses as $item)
                            <tr>
                                <th scope="row">{{ ++$rowNum }}</th>
                                <td class="text-left">
                                    @if (!empty($item->preparatory_course_name))
                                        {{ $item->preparatory_course_name }}
                                    @else
                                        No Course Name
                                    @endif
                                </td>
                                <td>
                                    @if (!empty($item->preparatory_approval_status))
                                        @if ($item->preparatory_approval_status == 'Accepted')
                                            <h6><span class="badge badge-success">Accepted</span></h6>
                                        @elseif ($item->preparatory_approval_status == 'Pending')
                                            <h6><span class="badge badge-warning">Pending</span></h6>
                                        @else
                                            <h6><span class="badge badge-danger">Rejected</span></h6>
                                        @endif
                                    @else
                                        <h6><span class="badge badge-secondary">Not Available</span></h6>
                                    @endif
                                </td>
                                <td>
                                    {{ $item->preparatory_program_sponsorship ?? '' }}
                                </td>
                                <td>
                                    {{ $item->preparatory_training_service ?? '' }}
                                </td>
                                <td>
                                    {{ $item->preparatory_trainee_type ?? '' }}
                                </td>
                                <td>
                                    {{ isset($item->preparatory_creation) ? \Carbon\Carbon::parse($item->preparatory_creation)->format('Y-m-d') : '' }}
                                </td>
                            </tr>
                        @endforeach
                    @endif
                </tbody>
            </table>
        </div>
    </div>
@endsection
