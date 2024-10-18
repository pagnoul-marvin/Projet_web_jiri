<?php

namespace App\Listeners;

use App\Events\ContactPhotoStored;
use App\Traits\HasPhotoVariants;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class CreateContactPhotoVariants implements ShouldQueue
{
    use HasPhotoVariants;

    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(ContactPhotoStored $event): void
    {
        $this->makeImageVariants($event->validated);
    }
}
