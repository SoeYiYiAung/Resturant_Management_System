@extends('HMM.layouts.app')
@section('content')
    <div class="card">
        <div class="card-header text-uppercase bg-dark mb-3">
            <h5 class="p-0 m-0 d-flex align-items-center text-white"><i
                    class="bi bi-file-earmark-spreadsheet me-3"></i>Available Food
                    
                    <a class="btn btn-dark text-light position-absolute top-0 end-0 "
                        href="{{route('available_food.create')}}">
                        Add New Food
                    </a>
            </h5>
        </div>

        <div class="card-body">
            {{-- <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable">
                    <thead>
                        <tr>
                            <th>
                                No
                            </th>

                            <th>
                                Category Name
                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($categories as $key => $category)
                        <form action="{{route('category.destroy',$category->id)}}" method="post" onsubmit="return confirm('Are You Sure?')">
                            @csrf
                            @method('delete')
                            <tr data-entry-id="{{ $category->id }}">
                                <td>
                                    {{ ++$key }}
                                </td>
                                 <td class="text-nowrap">
                                    {{ $category->category_name}}
                                </td>
                                <td>
                                    <a href="{{route('category.edit',$category->id)}}" class="btn btn-sm btn-info">Edit</a>
                                    <button class="btn btn-sm btn-danger">Delete</button>                                    
                                </td>
                            </tr>
                        </form>
                        @endforeach
                    </tbody>
                </table>
            </div> --}}
            <!-- ***** Menu Area Starts ***** -->
            <section class="section" id="offers">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-4 offset-lg-4 text-center">
                            <div class="section-heading">
                                <h6>Klassy Week</h6>
                                <h2>This Week’s Special Meal Offers</h2>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row" id="tabs">
                                <div class="col-lg-12">
                                    <div class="heading-tabs">
                                      <div class="row">
                                        <div class="col-lg-6 offset-lg-3">
                                          <ul class="list-unstyled d-flex justify-content-between">
                                            <li><a href='#tabs-1' class="text-dark"><img src="{{ asset('assets/images/tab-icon-01.png')}}" alt="">Food</a></li>
                                            <li><a href='#tabs-2' class="text-dark"><img src="{{ asset('assets/images/tab-icon-02.png')}}" alt="">Drink</a></li>
                                          </ul>
                                        </div>
                                      </div>
                                    </div>
                                </div>
                                  
                                <div class="col-lg-12">
                                    <section class='tabs-content'>
                                        <article id='tabs-1'>
                                            <div class="row">
                                                @foreach ($foods as $food)
                                                <div class="col-lg-3 mt-3" data-entry-id="{{ $food->id }}">
                                                    <form action="{{route('available_food.destroy',$food->id)}}" method="post" onsubmit="return confirm('Are You Sure?')">
                                                        @csrf
                                                        @method('delete')
                                                            <div class="tab-item">
                                                                <img src="{{$food->photo}}" alt="No Photo" width="200px" height="200px">
                                                                <h4>{{$food->name}}</h4>
                                                                <p>{{$food->description}}</p>
                                                                <h6>Stock - {{$food->stock}}</h6>
                                                                <div class="price">
                                                                    <h6><b>{{$food->price}} MMK</b></h6>
                                                                </div>
                                                                <a href="{{route('available_food.edit',$food->id)}}" class="btn btn-sm btn-info">Edit</a>
                                                                <button class="btn btn-sm btn-danger">Delete</button>
                                                            </div>
                                                    </form>
                                                </div>
                                                @endforeach                                                            
                                            </div>
                                        </article>  

                                        <article id='tabs-2'>
                                            <div class="row">
                                                @foreach ($drinks as $drink)
                                                    <div class="col-lg-3" data-entry-id="{{ $drink->id }}">
                                                        <form action="{{route('available_food.destroy',$drink->id)}}" method="post" onsubmit="return confirm('Are You Sure?')">
                                                            @csrf
                                                            @method('delete')
                                                                <div class="tab-item">
                                                                    <img src="{{$drink->photo}}" alt="No Photo" width="200px" height="200px">
                                                                    <h4>{{$drink->name}}</h4>
                                                                    <p>{{$drink->description}}</p>
                                                                    <h6>Stock - {{$drink->stock}}</h6>
                                                                    <div class="price">
                                                                        <h6><b>{{$drink->price}} MMK</b></h6>
                                                                    </div>
                                                                    <a href="{{route('available_food.edit',$drink->id)}}" class="btn btn-sm btn-info">Edit</a>
                                                                    <button class="btn btn-sm btn-danger">Delete</button>
                                                                </div>
                                                        </form>
                                                    </div>
                                                @endforeach
                                            </div>
                                        </article>  
                                    </section>
                                </div>
                            </div>
                        </div>
                    </div>


 
                </div>
            </section>
            <!-- ***** Chefs Area Ends ***** --> 
        </div>
    </div>
@endsection
{{-- @extends('HMM.layouts.partials.header') --}}
