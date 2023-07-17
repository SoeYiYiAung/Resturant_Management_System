@extends('HMM.layouts.app')
@section('content')
    <div class="card ">
        <div class="card-header text-uppercase bg-primary  py-3 mb-3">
            <h5 class="p-0 m-0 text-white"><i class="bi bi-journal-plus me-2"></i> Edit Category</h5>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('category.update', $category->id) }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="col-lg-4 col-sm-12 col-md-6">
                        <div class="form-group">
                            <label class="required" for="category">Category Name</label>
                            <input class="form-control" type="text" name="category_name" id="category" value="{{$category['category_name']}}" required>
                        </div>
                    </div>
                </div>
                </div>
                    <div class="m-4 col-lg-12 col-md-12 col-sm-12">
                        <a class="btn btn-primary me-3" href="{{ route('category.index') }}">
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
