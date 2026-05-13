@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="container" style="max-width: 520px; padding: 0;">
            <div class="soft-card" style="padding: 32px;">
                <div style="text-align: center; margin-bottom: 28px;">
                    <div style="width: 82px; height: 82px; margin: 0 auto 16px; border-radius: 24px; background: linear-gradient(135deg, var(--primary), #D96A5D); display: grid; place-items: center; box-shadow: var(--shadow);">
                        <img
                            src="{{ asset('img/logo.png') }}"
                            alt="Logo de dogoow"
                            style="width: 54px; height: 54px; object-fit: contain;"
                        >
                    </div>

                    <p class="muted" style="text-transform: uppercase; letter-spacing: 0.18em; font-size: 0.8rem; margin-bottom: 10px;">
                        Acceso administrativo
                    </p>

                    <h2 class="font-display page-title" style="font-size: 2.4rem; margin-bottom: 10px;">
                        Entrar al panel
                    </h2>

                    <p class="page-subtitle" style="margin: 0 auto;">
                        Ingresa la contraseña única para administrar productos, promociones y ajustes visuales de <strong>dogoow</strong>.
                    </p>
                </div>

                <form action="{{ route('admin.login.submit') }}" method="POST">
                    @csrf

                    <div class="field">
                        <label for="password">Contraseña</label>
                        <input
                            type="password"
                            name="password"
                            id="password"
                            placeholder="Escribe la contraseña"
                            required
                            autofocus
                        >
                    </div>

                    <div style="display: grid; gap: 12px; margin-top: 22px;">
                        <button type="submit" class="btn btn-primary" style="width: 100%;">
                            Entrar al administrador
                        </button>

                        <a href="{{ route('menu.public') }}" class="btn btn-secondary" style="width: 100%;">
                            Volver al menú público
                        </a>
                    </div>
                </form>

                <div style="margin-top: 22px; padding-top: 18px; border-top: 1px solid rgba(217, 194, 167, 0.8); text-align: center;">
                    <p class="muted" style="font-size: 0.92rem;">
                        Acceso protegido con contraseña única para fines del proyecto escolar.
                    </p>
                </div>
            </div>
        </div>
    </section>
@endsection