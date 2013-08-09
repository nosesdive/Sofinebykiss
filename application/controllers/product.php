<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Product extends CI_Controller {

	function __construct()
    {
       parent::__construct();
    }
	
	public function index()
	{
		$data = array();

		$this->load->model('Product_model','product');

		$product_code        = substr($this->uri->segment(2), 0,7);

		$data['product']     = $this->product->fetchProductRow($product_code);

		$data['product_images'] = $this->product->getProductImages($data['product']['id']);


		$this->template->write('pageTitle', 'เครื่องสำอาง '.$data['product']['name'],TRUE);
		$this->template->write('pageDesc', strip_tags($data['product']['description']),TRUE);
		$this->template->write_view('ci_content', 'product',$data);
        $this->template->render();
	}
}

/* End of file product.php */
/* Location: ./application/controllers/product.php */