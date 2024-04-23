<x-layout>
    <x-slot:heading>
        Login
    </x-slot:heading>

    <form method="POST" action="/login">
        @csrf

        <!-- Cross Site Request Forgery protection: CSRF is an attack that tricks the victim into submitting a malicious request. It inherits the identity and privileges of the victim to perform an undesired function on the victim’s behalf (though note that this is not true of login CSRF, a special form of the attack described below).
      This laravel directive adds a hidden field with a unique key/token -->

        <div class="space-y-12">
            <div class="border-b border-gray-900/10 pb-12">
                <div class="grid grid-cols-1 gap-x-6 gap-y-8 sm:grid-cols-6">

                    <x-form-field>
                        <x-form-label for="email">Email Address</x-form-label>

                        <div class="mt-2">
                            <x-form-input name="email" type="email" id="email" :value="old('email')" required/>

                            <x-form-error name="email" />
                        </div>
                    </x-form-field>

                    <x-form-field>
                        <x-form-label for="password">Password</x-form-label>

                        <div class="mt-2">
                            <x-form-input name="password" type="password" id="password" required/>

                            <x-form-error name="password" />
                        </div>
                    </x-form-field>


                </div>
            </div>
        </div>

        <div class="mt-6 flex items-center justify-end gap-x-6">
            <a href="/"class="text-sm font-semibold leading-6 text-gray-900">Cancel</a>
            <x-form-button>Login</x-form-button>
        </div>
    </form>
</x-layout>