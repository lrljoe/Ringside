<?php

declare(strict_types=1);

namespace App\Livewire\TagTeams;

use App\Livewire\Base\LivewireBaseForm;
use App\Models\TagTeam;
use App\ValueObjects\Height;
use Illuminate\Support\Carbon;
use Livewire\Attributes\Validate;

class TagTeamForm extends LivewireBaseForm
{
    protected string $formModelType = TagTeam::class;

    public TagTeam $formModel;

    #[Validate('required|string|min:5|max:255', as: 'tag-teams.name')]
    public string $name = '';

    #[Validate('nullable|string|max:255', as: 'tag-teams.hometown')]
    public string $hometown = '';

    #[Validate('required|integer|max:7', as: 'tag-teams.feet')]
    public int $height_feet;

    #[Validate('required|integer|max:11', as: 'tag-teams.inches')]
    public int $height_inches;

    #[Validate('required|integer', as: 'tag-teams.weight')]
    public int $weight;

    #[Validate('nullable|string|max:255', as: 'tag-teams.signature_move')]
    public ?string $signature_move = '';

    #[Validate('nullable|date', as: 'employments.started_at')]
    public Carbon|string|null $start_date = '';

    public function loadExtraData(): void
    {
        $this->start_date = $this->formModel->currentEmployment?->started_at;

        $height = $this->formModel->height;

        $feet = (int) floor($height->toInches() / 12);
        $inches = $height->toInches() % 12;

        $this->height_feet = $feet;
        $this->height_inches = $inches;
    }

    public function store(): bool
    {
        $this->validate();

        // $this->height_feet = 7;
        // $this->height_inches = 2;
        $height = new Height($this->height_feet, $this->height_inches);

        if (! isset($this->formModel)) {
            $this->formModel = new TagTeam([
                'name' => $this->name,
                'hometown' => $this->hometown,
                'height' => $height->toInches(),
                'weight' => $this->weight,
                'signature_move' => $this->signature_move,
            ]);
            $this->formModel->save();
        } else {
            $this->formModel->update([
                'name' => $this->name,
                'hometown' => $this->hometown,
                'height' => $height->toInches(),
                'weight' => $this->weight,
                'signature_move' => $this->signature_move,
            ]);
        }

        return true;
    }
}
