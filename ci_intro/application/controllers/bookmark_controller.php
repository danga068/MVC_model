<?php 

class bookmark_controller extends CI_Controller {
		
	
	public function index()
	{		
		$this->load->model('bookmark_model');
		$book['dt'] = $this->bookmark_model->test('bookmark_model');
		
                
                $sq1= "SELECT distinct Tag FROM bookmark";
				$book['dt1'] = $sq1;
				
				$sq2= "SELECT distinct Site FROM bookmark";
				$book['dt2'] = $sq2;
				
				$sq3= "SELECT * FROM bookmark";
				$book['dt3'] = $sq3;
			
			
				
				$this->load->view('bookmark_view1.php',$book);

	}
	
	public function add()
	{
		echo "IT IS ADD FUNCTION CALLING OF BOOKMARK";
	}
}
