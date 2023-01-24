<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('cruds.create') }} {{ __('cruds.roles.name') }}</h1>

        <div class="section-header-breadcrumb">
        {{ Breadcrumbs::render() }}
        </div>
    </x-slot>

    <div>
        <livewire:create-role action="createRole" />
    </div>

</x-app-layout>