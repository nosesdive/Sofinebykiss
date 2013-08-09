<?php 

class Brand_model extends MY_Model {

    function __construct()
    {

       $this->tb_name  = parent::tb_prefix().'brand';	
       parent::__construct();
	   
    }
	
	
	function add($data=array()){
       $insert_id =  parent::insert($this->tb_name, $data);
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


    public function brand_list(){

        $brand = array(
                        99 => "other",
                        23 => "lisange",
                        22 => "constanta",
                        21 => "dr.young" ,
                        20 => "pro you",
                        19 => "welcos",
                        18 => "tonymoly",
                        17 => "the face shop",
                        16 => "skinfood",
                        15 => "rojukiss",
                        14 => "opi",
                        13 => "nature republic",
                        12 => "missha",
                        11 => "lotree",
                        10 => "laneige",
                        9  => "joa cream pack",
                        8  => "it's skin",
                        7  => "innisfree",
                        6  => "holika holika",
                        5  => "etude",
                        4  => "dr.mj",
                        3  => "bergamo",
                        2  => "beauty credit",
                        1  => "baviphat"
                    );

        asort($brand);

        return $brand;

    }	

    public function getBrandId($slug) {

        if(!$slug) return false;

        $select = parent::select();
        $select->from($this->tb_name)
               ->where('slug = ?' , $slug);

        return parent::fetchRow($select);
    }
	


}

?>