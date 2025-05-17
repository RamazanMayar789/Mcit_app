<div class="flex flex-col gap-6">
    <x-auth-header :title="__('ایجاد حساب کاربری')" :description="__('برای ایجاد حساب کاربری خود، اطلاعات زیر را وارد کنید')" />

    <!-- Session Status -->
    <x-auth-session-status class="text-center" :status="session('status')" />

    <form wire:submit="register" class="flex flex-col gap-6">
        <!-- Name -->
        <flux:input
            wire:model="name"
            :label="__('نام')"
            type="text"
            required
            autofocus
            autocomplete="name"
            :placeholder="__('نام کامل')"
        />

        <!-- Email Address -->
        <flux:input
            wire:model="ایمیل"
            :label="__('ایمیل آدرس ')"
            type="email"
            required
            autocomplete="email"
            placeholder="email@example.com"
        />

        <!-- Password -->
        <flux:input
            wire:model="password"
            :label="__('رمز عبور')"
            type="password"
            required
            autocomplete="new-password"
            :placeholder="__('رمز عبور')"
            viewable
        />

        <!-- Confirm Password -->
        <flux:input
            wire:model="password_confirmation"
            :label="__('تأیید رمز عبور')"
            type="password"
            required
            autocomplete="new-password"
            :placeholder="__('تأیید رمز عبور')"
            viewable
        />

        <div class="flex items-center justify-end">
            <flux:button type="submit" variant="primary" class="w-full">
                {{ __('ایجاد حساب کاربری') }}
            </flux:button>
        </div>
    </form>

    <div class="space-x-1 rtl:space-x-reverse text-center text-sm text-zinc-600 dark:text-zinc-400">
        {{ __('قبلاً حساب کاربری دارید ؟') }}
        <flux:link :href="route('login')" wire:navigate>{{ __('ورود') }}</flux:link>
    </div>
</div>
