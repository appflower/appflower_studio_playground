<?php

/**
 * Subclass for representing a row from the 'changelog' table.
 *
 * 
 * @author radu
 * @package lib.model
 */ 
class Changelog extends BaseChangelog
{
	public function getUserName()
    {
        $sf_guard_user_profile = sfGuardUserProfilePeer::retrieveByPk($this->getUserId());
        if( $sf_guard_user_profile ) 
        {
            return $sf_guard_user_profile->getFirstName() ." ". $sf_guard_user_profile->getLastName();
        }
       
        return "Anonymous";
    }
    
    public function getHtmlUserCommitMsg()
    {
    	if($this->getObjectLink()==null)
    	{
    		return '';
    	}else{
			return '<a href="'.sfContext::getInstance()->getController()->genUrl($this->getObjectLink(), true).'" > '.$this->getUserCommitMsg().' </a>';
    	}
    }
    
	public function getHtmlChanges()
    {
		return '<a href="'.sfContext::getInstance()->getController()->genUrl('/auditLog/viewChanges?id='.$this->getId(), true).'" > Changes </a>';
    }
    
	public function getHtmlIcon()
    {
    	$css='';
    	switch($this->getObjectChangeType())
    	{
    		case 1:
    			switch($this->getObjectName()) {
    				case 'Ticket':
    					$css = 'icon-bug-add';
    					break;
    				case 'TicketComment':
    					$css = 'icon-comment-add';
    					break;
    				case 'Timetrack':
    					$css = 'icon-clock-add';
    					break;
    				default:
    					$css = 'nade-add';
    					break;
    			}
    			break;
    		case -1:
    			$css = 'icon-delete';
    			break;
    		case 0:
    			$css = 'icon-edit';
    			break;
    	}

		return '<div class="'.$css.'" style="width:16px;height:16px"> </div> ';
    }
}
