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
                            <th scope="col">Name</th>
                            <th scope="col">Email</th>
                            <th scope="col">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($child_admins as $key => $item)
                            <tr>
                                <th scope="row">{{ $key + 1 }}</th>
                                <td>{{ $item->name }}</td>
                                <td>{{ $item->email }}</td>
                                {{-- Action --}}
                                <td>
                                    <a href="{{ route('edit.course', $item->id) }}" title="Edit"><i class="fa fa-edit p-1"></i></a>
                                    <a href="{{ route('view.course', $item->id) }}" title="View"><i class="fa fa-eye p-1"></i></a>

                                    
                                    <a href="{{ route('view.course', $item->id) }}" title=""><i class="fa fa-power-off"></i> </i></a>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                    {{ $child_admins->links() }}
                </table>
            </div>
        </div>
    </div>
@endsection
