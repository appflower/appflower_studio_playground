<?php

class afStudioUtil
{
  public static function getRootDir()
  {
    return sfConfig::get('sf_root_dir');
  }
  
  /*
   * remove sfConfig::get('sf_root_dir') from path
   */
  public static function unRootify($path)
  {
    if (self::isInProject($path))
    {
      $path = substr($path, strlen(self::getRootDir()));
    }
    
    return trim($path, '/');
  }
  
  /*
   * add sfConfig::get('sf_root_dir') to path
   */
  public static function rootify($path)
  {
    if (!self::isInProject($path))
    {
      $path = self::join(self::getRootDir(), $path);
    }
    else
    {
      $path = self::join($path);
    }
    
    return $path;
  }
  
  public static function isInProject($path)
  {
    return strpos($path, self::getRootDir().'/') === 0;
  }
  
  public static function appExists($application)
  {
    return file_exists(self::rootify('apps/'.$application.'/config/'.$application.'Configuration.class.php'));
  }
  
  public static function join()
  {
    $parts = func_get_args();

    /*
     * Join path parts with $separator
     */
    $dirtyPath = implode('/', $parts);
    
    if(strpos($dirtyPath, '//') !== false)
    {
      $dirtyPath = preg_replace('|(/{2,})|', '/', $dirtyPath);
    }

    $cleanPath = '/'.trim($dirtyPath, '/');
    
    return $cleanPath;
  }
  
  /*
   * Returns the value of an array, if the key exists
   */
  public static function getValueFromArrayKey($array, $key, $default = null, $defaultIfNull = false)
  {
    if (!is_array($array))
    {
      return $default;
    }

    if (false === $defaultIfNull)
    {
      if(isset($array[$key]))
      {
        return $array[$key];
      }
      else
      {
        return $default;
      }
    }

    if(!empty($array[$key]))
    {
      return $array[$key];
    }
    else
    {
      return $default;
    }
  }
  
  
	public static function objectToArray($object)
	{	
		if(is_array($object) || is_object($object))
		{
		
			$array = array();			
			foreach($object as $key => $value)			
			{			
				$array[$key] = object_to_array($value);			
			}
			
			return $array;
		}
		
		return $object;
	}
}