<?php

declare(strict_types=1);

namespace App\Livewire\Concerns;

use Exception;
use Illuminate\Database\Eloquent\Model;
use Illuminate\View\View;
use LivewireUI\Modal\ModalComponent;

class BaseModal extends ModalComponent
{
    protected ?Model $model;

    protected string $modelTitleField = 'name';

    public function mount(?int $modelId = null): void
    {
        if (isset($modelId) && ! is_null($modelId)) {
            $this->model = $this->modelType->find($modelId);
            $this->form->setModel($this->model);
        }
    }

    public function getModalTitle(): string
    {
        if (isset($this->model)) {
            if (property_exists($this->model, $this->modelTitleField)) {
                return 'Edit '.$this->model->{$this->modelTitleField};
            }

            throw new Exception('Property '.$this->modelTitleField.' does not exist on the model.');
        }

        return 'Add '.class_basename($this->modelType);
    }

    public function clear(): void
    {
        $this->modelForm->reset();
    }

    public function save(): void
    {
        if ($this->modelForm->store()) {
            $this->dispatch('refreshDatatable');

            $this->closeModal();
        }
    }

    public function render(): View
    {
        return view('livewire.'.$this->modalFormPath);
    }
}
