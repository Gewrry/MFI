<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Technical Spec Sheet — {{ $product['name'] }} | Makati Foundry, Inc.</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Barlow+Condensed:wght@700;800;900&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    <style>
        *, *::before, *::after { box-sizing: border-box; }
        body {
            font-family: 'Inter', sans-serif;
            color: #0F172A;
            background: #F1F5F9;
            margin: 0;
            padding: 2rem 1rem;
            line-height: 1.5;
        }
        .sheet-container {
            max-width: 840px;
            margin: 0 auto;
            background: #ffffff;
            border: 1px solid #CBD5E1;
            border-radius: 12px;
            box-shadow: 0 10px 30px rgba(0,0,0,0.1);
            padding: 3rem;
            position: relative;
        }
        @media print {
            body { background: #fff; padding: 0; }
            .sheet-container { border: none; box-shadow: none; padding: 0; max-width: 100%; }
            .no-print { display: none !important; }
        }
        .header-bar {
            display: flex;
            align-items: center;
            justify-content: space-between;
            border-bottom: 2px solid #0F1F35;
            padding-bottom: 1.5rem;
            margin-bottom: 2rem;
        }
        .logo-group {
            display: flex;
            align-items: center;
            gap: 1rem;
        }
        .brand-title {
            font-family: 'Barlow Condensed', sans-serif;
            font-size: 1.75rem;
            font-weight: 900;
            color: #0F1F35;
            text-transform: uppercase;
            letter-spacing: 0.02em;
            line-height: 1.1;
        }
        .doc-meta {
            text-align: right;
            font-size: 0.8rem;
            color: #64748B;
        }
        .doc-meta strong { color: #0F1F35; }
        .product-header {
            display: grid;
            grid-template-columns: 2fr 1fr;
            gap: 2rem;
            align-items: center;
            background: #F8FAFC;
            border: 1px solid #E2E8F0;
            border-radius: 8px;
            padding: 1.75rem;
            margin-bottom: 2rem;
        }
        .badge {
            display: inline-block;
            background: #F26522;
            color: #fff;
            font-family: 'Barlow Condensed', sans-serif;
            font-weight: 800;
            font-size: 0.8rem;
            letter-spacing: 0.08em;
            text-transform: uppercase;
            padding: 0.25rem 0.75rem;
            border-radius: 9999px;
            margin-bottom: 0.5rem;
        }
        .product-title {
            font-family: 'Barlow Condensed', sans-serif;
            font-size: 2.2rem;
            font-weight: 800;
            color: #0F1F35;
            margin: 0 0 0.5rem;
            line-height: 1.1;
        }
        .product-tagline {
            font-size: 0.95rem;
            color: #475569;
            margin: 0;
        }
        .product-img {
            max-height: 150px;
            width: auto;
            max-width: 100%;
            object-fit: contain;
            display: block;
            margin: 0 auto;
        }
        .section-title {
            font-family: 'Barlow Condensed', sans-serif;
            font-size: 1.3rem;
            font-weight: 800;
            color: #0F1F35;
            text-transform: uppercase;
            letter-spacing: 0.04em;
            border-bottom: 2px solid #F26522;
            padding-bottom: 0.35rem;
            margin: 2rem 0 1rem;
        }
        .spec-table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 2rem;
            font-size: 0.9rem;
        }
        .spec-table th, .spec-table td {
            padding: 0.75rem 1rem;
            border-bottom: 1px solid #E2E8F0;
            text-align: left;
        }
        .spec-table th {
            background: #F8FAFC;
            color: #0F1F35;
            font-weight: 700;
            width: 40%;
        }
        .spec-table td { color: #334155; }
        .size-tags {
            display: flex;
            flex-wrap: wrap;
            gap: 0.5rem;
            margin-bottom: 2rem;
        }
        .size-tag {
            background: #F1F5F9;
            border: 1px solid #CBD5E1;
            border-radius: 6px;
            padding: 0.4rem 0.8rem;
            font-size: 0.85rem;
            font-weight: 600;
            color: #0F1F35;
        }
        .footer-stamp {
            margin-top: 3rem;
            border-top: 1px solid #E2E8F0;
            padding-top: 1.5rem;
            display: flex;
            align-items: center;
            justify-content: space-between;
            font-size: 0.8rem;
            color: #64748B;
        }
        .action-bar {
            margin-bottom: 1.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
        }
        .btn-print {
            background: #F26522;
            color: #fff;
            border: none;
            padding: 0.75rem 1.5rem;
            font-weight: 700;
            font-size: 0.9rem;
            border-radius: 6px;
            cursor: pointer;
            display: inline-flex;
            align-items: center;
            gap: 0.5rem;
            text-decoration: none;
        }
        .btn-print:hover { background: #d4541a; }
        .btn-back {
            color: #1B3A5C;
            text-decoration: none;
            font-weight: 600;
            font-size: 0.9rem;
        }
    </style>
</head>
<body>

    <div class="sheet-container">
        {{-- Print & Back Buttons --}}
        <div class="action-bar no-print">
            <a href="{{ route('products') }}" class="btn-back">← Back to Catalog</a>
            <button onclick="window.print()" class="btn-print">
                <svg width="18" height="18" viewBox="0 0 24 24" fill="currentColor"><path d="M19 8H5c-1.66 0-3 1.34-3 3v6h4v4h12v-4h4v-6c0-1.66-1.34-3-3-3zm-3 11H8v-5h8v5zm3-7c-.55 0-1-.45-1-1s.45-1 1-1 1 .45 1 1-.45 1-1 1zm-1-9H6v4h12V3z"/></svg>
                Print / Save as PDF
            </button>
        </div>

        {{-- Header Bar --}}
        <div class="header-bar">
            <div class="logo-group">
                <img src="{{ asset('images/logo.jpg') }}" alt="Makati Foundry Logo" style="height:50px; width:auto; border-radius:4px;">
                <div>
                    <div class="brand-title">Makati Foundry, Inc.</div>
                    <div style="font-size:0.75rem; color:#64748B; font-weight:600; letter-spacing:0.06em; text-transform:uppercase;">Technical Product Specification Sheet</div>
                </div>
            </div>
            <div class="doc-meta">
                <div><strong>DOC REF:</strong> MFI-SPEC-{{ strtoupper($product['id']) }}</div>
                <div><strong>DATE:</strong> {{ date('F Y') }}</div>
                <div><strong>STANDARDS:</strong> BPS Certified / ISO Compliant</div>
            </div>
        </div>

        {{-- Product Header --}}
        <div class="product-header">
            <div>
                <span class="badge">{{ $product['badge'] }}</span>
                <h1 class="product-title">{{ $product['name'] }}</h1>
                <p class="product-tagline">{{ $product['tagline'] }}</p>
            </div>
            <div>
                <img src="{{ asset('images/' . $product['image']) }}" alt="{{ $product['name'] }}" class="product-img" onerror="this.src='{{ asset('images/products/placeholder.svg') }}'">
            </div>
        </div>

        {{-- Technical Specifications Table --}}
        <div class="section-title">Technical Specifications & Performance Data</div>
        <table class="spec-table">
            <tbody>
                @foreach($product['specs'] as $key => $val)
                <tr>
                    <th>{{ $key }}</th>
                    <td>{{ $val }}</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        {{-- Available Sizes --}}
        <div class="section-title">Available Diameters & Sizing Matrix</div>
        <div class="size-tags">
            @foreach($product['sizes'] as $sz)
            <span class="size-tag">{{ $sz }}</span>
            @endforeach
        </div>

        {{-- Product Summary --}}
        <div class="section-title">Engineering Overview</div>
        <p style="font-size:0.9rem; color:#334155; line-height:1.7;">
            {{ $product['description'] }} Manufactured under stringent quality assurance guidelines at Makati Foundry's 20,000 m² Muntinlupa Plant Facility. Designed for continuous long-term utility service across Philippines waterworks and commercial infrastructure.
        </p>

        {{-- Footer Stamp --}}
        <div class="footer-stamp">
            <div>
                <strong>Makati Foundry, Inc.</strong> • Sales Office: 9120 Sultana St., Makati City | Plant: Tunasan, Muntinlupa<br>
                Tel: (632) 899-0154 / 861-1802 | Email: info@makatifoundry.com | Web: www.makatifoundry.com
            </div>
            <div style="text-align:right;">
                <div style="font-weight:700; color:#0F1F35;">Quality Assurance Approved</div>
                <div style="font-size:0.75rem; color:#94A3B8;">Official Engineering Datasheet</div>
            </div>
        </div>
    </div>

</body>
</html>
