<?php
/*
 * This file is part of the sfPropelActAsNestedSetBehavior package.
 * 
 * (c) 2006-2007 Tristan Rivoallan <tristan@rivoallan.net>
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * Subclass for representing a row from the 'resource_attribute_version' table.
 *
 * 
 *
 * @package plugins.sfPropelVersionableBehaviorPlugin.lib.model
 */ 
class ResourceAttributeVersion extends BaseResourceAttributeVersion
{
  public function getResourceVersions()
  {
    $c = new Criteria();
    $c->add(ResourceAttributeVersionHashPeer::RESOURCE_ATTRIBUTE_VERSION_ID, $this->getId());
    $c->addJoin(ResourceAttributeVersionHashPeer::RESOURCE_VERSION_ID, ResourceVersionPeer::ID);
    
    return ResourceVersionPeer::doSelect($c);
  }
}
