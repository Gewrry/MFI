<footer class="footer">
    <div class="container-mfi">
        <div style="display:grid; grid-template-columns:repeat(auto-fit, minmax(200px, 1fr)); gap:3rem; margin-bottom:0;">

            {{-- Company Info --}}
            <div>
                <div style="display:flex; align-items:center; gap:0.85rem; margin-bottom:1.25rem;">
                    <div style="background:#ffffff; padding:2px; border-radius:6px; display:flex; align-items:center; justify-content:center; box-shadow:0 2px 8px rgba(0,0,0,0.15); flex-shrink:0;">
                        <img src="{{ asset('images/logo.jpg') }}" alt="Makati Foundry, Inc. Logo" style="height:42px; width:auto; display:block; object-fit:contain; border-radius:4px;">
                    </div>
                    <div>
                        <div style="font-family:'Barlow Condensed',sans-serif; font-size:1.2rem; font-weight:800; color:#fff; letter-spacing:0.04em; text-transform:uppercase;">Makati Foundry, Inc.</div>
                        <div style="font-size:0.65rem; color:rgba(255,255,255,0.65); letter-spacing:0.08em; text-transform:uppercase; font-weight:500;">Maker of Quality Waterworks Hardware</div>
                    </div>
                </div>
                <p style="font-size:0.85rem; line-height:1.75; color:rgba(255,255,255,0.7); margin-bottom:1.25rem;">
                    Maker of Quality Valves, Fire Hydrants, Fittings, and Blue Star uPVC Pipes — serving waterworks, construction, and fire safety projects across the Philippines.
                </p>
                {{-- Social --}}
                <div style="display:flex; gap:0.75rem;">
                    <a href="#" aria-label="Facebook" style="width:36px; height:36px; border-radius:6px; background:rgba(255,255,255,0.1); display:flex; align-items:center; justify-content:center; color:rgba(255,255,255,0.8); text-decoration:none; transition:all 0.2s;" onmouseover="this.style.background='#F97316'; this.style.color='#fff'" onmouseout="this.style.background='rgba(255,255,255,0.1)'; this.style.color='rgba(255,255,255,0.8)'">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M18 2h-3a5 5 0 0 0-5 5v3H7v4h3v8h4v-8h3l1-4h-4V7a1 1 0 0 1 1-1h3z"/></svg>
                    </a>
                    <a href="#" aria-label="LinkedIn" style="width:36px; height:36px; border-radius:6px; background:rgba(255,255,255,0.1); display:flex; align-items:center; justify-content:center; color:rgba(255,255,255,0.8); text-decoration:none; transition:all 0.2s;" onmouseover="this.style.background='#F97316'; this.style.color='#fff'" onmouseout="this.style.background='rgba(255,255,255,0.1)'; this.style.color='rgba(255,255,255,0.8)'">
                        <svg width="16" height="16" viewBox="0 0 24 24" fill="currentColor"><path d="M16 8a6 6 0 0 1 6 6v7h-4v-7a2 2 0 0 0-2-2 2 2 0 0 0-2 2v7h-4v-7a6 6 0 0 1 6-6zM2 9h4v12H2z"/><circle cx="4" cy="4" r="2"/></svg>
                    </a>
                </div>
            </div>

            {{-- Quick Links --}}
            <div>
                <h4 class="footer-heading">Quick Links</h4>
                <a href="{{ route('home') }}"     class="footer-link">Home</a>
                <a href="{{ route('about') }}"    class="footer-link">About Us</a>
                <a href="{{ route('products') }}" class="footer-link">Product Catalog</a>
                <a href="{{ route('projects') }}" class="footer-link">Major Projects</a>
                <a href="{{ route('contact') }}"  class="footer-link">Contact / Request Quote</a>
            </div>

            {{-- Product Categories --}}
            <div>
                <h4 class="footer-heading">Products</h4>
                <a href="{{ route('products') }}?cat=valves"   class="footer-link">Valves</a>
                <a href="{{ route('products') }}?cat=fittings" class="footer-link">Fittings & Joints</a>
                <a href="{{ route('products') }}?cat=pipes"    class="footer-link">uPVC Pipes</a>
                <a href="{{ route('products') }}?cat=fire"     class="footer-link">Fire Safety</a>
                <a href="{{ route('products') }}?cat=access"   class="footer-link">Access & Drainage</a>
            </div>

            {{-- Contact Info --}}
            <div>
                <h4 class="footer-heading">Contact Us</h4>

                {{-- Sales Office --}}
                <div style="margin-bottom:1.25rem;">
                    <div style="font-size:0.75rem; font-weight:700; color:#F97316; text-transform:uppercase; letter-spacing:0.05em; margin-bottom:0.35rem;">Sales Office</div>
                    <div style="display:flex; gap:0.6rem; margin-bottom:0.35rem; align-items:flex-start;">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="#F97316" style="flex-shrink:0; margin-top:3px;"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/></svg>
                        <span style="font-size:0.8rem; color:rgba(255,255,255,0.75); line-height:1.5;">9120 Sultana St., Cor. Constancia St. Brgy. Olympia, Makati City</span>
                    </div>
                    <div style="display:flex; gap:0.6rem; align-items:center;">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="#F97316" style="flex-shrink:0;"><path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/></svg>
                        <a href="tel:+6328990154" style="font-size:0.8rem; color:rgba(255,255,255,0.75); text-decoration:none;">(632) 899-0154 / 899-0208</a>
                    </div>
                </div>

                {{-- Plant Site --}}
                <div style="margin-bottom:1.25rem;">
                    <div style="font-size:0.75rem; font-weight:700; color:#F97316; text-transform:uppercase; letter-spacing:0.05em; margin-bottom:0.35rem;">Plant Site</div>
                    <div style="display:flex; gap:0.6rem; margin-bottom:0.35rem; align-items:flex-start;">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="#F97316" style="flex-shrink:0; margin-top:3px;"><path d="M12 2C8.13 2 5 5.13 5 9c0 5.25 7 13 7 13s7-7.75 7-13c0-3.87-3.13-7-7-7zm0 9.5c-1.38 0-2.5-1.12-2.5-2.5s1.12-2.5 2.5-2.5 2.5 1.12 2.5 2.5-1.12 2.5-2.5 2.5z"/></svg>
                        <span style="font-size:0.8rem; color:rgba(255,255,255,0.75); line-height:1.5;">#23 National Road, Bo. Tunasan, Muntinlupa City</span>
                    </div>
                    <div style="display:flex; gap:0.6rem; align-items:center;">
                        <svg width="14" height="14" viewBox="0 0 24 24" fill="#F97316" style="flex-shrink:0;"><path d="M6.62 10.79c1.44 2.83 3.76 5.14 6.59 6.59l2.2-2.2c.27-.27.67-.36 1.02-.24 1.12.37 2.33.57 3.57.57.55 0 1 .45 1 1V20c0 .55-.45 1-1 1-9.39 0-17-7.61-17-17 0-.55.45-1 1-1h3.5c.55 0 1 .45 1 1 0 1.25.2 2.45.57 3.57.11.35.03.74-.25 1.02l-2.2 2.2z"/></svg>
                        <a href="tel:+6328611802" style="font-size:0.8rem; color:rgba(255,255,255,0.75); text-decoration:none;">(632) 861-1802 / 861-1807</a>
                    </div>
                </div>

                {{-- Email --}}
                <div style="display:flex; gap:0.6rem; align-items:center;">
                    <svg width="14" height="14" viewBox="0 0 24 24" fill="#F97316" style="flex-shrink:0;"><path d="M20 4H4c-1.1 0-2 .9-2 2v12c0 1.1.9 2 2 2h16c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 4l-8 5-8-5V6l8 5 8-5v2z"/></svg>
                    <a href="mailto:info@makatifoundry.com" style="font-size:0.8rem; color:rgba(255,255,255,0.75); text-decoration:none;">info@makatifoundry.com</a>
                </div>
            </div>
        </div>

        <hr class="footer-divider">

        <div style="display:flex; flex-wrap:wrap; align-items:center; justify-content:space-between; gap:1rem;">
            <p style="font-size:0.8rem; color:rgba(255,255,255,0.5); margin:0;">
                &copy; {{ date('Y') }} Makati Foundry, Inc. All rights reserved.
            </p>
        </div>
    </div>
</footer>
