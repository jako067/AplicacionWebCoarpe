{{-- Corrección inline para el estado hover del botón de registro --}}
<style>
    .btn-signup-header:hover {
        background-color: #ffffff !important;
        color: var(--color-verde-oscuro, #144d34) !important; /* Mantiene tu color corporativo */
        border-color: #ffffff !important;
        opacity: 1 !important;
    }
</style>

<nav class="navbar navbar-expand-lg main-header shadow-sm py-2 z-3 position-relative">
    <div class="container-fluid px-3 px-md-4">
        @auth
            <button class="navbar-toggler border-0 text-white d-lg-none me-2 p-1" type="button" data-bs-toggle="offcanvas" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu">
                <i class="bi bi-list fs-2"></i>
            </button>
        @endauth

        <a class="navbar-brand d-flex align-items-center text-white m-0" href="{{ route('index') }}">
            <div class="header-logo-box me-2 shadow-sm">C</div>
            <h1 class="h5 mb-0 fw-bold d-none d-sm-block">COARPE</h1>
            <h1 class="h5 mb-0 fw-bold d-block d-sm-none">COARPE</h1>
        </a>

        @auth
            <div class="ms-auto d-flex align-items-center gap-3 text-white text-end">

                {{-- Selector de idioma --}}
                <div class="dropdown">
                    <button class="btn btn-sm border-0 text-white fw-semibold dropdown-toggle px-2 py-1" type="button" data-bs-toggle="dropdown" aria-expanded="false" style="background: rgba(255,255,255,0.1); font-size: 0.8rem;">
                        {{ strtoupper(app()->getLocale()) }}
                    </button>
                    <ul class="dropdown-menu dropdown-menu-end shadow-sm" style="min-width: 6rem;">
                        <li>
                            <form action="{{ route('locale') }}" method="POST" class="m-0">
                                @csrf
                                <input type="hidden" name="locale" value="es">
                                <button type="submit" class="dropdown-item fw-semibold {{ app()->getLocale() === 'es' ? 'active' : '' }}">🇪🇸 ES</button>
                            </form>
                        </li>
                        <li>
                            <form action="{{ route('locale') }}" method="POST" class="m-0">
                                @csrf
                                <input type="hidden" name="locale" value="en">
                                <button type="submit" class="dropdown-item fw-semibold {{ app()->getLocale() === 'en' ? 'active' : '' }}">🇬🇧 EN</button>
                            </form>
                        </li>
                    </ul>
                </div>

                <div class="me-1 d-none d-sm-block">
                    <p class="mb-0 fw-semibold lh-1">{{ Auth::user()->name }}</p>
                    <small class="text-white-50" style="font-size: 0.75rem;">
                        {{ Auth::user()->isAdmin() ? __('Administrador') : __('Usuario') }}
                    </small>
                </div>
               <a href="{{ route('users.account') }}" class="text-white text-decoration-none"><i class="bi bi-person-circle fs-3"></i></a>
            </div>
        @else
            <div class="ms-auto">
                <a href="{{ route('login.form') }}" class="btn btn-sm btn-outline-light me-2">{{ __('Entrar') }}</a>
                <a href="{{ route('signup.form') }}" class="btn btn-sm btn-signup-header">{{ __('Registro') }}</a>
            </div>
        @endauth
    </div>
</nav>
