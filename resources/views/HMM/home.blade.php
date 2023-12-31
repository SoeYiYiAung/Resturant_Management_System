@extends('HMM.layouts.app')

@section('content')
    <div class="home-container" style="height: 300px;">
        <div class="row w-75 mx-auto" style="width: 50%;">
            <div class="col-12">
                <div action="" method="post">
                    <div class="form-group search-form-group">
                        {{-- <i class="fas fa-search"></i> --}}
                        <input type="text" name="search-component" id="" class="form-control search-component"
                            placeholder="Be Enjoy When Using Our System ... Be Enjoy With The Delicious Food Of Klassy" readonly>
                    </div>
                </div>
            </div>
            <div class="col-3 mt-4 mb-4">
                <a href="{{ route('sale.index') }}">
                    <div class="card component-card" style="margin-right: 20px; height: 120px;">
                        <div class="card-body" style="display: grid;place-items:center;background: #F66879;color: #FFFFFF;">
                            <i class="fas fa-chart-line fs-3"></i>
                            <small><strong>Sale Report</strong></small>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-3 mt-4 mb-4">
                <a href="{{ route('category.index') }}">
                    <div class="card component-card"
                        style="margin-left: 10px;margin-right: 10px;height: 120px;background: #95E265;color: #FFFFFF;">
                        <div class="card-body" style="display: grid;place-items:center;">
                            <i class="fas fa-address-card fs-3 shadow-sm"></i>
                            <small><strong>Food Category</strong></small>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-3 mt-4 mb-4">
                <a href="{{ route('available_food.index') }}">
                    <div class="card component-card" style="margin-right: 20px; height: 120px;">
                        <div class="card-body" style="display: grid;place-items:center;background: #74696b;color: #FFFFFF;">
                            <i class="fas fa-chart-line fs-3"></i>
                            <small><strong>Available Food</strong></small>
                        </div>
                    </div>
                </a>
            </div>

            <div class="col-3 mt-4 mb-4">
                <a href="{{ route('promotion.index') }}">
                    <div class="card component-card"
                        style="margin-left: 10px;margin-right: 10px;height: 120px;background: #FF9A9A;color: #FFFFFF;">
                        <div class="card-body" style="display: grid;place-items:center;">
                            <i class="fas fa-swatchbook fs-3 shadow-sm"></i>
                            <small><strong>Promotion</strong></small>
                        </div>
                    </div>
                </a>
            </div>

            {{-- <div class="col-3 mt-4 mb-4">
                <a href="{{ route('hmm-group.attendance') }}">
                    <div class="card component-card"
                        style="margin-left: 10px;margin-right: 10px;height: 120px;background: #95E265;color: #FFFFFF;">
                        <div class="card-body" style="display: grid;place-items:center;">
                            <i class="fas fa-address-card fs-3 shadow-sm"></i>
                            <small><strong>Attendance</strong></small>
                        </div>
                    </div>
                </a>
            </div> --}}

            {{-- <div class="col-3 mt-4 mb-4">
                <a href="{{ route('hmm-group.payment') }}">
                    <div class="card component-card" style="margin-right: 20px; height: 120px;">
                        <div class="card-body" style="display: grid;place-items:center;background: #22D4EC;color: #FFFFFF;">
                            <i class="fas fa-credit-card fs-3 shadow-sm"></i>
                            <small><strong>Payment</strong></small>
                        </div>
                    </div>
                </a>
            </div> --}}

            {{-- <div class="col-3 mt-4 mb-4">
                <a href="{{ route('hmm-group.setting') }}">
                    <div class="card component-card"
                        style="margin-left: 10px;margin-right: 10px;height: 120px;background: #3CD3B8;color: #FFFFFF;">
                        <div class="card-body" style="display: grid;place-items:center;">
                            <i class="fas fa-cog fs-3 shadow-sm"></i>
                            <small><strong>Settings</strong></small>
                        </div>
                    </div>
                </a>
            </div> --}}
        </div>

        <div class="row w-75 mx-auto" style="width: 50%;">
            <div class="col-4 mt-4 mb-4">
            </div>
            <div class="col-4 mt-4 mb-4">
                <a href="{{ route('order.index') }}">
                    <div class="card component-card"
                        style="margin-left:20px;height: 120px;background: #73A3ED;color:#FFFFFF;">
                        <div class="card-body" style="display: grid;place-items:center;">
                            <i class="fas fa-book-open fs-3 shadow-sm"></i>
                            <small><strong>Order Now</strong></small>
                        </div>
                    </div>
                </a>
            </div>
        </div>
    </div>
@endsection
