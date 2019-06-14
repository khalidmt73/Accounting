<?php
class Division extends CI_Controller {
	
	public $name = 'division';

    function __construct() {
        parent::__construct();
		
	  }

//------------------------------------------------------------------------------------
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
		$data['division']=$this->model->join_limit_orderBy(
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
		$limit,$start ,"idDivision", "ASC");
        $data['pages'] = $this->mpages->pagesPrint(base_url($this->name.'/index/'.$limit."/"));
		$this->load->view('inc/head', $data);
        $this->load->view('inc/traineeDep/'.$this->style.'/header',$this->data_header);
        $this->load->view('setting/menu');
        $this->load->view('setting/division/index',$data);
        $this->load->view('inc/traineeDep/'.$this->style.'/footer',$this->data_footer);
    }
//------------------------------------------------------------------------------------
    public function add() {
        $data['style']      =  $this->style;
        $data['title'] = $this->lang->line('add');
		if ($this->uri->segment(4) == 'add') {
           echo $id = $this->uri->segment(3);
		   $where = "idTextbook = " . $id;
            $data['oneRecord'] = $this->model->get_one('division', $where);
        } else { $id = 0;}
		$data['textbook']      = $this->model->get('textbook');
		$data['course']        = $this->model->get('course');
		   
		$this->load->view('inc/head', $data);
        $this->load->view('inc/traineeDep/'.$this->style.'/header',$this->data_header);
        $this->load->view('setting/menu');
		$this->load->view('setting/division/add',$data);
        $this->load->view('inc/traineeDep/'.$this->style.'/footer',$this->data_footer);
    }
//------------------------------------------------------------------------------------
    public function getTextbook() {
		$get  =  $_POST['value'];
		$where     = "id_course = " . $get;
	    $textbook  = $this->model->get_where('textbook',$where);
		$drop4['0'] =$this->lang->line("textbook1");
			foreach($textbook as $val4){
		    $drop4[$val4->idTextbook]= $val4->textbook;
			} 
			echo form_dropdown('id_textbook',$drop4,'0','class="form-control" id= "id_textbook"  style="width:50%;margin-bottom:10px;"');
		 }
	//------------------------------------------------------------------------------------
    public function getDivision() {
		$get               =  $_POST['value'];
		$where             = "id_course = " . $get;
		$data['course']    = $this->model->get('course');
	    $division  = $this->model->get_where('division',$where);
		$js = 'id_division onChange="ajaxDivision(this.value,`classroom`,`linkin/getClassroom`);"';
		$drop2['0'] =$this->lang->line("division1");
			foreach($division as $val2){
				$drop2[$val2->id] = $val2->number;
			}
			echo form_dropdown('id_division',$drop2,'0',$js . 'class="form-control" style="width:50%;margin-bottom:10px;"');
		 }
//------------------------------------------------------------------------------------
    public function getClassroom() {
		$get               =  $_POST['value'];
		$where             = "idTextbook = " . $get;
	    $classroom  = $this->model->get_where('classroom',$where);
		foreach($classroom as $val){
			echo '<div class="data_font">'.' قاعة رقم : &nbsp;'.$val->number.'&nbsp; - &nbsp;'.'السعة : &nbsp;'.$val->capacity.'</div>';
		}
		 }
//------------------------------------------------------------------------------------
    public function search() {
		 if (isset($_POST['search'])) {
            $search           = trim($_POST['search']);
		 }
		  if (is_numeric($search)) {
            $where           = "number = " . $search;
        } else {
            $where           = "textbook LIKE '%$search%'";
        }
		
			$data[$this->name]=$this->model->join_where2(
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
		$where);
        
        $this->load->view('setting/'.$this->name.'/search',$data);
	}
//--------------------------------------------------------------------------------------
    public function create() {
		
        $id_course    = $_POST['id_course'];
        $id_textbook  = $_POST['id_textbook'];
		//$id_course.$id_textbook
		$where        = 'id_course = '.$id_course.' and id_textbook = '.$id_textbook ;
		$lastDivision = $this->model->get_sel_where_orderBy_limit('*','division',$where,'idDivision','DESC','1');
		if ($lastDivision == false){
        echo $data['idDivision']  = $id_course.$id_textbook.'1';
		$data['id_course']   = $id_course;
		$data['id_textbook'] = $id_textbook;
		$data['id'] = 1;
		$this->model->create('division', $data);
		}
		else{
		foreach($lastDivision as $val);
		echo $data['idDivision']  = $id_course.$id_textbook.$val->id+1;
		$data['id_course']   = $id_course;
		$data['id_textbook'] = $id_textbook;
		$data['id'] = $val->id+1;
		$this->model->create('division', $data);
		$id = $this->db->insert_id();
		}
       
        $data['title']  = $this->lang->line('add_msg');
        $data['style']  =  $this->style;
			
		$this->load->view('inc/head', $data);
        $this->load->view('inc/traineeDep/'.$this->style.'/header',$this->data_header);
		$data['msg'] = '<div class="msg_create">' . $data['title'] . '</div>';
        $this->load->view('home/msg', $data);
			$id = $this->db->insert_id();

        ?>
        <script langauge="javascript" type="text/javascript">
            <!--
                    function goback()
            {
                location = "<?php echo base_url($this->name.'/add'); ?>";
            }
            setTimeout('goback()', 1500);
            //-->
        </script>
        <?php
        $this->load->view('inc/traineeDep/'.$this->style.'/footer',$this->data_footer);
    }
//-------------------------------------------------------------------------------------
    public function edit($id) {
        $data['title']  = $this->lang->line('edit');
        $data['style']  =  $this->style;
        $data['record'] = $this->model->get_where('division', 'idDivision = ' . $id);
		$data['id']     =$id;
		$data['textbook']      = $this->model->get('textbook');
		$data['course']        = $this->model->get('course');
		$where  = 'idDivision = '.$id;
		$data['division']=$this->model->join_where2(
		'
		division.idDivision,
		division.id_textbook,
		division.id_course,
		
		textbook.idTextbook ,
		textbook.textbook,
		
		
		course.idCourse,
		course.course,
		',
		'course,textbook', 
		'division',
		'division.id_textbook =  textbook.idTextbook 
		and  division.id_course = course.idCourse ' ,
		$where);
		$this->load->view('inc/head', $data);
        $this->load->view('inc/traineeDep/'.$this->style.'/header',$this->data_header);
        $this->load->view('setting/menu',$data);
		$this->load->view('setting/'.$this->name.'/edit',$data);
        $this->load->view('inc/traineeDep/'.$this->style.'/footer',$this->data_footer);

    }
//--------------------------------------------------------------------------------
    public function update($idDivision) {
        $this->model->delet('division', 'idDivision', $idDivision);
        $id_course    = $_POST['id_course'];
        $id_textbook  = $_POST['id_textbook'];
		$id_course.$id_textbook;
		$where        = 'id_course = '.$id_course.' and id_textbook = '.$id_textbook ;
		$lastDivision = $this->model->get_sel_where_orderBy_limit('*','division',$where,'idDivision','DESC','1');
		if ($lastDivision == false){
        $data['idDivision']  = $id_course.$id_textbook.'1';
		$data['id_course']   = $id_course;
		$data['id_textbook'] = $id_textbook;
		$data['id'] = 1;
		$this->model->create('division', $data);
		$idDiv =$data['idDivision'] ;
		}
		else{
		foreach($lastDivision as $val);
		$data['idDivision']  = $id_course.$id_textbook.$val->id+1;
		$data['id_course']   = $id_course;
		$data['id_textbook'] = $id_textbook;
		$data['id'] = $val->id+1;
		$this->model->create('division', $data);
		$idDiv = $data['idDivision'];
		}
       
         
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
                location = "<?php echo base_url($this->name.'/edit/' . $idDiv); ?>";
            }
            setTimeout('goback()', 1500);
            //-->
        </script>
        <?php
        $this->load->view('inc/traineeDep/'.$this->style.'/footer',$this->data_footer);
    		
	}
//-----------------------------------------------------------------------------------
}