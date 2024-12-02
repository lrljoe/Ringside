<x-modal>
    <div class="mb-10">
        <x-form.inputs.text label="Name:" name="name" placeholder="Testing Name Here" wire:model="form.name" />
    </div>

    <div class="mb-10">
        <x-form.inputs.text label="Hometown:" name="hometown" placeholder="Orlando, FL" wire:model="form.hometown" />
    </div>

    <div class="flex  items-center gap-4 mb-10">
        <x-form.inputs.text label="Feet:" name="name" placeholder="Feet" wire:model="form.height_feet" />
        <x-form.inputs.text label="Inches:" name="name" placeholder="Inches" wire:model="form.height_inches" />
        <x-form.inputs.text label="Weight:" name="weight" placeholder="lbs" wire:model="form.weight" />
    </div>

    <div class="mb-10">
        <x-form.inputs.text label="Signature Move:" name="signature_move" placeholder="This Amazing Finisher"
            wire:model="form.signature_move" />
    </div>

    <div class="mb-10">
        <x-form.inputs.date label="Start Date:" name="start_date" wire:model="form.start_date" />
    </div>
</x-modal>

{{-- <x-slot:footer>
        <div>
            <x-buttons.primary wire:click="save">Save</x-buttons.primary>
        </div>
    </x-slot:footer> --}}
