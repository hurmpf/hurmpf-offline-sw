<!doctype html>
<html<?php if(isset($_GET['appcache'])) echo ' manifest="offline.php?appcache"'; ?>>
<head>
<meta charset="UTF-8">
<link rel="shortcut icon" href="data:image/x-icon;," type="image/x-icon"> 
<style>
#status { margin: 1em 0; padding: 1em; border: 1px solid black; display: inline-block; }
html, body { font-family:sans-serif; width:100%; height:100%; padding:0; margin:0; }
.screen { width:calc(100%-1em); height:calc(100%-1em); padding:1em; display: none; }
#loading { display: block; }
#notification {
	position: absolute; bottom: 0; right: 0;
	border: 1px solid black; border-radius: 1em 0 0 0; 
}
</style>
<?php
	$hasServiceWorker = (!isset($_GET['appcache']) && !isset($_GET['nocache']));
	if($hasServiceWorker) // add service worker script
		echo '<script src="offline-handler.js"></script>'."\n";
?>
<script src="app-core.js"></script>
</head>
<body>

<div class="screen" id="loading">Loading...</div>

<div class="screen" id="oldbrowser">Please update your browser</div>

<div class="screen" id="home">
	<h1>Offline Test</h1>

	<p><input type="button" value="update SW" onclick="App.workerUpdate()" />
	<input type="button" value="update cache" onclick="App.cacheUpdate()" />
	<input type="button" value="clear cache" onclick="App.cacheReset()" />
	<input type="button" value="status" onclick="App.showOfflineStatus()" />
	<input type="button" value="fix" onclick="App.fix()" />

	<div id="status"></div>
</div>

<div id="notification"></div>

</body>
<html>
