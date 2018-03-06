<?php
require '../system/database.php';
require '../system/config.php';
if(isset($_COOKIE['iduser']) and (isset($_COOKIE['inisession']))){
$iduser = DBEscape( strip_tags(trim($_COOKIE['iduser']) ) );
$user = DBRead('user', "WHERE id = '{$iduser}' LIMIT 1 ");
$user = $user[0];
$paypalba = $user['paypal_count'];
$conquista = DBRead('conquistas', "WHERE iduser = '{$iduser}' LIMIT 1 ");

$url = "https://bitpay.com/api/rates";
$json = file_get_contents($url);
$data = json_decode($json, TRUE);

$bitcoin_price = $data[30]["rate"];
$brl_value = $user['paypal_count'];
$value_bitcoin = round($brl_value / $bitcoin_price, 8);

$menospaypal = $user['paypal_count'] - $user['paypal_count'];

$userUP['paypal_count'] = $menospaypal;
$userUP['btc_count'] = $value_bitcoin + $user['btc_count'];


 $tranok['iduser'] = $_COOKIE['iduser'];
 $tranok['amount'] = $user['paypal_count'];
 $tranok['status'] = 'Aprovado';
if( DBCreate( 'transacao', $tranok, "id = '{$iduser}'" ) ){
 echo '';
}

if( DBUpdate( 'user', $userUP, "id = '{$iduser}'" ) ){
?>

<?php
$dbCheck = DBRead( 'conquistas', "WHERE iduser = '".$_COOKIE['iduser']."' and idconq = 1 ORDER BY id DESC LIMIT 1" );
if( $dbCheck ){
echo "";
}
else{
?>

<script type="text/javascript">
var notifica = document.getElementById('notifica');
notifica.style = "opacity: 1; bottom: 50px";
$("#msgnotifica").text("Nova conquista");
</script>

<?php
    $okup['iduser'] = $_COOKIE['iduser'];
    $okup['idconq'] = '1';
    $okemail['iduser'] = $_COOKIE['iduser'];
    $okemail['title'] = 'Conquista liberada';
    $okemail['texto'] = 'Essa conquista, você liberou ao comprar BitCoin';
    if( DBCreate( 'conquistas', $okup, "id = '{$iduser}'" ) ){
      echo 'ok';
    }
    if( DBCreate( 'mail', $okemail, "id = '{$iduser}'" ) ){
      echo 'ok';
    }
   else{
    echo '';
   }
} ?>



<p>Você comprou <?php echo $value_bitcoin; ?> <br> pelo valor de R$ <?php echo $user['paypal_count'];?> </p>
<script>
	$("#carteirabtc").text("<?php echo $valorbtcnow; ?>");
	$("#carteirapaypal").text("<?php echo $menospaypal; ?>");
	$("#pyp").text("<?php echo $menospaypal; ?>");
</script>
<?php } } ?>