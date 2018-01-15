<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of PDORepository
 *
 * @author fede
 */
abstract class PDORepository {

  const USERNAME = "grupo7";
  const PASSWORD = "OGUyZTE1NjJkZDc2";
	const HOST ="localhost";
	const DB = "kek";


    public function getConnection(){
        $u=self::USERNAME;
        $p=self::PASSWORD;
        $db=self::DB;
        $host=self::HOST;
        $connection = new PDO("mysql:dbname=$db;host=$host;charset=utf8", $u, $p);
        return $connection;
    }


}
