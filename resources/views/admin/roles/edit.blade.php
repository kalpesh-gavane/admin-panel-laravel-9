<x-app-layout>
    <x-slot name="header_content">
        <h1>{{ __('Edit Role') }}</h1>

        <div class="section-header-breadcrumb">
            {{ Breadcrumbs::render('roles.edit',$id) }}
        </div>
    </x-slot>

    <div>
        <livewire:create-role action="updateRole" :roleId="request()->role" />
    </div>

    @push('extra-scripts')
    <script type="text/javascript">
        $(document).ready(function() {

            //  $('.select2').select2();
            //  console.log(oldPermissions);
            window.loadSelect2 = () => {
                $('.select2').select2().on('change', function() {
                    livewire.emitTo('create-role', 'selectedItem', $(this).val());
                });
            }
            loadSelect2();
        });
    </script>
    @endpush

</x-app-layout>