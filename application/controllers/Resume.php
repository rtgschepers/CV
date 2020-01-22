<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Resume extends CI_Controller
{
    private $resume_id;

    public function __construct()
    {
        parent::__construct();
        $this->load->model('slug_model');
        $this->load->model('resume_model');
        $this->load->model('skill_model');
        $this->load->model('event_model');
        $this->load->model('specialty_model');
        $this->load->model('hobby_model');
        $this->load->model('personal_details_model');
        $this->load->helper('text_helper');
    }

    public function index()
    {
        $this->resume();
    }

    public function resume()
    {
        $data = $this->getData();

        $personal_details = $this->personal_details_model->get_personal_details($this->resume_id);
        $data['personal_details'] = $personal_details;

        $this->load->view('resume', $data);
    }

    public function download()
    {
        $data = $this->getData();

        $personal_details = $this->personal_details_model->get_full_personal_details($this->resume_id);
        // Format the address
        $personal_details->address = "{$personal_details->address}<br>{$personal_details->zip_code}, {$personal_details->city}";
        unset($personal_details->zip_code);
        unset($personal_details->city);
        // Format the phones
        $personal_details->personal_phone = "{$personal_details->personal_phone}<br>{$personal_details->business_phone}";
        unset($personal_details->business_phone);
        // Format the emails
        $personal_details->personal_email = "{$personal_details->personal_email}<br>{$personal_details->business_email}";
        unset($personal_details->business_email);
        // Format the birthday
        $personal_details->birthday = date_format(new DateTime($personal_details->birthday), 'd-m-Y');

        $data['personal_details'] = $personal_details;
        $this->load->view('download', $data);
    }

    public function getData()
    {
        //        $slug = mysqli_real_escape_string($this->input->get('crumb', true));
        $slug = 'rtgschepers';

        // Get the resume_id based on the provided slug.
        $this->resume_id = $this->slug_model->resume_id_from_slug($slug);
        if (is_null($this->resume_id))
            show_404();

        /*
         * Retrieve general information about resume
         */
        $resume = $this->resume_model->get_resume($this->resume_id);
        $resume->description = $this->resume_model->parse_description($resume->description);
        foreach ($resume as &$value) {
            $value = email_clickable($value);
            $value = phone_clickable($value);
        }

        /*
         * Retrieve skills
         */
        $skills = $this->skill_model->get_skills($this->resume_id);

        /*
         * Retrieve events / experiences
         */
        $events = $this->event_model->get_events($this->resume_id);
        foreach ($events as $event) {
            $event->date_started = DateTime::createFromFormat('Y-m-d', $event->date_started)->format('m-Y');
            $event->date_ended = DateTime::createFromFormat('Y-m-d', $event->date_ended)->format('m-Y');
        }
        $current = array_pop($events);
        $current->date_ended = 'heden';
        array_unshift($events, $current);

        /*
         * Retrieve specialties
         */
        $specialties = $this->specialty_model->get_specialties($this->resume_id);

        /*
         * Retrieve hobbies
         */
        $hobbies = $this->hobby_model->get_hobbies($this->resume_id);

        // Pass retrieved data to the view
        $data = array(
            'resume_id' => $this->resume_id,
            'resume' => $resume,
            'skills' => $skills,
            'events' => $events,
            'specialties' => $specialties,
            'hobbies' => $hobbies
        );
        return $data;
    }
}
