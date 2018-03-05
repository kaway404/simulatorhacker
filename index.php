<!DOCTYPE html>
<?php
require 'static/system/database.php';
require 'static/system/config.php';
if(isset($_COOKIE['iduser']) and (isset($_COOKIE['inisession']))){
$iduser = DBEscape( strip_tags(trim($_COOKIE['iduser']) ) );
$user = DBRead('user', "WHERE id = '{$iduser}' LIMIT 1 ");
$user = $user[0];
}
?>
<html>
<head>
	<title>Hacker Simulator</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="/static/css/style.css">
	<link href="https://fonts.googleapis.com/css?family=Ubuntu+Mono" rel="stylesheet">
	<script type="text/javascript" src="static/js/jquery-3.3.1.min.js"></script>
</head>
<body onload="horas()">
	<header>
        <p id="opena">Applications</p>
        <div id="menu">
        <li id="appa">
        <h2>Browser</h2>
        <button class="app">
            <img src="img/internet-explorer-512.png"/>
        </button>
    </li>
    <li id="appa2">
        <h2>Terminal</h2>
        <button class="app">
            <img src="img/termina.png"/>
        </button>
    </li>
    <li id="appa3">
        <h2>BitCoin</h2>
        <button class="app">
            <img src="img/bitcoin.png"/>
        </button>
    </li>
    <li id="appa4">
        <h2>Mailer</h2>
         <button class="app">
            <img src="img/thumb_Mail-2.png"/>
        </button>
    </li>
        </div>
		<h1 id="data">0:00</h1>
	</header>

	<div class="task">
		<button class="app" id="app">
			<img src="img/internet-explorer-512.png"/>
		</button>
		<button class="app" id="app2">
			<img src="img/termina.png"/>
		</button>
        <button class="app" id="app3">
            <img src="img/bitcoin.png"/>
        </button>
         <button class="app" id="app4">
            <img src="img/thumb_Mail-2.png"/>
        </button>
	</div>

<div class="janela" id="janela">
<div id="header-janela">
	<p id="close"><span>X</span></p>
</div>

<div id="application"></div>

</div>



</div>

<?php 
if(empty($_COOKIE['iduser']) and (empty($_COOKIE['inisession']))){
?>
<div class="msg">

<div class="popup">
<p>Você já tem uma conta? Faça o Login abaixo</p>
<form>
<input type="email" id="emaill" placeholder="E-mail">
<input type="password" id="senhal" placeholder="Senha">
<input type="submit" value="Login" class="btn" id="login">
</form>
<p>Ou registra-se aqui.</p>
<form>
<input type="email" id="emailr" placeholder="E-mail">
<input type="password" id="senhar" placeholder="Senha">
<input type="text" id="nomer" placeholder="Nome">
<input type="text" id="sobrenomer" placeholder="Sobrenome">
<input type="submit" value="Registrar" class="btn" id="registro">
</form>
<div id="resposta"></div>

</div>

</div>

<?php } ?>

<div class="background"></div>

</body>
<?php
if(isset($_COOKIE['iduser']) and (isset($_COOKIE['inisession']))){
?>
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

   $(document).ready(function() {
    $("#app2").click(function() {
        var app = 2;
        $.post("/static/php/open.php", {app: app},
        function(data){
         $("#application").html(data);
         }
         , "html");
         return false;
    });
});

     $(document).ready(function() {
    $("#app3").click(function() {
        var app = 3;
        $.post("/static/php/open.php", {app: app},
        function(data){
         $("#application").html(data);
         }
         , "html");
         return false;
    });
});

          $(document).ready(function() {
    $("#app4").click(function() {
        var app = 4;
        $.post("/static/php/open.php", {app: app},
        function(data){
         $("#application").html(data);
         }
         , "html");
         return false;
    });
});

 $(document).ready(function() {
    $("#appa").click(function() {
        var app = 1;
        $.post("/static/php/open.php", {app: app},
        function(data){
         $("#application").html(data);
         }
         , "html");
         return false;
    });
});

 $(document).ready(function() {
    $("#appa2").click(function() {
        var app = 2;
        $.post("/static/php/open.php", {app: app},
        function(data){
         $("#application").html(data);
         }
         , "html");
         return false;
    });
});

 $(document).ready(function() {
    $("#appa3").click(function() {
        var app = 3;
        $.post("/static/php/open.php", {app: app},
        function(data){
         $("#application").html(data);
         }
         , "html");
         return false;
    });
});

 $(document).ready(function() {
    $("#appa4").click(function() {
        var app = 4;
        $.post("/static/php/open.php", {app: app},
        function(data){
         $("#application").html(data);
         }
         , "html");
         return false;
    });
});
      
</script>
<?php } ?> 

<script src="static/js/system.js"></script>

</html>