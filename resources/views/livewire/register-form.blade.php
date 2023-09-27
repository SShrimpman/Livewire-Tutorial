<div>
    <div class="container content py-6 mx-auto shadow-2xl">
        <div class="mx-auto">
            <div id="create-form" class="hover:shadow p-6 bg-white dark:bg-gray-900 border-blue-500 border-t-2">
                <div class="flex ">
                    <h2 class="font-bold text-lg text-gray-800 dark:text-white mb-5">Create New Account</h2>
                </div>
                <div>
                    <form wire:submit='create'>
                        <div class="mb-6">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> Name </label>
                            <input wire:model="name" type="text" id="name" placeholder="name.." class="bg-gray-300 text-gray-900 text-sm rounded block w-full p-2.5">
                                @error('name')
                                    <span class="text-red-500 text-xs mt-3 block ">{{ $message }}</span>
                                @enderror
                        </div>
                        <div class="mb-6">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> Email </label>
                            <input wire:model="email" type="email" id="email" placeholder="email.." class="bg-gray-300 text-gray-900 text-sm rounded block w-full p-2.5">
                                @error('email')
                                    <span class="text-red-500 text-xs mt-3 block ">{{ $message }}</span>
                                @enderror
                        </div>
                        <div class="mb-6">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> Password </label>
                            <input wire:model="password" type="password" id="password" placeholder="password.." class="bg-gray-300 text-gray-900 text-sm rounded block w-full p-2.5">
                                @error('password')
                                    <span class="text-red-500 text-xs mt-3 block ">{{ $message }}</span>
                                @enderror
                        </div>
                        <div class="mb-6">
                            <label class="block mb-2 text-sm font-medium text-gray-900 dark:text-white"> Profile Picture </label>
                            <input wire:model="image" accept="image/png, image/jpeg" type="file" id="image" class="bg-gray-300 text-gray-900 text-sm rounded block w-full p-2.5">
                                @error('image')
                                    <span class="text-red-500 text-xs mt-3 block ">{{ $message }}</span>
                                @enderror

                                @if ($image)
                                    <img class="rounded w-10 h-10 mt-5 block" src="{{ $image->temporaryUrl() }}" alt="">
                                @endif

                                {{-- Este wire:target é para apenas mostrar este html apenas quando o input que recebe a 'imagem' está em loading, 
                                o target também pode funcionar com uma função, por exemplo a função 'create' que tenho no controller/component --}}
                                <div wire:loading wire:target='image'>
                                    <span class="text-green-500">Uploading...</span>
                                </div>

                                 <div wire:loading.delay> {{-- Este delay faz com que apareça apenas quando está em loading, tenho que ter "sleep()" definido no método do controller/component --}}
                                    <span class="text-green-500">Sending...</span>
                                </div>

                        </div>

                        {{-- Este remove faz com que seja removido da view enquanto está em loading --}}
                        {{-- <button wire:loading.remove type="submit"></button> --}}

                        {{-- Este attr é para atribuir o atributo 'disabled' enquanto está em loading --}}
                        {{-- <button wire:loading.attr='disabled' type="submit"></button> --}}

                        {{-- Este class aplica a class do tailwind enquanto está em loading, por alguma razão, se tiver alguma class aplicada normalmente, tenho que a remover
                        e só depois é que a posso aplicar, se usar o Tailwind por CDN, esse problema já não acontece, apenas aplico a classe diretamente no loading e ela é logo
                        aplicada sem eu ter que remover a outra que já tinha sido aplicada --}}
                        <button wire:loading.class.remove='bg-teal-500' wire:loading.class='bg-blue-500' type="submit" class="px-4 py-2 bg-teal-500 text-white font-semibold rounded hover:bg-teal-600">Create</button>
                            @if (session('success'))
                                <span class="text-green-500 text-xs mt-3 block">{{ session('success') }}</span>
                            @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
