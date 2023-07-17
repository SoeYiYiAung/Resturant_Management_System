@extends('HMM.layouts.app')
@section('content')

    {{-- {{$temp_foods}} --}}
<div id="body">
    <div class="container" id="bill">
        <div class="row" >
            <table class="table table-bordered table-striped rounded" >
                <thead>
                    <tr>
                        {{-- <th colspan="4">
        
                            <h3 class="text-center my-3"><i>Sweet</i>  <img src="img/logo.png" alt="" width="70px"></h3>
                            
                        </th> --}}
                    </tr>
                    
        
        
                </thead>
                <tbody>                    
                    <tr>
                        <th>Item</th>
                        <th>Quantity</th>
                        <th>Unit Price</th>
                        <th>Subtotal</th>
                    </tr>
                    @foreach($temp_foods as $tempfood)
                        {{-- {{$tempfood}} --}}
                        <tr>
                            <td>{{$tempfood->name}}</td>
                            <td>{{$tempfood->qty}}</td>
                            <td>{{$tempfood->unit_price}}</td>
                            <td>{{$tempfood->subtotal}}</td>
                        </tr>
                    @endforeach                    
                </tbody>
                <tfoot>
                    <tr>
                        <td colspan="3" class="text-right">Total</td>
                        <td>{{$total}}</td>
                    </tr>
                    <tr>
                        <td colspan="3" class="text-right">Promotion</td>
                        <td>{{$promotion}}</td>
                    </tr>
                    <tr>
                        <td colspan="3" class="text-right">Bill</td>
                        <td>{{$total-$promotion}}</td>
                    </tr>
                    <tr style="background-color: #EDE9E9;">
                        <td colspan="4" class="text-center">
                            <h4 class="my-3"><em>Thanks for shopping with us &hearts;</em></h4>
                        </td>
                    </tr>
                </tfoot>
            </table>
        </div>

        
    </div>
    <div class="row">
        <div class="col-md-4"></div>
        <div class="col-md-4 d-flex justify-content-center">
            <a class="btn btn-secondary " href="{{ route('delete.allDelete') }}">Back</a>
            <a class="btn btn-secondary ms-3" onclick="myprint()" href="#">Print</a>
        </div>
        <div class="col-md-4"></div>
    </div>

    <script>
        function myprint(){
            var body = document.getElementById('body').innerHTML;
            var bill = document.getElementById('bill').innerHTML;

            document.getElementById('body').innerHTML = bill;
            window.print();
            document.getElementById('body').innerHTML = body;
        }
    </script>
</div>

@endsection
