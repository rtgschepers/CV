<?php

class Resume_model extends CI_Model
{
	private $table = 'resumes';

	public function get_resume($resume_id)
	{
		if ($resume_id) {
			$this->db->select('title, subtitle, note, description');
			$this->db->from($this->table);
			$this->db->where('resume_id', $resume_id);
			$result = $this->db->get();

			if ($result->num_rows()) {
				return $result->row(0);
			}
		}
		return null;
	}

	public function parse_description($desc)
	{
		$desc = preg_replace("/(\\r\\n)+/", "</p><p>", $desc);
		return $desc;
	}
}
