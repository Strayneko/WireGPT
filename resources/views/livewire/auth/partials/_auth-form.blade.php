<div x-data="">
    <form action="" wire:submit="submit()" class="max-w-[18.7rem]">
        <div>
            <x-form.input type="email" name="form.email" label="Email address" id="email"/>
            @if($isInputPassword)
                <x-form.input type="password" name="form.password" label="Password" id="password"/>
            @endif

            @if(session()->has('error'))
                <div class="-translate-y-4 inline-block text-red-500 text-sm font-semibold">
                    {{ session()->get('error') }}
                </div>
            @endif
        </div>

        <button
            class="gradient-button transition ease-in-out duration-200 hover:shadow-button-primary w-full py-3 rounded-md text-white font-medium disabled:cursor-not-allowed disabled:hover:shadow-none disabled:!bg-gray-300"
            wire:loading.attr="disabled"
        >
            <div wire:loading>
                <div class="flex justify-center items-center">
                    <x-misc.loader/>
                    <span>Processing</span>
                </div>
            </div>
            <div wire:loading.class="hidden">
                <span>{{ $isInputPassword ? $buttonText : 'Continue' }}</span>
            </div>
        </button>
    </form>

    <div class="text-center mt-3">
        @if(strtolower($type) === 'register')
            <span class="text-gray-900 text-sm font-medium">Already have an account? </span>
            <a href=""
               wire:click.prevent="goToLogin()"
               class="font-medium text-primary text-sm ml-1 hover:text-primary/70 rounded hover:font-semibold active:bg-primary/30">Login</a>
        @else
            <span class="text-gray-900 text-sm font-medium">Don't have an account? </span>
            <a href=""
               wire:click.prevent="goToRegister()"
               class="font-medium text-primary text-sm ml-1 hover:text-primary/70 px-1 rounded hover:font-semibold active:bg-primary/30">Register</a>
        @endif
    </div>
</div>
