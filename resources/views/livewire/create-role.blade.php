<div id="form-create">

    <x-jet-form-section :submit="$action" class="mb-4">
        <x-slot name="form">
            <div class="form-group col-span-6 sm:col-span-3">
                <x-jet-label for="name" value="{{ __('cruds.roles.fields.name') }}" />
                <x-jet-input id="name" type="text" class="mt-1 block w-full form-control shadow-none" wire:model.defer="role.name" name="role" />
                <x-jet-input-error for="role.name" class="mt-2" />
            </div>

            <div class="form-group col-span-6 sm:col-span-3">
                <x-jet-label for="guard_name" value="{{ __('cruds.roles.fields.guard_name') }}" />
                <x-jet-input id="guard_name" type="text" class="mt-1 block w-full form-control shadow-none" wire:model.defer="role.guard_name" name="guard" />
                <x-jet-input-error for="role.guard_name" class="mt-2" />
            </div>

            <div class="form-group col-span-6 sm:col-span-3" wire:ignore>
                <x-jet-label for="permissions" value="{{ __('cruds.permission.name2') }}" />
                <select class="select2 mt-1 block w-full form-control shadow-none" id="permissions" name="permissions[]" multiple="multiple">
                    <option value="">Select Permission</option>

                    @foreach ($permissions as $permission)
                    @php
                    $permName = $permission['name'];
                    Log::info($rolePermissions);
                    @endphp
                    <option value="{{ $permission['id'] }}" @if(in_array($permName,$rolePermissions)) {{ 'selected' }} @endif>{{ $permName }}</option>
                    @endforeach
                </select>
            </div>

        </x-slot>

        <x-slot name="actions">
            <x-jet-action-message class="mr-3" on="saved">
                {{ __($button['submit_response']) }}
            </x-jet-action-message>

            <x-jet-button>
                {{ __($button['submit_text']) }}
            </x-jet-button>

        </x-slot>

    </x-jet-form-section>

    <x-notify-message on="saved" type="success" :message="__($button['submit_response_notyf'])" />

    <script>

    </script>
</div>