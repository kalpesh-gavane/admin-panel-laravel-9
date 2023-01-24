<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Roles List') }}</h1>

        <div class="section-header-breadcrumb">
        {{ Breadcrumbs::render() }}
        </div>
    </x-slot>

    <div>
        <livewire:table.roles name="role" :model="$role" />
    </div>
</x-app-layout>