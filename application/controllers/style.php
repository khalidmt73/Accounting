<?php

class Style extends CI_Controller {

    function __construct() {
        parent::__construct();
		
      }
//-----------------------------------------------------------------------------------------
    public function index() {
	    $data['title'] = $this->lang->line('setting');
		$data['style']      =  $this->style;
        $this->load->view('inc/head', $data);
        $this->load->view('inc/cpanel/'.$this->style.'/header',$this->data_header);
        $this->load->view('setting/index',$data);
        $this->load->view('inc/cpanel/'.$this->style.'/footer',$this->data_footer);
    }
//-----------------------------------------------------------------------------------------
	public function update($id) {
		$data['style'] = $_POST['style'];
        $this->model->update('setting', $data,$id);
         
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
                location = "<?php echo base_url('setting/index'); ?>";
            }
            setTimeout('goback()', 1500);
            //-->
        </script>
        <?php
        $this->load->view('inc/cpanel/'.$this->style.'/footer',$this->data_footer);
 
}
//-----------------------------------------------------------------------------------------

}
