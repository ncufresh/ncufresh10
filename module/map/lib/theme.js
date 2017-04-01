// JavaScript Document
function showbox(){
	J("#box").show();
}

function hidebox(){
	J("#box").hide();
	J("div#table").html("");
}

function showtable(id){
	J.ajax({
		url: 'loadcontent.php',
		data:{
			key: id
		},
		success:function(response){
			J("div#table").html(response);
		}
	});
}

function showcontent(id){
	J("div#content").html("");
	J.ajax({
		url: 'loadcontent.php',
		data:{
			key: id
		},
		success:function(response){
			J("div#content").html(response);
            J("div#content").animate({
                scrollTop: 0
            }, 100);
		}
	});
}
function building_showsmp(filename){
	J("#sample").html("");
	J.ajax({
		url: 'building_loadsmp.php',
		data:{
			fname: filename
		},
		success:function(response){
			J("#sample").html(response);
		}
	});
}
function department_showsmp(filename){
	J("#sample").html("");
	J.ajax({
		url: 'department_loadsmp.php',
		data:{
			fname: filename
		},
		success:function(response){
			J("#sample").html(response);
		}
	});
}
function view_showsmp(filename){
	J("#sample").html("");
	J.ajax({
		url: 'view_loadsmp.php',
		data:{
			fname: filename
		},
		success:function(response){
			J("#sample").html(response);
		}
	});
	
}
function chatogether(){
	J('#view5').css("background-image","url('templates/zh_tw/images/view/e1.png')");
	J('#view6').css({"background-image":"url('templates/zh_tw/images/view/f1.png')","z-index":"0"});
	J('#view8').css("background-image","url('templates/zh_tw/images/view/g1.png')");
}
function recover(){
	J('#view5').css("background-image","url('templates/zh_tw/images/view/e0.png')");
	J('#view6').css({"background-image":"url('templates/zh_tw/images/view/f0.png')","z-index":"0"});
	J('#view8').css("background-image","url('templates/zh_tw/images/view/g0.png')");
}
