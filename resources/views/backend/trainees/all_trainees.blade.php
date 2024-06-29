@extends('backend.master_admin')

@section('dynamic')
    <span class="count_top"><i class="fa fa-home"></i> <span class="green"> / All Trainees</span></span>
    <br>

    <div class="mt-3 card">
        <div class="card-body">
            <div class="row">
                <table class="table text-center table-bordered table-hover">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">Trainee Name</th>
                            <th scope="col">CPR</th>
                            <th scope="col">Nationality</th>
                            <th scope="col">Phone</th>
                            <th scope="col">Qualification</th>
                            <th scope="col">Specialization</th>
                            <th scope="col">Approval Status</th>
                            <th scope="col">Sponsorship Name</th>
                            <th scope="col">Trainee Type</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($all_trainees as $key => $trainee)
                            <tr>
                                <th scope="row">
                                    {{ ($all_trainees->currentPage() - 1) * $all_trainees->perPage() + $key + 1 }}</th>
                                <td>{{ $trainee->f_name . ' ' . $trainee->s_name . ' ' . $trainee->l_name }}</td>
                                <td>{{ $trainee->cpr }}</td>
                                <td>{{ $trainee->nationality }}</td>
                                <td>{{ $trainee->phone1 . ' / ' . $trainee->phone2 }}</td>
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
                                    @if (isset($trainee_tm[$trainee->id]))
                                        {{ $trainee_tm[$trainee->id]->program_sponsorship }} <br>
                                    @endif
                                    @if (isset($trainee_pre[$trainee->id]))
                                        {{ $trainee_pre[$trainee->id]->program_sponsorship }} <br>
                                    @endif
                                    @if (isset($trainee_non_bh[$trainee->id]))
                                        {{ $trainee_non_bh[$trainee->id]->program_sponsorship }}
                                    @endif
                                </td>
                                <td>
                                    {{ isset($trainee_tm[$trainee->id]) ? $trainee_tm[$trainee->id]->trainee_type : '' }}
                                    {{ isset($trainee_pre[$trainee->id]) ? $trainee_pre[$trainee->id]->trainee_type : '' }}
                                    {{ isset($trainee_non_bh[$trainee->id]) ? $trainee_non_bh[$trainee->id]->trainee_type : '' }}
                                </td>
                                <td>
                                    <a class="btn btn-sm btn-primary" href="{{ route('edit.trainee.info', $trainee->id) }}"
                                        title="Edit"><i class="fa fa-edit"></i></a>
                                    <a class="btn btn-sm btn-success"
                                        href="{{ route('view.trainee.details', $trainee->id) }}" title="Approve"><i
                                            class="fa fa-thumbs-up"></i></a>
                                    <a class="btn btn-sm btn-info" href="{{ route('read.trainee.details', $trainee->id) }}"
                                        title="View"><i class="p-1 fa fa-eye"></i></a>
                                    <a class="btn btn-sm btn-secondary"
                                        href="{{ route('trainee.history.details', $trainee->id) }}"
                                        title="Trainee History"><i class="p-1 fa fa-history"></i></a>
                                    <a class="btn btn-sm btn-danger"
                                        href="{{ route('download.trainee.files', $trainee->id) }}"
                                        title="Download Trainee Files"><i class="p-1 fa fa-download"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $all_trainees->links() }}
            </div>
        </div>
    </div>
@endsection
