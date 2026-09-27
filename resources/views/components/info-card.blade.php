@props([
    'title' => null,
    'value' => null,
    'subtitle' => null,
    'badge' => null,
    'badgeColor' => 'blue', // blue, emerald, amber, purple
    'icon' => null,
    'variant' => 'default', // default, gradient, compact
])

@php
    $badgeClasses = match($badgeColor) {
        'emerald' => 'bg-emerald-500/10 text-emerald-600 dark:text-emerald-400 border-emerald-500/20',
        'amber' => 'bg-amber-500/10 text-amber-600 dark:text-amber-400 border-amber-500/20',
        'purple' => 'bg-purple-500/10 text-purple-600 dark:text-purple-400 border-purple-500/20',
        default => 'bg-blue-500/10 text-blue-600 dark:text-blue-400 border-blue-500/20',
    };
@endphp

<div {{ $attributes->merge(['class' => 'group relative overflow-hidden rounded-2xl border border-zinc-200 dark:border-zinc-800 bg-white dark:bg-zinc-900/70 p-5 sm:p-6 transition-all duration-200 hover:border-blue-500/40 dark:hover:border-blue-500/30 hover:shadow-lg dark:hover:shadow-blue-500/5 shadow-xs']) }}>
    
    {{-- Header: Icon / Title / Badge --}}
    <div class="flex items-start justify-between gap-3">
        <div class="flex items-center gap-3">
            @if ($icon)
                <div class="flex size-10 items-center justify-center rounded-xl bg-blue-500/10 dark:bg-blue-500/20 text-blue-600 dark:text-blue-400 border border-blue-500/20 shrink-0 transition-transform group-hover:scale-105">
                    {!! $icon !!}
                </div>
            @endif

            @if ($title)
                <div>
                    <span class="block font-mono text-[11px] uppercase tracking-wider text-zinc-500 dark:text-zinc-400 font-semibold">
                        {{ $title }}
                    </span>
                    @if (isset($headerSlot))
                        {{ $headerSlot }}
                    @endif
                </div>
            @endif
        </div>

        @if ($badge)
            <span class="inline-flex items-center gap-1 rounded-full border px-2.5 py-0.5 font-mono text-[11px] font-medium {{ $badgeClasses }}">
                <span class="size-1.5 rounded-full bg-current"></span>
                {{ $badge }}
            </span>
        @endif
    </div>

    {{-- Value / Metric --}}
    @if ($value)
        <div class="mt-3">
            <h4 class="text-xl sm:text-2xl font-bold tracking-tight text-zinc-900 dark:text-white font-display">
                {{ $value }}
            </h4>
        </div>
    @endif

    {{-- Slot Content --}}
    @if ($slot->isNotEmpty())
        <div class="mt-3 text-sm text-zinc-600 dark:text-zinc-400 leading-relaxed">
            {{ $slot }}
        </div>
    @endif

    {{-- Subtitle / Footer meta --}}
    @if ($subtitle)
        <div class="mt-3 pt-3 border-t border-zinc-100 dark:border-zinc-800/80 flex items-center justify-between font-mono text-xs text-zinc-500 dark:text-zinc-400">
            <span>{{ $subtitle }}</span>
            @if (isset($footerAction))
                {{ $footerAction }}
            @endif
        </div>
    @endif

    {{-- Subtle bottom glow accent --}}
    <div class="absolute inset-x-0 bottom-0 h-0.5 bg-gradient-to-r from-transparent via-blue-500/30 to-transparent opacity-0 transition-opacity duration-300 group-hover:opacity-100"></div>
</div>
