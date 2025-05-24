

<flux:modal name="delete_student" class="min-w-[22rem]">
    <div class="space-y-6">
        <div>
            <flux:heading size="lg" class="mt-4">حذف شاگردان</flux:heading>

            <flux:text class="mt-2">
                <p>شما می خواهید شاگرد حذف کنید</p>

            </flux:text>
        </div>

        <div class="flex gap-2">
            <flux:spacer />

            <flux:modal.close>
                <flux:button variant="ghost">لغو</flux:button>
            </flux:modal.close>

            <flux:button type="submit" variant="danger" wire:click='deleteStudent()'>حذف</flux:button>
        </div>
    </div>
</flux:modal>
