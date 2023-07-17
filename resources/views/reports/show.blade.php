@extends('HMM.layouts.app')
@section('content')
    <div class="card">
        <div class="card-header text-uppercase bg-dark mb-3">
            <h5 class="p-0 m-0 d-flex align-items-center text-white"><i
                    class="bi bi-file-earmark-spreadsheet me-3"></i>Details
                    
                    {{-- <a class="btn btn-success position-absolute top-0 end-0 my-3 me-3"
                        href="{{route('category.create')}}">
                        Add Category
                    </a> --}}
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
                                Food
                            </th>
                            <th>
                                Quantity
                            </th>
                            <th>
                                Unit Price
                            </th>
                            <th>
                                Total
                            </th>
                            {{-- <th>
                                &nbsp;
                            </th> --}}
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($order_details as $key => $detail)
                        <form action="{{route('report.destroy',$detail->id)}}" method="post" onsubmit="return confirm('Are You Sure?')">
                            @csrf
                            @method('delete')
                            <tr data-entry-id="{{ $detail->id }}">
                                <td>
                                    {{ ++$key }}
                                </td>
                                <td class="text-nowrap">
                                    {{ $detail->name}}
                                </td>
                                <td class="text-nowrap">
                                    {{ $detail->qty}}
                                </td>
                                <td class="text-nowrap">
                                    {{ $detail->unit_price}}
                                </td>
                                <td class="text-nowrap">
                                    {{ $detail->qty * $detail->unit_price }}
                                </td>
                                {{-- <td>
                                    <a href="{{route('report.edit',$order->id)}}" class="btn btn-sm btn-info">Details</a>
                                </td> --}}
                            </tr>
                        </form>
                        @endforeach
                    </tbody>
                </table>
                <a href="{{route('report.index')}}" class="btn btn-sm btn-info">Back</a>
            </div>
        </div>
    </div>
@endsection