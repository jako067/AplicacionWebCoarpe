@auth
    <aside class="offcanvas-lg offcanvas-start sidebar-wrapper shadow-sm" tabindex="-1" id="sidebarMenu"
        aria-labelledby="sidebarMenuLabel">

        <div class="offcanvas-header d-lg-none border-bottom">
            <h5 class="offcanvas-title fw-bold text-dark" id="sidebarMenuLabel">Menú COARPE</h5>
            <button type="button" class="btn-close" data-bs-dismiss="offcanvas" data-bs-target="#sidebarMenu"
                aria-label="Close"></button>
        </div>

        <div class="offcanvas-body d-flex flex-column flex-grow-1 p-3">
            <nav class="flex-grow-1">
                <ul class="sidebar-nav">
                    <li>
                        <a href="{{ route('index') }}"
                            class="sidebar-link {{ request()->routeIs('index') ? 'active' : '' }}">
                            <i class="bi bi-house-door"></i> Inicio
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('daily_work.index') }}"
                            class="sidebar-link {{ request()->routeIs('daily_work.*') ? 'active' : '' }}">
                            <i class="bi bi-box-seam"></i> Trabajo Diario
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('tasks.index') }}"
                            class="sidebar-link {{ request()->routeIs('tasks.*') ? 'active' : '' }}">
                            <i class="bi bi-clipboard-check"></i> Jornada
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('budgets.index') }}"
                            class="sidebar-link {{ request()->routeIs('budgets.*') ? 'active' : '' }}">
                            <i class="bi bi-calculator"></i> Presupuestos
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('messages.index') }}"
                            class="sidebar-link {{ request()->routeIs('messages.*') ? 'active' : '' }}">
                            <i class="bi bi-chat-dots"></i> Mensajes
                        </a>
                    </li>
                    <li>
                        <a href="{{ route('users.index') }}"
                            class="sidebar-link {{ request()->routeIs('users.*') ? 'active' : '' }}">
                            <i class="bi bi-people"></i> Usuarios
                        </a>
                    </li>

                    <li><a href="{{ route('groups.index') }}" class="sidebar-link {{ request()->routeIs('groups.*') ? 'active' : '' }}"><i class="bi bi-people"></i>Grupos</a>
                    </li>
                </ul>
            </nav>

            <hr class="text-muted opacity-25">
            <ul class="sidebar-nav mb-0">
                <li>
                    <a href="{{ route('logout') }}" class="sidebar-link sidebar-link-logout mb-0">
                        <i class="bi bi-box-arrow-right"></i> Cerrar Sesión
                    </a>
                </li>
            </ul>
        </div>
    </aside>
@endauth
