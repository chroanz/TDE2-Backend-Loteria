<?php

class Conexao
{
  private static $conexao;

  public static function getConn()
  {
    if (!isset(self::$conexao)) {
      self::$conexao = new \PDO('mysql:host=localhost;dbname=loteria', 'root', '');
    }
    return self::$conexao;
  }
}