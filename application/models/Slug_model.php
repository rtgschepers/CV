<?php

class Slug_model extends CI_Model
{
	private $table = 'slugs';

	public function resume_id_from_slug($slug = false)
	{
		if ($slug) {
			$this->db->select('resume_id');
			$this->db->from($this->table);
			$this->db->where('slug', $slug);
			$result = $this->db->get();

			if ($result->num_rows()) {
				return $result->row(0)->resume_id;
			}
		}
		return null;
	}
}
