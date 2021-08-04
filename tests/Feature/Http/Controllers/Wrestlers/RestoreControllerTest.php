<?php

namespace Tests\Feature\Http\Controllers\Wrestlers;

use App\Enums\Role;
use App\Models\Wrestler;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

/**
 * @group wrestlers
 * @group feature-wrestlers
 * @group srm
 * @group feature-srm
 * @group roster
 * @group feature-roster
 */
class RestoreControllerTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function invoke_restores_a_deleted_wrestler_and_redirects()
    {
        $wrestler = Wrestler::factory()->softDeleted()->create();

        $this->actAs(Role::ADMINISTRATOR)
            ->put(route('wrestlers.restore', $wrestler))
            ->assertRedirect(route('wrestlers.index'));

        $this->assertNull($wrestler->fresh()->deleted_at);
    }

    /** @test */
    public function a_basic_user_cannot_restore_a_wrestler()
    {
        $wrestler = Wrestler::factory()->softDeleted()->create();

        $this->actAs(Role::BASIC)
            ->put(route('wrestlers.restore', $wrestler))
            ->assertForbidden();
    }

    /** @test */
    public function a_guest_cannot_restore_a_wrestler()
    {
        $wrestler = Wrestler::factory()->softDeleted()->create();

        $this->put(route('wrestlers.restore', $wrestler))
            ->assertRedirect(route('login'));
    }
}
