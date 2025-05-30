<?php

class Pages extends CI_Controller
{
        public function view($page = 'home')
        {
                if (!file_exists(APPPATH . 'views/pages/' . $page . '.php')) {
                        // Whoops, we don't have a page for that!
                        show_404();
                }

                $data['title'] = ucfirst($page); // Capitalize the first letter; // 'title' is a key in the $data array, and 'ucfirst($page)' is its value.
                $data['secret'] = 'coolSecret123';
                // When you pass $data to your views using $this->load->view(), all the keys in the $data array become variables in the view.
                $this->load->view('templates/header', $data); // Pass $data to the header view
                $this->load->view('pages/' . $page, $data); // Pass $data to the specific page view
                $this->load->view('templates/footer', $data); // Pass $data to the footer view
        }
        public function index()
        {
                $data['news'] = $this->news_model->get_news();
                $data['title'] = 'News archive';

                $this->load->view('templates/header', $data);
                $this->load->view('news/index', $data);
                $this->load->view('templates/footer');
        }
}
