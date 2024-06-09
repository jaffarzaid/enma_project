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
                                    <a href="{{ route('edit.childAdmin', $item->id) }}" title="Edit"><i
                                            class="fa fa-edit p-1"></i></a>
                                    {{-- <a href="{{ route('view.course', $item->id) }}" title="View"><i class="fa fa-eye p-1"></i></a> --}}

                                    @if ($item->status == 1)
                                        <form action="{{ route('deactivate.child_admin', $item->id) }}" method="POST"
                                            style="display:inline;">
                                            @csrf
                                            <button type="submit" class="btn btn-link p-0 m-0" title="Deactivate">
                                                <i class="fa-solid fa-power-off badge-success p-1"></i>
                                            </button>
                                        </form>
                                    @else
                                        <form method="POST" action="{{ route('activate.child_admin', $item->id) }}" style="display:inline;">
                                            @csrf
                                            <button type="submit" class="btn btn-link p-0 m-0" title="Activate">
                                                <i class="fa-solid fa-power-off badge-danger p-1"></i>
                                            </button>
                                        </form>
                                    @endif


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
