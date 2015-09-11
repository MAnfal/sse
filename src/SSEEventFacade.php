<?php 
namespace MAnfal\sse;

use Illuminate\Support\Facades\Facade;

class SSEEventFacade extends Facade {

    protected static function getFacadeAccessor()
    {
        return 'SSEEvent';
    }

}