<x-layouts.app>
    <x-slot name="toolbar">
        <x-toolbar>
            <x-page-heading>Edit Manager</x-page-heading>
            <x-breadcrumbs.list>
                <x-breadcrumbs.item :url="route('dashboard')" label="Home" />
                <x-breadcrumbs.separator />
                <x-breadcrumbs.item :url="route('managers.index')" label="Managers" />
                <x-breadcrumbs.separator />
                <x-breadcrumbs.item :url="route('managers.show', $manager)" :label="$manager->name" />
                <x-breadcrumbs.separator />
                <x-breadcrumbs.item label="Edit" />
            </x-breadcrumbs.list>
        </x-toolbar>
    </x-slot>

    <div class="shadow-sm card">
        <div class="card-header">
            <h3 class="card-title">Edit Manager Form</h3>
        </div>
        <div class="card-body">
            <form method="post" action="{{ route('managers.update', $manager) }}">
                @method('patch')
                @csrf
                <div class="mb-10">
                    <div class="mb-5 row gx-10">
                        <div class="col-lg-6">
                            <x-form.inputs.text
                                label="First Name:"
                                name="first_name"
                                placeholder="First Name Here"
                                :value="old('first_name', $manager->first_name)"
                            />
                        </div>
                        <div class="col-lg-6">
                            <x-form.inputs.text
                                label="Last Name:"
                                name="last_name"
                                placeholder="Last Name Here"
                                :value="old('last_name', $manager->last_name)"
                            />
                        </div>
                    </div>
                </div>
                <div class="mb-10">
                    <x-form.inputs.date
                        label="Start Date:"
                        name="start_date"
                        :value="old('start_date', $manager->started_at?->format('Y-m-d'))"
                    />
                </div>
        </div>
        <div class="card-footer">
            <x-form.buttons.submit />
            <x-form.buttons.reset />
        </div>
        </form>
    </div>
</x-layouts.app>
