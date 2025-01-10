<x-modal>
    <div class="flex flex-col gap-2.5">
        <x-form.inputs.text label="Name:" name="modelForm.name" placeholder="Testing Name Here"
            wire:model="modelForm.name" />
    </div>

    <div class="flex flex-col gap-2.5">
        <x-form.inputs.text label="Hometown:" name="modelForm.hometown" placeholder="Orlando, FL"
            wire:model="modelForm.hometown" />
    </div>

    <div class="flex items-center justify-between gap-2.5">
        <div class="flex flex-col gap-2.5">
            <x-form.inputs.text label="Feet:" name="modelForm.height_feet" placeholder="Feet"
                wire:model="modelForm.height_feet" />
        </div>
        <div class="flex flex-col gap-2.5">
            <x-form.inputs.text label="Inches:" name="modelForm.height_inches" placeholder="Inches"
                wire:model="modelForm.height_inches" />
        </div>
        <div class="flex flex-col gap-2.5">
            <x-form.inputs.text label="Weight:" name="modelForm.weight" placeholder="lbs"
                wire:model="modelForm.weight" />
        </div>
    </div>

    <div class="flex flex-col gap-2.5">
        <x-form.inputs.text label="Signature Move:" name="modelForm.signature_move" placeholder="This Amazing Finisher"
            wire:model="modelForm.signature_move" />
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
