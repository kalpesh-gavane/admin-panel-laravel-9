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
        });
    </script>
    @endpush

</x-app-layout>