<?php

/**
 * Subclass for performing query and update operations on the 'timezones' table.
 *
 * 
 *
 * @package lib.model
 */ 
class TimeZonesPeer extends BaseTimeZonesPeer
{
	
	public static function fetchEm() {
		$c = new Criteria();
		$c->addDescendingOrderByColumn(self::UPDATED_AT);
		return $c;
	}
	
	public static function getAllByOffset() {
		
		$c = new Criteria();
		$c->addAscendingOrderByColumn(self::OFFSET);
		return self::doSelect($c);
		
	}	
	
	public static function getAllAsOptions() {
		
		$c = new Criteria();
		$c->addAscendingOrderByColumn(self::OFFSET);
		$tmp = self::doSelect($c);
		
		foreach($tmp as $zone) {
			$ret[$zone->getId()] = $zone->getName();
		}
		
		return $ret;
	}
	
	public static function getGMT() {
		
		$c = new Criteria();
		$c->add(self::OFFSET,0);
		return self::doSelectOne($c);
	}
	
	public static function getAll()
	{
		$timezones = self::doSelect(new Criteria());
		$timezonesArray = array();
		
		if(!is_null($timezonesArray))
		{
			foreach($timezones as $timezone)
			{
				$timezonesArray[$timezone->getId()] = htmlspecialchars($timezone->getName(),ENT_QUOTES );
			}
		}
		return $timezonesArray;		
	}
}
