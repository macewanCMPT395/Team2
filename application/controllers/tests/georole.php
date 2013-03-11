<?php defined('SYSPATH') or die('No direct script access.');

class GeoRole_Controller extends Controller
{
  public function index()
  {
    $test = new View('tests/georole_content');
    $test->title = "Create GeoRole";
    $test->user_msg = 'Applies to Which User*';
    $test->loc_msg = 'Locations within GeoRole*';
    $test->descrip = 'GeoRole Description* ';
    $test->now = date(DATE_RFC822);
    $test->render(TRUE);
  }

}