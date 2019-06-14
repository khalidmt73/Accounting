<?php
class LinkCourse extends CI_Controller {

	public $name = 'linkCourse';

    function __construct() {
        parent::__construct();
		
	  }
//----------------------------------------------------------------------------------
    public function index() {
		
		$get_num = $this->model->get_num('linkCourse');
		$limit = ($this->uri->segment(3)) ? $this->uri->segment(3) :10;
        $data['total_rows']  = $get_num;
        $data['title'] = $this->lang->line($this->name);
		$data['style']      =  $this->style;
		$data['limit'] = $limit;
		$offset = $this->uri->segment(4,1);
		$start = $this->mpages->mulitiPages($offset,$get_num ,$limit);
	    $data['start']=$start;

		$data['linkCourse']=$this->model->join_rl_limit_orderBy(
		'
		linkCourse.idLinkCourse,
		linkCourse.series,
		
		linkCourse.fromdate,
		linkCourse.todate,
		
		calendar.year,
		calendar.semester,
		
		course.idCourse,
		course.course,
		',
		'course,calendar', 
		'linkCourse',
		'linkCourse.id_course   = course.idCourse 
		 ' ,
		"RIGHT",$limit,$start ,"idLinkCourse", "ASC");

        $data['pages'] = $this->mpages->pagesPrint(base_url($this->name.'/index/'.$limit."/"));
		
		$this->load->view('inc/head', $data);
        $this->load->view('inc/traineeDep/'.$this->style.'/header',$this->data_header);
        $this->load->view('setup/menu');
        $this->load->view('setup/'.$this->name.'/index',$data);
        $this->load->view('inc/traineeDep/'.$this->style.'/footer',$this->data_footer);

    }
//--------------------------------------------------------------------------------------
    public function add() {
        $data['style']      =  $this->style;
        $data['title'] = $this->lang->line('add');
		if ($this->uri->segment(4) == 'add') {
           echo $id = $this->uri->segment(3);
		$where = "linkcourse.idLinkCourse = " . $id;
		$data['oneRecord']=$this->model->join_where_orderBy(
		'
		linkcourse.idLinkCourse ,
		linkcourse.series ,
		linkcourse.id_course ,
		linkcourse.fromdate ,
		linkcourse.todate ,

		course.idCourse,
		course.course 
		',
		$this->name,
		'course',
		'linkcourse.id_course = course.idCourse',
		$where,"idLinkCourse", "DESC");
        } else { $id = 0;}

		$data['linkCourse'] = $this->model->join_rl_orderBy(
		'
		linkcourse.idLinkCourse ,
		linkcourse.id_course ,
		linkcourse.series ,

		course.idCourse,
		course.course 
		',
		'course',
		'linkcourse',
		'linkcourse.id_course = course.idCourse',
		"RIGHT","idLinkCourse", "ASC");
		$data['course']    = $this->model->get('course');
		$this->load->view('inc/head', $data);
        $this->load->view('inc/traineeDep/'.$this->style.'/header',$this->data_header);
        $this->load->view('setup/menu');
		$this->load->view('setup/'.$this->name.'/add',$data);
        $this->load->view('inc/traineeDep/'.$this->style.'/footer',$this->data_footer);
    }
//---------------------------------------------------------------------------------
    public function get_textbook() {
		$data['style']      =  $this->style;
        $data['title'] = $this->lang->line('add');
		$data['course']    = $this->model->get('course');
		$this->load->view('inc/head', $data);
        $this->load->view('inc/traineeDep/'.$this->style.'/header',$this->data_header);
        $this->load->view('setup/menu');
		$this->load->view('setup/'.$this->name.'/get_textbook',$data);
        $this->load->view('inc/traineeDep/'.$this->style.'/footer',$this->data_footer);

	}
//---------------------------------------------------------------------------------
    public function getDivision() {
		$get               =  $_POST['value'];
		$where             = "id_course = " . $get;
		$data['course']    = $this->model->get('course');
	    $division  = $this->model->get_where('division',$where);
		$js = 'id_division onChange="ajaxDivision(this.value,`classroom`,`linkTextbook/getClassroom`);"';
		$drop2['0'] =$this->lang->line("division1");
			foreach($division as $val2){
				$drop2[$val2->id] = $val2->number;
			}
			echo form_dropdown('id_division',$drop2,'0',$js . 'class="form-control" style="width:50%;margin-bottom:10px;"');
		 }

//------------------------------------------------------------------------------------
    public function search() {
		 if (isset($_POST['search'])) {
            $search           = trim($_POST['search']);
		 }
		  if (is_numeric($search)) {
            $where           = "number = " . $search;
        } else {
            $where           = "location LIKE '%$search%'";
        }
        $get_num             = $this->model->get_num($this->name);
        $data['total_rows']  = $get_num;
        $data['title']       = $this->lang->line($this->name);
		$data['style']       =  $this->style;
		$data['limit']       = 1;
		$data['offset']      = 1;
	
        $data[$this->name]   = $this->model->get_where($this->name, $where);	
        $this->load->view($this->name.'/search',$data);
	}
//-----------------------------------------------------------------------------------
    public function create() {
		$data['id_Course']    = $_POST['idCourse'];
        $data['fromdate']     = $_POST['fromdate'];
        $data['todate']       = $_POST['todate'];
		$where                = 'id_Course = '.$data['id_Course'];
        $series               = $this->model->get_num_where($this->name,$where);
	  	$data['series']       = $series + 1;

        $this->model->create($this->name, $data);
		$id = $this->db->insert_id();

        $data['title']  = $this->lang->line('add_msg');
        $data['style']  =  $this->style;
			
		$this->load->view('inc/head', $data);
        $this->load->view('inc/traineeDep/'.$this->style.'/header',$this->data_header);
		$data['msg'] = '<div class="msg_create">' . $data['title'] . '</div>';
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
        $this->load->view('inc/traineeDep/'.$this->style.'/footer',$this->data_footer);
    }
//--------------------------------------------------------------------------------------
    public function edit($id) {
        $data['title']  = $this->lang->line('edit');
        $data['style']  =  $this->style;
		$data['id']     =$id;
	    $data['course'] = $this->model->get('course');
		$where = "linkTextbook.idLinktextBook = " . $id;
		$data['record']=$this->model->join_where_orderBy(
		'
		linkTextbook.idLinktextBook ,
		linkTextbook.id_course ,
		linkTextbook.fromdate ,
		linkTextbook.todate ,
		course.idCourse,
		course.course ,
		course.division ,
		',
		$this->name,
		'course',
		'linkTextbook.id_course = course.idCourse',
		$where,"idLinktextBook", "DESC");
		$this->load->view('inc/head', $data);
        $this->load->view('inc/traineeDep/'.$this->style.'/header',$this->data_header);
        $this->load->view($this->name.'/menu',$data);
		$this->load->view($this->name.'/edit',$data);
        $this->load->view('inc/traineeDep/'.$this->style.'/footer',$this->data_footer);

    }
//-------------------------------------------------------------------------------------
    public function update($id) {
		$course    = $_POST['idLinkCourse'];
		$course = explode('-',$course);
		$data['idLinkCourse']    = $course[0];
		$data['division']     = $course[1];
        $data['fromdate']     = $_POST['fromdate'];
        $data['todate']       = $_POST['todate'];
        $this->model->update($this->name, $data, 'id', $id);
        
		$data['title'] = $this->lang->line('update_msg');
        $data['style']      =  $this->style;

		$this->load->view('inc/head', $data);
        $this->load->view('inc/traineeDep/'.$this->style.'/header',$this->data_header);
        $data['msg'] = '<div class="msg_update">' . $data['title'] . '</div>';
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
        $this->load->view('inc/traineeDep/'.$this->style.'/footer',$this->data_footer);
    		
	}
//------------------------------------------------------------------------------------
    public function delet($id) {
        $this->model->delet($this->name, 'id', $id);
        $data['title'] = $this->lang->line($this->name);
		$data['style']      =  $this->style;
        
        $this->load->view('inc/head', $data);
        $this->load->view('inc/traineeDep/'.$this->style.'/header',$this->data_header);
        $data['msg'] = '<div class="msg_delet">' . $data['title'] . '</div>';
        $this->load->view('home/msg', $data);
        ?>
        <script langauge="javascript" type="text/javascript">
            <!--
                    function goback()
            {
                location = "<?php echo base_url($this->name.'/index'); ?>";
            }
            setTimeout('goback()', 1500);
            //-->
        </script>
        <?php
        $this->load->view('inc/traineeDep/'.$this->style.'/footer',$this->data_footer);
    }
 //------------------------------------------------------------------------------------
   public function array_delet() {
        
		if(isset($_POST['delet']) AND $_POST['delet'] != null){

		$id_delet = $_POST['delet'];
			foreach($id_delet as $id){
			$this->model->delet($this->name, 'id', $id);
			}        
				$data['title'] = $this->lang->line('delet_msg');
			}
		else{
		        $data['title'] = $this->lang->line('nothing_msg');
		
		}
		
		$data['style']      =  $this->style;
        
        $this->load->view('inc/head', $data);
        $this->load->view('inc/traineeDep/'.$this->style.'/header',$this->data_header);
        $data['msg'] = '<div class="msg_delet">' . $data['title'] . '</div>';
        $this->load->view('home/msg', $data);
        ?>
        <script langauge="javascript" type="text/javascript">
            <!--
                    function goback()
            {
                location = "<?php echo base_url($this->name.'/index'); ?>";
            }
            setTimeout('goback()', 1500);
            //-->
        </script>
        <?php
        $this->load->view('inc/traineeDep/'.$this->style.'/footer',$this->data_footer);
    }
//-------------------------------------------------------------------------------------
}