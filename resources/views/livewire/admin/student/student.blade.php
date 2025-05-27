<div class="relative mb-6 w-full">
    <flux:heading size="xl" level="2">{{ __('لیست شاگردان') }}</flux:heading>
    <flux:subheading size="lg" class="mb-6 ">{{ __('مدیریت شاگردان تان ') }}</flux:subheading>
    <flux:separator variant="subtle" />
    <flux:modal.trigger name="create_student">
        <flux:button variant="primary" class="mt-4">اضافه کردن شاگردان</flux:button>
    </flux:modal.trigger>

    @session('success')
<div x-data="{ show: true }"
x-show="show"
x-init="setTimeout(() => {show = false}, 3000)"

class="fixed top-5 right-5 mt-4 mr-4 bg-pink-950 border border-green-400 text-white px-4 py-3 rounded-lg  text-sm shadow-lg z-50"
role="alert">
   <p>{{ $value }}</p>

</div>




    @endsession('success')
    <livewire:admin.student.create-students />
    <livewire:admin.student.edit-students />


    {{-- جدول شاگردان --}}
    <table class="table-auto w-full bg-white dark:bg-slate-800 shadow-md rounded-md mt-5">
        <thead class="bg-gray-100 dark:bg-slate-900">
            <tr class="text-center text-gray-800 dark:text-white">
                <th class="px-1 py-1">نام</th>
                <th class="px-1 py-1">تخلص</th>
                <th class="px-1 py-1">نام پدر</th>
                <th class="px-1 py-1">نام پدر کلان</th>
                <th class="px-1 py-1">کاربر</th>
                <th class="px-1 py-1">وظیفه</th>
                <th class="px-1 py-1">شماره موبایل</th>
                <th class="px-1 py-1">عکس</th>
                <th class="px-1 py-1">تذکره</th>
                <th class="px-1 py-1">کارت</th>
                <th class="px-1 py-1">عملیات</th>
            </tr>
        </thead>
        <tbody>
            @forelse ($students as $student)
                <tr class="border-t border-gray-300 dark:border-gray-700 text-gray-800 dark:text-gray-100">
                    <td class="px-1 py-1">{{ $student->name }}</td>
                    <td class="px-1 py-1">{{ $student->last_name }}</td>
                    <td class="px-1 py-1">{{ $student->fname }}</td>
                    <td class="px-1 py-1">{{ $student->GFname }}</td>
                    <td class="px-1 py-1">{{ $student->users->name }}</td>
                    <td class="px-1 py-1">{{ $student->job }}</td>
                    <td class="px-1 py-1">{{ $student->phone_number }}</td>
                    <td class="px-1 py-1">
                        <a href="{{ asset('storage/id_carts/' . $student->ID_Cart) }}" target="_blank">
                            <img src="{{ asset('storage/id_carts/' . $student->ID_Cart) }}" alt="کارت شناسایی" width="50" />
                        </a>
                    </td>
                    <td class="px-1 py-1">
                        <img src="{{ asset('storage/students/' . $student->image) }}" alt="عکس شاگرد" width="50" />
                    </td>
                    <td class="px-1 py-1 text-center">
                        <flux:button variant="outline">
                            <a href="{{ route('student.card.generate', [$student->id, 'jpg']) }}" class="rounded text-sm">چاپ
                                کارت</a>
                        </flux:button>
                    </td>
                    <td class="text-center">
                        <flux:button variant="primary" wire:click='edit({{ $student->id }})'>ویرایش</flux:button> |
                        <flux:button variant="danger" wire:click='delete({{ $student->id }})'>حذف</flux:button> |
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
    {{ $students->links() }}
</div>

@include('livewire.admin.student.delete_modal')
</div>
