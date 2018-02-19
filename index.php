<!DOCTYPE html>
<html>
<head>
	<title>Hacker Simulator</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="/static/css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Ubuntu+Mono" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
</head>
<body onload="horas()">
	<header>
		<h1 id="data">0:00</h1>
	</header>

	<div class="task">
		<button id="app">
			<img src="https://cdn1.iconfinder.com/data/icons/logotypes/32/internet-explorer-512.png"/>
		</button>
	</div>

<div class="janela" id="janela">
<div id="header-janela">
	<p id="close"><span>X</span></p>
</div>

<div id="application">


		</div>
</div>

</div>

<div class="background"></div>

</body>

<script>
   $(document).ready(function() {
    $("#app").click(function() {
        var app = 1;
        $.post("/static/php/open.php", {app: app},
        function(data){
         $("#application").html(data);
         }
         , "html");
         return false;
    });
});
</script>

<script src="static/js/system.js"></script>s

</html>