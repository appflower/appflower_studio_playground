<?php
/**
 * afStudioConsole
 *
 */
class afStudioConsole
{
	public static
    $defaultCommands = 'sf batch man ll ls pwd cat mkdir rm cp mv touch chmod free df find clear php';
	
	public function __construct()
	{
		$filesystem=new afStudioFilesystem();
		
		$this->uname = php_uname();
		
		$result=$filesystem->execute('whoami');
		
		if(strlen($result[1])==0)
		{
			$this->whoami = trim($result[0]);
		}
		else
		{
		  $this->whoami = 'unknown_user';
		}
		
		$result=$filesystem->execute('pwd');
		
		$this->pwd =  (strlen($result[1])==0)? $result[0] : '';
		
		$this->prompt = $this->whoami.'@'.php_uname('n').':'.'~/'.afStudioUtil::unRootify($this->pwd).'$&nbsp;';
	}

	public static function getCommands($explode=true)
	{
		if($explode)
		{
			return explode(' ', sfConfig::get('afStudio_console_commands', self::$defaultCommands));
		}
		else {
			return sfConfig::get('afStudio_console_commands', self::$defaultCommands);
		}
	}
	
	public static function getAliases()
	{
		return sfConfig::get('afStudio_console_aliases', array('ll' => 'ls -l'));
	}
	
	public function execute($commands)
	{
		if($commands!='start')
		{		
			if(!is_array($commands))
			{
				$commandsArray[]=$commands;
			}
			else {
				$commandsArray=$commands;
			}
			
			$result=array();
		
		
			foreach ($commandsArray as $command)
			{		
				if (substr($command, 0, 2) == "sf")
				{
				  $prefix='symfony ';
				  $command = substr($command, 3);
				  $exec = sprintf('%s "%s" %s', sfToolkit::getPhpCli(), afStudioUtil::getRootDir().'/symfony', $command);
				}
				elseif (substr($command, 0, 5) == "batch")
				{
				  $prefix='../batch/';
				  $command = substr($command, 6);
				  if($command=='')
				  {
				  	$files=sfFinder::type('file')->name('*.*')->in(afStudioUtil::getRootDir().'/batch/');
				  	foreach ($files as $file)
				  	{
				  		$baseFiles[]=basename($file);
				  	}
				  	$result[]=$this->renderCommand('../batch/<file>').'<li class=\'afStudio_result_command\'><b>Usage:</b> batch "file"<br><b>Found batches:</b> '.implode('; ',$baseFiles).'</li>';
				  }
				  else {
				  	$exec = sprintf('%s%s', afStudioUtil::getRootDir().'/batch/', $command);
				  }
				}
				else
				{
				  $prefix='';
				  $parts = explode(" ", $command);
				  $parts[0] = afStudioUtil::getValueFromArrayKey(self::getAliases(), $parts[0], $parts[0]);
				  $command = implode(" ", $parts);
				  $parts = explode(" ", $command);
				  $command = afStudioUtil::getValueFromArrayKey(self::getAliases(), $command, $command);
				  if (!in_array($parts[0], self::getCommands()))
				    $result[]=sprintf(
				      "%s<li>This command is not available. You can do : <strong>%s</strong></li>",
				      $this->renderCommand($prefix.$command), implode(' ', self::getCommands())
				    );
				  $exec = sprintf('%s', $command);
				}
				
				if(isset($exec))
				{
					ob_start();
					passthru('sudo '.$exec.' 2>&1', $return);
					$raw = ob_get_clean();
				
				
					if ($return > 0)
					{
					  $result[]=$this->renderCommand($prefix.$command)."<li class='afStudio_result_command'>".$raw."</li>";
					}
					else {
						$arr = explode("\n", $raw);
						$result[] = $this->renderCommand($prefix.$command);
						foreach($arr as $a)
						{
						  $res[] = "<li class='afStudio_result_command'>".$a."</li>";
						}
						if($res)
						{
							$result[]=implode('',$res);
						}
					}
				}
			}
		}
		else {
			$result[]='<li>'.sprintf("Logged as %s on %s", $this->whoami, $this->uname).'</li>';
			$result[]='<li>'.str_repeat("-", 20).'</li>';
			$result[]='<li>'."Current working directory : ".$this->pwd.'</li>';
    		$result[]='<li>'."Commands Available :".'</li>';
    		$result[]='<li>'."<strong>".self::getCommands(false)."</strong>".'</li>';
    		$result[]='<li>'."Symfony commands can be run by prefixing with sf<br />Example: sf cc ( clear cache )".'</li>';
    		$result[]='<li>'.str_repeat("-", 20).'</li>';
		}
		
		return implode('',$result);
	}
	
	protected function renderCommand($command)
	{
		return '<li class="afStudio_command_user">'.$this->prompt.$command.'</li>';
	}
}
?>