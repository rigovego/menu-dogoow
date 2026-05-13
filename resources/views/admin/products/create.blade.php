@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="soft-card" style="padding: 28px;">
            <div style="display: flex; align-items: center; justify-content: space-between; gap: 16px; flex-wrap: wrap;">
                <div>
                    <p class="muted" style="text-transform: uppercase; letter-spacing: 0.18em; font-size: 0.8rem; margin-bottom: 10px;">
                        Nuevo registro
                    </p>

                    <h2 class="font-display page-title" style="margin-bottom: 12px;">
                        Agregar producto
                    </h2>

                    <p class="page-subtitle">
                        Completa la información del producto para integrarlo al menú digital público de dogoow.
                    </p>
                </div>

                <div style="display: flex; gap: 12px; flex-wrap: wrap;">
                    <a href="{{ route('products.index') }}" class="btn btn-secondary">
                        Volver al listado
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('products.store') }}" method="POST">
                    @csrf

                    <div class="grid grid-2">
                        <div class="field">
                            <label for="name">Nombre del producto</label>
                            <input
                                type="text"
                                name="name"
                                id="name"
                                value="{{ old('name') }}"
                                placeholder="Ej. Dogo clásico"
                                required
                            >
                        </div>

                        <div class="field">
                            <label for="category">Categoría</label>
                            <select name="category" id="category" required>
                                <option value="">Selecciona una categoría</option>
                                <option value="comida" {{ old('category') === 'comida' ? 'selected' : '' }}>Comida</option>
                                <option value="bebida" {{ old('category') === 'bebida' ? 'selected' : '' }}>Bebida</option>
                            </select>
                        </div>
                    </div>

                    <div class="field">
                        <label for="description">Descripción breve</label>
                        <textarea
                            name="description"
                            id="description"
                            placeholder="Describe brevemente el producto">{{ old('description') }}</textarea>
                    </div>

                    <div class="grid grid-2">
                        <div class="field">
                            <label for="price">Precio</label>
                            <input
                                type="number"
                                name="price"
                                id="price"
                                value="{{ old('price') }}"
                                placeholder="Ej. 85"
                                step="0.01"
                                min="0"
                                required
                            >
                        </div>

                        <div class="field">
                            <label for="sort_order">Orden de aparición</label>
                            <input
                                type="number"
                                name="sort_order"
                                id="sort_order"
                                value="{{ old('sort_order', 0) }}"
                                placeholder="Ej. 1"
                                min="0"
                            >
                        </div>
                    </div>

                    <div class="field">
                        <label for="image_url">URL de imagen</label>
                        <input
                            type="url"
                            name="image_url"
                            id="image_url"
                            value="{{ old('image_url') }}"
                            placeholder="https://ejemplo.com/imagen.jpg"
                        >
                    </div>

                    <div class="field">
                        <label style="margin-bottom: 10px;">Vista previa rápida</label>
                        <div class="card" style="max-width: 320px;">
                            <div style="height: 180px; background: linear-gradient(135deg, #E9D6C2, #FBF4EC); display: grid; place-items: center; color: var(--text-soft);">
                                Imagen del producto
                            </div>
                            <div class="card-body">
                                <h3 class="font-display" style="font-size: 1.5rem; margin-bottom: 8px;">
                                    Nombre del producto
                                </h3>
                                <p class="muted" style="margin-bottom: 12px;">
                                    La tarjeta del menú mostrará nombre, categoría, descripción y precio.
                                </p>
                                <span class="badge badge-food">Ejemplo</span>
                            </div>
                        </div>
                    </div>

                    <div class="field">
                        <label class="inline-check" for="is_active" style="margin-bottom: 0;">
                            <input
                                type="checkbox"
                                name="is_active"
                                id="is_active"
                                value="1"
                                {{ old('is_active', true) ? 'checked' : '' }}
                            >
                            Mostrar este producto en el menú público
                        </label>
                    </div>

                    <div style="display: flex; gap: 12px; flex-wrap: wrap; margin-top: 24px;">
                        <button type="submit" class="btn btn-primary">
                            Guardar producto
                        </button>

                        <a href="{{ route('products.index') }}" class="btn btn-secondary">
                            Cancelar
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection