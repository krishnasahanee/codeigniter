<?php
    class Mdl_user_details extends CI_Model{
        
        function __construct(){
            parent::__construct();

        }

        function get_all_user_details(){
            $this->db->select('*');
            //$this->db->from('user_reg');
            //$this->db->join('surname', 'surname.s_id = user_reg.s_id');
             $this->db->order_by("uid", "desc");
            $query=$this->db->get('user_reg');
            return $query->result_array();
        }
        
        //for edit
        function get_user_details($ids){
            $this->db->where('uid',$ids);
            $query=$this->db->get('user_reg');
           

            return $query->result_array();
        }
        //surname list
        /*function get_surname(){
                 
            $query=$this->db->get('surname');
            return $query->result_array();
        }*/


        /*---------get all surname data----------*/
         function get_all_user_reg_data(){

           $this->db->select('gen,sta,fname,title,bdate,mdate,vlg,cnum,c_city,c_area,bgroup,edu,edu_spl,occ,fname,mname,ff_name,fm_name,mf_name,mm_name,title,m_vlg,w_name,wf_name,wm_name,w_sname,w_vlg,h_name,hf_name,hm_name,pcnum,h_vlg');          
           $this->db->from('user_reg');
           $this->db->join('surname', 'surname.s_id = user_reg.s_id');         
           $query=$this->db->get();
           return $query->result_array();
        }

        function get_all_category_data(){
            
            $query=$this->db->get('surname');
            return $query->result_array();

        }

        function insert($filename='',$filename1=''){
            //$ids=$this->input->post('hdn_uid');
           // $city_id=$this->input->post('uid');
            
            $gen=$this->input->post('gen');
            $sta=$this->input->post('sta');
            $gallery_image=$filename;
            $fname=$this->input->post('fname');

            $s_id=$this->input->post('s_id');
			
			 $fb_link=$this->input->post('fb_link');
			 $adharcard_photo=$filename1;

            $uname=$this->input->post('uname');
            $pass=$this->input->post('pass');
            $email=$this->input->post('email');
            $bdate=$this->input->post('bdate');

            $date = strtotime($bdate);
            $b_date = date('d-m-Y', $date);

//convert birthday into age
            $age=$this->input->post('bdate');
$dateOfBirth = $age;
$today = date("Y-m-d");
$diff = date_diff(date_create($dateOfBirth), date_create($today));
$a = $diff->format('%y');
//
            $mdate=$this->input->post('mdate');
            $date = strtotime($mdate);
            $m_date = date('d-m-Y', $date);

            $vlg=$this->input->post('vlg');
            $cnum=$this->input->post('cnum');
            $c_city=$this->input->post('c_city');
            $c_area=$this->input->post('c_area');
            $bgroup=$this->input->post('bgroup');
            $edu=$this->input->post('edu');
            $edu_spl=$this->input->post('edu_spl');
            $occ=$this->input->post('occ');
            $faname=$this->input->post('faname');
            $mname=$this->input->post('mname');
            $ff_name=$this->input->post('ff_name');
            $fm_name=$this->input->post('fm_name');
            $mf_name=$this->input->post('mf_name');
            $mm_name=$this->input->post('mm_name');

            $m_sname=$this->input->post('m_sname');
            
            $m_vlg=$this->input->post('m_vlg');
            $w_name=$this->input->post('w_name');
            $wf_name=$this->input->post('wf_name');
            $wm_name=$this->input->post('wm_name');
            
            $w_sname=$this->input->post('w_sname');
            
            $w_vlg=$this->input->post('w_vlg');
            $h_name=$this->input->post('h_name');
            $hf_name=$this->input->post('hf_name');
            $hm_name=$this->input->post('hm_name');
            
            $pcnum=$this->input->post('pcnum');
            
            $h_vlg=$this->input->post('h_vlg');
            
            $status=(isset($_POST['chk_status']))?$status=1:$status=0;
            $data=array(
                        'gen'=>$gen,
                        'sta'=>$sta,
                        'image'=>$gallery_image,
                        'fname'=>$fname,

                        's_id'=>$s_id,        // user surname

                        'uname'=>$uname,
                        'pass'=>$pass,
                        'email'=>$email,
                        'bdate'=>$b_date,
                        'mdate'=>$m_date,
                        'age'=>$a,
						
						'fb_link'=>$fb_link,
						'adharcard_photo'=>$adharcard_photo,

                        
                        'vlg'=>$vlg,
                        'cnum'=>$cnum,
                        'c_city'=>$c_city,
                        'c_area'=>$c_area,
                        'bgroup'=>$bgroup,
                        'edu'=>$edu,
                        'edu_spl'=>$edu_spl,
                        'occ'=>$occ,
                        'faname'=>$faname,
                        'mname'=>$mname,
                        'ff_name'=>$ff_name,
                        'fm_name'=>$fm_name,
                        'mf_name'=>$mf_name,
                        'mm_name'=>$mm_name,
                        
                        'm_sname'=>$m_sname,  //mother surname
                        
                        'm_vlg'=>$m_vlg,
                        'w_name'=>$w_name,
                        'wf_name'=>$wf_name,
                        'wm_name'=>$wm_name,
                        'w_sname'=>$w_sname,  //wife surname
                        'w_vlg'=>$w_vlg,

                        'h_name'=>$h_name,
                        'hf_name'=>$hf_name,
                        'hm_name'=>$hm_name,
                        
                        'pcnum'=>$pcnum,  //husband surname
                        
                        'h_vlg'=>$h_vlg,
                        'status'=>$status,
						'otp'=>0,
						'mobile_verify'=>0,
						'matrimony'=>0


            );

            if($this->db->insert('user_reg',$data))
                return true;
            else
                return false;
        }

        function update($filename='',$filename1=''){
            $ids=$this->input->post('hdn_uid');
            $city_id=$this->input->post('uid');
            
            $gen=$this->input->post('gen');
            $sta=$this->input->post('sta');
            $fname=$this->input->post('fname');
            $s_id=$this->input->post('s_id');
            $uname=$this->input->post('uname');
            $pass=$this->input->post('pass');
			$fb_link=$this->input->post('fb_link');
            $email=$this->input->post('email');
            
            $bdate=$this->input->post('bdate');

            $date = strtotime($bdate);
            $b_date = date('d-m-Y', $date);

            

//convert birthday into age
            $age=$this->input->post('bdate');
$dateOfBirth = $age;
$today = date("Y-m-d");
$diff = date_diff(date_create($dateOfBirth), date_create($today));
$a = $diff->format('%y');
//
            
            $mdate=$this->input->post('mdate');
            $date2 = strtotime($mdate);
            $m_date = date('d-m-Y', $date2);          

            $vlg=$this->input->post('vlg');
            $cnum=$this->input->post('cnum');
            $c_city=$this->input->post('c_city');
            $c_area=$this->input->post('c_area');
            $bgroup=$this->input->post('bgroup');
            $edu=$this->input->post('edu');
            $edu_spl=$this->input->post('edu_spl');
            $occ=$this->input->post('occ');
            $faname=$this->input->post('faname');
            $mname=$this->input->post('mname');
            $ff_name=$this->input->post('ff_name');
            $fm_name=$this->input->post('fm_name');
            $mf_name=$this->input->post('mf_name');
            $mm_name=$this->input->post('mm_name');
            $m_sname=$this->input->post('m_sname');
            $m_vlg=$this->input->post('m_vlg');

            $w_name=$this->input->post('w_name');
            $wf_name=$this->input->post('wf_name');
            $wm_name=$this->input->post('wm_name');
            $w_sname=$this->input->post('w_sname');
            $w_vlg=$this->input->post('w_vlg');

            $h_name=$this->input->post('h_name');
            $hf_name=$this->input->post('hf_name');
            $hm_name=$this->input->post('hm_name');
            $pcnum=$this->input->post('pcnum');
            $h_vlg=$this->input->post('h_vlg');



            $image=$filename;
			$adharcard_photo=$filename1;
			
			$hdn_otp=$this->input->post('hdn_otp');
			$hdn_mobileverify=$this->input->post('hdn_mobileverify');
			$matrimony=$this->input->post('matrimony');
            
            if($this->input->post('chk_status'))
                $status=(isset($_POST['chk_status']))?$status=1:$status=0;
            else
            $status=$this->input->post('hdn_status');
            $data=array(
                
                'gen'=>$gen,
                'sta'=>$sta,
                'fname'=>$fname,
                'uname'=>$uname,
                's_id'=>$s_id,
                'pass'=>$pass,
				'fb_link'=>$fb_link,
                'email'=>$email,
                'bdate'=>$b_date,
                'mdate'=>$m_date,

                'age'=>$a,

                'vlg'=>$vlg,
                'cnum'=>$cnum,
                'c_city'=>$c_city,
                'c_area'=>$c_area,
                'bgroup'=>$bgroup,
                'edu'=>$edu,
                'edu_spl'=>$edu_spl,
                'occ'=>$occ,
                'faname'=>$faname,
                'mname'=>$mname,
                'ff_name'=>$ff_name,
                'fm_name'=>$fm_name,
                'mf_name'=>$mf_name,
                'mm_name'=>$mm_name,
                'm_sname'=>$m_sname,
                'm_vlg'=>$m_vlg,

                'w_name'=>$w_name,
                'wf_name'=>$wf_name,
                'wm_name'=>$wm_name,
                'w_sname'=>$w_sname,
                'w_vlg'=>$w_vlg,

                'h_name'=>$h_name,
                'hf_name'=>$hf_name,
                'hm_name'=>$hm_name,
                'pcnum'=>$pcnum,
                'h_vlg'=>$h_vlg,

                

                'image'=>$image,
				'adharcard_photo'=>$adharcard_photo,
                'status'=>$status,
				'otp'=>$hdn_otp,
				'mobile_verify'=>$hdn_mobileverify,
				'matrimony'=>$matrimony
                
            );
            $this->db->where('uid',$ids);
            
            if($this->db->update('user_reg',$data))
                return true;
            else
                return false;
        }


    /////



        function view_user_details($id)
        {
            /*$this->db->select('*');
            $this->db->from('user_reg');
            //$this->db->join('surname', 'surname.s_id = user_reg.s_id');
            $this->db->join('surname', 'surname.s_id = user_reg.m_sname');*/
           
            $this->db->select('*');
            //$this->db->select('*,surname.title');
            //$this->db->from('user_reg');
            //$this->db->join('surname', 'user_reg.s_id = surname.s_id');
            $this->db->where('uid',$id);
            $query = $this->db->get('user_reg');

            

            //$this->db->where('uid',$id);
            //$query=$this->db->get();

            return $query->row_array();

        }

    ////        
        function delete($ids)
        {
            $ids_array=explode('_',$ids);
            $flag = true ;
            foreach($ids_array as $id)
            {
                //first get the image and unlink it
                $this->db->where('uid',$id);
                $query=$this->db->get('user_reg');
                $result=$query->row_array();
                $path=$result['image'];
                if(@file_exists('./uploads/user_details/'.$path))
                    @unlink('./uploads/user_details/'.$path);
                if(@file_exists('./uploads/user_details/thumb_100_100/'.$path))
                    @unlink('./uploads/user_details/thumb_100_100/'.$path);              
                //ends
                
                $this->db->where('uid',$id);
                //$this->db->db_debug=false;  
                if(!$this->db->delete('user_reg'))
                    $flag = false;
                    //return false;
                else
                    $flag = true;
            }
            //return true;
                if(!$flag)
                    return false;
                else
                    return true;
        }
        
        function change_status()
        {
            $ids=$this->input->post('ids');
            $status=$this->input->post('status');
            $this->db->where('uid',$ids);
            $data=array(
                'status'=>$status
            );
            if($this->db->update('user_reg',$data))
                return true;
            else
                return false;
        }


        function get_total_record_count()
        {
            return $this->db->count_all_results('user_details');
        }
        function change_order($id,$order)
        {
            $update_data = array(
     							'sort_order'		=> $order,
     						 	);
    		$this->db->where("uid",$id);
     		$this->db->update('user_reg', $update_data);
        }
        function check_duplicate($name,$id)
        {
            $this->db->where('fname',$name);
            $this->db->where_not_in('uid',$id);
            $query=$this->db->get('user_reg');
            $result=$query->row_array();
            if(!empty($result))
                return false;
            else
                return true;
        }
}
?>