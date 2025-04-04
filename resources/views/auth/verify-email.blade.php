<x-guest-layout>
    <div class="mb-4 text-sm text-gray-600">
        {{ __('Thanks for signing up! 
confirm with the link sent :D .') }}
    </div>

    @if (session('status') == 'verification-link-sent')
        <div class="mb-4 font-medium text-sm text-green-600">
            {{ __('A new verification link has been sent to the email :).') }}
        </div>
    @endif

    <div class="mt-4 flex items-center justify-between">
        <form method="POST" action="{{ route('verification.send') }}">
            @csrf

            <div>
                <x-primary-button class="bg-lime-500 hover:bg-green-700">
                    {{ __('Resend Verification Email') }}
                </x-primary-button>
            </div>
        </form>

        <form method="POST" action="{{ route('logout') }}">
            @csrf

            <button type="submit" class=" text-sm text-lime-600 hover:text-green-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-black-500">
                {{ __('Log Out') }}
            </button>
        </form>
    </div>
</x-guest-layout>
