<?php
class Cuenta_model extends CI_Model {

        public function __construct()
        {
                $this->load->database();
        }

	public function get_cuentas($slug = FALSE)
	{
		if ($slug === FALSE)
		{
			$query = $this->db->get('cuenta_bancaria');
			return $query->result_array();
		}

		$query = $this->db->get_where('cuenta_bancaria', array('slug' => $slug));
		return $query->row_array();
	}

	public function delete_cuenta($id_cuenta_bancaria)
	{
		return $this->db->delete('cuenta_bancaria', array('id_cuenta_bancaria'=> $id_cuenta_bancaria));
	}
}
