<?php

class Specialty_model extends CI_Model
{
	private $table = 'specialties';

	public function get_specialties($resume_id)
	{
		if ($resume_id) {
			$this->db->select('title, description, type');
			$this->db->from($this->table);
			$this->db->where('resume_id', $resume_id);
			$this->db->where('active', 1);
			$this->db->order_by('order_id', 'ASC');
			$result = $this->db->get();

			if ($result->num_rows()) {
				return $result->result();
			}
		}
		return null;
	}
}
