<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search extends CI_Controller {


	public function index()
	{


        $this->template->write('pageTitle', 'ค้นหาสินค้า',TRUE);
		$this->template->write_view('ci_content', 'search');
        $this->template->render();
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */