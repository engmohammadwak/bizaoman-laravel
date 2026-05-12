<!DOCTYPE html>
<html lang="ar" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ $settings['site_name_ar'] ?? 'BizaOman' }} - @yield('title', $settings['site_tagline_ar'] ?? '')</title>
    <meta name="description" content="{{ $settings['meta_description_ar'] ?? '' }}">

    {{-- Favicon --}}
    @if(!empty($settings['site_favicon']))
    <link rel="icon" href="{{ $settings['site_favicon'] }}">
    @else
    <link rel="icon" href="/favicon.ico">
    @endif

    {{-- Google Fonts --}}
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link href="https://fonts.googleapis.com/css2?family=Cairo:wght@300;400;600;700;900&display=swap" rel="stylesheet">

    {{-- Tailwind CSS CDN --}}
    <script src="https://cdn.tailwindcss.com"></script>

    {{-- Dynamic Colors via CSS Variables --}}
    <style>
        :root {
            --color-primary: {{ $settings['color_primary'] ?? '#C49A45' }};
            --color-secondary: {{ $settings['color_secondary'] ?? '#1A1A2E' }};
            --color-accent: {{ $settings['color_accent'] ?? '#E8C97A' }};
            --color-background: {{ $settings['color_background'] ?? '#FFFFFF' }};
            --color-text: {{ $settings['color_text'] ?? '#1A1A2E' }};
            --color-navbar: {{ $settings['color_navbar'] ?? '#1A1A2E' }};
            --color-footer: {{ $settings['color_footer'] ?? '#1A1A2E' }};
        }
        * { font-family: 'Cairo', sans-serif; }
        body { background-color: var(--color-background); color: var(--color-text); }
        .bg-primary { background-color: var(--color-primary) !important; }
        .bg-secondary { background-color: var(--color-secondary) !important; }
        .text-primary { color: var(--color-primary) !important; }
        .text-secondary { color: var(--color-secondary) !important; }
        .border-primary { border-color: var(--color-primary) !important; }
        .btn-primary {
            background-color: var(--color-primary);
            color: white;
            padding: 12px 32px;
            border-radius: 8px;
            font-weight: 700;
            transition: all 0.3s;
            display: inline-block;
        }
        .btn-primary:hover { opacity: 0.9; transform: translateY(-2px); }
        .navbar { background-color: var(--color-navbar); }
        .footer-bg { background-color: var(--color-footer); }
    </style>

    @if(!empty($settings['google_analytics']))
    <script async src="https://www.googletagmanager.com/gtag/js?id={{ $settings['google_analytics'] }}"></script>
    <script>
        window.dataLayer = window.dataLayer || [];
        function gtag(){dataLayer.push(arguments);}
        gtag('js', new Date());
        gtag('config', '{{ $settings['google_analytics'] }}');
    </script>
    @endif

    @stack('styles')
</head>
<body>

    {{-- Navbar --}}
    <nav class="navbar sticky top-0 z-50 shadow-lg">
        <div class="max-w-7xl mx-auto px-4 py-4 flex items-center justify-between">
            <a href="/" class="flex items-center gap-3">
                @if(!empty($settings['site_logo']))
                    <img src="{{ $settings['site_logo'] }}" alt="{{ $settings['site_name_ar'] ?? 'Logo' }}" class="h-12">
                @else
                    <span class="text-2xl font-black text-primary">{{ $settings['site_name_ar'] ?? 'BizaOman' }}</span>
                @endif
            </a>
            <div class="hidden md:flex items-center gap-6">
                <a href="/" class="text-white hover:text-yellow-400 transition">الرئيسية</a>
                <a href="/#services" class="text-white hover:text-yellow-400 transition">خدماتنا</a>
                <a href="/#team" class="text-white hover:text-yellow-400 transition">فريقنا</a>
                <a href="/#clients" class="text-white hover:text-yellow-400 transition">عملاؤنا</a>
                <a href="/#certificates" class="text-white hover:text-yellow-400 transition">شهاداتنا</a>
                <a href="/contact" class="btn-primary text-sm">تواصل معنا</a>
            </div>
        </div>
    </nav>

    {{-- Main Content --}}
    <main>
        @yield('content')
    </main>

    {{-- Footer --}}
    <footer class="footer-bg text-white pt-16 pb-8">
        <div class="max-w-7xl mx-auto px-4">
            <div class="grid grid-cols-1 md:grid-cols-3 gap-10 mb-10">
                <div>
                    @if(!empty($settings['site_logo']))
                        <img src="{{ $settings['site_logo'] }}" alt="Logo" class="h-16 mb-4">
                    @else
                        <h3 class="text-2xl font-black text-primary mb-4">{{ $settings['site_name_ar'] ?? 'BizaOman' }}</h3>
                    @endif
                    <p class="text-gray-400 leading-relaxed">{{ $settings['site_tagline_ar'] ?? '' }}</p>
                </div>
                <div>
                    <h4 class="text-lg font-bold text-primary mb-4">تواصل معنا</h4>
                    <ul class="space-y-2 text-gray-400">
                        @if(!empty($settings['contact_email']))
                        <li>📧 {{ $settings['contact_email'] }}</li>
                        @endif
                        @if(!empty($settings['contact_phone']))
                        <li>📞 {{ $settings['contact_phone'] }}</li>
                        @endif
                        @if(!empty($settings['contact_address_ar']))
                        <li>📍 {{ $settings['contact_address_ar'] }}</li>
                        @endif
                    </ul>
                </div>
                <div>
                    <h4 class="text-lg font-bold text-primary mb-4">تابعنا</h4>
                    <div class="flex gap-4">
                        @if(!empty($settings['social_linkedin']))
                        <a href="{{ $settings['social_linkedin'] }}" target="_blank" class="text-gray-400 hover:text-primary transition text-2xl">in</a>
                        @endif
                        @if(!empty($settings['social_twitter']))
                        <a href="{{ $settings['social_twitter'] }}" target="_blank" class="text-gray-400 hover:text-primary transition text-2xl">X</a>
                        @endif
                        @if(!empty($settings['social_instagram']))
                        <a href="{{ $settings['social_instagram'] }}" target="_blank" class="text-gray-400 hover:text-primary transition text-2xl">ig</a>
                        @endif
                    </div>
                </div>
            </div>
            <div class="border-t border-gray-700 pt-6 text-center text-gray-500 text-sm">
                &copy; {{ date('Y') }} {{ $settings['site_name_ar'] ?? 'BizaOman' }}. جميع الحقوق محفوظة.
            </div>
        </div>
    </footer>

    @stack('scripts')
</body>
</html>
