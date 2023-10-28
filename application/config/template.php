<?php

if (!defined('BASEPATH')) exit('No direct script access allowed');


$template['active_template']='login';



//template 1

$template['login']['template']='login';

$template['login']['regions']=array('title');

$template['login']['parser']='parser';

$template['login']['parser_method']='parse';

$template['login']['parse_template']=FALSE;

// Employeelogin

$template['emplogin']['template']='emplogin';

$template['emplogin']['regions']=array('title');

$template['emplogin']['parser']='parser';

$template['emplogin']['parser_method']='parse';

$template['emplogin']['parse_template']=FALSE;



//template 3 Static

$template['stat']['template']='stat';

$template['stat']['regions']=array(

 'header',

 'title',

 'menu',

 'content',

 'footer',

);

$template['stat']['parser']='parser';

$template['stat']['parser_method']='parse';

$template['stat']['parse_template']=FALSE;



//template 4 Dashboard

$template['dashboard']['template']='dashboard';

$template['dashboard']['regions']=array(

 'header',

 'title',

 'menu',
 
 'leftmenu',

 'latest',

 'dash_menu',

 'content',

 'footer',

);

$template['dashboard']['parser']='parser';

$template['dashboard']['parser_method']='parse';

$template['dashboard']['parse_template']=FALSE;


$template['empdashboard']['template']='empdashboard';

$template['empdashboard']['regions']=array(

 'header',

 'title',

 'menu',
 
 'leftmenu',

 'latest',

 'dash_menu',

 'content',

 'footer',

);

$template['empdashboard']['parser']='parser';

$template['empdashboard']['parser_method']='parse';

$template['empdashboard']['parse_template']=FALSE;


//truckowner 4 Dashboard

/* $template['truckowner']['template']='truckowner';

$template['truckowner']['regions']=array(

 'header',

 'title',

 'menu',
 
 'leftmenu',

 'latest',

 'dash_menu',

 'content',

 'footer',

);

$template['truckowner']['parser']='parser';

$template['truckowner']['parser_method']='parse';

$template['truckowner']['parse_template']=FALSE; */
/*Added by Rushi */
$template['dashboardtemp']['template']='dashboardtemp';

$template['dashboardtemp']['regions']=array(

 'header',

 'title',

 'menu',
 
 

 'latest',

 'dash_menu',

 'content',

 'footer',

);

$template['livemaptemp']['parser']='parser';

$template['livemaptemp']['parser_method']='parse';

$template['livemaptemp']['parse_template']=FALSE;

$template['livemaptemp']['template']='livemaptemp';

$template['livemaptemp']['regions']=array(

 'livemapheader',

 'title',

 'menu',
 
 

 'latest',

 'dash_menu',

 'content',

 'footer',

);

$template['livemaptemp']['parser']='parser';

$template['livemaptemp']['parser_method']='parse';

$template['livemaptemp']['parse_template']=FALSE;

//end
?>