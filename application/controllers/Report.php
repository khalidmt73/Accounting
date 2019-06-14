<?php

class Report extends CI_Controller {

    function __construct() {
        parent::__construct();
        
    }

//-----------------------------------------------------------------------------------------
    public function index() {
        $data['style']      =  $this->style;
        $data['title'] = $this->lang->line('final_report');
		$this->load->view('inc/head', $data);
        $this->load->view('inc/financeDep/'.$this->style.'/header',$this->data_header);
        $this->load->view('report/menu_report');
		$this->load->view('report/index',$data);
        $this->load->view('inc/financeDep/'.$this->style.'/footer',$this->data_footer);
    }

//-----------------------------------------------------------------------------------------
    public function view_form_journal() {
        if (isset($_POST['fromdate']) and isset($_POST['todate'])) {
            $fromdate = $_POST['fromdate'];
            $todate   = $_POST['todate'];
        } else {
            $fromdate = ($this->uri->segment(3)) ? $this->uri->segment(3) : $fromdate = date("Y-m-01");
            $todate = ($this->uri->segment(4)) ? $this->uri->segment(4) : $todate = date("Y-m-d");
        }
		 if (isset($_POST['month']) and isset($_POST['year'])) {
            $fromdate = $_POST['year'] . '-' . $_POST['month'] . '-' . '01';
            $todate = $_POST['year'] . '-' . $_POST['month'] . '-' . '31';
        }
		
      
		$where = "thedate BETWEEN '" . $fromdate . "' and '" . $todate . "'";
        $getNum = $this->model->get_num_where('journal', $where);
        $data['total_rows']      = $getNum;
        $data['fromdate']        = $fromdate;
        $data['todate']          = $todate;
        $data['style']           =  $this->style;
        $data['title']           = $this->lang->line('journal');
        $data['journal']         = $this->model->get_where('journal', $where);
        $data['journal_details'] = $this->model->get('journal_details');
        $data['tree_account']    = $this->model->get('tree_account');

		$this->load->view('inc/head', $data);
        $this->load->view('inc/financeDep/'.$this->style.'/header',$this->data_header);
        $this->load->view('report/menu_report');
		$this->load->view('report/view_form_journal',$data);
		$this->load->view('report/journal_view',$data);
        $this->load->view('inc/financeDep/'.$this->style.'/footer',$this->data_footer);
   }

//-----------------------------------------------------------------------------------------
    public function journal_view() {
        if (isset($_POST['fromdate']) and isset($_POST['todate'])) {
            $fromdate = $_POST['fromdate'];
            $todate = $_POST['todate'];
        } else {
            $fromdate = ($this->uri->segment(3)) ? $this->uri->segment(3) : $fromdate = date("Y-01-01");
            $todate = ($this->uri->segment(4)) ? $this->uri->segment(4) : $todate = date("Y-m-d");
        }

        if (isset($_POST['month']) and isset($_POST['year'])) {
            $fromdate = $_POST['year'] . '-' . $_POST['month'] . '-' . '01';
            $todate = $_POST['year'] . '-' . $_POST['month'] . '-' . '31';
        }

        $where = "thedate BETWEEN '" . $fromdate . "' and '" . $todate . "'";
        $getNum = $this->model->get_num_where('journal', $where);
        $data['total_rows']      = $getNum;
        $data['fromdate']        = $fromdate;
        $data['todate']          = $todate;
        $data['style']           =  $this->style;
        $data['title']           = $this->lang->line('journal');
        $data['journal']         = $this->model->get_where('journal', $where);
        $data['journal_details'] = $this->model->get('journal_details');
        $data['tree_account']    = $this->model->get('tree_account');

		$this->load->view('report/journal_view',$data);
    }
//-----------------------------------------------------------------------------------------
    public function journal_view_entry() {
        if (isset($_POST['entry_f']) and isset($_POST['entry_t'])) {
            $entry_f = $_POST['entry_f'];
            $entry_t = $_POST['entry_t'];
        } else {
            $entry_f = ($this->uri->segment(3)) ? $this->uri->segment(3) : $entry_f =1;
            $entry_t = ($this->uri->segment(4)) ? $this->uri->segment(4) : $entry_t = 2;
        }

        $where = "id BETWEEN '" . $entry_f . "' and '" . $entry_t . "'";
        $getNum = $this->model->get_num_where('journal', $where);
        $data['total_rows']      = $getNum;
        $data['entry_f']         = $entry_f;
        $data['entry_t']         = $entry_t;
        $data['style']           =  $this->style;
        $data['title']           = $this->lang->line('journal');
        $data['journal']         = $this->model->get_where('journal', $where);
        $data['journal_details'] = $this->model->get('journal_details');
        $data['tree_account']    = $this->model->get('tree_account');

		$this->load->view('report/journal_view_entry',$data);
    }

//-----------------------------------------------------------------------------------------
    public function search() {
        if (isset($_POST['search'])) {
            $search = $_POST['search'];
        } else {
            $search = '';
        }

        $where = 'id =' . $search;
        $getNum = $this->model->get_num_where('journal', $where);

        $data['search'] = $search;
         $data['style']      =  $this->style;
        $data['title'] = $this->lang->line('journal');
        $data['total_rows'] = $getNum;

        $data['journal'] = $this->model->get_where('journal', $where);
        $data['journal_details'] = $this->model->get('journal_details');
        $data['tree_account'] = $this->model->get('tree_account');

        if (!isset($_POST['search'])) {
            $this->load->view('report/menu_report');
            $this->load->view('report/searchForm');
        }


        $this->load->view('report/journal_view', $data);
        $this->load->view('inc/financeDep/'.$this->style.'/footer',$this->data_footer);
    }

//-----------------------------------------------------------------------------------------

    public function view_form_trialBalance() {
        if (isset($_POST['fromdate']) and isset($_POST['todate'])) {
            $fromdate = $_POST['fromdate'];
            $todate = $_POST['todate'];
        } else {
            $fromdate = ($this->uri->segment(3)) ? $this->uri->segment(3) : $fromdate = date("Y-01-01");
            $todate = ($this->uri->segment(4)) ? $this->uri->segment(4) : $todate = date("Y-m-d");
        }

        if (isset($_POST['month']) and isset($_POST['year'])) {
            $fromdate = $_POST['year'] . '-' . $_POST['month'] . '-' . '01';
            $todate = $_POST['year'] . '-' . $_POST['month'] . '-' . '31';
        }

        $data['fromdate'] = $fromdate;
        $data['todate'] = $todate;
         $data['style']      =  $this->style;
        $data['title'] = $this->lang->line('trialBalance');

        $where = "thedate BETWEEN '" . $fromdate . "' and '" . $todate . "'";
        $getNum = $this->model->get_num_where('journal', $where);
        $data['total_rows'] = $getNum;
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
        $data['tree_account'] = $this->model->get('tree_account');
		$this->load->view('inc/head', $data);
        $this->load->view('inc/financeDep/'.$this->style.'/header',$this->data_header);
        $this->load->view('report/menu_report');
		$this->load->view('report/view_form_trialBalance',$data);
        $this->load->view('report/trialBalance_view',$data);
		$this->load->view('inc/financeDep/'.$this->style.'/footer',$this->data_footer);
    }

//-----------------------------------------------------------------------------------------
    public function trialBalance_view() {
        if (isset($_POST['fromdate']) and isset($_POST['todate'])) {
            $fromdate = $_POST['fromdate'];
            $todate = $_POST['todate'];
        } else {
            $fromdate = ($this->uri->segment(3)) ? $this->uri->segment(3) : $fromdate = date("Y-01-01");
            $todate = ($this->uri->segment(4)) ? $this->uri->segment(4) : $todate = date("Y-m-d");
        }

        if (isset($_POST['month']) and isset($_POST['year'])) {
            $fromdate = $_POST['year'] . '-' . $_POST['month'] . '-' . '01';
            $todate = $_POST['year'] . '-' . $_POST['month'] . '-' . '31';
        }

        $data['fromdate'] = $fromdate;
        $data['todate'] = $todate;
         $data['style']      =  $this->style;
        $data['title'] = $this->lang->line('trialBalance');

        $where = "thedate BETWEEN '" . $fromdate . "' and '" . $todate . "'";
        $getNum = $this->model->get_num_where('journal', $where);
        $data['total_rows'] = $getNum;
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
        $data['tree_account'] = $this->model->get('tree_account');
		
		$this->load->view('report/trialBalance_view',$data);
	  }

//-----------------------------------------------------------------------------------------
    public function view_form_budjet() {
        if (isset($_POST['fromdate']) and isset($_POST['todate'])) {
            $fromdate = $_POST['fromdate'];
            $todate = $_POST['todate'];
        } else {
            $fromdate = ($this->uri->segment(3)) ? $this->uri->segment(3) : $fromdate = date("Y-01-01");
            $todate = ($this->uri->segment(4)) ? $this->uri->segment(4) : $todate = date("Y-m-d");
        }

        if (isset($_POST['month']) and isset($_POST['year'])) {
            $fromdate = $_POST['year'] . '-' . $_POST['month'] . '-' . '01';
            $todate = $_POST['year'] . '-' . $_POST['month'] . '-' . '31';
        }

        $data['fromdate'] = $fromdate;
        $data['todate'] = $todate;
         $data['style']      =  $this->style;
        $data['title'] = $this->lang->line('budjet');

        $where = "thedate BETWEEN '" . $fromdate . "' and '" . $todate . "'";
        $getNum = $this->model->get_num_where('journal', $where);
        $data['total_rows'] = $getNum;
        $data['tree_account'] = $this->model->get('tree_account');
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
        $data['type1'] = $this->model->get_where('tree_account', 'type_id = 1');
        $data['type2'] = $this->model->get_where('tree_account', 'type_id = 2 or type_id = 5');
        $data['type3'] = $this->model->get_where('tree_account', 'type_id = 3');
        $data['type4'] = $this->model->get_where('tree_account', 'type_id = 4');
		$this->load->view('inc/head', $data);
        $this->load->view('inc/financeDep/'.$this->style.'/header',$this->data_header);
        $this->load->view('report/menu_report');
		$this->load->view('report/view_form_budjet',$data);
        $this->load->view('report/budjet_view',$data);
		$this->load->view('inc/financeDep/'.$this->style.'/footer',$this->data_footer);
    }

//-----------------------------------------------------------------------------------------
    public function budjet_view() {
        if (isset($_POST['fromdate']) and isset($_POST['todate'])) {
            $fromdate = $_POST['fromdate'];
            $todate = $_POST['todate'];
        } else {
            $fromdate = ($this->uri->segment(3)) ? $this->uri->segment(3) : $fromdate = date("Y-01-01");
            $todate = ($this->uri->segment(4)) ? $this->uri->segment(4) : $todate = date("Y-m-d");
        }

        if (isset($_POST['month']) and isset($_POST['year'])) {
            $fromdate = $_POST['year'] . '-' . $_POST['month'] . '-' . '01';
            $todate = $_POST['year'] . '-' . $_POST['month'] . '-' . '31';
        }

        $data['fromdate'] = $fromdate;
        $data['todate'] = $todate;
         $data['style']      =  $this->style;
        $data['title'] = $this->lang->line('budjet');

        $where = "thedate BETWEEN '" . $fromdate . "' and '" . $todate . "'";
        $getNum = $this->model->get_num_where('journal', $where);
        $data['total_rows'] = $getNum;
        $data['tree_account'] = $this->model->get('tree_account');
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
        $data['type1'] = $this->model->get_where('tree_account', 'type_id = 1');
        $data['type2'] = $this->model->get_where('tree_account', 'type_id = 2 or type_id = 5');
        $data['type3'] = $this->model->get_where('tree_account', 'type_id = 3');
        $data['type4'] = $this->model->get_where('tree_account', 'type_id = 4');

		$this->load->view('report/budjet_view',$data);
    }

//-----------------------------------------------------------------------------------------
    public function view_form_incomeStatement() {
        if (isset($_POST['fromdate']) and isset($_POST['todate'])) {
            $fromdate = $_POST['fromdate'];
            $todate = $_POST['todate'];
        } else {
            $fromdate = ($this->uri->segment(3)) ? $this->uri->segment(3) : $fromdate = date("Y-01-01");
            $todate = ($this->uri->segment(4)) ? $this->uri->segment(4) : $todate = date("Y-m-d");
        }

        if (isset($_POST['month']) and isset($_POST['year'])) {
            $fromdate = $_POST['year'] . '-' . $_POST['month'] . '-' . '01';
            $todate = $_POST['year'] . '-' . $_POST['month'] . '-' . '31';
        }

        $where = "thedate BETWEEN '" . $fromdate . "' and '" . $todate . "'";
        $getNum = $this->model->get_num_where('journal', $where);
        $data['total_rows'] = $getNum;
        $data['fromdate'] = $fromdate;
        $data['todate'] = $todate;
         $data['style']      =  $this->style;
        $data['title'] = $this->lang->line('income_statement');

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
        $data['tree_account'] = $this->model->get('tree_account');
        $data['type1'] = $this->model->get_where('tree_account', 'type_id = 1');
        $data['type2'] = $this->model->get_where('tree_account', 'type_id = 2');
        $data['type3'] = $this->model->get_where('tree_account', 'type_id = 3');
        $data['type4'] = $this->model->get_where('tree_account', 'type_id = 4');
		
		$this->load->view('inc/head', $data);
        $this->load->view('inc/financeDep/'.$this->style.'/header',$this->data_header);
        $this->load->view('report/menu_report');
		$this->load->view('report/view_form_incomeStatement',$data);
      	$this->load->view('report/incomeStatement_view',$data);
	   $this->load->view('inc/financeDep/'.$this->style.'/footer',$this->data_footer);
    }

//-----------------------------------------------------------------------------------------
    public function incomeStatement_view() {
        if (isset($_POST['fromdate']) and isset($_POST['todate'])) {
            $fromdate = $_POST['fromdate'];
            $todate = $_POST['todate'];
        } else {
            $fromdate = ($this->uri->segment(3)) ? $this->uri->segment(3) : $fromdate = date("Y-01-01");
            $todate = ($this->uri->segment(4)) ? $this->uri->segment(4) : $todate = date("Y-m-d");
        }

        if (isset($_POST['month']) and isset($_POST['year'])) {
            $fromdate = $_POST['year'] . '-' . $_POST['month'] . '-' . '01';
            $todate = $_POST['year'] . '-' . $_POST['month'] . '-' . '31';
        }

        $where = "thedate BETWEEN '" . $fromdate . "' and '" . $todate . "'";
        $getNum = $this->model->get_num_where('journal', $where);
        $data['total_rows'] = $getNum;
        $data['fromdate'] = $fromdate;
        $data['todate'] = $todate;
         $data['style']      =  $this->style;
        $data['title'] = $this->lang->line('income_statement');

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
        $data['tree_account'] = $this->model->get('tree_account');
        $data['type1'] = $this->model->get_where('tree_account', 'type_id = 1');
        $data['type2'] = $this->model->get_where('tree_account', 'type_id = 2');
        $data['type3'] = $this->model->get_where('tree_account', 'type_id = 3');
        $data['type4'] = $this->model->get_where('tree_account', 'type_id = 4');
	
		$this->load->view('report/incomeStatement_view',$data);
    }

//-----------------------------------------------------------------------------------------
    public function view_form_lp_account() {
        if (isset($_POST['fromdate']) and isset($_POST['todate'])) {
            $fromdate = $_POST['fromdate'];
            $todate = $_POST['todate'];
        } else {
            $fromdate = ($this->uri->segment(3)) ? $this->uri->segment(3) : $fromdate = date("Y-01-01");
            $todate = ($this->uri->segment(4)) ? $this->uri->segment(4) : $todate = date("Y-m-d");
        }

        if (isset($_POST['month']) and isset($_POST['year'])) {
            $fromdate = $_POST['year'] . '-' . $_POST['month'] . '-' . '01';
            $todate = $_POST['year'] . '-' . $_POST['month'] . '-' . '31';
        }

        $where = "thedate BETWEEN '" . $fromdate . "' and '" . $todate . "'";
        $getNum = $this->model->get_num_where('journal', $where);
        $data['total_rows'] = $getNum;
        $data['fromdate'] = $fromdate;
        $data['todate'] = $todate;
         $data['style']      =  $this->style;
        $data['title'] = $this->lang->line('income_statement');

        $data['tree_account'] = $this->model->get('tree_account');
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
        $data['type1'] = $this->model->get_where('tree_account', 'type_id = 1');
        $data['type2'] = $this->model->get_where('tree_account', 'type_id = 2');
        $data['type3'] = $this->model->get_where('tree_account', 'type_id = 3');
        $data['type4'] = $this->model->get_where('tree_account', 'type_id = 4');

		$this->load->view('inc/head', $data);
        $this->load->view('inc/financeDep/'.$this->style.'/header',$this->data_header);
        $this->load->view('report/menu_report');
		$this->load->view('report/view_form_lp_account',$data);
		$this->load->view('report/view_lp_account',$data);
        $this->load->view('inc/financeDep/'.$this->style.'/footer',$this->data_footer);
    }

//-----------------------------------------------------------------------------------------
    public function view_lp_account() {
        if (isset($_POST['fromdate']) and isset($_POST['todate'])) {
            $fromdate = $_POST['fromdate'];
            $todate = $_POST['todate'];
        } else {
            $fromdate = ($this->uri->segment(3)) ? $this->uri->segment(3) : $fromdate = date("Y-01-01");
            $todate = ($this->uri->segment(4)) ? $this->uri->segment(4) : $todate = date("Y-m-d");
        }

        if (isset($_POST['month']) and isset($_POST['year'])) {
            $fromdate = $_POST['year'] . '-' . $_POST['month'] . '-' . '01';
            $todate = $_POST['year'] . '-' . $_POST['month'] . '-' . '31';
        }

        $where = "thedate BETWEEN '" . $fromdate . "' and '" . $todate . "'";
        $getNum = $this->model->get_num_where('journal', $where);
        $data['total_rows'] = $getNum;
        $data['fromdate'] = $fromdate;
        $data['todate'] = $todate;
         $data['style']      =  $this->style;
        $data['title'] = $this->lang->line('income_statement');

        $data['tree_account'] = $this->model->get('tree_account');
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
        $data['type1'] = $this->model->get_where('tree_account', 'type_id = 1');
        $data['type2'] = $this->model->get_where('tree_account', 'type_id = 2');
        $data['type3'] = $this->model->get_where('tree_account', 'type_id = 3');
        $data['type4'] = $this->model->get_where('tree_account', 'type_id = 4');

		$this->load->view('report/view_lp_account',$data);
    }

//-----------------------------------------------------------------------------------------
    public function reports_tree() {
         $data['style']      =  $this->style;
        $data['title'] = $this->lang->line('reports_tree');
        $data['records'] = $this->model->get('tree_report');
		
		$this->load->view('inc/head', $data);
        $this->load->view('inc/financeDep/'.$this->style.'/header',$this->data_header);
        $this->load->view('report/menu_report');
		$this->load->view('report/reports_tree',$data);
        $this->load->view('inc/financeDep/'.$this->style.'/footer',$this->data_footer);
    }

//-----------------------------------------------------------------------------------------
    public function report_view() {
         $data['style']      =  $this->style;
        $data['title'] = $this->lang->line('reports_tree');
        $id = $this->uri->segment(3);
        $data['title_view'] = $this->model->get_where('tree_report', 'reportno = ' . $id);
        $data['report_details'] = $this->model->get_where('report_details', 'reportno = ' . $id);
        $data['report'] = $this->model->get('report');

        $data['records'] = $this->model->get('tree_report');
		$this->load->view('inc/head', $data);
        $this->load->view('inc/financeDep/'.$this->style.'/header',$this->data_header);
        $this->load->view('report/menu_report');
		$this->load->view('report/report_view',$data);
        $this->load->view('inc/financeDep/'.$this->style.'/footer',$this->data_footer);
    }
//-----------------------------------------------------------------------------------------
    public function trialBalance_printed() {
         if (isset($_POST['fromdate']) and isset($_POST['todate'])) {
            $fromdate = $_POST['fromdate'];
            $todate = $_POST['todate'];
        } else {
            $fromdate = ($this->uri->segment(3)) ? $this->uri->segment(3) : $fromdate = date("Y-01-01");
            $todate = ($this->uri->segment(4)) ? $this->uri->segment(4) : $todate = date("Y-m-d");
        }

        if (isset($_POST['month']) and isset($_POST['year'])) {
            $fromdate = $_POST['year'] . '-' . $_POST['month'] . '-' . '01';
            $todate = $_POST['year'] . '-' . $_POST['month'] . '-' . '31';
        }

        $data['fromdate'] = $fromdate;
        $data['todate'] = $todate;
         $data['style']      =  $this->style;
        $data['title'] = $this->lang->line('trialBalance');

        $where = "thedate BETWEEN '" . $fromdate . "' and '" . $todate . "'";
        $getNum = $this->model->get_num_where('journal', $where);
        $data['total_rows'] = $getNum;
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
        $data['tree_account'] = $this->model->get('tree_account');
		
		$this->load->view('report/trialBalance_printed',$data);
    }
	
//-----------------------------------------------------------------------------------------
    public function printed() {
         if (isset($_POST['fromdate']) and isset($_POST['todate'])) {
            $fromdate = $_POST['fromdate'];
            $todate   = $_POST['todate'];
        } else {
            $fromdate = ($this->uri->segment(3)) ? $this->uri->segment(3) : $fromdate = date("Y-01-01");
            $todate = ($this->uri->segment(4)) ? $this->uri->segment(4) : $todate = date("Y-m-d");
        }
		 if (isset($_POST['month']) and isset($_POST['year'])) {
            $fromdate = $_POST['year'] . '-' . $_POST['month'] . '-' . '01';
            $todate = $_POST['year'] . '-' . $_POST['month'] . '-' . '31';
        }
		
      
		$where = "thedate BETWEEN '" . $fromdate . "' and '" . $todate . "'";
        $getNum = $this->model->get_num_where('journal', $where);
        $data['total_rows']      = $getNum;
        $data['fromdate']        = $fromdate;
        $data['todate']          = $todate;
        $data['style']           =  $this->style;
        $data['title']           = $this->lang->line('journal');
        $data['journal']         = $this->model->get_where_order('journal', $where,'thedate','');
        $data['journal_details'] = $this->model->get('journal_details');
        $data['tree_account']    = $this->model->get('tree_account');

	//	$this->load->view('inc/head', $data);
      //  $this->load->view('inc/financeDep/'.$this->style.'/header',$this->data_header);
        //$this->load->view('report/menu_report');
		//$this->load->view('report/view_form_journal',$data);
		$this->load->view('report/printed',$data);
        $this->load->view('inc/financeDep/'.$this->style.'/footer',$this->data_footer);
    }
	//-----------------------------------------------------------------------------------------
    public function printed_entry() {
          if (isset($_POST['entry_f']) and isset($_POST['entry_t'])) {
            $entry_f = $_POST['entry_f'];
            $entry_t = $_POST['entry_t'];
        } else {
            $entry_f = ($this->uri->segment(3)) ? $this->uri->segment(3) : $entry_f =1;
            $entry_t = ($this->uri->segment(4)) ? $this->uri->segment(4) : $entry_t = 2;
        }
      
		$where = "id BETWEEN '" . $entry_f . "' and '" . $entry_t . "'";
        $getNum = $this->model->get_num_where('journal', $where);
        $data['total_rows']      = $getNum;
        $data['entry_f']         = $entry_f;
        $data['entry_t']         = $entry_t;
        $data['style']           =  $this->style;
        $data['title']           = $this->lang->line('journal');
        $data['journal']         = $this->model->get_where_order('journal', $where,'id','');
        $data['journal_details'] = $this->model->get('journal_details');
        $data['tree_account']    = $this->model->get('tree_account');

		$this->load->view('report/printed_entry',$data);
        $this->load->view('inc/financeDep/'.$this->style.'/footer',$this->data_footer);
    }
//-----------------------------------------------------------------------------------------
    public function printed_one() {
        
        $id = $this->uri->segment(3);
        $data['id']      = $id;
		$where = 'id =' . $id;
		$data['total_rows']      = 1;
        $data['style']           =  $this->style;
        $data['title']           = $this->lang->line('journal');
        $data['journal']         = $this->model->get_where('journal', $where);
        $data['journal_details'] = $this->model->get('journal_details');
        $data['tree_account']    = $this->model->get('tree_account');

	//	$this->load->view('inc/head', $data);
      //  $this->load->view('inc/financeDep/'.$this->style.'/header',$this->data_header);
        //$this->load->view('report/menu_report');
		//$this->load->view('report/view_form_journal',$data);
		$this->load->view('report/printed_one',$data);
        $this->load->view('inc/financeDep/'.$this->style.'/footer',$this->data_footer);
    }
//-----------------------------------------------------------------------------------------
}
