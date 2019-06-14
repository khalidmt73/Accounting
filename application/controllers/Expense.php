<?php
class Expense extends CI_Controller {
		public $name ='expense';  

    function __construct() {
        parent::__construct();
        
    }

//-----------------------------------------------------------------------------------------
    public function index() {
        
    }

//-----------------------------------------------------------------------------------------
    public function view() {

		if (isset($_POST['order'])) {
            $order = $_POST['order'];
        } else {
            $order = ($this->uri->segment(3)) ? $this->uri->segment(3) : $order = 'id';
        }

        if (isset($_POST['sc'])) {
            $sc = $_POST['sc'];
        } else {
            $sc = ($this->uri->segment(4)) ? $this->uri->segment(4) : $sc = 'ASC';
        }

        if (isset($_POST['limit'])) {
            $limit = $_POST['limit'];
        } else {
            $limit = ($this->uri->segment(8)) ? $this->uri->segment(8) : $limit = 5;
        }

        if (isset($_POST['fromdate']) and isset($_POST['todate'])) {
            $fromdate = $_POST['fromdate'];
            $todate = $_POST['todate'];
        } else {
            $fromdate = ($this->uri->segment(5)) ? $this->uri->segment(5) : $fromdate = date("Y-01-01");
            $todate = ($this->uri->segment(6)) ? $this->uri->segment(6) : $todate = date("Y-m-d");
        }
		
        if (isset($_POST['month']) and isset($_POST['year'])) {
            $fromdate = $_POST['year'] . '-' . $_POST['month'] . '-' . '01';
            $todate = $_POST['year'] . '-' . $_POST['month'] . '-' . '31';
        }


        if ($this->uri->segment(4) == 'edit') {
            $id = $this->uri->segment(3);
            $where = "id = " . $id;
            $data['oneRecord'] = $this->model->get_one($this->name, $where);
        } else
            $id = 0;

        $data['style']      =  $this->style;
        $data['title'] = $this->lang->line($this->name);
        $where = "thedate BETWEEN '" . $fromdate . "' and '" . $todate . "'";
        $get_num = $this->model->get_num_where($this->name, $where);
		
		$data['total_rows'] = $get_num;
		$data['fromdate'] = $fromdate;
        $data['todate'] = $todate;

		
		$data['sc'] = $sc;

		$data['order'] = $order;
		$data['limit'] = $limit;
		$offset = $this->uri->segment(9,1);
		$start = $this->mpages->mulitiPages($offset,$get_num ,$limit);
	    $data['start']= $start;
		$data['records'] = $this->model->get_where_limit_orderBy($this->name, $where, $limit, $start,$order, $sc);

        $data['pages'] = $this->mpages->pagesPrint(base_url($this->name.'/result/'.$order.'/'.$sc.'/'.$fromdate.'/'.$todate.'/cl/'.$limit.'/'));

			
		$this->load->view('inc/head', $data);
        $this->load->view('inc/financeDep/'.$this->style.'/header',$this->data_header);
        $this->load->view($this->name.'/sub_menu');
        $this->load->view($this->name.'/view', $data);
        $this->load->view($this->name.'/result', $data);
        $this->load->view('inc/financeDep/'.$this->style.'/footer',$this->data_footer);
    }

//-----------------------------------------------------------------------------------------
    public function result() {
		  		
		   if (isset($_POST['order'])) {
            $order = $_POST['order'];
        } else {
            $order = ($this->uri->segment(3)) ? $this->uri->segment(3) : $order = 'id';
        }

        if (isset($_POST['sc'])) {
            $sc = $_POST['sc'];
        } else {
            $sc = ($this->uri->segment(4)) ? $this->uri->segment(4) : $sc = 'ASC';
        }

        if (isset($_POST['limit'])) {
            $limit = $_POST['limit'];
        } else {
            $limit = ($this->uri->segment(8)) ? $this->uri->segment(8) : $limit = 5;
        }

		  if (isset($_POST['fromdate']) and isset($_POST['todate'])) {
            $fromdate = $_POST['fromdate'];
            $todate = $_POST['todate'];
        } else {
            $fromdate = ($this->uri->segment(5)) ? $this->uri->segment(5) : $fromdate = date("Y-01-01");
            $todate = ($this->uri->segment(6)) ? $this->uri->segment(6) : $todate = date("Y-m-d");
        }

        if (isset($_POST['month']) and isset($_POST['year'])) {
            $fromdate = $_POST['year'] . '-' . $_POST['month'] . '-' . '01';
            $todate = $_POST['year'] . '-' . $_POST['month'] . '-' . '31';
        }


		$data['title'] = $this->lang->line($this->name);
		$data['style']      =  $this->style;
		$where = "thedate BETWEEN '" . $fromdate . "' and '" . $todate . "'";
        $get_num = $this->model->get_num_where($this->name, $where);
		
		$data['total_rows'] = $get_num;
		$data['fromdate'] = $fromdate;
        $data['todate'] = $todate;
		$data['sc'] = $sc;

		$data['order'] = $order;
		$data['limit'] = $limit;
		$offset = $this->uri->segment(9,1);
		$start = $this->mpages->mulitiPages($offset,$get_num ,$limit);
	    $data['start']= $start;
		$data['records'] = $this->model->get_where_limit_orderBy($this->name, $where, $limit, $start,$order, $sc);

        $data['pages'] = $this->mpages->pagesPrint(base_url($this->name.'/result/'.$order.'/'.$sc.'/'.$fromdate.'/'.$todate.'/cl/'.$limit.'/'));

		 if ($this->uri->segment(7) == 'cl') {
			
		$this->load->view('inc/head', $data);
        $this->load->view('inc/financeDep/'.$this->style.'/header',$this->data_header);
        $this->load->view($this->name.'/sub_menu');
        $this->load->view($this->name.'/view', $data);
        }
        $this->load->view($this->name.'/result', $data);
        $this->load->view('inc/financeDep/'.$this->style.'/footer',$this->data_footer);
             
    }

//-----------------------------------------------------------------------------------------
    public function search_result() {
        if (isset($_POST['search'])) {
            $search = trim($_POST['search']);
        } else {
            $search = ($this->uri->segment(3)) ? $this->uri->segment(3) :
                    $search = '';
        }
        if (isset($_POST['order'])) {
            $order = $_POST['order'];
        } else {
            $order = ($this->uri->segment(4)) ? $this->uri->segment(4) : $order = 'id';
        }

        if (isset($_POST['sc'])) {
            $sc = $_POST['sc'];
        } else {
            $sc = ($this->uri->segment(5)) ? $this->uri->segment(5) : $sc = 'ASC';
        }
        if (is_numeric($search)) {
            $where = "thevalue = " . $search;
        } else {
            $where = "beneficiary LIKE '%$search%'";
        }

        $get_num = $this->model->get_num($this->name, $where);

        $data['search'] = $search;
        $data['style']      =  $this->style;
        $data['title'] = $this->lang->line($this->name);
        $data['total_rows'] = $get_num;
        $data['records'] = $this->model->get_where($this->name, $where);
		$this->load->view($this->name.'/search_result',$data);
    }

//-----------------------------------------------------------------------------------------
    public function add() {
        $data['style']      =  $this->style;
        $data['title'] = $this->lang->line('add');
        $data['bankRecords'] = $this->model->get_where('tree_account', 'accountno=1111');
        $data[$this->name.'Records'] = $this->model->get_where('tree_account', 'type_id=4 and parent_id != 0');
        if ($this->uri->segment(4) == 'add') {
            $id = $this->uri->segment(3);
            $where = "id = " . $id;
            $data['oneRecord'] = $this->model->get_one($this->name, $where);
        } else
            $id = 0;
		$this->load->view('inc/head', $data);
        $this->load->view('inc/financeDep/'.$this->style.'/header',$this->data_header);
        $this->load->view($this->name.'/sub_menu');
		$this->load->view($this->name.'/add',$data);
        $this->load->view('inc/financeDep/'.$this->style.'/footer',$this->data_footer);
    }

//-----------------------------------------------------------------------------------------
    public function create() {
        $data2['details'] = $_POST['details'];
        $data2['thedate'] = $_POST['thedate'];
        $data2['thetime'] = date("h:i:s");
        $data2['user_id'] = $this->session->userdata('userIdCC');
        ;
        $this->model->create('journal', $data2);

        $journal_id = $this->db->insert_id();

        $data['journal_id'] = $journal_id;
        $data['accountno'] = $_POST['accountno'];
        $data['box_accountno'] = $_POST['box_accountno'];
        $data['thedate'] = $_POST['thedate'];
        $data['beneficiary'] = $_POST['beneficiary'];
        $data['nocheck'] = $_POST['nocheck'];
        $data['details'] = $_POST['details'];
        $data['thevalue'] = $_POST['thevalue'];
        $this->model->create('expense', $data);

        $id = $this->db->insert_id();


        $data3['journal_id'] = $journal_id;
        $data3['fromaccount'] = $_POST['thevalue'];
        $data3['toaccount'] = 0;
        $data3['accountno'] = $_POST['accountno'];
        $this->model->create('journal_details', $data3);

        $data4['journal_id'] = $journal_id;
        $data4['fromaccount'] = 0;
        $data4['toaccount'] = $_POST['thevalue'];
        $data4['accountno'] = $_POST['box_accountno'];
        $this->model->create('journal_details', $data4);


        $data['title'] = $this->lang->line('add_msg');
        $data['style']      =  $this->style;
		$data['msg'] = '<div class="create_msg">' . $data['title'] . '</div>';
        $this->load->view('home/msg', $data);
        ?>
        <script langauge="javascript" type="text/javascript">
            <!--
                    function goback()
            {
                location = "<?php echo base_url($this->name.'/add/' . $id . '/add'); ?>";
            }
            setTimeout('goback()', 1500);
            //-->
        </script>
        <?php
        $this->load->view('inc/cpanel/'.$this->style.'/footer',$this->data_footer);
    }

//-------------------------------------------------------------------------------------
    public function edit($id) {
        $data['title'] = $this->lang->line('edit');
        $data['style']      =  $this->style;
        $data['record'] = $this->model->get_where($this->name, array('id' => $id));
        $data['bankRecords'] = $this->model->get('tree_account');
        $data[$this->name.'Records'] = $this->model->get('tree_account');
		
		$this->load->view('inc/head', $data);
        $this->load->view('inc/financeDep/'.$this->style.'/header',$this->data_header);
        $this->load->view($this->name.'/sub_menu');
		$this->load->view($this->name.'/edit',$data);
        $this->load->view('inc/financeDep/'.$this->style.'/footer',$this->data_footer);
    }
//-------------------------------------------------------------------------------------
    public function copy($id) {
        $data['title'] = $this->lang->line('edit');
        $data['style']      =  $this->style;
        $data['record'] = $this->model->get_where($this->name, array('id' => $id));
        $data['bankRecords'] = $this->model->get('tree_account');
        $data[$this->name.'Records'] = $this->model->get('tree_account');
		
		$this->load->view('inc/head', $data);
        $this->load->view('inc/financeDep/'.$this->style.'/header',$this->data_header);
        $this->load->view($this->name.'/sub_menu');
		$this->load->view($this->name.'/copy',$data);
        $this->load->view('inc/financeDep/'.$this->style.'/footer',$this->data_footer);
    }


//-------------------------------------------------------------------------------------
    public function update($id, $journal_id) {
        $data2['details'] = $_POST['details'];
        $data2['thedate'] = $_POST['thedate'];
        $data2['thetime'] = date("h:i:s");
        $this->model->update('journal', $data2,'id', $journal_id);

        $data['accountno'] = $_POST['accountno'];
        $data['box_accountno'] = $_POST['box_accountno'];
        $data['thedate'] = $_POST['thedate'];
        $data['thevalue'] = $_POST['thevalue'];
        $data['beneficiary'] = $_POST['beneficiary'];
        $data['details'] = $_POST['details'];
        $this->model->update($this->name, $data,'id',$id);

        $data['title'] = $this->lang->line('update_msg');
        $data['style']      =  $this->style;

		$this->load->view('inc/head', $data);
        $this->load->view('inc/financeDep/'.$this->style.'/header',$this->data_header);        $data['msg'] = '<div class="update_msg">' . $data['title'] . '</div>';
        $this->load->view('home/msg', $data);
        ?>
        <script langauge="javascript" type="text/javascript">
            <!--
                    function goback()
            {
                location = "<?php echo base_url($this->name.'/edit/' . $id . '/edit'); ?>";
            }
            setTimeout('goback()', 1500);
            //-->
        </script>
        <?php
        $this->load->view('inc/financeDep/'.$this->style.'/footer',$this->data_footer);
    }
//-----------------------------------------------------------------------------------------
    public function delet($id) {
        $this->model->delet($this->name, 'id', $id);
        $data['title'] = $this->lang->line('delet');
        $data['style']      =  $this->style;
        $this->load->view('inc/header', $data);
        $this->load->view('inc/menu');
		
		$data['msg'] = '<div class="delet_msg">' . $data['title'] . '</div>';
        $this->load->view('home/msg', $data);
        ?>
        <script langauge="javascript" type="text/javascript">
            <!--
                    function goback()
            {
                location = "<?php echo base_url($this->name.'/view/' . $id . '/delet'); ?>";
            }
            setTimeout('goback()', 1500);
            //-->
        </script>
        <?php
        $this->load->view('inc/cpanel/'.$this->style.'/footer',$this->data_footer);
    }

//-----------------------------------------------------------------------------------------
    public function pdf() {
        if (isset($_POST['fromdate']) and isset($_POST['todate'])) {
            $fromdate = $_POST['fromdate'];
            $todate = $_POST['todate'];
        } else {
            $fromdate = ($this->uri->segment(5)) ? $this->uri->segment(5) : $fromdate = date("Y-01-01");
            $todate = ($this->uri->segment(6)) ? $this->uri->segment(6) : $todate = date("Y-m-d");
        }

        if (isset($_POST['month']) and isset($_POST['year'])) {
            $fromdate = $_POST['year'] . '-' . $_POST['month'] . '-' . '01';
            $todate = $_POST['year'] . '-' . $_POST['month'] . '-' . '31';
        }

        if (isset($_POST['order'])) {
            $order = $_POST['order'];
        } else {
            $order = ($this->uri->segment(3)) ? $this->uri->segment(3) : $order = 'id';
        }

        if (isset($_POST['sc'])) {
            $sc = $_POST['sc'];
        } else
            $sc = 'ASC';

        $where = "thedate BETWEEN '" . $fromdate . "' and '" . $todate . "'";
        $get_num = $this->model->get_num($this->name, $where);

        $data['sc'] = $this->uri->segment(4);
        $data['style']      =  $this->style;
        $data['title'] = $this->lang->line($this->name);
        $data['fromdate'] = $fromdate;
        $data['todate'] = $todate;
        $data['order'] = $order;
        $data['records'] = $this->model->get_where($this->name, $where . ' ORDER BY ' . $order . ' ' . $sc);
	    $this->load->view($this->name.'/pdf', $data);
    }

//-----------------------------------------------------------------------------------------
    public function word() {
        if (isset($_POST['fromdate']) and isset($_POST['todate'])) {
            $fromdate = $_POST['fromdate'];
            $todate = $_POST['todate'];
        } else {
            $fromdate = ($this->uri->segment(5)) ? $this->uri->segment(5) : $fromdate = date("Y-01-01");
            $todate = ($this->uri->segment(6)) ? $this->uri->segment(6) : $todate = date("Y-m-d");
        }

        if (isset($_POST['month']) and isset($_POST['year'])) {
            $fromdate = $_POST['year'] . '-' . $_POST['month'] . '-' . '01';
            $todate = $_POST['year'] . '-' . $_POST['month'] . '-' . '31';
        }

        if (isset($_POST['order'])) {
            $order = $_POST['order'];
        } else {
            $order = ($this->uri->segment(3)) ? $this->uri->segment(3) : $order = 'id';
        }

        if (isset($_POST['sc'])) {
            $sc = $_POST['sc'];
        } else
            $sc = 'ASC';

        $where = "thedate BETWEEN '" . $fromdate . "' and '" . $todate . "'";
        $get_num = $this->model->get_num($this->name, $where);

        $data['sc'] = $this->uri->segment(4);
        $data['style']      =  $this->style;
        $data['title'] = $this->lang->line($this->name);
        $data['fromdate'] = $fromdate;
        $data['todate'] = $todate;
        $data['order'] = $order;
        $data['records'] = $this->model->get_where($this->name, $where . ' ORDER BY ' . $order . ' ' . $sc);

		        $this->load->view($this->name.'/word', $data);
    }

//-----------------------------------------------------------------------------------------
    public function excel() {
        if (isset($_POST['fromdate']) and isset($_POST['todate'])) {
            $fromdate = $_POST['fromdate'];
            $todate = $_POST['todate'];
        } else {
            $fromdate = ($this->uri->segment(5)) ? $this->uri->segment(5) : $fromdate = date("Y-01-01");
            $todate = ($this->uri->segment(6)) ? $this->uri->segment(6) : $todate = date("Y-m-d");
        }

        if (isset($_POST['month']) and isset($_POST['year'])) {
            $fromdate = $_POST['year'] . '-' . $_POST['month'] . '-' . '01';
            $todate = $_POST['year'] . '-' . $_POST['month'] . '-' . '31';
        }

        if (isset($_POST['order'])) {
            $order = $_POST['order'];
        } else {
            $order = ($this->uri->segment(3)) ? $this->uri->segment(3) : $order = 'id';
        }

        if (isset($_POST['sc'])) {
            $sc = $_POST['sc'];
        } else
            $sc = 'ASC';

        $where = "thedate BETWEEN '" . $fromdate . "' and '" . $todate . "'";
        $get_num = $this->model->get_num($this->name, $where);

        $data['sc'] = $this->uri->segment(4);
        $data['style']      =  $this->style;
        $data['title'] = $this->lang->line($this->name);
        $data['fromdate'] = $fromdate;
        $data['todate'] = $todate;
        $data['order'] = $order;
        $data['records'] = $this->model->get_where($this->name, $where . ' ORDER BY ' . $order . ' ' . $sc);

		        $this->load->view($this->name.'/excel', $data);
    }

//-----------------------------------------------------------------------------------------
    public function printed() {
        if (isset($_POST['fromdate']) and isset($_POST['todate'])) {
            $fromdate = $_POST['fromdate'];
            $todate = $_POST['todate'];
        } else {
            $fromdate = ($this->uri->segment(5)) ? $this->uri->segment(5) : $fromdate = date("Y-01-01");
            $todate = ($this->uri->segment(6)) ? $this->uri->segment(6) : $todate = date("Y-m-d");
        }

        if (isset($_POST['month']) and isset($_POST['year'])) {
            $fromdate = $_POST['year'] . '-' . $_POST['month'] . '-' . '01';
            $todate = $_POST['year'] . '-' . $_POST['month'] . '-' . '31';
        }

        if (isset($_POST['order'])) {
            $order = $_POST['order'];
        } else {
            $order = ($this->uri->segment(3)) ? $this->uri->segment(3) : $order = 'id';
        }

        if (isset($_POST['sc'])) {
            $sc = $_POST['sc'];
        } else
            $sc = 'ASC';

        $where = "thedate BETWEEN '" . $fromdate . "' and '" . $todate . "'";
        $get_num = $this->model->get_num($this->name, $where);

        $data['sc'] = $this->uri->segment(4);
        $data['style']      =  $this->style;
        $data['title'] = $this->lang->line($this->name);
        $data['fromdate'] = $fromdate;
        $data['todate'] = $todate;
        $data['order'] = $order;
        $data['records'] = $this->model->get_where($this->name, $where . ' ORDER BY ' . $order . ' ' . $sc);
		$this->load->view('inc/head', $data);
        $this->load->view($this->name.'/printed', $data);
    }

//-----------------------------------------------------------------------------------------
}
