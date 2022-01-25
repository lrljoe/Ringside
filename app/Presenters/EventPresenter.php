<?php

namespace App\Presenters;

class EventPresenter extends Presenter
{
    /**
     * The event to be presented.
     *
     * @var \App\Models\Event
     */
    protected $model;

    /**
     * Retrieve the formatted event date.
     *
     * @return ?string
     */
    public function date()
    {
        return $this->model->date?->format('F j, Y');
    }
}
