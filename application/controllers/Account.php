<?php
class Account extends CI_Controller {

    function __construct() {
        parent::__construct();
        
    }

//-----------------------------------------------------------------------------------------
    public function index() {
        
    }

//-----------------------------------------------------------------------------------------
    public function class_of_accounts() {
        $data['title'] = $this->lang->line('class_of_accounts');
        $data['records'] = $this->model->get('tree_type');
		$data['style']      =  $this->style;
        $this->load->view('inc/head', $data);
        $this->load->view('inc/financeDep/'.$this->style.'/header',$this->data_header);
        $this->load->view('account/menu_account');
		$this->load->view('account/class_of_accounts',$data);
        $this->load->view('inc/financeDep/'.$this->style.'/footer',$this->data_footer);
   }

//-----------------------------------------------------------------------------------------
    public function accounts_tree() {
        $data['title'] = $this->lang->line('accounts_tree');
      	$data['style']      =  $this->style;
	    $data['records'] = $this->model->get_orderBy('tree_account','accountno','ASC');
		$fromdate = '2016-01-01';
		$todate  = '2016-12-01'; 
		 $where = "thedate BETWEEN '" . $fromdate . "' and '" . $todate . "'";
		 $data['journal_details'] = $this->model->join_where(
		'
	    journal_details.id as id,
		journal_details.journal_id as journal_id,
		journal_details.fromaccount as fromaccount,
		journal_details.toaccount as toaccount,
		journal_details.accountno as accountno,
		journal.thedate as thedate
		',
		'journal_details', 'journal', $where);
		$this->load->view('inc/head', $data);
        $this->load->view('inc/financeDep/'.$this->style.'/header',$this->data_header);
        $this->load->view('account/menu_account');
		$this->load->view('account/accounts_tree',$data);
        $this->load->view('inc/financeDep/'.$this->style.'/footer',$this->data_footer);

    }

//-----------------------------------------------------------------------------------------
    public function account_view() {
        $data['style']      =  $this->style;
        $data['title'] = $this->lang->line('accounts_tree');
        $id = $this->uri->segment(3);
        $data['id'] =$this->uri->segment(3);
        $data['title_view'] = $this->model->get_where('tree_account', 'accountno = ' . $id);
        $data['journal_details'] = $this->model->get_where('journal_details', 'accountno = ' . $id);
        $data['journal'] = $this->model->get('journal');

        $data['records'] = $this->model->get('tree_account');
		$this->load->view('inc/head', $data);
        $this->load->view('inc/financeDep/'.$this->style.'/header',$this->data_header);
        $this->load->view('account/menu_account');
		$this->load->view('account/account_view',$data);
        $this->load->view('inc/financeDep/'.$this->style.'/footer',$this->data_footer);
    }

//-----------------------------------------------------------------------------------------
    public function add() {
        $data['style']      =  $this->style;
        $data['title'] = $this->lang->line('add');
        $data['treeRecords'] = $this->model->get('tree_type');
        $data['accountRecords'] = $this->model->get('tree_account');
		$this->load->view('inc/head', $data);
        $this->load->view('inc/financeDep/'.$this->style.'/header',$this->data_header);
        $this->load->view('account/menu_account');
		$this->load->view('account/add',$data);
        $this->load->view('inc/financeDep/'.$this->style.'/footer',$this->data_footer);
    }

//-----------------------------------------------------------------------------------------
    public function create() {
        $data['accountno'] = $_POST['accountno'];
        $data['title'] = $_POST['title'];
        $data['thevalue'] = $_POST['thevalue'];
        $data['type_id'] = $_POST['type_id'];
        $data['parent_id'] = $_POST['parent_id'];
        $this->model->create('tree_account', $data);
        $data['title'] = $this->lang->line('add_msg');
        $data['style']      =  $this->style;
			
		$data['msg'] = '<div class="msg_create">' . $data['title'] . '</div>';
        $this->load->view('home/msg', $data);
        ?>
        <script langauge="javascript" type="text/javascript">
            <!--
                    function goback()
            {
                location = "<?php echo base_url('account/accounts_tree'); ?>";
            }
            setTimeout('goback()', 1500);
            //-->
        </script>
        <?php
        $this->load->view('inc/cpanel/'.$this->style.'/footer',$this->data_footer);
    }

//-----------------------------------------------------------------------------------------
    public function edit($accountno) {
        $data['title'] = $this->lang->line('edit_income');
        $data['style']      =  $this->style;
        $data['records'] = $this->model->get_where('tree_account', 'accountno = ' . $accountno);
        $data['treeRecords'] = $this->model->get('tree_type');
        $data['accountRecords'] = $this->model->get('tree_account');
		$this->load->view('inc/head', $data);
        $this->load->view('inc/financeDep/'.$this->style.'/header',$this->data_header);
        $this->load->view('account/menu_account');
		$this->load->view('account/edit',$data);
        $this->load->view('inc/financeDep/'.$this->style.'/footer',$this->data_footer);

    }
//-----------------------------------------------------------------------------------------
    public function update($accountno) {

        $data['accountno'] = $_POST['accountno'];
        $data['title'] = $_POST['title'];
        $data['thevalue'] = $_POST['thevalue'];
        $data['type_id'] = $_POST['type_id'];
        $data['parent_id'] = $_POST['parent_id'];
        $this->model->update('tree_account', $data,'accountno', $accountno);
        $data['title'] = $this->lang->line('update_msg');
        $data['style']      =  $this->style;

       $this->load->view('inc/head', $data);
        $this->load->view('inc/financeDep/'.$this->style.'/header',$this->data_header);
        $data['msg'] = '<div class="msg_update">' . $data['title'] . '</div>';
        $this->load->view('home/msg', $data);

        ?>
        <script langauge="javascript" type="text/javascript">
            <!--
                    function goback()
            {
                location = "<?php echo base_url('account/accounts_tree/' . $accountno . '/edit'); ?>";
            }
            setTimeout('goback()', 1500);
            //-->
        </script>
        <?php
        $this->load->view('inc/cpanel/'.$this->style.'/footer',$this->data_footer);
    
		
	}

//-----------------------------------------------------------------------------------------
    public function delet($accountno) {
        $this->income->delet('income', 'accountno', $accountno);
        $data['title'] = $this->lang->line('delete_msg');
        $data['style']      =  $this->style;
        $this->session->set_flashdata('msg', '<div class="alert alert-danger msg" role="alert">' . $data['title'] . ' <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		</div>');
        header('location: ' . base_url('account/view'));
    }

//-----------------------------------------------------------------------------------------
    public function printed() {
         $data['style']      =  $this->style;
        $data['title'] = $this->lang->line('accounts_tree');
        $id = $this->uri->segment(3);
        $data['id'] =$this->uri->segment(3);
        $data['title_view'] = $this->model->get_where('tree_account', 'accountno = ' . $id);
        $data['journal_details'] = $this->model->get_where('journal_details', 'accountno = ' . $id);
        $data['journal'] = $this->model->get('journal');

        $data['records'] = $this->model->get('tree_account');
		$this->load->view('inc/head', $data);
        // $this->load->view('inc/financeDep/'.$this->style.'/header',$this->data_header);
        //$this->load->view('account/menu_account');
		$this->load->view('account/printed',$data);
        $this->load->view('inc/financeDep/'.$this->style.'/footer',$this->data_footer);
    }

//-----------------------------------------------------------------------------------------
}
