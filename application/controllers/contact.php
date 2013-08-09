<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Contact extends CI_Controller {


	public function index()
	{


        $this->template->write('pageTitle', 'ติดต่อเรา',TRUE);
		$this->template->write_view('ci_content', 'contact');
        $this->template->render();
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */