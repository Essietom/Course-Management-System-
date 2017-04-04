<?php
class Database
{
  private static $DBhost='localhost';
  private static $DBname='coursemgt';
  private static $DBuname='root';
  private static $DBpword='';

  private static $cont=null ;

  public function __construct()
  {
    die("you can't initiate this function");
  }

  public static function connect()
  {
    if (null==self::$cont)
    {
      try 
      {
        self::$cont=new PDO("mysql:host=".self::$DBhost.";dbname=".self::$DBname,self::$DBuname,self::$DBpword);
      }
      catch(PDOException $e)
      {
        die($e->getMessage());
      }
    }
    return self::$cont;
  }
  public static function disconnect()
  {
    return self::$cont=null;
  }



}
?>