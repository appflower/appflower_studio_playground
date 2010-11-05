<?php

/**
 * sfGuardUser module configuration.
 *
 * @package    ##PROJECT_NAME##
 * @subpackage sfGuardUser
 * @author     ##AUTHOR_NAME##
 * @version    SVN: $Id: configuration.php 19819 2009-07-02 11:45:11Z fabien $
 */
class BaseSfGuardUserGeneratorConfiguration extends sfModelGeneratorConfiguration
{
  public function getCredentials($action)
  {
    if (0 === strpos($action, '_'))
    {
      $action = substr($action, 1);
    }

    return isset($this->configuration['credentials'][$action]) ? $this->configuration['credentials'][$action] : array();
  }

  public function getActionsDefault()
  {
    return array();
  }

  public function getFormActions()
  {
    return array(  '_delete' => NULL,  '_list' => NULL,  '_save' => NULL,  '_save_and_add' => NULL,);
  }

  public function getNewActions()
  {
    return array();
  }

  public function getEditActions()
  {
    return array();
  }

  public function getListObjectActions()
  {
    return array(  '_edit' => NULL,  '_delete' => NULL,);
  }

  public function getListActions()
  {
    return array(  '_new' => NULL,);
  }

  public function getListBatchActions()
  {
    return array(  '_delete' => NULL,);
  }

  public function getListParams()
  {
    return '%%=username%% - %%created_at%% - %%last_login%%';
  }

  public function getListLayout()
  {
    return 'tabular';
  }

  public function getListTitle()
  {
    return 'User list';
  }

  public function getEditTitle()
  {
    return 'Editing User "%%username%%"';
  }

  public function getNewTitle()
  {
    return 'New User';
  }

  public function getFilterDisplay()
  {
    return array();
  }

  public function getFormDisplay()
  {
    return array(  'NONE' =>   array(    0 => 'username',    1 => 'password',    2 => 'password_again',  ),  'Permissions and groups' =>   array(    0 => 'is_active',    1 => 'is_super_admin',    2 => 'sf_guard_user_group_list',    3 => 'sf_guard_user_permission_list',  ),);
  }

  public function getEditDisplay()
  {
    return array();
  }

  public function getNewDisplay()
  {
    return array();
  }

  public function getListDisplay()
  {
    return array(  0 => '=username',  1 => 'created_at',  2 => 'last_login',);
  }

  public function getFieldsDefault()
  {
    return array(
      'id' => array(  'is_link' => true,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'username' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'algorithm' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'salt' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'password' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'created_at' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Date',),
      'last_login' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Date',),
      'is_active' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Boolean',),
      'is_super_admin' => array(  'is_link' => false,  'is_real' => true,  'is_partial' => false,  'is_component' => false,  'type' => 'Boolean',),
      'sf_guard_user_group_list' => array(  'is_link' => false,  'is_real' => false,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'sf_guard_user_permission_list' => array(  'is_link' => false,  'is_real' => false,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',),
      'password_again' => array(  'is_link' => false,  'is_real' => false,  'is_partial' => false,  'is_component' => false,  'type' => 'Text',  'label' => 'Password (again)',),
    );
  }

  public function getFieldsList()
  {
    return array(
      'id' => array(),
      'username' => array(),
      'algorithm' => array(),
      'salt' => array(),
      'password' => array(),
      'created_at' => array(),
      'last_login' => array(),
      'is_active' => array(),
      'is_super_admin' => array(),
      'sf_guard_user_group_list' => array(),
      'sf_guard_user_permission_list' => array(),
    );
  }

  public function getFieldsFilter()
  {
    return array(
      'id' => array(),
      'username' => array(),
      'algorithm' => array(),
      'salt' => array(),
      'password' => array(),
      'created_at' => array(),
      'last_login' => array(),
      'is_active' => array(),
      'is_super_admin' => array(),
      'sf_guard_user_group_list' => array(),
      'sf_guard_user_permission_list' => array(),
    );
  }

  public function getFieldsForm()
  {
    return array(
      'id' => array(),
      'username' => array(),
      'algorithm' => array(),
      'salt' => array(),
      'password' => array(),
      'created_at' => array(),
      'last_login' => array(),
      'is_active' => array(),
      'is_super_admin' => array(),
      'sf_guard_user_group_list' => array(),
      'sf_guard_user_permission_list' => array(),
    );
  }

  public function getFieldsEdit()
  {
    return array(
      'id' => array(),
      'username' => array(),
      'algorithm' => array(),
      'salt' => array(),
      'password' => array(),
      'created_at' => array(),
      'last_login' => array(),
      'is_active' => array(),
      'is_super_admin' => array(),
      'sf_guard_user_group_list' => array(),
      'sf_guard_user_permission_list' => array(),
    );
  }

  public function getFieldsNew()
  {
    return array(
      'id' => array(),
      'username' => array(),
      'algorithm' => array(),
      'salt' => array(),
      'password' => array(),
      'created_at' => array(),
      'last_login' => array(),
      'is_active' => array(),
      'is_super_admin' => array(),
      'sf_guard_user_group_list' => array(),
      'sf_guard_user_permission_list' => array(),
    );
  }


  /**
   * Gets a new form object.
   *
   * @param  mixed $object
   *
   * @return sfForm
   */
  public function getForm($object = null)
  {
    $class = $this->getFormClass();

    return new $class($object, $this->getFormOptions());
  }

  /**
   * Gets the form class name.
   *
   * @return string The form class name
   */
  public function getFormClass()
  {
    return 'sfGuardUserAdminForm';
  }

  public function getFormOptions()
  {
    return array();
  }

  public function hasFilterForm()
  {
    return true;
  }

  /**
   * Gets the filter form class name
   *
   * @return string The filter form class name associated with this generator
   */
  public function getFilterFormClass()
  {
    return 'sfGuardUserFormFilter';
  }

  public function getFilterForm($filters)
  {
    $class = $this->getFilterFormClass();

    return new $class($filters, $this->getFilterFormOptions());
  }

  public function getFilterFormOptions()
  {
    return array();
  }

  public function getFilterDefaults()
  {
    return array();
  }

  public function getPager($model)
  {
    $class = $this->getPagerClass();

    return new $class($model, $this->getPagerMaxPerPage());
  }

  public function getPagerClass()
  {
    return 'sfPropelPager';
  }

  public function getPagerMaxPerPage()
  {
    return 20;
  }

  public function getDefaultSort()
  {
    return array(null, null);
  }

  public function getPeerMethod()
  {
    return 'doSelect';
  }

  public function getPeerCountMethod()
  {
    return 'doCount';
  }

  public function getConnection()
  {
    return null;
  }
}
