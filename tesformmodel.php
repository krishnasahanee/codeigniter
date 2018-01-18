<?php
    class Tesformmodel extends CI_Model{    
        function process(){
                $name = $this->input->post('name1');
                $phone = $this->input->post('phone1');
                $data = array(
                    'name'=>$name,
                    'phone'=>$phone                    
                );
                $this->load->database();
                $this->db->insert('reg',$data);    
            }        
        function viewdata(){
                
                $this->load->database();
                //$qq= $this->db->query("SELECT * FROM reg");
                //$result=$qq->result(); 
                //print_r($result);
                $sel=$this->db->get('reg');
                return $sel->result_array();  
            }
        function delete($id){
        		$this->load->database();
        		$this->db->where('id', $id);
    			$this->db->delete('reg'); 
        }
        // Function To Fetch Selected
		function show_id($data){
				$this->load->database();
				$this->db->where('id',$data);
            	$query=$this->db->get('reg');
            	return $query->result_array();
            	//$result= $query->result_array();
            	//print_r($result);
		}
		function editdata(){
                $id = $this->input->post('id1');
                $name = $this->input->post('name1');
                $phone = $this->input->post('phone1');
                $data = array(
                    'name'=>$name,
                    'phone'=>$phone                    
                );
                $this->load->database();
                $this->db->where('id', $id);
                $this->db->update('reg',$data);    
            }

    }
?>
