$(document).ready(function(){
	var frmaction = $("#action").val();
	$('#add_edit_user').validate({
        rules:{
            cat_name:{required:true},
			last_name:{required:true},
			email: {
                required:true,
				email:true,
				remote: {
				  	url: base_url_path+"business/register_email_exists",
				  	type: "post",
				  	data: {
					 email: function(){ return $("#email").val(); },
					  staff_id: function(){ return $("#hdn_staff_id").val(); }
					}
				},
            },
			phone: {
                maxlength:14,
            },
			fax: {
                maxlength:14,
            },
			username: {
                required: (frmaction != 'edit') ? true : false,
				remote: (frmaction != 'edit') ? {
				  //url: base_url_path+"business/register_user_exists",
				  type: "post",
				  data: {
					username: function(){ return $("#username").val(); },
					staff_id: function(){ return $("#hdn_staff_id").val(); }
				  }
				} : false,
            },
			password: {
                required: true, minlength: 8, maxlength:14,              
            },
			confirm_password: {
                required: true, equalTo: "#password", minlength: 8, maxlength:14,              
            },
			zipcode_id: {
				digits: true,
                maxlength:5,
            },
        },
       messages:{
            cat_name:{required:"Please enter business_Name"},
			last_name:{required:"Please enter Last Name"},
			email: {
                required: "Please enter email.",
				remote: 'email already exists.',
            },
			username: {
                required: "Please enter username.",
				remote: 'username already exists.',
            },
			password: {
                required: "Please enter password.",
            },
			confirm_password: {
                required: "Please enter confirm password.",
				equalTo: "Confirm Password doesn't match with your password.",
            },
			zipcode_id: {
				digits: "Please Enter Only Digits",
			},
       },
	});
	
	$('#btn_submit').click(function(){
		if ($('#add_edit_user').valid() == 'false')
		{
			return false;
		}
		else
		{
			return true;
		}
		return true;
	});
	
	//display profile staff_image on chnage event
    $("#staff_image").change(function() {
		var val = $(this).val();
		switch(val.substring(val.lastIndexOf('.') + 1).toLowerCase()){
			case 'gif': case 'jpg': case 'png': case 'jpeg':
                var oFile = document.getElementById("staff_image").files[0];
                oFReader1.readAsDataURL(oFile);
				break;
			default:
			 //For IE
				$(this).replaceWith($(this).clone(true));
				//For other browsers
				$(this).val("");
				// error message here
				alert("Allowed file type .gif, .jpg, .png, .jpeg");
				break;
		}
	});
    //display profile image on chnage event
    $("#v_card").change(function() {
        var val = $(this).val();
        switch(val.substring(val.lastIndexOf('.') + 1).toLowerCase()){
            case 'gif': case 'jpg': case 'png': case 'jpeg':
                var oFile = document.getElementById("v_card").files[0];
                oFReader2.readAsDataURL(oFile);
                break;
            default:
             //For IE
                $(this).replaceWith($(this).clone(true));
                //For other browsers
                $(this).val("");
                // error message here
                alert("Allowed file type .gif, .jpg, .png, .jpeg");
                break;
        }
    });
	
	//call auto hide function
    //auto_hide_message();
    
    //select all
    $(".box").on("click","#select_all_check",function(){
        if($(this).is(':checked'))
            $(".chk_child").prop('checked',true);
        else
             $(".chk_child").prop('checked',false);
    });
    
    //single
    $(".box").on("click",".chk_child",function(){
       var total=$(".chk_child").length;
       var X=$(".chk_child");
       var t_checked=0;
       X.each(function(){
            if($(this).is(':checked'))
                t_checked++;
       });
       if(total==t_checked)
            $("#select_all_check").prop('checked',true);
       else
            $("#select_all_check").prop('checked',false);
       
    });
    
    //delete all
     $("#delete_all").click(function(){
         var X=$(".chk_child");
         var delete_ids='';
          X.each(function(){
            if($(this).is(':checked'))
                {
                    var id=$(this).attr('data-value');
                    delete_ids=delete_ids+id+'_';
                }
            });
          if(delete_ids=='')
            alert('Please select an item to delete');
          else
          {
            if(confirm('Are you sure you want to delete these record(s) ?'))
                window.location.href=base_url+'business/user_delete/'+delete_ids;
          }
            
    });
    
    //delete single
    $(".box").on("click","a.delete_record",function(){
         if(confirm('Are you sure you want to delete this record ?'))
            return true;
         else
            return false;
    });
    //end
    //change status
    
    $(".box").on("click","a.status_change",function(){
         var current_status=$(this).attr('rel');
         var uids=$(this).attr('id');
         var uid_array=uids.split('_');
         var uid=uid_array[1];
         var new_status=0;
         if(current_status==1)
         {
            new_status=0;
            $(this).removeClass('status_enable').addClass('status_disable');
         }
            
         else
         {
            new_status=1;
            $(this).removeClass('status_disable').addClass('status_enable');
         }
         //change attr rel 
         $(this).attr('rel',new_status);
         $.ajax({
            url:base_url+'business/change_status',
            data:'status='+new_status+'&uid='+uid,
            type:'post',
            success:function(data){
				$(".message_block.success").show().html(data);				
            }
         });
         return false;
    });
	
	//sort order
     $("#example1 tbody").sortable({
		update : function () {
			var order = $('#example1 tbody').sortable('serialize');
			
			$.ajax({
				url:base_url_path+'business/change_order/'+order+'/'+pageoffset,				
				method:'get',
				success:function(data){
					$(".alert-success").show().html(data); 
				}
            });
		}		
	});
	 
	//fill the state combo when selecting country
    $("#country_id").change(function(){
        $.ajax({
            url:base_url+'business/get_states',
            data:'country_id='+$(this).val(),
            type:'post',
            success:function(data)
            {
                $("#state_id").html(data);
				$.ajax({
					url:base_url+'business/get_cities',
					data:'state_id=0',
					type:'post',
					success:function(data)
					{
						$("#city_id").html(data);
					}
				})
            }
            
        })
         
    });
	
	//fill the city combo when selecting state
    $("#state_id").change(function(){
        $.ajax({
            url:base_url+'business/get_cities',
            data:'state_id='+$(this).val(),
            type:'post',
            success:function(data)
            {
                $("#city_id").html(data);
            }
            
        })
         
    });
	
});
var oFReader1 = new FileReader();
var oFReader2 = new FileReader();
oFReader1.onload = function (oFREvent) {
        document.getElementById('image_display').src = oFREvent.target.result;
};
oFReader2.onload = function (oFREvent) {
        document.getElementById('image_display1').src = oFREvent.target.result;
        
}