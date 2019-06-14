<?php

class User extends CI_Controller {

    function __construct() {
        parent::__construct();
       
      }
//-----------------------------------------------------------------------------------------
    public function index() {
	    $data['title'] = $this->lang->line('users');
		$data['style']      =  $this->style;
		$get_num = $this->model->get_num('user');
				
		$data['total_rows'] = $get_num;
		$limit = ($this->uri->segment(3)) ? $this->uri->segment(3) :10;
		$data['limit'] = $limit;
		$offset = $this->uri->segment(4,1);
		$start = $this->mpages->mulitiPages($offset,$get_num ,$limit);
	    $data['start']=$start;
		$data['user']=$this->model->join_limit_orderBy(
		'user.id as id,
		user.userUser as userUser,
		user.userName as userName,
		user.id_dep as id_dep,
		dep.dep as dep',
		'user',
		'dep',
		'user.id_dep =  dep.id',
		$limit,$start ,"id", "DESC");
        $data['pages'] = $this->mpages->pagesPrint(base_url('user/index/'.$limit));
		
        $this->load->view('inc/head', $data);
        $this->load->view('inc/cpanel/'.$this->style.'/header',$this->data_header);
        $this->load->view('user/index',$data);
        $this->load->view('inc/cpanel/'.$this->style.'/footer',$this->data_footer);
    }
//------------------------------------------------------------------------------------
    public function search() {
		 if (isset($_POST['search'])) {
            $search = trim($_POST['search']);
		 }
		  if (is_numeric($search)) {
            $where = "id = " . $search;
        } else {
            $where = "userName LIKE '%$search%'";
        }
        $get_num = $this->model->get_num('user');
        $data['total_rows']  = $get_num;
        $data['title'] = $this->lang->line('user');
		$data['style']      =  $this->style;
		$data['limit'] = 1;
		$data['offset'] =1;
		
        $data['user'] = $this->model->get_where('user', $where);	
        $this->load->view('user/search',$data);
    }
//-----------------------------------------------------------------------------------------
    public function add() {
        
        $data['title'] = $this->lang->line('users');
		$data['style']      =  $this->style;
       	$data['social'] = $this->model->get('social');
       	$data['dep'] = $this->model->get('dep');
		$this->load->view('inc/head', $data);
        $this->load->view('inc/cpanel/'.$this->style.'/header',$this->data_header);
        $this->load->view('user/add',$data);
        $this->load->view('inc/cpanel/'.$this->style.'/footer',$this->data_footer);
    }
//-----------------------------------------------------------------------------------------
	public function create() {
		
		$role = '';
		$site = '';
		if (isset($_POST['cpanel']) and count($_POST['cpanel']) > 0 ){
 		$role.= implode('-',$_POST['cpanel']);
		$site.='cpanel' ;
		$site.='-' ;
		 }
		
		 if (isset($_POST['finance']) and count($_POST['finance']) > 0 ){
        if(isset($_POST['training']) and count($_POST['training']) > 0 ){
		$role.='-';$site.='-' ; 
		}
   		$role.= implode('-',$_POST['finance']);
		$site.='finance' ; 
		 } 

		if (isset($_POST['training']) and count($_POST['training']) > 0 ){
        if(isset($_POST['cpanel']) and count($_POST['cpanel']) > 0 ){
		$role.='-';$site.='-' ; 
		}
  		$role.= implode('-',$_POST['training']);
		$site.='training' ;
		 }
		     
		
        $data['userName'] = $_POST['userName'];
		$data['userUser'] = $_POST['userUser'];
        $data['dep']      = $_POST['dep'];
        $data['userRole'] = $role;
        $data['site']     = $site;
		$data['userPass'] = 1234;
        $this->model->create('user', $data);
         
		$data['title'] = $this->lang->line('add_msg');
		$data['style']      =  $this->style;
        $this->load->view('inc/head', $data);
        $this->load->view('inc/cpanel/'.$this->style.'/header',$this->data_header);
        $data['msg'] = '<div class="msg_create">' . $data['title'] . '</div>';
        $this->load->view('home/msg', $data);
        ?>
        <script langauge="javascript" type="text/javascript">
            <!--
                    function goback()
            {
                location = "<?php echo base_url('user/index'); ?>";
            }
            setTimeout('goback()', 1500);
            //-->
        </script>
        <?php
        $this->load->view('inc/cpanel/'.$this->style.'/footer',$this->data_footer);
    
}
//-----------------------------------------------------------------------------------------
    public function edit($id) {
        $data['title'] = $this->lang->line('users');
		$data['style']      =  $this->style;
        $data['record'] = $this->model->get_where('user', array('id' => $id));
       	$data['dep'] = $this->model->get('dep');
        $this->load->view('inc/head', $data);
        $this->load->view('inc/cpanel/'.$this->style.'/header',$this->data_header);
        $this->load->view('user/edit', $data);
        $this->load->view('inc/cpanel/'.$this->style.'/footer',$this->data_footer);
    }
//-----------------------------------------------------------------------------------------
	public function update($id) {
       		
		$role = '';
		$site = '';
		if (isset($_POST['cpanel']) and count($_POST['cpanel']) > 0 ){
 		$role.= implode('-',$_POST['cpanel']);
		$site.='cpanel' ;
		$site.='-' ;
		 }
		
		 if (isset($_POST['finance']) and count($_POST['finance']) > 0 ){
        if(isset($_POST['cpanel']) and count($_POST['cpanel']) > 0 ){
		$role.='-';$site.='-' ; 
		}
   		$role.= implode('-',$_POST['finance']);
		$site.='finance' ; 
		 } 

		if (isset($_POST['training']) and count($_POST['training']) > 0 ){
        if(isset($_POST['finance']) and count($_POST['finance']) > 0 ){
		$role.='-';$site.='-' ; 
		}
  		$role.= implode('-',$_POST['training']);
		$site.='training' ;
		 }
		     
		
		$data['userUser'] = $_POST['userUser'];
        $data['userName'] = $_POST['userName'];
        $data['id_dep']   = $_POST['id_dep'];
        $data['userRole'] = $role;
        $data['site']     = $site;
		
        $this->model->update('user', $data,$id);
        $data['title'] = $this->lang->line('update_msg');
		$data['style']      =  $this->style;
        
		$this->load->view('inc/head', $data);
        $this->load->view('inc/cpanel/'.$this->style.'/header',$this->data_header);
        $data['msg'] = '<div class="msg_update">' . $data['title'] . '</div>';
        $this->load->view('home/msg', $data);
        ?>
        <script langauge="javascript" type="text/javascript">
            <!--
                    function goback()
            {
                location = "<?php echo base_url('user/edit/' . $id . '/edit'); ?>";
            }
            setTimeout('goback()', 1500);
            //-->
        </script>
        <?php
        $this->load->view('inc/cpanel/'.$this->style.'/footer',$this->data_footer);
    
}
//-----------------------------------------------------------------------------------------
    public function rset($id) {
        $data['title'] = $this->lang->line('rest');
		$data['style']      =  $this->style;
        $data['record'] = $this->model->get_where('user', array('id' => $id));
        $this->load->view('inc/head', $data);
        $this->load->view('inc/cpanel/'.$this->style.'/header',$this->data_header);
        $this->load->view('user/rest', $data);
        $this->load->view('inc/cpanel/'.$this->style.'/footer',$this->data_footer);
    }
//-----------------------------------------------------------------------------------------
	public function rest_update($id) {
       		
		$data['userPass']  ='1234' ;
        $this->model->update('user', $data,$id);
        $data['title'] = $this->lang->line('rest_msg');
		$data['style']      =  $this->style;
        
		$this->load->view('inc/head', $data);
        $this->load->view('inc/cpanel/'.$this->style.'/header',$this->data_header);
        $data['msg'] = '<div class="msg_update">' . $data['title'] . '</div>';
        $this->load->view('home/msg', $data);
        ?>
        <script langauge="javascript" type="text/javascript">
            <!--
                    function goback()
            {
                location = "<?php echo base_url('user/index'); ?>";
            }
            setTimeout('goback()', 2000);
            //-->
        </script>
        <?php
        $this->load->view('inc/cpanel/'.$this->style.'/footer',$this->data_footer);
    
}
//-----------------------------------------------------------------------------------------
    public function delet($id) {
		$this->model->delet('user', 'id', $id);
	    $data['title'] = $this->lang->line('delet_msg');
		$data['style']      =  $this->style;
        $this->load->view('inc/head', $data);
        $this->load->view('inc/cpanel/'.$this->style.'/header',$this->data_header);
        $data['msg'] = '<div class="msg_delet">' . $data['title'] . '</div>';
        $this->load->view('home/msg', $data);
        ?>
        <script langauge="javascript" type="text/javascript">
            <!--
                    function goback()
            {
                location = "<?php echo base_url('user/index'); ?>";
            }
            setTimeout('goback()', 1500);
            //-->
        </script>
        <?php
        $this->load->view('inc/cpanel/'.$this->style.'/footer',$this->data_footer);
    }
//-----------------------------------------------------------------------------------------
    public function array_delet() {

		if(isset($_POST['delet']) AND $_POST['delet'] != null){
		$id_delet = $_POST['delet'];
			foreach($id_delet as $id){
				$this->model->delet('user', 'id', $id);
			}
		        $data['title'] = $this->lang->line('delet_msg');

		}
		else{
		        $data['title'] = $this->lang->line('nothing_msg');
		
		}
		
		$data['style']      =  $this->style;
        $this->load->view('inc/head', $data);
        $this->load->view('inc/cpanel/'.$this->style.'/header',$this->data_header);
        $data['msg'] = '<div class="msg_delet">' . $data['title'] . '</div>';
        $this->load->view('home/msg', $data);
        ?>
        <script langauge="javascript" type="text/javascript">
            <!--
                    function goback()
            {
                location = "<?php echo base_url('user/index'); ?>";
            }
            setTimeout('goback()', 1500);
            //-->
        </script>
        <?php
        $this->load->view('inc/cpanel/'.$this->style.'/footer',$this->data_footer);
    }
//-----------------------------------------------------------------------------------------
}
