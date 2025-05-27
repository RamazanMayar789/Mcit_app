<div class="relative mb-6 w-full">
   <flux:heading size="xl" level="2">{{ __('لیست کورس ها ') }}</flux:heading>
   <flux:subheading size="lg" class="mb-6">{{ __('مدیریت کورس ها ') }}</flux:subheading>
   <flux:separator variant="subtle" />
   <flux:modal.trigger name="create-course">

   <flux:button variant="primary" class="mt-4">اضافه کردن کورس</flux:button>
   </flux:modal.trigger>
@session('success')
    <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => {show = false}, 3000)"
        class="fixed top-5 right-5 mt-4 mr-4 bg-pink-950 border border-green-400 text-white px-4 py-3 rounded-lg  text-sm shadow-lg z-50"
        role="alert">
        <p>{{ $value }}</p>

    </div>




@endsession('success')
@session('error')
    <div x-data="{ show: true }" x-show="show" x-init="setTimeout(() => {show = false}, 3000)"
        class="fixed top-5 right-5 mt-4 mr-4 bg-red-950 border border-red-900 text-white px-4 py-3 rounded-lg  text-sm shadow-lg z-50"
        role="alert">
        <p>{{ $value }}</p>

    </div>




@endsession('success')
<livewire:admin.course.delete-course />
   <livewire:admin.course.create-course />
   <livewire:admin.course.edit-course />



   {{-- جدول کورس ها  --}}

<table class="table-auto w-full bg-white dark:bg-slate-800 shadow-md rounded-md mt-5">
    <thead class="bg-gray-100 dark:bg-slate-900">
        <tr class="text-center text-gray-800 dark:text-white">
            <th class="px-1 py-1">نام کورس</th>
            <th class="px-1 py-1">توضحیات</th>
            <th class="px-1 py-1">کاربر</th>

            <th class="px-1 py-1">عملیات</th>
        </tr>
    </thead>
    <tbody>
        @forelse ($courses as $course)
            <tr class="border-t border-gray-300 dark:border-gray-700 text-gray-800 dark:text-gray-100">
                <td class="px-1 py-1">{{ $course->name }}</td>
                <td class="px-1 py-1 text-wrap">{{ $course->description }}</td>
                <td class="px-1 py-1">{{ $course->users->name }}</td>




                <td class="text-center">
                    <flux:button variant="primary"
                    wire:click="$dispatchTo('admin.course.edit-course', 'editcourse',{ id:  {{ $course->id }} })"
                    >ویرایش</flux:button> |
                    <flux:button variant="danger"
                     wire:click="$dispatchTo('admin.course.delete-course','deletecourse',{ id: {{ $course->id }} })"
                     >حذف</flux:button> |
                </td>
            </tr>
        @empty
            <tr>
                <td colspan="11" class="px-1 py-1 text-center text-gray-600 dark:text-gray-400">
                    شاگردان موجود نیست تا هنوز
                </td>
            </tr>
        @endforelse
    </tbody>
</table>
<div class="mt-4" dir="ltr">
    {{ $courses->links() }}
</div>


</div>
