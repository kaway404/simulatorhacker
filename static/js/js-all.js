$("document").ready(function(){
  $("#busca").keyup(function(){
	var $this = $(this);
	var val   = $this.val();
	console.log(val);
	
	if(val == ""){
		$('.src').html("");
	}else{
		$.ajax({
		  url: "/static/php/buscasite.php",
		  type: "POST",
		  data: {busca: val},
		  cache: false,
		  
		  success: function(res){
			$('.src').html(res);
		  }
		  
		});
	}
	
  });
  
  
});
