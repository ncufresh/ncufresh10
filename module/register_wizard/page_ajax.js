function test(){
    J.ajax(                        
        {
            url: 'test.php',                   

            data: { 
			   //content2: $i,
                                    
            },
			type: 'send',
            error: function(xhr){               
                alert('AJAX error!!');
            },

            success:function(response){
              
				J('#test').html(response);
				
            }
    });
}
