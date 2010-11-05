<?php

class sfGuardUserProfile extends BasesfGuardUserProfile
{
	public function __toString()
	{
		return $this->getFullName();
	}
	
    function getFullName()
    {
        return $this->getFirstName() . ' ' . $this->getLastName();
    }
}
