    <?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

$route['article/(:any)'] = "forum/article/$1";
$route['default_controller'] = "forum/index";
$route['404_override'] = '';