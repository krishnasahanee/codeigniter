<!--formview-->
<html>
<head>
<title>tesdb</title>
</head>
<body>
    <h1>Form Biodata</h1>  
    <?php
        echo form_open('tesform/save', array('name' => 'myform'));    
    ?>
        <table border="0">
            <tr>
                <td>Name</td>
                <td><input type="text" name="name1"></input></td>
            </tr>
            <tr>
                <td>Phone</td>
                <td><input type="text" name="phone1"></input></td>
            </tr>    
            <tr>
                <td><input type="submit" name="submit" value="submit"></input></td>
            </tr>        
        </table>
    <?php
        echo form_close();
    ?>

 	<a href="<?php echo base_url().'tesform/delete/'?>">View Data</a>
</body>
</html>

<!--viewdata-->
<!DOCTYPE html>
<html>
<head>
	<title>View data from databse</title>
</head>
<body>
<h1 align="center"><u>View Data From Database</u></h1>
<table align="center" border="2">
	<tr>
		<th>First name</th>
		<th>Last name</th>
		<th>Action</th>
	</tr>
	<?php foreach ($qq as $rr) {
			?>
		<tr>
			<td><?php echo $rr['name'] ?></td>
			<td><?php echo $rr['phone'] ?></td>
			<td><a href="<?php echo base_url().'tesform/delete/'.$rr['id'];?>">Delete</a>
			<a href="<?php echo base_url().'tesform/show/'.$rr['id'];?>">Edit</a>
				</td>
		</tr>
	<?php } ?>
	</table>
	<h3><a href="<?php echo base_url().'tesform/index/'?>">Add Data</a></h3>	
</body>
</html>

<!--edit-->
<?php 
    foreach($qq as $kk):
    $id=$kk['id'];
    $name=$kk['name'];
    $phone=$kk['phone'];      
    endforeach;
?>
<html>
<head>
<title>tesdb</title>
</head>
<body>
    <h1>Update Biodata</h1> 
    <?php
        echo form_open('tesform/update', array('name' => 'myform'));    
    ?>
        <table border="0">
            <tr>
                <td>Name</td>
                <td><input type="text" name="name1" value="<?php echo $name; ?>"></input></td>
            </tr>
            <tr>
                <td>Phone</td>
                <td><input type="text" name="phone1" value="<?php echo $phone; ?>"></input></td>
            </tr>    
            <tr>
                <td><input type="submit" name="update" value="Update"></input></td>
            </tr>        
        </table>
        <input type="hidden" name="id1" value="<?php echo $id?>"/>
    <?php
        echo form_close();
    ?>

</body>
</html>

<!--tesformmodel-->
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

        // Function To Fetch Selected Student Record
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

<!--tesform-->
<?php
    class Tesform  extends CI_Controller{
        
        function __construct()
	    {
	        // this is your constructor
	        parent::__construct();
	        $this->load->helper('form');
	        $this->load->helper('url');
	    }
	    function index()
	    {
	        $this->load->view('formview');        
	    }
        function save(){
            $this->load->model('tesformmodel');        
            if($this->input->post('submit')){
                $this->tesformmodel->process();                
                }
            redirect('tesform');
        }

        function view(){
            $this->load->model('tesformmodel');        
            $data['qq']=$this->tesformmodel->viewdata();
            $this->load->view('viewdata',$data);    
        }

        function delete(){
        	$this->load->model('tesformmodel');
        	$id = $this->uri->segment(3);
    		$this->tesformmodel->delete($id);
    		redirect('tesform/view');
     		
        }
        function show($data) {
        	$this->load->model('tesformmodel');        
            $data1['qq']=$this->tesformmodel->show_id($data);
			$this->load->view('edit',$data1);
		}
		function update(){
            $this->load->model('tesformmodel');        
            if($this->input->post('update')){
                $this->tesformmodel->editdata();                
                }
            redirect('tesform/view');
        }
    }
?>