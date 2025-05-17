<section class="w-full">
    @include('partials.settings-heading')

    <x-settings.layout :heading="__('ویرایش رمز عبور')" :subheading="__('مطمین شوید که از رمز عبور پیچیده استفاده کرده اید برای امنیت .')">
        <form wire:submit="updatePassword" class="mt-6 space-y-6">
            <flux:input wire:model="current_password" :label="__('رمز عبور فعلی')" type="password" required
                autocomplete="current-password" />
            <flux:input wire:model="password" :label="__('رمز عبور جدید')" type="password" required
                autocomplete="new-password" />
            <flux:input wire:model="password_confirmation" :label="__('تایید رمز عبور')" type="password" required
                autocomplete="new-password" />

            <div class="flex items-center gap-4">
                <div class="flex items-center justify-end">
                    <flux:button variant="primary" type="submit" class="w-full">{{ __('ذخیره') }}</flux:button>
                </div>

                <x-action-message class="me-3" on="password-updated">
                    {{ __('ذخیره شد.') }}
                </x-action-message>
            </div>
        </form>
    </x-settings.layout>
</section>