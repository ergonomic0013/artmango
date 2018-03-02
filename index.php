<?php
error_reporting(E_ALL);

interface DatabaseConnectionInterface
{

    /**
     * Подключение к СУБД
     *
     * @param string $host         Адрес хоста
     * @param string $login        Логин
     * @param string $password     Пароль
     * @param string $databaseName Имя базы данных
     *
     * @return void
     */
    public function connect($host, $login, $password, $databaseName);

    /**
     * Получение объекта подключения к СУБД
     *
     * @returns \PDO
     * @throws \RuntimeException При отсутствии подключения к БД
     */
    public function getConnection();

}

/**
* 
*/
class Test implements DatabaseConnectionInterface
{
    private $dbh = null;

    public function connect($host, $login, $password, $databaseName)
    {
        $this->dbh = new PDO("mysql:host=$localhost;dbname=$databaseName", $login, $password);
    }

    public function getConnection()
    {
        $host = '127.0.0.1';
        $login = 'admin';
        $password = 'start';
        $databaseName = 'php-junior';

        if (!$this->dbh) {
            throw new RuntimeException('Connection was not established');
        }

        $connect = $this->connect($host, $login, $password, $databaseName);
        die('123');
        return $connect;
    }
}

$test = new Test();
$test->getConnection();