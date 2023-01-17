<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('cruds.user.name') }} {{ __('cruds.lists') }}</h1>

        <div class="section-header-breadcrumb">
            {{ Breadcrumbs::render() }}
        </div>
    </x-slot>

    <div>
        <livewire:table.main name="user" :model="$user" />
    </div>
</x-app-layout>