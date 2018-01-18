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