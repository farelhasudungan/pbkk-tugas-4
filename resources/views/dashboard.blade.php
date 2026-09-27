@extends('layouts.app')

@section('title', 'Dashboard Akademis Mahasiswa')

@section('content')
<div class="relative">

    <!-- Header Section -->
    <section class="mx-auto max-w-5xl px-6 pt-12 pb-6 sm:pt-16">
        <div class="mb-4 flex flex-wrap items-center gap-3">
            <div class="inline-flex items-center gap-2 rounded-full border border-blue-500/30 bg-blue-500/10 px-3 py-1 font-mono text-xs font-medium text-blue-600 dark:text-blue-400">
                <span class="size-2 rounded-full bg-blue-500"></span>
                <span>Route::prefix('dashboard')->name('dashboard.')</span>
            </div>
            <span class="font-mono text-xs text-amber-600 dark:text-amber-400 bg-amber-500/10 border border-amber-500/20 px-2.5 py-0.5 rounded-full">
                Tantangan 3: Grouping & Prefix
            </span>
        </div>

        <h1 class="text-3xl font-semibold leading-[1.08] tracking-tight text-zinc-900 dark:text-white sm:text-4xl lg:text-5xl font-display">
            Dashboard <span class="gradient-text font-bold">Pusat Kendali Akademis</span>
        </h1>

        <p class="mt-4 max-w-3xl text-base sm:text-lg text-zinc-600 dark:text-zinc-400 leading-relaxed">
            Pusat pemetaan terstruktur seluruh modul aplikasi akademis milik <span class="font-semibold text-zinc-900 dark:text-white">{{ $profile['name'] }}</span> (NRP: <code class="rounded bg-blue-100 dark:bg-blue-900/40 px-1.5 py-0.5 font-mono text-xs font-bold text-blue-700 dark:text-blue-300">{{ $profile['nrp'] }}</code>). Seluruh rute akademis diorganisasikan di bawah pengelompokan prefix <code class="font-mono text-xs text-blue-600 dark:text-blue-400 font-bold">/dashboard</code> dengan penamaan named route berjenjang.
        </p>
    </section>

    <!-- 3 Grouped Module Cards -->
    <section class="mx-auto max-w-5xl px-6 py-6">
        <div class="grid gap-6 md:grid-cols-3">

            <!-- Card 1: Dashboard Mahasiswa -->
            <div class="group rounded-2xl border border-zinc-200 dark:border-zinc-800 bg-white dark:bg-zinc-900/70 p-6 shadow-xs dark:shadow-none transition-all duration-200 hover:border-blue-500/50 dark:hover:bg-zinc-900 flex flex-col justify-between">
                <div>
                    <div class="flex items-center justify-between mb-4">
                        <div class="glow-tile !w-12 !h-12 !rounded-xl border border-blue-500/30 shrink-0">
                            <svg class="w-6 h-6 text-blue-500 dark:text-blue-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
                            </svg>
                        </div>
                        <span class="font-mono text-[10px] text-blue-600 dark:text-blue-400 bg-blue-500/10 border border-blue-500/20 px-2 py-0.5 rounded-full">
                            Prefix /dashboard
                        </span>
                    </div>

                    <h2 class="text-lg font-bold text-zinc-900 dark:text-white group-hover:text-blue-500 dark:group-hover:text-blue-400 transition-colors">
                        Profil Mahasiswa
                    </h2>
                    <p class="mt-2 text-xs leading-relaxed text-zinc-600 dark:text-zinc-400">
                        Akses data mahasiswa melalui prefix: <code class="font-mono text-blue-600 dark:text-blue-400">/dashboard/mahasiswa/{nrp}</code> dengan proteksi regex 10 digit.
                    </p>
                </div>

                <div class="mt-6 pt-4 border-t border-zinc-100 dark:border-zinc-800">
                    <a href="{{ route('dashboard.mahasiswa', ['nrp' => $profile['nrp']]) }}" 
                       class="inline-flex items-center gap-1 font-mono text-xs font-semibold text-blue-600 dark:text-blue-400 group-hover:underline">
                        <span>Buka Profil Mahasiswa</span>
                        <span class="group-hover:translate-x-0.5 transition-transform">&rarr;</span>
                    </a>
                </div>
            </div>

            <!-- Card 2: Dashboard Agentic AI -->
            <div class="group rounded-2xl border border-zinc-200 dark:border-zinc-800 bg-white dark:bg-zinc-900/70 p-6 shadow-xs dark:shadow-none transition-all duration-200 hover:border-purple-500/50 dark:hover:bg-zinc-900 flex flex-col justify-between">
                <div>
                    <div class="flex items-center justify-between mb-4">
                        <div class="glow-tile !w-12 !h-12 !rounded-xl border border-purple-500/30 shrink-0" style="--glow-color: #a855f7">
                            <svg class="w-6 h-6 text-purple-500 dark:text-purple-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M13 10V3L4 14h7v7l9-11h-7z"/>
                            </svg>
                        </div>
                        <span class="font-mono text-[10px] text-purple-600 dark:text-purple-400 bg-purple-500/10 border border-purple-500/20 px-2 py-0.5 rounded-full">
                            Prefix /dashboard
                        </span>
                    </div>

                    <h2 class="text-lg font-bold text-zinc-900 dark:text-white group-hover:text-purple-500 dark:group-hover:text-purple-400 transition-colors">
                        Platform Agentic AI
                    </h2>
                    <p class="mt-2 text-xs leading-relaxed text-zinc-600 dark:text-zinc-400">
                        Platform <span class="font-semibold text-purple-600 dark:text-purple-400">Recruiting & Hiring Agents</span>: otomatisasi screening CV/form, ranking AI, dan auto-dispatch email lolos/tolak melalui <code class="font-mono text-purple-600 dark:text-purple-400">/dashboard/agent/{tema?}</code>.
                    </p>
                </div>

                <div class="mt-6 pt-4 border-t border-zinc-100 dark:border-zinc-800">
                    <a href="{{ route('dashboard.agent') }}" 
                       class="inline-flex items-center gap-1 font-mono text-xs font-semibold text-purple-600 dark:text-purple-400 group-hover:underline">
                        <span>Buka Platform Agent</span>
                        <span class="group-hover:translate-x-0.5 transition-transform">&rarr;</span>
                    </a>
                </div>
            </div>

            <!-- Card 3: Dashboard Kalkulator IPK -->
            <div class="group rounded-2xl border border-zinc-200 dark:border-zinc-800 bg-white dark:bg-zinc-900/70 p-6 shadow-xs dark:shadow-none transition-all duration-200 hover:border-emerald-500/50 dark:hover:bg-zinc-900 flex flex-col justify-between">
                <div>
                    <div class="flex items-center justify-between mb-4">
                        <div class="glow-tile !w-12 !h-12 !rounded-xl border border-emerald-500/30 shrink-0" style="--glow-color: #10b981">
                            <svg class="w-6 h-6 text-emerald-500 dark:text-emerald-400" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="1.5" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"/>
                            </svg>
                        </div>
                        <span class="font-mono text-[10px] text-emerald-600 dark:text-emerald-400 bg-emerald-500/10 border border-emerald-500/20 px-2 py-0.5 rounded-full">
                            Prefix /dashboard
                        </span>
                    </div>

                    <h2 class="text-lg font-bold text-zinc-900 dark:text-white group-hover:text-emerald-500 dark:group-hover:text-emerald-400 transition-colors">
                        Kalkulator IPK
                    </h2>
                    <p class="mt-2 text-xs leading-relaxed text-zinc-600 dark:text-zinc-400">
                        Kalkulasi IP dua semester melalui prefix <code class="font-mono text-emerald-600 dark:text-emerald-400">/dashboard/hitung-ipk/{ip1}/{ip2}</code>.
                    </p>
                </div>

                <div class="mt-6 pt-4 border-t border-zinc-100 dark:border-zinc-800">
                    <a href="{{ route('dashboard.ipk', ['ip1' => '3.75', 'ip2' => '3.90']) }}" 
                       class="inline-flex items-center gap-1 font-mono text-xs font-semibold text-emerald-600 dark:text-emerald-400 group-hover:underline">
                        <span>Hitung IPK (3.75 & 3.90)</span>
                        <span class="group-hover:translate-x-0.5 transition-transform">&rarr;</span>
                    </a>
                </div>
            </div>

        </div>
    </section>

    <!-- Structured Routing Matrix Table -->
    <section class="mx-auto max-w-5xl px-6 py-6 pb-24">
        <div class="rounded-xl border border-zinc-200 dark:border-zinc-800 bg-white dark:bg-zinc-900/60 p-6">
            <div class="mb-4 flex items-center justify-between">
                <div>
                    <h2 class="text-lg font-bold text-zinc-900 dark:text-white font-display">Tabel Arsitektur Pemetaan Rute</h2>
                    <p class="text-xs text-zinc-500 font-mono mt-0.5">Struktur Rute Prefix /dashboard vs Rute Root</p>
                </div>
                <span class="tag-pill">4 Rute Prefix</span>
            </div>

            <div class="overflow-x-auto">
                <table class="w-full text-left border-collapse text-xs">
                    <thead>
                        <tr class="border-b border-zinc-200 dark:border-zinc-800 bg-zinc-50 dark:bg-zinc-950/60 font-mono text-[11px] text-zinc-500 uppercase tracking-wider">
                            <th class="py-3 px-4">Prefix URI</th>
                            <th class="py-3 px-4">Named Route</th>
                            <th class="py-3 px-4">Method & Controller</th>
                            <th class="py-3 px-4">Validasi Parameter</th>
                        </tr>
                    </thead>
                    <tbody class="divide-y divide-zinc-100 dark:divide-zinc-800 font-mono text-xs">
                        <tr class="hover:bg-zinc-50/50 dark:hover:bg-zinc-800/30">
                            <td class="py-3 px-4 font-semibold text-blue-600 dark:text-blue-400">/dashboard</td>
                            <td class="py-3 px-4">dashboard.index</td>
                            <td class="py-3 px-4 text-zinc-600 dark:text-zinc-300">GET AcademicProfileController@dashboard</td>
                            <td class="py-3 px-4 text-zinc-500">-</td>
                        </tr>
                        <tr class="hover:bg-zinc-50/50 dark:hover:bg-zinc-800/30">
                            <td class="py-3 px-4 font-semibold text-blue-600 dark:text-blue-400">/dashboard/mahasiswa/{nrp}</td>
                            <td class="py-3 px-4">dashboard.mahasiswa</td>
                            <td class="py-3 px-4 text-zinc-600 dark:text-zinc-300">GET AcademicProfileController@profile</td>
                            <td class="py-3 px-4 text-emerald-600 dark:text-emerald-400 font-bold">Regex: [0-9]{10}</td>
                        </tr>
                        <tr class="hover:bg-zinc-50/50 dark:hover:bg-zinc-800/30">
                            <td class="py-3 px-4 font-semibold text-purple-600 dark:text-purple-400">/dashboard/agent/{tema?}</td>
                            <td class="py-3 px-4">dashboard.agent</td>
                            <td class="py-3 px-4 text-zinc-600 dark:text-zinc-300">GET AcademicProfileController@agent</td>
                            <td class="py-3 px-4 text-zinc-500">Optional (Default Fallback)</td>
                        </tr>
                        <tr class="hover:bg-zinc-50/50 dark:hover:bg-zinc-800/30">
                            <td class="py-3 px-4 font-semibold text-emerald-600 dark:text-emerald-400">/dashboard/hitung-ipk/{ip1}/{ip2}</td>
                            <td class="py-3 px-4">dashboard.ipk</td>
                            <td class="py-3 px-4 text-zinc-600 dark:text-zinc-300">GET AcademicProfileController@calculateGpa</td>
                            <td class="py-3 px-4 text-emerald-600 dark:text-emerald-400 font-bold">Float range 0.00 - 4.00</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </section>

</div>
@endsection
