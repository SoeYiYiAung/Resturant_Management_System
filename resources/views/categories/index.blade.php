@extends('HMM.layouts.app')
@section('content')
    <div class="card">
        <div class="card-header text-uppercase bg-dark mb-3">
            <h5 class="p-0 m-0 d-flex align-items-center text-white"><i
                    class="bi bi-file-earmark-spreadsheet me-3"></i>Food Category
                    
                    <a class="btn btn-success position-absolute top-0 end-0 my-3 me-3"
                        href="{{route('category.create')}}">
                        Add Category
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
            </div>
        </div>
    </div>
@endsection