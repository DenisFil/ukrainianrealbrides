<?php 
	class Sorry_model extends CI_Model
	{
		public function email($data)
		{
			$query = $this->db->insert('service_email', $data);
			return $query;
		}
	}