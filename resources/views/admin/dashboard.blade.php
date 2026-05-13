@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="soft-card" style="padding: 28px;">
            <div class="grid grid-2" style="align-items: center; gap: 24px;">
                <div>
                    <p class="muted" style="text-transform: uppercase; letter-spacing: 0.18em; font-size: 0.8rem; margin-bottom: 10px;">
                        Panel administrativo
                    </p>

                    <h2 class="font-display page-title" style="margin-bottom: 12px;">
                        Bienvenido a dogoow admin
                    </h2>

                    <p class="page-subtitle">
                        Desde aquí puedes administrar los productos del menú digital, revisar el estado actual
                        del contenido y modificar la configuración visual general del sistema.
                    </p>
                </div>

                <div class="card">
                    <div class="card-body">
                        <p class="muted" style="text-transform: uppercase; letter-spacing: 0.14em; font-size: 0.8rem; margin-bottom: 10px;">
                            Estado general
                        </p>

                        <div style="display: grid; gap: 12px;">
                            <div style="display: flex; justify-content: space-between; gap: 12px;">
                                <span class="muted">Panel</span>
                                <span class="badge badge-active">Protegido</span>
                            </div>

                            <div style="display: flex; justify-content: space-between; gap: 12px;">
                                <span class="muted">Vista pública</span>
                                <a href="{{ route('menu.public') }}" target="_blank" class="badge badge-food">Abrir menú</a>
                            </div>

                            <div style="display: flex; justify-content: space-between; gap: 12px;">
                                <span class="muted">Configuración</span>
                                <span class="badge badge-drink">Disponible</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="grid grid-3">
            <article class="card">
                <div class="card-body">
                    <p class="muted" style="margin-bottom: 8px;">Total de productos</p>
                    <h3 class="font-display" style="font-size: 2.4rem; color: var(--primary); margin-bottom: 10px;">
                        {{ $productsCount }}
                    </h3>
                    <p class="muted">
                        Registros existentes dentro del menú digital.
                    </p>
                </div>
            </article>

            <article class="card">
                <div class="card-body">
                    <p class="muted" style="margin-bottom: 8px;">Productos activos</p>
                    <h3 class="font-display" style="font-size: 2.4rem; color: var(--primary); margin-bottom: 10px;">
                        {{ $activeProductsCount }}
                    </h3>
                    <p class="muted">
                        Productos visibles actualmente en la pantalla pública.
                    </p>
                </div>
            </article>

            <article class="card">
                <div class="card-body">
                    <p class="muted" style="margin-bottom: 8px;">Acceso rápido</p>
                    <h3 class="font-display" style="font-size: 2rem; color: var(--primary); margin-bottom: 10px;">
                        Gestión
                    </h3>
                    <p class="muted">
                        Administra productos, promociones y estilo general desde un solo panel.
                    </p>
                </div>
            </article>
        </div>
    </section>

    <section class="section">
        <div class="grid grid-2">
            <article class="card">
                <div class="card-body">
                    <p class="muted" style="text-transform: uppercase; letter-spacing: 0.14em; font-size: 0.8rem; margin-bottom: 10px;">
                        Productos
                    </p>

                    <h3 class="font-display" style="font-size: 2rem; margin-bottom: 12px;">
                        Administrar menú
                    </h3>

                    <p class="muted" style="margin-bottom: 20px; line-height: 1.7;">
                        Consulta, agrega, edita o elimina productos del menú digital. Aquí se controla
                        toda la oferta visible para comida y bebida.
                    </p>

                    <div style="display: flex; flex-wrap: wrap; gap: 12px;">
                        <a href="{{ route('products.index') }}" class="btn btn-primary">
                            Ver productos
                        </a>

                        <a href="{{ route('products.create') }}" class="btn btn-secondary">
                            Agregar producto
                        </a>
                    </div>
                </div>
            </article>

            <article class="card">
                <div class="card-body">
                    <p class="muted" style="text-transform: uppercase; letter-spacing: 0.14em; font-size: 0.8rem; margin-bottom: 10px;">
                        Ajustes visuales
                    </p>

                    <h3 class="font-display" style="font-size: 2rem; margin-bottom: 12px;">
                        Configuración general
                    </h3>

                    <p class="muted" style="margin-bottom: 20px; line-height: 1.7;">
                        Modifica color principal, color de fondo, imagen de fondo, texto promocional
                        y la contraseña de acceso al administrador.
                    </p>

                    <div style="display: flex; flex-wrap: wrap; gap: 12px;">
                        <a href="{{ route('settings.edit') }}" class="btn btn-primary">
                            Editar configuración
                        </a>

                        <a href="{{ route('menu.public') }}" target="_blank" class="btn btn-secondary">
                            Ver menú en línea
                        </a>
                    </div>
                </div>
            </article>
        </div>
    </section>

    <section class="section">
        <div class="card">
            <div class="card-body">
                <p class="muted" style="text-transform: uppercase; letter-spacing: 0.14em; font-size: 0.8rem; margin-bottom: 10px;">
                    Recomendación
                </p>

                <h3 class="font-display" style="font-size: 1.9rem; margin-bottom: 12px;">
                    Siguiente paso sugerido
                </h3>

                <p class="muted" style="line-height: 1.8;">
                    Comienza agregando algunos productos de prueba en las categorías de comida y bebida.
                    Después revisa la configuración visual para activar una promoción y personalizar el
                    fondo del menú público.
                </p>
            </div>
        </div>
    </section>
@endsection