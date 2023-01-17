<x-app-layout>
    <x-slot name="header_content">
        <h1>Dashboard </h1>
        <div class="section-header-breadcrumb">
          {{ Breadcrumbs::render() }}
        </div>
    </x-slot>

    <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">

        <x-jet-welcome />
    </div>
</x-app-layout>