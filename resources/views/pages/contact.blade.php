@extends('layouts.app')

@section('title', 'Contact & Request a Quote — Makati Foundry, Inc.')
@section('meta_description', 'Contact Makati Foundry, Inc. to request a quote for valves, hydrants, pipe fittings, and Blue Star uPVC pipes. Fill out our inquiry form and our team will respond within 1-2 business days.')

@section('content')

{{-- Page Hero --}}
<div class="page-hero">
    <div class="container-mfi" style="position:relative; z-index:1;">
        <div class="breadcrumb">
            <a href="{{ route('home') }}" style="color:rgba(255,255,255,0.6); text-decoration:none;">Home</a>
            <span class="breadcrumb-sep">›</span>
            <span style="color:#fff;">Contact</span>
        </div>
        <span class="section-label">Get in Touch</span>
        <h1 style="font-family:'Barlow Condensed',sans-serif; font-size:clamp(2.5rem,5vw,4rem); font-weight:900; color:#fff; margin:0.5rem 0 1rem; text-transform:uppercase; letter-spacing:-0.02em; line-height:1.0;">
            Request a Quote
        </h1>
        <p style="font-size:1rem; color:rgba(255,255,255,0.7); max-width:560px; line-height:1.7;">
            Submit your project requirements or materials list and our technical sales team will prepare a formal quotation within 1–2 business days.
        </p>
    </div>
</div>

<section class="section" aria-label="Contact form and information">
    <div class="container-mfi">
        <div class="contact-grid">

            {{-- ── CONTACT FORM ── --}}
            <div>
                <span class="section-label">Inquiry Form</span>
                <h2 class="section-title title-underline" style="margin-bottom:2rem;">Send Us Your Requirements</h2>

                {{-- Success message --}}
                @if(session('success'))
                <div class="alert alert-success" style="margin-bottom:2rem;" role="alert">
                    <svg width="20" height="20" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm-2 15l-5-5 1.41-1.41L10 14.17l7.59-7.59L19 8l-9 9z"/></svg>
                    {{ session('success') }}
                </div>
                @endif

                {{-- Validation errors --}}
                @if($errors->any())
                <div class="alert alert-error" style="margin-bottom:2rem; flex-direction:column; align-items:flex-start;" role="alert">
                    <div style="display:flex; align-items:center; gap:0.5rem; margin-bottom:0.5rem;">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"/></svg>
                        <strong>Please correct the following:</strong>
                    </div>
                    <ul style="margin:0; padding-left:1.25rem; font-size:0.875rem;">
                        @foreach($errors->all() as $error)
                        <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif

                <form action="{{ route('contact.store') }}" method="POST" id="quote-request-form" novalidate>
                    @csrf

                    <div class="form-row-2col">

                        <div class="form-group">
                            <label class="form-label" for="name">
                                Full Name <span style="color:#DC2626;">*</span>
                            </label>
                            <input
                                type="text"
                                id="name"
                                name="name"
                                class="form-control {{ $errors->has('name') ? 'border-red-400' : '' }}"
                                placeholder="Juan Dela Cruz"
                                value="{{ old('name') }}"
                                required
                                autocomplete="name">
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="company">Company / Organization</label>
                            <input
                                type="text"
                                id="company"
                                name="company"
                                class="form-control"
                                placeholder="ABC Construction Corp."
                                value="{{ old('company') }}"
                                autocomplete="organization">
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="email">
                                Email Address <span style="color:#DC2626;">*</span>
                            </label>
                            <input
                                type="email"
                                id="email"
                                name="email"
                                class="form-control {{ $errors->has('email') ? 'border-red-400' : '' }}"
                                placeholder="juan@company.com"
                                value="{{ old('email') }}"
                                required
                                autocomplete="email">
                        </div>

                        <div class="form-group">
                            <label class="form-label" for="phone">
                                Phone Number <span style="color:#DC2626;">*</span>
                            </label>
                            <input
                                type="tel"
                                id="phone"
                                name="phone"
                                class="form-control {{ $errors->has('phone') ? 'border-red-400' : '' }}"
                                placeholder="+63 9XX XXX XXXX"
                                value="{{ old('phone') }}"
                                required
                                autocomplete="tel">
                        </div>
                    </div>

                    {{-- ── SEARCHABLE PRODUCT OF INTEREST ── --}}
                    <div class="form-group" x-data="{
                        open: false,
                        search: '{{ old('product_interest', request('product', '')) }}',
                        selected: '{{ old('product_interest', request('product', '')) }}',
                        products: {{ json_encode($productNames) }},
                        get filteredProducts() {
                            if (!this.search || this.search === this.selected) return this.products;
                            return this.products.filter(p => p.toLowerCase().includes(this.search.toLowerCase()));
                        }
                    }" @click.outside="open = false" style="position:relative;">
                        
                        <label class="form-label" for="product_search_input">Product of Interest</label>
                        
                        {{-- Hidden input for form payload --}}
                        <input type="hidden" name="product_interest" :value="selected">

                        <div style="position:relative;">
                            <input
                                type="text"
                                id="product_search_input"
                                class="form-control"
                                style="padding-right:2.5rem;"
                                placeholder="🔍 Type to search products (e.g. Gate Valve, Hydrant, uPVC...)"
                                x-model="search"
                                @focus="open = true"
                                @input="open = true"
                                @keydown.escape="open = false"
                                autocomplete="off">

                            <svg width="18" height="18" viewBox="0 0 24 24" fill="#94A3B8" style="position:absolute; right:0.85rem; top:50%; transform:translateY(-50%); pointer-events:none;">
                                <path d="M15.5 14h-.79l-.28-.27C15.41 12.59 16 11.11 16 9.5 16 5.91 13.09 3 9.5 3S3 5.91 3 9.5 5.91 16 9.5 16c1.61 0 3.09-.59 4.23-1.57l.27.28v.79l5 4.99L20.49 19l-4.99-5zm-6 0C7.01 14 5 11.99 5 9.5S7.01 5 9.5 5 14 7.01 14 9.5 11.99 14 9.5 14z"/>
                            </svg>
                        </div>

                        {{-- Search Filter Results Menu --}}
                        <div
                            x-show="open"
                            x-transition:enter="transition ease-out duration-150"
                            x-transition:enter-start="opacity-0 translate-y-1"
                            x-transition:enter-end="opacity-100 translate-y-0"
                            style="position:absolute; top:100%; left:0; right:0; z-index:100; background:#fff; border:1.5px solid #2563EB; border-radius:0.5rem; margin-top:0.35rem; max-height:260px; overflow-y:auto; box-shadow:0 12px 28px -5px rgba(15,23,42,0.18);"
                            x-cloak>

                            {{-- Clear option --}}
                            <div
                                @click="selected = ''; search = ''; open = false"
                                style="padding:0.65rem 1rem; font-size:0.825rem; color:#64748B; cursor:pointer; border-bottom:1px solid #F1F5F9; font-style:italic;"
                                onmouseover="this.style.background='#F8FAFC'" onmouseout="this.style.background='transparent'">
                                — Clear selection / General inquiry —
                            </div>

                            {{-- Multiple Products option --}}
                            <div
                                @click="selected = 'Multiple Products'; search = 'Multiple Products'; open = false"
                                style="padding:0.65rem 1rem; font-size:0.85rem; font-weight:700; color:#2563EB; cursor:pointer; border-bottom:1px solid #E2E8F0; background:#EFF6FF;"
                                onmouseover="this.style.background='#DBEAFE'" onmouseout="this.style.background='#EFF6FF'">
                                📦 Multiple Products (describe in message field below)
                            </div>

                            <template x-for="item in filteredProducts" :key="item">
                                <div
                                    @click="selected = item; search = item; open = false"
                                    style="padding:0.65rem 1rem; font-size:0.85rem; color:#0F172A; cursor:pointer; border-bottom:1px solid #F8FAFC; transition:all 0.15s;"
                                    :style="selected === item ? 'background:#EFF6FF; font-weight:700; color:#2563EB;' : ''"
                                    onmouseover="if(!this.style.background.includes('239')) this.style.background='#F8FAFC'"
                                    onmouseout="if(!this.style.background.includes('239')) this.style.background='transparent'">
                                    <span x-text="item"></span>
                                </div>
                            </template>

                            <div x-show="filteredProducts.length === 0" style="padding:1.25rem; font-size:0.825rem; color:#64748B; text-align:center;">
                                No exact product match found for "<span x-text="search" style="font-weight:700;"></span>".<br>
                                <span style="font-size:0.775rem; color:#94A3B8;">You can describe your requirements in the message box below.</span>
                            </div>
                        </div>
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="quantity">Quantity / Volume Needed</label>
                        <input
                            type="text"
                            id="quantity"
                            name="quantity"
                            class="form-control"
                            placeholder="e.g. 50 pcs DN100 gate valves, 200 m of DN110 uPVC"
                            value="{{ old('quantity') }}">
                    </div>

                    <div class="form-group">
                        <label class="form-label" for="message">
                            Project Details / Message <span style="color:#DC2626;">*</span>
                        </label>
                        <textarea
                            id="message"
                            name="message"
                            class="form-control {{ $errors->has('message') ? 'border-red-400' : '' }}"
                            rows="5"
                            placeholder="Describe your project, required specifications, delivery location, target completion date, and any other relevant details..."
                            required>{{ old('message') }}</textarea>
                    </div>

                    <div style="display:flex; align-items:center; gap:0.75rem; padding:1rem; background:#FFF7ED; border:1px solid #FED7AA; border-radius:0.5rem; margin-bottom:1.5rem; font-size:0.825rem; color:#92400E;">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="#F97316" style="flex-shrink:0;"><path d="M12 2C6.48 2 2 6.48 2 12s4.48 10 10 10 10-4.48 10-10S17.52 2 12 2zm1 15h-2v-2h2v2zm0-4h-2V7h2v6z"/></svg>
                        Our team typically responds within <strong>&nbsp;1–2 business days</strong>. For urgent inquiries, please call us directly.
                    </div>

                    <button type="submit" class="btn btn-primary btn-lg" style="width:100%; justify-content:center;" id="submit-quote-form">
                        <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M2.01 21L23 12 2.01 3 2 10l15 2-15 2z"/></svg>
                        Submit Inquiry
                    </button>
                </form>
            </div>

            {{-- ── CONTACT INFO & DUAL LOCATIONS ── --}}
            <div x-data="{ activeMap: 'office' }">
                <span class="section-label">Contact Information</span>
                <h2 class="section-title title-underline" style="margin-bottom:1.5rem;">Get in Touch</h2>

                {{-- Sales Office Card --}}
                <div style="background:#F8FAFC; border:1px solid #E2E8F0; border-radius:0.875rem; padding:1.25rem; margin-bottom:1.25rem;">
                    <div style="display:flex; align-items:center; gap:0.5rem; margin-bottom:0.75rem;">
                        <div style="width:32px; height:32px; border-radius:50%; background:rgba(37,99,235,0.1); display:flex; align-items:center; justify-content:center; color:#2563EB;">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/></svg>
                        </div>
                        <div>
                            <h3 style="font-family:'Barlow Condensed',sans-serif; font-size:1.15rem; font-weight:800; color:#0F172A; margin:0; text-transform:uppercase; letter-spacing:0.02em;">Sales Office — Makati</h3>
                        </div>
                    </div>

                    <div style="font-size:0.825rem; color:#475569; line-height:1.6; margin-bottom:0.75rem;">
                        <strong>Address:</strong> 9120 Sultana St., Cor. Constancia St. Brgy. Olympia, Makati City, Philippines
                    </div>

                    <div style="font-size:0.825rem; color:#475569; line-height:1.6; margin-bottom:0.35rem;">
                        <strong>Tel Nos.:</strong>
                        <a href="tel:+6328990154" style="color:#2563EB; text-decoration:none;">(632) 899-0154</a> /
                        <a href="tel:+6328990208" style="color:#2563EB; text-decoration:none;">899-0208</a> /
                        <a href="tel:+6328957960" style="color:#2563EB; text-decoration:none;">895-7960</a> /
                        <a href="tel:+6328990433" style="color:#2563EB; text-decoration:none;">899-0433</a>
                    </div>

                    <div style="font-size:0.825rem; color:#475569; line-height:1.6; margin-bottom:0.35rem;">
                        <strong>Fax:</strong> (632) 899-0151
                    </div>

                    <div style="font-size:0.825rem; color:#475569;">
                        <strong>Email:</strong> <a href="mailto:info@makatifoundry.com" style="color:#2563EB; text-decoration:none;">info@makatifoundry.com</a>
                    </div>
                </div>

                {{-- Plant Site Card --}}
                <div style="background:#F8FAFC; border:1px solid #E2E8F0; border-radius:0.875rem; padding:1.25rem; margin-bottom:1.5rem;">
                    <div style="display:flex; align-items:center; gap:0.5rem; margin-bottom:0.75rem;">
                        <div style="width:32px; height:32px; border-radius:50%; background:rgba(249,115,22,0.1); display:flex; align-items:center; justify-content:center; color:#F97316;">
                            <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M12 7V3H2v18h20V7H12zM6 19H4v-2h2v2zm0-4H4v-2h2v2zm0-4H4V9h2v2zm0-4H4V5h2v2zm4 12H8v-2h2v2zm0-4H8v-2h2v2zm0-4H8V9h2v2zm0-4H8V5h2v2zm10 12h-8v-2h2v-2h-2v-2h2v-2h-2V9h8v10zm-2-8h-2v2h2v-2zm0 4h-2v2h2v-2z"/></svg>
                        </div>
                        <div>
                            <h3 style="font-family:'Barlow Condensed',sans-serif; font-size:1.15rem; font-weight:800; color:#0F172A; margin:0; text-transform:uppercase; letter-spacing:0.02em;">Plant Site — Muntinlupa</h3>
                        </div>
                    </div>

                    <div style="font-size:0.825rem; color:#475569; line-height:1.6; margin-bottom:0.75rem;">
                        <strong>Address:</strong> #23 National Road, Bo. Tunasan, Muntinlupa City, Philippines
                    </div>

                    <div style="font-size:0.825rem; color:#475569; line-height:1.6; margin-bottom:0.35rem;">
                        <strong>Tel Nos.:</strong>
                        <a href="tel:+6328611802" style="color:#2563EB; text-decoration:none;">(632) 861-1802</a> /
                        <a href="tel:+6328611807" style="color:#2563EB; text-decoration:none;">861-1807</a>
                    </div>

                    <div style="font-size:0.825rem; color:#475569; line-height:1.6; margin-bottom:0.35rem;">
                        <strong>Fax:</strong> (632) 862-0171
                    </div>

                    <div style="font-size:0.825rem; color:#475569;">
                        <strong>Email:</strong> <a href="mailto:info@makatifoundry.com" style="color:#2563EB; text-decoration:none;">info@makatifoundry.com</a>
                    </div>
                </div>

                {{-- ── REAL INTERACTIVE GOOGLE MAPS EMBED ── --}}
                <div style="margin-top:1.5rem;">
                    {{-- Map Selector Tabs --}}
                    <div style="display:flex; gap:0.5rem; margin-bottom:0.75rem;">
                        <button
                            type="button"
                            @click="activeMap = 'office'"
                            :style="activeMap === 'office' ? 'background:#2563EB; color:#fff; border-color:#2563EB;' : 'background:#F1F5F9; color:#475569; border-color:#E2E8F0;'"
                            style="flex:1; padding:0.5rem; border:1px solid; border-radius:0.5rem; font-size:0.8rem; font-weight:700; cursor:pointer; transition:all 0.2s;">
                            📍 Sales Office (Makati)
                        </button>
                        <button
                            type="button"
                            @click="activeMap = 'plant'"
                            :style="activeMap === 'plant' ? 'background:#EA580C; color:#fff; border-color:#EA580C;' : 'background:#F1F5F9; color:#475569; border-color:#E2E8F0;'"
                            style="flex:1; padding:0.5rem; border:1px solid; border-radius:0.5rem; font-size:0.8rem; font-weight:700; cursor:pointer; transition:all 0.2s;">
                            🏭 Plant Site (Muntinlupa)
                        </button>
                    </div>

                    {{-- Sales Office Google Map --}}
                    <div x-show="activeMap === 'office'" style="border-radius:0.75rem; overflow:hidden; border:1px solid #CBD5E1; box-shadow:0 4px 12px rgba(0,0,0,0.08);">
                        <iframe
                            title="Makati Foundry Sales Office Location Map"
                            src="https://maps.google.com/maps?q=9120+Sultana+St,+Makati,+Metro+Manila,+Philippines&t=&z=16&ie=UTF8&iwloc=&output=embed"
                            width="100%"
                            height="240"
                            style="border:0; display:block;"
                            allowfullscreen=""
                            loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                        <div style="background:#F8FAFC; padding:0.6rem 0.85rem; border-top:1px solid #E2E8F0; text-align:right;">
                            <a href="https://www.google.com/maps/search/?api=1&query=9120+Sultana+St,+Makati,+Metro+Manila,+Philippines" target="_blank" rel="noopener noreferrer" style="font-size:0.775rem; font-weight:700; color:#2563EB; text-decoration:none; display:inline-flex; align-items:center; gap:0.25rem;">
                                Open Sales Office in Google Maps ↗
                            </a>
                        </div>
                    </div>

                    {{-- Plant Site Google Map --}}
                    <div x-show="activeMap === 'plant'" style="border-radius:0.75rem; overflow:hidden; border:1px solid #CBD5E1; box-shadow:0 4px 12px rgba(0,0,0,0.08);" x-cloak>
                        <iframe
                            title="Makati Foundry Plant Site Location Map"
                            src="https://maps.google.com/maps?q=Makati+Foundry+Inc,+National+Highway,+Tunasan,+Muntinlupa,+Metro+Manila&t=&z=16&ie=UTF8&iwloc=&output=embed"
                            width="100%"
                            height="240"
                            style="border:0; display:block;"
                            allowfullscreen=""
                            loading="lazy"
                            referrerpolicy="no-referrer-when-downgrade">
                        </iframe>
                        <div style="background:#F8FAFC; padding:0.6rem 0.85rem; border-top:1px solid #E2E8F0; text-align:right;">
                            <a href="https://www.google.com/maps/search/?api=1&query=Makati+Foundry+Inc,+National+Highway,+Tunasan,+Muntinlupa,+Metro+Manila" target="_blank" rel="noopener noreferrer" style="font-size:0.775rem; font-weight:700; color:#EA580C; text-decoration:none; display:inline-flex; align-items:center; gap:0.25rem;">
                                Open Plant Site in Google Maps ↗
                            </a>
                        </div>
                    </div>
                </div>

            </div>

                {{-- Quick product links --}}
                <div style="margin-top:2rem; padding:1.25rem; background:#F8FAFC; border:1px solid #E2E8F0; border-radius:0.75rem;">
                    <h4 style="font-family:'Barlow Condensed',sans-serif; font-size:1rem; font-weight:700; color:#0A1628; margin:0 0 0.75rem; text-transform:uppercase; letter-spacing:0.05em;">Browse Products First?</h4>
                    <p style="font-size:0.825rem; color:#64748B; margin:0 0 0.75rem;">View our full catalog before submitting your inquiry — it helps us provide a more accurate quotation.</p>
                    <a href="{{ route('products') }}" class="btn btn-outline-navy btn-sm" style="width:100%; justify-content:center;" id="contact-browse-catalog">View Product Catalog →</a>
                </div>
            </div>

        </div>
    </div>
</section>

@endsection
