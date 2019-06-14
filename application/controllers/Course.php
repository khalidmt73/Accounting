<?php
class Course extends CI_Controller {
	
	public $name = 'course';

    function __construct() {
        parent::__construct();
		
	  }
//-----------------------------------------------------------------------------------
    public function index() {
	    $get_num = $this->model->get_num($this->name);
		$limit = ($this->uri->segment(3)) ? $this->uri->segment(3) :10;
        $data['total_rows']  = $get_num;
        $data['title'] = $this->lang->line($this->name);
		$data['style']      =  $this->style;
		$data['limit'] = $limit;
		$offset = $this->uri->segment(4,1);
		$start =$this->mpages->mulitiPages($offset,$get_num ,$limit);
		$data['start']=$start;
	    $data[$this->name]=$this->model->get_limit_orderBy($this->name,$limit,$start ,"idCourse", "DESC");
        $data['pages'] = $this->mpages->pagesPrint(base_url('course/index/'.$limit."/"));
		$this->load->view('inc/head', $data);
        $this->load->view('inc/traineeDep/'.$this->style.'/header',$this->data_header);
        $this->load->view('setting/menu');
        $this->load->view('setting/'.$this->name.'/index',$data);
        $this->load->view('inc/traineeDep/'.$this->style.'/footer',$this->data_footer);
    }
//-----------------------------------------------------------------------------------
    public function add() {
        $data['style']      =  $this->style;
        $data['title'] = $this->lang->line('add');
		if ($this->uri->segment(4) == 'add') {
           echo $id = $this->uri->segment(3);
		   $where = "idCourse = " . $id;
            $data['oneRecord'] = $this->model->get_one($this->name, $where);
        } else
            $id = 0;
        $data['treeRecords'] = $this->model->get('tree_type');
        $data['accountRecords'] = $this->model->get('tree_account');
		$this->load->view('inc/head', $data);
        $this->load->view('inc/traineeDep/'.$this->style.'/header',$this->data_header);
        $this->load->view('setting/menu');
		$this->load->view('setting/'.$this->name.'/add',$data);
        $this->load->view('inc/traineeDep/'.$this->style.'/footer',$this->data_footer);
    }
//------------------------------------------------------------------------------------
    public function search() {
		 if (isset($_POST['search'])) {
            $search = trim($_POST['search']);
		 }
		  if (is_numeric($search)) {
            $where = "idCourse LIKE '%$search%'";
        } else {
            $where = "course LIKE '%$search%'";
        }
        $get_num = $this->model->get_num($this->name);
        $data['total_rows']  = $get_num;
        $data['title'] = $this->lang->line($this->name);
		$data['style']      =  $this->style;
		$data['limit'] = 1;
		$data['offset'] =1;
		
        $data[$this->name] = $this->model->get_where($this->name, $where);	
        $this->load->view('setting/'.$this->name.'/search',$data);
	}
//-----------------------------------------------------------------------------------------
    public function create() {
        $data['course']   = $_POST['course'];
        $data['type']     = $_POST['type'];
        $data['target']   = $_POST['target'];
        $data['amount']   = $_POST['amount'];
        $this->model->create($this->name, $data);
		$idCourse = $this->db->insert_id();

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
                location = "<?php echo base_url($this->name.'/add/' . $idCourse . '/add'); ?>";
            }
            setTimeout('goback()', 1500);
            //-->
        </script>
        <?php
        $this->load->view('inc/traineeDep/'.$this->style.'/footer',$this->data_footer);
    }
//-----------------------------------------------------------------------------------------
    public function edit($idCourse) {
        $data['title'] = $this->lang->line('edit');
        $data['style']      =  $this->style;
        $data['record'] = $this->model->get_where($this->name, 'idCourse = ' . $idCourse);
		$this->load->view('inc/head', $data);
        $this->load->view('inc/traineeDep/'.$this->style.'/header',$this->data_header);
        $this->load->view('setting/menu');
		$this->load->view('setting/'.$this->name.'/edit',$data);
        $this->load->view('inc/traineeDep/'.$this->style.'/footer',$this->data_footer);

    }
//-----------------------------------------------------------------------------------------
    public function update($idCourse) {
		$data['course']   = $_POST['course'];
        $data['type']     = $_POST['type'];
        $data['target']   = $_POST['target'];
        $data['amount']   = $_POST['amount'];
        $this->model->update($this->name, $data,'idCourse',$idCourse);
        
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
                location = "<?php echo base_url($this->name.'/edit/' . $idCourse . '/edit'); ?>";
            }
            setTimeout('goback()', 1500);
            //-->
        </script>
        <?php
        $this->load->view('inc/traineeDep/'.$this->style.'/footer',$this->data_footer);
    		
	}
//-----------------------------------------------------------------------------------------
    public function delet($idCourse) {
        $this->model->delet($this->name, 'idCourse', $idCourse);
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
   public function array_delet($idCourse) {
        
		if(isset($_POST['delet']) AND $_POST['delet'] != null){

		$id_delet = $_POST['delet'];
			foreach($id_delet as $idCourse){
			$this->model->delet($this->name, 'idCourse', $idCourse);
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
}