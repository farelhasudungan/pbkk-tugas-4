@props([
    'type' => 'info', // info, success, warning, purple
    'title' => null,
    'dismissible' => false,
])

@php
    $typeConfig = match($type) {
        'success' => [
            'container' => 'border-emerald-500/30 bg-emerald-50/80 dark:bg-emerald-950/20 text-emerald-900 dark:text-emerald-200',
            'badge' => 'bg-emerald-500/20 text-emerald-700 dark:text-emerald-300 border-emerald-500/30',
            'titleColor' => 'text-emerald-900 dark:text-emerald-200',
            'iconBg' => 'bg-emerald-500/20 text-emerald-600 dark:text-emerald-400',
            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12l2 2 4-4m6 2a9 9 0 11-18 0 9 9 0 0118 0z" />',
        ],
        'warning' => [
            'container' => 'border-amber-500/30 bg-amber-50/80 dark:bg-amber-950/20 text-amber-900 dark:text-amber-200',
            'badge' => 'bg-amber-500/20 text-amber-700 dark:text-amber-300 border-amber-500/30',
            'titleColor' => 'text-amber-900 dark:text-amber-200',
            'iconBg' => 'bg-amber-500/20 text-amber-600 dark:text-amber-400',
            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 9v2m0 4h.01m-6.938 4h13.856c1.54 0 2.502-1.667 1.732-3L13.732 4c-.77-1.333-2.694-1.333-3.464 0L3.34 16c-.77 1.333.192 3 1.732 3z" />',
        ],
        'purple' => [
            'container' => 'border-purple-500/30 bg-purple-50/80 dark:bg-purple-950/20 text-purple-900 dark:text-purple-200',
            'badge' => 'bg-purple-500/20 text-purple-700 dark:text-purple-300 border-purple-500/30',
            'titleColor' => 'text-purple-900 dark:text-purple-200',
            'iconBg' => 'bg-purple-500/20 text-purple-600 dark:text-purple-400',
            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 10V3L4 14h7v7l9-11h-7z" />',
        ],
        default => [ // info
            'container' => 'border-blue-500/30 bg-blue-50/80 dark:bg-blue-950/25 text-blue-950 dark:text-blue-200',
            'badge' => 'bg-blue-500/20 text-blue-700 dark:text-blue-300 border-blue-500/30',
            'titleColor' => 'text-blue-950 dark:text-blue-200',
            'iconBg' => 'bg-blue-500/20 text-blue-600 dark:text-blue-400',
            'icon' => '<path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 16h-1v-4h-1m1-4h.01M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />',
        ],
    };
@endphp

<div {{ $attributes->merge(['class' => 'relative overflow-hidden rounded-2xl border p-4 sm:p-5 transition-all shadow-xs ' . $typeConfig['container']]) }} role="alert">
    <div class="flex items-start gap-3.5">
        {{-- Icon --}}
        <div class="flex size-9 shrink-0 items-center justify-center rounded-xl {{ $typeConfig['iconBg'] }} border border-current/20">
            <svg class="size-5" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                {!! $typeConfig['icon'] !!}
            </svg>
        </div>

        {{-- Content Area --}}
        <div class="flex-1 min-w-0">
            @if ($title)
                <div class="flex flex-wrap items-center gap-2 mb-1">
                    <h5 class="text-sm font-bold font-display {{ $typeConfig['titleColor'] }}">
                        {{ $title }}
                    </h5>
                    <span class="inline-flex items-center gap-1 rounded-full border px-2 py-0.5 font-mono text-[10px] font-semibold uppercase {{ $typeConfig['badge'] }}">
                        <span class="size-1 rounded-full bg-current animate-pulse"></span>
                        {{ $type }}
                    </span>
                </div>
            @endif

            <div class="text-xs sm:text-sm leading-relaxed opacity-95">
                {{ $slot }}
            </div>

            @if (isset($action))
                <div class="mt-3">
                    {{ $action }}
                </div>
            @endif
        </div>

        {{-- Optional Dismiss button (JS client toggle) --}}
        @if ($dismissible)
            <button type="button" 
                    onclick="this.closest('[role=alert]').style.display='none'"
                    class="shrink-0 rounded-lg p-1 text-current opacity-60 hover:opacity-100 transition-opacity focus:outline-hidden"
                    title="Tutup Notifikasi"
                    aria-label="Tutup Notifikasi">
                <svg class="size-4" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M6 18L18 6M6 6l12 12" />
                </svg>
            </button>
        @endif
    </div>
</div>
