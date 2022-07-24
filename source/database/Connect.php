<?php

namespace Source\Database;

use PDO;
use PDOException;

class Connect
{

  public const OPTIONS = [
        PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8",
        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ,
        PDO::ATTR_CASE => PDO::CASE_NATURAL
    ];

    public static $instance;

    /**
     * @return PDO
     */
    public function getInstance()
    {
        try {
            $this->connection = new PDO(
                "mysql:host=" . $_ENV['DB_HOST'] . ";dbname=" . $_ENV['DB_DATABASE'],
                $_ENV['DB_USERNAME'],
                $_ENV['DB_PASSWORD'],
                self::OPTIONS
            );
        } catch (PDOException $exception) {
            echo $exception->getMessage();
            die("<h1>Whoops! Erro ao conectar...</h1>");
        }
        return $this;
      }


    function connection()
    {
      return $this->connection;
    }


}
