<?php
/**
 * extJs Toolbar Menu
 */
class ImmExtjsToolbarMenu
{
	public $attributes=array();
	
	public $immExtjs=null;	
	public $containerObject=null;		
							
	public function __construct($containerObject)
	{		
		$this->immExtjs=ImmExtjs::getInstance();
		
		$this->containerObject=$containerObject;
	}
	
	public function addMember($item)
	{
		if(isset($item['separator']))
		{
			$this->attributes['items'][]=$this->immExtjs->asVar("'-'");		
		}
		else {
			$this->attributes['items'][]=$item;		
		}
	}
	
	public function end()
	{						
		$this->containerObject->addMember($this->attributes);
	}
}
?>