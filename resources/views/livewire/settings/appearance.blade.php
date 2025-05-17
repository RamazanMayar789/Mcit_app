<section class="w-full">
    @include('partials.settings-heading')

    <x-settings.layout :heading="__('Appearance')" :subheading=" __('تنظیمات ظاهر حساب کاربری خود را به‌روزرسانی کنید')">
        <flux:radio.group x-data variant="segmented" x-model="$flux.appearance">
            <flux:radio value="light" icon="sun">{{ __('روشن') }}</flux:radio>
            <flux:radio value="dark" icon="moon">{{ __('تاریک') }}</flux:radio>
            <flux:radio value="system" icon="computer-desktop">{{ __('سیستم') }}</flux:radio>
        </flux:radio.group>
    </x-settings.layout>
</section>
