<header>
    <h1>Gestión Coarpe</h1>
</header>

@auth
    <a href="{{ route('logout') }}">Cerrar Sesión</a>
@else
    <a href="{{ route('login.form') }}">Iniciar Sesión</a>
    <a href="{{ route('signup.form') }}">Registrarse</a>
@endauth
<a href="{{ route('index') }}">Inicio</a>
    <a href="{{ route('budgets.index') }}">Presupuestos</a>
    <a href="{{ route('materials.index') }}">Materiales</a>

