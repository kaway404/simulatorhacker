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
				<img src="https://fwab.org/wp-content/uploads/Paypal-logo-1.png" class="logopaypal"/>
			</div>
			</div>

	<div id="align">
			<img src="http://www.contiki.com/img/default_avatar.png?1516975667" class="avatarpaypal">
			<p class="bakata"><?php echo $user['nome'];?> <?php echo $user['sobrenome'];?></p>
<div class="saldopaypal">
<p class="pp">Saldo PayPal</p>
<br>
<h2 id="carteirapaypal">R$ <?php echo $user['paypal_count'];?></h2>
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
if(document.getElementById("urlado").value === "https://paypal.com") {
             internet.style = "display: none;"
             apppaypal.style = "display: block;"
      }
     else if(document.getElementById("urlado").value === "https://google.com") {
             internet.style = "display: none;"
             apppaypal.style = "display: block;"
      }
      else{
      	 internet.style = "display: block;"
         apppaypal.style = "display: none;"
      }
          
         }, 10);

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
	<div id="comando">
		<div class="space"></div>
<div id="flash"></div>
<div id="show"></div>
	</div>
</div>

<script>
var janela = document.getElementById('janela');
janela.style = "opacity: 1; left: 0";
 $('#close').click(function(){
        	 janela.style = "left: -2000px"
   		 });


$(function() {
$("#okay").click(function() {
var textcontent = $("#command").val();
var dataString = 'content='+ textcontent;
if(textcontent=='')
{
$("#content").focus();
}
else
{
$.ajax({
type: "POST",
url: "static/php/command.php",
data: dataString,
cache: true,
success: function(html){
$("#show").after(html);
document.getElementById('content').value='';
$("#flash").hide();
$("#content").focus();
}  
});
}
return false;
});
});
</script>

<?php } ?>

<?php
$app = $_POST['app'];
if($app == 3){
?>
<div class="bitcoin">
<center>
<h1>Minha carteira BitCoin</h1>

<p id="carteirabtc"><?php echo $user['btc_count'];?></p>

<button class="buy" id="buy">Buy BitCoin with PayPal</button>

<div class="paypalbuy" id="paypalbuy">

<p>Você tem R$ <span id="pyp"> <?php echo $user['paypal_count'];?></span> em saldo PayPal</p>

<button class="buy" id="buyok">Converter em BitCoin</button>

<div id="okmsg"></div>

</div>

</center>
</div>
<script>
var janela = document.getElementById('janela');
var paypalbuy = document.getElementById('paypalbuy');
janela.style = "opacity: 1; left: 0";
 $('#close').click(function(){
        	 janela.style = "left: -2000px"
   		 });

  $('#buy').click(function(){
        	 paypalbuy.style = "top: 20px; opacity: 1;"
   		 });

  $(document).ready(function() {
    $("#buyok").click(function() {
        var paypalcount = <?php echo $user['paypal_count'];?>;
        $.post("/static/php/buybtc.php?nani=404", {paypalcount: paypalcount},
        function(data){
         $("#okmsg").html(data);
         }
         , "html");
         return false;
    });
});


 </script>
<?php } ?>