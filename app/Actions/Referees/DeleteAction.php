<?php

declare(strict_types=1);

namespace App\Actions\Referees;

use App\Models\Referee;
use Lorisleiva\Actions\Concerns\AsAction;

class DeleteAction extends BaseRefereeAction
{
    use AsAction;

    /**
     * Delete a referee.
     */
    public function handle(Referee $referee): void
    {
        $this->refereeRepository->delete($referee);
    }
}
