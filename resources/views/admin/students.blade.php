<x-layouts.app :title="__('Admin Dashboard')">
    <h2 class="text-3xl sm:text-4xl font-extrabold text-indigo-700 dark:text-indigo-300 mb-6 sm:mb-8
        border-b-4 border-indigo-500 dark:border-indigo-400
        pb-2 sm:pb-3
        w-max
        tracking-wide
        drop-shadow-lg
        select-none
        text-left
        px-4
        ">
        لیست شاگردان
    </h2>

    <livewire:admin.student />
</x-layouts.app>
