<?php

declare(strict_types=1);

use App\Data\EventData;
use App\Models\Event;
use App\Models\Venue;
use App\Repositories\EventRepository;
use Illuminate\Support\Carbon;

test('creates an event', function () {
    $data = new EventData('Example Event Name', null, null, null);

    (new EventRepository)->create($data);

    expect(Event::latest()->first())
        ->name->toEqual('Example Event Name')
        ->date->toBeNull()
        ->venue_id->toBeNull()
        ->preview->toBeNull();
});

test('it creates an event with with a date', function () {
    $data = new EventData('Example Event Name', $date = Carbon::tomorrow(), null, null);

    (new EventRepository)->create($data);

    expect(Event::latest()->first())
        ->name->toBe('Example Event Name')
        ->date->toEqual($date->toDateTimeString())
        ->venue_id->toBeNull()
        ->preview->toBeNull();
});

test('it creates an event with with a date and venue', function () {
    $venue = Venue::factory()->create();
    $data = new EventData('Example Event Name', $date = Carbon::tomorrow(), $venue, null);

    (new EventRepository)->create($data);

    expect(Event::latest()->first())
        ->name->toBe('Example Event Name')
        ->date->toEqual($date->toDateTimeString())
        ->venue_id->toBe($venue->id)
        ->preview->toBeNull();
});

test('it creates an event with with a date and venue and preview', function () {
    $date = Carbon::tomorrow();
    $venue = Venue::factory()->create();
    $preview = fake()->paragraph();
    $data = new EventData('Example Event Name', $date, $venue, $preview);

    (new EventRepository)->create($data);

    expect(Event::latest()->first())
        ->name->toBe('Example Event Name')
        ->date->toEqual($date->toDateTimeString())
        ->venue_id->toBe($venue->id)
        ->preview->toEqual($preview);
});

test('it can delete an event', function () {
    $event = Event::factory()->create();

    (new EventRepository)->delete($event);

    expect($event->fresh())
        ->deleted_at->not->toBeNull();
});

test('it can restore a trashed event', function () {
    $event = Event::factory()->trashed()->create();

    (new EventRepository)->restore($event);

    expect($event->fresh())
        ->deleted_at->toBeNull();
});
