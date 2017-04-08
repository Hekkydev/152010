<?php
defined('BASEPATH') OR exit(' Error Access');
/*
* Logs Class
*/

class Logs extends MY_Controller
{
	public function __construct()
	{
		parent::__construct();
		$this->Authentikasi       = $this->Authentikasi();
    $this->session_logs_data  = $this->session_logs_data()->result();
		$this->logs 			        = "logs";

	}

	public function index()
	{

		$this->title_page("Data Logs");
		$this->page_sub("Logs/page");

	}

  public function session_logs()
  {

    $data['sess'] =$this->session_logs_data;
    $this->title_page("Data Session IP");
    $this->page_sub("Logs/page_session",$data);
  }


	public function read()
	{	$sid = $this->input->get('sid');
		if($sid == TRUE)
		{
				$data['sid'] = $sid;
				$this->title_page($sid);
				$this->page_sub("Logs/read",$data);

		}else{
			redirect($this->logs);
		}
	}

	public function delete()
	{
		$sid = $this->input->get('sid');
		if($sid == TRUE )
		{
			$DIR = APPPATH."logs/";
			$hapus = unlink($DIR.$sid);
			redirect($this->logs);
		}else{
			reidrect($this->logs);
		}
	}


}
