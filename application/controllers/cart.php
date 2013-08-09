<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cart extends CI_Controller {

	function __construct()
    {
       parent::__construct();
    }
	
	public function index()
	{
		$data = array();

		$this->load->library('cart');
		$this->load->helper('form');
		
		// Items in order 
		$items = $this->cart->contents();


		if($this->input->post('action') == 'add'){

			$update_cart[$this->input->post('item_id')] = FALSE;

			/// if user add this item already
			if($items){
				
				foreach($items as $rowid => $item){
					
					
					if( $this->input->post('item_id') == $item['id']){
						
						// Update Cart (add qty)
						$data = array(
			               'rowid' => $rowid,
			               'qty'   => $item['qty'] + 1
			              );
				
						$this->cart->update($data);
						
						$update_cart[$this->input->post('item_id')] = TRUE;
					}
				}
			}
			
			
			// Add item to cart 
			if($update_cart[$this->input->post('item_id')] !== TRUE){

				$data = array(
	               'id'      => $this->input->post('item_id'),
	               'qty'     => $this->input->post('item_qty'),
	               'price'   => (int)$this->input->post('item_price'),
	               'name'    => $this->input->post('item_name'),
               	   'options' => array()

	            );

				$this->cart->insert($data);
			
			}

		}


		/// Update Qty
		if($this->input->post('action') == 'update'){

			if(is_numeric($this->input->post('item_qty'))){

				// Update Cart (add qty)
				$data = array(
				               'rowid' => $this->input->post('item_row_id'),
				               'qty'   => $this->input->post('item_qty') 
			              	  );

				$this->cart->update($data);

			}
		}


		/// Delete item
		if($this->input->get('action') == 'delete'){

				// Update Cart (add qty)
				$data = array(
				               'rowid' => $this->input->get('item_row_id'),
				               'qty'   => 0 
			              	  );

				$this->cart->update($data);
		}



		$this->template->write_view('ci_content', 'cart',$data);
        $this->template->render();
	}


	public function checkout(){
		$this->load->model('Order_model','order');
		$this->load->library('cart');
		$this->load->helper('form');
		$this->load->library('form_validation');

		/// Items in order 
		$items = $this->cart->contents();

		/// Redirect to cart page when cart is empty
		if(!$items){
			redirect('cart');
		}


		$this->form_validation->set_rules('email', 'Email', 'required|valid_email');
		$this->form_validation->set_rules('fullname', 'Full Name', 'required');
		$this->form_validation->set_rules('address', 'Address', 'required');
		$this->form_validation->set_rules('city', 'City', 'required');
		$this->form_validation->set_rules('zip', 'Zip', 'required');
		$this->form_validation->set_rules('tel', 'Mobile Number', 'required');


		// Validate Form
		if ($this->form_validation->run() === TRUE) 
		{				

			$order_number = $this->order->generate();
			$email = trim($this->input->post('email'));

			/// insert to table order	
			$data_order = array(
							'order_number' => $order_number,
							'detail'       => $this->input->post('detail') ,
							'shipping_cost' => 50 ,
							'total_paid'   => $this->cart->total(),
							'fullname'     => $this->input->post('fullname') ,
							'email'        => $email ,
							'address'      => $this->input->post('address') ,
							'city'         => $this->input->post('city') ,
							'zip'          => $this->input->post('zip') ,
							'tel'          => $this->input->post('tel') ,
							'created_at'   => date('Y-m-d H:i:s',time()) ,
							'updated_at'   => date('Y-m-d H:i:s',time()) ,

						  );


			$insert_order_id = $this->order->add($data_order);

			foreach($items as $rowid => $item){

				/// insert to table order_product
				$data_product = array(
										'order_id'         => $insert_order_id ,
										'product_id'       => $item['id'] ,
										'product_quantity' => $item['qty'] ,
										'created_at'       => date('Y-m-d H:i:s',time())

									 );

				$this->order->add_product($data_product);

			}


			/// Send email to admin
			$this->load->library('email');
			
			$config['mailtype'] = 'html';
			$config['charset']  = 'utf-8';
			$config['wordwrap'] = TRUE;
			
			$this->email->initialize($config);
			$this->email->from('no-reply@sofinebykiss.com', 'Sofinebykiss');
			$this->email->to($email);
			$this->email->subject('คุณได้สั่งสินค้ากับ sofinebykiss.com ตามรหัสใบสั่งสินค้าที่ '.$order_number);

			$msg = $this->order->email_template_order($order_number);

			$this->email->message($msg);
		    $this->email->send();

		    /// Send email to admin
			$this->load->library('email');
		
			$config['mailtype'] = 'html';
			$config['charset']  = 'utf-8';
			$config['wordwrap'] = TRUE;
			
			$this->email->initialize($config);
			$this->email->from('no-reply@sofinebykiss.com', 'Sofinebykiss');
			$this->email->to('sofinebykiss@gmail.com');
			$this->email->subject('มีคนสั่งสินค้ากับ sofinebykiss.com ตามรหัสใบสั่งสินค้าที่ '.$order_number);
			$this->email->message($msg);
		    $this->email->send();

		    /// Destroy cart
			$this->cart->destroy();	


			redirect('cart/finish?o='.$order_number);


		}

		$data =array();

		$this->template->write_view('ci_content', 'cart_checkout',$data);
        $this->template->render();

	}

	public function finish()
	{
		$this->load->helper('form');

		$data['order_number'] = $this->input->get('o');

		$this->template->write_view('ci_content', 'cart_finish',$data);
        $this->template->render();
	}

	public function test_email(){

		/// Send email to admin
		$this->load->library('email');
			
		$config['mailtype'] = 'html';

		// smtp config //
		$config['protocol'] = 'smtp';
		$config['smtp_host'] = 'ssl://smtp.gmail.com';
		$config['smtp_port'] = 465;
		$config['smtp_user'] = 'sofinebykiss@gmail.com';
		$config['smtp_pass'] = 'ontherockz';
		


		$config['charset']  = 'utf-8';
		$config['wordwrap'] = TRUE;
			
		$this->email->initialize($config);
		$this->email->from('sofinebykiss@gmail.com', 'Sofinebykiss');
		$this->email->to('nosedive77@gmail.com');
		$this->email->subject('คุณได้สั่งสินค้ากับ sofinebykiss.com ตามรหัสใบสั่งสินค้าที่ 111');

		$msg = 'test test test';

		$this->email->message($msg);
		$this->email->send();
			

	}


}

/* End of file cart.php */
/* Location: ./application/controllers/cart.php */