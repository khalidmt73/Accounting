<?php

class Mydata extends CI_Controller {

	 public $headers ;
    
	function __construct() {
        parent::__construct();
		
    }
	
//-----------------------------------------------------------------------------------------
    public function index() {
        $data['title']  = $this->lang->line('mydata');
		$data['style']  =  $this->style;
		$id	    	    = $this->session->userdata('userIdCC');
        $data['record'] = $this->model->get_where('user', array('id' => $id));
        $this->load->view('inc/head', $data);
        $this->load->view('inc/mydata/'.$this->style.'/header',$this->data_header);
        $this->load->view('mydata/index', $data);
        $this->load->view('inc/mydata/'.$this->style.'/footer',$this->data_footer);
    }
	//-----------------------------------------------------------------------------------------
    public function password() {
        $data['title']  = $this->lang->line('mydata');
		$data['style']  =  $this->style;
		$id	    	    = $this->session->userdata('userIdCC');
        $data['record'] = $this->model->get_where('user', array('id' => $id));
        $this->load->view('inc/head', $data);
        $this->load->view('inc/mydata/'.$this->style.'/header',$this->data_header);
        $this->load->view('mydata/password', $data);
        $this->load->view('inc/mydata/'.$this->style.'/footer',$this->data_footer);
    }
//-----------------------------------------------------------------------------------------
	public function update() {
		$id	    	    = $this->session->userdata('userIdCC');
        $data['record'] = $this->model->get_where('user', array('id' => $id));
        $data['title'] = $this->lang->line('mydata');
		$data['style']      =  $this->style;
		$this->load->view('inc/head', $data);
		$this->load->view('inc/mydata/'.$this->style.'/header',$this->data_header);
		
		if(trim($_POST['userPass_old2']) !== trim($_POST['userPass_old'])){
				$data1['userPass_old_msg'] = $this->lang->line('password').' '.$this->lang->line('wrong');
				
				$this->load->view('mydata/index', $data1);
			}
		
		elseif(trim($_POST['userPass2']) !== trim($_POST['userPass'])){
				$data2['userPass_msg'] = $this->lang->line('no_match');
				$this->load->view('mydata/index', $data2);
			
		}

		else{
		$data_base['userPass']  =$_POST['userPass'] ;
        $this->model->update('user', $data_base,$id);
        $data['title'] = $this->lang->line('update_msg');
        
        $data['msg'] = '<div class="msg_update">' . $data['title'] . '</div>';
        $this->load->view('home/msg', $data);
		
        ?>
        <script langauge="javascript" type="text/javascript">
            <!--
                    function goback()
            {
                location = "<?php echo base_url('login/logout'); ?>";
            }
            setTimeout('goback()', 1500);
            //-->
        </script>
        <?php
		}
        $this->load->view('inc/mydata/'.$this->style.'/footer',$this->data_footer);
		
}
//-----------------------------------------------------------------------------------------


}