<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Edit User') }}</h1>

        <div class="section-header-breadcrumb">
            {{ Breadcrumbs::render('users.edit',$id) }}
        </div>
    </x-slot>

    <div>
        <livewire:create-user action="updateUser" :userId="request()->user" />
    </div>

</x-app-layout>