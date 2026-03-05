<?php

require_once "router.php";

echo "<h2>Output</h2><pre>";
Router::routes_from_toml('routes.toml');
echo "</pre>";

echo <<<CONTENT
<body>
	<style>
		body {
			background: #000000;
			color: #f0f0f0;
		}

		a {
			color: #f0f0f0;
		}
	</style>
	<p><a href="/address">Redirect</a></p>
	<p>
		<a href="/address?q=query">Query</a>
	</p>
</body>
CONTENT;
