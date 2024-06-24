<div class="space-y-2">
    @if ($singleImage)
        <div class="max-w-40">
            <img src="{{ $singleImage->temporaryUrl() }}"
                class="object-cover border border-dashed rounded aspect-square border-slate-400" alt="">
        </div>
    @else
        @if ($imageUrl)
            <div class="max-w-40">
                <img src="{{ $imageUrl ? Storage::url($imageUrl) : $this->base64Image }}"
                    class="object-cover border border-dashed rounded aspect-square border-slate-400" alt="">
            </div>
        @endif
    @endif

    <label for="singleImage"
        class="block w-40 py-2 text-sm text-center transition-all border border-dashed rounded cursor-pointer dark:hover:bg-slate-600 hover:bg-slate-200 border-slate-600 dark:border-slate-300">
        @if ($singleImage)
            更換圖片
        @else
            點擊上傳圖片
        @endif
        <input id="singleImage" type="file" wire:model="singleImage" class="hidden">
    </label>
</div>
