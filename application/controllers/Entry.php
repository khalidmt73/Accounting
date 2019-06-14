<?php

class Entry extends CI_Controller {

    function __construct() {
        parent::__construct();
       
    }

//-----------------------------------------------------------------------------------------
    public function index() {
        
    }

//-----------------------------------------------------------------------------------------
    public function view() {
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
        } else {
            $sc = ($this->uri->segment(4)) ? $this->uri->segment(4) : $sc = 'ASC';
        }

        if (isset($_POST['limit'])) {
            $limit = $_POST['limit'];
        } else {
            $limit = ($this->uri->segment(8)) ? $this->uri->segment(8) : $limit = 5;
        }

        if ($this->uri->segment(4) == 'edit') {
            $id = $this->uri->segment(3);
            $where = "id = " . $id;
            $data['oneRecord'] = $this->model->get_one('entry', $where);
        } else
            $id = 0;

		$where = "thedate BETWEEN '" . $fromdate . "' and '" . $todate . "'";
        $get_num = $this->model->get_num_where('journal', $where);

        $config['base_url'] = base_url('entry/result/' . $order . '/' . $sc . '/' . $fromdate . '/' . $todate . '/cl/' . $limit . '/');
        $config['total_rows'] = $get_num;
        $config['per_page'] = $limit;

        $this->pagination->initialize($config);

        $data['sc'] = $sc;
        $data['limit'] = $limit;
         $data['style']      =  $this->style;
        $data['title'] = $this->lang->line('entry');
        $data['fromdate'] = $fromdate;
        $data['todate'] = $todate;
        $data['order'] = $order;
        $data['total_rows'] = $get_num;
        $data['offset'] = ($this->uri->segment(9)) ? $this->uri->segment(9) : 0;
		$offset = $data['offset']; 
		
        //$data['type'] = $this->model->get('tree_account');
        //$data['journal'] = $this->model->get_where('journal', $where);
        $data['journal_details'] = $this->model->get('journal_details');
        //$data['pagination'] = $this->pagination->create_links();
		
		
		
		$data['type'] = $this->model->get('tree_account');
        $start = $this->mpages->mulitiPages($offset,$get_num ,$limit);
		$data['journal'] = $this->model->get_where_limit_orderBy('journal', $where, $limit, $offset,$order, $sc);

        $data['pages'] = $this->mpages->pagesPrint(base_url('entry/result/'.$order.'/'.$sc.'/'.$fromdate.'/'.$todate.'/cl/'.$limit.'/'));


		
		$this->load->view('inc/head', $data);
        $this->load->view('inc/financeDep/'.$this->style.'/header',$this->data_header);
        $this->load->view('entry/sub_menu');
		$this->load->view('entry/view',$data);
        $this->load->view('entry/result', $data);
        $this->load->view('inc/financeDep/'.$this->style.'/footer',$this->data_footer);
    }

//-----------------------------------------------------------------------------------------
    public function result() {

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
        } else {
            $sc = ($this->uri->segment(4)) ? $this->uri->segment(4) : $sc = 'ASC';
        }

        if (isset($_POST['limit'])) {
            $limit = $_POST['limit'];
        } else {
            $limit = ($this->uri->segment(8)) ? $this->uri->segment(8) : $limit = 5;
        }

        $where = "thedate BETWEEN '" . $fromdate . "' and '" . $todate . "'";
        $get_num = $this->model->get_num_where('journal', $where);

        $config['base_url'] = base_url('entry/result/' . $order . '/' . $sc . '/' . $fromdate . '/' . $todate . '/cl/' . $limit . '/');
        $config['total_rows'] = $get_num;
        $config['per_page'] = $limit;

        $this->pagination->initialize($config);

        $data['sc'] = $sc;
        $data['limit'] = $limit;
        $data['style']      =  $this->style;
        $data['title'] = $this->lang->line('entry');
        $data['fromdate'] = $fromdate;
        $data['todate'] = $todate;
        $data['order'] = $order;
        $data['total_rows'] = $get_num;
        $data['offset'] = ($this->uri->segment(9)) ? $this->uri->segment(9) : 0;
		$offset = $data['offset']; 

        $data['type'] = $this->model->get('tree_account');
		//$data['journal'] = $this->model->get_where('journal', $where);
        $data['journal_details'] = $this->model->get('journal_details');
        //$data['pagination'] = $this->pagination->create_links();
		
		
		$data['type'] = $this->model->get('tree_account');
        $start = $this->mpages->mulitiPages($offset,$get_num ,$limit);
		$data['journal'] = $this->model->get_where_limit_orderBy('journal', $where, $limit, $offset,$order, $sc);

        $data['pages'] = $this->mpages->pagesPrint(base_url('entry/result/'.$order.'/'.$sc.'/'.$fromdate.'/'.$todate.'/cl/'.$limit.'/'));



		if ($this->uri->segment(7) == 'cl') {
		
		$this->load->view('inc/head', $data);
        $this->load->view('inc/financeDep/'.$this->style.'/header',$this->data_header);
        $this->load->view('entry/sub_menu');
		$this->load->view('entry/view',$data);

        }
        $this->load->view('entry/result', $data);
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
        } else {
            $sc = ($this->uri->segment(4)) ? $this->uri->segment(4) : $sc = 'ASC';
        }

        if (isset($_POST['limit'])) {
            $limit = $_POST['limit'];
        } else {
            $limit = ($this->uri->segment(8)) ? $this->uri->segment(8) : $limit = 5;
        }

        //echo $this->uri->segment(8);exit;
        $where = "thedate BETWEEN '" . $fromdate . "' and '" . $todate . "'";
        $get_num = $this->model->get_num_where('journal', $where);

        $config['base_url'] = base_url('entry/result/' . $order . '/' . $sc . '/' . $fromdate . '/' . $todate . '/cl/' . $limit . '/');
        $config['total_rows'] = $get_num;
        $config['per_page'] = $limit;

        $this->pagination->initialize($config);

        $data['sc'] = $sc;
        $data['limit'] = $limit;
         $data['style']      =  $this->style;
        $data['title'] = $this->lang->line('entry');
        $data['fromdate'] = $fromdate;
        $data['todate'] = $todate;
        $data['order'] = $order;
        $data['total_rows'] = $get_num;
        $data['offset'] = ($this->uri->segment(9)) ? $this->uri->segment(9) : 0;
        $data['type'] = $this->model->get('tree_account');
        $data['journal'] = $this->model->get_where('journal', $where);
        $data['journal_details'] = $this->model->get('journal_details');
        $data['pagination'] = $this->pagination->create_links();
		

		$this->load->view('inc/head', $data);
        $this->load->view('inc/financeDep/'.$this->style.'/header',$this->data_header);        if ($this->uri->segment(7) == 'cl') {
		
        $this->load->view('entry/sub_menu');
		$this->load->view('entry/view',$data);

        }
		$this->load->view('entry/search_result',$data);
        $this->load->view('inc/financeDep/'.$this->style.'/footer',$this->data_footer);
    }

//-----------------------------------------------------------------------------------------
    public function add() {
         $data['style']      =  $this->style;
        $data['title'] = $this->lang->line('entry_add');
        $data['bankRecords'] = $this->model->get('tree_account');
        $data['entryRecords'] = $this->model->get('tree_account');
        if ($this->uri->segment(4) == 'add') {
            $id = $this->uri->segment(3);
            $where = "id = " . $id;
            $data['oneRecord'] = $this->model->get_one('journal', $where);
        } else
            $id = 0;
        $this->load->view('inc/head', $data);
        $this->load->view('inc/financeDep/'.$this->style.'/header',$this->data_header);
        $this->load->view('entry/sub_menu');
		$this->load->view('entry/add',$data);
        $this->load->view('inc/financeDep/'.$this->style.'/footer',$this->data_footer);
    }

//-----------------------------------------------------------------------------------------
    public function create() {
        $data2['details'] = $_POST['details'];
        $data2['thedate'] = $_POST['thedate'];
        $data2['thetime'] = date("h:i:s");
		$data2['user_id'] = $this->session->userdata('userIdCC');
       
        $this->model->create('journal', $data2);

        $journal_id = $this->db->insert_id();

        $data3['journal_id'] = $journal_id;
        $data3['fromaccount'] = $_POST['thevalue'];
        $data3['toaccount'] = 0;
        $data3['accountno'] = $_POST['box_accountno'];
        $this->model->create('journal_details', $data3);

        $data4['journal_id'] = $journal_id;
        $data4['fromaccount'] = 0;
        $data4['toaccount'] = $_POST['thevalue'];
        $data4['accountno'] = $_POST['accountno'];
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
                location = "<?php echo base_url('entry/add/' . $journal_id . '/add'); ?>";
            }
            setTimeout('goback()', 1500);
            //-->
        </script>
        <?php
        $this->load->view('inc/cpanel/'.$this->style.'/footer',$this->data_footer);
    }

//-----------------------------------------------------------------------------------------
    public function edit($id) {
        $data['title'] = $this->lang->line('edit_entry');
         $data['style']      =  $this->style;
        $where = 'journal_id = '.$id;
        $data['record'] = $this->model->join_where(
		'
	    journal_details.id as id,
		journal_details.journal_id as journal_id,
		journal_details.fromaccount as fromaccount,
		journal_details.toaccount as toaccount,
		journal_details.accountno as accountno,
		journal.thedate as thedate
		',
		'journal_details','journal',$where);
        $data['entryRecords'] = $this->model->get('tree_account');
        $this->load->view('inc/head', $data);
        $this->load->view('inc/financeDep/'.$this->style.'/header',$this->data_header);
        $this->load->view('entry/sub_menu');
		$this->load->view('entry/add',$data);
        $this->load->view('inc/financeDep/'.$this->style.'/footer',$this->data_footer);
    }

//-----------------------------------------------------------------------------------------
    public function update($id, $journal_id) {
        $data2['details'] = $_POST['details'];
        $data2['thedate'] = $_POST['thedate'];
        $data2['thetime'] = date("h:i:s");
        $this->model->update('journal', $data2, $journal_id);

        $data['accountno'] = $_POST['accountno'];
        $data['box_accountno'] = $_POST['box_accountno'];
        $data['thedate'] = $_POST['thedate'];
        $data['thevalue'] = $_POST['thevalue'];
        $data['byName'] = $_POST['byName'];
        $data['depositor'] = $_POST['depositor'];
        $data['details'] = $_POST['details'];
        $this->model->update('entry', $data, $id);

        $data['title'] = $this->lang->line('update_msg');
         $data['style']      =  $this->style;

        $this->load->view('inc/header', $data);
        $this->load->view('inc/menu');
        $data['msg'] = '<div class="alert alert-success msg" role="alert">' . $data['title'] . ' <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		</div>';
        $this->load->view('home', $data);
        ?>
        <script langauge="javascript" type="text/javascript">
            <!--
                    function goback()
            {
                location = "<?php echo base_url('entry/view/' . $id . '/edit'); ?>";
            }
            setTimeout('goback()', 1500);
            //-->
        </script>
        <?php
        $this->load->view('inc/financeDep/'.$this->style.'/footer',$this->data_footer);
    }

//-----------------------------------------------------------------------------------------
    public function delet($id) {
        $this->model->delet('entry', 'id', $id);
        $data['title'] = $this->lang->line('delet_msg');
         $data['style']      =  $this->style;
        $this->load->view('inc/header', $data);
        $this->load->view('inc/menu');
        $data['msg'] = '<div class="alert alert-danger msg" role="alert">' . $data['title'] . ' <a href="#" class="close" data-dismiss="alert" aria-label="close">&times;</a>
		</div>';
        $this->load->view('home', $data);
        ?>
        <script langauge="javascript" type="text/javascript">
            <!--
                    function goback()
            {
                location = "<?php echo base_url('entry/view/' . $id . '/delet'); ?>";
            }
            setTimeout('goback()', 1500);
            //-->
        </script>
        <?php
        $this->load->view('inc/financeDep/'.$this->style.'/footer',$this->data_footer);
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
        $get_num = $this->model->get_num('entry', $where);

        $data['sc'] = $this->uri->segment(4);
         $data['style']      =  $this->style;
        $data['title'] = $this->lang->line('entry');
        $data['fromdate'] = $fromdate;
        $data['todate'] = $todate;
        $data['order'] = $order;
        $data['records'] = $this->model->get_where('entry', $where . ' ORDER BY ' . $order . ' ' . $sc);
        $this->load->view('entry/pdf', $data);
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
        $get_num = $this->model->get_num('entry', $where);

        $data['sc'] = $this->uri->segment(4);
         $data['style']      =  $this->style;
        $data['title'] = $this->lang->line('entry');
        $data['fromdate'] = $fromdate;
        $data['todate'] = $todate;
        $data['order'] = $order;
        $data['records'] = $this->model->get_where('entry', $where . ' ORDER BY ' . $order . ' ' . $sc);

        $this->load->view('entry/word', $data);
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
        $get_num = $this->model->get_num('entry', $where);

        $data['sc'] = $this->uri->segment(4);
         $data['style']      =  $this->style;
        $data['title'] = $this->lang->line('entry');
        $data['fromdate'] = $fromdate;
        $data['todate'] = $todate;
        $data['order'] = $order;
        $data['records'] = $this->model->get_where('entry', $where . ' ORDER BY ' . $order . ' ' . $sc);

        $this->load->view('entry/excel', $data);
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
        $get_num = $this->model->get_num('entry', $where);

        $data['sc'] = $this->uri->segment(4);
         $data['style']      =  $this->style;
        $data['title'] = $this->lang->line('entry');
        $data['fromdate'] = $fromdate;
        $data['todate'] = $todate;
        $data['order'] = $order;
        $data['records'] = $this->model->get_where('entry', $where . ' ORDER BY ' . $order . ' ' . $sc);

        $this->load->view('entry/printed', $data);
    }

//-----------------------------------------------------------------------------------------
}
