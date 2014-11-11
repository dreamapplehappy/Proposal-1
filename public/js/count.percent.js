$(function(){
	$like = parseInt($(".progress-bar").text());
	$like += '%';
	$(".progress-bar").css({"width": $like});

	/*$('#vote').click(function(){
		$like = parseInt($("#vote-count").text()) * 4;
		$(".progress-bar").text($like+"%");
		$like += '%';
		$(".progress-bar").css({"width": $like});
	});*/
});

