# sse
SSE is a Laravel wrapper for PHP Library LibSSE for implementing asynchronous Server Sent Events and pass them on to views.

Laravel Supported versions
--------------------------
Laravel: 5.1

Stability
---------
Stable

Installing SSE
--------------

Use composer to download latest package to laravel installation

```bash
	composer require manfal/sse
```

or manually add package in require array of composer.json

```bash
    "manfal/sse": "dev-master"
```

and run

```bash
	composer update
```

place following service provider in config/app.php folder under providers array.

```bash
	'manfal\sse\SSEServiceProvider'
```
place following facades in config/app.php folder under aliases array.

```bash
	'SSE' => 'manfal\sse\SSEFacade',
	'SSEEvent' => 'manfal\sse\SSEEventFacade'
```

Usage
-----
1. Create a new view in resources/views directory, name it ssedemo.blade.php and place following HTML and JS snippet.

```bash
	<span id="time"></span>
	<script>
	var source = new EventSource('{!!url("/ssedemo")!!}');
	var d = document.getElementById('time');
	source.addEventListener('time',function(e){
		var time = e.data;
		d.innerHTML = time;
	},false);
	</script>
```

2. Create a new controller via artisan CLI

```bash
$>	php artisan make:controller SSEDemoController
```

3. Place following code in SSEDemoController

```bash
	<?php
		namespace App\Http\Controllers;

		use Illuminate\Http\Request;

		use App\Http\Requests;
		use App\Http\Controllers\Controller;
		use SSEEvent;
		use SSE;

		class TimeEvent extends SSEEvent {
		    public function update(){
		        return date('l, F jS, Y, h:i:s A');
		    }
		}

		class SSEDemoController extends Controller
		{
		    /**
		     * Display a listing of the resource.
		     *
		     * @return Response
		     */
		    public function index()
		    {
		        return view('ssedemo');
		    }

		    public function sseCheck() {
		            $sse = new SSE();
		            $sse->exec_limit=10;
		            $sse->addEventListener('time',new TimeEvent());
		            $sse->start();
		    }
		}
``` 

4. Create a new route in app/Http/routes.php

```bash
	Route::get('/ssedemo', 'SSEDemoController@sseCheck');
```

5. Refresh your browser.