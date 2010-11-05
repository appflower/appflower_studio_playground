<?php
/*
 * This file is part of the sfPropelVersionableBehaviorPlugin package.
 * 
 * (c) 2007 Tristan Rivoallan <tristan@rivoallan.net>
 * 
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

sfPropelBehavior::registerHooks('versionable', array(
  ':save:pre'      => array('sfPropelVersionableBehavior', 'preSave'),
  ':save:post'     => array('sfPropelVersionableBehavior', 'postSave'),
  ':delete:post'   => array('sfPropelVersionableBehavior', 'postDelete'),
));

sfPropelBehavior::registerMethods('versionable', array (
  array (
    'sfPropelVersionableBehavior',
    'toVersion'
  ),
  array (
    'sfPropelVersionableBehavior',
    'isLastVersion'
  ),
  array (
    'sfPropelVersionableBehavior',
    'getAllVersions'
  ),
  array (
    'sfPropelVersionableBehavior',
    'getAllResourceVersions'
  ),
  array (
    'sfPropelVersionableBehavior',
    'getLastResourceVersion'
  ),
  array (
    'sfPropelVersionableBehavior',
    'getCurrentResourceVersion'
  ),
  array (
    'sfPropelVersionableBehavior',
    'getResourceVersion'
  ),
  array (
    'sfPropelVersionableBehavior',
    'setVersion'
  ),
  array (
    'sfPropelVersionableBehavior',
    'getVersion'
  ),
  array (
    'sfPropelVersionableBehavior',
    'setVersionComment'
  ),
  array (
    'sfPropelVersionableBehavior',
    'getVersionComment'
  ),
  array (
    'sfPropelVersionableBehavior',
    'setVersionCreatedBy'
  ),
  array (
    'sfPropelVersionableBehavior',
    'getVersionCreatedBy'
  ),
  array (
    'sfPropelVersionableBehavior',
    'getVersionCreatedAt'
  ),
  array (
    'sfPropelVersionableBehavior',
    'addVersion'
  ),
));