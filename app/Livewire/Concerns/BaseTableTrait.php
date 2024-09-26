<?php

declare(strict_types=1);

namespace App\Livewire\Concerns;

trait BaseTableTrait
{
    public function configuringBaseTableTrait()
    {
        $this->setPrimaryKey('id')
            ->setColumnSelectDisabled()
            ->setSearchPlaceholder('search '.$this->databaseTableName)
            ->setPaginationEnabled()
            ->addAdditionalSelects([$this->databaseTableName.'.id as id']);
    }
}
