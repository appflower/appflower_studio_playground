<?php

if (!in_array('sfDoctrinePlugin', sfProjectConfiguration::getActive()->getPlugins()))
{
  return false;
}

require_once dirname(__FILE__).'/sfTaskExtraDoctrineBaseTask.class.php';

/**
 * Wraps the Doctrine compiler.
 *
 * @package     sfTaskExtraPlugin
 * @subpackage  task
 * @author      Kris Wallsmith <kris.wallsmith@symfony-project.com>
 * @version     SVN: $Id: sfTaskExtraDoctrineBaseTask.class.php 28187 2010-02-22 16:53:57Z Kris.Wallsmith $
 */
class sfDoctrineCompileTask extends sfTaskExtraDoctrineBaseTask
{
  public function configure()
  {
    $this->addArguments(array(
      new sfCommandArgument('target', sfCommandArgument::OPTIONAL, 'Where to save the compiled file'),
    ));

    $this->addOptions(array(
      new sfCommandOption('driver', null, sfCommandOption::PARAMETER_REQUIRED | sfCommandOption::IS_ARRAY, 'Include this driver'),
    ));

    $this->namespace = 'doctrine';
    $this->name = 'compile';

    $this->briefDescription = 'Compiles the Doctrine core into a single file';

    $this->detailedDescription = <<<EOF
The [doctrine:compile|INFO] task compiles the Doctrine core into a single file:

    [php symfony doctrine:compile|INFO]

You can specify where the compiled file should be saved by providing a [target|COMMENT]
argument:

    [php symfony doctrine:compile lib/doctrine.compiled.php|INFO]

You can specify which database drivers to include in the compiled file by
adding one or more [--driver|COMMENT] options:

    [php symfony doctrine:compile --driver=mysql|INFO]
EOF;
  }

  public function execute($arguments = array(), $options = array())
  {
    $databaseManager = new sfDatabaseManager($this->configuration);

    $message = 'Compiling the Doctrine core';
    if ($options['driver'])
    {
      $message .= ' with driver(s) "'.implode('", "', $options['driver']).'"';
    }
    $this->logSection('doctrine', $message);

    $target = Doctrine_Core::compile($arguments['target'], $options['driver']);
    $target = realpath($target);

    $targetPhp = var_export($target, true);
    foreach (array('sf_symfony_lib_dir', 'sf_lib_dir', 'sf_root_dir') as $name)
    {
      $path = sfConfig::get($name);
      if (0 === strpos($target, $path))
      {
        $targetPhp = "sfConfig::get('$name').".var_export(substr($target, strlen($path)), true);
        break;
      }
    }

    $this->log(<<<EOF

Doctrine compilation complete. Add the following code to ProjectConfiguration:

  public function setup()
  {
    // ...

    if (\$this instanceof sfApplicationConfiguration && !\$this->isDebug())
    {
      require_once $targetPhp;
    }
  }

EOF
    );
  }
}
