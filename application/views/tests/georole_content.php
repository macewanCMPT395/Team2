<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Strict//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-strict.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">

<head>
   <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
   <title><?php echo html::specialchars($title) ?></title>
</head>

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

</style>

<body>
   
   <h2>Create GeoRole</h2>
   <h3 id="side"><?php echo $user_msg ?></h3>
   <h3 id="side"><?php echo $loc_msg ?></h3><br/>
   <textarea id="side"></textarea>
   <textarea id="side"></textarea><br/>
   <h3><?php echo $descrip ?></h3>
   <textarea id="descrip"></textarea><br/>
   
   <div class="submit-incident">
     <a href="http://localhost/~jharvard/mesg.php">Submit</a>
   </div>
</body>

</html>