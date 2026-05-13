@extends('layouts.app')

@section('content')
    <section class="section">
        <div class="soft-card" style="padding: 28px;">
            <div style="display: flex; align-items: center; justify-content: space-between; gap: 16px; flex-wrap: wrap;">
                <div>
                    <p class="muted" style="text-transform: uppercase; letter-spacing: 0.18em; font-size: 0.8rem; margin-bottom: 10px;">
                        Consulta individual
                    </p>

                    <h2 class="font-display page-title" style="margin-bottom: 12px;">
                        Detalle del producto
                    </h2>

                    <p class="page-subtitle">
                        Revisa la información completa de <strong>{{ $product->name }}</strong> dentro del menú digital de dogoow.
                    </p>
                </div>

                <div style="display: flex; gap: 12px; flex-wrap: wrap;">
                    <a href="{{ route('products.index') }}" class="btn btn-secondary">
                        Volver al listado
                    </a>

                    <a href="{{ route('products.edit', $product) }}" class="btn btn-primary">
                        Editar producto
                    </a>
                </div>
            </div>
        </div>
    </section>

    <section class="section">
        <div class="grid grid-2" style="align-items: start;">
            <article class="card">
                <div style="height: 360px; background: linear-gradient(135deg, #E9D6C2, #FBF4EC); overflow: hidden; display: grid; place-items: center; color: var(--text-soft);">
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
            </article>

            <article class="card">
                <div class="card-body">
                    <div style="display: flex; align-items: flex-start; justify-content: space-between; gap: 16px; flex-wrap: wrap; margin-bottom: 18px;">
                        <div>
                            <h3 class="font-display" style="font-size: 2.3rem; margin-bottom: 8px;">
                                {{ $product->name }}
                            </h3>

                            <div style="display: flex; gap: 8px; flex-wrap: wrap;">
                                <span class="badge {{ $product->category === 'comida' ? 'badge-food' : 'badge-drink' }}">
                                    {{ ucfirst($product->category) }}
                                </span>

                                @if($product->is_active)
                                    <span class="badge badge-active">Activo</span>
                                @else
                                    <span class="badge badge-inactive">Oculto</span>
                                @endif
                            </div>
                        </div>

                        <div style="background: var(--primary); color: #FBF4EC; padding: 12px 16px; border-radius: 999px; font-weight: 700; font-size: 1rem; white-space: nowrap;">
                            ${{ number_format($product->price, 2) }}
                        </div>
                    </div>

                    <div style="display: grid; gap: 16px;">
                        <div>
                            <p class="muted" style="margin-bottom: 6px;">Descripción</p>
                            <p style="line-height: 1.8;">
                                {{ $product->description ?: 'Sin descripción disponible.' }}
                            </p>
                        </div>

                        <div>
                            <p class="muted" style="margin-bottom: 6px;">Orden de aparición</p>
                            <p>{{ $product->sort_order }}</p>
                        </div>

                        <div>
                            <p class="muted" style="margin-bottom: 6px;">URL de imagen</p>
                            @if($product->image_url)
                                <a href="{{ $product->image_url }}" target="_blank" class="muted" style="word-break: break-all;">
                                    {{ $product->image_url }}
                                </a>
                            @else
                                <p class="muted">No se registró una URL de imagen.</p>
                            @endif
                        </div>

                        <div>
                            <p class="muted" style="margin-bottom: 6px;">Fechas del registro</p>
                            <p style="margin-bottom: 4px;">
                                <strong>Creado:</strong> {{ $product->created_at->format('d/m/Y H:i') }}
                            </p>
                            <p>
                                <strong>Actualizado:</strong> {{ $product->updated_at->format('d/m/Y H:i') }}
                            </p>
                        </div>
                    </div>

                    <div style="display: flex; gap: 12px; flex-wrap: wrap; margin-top: 24px;">
                        <a href="{{ route('products.edit', $product) }}" class="btn btn-primary">
                            Editar
                        </a>

                        <form action="{{ route('products.destroy', $product) }}" method="POST" onsubmit="return confirm('¿Seguro que deseas eliminar este producto?');">
                            @csrf
                            @method('DELETE')
                            <button type="submit" class="btn btn-danger">
                                Eliminar
                            </button>
                        </form>
                    </div>
                </div>
            </article>
        </div>
    </section>
@endsection