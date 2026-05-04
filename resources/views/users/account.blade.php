@extends('layout.layout')

@section('title','Perfil')

@section('content')

<div class="container mt-5">
    <div class="card shadow-sm p-4">

        <h2 class="mb-4 text-center">Mi Perfil</h2>

        <div class="text-center mb-4">
            <i class="bi bi-person-circle" style="font-size: 4rem;"></i>
        </div>

        <div class="list-group">
            <div class="list-group-item">
                <strong>Nombre:</strong> {{ Auth::user()->name }}
            </div>

            <div class="list-group-item">
                <strong>Usuario:</strong> {{ Auth::user()->username }}
            </div>

            <div class="list-group-item">
                <strong>Email:</strong> {{ Auth::user()->email }}
            </div>

            <div class="list-group-item">
                <strong>Teléfono:</strong> {{ Auth::user()->phone }}
            </div>

            <div class="list-group-item">
                <strong>DNI:</strong> {{ Auth::user()->DNI }}
            </div>
        </div>

    </div>
</div>


{{-- ESTILOS PERO COMENTADOS PARA AÑADIR LO DE LOS GRUPOS
<div class="container-fluid max-w-4xl">

    <div class="d-flex align-items-center justify-content-between mb-4">
        <h2 class="fw-bold mb-0 text-dark">Mi Perfil</h2>

        <a href="#" class="btn btn-sm btn-outline-primary shadow-sm">
            <i class="bi bi-pencil me-1"></i> Editar Perfil
        </a>
    </div>

    <div class="row g-4">

        <div class="col-md-4">
            <div class="card border-0 shadow-sm text-center p-4 h-100">

                <div class="mx-auto mb-3">
                    <div class="icon-circle-lg bg-verde-oscuro text-white rounded-circle d-flex align-items-center justify-content-center shadow-sm" style="width: 100px; height: 100px; margin: 0 auto;">
                        <i class="bi bi-person-fill" style="font-size: 3rem;"></i>
                    </div>
                </div>

                <h4 class="fw-bold text-dark mb-1">{{ $user->name }}</h4>
                <p class="text-muted small mb-3">{{ '@' . $user->username }}</p>

                <span class="badge bg-primary bg-opacity-10 text-primary border border-primary border-opacity-25 px-3 py-2 rounded-pill">
                    <i class="bi bi-shield-check me-1"></i> Usuario Activo
                </span>

            </div>
        </div>

        <div class="col-md-8">
            <div class="card border-0 shadow-sm h-100">

                <div class="card-header bg-white border-bottom p-4">
                    <h5 class="fw-bold text-dark mb-0">
                        <i class="bi bi-card-list fs-5 me-2 text-verde-oscuro"></i> Información Personal
                    </h5>
                </div>

                <div class="card-body p-4 bg-light bg-opacity-50">
                    <div class="row g-4">

                        <div class="col-sm-6">
                            <div class="bg-white p-3 border rounded-3 shadow-sm h-100">
                                <p class="text-muted fw-semibold small mb-1 text-uppercase">Nombre Completo</p>
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-person text-secondary fs-5 me-2"></i>
                                    <span class="fw-bold text-dark">{{ $user->name }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="bg-white p-3 border rounded-3 shadow-sm h-100">
                                <p class="text-muted fw-semibold small mb-1 text-uppercase">Nombre de Usuario</p>
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-at text-secondary fs-5 me-2"></i>
                                    <span class="fw-bold text-dark">{{ $user->username }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="bg-white p-3 border rounded-3 shadow-sm h-100">
                                <p class="text-muted fw-semibold small mb-1 text-uppercase">Documento (DNI)</p>
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-person-vcard text-secondary fs-5 me-2"></i>
                                    <span class="fw-bold text-dark">{{ $user->DNI }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-sm-6">
                            <div class="bg-white p-3 border rounded-3 shadow-sm h-100">
                                <p class="text-muted fw-semibold small mb-1 text-uppercase">Teléfono de Contacto</p>
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-telephone text-secondary fs-5 me-2"></i>
                                    <span class="fw-bold text-dark">{{ $user->phone }}</span>
                                </div>
                            </div>
                        </div>

                        <div class="col-12">
                            <div class="bg-white p-3 border rounded-3 shadow-sm">
                                <p class="text-muted fw-semibold small mb-1 text-uppercase">Correo Electrónico</p>
                                <div class="d-flex align-items-center">
                                    <i class="bi bi-envelope text-secondary fs-5 me-2"></i>
                                    <span class="fw-bold text-dark">{{ $user->email }}</span>
                                </div>
                            </div>
                        </div>

                    </div>
                </div>

            </div>
        </div>

    </div>
</div> --}}
@endsection
