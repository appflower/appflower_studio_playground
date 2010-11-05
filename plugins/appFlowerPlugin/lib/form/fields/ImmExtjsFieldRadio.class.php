<?php
/**
 * extJs Form Field Radio
 */
class ImmExtjsFieldRadio extends ImmExtjsField
{
	public function __construct($containerObject,$attributes=array())
	{		
		$this->attributes['xtype']='radio';
		
		if(isset($attributes['label']))
		{
			$this->attributes['boxLabel']=$attributes['label'];
			
			unset($attributes['label']);
		}
		
		if(isset($attributes['value']))
		{
			$this->attributes['inputValue']=$attributes['value'];
			
			unset($attributes['value']);
		}
		
		if(isset($attributes['name']))
		{
			$this->attributes['name']=$attributes['name'];
			$this->attributes['id']=$attributes['name'].'_'.rand(0,999);
			
			unset($attributes['name']);
		}
		
		parent::__construct($containerObject,$attributes);
	}
}
?>