$(function(){
	$(".list-group-item").each(function(){
		$(this).addClass("importance"+$(this).children(".imp").text().toString());
	})
});