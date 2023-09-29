@props(['name', 'title'])
<div
 x-data="{ visible: false, name : '{{ $name }}' }"
 x-show="visible"
 x-on:open-modal.window="visible = ($event.detail.name === name)" 
 x-on:close-modal.window="visible = false" 
 x-on:keydown.escape.window = "visible = false"
 class="fixed z-50 inset-0"
 x-transition>

    {{-- Gray Background --}}
    <div @click="visible = false" class="fixed inset-0 bg-gray-600 opacity-40"></div>

    {{-- Modal Body --}}
    {{-- <div class="bg-gray-900 rounded m-auto fixed inset-0 max-w-2xl max-h-[500px]"> --}}
    <div class="bg-gray-900 rounded m-auto fixed inset-0 max-w-2xl overflow-y-auto max-h-[500px]">
        @if (isset($title))
            <div class="px-4 py-3 flex items-center justify-between">
                <div class="text-xl text-white">{{ $title }}</div>
                <button @click="$dispatch('close-modal')" class="fill-white">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-6 h-6" height="1em" viewBox="0 0 384 512">
                        <path d="M342.6 150.6c12.5-12.5 12.5-32.8 0-45.3s-32.8-12.5-45.3 0L192 210.7 86.6 105.4c-12.5-12.5-32.8-12.5-45.3 0s-12.5 32.8 0 45.3L146.7 256 41.4 361.4c-12.5 12.5-12.5 32.8 0 45.3s32.8 12.5 45.3 0L192 301.3 297.4 406.6c12.5 12.5 32.8 12.5 45.3 0s12.5-32.8 0-45.3L237.3 256 342.6 150.6z"/>
                    </svg>
                </button>
            </div>
        @endif
        <div class="p-4">
            {{ $body }}
        </div>
    </div>
</div>