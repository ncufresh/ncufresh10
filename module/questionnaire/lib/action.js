
J(function(){
	//自動儲存 bug:新增的東西會一直新增到資料庫去
	//autoSave();
	
	var qno=1; //question id 從1開始

	//強制讓一開始的回答類型是text
	J("select.res_type>option:first").attr("selected","selected");

	//新增button 按下後新增一個question div
	J("#add").click(function(event){
		qno++;
		var onEditObj = J(".onEdit");
		if(onEditObj.text()){
			//alert(onEditObj.html());
			window.setTimeout(function(){J(".done",onEditObj).trigger('click')},0);
		}
		J(".q-body ol").append('<li><div class="question onEdit" ><table><tbody><tr><th>問題標題</th><td><input type="text" name="q_title" value="點此輸入問題"/></td>	</tr><tr><th>問題說明</th><td><input type="text" name="q_desc" /></td></tr><tr><th>答案類型</th><td><select class="res_type"><option selected="selected">文字</option><option>段落</option><option>單選</option><option>勾選</option><option>清單</option></select></td></tr></tbody></table><div class="response"><input type="hidden" value="0" name="res_type" class="res_type" /><div class="text"><input type="text" value="their answer" disabled="disabled" /></div></div><div class="send"><button class="done" type="button" >問題完成</button><span><input type="checkbox" name="required" value="1"/>設為必填</span></div></li>');
		/*J.ajax({
			url:"templates/zh_tw/q-body.tpl.html",
			type:"POST",
			cache:false,
			success:function(data){
				J(".q-body").append(data);
			}
		});*/
	});

	var opts = Array();
	var oids = Array();
	//當回答類型改變了=> 改變response div 
	J("select.res_type").live("change",function(event){
		var curr = event.target.parentNode.parentNode.parentNode.parentNode.parentNode;
		var response = new Array("text","paragragh","multiple-choice","checkbox","list");
		var type = 0;
		//var option = Array();

		//selected = J("option:selected",curr).text();
		var selected = J("select",curr).val();
		
		//whether addOther is on?
		var addOther;
		if(J(".addOther input[name=addOther]",curr).val() == '1'){ 
			addOther = true;
			//alert("yes");
		}
		else{ 
			addOther=false;
			//alert("no");
		}
		//if(J("input:text[name=opt\[\]]",curr).val()) opts = "";
		if(J("input:text[name=opt\[\]]",curr).val()) {opts = Array();oids=Array();}
		
		//oids = J("input[name=oid\[\]]",curr);

		/*J("input:text[name=opt\[\]]",curr).each(function(i){
			extra = "";
			if(oids.val() && oids.get(i).value){ 
				
				extra = '<input type="hidden" value="' + oids.get(i).value + '" name="oid[]" />';
				//alert("yoho");
			}
			//alert(":"+J(this).val());
			opts = opts + '<li>' + extra + '<input type="hiddedn" value="' + J(this).val() + '" name="opt[]" /></li>'
			//alert(opts);
		});*/
		
		oid_element = J("input[name=oid\[\]]",curr);
		oid_exist = oid_element.val();
		J("input:text[name=opt\[\]]",curr).each(function(i){
			if(oid_exist && oid_element.get(i).value){
				oids.push(oid_element[i].value);
			}
			opts.push(this.value);
		});
		
		//alert(oids + opts);
		
		//判斷要用什麼response
		if(selected == "文字"){
			//alert("you choose text");
			type = 0;
			container = J(".response",curr);
			container.children().remove();
			container.append('<input type="hidden" value="0" name="res_type" /><div class="text"><input type="text" value="their answer" disabled="disabled" /></div>');
		}
		else if(selected == "段落"){
			//alert("you choose paragragh");
			type = 1;
			container = J(".response",curr);
			container.children().remove();
			container.append('<input type="hidden" value="1" name="res_type" /><div class="paragragh"><input type="text" value="their longer answer" disabled="disabled" /></div>');
		}
		else if(selected == "單選"){
			//alert("you choose multiple");
			type = 2;
			container = J(".response",curr);
			container.children().remove();
			
			opt_list = "";
			for(i=0;i<opts.length;i++){
				extra = "";
				if(oids[i]) extra = '<input type="hidden" name="oid[]" value="'+oids[i]+'" />';
				else extra = '<input type="hidden" name="oid[]" value="" />';
				opt_list = opt_list + '<li><input type="radio" />'+extra+'<input type="text" value="'+opts[i]+'" name="opt[]"/><img src="templates/zh_tw/images/X.png" class="delOpt" title="刪除"/></li>';
				
			}
			if(opt_list == "") opt_list = '<li><input type="radio" name="options"/><input type="hidden" value="" name="oid[]" /><input type="text" value="點此輸入選項" name="opt[]"/><img src="templates/zh_tw/images/X.png" class="delOpt" title="刪除"/></li>';
			
			if(addOther) addOtherLi = '其他:<input type="hidden" name="addOther" value="1"/><input type="text" class="disabled_opt" disabled="disabled" value="Their own answer"/><img class="delOtherOpt" src="templates/zh_tw/images/X.png" title="刪除"/>';
			else addOtherLi = '<input type="hidden" name="addOther" value="0"/>或 <span class="addOtherOpt" >加入 "其他"</span>';
			container.append('<input type="hidden" value="2" name="res_type" /><div class="multiple-choice"><ul>'+opt_list+'<li class="disabled"><input type="radio"  /><input type="text" value="點此新增選項"/></li><li class="addOther">'+addOtherLi+'</li></ul></div>');
		}
		else if(selected == "勾選"){
			//alert("you choose checkbox");
			type = 3;
			container = J(".response",curr);
			container.children().remove();
			
			opt_list = "";
			for(i=0;i<opts.length;i++){
				extra = "";
				if(oids[i]) extra = '<input type="hidden" name="oid[]" value="'+oids[i]+'" />';
				else extra = '<input type="hidden" name="oid[]" value="" />';
				opt_list = opt_list + '<li><input type="checkbox" />'+extra+'<input type="text" value="'+opts[i]+'" name="opt[]"/><img src="templates/zh_tw/images/X.png" class="delOpt" title="刪除"/></li>';
				
			}
			if(opt_list == "") opt_list = '<li><input type="checkbox" /><input type="hidden" value="" name="oid[]" /><input type="text" value="點此輸入選項" name="opt[]"/><img src="templates/zh_tw/images/X.png" class="delOpt" title="刪除"/></li>';
			
			if(addOther) addOtherLi = '其他:<input type="hidden" name="addOther" value="1"/><input type="text" class="disabled_opt" disabled="disabled" value="Their own answer"/><img src="templates/zh_tw/images/X.png" class="delOtherOpt" title="刪除"/>';
			else addOtherLi = '<input type="hidden" name="addOther" value="0"/>或 <span class="addOtherOpt" >加入 "其他"</span>';
			container.append('<input type="hidden" value="3" name="res_type" /><div class="checkbox"><ul>'+opt_list+'<li class="disabled"><input type="checkbox" /><input type="text" value="點此新增選項" /></li><li class="addOther">'+addOtherLi+'</li></ul></div>');
		}
		else if(selected == "清單"){
			//alert("you choose list");
			type = 4;
			container = J(".response",curr);
			container.children().remove();
			opt_list = "";
			for(i=0;i<opts.length;i++){
				extra = "";
				if(oids[i]) extra = '<input type="hidden" name="oid[]" value="'+oids[i]+'" />';
				else extra = '<input type="hidden" name="oid[]" value="" />';
				opt_list = opt_list + '<li>' + extra + '<input type="text" value="'+opts[i]+'" name="opt[]"/><img src="templates/zh_tw/images/X.png" class="delOpt" title="刪除"/></li>';
				
			}
			if(opt_list == "") opt_list = '<li><input type="text" value="點此輸入選項" name="opt[]"/><img src="templates/zh_tw/images/X.png" class="delOpt" title="刪除"/></li>';
			container.append('<input type="hidden" value="4" name="res_type" /><div class="list"><ul>'+opt_list+'<li class="disabled"><input type="text" value="點此新增選項" /></li></ul></div>');
		}
/*		J(".res_type",curr).attr("value",type);
		J(".response",curr).children().removeClass("default");
		J(".response",curr).children("." + response[type]).addClass("default");
*/
	});
	
	//標題toggleStr
	J("#form_title_text").live("focus",function(){
		J(this).toggleStr("點此輸入問卷標題","");					
	});



	//完成按鈕=>送出AJAX寫入資料庫
	J(".done").live("click",function(event){
		
		curr = this.parentNode.parentNode;
		//alert(J(":input",curr).serialize());
		
		J.ajax({
			url:"toShowForm.php",
			type:"POST",
			cache:false,
			data:J(":input",curr).serialize()+'&qid='+J("input[name=qid]").val(),
			success:function(data){
				//alert(data);
				J(curr).html(data).removeClass("onEdit").addClass("onShow");
			}
		});
		
		
	});
	//完成按鈕=>此事件不會改變目前編輯的區塊
	J(".done").live("outSave",function(event){
		curr = this.parentNode.parentNode;
		//alert(J(":input",curr).serialize());
		
		J.ajax({
			url:"outSave.php",
			type:"POST",
			cache:false,
			data:J(":input",curr).serialize()+'&qid='+J("input[name=qid]").val(),
			success:function(data){
				//alert(J(":input[oid=\[\]]",curr).val());
				//if()
				//J(":input[name=oid\[\]]",curr).val(data);
			}
		});
	
	});
	
	//儲存按鈕=>將問卷標題及描述用ajax寫到資料庫，並觸發所有onEdit的.done outSave事件
	J("#save").click(function(){
		//alert(J(".txtbar").children().serialize()+'&qid='+J("input[name=qid]").val());
		J("#saveMsg").text("saving...");
		J(".onEdit .done").trigger("click");
		J.ajax({
			url:"saveForm.php",
			type:"POST",
			cache:false,
			data:J(".txtbar").children().serialize()+'&qid='+J("input[name=qid]").val(),
			success:function(data){
				//alert(data);
				//J(curr).html(data).removeClass("onEdit").addClass("onShow");
				J("#saveMsg").text("saved!!");
				setTimeout('J("#saveMsg").html("&nbsp")',2000);
			}
			
		});
		
	});


	//讓選項點進去的時候變成空白 離開時又可以變成預設的option
	J("li:not(.disabled,.addOther)>input").live("focus",function(event){
		//alert(J(this).val());
		J(this).toggleStr("點此輸入選項","");
	});

	//點一下最後的選項(disabled)會新增一個選項輸入欄
	J("li.disabled").live("focus",addOpt);/*function(event){
		//alert("d");
		var clone = J(this).prev().clone();
		clone.insertBefore(this);
		J(this).prev().children("input:text").val("option");
		this.checked=false;
	});*/

	//讓標題欄點進去變空白 離開時預設的untitled question
	J("input[name=q_title]").live("focus",function(event){
		J(this).toggleStr("點此輸入問題","");
	
	});
	
	
	//點問題區的編輯 可以進入編輯模式
	J(".editQues").live("click",function(event){
		var onEditObj = J(".onEdit");
		//alert(onEditObj.text());
		if(onEditObj.text()){
			window.setTimeout(function(){J(".done",onEditObj).trigger("click")},0);
		}
		//alert(J("input",this.parentNode.parentNode).serialize()+'&qid='+J("input[name=qid]").val());
		curr = this.parentNode.parentNode;
		J.ajax({
			url:"toEditForm.php",
			type:"POST",
			cache:false,
			data:J(":input",curr).serialize()+'&qid='+J("input[name=qid]").val(),
			success:function(data){
				J(curr).html(data).removeClass("onShow").addClass("onEdit");
				J("input.disabled").live("focus",addOpt);
				
			}
		});
		
	});
	
	//點加入其他新增一個其他欄位	
	J(".addOther span.addOtherOpt").live("click",function(event){
		//event.stopImmediatePropagation();
		
		//alert(this.parentNode.nodeName);
		curr = this.parentNode;
		//alert(J(curr).prev().children(":input").get(0).tagName);
		input_type = J(curr).prev().children(":input").clone().get(0);
		J(curr).html('其他:<input type="hidden" name="addOther" value="1"/><input type="text" class="disabled_opt" disabled="disabled" value="Their own answer"/><img class="delOtherOpt" src="templates/zh_tw/images/X.png" title=" 刪除"/>').prepend(input_type);
		
	});
	
	//點"其他"的刪除會變成加入其他
	J("img.delOtherOpt").live("click",function(event){
		//alert(this.parentNode.nodeName);
		curr = this.parentNode;
		J(curr).html('<input type="hidden" name="addOther" value="0"/>或 <span class="addOtherOpt" >加入 "其他"</span>');
	});
	
	//點選項的刪除會把選項刪掉
	J("img.delOpt").live("click",function(event){
		//alert(this.parentNode.nodeName);
		var sure = confirm("確定要刪除這個選項嗎？");
		if(sure){
			curr = this.parentNode;
			optContent = J("input[name=oid\[\]]",curr).val();
			if(optContent == ""){ 
				//alert("nothing");
				J(curr).remove();
			}
			else{
				//alert(optContent);
				J.ajax({
				url:"delOpt.php",
				type:"POST",
				cache:false,
				data:'oid='+optContent,
				success:function(data){
					J(curr).remove();
				
				}
			});
			
			}
		}
	});
	
	//點問題區的刪除把整個問題刪掉
	J(".onShow .delQues").live("click",function(event){
		//alert(this.parentNode.parentNode.nodeName);
		var sure = confirm("確定要刪除這個問題？");
		if(sure){
			curr = this.parentNode.parentNode;
			//alert(J("input[name=tid]",curr).val());
			var tid = J("input[name=tid]",curr).val();
			J.ajax({
				url:"delQues.php",
				type:"POST",
				cache:false,
				data:'tid='+tid,
				success:function(data){
					J(curr.parentNode).remove();
				
				}
			});
		}
	});
	
	
	
});	

//新增選項輸入欄的function
addOpt = function(event){
		//alert(this.tagName);
		//J(event.target).trigger("blur");
		var clone = J(this).clone();
		clone.insertBefore(this);
		var newOne = J(this).prev();
		newOne.removeClass();
		newOne.append('<img class="delOpt" src="templates/zh_tw/images/X.png" title="刪除"/>');
		newOne.children("input:hidden").attr({name:"oid[]",value:""});
		newOne.children("input:text").attr({name:"opt[]",value:"點此輸入選項"});
		//alert(newOne.html());

		//讓游標跑到新增的那個input:text欄裡
		window.setTimeout(function(){newOne.children("input:text").get(0).focus()},0);
		
}
/*
done = function(event){
		
		curr = this.parentNode.parentNode;
		//alert(J(":input",curr).serialize());
		
		J.ajax({
			url:"toShowForm.php",
			type:"POST",
			cache:false,
			data:J(":input",curr).serialize()+'&qid='+J("input[name=qid]").val(),
			success:function(data){
				//alert(data);
				J(curr).html(data).removeClass("onEdit").addClass("onShow");
			}
		}
}*/
