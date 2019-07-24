<?php

namespace Tests\Feature\Generic\Managers;

use App\Models\Manager;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

/**
 * @group managers
 * @group generics
 */
class ReinstateManagerFailureConditionsTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function a_bookable_manager_cannot_be_reinstated()
    {
        $this->actAs('administrator');
        $manager = factory(Manager::class)->states('bookable')->create();

        $response = $this->put(route('managers.reinstate', $manager));

        $response->assertForbidden();
    }

    /** @test */
    public function a_pending_introduction_manager_cannot_be_reinstated()
    {
        $this->actAs('administrator');
        $manager = factory(Manager::class)->states('pending-introduction')->create();

        $response = $this->put(route('managers.reinstate', $manager));

        $response->assertForbidden();
    }

    /** @test */
    public function a_retired_manager_cannot_be_reinstated()
    {
        $this->actAs('administrator');
        $manager = factory(Manager::class)->states('retired')->create();

        $response = $this->put(route('managers.reinstate', $manager));

        $response->assertForbidden();
    }

    /** @test */
    public function an_injured_manager_cannot_be_reinstated()
    {
        $this->actAs('administrator');
        $manager = factory(Manager::class)->states('injured')->create();

        $response = $this->put(route('managers.reinstate', $manager));

        $response->assertForbidden();
    }
}
