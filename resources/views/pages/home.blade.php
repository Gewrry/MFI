@extends('layouts.app')

@section('title', 'Makati Foundry, Inc. — Quality Valves, Fire Hydrants, Fittings & Blue Star uPVC Pipes')
@section('meta_description', 'Established in July 1957. Makati Foundry, Inc. manufactures quality valves, fire hydrants, pipe fittings, and Blue Star uPVC pipes. Trusted by water utility corporations nationwide.')

@section('content')

{{-- ═══════════════════════════════════════════════════════════════
     HERO SECTION — Full-bleed product photo
══════════════════════════════════════════════════════════════════ --}}
<section class="hero" id="hero" aria-label="Hero" x-data="heroParallax">

    {{-- Full-bleed product photo background --}}
    <div class="hero-photo">
        <img src="{{ asset('images/hero-pipes-valves.jpg') }}"
             alt="Makati Foundry product lineup — valves, pipes, fittings, and manhole covers"
             fetchpriority="high">
    </div>

    {{-- Dark navy gradient overlay for text legibility --}}
    <div class="hero-overlay"></div>

    {{-- Hero content --}}
    <div class="container-mfi hero-content" style="width:100%; padding-top:clamp(6.5rem, 10vh, 9.5rem); padding-bottom:clamp(3rem, 6vh, 5rem); display:flex; flex-direction:column; justify-content:center;">
        <div style="max-width:820px;">

            {{-- Established badge --}}
            <div class="hero-anim-1" style="display:inline-flex; align-items:center; gap:0.5rem; background:rgba(242,101,34,0.15); border:1px solid rgba(242,101,34,0.35); border-radius:9999px; padding:0.35rem 1rem; margin-bottom:1.75rem;">
                <span style="width:7px; height:7px; border-radius:50%; background:#F26522; display:inline-block; animation: orbPulse 2s ease-in-out infinite;"></span>
                <span style="font-size:0.75rem; font-weight:700; letter-spacing:0.1em; text-transform:uppercase; color:#F26522;">Established July 1957 • BPS Certified</span>
            </div>

            {{-- Orange accent bar --}}
            <div class="hero-accent-bar hero-anim-1"></div>

            {{-- Headline --}}
            <h1 class="hero-anim-2" style="font-family:'Barlow Condensed',sans-serif; font-size:clamp(2.75rem,7vw,5rem); font-weight:900; color:#fff; line-height:1.0; letter-spacing:-0.02em; margin-bottom:1.5rem; text-transform:uppercase; text-shadow: 0 4px 20px rgba(0,0,0,0.7);">
                Built to Flow.<br>
                <span style="color:#F26522; text-shadow: 0 4px 20px rgba(242,101,34,0.3);">Built to Last.</span>
            </h1>

            {{-- Subtext --}}
            <p class="hero-anim-3" style="font-size:1.15rem; color:rgba(255,255,255,0.92); line-height:1.75; max-width:580px; margin-bottom:2.5rem; text-shadow: 0 2px 10px rgba(0,0,0,0.8);">
                Maker of quality valves, fire hydrants, fittings, and BPS-certified <strong style="color:#fff;">Blue Star uPVC Pipes</strong> — the trusted manufacturing partner for waterworks and fire safety infrastructure since 1957.
            </p>

            {{-- Simplified CTAs: 1 Solid Button + 1 High-Contrast Secondary Text Link (#C9D6E3) --}}
            <div class="hero-anim-3" style="display:flex; flex-wrap:wrap; gap:1.25rem; align-items:center;">
                <a href="{{ route('products') }}" class="btn btn-primary btn-lg" id="hero-view-products">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M4 6h16v2H4zm0 5h16v2H4zm0 5h16v2H4z"/></svg>
                    View Products
                </a>
                <a href="{{ route('contact') }}" class="hero-cta-link" id="hero-request-quote">
                    Request a Quote
                    <svg width="16" height="16" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2.5" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14M12 5l7 7-7 7"/></svg>
                </a>
            </div>

            {{-- Trust markers --}}
            <div class="hero-trust-row hero-anim-4">
                <div class="hero-trust-item">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="#F26522"><path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4zm-2 16l-4-4 1.41-1.41L10 14.17l6.59-6.59L18 9l-8 8z"/></svg>
                    <span>BPS Certified Blue Star uPVC</span>
                </div>
                <div class="hero-trust-item">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="#F26522"><path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-7 14l-5-5 1.41-1.41L12 14.17l7.59-7.59L21 8l-9 9z"/></svg>
                    <span>20,000 m² Muntinlupa Plant</span>
                </div>
                <div class="hero-trust-item">
                    <svg width="18" height="18" viewBox="0 0 24 24" fill="#F26522"><path d="M20 2H4c-1 0-2 .9-2 2v18l4-4h14c1.1 0 2-.9 2-2V4c0-1.1-.9-2-2-2zm-7 12h-2v-2h2v2zm0-4h-2V6h2v4z"/></svg>
                    <span>Supplying Utilities Nationwide</span>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ═══════════════════════════════════════════════════════════════
     STATS BAR
══════════════════════════════════════════════════════════════════ --}}
<section class="stats-bar" id="stats-bar-section" aria-label="Company statistics">
    <div class="container-mfi">
        <div class="stats-row-grid reveal" x-data="countUp" x-intersect.once="startAll(); $el.classList.add('reveal-visible')">
            <div class="stat-item" style="border-right:1px solid rgba(255,255,255,0.1); padding:0.5rem 1rem;">
                <div class="stat-number" x-ref="stat1">1957</div>
                <div class="stat-label">Year Established</div>
            </div>
            <div class="stat-item" style="border-right:1px solid rgba(255,255,255,0.1); padding:0.5rem 1rem;">
                <div class="stat-number" x-ref="stat2">20k m²</div>
                <div class="stat-label">Muntinlupa Plant</div>
            </div>
            <div class="stat-item" style="padding:0.5rem 1rem;">
                <div class="stat-number" x-ref="stat3">BPS</div>
                <div class="stat-label">Certified Products</div>
            </div>
        </div>
    </div>
</section>

{{-- ═══════════════════════════════════════════════════════════════
     ABOUT MAKATI FOUNDRY SUMMARY
══════════════════════════════════════════════════════════════════ --}}
<section class="section section-dark" aria-label="About Makati Foundry summary" style="background:var(--color-primary-dark);" x-data>
    <div class="container-mfi">
        <div class="about-split-grid">
            {{-- Left column copy --}}
            <div>
                <span class="section-label reveal" x-intersect.once="$el.classList.add('reveal-visible')">Philippine Manufacturing Pioneer</span>
                <h2 class="section-title reveal reveal-delay-1" x-intersect.once="$el.classList.add('reveal-visible')" style="color:#fff; margin-bottom:1.75rem;">69 Years of Excellence in Water Infrastructure</h2>
                <div style="width:60px; height:4px; background:var(--color-accent); border-radius:2px; margin-bottom:2rem;"></div>
                <p style="color:rgba(255,255,255,0.85); font-size:1rem; line-height:1.8; margin-bottom:1.5rem;">
                    Founded on <strong style="color:#fff;">July 1957</strong> in Makati, Makati Foundry, Inc. has grown into one of the country's most trusted manufacturers of water supply hardware. In 1977, we expanded to a <strong style="color:#fff;">20,000 sqm plant facility in Muntinlupa</strong>, equipping our modern foundry with specialized machinery to meet growing utility demand.
                </p>
                <p style="color:rgba(255,255,255,0.85); font-size:1rem; line-height:1.8; margin-bottom:2rem;">
                    In 1995, we launched <strong style="color:#fff;">Blue Star uPVC Pipes</strong>, certified by the Bureau of Product Standards (BPS), cementing our position as a complete solution provider for potable waterlines, fire safety, and municipal drainage.
                </p>
                <a href="{{ route('about') }}" class="btn btn-primary" id="home-about-learn-more" style="background:var(--color-accent); color:#fff;">
                    Read Our Full History & Facilities →
                </a>
            </div>

            {{-- 4 Pillars highlight cards --}}
            <div class="about-2x2-grid">
                {{-- Card 1: Water Valves --}}
                <div class="reveal reveal-delay-1" x-intersect.once="$el.classList.add('reveal-visible')" style="background:linear-gradient(135deg,var(--color-primary),#2C4E70); border-radius:1rem; padding:1.75rem; color:#fff; display:flex; flex-direction:column; justify-content:space-between; min-height:210px;">
                    <div>
                        <div style="width:44px; height:44px; border-radius:50%; background:rgba(255,255,255,0.12); border:1px solid rgba(255,255,255,0.25); display:flex; align-items:center; justify-content:center; margin-bottom:1rem; color:#8BBDEA;">
                            {{-- Industrial Valve Wheel SVG Icon --}}
                            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <circle cx="12" cy="12" r="9"/>
                                <circle cx="12" cy="12" r="3"/>
                                <path d="M12 3v6M12 15v6M3 12h6M15 12h6"/>
                            </svg>
                        </div>
                        <div style="font-family:'Barlow Condensed',sans-serif; font-size:1.25rem; font-weight:800; margin-bottom:0.5rem; text-transform:uppercase; letter-spacing:0.02em;">Water Valves</div>
                        <p style="font-size:0.85rem; color:rgba(255,255,255,0.8); line-height:1.65; margin:0;">Stress-tested functional designs serving water utility corporations nationwide.</p>
                    </div>
                </div>

                {{-- Card 2: Fire Hydrants --}}
                <div class="reveal reveal-delay-2" x-intersect.once="$el.classList.add('reveal-visible')" style="background:linear-gradient(135deg,var(--color-accent),var(--color-accent-dark)); border-radius:1rem; padding:1.75rem; color:#fff; display:flex; flex-direction:column; justify-content:space-between; min-height:210px;">
                    <div>
                        <div style="width:44px; height:44px; border-radius:50%; background:rgba(255,255,255,0.2); border:1px solid rgba(255,255,255,0.4); display:flex; align-items:center; justify-content:center; margin-bottom:1rem; color:#fff;">
                            {{-- Fire Hydrant SVG Icon --}}
                            <svg width="22" height="22" viewBox="0 0 24 24" fill="currentColor">
                                <path d="M12 2a5 5 0 0 0-5 5v1H5a1 1 0 0 0-1 1v2a1 1 0 0 0 1 1h2v10a1 1 0 0 0 1 1h8a1 1 0 0 0 1-1V10h2a1 1 0 0 0 1-1V8a1 1 0 0 0-1-1h-2V7a5 5 0 0 0-5-5zm-2 6a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
                            </svg>
                        </div>
                        <div style="font-family:'Barlow Condensed',sans-serif; font-size:1.25rem; font-weight:800; margin-bottom:0.5rem; text-transform:uppercase; letter-spacing:0.02em;">Fire Hydrants</div>
                        <p style="font-size:0.85rem; color:rgba(255,255,255,0.9); line-height:1.65; margin:0;">Stringent quality control based on safety standards of fire protection organizations worldwide.</p>
                    </div>
                </div>

                {{-- Card 3: Blue Star uPVC --}}
                <div class="reveal reveal-delay-3" x-intersect.once="$el.classList.add('reveal-visible')" style="background:linear-gradient(135deg,#0D6B5E,#14866E); border-radius:1rem; padding:1.75rem; color:#fff; display:flex; flex-direction:column; justify-content:space-between; min-height:210px;">
                    <div>
                        <div style="width:44px; height:44px; border-radius:50%; background:rgba(255,255,255,0.15); border:1px solid rgba(255,255,255,0.3); display:flex; align-items:center; justify-content:center; margin-bottom:1rem; color:#6DDABE;">
                            {{-- Industrial uPVC Pipe Conduit SVG Icon --}}
                            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <rect x="2" y="5" width="20" height="5" rx="2"/>
                                <rect x="2" y="14" width="20" height="5" rx="2"/>
                                <path d="M6 5v5M18 5v5M6 14v5M18 14v5"/>
                            </svg>
                        </div>
                        <div style="font-family:'Barlow Condensed',sans-serif; font-size:1.25rem; font-weight:800; margin-bottom:0.5rem; text-transform:uppercase; letter-spacing:0.02em;">Blue Star uPVC</div>
                        <p style="font-size:0.85rem; color:rgba(255,255,255,0.85); line-height:1.65; margin:0;">High-grade virgin materials certified by BPS for potable water, sewer, and irrigation.</p>
                    </div>
                </div>

                {{-- Card 4: Muntinlupa Plant --}}
                <div class="reveal reveal-delay-4" x-intersect.once="$el.classList.add('reveal-visible')" style="background:rgba(255,255,255,0.06); border:1.5px solid rgba(255,255,255,0.12); border-radius:1rem; padding:1.75rem; display:flex; flex-direction:column; justify-content:space-between; min-height:210px;">
                    <div>
                        <div style="width:44px; height:44px; border-radius:50%; background:rgba(255,255,255,0.08); border:1px solid rgba(255,255,255,0.18); display:flex; align-items:center; justify-content:center; margin-bottom:1rem; color:rgba(255,255,255,0.7);">
                            {{-- Industrial Manufacturing Factory Plant SVG Icon --}}
                            <svg width="22" height="22" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                                <path d="M2 20h20M4 20V10l4 3V10l4 3V6l8 4v10M16 10h2M16 14h2"/>
                            </svg>
                        </div>
                        <div style="font-family:'Barlow Condensed',sans-serif; font-size:1.25rem; font-weight:800; color:#fff; margin-bottom:0.5rem; text-transform:uppercase; letter-spacing:0.02em;">Muntinlupa Plant</div>
                        <p style="font-size:0.85rem; color:rgba(255,255,255,0.65); line-height:1.65; margin:0;">20,000 sqm lot and 8,000 sqm modern factory facility at Laguna de Bay.</p>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

{{-- ═══════════════════════════════════════════════════════════════
     FEATURED PRODUCTS WITH CATEGORY FILTER BAR
══════════════════════════════════════════════════════════════════ --}}
<section class="section section-surface section-divider-top" aria-label="Featured products"
    x-data="{ activeCat: 'all' }" style="position:relative; z-index:2;">

    <div class="container-mfi">
        <div style="text-align:center; margin-bottom:2.5rem;" x-data>
            <span class="section-label reveal" x-intersect.once="$el.classList.add('reveal-visible')">Our Product Range</span>
            <h2 class="section-title reveal reveal-delay-1" x-intersect.once="$el.classList.add('reveal-visible')" style="margin-bottom:0.75rem;">Manufactured to International Standards</h2>
            <div class="divider-orange divider-orange-center reveal reveal-delay-2" x-intersect.once="$el.classList.add('reveal-visible')"></div>
            <p class="section-subtitle reveal reveal-delay-2" x-intersect.once="$el.classList.add('reveal-visible')" style="margin:0 auto 1.75rem;">Explore our stress-tested valves, BPS-certified Blue Star uPVC pipes, hydrants, and cast iron fittings.</p>

            {{-- Filter Bar --}}
            <div class="cat-tabs" style="justify-content:center; max-width:780px; margin:0 auto;" role="tablist">
                <button class="cat-tab" :class="activeCat === 'all' ? 'active' : ''" @click="activeCat = 'all'">All Categories</button>
                <button class="cat-tab" :class="activeCat === 'valves' ? 'active' : ''" @click="activeCat = 'valves'">Valves</button>
                <button class="cat-tab" :class="activeCat === 'hydrants' ? 'active' : ''" @click="activeCat = 'hydrants'">Fire Hydrants</button>
                <button class="cat-tab" :class="activeCat === 'fittings' ? 'active' : ''" @click="activeCat = 'fittings'">Fittings & Saddles</button>
                <button class="cat-tab" :class="activeCat === 'pipes' ? 'active' : ''" @click="activeCat = 'pipes'">uPVC Pipes</button>
            </div>
        </div>

        <div style="display:grid; grid-template-columns:repeat(auto-fill, minmax(280px, 1fr)); gap:1.5rem; margin-bottom:3rem;">
            @foreach($featured as $product)
            <a href="{{ route('products') }}#product-{{ $product['id'] }}"
               class="product-card"
               x-show="activeCat === 'all' ||
                       (activeCat === 'valves' && ['gate-valves','butterfly-valves','check-valves','air-release-valves','angle-float-valve'].includes('{{ $product['category'] }}')) ||
                       (activeCat === 'hydrants' && '{{ $product['category'] }}' === 'fire-hydrant') ||
                       (activeCat === 'fittings' && ['fittings','saddle-clamp','dresser-coupling','adaptor-end-cap'].includes('{{ $product['category'] }}')) ||
                       (activeCat === 'pipes' && '{{ $product['category'] }}' === 'pipes')"
               x-transition:enter="transition ease-out duration-200"
               x-transition:enter-start="opacity-0 scale-95"
               x-transition:enter-end="opacity-100 scale-100"
               style="text-decoration:none; color:inherit; background:#fff; border:1px solid #E2E8F0; border-radius:0.75rem; overflow:hidden; display:flex; flex-direction:column; justify-content:space-between;"
               id="featured-{{ $product['id'] }}">

                <div class="product-card-img" style="position:relative; background:#F8FAFC; padding:1.25rem; display:flex; align-items:center; justify-content:center;">
                    <img
                        src="{{ asset('images/' . $product['image']) }}"
                        alt="{{ $product['name'] }} — Makati Foundry product"
                        loading="lazy"
                        style="max-height:160px; width:auto; max-width:100%; object-fit:contain;"
                        onerror="this.src='{{ asset('images/products/placeholder.svg') }}'">
                </div>

                <div class="product-card-body" style="padding:1.25rem; flex-grow:1; display:flex; flex-direction:column; justify-content:space-between;">
                    <div>
                        <span class="product-badge badge-{{ $product['category'] }}">{{ $product['badge'] }}</span>
                        <h3 style="font-family:'Barlow Condensed',sans-serif; font-size:1.25rem; font-weight:800; color:#0F172A; margin:0.35rem 0 0.5rem; line-height:1.2;">{{ $product['name'] }}</h3>
                        <p style="font-size:0.825rem; color:#64748B; line-height:1.55; margin:0 0 1.25rem;">{{ $product['tagline'] }}</p>
                    </div>

                    <span style="font-size:0.8rem; font-weight:700; color:#2563EB; display:inline-flex; align-items:center; gap:0.35rem; border-top:1px solid #F1F5F9; padding-top:0.75rem;">
                        View Product Specifications
                        <svg width="12" height="12" viewBox="0 0 24 24" fill="currentColor"><path d="M10 6L8.59 7.41 13.17 12l-4.58 4.59L10 18l6-6z"/></svg>
                    </span>
                </div>
            </a>
            @endforeach
        </div>

        <div style="text-align:center;">
            <a href="{{ route('products') }}" class="btn btn-primary btn-lg" id="home-view-all-products">
                View Full Product Catalog
                <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M4 6h16v2H4zm0 5h16v2H4zm0 5h16v2H4z"/></svg>
            </a>
        </div>
    </div>
</section>

{{-- ═══════════════════════════════════════════════════════════════
     PROJECTS SECTION
══════════════════════════════════════════════════════════════════ --}}
<section class="section" aria-label="Projects">
    <div class="container-mfi">
        <div style="display:flex; flex-wrap:wrap; align-items:flex-end; justify-content:space-between; margin-bottom:2.5rem; gap:1rem;">
            <div x-data>
                <h2 class="section-title title-underline reveal" x-intersect.once="$el.classList.add('reveal-visible')" style="margin-bottom:0;">Projects</h2>
            </div>
            <div style="display:flex; align-items:center; gap:1.25rem; flex-wrap:wrap;">
                <span style="font-size:0.85rem; font-weight:700; color:#64748B;" class="hidden md:inline">Showing 6 Featured Projects of 11 Total</span>
                <a href="{{ route('projects') }}" class="btn btn-outline-navy" id="home-view-all-projects">
                    View Projects →
                </a>
            </div>
        </div>

        <div style="display:grid; grid-template-columns:repeat(auto-fill, minmax(320px, 1fr)); gap:1.75rem; align-items:stretch;">
            @foreach($featuredProjects as $project)
            <a href="{{ route('projects') }}#{{ $project['id'] }}"
               class="product-card"
               style="text-decoration:none; color:inherit; background:#fff; border:1px solid #E2E8F0; border-radius:1rem; overflow:hidden; display:flex; flex-direction:column; justify-content:space-between; height:100%;"
               id="featured-project-{{ $project['id'] }}">

                {{-- Header Banner — Equalized Fixed Height Across All Cards --}}
                <div style="background:linear-gradient(135deg,#0F172A 0%,#1E3A8A 100%); padding:1.25rem 1.5rem; color:#fff; height:165px; box-sizing:border-box; flex-shrink:0; display:flex; flex-direction:column; justify-content:space-between;">
                    <div style="display:flex; align-items:center; justify-content:space-between; gap:0.5rem;">
                        <span style="background:rgba(249,115,22,0.22); border:1px solid rgba(249,115,22,0.5); color:#FF9D54; font-size:0.725rem; font-weight:700; padding:0.25rem 0.65rem; border-radius:9999px; text-transform:uppercase; letter-spacing:0.04em; text-shadow:0 1px 3px rgba(0,0,0,0.5);">
                            {{ $project['badge'] }}
                        </span>

                        {{-- Custom SVG Icon Badge matched to project type --}}
                        <div style="width:34px; height:34px; border-radius:50%; background:rgba(255,255,255,0.12); border:1px solid rgba(255,255,255,0.25); display:flex; align-items:center; justify-content:center; color:#60A5FA; flex-shrink:0;">
                            @if(str_contains($project['id'], 'valve') || str_contains($project['id'], 'pandacan'))
                                {{-- Transmission Valve Wrench Icon --}}
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/></svg>
                            @elseif(str_contains($project['id'], 'pumping') || str_contains($project['id'], 'san-juan'))
                                {{-- Pumping Station Wave Icon --}}
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 6c.6.5 1.2 1 2.5 1C7 7 7 5 9.5 5c2.6 0 2.4 2 5 2 2.5 0 2.5-2 5-2 1.3 0 1.9.5 2.5 1M2 12c.6.5 1.2 1 2.5 1 2.5 0 2.5-2 5-2 2.6 0 2.4 2 5 2 2.5 0 2.5-2 5-2 1.3 0 1.9.5 2.5 1M2 18c.6.5 1.2 1 2.5 1 2.5 0 2.5-2 5-2 2.6 0 2.4 2 5 2 2.5 0 2.5-2 5-2 1.3 0 1.9.5 2.5 1"/></svg>
                            @elseif(str_contains($project['id'], 'commercial') || str_contains($project['id'], 'filinvest') || str_contains($project['id'], 'festival'))
                                {{-- Building Estate Icon --}}
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 22V4a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v18Z"/><path d="M6 12H4a2 2 0 0 0-2 2v8h4M18 9h2a2 2 0 0 1 2 2v11h-4M10 6h4M10 10h4M10 14h4M10 18h4"/></svg>
                            @else
                                {{-- Water Utility Grid Icon --}}
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"/><path d="M12 3v18M3 12h18"/></svg>
                            @endif
                        </div>
                    </div>

                    <div>
                        <h3 style="font-family:'Barlow Condensed',sans-serif; font-size:1.15rem; font-weight:800; color:#fff; margin:0 0 0.25rem; line-height:1.2; text-shadow:0 2px 6px rgba(0,0,0,0.5); display:-webkit-box; -webkit-line-clamp:2; -webkit-box-orient:vertical; overflow:hidden;" title="{{ $project['title'] }}">
                            {{ $project['title'] }}
                        </h3>
                        <div style="font-size:0.775rem; color:rgba(255,255,255,0.85); display:flex; align-items:center; gap:0.35rem;">
                            <svg width="12" height="12" viewBox="0 0 24 24" fill="#F97316"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/></svg>
                            <span>{{ $project['location'] }}</span>
                        </div>
                    </div>
                </div>

                {{-- Card Body --}}
                <div style="padding:1.35rem; flex-grow:1; display:flex; flex-direction:column; justify-content:space-between;">
                    <p style="font-size:0.85rem; color:#475569; line-height:1.65; margin:0 0 1.25rem;">
                        {{ $project['description'] }}
                    </p>

                    {{-- Card Footer — Pinned & Aligned across all cards --}}
                    <div style="border-top:1px solid #F1F5F9; padding-top:0.85rem; margin-top:auto; display:flex; align-items:center; justify-content:space-between; gap:0.5rem;">
                        <span style="font-size:0.775rem; color:#2563EB; font-weight:700; white-space:nowrap; overflow:hidden; text-overflow:ellipsis; max-width:68%;" title="{{ $project['client'] }}">
                            {{ $project['client'] }}
                        </span>
                        <span style="font-size:0.8rem; font-weight:700; color:#F97316; display:inline-flex; align-items:center; gap:0.25rem; white-space:nowrap;">
                            Details →
                        </span>
                    </div>
                </div>
            </a>
            @endforeach
        </div>
    </div>
</section>

{{-- ═══════════════════════════════════════════════════════════════
     OUR MISSION HIGHLIGHTS
══════════════════════════════════════════════════════════════════ --}}
<section class="section" aria-label="Mission Highlights">
    <div class="container-mfi">
        <div style="text-align:center; margin-bottom:3rem;" x-data>
            <span class="section-label reveal" x-intersect.once="$el.classList.add('reveal-visible')">Core Values</span>
            <h2 class="section-title reveal reveal-delay-1" x-intersect.once="$el.classList.add('reveal-visible')" style="margin-bottom:0.75rem;">Company Principles & Integrity</h2>
            <div class="divider-orange divider-orange-center reveal reveal-delay-2" x-intersect.once="$el.classList.add('reveal-visible')"></div>
        </div>

        <div style="display:grid; grid-template-columns:repeat(auto-fill, minmax(260px, 1fr)); gap:1.5rem;">
            <div class="feature-card reveal reveal-delay-1" x-data x-intersect.once="$el.classList.add('reveal-visible')">
                <div class="feature-icon" style="background:linear-gradient(135deg,#0F172A,#2563EB);">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><path d="M12 1L3 5v6c0 5.55 3.84 10.74 9 12 5.16-1.26 9-6.45 9-12V5l-9-4zm-2 16l-4-4 1.41-1.41L10 14.17l6.59-6.59L18 9l-8 8z"/></svg>
                </div>
                <h3 style="font-family:'Barlow Condensed',sans-serif; font-size:1.2rem; font-weight:700; color:#0F172A; margin:0 0 0.5rem;">Quality Guarantee</h3>
                <p style="font-size:0.875rem; color:#64748B; line-height:1.7; margin:0;">We guarantee to produce high quality products that meet international standards to satisfy our customers.</p>
            </div>

            <div class="feature-card reveal reveal-delay-2" x-data x-intersect.once="$el.classList.add('reveal-visible')">
                <div class="feature-icon" style="background:linear-gradient(135deg,#F97316,#EA580C);">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><path d="M19 3H5c-1.1 0-2 .9-2 2v14c0 1.1.9 2 2 2h14c1.1 0 2-.9 2-2V5c0-1.1-.9-2-2-2zm-5 14H7v-2h7v2zm3-4H7v-2h10v2zm0-4H7V7h10v2z"/></svg>
                </div>
                <h3 style="font-family:'Barlow Condensed',sans-serif; font-size:1.2rem; font-weight:700; color:#0F172A; margin:0 0 0.5rem;">Advanced Technology</h3>
                <p style="font-size:0.875rem; color:#64748B; line-height:1.7; margin:0;">Constantly upgrading machineries and using advanced technologies to maintain a strong competitive edge.</p>
            </div>

            <div class="feature-card reveal reveal-delay-3" x-data x-intersect.once="$el.classList.add('reveal-visible')">
                <div class="feature-icon" style="background:linear-gradient(135deg,#1E3A8A,#1D4ED8);">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><path d="M12 7V3H2v18h20V7H12zM6 19H4v-2h2v2zm0-4H4v-2h2v2zm0-4H4V9h2v2zm0-4H4V5h2v2zm4 12H8v-2h2v2zm0-4H8v-2h2v2zm0-4H8V9h2v2zm0-4H8V5h2v2zm10 12h-8v-2h2v-2h-2v-2h2v-2h-2V9h8v10zm-2-8h-2v2h2v-2zm0 4h-2v2h2v-2z"/></svg>
                </div>
                <h3 style="font-family:'Barlow Condensed',sans-serif; font-size:1.2rem; font-weight:700; color:#0F172A; margin:0 0 0.5rem;">Principles & Integrity</h3>
                <p style="font-size:0.875rem; color:#64748B; line-height:1.7; margin:0;">A stable, profitable, and continuously growing company built on principles and uncompromised integrity.</p>
            </div>

            <div class="feature-card reveal reveal-delay-4" x-data x-intersect.once="$el.classList.add('reveal-visible')">
                <div class="feature-icon" style="background:linear-gradient(135deg,#16A34A,#15803D);">
                    <svg width="24" height="24" viewBox="0 0 24 24" fill="currentColor"><path d="M16 11c1.66 0 2.99-1.34 2.99-3S17.66 5 16 5c-1.66 0-3 1.34-3 3s1.34 3 3 3zm-8 0c1.66 0 2.99-1.34 2.99-3S9.66 5 8 5C6.34 5 5 6.34 5 8s1.34 3 3 3zm0 2c-2.33 0-7 1.17-7 3.5V19h14v-2.5c0-2.33-4.67-3.5-7-3.5zm8 0c-.29 0-.62.02-.97.05 1.16.84 1.97 1.97 1.97 3.45V19h6v-2.5c0-2.33-4.67-3.5-7-3.5z"/></svg>
                </div>
                <h3 style="font-family:'Barlow Condensed',sans-serif; font-size:1.2rem; font-weight:700; color:#0F172A; margin:0 0 0.5rem;">Skilled Workforce</h3>
                <p style="font-size:0.875rem; color:#64748B; line-height:1.7; margin:0;">Professional, skilled, and motivated employees promoting a positive working environment and teamwork.</p>
            </div>
        </div>
    </div>
</section>

{{-- CTA BANNER --}}
<section class="cta-banner section" aria-label="Call to action" x-data>
    <div class="container-mfi" style="position:relative; z-index:1; text-align:center;">
        <span class="section-label reveal" x-intersect.once="$el.classList.add('reveal-visible')" style="color:#F97316;">Established 1957</span>
        <h2 class="reveal reveal-delay-1" x-intersect.once="$el.classList.add('reveal-visible')" style="font-family:'Barlow Condensed',sans-serif; font-size:clamp(2rem,5vw,3.5rem); font-weight:900; color:#fff; margin:0.5rem 0 1rem; text-transform:uppercase; letter-spacing:-0.01em;">
            Request a Quotation from the Industry Leader
        </h2>
        <p style="font-size:1rem; color:rgba(255,255,255,0.8); max-width:560px; margin:0 auto 2.5rem; line-height:1.7;">
            Submit your materials list or project specifications and our sales team will prepare an official quotation.
        </p>
        <div style="display:flex; flex-wrap:wrap; gap:1rem; justify-content:center;">
            <a href="{{ route('contact') }}" class="btn btn-primary btn-lg" id="cta-request-quote">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M20 4H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/></svg>
                Request a Quote
            </a>
            <a href="tel:+63" class="btn btn-secondary btn-lg" id="cta-call-us">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/></svg>
                Call Us Now
            </a>
        </div>
    </div>
</section>

@endsection
