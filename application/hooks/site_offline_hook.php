<?php  if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/**
 * Check whether the site is offline or not.
 *
 */
class site_offline_hook {

    public function __construct()
    {
        log_message('debug','Accessing site_offline hook!');
    }

    public function is_offline()
    {
        if(file_exists(APPPATH.'config/config.php'))
        {
            include(APPPATH.'config/config.php');

            if(isset($config['is_offline']) && $config['is_offline']===TRUE)
            {
              $admin_domain   = $config['admin_domain'];
              $sub_domains    = $config['api_domain'];
              $ip_looks       = $config['ip_maintenance'];


                if($ip_looks == TRUE): // Whatever your IP address is

                      if (in_array($_SERVER['REMOTE_ADDR'],$ip_looks,TRUE))
                      {

                      }elseif ($_SERVER['HTTP_HOST'] == $sub_domains) {
                        # code...
                      }else if($_SERVER['HTTP_HOST'] == $admin_domain){
                        if(in_array($_SERVER['REMOTE_ADDR'],$ip_looks,TRUE)){

                        }else{
                          $this->show_site_maintentance();
                          exit;
                        }
					            }else{
                        $this->show_site_offline();
                        exit;
                      }

                endif;
            }
        }
    }

    private function show_site_offline()
    {
        include('maintenance.php');
        echo $_SERVER['REMOTE_ADDR'];
    }

    private function show_site_maintentance()
    {
        include('maintenance.php');
    }


}
