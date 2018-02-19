<?php
require '../system/database.php';
require '../system/config.php';
if(isset($_COOKIE['iduser']) and (isset($_COOKIE['inisession']))){
$iduser = DBEscape( strip_tags(trim($_COOKIE['iduser']) ) );
$user = DBRead('user', "WHERE id = '{$iduser}' LIMIT 1 ");
$user = $user[0];
}
?>
<?php
$app = $_POST['app'];
if($app == 1){
?>

		<div class="internet" id="browser">
		<center>
		<div id="baka">
		<input type="text" class="search" value="about:blank" id="urlado"/>
		</center>

		<div id="suger">
			<h1>Sites sugeridos</h1>
			<button class="appbrowser" id="paypal">
			<img src="https://www.paypalobjects.com/webstatic/icon/pp258.png"/>
			</button>

			<div class="background51"></div>
		</div>

		<div id="paypalbaka">
			<div class="header-paypal">
				<div id="align">
				<img src="https://cdn.pixabay.com/photo/2015/05/26/09/37/paypal-784404_960_720.png" class="logopaypal"/>
			</div>
			</div>

	<div id="align">
			<img src="http://www.contiki.com/img/default_avatar.png?1516975667" class="avatarpaypal">
			<p class="bakata"><?php echo $user['nome'];?> <?php echo $user['sobrenome'];?></p>
<div class="saldopaypal">
<p class="pp">Saldo PayPal</p>
<br>
<h2>R$ <?php echo $user['paypal_count'];?></h2>
</div>

<div class="completado">
<p class="comp">Completado</p>
</div>

	</div>


		</div>


		</div>

<script>
var janela = document.getElementById('janela');
var url = document.getElementById('janela');
var internet = document.getElementById('suger');
var apppaypal = document.getElementById('paypalbaka');
janela.style = "opacity: 1; left: 0";

 $('#paypal').click(function(){
        	 document.getElementById("urlado").value = "https://paypal.com";
   		 });

 window.setInterval(function(){
if(document.getElementById("urlado").value == "https://paypal.com") {
             internet.style = "display: none;"
             apppaypal.style = "display: block;"
      }
      else{
      	 internet.style = "display: block;"
         apppaypal.style = "display: none;"
      }
          
         }, 100);

 $('#close').click(function(){
        	 janela.style = "left: -2000px"
   		 });

</script>

<?php } ?>

<?php
$app = $_POST['app'];
if($app == 2){
?>

<div class="back-consolo">
	<p style="color: #fff; padding: 5px; font-size: 19px;">Terminal</p>
	<div id="te"><p style="color: #fff;"><?php echo $user['ip']; ?></p>
		<form>
		<input type="text" class="terminalc" id="command" placeholder="command">
		<input type="submit" id="okay" style="opacity: 0;">
	</form>
	</div>
	<div id="comando"></div>
</div>

<script>
var janela = document.getElementById('janela');
janela.style = "opacity: 1; left: 0";
 $('#close').click(function(){
        	 janela.style = "left: -2000px"
   		 });

    $(document).ready(function() {
    $("#okay").click(function() {
        var command = $("#command");
        var commandPost = command.val();
        $.post("/static/php/command.php", {command: commandPost},
        function(data){
         $("#comando").html(data);
         }
         , "html");
         return false;
    });
});
</script>

<?php } ?>