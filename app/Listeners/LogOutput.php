<?php

namespace App\Listeners;

use App\Events\AddedItemCart;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class LogOutput
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  AddedItemCart  $event
     * @return void
     */
    public function handle(AddedItemCart $event)
    {
        \Log::debug("Item added");
    }
}
