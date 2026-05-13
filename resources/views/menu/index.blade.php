@extends('layouts.app')

@section('content')


    @forelse($products as $category => $items)
        <section class="section">
            <div style="display: flex; align-items: center; justify-content: space-between; gap: 16px; margin-bottom: 16px;">
                <div>
                    <p class="muted" style="text-transform: uppercase; letter-spacing: 0.15em; font-size: 0.8rem; margin-bottom: 6px;">
                        Categoría
                    </p>
                    <h3 class="font-display" style="font-size: 2rem; color: var(--primary);">
                        {{ ucfirst($category) }}
                    </h3>
                </div>

                <span class="badge {{ $category === 'comida' ? 'badge-food' : 'badge-drink' }}">
                    {{ $items->count() }} {{ $items->count() === 1 ? 'producto' : 'productos' }}
                </span>
            </div>

            <div class="grid grid-3">
                @foreach($items as $product)
                    <article class="card">
                        <div style="height: 220px; background: linear-gradient(135deg, #E9D6C2, #FBF4EC); overflow: hidden;">
                            @if($product->image_url)
                                <img
                                    src="{{ $product->image_url }}"
                                    alt="{{ $product->name }}"
                                    style="width: 100%; height: 100%; object-fit: cover;"
                                >
                            @else
                                <div style="width: 100%; height: 100%; display: grid; place-items: center; color: var(--text-soft); font-weight: 600;">
                                    Imagen no disponible
                                </div>
                            @endif
                        </div>

                        <div class="card-body">
                            <div style="display: flex; align-items: flex-start; justify-content: space-between; gap: 12px; margin-bottom: 12px;">
                                <div>
                                    <h4 class="font-display" style="font-size: 1.55rem; line-height: 1.2; margin-bottom: 6px;">
                                        {{ $product->name }}
                                    </h4>

                                    <span class="badge {{ $product->category === 'comida' ? 'badge-food' : 'badge-drink' }}">
                                        {{ ucfirst($product->category) }}
                                    </span>
                                </div>

                                <div style="background: var(--primary); color: #FBF4EC; padding: 10px 14px; border-radius: 999px; font-weight: 700; white-space: nowrap;">
                                    ${{ number_format($product->price, 2) }}
                                </div>
                            </div>

                            <p class="muted" style="line-height: 1.7;">
                                {{ $product->description ?: 'Sin descripción disponible.' }}
                            </p>
                        </div>
                    </article>
                @endforeach
            </div>
        </section>
    @empty
        <section class="section">
            <div class="soft-card" style="padding: 32px; text-align: center;">
                <h3 class="font-display" style="font-size: 2rem; color: var(--primary); margin-bottom: 12px;">
                    Aún no hay productos disponibles
                </h3>
                <p class="page-subtitle" style="margin: 0 auto;">
                    Agrega productos desde el panel de administración para comenzar a mostrar el menú digital.
                </p>
            </div>
        </section>
    @endforelse
@endsection