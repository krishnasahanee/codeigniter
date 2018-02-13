<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<?php 
    foreach($edit_user as $rowuser):
      $uid=$rowuser['uid'];

     $sta=$rowuser['sta'];

      $gen=$rowuser['gen'];
      $fname=$rowuser['fname'];
      $s_id=$rowuser['s_id'];
      $uname=$rowuser['uname'];
      $pass=$rowuser['pass'];
	  $adharcard_photo=$rowuser['adharcard_photo'];
	  $fb_link=$rowuser['fb_link'];
      $email=$rowuser['email'];


        $bdate=$rowuser['bdate'];
        $date = strtotime($bdate);
        $datee = date('Y-m-d', $date);

        $mdate=$rowuser['mdate'];
        $date1 = strtotime($mdate);
        $mdatee = date('Y-m-d', $date1);
                    

      $vlg=$rowuser['vlg'];
      $cnum=$rowuser['cnum'];
      $pcnum=$rowuser['pcnum'];

      $c_city=$rowuser['c_city'];
      $c_area=$rowuser['c_area'];

      $edu_spl=$rowuser['edu_spl'];
      $occ=$rowuser['occ'];
      $faname=$rowuser['faname'];
      $mname=$rowuser['mname'];
      $ff_name=$rowuser['ff_name'];
      $fm_name=$rowuser['fm_name'];
      $mf_name=$rowuser['mf_name'];
      $mm_name=$rowuser['mm_name'];
      $m_sname=$rowuser['m_sname'];
      $m_vlg=$rowuser['m_vlg'];
      
      $w_name=$rowuser['w_name'];
      $wf_name=$rowuser['wf_name'];
      $wm_name=$rowuser['wm_name'];
      $w_sname=$rowuser['w_sname'];
      $w_vlg=$rowuser['w_vlg'];

      $h_name=$rowuser['h_name'];
      $hf_name=$rowuser['hf_name'];
      $hm_name=$rowuser['hm_name'];
      
      $h_vlg=$rowuser['h_vlg'];



      $image=$rowuser['image'];
      $status=$rowuser['status'];
	  $otp=$rowuser['otp'];
	  $mobileverify=$rowuser['mobile_verify'];
	  $matrimony=$rowuser['matrimony'];
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
        User Details
        <small><?php echo $action;?></small>
      </h1>
      
    </section>

<!-- Main content -->
<div class="row">
  <section class="content">
    
  <!-- left column -->
  <div class="col-md-9">
  <!-- general form elements -->
    <div class="box box-primary">
                <div class="box-header with-border">
                  <h3 class="box-title">User Details</h3>
                </div>
      <!-- /.box-header -->
      <!-- form start-->
      <style type="text/css">
      tr.spaceUnder>
      td{
      padding-bottom: 0.8em;
      }
      </style>

      <form role="form" name="add_edit_user" id="add_edit_user" action="<?php echo base_url().'user_details/add_edit'; ?>" enctype="multipart/form-data" method="post">

<!--husband/wife selecation script-->



      <table  border="1" colspan='2'>  

        <div class="box-body">
  <!-- Gender-->
          <tr class="spaceUnder">
            <td class="col-md-4 control-label"><b>Gender</b></td> 
              
              <td class="col-xs-4">  
                <label class="radio-inline" >
                <input type="radio" name="gen" id="mgen" <?php if($rowuser['gen'] == 'Male' ) { echo 'checked'; } ?>  value="Male" required> Male
                &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                  <input required type="radio" name="gen" id="fgen" <?php if($rowuser['gen'] == 'Female' ) { echo 'checked'; } ?>  value="Female" > Female
                </label>
              </td>
              
          </tr>

          <!--Marital Status-->
          <tr class="spaceUnder">
            <td class="col-md-4 control-label" for="Name"><b>Marital Status</b></td> 
              <td class="col-xs-4">
              
              <select id='sta' name="sta" class="form-control input-md">

              <option select="selected">Select</option>

              <option value="Single" <?php echo ($rowuser['sta'] == 'Single')?'selected':''?> >Single</option>
              <option value="Engaged" <?php echo ($rowuser['sta'] == 'Engaged')?'selected':''?> >Engaged</option>
              <option value="Married" <?php echo ($rowuser['sta'] == 'Married')?'selected':''?> >Married</option>
              <option value="Widowed" <?php echo ($rowuser['sta'] == 'Widowed')?'selected':''?> >Widowed</option>
              <option value="Divorced" <?php echo ($rowuser['sta'] == 'Divorced')?'selected':''?> >Divorced</option>
              </select>
              </td>
          </tr>


          <!--Image-->
          <tr class="spaceUnder">
            <td class="col-md-4 control-label"><b>Image</b></td>
              <td class="col-md-4">
                <?php 
                  $profile_img_url = base_url().'images/no-image.jpg';
                  if ($image != '')
                  {
                      $profile_img_url = base_url().'uploads/user_details/'.$image;
                  }
                  else
                  {
                      $profile_img_url = base_url().'images/no-image.jpg';
                  }
                ?>
                <img id="image_display" src="<?php echo $profile_img_url; ?>" height="50" width="50" />
                  &nbsp;
                  
                  <input type="file" name="image" id="image" class="form-control"/>
              </td>
          </tr>     

          <!--Firstname-->
          <tr class="spaceUnder">
            <td class="col-md-4 control-label"><b>Firstname</b></td>
              <td class="col-xs-4">   
                <input type="text" name="fname" id="fname" value="<?php echo $fname; ?>" class="form-control"/>
                 <?php //print_r($list); ?>
              </td>
          </tr>

          <!--Surname-->
          <tr class="spaceUnder">
            <td class="col-md-4 control-label" for="Name"><b>Surname</b></td> 
              <td class="col-xs-4"> 
              <select name="s_id" id="s_id" class="form-control">


              <option value="#">Select</option>

              <?php
              $cn_selected = '';  

              foreach($all_surname as $surname)
              {
                if ($s_id == $surname['title'])
                {
                  $cn_selected = 'selected="selected"';
                }
                else
                {
                  $cn_selected = '';
                }

              ?>
                  <option <?php echo $cn_selected; ?> value="<?php echo $surname['title']; ?>"><?php echo $surname['title']; ?></option>
                  <?php
              }
              ?>

              </select>
              </td>
          </tr>

          <!--Username-->
          <tr class="spaceUnder">
            <td class="col-md-4 control-label"><b>Username</b></td>
              <td class="col-xs-4">   
                <input type="text" name="uname" id="uname" value="<?php echo $uname; ?>" class="form-control"/>
              </td>
          </tr>

          <!--Password-->
          <tr class="spaceUnder">
            <td class="col-md-4 control-label"><b>Password</b></td>
              <td class="col-xs-4">   
                <input type="text" name="pass" id="pass" value="<?php echo $pass; ?>" class="form-control"/>
              </td>
          </tr>
		  
		  <!--Adharcard photo-->
		  <tr class="spaceUnder">
            <td class="col-md-4 control-label"><b>Adharcard photo</b></td>
              <td class="col-md-4">
                <?php 
                  $profile_img_url = base_url().'images/no-image.jpg';
                  if ($adharcard_photo != '')
                  {
                      $profile_img_url = base_url().'uploads/user_details/'.$adharcard_photo;
                  }
                  else
                  {
                      $profile_img_url = base_url().'images/no-image.jpg';
                  }
                ?>
                <img id="image_display" src="<?php echo $profile_img_url; ?>" height="50" width="50" />
                  &nbsp;
                  
                  <input type="file" name="adharcard_photo" id="adharcard_photo" class="form-control"/>
              </td>
          </tr> 
		  
		  <!--fb link-->
		  <tr class="spaceUnder">
            <td class="col-md-4 control-label"><b>Fb link</b></td>
              <td class="col-xs-4">   
                <input type="text" name="fb_link" id="fb_link" value="<?php echo $fb_link; ?>" class="form-control"/>
              </td>
          </tr>

          <!--Email-->
          <tr class="spaceUnder">
            <td class="col-md-4 control-label"><b>Email Address</b></td>
              <td class="col-xs-4">   
                <input type="text" name="email" id="email" value="<?php echo $email; ?>" class="form-control"/>
              </td>
          </tr>

          <!--Birthdate-->

          <?php     //$date = strtotime($bdate);
                    //$datee = date('Y-m-d', $date);
                    //echo $datee; ?>
          <tr class="spaceUnder">
            <td class="col-md-4 control-label"><b>Birth Date</b></td>
              <td class="col-xs-4">   
                <input type="date" name="bdate" id="bdate" value="<?php echo $datee; ?>" class="form-control"/>
              </td>
          </tr>
          <!--Married Date
          <tr class="spaceUnder">
            <td class="col-md-4 control-label"><b>Married Date</b></td>
              <td class="col-xs-4">   
                <input type="date" name="mdate" id="mdate" value="<?php echo $mdatee; ?>" class="form-control"/>
              </td>
          </tr>-->
          
          <!--Village-->
          <tr class="spaceUnder">
            <td class="col-md-4 control-label"><b>Village</b></td>
              <td class="col-xs-4">   
                <input type="text" name="vlg" id="vlg" value="<?php echo $vlg; ?>" class="form-control"/>
              </td>
          </tr>

          <!--Cell Number-->
          <tr class="spaceUnder">
            <td class="col-md-4 control-label"><b>Cell Number</b></td>
              <td class="col-xs-4">   
                <input type="text" name="cnum" id="cnum" value="<?php echo $cnum; ?>" class="form-control"/>
              </td>
          </tr>

          <!--Parents Cell Number-->
          <tr class="spaceUnder">
            <td class="col-md-4 control-label"><b>Parents Number</b></td>
              <td class="col-xs-4">   
                <input type="text" name="pcnum" id="pcnum" value="<?php echo $pcnum; ?>" class="form-control"/>
              </td>
          </tr>

          <!--Current city-->
          <tr class="spaceUnder">
            <td class="col-md-4 control-label"><b>Current City</b></td>
              <td class="col-xs-4">   
                <input type="text" name="c_city" id="c_city" value="<?php echo $c_city; ?>" class="form-control"/>
              </td>
          </tr>  

          <!--Current Address-->
          <tr class="spaceUnder">
            <td class="col-md-4 control-label"><b>Current Address</b></td>
              <td class="col-xs-4">   
                <input type="text" name="c_area" id="c_area" value="<?php echo $c_area; ?>" class="form-control"/>
              </td>
          </tr>

          <!--Blood Group-->
          <tr class="spaceUnder">
            <td class="col-md-4 control-label" for="Name"><b>Blood Group</b></td> 
              <td class="col-xs-4">
              
              <select id='bgroup' name="bgroup" class="form-control input-md">

              <option select="selected">Select</option>

              <option value="A+" <?php echo ($rowuser['bgroup'] == 'A+')?'selected':''?> >A+</option>
              <option value="O+" <?php echo ($rowuser['bgroup'] == 'O+')?'selected':''?> >O+</option>
              <option value="B+" <?php echo ($rowuser['bgroup'] == 'B+')?'selected':''?> >B+</option>
              <option value="AB+" <?php echo ($rowuser['bgroup'] =='AB+')?'selected':''?> >AB+</option>
              <option value="A-" <?php echo ($rowuser['bgroup'] == 'A-')?'selected':''?> >A-</option>
              <option value="O-" <?php echo ($rowuser['bgroup'] == 'O-')?'selected':''?> >O-</option>
              <option value="B-" <?php echo ($rowuser['bgroup'] == 'B-')?'selected':''?> >B-</option>
              <option value="AB-" <?php echo ($rowuser['bgroup'] == 'AB-')?'selected':''?> >AB-</option>
              </select>
              </td>
          </tr>

          <!--Education-->
          <tr class="spaceUnder">
            <td class="col-md-4 control-label" for="Name"><b>Education</b></td> 
              <td class="col-xs-4">
              
              <select id='edu' name="edu" class="form-control input-md">

              <option select="selected">Select</option>

              <option value="B.E." <?php echo ($rowuser['edu'] == 'B.E.')?'selected':''?> >B.E.</option>
              <option value="B.COM" <?php echo ($rowuser['edu'] == 'B.COM')?'selected':''?> >B.COM</option>
              </select>
              </td>
          </tr>

          <!--Education Specialization-->
          <tr class="spaceUnder">
            <td class="col-md-4 control-label"><b>Education Specialization</b></td>
              <td class="col-xs-4">   
                <input type="text" name="edu_spl" id="edu_spl" value="<?php echo $edu_spl; ?>" class="form-control"/>
              </td>
          </tr>

          <!--Occupation-->
          <tr class="spaceUnder">
            <td class="col-md-4 control-label" for="Name"><b>Occupation</b></td> 
              <td class="col-xs-4">
              <select id='occ' name="occ" class="form-control input-md" onchange="showfield(this.options[this.selectedIndex].value)">

              <option select="selected">Select</option>
              <option value="Teacher" <?php echo ($rowuser['occ'] == 'Teacher')?'selected':''?> >Teacher</option>
              <option value="Businessman" <?php echo ($rowuser['occ'] == 'Businessman')?'selected':''?> >Businessman</option>
              
              <?php 

                $a =$rowuser['occ'];
               
              ?>

              <option value="<?php echo($rowuser['occ']); ?>" <?php echo ($rowuser['occ'] == $a )?:''?> ><?php echo($rowuser['occ']); ?></option>
               <!--<option value="<?php echo($rowuser['occ']); ?>" <?php echo ($rowuser['occ'] == $a )?'selected':''?> ><?php echo($rowuser['occ']); ?></option>-->              

              </select>
              <!-- <select name="occ" id="occ" class="form-control">
              <option value="#">Select</option>
              <option select="selected">Select</option>
              <option value="Teacher" <?php echo ($rowuser['occ'] == 'Teacher')?'selected':''?> >Teacher</option>
              <option value="Businessman" <?php echo ($rowuser['occ'] == 'Businessman')?'selected':''?> >Businessman</option>
              <?php  $a =$rowuser['occ']; ?>
              <option value="<?php echo($rowuser['occ']); ?>" <?php echo ($rowuser['occ'] == $a )?'selected':''?> ><?php echo($rowuser['occ']); ?></option>
              <?php
              $cn_selected = '';  

              foreach($Occupation as $surname)
              {
                if ($surname == $surname['title'])
                {
                  $cn_selected = 'selected="selected"';
                }
                else
                {
                  $cn_selected = '';
                }

              ?>
                                <option <?php echo $cn_selected; ?> value="<?php echo $surname['title']; ?>"><?php echo $surname['title']; ?></option>
                  <?php
              }
              ?>
              </select>-->
              </td>
          </tr>

          <!--Fathername-->
          <tr class="spaceUnder">
            <td class="col-md-4 control-label"><b>Father Name</b></td>
              <td class="col-xs-4">   
                <input type="text" name="faname" id="faname" value="<?php echo $faname; ?>" class="form-control"/>
              </td>
          </tr>

          <!--Mother Name-->
          <tr class="spaceUnder">
            <td class="col-md-4 control-label"><b>Mother Name</b></td>
              <td class="col-xs-4">   
                <input type="text" name="mname" id="mname" value="<?php echo $mname; ?>" class="form-control"/>
              </td>
          </tr>

          <!--Father's Father Name-->
          <tr class="spaceUnder">
            <td class="col-md-4 control-label"><b>Father's Father Name</b></td>
              <td class="col-xs-4">   
                <input type="text" name="ff_name" id="ff_name" value="<?php echo $ff_name; ?>" class="form-control"/>
              </td>
          </tr>

          <!--Father's Mother Name-->
          <tr class="spaceUnder">
            <td class="col-md-4 control-label"><b>Father's Mohter Name</b></td>
              <td class="col-xs-4">   
                <input type="text" name="fm_name" id="fm_name" value="<?php echo $fm_name; ?>" class="form-control"/>
              </td>
          </tr>

          <!--Mother's Father Name-->
          <tr class="spaceUnder">
            <td class="col-md-4 control-label"><b>Mother's Father Name</b></td>
              <td class="col-xs-4">   
                <input type="text" name="mf_name" id="mf_name" value="<?php echo $mf_name; ?>" class="form-control"/>
              </td>
          </tr>

          <!--Mother's Mohter Name-->
          <tr class="spaceUnder">
            <td class="col-md-4 control-label"><b>Mother's Mother Name</b></td>
              <td class="col-xs-4">   
                <input type="text" name="mm_name" id="mm_name" value="<?php echo $mm_name; ?>" class="form-control"/>
              </td>
          </tr>

          <!--Mother's Surname-->
          <tr class="spaceUnder">
            <td class="col-md-4 control-label" for="Name"><b>Mother's Surname</b></td> 
              <td class="col-xs-4"> 
              <select name="m_sname" id="m_sname" class="form-control">


              <option value="#">Select</option>

              <?php
              $cn_selected = '';  

              foreach($all_surname as $surname)
              {
                if ($m_sname == $surname['title'])
                {
                  $cn_selected = 'selected="selected"';
                }
                else
                {
                  $cn_selected = '';
                }

              ?>
                  <option <?php echo $cn_selected; ?> value="<?php echo $surname['title']; ?>"><?php echo $surname['title']; ?></option>
                  <?php
              }
              ?>

              </select>
              </td>
          </tr>

          <!--Mother's Village-->
          <tr class="spaceUnder">
            <td class="col-md-4 control-label"><b>Mother's Village</b></td>
              <td class="col-xs-4">   
                <input type="text" name="m_vlg" id="m_vlg" value="<?php echo $m_vlg; ?>" class="form-control"/>
              </td>
          </tr>
		 <tr class="spaceUnder">
            <td class="col-md-4 control-label"><b>Matrimony</b></td>
              <td class="col-xs-4">   
				<input type="checkbox" name="matrimony" id="matrimony" <?php echo ($matrimony==1)?"checked=true":""; ?> /> 
              </td>
          </tr>
  <!-- Wife details -->
 
          <!--Wife Name-->
<div style='display:none;' >

          <tr class="spaceUnder" id='wife'>
            <td class="col-md-4 control-label"><b>Wife Name</b></td>
              <td class="col-xs-4">   
                <input type="text" name="w_name" id="w_name" value="<?php echo $w_name; ?>" class="form-control"/>
              </td>
          </tr>

          <!--W_Married Date-->
          <tr class="spaceUnder" id='wife0'>
            <td class="col-md-4 control-label"><b>Married___Date</b></td>
              <td class="col-xs-4">   
                <input type="date" name="mdate" id="mdate" value="<?php echo $mdatee; ?>" class="form-control"/>
              </td>
          </tr>

          <!--Wife's father Name-->
          <tr class="spaceUnder" id='wife1'>
            <td class="col-md-4 control-label"><b>Wife's Father Name</b></td>
              <td class="col-xs-4">   
                <input type="text" name="wf_name" id="wf_name" value="<?php echo $wf_name; ?>" class="form-control"/>
              </td>
          </tr> 

          <!--Wife's Mother Name-->
          <tr class="spaceUnder" id='wife2'>
            <td class="col-md-4 control-label"><b>Wife's Mother Name</b></td>
              <td class="col-xs-4">   
                <input type="text" name="wm_name" id="wm_name" value="<?php echo $wm_name; ?>" class="form-control"/>
              </td>
          </tr>

          <!--Wife's Surname-->
          <tr class="spaceUnder" id='wife3'>
            <td class="col-md-4 control-label" for="Name"><b>Wife's Surname</b></td> 
              <td class="col-xs-4"> 
              <select name="w_sname" id="w_sname" class="form-control">


              <option value="#">Select</option>

              <?php
              $cn_selected = '';  

              foreach($all_surname as $surname)
              {
                if ($w_sname == $surname['title'])
                {
                  $cn_selected = 'selected="selected"';
                }
                else
                {
                  $cn_selected = '';
                }

              ?>
                  <option <?php echo $cn_selected; ?> value="<?php echo $surname['title']; ?>"><?php echo $surname['title']; ?></option>
                  <?php
              }
              ?>

              </select>
              </td>
          </tr>

<!--Wife's Village-->
          <tr class="spaceUnder" id='wife4'>
            <td class="col-md-4 control-label"><b>Wife's Village</b></td>
              <td class="col-xs-4">   
                <input type="text" name="w_vlg" id="w_vlg" value="<?php echo $w_vlg; ?>" class="form-control"/>
              </td>
          </tr>
          </div>





  <!-- Husband details --> 

          <!--Married Date

          <tr class="spaceUnder" id="husband0">
            <td class="col-md-4 control-label"><b>Married Date</b></td>
              <td class="col-xs-4">   
                <input type="date" name="mdate" id="mdate" value="<?php echo $mdatee; ?>" class="form-control"/>
              </td>
          </tr>-->

<div style='display:none;' >
          <!--Husband Name-->
          <tr class="spaceUnder" id='husband'>
            <td class="col-md-4 control-label"><b>Husband Name</b></td>
              <td class="col-xs-4">   
                <input type="text" name="h_name" id="h_name" value="<?php echo $h_name; ?>" class="form-control"/>
              </td>
          </tr>

          <!--H_Married Date-->
          <tr class="spaceUnder" id='husband0'>
            <td class="col-md-4 control-label"><b>Married Date</b></td>
              <td class="col-xs-4">   
                <input type="date" name="mdate" id="mdate" value="<?php echo $mdatee; ?>" class="form-control"/>
              </td>
          </tr>

          <!--Husband's father Name-->
          <tr class="spaceUnder" id='husband1'>
            <td class="col-md-4 control-label"><b>Husband's Father Name</b></td>
              <td class="col-xs-4">   
                <input type="text" name="hf_name" id="hf_name" value="<?php echo $hf_name; ?>" class="form-control"/>
              </td>
          </tr> 

          <!--Husband's Mother Name-->
          <tr class="spaceUnder" id='husband2'>
            <td class="col-md-4 control-label"><b>Husband's Mother Name</b></td>
              <td class="col-xs-4">   
                <input type="text" name="hm_name" id="hm_name" value="<?php echo $hm_name; ?>" class="form-control"/>
              </td>
          </tr>

          <!--Parents Number
          <tr class="spaceUnder">
            <td class="col-md-4 control-label" for="Name"><b>Parents Number</b></td> 
              <td class="col-xs-4"> 
              <select name="pcnum" id="pcnum" class="form-control">


              <option value="#">Select</option>

              <?php
              $cn_selected = '';  

              foreach($all_surname as $surname)
              {
                if ($pcnum == $surname['title'])
                {
                  $cn_selected = 'selected="selected"';
                }
                else
                {
                  $cn_selected = '';
                }

              ?>
                  <option <?php echo $cn_selected; ?> value="<?php echo $surname['title']; ?>"><?php echo $surname['title']; ?></option>
                  <?php
              }
              ?>

              </select>
              </td>
          </tr> -->

<!--Husband's Village-->
          <tr class="spaceUnder" id='husband3'>
            <td class="col-md-4 control-label"><b>Husband's Village</b></td>
              <td class="col-xs-4">   
                <input type="text" name="h_vlg" id="h_vlg" value="<?php echo $h_vlg; ?>" class="form-control"/>
              </td>
          </tr>
</div>                   




        
<!--<?php $a =$rowuser['occ']; echo($a); ?>-->
        </div>
      </table>  
      

              <!--<div class="form-group">
              <label for="exampleInputPassword1">Image</label>
              <?php 
                          $profile_img_url = base_url().'images/no-image.jpg';
                          if ($image != '')
                          {
                              $profile_img_url = base_url().'uploads/user_details/'.$image;
                          }
                          else
                          {
                              $profile_img_url = base_url().'images/no-image.jpg';
                          }
                     ?>
                    <img id="image_display" src="<?php echo $profile_img_url; ?>" height="50" width="50" />
                      &nbsp;
                      <input type="file" name="image" id="image" class="form-control"/>
              </div>
              </div>-->

              <div class="checkbox">
                  <label for="exampleInputPassword1"><b>Status</b></label>&nbsp;
            &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;                 
                  <input type="checkbox" name="chk_status" id="chk_status" <?php echo ($status==1)?"checked=true":""; ?> />                    
              </div>



              

                    
                  
          <div class="box-footer">
          <button type="submit" class="btn btn-primary">Submit</button>
          <input type="button" name="back" value="Cancel" class="btn btn-primary" onclick="window.location.href='<?php echo base_url().'user_details';?>'"/>
        </div>
        <input type="hidden" name="action" id="action" value="<?php echo $action; ?>" />
          <input type="hidden" name="hdn_uid" id="hdn_uid" value="<?php echo $uid?>"/>
          <input type="hidden" value="<?php echo $image; ?>" name="old_file_name" id="old_file_name"/>
		  <input type="hidden" value="<?php echo $adharcard_photo; ?>" name="old_file_name1" id="old_file_name1"/>
          <input type="hidden" name="hdn_status" value="<?php echo $status?>"/>
		  <input type="hidden" name="hdn_otp" value="<?php echo $otp?>"/>
		  <input type="hidden" name="hdn_mobileverify" value="<?php echo $mobileverify?>"/>


              
              
      </form>
    </div>
  </div>
        <!-- /.box -->

  </section>
</div>
</div>
<!--<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>js/jquery.maskedinput-1.3.1.min_.js"></script>-->
<script type="text/javascript">
jQuery(function($) {
      $.mask.definitions['~']='[+-]';
      $('#phone').mask('(999) 999-9999');
      $('#fax').mask("(999) 999-9999");
   });
</script>

<script type="text/javascript">

var abc=  "<?php echo $gen ?>";
var xyz=  "<?php echo $sta ?>";
console.log('Single >>>>> '+ abc + " <<<<< "+xyz);



if (xyz === "Single" || xyz === " " ) 
{
                      $("#husband").hide();
                      $("#husband0").hide();
                      $("#husband1").hide();
                      $("#husband2").hide();
                      $("#husband3").hide();

                      $("#wife").hide();
                      $("#wife0").hide();
                      $("#wife1").hide();
                      $("#wife2").hide();
                      $("#wife3").hide();
                      $("#wife4").hide();
}
else{
if (abc === "Male")
{
  console.log('Wife show >>>>> ');
                      $("#wife").show();
                      $("#wife0").show();
                      $("#wife1").show(); 
                      $("#wife2").show(); 
                      $("#wife3").show();
                      $("#wife4").show();

                      $("#husband").hide();
                      $("#husband0").hide();
                      $("#husband1").hide();
                      $("#husband2").hide();
                      $("#husband3").hide();
}
else
{
  if(abc === ""){
                      $("#wife").hide();
                      $("#wife0").hide();
                      $("#wife1").hide();
                      $("#wife2").hide();
                      $("#wife3").hide();
                      $("#wife4").hide();

                      $("#husband").hide();
                      $("#husband0").hide();
                      $("#husband1").hide();
                      $("#husband2").hide();
                      $("#husband3").hide();
  }else{
                    console.log('Husband show >>>>> ');
                  
                      $("#husband").show();
                      $("#husband0").show();
                      $("#husband1").show();
                      $("#husband2").show();
                      $("#husband3").show();

                      $("#wife").hide();
                      $("#wife0").hide();
                      $("#wife1").hide();
                      $("#wife2").hide();
                      $("#wife3").hide();
                      $("#wife4").hide();

           }          
}
}

      $(document).ready(function(){



                $('#mgen').on('change', function() {

                  if ( this.id == 'mgen'){
                    console.log('Male >>>>> ' + this.value);
                    $('#sta').on('change', function() {
                        if ( this.value == 'Single' ||this.value == 'Select' )
                        {
                         
                    console.log('wife hide >>>>> ' + this.value);
                      $("#wife").hide();
                      $("#wife0").hide();
                      $("#wife1").hide();
                      $("#wife2").hide();
                      $("#wife3").hide();
                      $("#wife4").hide();

                      $("#husband").hide();
                      $("#husband0").hide();
                      $("#husband1").hide();
                      $("#husband2").hide();
                      $("#husband3").hide();
                         
                        }
                        else 
                        {
                           
                    console.log('wife show >>>>> ' + this.value);
                      $("#wife").show();
                      $("#wife0").show();
                      $("#wife1").show(); 
                      $("#wife2").show(); 
                      $("#wife3").show();
                      $("#wife4").show();

                      $("#husband").hide();
                      $("#husband0").hide();
                      $("#husband1").hide();
                      $("#husband2").hide();
                      $("#husband3").hide();
                        
                        }
                    });
                  }
                  else{ 
                    console.log('wife hide >>>>> ' + this.value);
                      $("#wife").hide();
                      $("#wife0").hide();
                      $("#wife1").hide();
                      $("#wife2").hide();
                      $("#wife3").hide();
                      $("#wife4").hide();
                   
                      $("#husband").hide();
                      $("#husband0").hide();
                      $("#husband1").hide();
                      $("#husband2").hide();
                      $("#husband3").hide();

                  }
                });


                $('#fgen').on('change', function() {

                  if ( this.id == 'fgen'){
                      console.log('Female >>>>> ' + this.value);
                    $('#sta').on('change', function() {
                        if ( this.value == 'Single' ||this.value == 'Select')
                      {
                    console.log('husband hide >>>>> ' + this.value);
                      $("#husband").hide();
                      $("#husband0").hide();
                      $("#husband1").hide();
                      $("#husband2").hide();
                      $("#husband3").hide();

                      $("#wife").hide();
                      $("#wife0").hide();
                      $("#wife1").hide();
                      $("#wife2").hide();
                      $("#wife3").hide();
                      $("#wife4").hide();

                      }
                      else 
                      {
                      

                    console.log('husband show >>>>> ' + this.value);
                      $("#husband").show();
                      $("#husband0").show();
                      $("#husband1").show();
                      $("#husband2").show();
                      $("#husband3").show();

                      $("#wife").hide();
                      $("#wife0").hide();
                      $("#wife1").hide();
                      $("#wife2").hide();
                      $("#wife3").hide();
                      $("#wife4").hide();
                      }
                    });
                    }
                    else{
                   console.log('husband hide >>>>> ' + this.value);
                      $("#husband").hide();
                      $("#husband0").hide();
                      $("#husband1").hide();
                      $("#husband2").hide();
                      $("#husband3").hide();

                      $("#wife").hide();
                      $("#wife0").hide();
                      $("#wife1").hide();
                      $("#wife2").hide();
                      $("#wife3").hide();
                      $("#wife4").hide();
                      }

                });

      });
      </script>