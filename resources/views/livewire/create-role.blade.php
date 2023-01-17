<div id="form-create">

    <x-jet-form-section :submit="$action" class="mb-4">
        <!-- 
        <x-slot name="title">
            {{ __('cruds.roles.name') }}
        </x-slot> -->

        <x-slot name="form">
            <div class="form-group col-span-4 sm:col-span-5">
                <x-jet-label for="name" value="{{ __('cruds.roles.fields.name') }}" />
                <x-jet-input id="name" type="text" class="mt-1 block w-full form-control shadow-none" wire:model.defer="role.name" />
                <x-jet-input-error for="role.name" class="mt-2" />
            </div>

            <div class="form-group col-span-4 sm:col-span-5">
                <x-jet-label for="guard_name" value="{{ __('cruds.roles.fields.guard_name') }}" />
                <x-jet-input id="guard_name" type="text" class="mt-1 block w-full form-control shadow-none" wire:model.defer="role.guard_name" />
                <x-jet-input-error for="role.guard_name" class="mt-2" />
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
</div>