# sse
SSE is a Laravel PHP Library for implementing asynchronous Server Side Events and pass them on to views.

Laravel Supported versions
--------------------------
Laravel: 5.1

Installing SSE
--------------
Download SSE and extract zip file in vendor under MAnfal/sse folder.

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
1. Create a new view in resources/views directory and place following HTML and JS snippet.

```bash
	<span id="time"></span>
	<script>
	var source = new EventSource('{!!url("/sse")!!}');
	var d = document.getElementById('time');
	source.addEventListener('time',function(e){
		var time = e.data;
		d.innerHTML = time;
	},false);
	</script>
```

2. Setup a route in app/Http/routes.php and assign a method in controller
Warning
-------

This package is still under development.