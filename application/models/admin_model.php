<?php 



class Admin_model extends MY_Model {

    function __construct()
    {

       $this->tb_name  = parent::tb_prefix().'user';	
       parent::__construct();
	   
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

	

    public function auth($username, $password) {

        require_once('Zend/Session.php');

        if(!$username && !$password) return false;

        $select = parent::select();
        $select->from($this->tb_name)
               ->where('username = ?' , $username)
               ->where('password = ?' , md5($password));

        $auth = parent::fetchRow($select);

        if($auth){

            $authSession = new Zend_Session_Namespace('auth');
            $authSession->is_admin = TRUE;

            return TRUE;
        
        }else{
            return FALSE;
        }

    }

    public function is_admin(){

        require_once('Zend/Session.php');

        $authSession = new Zend_Session_Namespace('auth');

        if($authSession->is_admin === TRUE){

            return TRUE;

        }else{

            return FALSE;

        }

    }
	


}

?>