<?php

declare(strict_types=1);

namespace App\Models;

use App\Builders\RefereeQueryBuilder;
use App\Enums\RefereeStatus;
use App\Models\Contracts\Employable;
use App\Models\Contracts\Injurable;
use App\Models\Contracts\Retirable;
use App\Models\Contracts\Suspendable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Referee extends Model implements Employable, Injurable, Retirable, Suspendable
{
    use Concerns\HasEmployments;
    use Concerns\HasInjuries;
    use Concerns\HasRetirements;
    use Concerns\HasSuspensions;
    use HasFactory;
    use SoftDeletes;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'first_name',
        'last_name',
        'status',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'status' => RefereeStatus::class,
    ];

    /**
     * The model's default values for attributes.
     *
     * @var array
     */
    protected $attributes = [
        'status' => RefereeStatus::UNEMPLOYED->value,
    ];

    /**
     * Create a new Eloquent query builder for the model.
     */
    public function newEloquentBuilder($query): RefereeQueryBuilder
    {
        return new RefereeQueryBuilder($query);
    }

    /**
     * Check to see if the model is bookable.
     */
    public function isBookable(): bool
    {
        if ($this->isNotInEmployment() || $this->isSuspended() || $this->isInjured() || $this->hasFutureEmployment()) {
            return false;
        }

        return true;
    }

    /**
     * Determine if the model can be retired.
     */
    public function canBeRetired(): bool
    {
        if ($this->isNotInEmployment()) {
            return false;
        }

        return true;
    }

    public function getIdentifier(): string
    {
        return "{$this->first_name} {$this->last_name}";
    }
}
