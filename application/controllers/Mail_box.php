<?php

class Mail_box extends CI_Controller {

    function __construct() {
        parent::__construct();
		
      }
//-----------------------------------------------------------------------------------------
    public function index() {
	    $data['title'] = $this->lang->line('mail_box');
		$data['style']      =  $this->style;
		$get_num = $this->model->get_num('mail_box');
		$data['total_rows'] = $get_num;
		$limit = ($this->uri->segment(3)) ? $this->uri->segment(3) :10;
		$data['limit'] = $limit;
		$offset = ($this->uri->segment(4)) ? $this->uri->segment(4) : 1;
		$start = $this->mpages->mulitiPages($offset,$get_num ,$limit);
		$data['offset'] =	$offset;
	    $data['mail_box']=$this->model->get_limit_orderBy('mail_box',$limit,$start ,"id", "DESC");
        $data['pages'] = $this->mpages->pagesPrint(base_url('mail_box/index/'.$limit));
		

        $this->load->view('inc/head', $data);
        $this->load->view('inc/mydata/'.$this->style.'/header',$this->data_header);
        $this->load->view('mail_box/index',$data);
        $this->load->view('inc/mydata/'.$this->style.'/footer',$this->data_footer);
    }
//------------------------------------------------------------------------------------
    public function search() {
		 if (isset($_POST['search'])) {
            $search = trim($_POST['search']);
		 }
		  if (is_numeric($search)) {
            $where = "id = " . $search;
        } else {
            $where = "messenger LIKE '%$search%'";
        }
        $get_num = $this->model->get_num('mail_box');
        $data['total_rows']  = $get_num;
        $data['title'] = $this->lang->line('mail_box');
		$data['style']      =  $this->style;
		$data['limit'] = 1;
		$data['offset'] =1;
		
        $data['mail_box'] = $this->model->get_where('mail_box', $where);	
        $this->load->view('mail_box/search',$data);
    }
//-----------------------------------------------------------------------------------------
	public function send() {
		
        $data['messenger'] = trim($_POST['messenger']);
        $data['email']     = trim($_POST['email']);
        $data['mobile']    = trim($_POST['mobile']);
        $data['date']      = date("Y-m-d");
        $data['time']      = date("h:i:sa");
        $data['subject']   = trim($_POST['subject']);
        $data['text']      = trim($_POST['text']);
        $data['mail_read'] = 0;
        $this->model->create('mail_box', $data);

		$data['title'] = $this->lang->line('send_msg');
   		$data['style']      =  $this->style;
		$this->load->view('inc/head', $data);
        $this->load->view('inc/mydata/'.$this->style.'/header',$this->data_header);
        $data['msg'] = '<div class="msg_create">' . $data['title'] . ' </div>
		</div>';
        $this->load->view('home/msg_index', $data);
        ?>
        <script langauge="javascript" type="text/javascript">
            <!--
                    function goback()
            {
                location = "<?php echo base_url('mydata/index'); ?>";
            }
            setTimeout('goback()', 1500);
            //-->
        </script>
        <?php
        $this->load->view('inc/mydata/'.$this->style.'/footer',$this->data_footer);
 
}
//-----------------------------------------------------------------------------------------
    public function reply($id) {
        $data['title'] = $this->lang->line('edit_mydata');
		$data['style']      =  $this->style;
        $data['record'] = $this->model->get_where('mail_box', array('id' => $id));
        $this->load->view('inc/head', $data);
        $this->load->view('inc/mydata/'.$this->style.'/header',$this->data_header);
        $this->load->view('mail_box/reply', $data);
        $this->load->view('inc/mydata/'.$this->style.'/footer',$this->data_footer);
    }
//-----------------------------------------------------------------------------------------
	public function create($id) {
        $data['reply']       = trim($_POST['reply']);
        $data['reply']       = trim($_POST['reply']);
        $data['mail_read']   = 1;
		$data['reply_date']  = date("Y-m-d");
        $data['reply_time']  = date("h:i:sa");
        $this->model->update('mail_box', $data,$id);
		$from  = "lights@gmail.com";
		$heads = "From:".$from;
		 mail($_POST['email'],$_POST['subject'],$_POST['reply'],$heads);
		$data['title'] = $this->lang->line('reply_msg');
		$data['style']      =  $this->style;
        
		$this->load->view('inc/head', $data);
        $this->load->view('inc/mydata/'.$this->style.'/header',$this->data_header);
        $data['msg'] = '<div class="msg_create">' . $data['title'] . ' </div>
		</div>';
        $this->load->view('home/msg', $data);
        ?>
        <script langauge="javascript" type="text/javascript">
            <!--
                    function goback()
            {
                location = "<?php echo base_url('mail_box/index'); ?>";
            }
            setTimeout('goback()', 1500);
            //-->
        </script>
        <?php
        $this->load->view('inc/mydata/'.$this->style.'/footer',$this->data_footer);
 
}
//-----------------------------------------------------------------------------------------
    public function delet($id) {
        
		$this->model->delet('mail_box', 'id', $id);
        
		$data['title'] = $this->lang->line('delet_msg');
		$data['style']      =  $this->style;
        
        $this->load->view('inc/head', $data);
        $this->load->view('inc/mydata/'.$this->style.'/header',$this->data_header);
        $data['msg'] = '<div class="msg_delet">' . $data['title'] . '</div>';
        $this->load->view('home/msg', $data);
        ?>
        <script langauge="javascript" type="text/javascript">
            <!--
                    function goback()
            {
                location = "<?php echo base_url('mail_box'); ?>";
            }
            setTimeout('goback()', 1500);
            //-->
        </script>
        <?php
        $this->load->view('inc/mydata/'.$this->style.'/footer',$this->data_footer);
    }

//-----------------------------------------------------------------------------------------
    public function array_delet() {
        
		if(isset($_POST['delet']) AND $_POST['delet'] != null){

		$id_delet = $_POST['delet'];
			foreach($id_delet as $id){
			$this->model->delet('mail_box', 'id', $id);
			}        
				$data['title'] = $this->lang->line('delet_msg');
			}
		else{
		        $data['title'] = $this->lang->line('nothing_msg');
		
		}
		
		$data['style']      =  $this->style;
        
        $this->load->view('inc/head', $data);
        $this->load->view('inc/mydata/'.$this->style.'/header',$this->data_header);
        $data['msg'] = '<div class="msg_delet">' . $data['title'] . '</div>';
        $this->load->view('home/msg', $data);
        ?>
        <script langauge="javascript" type="text/javascript">
            <!--
                    function goback()
            {
                location = "<?php echo base_url('mail_box'); ?>";
            }
            setTimeout('goback()', 1500);
            //-->
        </script>
        <?php
        $this->load->view('inc/mydata/'.$this->style.'/footer',$this->data_footer);
    }
//-----------------------------------------------------------------------------------------
}