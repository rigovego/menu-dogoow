@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="soft-card" style="padding: 28px;">
            <div style="display: flex; align-items: center; justify-content: space-between; gap: 16px; flex-wrap: wrap;">
                <div>
                    <p class="muted" style="text-transform: uppercase; letter-spacing: 0.18em; font-size: 0.8rem; margin-bottom: 10px;">
                        Administración de productos
                    </p>

                    <h2 class="font-display page-title" style="margin-bottom: 12px;">
                        Productos del menú
                    </h2>

                    <p class="page-subtitle">
                        Consulta todos los registros del menú digital y administra su información,
                        visibilidad, categoría, precio e imagen.
                    </p>
                </div>

                <div style="display: flex; gap: 12px; flex-wrap: wrap;">
                    <a href="{{ route('admin.dashboard') }}" class="btn btn-secondary">
                        Volver al panel
                    </a>

                    <a href="{{ route('products.create') }}" class="btn btn-primary">
                        Agregar producto
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        @if($products->isEmpty())
            <div class="soft-card" style="padding: 32px; text-align: center;">
                <h3 class="font-display" style="font-size: 2rem; color: var(--primary); margin-bottom: 12px;">
                    Aún no hay productos registrados
                </h3>

                <p class="page-subtitle" style="margin: 0 auto 20px;">
                    Comienza agregando productos de comida y bebida para construir el menú digital de dogoow.
                </p>

                <a href="{{ route('products.create') }}" class="btn btn-primary">
                    Crear primer producto
                </a>
            </div>
        @else
            <div class="table-wrap">
                <table>
                    <thead>
                        <tr>
                            <th style="min-width: 100px;">Imagen</th>
                            <th style="min-width: 180px;">Nombre</th>
                            <th style="min-width: 120px;">Categoría</th>
                            <th style="min-width: 120px;">Precio</th>
                            <th style="min-width: 110px;">Estado</th>
                            <th style="min-width: 100px;">Orden</th>
                            <th style="min-width: 260px;">Acciones</th>
                        </tr>
                    </thead>

                    <tbody>
                        @foreach($products as $product)
                            <tr>
                                <td>
                                    <div style="width: 72px; height: 72px; border-radius: 18px; overflow: hidden; background: #F5E9DA; border: 1px solid var(--border); display: grid; place-items: center;">
                                        @if($product->image_url)
                                            <img
                                                src="{{ $product->image_url }}"
                                                alt="{{ $product->name }}"
                                                style="width: 100%; height: 100%; object-fit: cover;"
                                            >
                                        @else
                                            <span class="muted" style="font-size: 0.78rem; text-align: center; padding: 6px;">
                                                Sin imagen
                                            </span>
                                        @endif
                                    </div>
                                </td>

                                <td>
                                    <strong style="display: block; margin-bottom: 6px;">
                                        {{ $product->name }}
                                    </strong>

                                    <span class="muted" style="font-size: 0.88rem;">
                                        {{ \Illuminate\Support\Str::limit($product->description, 60) ?: 'Sin descripción.' }}
                                    </span>
                                </td>

                                <td>
                                    <span class="badge {{ $product->category === 'comida' ? 'badge-food' : 'badge-drink' }}">
                                        {{ ucfirst($product->category) }}
                                    </span>
                                </td>

                                <td>
                                    <strong>${{ number_format($product->price, 2) }}</strong>
                                </td>

                                <td>
                                    @if($product->is_active)
                                        <span class="badge badge-active">Activo</span>
                                    @else
                                        <span class="badge badge-inactive">Oculto</span>
                                    @endif
                                </td>

                                <td>
                                    <span class="muted">{{ $product->sort_order }}</span>
                                </td>

                                <td>
                                    <div style="display: flex; gap: 8px; flex-wrap: wrap;">
                                        <a href="{{ route('products.show', $product) }}" class="btn btn-secondary" style="padding: 10px 14px;">
                                            Ver
                                        </a>

                                        <a href="{{ route('products.edit', $product) }}" class="btn btn-primary" style="padding: 10px 14px;">
                                            Editar
                                        </a>

                                        <form action="{{ route('products.destroy', $product) }}" method="POST" onsubmit="return confirm('¿Seguro que deseas eliminar este producto?');">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit" class="btn btn-danger" style="padding: 10px 14px;">
                                                Eliminar
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        @endif
    </section>
@endsection