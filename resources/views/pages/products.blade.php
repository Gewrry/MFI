@extends('layouts.app')

@section('title', 'Product Catalog — Makati Foundry, Inc.')
@section('meta_description', 'Browse the complete Makati Foundry product catalog: gate valves, butterfly valves, fire hydrants, pipe fittings, Blue Star uPVC pipes, manhole covers, and more.')

@section('content')

{{-- Page Hero --}}
<div class="page-hero">
    <div class="container-mfi" style="position:relative; z-index:1;">
        <div class="breadcrumb">
            <a href="{{ route('home') }}" style="color:rgba(255,255,255,0.6); text-decoration:none;">Home</a>
            <span class="breadcrumb-sep">›</span>
            <span style="color:#fff;">Products</span>
        </div>
        <span class="section-label">Full Catalog</span>
        <h1 style="font-family:'Barlow Condensed',sans-serif; font-size:clamp(2.5rem,5vw,4rem); font-weight:900; color:#fff; margin:0.5rem 0 1rem; text-transform:uppercase; letter-spacing:-0.02em; line-height:1.0;">
            Product Catalog
        </h1>
        <p style="font-size:1rem; color:rgba(255,255,255,0.7); max-width:560px; line-height:1.7;">
            {{ count($products) }} products across {{ count($categories) - 1 }} categories — all manufactured to PNS and international standards.
        </p>
    </div>
</div>

{{-- ═══════════════════════════════════════════════════════════════
     PRODUCTS WITH ALPINE.JS TABS + MODAL
══════════════════════════════════════════════════════════════════ --}}
<section class="section" aria-label="Product catalog"
    x-data="{
        activeTab: '{{ request('cat', 'all') }}',
        showModal: false,
        selectedProduct: null,
        openModal(product) {
            this.selectedProduct = product;
            this.showModal = true;
            document.body.style.overflow = 'hidden';
        },
        closeModal() {
            this.showModal = false;
            this.selectedProduct = null;
            document.body.style.overflow = '';
        }
    }"
    @keydown.escape.window="closeModal()">

    <div class="container-mfi">

        {{-- Category Tabs --}}
        <div class="cat-tabs" role="tablist" aria-label="Product categories">
            @foreach($categories as $key => $label)
            @php
                $count = match($key) {
                    'all'      => count($products),
                    'valves'   => count(array_filter($products, fn($p) => in_array($p['category'], ['gate-valves','butterfly-valves','check-valves','air-release-valves','angle-float-valve','wye-strainer']))),
                    'fittings' => count(array_filter($products, fn($p) => in_array($p['category'], ['saddle-clamp','dresser-coupling','adaptor-end-cap','valve-boxes','fittings']))),
                    'pipes'    => count(array_filter($products, fn($p) => $p['category'] === 'pipes')),
                    'fire'     => count(array_filter($products, fn($p) => $p['category'] === 'fire-hydrant')),
                    'access'   => count(array_filter($products, fn($p) => $p['category'] === 'di-manhole')),
                    default    => count(array_filter($products, fn($p) => $p['category'] === $key)),
                };
            @endphp
            <button
                class="cat-tab"
                :class="activeTab === '{{ $key }}' ? 'active' : ''"
                @click="activeTab = '{{ $key }}'"
                role="tab"
                :aria-selected="activeTab === '{{ $key }}'"
                id="tab-{{ $key }}">
                {{ $label }} ({{ $count }})
            </button>
            @endforeach
        </div>

        {{-- Product Grid --}}
        <div style="display:grid; grid-template-columns:repeat(auto-fill, minmax(280px, 1fr)); gap:1.5rem;" role="tabpanel">

            @foreach($products as $product)
            <div
                id="product-{{ $product['id'] }}"
                class="product-card"
                x-show="activeTab === 'all' ||
                        activeTab === '{{ $product['category'] }}' ||
                        (activeTab === 'valves' && ['gate-valves','butterfly-valves','check-valves','air-release-valves','angle-float-valve','wye-strainer'].includes('{{ $product['category'] }}')) ||
                        (activeTab === 'fittings' && ['saddle-clamp','dresser-coupling','adaptor-end-cap','valve-boxes','fittings'].includes('{{ $product['category'] }}')) ||
                        (activeTab === 'pipes' && '{{ $product['category'] }}' === 'pipes') ||
                        (activeTab === 'fire' && '{{ $product['category'] }}' === 'fire-hydrant') ||
                        (activeTab === 'access' && '{{ $product['category'] }}' === 'di-manhole')"
                x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0 scale-95"
                x-transition:enter-end="opacity-100 scale-100"
                @click="openModal({{ json_encode([
                    'id'          => $product['id'],
                    'name'        => $product['name'],
                    'category'    => $product['category'],
                    'badge'       => $product['badge'],
                    'image'       => asset('images/' . $product['image']),
                    'tagline'     => $product['tagline'],
                    'specs'       => $product['specs'],
                    'description' => $product['description'],
                    'sizes'       => $product['sizes'],
                ]) }})"
                role="button"
                tabindex="0"
                @keydown.enter="openModal({{ json_encode([
                    'id'          => $product['id'],
                    'name'        => $product['name'],
                    'category'    => $product['category'],
                    'badge'       => $product['badge'],
                    'image'       => asset('images/' . $product['image']),
                    'tagline'     => $product['tagline'],
                    'specs'       => $product['specs'],
                    'description' => $product['description'],
                    'sizes'       => $product['sizes'],
                ]) }})"
                aria-label="View details for {{ $product['name'] }}"
                style="cursor:pointer;">

                <div class="product-card-img" style="position:relative;">
                    <img
                        src="{{ asset('images/' . $product['image']) }}"
                        alt="{{ $product['name'] }} — Makati Foundry"
                        loading="lazy"
                        onerror="this.src='{{ asset('images/products/placeholder.svg') }}'"
                        style="max-height:160px; width:auto; max-width:100%; object-fit:contain;">
                </div>

                <div class="product-card-body">
                    <span class="product-badge badge-{{ $product['category'] }}">{{ $product['badge'] }}</span>
                    <h2 style="font-family:'Barlow Condensed',sans-serif; font-size:1.2rem; font-weight:700; color:#0A1628; margin:0.25rem 0 0.5rem; line-height:1.2;">{{ $product['name'] }}</h2>
                    <p style="font-size:0.825rem; color:#64748B; line-height:1.5; margin:0 0 1rem;">{{ $product['tagline'] }}</p>

                    {{-- Mini spec preview --}}
                    @php $firstSpec = array_slice($product['specs'], 0, 2, true); @endphp
                    <div style="border-top:1px solid #F1F5F9; padding-top:0.75rem; margin-bottom:1rem;">
                        @foreach($firstSpec as $key => $val)
                        <div style="display:flex; justify-content:space-between; font-size:0.775rem; padding:0.2rem 0;">
                            <span style="color:#94A3B8; font-weight:500;">{{ $key }}</span>
                            <span style="color:#475569; font-weight:600; text-align:right; max-width:55%;">{{ $val }}</span>
                        </div>
                        @endforeach
                    </div>

                    <div style="display:flex; align-items:center; justify-content:space-between;">
                        <span style="font-size:0.8rem; font-weight:600; color:#2563EB; display:flex; align-items:center; gap:0.25rem;">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><path d="M12 4.5C7 4.5 2.73 7.61 1 12c1.73 4.39 6 7.5 11 7.5s9.27-3.11 11-7.5c-1.73-4.39-6-7.5-11-7.5zM12 17c-2.76 0-5-2.24-5-5s2.24-5 5-5 5 2.24 5 5-2.24 5-5 5zm0-8c-1.66 0-3 1.34-3 3s1.34 3 3 3 3-1.34 3-3-1.34-3-3-3z"/></svg>
                            View Full Specs
                        </span>
                        <span style="font-size:0.75rem; color:#94A3B8;">{{ count($product['specs']) }} specs</span>
                    </div>
                </div>
            </div>
            @endforeach
        </div>

        {{-- Empty state (all hidden) --}}
        <div x-show="false" style="text-align:center; padding:4rem 0; color:#94A3B8;">
            No products found in this category.
        </div>
    </div>

    {{-- ═════════════════════════════════════════════════
         PRODUCT DETAIL MODAL
    ══════════════════════════════════════════════════ --}}
    <div
        class="modal-overlay"
        x-show="showModal"
        x-cloak
        x-transition:enter="transition ease-out duration-200"
        x-transition:enter-start="opacity-0"
        x-transition:enter-end="opacity-100"
        x-transition:leave="transition ease-in duration-150"
        x-transition:leave-start="opacity-100"
        x-transition:leave-end="opacity-0"
        @click.self="closeModal()"
        role="dialog"
        aria-modal="true"
        :aria-label="selectedProduct ? 'Product details: ' + selectedProduct.name : 'Product details'">

        <div
            class="modal-card"
            x-show="showModal"
            x-transition:enter="transition ease-out duration-250"
            x-transition:enter-start="opacity-0 scale-95 translate-y-4"
            x-transition:enter-end="opacity-100 scale-100 translate-y-0"
            x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100 scale-100"
            x-transition:leave-end="opacity-0 scale-95">

            <template x-if="selectedProduct">
                <div>
                    {{-- Modal Header --}}
                    <div style="padding:1.5rem 1.75rem; border-bottom:1px solid #E2E8F0; display:flex; align-items:flex-start; justify-content:space-between; gap:1rem; position:sticky; top:0; background:#fff; z-index:10; border-radius:1rem 1rem 0 0;">
                        <div>
                            <span class="product-badge" :class="'badge-' + selectedProduct.category" x-text="selectedProduct.badge"></span>
                            <h2 style="font-family:'Barlow Condensed',sans-serif; font-size:1.75rem; font-weight:800; color:#0A1628; margin:0.25rem 0 0; line-height:1.1;" x-text="selectedProduct.name"></h2>
                        </div>
                        <button
                            @click="closeModal()"
                            style="flex-shrink:0; width:36px; height:36px; border:1px solid #E2E8F0; border-radius:0.5rem; background:#fff; cursor:pointer; display:flex; align-items:center; justify-content:center; color:#64748B; transition:all 0.2s;"
                            onmouseover="this.style.background='#FEF2F2'; this.style.color='#DC2626'; this.style.borderColor='#FCA5A5'"
                            onmouseout="this.style.background='#fff'; this.style.color='#64748B'; this.style.borderColor='#E2E8F0'"
                            aria-label="Close modal">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/></svg>
                        </button>
                    </div>

                    {{-- Modal Body --}}
                    <div style="padding:1.75rem; display:grid; grid-template-columns:auto 1fr; gap:2rem; align-items:start;">

                        {{-- Product image --}}
                        <div style="width:200px; flex-shrink:0; background:#F8FAFC; border:1px solid #E2E8F0; border-radius:0.75rem; padding:1.5rem; display:flex; align-items:center; justify-content:center; aspect-ratio:1;">
                            <img
                                :src="selectedProduct.image"
                                :alt="selectedProduct.name"
                                style="max-width:100%; max-height:140px; object-fit:contain;"
                                onerror="this.src='{{ asset('images/products/placeholder.svg') }}'">
                        </div>

                        {{-- Description --}}
                        <div>
                            <p style="font-size:0.9rem; color:#475569; line-height:1.75; margin:0 0 1rem;" x-text="selectedProduct.tagline" style="font-style:italic; color:#64748B;"></p>
                            <p style="font-size:0.875rem; color:#475569; line-height:1.75; margin:0;" x-text="selectedProduct.description"></p>
                        </div>
                    </div>

                    {{-- Specs Table --}}
                    <div style="padding:0 1.75rem 1.5rem;">
                        <h3 style="font-family:'Barlow Condensed',sans-serif; font-size:1.1rem; font-weight:700; color:#0A1628; margin:0 0 0.75rem; text-transform:uppercase; letter-spacing:0.05em;">Technical Specifications</h3>
                        <table class="spec-table">
                            <tbody>
                                <template x-for="(value, key) in selectedProduct.specs" :key="key">
                                    <tr>
                                        <td x-text="key"></td>
                                        <td x-text="value"></td>
                                    </tr>
                                </template>
                            </tbody>
                        </table>
                    </div>

                    {{-- Available Sizes --}}
                    <div style="padding:0 1.75rem 1.5rem;">
                        <h3 style="font-family:'Barlow Condensed',sans-serif; font-size:1.1rem; font-weight:700; color:#0A1628; margin:0 0 0.75rem; text-transform:uppercase; letter-spacing:0.05em;">Available Sizes / Dimensions</h3>
                        <div style="display:flex; flex-wrap:wrap; gap:0.5rem;">
                            <template x-for="size in selectedProduct.sizes" :key="size">
                                <span style="background:#F1F5F9; border:1px solid #E2E8F0; border-radius:0.375rem; padding:0.25rem 0.6rem; font-size:0.8rem; font-weight:600; color:#0A1628;" x-text="size"></span>
                            </template>
                        </div>
                    </div>

                    {{-- Modal Footer --}}
                    <div style="padding:1.25rem 1.75rem; border-top:1px solid #E2E8F0; background:#F8FAFC; border-radius:0 0 1rem 1rem; display:flex; flex-wrap:wrap; gap:0.75rem; align-items:center; justify-content:flex-end;">
                        <div style="display:flex; gap:0.75rem; flex-wrap:wrap;">
                            <a :href="'/products/' + selectedProduct.id + '/spec-sheet'" target="_blank" style="display:inline-flex; align-items:center; gap:0.4rem; font-size:0.825rem; font-weight:700; color:#1B3A5C; text-decoration:none; padding:0.5rem 1rem; border:1px solid #CBD5E1; border-radius:0.375rem; background:#fff; transition:all 0.2s;" onmouseover="this.style.borderColor='#F26522'; this.style.color='#F26522'" onmouseout="this.style.borderColor='#CBD5E1'; this.style.color='#1B3A5C'">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><path d="M19 9h-4V3H9v6H5l7 7 7-7zM5 18v2h14v-2H5z"/></svg>
                                Download Technical Spec Sheet 📄
                            </a>
                            <a :href="'{{ route('contact') }}?product=' + encodeURIComponent(selectedProduct.name)" class="btn btn-primary btn-sm">
                                <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><path d="M20 4H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/></svg>
                                Request a Quote for This Product
                            </a>
                        </div>
                    </div>
                </div>
            </template>
        </div>
    </div>

</section>

{{-- CTA Strip --}}
<section style="background:#F8FAFC; border-top:1px solid #E2E8F0; padding:3rem 0;" aria-label="Inquiry CTA">
    <div class="container-mfi" style="text-align:center;">
        <h3 style="font-family:'Barlow Condensed',sans-serif; font-size:2rem; font-weight:800; color:#0A1628; margin:0 0 0.75rem; text-transform:uppercase;">Can't find what you need?</h3>
        <p style="color:#64748B; margin:0 0 1.5rem; font-size:0.95rem;">Contact our technical sales team with your project specifications — we'll provide the right product recommendation.</p>
        <a href="{{ route('contact') }}" class="btn btn-primary" id="products-cta">Inquire Now →</a>
    </div>
</section>

@endsection
