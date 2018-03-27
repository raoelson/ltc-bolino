<?php 
	
	/**
	 * @descript: compter les enregistrement dans une table
	 * @param: nom_table, string
	 */
	function record_count($table,$array=null) {
		$ci = &get_instance();
		$ci->db->select("owners.id as nb");	
		$ci->db->join ( "owners", "owners.id =owner_echanges.owner_id" );			
		$ci->db->group_by('owners.id');
		if ($array) $ci->db->where($array);
		$r = $ci->db->get($table)->result_array();
		return $r;
	}

	function NB_PAGES(){
		return 2;
	}
?>