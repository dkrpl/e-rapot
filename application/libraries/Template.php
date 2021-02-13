<?php
class Template
{
    protected $_ci;

    function __construct()
    {
        $this->_ci = &get_instance();
    }
    function display_admin($template, $data = null)
    {
        $data['_content'] = $this->_ci->load->view($template, $data, true);
        $data['_header'] = $this->_ci->load->view('layout/header', $data, true);
        $data['_sidebar'] = $this->_ci->load->view('layout/sidebar', $data, true);
        $this->_ci->load->view('/Template.php', $data);
    }
}
