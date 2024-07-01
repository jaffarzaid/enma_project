@extends('backend.master_admin')

@section('dynamic')
    <span class="count_top"><i class="fa fa-home"></i> <span class="green"> / All Trainers</span></span>
    <br>
    <div class="card mt-3">
        <div class="card-body">
            <div class="row">
                <table class="table table-bordered table-hover text-center">
                    <thead>
                        <tr>
                            <th scope="col">No</th>
                            <th scope="col">CPR</th>
                            <th scope="col">Trainer Name</th>
                            <th scope="col">License Code</th>
                            <th scope="col">Employment Status</th>
                            <th scope="col">Training Field</th>
                            <th scope="col">Nationality</th>
                            <th scope="col">Issue Date</th>
                            <th scope="col">Expiry Date</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($trainers as $key => $trainer)
                            <tr>
                                <th scope="row">{{ $key + 1 }}</th>
                                <td>{{ $trainer->cpr }}</td>
                                <td class="text-left">{{ $trainer->name }}</td>
                                <td>{{ $trainer->license_code }}</td>
                                <td>{{ $trainer->employment_status }}</td>
                                <td>{{ $trainer->training_field }}</td>
                                <td>{{ $trainer->nationality }}</td>
                                <td>{{ $trainer->issue_date }}</td>
                                <td>
                                    @if ($trainer->expiry_date < Carbon\Carbon::now())
                                        {{-- <span class="text-danger"><b>{{ $trainer->expiry_date }}</b></span> --}}
                                        <span class="badge badge-danger" style="font-size: 13px;">
                                            {{ $trainer->expiry_date }}</span>
                                    @else
                                        {{ $trainer->expiry_date }}
                                    @endif

                                </td>
                                <td>
                                    <a href="{{ route('edit.trainer', $trainer->id) }}" title="Edit"><i
                                            class="fa fa-edit"></i></a>
                                    <a href="{{ route('view.trainer.details', $trainer->id) }}" title="View"><i
                                            class="fa fa-eye p-1"></i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
                {{ $trainers->links() }}
            </div>
        </div>
    </div>
@endsection
