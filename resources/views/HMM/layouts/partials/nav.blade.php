<nav class="navbar navbar-expand-lg navbar-dark bg-primary" style="height: 45px;">
    <div class="container-fluid">
        <a href="{{ route('hmm-group.home') }}" class="fs-4 me-3 nav-icon">
            <i class="fas fa-th text-white"></i>
            @if (request()->segment(2) != 'home')
                <i class="fas fa-angle-left fs-2 text-white"></i>
            @endif
        </a>
        <a class="navbar-brand" href="#">Klassy Delicious Resturant</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarColor01"
            aria-controls="navbarColor01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarColor01">
            <ul class="navbar-nav me-auto">
                @if (request()->segment(2) == 'payment')
                    <li class="nav-item">
                        <a class="nav-link {{ request()->segment(3) == 'invoice' ? 'active' : '' }}"
                            href="{{ route('payment.invoice.index') }}">Invoice</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->segment(3) == 'description' ? 'active' : '' }}"
                            href="{{ route('payment.description.index') }}">Description</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->segment(3) == 'payment' ? 'active' : '' }}"
                            href="#">Payment</span></a>
                    </li>
                @elseif (request()->segment(2) == 'attendance')
                    <li class="nav-item">
                        <a class="nav-link {{ request()->segment(3) == 'attendance' ? 'active' : '' }}"
                            href="{{ route('attendance.attendance.index') }}">Attendance</span></a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link {{ request()->segment(3) == 'leave' ? 'active' : '' }}"
                            href="{{ route('attendance.leave.index') }}">Leave</span></a>
                    </li>
                @endif
            </ul>
        </div>
    </div>
</nav>
