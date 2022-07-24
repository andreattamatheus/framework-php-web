<?php

namespace Source\App\Models;

use PDO;
use Source\Database\Connect;

abstract class Model
{

  protected $database;
  private $data;

  public function __construct()
  {
    $this->database = new Connect();
    $this->database->getInstance();
  }

  public static function convertRequestToString($request, $field)
  {
    $data = self::converRequestToArray($request, $field);
    return implode(',', array_map(function ($req) {
      return "'{$req}'";
    }, $data));
  }

  public static function converRequestToArray($request, $field)
  {
    $data = array();
    foreach ($field as $column) {
      if (empty($request[$column]))
        throw new \Exception('Field is null: $field["' . $column . '"]');
      $data[] = $request[$column];
    }
    return $data;
  }

  public function create($data)
  {
    // insert a single publisher
    $data['created_at'] = Date('Y-m-d h:i:s');
    $sql = "
      INSERT INTO {$this->table}
      (" . implode(',', $this->field) . ")
      VALUES
      (" . self::convertRequestToString($data, $this->field) . ")
    ";
    $statement = $this->database->connection()->prepare($sql);
    $statement->execute();
  }

  public function findById($id)
  {
    $sql = "
      SELECT * FROM {$this->table}
      WHERE id='{$id}'
    ";
    $statement = $this->database->connection()->query($sql, PDO::FETCH_ASSOC);
    $response = $statement->fetch();
    if (!$response) {
      throw new \Exception("No data found:" . $id);
    }
    $this->data = $response;
    return $this;
  }

  public function get()
  {
    return $this->data;
  }

  public function delete($id)
  {
    // insert a single publisher
    $sql = "
        DELETE FROM {$this->table}
        WHERE id='{$id}'
    ";
    $statement = $this->database->connection()->prepare($sql);
    $statement->execute();
  }

  public function update($data)
  {
    $data['created_at'] = Date('Y-m-d h:i:s');
    $field = implode(', ', array_map(function ($row) {
      return $row . '=?';
    }, $this->field));
    var_dump($this->field);
    $sql = "
      UPDATE {$this->table}
      SET {$field}
      WHERE id='{$this->data['id']}'
    ";
    $statement = $this->database->connection()->prepare($sql);
    $statement->execute(self::converRequestToArray($data, $this->field));
  }


  public function all()
  {
    return $this->database->connection()->query("SELECT * FROM {$this->table}")->fetchAll();
  }
}
