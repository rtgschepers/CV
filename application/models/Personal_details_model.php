<?php

class Personal_details_model extends CI_Model
{
	private $table = 'personal_details';

	public function get_personal_details($resume_id)
	{
		if ($resume_id) {
			$this->db->select('name, address, zip_code, city, personal_email, business_email, personal_phone, business_phone');
			$this->db->from($this->table);
			$this->db->where('resume_id', $resume_id);
			$result = $this->db->get();

			if ($result->num_rows()) {
				return $result->row(0);
			}
		}
		return null;
	}

	public function get_full_personal_details($resume_id)
	{
		if ($resume_id) {
			$this->db->select('name, address, zip_code, city, personal_phone, business_phone, personal_email, business_email, birthday, birthplace, nationality, marital_status, drivers_license');
			$this->db->from($this->table);
			$this->db->where('resume_id', $resume_id);
			$result = $this->db->get();

			if ($result->num_rows()) {
				return $result->row(0);
			}
		}
		return null;
	}
}
