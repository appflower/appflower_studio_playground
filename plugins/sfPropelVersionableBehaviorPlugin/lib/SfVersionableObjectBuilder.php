<?php

require_once sfConfig::get('sf_symfony_lib_dir').'/addon/propel/builder/SfObjectBuilder.php';

class SfVersionableObjectBuilder extends SfObjectBuilder
{
  /**
   * Adds the method that initializes the referrer fkey collection.
   * @param      string &$script The script will be modified in this method.
   */
  protected function addRefFKInit(&$script, ForeignKey $refFK)
  {

    $relCol = $this->getRefFKPhpNameAffix($refFK, $plural = true);
    $collName = $this->getRefFKCollVarName($refFK);

    $script .= "
  /**
   * Temporary storage of $collName to save a possible db hit in
   * the event objects are add to the collection, but the
   * complete collection is never requested.
   * @return     void
   */
  public function init$relCol(\$force = false)
  {
    if (\$this->$collName === null || \$force)
    {
      \$this->$collName = array();
    }
  }
";
  }
}