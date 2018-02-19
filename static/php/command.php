<?php
require '../system/database.php';
require '../system/config.php';
if(isset($_COOKIE['iduser']) and (isset($_COOKIE['inisession']))){
	$iduser = DBEscape( strip_tags(trim($_COOKIE['iduser']) ) );
$user = DBRead('user', "WHERE id = '{$iduser}' LIMIT 1 ");
$user = $user[0];
?>
<?php
$comando = $_POST['command'];
if($comando == "ifconfig"){
?>

<p class="comando">Configuração de IP do OS <br> Adaptador Ethernet Ethernet 2: <br>   Estado da mídia. . . . . . . . . . . . . .  : mídia desconectada<br>
   Sufixo DNS específico de conexão. . . . . . :<br> Adaptador Ethernet Ethernet: <br>  Sufixo DNS específico de conexão. . . . . . : <br>  Endereço IPv6 de link local . . . . . . . . : fe80::fcd4:16d8:1bd4:627f%10 <br>  Endereço IPv4. . . . . . . .  . . . . . . . : 192.168.1.100 <br>  Máscara de Sub-rede . . . . . . . . . . . . : 255.255.255.0 <br>  Gateway Padrão. . . . . . . . . . . . . . . : 192.168.1.1 <br> IP. . . . . . . . . . . . . . . :<?php echo $user['ip']; ?> </p>

<?php } else{ ?>
<p class="comando">Command not found</p>
<?php } ?> 

<?php } ?>