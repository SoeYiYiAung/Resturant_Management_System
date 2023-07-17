@extends('HMM.layouts.app')
@section('content')
    <div class="card ">
        <div class="card-header text-uppercase bg-primary  py-3 mb-3">
            <h5 class="p-0 m-0 text-white"><i class="bi bi-journal-plus me-2"></i> Edit Promotion</h5>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('promotion.update', $promotion->id) }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="col-lg-6 col-sm-12 col-md-6">
                        <div class="form-group">
                            <label class="required" for="promotion">Promotion Name</label>
                            <input class="form-control" type="text" name="promotion_name" id="promotion" value="{{$promotion->promotion_name}}" required>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12 col-md-6">
                        <div class="form-group">
                            <label class="required" for="promotion">Percent</label>
                            <input class="form-control" type="text" name="percent" id="percent" value="{{$promotion->percent}}" required>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12 col-md-6">
                        <div class="form-group">
                            <label class="required" for="promotion">Start Date</label>
                            <input class="form-control" type="date" name="start_date" id="promotion" value="{{$promotion->start_date}}" required>
                        </div>
                    </div>
                    <div class="col-lg-6 col-sm-12 col-md-6">
                        <div class="form-group">
                            <label class="required" for="promotion">End Date</label>
                            <input class="form-control" type="date" name="end_date" id="promotion" value="{{$promotion->end_date}}" required>
                        </div>
                    </div>
                </div>
                </div>
                    <div class="m-4 col-lg-12 col-md-12 col-sm-12">
                        <a class="btn btn-primary me-3" href="{{ route('promotion.index') }}">
                            Back To List
                          </a>
                        <button class="btn btn-danger" type="submit">
                            Save
                        </button>
                    </div>
            </form>
        </div>
    </div>
@endsection
