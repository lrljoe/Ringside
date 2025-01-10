<x-modal>
    <div class="flex items-center justify-between gap-2.5">
        <div class="flex flex-col gap-2.5">
            <x-form.inputs.text label="First Name:" name="modelForm.first_name" placeholder="John"
                wire:model="modelForm.first_name" />
        </div>
        <div class="flex flex-col gap-2.5">
            <x-form.inputs.text label="Last Name:" name="modelForm.last_name" placeholder="Smith"
                wire:model="modelForm.last_name" />
        </div>
    </div>

    <div class="flex flex-col gap-2.5">
        <x-form.inputs.date label="Start Date:" name="modelForm.start_date" wire:model="modelForm.start_date" />
    </div>

    <x-slot:footer>
        <div class="flex gap-4">
            <x-buttons.light wire:click="clear">Clear</x-buttons.light>
            <x-buttons.primary wire:click="save">Save</x-buttons.primary>
        </div>
    </x-slot:footer>
</x-modal>
