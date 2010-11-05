<?php

/**
 *
 * @package    appFlowerStudio
 * @subpackage plugin
 * @author     radu@immune.dk
 */
class appFlowerStudioActions extends sfActions
{
	public function preExecute()
	{
		
	}	
		
	public function executeIndex()
	{
		
	}
	
	public function executeStudio()
	{
		
	}
			
	public function executeCodepress($request)
	{
		$this->codepress_path=$this->immExtjs->getExamplesDir().'codepress/';
		
		$this->language=(($this->hasRequestParameter('language')&&$this->getRequestParameter('language')!='undefined')?$this->getRequestParameter('language'):'generic');
		
		return $this->renderPartial('codepress');		
	}
	
	public function executeFilecontent($request)
	{
		$file=$this->hasRequestParameter('file')?$this->getRequestParameter('file'):false;
		$code=$this->hasRequestParameter('code')?$this->getRequestParameter('code'):false;
				
		if($this->getRequest()->getMethod()==sfRequest::POST)
  		{
  			if($file&&$code)
  			{
  				$file=str_replace('root',$this->realRoot,$file);
  				
  				if(is_writable($file))
  				{
  					if(@file_put_contents($file,$code))
					{
						return $this->renderText('');
					}
					else {
						$this->redirect404();
					}
  				}
  				else {
					$this->redirect404();
				}
  			}
  			else {
				$this->redirect404();
			}  			
  		}
  		else {
		
			if($file)
			{
				$file=str_replace('root',$this->realRoot,$file);
				
				$file_content=@file_get_contents($file);
			
				if($file_content)
				{
					return $this->renderText($file_content);
				}
				else {
					$this->redirect404();
				}
			}
			else {
				$this->redirect404();
			}		
  		}
	}
	
	public function executeFiletree()
	{
		$filetree_command=new ImmExtjsFileTreeCommand($this->realRoot);
		
		return $this->renderText($filetree_command->end());
	}
	
	public function executeModels()
	{
		$models_command=new afStudioModelsCommand();
		
		return $this->renderText($models_command->end());
	}

	public function executeConsole(sfWebRequest $request)
	{
		$command = trim($request->getParameter("command"));
		
		$afConsole=new afStudioConsole();
		$result=$afConsole->execute($command);		
		
		return $this->renderJson(array('console'=>$result));
	}
	
	protected function renderJson($result)
	{
		 return $this->renderText(json_encode($result));
	}
}
