@extends('layouts.app')

@section('title', 'About Us — Makati Foundry, Inc.')
@section('meta_description', 'Learn about Makati Foundry, Inc. — established in July 1957. Read our company history, 20,000 sqm Muntinlupa manufacturing plant, official mission statement, BPS certification, and product heritage.')

@section('content')

{{-- Page Hero --}}
<div class="page-hero">
    <div class="container-mfi" style="position:relative; z-index:1;">
        <div class="breadcrumb">
            <a href="{{ route('home') }}" style="color:rgba(255,255,255,0.6); text-decoration:none;">Home</a>
            <span class="breadcrumb-sep">›</span>
            <span style="color:#fff;">About Us</span>
        </div>
        <span class="section-label">Established July 1957</span>
        <h1 style="font-family:'Barlow Condensed',sans-serif; font-size:clamp(2.5rem,5vw,4rem); font-weight:900; color:#fff; margin:0.5rem 0 1rem; text-transform:uppercase; letter-spacing:-0.02em; line-height:1.0;">
            About Makati Foundry, Inc.
        </h1>
        <p style="font-size:1.05rem; color:rgba(255,255,255,0.8); max-width:620px; line-height:1.75;">
            Dedicated to maintaining excellence and leadership in water supply system hardware and uPVC Pipe manufacturing in the Philippines since 1957.
        </p>
    </div>
</div>

{{-- ═══════════════════════════════════════════════════════════════
     COMPANY HISTORY & HOW WE STARTED
══════════════════════════════════════════════════════════════════ --}}
<section class="section" aria-label="Company history">
    <div class="container-mfi">
        <div class="about-history-grid">

            <div>
                <span class="section-label">Our History</span>
                <h2 class="section-title title-underline" style="margin-bottom:1.75rem;">
                    Over 6 Decades of Industrial Leadership
                </h2>
                <p style="color:#334155; font-size:0.95rem; line-height:1.8; margin-bottom:1.25rem;">
                    <strong>Makati Foundry, Inc.</strong> was established on <strong>July 1957</strong> in the Municipality of Makati with its first factory having an area of 2,500 square meters, mainly manufacturing water valves and fittings. Soon enough, the company's product line diversified. Aside from cast iron valves and fittings, the company began manufacturing different types of fire hydrants, cast iron manholes frames & covers, and specialized water valves to cater to the needs of various sectors.
                </p>
                <p style="color:#334155; font-size:0.95rem; line-height:1.8; margin-bottom:1.25rem;">
                    In <strong>September 1977</strong>, the company constructed a state-of-the-art new plant in the Municipality of Muntinlupa at the southeast side of Laguna de Bay, boasting a total lot area of <strong>20,000 square meters</strong> and a factory area of 8,000 square meters. The plant was equipped with modern machineries complemented with a competent workforce that contributed to the rapid growth of the company.
                </p>
                <p style="color:#334155; font-size:0.95rem; line-height:1.8; margin-bottom:2rem;">
                    In <strong>1995</strong>, Makati Foundry, Inc. ventured into uPVC Pipe manufacturing, which gave birth to the renowned <strong>Blue Star uPVC</strong> brand. Certified by the Bureau of Product Standards (BPS), this expansion complemented our wide range of products and broadened our reach in the water supply system industry. With these continuous developments, our customers are always assured of unequalled service.
                </p>

                {{-- Fast stats --}}
                <div style="display:grid; grid-template-columns:1fr 1fr 1fr; gap:1rem; border-top:2px solid #E2E8F0; padding-top:1.5rem;">
                    <div>
                        <div style="font-family:'Barlow Condensed',sans-serif; font-size:2rem; font-weight:800; color:#2563EB; line-height:1;">1957</div>
                        <div style="font-size:0.75rem; color:#64748B; font-weight:600; text-transform:uppercase; margin-top:0.25rem;">Founded in Makati</div>
                    </div>
                    <div>
                        <div style="font-family:'Barlow Condensed',sans-serif; font-size:2rem; font-weight:800; color:#F97316; line-height:1;">20,000m²</div>
                        <div style="font-size:0.75rem; color:#64748B; font-weight:600; text-transform:uppercase; margin-top:0.25rem;">Muntinlupa Plant</div>
                    </div>
                    <div>
                        <div style="font-family:'Barlow Condensed',sans-serif; font-size:2rem; font-weight:800; color:#1E3A8A; line-height:1;">BPS</div>
                        <div style="font-size:0.75rem; color:#64748B; font-weight:600; text-transform:uppercase; margin-top:0.25rem;">Certified Quality</div>
                    </div>
                </div>
            </div>

            {{-- History Timeline --}}
            <div style="background:#F8FAFC; border:1px solid #E2E8F0; border-radius:1rem; padding:2rem;">
                <span class="section-label">Milestones</span>
                <h3 style="font-family:'Barlow Condensed',sans-serif; font-size:1.75rem; font-weight:700; color:#0F172A; margin-bottom:2rem;">Our Journey Through Time</h3>

                @foreach([
                    ['year'=>'July 1957', 'title'=>'Established in Makati', 'desc'=>'Makati Foundry, Inc. founded in Makati with a 2,500 sqm factory specializing in water valves and cast iron fittings.'],
                    ['year'=>'Sept 1977', 'title'=>'20,000 sqm Muntinlupa Plant', 'desc'=>'Constructed a major expansion facility in Muntinlupa near Laguna de Bay (20,000 sqm lot / 8,000 sqm factory) with modern casting machineries.'],
                    ['year'=>'1995', 'title'=>'Blue Star uPVC Pipe Launch', 'desc'=>'Ventured into uPVC pipe manufacturing, creating the Blue Star brand, certified by the Bureau of Product Standards (BPS).'],
                    ['year'=>'Present', 'title'=>'Nationwide Utility Supplier', 'desc'=>'One of the country\'s leading manufacturers supplying water utility corporations, contractors, and LGUs nationwide.'],
                ] as $item)
                <div class="timeline-item" style="padding-bottom:1.75rem; {{ !$loop->last ? 'position:relative;' : '' }}">
                    @if(!$loop->last)
                    <div class="timeline-line" style="background:#CBD5E1;"></div>
                    @endif
                    <div class="timeline-dot" style="font-size:0.7rem; width:52px; height:52px; text-align:center; padding:2px;">{{ $item['year'] }}</div>
                    <div style="padding-top:0.25rem;">
                        <h4 style="font-family:'Barlow Condensed',sans-serif; font-size:1.15rem; font-weight:700; color:#0F172A; margin:0 0 0.35rem;">{{ $item['title'] }}</h4>
                        <p style="font-size:0.85rem; color:#475569; line-height:1.6; margin:0;">{{ $item['desc'] }}</p>
                    </div>
                </div>
                @endforeach
            </div>

        </div>
    </div>
</section>

{{-- ═══════════════════════════════════════════════════════════════
     OUR MISSION & PRINCIPLES
══════════════════════════════════════════════════════════════════ --}}
<section class="section section-surface" aria-label="Official Mission Statement">
    <div class="container-mfi">
        <div style="text-align:center; max-width:800px; margin:0 auto 3.5rem;">
            <span class="section-label">Official Mission</span>
            <h2 class="section-title" style="margin-bottom:0.75rem;">Our Mission Statement</h2>
            <div class="divider-orange divider-orange-center"></div>
        </div>

        <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(300px, 1fr)); gap:1.75rem;">

            <div style="background:#fff; border-top:4px solid #2563EB; border-radius:0.75rem; padding:2rem; box-shadow:0 4px 6px -1px rgba(0,0,0,0.05);">
                <div style="width:48px; height:48px; background:#F0F7FF; border-radius:0.5rem; display:flex; align-items:center; justify-content:center; color:#2563EB; font-size:1.5rem; margin-bottom:1.25rem;">🏆</div>
                <h3 style="font-family:'Barlow Condensed',sans-serif; font-size:1.25rem; font-weight:700; color:#0F172A; margin:0 0 0.75rem;">Excellence & Leadership</h3>
                <p style="font-size:0.9rem; color:#475569; line-height:1.75; margin:0;">
                    "Makati Foundry, Inc. is dedicated in maintaining excellence and leadership in water supply system and uPVC Pipe manufacturing. We guarantee to produce high quality products that meet international standards to satisfy our customers."
                </p>
            </div>

            <div style="background:#fff; border-top:4px solid #F97316; border-radius:0.75rem; padding:2rem; box-shadow:0 4px 6px -1px rgba(0,0,0,0.05);">
                <div style="width:48px; height:48px; background:#FFF7ED; border-radius:0.5rem; display:flex; align-items:center; justify-content:center; color:#F97316; font-size:1.5rem; margin-bottom:1.25rem;">⚡</div>
                <h3 style="font-family:'Barlow Condensed',sans-serif; font-size:1.25rem; font-weight:700; color:#0F172A; margin:0 0 0.75rem;">Advanced Technologies</h3>
                <p style="font-size:0.9rem; color:#475569; line-height:1.75; margin:0;">
                    "Management shall constantly review its processes, upgrade its machineries and use advanced technologies to have a competitive edge in manufacturing high-grade waterworks components."
                </p>
            </div>

            <div style="background:#fff; border-top:4px solid #1E3A8A; border-radius:0.75rem; padding:2rem; box-shadow:0 4px 6px -1px rgba(0,0,0,0.05);">
                <div style="width:48px; height:48px; background:#F1F5F9; border-radius:0.5rem; display:flex; align-items:center; justify-content:center; color:#1E3A8A; font-size:1.5rem; margin-bottom:1.25rem;">🤝</div>
                <h3 style="font-family:'Barlow Condensed',sans-serif; font-size:1.25rem; font-weight:700; color:#0F172A; margin:0 0 0.75rem;">Principles & Teamwork</h3>
                <p style="font-size:0.9rem; color:#475569; line-height:1.75; margin:0;">
                    "Our company is stable, profitable and continuously growing. We are a company with principles and integrity. We maintain a workforce composed of professionals, skilled and motivated employees that enhance a working environment and promotes teamwork."
                </p>
            </div>

        </div>
    </div>
</section>

{{-- ═══════════════════════════════════════════════════════════════
     OUR PRIDE (PRODUCT PILLARS)
══════════════════════════════════════════════════════════════════ --}}
<section class="section" aria-label="Our Pride Product Pillars">
    <div class="container-mfi">
        <div style="text-align:center; margin-bottom:3.5rem;">
            <span class="section-label">Manufacturing Heritage</span>
            <h2 class="section-title" style="margin-bottom:0.75rem;">Our Pride</h2>
            <div class="divider-orange divider-orange-center"></div>
            <p class="section-subtitle" style="margin:0 auto;">Built on functional design, stress-testing, and high-grade virgin materials.</p>
        </div>

        <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(320px, 1fr)); gap:2rem;">

            {{-- Valves Pride --}}
            <div style="background:#fff; border:2px solid #E2E8F0; border-radius:1rem; padding:2.25rem; transition:all 0.3s; position:relative;" onmouseover="this.style.borderColor='#2563EB'; this.style.transform='translateY(-4px)'" onmouseout="this.style.borderColor='#E2E8F0'; this.style.transform='none'">
                <div style="display:flex; align-items:center; justify-content:space-between; margin-bottom:1.25rem;">
                    <span style="background:rgba(37,99,235,0.1); color:#2563EB; font-family:'Barlow Condensed',sans-serif; font-weight:800; font-size:0.85rem; padding:0.35rem 0.85rem; border-radius:9999px; letter-spacing:0.08em; text-transform:uppercase;">Valves</span>
                    <span style="font-size:2rem;">🔵</span>
                </div>
                <h3 style="font-family:'Barlow Condensed',sans-serif; font-size:1.6rem; font-weight:800; color:#0F172A; margin:0 0 1rem;">Water Valves</h3>
                <p style="font-size:0.925rem; color:#475569; line-height:1.8; margin:0 0 1.5rem;">
                    We are one of the country's leading valve manufacturers, providing the needs of water utility corporations nationwide. Based on a unique functional design, our valves are stress-tested to ensure maximum durability under continuous pipeline pressure.
                </p>
                <a href="{{ route('products') }}?cat=valves" style="font-size:0.875rem; font-weight:700; color:#2563EB; text-decoration:none; display:inline-flex; align-items:center; gap:0.35rem;">
                    Explore Water Valves →
                </a>
            </div>

            {{-- Fire Hydrants Pride --}}
            <div style="background:#fff; border:2px solid #E2E8F0; border-radius:1rem; padding:2.25rem; transition:all 0.3s; position:relative;" onmouseover="this.style.borderColor='#F97316'; this.style.transform='translateY(-4px)'" onmouseout="this.style.borderColor='#E2E8F0'; this.style.transform='none'">
                <div style="display:flex; align-items:center; justify-content:space-between; margin-bottom:1.25rem;">
                    <span style="background:rgba(249,115,22,0.1); color:#EA580C; font-family:'Barlow Condensed',sans-serif; font-weight:800; font-size:0.85rem; padding:0.35rem 0.85rem; border-radius:9999px; letter-spacing:0.08em; text-transform:uppercase;">Fire Safety</span>
                    <span style="font-size:2rem;">🔴</span>
                </div>
                <h3 style="font-family:'Barlow Condensed',sans-serif; font-size:1.6rem; font-weight:800; color:#0F172A; margin:0 0 1rem;">Fire Hydrants</h3>
                <p style="font-size:0.925rem; color:#475569; line-height:1.8; margin:0 0 1.5rem;">
                    Fire Hydrants are manufactured under stringent quality control based on strict safety standards of fire protection organizations worldwide. Built for dependable high-pressure operation during emergencies.
                </p>
                <a href="{{ route('products') }}?cat=fire" style="font-size:0.875rem; font-weight:700; color:#F97316; text-decoration:none; display:inline-flex; align-items:center; gap:0.35rem;">
                    Explore Fire Protection →
                </a>
            </div>

            {{-- Blue Star uPVC Pipes Pride --}}
            <div style="background:#fff; border:2px solid #E2E8F0; border-radius:1rem; padding:2.25rem; transition:all 0.3s; position:relative;" onmouseover="this.style.borderColor='#1E3A8A'; this.style.transform='translateY(-4px)'" onmouseout="this.style.borderColor='#E2E8F0'; this.style.transform='none'">
                <div style="display:flex; align-items:center; justify-content:space-between; margin-bottom:1.25rem;">
                    <span style="background:rgba(30,58,138,0.1); color:#1E3A8A; font-family:'Barlow Condensed',sans-serif; font-weight:800; font-size:0.85rem; padding:0.35rem 0.85rem; border-radius:9999px; letter-spacing:0.08em; text-transform:uppercase;">Certified BPS</span>
                    <span style="font-size:2rem;">🔷</span>
                </div>
                <h3 style="font-family:'Barlow Condensed',sans-serif; font-size:1.6rem; font-weight:800; color:#0F172A; margin:0 0 1rem;">Blue Star uPVC Pipes</h3>
                <p style="font-size:0.925rem; color:#475569; line-height:1.8; margin:0 0 1.5rem;">
                    Known as <strong>Blue Star uPVC brand</strong>, our pipes are made of high-grade composite virgin materials. Durable, lightweight, non-toxic, non-flammable, and resistant to extreme internal and external pressures — ideal for potable water distribution, sewer lines, irrigation, and mining.
                </p>
                <a href="{{ route('products') }}?cat=pipes" style="font-size:0.875rem; font-weight:700; color:#1E3A8A; text-decoration:none; display:inline-flex; align-items:center; gap:0.35rem;">
                    Explore Blue Star Pipes →
                </a>
            </div>

        </div>
    </div>
</section>

{{-- CTA Strip --}}
<section class="cta-banner section-sm" aria-label="Contact CTA">
    <div class="container-mfi" style="position:relative; z-index:1; text-align:center; padding:3rem 1.5rem;">
        <h2 style="font-family:'Barlow Condensed',sans-serif; font-size:clamp(1.75rem,4vw,2.75rem); font-weight:900; color:#fff; margin:0 0 1rem; text-transform:uppercase;">
            Partner with a Pioneer in Philippine Manufacturing
        </h2>
        <a href="{{ route('contact') }}" class="btn btn-primary btn-lg" id="about-cta-quote">Request a Quote →</a>
        <span style="color:rgba(255,255,255,0.6); margin:0 1rem;">or</span>
        <a href="{{ route('products') }}" class="btn btn-secondary" id="about-cta-catalog">View Catalog</a>
    </div>
</section>

@endsection
