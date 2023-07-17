@extends('HMM.layouts.app')
@section('content')
    <div class="card ">
        <div class="card-header text-uppercase bg-dark  py-3 mb-3">
            <h5 class="p-0 m-0 text-white"><i class="bi bi-journal-plus me-2"></i> Create Food</h5>
        </div>
        <div class="card-body">
            <form method="POST" action="{{ route('available_food.update', $food->id) }}" enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="row">
                    <div class="col-lg-4 col-sm-12 col-md-6">
                        <div class="form-group">
                            <label class="required" for="name">Name</label>
                            <input class="form-control" type="text" name="name" id="name" required value="{{$food->name}}">
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12 col-md-6">
                        <div class="form-group">
                            <label class="required" for="category">Category Name</label>
                            <select class="form-control select2 {{ $errors->has('book_type') ? 'is-invalid' : '' }}"
                                name="category_id" id="category_id">
                                <option value="">Please Select</option>
                                @foreach ($categories as $category)
                                    <option value="{{ $category->id }}" {{ $food->category_id == $category->id ? 'selected' : '' }}>
                                        {{ $category->category_name }}
                                    </option>
                                @endforeach
                            </select>
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12 col-md-6">
                        <div class="form-group">
                            <label class="required" for="price">Price</label>
                            <input class="form-control" type="text" name="price" id="price" required value="{{$food->price}}">
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12 col-md-6">
                        <div class="form-group">
                            <label class="required" for="photo">Photo</label>
                            <input class="form-control" type="file" name="photo" id="photo" value="{{$food->photo}}">
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12 col-md-6">
                        <div class="form-group">
                            <label class="required" for="description">Description</label>
                            <input class="form-control" type="text" name="description" id="description" required value="{{$food->description}}">
                        </div>
                    </div>
                    <div class="col-lg-4 col-sm-12 col-md-6">
                        <div class="form-group">
                            <label class="required" for="stock">Stock</label>
                            <input class="form-control" type="text" name="stock" id="stock" required value="{{$food->stock}}">
                        </div>
                    </div>
                </div>
                </div>
                    <div class="m-4 col-lg-12 col-md-12 col-sm-12">
                        <a class="btn btn-primary me-3" href="{{ route('available_food.index') }}">
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
