<?php namespace MAnfal\sse;

use Illuminate\Support\Facades\Facade;

class SSEFacade extends Facade {

    protected static function getFacadeAccessor()
    {
        return 'WSSE';
    }

}