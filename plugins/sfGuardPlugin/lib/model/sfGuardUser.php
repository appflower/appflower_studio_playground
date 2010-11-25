<?php
class sfGuardUser extends PluginsfGuardUser
{
	public function getName()
	{
		return $this->getFirstName().' '.$this->getLastName();
	}
	
	public function getAccount()
	{		
		if($this->getId() == 1 )return 'admin';
		else return  sprintf("user%04s", $this->getId());
	}
	
	
	public function getFirstName() {
		return $this->getProfile()->getFirstName();
	}
	
	public function getLastName() {
		return $this->getProfile()->getLastName();
	}
	
	public function getLogin($format = 'Y-m-d H:i:s')
	{
		if(!is_null($this->getLastLogin($format)))
		{
			return $this->getLastLogin($format);
		}
		else
		{
			return 'Never logged in';
		}
	}

	public function getHtmlStatus() {
		sfProjectConfiguration::getActive()->loadHelpers(array("Url","Tag","Asset","Javascript"));
		if($this->getIsActive())
		{
			return image_tag('famfamfam/user_green', array('title' => 'User is active'));
		}
		else
		{
			return image_tag('famfamfam/user_red', array('title' => 'User is inactive'));
		}
	}

	public function setIsActive($v) {
		if($this->getId() == 1 && !$v) {
			// admin cannot be disabled
			return $this;
		}
		return parent::setIsActive($v);
	}

    /**
	 * Generate a html code containing a bar, to represent the percent of closed tickets
     * @return  String A html code containing a bar, to represent the percent of closed tickets
	 */
    public function getHtmlClosedTickets() {
        $total = TicketPeer::doCount(TicketPeer::fetchFilteredTicketsList(array('user_id' => $this->getId())));
        $x = TicketPeer::doCount(TicketPeer::fetchFilteredTicketsList(array('status' => 'closed', 'user_id' => $this->getId())));
        $percent = ($x != 0) ? intval((100 * $x) / $total) : 0;

        return "<div style=\"float:left;\"><a href=\"".sfContext::getInstance()->getController()->genUrl('/ticket/list?status=closed&user_id='.$this->getId(), true)."\">$x</a> of <a href=\"".sfContext::getInstance()->getController()->genUrl('/ticket/list?user_id='.$this->getId(), true)."\">$total</a> </div><div style=\"width:90%;border:1px solid black;float:left;\"><div style=\"width:$percent%;background-color:blue;\">&nbsp;</div></div> <div style=\"float:left;\"> &nbsp;$percent%</div>";
    }

}
