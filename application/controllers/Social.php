<?php

class Social extends CI_Controller {

    function __construct() {
        parent::__construct();
		
      }
//-----------------------------------------------------------------------------------------
    public function index() {
	    $data['title'] = $this->lang->line('social');
		$data['style']      =  $this->style;
       	$data['social'] = $this->model->get('social');
		$this->load->view('inc/head', $data);
        $this->load->view('inc/cpanel/'.$this->style.'/header',$this->data_header);
        $this->load->view('social/index',$data);
        $this->load->view('inc/cpanel/'.$this->style.'/footer',$this->data_footer);
    }
//-----------------------------------------------------------------------------------------
	public function update($id) {
		
        $data['twitter']   = $_POST['twitter'];
        $data['facebook']  = $_POST['facebook'];
        $data['instagram'] = $_POST['instagram'];
        $data['gmail']     = $_POST['gmail'];
        $data['youtube']   = $_POST['youtube'];

		$this->model->update('social', $data,$id);
		$data['title'] = $this->lang->line('edit_msg');
		$data['style']      =  $this->style;
        
        
		$this->load->view('inc/head', $data);
        $this->load->view('inc/cpanel/'.$this->style.'/header',$this->data_header);
        $data['msg'] = '<div class="msg_update">' . $data['title'] . '</div>';        $this->load->view('home/msg', $data);
        ?>
        <script langauge="javascript" type="text/javascript">
            <!--
                    function goback()
            {
                location = "<?php echo base_url('social/index'); ?>";
            }
            setTimeout('goback()', 2500);
            //-->
        </script>
        <?php
        $this->load->view('inc/cpanel/'.$this->style.'/footer',$this->data_footer);
 
}
//-----------------------------------------------------------------------------------------
}