<?php

class Skill_model extends CI_Model
{
	private $table = 'skills';

	public function get_skills($resume_id)
	{
		if ($resume_id) {
			$this->db->select('name, level');
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
