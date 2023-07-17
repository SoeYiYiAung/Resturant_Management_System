@extends('HMM.layouts.app')
@section('content')
<div class="row mt-5 mb-5">
    <div class="col-lg-6">
        <div>
            <h3>Sale Quantity</h3>
            <h6><b>{{ $maxResult['food_name'] }}</b> the best seller!!</h6>
            <canvas id="myChart"></canvas>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
        <script>
        var ctx = document.getElementById('myChart');
    
        // Retrieve the data from the PHP code passed to the view
        var foodNamesWithStock = @json($foodNamesWithStock);
    
        var labels = Object.keys(foodNamesWithStock); // Extract the labels (food names)
        var data = Object.values(foodNamesWithStock); // Extract the data (stock values)
    
        new Chart(ctx, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Quantity',
                    data: data,
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
        </script>
    </div>
    
    <div class="col-lg-6">
        <div>
            <h3>Sale Quantity</h3>
            <h6><b>{{ $maxResultDrink['food_name'] }}</b> the best seller!!</h6>
            <canvas id="myChart1"></canvas>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
        <script>
        var ctx1 = document.getElementById('myChart1');
    
        // Retrieve the data from the PHP code passed to the view
        var drinkNamesWithStock = @json($drinkNamesWithStock);
    
        var labels = Object.keys(drinkNamesWithStock); // Extract the labels (food names)
        var data = Object.values(drinkNamesWithStock); // Extract the data (stock values)
    
        new Chart(ctx1, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Quantity',
                    data: data,
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
        </script>
    </div>

    {{-- <div class="col-lg-6">
        <div>
            <h4>Incomes</h4>
            <canvas id="myChart1"></canvas>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
        <script>
        var ctx1 = document.getElementById('myChart1');
    
        var labels = ['Label 1', 'Label 2', 'Label 3']; // Replace with your actual labels
        var data = [300, 200, 100]; // Replace with your actual data
    
        new Chart(ctx1, {
            type: 'bar',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Orders',
                    data: data,
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
        </script>
    </div> --}}
    
    
</div>

<div class="row mt-5 mb-5">
    <div class="col-lg-6">
        <div>
            <h3>Sale Amount</h3>
            <a class="btn btn-success mb-3 mt-2" type="submit" href="{{ route('report.index') }}"> Monthly Report </a>

            <form method="POST" action="{{ route('sale.store') }}" enctype="multipart/form-data" class="d-flex">
                @csrf
                <div class="flex-grow-1">
                    <label for="year">Select Year:</label>
                    <select id="year" name="year" class="form-control select2">
                        <option value="{{ date('Y') - 3 }}" @if($selectedYear == (date('Y') - 3)) selected @endif>{{ date('Y') - 3 }}</option>
                        <option value="{{ date('Y') - 2 }}" @if($selectedYear == (date('Y') - 2)) selected @endif>{{ date('Y') - 2 }}</option>
                        <option value="{{ date('Y') - 1 }}" @if($selectedYear == (date('Y') - 1)) selected @endif>{{ date('Y') - 1 }}</option>
                        <option value="{{ date('Y') }}" @if($selectedYear == date('Y')) selected @endif>{{ date('Y') }}</option>
                        <option value="{{ date('Y') + 1 }}" @if($selectedYear == (date('Y') + 1)) selected @endif>{{ date('Y') + 1 }}</option>
                        <option value="{{ date('Y') + 2 }}" @if($selectedYear == (date('Y') + 2)) selected @endif>{{ date('Y') + 2 }}</option>
                        <option value="{{ date('Y') + 3 }}" @if($selectedYear == (date('Y') + 3 )) selected @endif>{{ date('Y') + 3 }}</option>
                    </select>
                </div>
                <div class="ml-2 mt-4 mx-5">
                    <button class="btn btn-success" type="submit"> OK </button>
                </div>
                <div class="ml-2 mt-4 ">
                    <a class="btn btn-success" type="submit" href="{{ route('sale.index') }}"> Restart </a>
                </div>
            </form>                   
            <canvas id="myChart2"></canvas>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    
        <canvas id="myChart2"></canvas>
        <script>
            var ctx2 = document.getElementById('myChart2').getContext('2d');
            var data = @json($formattedData);

            var months = data.map(item => item.month);
            var balances = data.map(item => item.total);

            new Chart(ctx2, {
                type: 'bar',
                data: {
                    labels: months,
                    datasets: [{
                        label: 'Total Balance',
                        data: balances,
                        backgroundColor: 'rgba(75, 192, 192, 0.2)',
                        borderColor: 'rgba(75, 192, 192, 1)',
                        borderWidth: 1
                    }]
                },
                options: {
                    scales: {
                        y: {
                            beginAtZero: true
                        }
                    }
                }
            });
        </script>
    </div>
    
</div>

@endsection
