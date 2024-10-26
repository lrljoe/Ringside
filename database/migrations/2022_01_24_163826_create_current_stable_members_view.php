<?php

use App\Models\Stable;
use Illuminate\Database\Migrations\Migration;
use Staudenmeir\LaravelMergedRelations\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::createOrReplaceMergeView(
            'current_stable_members',
            [(new Stable)->currentTagTeams(), (new Stable)->currentWrestlers(), (new Stable)->currentManagers()]
        );
    }
};
