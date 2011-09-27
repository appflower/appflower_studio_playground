<?php
/**
 * Pages actions class
 *
 * @package    Studio Playground
 * @subpackage pages
 */
class pagesActions extends CustomActions
{
    /**
     * Check creadentials
     *
     * @param sfWebRequest $request 
     */
    public function executeInsufficientCredentials(sfWebRequest $request)
    {
        if ($request->isXmlHttpRequest()) {
            return JsonUtil::renderFailure($this, '<b style="color:red">You do not have sufficient credentials to do the action.<b>');
        }
        
        $this->init = true;
        $this->title = "Insufficient Credentials";
        $this->html = "<div style = 'padding:10px;text-align:center; font-weight:bold;height:100px; padding-top:30px;color:red'>You do not have sufficient credentials to view this page</div>";
        $this->current = 1;
        $this->id = $request->getParameter('id', 'new');
        $parser = new XmlParser(true);
        $this->layout = $parser->getLayout();
        $this->setLayout("layoutExtjs");
        $this->setTemplate("ext");
        
        return sfView::SUCCESS;
    }
    
    /**
     * Error 404 action
     *
     * @param sfWebRequest $request 
     */
    public function executeError404Page(sfWebRequest $request)
    {
        $this->init = true;
        $this->title = "Page Not Found";
        $this->html = "<div style = 'padding:10px;text-align:center; font-weight:bold;height:100px; padding-top:30px;color:red'>The requested page not found.</div>";
        $this->current = 1;
        $this->id = $request->getParameter('id', 'new');
        $parser = new XmlParser(true);
        $this->layout = $parser->getLayout();
        $this->setLayout("layoutExtjs");
        $this->setTemplate("ext");
        
        return sfView::SUCCESS;
    }
    
    /**
     * Error 500 page
     *
     * @param sfWebRequest $request 
     */
    public function executeError500Page(sfWebRequest $request)
    {
        $this->init = true;
        $this->title = "Internal Server Error";
        $this->html = "<div style = 'padding:10px;text-align:center; height:100px; padding-top:30px;color:red'><b>The page can not be displayed.</b><br>Some internal server error has occured.</div>";
        $this->current = 1;
        $this->id = $request->getParameter('id', 'new');
        $parser = new XmlParser(true);
        $this->layout = $parser->getLayout();
        $this->setLayout("layoutExtjs");
        $this->setTemplate("ext");
        
        return sfView::SUCCESS;
    }
    
    /**
     * Dashboard action 
     */
    public function executeDashboard() {}
    
}
