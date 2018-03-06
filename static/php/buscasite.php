 <?php
 require '../system/database.php';
require '../system/config.php';
if(isset($_COOKIE['iduser']) and (isset($_COOKIE['inisession']))){
  if(isset($_POST['busca'])){
?>


  <?php
$site = $_POST['busca'];
$resultsearchs212 = DBRead( 'sites', "WHERE title LIKE '%$site%' and ativo = 1 ORDER BY id DESC LIMIT 50" );
 if (!$resultsearchs212)
 echo '<h1>Nenhuma busca encontrada</h1>';
else
foreach ($resultsearchs212 as $resultsearch212):
?>

<li id="site<?php echo $resultsearch212['id']; ?>">
<p><?php echo $resultsearch212['title'];?></p>
<br>
<p><?php echo $resultsearch212['url'];?></p>
</li>


<script type="text/javascript">
	var nani = document.getElementById('nani');
   $(document).ready(function() {
    $("#site<?php echo $resultsearch212['id'];  ?>").click(function() {
    	nani.style = "display: none;";
        var site = <?php echo $resultsearch212['id'];  ?>;
        $.post("/static/php/viewsite.php", {site: site},
        function(data){
         $("#viewsite").html(data);
         }
         , "html");
         return false;
    });
});
</script>



<?php endforeach; } }  ?>

