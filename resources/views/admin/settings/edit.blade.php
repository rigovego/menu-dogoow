@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="soft-card" style="padding: 28px;">
            <div style="display: flex; align-items: center; justify-content: space-between; gap: 16px; flex-wrap: wrap;">
                <div>
                    <p class="muted" style="text-transform: uppercase; letter-spacing: 0.18em; font-size: 0.8rem; margin-bottom: 10px;">
                        Configuración general
                    </p>

                    <h2 class="font-display page-title" style="margin-bottom: 12px;">
                        Ajustes visuales y acceso
                    </h2>

                    <p class="page-subtitle">
                        Personaliza la apariencia del menú público, administra la promoción activa y actualiza la contraseña de acceso al panel.
                    </p>
                </div>

                <div style="display: flex; gap: 12px; flex-wrap: wrap;">
                    <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">
                        Volver al panel
                    </a>

                    <a href="{{ route('menu.public') }}" target="_blank" class="btn btn-primary">
                        Ver menú público
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="grid grid-2">
            <article class="card">
                <div class="card-body">
                    <form action="{{ route('settings.update') }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="grid grid-2">
                            <div class="field">
                                <label for="primary_color">Color principal</label>
                                <input
                                    type="text"
                                    name="primary_color"
                                    id="primary_color"
                                    value="{{ old('primary_color', $setting->primary_color) }}"
                                    placeholder="#C94A3F"
                                    required
                                >
                            </div>

                            <div class="field">
                                <label for="background_color">Color de fondo</label>
                                <input
                                    type="text"
                                    name="background_color"
                                    id="background_color"
                                    value="{{ old('background_color', $setting->background_color) }}"
                                    placeholder="#F5E9DA"
                                    required
                                >
                            </div>
                        </div>

                        <div class="field">
                            <label for="background_image_url">URL de imagen de fondo</label>
                            <input
                                type="url"
                                name="background_image_url"
                                id="background_image_url"
                                value="{{ old('background_image_url', $setting->background_image_url) }}"
                                placeholder="https://ejemplo.com/fondo.jpg"
                            >
                        </div>

                        <div class="field">
                            <label for="promo_text">Texto promocional</label>
                            <input
                                type="text"
                                name="promo_text"
                                id="promo_text"
                                value="{{ old('promo_text', $setting->promo_text) }}"
                                placeholder="Ej. ¡Llévate tu combo favorito en dogoow!"
                            >
                        </div>

                        <div class="field">
                            <label class="inline-check" for="promo_active" style="margin-bottom: 0;">
                                <input
                                    type="checkbox"
                                    name="promo_active"
                                    id="promo_active"
                                    value="1"
                                    {{ old('promo_active', $setting->promo_active) ? 'checked' : '' }}
                                >
                                Activar promoción en la parte superior del menú
                            </label>
                        </div>

                        <div class="field">
                            <label for="admin_password">Nueva contraseña del administrador</label>
                            <input
                                type="password"
                                name="admin_password"
                                id="admin_password"
                                placeholder="Déjala vacía si no deseas cambiarla"
                            >
                        </div>

                        <div style="display: flex; gap: 12px; flex-wrap: wrap; margin-top: 24px;">
                            <button type="submit" class="btn btn-primary">
                                Guardar configuración
                            </button>

                            <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">
                                Cancelar
                            </a>
                        </div>
                    </form>
                </div>
            </article>

            <article class="card">
                <div class="card-body">
                    <p class="muted" style="text-transform: uppercase; letter-spacing: 0.14em; font-size: 0.8rem; margin-bottom: 10px;">
                        Vista previa de estilo
                    </p>

                    <div style="
                        border-radius: 24px;
                        overflow: hidden;
                        border: 1px solid var(--border);
                        background:
                            linear-gradient(rgba(245, 233, 218, 0.88), rgba(245, 233, 218, 0.92)),
                            url('{{ $setting->background_image_url ?? '' }}');
                        background-color: {{ $setting->background_color }};
                        background-size: cover;
                        background-position: center;
                        min-height: 420px;
                        padding: 24px;
                        display: flex;
                        flex-direction: column;
                        justify-content: space-between;
                    ">
                        <div style="display: flex; align-items: center; justify-content: space-between; gap: 12px;">
                            <img
                                src="{{ asset('img/logo.png') }}"
                                alt="Logo de dogoow"
                                style="width: 130px; height: auto; object-fit: contain;"
                            >

                            <span style="
                                background: {{ $setting->primary_color }};
                                color: #FBF4EC;
                                padding: 10px 16px;
                                border-radius: 999px;
                                font-weight: 700;
                            ">
                                dogoow
                            </span>
                        </div>

                        @if($setting->promo_active && $setting->promo_text)
                            <div style="
                                background: #D9A441;
                                color: #5C4033;
                                border-radius: 999px;
                                padding: 12px 18px;
                                font-weight: 700;
                                white-space: nowrap;
                                overflow: hidden;
                                text-overflow: ellipsis;
                            ">
                                {{ $setting->promo_text }}
                            </div>
                        @endif

                        <div style="display: grid; gap: 14px;">
                            <div style="
                                background: rgba(251, 244, 236, 0.92);
                                border: 1px solid #D9C2A7;
                                border-radius: 22px;
                                padding: 18px;
                            ">
                                <div style="display: flex; align-items: center; justify-content: space-between; gap: 12px; margin-bottom: 10px;">
                                    <h3 class="font-display" style="font-size: 1.5rem; color: {{ $setting->primary_color }};">
                                        Dogo clásico
                                    </h3>

                                    <span style="
                                        background: {{ $setting->primary_color }};
                                        color: #FBF4EC;
                                        padding: 8px 12px;
                                        border-radius: 999px;
                                        font-weight: 700;
                                    ">
                                        $65.00
                                    </span>
                                </div>

                                <p class="muted">
                                    Pan suave, salchicha jumbo, jitomate, cebolla y aderezos.
                                </p>
                            </div>

                            <div style="
                                background: rgba(251, 244, 236, 0.92);
                                border: 1px solid #D9C2A7;
                                border-radius: 22px;
                                padding: 18px;
                            ">
                                <div style="display: flex; align-items: center; justify-content: space-between; gap: 12px; margin-bottom: 10px;">
                                    <h3 class="font-display" style="font-size: 1.5rem; color: {{ $setting->primary_color }};">
                                        Limonada fresa
                                    </h3>

                                    <span style="
                                        background: {{ $setting->primary_color }};
                                        color: #FBF4EC;
                                        padding: 8px 12px;
                                        border-radius: 999px;
                                        font-weight: 700;
                                    ">
                                        $38.00
                                    </span>
                                </div>

                                <p class="muted">
                                    Bebida fresca con un toque dulce y burbujeante.
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            </article>
        </div>
    </section>
@endsection