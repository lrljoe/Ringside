<?php

declare(strict_types=1);

namespace App\Actions\Stables;

use App\Models\Stable;
use Lorisleiva\Actions\Concerns\AsAction;

class DeleteAction extends BaseStableAction
{
    use AsAction;

    /**
     * Delete a stable.
     *
     * @param  \App\Models\Stable  $stable
     * @return void
     */
    public function handle(Stable $stable): void
    {
        $this->stableRepository->delete($stable);
    }
}
