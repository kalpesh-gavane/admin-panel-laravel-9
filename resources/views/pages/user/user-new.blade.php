<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('cruds.create') }} {{ __('cruds.new') }} {{ __('cruds.user.name') }}</h1>

        <div class="section-header-breadcrumb">
            {{ Breadcrumbs::render() }}
        </div>

    </x-slot>

    <div>
        <livewire:create-user action="createUser" />
    </div>
</x-app-layout>