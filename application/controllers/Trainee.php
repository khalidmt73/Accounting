<?php
class Trainee extends CI_Controller {
	
	public $name = 'trainee';

    function __construct() {
        parent::__construct();
		
	  }
//-----------------------------------------------------------------------------------------
    public function index() {
	    $get_num = $this->model->get_num($this->name);
		$limit = ($this->uri->segment(3)) ? $this->uri->segment(3) :10;
        $data['total_rows']  = $get_num;
        $data['title'] = $this->lang->line($this->name);
		$data['style']      =  $this->style;
		$data['limit'] = $limit;
		$offset = $this->uri->segment(4,1);
		$start = $this->mpages->mulitiPages($offset,$get_num ,$limit);
	    $data['start']=$start;
		$data['offset']=$offset;
		$data['get_num']=$get_num;

	    $data[$this->name]=$this->model->join_rl_limit_orderBy(
		'
		calendar.year,
		calendar.semester,
		
		register.academicNo,
		
		trainee.idCard,
		trainee.name,
		trainee.mobile,
		trainee.email,

		linkCourse.series,
		
		course.idCourse,
		course.course
		',
		$this->name.',calendar,course,linkCourse',
		'register',
		'register.id_Card = trainee.idCard
		 and register.id_linkCourse = linkCourse.idLinkCourse
		 and linkCourse.id_course = course.idCourse
		 and register.id_calendar = calendar.idCalendar',
		'RIGHT',
		$limit,
		$start ,
		"academicNo",
		"DESC");
        $data['pages'] = $this->mpages->pagesPrint(base_url($this->name.'/index/'.$limit."/"));
		$this->load->view('inc/head', $data);
        $this->load->view('inc/traineeDep/'.$this->style.'/header',$this->data_header);
        $this->load->view($this->name.'/menu');
        $this->load->view($this->name.'/index',$data);
        $this->load->view('inc/traineeDep/'.$this->style.'/footer',$this->data_footer);
    }
//-----------------------------------------------------------------------------------------
    public function add() {
        $data['style']      =  $this->style;
        $data['title'] = $this->lang->line('add');
		if ($this->uri->segment(4) == 'add') {
           $id = $this->uri->segment(3);
	    $data['oneRecord']=$this->model->join_orderBy(
		'
		register.academicNo,
		register.id_card,
		
		calendar.year,
		calendar.semester,
		
		trainee.name,
		trainee.idCard,
		trainee.nat,
		trainee.sex,
		trainee.birthDay,
		trainee.occupation,
		trainee.degree,
		trainee.mobile,
		trainee.email,
		
		course.idCourse,
		course.course,
		course.amount
		',
		$this->name.',course,calendar,linkCourse',
		'register',
		'register.id_card = trainee.idCard 
		 and register.academicNo = '.$id.' 
		 and register.id_linkCourse = linkCourse.idLinkCourse
		 and linkCourse.id_course = course.idCourse		 and register.id_calendar = calendar.idCalendar',"academicNo", "DESC");
        } else
            $id = 0;
		//$data['course'] = $this->model->get('course');
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
		
		$this->load->view('inc/head', $data);
        $this->load->view('inc/traineeDep/'.$this->style.'/header',$this->data_header);
        $this->load->view($this->name.'/menu');
		$this->load->view($this->name.'/add',$data);
        $this->load->view('inc/traineeDep/'.$this->style.'/footer',$this->data_footer);
    }
//-----------------------------------------------------------------------------------------
    public function get_idCard() {
	 $value = $_POST['value'];
	 $where = 'idCard = '.$value;
	 $trainee = $this->model->get_num_where('trainee',$where);
	 if($trainee > 0) echo $this->lang->line("idCardExisting");
	
	}
//-----------------------------------------------------------------------------------------
    public function copy($id) {
        $data['style']      =  $this->style;
        $data['title'] = $this->lang->line('add');
		 $data['record']=$this->model->join_orderBy(
		'
		register.academicNo,
		register.id_card,
		
		calendar.year,
		calendar.semester,
		
		trainee.fname,
		trainee.frname,
		trainee.gname,
		trainee.family,
		trainee.nat,
		trainee.sex,
		trainee.birthDay,
		trainee.occupation,
		trainee.degree,
		trainee.mobile,
		trainee.email,
		
		course.idCourse,
		course.course,
		course.amount
		',
		 $this->name.',course,calendar,linkCourse',
		'register',
		'register.id_card = trainee.idCard 
		 and register.academicNo = '.$id.' 
		 and register.id_linkCourse = linkCourse.idLinkCourse
		 and linkCourse.id_course = course.idCourse 
		 and register.id_calendar = calendar.idCalendar',"academicNo", "DESC");
		
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
		$this->load->view('inc/head', $data);
        $this->load->view('inc/traineeDep/'.$this->style.'/header',$this->data_header);
        $this->load->view($this->name.'/menu');
		$this->load->view($this->name.'/copy',$data);
        $this->load->view('inc/traineeDep/'.$this->style.'/footer',$this->data_footer);
    }
//------------------------------------------------------------------------------------
    public function search() {
		 if (isset($_POST['search'])) {
            $search = trim($_POST['search']);
		 }
		  if (is_numeric($search)) {
            $where = "register.id_card  LIKE '%$search%'";
        } else {
            $where = "trainee.name LIKE '%$search%'";
        }
        $data['title'] = $this->lang->line($this->name);
		$data['style']      =  $this->style;
		
		$data[$this->name]=$this->model->join_rl_where_orderBy(
		'
		calendar.year,
		calendar.semester,
		
		register.academicNo,
		register.id_card,
		register.id_course,
		
		trainee.name,
		trainee.mobile,
		trainee.email,
		
		course.idCourse,
		course.course
		',
		$this->name.',calendar,course',
		'register',
		'register.id_card = trainee.idCard and register.id_course = course.idCourse',
		'RIGHT',$where,"academicNo", "DESC");
        $this->load->view($this->name.'/search',$data);
	}
//----------------------------------------------------------------------------------
    public function create() {
        $filde    = $this->model->get_sel_orderBy_limit('academicNo','register','academicNo','DESC','1');
        $calendar = $this->model->get_sel_orderBy_limit('*','calendar','idCalendar','DESC','1');
		foreach ($calendar as $value2);
		$id_calendar     = $value2->idCalendar;
		$year     = $value2->year;
		$semester = $value2->semester;

		if ( $filde > 1){
			foreach ($filde as $value);
			$academicNoSub = substr($value->academicNo,0,3);
			$year = substr($year,1,4);
			if($year > $academicNoSub){
				$start = substr($year,1,4);
				$academicNo = ($start.$semester.'0001');
			}
			else{
				$academicNo =  $value->academicNo + 1;
			}
		}
		else {
		$start = substr($year,1,4);
		$academicNo = ($start.$semester.'0001');
		}
		$whereId    = 'idCard = '.$_POST['idCard'];
		$checkId    = $this->model->get_num_where('trainee',$whereId);
		if($checkId < 1){
		//------------------------------------
		$data['fname']		= $_POST['fname'];
		$data['frname']		= $_POST['frname'];
		$data['gname']		= $_POST['gname'];
		$data['family']		= $_POST['family'];
		
		$data['name']		=
		$_POST['fname'].' '.$_POST['frname'].' '.$_POST['gname'].' '.$_POST['family'];
		$data['nat']		= $_POST['nat'];
		$data['sex']		= $_POST['sex'];
		$data['birthDay']	= $_POST['birthDay'];
		$data['degree']		= $_POST['degree'];
		$data['occupation']	= $_POST['occupation'];
        
		$data['idCard']		= $_POST['idCard'];
        $data['mobile']		= $_POST['mobile'];
        $data['email']      = $_POST['email'];
       	$this->model->create($this->name, $data);
		//------------------------------------
		}	
		$data2['id_card']	    = $_POST['idCard'];
		$data2['academicNo']    = $academicNo;
		$data2['id_calendar']   = $id_calendar;
        $data2['id_linkCourse'] = $_POST['idLinkCourse'];
		$this->model->create('register', $data2);

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
                location = "<?php echo base_url($this->name.'/add/' . $academicNo . '/add'); ?>";
            }
            setTimeout('goback()', 1500);
            //-->
        </script>
        <?php
        $this->load->view('inc/traineeDep/'.$this->style.'/footer',$this->data_footer);
    }
//-----------------------------------------------------------------------------------------
    public function edit($id) {
        $data['title'] = $this->lang->line('edit');
        $data['style']      =  $this->style;
		 $data['record']=$this->model->join_orderBy(
		'
        register.id_linkCourse,
		register.academicNo,
		register.id_card,
		
		calendar.year,
		calendar.semester,
		
		trainee.fname,
		trainee.frname,
		trainee.gname,
		trainee.family,
		trainee.nat,
		trainee.sex,
		trainee.birthDay,
		trainee.occupation,
		trainee.degree,
		trainee.mobile,
		trainee.email,
		
		course.idCourse,
		course.course,
		course.amount
		',
		$this->name.',course,calendar,linkCourse',
		'register',
		'register.id_card = trainee.idCard
		 and register.academicNo = '.$id.'
		 and register.id_linkCourse = linkCourse.idLinkCourse
		 and linkCourse.id_course = course.idCourse	
		 and register.id_calendar = calendar.idCalendar',"academicNo", "DESC");
		 
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
		$this->load->view('inc/head', $data);
        $this->load->view('inc/traineeDep/'.$this->style.'/header',$this->data_header);
        $this->load->view($this->name.'/menu');
		$this->load->view($this->name.'/edit',$data);
        $this->load->view('inc/traineeDep/'.$this->style.'/footer',$this->data_footer);

    }
//-----------------------------------------------------------------------------------------
    public function update($academicNo) {
		
		$idCardOld	  = $_POST['idCardOld'];
        //$data['register'] = $this->model->get('register');
  		$data2['id_card']	  = $_POST['idCard'];
        $data2['id_linkCourse']   = $_POST['idLinkCourse'];
		$this->model->update('register', $data2, 'id_card', $idCardOld);


		$data['fname']		= $_POST['fname'];
		$data['frname']		= $_POST['frname'];
		$data['gname']		= $_POST['gname'];
		$data['family']		= $_POST['family'];
		
		$data['name']		=
		$_POST['fname'].' '.$_POST['frname'].' '.$_POST['gname'].' '.$_POST['family'];
		$data['nat']		= $_POST['nat'];
		$data['sex']		= $_POST['sex'];
		$data['birthDay']	= $_POST['birthDay'];
		$data['degree']		= $_POST['degree'];
		$data['occupation']	= $_POST['occupation'];
        
		$data['idCard']		= $_POST['idCard'];
        $data['mobile']		= $_POST['mobile'];
        $data['email']      = $_POST['email'];
  		$this->model->update($this->name, $data, 'idCard', $idCardOld);
  
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
                location = "<?php echo base_url($this->name.'/edit/' . $academicNo . '/edit'); ?>";
            }
            setTimeout('goback()', 1500);
            //-->
        </script>
        <?php
        $this->load->view('inc/traineeDep/'.$this->style.'/footer',$this->data_footer);
    		
	}
//-----------------------------------------------------------------------------------------
    public function lists() {
	    
        $data['title'] = $this->lang->line($this->name);
		$data['style']      =  $this->style;
		
		$data['year']    = $this->datehijry->g2h(date("d/m/Y",time()),"yy");
	    $data['course']  = $this->model->get('course');
	    $data['trainer'] = $this->model->get('trainer');
		
		 $data['textbook_linkin']=$this->model->join_orderBy(
		'
		trainer.id as id_trainer,
		trainer.name as name,
		textbook.id as id_textbook,
		textbook.textbook as textbook,
		textbook_linkin.id as id,
		textbook_linkin.id_textbook as idtextbook,
		textbook_linkin.id_trainer as idtrainer,
		',
		'textbook_linkin,textbook',
		'trainer',
		'textbook_linkin.id_trainer =  trainer.id and  textbook_linkin.id_textbook = textbook.id ',
		"id", "DESC");

	   
		$this->load->view('inc/head', $data);
        $this->load->view('inc/traineeDep/'.$this->style.'/header',$this->data_header);
        $this->load->view($this->name.'/menu');
        $this->load->view($this->name.'/lists',$data);
        $this->load->view('inc/traineeDep/'.$this->style.'/footer',$this->data_footer);
    }
//-----------------------------------------------------------------------------------------
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
		//print_r($value);exit;	
		$v = explode('/',$valuem[0]);
	    $where = 'trainee.division = '.$v[1].' and trainee.year = '.$valuem[1].' and trainee.semester = '.$valuem[2];
		//.' and '.$valuem[3]
		//echo $where;exit;
		$data['id_course'] = $v[0];
		$data['division'] = $v[1];
		$data['year']      = $valuem[1];
        $data['semester']  = $valuem[2];
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
		course.idCourse as idcourse,
		course.course as course,
		course.division as division,
		',
		 'linkin,course',
		'trainee',
		'trainee.id_linkin = linkin.id and linkin.division = course.division',
		$where,"id", "DESC");
     	//$data['trainee']=$this->model->get_where('trainee',$where);
        $this->load->view($this->name.'/get_list',$data);
	}
//------------------------------------------------------------------------------------
    public function get_present() {
		$value = $_POST['value'];
		//print_r($value);exit;
		$valuem = explode('-',$value);
		//print_r($value);exit;	
		$v = explode('/',$valuem[0]);
		
		$where =' id = '.$v[3];	
        $textbook = $this->model->get_where('textbook', $where);	
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

		$data['trainee']= $this->model->join_rl_where_orderBy('trainee,trainer',
		'
		trainee.id as id_trainee,
		trainee.name as name,
		trainee.academicNo as academicNo,
		
		 textbook_linkin.id as id,
		
		trainer.id as idtrainer,
		',
		' textbook_linkin',
		' trainer.id =  textbook_linkin.id_trainer',
		$where2,"id", "DESC");	

		
 		//$data['id_course'] = $valuem[0];
		$data['year']      = $valuem[1];
        $data['semester']  = $valuem[2];
		$data['id_trainer']  = $v[2];	
		$data['division']    = $v[1];
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
		'trainee.academicNo =  mark.academicNo and trainer.id =  mark.id_trainer',
		'RIGHT',$where,"id", "DESC");	

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
    public function pay($id) {
		 $data[$this->name]=$this->model->join_orderBy(
		'
		register.academicNo,
		register.id_card,
		
		calendar.year,
		calendar.semester,
		
		trainee.name,
		trainee.mobile,
		trainee.email,
		
		course.idCourse,
		course.course,
		course.amount
		',
		$this->name.',course,calendar,linkCourse',
		'register',
		'register.id_card = trainee.idCard
		 and register.academicNo = '.$id.' 
		 and register.id_linkCourse = linkCourse.idLinkCourse
		 and linkCourse.id_course = course.idCourse	
		 and register.id_calendar = calendar.idCalendar',"academicNo", "DESC");
		
		$whereDiscount    = 'academicNo = '.$id;
		$discount         = $this->model->get_where('discount',$whereDiscount);
		if ($discount == TRUE){	
   		$dis ='';
		foreach ($discount as $val)
			{
				$dis += $val->discount;
			}
		$data['discount']=$dis;
		}else {$data['discount'] = 0 ;}
		$where = 'pay.academicNo = '.$id;
		$data['pay']= $this->model->join_rl_where_orderBy(
		'
		pay.id             ,
		pay.academicNo      ,
		pay.payAmount      ,
		pay.hijri			,
		pay.date			,
		pay.time			,
		
		register.academicNo,
		register.id_card,
		
		trainee.name,
		trainee.mobile,
		trainee.email,
		
		course.idCourse  ,
		course.course 
		',
		'trainee,pay,course,linkCourse',
		'register',
		'register.academicNo =  pay.academicNo
		 and register.id_card = trainee.idCard 
		  and register.id_linkCourse = linkCourse.idLinkCourse
		 and linkCourse.id_course = course.idCourse	',
		'RIGHT',$where,"id", "DESC");	
		$data['title'] = $this->lang->line('pay');
        $data['style']      =  $this->style;

		$this->load->view('inc/head', $data);
        $this->load->view('inc/traineeDep/'.$this->style.'/header',$this->data_header);
        $this->load->view($this->name.'/menu');
		$this->load->view($this->name.'/pay',$data);
        $this->load->view('inc/traineeDep/'.$this->style.'/footer',$this->data_footer);

	}
//-----------------------------------------------------------------------------------------
    public function createPay($id) {
		$data['academicNo']  = $_POST['academicNo'];
		$data['payAmount']   = $_POST['payAmount'];
		
				
		$data['hijri']       = 	$this->datehijry->g2h(date("d/m/Y",time()));
		$data['date']        = date('Y-m-d');
		 $data['time']       = date('h:i:s');
		$this->model->create('pay', $data);

		$data2['academicNo'] = $_POST['academicNo'];
		$data2['discount']   = $_POST['discount'];
		$this->model->create('discount', $data2);
		
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
                location = "<?php echo base_url($this->name.'/pay/' . $id ); ?>";
            }
            setTimeout('goback()', 1500);
            //-->
        </script>
        <?php
        $this->load->view('inc/traineeDep/'.$this->style.'/footer',$this->data_footer);

	}
//-----------------------------------------------------------------------------------------
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
 //-----------------------------------------------------------------------------------------
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
		'trainee,trainer',
		' textbook_linkin',
		' trainer.id =  textbook_linkin.id_trainer',
		'RIGHT',$where2,"id", "DESC");	

		
 		$data['id_course'] = $valuem[0];
		$data['year']      = $valuem[1];
        $data['semester']  = $valuem[2];
		$data['id_trainer']  = $v[2];	
		$data['division']    = $v[1];
		

  //$data['records']=$this->model->get_where('trainee',$where);
  $this->load->view($this->name.'/pdfPresent', $data);
 }
//-----------------------------------------------------------------------------------------
 public function excelPresent($id_course,$year,$semester) {
  $data['title'] = $this->lang->line('trainee');
  $where = 'id_course = '.$id_course.' and year = '.$year.' and semester = '.$semester;
  $data['records']=$this->model->get_where('trainee',$where);
  $this->load->view($this->name.'/excelPresent', $data);
 }
//-----------------------------------------------------------------------------------------
 public function wordPresent($id_course,$division,$id_trainer,$year,$semester) {
  $data['title'] = $this->lang->line('trainee');
  $where = 'id_course = '.$id_course.' and year = '.$year.' and semester = '.$semester;
  $data['records']=$this->model->get_where('trainee',$where);
  $this->load->view($this->name.'/wordPresent', $data);
 }
 //-----------------------------------------------------------------------------------------
 public function printedPresent($division,$id_trainer,$year,$semester) {
			$data['title'] = $this->lang->line('trainee');
			$data['hijry'] = $this->datehijry->g2h(date("d/m/Y",time()));
	
	  
	 $where2 = 'trainee.division = '.$division.' and trainee.year = '.$year.' and trainee.semester = '.$semester.' and trainer.id = '.$id_trainer;
		//echo $where2;exit;
		$where =' id = 1';	
        $textbook = $this->model->get_where('textbook', $where);	
		foreach ($textbook as $value);
		$data['lectureNo']= $value->lectureNo;
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
		course.idCourse as idcourse,
		course.course as course,
		course.division as division,
		',
		'linkin,course',
		'trainee',
		'trainee.id_linkin = linkin.id and linkin.id_course = course.idCourse',
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
 public function printedPay($id) {
	$data['trainee'] = $this->model->join_orderBy(
		'
		trainee.id as id,
		trainee.id_course as idcourse,
		trainee.id_linkin as id_linkin,
		trainee.academicNo as academicNo,
		trainee.year as year,
		trainee.semester as semester,
		trainee.name as name,
		trainee.idCard as idCard,
		trainee.mobile as mobile,
		trainee.email as email,
		
		course.idCourse as idcourse,
		course.course as course,
		course.division as division,
		course.amount as amount,
		',
		'course',
		'trainee',
		' trainee.id_course = course.idCourse and trainee.id = '.$id,"id", "DESC");
		
		$whereDiscount    = 'id_trainee= '.$id;
		$discount         = $this->model->get_where('discount',$whereDiscount);
		if ($discount == TRUE){	
   		$dis ='';
		foreach ($discount as $val)
			{
				$dis += $val->discount;
			}
		$data['discount']=$dis;
		}else {$data['discount'] = 0 ;}
		$where = 'id_trainee= '.$id;
		$data['pay']= $this->model->join_rl_where_orderBy(
		'
		trainee.id          as id,
		trainee.name        as name,
		trainee.academicNo  as academicNo,
		trainee.division    as division,
		trainee.year        as year,
		trainee.semester    as semester,
		trainee.id_course   as id_course,
		
		pay.id              as idPay,
		pay.id_trainee      as id_trainee,
		pay.academicNo      as academic_No,
		pay.payAmount       as payAmount,
		pay.id_trainee      as id_trainee,
		pay.hijri			as hijri,
		pay.date			as date,
		pay.time			as time,
		
		course.idCourse           as id_course,
		course.course       as course,
		',
		'pay,course',
		'trainee',
		'trainee.id =  pay.id_trainee and course.idCourse = trainee.id_course',
		'RIGHT',$where,"id", "DESC");	
		

		//$data['id_course']   = $v[0];
		//$data['year']        = $valuem[1];
        //$data['semester']    = $valuem[2];	
		//$data['division']    = $v[1];
        //$data['id_trainer']  = $v[2];
		 
		$data['title']  = $this->lang->line('pay');
        $data['style']  =  $this->style;
		$data['hijri']  = 	$this->datehijry->g2h(date("d/m/Y",time()));

		$this->load->view($this->name.'/printedPay',$data);
 }
//-----------------------------------------------------------------------------------------
}