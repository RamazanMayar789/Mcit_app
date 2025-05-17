
<div class="flex min-h-screen">
    <main class="flex-1">
        {{ $slot }}
    </main>

    @include('components.layouts.app.sidebar')
</div>
