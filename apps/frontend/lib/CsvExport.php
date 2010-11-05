<?php 
/**
 * exporting some array to CSV
 * @author radu
 */
class CsvExport {
	var $s='';
	
	function escapeCSV($str){  
	  if(preg_match("/[,\"\n\r]/", $str) > 0) {
	    $str = '"'.str_replace('"', '""', $str).'"';
	  }   
	  
	  if($str == ""){
	    $str = '""';
	  }
	  
	  return $str;
	}
	
	function toCSV ($t){
	
	  $row='';	
		
	  foreach($t as $item){
	     $row = $row . "," . $this->escapeCSV($item);    
	  }
	  
	  $row = substr($row, 1); //remove a primeira vírgula  
	  
	  $this->s.=$row."\n";
	}
		
	function download($filename) {
	  header("Pragma: public");
	  header("Expires: 0");
	  header("Cache-Control: must-revalidate, post-check=0, pre-check=0");
	  header("Content-Type: application/force-download");
	  header("Content-Type: application/octet-stream");
	  header("Content-Type: application/download");;
	  header("Content-Disposition: attachment;filename=$filename ");
	  header("Content-Transfer-Encoding: binary ");
	  $this->write();
	  die();
	}
	
	function write() {
	  echo $this->s = $this->s;	  
	}
} 
?>