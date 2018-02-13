
<div class="content-wrapper">
<div class="alert alert-success" <?php echo (empty($sucess_msg)) ? 'style="display:none"' : ''; ?>>
            <button class="close" data-dismiss="alert">&times;</button>
            <strong>Success!</strong><?php echo $sucess_msg; ?>
       </div>
        <div class="alert alert-error" <?php echo (empty($error_msg)) ? 'style="display:none"' : ''; ?>>
            <button class="close" data-dismiss="alert">&times;</button>
            <strong>Error!</strong><?php echo $error_msg; ?>
        </div>
<section class="content-header">
      <h1>
        Business
        <small>List</small>
      </h1>
      
    </section>
<!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <div class="pull-right">
              <?php //if($sess_admin_type==$this->superadmin){ 
                     ?>   <input type="button" name="add" value="Add" class="btn btn-primary" onclick="go_to_location('business/user_add')"/>
                    <?php //}?>
                    <input type="button" id="delete_all" value="Delete All" name="delete_all" class="btn btn-primary"/>
            </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th><input type="checkbox" id="select_all_check" value="1" name="select_all_check"/></th>
                            
                            <th>Image</th>
                            <th>Bussiness Name</th>
              							<th>Contact Number</th>
              							<th>Status</th>
                            <th>Action</th>
                </tr>
                </thead>
                <tbody>
                <?php 

						if(empty($all_user))

						{

							?>

							<tr>

								<td colspan="6">No Data Found</td>

							</tr>

							<?php

						}

					 ?>

                     <?php 

                        foreach($all_user as $rowuser)
						{                          

                     ?>                     

                      <tr id="item_<?php echo $rowuser['staff_id'];?>" style="cursor:move">

                        <td>

                        <input type="checkbox" id="chk_<?php echo $rowuser['staff_id']; ?>" value="<?php $rowuser['staff_id']; ?>" name="chk_<?php echo $rowuser['staff_id']; ?>" data-value="<?php echo $rowuser['staff_id'];?>" class="chk_child"/>

                        </td>
                          
					
                         <td><img src="<?php echo base_url();?>uploads/business/<?php echo $rowuser['image'];?>" height="30px" width="30px" /></td>
						 
						 <td><?php echo $rowuser['name']; ?></td>
						 
						 <td><?php echo $rowuser['mob']; ?></td>

                         <td>

                         <a href="#" id="status_<?php echo $rowuser['staff_id'];?>" class="status_change <?php echo ($rowuser['status']==1) ? 'status_enable' : 'status_disable'; ?>" rel="<?php echo $rowuser['status']; ?>">&nbsp;&nbsp;&nbsp;&nbsp;</a>

                        </td>

                        <td class="action">

                           
                        	<a href="<?php echo base_url().'business/user_edit/'.$rowuser['staff_id'];?>"><i class="fa fa-edit"></i></a>

                        	&nbsp;

                            <a class="delete_record" href="<?php echo base_url().'business/user_delete/'.$rowuser['staff_id'];?>"><i class="fa fa-remove"></i></a>

                        </td>                        

                      </tr>

                     <?php

					    }

					 ?>
                </tbody>
               </table> 
               </div>
               </div>
               </div>
               </div>
</section>
</div>
<script>
  $(document).ready(function () {
    $("#example1").DataTable();
    
  });
</script>

<script>
   $(document).ready(function() {
      $("#save").click(function(){

        var id = $(this).data('staff_id');

         console.log(">>> "+ id);
      //  var order = $(".order_"+id).val();
/*
        $.ajax({
          url: "updateorder.php?id="+id+"&order="+order,
          type: "GET",
          success: function(result)
          {
            location.reload();
          }});*/
        });
        
      });
</script>



 
            