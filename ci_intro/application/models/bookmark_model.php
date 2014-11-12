<?php 

class bookmark_model extends CI_Model {
		
	
	public function test()
	{
		$this->load->database();
		$rs1 = $this->db->query("select * from bookmark");
		return $rs1->result_array();
		//$res = $rs1->result();
		//echo "<pre>";
		//print_r($res);
	
		echo "this is model function";
	}
}
