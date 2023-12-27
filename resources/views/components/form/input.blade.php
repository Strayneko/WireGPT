@props([
    'label'    => 'Input',
    'required' => false,
    'type'     => 'text',
    'id',
    'name',
    'placeholder' => '',
    'disabled'   => false,
])

<div class="space-y-1 mb-5" x-data="{
inputRef: null,
isShowPassword: false,
}">
    <div class="relative z-0 w-full group flex">
        <input type="{{ $type }}"
               id="{{ $id }}"
               x-ref="inputRef"
               @class([
                    "block py-2.5 px-0 w-full text-sm text-gray-900 overflow-hidden bg-transparent border-2 peer rounded-md h-12 border-gray-300 border-r-transparent appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-primary focus:border-r-transparent pl-3 selection:bg-primary selection:text-white",
                    "rounded-r-none" => strtolower($type) === 'password',
               ])
               placeholder="{{ $placeholder }}"
               wire:model="{{ $name }}"
               @required($required)
               @disabled($disabled)
               @if(strtolower($type) === 'password')
                   :type="isShowPassword ? 'text' : 'password'"
            @endif
        />
        <label for="{{ $id }}"
               class="peer-focus:font-medium absolute ml-3 bg-white text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 top-3 z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-primary px-1 rounded-sm peer-focus:dark:text-primary peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:-translate-y-6">
            {{ $label }}
            @if($required)
                <span class="text-red-700">*</span>
            @endif
        </label>

        <div
            @class([
                "-ml-1 border-2 border-l-transparent border-gray-300 peer-focus:border-primary peer-focus:border-l-transparent overflow-hidden rounded-r-md",
                "rounded-r-md" => strtolower($type) === 'password',
        ])
        >
            <button
                type="button"
                @click.prevent="isShowPassword = !isShowPassword"
                @class([
                    "h-full hover:bg-gray-200/20 px-2",
                    "hidden" => strtolower($type) !== 'password'
            ])
            >
                <svg x-show="!isShowPassword" fill="none" viewBox="0 0 24 24" stroke-width="1.5"
                     stroke="currentColor"
                     class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M2.036 12.322a1.012 1.012 0 0 1 0-.639C3.423 7.51 7.36 4.5 12 4.5c4.638 0 8.573 3.007 9.963 7.178.07.207.07.431 0 .639C20.577 16.49 16.64 19.5 12 19.5c-4.638 0-8.573-3.007-9.963-7.178Z"/>
                    <path stroke-linecap="round" stroke-linejoin="round" d="M15 12a3 3 0 1 1-6 0 3 3 0 0 1 6 0Z"/>
                </svg>

                <svg x-show="isShowPassword" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                     class="w-6 h-6">
                    <path stroke-linecap="round" stroke-linejoin="round"
                          d="M3.98 8.223A10.477 10.477 0 0 0 1.934 12C3.226 16.338 7.244 19.5 12 19.5c.993 0 1.953-.138 2.863-.395M6.228 6.228A10.451 10.451 0 0 1 12 4.5c4.756 0 8.773 3.162 10.065 7.498a10.522 10.522 0 0 1-4.293 5.774M6.228 6.228 3 3m3.228 3.228 3.65 3.65m7.894 7.894L21 21m-3.228-3.228-3.65-3.65m0 0a3 3 0 1 0-4.243-4.243m4.242 4.242L9.88 9.88"/>
                </svg>

            </button>
        </div>
    </div>
    @error($name)
    <div class="text-red-500 text-sm font-semibold">{{ $message }}</div>
    @enderror
</div>
