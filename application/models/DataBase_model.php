<?php

class dataBase_model extends CI_Model {

//--------------------------------------------------------------------------------------
    function query($query) {
        $query = $this->db->query($query);
         return $query->result();
    }
//--------------------------------------------------------------------------------------
    function user($userUser, $userPass) {
        $query = $this->db->get_where('user', array('userUser' => $userUser, 'userPass' => $userPass));
        $result = $query->result();
        return $query->num_rows($result);
    }
//--------------------------------------------------------------------------------------
    function user_data($userUser, $userPass) {
        $query = $this->db->get_where('user', array('userUser' => $userUser, 'userPass' => $userPass));
        return $query->result();
    }
//--------------------------------------------------------------------------------------
	//get count records from table in database
    function get_num($table) {
        $query = $this->db->get_where($table);
        return $query->num_rows();
    }
//--------------------------------------------------------------------------------------
    //get count records from table in database
    function get_num_where($table,$where) {
        $query = $this->db->get_where($table,$where);
        return $query->num_rows();
    }
//--------------------------------------------------------------------------------------
    function get_where($table, $where) {
        $query = $this->db->get_where($table, $where);
        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
//--------------------------------------------------------------------------------------
    function get_where_order($table, $where,$order,$sc) {
	     $this->db->order_by($order,$sc);
        $query = $this->db->get_where($table, $where);

        if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
//--------------------------------------------------------------------------------------
    function get_limit($table,$limit,$offset) {
         $this->db->limit($limit, $offset);
		 $query = $this->db->get($table);
		 
		if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }

//--------------------------------------------------------------------------------------
    function get_limit_orderBy($table,$limit, $offset,$order,$sc) {
         $this->db->order_by($order,$sc);
         $this->db->limit($limit, $offset);
		 $query = $this->db->get($table);
		 
		if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
//------------------------------------------------------------------------------------
    function get_where_limit_orderBy($table, $where, $limit, $offset, $order, $sc) {//ok
        $this->db->where($where . ' ORDER BY ' . $order . ' ' . $sc);
        $this->db->limit($limit, $offset);
        return $this->db->get($table)->result();
    }

//--------------------------------------------------------------------------------------
    function get_orderBy($table,$order,$by) {
         $this->db->order_by($order,$by);
		 $query = $this->db->get($table);
		 
		if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
//---------------------------------------------------------------------------------------
    function get_one($table, $id) {
        $this->db->where($id);
        $query = $this->db->get($table);
        return $query->result();
    }
//--------------------------------------------------------------------------------------
    function get($table) {
		 $query = $this->db->get($table);
		 
		if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
//--------------------------------------------------------------------------------------
    function get_sel_orderBy_limit($select,$table,$order,$by,$limit) {
         $this->db->select($select);
         $this->db->order_by($order,$by);
         $this->db->limit($limit);
		 $query = $this->db->get($table);
	 
		if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
//--------------------------------------------------------------------------------------
    function get_sel_where_orderBy_limit($select,$table,$where,$order,$by,$limit) {
         $this->db->select($select);
         $this->db->where($where);
         $this->db->order_by($order,$by);
         $this->db->limit($limit);
		 $query = $this->db->get($table);
	 
		if ($query->num_rows() > 0) {
            return $query->result();
        } else {
            return false;
        }
    }
//---------------------------------------------------------------------------------------
    function join_where($select,$table1, $table2, $where) {
        $this->db->select($select);
        $this->db->from($table1);
        $this->db->join($table2, 'journal_details.journal_id =  journal.id');
        $this->db->where($where);
        $query = $this->db->get();
        return $query->result();
    }
//---------------------------------------------------------------------------------------
    function join_where2($select,$table1, $table2,$on, $where) {
        $this->db->select($select);
        $this->db->from($table1);
        $this->db->join($table2,$on);
        $this->db->where($where);

        $query = $this->db->get();
        return $query->result();
    }
//-------------------------------------------------------------------------------------------
	function join_limit_orderBy($select,$table1,$table2,$on,$limit, $offset,$order,$by) {
        $this->db->select($select);
        $this->db->order_by($order,$by);
        $this->db->from($table1);
        $this->db->join($table2,$on);
        $this->db->limit($limit, $offset);
        $query = $this->db->get();
        return $query->result();
    }
//-----------------------------------------------------------------------------------
	function join_rl_limit_orderBy($select,$table1,$table2,$on,$rl,$limit, $offset,$order,$by) {
        $this->db->select($select);
        $this->db->order_by($order,$by);
        $this->db->from($table1);
        $this->db->join($table2,$on,$rl);
        $this->db->limit($limit, $offset);
        $query = $this->db->get();
        return $query->result();
    }
//-----------------------------------------------------------------------------------
	function join_rl_where_limit_orderBy($select,$table1,$table2,$on,$rl="RIGHT",$where,$limit, $offset,$order,$by) {
        $this->db->select($select);
        $this->db->where($where);
        $this->db->order_by($order,$by);
        $this->db->from($table1);
        $this->db->join($table2,$on,$rl);
        $this->db->limit($limit, $offset);
        $query = $this->db->get();
        return $query->result();
    }
//-----------------------------------------------------------------------------------
	function join_where_orderBy($select,$table1,$table2,$on,$where,$order,$by) {
        $this->db->select($select);
        $this->db->order_by($order,$by);
        $this->db->from($table1);
        $this->db->join($table2,$on);
        $this->db->where($where);
        $query = $this->db->get();
        return $query->result();
    }
//-----------------------------------------------------------------------------------
	function join_rl_where_orderBy($select,$table1,$table2,$on,$rl='RIGHT',$where,$order,$by) {
        $this->db->select($select);
        $this->db->order_by($order,$by);
        $this->db->from($table1);
        $this->db->join($table2,$on,$rl);
        $this->db->where($where);
        $query = $this->db->get();
        return $query->result();
    }
//--------------------------------------------------------------------------------
	function join_orderBy($select,$table1,$table2,$on,$order,$by) {
        $this->db->select($select);
        $this->db->order_by($order,$by);
        $this->db->from($table1);
        $this->db->join($table2,$on);
        $query = $this->db->get();
        return $query->result();
    }
//--------------------------------------------------------------------------------
	function join_rl_orderBy($select,$table1,$table2,$on,$rl='RIGHT',$order,$by) {
        $this->db->select($select);
        $this->db->order_by($order,$by);
        $this->db->from($table1);
        $this->db->join($table2,$on,$rl);
        $query = $this->db->get();
        return $query->result();
    }
//----------------------------------------------------------------------------------
    function create($table, $data) {
        $this->db->insert($table, $data);
    }

//---------------------------------------------------------------------------------------
    //update record by ID  
    function update($table, $data,$idDb,$id) {
        $this->db->update($table, $data, array($idDb => $id));
    }

//---------------------------------------------------------------------------------------
    //update record by ID  
    function delet( $table, $idDb, $id) {
        $this->db->delete($table, array($idDb => $id));
    }

//---------------------------------------------------------------------------------------
    function sum($table,$sum,$where) {
	$this->db->select_sum($sum);
    $this->db->where($where);
	$query = $this->db->get($table);
	return $query->row()->$sum;

	}
}
