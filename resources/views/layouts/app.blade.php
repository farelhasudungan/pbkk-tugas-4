<!DOCTYPE html>
@php
    // Tantangan 1: Integrasi Gaya Dinamis via Variabel Blade PHP
    // Menangkap parameter rute ?mode=dark, ?mode=light, atau ?mode=white
    $routeMode = request()->query('mode', $mode ?? null);
    $routeModeLower = $routeMode ? strtolower(trim($routeMode)) : null;

    $isDarkParam = ($routeModeLower === 'dark');
    $isLightParam = in_array($routeModeLower, ['light', 'white', 'terang']);

    // Variabel kelas dinamis Blade PHP untuk root html:
    // Jika rute meminta dark -> 'dark'
    // Jika rute meminta light/white -> '' (mode terang)
    // Default -> 'dark'
    $htmlThemeClass = $isDarkParam ? 'dark' : ($isLightParam ? '' : 'dark');
@endphp
<html lang="id" class="{{ $htmlThemeClass }} scroll-smooth antialiased" data-route-mode="{{ $routeModeLower }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="Tugas 4 PBKK - Aplikasi Multi-View Profil Akademik & Agentic AI Sandbox ITS">
    
    {{-- Dynamic Title --}}
    <title>@yield('title', 'Profil Akademik ITS') - PBKK Sandbox</title>

    <script>
        (function() {
            // Prioritas 1: Parameter URL (?mode=dark, ?mode=light, ?mode=white)
            const urlParams = new URLSearchParams(window.location.search);
            const modeParam = urlParams.get('mode');
            if (modeParam) {
                const lowerMode = modeParam.toLowerCase();
                if (lowerMode === 'dark') {
                    document.documentElement.classList.add('dark');
                    localStorage.setItem('theme', 'dark');
                    return;
                } else if (lowerMode === 'light' || lowerMode === 'white' || lowerMode === 'terang') {
                    document.documentElement.classList.remove('dark');
                    localStorage.setItem('theme', 'light');
                    return;
                }
            }

            // Prioritas 2: localStorage atau preferensi sistem browser
            const saved = localStorage.getItem('theme');
            if (saved === 'light' || (!saved && window.matchMedia('(prefers-color-scheme: light)').matches)) {
                document.documentElement.classList.remove('dark');
            } else {
                document.documentElement.classList.add('dark');
            }
        })();

        function syncThemeUI(dark) {
            document.querySelectorAll('.neu-toggle').forEach(t => {
                t.dataset.index = dark ? 1 : 0;
                const opts = t.querySelectorAll('.neu-toggle__opt');
                if (opts.length >= 2) {
                    opts[0].dataset.active = !dark ? 'true' : 'false';
                    opts[1].dataset.active = dark ? 'true' : 'false';
                }
            });
        }

        function toggleTheme(dark) {
            if (dark) {
                document.documentElement.classList.add('dark');
                localStorage.setItem('theme', 'dark');
            } else {
                document.documentElement.classList.remove('dark');
                localStorage.setItem('theme', 'light');
            }
            syncThemeUI(dark);
        }

        document.addEventListener('DOMContentLoaded', () => {
            syncThemeUI(document.documentElement.classList.contains('dark'));
        });
    </script>

    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&family=JetBrains+Mono:wght@400;500;600&family=Space+Grotesk:wght@500;600;700&display=swap" rel="stylesheet">

    {{-- Asset Bundler Lokal Vite (NPM) tanpa CDN Mentah --}}
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="min-h-screen bg-zinc-50 text-zinc-900 dark:bg-[#0a0a0d] dark:text-zinc-100 font-sans antialiased selection:bg-blue-600/30 selection:text-white flex flex-col transition-colors duration-200">

    {{-- Top Laser Loading Beam --}}
    <div class="fixed top-0 left-0 right-0 h-1 z-50 overflow-hidden bg-zinc-900/40 backdrop-blur-xs pointer-events-none">
        <div class="loading-beam"></div>
    </div>

    <div class="relative flex min-h-screen flex-col">
        {{-- Navbar Statis --}}
        <header class="sticky top-0 z-50 border-b border-zinc-200 dark:border-zinc-800/80 bg-white/90 dark:bg-[#0a0a0d]/90 backdrop-blur-md transition-colors duration-200">
            <nav class="mx-auto flex h-14 max-w-5xl items-center justify-between gap-2 px-4 sm:px-6">
                
                {{-- Logo / Identitas Kampus ITS --}}
                <a class="group flex shrink-0 items-center gap-2 font-mono text-sm font-semibold tracking-tight" href="{{ route('home') }}">
                    <div class="glow-tile !w-8 !h-8 sm:!w-9 sm:!h-9 !rounded-full shrink-0 transition-transform group-hover:scale-105 border border-blue-500/30">
                        <svg class="w-4 h-4 text-blue-500 dark:text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l9-5-9-5-9 5 9 5z"/>
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 14l6.16-3.422a12.083 12.083 0 01.665 6.479A11.952 11.952 0 0112 20.055a11.952 11.952 0 01-6.824-2.998A12.083 12.083 0 015.84 10.578L12 14z"/>
                        </svg>
                    </div>
                    <span class="whitespace-nowrap text-zinc-900 dark:text-white font-display">
                        its<span class="text-blue-600 dark:text-blue-400">.academic</span>
                        <span class="ml-1.5 hidden sm:inline-block rounded bg-zinc-200/70 dark:bg-zinc-800 px-1.5 py-0.5 text-[10px] font-mono text-zinc-600 dark:text-zinc-400">Tugas 4</span>
                    </span>
                </a>

                {{-- Tiga Navigasi Halaman Wajib --}}
                <div class="flex min-w-0 items-center gap-1 sm:gap-2 font-mono text-xs sm:text-sm">
                    <a href="{{ route('home') }}"
                       class="whitespace-nowrap rounded-lg px-2.5 sm:px-3 py-1.5 transition-colors {{ request()->routeIs('home') || request()->routeIs('beranda') ? 'bg-zinc-200 dark:bg-zinc-800 text-zinc-900 dark:text-white font-semibold' : 'text-zinc-600 dark:text-zinc-400 hover:text-zinc-900 dark:hover:text-white' }}">
                        Beranda
                    </a>
                    <a href="{{ route('profile') }}"
                       class="whitespace-nowrap rounded-lg px-2.5 sm:px-3 py-1.5 transition-colors {{ request()->routeIs('profile') ? 'bg-zinc-200 dark:bg-zinc-800 text-zinc-900 dark:text-white font-semibold' : 'text-zinc-600 dark:text-zinc-400 hover:text-zinc-900 dark:hover:text-white' }}">
                        Profil
                    </a>
                    <a href="{{ route('ide-agent') }}"
                       class="whitespace-nowrap rounded-lg px-2.5 sm:px-3 py-1.5 transition-colors {{ request()->routeIs('ide-agent*') ? 'bg-zinc-200 dark:bg-zinc-800 text-zinc-900 dark:text-white font-semibold' : 'text-zinc-600 dark:text-zinc-400 hover:text-zinc-900 dark:hover:text-white' }}">
                        Ide-Riset
                    </a>

                    <div class="flex items-center gap-1 ml-1 sm:ml-2">
                        <span class="hidden sm:inline-block mx-1 h-5 w-px bg-zinc-200 dark:bg-zinc-800" aria-hidden="true"></span>

                        {{-- Neumorphic Theme Switcher --}}
                        <div class="neu-toggle !p-1 scale-90" id="theme-toggle" data-index="1" title="Toggle Mode Terang / Gelap">
                            <div class="neu-toggle__thumb"></div>
                            <button type="button" onclick="toggleTheme(false)" class="neu-toggle__opt !w-8 !h-7" data-active="false" title="Mode Siang" aria-label="Mode Siang">
                                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 3v1m0 16v1m9-9h-1M4 12H3m15.364 6.364l-.707-.707M6.343 6.343l-.707-.707m12.728 0l-.707.707M6.343 17.657l-.707.707M16 12a4 4 0 11-8 0 4 4 0 018 0z"/></svg>
                            </button>
                            <button type="button" onclick="toggleTheme(true)" class="neu-toggle__opt !w-8 !h-7" data-active="true" title="Mode Malam" aria-label="Mode Malam">
                                <svg fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M20.354 15.354A9 9 0 018.646 3.646 9.003 9.003 0 0012 21a9.003 9.003 0 008.354-5.646z"/></svg>
                            </button>
                        </div>
                    </div>
                </div>
            </nav>
        </header>

        {{-- Container Konten Dinamis --}}
        <main id="main" class="flex-1">
            @yield('content')
        </main>

        {{-- Footer ITS Terpadu --}}
        <footer class="mt-24 border-t border-zinc-200 dark:border-zinc-800/80 bg-zinc-100/50 dark:bg-zinc-950/40">
            <div class="mx-auto max-w-5xl px-6 py-14 font-mono text-sm text-zinc-600 dark:text-zinc-400">
                <div class="grid grid-cols-2 gap-x-10 gap-y-10 sm:grid-cols-[1.5fr_1.1fr_0.9fr_0.9fr]">
                    
                    {{-- Kolom 1: Profil Mahasiswa & Identitas Tugas --}}
                    <div class="col-span-2 flex flex-col gap-4 sm:col-span-1">
                        <a href="{{ route('ide-agent') }}" class="group inline-flex w-fit items-center gap-2 rounded-full border border-zinc-300 dark:border-zinc-800 bg-white dark:bg-zinc-900/80 px-3.5 py-1.5 text-xs transition-colors hover:border-blue-500/50">
                            <span class="relative flex size-2">
                                <span class="absolute inline-flex h-full w-full animate-ping rounded-full bg-blue-500 opacity-75"></span>
                                <span class="relative inline-flex size-2 rounded-full bg-blue-500"></span>
                            </span>
                            <span class="text-zinc-800 dark:text-zinc-200">PBKK Tugas 4 &bull; Multi-View System</span>
                            <span class="text-zinc-500 transition-transform group-hover:translate-x-0.5">&rarr;</span>
                        </a>
                        <p class="max-w-[32ch] leading-relaxed text-zinc-600 dark:text-zinc-400/90 text-xs">
                            Aplikasi Multi-View Profil Akademik, Visualisasi Platform Agentic AI, dan Formulir Pengumpulan Ide Terpusat.
                        </p>
                        <div class="text-[11px] text-zinc-500">
                            <span>Mahasiswa: <strong>Farrel Hasudungan Immanuel Limbong</strong></span><br>
                            <span>NRP: <strong>5025241016</strong></span>
                        </div>
                    </div>

                    {{-- Kolom 2: Teknologi & Asset Bundling --}}
                    <div class="flex flex-col gap-3">
                        <p class="text-[11px] uppercase tracking-[0.2em] text-zinc-400 dark:text-zinc-500 font-bold">Teknologi</p>
                        <span class="text-xs text-zinc-700 dark:text-zinc-300">&bull; Laravel 12</span>
                        <span class="text-xs text-zinc-700 dark:text-zinc-300">&bull; Tailwind CSS v4</span>
                        <span class="text-xs text-zinc-700 dark:text-zinc-300">&bull; Vite Local Compiler</span>
                        <span class="text-xs text-zinc-700 dark:text-zinc-300">&bull; Blade Components</span>
                    </div>

                    {{-- Kolom 3: Identitas Resmi ITS --}}
                    <div class="flex flex-col gap-3">
                        <p class="text-[11px] uppercase tracking-[0.2em] text-zinc-400 dark:text-zinc-500 font-bold">ITS Sukolilo</p>
                        <a href="https://www.its.ac.id" target="_blank" rel="noreferrer" class="text-xs text-zinc-600 dark:text-zinc-400 hover:text-zinc-900 dark:hover:text-white transition-colors">Portal ITS &rarr;</a>
                        <a href="https://www.its.ac.id/informatika" target="_blank" rel="noreferrer" class="text-xs text-zinc-600 dark:text-zinc-400 hover:text-zinc-900 dark:hover:text-white transition-colors">Teknik Informatika &rarr;</a>
                        <span class="text-xs text-zinc-500">Kampus ITS Sukolilo, Surabaya</span>
                    </div>

                    {{-- Kolom 4: Navigasi Internal --}}
                    <div class="flex flex-col gap-3">
                        <p class="text-[11px] uppercase tracking-[0.2em] text-zinc-400 dark:text-zinc-500 font-bold">Navigasi</p>
                        <a href="{{ route('home') }}" class="text-xs text-zinc-600 dark:text-zinc-400 hover:text-zinc-900 dark:hover:text-white transition-colors">Beranda (/)</a>
                        <a href="{{ route('profile') }}" class="text-xs text-zinc-600 dark:text-zinc-400 hover:text-zinc-900 dark:hover:text-white transition-colors">Profil Mahasiswa</a>
                        <a href="{{ route('ide-agent') }}" class="text-xs text-zinc-600 dark:text-zinc-400 hover:text-zinc-900 dark:hover:text-white transition-colors">Ide-Riset Agentic AI</a>
                    </div>
                </div>

                {{-- Baris Copyright Bawah --}}
                <div class="mt-12 flex flex-col items-start justify-between gap-4 border-t border-zinc-200 dark:border-zinc-800/60 pt-6 sm:flex-row sm:items-center text-xs">
                    <p>&copy; {{ date('Y') }} Farrel Hasudungan Immanuel Limbong &bull; Pemrograman Berbasis Kerangka Kerja.</p>
                    <div class="flex flex-wrap items-center gap-4 text-zinc-500 dark:text-zinc-400">
                        <span>Departemen Teknik Informatika</span>
                        <span>&bull;</span>
                        <span>FTEIC ITS</span>
                    </div>
                </div>
            </div>
        </footer>
    </div>

</body>
</html>
