@extends('HMM.layouts.app')
@section('content')
    <div class="card">
        <div class="card-header text-uppercase bg-dark mb-3">
            <h5 class="p-0 m-0 d-flex align-items-center text-white"><i
                    class="bi bi-file-earmark-spreadsheet me-3"></i>Report
                    
                    {{-- <a class="btn btn-success position-absolute top-0 end-0 my-3 me-3"
                        href="{{route('category.create')}}">
                        Add Category
                    </a> --}}
            </h5>
        </div>

        <form method="POST" action="{{ route('report.store') }}" enctype="multipart/form-data" class="d-flex">
            @csrf
            <div class="flex-grow-1 mx-3">
                <label for="year">Select Year:</label>
                <select id="year" name="year" class="form-control select2" required>
                    <option value="{{ date('Y') - 3 }}" @if($selectedYear == (date('Y') - 3)) selected @endif>{{ date('Y') - 3 }}</option>
                    <option value="{{ date('Y') - 2 }}" @if($selectedYear == (date('Y') - 2)) selected @endif>{{ date('Y') - 2 }}</option>
                    <option value="{{ date('Y') - 1 }}" @if($selectedYear == (date('Y') - 1)) selected @endif>{{ date('Y') - 1 }}</option>
                    <option value="{{ date('Y') }}" @if($selectedYear == date('Y')) selected @endif>{{ date('Y') }}</option>
                    <option value="{{ date('Y') + 1 }}" @if($selectedYear == (date('Y') + 1)) selected @endif>{{ date('Y') + 1 }}</option>
                    <option value="{{ date('Y') + 2 }}" @if($selectedYear == (date('Y') + 2)) selected @endif>{{ date('Y') + 2 }}</option>
                    <option value="{{ date('Y') + 3 }}" @if($selectedYear == (date('Y') + 3 )) selected @endif>{{ date('Y') + 3 }}</option>
                </select>
            </div>

            <div class="flex-grow-1 mx-3">
                <label for="year">Select Month:</label>
                <select name="month" class="form-control select2" required>
                    @for ($i = 1; $i <= 12; $i++)
                        <option value="{{ $i }}" @if ($i == $selectedMonth) selected @endif>{{ date('F', mktime(0, 0, 0, $i, 1)) }}</option>
                    @endfor
                </select>                
            </div>

            <div class="ml-2 mt-4 mx-3">
                <button class="btn btn-success" type="submit"> OK </button>
            </div>
            <div class="ml-2 mt-4 mx-3">
                <a class="btn btn-success" type="submit" href="{{ route('report.index') }}"> Restart </a>
            </div>
        </form>   

        <div class="card-body mt-3">
            <div class="table-responsive">
                <table class=" table table-bordered table-striped table-hover datatable mt-2" id="report">
                    <thead>
                        <tr>
                            <th>
                                No
                            </th>
                            <th>
                                Date
                            </th>
                            <th>
                                Total Quantity
                            </th>
                            <th>
                                Total Balance
                            </th>
                            <th>
                                Promotion
                            </th>
                            <th>
                                Income
                            </th>
                            <th>
                                &nbsp;
                            </th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach ($orders as $key => $order)
                        <form action="{{route('report.destroy',$order->id)}}" method="post" onsubmit="return confirm('Are You Sure?')">
                            @csrf
                            @method('delete')
                            <tr data-entry-id="{{ $order->id }}">
                                <td>
                                    {{ ++$key }}
                                </td>
                                <td class="text-nowrap">
                                    {{ $order->date}}
                                </td>
                                <td class="text-nowrap">
                                    {{ $order->total_qty}}
                                </td>
                                <td class="text-nowrap">
                                    {{ $order->total_balance}}
                                </td>
                                <td class="text-nowrap">
                                    {{ $order->promotion}}
                                </td>
                                <td class="text-nowrap">
                                    {{ $order->bill}}
                                </td>
                                <td>
                                    <a href="{{route('report.show',$order->id)}}" class="btn btn-sm btn-info">Details</a>
                                    {{-- <button class="btn btn-sm btn-danger">Delete</button>                                     --}}
                                </td>
                            </tr>
                        </form>
                        @endforeach
                    </tbody>
                    <tfoot>
                        <tr>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td></td>
                            <td>
                                <b>Total</b>
                            </td>
                            <td class="text-nowrap">
                                <b>{{ $total}}</b>
                            </td>
                            <td></td>
                        </tr>   
                    </tfoot>
                </table>
                <a href="{{route('sale.index')}}" class="btn btn-sm btn-info">Back</a>
            </div>
        </div>
    </div>

<script>
    $(document).ready(function() {
       $('#report').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'csvHtml5',
            'excelHtml5',
            {
                extend: 'pdfHtml5',
                text: 'Export PDF',
                footer: true
            },
            'print'
        ]
        });
    });

</script>
        
@endsection