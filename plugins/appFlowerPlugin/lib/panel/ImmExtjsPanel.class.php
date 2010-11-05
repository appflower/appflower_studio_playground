<?php
/**
 * extJs panel
 *
 */
class ImmExtjsPanel
{
	/**
	 * default attributes for the window
	 */
	public $attributes=array('border'=>false,'header'=>false,'style'=>'padding:5px;','idxml'=>false);
	
	public $immExtjs=null;	
	public $privateName=null;
							
	public function __construct($attributes=array())
	{		
		
		$this->immExtjs=ImmExtjs::getInstance();
		$this->immExtjs->setAddons(array('js'=>array('/appFlowerPlugin/js/custom/cheatJS.js')));
		$this->privateName='panel_'.Util::makeRandomKey();
		
		$this->attributes['id']=$this->privateName;
		
		if(isset($attributes['idxml'])&&$attributes['idxml'])
		{
			$this->attributes['id']=$attributes['idxml'];
		}
		
		if(isset($attributes['plugins'])){			
			$this->attributes['plugins'][] = $attributes['plugins'];
			unset($attributes['plugins']);			
		}				
		if(isset($attributes['portal'])&&$attributes['portal']==true)
		{
			
			$this->attributes=array_merge($this->attributes,array('anchor'=> '100%',
															'frame'=>true,
															'collapsible'=>true,
															'draggable'=>true,
															'maximizable'=>true,
															
															'cls'=>'x-portlet'));
			$this->attributes['plugins'][] = 'new Ext.ux.MaximizeTool()';												
			unset($attributes['portal']);
		}
		
		if(isset($attributes['tools']))
		{
			$this->attributes['tools']=$attributes['tools']->end();
			
			unset($attributes['tools']);
		}
		
		$this->attributes['getWidgetConfig']=$this->immExtjs->asMethod("var o={}; o.idxml=this.idxml || false; return o;");
		
		if(count($attributes)>0)
		$this->attributes=array_merge($this->attributes,$attributes);
		
		if((isset($attributes['autoEnd'])&&$attributes['autoEnd'])||!isset($attributes['autoEnd']))
		{
			$this->end();
		}
	}
	
	public function addHelp($html)
	{
		if(!isset($this->attributes['tbar']))
		{
			$this->attributes['tbar']=array();
		}
		
		$panel=new ImmExtjsPanel(array('html'=>'<div style="white-space:normal;">'.$html.'</div>','listeners'=>array('render'=>$this->immExtjs->asMethod(array("parameters"=>"panel","source"=>"if(panel.body){panel.body.dom.style.border='0px';panel.body.dom.style.background='transparent';}")))));
		$this->attributes['listeners']['render']=$this->immExtjs->asMethod("var tb;if(this.getTopToolbar()&&this.getTopToolbar().items.items.length==0){tb = this.getTopToolbar();tb.addItem(".$panel->privateName.");}else{ tb = new Ext.Toolbar({renderTo: this.tbar,items: [".$panel->privateName."]});}if(tb&&tb.container){tb.container.addClass('tbarBottomBorderFix');}");
	}
		
	public function addMember($item)
	{
		$this->attributes['items'][]=$this->immExtjs->asAnonymousClass($item);
	}
	
	public function end()
	{			
		$this->immExtjs->private[$this->privateName]=$this->immExtjs->Panel($this->attributes);
	}
}
?>
