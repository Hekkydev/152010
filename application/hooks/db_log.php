<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
// Name of Class as mentioned in $hook['post_controller]
class db_log {

    var  $CI ;

    public function __construct() {
       
        $this->CI =& get_instance();    
      
    }

    // Name of function same as mentioned in Hooks Config
    function logQueries() {

        if(file_exists(APPPATH.'config/config.php')){
           include(APPPATH.'config/config.php');
            if(isset($config['logQueries']) && $config['logQueries'] === TRUE){
                    $this->create_logQueries();
            }
        }        
    }


    function create_logQueries()
    {
        
                $filepath = APPPATH . 'logs/Query-log-' . date('Y-m-d') . '.php'; // Creating Query Log file with today's date in application/logs folder
                $handle = fopen($filepath, "a+");                 // Opening file with pointer at the end of the file

                $times = $this->CI->db->query_times;                   // Get execution time of all the queries executed by controller
                foreach ($this->CI->db->queries as $key => $query) {
                    $sql = $query . " \n Execution Time:" . $times[$key]; // Generating SQL file alongwith execution time
                    fwrite($handle, $sql . "\n\n");              // Writing it in the log file
                }

                fclose($handle);
    }

}
