<?php

declare(strict_types=1);

namespace App\Livewire\Wrestlers\Modals;

use App\Livewire\Wrestlers\WrestlerForm;
use App\Models\Wrestler;
use LivewireUI\Modal\ModalComponent;

class FormModal extends ModalComponent
{
    public Wrestler $wrestler;

    public WrestlerForm $form;

    public function mount(?int $wrestlerId = null)
    {
        if (isset($wrestlerId)) {
            $this->wrestler = Wrestler::find($wrestlerId);
            $this->form->setWrestler($this->wrestler);
        }

    }

    public function save()
    {
        if ($this->form->update()) {
            $this->dispatch('refreshDatatable');

            $this->closeModal();

        }
    }

    public function render()
    {
        return view('livewire.wrestlers.modals.form-modal');
    }
}
