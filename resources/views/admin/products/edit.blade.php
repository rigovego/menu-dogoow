@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="soft-card" style="padding: 28px;">
            <div style="display: flex; align-items: center; justify-content: space-between; gap: 16px; flex-wrap: wrap;">
                <div>
                    <p class="muted" style="text-transform: uppercase; letter-spacing: 0.18em; font-size: 0.8rem; margin-bottom: 10px;">
                        Edición de registro
                    </p>

                    <h2 class="font-display page-title" style="margin-bottom: 12px;">
                        Editar producto
                    </h2>

                    <p class="page-subtitle">
                        Modifica la información de <strong>{{ $product->name }}</strong> para actualizar su contenido dentro del menú digital de dogoow.
                    </p>
                </div>

                <div style="display: flex; gap: 12px; flex-wrap: wrap;">
                    <a href="{{ route('products.index') }}" class="btn btn-secondary">
                        Volver al listado
                    </a>

                    <a href="{{ route('products.show', $product) }}" class="btn btn-secondary">
                        Ver detalle
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="card">
            <div class="card-body">
                <form action="{{ route('products.update', $product) }}" method="POST">
                    @csrf
                    @method('PUT')

                    <div class="grid grid-2">
                        <div class="field">
                            <label for="name">Nombre del producto</label>
                            <input
                                type="text"
                                name="name"
                                id="name"
                                value="{{ old('name', $product->name) }}"
                                placeholder="Ej. Dogo clásico"
                                required
                            >
                        </div>

                        <div class="field">
                            <label for="category">Categoría</label>
                            <select name="category" id="category" required>
                                <option value="">Selecciona una categoría</option>
                                <option value="comida" {{ old('category', $product->category) === 'comida' ? 'selected' : '' }}>Comida</option>
                                <option value="bebida" {{ old('category', $product->category) === 'bebida' ? 'selected' : '' }}>Bebida</option>
                            </select>
                        </div>
                    </div>

                    <div class="field">
                        <label for="description">Descripción breve</label>
                        <textarea
                            name="description"
                            id="description"
                            placeholder="Describe brevemente el producto">{{ old('description', $product->description) }}</textarea>
                    </div>

                    <div class="grid grid-2">
                        <div class="field">
                            <label for="price">Precio</label>
                            <input
                                type="number"
                                name="price"
                                id="price"
                                value="{{ old('price', $product->price) }}"
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
                                value="{{ old('sort_order', $product->sort_order) }}"
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
                            value="{{ old('image_url', $product->image_url) }}"
                            placeholder="https://ejemplo.com/imagen.jpg"
                        >
                    </div>

                    <div class="field">
                        <label style="margin-bottom: 10px;">Vista actual del producto</label>
                        <div class="card" style="max-width: 360px;">
                            <div style="height: 200px; background: linear-gradient(135deg, #E9D6C2, #FBF4EC); overflow: hidden; display: grid; place-items: center; color: var(--text-soft);">
                                @if($product->image_url)
                                    <img
                                        src="{{ $product->image_url }}"
                                        alt="{{ $product->name }}"
                                        style="width: 100%; height: 100%; object-fit: cover;"
                                    >
                                @else
                                    <span>Imagen no disponible</span>
                                @endif
                            </div>

                            <div class="card-body">
                                <div style="display: flex; align-items: flex-start; justify-content: space-between; gap: 12px; margin-bottom: 12px;">
                                    <div>
                                        <h3 class="font-display" style="font-size: 1.5rem; margin-bottom: 6px;">
                                            {{ $product->name }}
                                        </h3>

                                        <span class="badge {{ $product->category === 'comida' ? 'badge-food' : 'badge-drink' }}">
                                            {{ ucfirst($product->category) }}
                                        </span>
                                    </div>

                                    <div style="background: var(--primary); color: #FBF4EC; padding: 10px 14px; border-radius: 999px; font-weight: 700; white-space: nowrap;">
                                        ${{ number_format($product->price, 2) }}
                                    </div>
                                </div>

                                <p class="muted">
                                    {{ $product->description ?: 'Sin descripción disponible.' }}
                                </p>
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
                                {{ old('is_active', $product->is_active) ? 'checked' : '' }}
                            >
                            Mostrar este producto en el menú público
                        </label>
                    </div>

                    <div style="display: flex; gap: 12px; flex-wrap: wrap; margin-top: 24px;">
                        <button type="submit" class="btn btn-primary">
                            Guardar cambios
                        </button>

                        <a href="{{ route('products.show', $product) }}" class="btn btn-secondary">
                            Cancelar
                        </a>
                    </div>
                </form>
            </div>
        </div>
    </section>
@endsection