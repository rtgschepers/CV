<?php

class Event_model extends CI_Model
{
	private $table = 'events';

	public function get_events($resume_id)
	{
		if ($resume_id) {
			$this->db->select('name, description, date_started, date_ended');
			$this->db->from($this->table);
			$this->db->where('resume_id', $resume_id);
			$this->db->where('active', 1);
			$this->db->order_by('date_ended', 'DESC');
			$result = $this->db->get();

			if ($result->num_rows()) {
				return $result->result();
			}
		}
		return null;
	}
}
