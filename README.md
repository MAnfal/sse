# sse
SSE is a Laravel PHP Library for implementing asynchronous Server Side Events and pass them on to views.

Laravel Supported versions
--------------------------
Laravel: 5.1

Installing SSE
--------------
Download SSE package from github and extract zip file in vendor under MAnfal/sse folder.

place following service provider in config/app.php folder under providers array.

```bash
	'MAnfal\sse\SSEServiceProvider'
```
place following facades in config/app.php folder under aliases array.

```bash
	'SSE' => 'MAnfal\sse\SSEFacade',
	'SSEEvent' => 'MAnfal\sse\SSEEventFacade'
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

5. Refresh your browser and see updation of time in realtime.

Warning
-------
This package is still under development and events other than TimeEvents are yet to  be added.