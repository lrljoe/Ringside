<?php

declare(strict_types=1);

namespace App\Actions\Referees;

use App\Models\Referee;
use Lorisleiva\Actions\Concerns\AsAction;

class RestoreAction extends BaseRefereeAction
{
    use AsAction;

    /**
     * Restore a referee.
     *
     * @param  \App\Models\Referee  $referee
     * @return void
     */
    public function handle(Referee $referee): void
    {
        $this->refereeRepository->restore($referee);
    }
}
