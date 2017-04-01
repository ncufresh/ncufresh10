J(function(){
	J("#questionnaire").validate({
		errorPlacement:function(error,element){
			//alert(element.parents(".questions").get(0).tagName);
			//element.parents(".questions").append(error);
			//error.text("此欄位為必填");
			error.prependTo(element.parents(".q_response"));
		},		
		errorElement:"div",
		highlight:function(element){
			
		},
		success:function(label){
			label.hide("slow");
		}
	});

});
