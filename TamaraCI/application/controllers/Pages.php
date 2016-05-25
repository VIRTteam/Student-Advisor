<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pages extends CI_Controller {

    public function view2($page = 'home')
    {
        if ( ! file_exists(APPPATH.'/views/pages/'.$page.'.php'))
        {
            // Whoops, we don't have a page for that!
            show_404();
        }

        $data['title'] = ucfirst($page); // Capitalize the first letter

        $this->load->view('templates/header', $data);
        $this->load->view('pages/'.$page, $data);
        $this->load->view('templates/footer', $data);
    }



    public function __construct()
    {
        parent::__construct();
        $this->load->model('new_model');
        //$this->load->database();
    }

    public function index()
    {
        $data['news'] = $this->new_model->get_clan();
        $data['title'] = 'News archive';

        $this->load->view('templates/header', $data);
        $this->load->view('pages/home', $data);
        $this->load->view('templates/footer');
    }

    public function view($ime = NULL)
    {
        $data['news_item'] = $this->new_model->get_clan($ime);
        $data['title'] = 'News archive';
        if (empty($data['news_item']))
        {
            show_404();
        }

        $this->load->view('templates/header', $data);
        $this->load->view('pages/about', $data);
        $this->load->view('templates/footer');
    }


    public function create()
    {
        $this->load->helper('form');
        $this->load->library('form_validation');

        $data['title'] = 'Create a news item';

        $this->form_validation->set_rules('ime', 'ime', 'required');
        $this->form_validation->set_rules('prezime', 'prezime', 'required');

        if ($this->form_validation->run() === FALSE)
        {
            $this->load->view('templates/header', $data);
            $this->load->view('pages/create');
            $this->load->view('templates/footer');

        }
        else
        {
            //$this->news_model->set_news();
            $this->load->view('testV');
        }
    }
}