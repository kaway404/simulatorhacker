  <?php
 require '../system/database.php';
require '../system/config.php';
if(isset($_COOKIE['iduser']) and (isset($_COOKIE['inisession']))){
?>


<?php
$dbCheck = DBRead( 'conquistas', "WHERE iduser = '".$_COOKIE['iduser']."' and idconq = 2 ORDER BY id DESC LIMIT 1" );
if( $dbCheck ){
echo "";
}
else{
?>
<?Php
$iduser = DBEscape( strip_tags(trim($_COOKIE['iduser']) ) );
	$okup['iduser'] = $_COOKIE['iduser'];
    $okup['idconq'] = '2';
 	$okemail['iduser'] = $_COOKIE['iduser'];
    $okemail['title'] = 'Conquista liberada';
    $okemail['texto'] = 'Essa conquista, você liberou ao acessar um site.';
   	if( DBCreate( 'mail', $okemail, "id = '{$iduser}'" ) ){
   		echo '';
   	}
   	if( DBCreate( 'conquistas', $okup, "id = '{$iduser}'" ) ){
   		echo '';
   	}
   ?>

<script type="text/javascript">
var notifica = document.getElementById('notifica');
notifica.style = "opacity: 1; bottom: 50px";
$("#msgnotifica").text("Nova conquista");
</script>

<?Php } ?>


  <?php
$idsite = $_POST['site'];
$resultsearchs23 = DBRead( 'sites', "WHERE id = '{$idsite}'  LIMIT 1" );
 if (!$resultsearchs23)
 echo '<h1>Nenhum E-mail</h1>';
else
foreach ($resultsearchs23 as $resultsearch23):
?>

<?php echo $resultsearch23['html']; ?>

<?php  endforeach ; }   ?>
