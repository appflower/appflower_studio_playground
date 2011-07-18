<?php

/**
 * pages actions.
 *
 * @package    manager
 * @subpackage pages
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 12479 2008-10-31 10:54:40Z fabien $
 */
class pagesActions extends CustomActions
{
  public function executeInsufficientCredentials()
  {  	
    if ($this->getRequest()->isXmlHttpRequest()) {
        return JsonUtil::renderFailure($this, '<b style="color:red">You do not have sufficient credentials to do the action.<b>');
    }

    $this->init = true;
	$this->title = "Insufficient Credentials";
	$this->html = "<div style = 'padding:10px;text-align:center; font-weight:bold;height:100px; padding-top:30px;color:red'>You do not have sufficient credentials to view this page</div>";
	$this->current = 1;
	$this->id = $this->getRequestParameter('id','new');
	$parser = new XmlParser(true);
    $this->layout = $parser->getLayout();
    $this->setLayout("layoutExtjs");
    $this->setTemplate("ext");
    return sfView::SUCCESS;
  }	

  public function executeError404Page()
  {  	
    $this->init = true;
	$this->title = "Page Not Found";
	$this->html = "<div style = 'padding:10px;text-align:center; font-weight:bold;height:100px; padding-top:30px;color:red'>The requested page not found.</div>";
	$this->current = 1;
	$this->id = $this->getRequestParameter('id','new');
	$parser = new XmlParser(true);
    $this->layout = $parser->getLayout();
    $this->setLayout("layoutExtjs");
    $this->setTemplate("ext");
    return sfView::SUCCESS;
  }	

  public function executeError500Page()
  {  	
    $this->init = true;
	$this->title = "Internal Server Error";
	$this->html = "<div style = 'padding:10px;text-align:center; height:100px; padding-top:30px;color:red'><b>The page can not be displayed.</b><br>Some internal server error has occured.</div>";
	$this->current = 1;
	$this->id = $this->getRequestParameter('id','new');
	$parser = new XmlParser(true);
    $this->layout = $parser->getLayout();
    $this->setLayout("layoutExtjs");
    $this->setTemplate("ext");
    return sfView::SUCCESS;
  }		

  public function executeTabs()
  {  	
    return XmlParser::layoutExt($this, XmlParser::PAGE);
  }

  public function executeDashboard()
  {  	 	
    return XmlParser::layoutExt($this, XmlParser::PAGE);
  }
}
