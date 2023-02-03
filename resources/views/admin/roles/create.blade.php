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


    @push('extra-scripts')
    <script type="text/javascript">
        $(document).ready(function() {
            //  $('.select2').select2();
            window.loadSelect2 = () => {
                $('.select2').select2().on('change', function() {
                    livewire.emitTo('create-role', 'selectedItem', $(this).val());
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