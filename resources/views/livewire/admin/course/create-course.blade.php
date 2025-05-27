<div>


    <flux:modal name="create-course" class="md:w-[800px]" :dismissible="false" variant="flyout" position="right">
        <div class="space-y-6">
            <div>
                <flux:heading class="mt-4 text-green-600" size="lg">اضافه کردن کورس </flux:heading>
                <flux:text class="mt-2 text-pink-800">معلومات کورس اضافه نماید.</flux:text>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 gap-4">

                <flux:input label="نام" wire:model.blur='name' placeholder="نام کورس" />





                <flux:textarea label="توضحیات" wire:model.blur='description' placeholder="توضحیات" />



            </div>

                <flux:button type="submit" wire:click="save" variant="primary">ثبت</flux:button>


        </div>

    </flux:modal>

    </div>
