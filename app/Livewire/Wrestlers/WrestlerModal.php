<?php

namespace App\Livewire\Wrestlers;

use LivewireUI\Modal\ModalComponent;
use App\Models\Wrestler;
use App\Livewire\Wrestlers\WrestlerForm;

class WrestlerModal extends ModalComponent
{
    public Wrestler $wrestler;

    public WrestlerForm $form;

    public function mount(?int $wrestlerId = null)
    {
        if (isset($wrestlerId))
        {
            $this->wrestler = Wrestler::find($wrestlerId);
            $this->form->setWrestler($this->wrestler);
        }

    }
 
    public function save()
    {
        if ($this->form->update())
        {
            $this->dispatch('refreshDatatable'); 

            $this->closeModal();
    
        }
     }

    public function render()
    {
        return view('livewire.wrestlers.modal');
    }
}