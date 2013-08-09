<?php 

class Order_model extends MY_Model {

    function __construct()
    {

       $this->tb_name  = parent::tb_prefix().'order';	
       parent::__construct();
	   
    }
	
	
	function add($data=array()){
       $insert_id =  parent::insert($this->tb_name, $data);
       return $insert_id;
    }

    function add_product($data=array()){
       $insert_id =  parent::insert(parent::tb_prefix().'order_product', $data);
       return $insert_id;
    }
	
	
	/*
     * Query Function
     *
     */

    function fetchAll($options = array()) {

        if(isset($options['column'])){
            $col = $options['column'];
        }elseif(isset($options['count'])){
            $col = 'count(*)';
        }else{
            $col = array('*');
        }


        $select = parent::select();
        $select->from($this->tb_name,$col);

        /*
         * where cause
         */

        if(isset($options['where'])){
            foreach($options['where'] as $column => $v){

                $select->where($column. ' = ?' , $v);

            }
        }

        if(isset($options['not_equal'])){
            foreach($options['not_equal'] as $column => $v){

                $select->where($column. ' != ' . $v);

            }
        }
        

        /*
         * Num rows
         */

        if(isset($options['count'])){
            return parent::fetchOne($select);
        }


        if(isset($options['count'])){
            return parent::fetchOne($select);
        }



        /*
         * limit
         */

        if(isset($options['limit'])){
            $offset = (!isset($options['offset'])) ?  0 : $options['offset'];
            $select->limit($options['limit'],$offset);
        }


        if(isset($options['order'])){
            $select->order($options['order']);
        }else{
            $select->order(array('id DESC'));
        }

        return parent::fetchAll($select);
    }


    
	
	
	// Generate a random order number
    function generate( $length = 6, $chars = 'ABCDEFGHJKLMNPQRSTUVWXYZ123456789')
    {
        $year = substr(date('Y'),-1);

        // Length of character list
        $chars_length = (strlen($chars) - 1);

        // Start our string
        $string = $chars{rand(0, $chars_length)};

        // Generate random string
        for ($i = 1; $i < $length; $i = strlen($string))
        {
            // Grab a random character from our list
            $r = $chars{rand(0, $chars_length)};

            // Make sure the same two characters don't appear next to each other
            if ($r != $string{$i - 1}) $string .=  $r;
        }
		

        $order_number = $string;

        /*
         * Check duplicate order number
         */

        $options = array(
                         'where' => array('order_number' => $order_number) ,
                         'limit' => 1
                         );

        $is_duplicate = self::fetchAll($options);


        if(!$is_duplicate){
			
            return $order_number;

        }else{ // if order number is duplicate. The system will try to generate again.

            self::generate();

        }



        // Return the string
        //return $year.$string;
    }


    public function email_template_order($order_number){

        $this->load->library('cart');

        $msg  = 'รายการสั่งซื้อเลขที่ <span style="color:#333;font-size:14px"><strong>'.$order_number.'</strong></span> <br /><br />';
        $msg .= '<table cellspacing="1" style="border-collapse:separate;font-family:arial;font-size:12px;margin-bottom:12px">
                    <colgroup>
                        <col width="300">
                        <col width="110">
                        <col width="80">
                        <col width="110">
                        <col width="70">
                    </colgroup>
                    <thead>
                        <tr>
                             <th style="background-color:#6d6d6d;color:#fff;font-size:100%;min-height:32px;line-height:22px;padding:5px 15px;text-align:left">ITEM</th>
                             <th style="background-color:#6d6d6d;color:#fff;font-size:100%;min-height:32px;line-height:22px;padding:5px 0;text-align:center">PRICE</th>
                             <th style="background-color:#6d6d6d;color:#fff;font-size:100%;min-height:32px;line-height:22px;padding:5px 0;text-align:center">QUANTITY</th> <th colspan="2" style="background-color:#6d6d6d;color:#fff;font-size:100%;min-height:32px;line-height:22px;padding:5px 0;text-align:center">TOTAL</th>
                        </tr>
                    </thead>
                    <tbody>';

        foreach ($this->cart->contents() as $items){

            $msg .= '<tr>
                        <td style="background-color:#f3f3f3;color:#5b5b5b;padding:15px 0 10px;text-align:center;vertical-align:top">
                            <img width="49" alt="" style="float:left;display:inline;margin-left:15px" src="'.base_url().'assets/images/product/thumb/product_'.$items['id'].'.jpg"> 
                            <span style="display:block;float:left;text-align:left;padding:5px 0 0 16px;width:159px">'.$items['name'].'</span>
                        </td>
                        <td style="background-color:#f3f3f3;color:#5b5b5b;padding:15px 0 10px;text-align:center;vertical-align:top">'.$this->cart->format_number($items['price']).'</td>
                        <td style="background-color:#f3f3f3;color:#5b5b5b;padding:15px 0 10px;text-align:center;vertical-align:top">'.$items['qty'].'
                        </td> 
                        <td colspan="2" style="background-color:#f3f3f3;color:#5b5b5b;padding:15px 0 10px;text-align:center;vertical-align:top">'.$this->cart->format_number($items['subtotal']).' บาท
                        </td>              
                    </tr>';

        }            

        $msg .= '<tr>
                    <td colspan="3" style="background-color:#e8e8e8;color:#5b5b5b;padding:15px 10px 10px;text-align:right;vertical-align:top">ค่าจัดส่ง :  </td>
                         <td colspan="2" style="background-color:#e8e8e8;color:#5b5b5b;padding:15px 0 10px 56px;text-align:left;vertical-align:top">50.00 บาท</td>              
                </tr>
                <tr>
                    <td colspan="3" style="background-color:#e8e8e8;color:#5b5b5b;padding:15px 10px 10px;text-align:right;vertical-align:top; font-weight:bold"><strong>รวมทั้งสิ้น : </strong> </td>
                         <td colspan="2" style="background-color:#e8e8e8;color:#5b5b5b;padding:15px 0 10px 56px;text-align:left;vertical-align:top; font-weight:bold"><strong>'.$this->cart->format_number($this->cart->total()+ 50 ).' บาท</strong></td>              
                </tr>
                </tbody>
                </table>
                <p>คุณสามารถดูวิธีการชำระเงินได้<wbr>ที่ <a href="http://www.sofinebykiss.com/payment" target="_blank">http://www.<span class="il">sofinebykiss</span>.com/<wbr>payment</a></p>
                <p>หากท่านมีข้อสงสัยหรือต้<wbr>องการสอบถามรายละเอียดเพิ่มเติ<wbr>มสามารถติดต่อเราได้ตลอดเวลาที่ <br><br>Email: <a href="mailto:sofinebykiss@gmail.com" target="_blank"><span class="il">sofinebykiss</span>@gmail.com</a> <br>Mobile: 089.496.3334

</p>
                ';


        return $msg;                    


    }
	
	


}

?>