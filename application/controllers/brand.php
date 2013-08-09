<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Brand extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{

		$this->load->model('Product_model', 'product');
		$this->load->model('Brand_model', 'brand');

		$brand = $data['brand'] = $this->brand->getBrandId($this->uri->segment(2));

		############## Fetch Product ############## 
		$options  = array(
							'offset' => $this->input->get('per_page') ,	
							'limit'  => 30 
						  );

		if($brand['id'])
				$options['where'] = array('brand_id' => $brand['id']);
			else
				$data['brand']['name']  = $brand['name'] = 'All';


		$data['products'] = $this->product->fetchAll($options);
		############################################

		$options['count'] = TRUE; 


        /*
         * create pagination link
         */

        $this->load->library('pagination');

        /* pagination config */

        $config['base_url']       = site_url('brand/'.$this->uri->segment(2).'/?c=1');
        $config['total_rows']     = $this->product->fetchAll($options);
        $config['per_page']       = '30';
        $config['full_tag_open']  = '<div id="p-pagination-wrapper"><ul class="p-pagination">';
        $config['full_tag_close'] = '</ul></div>';
        $config['last_tag_open']  = $config['first_tag_open'] = $config['next_tag_open'] = $config['prev_tag_open'] = $config['num_tag_open'] = '<li>';
        $config['last_tag_close'] = $config['first_tag_close'] = $config['next_tag_close'] = $config['prev_tag_close'] = $config['num_tag_close'] = '</li>';
        $config['cur_tag_open']   = '<li class="active"><a href="#">';
        $config['cur_tag_close'] = '</a></li>';
   

        $config['page_query_string'] = TRUE;

        $this->pagination->initialize($config);

        $data['pagination'] = $this->pagination->create_links();

        $this->template->write('pageTitle', 'เครื่องสำอาง - '.ucwords($brand['name']),TRUE);
		$this->template->write_view('ci_content', 'brand',$data);
        $this->template->render();
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */