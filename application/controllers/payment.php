<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Payment extends CI_Controller {


	public function index()
	{


        $this->template->write('pageTitle', 'วิธีการชำระเงิน',TRUE);
		$this->template->write_view('ci_content', 'payment');
        $this->template->render();
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */