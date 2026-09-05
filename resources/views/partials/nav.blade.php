<nav class="navbar" :class="(scrolled || mobileOpen) ? 'scrolled' : '{{ request()->is('/') ? 'navbar-transparent' : 'navbar-solid' }}'">
    <div class="container-mfi">
        <div style="display:flex; align-items:center; justify-content:space-between; gap:1rem;">

            {{-- LOGO --}}
            <a href="{{ route('home') }}" style="display:flex; align-items:center; gap:0.85rem; text-decoration:none; flex-shrink:0;">
                <div style="background:#ffffff; padding:2px; border-radius:6px; display:flex; align-items:center; justify-content:center; box-shadow:0 2px 8px rgba(0,0,0,0.15);">
                    <img src="{{ asset('images/logo.jpg') }}" alt="Makati Foundry, Inc. Logo" style="height:38px; width:auto; display:block; object-fit:contain; border-radius:4px;">
                </div>
                <div>
                    <div style="font-family:'Barlow Condensed',sans-serif; font-size:1.2rem; font-weight:800; color:#fff; letter-spacing:0.04em; line-height:1.1; text-transform:uppercase;">Makati Foundry</div>
                    <div style="font-size:0.65rem; color:rgba(255,255,255,0.75); letter-spacing:0.1em; text-transform:uppercase; font-weight:600;">Inc. — Est. Philippines</div>
                </div>
            </a>

            {{-- DESKTOP NAV --}}
            <div class="hidden md:flex" style="align-items:center; gap:2rem;">
                <a href="{{ route('home') }}"     class="nav-link {{ request()->routeIs('home')     ? 'active' : '' }}">Home</a>
                <a href="{{ route('about') }}"    class="nav-link {{ request()->routeIs('about')    ? 'active' : '' }}">About</a>
                <a href="{{ route('products') }}" class="nav-link {{ request()->routeIs('products') ? 'active' : '' }}">Products</a>
                <a href="{{ route('projects') }}" class="nav-link {{ request()->routeIs('projects') ? 'active' : '' }}">Projects</a>
                <a href="{{ route('contact') }}"  class="nav-link {{ request()->routeIs('contact')  ? 'active' : '' }}">Contact</a>
                <a href="{{ route('contact') }}" class="btn btn-primary btn-sm" style="margin-left:0.5rem;" id="nav-get-quote">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="currentColor"><path d="M20 4H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/></svg>
                    Get a Quote
                </a>
            </div>

            {{-- MOBILE HAMBURGER --}}
            <button
                @click="mobileOpen = !mobileOpen"
                class="md:hidden"
                style="background:none; border:none; cursor:pointer; padding:0.5rem; color:#fff; position:relative; z-index:60;"
                aria-label="Toggle navigation"
                id="mobile-nav-toggle">
                <svg x-show="!mobileOpen" width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M3 18h18v-2H3v2zm0-5h18v-2H3v2zm0-7v2h18V6H3z"/>
                </svg>
                <svg x-show="mobileOpen" x-cloak width="24" height="24" viewBox="0 0 24 24" fill="currentColor">
                    <path d="M19 6.41L17.59 5 12 10.59 6.41 5 5 6.41 10.59 12 5 17.59 6.41 19 12 13.41 17.59 19 19 17.59 13.41 12z"/>
                </svg>
            </button>
        </div>

        {{-- MOBILE DRAWER (Full-screen solid overlay) --}}
        <div
            x-show="mobileOpen"
            x-cloak
            x-transition:enter="transition ease-out duration-200"
            x-transition:enter-start="opacity-0"
            x-transition:enter-end="opacity-100"
            x-transition:leave="transition ease-in duration-150"
            x-transition:leave-start="opacity-100"
            x-transition:leave-end="opacity-0"
            style="position:fixed; top:0; left:0; right:0; bottom:0; z-index:55; background:rgba(10,22,40,0.98); backdrop-filter:blur(16px); -webkit-backdrop-filter:blur(16px); padding-top:5.5rem; overflow-y:auto;"
            class="md:hidden">

            <div class="container-mfi" style="display:flex; flex-direction:column; gap:0.25rem;">
                <a href="{{ route('home') }}"     @click="mobileOpen=false" class="nav-link" style="padding:1rem 0; font-size:1.15rem; font-weight:600; border-bottom:1px solid rgba(255,255,255,0.08);">Home</a>
                <a href="{{ route('about') }}"    @click="mobileOpen=false" class="nav-link" style="padding:1rem 0; font-size:1.15rem; font-weight:600; border-bottom:1px solid rgba(255,255,255,0.08);">About</a>
                <a href="{{ route('products') }}" @click="mobileOpen=false" class="nav-link" style="padding:1rem 0; font-size:1.15rem; font-weight:600; border-bottom:1px solid rgba(255,255,255,0.08);">Products</a>
                <a href="{{ route('projects') }}" @click="mobileOpen=false" class="nav-link" style="padding:1rem 0; font-size:1.15rem; font-weight:600; border-bottom:1px solid rgba(255,255,255,0.08);">Projects</a>
                <a href="{{ route('contact') }}"  @click="mobileOpen=false" class="nav-link" style="padding:1rem 0; font-size:1.15rem; font-weight:600; border-bottom:1px solid rgba(255,255,255,0.08);">Contact</a>
                <div style="padding-top:1.5rem;">
                    <a href="{{ route('contact') }}" @click="mobileOpen=false" class="btn btn-primary" style="width:100%; justify-content:center; padding:0.85rem 1.5rem; font-size:1.05rem;">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M20 4H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/></svg>
                        Get a Quote
                    </a>
                </div>
            </div>
        </div>
    </div>
</nav>

