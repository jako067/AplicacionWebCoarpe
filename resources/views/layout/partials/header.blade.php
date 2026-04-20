<nav class="navbar navbar-expand-lg custom-navbar shadow-sm">
    <div class="container">

        <a class="navbar-brand fw-bold" href="{{ route('index') }}">
            <i class="bi bi-building"></i> Gestión Coarpe
        </a>

        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent">
            <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarContent">

            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('materials.index') }}">
                        <i class="bi bi-box-seam"></i> Materiales
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('budgets.index') }}">
                        <i class="bi bi-cash-stack"></i> Presupuestos
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('tasks.index') }}">
                        <i class="bi bi-check2-square"></i> Jornada
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('messages.index') }}">
                        <i class="bi bi-chat-dots"></i> Mensajes
                    </a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{ route('users.index') }}">
                        <i class="bi bi-people"></i> Usuarios
                    </a>
                </li>
                    <li class="nav-item">
                    <a class="nav-link" href="{{ route('daily_work.index') }}">
                        <i class="bi bi-people"></i> Daily
                    </a>
                </li>
            </ul>

            <div class="d-flex align-items-center gap-3">

                @auth
                    <span class="user-text">
                        <i class="bi bi-person-circle"></i>
                        {{ Auth::user()->name }}
                    </span>

                    <a href="{{ route('logout') }}" class="btn btn-outline-custom btn-sm">
                        <i class="bi bi-box-arrow-right"></i> Salir
                    </a>
                @else
                    <a href="{{ route('login.form') }}" class="btn btn-outline-custom btn-sm">
                        <i class="bi bi-box-arrow-in-right"></i> Login
                    </a>
                    <a href="{{ route('signup.form') }}" class="btn btn-primary-custom btn-sm">
                        <i class="bi bi-person-plus"></i> Registro
                    </a>
                @endauth

            </div>
        </div>
    </div>
</nav>
