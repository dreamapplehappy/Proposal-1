$(function(){
	$(".list-group-item").each(function(){
		$(this).addClass("importance"+$(this).children(".imp").text().toString());
		$(this).find("span.glyphicon-fire").addClass("fire"+$(this).children(".imp").text().toString());
	})
});