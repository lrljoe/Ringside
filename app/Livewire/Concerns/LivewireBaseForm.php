<?php

declare(strict_types=1);

namespace App\Livewire\Concerns;

use Illuminate\Database\Eloquent\Model;
use Livewire\Form;

class LivewireBaseForm extends Form
{
    protected Model $formModel;

    protected function setModel(Model $formModel)
    {
        $this->formModel = $formModel;
        $this->fill($this->formModel);
        $this->loadExtraData();
    }

    protected function loadExtraData(): void {}
}
