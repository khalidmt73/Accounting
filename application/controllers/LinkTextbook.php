<?php
class LinkTextbook extends CI_Controller {

	public $name = 'linkTextbook';

    function __construct() {
        parent::__construct();
		
	  }
//----------------------------------------------------------------------------------
    public function textbook() {
		$get               =  $_POST['value'];
	    $id_linkCourse   = explode('-',$get);
		$getIdlinkCourse = $id_linkCourse[0];
		$get_num = $this->model->get_num('linkTextbook');
		$limit = ($this->uri->segment(3)) ? $this->uri->segment(3) :10;
        $data['total_rows']  = $get_num;
        $data['title'] = $this->lang->line($this->name);
		$data['style']      =  $this->style;
		$data['limit'] = $limit;
		$offset = $this->uri->segment(4,1);
		$start = $this->mpages->mulitiPages($offset,$get_num ,$limit);
	    $data['start']=$start;
		$where = ' linktextbook.id_linkCourse = '.$getIdlinkCourse; 

		
		$data['linkTextbook']=$this->model->join_rl_where_limit_orderBy(
		'
		 linkTextbook.idLinktextBook,
		 linkTextbook.id_linkCourse,
		 linkTextbook.lectureNo,
		 linkTextbook.fromTime,
		 linkTextbook.toTime,
		
		 linkCourse.idLinkCourse,
		 linkCourse.fromdate,
		 linkCourse.todate,
		 
		 textbook.idTextbook,
		 textbook.textbook,
		 
		 trainer.nameTrainer,

		 division.idDivision,

		 course.idCourse,
		 course.course
		',
		'linkCourse,course,textbook,division,trainer', 
		'linkTextbook',
		'
		 linkcourse.idLinkCourse = linktextbook.id_linkCourse 
		 and linkTextbook.id_division   = division.idDivision 
		 and  division.id_textbook = textbook.idTextbook 
		 and  division.id_course   = course.idCourse 
		 and  linkTextbook.id_trainer    = trainer.idTrainer 
		' ,
		"RIGHT",$where,$limit,$start ,"idLinkCourse", "ASC");
        $data['pages'] = $this->mpages->pagesPrint(base_url($this->name.'/index/'.$limit."/"));
		
        $this->load->view('setup/'.$this->name.'/textbook',$data);
    }
//----------------------------------------------------------------------------------
    public function course() {
		$get               =  $_POST['value'];
	    $id_course   = explode('-',$get);
		$getIdCourse = $id_course[0];
		$get_num = $this->model->get_num('linkTextbook');
		$limit = ($this->uri->segment(3)) ? $this->uri->segment(3) :10;
        $data['total_rows']  = $get_num;
        $data['title'] = $this->lang->line($this->name);
		$data['style']      =  $this->style;
		$data['limit'] = $limit;
		$offset = $this->uri->segment(4,1);
		$start = $this->mpages->mulitiPages($offset,$get_num ,$limit);
	    $data['start']=$start;
		$where = ' course.idCourse = '.$getIdCourse; 

		$data['linkTextbook']=$this->model->join_rl_where_limit_orderBy(
		'
		linkTextbook.idLinktextBook,
		linkTextbook.lectureNo,
		linkTextbook.fromdate,
		linkTextbook.todate,

		division.idDivision,
		division.id_textbook,
		division.id_course,
		
		textbook.idTextbook ,
		textbook.textbook,
		textbook.code,
			
		trainer.nameTrainer,
		trainer.idTrainer,

		course.idCourse,
		course.course,
		',
		'course,textbook,trainer,division', 
		'linkTextbook',
		'     linkTextbook.id_division   = division.idDivision 
		 and  division.id_textbook = textbook.idTextbook 
		 and  division.id_course   = course.idCourse 
		 and  linkTextbook.id_trainer    = trainer.idTrainer' ,
		"RIGHT",$where,$limit,$start ,"idDivision", "ASC");

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
		$where = "linkTextbook.idLinktextBook = " . $id;
		$data['oneRecord']=$this->model->join_rl_where_orderBy(
		'
		linkTextbook.idLinktextBook,
		linkTextbook.lectureNo,

		division.idDivision,
		division.id_textbook,
		division.id_course,
		
		textbook.idTextbook ,
		textbook.textbook,
		textbook.code,
			
		trainer.nameTrainer,
		trainer.idTrainer,

		course.idCourse,
		course.course,
		',
		'course,textbook,trainer,division', 
		'linkTextbook',
		'     linkTextbook.id_division   = division.idDivision 
		 and  division.id_textbook = textbook.idTextbook 
		 and  division.id_course   = course.idCourse 
		 and  linkTextbook.id_trainer    = trainer.idTrainer' ,
		"RIGHT",$where,"idDivision", "ASC");
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
		
		$data['division']=$this->model->join_orderBy(
		'
		division.idDivision,
		division.id_textbook,
		division.id_course,
		
		textbook.idTextbook ,
		textbook.textbook,
		textbook.code,
	
		course.idCourse,
		course.course,
		',
		'course,textbook', 
		'division',
		'division.id_textbook =  textbook.idTextbook 
		and  division.id_course = course.idCourse ' ,
		"idDivision", "ASC");		

	    $data['trainer'] = $this->model->get('trainer');
	    $data['classroom'] = $this->model->get('classroom');
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
		
		$data['linkCourse']=$this->model->join_rl_orderBy(
		'
		linkCourse.idLinkCourse,
		linkCourse.series,
		linkCourse.fromdate,
		linkCourse.todate,

		course.idCourse,
		course.course,
		',
		'course', 
		'linkCourse',
		'linkCourse.id_course   = course.idCourse 
		 ' ,
		"RIGHT","idLinkCourse", "ASC");
	    $data['calendar'] = $this->model->get('calendar');
		$this->load->view('inc/head', $data);
        $this->load->view('inc/traineeDep/'.$this->style.'/header',$this->data_header);
        $this->load->view('setup/menu');
		$this->load->view('setup/'.$this->name.'/get_textbook',$data);
        $this->load->view('inc/traineeDep/'.$this->style.'/footer',$this->data_footer);

	}
//---------------------------------------------------------------------------------
    public function getDivision() {
		$get               =  $_POST['value'];
		//echo $get;exit;
		$where             = "linkCourse.idLinkCourse = " . $get;
		$division = $this->model->join_where_orderBy(
		'
		division.idDivision,
		division.id_textbook,
		division.id_course,
		
		textbook.idTextbook ,
		textbook.textbook,
		textbook.code,
	
		course.idCourse,
		course.course
		',
		'course,textbook,linkCourse', 
		'division',
		'division.id_textbook =  textbook.idTextbook 
		and linkCourse.id_course = course.idCourse
		and  division.id_course = course.idCourse ' ,
		$where,"idDivision", "ASC");		
		
		$drop1['0'] =$this->lang->line("textbook1");
				foreach($division as $val1){
				$drop1[$val1->idDivision] = $val1->course.'-'.$val1->idDivision.' '.$val1->textbook;
				}
				echo form_dropdown('id_division',$drop1,'0','class="form-control" style="width:50%;margin-bottom:10px;"');
	
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
//-------------------------------------------------------------------------------------
    public function create() {
		$data['id_division']  = $_POST['id_division'];
		$data['id_trainer']   = $_POST['id_trainer'];
        $data['id_classroom'] = $_POST['id_classroom'];
		$data['id_linkCourse']= $_POST['idLinkCourse'];
		$data['lectureNo']    = $_POST['lectureNo'];
		$day = implode('-',$_POST['day']);
		$data['day']    = $day;

		$data['fromTime']     =
		$_POST['fromH'].':'.$_POST['fromM'].':'.$_POST['fromPAM'];
	    $data['toTime']       = 
		$_POST['toH'].':'.$_POST['toM'].':'.$_POST['toPAM'];

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
		$data['record']=$this->model->join_rl_where_orderBy(
		'
		linkTextbook.idLinktextBook,
		linkTextbook.id_linkCourse,
		linkTextbook.day,
		linkTextbook.fromTime,
		linkTextbook.toTime,
		linkTextbook.lectureNo,

		division.idDivision,
		division.id_textbook,
		division.id_course,
		
		textbook.idTextbook ,
		textbook.textbook,
		textbook.code,
			
		trainer.nameTrainer,
		trainer.idTrainer,

		course.idCourse,
		course.course,
		classroom.idClassroom,
		classroom.number
		',
		'course,textbook,trainer,division,classroom', 
		'linkTextbook',
		'     linkTextbook.id_division = division.idDivision 
		 and  division.id_textbook     = textbook.idTextbook 
		 and  division.id_course       = course.idCourse 
		 and  classroom.idClassroom    = linkTextbook.id_classroom 
		 and  linkTextbook.id_trainer  = trainer.idTrainer' ,
		"RIGHT",$where,"idDivision", "ASC");
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
		
		$data['division']=$this->model->join_orderBy(
		'
		division.idDivision,
		division.id_textbook,
		division.id_course,
		
		textbook.idTextbook ,
		textbook.textbook,
		textbook.code,
	
		course.idCourse,
		course.course,
		',
		'course,textbook', 
		'division',
		'division.id_textbook =  textbook.idTextbook 
		and  division.id_course = course.idCourse ' ,
		"idDivision", "ASC");		
		  $data['trainer'] = $this->model->get('trainer');
	    $data['classroom'] = $this->model->get('classroom');
		$this->load->view('inc/head', $data);
        $this->load->view('inc/traineeDep/'.$this->style.'/header',$this->data_header);
        $this->load->view('setup/menu',$data);
		$this->load->view('setup/'.$this->name.'/edit',$data);
        $this->load->view('inc/traineeDep/'.$this->style.'/footer',$this->data_footer);

    }
//-------------------------------------------------------------------------------------
    public function update($id) {
		$data['id_division']  = $_POST['id_division'];
		$data['id_trainer']   = $_POST['id_trainer'];
        $data['id_classroom'] = $_POST['id_classroom'];
		$data['id_linkCourse']= $_POST['idLinkCourse'];
		$data['lectureNo']    = $_POST['lectureNo'];
		$day = implode('-',$_POST['day']);
		$data['day']    = $day;
		$data['fromTime']     =
		$_POST['fromH'].':'.$_POST['fromM'].':'.$_POST['fromPAM'];
	    $data['toTime']       = 
		$_POST['toH'].':'.$_POST['toM'].':'.$_POST['toPAM'];
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
    public function delet($idLinktextBook) {
        $this->model->delet($this->name, 'idLinktextBook', $idLinktextBook);
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
   public function array_delet($idLinktextBook) {
        
		if(isset($_POST['delet']) AND $_POST['delet'] != null){

		$id_delet = $_POST['delet'];
			foreach($id_delet as $idLinktextBook){
			$this->model->delet($this->name, 'idLinktextBook', $idLinktextBook);
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