<section class="mt-10 space-y-6">
    <div class="relative mb-5">
        <flux:heading>{{ __('حذف حساب') }}</flux:heading>
        <flux:subheading>{{ __('حذف اکونت تان با تمام دیتا ') }}</flux:subheading>
    </div>

    <flux:modal.trigger name="confirm-user-deletion">
        <flux:button variant="danger" x-data="" x-on:click.prevent="$dispatch('open-modal', 'confirm-user-deletion')">
            {{ __('حذف حساب') }}
        </flux:button>
    </flux:modal.trigger>

    <flux:modal name="confirm-user-deletion" :show="$errors->isNotEmpty()" focusable class="max-w-lg">
        <form wire:submit="deleteUser" class="space-y-6">
            <div>
                <flux:heading size="lg">{{ __('آیا شما مطمین هستید که حساب تان حذف می کنید ؟') }}</flux:heading>

                <flux:subheading>
                    {{ __('Once your account is deleted, all of its resources and data will be permanently deleted. Please enter your password to confirm you would like to permanently delete your account.') }}
                </flux:subheading>
            </div>

            <flux:input wire:model="password" :label="__('رمز عبور')" type="password" />

            <div class="flex justify-end space-x-2 rtl:space-x-reverse">
                <flux:modal.close>
                    <flux:button variant="filled">{{ __('لغو') }}</flux:button>
                </flux:modal.close>

                <flux:button variant="danger" type="submit">{{ __('حذف حساب') }}</flux:button>
            </div>
        </form>
    </flux:modal>
</section>