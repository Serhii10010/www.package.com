<?php

namespace App\Setters;

class EnvironmentSetter
{
  public static function setEnvironmentValue($envKey, $envValue)
  {
     $envFile = app()->environmentFilePath();
     $str = file_get_contents($envFile);

     $oldValue = strtok($str, "{$envKey}=");

     $str = str_replace("{$envKey}={$oldValue}", "{$envKey}={$envValue}\n", $str);

     $fp = fopen($envFile, 'w');
     fwrite($fp, $str);
     fclose($fp);
  }
}

?>
