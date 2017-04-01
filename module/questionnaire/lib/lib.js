/*
 *可以讓input type=text的value在兩個string之間互換
 */
jQuery.fn.toggleStr = function(str1,str2){
	return this.each(function(){
		var curr = J(this);
		//var str = curr.val();
		//alert(str);
		
		curr.focus(function(event){
			if(curr.val()==str1){
				J(this).val(str2);
			}
		}).blur(function(event){
			if(curr.val()==str2){
				J(this).val(str1);
			}
		});
	});
}

function autoSave(){
	J("#save").trigger("click");
	setTimeout("autoSave()",60000);//每過60秒跑一次
}








