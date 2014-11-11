$(function(){
	$(".form-control").click(function(){
		$(this).parent(".form-group").children(".span").show();
	});
	$("span.span").click(function(){
		$(this).hide();
	});

	$(".form-control").click(function(){
		var reg=new RegExp("/","g");
		var date = new Date($("input.deadline-date").val()).toLocaleDateString();
		date = date.replace(reg, "-");
		var time = $("input.deadline-time").val();
		if(time == ""){
			time = "00:00";
		}
		var deadline = date+" "+time+":00";
		$("#deadline").val(deadline);
	});
});