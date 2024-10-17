<div class="card bg-primary">
    <div class="card-body">
        <img src="{{ asset('icon/' . $icon) }}" class="w-7" alt="haha">
        <h2 class="card-title">{{ $count }}</h2>
        <div class="flex justify-between">
            <span>{{ $label }}</span>
            @if ($persen >= 0)
                <span class="text-green-500">
                    {{ $persen }}%<img src="/icon/arrow-up.svg" class="inline-block w-4">
                </span>
            @else
                <span class="text-red-500">
                    {{ $persen }}%<img src="/icon/arrow-down.svg" class="inline-block w-4">
                </span>
            @endif
        </div>
    </div>
</div>
