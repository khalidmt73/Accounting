<?php 
defined('BASEPATH') OR exit('No direct script access allowed');
//ob_start();
class Mpages
{
		private  $noPage       ='';
		private  $countRecord  ='';
		private  $recordAtPage ='';
		private  $pagesCount   ='';
        private  $startRecord  ='';
		
		private  $frist        ="<nav> <ul class='pagination'>";
		private  $sec		   ="<li><a href=";
		private	$three         ="/1><</a></li>";
		private	$four          ="<li class='active'><a  href=";
		private  $slash        = "/";
		private  $qul          = " > ";
		private  $ali          = "</a></li>";
		private  $liahrf       = "<li><a href=";

public function __construct()
	{
		$CI =& get_instance();
		$CI->load->helper('url');
	}
public  function mulitiPages($noPage=1,$countRecord='',$recordAtPage='') {
        $this->recordAtPage = $recordAtPage;
        $this->noPage = (int) $noPage;
        $this->countRecord = $countRecord;
        $this->pagesCount = (int) ceil($countRecord / $recordAtPage);
        if (($noPage > $this->pagesCount) || ($noPage <= 0 )) {
        }
        return $this->startRecord = ( ($noPage - 1) * $recordAtPage );
       }
 public  function pagesPrint($page) {
        $result = '';
		$noPage = $this->noPage;
        
         $result .= $this->frist;
        if ($noPage > 2) {
            $result .= $this->sec .$page.$this->three;
        }
        if ($noPage == 0) {
            $noPage = 1;
        }
        if ($noPage > 0) {
            $noPage = $noPage - 1;
        }
      
		$bgpage = $noPage + 3;
        for ($i = $noPage; $i <= $bgpage && $i <= $this->pagesCount; $i++) {
            if ($i > 0) {
                $nextpage = $this->recordAtPage * ($i - 1);
                
				if ($nextpage == $this->startRecord) {
                    $result .=$this->four.$page. $this->slash . $i . $this->qul. $i .$this->ali ;
                } else {
                    $result .= $this->liahrf .$page. $this->slash . $i .$this->qul. $i .$this->ali;
                }
            }
        }

        if (!( ($this->startRecord / $this->recordAtPage) == ($this->pagesCount - 1) ) && ($this->pagesCount != 1)) {
            $nextpage = ($this->pagesCount * $this->recordAtPage) - $this->recordAtPage;
            return $result .= $this->liahrf  . $page.$this->slash . $this->pagesCount .$this->qul.$this->qul.$this->ali;
        }
		elseif (( ($this->startRecord / $this->recordAtPage) == 0)) {
            return $result .= "";
		}
		else {
            return $result .= "";
        }
    }
}
?>