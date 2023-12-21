@props([
    'label'    => 'Input',
    'required' => false,
    'type'     => 'text',
    'id',
    'name',
    'placeholder' => '',
    'disabled'   => false,
])

<div class="space-y-1 mb-5">
    <div class="relative z-0 w-full group">
        <input type="{{ $type }}" id="{{ $id }}"
               class="block py-2.5 px-0 w-full text-sm text-gray-900 bg-transparent border-2 rounded-md h-12 border-gray-300 appearance-none dark:text-white dark:border-gray-600 dark:focus:border-blue-500 focus:outline-none focus:ring-0 focus:border-primary peer pl-3 selection:bg-primary selection:text-white"
               placeholder="{{ $placeholder }}"
               wire:model="{{ $name }}"
            @required($required)
            @disabled($disabled)
        />
        <label for="{{ $id }}"
               class="peer-focus:font-medium absolute ml-3 bg-white text-sm text-gray-500 dark:text-gray-400 duration-300 transform -translate-y-6 top-3 z-10 origin-[0] peer-focus:start-0 rtl:peer-focus:translate-x-1/4 rtl:peer-focus:left-auto peer-focus:text-primary px-1 rounded-sm peer-focus:dark:text-primary peer-placeholder-shown:scale-100 peer-placeholder-shown:translate-y-0 peer-focus:-translate-y-6">
            {{ $label }}
            @if($required)
                <span class="text-red-700">*</span>
            @endif
        </label>
    </div>
    @error($name)
    <div class="text-red-500 text-sm font-semibold">{{ $message }}</div>
    @enderror
</div>
