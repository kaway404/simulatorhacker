<?php
require 'static/system/database.php';
require 'static/system/config.php';
$email = $_POST['remail'];
$senha = DBEscape(strip_tags(trim(sha1($_POST['rsenha']))));
$nome = $_POST['nomer'];
$sobrenome = $_POST['sobrer'];

function validaEmail($email) {
	$conta = "^[a-zA-Z0-9\._-]+@";
	$domino = "[a-zA-Z0-9\._-]+.";
	$extensao = "([a-zA-Z]{2,4})$";
	$pattern = $conta.$domino.$extensao;
	if (ereg($pattern, $email))
	return true;
	else
	return false;
	}

if (!($email) || !($senha) || !($nome) || !($sobrenome) ){
    print "<p>Preencha todos os campos!</p>"; exit();
}
if(!validaEmail($email)){
	print "<p>E-mail invalido</p>"; exit();
}
$dbCheck = DBRead( 'user', "WHERE email = '". $email."'" );
if( $dbCheck ){
	print "<p>Já utilizaram esse email</p>"; exit();
}
else{
//Abrindo Conexao com o banco de dados
$conexao = mysql_pconnect($hostp,$userp,$passwrdp) or die (mysql_error());
$banco = mysql_select_db($dbp);

//Utilizando o  mysql_real_escape_string voce se protege o seu código contra SQL Injection.
$email5 = mysql_real_escape_string($email);
$senha = mysql_real_escape_string($senha);
$inisession = date('Y-m-d');
$datec = date('Y-m-d');
$ip=mysql_real_escape_string($_SERVER['REMOTE_ADDR']);
mysql_query("SET NAMES 'utf8'");
mysql_query('SET character_set_connection=utf8');
mysql_query('SET character_set_client=utf8');
mysql_query('SET character_set_results=utf8');


	$form2['email'] = $email5;
	$form2['senha'] = $senha;
	$form2['nome'] = $nome;
	$form2['sobrenome'] = $sobrenome;
	$form2['inisession'] = $inisession;
	$form2['lastlogin'] = date('Y-m-d H:i:s');
	$form2['datec'] = $datec;
	$form2['ip'] = $ip;
	$form2['paypal_count'] = "20";
	$form2['btc_count'] = "0,0";
	
	if( DBCreate( 'user', $form2 ) ){	
	print "<p>Cadastrado com sucesso!</p>";
	$busca  = "SELECT id FROM hack_user WHERE email = '".$email."'";
	$identificacao = mysql_query($busca);
	$retorno = mysql_fetch_array($identificacao);
	$iduser = $retorno['id'];
	setcookie("iduser", $iduser);
	setcookie("inisession", $inisession);
	echo '<script>location.reload();</script>';
	}
	else{
		echo 'Ocorreu um erro';
	}


}
?>