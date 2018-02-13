<?php 
    foreach($edit_user as $rowuser):
    $staff_id=$rowuser['staff_id'];
    $name=$rowuser['name'];

    $staff_image=$rowuser['image'];

	  $b_name=$rowuser['b_name'];
    $b_address=$rowuser['b_address'];
    $email=$rowuser['email'];
    $mob=$rowuser['mob'];
    $v_card=$rowuser['v_card'];
	  
    $status=$rowuser['status'];
    endforeach;
?>

 <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <?php if(!empty($sucess_msg)){?>
							<div class="alert alert-success" <?php echo (empty($sucess_msg)) ? 'style="display:none"' : ''; ?>>
                                <button class="close" data-dismiss="alert">&times;</button>
                                <strong>Success!</strong><?php echo $sucess_msg; ?>
                            </div>
                            <?php } ?>
                            <?php if(!empty($error_msg)){?>
                            <div class="alert alert-error" <?php echo (empty($error_msg)) ? 'style="display:none"' : ''; ?>>
                                <button class="close" data-dismiss="alert">&times;</button>
                                <strong>Error!</strong><?php echo $error_msg; ?>
                            </div>
                            <?php } ?>  
    <section class="content-header">
      <h1>
        Business
        <small><?php echo $action;?></small>
      </h1>
      
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <!-- left column -->
        <div class="col-md-9">
 <!-- general form elements -->
          <div class="box box-primary">
            <div class="box-header with-border">
              <h3 class="box-title">Business</h3>
            </div>
            <!-- /.box-header -->
            <!-- form start -->
            <form role="form" name="add_edit_user" id="add_edit_user" action="<?php echo base_url().'business/add_edit'; ?>" enctype="multipart/form-data" method="post">
              <div class="box-body">
               

                <div class="form-group">
                  <label for="exampleInputPassword1">Logo Image</label>
                   <?php 
    							$profile_img_url = base_url().'images/no-image.jpg';
    							if ($staff_image != '')
    							{
    								$profile_img_url = base_url().'uploads/business/'.$staff_image;
    							}
    							else
    							{
    								$profile_img_url = base_url().'images/no-image.jpg';
    							}
    					   ?>
                          <img id="image_display" src="<?php echo $profile_img_url; ?>" height="50" width="50" />
                            &nbsp;
                            <input type="file" name="staff_image" id="staff_image" class="form-control"/>
                </div>
				
				 <div class="form-group">
                 <label for="exampleInputPassword1">Name</label>
                 <input type="text" name="name" id="name" value="<?php echo $name;?>" class="form-control" />
                </div>

        <div class="form-group">
                 <label for="exampleInputPassword1">Business Name</label>
                 <input type="text" name="b_name" id="b_name" value="<?php echo $b_name;?>" class="form-control" />
                </div> 

        <div class="form-group">
                 <label for="exampleInputPassword1">Business Address</label>
                 <input type="text" name="b_address" id="b_address" value="<?php echo $b_address;?>" class="form-control" />
                </div>	

        <div class="form-group">
                <label class="exampleInputPassword1" for="Name">Email Address</label> 
                <input type="text" name="emailname" id="emailname" value="<?php echo $email;?>" class="form-control" >
              </div>        			

        <div class="form-group">
                 <label for="exampleInputPassword1">Mobile Number</label>
                 <input type="text" name="mob" id="mob" value="<?php echo $mob;?>" class="form-control" />
                </div>

        
        <div class="form-group">
                  <label for="exampleInputPassword1">Visiting Card</label>
                   <?php 
                  $card_img_url = base_url().'images/no-image.jpg';
                  if ($v_card != '')
                  {
                    $card_img_url = base_url().'uploads/business/'.$v_card;
                  }
                  else
                  {
                    $card_img_url = base_url().'images/no-image.jpg';
                  }
                 ?>
                          <img id="image_display1" src="<?php echo $card_img_url; ?>" height="50" width="50" />
                            &nbsp;
                            <input type="file" name="v_card" id="v_card" class="form-control"/>
                </div>
	
              </div>
              <!-- /.box-body -->
            
              <div class="checkbox">
                  <label for="exampleInputPassword1"><b>Status</b></label>&nbsp;
				  &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;                 
                 <input type="checkbox" name="chk_status" id="chk_status" <?php echo ($status==1)?"checked=true":""; ?> />                    
              </div>
              <div class="box-footer">
                <button type="submit" class="btn btn-primary" id="btn_submit" >Submit</button>
                <input type="button" name="back" value="Cancel" class="btn btn-primary" onclick="window.location.href='<?php echo base_url().'business';?>'"/>
              </div>

              <input type="hidden" name="action" id="action" value="<?php echo $action; ?>" />
              <input type="hidden" name="hdn_staff_id" id="hdn_staff_id" value="<?php echo $staff_id?>"/>

        <input type="hidden" value="<?php echo $staff_image; ?>" name="old_file_name" id="old_file_name"/>
        <input type="hidden" value="<?php echo $v_card; ?>" name="old_file_name1" id="old_file_name1"/>
              <!---->
                <input type="hidden" name="hdn_status" value="<?php echo $status?>"/>
            </form>
          </div>
          <!-- /.box -->
</div>
</section>
</div>

<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.maskedinput-1.3.1.min_.js"></script>
<script type="text/javascript">
jQuery(function($) {
      $.mask.definitions['~']='[+-]';
      $('#phone').mask('(999) 999-9999');
      $('#fax').mask("(999) 999-9999");
   });
</script>



