<?php
class Lists extends CI_Controller {
	
	public $name = 'lists';

    function __construct() {
        parent::__construct();
		
	  }
//-----------------------------------------------------------------------------------------
    public function index() {
       
        $data['title'] = $this->lang->line($this->name);
		$data['style']      =  $this->style;
		
		$data['year']    = $this->datehijry->g2h(date("d/m/Y",time()),"yy");
	    $data['course']  = $this->model->get('course');
	    $data['trainer'] = $this->model->get('trainer');
		$data['linktextbook']=$this->model->join_rl_orderBy(
		'
		linktextbook.idLinktextbook,
		linktextbook.id_trainer,
		linktextbook.id_division,
		linktextbook.id_linkCourse,
		
	
		trainer.idTrainer,
		trainer.nameTrainer,
		',
		'trainer', 
		'linktextbook',
		'linktextbook.id_trainer   = trainer.idTrainer
		 ' ,
		"RIGHT","idLinktextbook", "ASC");
   	    $data['calendar'] = $this->model->get('calendar');
		$this->load->view('inc/head', $data);
        $this->load->view('inc/traineeDep/'.$this->style.'/header',$this->data_header);
        $this->load->view($this->name.'/menu');
        $this->load->view($this->name.'/lists',$data);
        $this->load->view('inc/traineeDep/'.$this->style.'/footer',$this->data_footer);
    }
//-------------------------------------------------------------------------------------
    public function coursesList() {
       
        $data['title'] = $this->lang->line($this->name);
		$data['style']      =  $this->style;
		
		$data['year']    = $this->datehijry->g2h(date("d/m/Y",time()),"yy");
	   
   		$data['hijri']       = 	$this->datehijry->g2h(date("d/m/Y",time()));
		$data['calendar'] = $this->model->get('calendar');

		$this->load->view('inc/head', $data);
        $this->load->view('inc/traineeDep/'.$this->style.'/header',$this->data_header);
        $this->load->view($this->name.'/menu');
        $this->load->view($this->name.'/coursesList',$data);
        $this->load->view('inc/traineeDep/'.$this->style.'/footer',$this->data_footer);
    }
//-------------------------------------------------------------------------------------
    public function present() {
	    
        $data['title'] = $this->lang->line($this->name);
		$data['style']      =  $this->style;
		$data['year'] = $this->datehijry->g2h(date("d/m/Y",time()),"yy");
	    $data['course']=$this->model->get('course');
	    $data['trainer']=$this->model->get('trainer');
		
		 $data['textbook_linkin']=$this->model->join_orderBy(
		'
		trainer.id as idtrainer,
		trainer.name as name,
		
		textbook.id as idtextbook,
		textbook.textbook as textbook,
		
		textbook_linkin.id as id,
		textbook_linkin.id_course as id_course,
		textbook_linkin.id_textbook as id_textbook,
		textbook_linkin.id_trainer as id_trainer,
		textbook_linkin.division as division,
		',
		'trainer,textbook',
		'textbook_linkin',
		'textbook_linkin.id_trainer =  trainer.id and textbook_linkin.id_textbook = textbook.id',
		"id", "DESC");
		$this->load->view('inc/head', $data);
        $this->load->view('inc/traineeDep/'.$this->style.'/header',$this->data_header);
        $this->load->view($this->name.'/menu');
        $this->load->view($this->name.'/present',$data);
        $this->load->view('inc/traineeDep/'.$this->style.'/footer',$this->data_footer);
    }
//-----------------------------------------------------------------------------------------
    public function mark() {
	    
        $data['title'] = $this->lang->line($this->name);
		$data['style']      =  $this->style;
		$data['year'] = $this->datehijry->g2h(date("d/m/Y",time()),"yy");
	    $data['course']=$this->model->get('course');
	    $data['trainer']=$this->model->get('trainer');
		$data['textbook_linkin']=$this->model->join_orderBy(
		'
		trainer.id as idtrainer,
		trainer.name as name,
		
		textbook.id as idtextbook,
		textbook.textbook as textbook,
		
		textbook_linkin.id as id,
		textbook_linkin.id_course as id_course,
		textbook_linkin.id_textbook as id_textbook,
		textbook_linkin.id_trainer as id_trainer,
		textbook_linkin.division as division,
		',
		'trainer,textbook',
		'textbook_linkin',
		'textbook_linkin.id_trainer =  trainer.id and textbook_linkin.id_textbook = textbook.id',
		"id", "DESC");
		$this->load->view('inc/head', $data);
        $this->load->view('inc/traineeDep/'.$this->style.'/header',$this->data_header);
        $this->load->view($this->name.'/menu');
        $this->load->view($this->name.'/mark',$data);
        $this->load->view('inc/traineeDep/'.$this->style.'/footer',$this->data_footer);
    }
//------------------------------------------------------------------------------------
    public function get_list() {
		$value = $_POST['value'];
		$valuem = explode('-',$value);
	    $where = 'linktextbook.id_division = '.$valuem[0];
		//.' and '.$valuem[3]
		//echo $where;exit;
		
		$data['trainee']=$this->model->query('SELECT register.academicNo, linktextbook.id_division, register.id_card, trainee.name, register.id_linkCourse
		FROM trainee INNER JOIN (linktextbook INNER JOIN register ON linktextbook.id_linkCourse = register.id_linkCourse) ON trainee.idCard = register.id_card
		WHERE '.$where.'
		ORDER BY register.academicNo DESC;
		');
     	//$data['trainee']=$this->model->get_where('trainee',$where);
        $this->load->view($this->name.'/get_list',$data);
	}
	
//------------------------------------------------------------------------------------
    public function get_courses() {
		$value        = $_POST['value'];
		$valuem       = explode('|',$value);
		//print_r($value);exit;	
		$type         = $valuem[0];
		$idCalendar   = $valuem[1];
		$where        = "linkCourse.id_calendar = ".$idCalendar." and linkCourse.type = ".$type;
		
		$data['type']         = $valuem[0];
		$data['idCalendar']   = $valuem[1];
		//print_r($where);exit;
		if($type == 1){
		$data['linkCourse']=$this->model->join_rl_where_orderBy(
		'
		linkCourse.idLinkCourse ,
		linkCourse.id_course ,
		linkCourse.fromdate,
		linkCourse.todate,
		linkCourse.type,
		
		trainer.idTrainer,
		trainer.nameTrainer,

		course.amount,

		course.idCourse,
		course.course,
		course.target,
		course.amount,
		',
		'course,trainer,linktextbook',
		'linkCourse',
		'linkCourse.id_course = course.idCourse 
		 and linkCourse.idLinkCourse = linkTextbook.id_linkCourse
		 and linkTextbook.id_trainer = trainer.idTrainer
		',
		'RIGHT',$where,"idlinkCourse", "DESC");
		}
        if($type == 2){
		$data['linkCourse']=$this->model->join_rl_where_orderBy(
		'
		linkCourse.idLinkCourse ,
		linkCourse.id_course ,
		linkCourse.fromdate,
		linkCourse.todate,
		linkCourse.type,
		
		course.idCourse,
		course.course,
		course.target,
		course.amount,
		',
		'course',
		'linkCourse',
		'linkCourse.id_course = course.idCourse 
		',
		'RIGHT',$where,"idlinkCourse", "DESC");
		}

        $this->load->view($this->name.'/get_courses',$data);
	}
//------------------------------------------------------------------------------------
    public function get_present() {
		$value = $_POST['value'];
		//print_r($value);exit;
		$valuem = explode('-',$value);
		//print_r($value);exit;	
		$v = explode('/',$valuem[0]);
		
		$where =' id_textbook = '.$v[3];	
        $textbook = $this->model->get_where('textbook_linkin', $where);	
		foreach ($textbook as $value);
		$data['lectureNo']= $value->lectureNo;

		$where2 = 'trainee.division = '.$v[1].' and trainee.year = '.$valuem[1].' and trainee.semester = '.$valuem[2].' and trainer.id = '.$v[2];
		
		//$data['present']  = $this->model->get('present');	
		
		$data['present']= $this->model->join_rl_where_orderBy(
		'
		trainee.id as id_trainee,
		trainee.name as name,
		trainee.academicNo as academicNo,
		
		textbook_linkin.id as id,

		present.id as id_present,
		present.presence as presence,
		present.academicNo as academicNo_p,
		present.lectureNo as lectureNo,
		present.id_trainer as id_trainer,
		
		trainer.id as idtrainer,
		',
		'trainee,trainer,present',
		' textbook_linkin',
		' trainer.id =  textbook_linkin.id_trainer and trainee.academicNo = present.academicNo and present.id_trainer = trainer.id',
		'RIGHT',$where2,"id", "DESC");	

		$data['trainee']= $this->model->join_rl_where_orderBy(
		'
		trainee.id as id_trainee,
		trainee.name as name,
		trainee.academicNo as academicNo,
		
		 textbook_linkin.id as id,
		
		trainer.id as idtrainer,
		',
		'trainee,trainer',
		' textbook_linkin',
		' trainer.id =  textbook_linkin.id_trainer',
		'RIGHT',$where2,"id", "DESC");	

		
 		//$data['id_course'] = $valuem[0];
		$data['year']      = $valuem[1];
        $data['semester']  = $valuem[2];
		$data['id_trainer']  = $v[2];	
		$data['division']    = $v[1];
		$data['id_textbook']    = $v[3];
		$this->load->view($this->name.'/get_present',$data);
	}
//------------------------------------------------------------------------------------
    public function get_mark() {
		$value = $_POST['value'];
		$valuem = explode('-',$value);
		//print_r($value);exit;
		$v = explode('/',$valuem[0]);
		
	    $where = 'trainee.division = '.$v[1].' and trainee.year = '.$valuem[1].' and trainee.semester = '.$valuem[2].' and trainer.id = '.$v[2];
		$data['trainee']= $this->model->join_rl_where_orderBy(
		'
		trainee.id as id_trainee,
		trainee.name as name,
		trainee.academicNo as academicNo,
		
		mark.id as id,
		mark.mark as mark,
		
		trainer.id as idtrainer,
		',
		'mark,trainer',
		'trainee',
		'RIGHT','trainee.academicNo =  mark.academicNo and trainer.id =  mark.id_trainer',
		$where,"id", "DESC");	

		$data['id_course']   = $v[0];
		$data['year']        = $valuem[1];
        $data['semester']    = $valuem[2];	
		$data['division']    = $v[1];
        $data['id_trainer']  = $v[2];	
        $this->load->view($this->name.'/get_mark',$data);
	}
//------------------------------------------------------------------------------------
    public function save_mark() {
		//print_r($_POST['mark']);exit;
		foreach($_POST['mark']  as $key => $val){
        $id = $key;
        $data['mark'] = $val;
		$this->model->update('mark', $data, $id);

			} 
	}
//------------------------------------------------------------------------------------
    public function pay() {
		$value = $_POST['value'];
		$valuem = explode('-',$value);
		//print_r($value);exit;
		$v = explode('/',$valuem[0]);
		
	    $where = 'trainee.division = '.$v[1].' and trainee.year = '.$valuem[1].' and trainee.semester = '.$valuem[2].' and trainer.id = '.$v[2];
		$data['trainee']= $this->model->join_rl_where_orderBy(
		'
		trainee.id as id_trainee,
		trainee.name as name,
		trainee.academicNo as academicNo,
		
		mark.id as id,
		mark.mark as mark,
		
		trainer.id as idtrainer,
		',
		'mark,trainer',	
		'trainee',
		'trainee.academicNo =  mark.academicNo and trainer.id =  mark.id_trainer',
		'RIGHT',$where,"id", "DESC");	

		$data['id_course']   = $v[0];
		$data['year']        = $valuem[1];
        $data['semester']    = $valuem[2];	
		$data['division']    = $v[1];
        $data['id_trainer']  = $v[2];	
        $this->load->view($this->name.'/get_mark',$data);
	}
 //-----------------------------------------------------------------------------------------
 public function pdfPresent($id_course,$division,$id_trainer,$year,$semester) {
	  $data['title'] = $this->lang->line('trainee');
	  $data['hijry'] = $this->datehijry->g2h(date("d/m/Y",time()));
	
	 $where2 = 'trainee.division = '.$division.' and trainee.year = '.$year.' and trainee.semester = '.$semester.' and trainer.id = '.$id_trainer;
		
		//$data['present']  = $this->model->get('present');	
		
		$data['present']= $this->model->join_rl_where_orderBy(
		'
		trainee.id as id_trainee,
		trainee.name as name,
		trainee.academicNo as academicNo,
		
		textbook_linkin.id as id,

		present.id as id_present,
		present.presence as presence,
		present.academicNo as academicNo_p,
		present.lectureNo as lectureNo,
		present.id_trainer as id_trainer,
		
		trainer.id as idtrainer,
		',
		'trainee,trainer,present',
		' textbook_linkin',
		' trainer.id =  textbook_linkin.id_trainer and trainee.academicNo = present.academicNo and present.id_trainer = trainer.id',
		'RIGHT',$where2,"id", "DESC");	

		$data['trainee']= $this->model->join_rl_where_orderBy(
		'
		trainee.id as id_trainee,
		trainee.name as name,
		trainee.academicNo as academicNo,
		
		 textbook_linkin.id as id,
		
		trainer.id as idtrainer,
		',
		' textbook_linkin',
		'trainee,trainer',
		' trainer.id =  textbook_linkin.id_trainer',
		'RIGHT',$where2,"id", "DESC");	

		
 		$data['id_course'] = $valuem[0];
		$data['year']      = $valuem[1];
        $data['semester']  = $valuem[2];
		$data['id_trainer']  = $v[2];	
		$data['division']    = $v[1];
		$this->load->view($this->name.'/pdfPresent', $data);
 }
//-----------------------------------------------------------------------------------------
 public function excelPresent($id_textbook,$division,$id_trainer,$year,$semester) {
  		$data['title'] = $this->lang->line('trainee');
			$data['hijry'] = $this->datehijry->g2h(date("d/m/Y",time()));
			$where2 = 'trainee.division = '.$division.' and trainee.year = '.$year.' and trainee.semester = '.$semester.' and trainer.id = '.$id_trainer;
		//echo $where2;exit;
		$where =' id_textbook = '.$id_textbook;	
        $textbook = $this->model->get_where('textbook_linkin', $where);	
		foreach ($textbook as $value);
		$data['lectureNo']= $value->lectureNo;
		
		$data['present']= $this->model->join_rl_where_orderBy(
		'
		trainee.id as id_trainee,
		trainee.name as name,
		trainee.academicNo as academicNo,
		
		textbook_linkin.id as id,

		present.id as id_present,
		present.presence as presence,
		present.academicNo as academicNo_p,
		present.lectureNo as lectureNo,
		present.id_trainer as id_trainer,
		
		trainer.id as idtrainer,
		',
		'trainee,trainer,present',
		' textbook_linkin',
		' trainer.id =  textbook_linkin.id_trainer and trainee.academicNo = present.academicNo and present.id_trainer = trainer.id',
		'RIGHT',$where2,"id", "DESC");	

		$data['trainee']= $this->model->join_rl_where_orderBy(
		'
		trainee.id as id_trainee,
		trainee.name as name,
		trainee.academicNo as academicNo,
		
		 textbook_linkin.id as id,
		
		trainer.id as idtrainer,
		',
		'trainee,trainer',
		' textbook_linkin',
		' trainer.id =  textbook_linkin.id_trainer',
		'RIGHT',$where2,"id", "DESC");	

		$whrer3  ='id = '.$id_trainer;	
	    $trainerName = $this->model->get_where('trainer',$whrer3);
		foreach($trainerName as $val3);
		$whrer4  ='division = '.$division;	
	    $courseName = $this->model->get_where('course',$whrer4);
		foreach($courseName as $val4);
 		//$data['id_course']  = $id_course;
		$data['year']       = $year;
        $data['semester']   = $semester;
		$data['id_trainer'] = $id_trainer;	
		$data['division']   = $division;
		$data['trainer']  = $val3->name;	
		$data['course']  = $val4->course;	


  $this->load->view($this->name.'/excelPresent', $data);
 }
//-----------------------------------------------------------------------------------------
 public function wordPresent($id_textbook,$division,$id_trainer,$year,$semester) {
  		$data['title'] = $this->lang->line('trainee');
			$data['hijry'] = $this->datehijry->g2h(date("d/m/Y",time()));
			$where2 = 'trainee.division = '.$division.' and trainee.year = '.$year.' and trainee.semester = '.$semester.' and trainer.id = '.$id_trainer;
		//echo $where2;exit;
		$where =' id_textbook = '.$id_textbook;	
        $textbook = $this->model->get_where('textbook_linkin', $where);	
		foreach ($textbook as $value);
		$data['lectureNo']= $value->lectureNo;
		
		$data['present']= $this->model->join_rl_where_orderBy(
		'
		trainee.id as id_trainee,
		trainee.name as name,
		trainee.academicNo as academicNo,
		
		textbook_linkin.id as id,

		present.id as id_present,
		present.presence as presence,
		present.academicNo as academicNo_p,
		present.lectureNo as lectureNo,
		present.id_trainer as id_trainer,
		
		trainer.id as idtrainer,
		',
		'trainee,trainer,present',
		' textbook_linkin',
		' trainer.id =  textbook_linkin.id_trainer and trainee.academicNo = present.academicNo and present.id_trainer = trainer.id',
		'RIGHT',$where2,"id", "DESC");	

		$data['trainee']= $this->model->join_rl_where_orderBy(
		'
		trainee.id as id_trainee,
		trainee.name as name,
		trainee.academicNo as academicNo,
		
		 textbook_linkin.id as id,
		
		trainer.id as idtrainer,
		',
		'trainee,trainer',
		' textbook_linkin',
		' trainer.id =  textbook_linkin.id_trainer',
		'RIGHT',$where2,"id", "DESC");	

		$whrer3  ='id = '.$id_trainer;	
	    $trainerName = $this->model->get_where('trainer',$whrer3);
		foreach($trainerName as $val3);
		$whrer4  ='division = '.$division;	
	    $courseName = $this->model->get_where('course',$whrer4);
		foreach($courseName as $val4);
 		//$data['id_course']  = $id_course;
		$data['year']       = $year;
        $data['semester']   = $semester;
		$data['id_trainer'] = $id_trainer;	
		$data['division']   = $division;
		$data['trainer']  = $val3->name;	
		$data['course']  = $val4->course;	


  $this->load->view($this->name.'/wordPresent', $data);
 }
 //-----------------------------------------------------------------------------------------
 public function printedPresent($id_textbook,$division,$id_trainer,$year,$semester) {
			$data['title'] = $this->lang->line('trainee');
			$data['hijry'] = $this->datehijry->g2h(date("d/m/Y",time()));
			$where2 = 'trainee.division = '.$division.' and trainee.year = '.$year.' and trainee.semester = '.$semester.' and trainer.id = '.$id_trainer;
		//echo $where2;exit;
		$where =' id_textbook = '.$id_textbook;	
        $textbook = $this->model->get_where('textbook_linkin', $where);	
		foreach ($textbook as $value);
		$data['lectureNo']= $value->lectureNo;
		
		$data['present']= $this->model->join_rl_where_orderBy(
		'
		trainee.id as id_trainee,
		trainee.name as name,
		trainee.academicNo as academicNo,
		
		textbook_linkin.id as id,

		present.id as id_present,
		present.presence as presence,
		present.academicNo as academicNo_p,
		present.lectureNo as lectureNo,
		present.id_trainer as id_trainer,
		
		trainer.id as idtrainer,
		',
		'trainee,trainer,present',	
		' textbook_linkin',
		' trainer.id =  textbook_linkin.id_trainer and trainee.academicNo = present.academicNo and present.id_trainer = trainer.id',
		'RIGHT',$where2,"id", "DESC");	

		$data['trainee']= $this->model->join_rl_where_orderBy(
		'
		trainee.id as id_trainee,
		trainee.name as name,
		trainee.academicNo as academicNo,
		
		 textbook_linkin.id as id,
		
		trainer.id as idtrainer,
		',
		'trainee,trainer',
		' textbook_linkin',
		' trainer.id =  textbook_linkin.id_trainer',
		'RIGHT',$where2,"id", "DESC");	

		$whrer3  ='id = '.$id_trainer;	
	    $trainerName = $this->model->get_where('trainer',$whrer3);
		foreach($trainerName as $val3);
		$whrer4  ='division = '.$division;	
	    $courseName = $this->model->get_where('course',$whrer4);
		foreach($courseName as $val4);
 		//$data['id_course']  = $id_course;
		$data['year']       = $year;
        $data['semester']   = $semester;
		$data['id_trainer'] = $id_trainer;	
		$data['division']   = $division;
		$data['trainer']  = $val3->name;	
		$data['course']  = $val4->course;	


  //$data['records']=$this->model->get_where('trainee',$where);
  $this->load->view($this->name.'/printedPresent', $data);
 }
 
//-----------------------------------------------------------------------------------------
 public function excelList($division,$year,$semester) {
			$data['title'] = $this->lang->line('trainee');
			$data['hijry'] = $this->datehijry->g2h(date("d/m/Y",time()));
	
	   $where = 'trainee.division = '.$division.' and trainee.year = '.$year.' and trainee.semester = '.$semester;
		//.' and '.$valuem[3]
		//echo $where;exit;
		//$data['id_course'] = $id_course;
		$data['division'] = $division;
		$data['year']      = $year;
        $data['semester']  = $semester;
		$data['trainee'] = $this->model->join_where_orderBy(
		'
		linkin.id as id,
		linkin.fromdate as fromdate,
		linkin.todate as todate,
		linkin.id_course as idcourse,
		trainee.id as id_trainee,
		trainee.id_course as idcourse,
		trainee.id_linkin as id_linkin,
		trainee.academicNo as academicNo,
		trainee.year as year,
		trainee.semester as semester,
		trainee.name as name,
		trainee.idCard as idCard,
		trainee.mobile as mobile,
		trainee.email as email,
		course.id as idcourse,
		course.course as course,
		course.division as division,
		',
		'linkin,course',
		'trainee',
		'trainee.id_linkin = linkin.id and linkin.id_course = course.id',
		$where,"id", "DESC");
		
		$whrer4  ='division = '.$division;	
	    $courseName = $this->model->get_where('course',$whrer4);
		foreach($courseName as $val4);
 		//$data['id_course']  = $id_course;
		$data['year']       = $year;
        $data['semester']   = $semester;
		$data['division']   = $division;
		$data['course']  = $val4->course;	
  $this->load->view($this->name.'/excelList', $data);
 }
 //-----------------------------------------------------------------------------------------
 public function wordList($division,$year,$semester) {
			$data['title'] = $this->lang->line('trainee');
			$data['hijry'] = $this->datehijry->g2h(date("d/m/Y",time()));
	
	   $where = 'trainee.division = '.$division.' and trainee.year = '.$year.' and trainee.semester = '.$semester;
		//.' and '.$valuem[3]
		//echo $where;exit;
		//$data['id_course'] = $id_course;
		$data['division'] = $division;
		$data['year']      = $year;
        $data['semester']  = $semester;
		$data['trainee'] = $this->model->join_where_orderBy(
		'
		linkin.id as id,
		linkin.fromdate as fromdate,
		linkin.todate as todate,
		linkin.id_course as idcourse,
		trainee.id as id_trainee,
		trainee.id_course as idcourse,
		trainee.id_linkin as id_linkin,
		trainee.academicNo as academicNo,
		trainee.year as year,
		trainee.semester as semester,
		trainee.name as name,
		trainee.idCard as idCard,
		trainee.mobile as mobile,
		trainee.email as email,
		course.id as idcourse,
		course.course as course,
		course.division as division,
		',
		'linkin,course',
		'trainee',
		'trainee.id_linkin = linkin.id and linkin.id_course = course.id',
		$where,"id", "DESC");
		
		$whrer4  ='division = '.$division;	
	    $courseName = $this->model->get_where('course',$whrer4);
		foreach($courseName as $val4);
 		//$data['id_course']  = $id_course;
		$data['year']       = $year;
        $data['semester']   = $semester;
		$data['division']   = $division;
		$data['course']  = $val4->course;	
  $this->load->view($this->name.'/wordList', $data);
 }
 //-----------------------------------------------------------------------------------------
 public function printedList($division,$year,$semester) {
			$data['title'] = $this->lang->line('trainee');
			$data['hijry'] = $this->datehijry->g2h(date("d/m/Y",time()));
	
	   $where = 'trainee.division = '.$division.' and trainee.year = '.$year.' and trainee.semester = '.$semester;
		//.' and '.$valuem[3]
		//echo $where;exit;
		//$data['id_course'] = $id_course;
		$data['division'] = $division;
		$data['year']      = $year;
        $data['semester']  = $semester;
		$data['trainee'] = $this->model->join_where_orderBy(
		'
		linkin.id as id,
		linkin.fromdate as fromdate,
		linkin.todate as todate,
		linkin.id_course as idcourse,
		trainee.id as id_trainee,
		trainee.id_course as idcourse,
		trainee.id_linkin as id_linkin,
		trainee.academicNo as academicNo,
		trainee.year as year,
		trainee.semester as semester,
		trainee.name as name,
		trainee.idCard as idCard,
		trainee.mobile as mobile,
		trainee.email as email,
		course.id as idcourse,
		course.course as course,
		course.division as division,
		',
		'linkin,course',
		'trainee',
		'trainee.id_linkin = linkin.id and linkin.id_course = course.id',
		$where,"id", "DESC");
		
		$whrer4  ='division = '.$division;	
	    $courseName = $this->model->get_where('course',$whrer4);
		foreach($courseName as $val4);
 		//$data['id_course']  = $id_course;
		$data['year']       = $year;
        $data['semester']   = $semester;
		$data['division']   = $division;
		$data['course']  = $val4->course;	
  $this->load->view($this->name.'/printedList', $data);
 }
 //-----------------------------------------------------------------------------------------
 public function excelMark($division,$id_trainer,$year,$semester) {
		$data['title'] = $this->lang->line('trainee');
		$data['hijry'] = $this->datehijry->g2h(date("d/m/Y",time()));
	    $where = 'trainee.division = '.$division.' and trainee.year = '.$year.' and trainee.semester = '.$semester.' and trainer.id = '.$id_trainer;

		$data['trainee']= $this->model->join_rl_where_orderBy(
		'
		trainee.id as id_trainee,
		trainee.name as name,
		trainee.academicNo as academicNo,
		
		mark.id as id,
		mark.mark as mark,
		
		trainer.id as idtrainer,
		trainer.id as idtrainer,
		',
		'mark,trainer',
		'trainee',
		'trainee.academicNo =  mark.academicNo and trainer.id =  mark.id_trainer',
		'RIGHT',$where,"id", "DESC");	
		$whrer3  ='id = '.$id_trainer;	
	    $trainerName = $this->model->get_where('trainer',$whrer3);
		foreach($trainerName as $val3);
		$whrer4  ='division = '.$division;	
	    $courseName = $this->model->get_where('course',$whrer4);
		foreach($courseName as $val4);
 		//$data['id_course']  = $id_course;
		$data['year']       = $year;
        $data['semester']   = $semester;
		$data['id_trainer'] = $id_trainer;	
		$data['division']   = $division;
		$data['trainer']  = $val3->name;	
		$data['course']  = $val4->course;	
		$data['year']        = $year;
	    
		$this->load->view($this->name.'/excelMark', $data);
 }
 //-----------------------------------------------------------------------------------------
 public function wordMark($division,$id_trainer,$year,$semester) {
		$data['title'] = $this->lang->line('trainee');
		$data['hijry'] = $this->datehijry->g2h(date("d/m/Y",time()));
	    $where = 'trainee.division = '.$division.' and trainee.year = '.$year.' and trainee.semester = '.$semester.' and trainer.id = '.$id_trainer;

		$data['trainee']= $this->model->join_rl_where_orderBy(
		'
		trainee.id as id_trainee,
		trainee.name as name,
		trainee.academicNo as academicNo,
		
		mark.id as id,
		mark.mark as mark,
		
		trainer.id as idtrainer,
		trainer.id as idtrainer,
		',
		'mark,trainer',
		'trainee',
		'trainee.academicNo =  mark.academicNo and trainer.id =  mark.id_trainer',
		'RIGHT',$where,"id", "DESC");	
		$whrer3  ='id = '.$id_trainer;	
	    $trainerName = $this->model->get_where('trainer',$whrer3);
		foreach($trainerName as $val3);
		$whrer4  ='division = '.$division;	
	    $courseName = $this->model->get_where('course',$whrer4);
		foreach($courseName as $val4);
 		//$data['id_course']  = $id_course;
		$data['year']       = $year;
        $data['semester']   = $semester;
		$data['id_trainer'] = $id_trainer;	
		$data['division']   = $division;
		$data['trainer']  = $val3->name;	
		$data['course']  = $val4->course;	
		$data['year']        = $year;
	    
		$this->load->view($this->name.'/wordMark', $data);
 }
  //-----------------------------------------------------------------------------------------
 public function printedMark($division,$id_trainer,$year,$semester) {
		$data['title'] = $this->lang->line('trainee');
		$data['hijry'] = $this->datehijry->g2h(date("d/m/Y",time()));
	    $where = 'trainee.division = '.$division.' and trainee.year = '.$year.' and trainee.semester = '.$semester.' and trainer.id = '.$id_trainer;

		$data['trainee']= $this->model->join_rl_where_orderBy(
		'
		trainee.id as id_trainee,
		trainee.name as name,
		trainee.academicNo as academicNo,
		
		mark.id as id,
		mark.mark as mark,
		
		trainer.id as idtrainer,
		trainer.id as idtrainer,
		',
		'mark,trainer',
		'trainee',
		'trainee.academicNo =  mark.academicNo and trainer.id =  mark.id_trainer',
		'RIGHT',$where,"id", "DESC");	
		$whrer3  ='id = '.$id_trainer;	
	    $trainerName = $this->model->get_where('trainer',$whrer3);
		foreach($trainerName as $val3);
		$whrer4  ='division = '.$division;	
	    $courseName = $this->model->get_where('course',$whrer4);
		foreach($courseName as $val4);
 		//$data['id_course']  = $id_course;
		$data['year']       = $year;
        $data['semester']   = $semester;
		$data['id_trainer'] = $id_trainer;	
		$data['division']   = $division;
		$data['trainer']  = $val3->name;	
		$data['course']  = $val4->course;	
		$data['year']        = $year;
	    
		$this->load->view($this->name.'/printedMark', $data);
 }
  //-----------------------------------------------------------------------------------------
 public function excelCourses($fromdate,$todate) {

		$where    = "linkin.fromdate BETWEEN '" . $fromdate . "' and '" . $todate . "'";
		$data['hijry'] = $this->datehijry->g2h(date("d/m/Y",time()));
		$data['fromdate'] = $fromdate;
		$data['todate']   = $todate;
		$data['year']   = 1437;
		$data['semester']   = 1;
		//print_r($where);exit;
		
		$data['linkin']=$this->model->join_rl_where_orderBy(
		'
		linkin.id as id,
		linkin.id_course as id_course,
		linkin.year as year,
		linkin.semester as semester,
		linkin.fromdate as fromdate,
		linkin.todate as todate,
		linkin.division as divisionl,
		
		textbook_linkin.id as idlin,
		textbook_linkin.id_trainer as idtrainer,
		textbook_linkin.division as division,
		
		trainer.id as idt,
		trainer.name as name,

		course.id as idcourse,
		course.course as course,
		course.division as division,
		course.target as target,
		course.amount as amount,
		',
		'course,textbook_linkin,trainer',
		'linkin',
		'linkin.id_course = course.id and linkin.division = textbook_linkin.division and textbook_linkin.id_trainer = trainer.id',
		'RIGHT',$where,"id", "DESC");
	$this->load->view($this->name.'/excelCourses', $data);

 }
  //-----------------------------------------------------------------------------------------
 public function wordCourses($fromdate,$todate) {

		$where    = "linkin.fromdate BETWEEN '" . $fromdate . "' and '" . $todate . "'";
		$data['hijry'] = $this->datehijry->g2h(date("d/m/Y",time()));
		$data['fromdate'] = $fromdate;
		$data['todate']   = $todate;
		$data['year']   = 1437;
		$data['semester']   = 1;
		//print_r($where);exit;
		
		$data['linkin']=$this->model->join_rl_where_orderBy(
		'
		linkin.id as id,
		linkin.id_course as id_course,
		linkin.year as year,
		linkin.semester as semester,
		linkin.fromdate as fromdate,
		linkin.todate as todate,
		linkin.division as divisionl,
		
		textbook_linkin.id as idlin,
		textbook_linkin.id_trainer as idtrainer,
		textbook_linkin.division as division,
		
		trainer.id as idt,
		trainer.name as name,

		course.id as idcourse,
		course.course as course,
		course.division as division,
		course.target as target,
		course.amount as amount,
		',
		'course,textbook_linkin,trainer',
		'linkin',
		'linkin.id_course = course.id and linkin.division = textbook_linkin.division and textbook_linkin.id_trainer = trainer.id',
		'RIGHT',$where,"id", "DESC");
	$this->load->view($this->name.'/wordCourses', $data);

 }
  //-----------------------------------------------------------------------------------------
 public function printedCourses($fromdate,$todate) {

		$where    = "linkin.fromdate BETWEEN '" . $fromdate . "' and '" . $todate . "'";
		$data['hijry'] = $this->datehijry->g2h(date("d/m/Y",time()));
		$data['fromdate'] = $fromdate;
		$data['todate']   = $todate;
		$data['year']   = 1437;
		$data['semester']   = 1;
		//print_r($where);exit;
		
		$data['linkin']=$this->model->join_rl_where_orderBy(
		'
		linkin.id as id,
		linkin.id_course as id_course,
		linkin.year as year,
		linkin.semester as semester,
		linkin.fromdate as fromdate,
		linkin.todate as todate,
		linkin.division as divisionl,
		
		textbook_linkin.id as idlin,
		textbook_linkin.id_trainer as idtrainer,
		textbook_linkin.division as division,
		
		trainer.id as idt,
		trainer.name as name,

		course.id as idcourse,
		course.course as course,
		course.division as division,
		course.target as target,
		course.amount as amount,
		',
		'course,textbook_linkin,trainer',
		'linkin',
		'linkin.id_course = course.id and linkin.division = textbook_linkin.division and textbook_linkin.id_trainer = trainer.id',
		'RIGHT',$where,"id", "DESC");
	$this->load->view($this->name.'/printedCourses', $data);

 }
//-----------------------------------------------------------------------------------------
}