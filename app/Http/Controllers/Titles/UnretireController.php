<?php

namespace App\Http\Controllers\Titles;

use App\Actions\Titles\UnretireAction;
use App\Exceptions\CannotBeUnretiredException;
use App\Http\Controllers\Controller;
use App\Models\Title;

class UnretireController extends Controller
{
    /**
     * Unretires a title.
     *
     * @param  \App\Models\Title $title
     *
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(Title $title)
    {
        $this->authorize('unretire', $title);

        throw_unless($title->canBeUnretired(), new CannotBeUnretiredException);

        UnretireAction::run($title);

        return redirect()->route('titles.index');
    }
}
