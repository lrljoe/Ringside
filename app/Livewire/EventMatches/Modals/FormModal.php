<?php

declare(strict_types=1);

namespace App\Livewire\Wrestlers\Modals;

use App\Livewire\Base\LivewireBaseForm;
use App\Livewire\Wrestlers\WrestlerForm;
use App\Models\Wrestler;

class FormModal extends LivewireBaseForm
{
    protected string $modelType = Wrestler::class;

    protected string $modalLanguagePath = 'wrestlers';

    protected string $modalFormPath = 'wrestlers.modals.form-modal';

    public WrestlerForm $modelForm;
}
