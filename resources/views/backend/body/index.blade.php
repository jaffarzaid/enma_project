@extends('backend.master_admin')

@section('dynamic')
    <span class="count_top"><i class="fa fa-home"></i> <span class="green"> / Dashboard</span></span>
    <br>
    <div class="row mt-4">
        <div class="col-md-3">
            <div class="tile-stats">
                <h4 class="p-3">Total Students Number</h4>
                <div class="icon"><i class="fa fa-caret-square-o-right"></i></div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="tile-stats">
                <h4 class="p-3">Total Students Number</h4>
                <div class="icon"><i class="fa fa-caret-square-o-right"></i></div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="tile-stats bg-success">
                <h4 class="p-3" style="color: whitesmoke;">Total Passed Student</h4>
                <div class="icon"><i class="fa fa-caret-square-o-right"></i></div>
            </div>
        </div>

        <div class="col-md-3">
            <div class="tile-stats bg-danger">
                <h4 class="p-3" style="color: whitesmoke;">Total Rejected Student</h4>
                <div class="icon"><i class="fa fa-caret-square-o-right"></i></div>
            </div>
        </div>
        
    </div>
@endsection
