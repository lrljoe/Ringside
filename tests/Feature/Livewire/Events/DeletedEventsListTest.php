<?php

declare(strict_types=1);

use App\Livewire\Events\DeletedEventsList;
use Livewire\Livewire;

test('it should return correct view', function () {
    Livewire::test(DeletedEventsList::class)
        ->assertViewIs('livewire.events.deleted-events-list');
});

test('it should pass correct data', function () {
    Livewire::test(DeletedEventsList::class)
        ->assertViewHas('events');
});
