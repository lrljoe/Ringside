<?php

namespace App\Exceptions;

use Exception;

class CannotBeActivatedException extends Exception
{
    protected $message = 'This entity cannot be activated. This entity is currently active.';

    /**
     * Render the exception into an HTTP response.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function render($request)
    {
        if ($request->expectsJson()) {
            return response()->json(['message' => $this->message], 400);
        }

        return back()->withError($this->message);
    }
}
