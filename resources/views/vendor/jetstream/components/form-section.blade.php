@props(['submit'])

<div {{ $attributes->merge(['class' => 'md:grid md:grid-cols-2']) }}>
    <div class=" md:mt-0 md:col-span-2">
        <form wire:submit.prevent="{{ $submit }}">
            <div class="shadow overflow-hidden sm:rounded-md" {{ $submit }}>
                <div class="px-4 py-5 bg-white sm:p-6">

                    <div class="grid grid-cols-6 gap-6">
                        {{ $form }}
                    </div>
                </div>

                @if (isset($actions))
                <div class="flex items-center justify-end px-4 py-3 bg-gray-50 text-right sm:px-6">
                    {{ $actions }}
                </div>
                @endif
            </div>
        </form>
    </div>
</div>