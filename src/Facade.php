<?php namespace MAnfal\sse;

use Illuminate\Support\Facades\Facade;

class ImageuploadFacade extends Facade {

    protected static function getFacadeAccessor()
    {
        return 'SSE';
    }

}