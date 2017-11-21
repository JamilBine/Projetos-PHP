// JavaScript Document

$(function(){
	$('.links a').click(function(){
	var classe = $(this).attr('title');
		$('#jogos').removeClass().addClass(classe);
	})
})