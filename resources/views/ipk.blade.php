@extends('layouts.app')

@section('title', 'Kalkulator Portofolio Akademis IPK')

@section('content')
<div class="relative">

    <!-- Header Section -->
    <section class="mx-auto max-w-5xl px-6 pt-12 pb-6 sm:pt-16">
        <div class="mb-4 flex flex-wrap items-center gap-3">
            <div class="inline-flex items-center gap-2 rounded-full border border-emerald-500/30 bg-emerald-500/10 px-3 py-1 font-mono text-xs font-medium text-emerald-600 dark:text-emerald-400">
                <span class="size-2 rounded-full bg-emerald-500"></span>
                <span>GET /hitung-ipk/{{ number_format($ip1, 2) }}/{{ number_format($ip2, 2) }}</span>
            </div>
            <span class="font-mono text-xs text-zinc-500 dark:text-zinc-400 bg-zinc-200/60 dark:bg-zinc-800/60 px-2.5 py-0.5 rounded-full border border-zinc-300 dark:border-zinc-700">
                Tantangan 2: Kalkulator Portofolio Akademis
            </span>
        </div>

        <h1 class="text-3xl font-semibold leading-[1.08] tracking-tight text-zinc-900 dark:text-white sm:text-4xl lg:text-5xl font-display">
            Kalkulator <span class="gradient-text font-bold">Portofolio Akademis</span>
        </h1>

        <p class="mt-4 max-w-3xl text-base sm:text-lg text-zinc-600 dark:text-zinc-400 leading-relaxed">
            Perhitungan otomatis nilai Indeks Prestasi (IP) mahasiswa dalam dua semester studi di ITS. Sistem menjumlahkan total capaian dan mengkalkulasi nilai rata-rata IPK secara dinamis melalui parameter rute Laravel.
        </p>
    </section>

    <!-- 4 Main Metric Cards -->
    <section class="mx-auto max-w-5xl px-6 py-6">
        <div class="grid gap-5 sm:grid-cols-2 lg:grid-cols-4">
            
            <!-- IP Semester 1 -->
            <div class="rounded-2xl border border-zinc-200 dark:border-zinc-800 bg-white dark:bg-zinc-900/70 p-6 shadow-xs dark:shadow-none">
                <div class="flex items-center justify-between mb-4">
                    <span class="font-mono text-xs text-zinc-500">Semester 1</span>
                    <div class="glow-tile !w-8 !h-8 !rounded-lg border border-blue-500/30 shrink-0">
                        <span class="font-mono text-xs font-bold text-blue-500">01</span>
                    </div>
                </div>
                <p class="text-3xl font-bold font-mono text-zinc-900 dark:text-white">{{ number_format($ip1, 2) }}</p>
                <p class="mt-2 text-xs text-zinc-500 font-mono">Skala Indeks Maks: 4.00</p>
            </div>

            <!-- IP Semester 2 -->
            <div class="rounded-2xl border border-zinc-200 dark:border-zinc-800 bg-white dark:bg-zinc-900/70 p-6 shadow-xs dark:shadow-none">
                <div class="flex items-center justify-between mb-4">
                    <span class="font-mono text-xs text-zinc-500">Semester 2</span>
                    <div class="glow-tile !w-8 !h-8 !rounded-lg border border-purple-500/30 shrink-0" style="--glow-color: #a855f7">
                        <span class="font-mono text-xs font-bold text-purple-500">02</span>
                    </div>
                </div>
                <p class="text-3xl font-bold font-mono text-zinc-900 dark:text-white">{{ number_format($ip2, 2) }}</p>
                <p class="mt-2 text-xs text-zinc-500 font-mono">Skala Indeks Maks: 4.00</p>
            </div>

            <!-- Total IP -->
            <div class="rounded-2xl border border-zinc-200 dark:border-zinc-800 bg-white dark:bg-zinc-900/70 p-6 shadow-xs dark:shadow-none">
                <div class="flex items-center justify-between mb-4">
                    <span class="font-mono text-xs text-zinc-500">Total Akumulasi</span>
                    <div class="glow-tile !w-8 !h-8 !rounded-lg border border-amber-500/30 shrink-0" style="--glow-color: #f59e0b">
                        <span class="font-mono text-xs font-bold text-amber-500">&sum;</span>
                    </div>
                </div>
                <p class="text-3xl font-bold font-mono text-amber-500">{{ number_format($total, 2) }}</p>
                <p class="mt-2 text-xs text-zinc-500 font-mono">Rumus: IP1 + IP2</p>
            </div>

            <!-- Rata-rata IPK -->
            <div class="rounded-2xl border border-emerald-500/30 bg-emerald-50/30 dark:bg-emerald-950/20 p-6 shadow-xs dark:shadow-none">
                <div class="flex items-center justify-between mb-4">
                    <span class="font-mono text-xs text-emerald-600 dark:text-emerald-400 font-semibold">Rata-rata IPK</span>
                    <div class="glow-tile !w-8 !h-8 !rounded-lg border border-emerald-500/30 shrink-0" style="--glow-color: #10b981">
                        <span class="font-mono text-xs font-bold text-emerald-500">&mu;</span>
                    </div>
                </div>
                <p class="text-3xl font-bold font-mono text-emerald-600 dark:text-emerald-400">{{ number_format($average, 2) }}</p>
                <p class="mt-2 text-xs text-zinc-500 font-mono">Rumus: (IP1 + IP2) / 2</p>
            </div>

        </div>
    </section>

    <!-- Academic Evaluation & Performance Meter -->
    <section class="mx-auto max-w-5xl px-6 py-6">
        <div class="rounded-2xl border border-zinc-200 dark:border-zinc-800 bg-white dark:bg-zinc-900/70 p-6 sm:p-8 shadow-xs dark:shadow-none">
            <div class="flex flex-col md:flex-row md:items-center justify-between gap-6 pb-6 border-b border-zinc-100 dark:border-zinc-800">
                <div>
                    <span class="font-mono text-xs text-zinc-500 uppercase tracking-wider font-semibold">Evaluasi Capaian Akademik</span>
                    <h2 class="text-2xl font-bold text-zinc-900 dark:text-white mt-1">
                        Predikat: <span class="gradient-text font-bold">{{ $predicate }}</span>
                    </h2>
                    <p class="text-xs text-zinc-500 dark:text-zinc-400 font-mono mt-1">
                        Hasil evaluasi studi dua semester untuk mahasiswa Teknik Informatika ITS.
                    </p>
                </div>

                <div class="flex items-center gap-3">
                    <div class="text-right font-mono text-xs">
                        <span class="text-zinc-500">Indeks Prestasi Kumulatif:</span>
                        <p class="text-xl font-bold text-emerald-500">{{ number_format($average, 2) }} / 4.00</p>
                    </div>
                </div>
            </div>

            <!-- Visual Progress Bar -->
            <div class="mt-6">
                <div class="flex justify-between font-mono text-xs text-zinc-500 mb-2">
                    <span>Progres Indeks Maksimum (0.00 &rarr; 4.00)</span>
                    <span class="font-bold text-emerald-600 dark:text-emerald-400">{{ number_format(($average / 4.0) * 100, 1) }}%</span>
                </div>
                <div class="h-3 w-full rounded-full bg-zinc-200 dark:bg-zinc-800 overflow-hidden">
                    <div class="h-full rounded-full bg-gradient-to-r from-blue-500 via-purple-500 to-emerald-500 transition-all duration-500"
                         style="width: {{ min(100, max(0, ($average / 4.0) * 100)) }}%;"></div>
                </div>
            </div>
        </div>
    </section>

    <!-- Interactive Calculator & Presets -->
    <section class="mx-auto max-w-5xl px-6 py-6 pb-24">
        <div class="grid gap-6 md:grid-cols-2">

            <!-- Presets Testing -->
            <div class="rounded-xl border border-zinc-200 dark:border-zinc-800 bg-white dark:bg-zinc-900/60 p-6">
                <div class="flex items-center gap-2 mb-4">
                    <div class="glow-tile !w-8 !h-8 !rounded-lg border border-blue-500/30 shrink-0">
                        <svg class="w-4 h-4 text-blue-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z"/></svg>
                    </div>
                    <h3 class="text-base font-bold text-zinc-900 dark:text-white">Preset Uji Coba Cepat</h3>
                </div>
                <p class="text-xs text-zinc-600 dark:text-zinc-400 leading-relaxed mb-4">
                    Pilih kombinasi nilai IP semester untuk langsung menguji fungsi rute kalkulator otomatis:
                </p>

                <div class="grid gap-2 font-mono text-xs">
                    <a href="{{ route('ipk.calculate', ['ip1' => '3.75', 'ip2' => '3.90']) }}" 
                       class="flex items-center justify-between rounded-lg border border-zinc-200 dark:border-zinc-800 p-2.5 hover:border-emerald-500/50 hover:bg-zinc-50 dark:hover:bg-zinc-800/50 transition-colors">
                        <span>&bull; IP1: 3.75 &bull; IP2: 3.90</span>
                        <span class="text-emerald-600 dark:text-emerald-400 font-bold">Rata-rata: 3.83 &rarr;</span>
                    </a>
                    <a href="{{ route('ipk.calculate', ['ip1' => '3.50', 'ip2' => '4.00']) }}" 
                       class="flex items-center justify-between rounded-lg border border-zinc-200 dark:border-zinc-800 p-2.5 hover:border-emerald-500/50 hover:bg-zinc-50 dark:hover:bg-zinc-800/50 transition-colors">
                        <span>&bull; IP1: 3.50 &bull; IP2: 4.00</span>
                        <span class="text-emerald-600 dark:text-emerald-400 font-bold">Rata-rata: 3.75 &rarr;</span>
                    </a>
                    <a href="{{ route('ipk.calculate', ['ip1' => '3.80', 'ip2' => '3.95']) }}" 
                       class="flex items-center justify-between rounded-lg border border-zinc-200 dark:border-zinc-800 p-2.5 hover:border-emerald-500/50 hover:bg-zinc-50 dark:hover:bg-zinc-800/50 transition-colors">
                        <span>&bull; IP1: 3.80 &bull; IP2: 3.95</span>
                        <span class="text-emerald-600 dark:text-emerald-400 font-bold">Rata-rata: 3.88 &rarr;</span>
                    </a>
                    <a href="{{ route('ipk.calculate', ['ip1' => '4.00', 'ip2' => '4.00']) }}" 
                       class="flex items-center justify-between rounded-lg border border-zinc-200 dark:border-zinc-800 p-2.5 hover:border-emerald-500/50 hover:bg-zinc-50 dark:hover:bg-zinc-800/50 transition-colors">
                        <span>&bull; IP1: 4.00 &bull; IP2: 4.00</span>
                        <span class="text-emerald-600 dark:text-emerald-400 font-bold">Sempurna: 4.00 &rarr;</span>
                    </a>
                </div>
            </div>

            <!-- Custom Calculator Input -->
            <div class="rounded-xl border border-zinc-200 dark:border-zinc-800 bg-white dark:bg-zinc-900/60 p-6 flex flex-col justify-between">
                <div>
                    <div class="flex items-center gap-2 mb-4">
                        <div class="glow-tile !w-8 !h-8 !rounded-lg border border-emerald-500/30 shrink-0" style="--glow-color: #10b981">
                            <svg class="w-4 h-4 text-emerald-500" fill="none" viewBox="0 0 24 24" stroke="currentColor"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 7h6m0 10v-3m-3 3h.01M9 17h.01M9 14h.01M12 14h.01M15 11h.01M12 11h.01M9 11h.01M7 21h10a2 2 0 002-2V5a2 2 0 00-2-2H7a2 2 0 00-2 2v14a2 2 0 002 2z"/></svg>
                        </div>
                        <h3 class="text-base font-bold text-zinc-900 dark:text-white">Input Nilai Kustom</h3>
                    </div>
                    <p class="text-xs text-zinc-600 dark:text-zinc-400 leading-relaxed mb-4">
                        Masukkan nilai IP Anda (skala 0.00 hingga 4.00) untuk diarahkan secara otomatis ke rute kalkulator dinamis:
                    </p>

                    <div class="grid gap-3 sm:grid-cols-2">
                        <div>
                            <label for="inputIp1" class="block font-mono text-xs text-zinc-500 mb-1">IP Semester 1</label>
                            <input type="number" id="inputIp1" min="0" max="4" step="0.01" value="{{ $ip1 }}"
                                   class="w-full rounded-lg border border-zinc-300 dark:border-zinc-700 bg-zinc-50 dark:bg-zinc-950 p-2.5 font-mono text-sm text-zinc-900 dark:text-white focus:border-blue-500 focus:outline-none">
                        </div>
                        <div>
                            <label for="inputIp2" class="block font-mono text-xs text-zinc-500 mb-1">IP Semester 2</label>
                            <input type="number" id="inputIp2" min="0" max="4" step="0.01" value="{{ $ip2 }}"
                                   class="w-full rounded-lg border border-zinc-300 dark:border-zinc-700 bg-zinc-50 dark:bg-zinc-950 p-2.5 font-mono text-sm text-zinc-900 dark:text-white focus:border-blue-500 focus:outline-none">
                        </div>
                    </div>
                </div>

                <div class="mt-6">
                    <button type="button" onclick="calculateCustomGpa()"
                            class="btn-primary-gloss w-full">
                        <span>Hitung Nilai Rata-rata &rarr;</span>
                    </button>
                </div>
            </div>

        </div>
    </section>

</div>

<script>
    function calculateCustomGpa() {
        const ip1 = parseFloat(document.getElementById('inputIp1').value) || 0;
        const ip2 = parseFloat(document.getElementById('inputIp2').value) || 0;
        const formattedIp1 = ip1.toFixed(2);
        const formattedIp2 = ip2.toFixed(2);
        window.location.href = `/hitung-ipk/${formattedIp1}/${formattedIp2}`;
    }
</script>
@endsection
