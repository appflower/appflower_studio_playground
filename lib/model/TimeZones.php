<?php

/**
 * Subclass for representing a row from the 'timezones' table.
 *
 * 
 *
 * @package lib.model
 */ 
class TimeZones extends BaseTimeZones
{
	public function __toString() {
		return $this->getName();
	}
}
