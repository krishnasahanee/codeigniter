
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
        User details
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
              
                       <input type="button" name="add" value="Add" class="btn btn-primary" onclick="go_to_location('user_details/add')"/>
                    
                    <input type="button" id="delete_all" value="Delete All" name="delete_all" class="btn btn-primary"/>
            </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
                    <table id="example1" class="table table-bordered table-striped">
                        <thead>
                         <tr>
                            <th>
                                <input type="checkbox" id="select_all_check" value="1" name="select_all_check"/>
                            </th>
                            <th>
                                 Firstname
                            </th>
                            <th>
                                 Email
                            </th>
							<th>
                                Mobile Verified
                            </th>
                            <th>
                                Status
                            </th> 
                            <th>
                                Action
                            </th>
                        </tr>
                     </thead>
                     <tbody>
                        <?php 
                            if(empty($lists))
                            {
                                ?>
                                <tr>
                                    <td colspan="6">No Data Found</td>
                                </tr>
                                <?php
                            }
                        ?>
                        <?php
                            foreach($lists as $list){
                                ?>
                                <tr id="item_<?php echo $list['uid'];?>" style="cursor:move">
                                    <td>
                                        <input type="checkbox" id="chk_<?php echo $list['uid']; ?>" value="<?php $list['uid']; ?>" name="chk_<?php echo $list['uid']; ?>" data-value="<?php echo $list['uid'];?>" class="chk_child"/> 
                                    </td>
                                    <td>
                                        <?php echo $list['fname']; ?>
                                    </td>
                                    <td>
                                        <?php echo $list['email']; ?>
                                    </td>
									<td>
                                        <?php 
										if($list['mobile_verify'] == 1){
											echo "Yes";
										}else{
											echo "No";
										}
										//echo $list['mobile_verify']; 
										?>
                                    </td>
                                    <td>
									<a href="#" id="status_<?php echo $list['uid'];?>" class="status_change <?php echo ($list['status']==1) ? 'status_enable' : 'status_disable'; ?>" rel="<?php echo $list['status']; ?>">&nbsp;&nbsp;&nbsp;&nbsp;</a>                    
                                    </td> 

                                    <td class="action">
                                       <a href="<?php echo base_url().'user_details/view/'.$list['uid'];?>"><i class="fa fa-user"></i></a>&nbsp;

                                       <a href="<?php echo base_url().'user_details/edit/'.$list['uid'];?>"><i class="fa fa-edit"></i></a>&nbsp;

                                       <a href="<?php echo base_url().'user_details/delete/'.$list['uid'];?>" class="delete_record"><i class="fa fa-remove"></i></a>
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

