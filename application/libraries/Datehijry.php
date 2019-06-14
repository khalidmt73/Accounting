<?php
defined('BASEPATH') OR exit('No direct script access allowed');


// ------------------------------------------------------------------------

class Datehijry
{

public function __construct(){

}


public static function  g2h($gre,$type="all") {
	list($d, $m, $y) = explode('/', $gre);
	if (($y>1582)||(($y==1582)&&($m>10))||(($y==1582)&&($m==10)&&($d>14))){
	$jd=(int)((1461*($y+4800+(int)(($m-14)/12)))/4)+(int)((367*($m-2-12*((int)(($m-14)/12))))/12)-(int)((3*((int)(($y+4900+(int)(($m-14)/12))/100)))/4)+$d-32074;
	}else{
	$jd = 367*$y-(int)((7*($y+5001+(int)(($m-9)/7)))/4)+(int)((275*$m)/9)+$d+1729777;
	}
	$l=$jd-1948440+10632;
	$n=(int)(($l-1)/10631);
	$l=$l-10631*$n+354;
	$j=((int)((10985-$l)/5316))*((int)((50*$l)/17719))+((int)($l/5670))*((int)((43*$l)/15238));
	$l=$l-((int)((30-$j)/15))*((int)((17719*$j)/50))-((int)($j/16))*((int)((15238*$j)/43))+29 ;
	$m=(int)((24*$l)/709);
	$d=$l-(int)((709*$m)/24);
	$y=30*$n+$j-30;
	$araay = array(1,2,3,4,5,6,7,8,9);

	if (in_array($d,$araay)) {$d='0'.$d;}
	if (in_array($m,$araay)) {$m='0'.$m;}
	if ($type=="all") {return "$y-$m-$d";}
	elseif ($type=="dd") {return "$d";}
	elseif ($type=="mm") {return "$m";}
	elseif ($type=="yy") {return "$y";}
	
}
}
//echo g2h(date("d/m/Y",time()))."<br />";
//echo g2h(date("d/m/Y",time()),"dd")."<br />";
//echo g2h(date("d/m/Y",time()),"mm")."<br />";
//echo g2h(date("d/m/Y",time()),"yy");  

?>