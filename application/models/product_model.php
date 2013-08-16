<?php 

class Product_model extends MY_Model {

    function __construct()
    {

       $this->tb_name  = parent::tb_prefix().'product';	
       parent::__construct();
	   
    }
	
	
	function add($data=array()){
       $insert_id =  parent::insert($this->tb_name, $data);
       return $insert_id;
    }

    function add_product_image($data=array()){
       $insert_id =  parent::insert(parent::tb_prefix().'product_img', $data);
       return $insert_id;
    }

    function edit($data=array(),$where=array()){
       parent::update($this->tb_name, $data,$where);
    }



    function delete($id){

        parent::delete($this->tb_name, 'id=' . $id);
        parent::delete(parent::tb_prefix().'product_img', 'product_id=' . $id);

        return true;
    }


    function delete_preview_img($id){

        parent::delete(parent::tb_prefix().'product_img', 'id=' . $id);

        return true;
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


    public function fetchProductRow($product_code) {

        if(!$product_code) return false;

        $select = parent::select();
        $select->from(parent::tb_prefix().'product')
               ->where('code = ?' , $product_code);

        return parent::fetchRow($select);
    }

    public function getProductImages($id) {

        if(!$id) return false;

        $select = parent::select();
        $select->from(parent::tb_prefix().'product_img')
               ->where('product_id = ?' , $id);

        return parent::fetchAll($select);
    }
	
	
	// Generate a random order number
    function generate( $length = 5, $chars = '0123456789')
    {
        $prefix = 'CS';

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
		

        $product_code = $prefix.$string;

        /*
         * Check duplicate order number
         */

        $options = array(
                         'where' => array('code' => $product_code) ,
                         'limit' => 1
                         );

        $is_duplicate = self::fetchAll($options);


        if(!$is_duplicate){
			
            return $product_code;

        }else{ // if product_code is duplicate. The system will try to generate again.

            self::generate();

        }



        // Return the string
        //return $year.$string;
    }

    function url_friendly($string){
        $string = preg_replace("`\[.*\]`U","",$string);
        $string = preg_replace('`&(amp;)?#?[a-z0-9]+;`i','-',$string);
        $string = str_replace('%', '-percent', $string);
        $string = htmlentities($string, ENT_COMPAT, 'utf-8');
        $string = preg_replace( "`&([a-z])(acute|uml|circ|grave|ring|cedil|slash|tilde|caron|lig|quot|rsquo);`i","\\1", $string );
        $string = preg_replace( array("`[^a-z0-9ก-๙เ-า]`i","`[-]+`") , "-", $string);
        return strtolower(trim($string, '-'));
    }
	
	


}

?>