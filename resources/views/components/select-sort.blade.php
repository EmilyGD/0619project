<div x-data="{ open: false }">
    <div class="text-xs">
        <button class="p-2 tracking-widest border rounded dark:border-zinc-600 hover:bg-amber-400 dark:hover:text-black"
            x-on:click="open = !open">
            {{ $orderBy['name'] }}
        </button>

        <div x-show="open" class="fixed inset-0 backdrop-blur">
            <div class="fixed inset-0 bg-zinc-800 opacity-60" x-on:click="open = false">
            </div>
            <div class="absolute bottom-0 flex items-center w-full ">
                <div class="w-full py-10 bg-white dark:bg-black">
                    <div class="w-full max-w-screen-xl mx-auto">
                        @foreach ($orderByItems as $key => $item)
                            <button type="button" wire:click="$set('orderByItemKey', '{{ $key }}');"
                                x-on:click="open = false"
                                class="w-full p-6 my-2 text-xl hover:bg-amber-400 dark:hover:text-black text-start">
                                <div>{{ $item['name'] }}</div>
                            </button>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
