@extends('backend.master_admin')

@section('dynamic')
    <span class="count_top"><i class="fa fa-home"></i> <span class="green"> / All Trainees</span></span>
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
                            <th scope="col">Qualification</th>
                            <th scope="col">Specialization</th>
                            <th scope="col">Approval Status</th>
                            <th scope="col">Sponsorship Name</th>
                            <th scope="col">Trainee Type</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($pending_trainees as $trainee)
                            <tr>
                                <th scope="row">{{ $loop->iteration }}</th>
                                <td>{{ $trainee->f_name . ' ' . $trainee->s_name . ' ' . $trainee->l_name }}</td>
                                <td>{{ $trainee->cpr }}</td>
                                <td>{{ $trainee->nationality }}</td>
                                <td>{{ $trainee->phone1 . ' / ' . $trainee->phone2 }}</td>
                                <td>{{ $trainee->qualification }}</td>
                                <td>{{ $trainee->specialization }}</td>
                                <td>
                                    <h6><span class="badge badge-warning">Pending</span></h6>
                                </td>
                                <td>
                                    {{ $trainee->program_sponsorship }}
                                </td>
                                <td>
                                    {{ $trainee->trainee_type }}
                                </td>
                                <td>
                                    <a class="btn btn-sm btn-primary"
                                        href="{{ route('edit.trainee.info', $trainee->trainee_id) }}" title="Edit"><i
                                            class="fa fa-edit"></i></a>
                                    <a class="btn btn-sm btn-success"
                                        href="{{ route('view.trainee.details', $trainee->trainee_id) }}" title="Approve"><i
                                            class="fa fa-thumbs-up"></i></a>
                                    <a class="btn btn-sm btn-info"
                                        href="{{ route('read.trainee.details', $trainee->trainee_id) }}" title="View"><i
                                            class="fa fa-eye p-1"></i></a>
                                    <a class="btn btn-sm btn-secondary"
                                        href="{{ route('trainee.history.details', $trainee->id) }}"
                                        title="Trainee History"><i class="fa fa-history p-1"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
