<?php defined('SYSPATH') or die('No direct script access.');

class GeoRoleMap_Controller extends Admin_Controller
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
    
    $this->template->content = new View('tests/georole_map');
    
    $this->template->content->title = "Heres a Map";
    $this->template->content->user_msg = 'Applies to Which User*';
    $this->template->content->loc_msg = 'Locations within GeoRole*';
    $this->template->content->descrip = 'GeoRole Description* ';
    
    // Setup and initialize form field names
		$form = array(
			'geometry' => array()
		);
    
    $geometry = array(
				"geometry" => 0,
				"label" => NULL,
				"comment" => NULL,
				"color" => NULL,
				"strokewidth" => NULL);
				
	$form['geometry'][] = json_encode($geometry);		
    
    // Javascript Header
	$this->template->map_enabled = TRUE;
	$this->template->colorpicker_enabled = TRUE;
	$this->template->treeview_enabled = TRUE;
	$this->template->json2_enabled = TRUE;
    
	$this->template->js = new View('reports/submit_edit_js');
	$this->template->js->edit_mode = TRUE;
	$this->template->js->default_map = Kohana::config('settings.default_map');
	$this->template->js->default_zoom = Kohana::config('settings.default_zoom');
	$this->template->js->latitude = Kohana::config('settings.default_lat');
	$this->template->js->longitude = Kohana::config('settings.default_lon');
	$this->template->js->incident_zoom = '';
    $this->template->js->geometries = $form['geometry'];
    
    // Inline Javascript
		$this->template->content->date_picker_js = $this->_date_picker_js();
		$this->template->content->color_picker_js = $this->_color_picker_js();
		$this->template->content->new_category_toggle_js = $this->_new_category_toggle_js();

		// Pack Javascript
		$myPacker = new javascriptpacker($this->template->js , 'Normal', FALSE, FALSE);
		$this->template->js = $myPacker->pack();
   
  }


}
