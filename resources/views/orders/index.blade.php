@extends('HMM.layouts.app')
@section('content')
<div class="container">
    <div class="row">
        <div class="col-lg-12 mb-5">
            <div class="card ">
                <div class="card-header text-uppercase bg-dark  py-3 mb-3">
                    <h5 class="p-0 m-0 text-white"><i class="bi bi-journal-plus me-2"></i> Create Food</h5>
                </div>
                <div class="card-body">
                    <form method="POST" action="{{ route('order.store') }}" enctype="multipart/form-data">
                        @csrf
                        <div class="row">
                            <div class="col-lg-4 col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label class="required" for="food">Name</label>
                                    <select class="form-control select2 {{ $errors->has('book_type') ? 'is-invalid' : '' }}"
                                            name="food_id" id="food_id">
                                        <option value="">Please Select</option>
                                        @foreach ($foods as $food)
                                            <option value="{{ $food->id }}">
                                                {{ $food->name }} -- ({{$food->stock}})
                                            </option>
                                        @endforeach
                                    </select>
                                </div>
                                
                            </div>
                            <div class="col-lg-4 col-sm-12 col-md-6">
                                <div class="form-group">
                                    <label class="required" for="qty">Quantity</label>
                                    <input class="form-control" type="number" name="qty" id="qty" min="1" required inputmode="numeric">
                                </div>
                            </div>
                        </div>
                        </div>
                            <div class="m-4 col-lg-12 col-md-12 col-sm-12">
                                <a class="btn btn-primary me-3" href="{{ route('available_food.index') }}">
                                    Cancel
                                  </a>
                                <button class="btn btn-danger" type="submit">
                                    Order
                                </button>
                            </div>
                    </form>
                </div>
            </div>
        </div>

        
        <div class="col-lg-12">
            <div class="card">
                <div class="card-header text-uppercase bg-dark mb-3">
                    <h5 class="p-0 m-0 d-flex align-items-center text-white"><i
                            class="bi bi-file-earmark-spreadsheet me-3"></i>Food You Choose
                            
                            <a class="btn btn-dark text-light position-absolute top-0 end-0 "
                            href="{{route('temp.index')}}">
                            Order Now
                            </a>
                    </h5>
                </div>
        
                <div class="card-body">
                    <div class="table-responsive">
                        <table class=" table table-bordered table-striped table-hover datatable">
                            <thead>
                                <tr>
                                    <th>
                                        No
                                    </th>
        
                                    <th>
                                        Name
                                    </th>
                                    <th>
                                        Quantity
                                    </th>
                                    <th>
                                        &nbsp;
                                    </th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($temp_foods as $key => $temp_food)
                                <form action="{{route('temp.destroy',$temp_food->id)}}" method="post" onsubmit="return confirm('Are You Sure?')">
                                    @csrf
                                    @method('delete')
                                    <tr data-entry-id="{{ $temp_food->id }}">
                                        <td>
                                            {{ ++$key }}
                                        </td>
                                        <td class="text-nowrap">
                                            {{ $temp_food->name}} 
                                        </td>
                                        <td class="text-nowrap">
                                            {{ $temp_food->qty}} 
                                        </td>
                                        <td>
                                            <button class="btn btn-sm btn-danger">Delete</button>                                    
                                        </td>
                                    </tr>
                                </form>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
  <script>
        $(document).ready(function() {
        $('.select2').select2();
    });

    document.getElementById('qty').addEventListener('input', function() {
        if (this.value < 0) {
            this.value = 1; // Set a default value or any other desired action
        }
    });
  </script>
@endsection
