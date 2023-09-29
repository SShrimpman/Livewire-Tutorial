<div>
    <div class="container content py-20 mx-auto shadow-2xl">
        <div class="mx-auto" style="max-width:600px;">
            <div id="create-form" class="hover:shadow p-6 bg-white dark:bg-gray-900">
                <div class="flex flex-col">
                    <h2 class="font-bold text-3xl text-center text-gray-800 dark:text-white mb-2">Contact Us</h2>
                    <h2 class="text-center text-gray-300 mb-10">Got a technical issue? Want to send feedback about a beta feature? Need details about our Business plan? Let us know</h2>
                </div>
                <div>
                    {{-- Não esquecer que se não tiver a usar os Forms Objects do Livewire, não esquecer de retirar o o 'form.' do wire:model!!! --}}
                    <form wire:submit='submitForm'>
                        <div class="mb-6">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> Your email </label>
                            <input wire:model="email" type="email" id="email" placeholder="email.." class="bg-gray-300 text-gray-900 text-sm rounded block w-full p-2.5">
                                @error('email')
                                    <span class="text-red-500 text-xs mt-3 block ">{{ $message }}</span>
                                @enderror
                        </div>
                        <div class="mb-6">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> Subject </label>
                            <input wire:model="subject" type="text" id="subject" placeholder="subject.." class="bg-gray-300 text-gray-900 text-sm rounded block w-full p-2.5">
                                @error('subject')
                                    <span class="text-red-500 text-xs mt-3 block ">{{ $message }}</span>
                                @enderror
                        </div>
                        <div class="mb-6">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> Your message </label>
                            <textarea wire:model='message' id="message" rows="6" placeholder="message.."
                             class="block p-2.5 w-full text-sm text-gray-900 bg-gray-300 rounded-lg"></textarea>
                                @error('message')
                                    <span class="text-red-500 text-xs mt-3 block ">{{ $message }}</span>
                                @enderror
                        </div>
                        <div class="mb-6">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> Profile Picture </label>
                            <input multiple wire:model="images" accept="image/png, image/jpeg" type="file" id="image" class="bg-gray-300 text-gray-900 text-sm rounded block w-full p-2.5">
                                @if ($images)
                                    <div class="flex flex-row space-x-2">
                                        @foreach ($images as $image)
                                            <img class="rounded w-10 h-10 mt-5 block" src="{{ $image->temporaryUrl() }}" alt="">
                                        @endforeach
                                    </div>
                                @endif

                                @error('images')
                                    <span class="text-red-500 text-xs mt-3 block ">{{ $message }}</span>
                                @enderror

                                {{-- Este wire:target é para apenas mostrar este html apenas quando o input que recebe a 'imagem' está em loading, 
                                o target também pode funcionar com uma função, por exemplo a função 'create' que tenho no controller/component --}}
                                {{-- <div wire:loading wire:target='image'>
                                    <span class="text-green-500">Uploading...</span>
                                </div> --}}

                                {{-- Este delay faz com que apareça apenas quando está em loading, tenho que ter "sleep()" definido no método do controller/component --}}
                                {{-- <div wire:loading.delay>
                                    <span class="text-green-500">Sending...</span>
                                </div> --}}
                        </div>
                        <button wire:loading.attr='disabled' type="submit" class="px-4 py-2 bg-green-800 text-white font-semibold rounded hover:bg-green-900">Send message</button>
                            @if (session('success'))
                                <span class="text-green-500 text-xs mt-3 block">{{ session('success') }}</span>
                            @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
