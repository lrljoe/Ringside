<?php

declare(strict_types=1);

namespace App\Livewire\Venues;

use App\Livewire\Concerns\BaseModal;
use App\Models\Venue;
use Livewire\Attributes\Validate;

class VenueForm extends BaseModal
{
    protected string $formModelType = Venue::class;

    public Venue $formModel;

    #[Validate('required|string|min:5|max:255', as: 'venues.name')]
    public string $name = '';

    #[Validate('nullable|string|max:255', as: 'venues.street_address')]
    public string $street_address = '';

    #[Validate('required|integer|max:255', as: 'venues.city')]
    public string $city;

    #[Validate('required|integer|max:255', as: 'venues.state')]
    public string $state;

    #[Validate('required|integer|size:5', as: 'venues.zip_code')]
    public int $zipCode;

    public function store(): bool
    {
        $this->validate();

        if (! isset($this->formModel)) {
            $this->formModel = new Venue([
                'name' => $this->name,
                'street_address' => $this->street_address,
                'city' => $this->city,
                'state' => $this->state,
                'zipcode' => $this->zipCode,
            ]);
            $this->formModel->save();
        } else {
            $this->formModel->update([
                'name' => $this->name,
                'street_address' => $this->street_address,
                'city' => $this->city,
                'state' => $this->state,
                'zipcode' => $this->zipCode,
            ]);
        }

        return true;
    }
}
