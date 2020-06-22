	$(document).ready(function(){
		var div_box = "<div id='load-screen'><div id='loading'></div></div>";
		$("body").prepend(div_box);
		$('#load-screen').delay(700).fadeOut(600, function(){
			$(this).remove();
		});
	});
	
	function loadUsersOnline(){
		
		$.get("function.php?onlineusers=result", function(data){
			$(".useronline").text(data);	
	  });
	}
	
	setInterval(function(){
		loadUsersOnline();
	}, 500);
	
	loadUsersOnline();