@extends('layouts.app')

@section('title', 'Projects — Makati Foundry, Inc.')
@section('meta_description', 'Explore major water supply and infrastructure projects supplied by Makati Foundry, Inc.: MWSS, Baguio City, Gen. Santos City, Pandacan 1350mm transmission valve insertion, San Juan Pumping Station, FILINVEST, and water districts nationwide.')

@section('content')

{{-- Page Hero --}}
<div class="page-hero">
    <div class="container-mfi" style="position:relative; z-index:1;">
        <div class="breadcrumb">
            <a href="{{ route('home') }}" style="color:rgba(255,255,255,0.6); text-decoration:none;">Home</a>
            <span class="breadcrumb-sep">›</span>
            <span style="color:#fff;">Projects</span>
        </div>
        <span class="section-label">Proven Track Record</span>
        <h1 style="font-family:'Barlow Condensed',sans-serif; font-size:clamp(2.5rem,5vw,4rem); font-weight:900; color:#fff; margin:0.5rem 0 1rem; text-transform:uppercase; letter-spacing:-0.02em; line-height:1.0;">
            Projects
        </h1>
        <p style="font-size:1.05rem; color:rgba(255,255,255,0.8); max-width:640px; line-height:1.75;">
            Supplying high-pressure valves, Blue Star uPVC pipes, hydrants, and specialized pipeline components to major water utility corporations, municipal districts, and landmark developments across the Philippines since 1957.
        </p>
    </div>
</div>

{{-- ═══════════════════════════════════════════════════════════════
     PROJECTS GRID WITH ALPINE.JS FILTERING
══════════════════════════════════════════════════════════════════ --}}
<section class="section" aria-label="Projects portfolio"
    x-data="{ activeTab: 'all' }">

    <div class="container-mfi">

        {{-- Category Tabs --}}
        <div class="cat-tabs" role="tablist" aria-label="Project categories">
            @foreach($categories as $key => $label)
            <button
                class="cat-tab"
                :class="activeTab === '{{ $key }}' ? 'active' : ''"
                @click="activeTab = '{{ $key }}'"
                role="tab"
                :aria-selected="activeTab === '{{ $key }}'"
                id="tab-proj-{{ $key }}">
                {{ $label }}
            </button>
            @endforeach
        </div>

        {{-- Projects Cards Grid --}}
        <div style="display:grid; grid-template-columns:repeat(auto-fill, minmax(340px, 1fr)); gap:2rem; align-items:stretch;">

            @foreach($projects as $project)
            <div
                class="product-card"
                x-show="activeTab === 'all' || activeTab === '{{ $project['category'] }}'"
                x-transition:enter="transition ease-out duration-200"
                x-transition:enter-start="opacity-0 scale-95"
                x-transition:enter-end="opacity-100 scale-100"
                style="background:#fff; border:1px solid #E2E8F0; border-radius:1rem; overflow:hidden; display:flex; flex-direction:column; justify-content:space-between; height:100%;"
                id="{{ $project['id'] }}">

                {{-- Card Top Banner — Equalized Fixed Height --}}
                <div style="background:linear-gradient(135deg,#0F172A 0%,#1E3A8A 100%); padding:1.25rem 1.5rem; color:#fff; position:relative; height:165px; box-sizing:border-box; flex-shrink:0; display:flex; flex-direction:column; justify-content:space-between;">
                    <div style="display:flex; align-items:center; justify-content:space-between; gap:0.5rem;">
                        <span style="background:rgba(249,115,22,0.22); border:1px solid rgba(249,115,22,0.5); color:#FF9D54; font-size:0.75rem; font-weight:700; padding:0.25rem 0.65rem; border-radius:9999px; text-transform:uppercase; letter-spacing:0.04em; text-shadow:0 1px 3px rgba(0,0,0,0.5);">
                            {{ $project['badge'] }}
                        </span>

                        {{-- Custom SVG Icon Badge --}}
                        <div style="width:36px; height:36px; border-radius:50%; background:rgba(255,255,255,0.12); border:1px solid rgba(255,255,255,0.25); display:flex; align-items:center; justify-content:center; color:#60A5FA; flex-shrink:0;">
                            @if(str_contains($project['id'], 'valve') || str_contains($project['id'], 'pandacan'))
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M14.7 6.3a1 1 0 0 0 0 1.4l1.6 1.6a1 1 0 0 0 1.4 0l3.77-3.77a6 6 0 0 1-7.94 7.94l-6.91 6.91a2.12 2.12 0 0 1-3-3l6.91-6.91a6 6 0 0 1 7.94-7.94l-3.76 3.76z"/></svg>
                            @elseif(str_contains($project['id'], 'pumping') || str_contains($project['id'], 'san-juan'))
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M2 6c.6.5 1.2 1 2.5 1C7 7 7 5 9.5 5c2.6 0 2.4 2 5 2 2.5 0 2.5-2 5-2 1.3 0 1.9.5 2.5 1M2 12c.6.5 1.2 1 2.5 1 2.5 0 2.5-2 5-2 2.6 0 2.4 2 5 2 2.5 0 2.5-2 5-2 1.3 0 1.9.5 2.5 1M2 18c.6.5 1.2 1 2.5 1 2.5 0 2.5-2 5-2 2.6 0 2.4 2 5 2 2.5 0 2.5-2 5-2 1.3 0 1.9.5 2.5 1"/></svg>
                            @elseif(str_contains($project['id'], 'commercial') || str_contains($project['id'], 'filinvest') || str_contains($project['id'], 'festival'))
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M6 22V4a2 2 0 0 1 2-2h8a2 2 0 0 1 2 2v18Z"/><path d="M6 12H4a2 2 0 0 0-2 2v8h4M18 9h2a2 2 0 0 1 2 2v11h-4M10 6h4M10 10h4M10 14h4M10 18h4"/></svg>
                            @else
                                <svg width="18" height="18" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="12" cy="12" r="9"/><path d="M12 3v18M3 12h18"/></svg>
                            @endif
                        </div>
                    </div>

                    <div>
                        <h3 style="font-family:'Barlow Condensed',sans-serif; font-size:1.2rem; font-weight:800; color:#fff; margin:0 0 0.25rem; line-height:1.2; text-shadow:0 2px 6px rgba(0,0,0,0.5); display:-webkit-box; -webkit-line-clamp:2; -webkit-box-orient:vertical; overflow:hidden;" title="{{ $project['title'] }}">
                            {{ $project['title'] }}
                        </h3>

                        <div style="display:flex; align-items:center; gap:0.35rem; font-size:0.8rem; color:rgba(255,255,255,0.85);">
                            <svg width="14" height="14" viewBox="0 0 24 24" fill="#F97316"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/></svg>
                            <span>{{ $project['location'] }}</span>
                        </div>
                    </div>
                </div>

                {{-- Card Body --}}
                <div style="padding:1.5rem; flex-grow:1; display:flex; flex-direction:column; justify-content:space-between;">
                    <div>
                        <p style="font-size:0.875rem; color:#475569; line-height:1.7; margin:0 0 1.25rem;">
                            {{ $project['description'] }}
                        </p>

                        {{-- Client --}}
                        <div style="margin-bottom:1rem; padding:0.75rem; background:#F8FAFC; border-radius:0.5rem; border-left:3px solid #2563EB;">
                            <span style="font-size:0.75rem; color:#64748B; font-weight:600; text-transform:uppercase; display:block;">Client / Entity</span>
                            <span style="font-size:0.85rem; color:#0F172A; font-weight:700; white-space:nowrap; overflow:hidden; text-overflow:ellipsis; display:block;" title="{{ $project['client'] }}">{{ $project['client'] }}</span>
                        </div>

                        {{-- Products Supplied --}}
                        <div style="margin-bottom:1.5rem;">
                            <span style="font-size:0.75rem; color:#64748B; font-weight:600; text-transform:uppercase; display:block; margin-bottom:0.5rem;">Key Supplied Hardware</span>
                            <div style="display:flex; flex-wrap:wrap; gap:0.35rem;">
                                @foreach($project['products'] as $prod)
                                <span style="background:#F1F5F9; border:1px solid #E2E8F0; border-radius:0.375rem; padding:0.2rem 0.5rem; font-size:0.775rem; font-weight:600; color:#334155;">
                                    {{ $prod }}
                                </span>
                                @endforeach
                            </div>
                        </div>
                    </div>

                    {{-- Action CTA --}}
                    <div style="border-top:1px solid #F1F5F9; padding-top:1rem; margin-top:auto; display:flex; align-items:center; justify-content:space-between; gap:0.5rem;">
                        <span style="font-size:0.75rem; color:#16A34A; font-weight:700; display:flex; align-items:center; gap:0.25rem;">
                            <svg width="12" height="12" viewBox="0 0 24 24" fill="currentColor"><path d="M9 16.17L4.83 12l-1.42 1.41L9 19 21 7l-1.41-1.41z"/></svg>
                            Successfully Delivered
                        </span>
                        <a href="{{ route('contact') }}?project={{ urlencode($project['title']) }}" style="font-size:0.8rem; font-weight:700; color:#2563EB; text-decoration:none; display:inline-flex; align-items:center; gap:0.25rem; white-space:nowrap;">
                            Inquire Similar Specs →
                        </a>
                    </div>
                </div>

            </div>
            @endforeach

        </div>
    </div>
</section>

{{-- CTA Section --}}
<section class="cta-banner section-sm" aria-label="Project Consultation CTA">
    <div class="container-mfi" style="position:relative; z-index:1; text-align:center; padding:3rem 1.5rem;">
        <h2 style="font-family:'Barlow Condensed',sans-serif; font-size:clamp(1.75rem,4vw,2.75rem); font-weight:900; color:#fff; margin:0 0 1rem; text-transform:uppercase;">
            Planning a Waterworks or Transmission Line Expansion?
        </h2>
        <p style="font-size:1rem; color:rgba(255,255,255,0.8); max-width:560px; margin:0 auto 2rem; line-height:1.7;">
            Our technical sales team will assist you with materials estimation, shop drawings, and formal tender quotations.
        </p>
        <a href="{{ route('contact') }}" class="btn btn-primary btn-lg" id="projects-cta-contact">Get an Official Quote →</a>
    </div>
</section>

@endsection
