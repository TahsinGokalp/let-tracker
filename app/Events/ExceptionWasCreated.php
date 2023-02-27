<?php

namespace App\Events;

use App\Models\Exception;
use Illuminate\Broadcasting\InteractsWithSockets;
use Illuminate\Queue\SerializesModels;

class ExceptionWasCreated
{
    use InteractsWithSockets, SerializesModels;

    public $exception;

    /**
     * Create a new event instance.
     */
    public function __construct(Exception $exception)
    {
        $this->exception = $exception;
    }
}
