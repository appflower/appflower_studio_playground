<?php

class sfGuardUserProfilePeer extends BasesfGuardUserProfilePeer
{
	public static function getProfilesWithCustomer($uids) {
		
		$c = new Criteria();
		$c->add(self::USER_ID,$uids,Criteria::IN);
		$c->addAscendingOrderByColumn(CustomerPeer::NAME);
		return self::doSelectJoinCustomer($c);
		
	}
	/**
	 * gets all the profiles that are developers
	 *
	 * @author radu
	 */
	public static function getDevelopers()
	{
		$c = new Criteria();
		$c->add(self::IS_DEVELOPER,1);
		return self::doSelectJoinsfGuardUser($c);
	}
}
