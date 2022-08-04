<?php

declare(strict_types=1);

namespace App\Actions\Wrestlers;

use App\Models\Wrestler;
use Lorisleiva\Actions\Concerns\AsAction;

class RestoreAction extends BaseWrestlerAction
{
    use AsAction;

    /**
     * Restore a wrestler.
     *
     * @param  \App\Models\Wrestler  $wrestler
     * @return void
     */
    public function handle(Wrestler $wrestler): void
    {
        $this->wrestlerRepository->restore($wrestler);
    }
}
