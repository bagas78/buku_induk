 <?php
class Query_builder{ 
  protected $sql;
  function __construct(){
        $this->sql = &get_instance();
    }
  function login($table,$email,$pass){
   return $this->sql->db->query("SELECT * FROM $table WHERE user_email = '$email' AND user_password = '$pass'")->result_array();
  }
  function add($table,$set){
  	$db = $this->sql->db->set($set);
  	$db = $this->sql->db->insert($table);
  	return $db;
  }
  function view($table){ 
  	return
  	$this->sql->db->query("SELECT * FROM $table")->result_array();
  }
  function view_order($table,$order){
    return
    $this->sql->db->query("SELECT * FROM $table order by $order desc")->result_array();
  }
  function view_join($table_a,$table_b,$row_a,$row_b){
  	return
  	$this->sql->db->query("SELECT * FROM $table_a as a join $table_b as b ON a.$row_a = b.$row_b")->result_array();
  }
  function view_join_3($table_a,$table_b,$table_c,$row_a,$row_b,$row_c,$row_d){
    return
    $this->sql->db->query("SELECT * FROM $table_a as a join $table_b as b ON a.$row_a = b.$row_b join $table_c as c ON c.$row_c = a.$row_d")->result_array();
  }
  function view_join_order($table_a,$table_b,$row_a,$row_b,$order){
    return
    $this->sql->db->query("SELECT * FROM $table_a as a join $table_b as b ON a.$row_a = b.$row_b order by $order desc")->result_array();
  }
  function view_where_join($table_a,$table_b,$row_a,$row_b,$where){
  	return
  	$this->sql->db->query("SELECT * FROM $table_a as a join $table_b as b ON a.$row_a = b.$row_b where $where")->result_array();
  } 
  function view_where($table,$where){
  	return
  	$this->sql->db->query("SELECT * FROM $table where $where")->result_array();
  }
  function view_where_num_rows($table,$where){
  	return
  	$this->sql->db->query("SELECT * FROM $table where $where")->num_rows();
  }
  function delete($table,$where){
  	$db = $this->sql->db->where($where);
  	$db = $this->sql->db->delete($table);
  	return $db;
  }
  function num_rows($table){
  	return
  	$this->sql->db->query("SELECT * FROM $table")->num_rows();
  }
  function update($table,$set,$where){
  	$db = $this->sql->db->set($set);
  	$db = $this->sql->db->where($where);
  	$db = $this->sql->db->update($table);
  	return $db;
  }
}