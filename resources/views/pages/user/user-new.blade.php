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

    @push('extra-scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            //  $('.select2').select2();
            window.loadSelect2 = () => {
                $('.select2').select2().on('change', function() {
                    livewire.emitTo('create-user', 'selectedRole', $(this).val());
                });
            }
            loadSelect2();
            window.livewire.on('loadSelect2Hydrate', () => {
                loadSelect2();
            });
        });
    </script>
    @endpush
</x-app-layout>