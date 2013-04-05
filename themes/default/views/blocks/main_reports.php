<?php blocks::open("reports");?>
<?php blocks::title(Kohana::lang('ui_main.reports_listed')); ?>
<!--<?php if(Auth::instance()->logged_in("login")){ if(strcmp(User_Model::get_georole(Auth::instance()->get_user()->id),null) != 0){
	     blocks::title(Kohana::lang('ui_main.georole_reports_listed', array( User_Model::get_georole(Auth::instance()->get_user()->id) , Auth::instance()->get_user()->name ))); 
    }}
?>-->
<table class="table-list">
	<thead>
		<tr>
			<th scope="col" class="title"><?php echo Kohana::lang('ui_main.title'); ?></th>
			<th scope="col" class="location"><?php echo Kohana::lang('ui_main.location'); ?></th>
			<th scope="col" class="date"><?php echo Kohana::lang('ui_main.date'); ?></th>
		</tr>
	</thead>
	<tbody>
		<?php
		if ($incidents->count() == 0)
		{
			?>
			<tr><td colspan="3"><?php echo Kohana::lang('ui_main.no_reports'); ?></td></tr>
			<?php
		}
//ADDED CODE HERE
        //call filter_incidents function to return array of reports/incidents within georole, if georole null then dont filter
        if(Auth::instance()->logged_in("login")){
        if(strcmp(User_Model::get_georole(Auth::instance()->get_user()->id),null) != 0){
            $incidents = blocks::filter_incidents(User_Model::get_georole(Auth::instance()->get_user()->id),$incidents);
        }
	}
        
		foreach ($incidents as $incident)
		{
			$incident_id = $incident->id;
			$incident_title = text::limit_chars(strip_tags($incident->incident_title), 40, '...', True);
			$incident_date = $incident->incident_date;
			$incident_date = date('M j Y', strtotime($incident->incident_date));
			$incident_location = $incident->location->location_name;
		?>
		<tr>
			<td><a href="<?php echo url::site() . 'reports/view/' . $incident_id; ?>"> <?php echo html::specialchars($incident_title) ?></a></td>
			<td><?php echo html::specialchars($incident_location) ?></td>
			<td><?php echo $incident_date; ?></td>
		</tr>
		<?php
		}
		?>
	</tbody>
</table>
<a class="more" href="<?php echo url::site() . 'reports/' ?>"><?php echo Kohana::lang('ui_main.view_more'); ?></a>
<div style="clear:both;"></div>
<?php blocks::close();?>
