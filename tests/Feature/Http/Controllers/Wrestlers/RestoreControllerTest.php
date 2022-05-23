<?php

declare(strict_types=1);

namespace Tests\Feature\Http\Controllers\Wrestlers;

use App\Enums\Role;
use App\Http\Controllers\Wrestlers\RestoreController;
use App\Http\Controllers\Wrestlers\WrestlersController;
use App\Models\Wrestler;
use Tests\TestCase;

/**
 * @group wrestlers
 * @group feature-wrestlers
 * @group roster
 * @group feature-roster
 */
class RestoreControllerTest extends TestCase
{
    public Wrestler $wrestler;

    protected function setUp(): void
    {
        parent::setUp();

        $this->wrestler = Wrestler::factory()->softDeleted()->create();
    }

    /**
     * @test
     */
    public function invoke_restores_a_deleted_wrestler_and_redirects()
    {
        $this
            ->actAs(ROLE::ADMINISTRATOR)
            ->patch(action([RestoreController::class], $this->wrestler))
            ->assertRedirect(action([WrestlersController::class, 'index']));

        $this->assertNull($this->wrestler->fresh()->deleted_at);
    }

    /**
     * @test
     */
    public function a_basic_user_cannot_restore_a_wrestler()
    {
        $this
            ->actAs(ROLE::BASIC)
            ->patch(action([RestoreController::class], $this->wrestler))
            ->assertForbidden();
    }

    /**
     * @test
     */
    public function a_guest_cannot_restore_a_wrestler()
    {
        $this
            ->patch(action([RestoreController::class], $this->wrestler))
            ->assertRedirect(route('login'));
    }
}
