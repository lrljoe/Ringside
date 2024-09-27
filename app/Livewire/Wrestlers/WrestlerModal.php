<?php

declare(strict_types=1);

namespace App\Livewire\Wrestlers;

use App\Models\Wrestler;
use Illuminate\Support\Facades\Gate;
use LivewireUI\Modal\ModalComponent;

class WrestlerModal extends ModalComponent
{
    public Wrestler $wrestler;

    public function mount()
    {
        Gate::authorize('update', $this->wrestler);
    }

    public function render()
    {
        return view('livewire.wrestlers.modal');
    }
}
