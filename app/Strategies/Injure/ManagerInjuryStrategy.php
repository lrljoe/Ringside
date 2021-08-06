<?php

namespace App\Strategies\Injure;

use App\Exceptions\CannotBeInjuredException;
use App\Models\Contracts\Injurable;

class ManagerInjuryStrategy extends BaseInjuryStrategy implements InjuryStrategyInterface
{
    /**
     * The interface implementation.
     *
     * @var \App\Models\Contracts\Injurable
     */
    private Injurable $injurable;

    /**
     * Create a new manager injury strategy instance.
     *
     * @param \App\Models\Contracts\Injurable $injurable
     */
    public function __construct(Injurable $injurable)
    {
        $this->injurable = $injurable;
    }

    /**
     * Injure an injurable model.
     *
     * @param  string|null $injuredAt
     * @return void
     */
    public function injure(string $injuredAt = null)
    {
        throw_unless($this->injurable->canBeInjured(), new CannotBeInjuredException);

        $injuredDate = $injuredAt ?? now()->toDateTimeString();
        $this->repository->injure($this->injurable, $injuredDate);
        $this->injurable->updateStatusAndSave();
    }
}
