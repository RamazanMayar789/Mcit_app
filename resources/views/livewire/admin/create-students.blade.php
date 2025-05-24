<flux:modal name="create_student" class="md:w-[800px]" :dismissible="false" variant="flyout" position="right">
    <div class="space-y-6">
        <div>
            <flux:heading class="mt-4 text-green-600" size="lg">اضافه کردن شاگردان</flux:heading>
            <flux:text class="mt-2 text-pink-800">معلومات شاگردان اضافه نماید.</flux:text>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 gap-4">
            <!-- ردیف اول -->
            <flux:input label="نام" wire:model.blur='name' placeholder="نام شاگرد" />
            <flux:input label="تخلص" wire:model.blur='last_name' placeholder="تخلص" />

            <!-- ردیف دوم -->
            <flux:input label="نام پدر" wire:model.blur='fname' placeholder="نام پدر" />
            <flux:input label="نام پدر کلان" wire:model.blur='gname' placeholder="نام پدر کلان" />

            <!-- ردیف سوم: وظیفه و تذکره -->
            <flux:input label="وظیفه" type="text" wire:model.blur='job' placeholder="وظیفه" />
            <div class="h-full self-stretch" x-data="{ isUploading: false, progress: 0, uploadFinished: false }"
                x-on:livewire-upload-start="isUploading = true; uploadFinished = false"
                x-on:livewire-upload-finish="isUploading = false; uploadFinished = true"
                x-on:livewire-upload-error="isUploading = false; uploadFinished = false"
                x-on:livewire-upload-progress="progress = $event.detail.progress">

                <flux:input label="تذکره" type="file" wire:model="Id_cart" class="h-full" />

                <div x-show="isUploading" x-transition.opacity
                    class="mt-4 w-full bg-gray-200 rounded-full h-5 shadow-inner overflow-hidden border border-gray-400 delay-200">
                    <div class="h-full rounded-full shadow-lg transition-all ease-in-out duration-1000 delay-200
                        bg-gradient-to-r from-green-600 via-red-600 to-black" role="progressbar"
                        :style="'width:' + progress + '%' " aria-valuenow="progress" aria-valuemin="0"
                        aria-valuemax="100">
                    </div>
                </div>

                <div x-show="isUploading"
                    class="text-sm text-gray-700 mt-2 text-center font-medium transition-opacity duration-300 delay-300">
                    در حال بارگذاری... <span x-text="progress + '%'"></span>
                </div>

                <div x-show="uploadFinished" x-transition.opacity
                    class="mt-3 text-green-600 font-semibold text-sm text-center">
                    فایل با موفقیت آپلود شد ✅
                </div>
            </div>

            <!-- ردیف چهارم: تصویر و شماره موبایل -->
            <div class="self-stretch" x-data="{ isUploading: false, progress: 0, uploadFinished: false }"
                x-on:livewire-upload-start="isUploading = true; uploadFinished = false"
                x-on:livewire-upload-finish="isUploading = false; uploadFinished = true"
                x-on:livewire-upload-error="isUploading = false; uploadFinished = false"
                x-on:livewire-upload-progress="progress = $event.detail.progress">

                <flux:input label="تصویر" type="file" wire:model="image" class="h-full" />

                <div x-show="isUploading" x-transition.opacity
                    class="mt-4 w-full bg-gray-200 rounded-full h-5 shadow-inner overflow-hidden border border-gray-400 delay-200">
                    <div class="h-full rounded-full shadow-lg transition-all ease-in-out duration-1000 delay-200
                        bg-gradient-to-r from-green-600 via-red-600 to-black" role="progressbar"
                        :style="'width:' + progress + '%' " aria-valuenow="progress" aria-valuemin="0"
                        aria-valuemax="100">
                    </div>
                </div>

                <div x-show="isUploading"
                    class="text-sm text-gray-700 mt-2 text-center font-medium transition-opacity duration-300 delay-300">
                    در حال بارگذاری... <span x-text="progress + '%'"></span>
                </div>

                <div x-show="uploadFinished" x-transition.opacity
                    class="mt-3 text-green-600 font-semibold text-sm text-center">
                    فایل با موفقیت آپلود شد ✅
                </div>
            </div>

            <div class="self-stretch">
                <flux:input label="شماره موبایل" wire:model.blur='phone_number' type="number"
                    placeholder="شماره موبایل شاگرد" class="h-full" />
            </div>

            <!-- ردیف پنجم -->
            <div class="md:col-span-2 grid md:grid-cols-[2fr_1fr] gap-2 items-end">
                <flux:input label="ولایت" placeholder="ولایت را بنوسید" wire:model.blur='province' />

                <flux:button type="submit" wire:click="save" variant="primary" class="w-full">ثبت</flux:button>
                </div>
               </div>
    </div>
</flux:modal>
