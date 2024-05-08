<?php

namespace App\Listeners;

use App\Events\UpdateCreditEvent;
use App\Models\Credit;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class UpdateCreditEventListener
{

    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
    }

    /**
     * Handle the event.
     *
     * @param UpdateCreditEvent $event
     * @return void
     */
    public function handle(UpdateCreditEvent $event): void
    {
        $credit = $event->getItem();
        $credit->update();
    }
}
