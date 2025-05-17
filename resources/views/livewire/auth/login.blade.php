<div class="flex flex-col gap-6">
    <x-auth-header :title="__('ورود به حساب تان ')" :description="__('برای ورود ایمیل و تأیید رمز عبور تان را زیر تایپ کنید')" />

    <!-- Session Status -->
    <x-auth-session-status class="text-center" :status="session('status')" />

    <form wire:submit="login" class="flex flex-col gap-6">
        <!-- Email Address -->
        <flux:input wire:model="email" :label="__('ایمیل')" type="email" required autofocus autocomplete="email"
            placeholder="email@example.com" />

        <!-- Password -->
<!-- ورودی رمز عبور -->
<div class="mt-1">
    <flux:input wire:model="password" :label="__('رمز عبور')" type="password" required autocomplete="current-password"
        :placeholder="__('رمز عبور')" viewable />
</div>

<!-- لینک فراموشی رمز + چک‌باکس یادآوری -->
<div class="flex items-center justify-between   rtl text-sm text-red-900">
    @if (Route::has('password.request'))
        <flux:link :href="route('password.request')" wire:navigate>
            {{ __('رمز عبور را فراموش کردید؟') }}
        </flux:link>
    @endif

    <flux:checkbox wire:model="remember" :label="__('بخاطر داشتن')" />
</div>


        <div class="flex items-center justify-end">
            <flux:button variant="primary" type="submit" class="w-full">{{ __('ورود') }}</flux:button>
        </div>
    </form>

    @if (Route::has('register'))
        <div class="space-x-1 rtl:space-x-reverse text-center text-sm text-zinc-600 dark:text-zinc-400">
            {{ __('اکونت ندارید ؟') }}
            <flux:link :href="route('register')" wire:navigate>{{ __(' ثبت نام کنید ؟  ') }}</flux:link>
        </div>
    @endif
</div>
