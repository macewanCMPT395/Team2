<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
   <title><?php echo html::specialchars($title) ?></title>
   <link rel="stylesheet" type="text/css" href="http://localhost/~jharvard/Team2/media/css/tests/georole.css">

   
<style type="text/css">
   h3#side { 
       vertical-align: absbottom;
       display: inline;
       margin-right: 220px;
   }

   .green-button { 
       font-size: 150%;
       border: 1px solid black;
       background-color: green;
       color: white;
       height: 50px;
       width: 100px;
    }

   textarea#side { 
     margin-left: 10px;
     margin-right: 80px; 
     width: 350px;
     height: 50px;
     resize: none;
   }

   textarea#descrip {
     margin-left: 10px;
     width: 350px;
     height: 250px;
     resize: none;
   }

   div.submit-incident a,
   div.submit-incident a:hover {
     padding: 8px 10px 8px 35px;
     background-color: #368C00;
     background-image: url(http://localhost/~jharvard/Team2/themes/default/images/submit-incident.png);
     background-position: 10px 8px;
     background-repeat: no-repeat;
     color: white;
     text-transform: uppercase;
     font-weight: bold;
     font-size: 14px;
     text-decoration: none;
     float: right;
   }

   h2 a {
     font-size: 14px;
     line-height: 16px;
     color: #00699B;
     padding: 0 10px 0;
   }
   
   .f-col-1 {
    padding: 0 14px 14px 10px;
    width: 506px;
    float: right;
    }
    
   div.olMap {
        margin-right: 220px;
        z-index: 0;
        padding: 0 !important;
        margin: 0 !important;
        cursor: default;
    }
   
   .map_holder_reports {
        width: 494px;
        height: 350px;
        float: right;
        border: 3px solid #C2C2C2;
        position: relative;
   }

</style>

</head>

<body>
   
   <h2> 
      <a href="http://localhost/~jharvard/Team2/index.php/admin/users/">View Users</a>
      <a href="http://localhost/~jharvard/Team2/index.php/admin/users/edit/">Add/Edit Users</a>
      <a href="http://localhost/~jharvard/Team2/index.php/admin/users/roles/">Manage Roles & Permissions</a>
      Create GeoRole
   </h2>
   <h3 id="side"><?php echo $user_msg ?></h3>
   <h3 id="side"><?php echo $loc_msg ?></h3><br/>
   <textarea id="side">Type in which Users this GeoRole may apply too...</textarea>
   <textarea id="side">Type the Locations that are encompassed in the GeoRole...</textarea><br/>
   <h3><?php echo $descrip ?></h3>
   <textarea id="descrip">Briefly Describe the GeoRole...</textarea>
   
   <div class="f-col-1">
      <div id="divMap" class="map_holder_reports">
      
		<div id="geometryLabelerHolder" class="olControlNoSelect">
			<div id="geometryLabeler">
				<div id="geometryLabelComment">
					<span id="geometryLabel"><label><?php echo Kohana::lang('ui_main.geometry_label');?>:</label> <?php print form::input('geometry_label', '', ' class="lbl_text"'); ?></span>
					<span id="geometryComment"><label><?php echo Kohana::lang('ui_main.geometry_comments');?>:</label> <?php print form::input('geometry_comment', '', ' class="lbl_text2"'); ?></span>
				</div>
				<div>
					<span id="geometryColor"><label><?php echo Kohana::lang('ui_main.geometry_color');?>:</label> <?php print form::input('geometry_color', '', ' class="lbl_text"'); ?></span>
					<span id="geometryLat"><label><?php echo Kohana::lang('ui_main.latitude');?>:</label> <?php print form::input('geometry_lat', '', ' class="lbl_text"'); ?></span>
					<span id="geometryLon"><label><?php echo Kohana::lang('ui_main.longitude');?>:</label> <?php print form::input('geometry_lon', '', ' class="lbl_text"'); ?></span>
				</div>
				</div>
			<div id="geometryLabelerClose"></div>
		</div>
      </div>
      
      <div class="incident-find-location">
	    <div id="panel" class="olControlEditingToolbar">
	        <div class="olControlNavigationItemActive olButton"></div>
	        <div class="olControlDrawFeaturePolygonItemInactive olButton"></div>
	    </div>
		<div class="btns" style="float:left;">
			<ul style="padding:4px;">
				<li><a href="#" class="btn_del_last"><?php echo utf8::strtoupper(Kohana::lang('ui_main.delete_last'));?></a></li>
				<li><a href="#" class="btn_del_sel"><?php echo utf8::strtoupper(Kohana::lang('ui_main.delete_selected'));?></a></li>
				<li><a href="#" class="btn_clear"><?php echo utf8::strtoupper(Kohana::lang('ui_main.clear_map'));?></a></li>
			</ul>
	    </div> 
	  </div>
      
   </div>

   
</body>

</html>
