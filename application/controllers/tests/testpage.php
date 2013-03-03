<?php defined('SYSPATH') or die('No direct script access.');

class TestPage_Controller extends Admin_Controller
{
  function __construct()
  {
    parent::__construct();

    /*$this->template->this_page = 'georole';

    // If user doesn't have access, redirect to dashboard
    if (!$this->auth->has_permission("users"))
    {
	  url::redirect(url::site() . 'admin/dashboard');
    }

    $this->display_roles = $this->auth->has_permission('manage_roles');
    */
  }

  public function index()
  {
    
    $this->template->content = new View('tests/georole_content');
    
    $this->template->content->title = "Test Page";
    $this->template->content->user_msg = 'Applies to Which User*';
    $this->template->content->loc_msg = 'Locations within GeoRole*';
    $this->template->content->descrip = 'GeoRole Description* ';
    
  }


}