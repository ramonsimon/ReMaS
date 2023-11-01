<x-guest-layout>
    <x-authentication-card>

        <div class="mb-4 text-center">
            <h2>Welkom bij ReMaS,</h2>
            <p>het REcycle MAnagement System voor het project</p>
            <h2>Superior Waste van de gemeente Emserveen.</h2>
        </div>

        <x-validation-errors class="mb-4" />

        @if (session('status'))
            <div class="mb-4 font-medium text-sm text-green-600">
                {{ session('status') }}
            </div>
        @endif

        <form method="POST" action="{{ route('login') }}">
            @csrf

            <div class="mt-2">
                <x-label for="email" value="{{ __('Gebruikersnaam') }}" />
                <x-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
            </div>

            <div class="mt-4">
                <x-label for="password" value="{{ __('Wachtwoord') }}" />
                <x-input id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="current-password" />
            </div>

            <div class="flex items-center justify-end mt-4">
                @if (Route::has('password.request'))
                    <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('password.request') }}">
                        {{ __('Wachtwoord vergeten?') }}
                    </a>
                @endif

                <x-button class="ms-4">
                    {{ __('Inloggen') }}
                </x-button>
            </div>
        </form>
    </x-authentication-card>
</x-guest-layout>
