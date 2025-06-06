<div class="w-full h-screen">
    <div class="h-full flex flex-col gap-y-8 items-center justify-center">
        <img src="{{ asset('images/fallback/verify-email.png') }}" alt="Verify Email" class="w-full lg:w-96">
        <div class="flex flex-col items-center gap-y-4">
            <p class="text-gray-500">Click the button below to verify your email</p>
            <button wire:click="verify" class="btn-primary w-fit">Verify Email</button>
        </div>
    </div>
</div>
