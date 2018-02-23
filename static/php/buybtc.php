<?php
require '../system/database.php';
require '../system/config.php';
if(isset($_COOKIE['iduser']) and (isset($_COOKIE['inisession']))){
$iduser = DBEscape( strip_tags(trim($_COOKIE['iduser']) ) );
$user = DBRead('user', "WHERE id = '{$iduser}' LIMIT 1 ");
$user = $user[0];
$paypalba = $user['paypal_count'];

$url = "https://bitpay.com/api/rates";
$json = file_get_contents($url);
$data = json_decode($json, TRUE);

$bitcoin_price = $data[30]["rate"];
$brl_value = $user['paypal_count'];
$value_bitcoin = round($brl_value / $bitcoin_price, 8);

$menospaypal = $user['paypal_count'] - $user['paypal_count'];

$userUP['paypal_count'] = $menospaypal;
$userUP['btc_count'] = $user['btc_count'] + $value_bitcoin;
if( DBUpdate( 'user', $userUP, "id = '{$iduser}'" ) ){
?>
<p>Você comprou <?php echo $value_bitcoin; ?></p>
<script>
	$("#carteirabtc").text("<?php echo $value_bitcoin; ?>");
	$("#carteirapaypal").text("<?php echo $menospaypal; ?>");
	$("#pyp").text("<?php echo $menospaypal; ?>");
</script>
<?php } } ?>