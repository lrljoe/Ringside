<x-modal>
    <div class="flex flex-col gap-2.5">
        <x-form.inputs.text label="Name:" name="form.name" placeholder="Testing Name Here" wire:model="form.name" />
    </div>

    <div class="flex flex-col gap-2.5">
        <x-form.inputs.text label="Hometown:" name="form.hometown" placeholder="Orlando, FL" wire:model="form.hometown" />
    </div>

    <div class="flex items-center justify-between gap-2.5">
        <div class="flex flex-col gap-2.5">
            <x-form.inputs.text label="Feet:" name="form.feet" placeholder="Feet" wire:model="form.height_feet" />
        </div>
        <div class="flex flex-col gap-2.5">
            <x-form.inputs.text label="Inches:" name="form.inches" placeholder="Inches"
                wire:model="form.height_inches" />
        </div>
        <div class="flex flex-col gap-2.5">
            <x-form.inputs.text label="Weight:" name="form.weight" placeholder="lbs" wire:model="form.weight" />
        </div>
    </div>

    <div class="flex flex-col gap-2.5">
        <x-form.inputs.text label="Signature Move:" name="form.signature_move" placeholder="This Amazing Finisher"
            wire:model="form.signature_move" />
    </div>

    <div class="flex flex-col gap-2.5">
        <x-form.inputs.date label="Start Date:" name="form.start_date" wire:model="form.start_date" />
    </div>

    <x-slot:footer>
        <div class="flex gap-4">
            <x-buttons.light wire:click="clear">Clear</x-buttons.light>
            <x-buttons.primary wire:click="save">Save</x-buttons.primary>
        </div>
    </x-slot:footer>
</x-modal>
