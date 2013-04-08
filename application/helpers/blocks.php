<?php defined('SYSPATH') OR die('No direct access allowed.');
/**
 * Blocks helper class.
 *
 * @package    Admin
 * @author     Ushahidi Team
 * @copyright  (c) 2011 Ushahidi Team
 * @license    http://www.ushahidi.com/license.html
 */
class blocks_Core {
	
	/**
	 * Open A Block
	 *
	 * @return string
	 */
	public static function open($id = NULL)
	{
		if ($id)
		{
			echo "<li id=\"block-".$id."\"><div class=\"content-block\">";
		}
		else
		{
		  echo "<li><div class=\"content-block\">";
		}
		
	}
	
	/**
	 * Close A Block
	 *
	 * @return string
	 */
	public static function close()
	{
		echo "</div></li>";
	}
	
	/**
	 * Block Title
	 *
	 * @return string
	 */
	public static function title($title = NULL)
	{
		if ($title)
		{
			echo "<h5>$title</h5>";
		}
	}
	
	/**
	 * Register A Block
	 *
	 * @param array $block an array with classname, name and description
	 */
	public static function register($block = array())
	{
		// global variable that contains all the blocks
		$blocks = Kohana::config("settings.blocks");
		if ( ! is_array($blocks) )
		{
			$blocks = array();
		}
		
		if ( is_array($block) AND 
			array_key_exists("classname", $block) AND 
			array_key_exists("name", $block) AND 
			array_key_exists("description", $block) )
		{
			if ( ! array_key_exists($block["classname"], $blocks))
			{
				$blocks[$block["classname"]] = array(
					"name" => $block["name"],
					"description" => $block["description"]
				);
			}
		}
		asort($blocks);
		Kohana::config_set("settings.blocks", $blocks);
	}
	
	/**
	 * Render all the active blocks
	 *
	 * @return string block html
	 */	
	public static function render()
	{
		// Get Active Blocks
		$active_blocks = Settings_Model::get_setting('blocks');
		$active_blocks = array_filter(explode("|", $active_blocks));
		foreach ($active_blocks as $block)
		{
			if (class_exists($block))
			{
				$block = new $block();
				$block->block();
			}
		}
	}
	
	/**
	 * Sort Active and Non-Active Blocks
	 * 
	 * @param array $active array of active blocks
	 * @param array $registered array of all blocks
	 * @return array merged and sorted array of active and inactive blocks
	 */
	public static function sort($active = array(), $registered = array())
	{
		// Remove Empty Keys
		$active = array_filter($active);
		$registered = array_filter($registered);
		
		$sorted_array = array();
		$sorted_array = array_intersect($active, $registered);
		return array_merge($sorted_array, array_diff($registered, $sorted_array));
	}
	
	/**
	  * Function sorts the $incident array passed by georole
	  * (filtering the incidents outside of the georole out of the list)
	  */
	public static function filter_incidents($georole,$incidents)
	{
	    //collect reports that are in the georole in this array
	    $in_georole = array();

	    $georoles = explode(",", strtolower(str_replace(' ','',$georole)));

	    foreach($incidents as $in){
	        $locs = explode(",", strtolower(str_replace(' ','',$in->location->location_name)));
	        $loc = $locs[0]; //ensures only gets city names if cases like ex. edmonton, AB, Canada

	        foreach($georoles as $role){
	            if(strcmp($loc,$role) == 0){
	                //if report within georole add to in_georole array
	                array_push($in_georole,$in);
	            }
	        }

	    }
	    //Return
	    return $in_georole;
	}
		
}
