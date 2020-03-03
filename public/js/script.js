$('document').ready(function(){

	$('#form').hide();
	$('#enreg').hide();
	//$("#ferm").hide();

	$("#modif").click(function(){

		$("#modif").hide(2000);
		$("#form").show(2000);
		$('#enreg').show(2000);

	});

	$(".cacher").click(function(){

		$("#modif").show(2000);
		$("#form").hide(2000);
		$('#enreg').hide(2000);

	});

});