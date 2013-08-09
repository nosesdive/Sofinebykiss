<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Tranfer extends CI_Controller {


	public function index()
	{


        $this->template->write('pageTitle', 'แจ้งชำระเงิน',TRUE);
		$this->template->write_view('ci_content', 'tranfer');
        $this->template->render();
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */