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
			<img src="/img/paypal.png"/>
			</button>

			<div class="background51"></div>
		</div>

		<div id="paypalbaka">
			<div class="header-paypal">
				<div id="align">
				<img src="/img/logopaypal.png" class="logopaypal"/>
			</div>
			</div>

	<div id="align">
			<img src="/img/avatar.png" class="avatarpaypal">
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
          
         }, 1);

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

<?php
$app = $_POST['app'];
if($app == 4){
?>

<div class="mail">


<div id="viewmsg">
</div>

<div class="mensagen center">
  <h1>Mensagens</h1>
  <?php
$idusermail = $user['id'];
$resultsearchs2 = DBRead( 'mail', "WHERE iduser = '{$idusermail}'  LIMIT 1000" );
 if (!$resultsearchs2)
 echo '<h1>Nenhum E-mail</h1>';
else
foreach ($resultsearchs2 as $resultsearch2):
?>
<li id="viewmsg<?php echo $resultsearch2['id'];  ?>">
  <h1 class="title-m"><?php
  $str2 = nl2br( $resultsearch2['title'] );
  $len2 = strlen( $str2 );
  $max2 = 24;
   if( $len2 <= $max2 )
   echo $str2;
  else    
   echo substr( $str2, 0, $max2 ) . '...'?></h1>
    <p><?php
  $str2 = nl2br( $resultsearch2['texto'] );
  $len2 = strlen( $str2 );
  $max2 = 100;
   if( $len2 <= $max2 )
   echo $str2;
  else    
   echo substr( $str2, 0, $max2 ) . '...'?></p>
</li>

<script type="text/javascript">
  var viewmsg = document.getElementById('viewmsg');
   $(document).ready(function() {
    $("#viewmsg<?php echo $resultsearch2['id'];  ?>").click(function() {
      viewmsg.style = "opacity: 1;";
        var idmsg = <?php echo $resultsearch2['id'];  ?>;
        $.post("/static/php/open.php?mailviews=<?php echo $resultsearch2['id'];  ?>", {msg: idmsg},
        function(data){
         $("#viewmsg").html(data);
         }
         , "html");
         return false;
    });
});
</script>

<?php endforeach; ?>
 </div>



<div class="panel left">
<p class="mas">Mail</p>
<li id="sendmsg"> + Enviar e-mail</li>
<li class="ativo"><?php echo $user['email'];?></li>
</div>

</div>

<script>
var janela = document.getElementById('janela');
var paypalbuy = document.getElementById('paypalbuy');
janela.style = "opacity: 1; left: 0";
 $('#close').click(function(){
        	 janela.style = "left: -2000px"
   		 });
</script>

<?php } ?>

 <?php
if(isset($_GET['mailviews'])){
  if(isset($_POST['msg'])){
?>


  <h1>Visualizando mensagem.</h1>
  <?php
$idusermail = $user['id'];
$mailid = $_POST['msg'];
$resultsearchs23 = DBRead( 'mail', "WHERE id = '{$mailid}' and iduser = '{$idusermail}'  LIMIT 1" );
 if (!$resultsearchs23)
 echo '<h1>Nenhum E-mail</h1>';
else
foreach ($resultsearchs23 as $resultsearch23):
?>

 <h1 class="title-m"><?php echo $resultsearch23['title'];?></h1>

  <p><?php echo $resultsearch23['texto'];?></p>

<?php endforeach; } } ?>