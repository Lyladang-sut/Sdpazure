@extends('app')

@section('title')
    Dashboard
@endsection

@section('content')
    <div class="row">
        <div class="col-sm-6">
            <div class="widget no-border p-15 bg-purple media">
                <div class="media-left media-middle"><i class="media-object ti-user fs-36"></i></div>
                <div class="media-body">
                    <h6 class="m-0">Learners enrolled</h6>
                    <div class="fs-20">685 <span class="fs-12"><i class="ti-arrow-up fs-10"></i> 8%</span></div>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="widget no-border p-15 bg-success media">
                <div class="media-left media-middle"><i class="media-object ti-user fs-36"></i></div>
                <div class="media-body">
                    <h6 class="m-0">Women enrolled</h6>
                    <div class="fs-20">532 <span class="fs-12"><i class="ti-arrow-up fs-10"></i> 4%</span></div>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="widget no-border p-15 bg-danger media">
                <div class="media-left media-middle"><i class="media-object ti-user fs-36"></i></div>
                <div class="media-body">
                    <h6 class="m-0">Learners per course</h6>
                    <div class="fs-20">20 <span class="fs-12"><i class="ti-arrow-down fs-10"></i> 3%</span></div>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="widget no-border p-15 bg-warning media">
                <div class="media-left media-middle"><i class="media-object ti-user fs-36"></i></div>
                <div class="media-body">
                    <h6 class="m-0">Graduates</h6>
                    <div class="fs-20">20 <span class="fs-12"><i class="ti-arrow-down fs-10"></i> 4%</span></div>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="widget no-border p-15 bg-info media">
                <div class="media-left media-middle"><i class="media-object ti-user fs-36"></i></div>
                <div class="media-body">
                    <h6 class="m-0">Drop outs</h6>
                    <div class="fs-20">24 <span class="fs-12"><i class="ti-arrow-down fs-10"></i> 2%</span></div>
                </div>
            </div>
        </div>
        <div class="col-sm-6">
            <div class="widget no-border p-15 bg-primary media">
                <div class="media-left media-middle"><i class="media-object ti-user fs-36"></i></div>
                <div class="media-body">
                    <h6 class="m-0">Learners with Traineeship</h6>
                    <div class="fs-20">6114 <span class="fs-12"><i class="ti-arrow-up fs-10"></i> 4%</span></div>
                </div>
            </div>
        </div>
    </div>
@endsection