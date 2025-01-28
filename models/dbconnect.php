<?php


namespace Sport\Models;

Class DbConnect
{
    public $errInfo = [];

    private ?\PDO $handler = null;
    private string $dsn;
    private string $user;
    private string $pass;

    public function __construct(array $config)
    {
        $this->dsn = 'mysql:host=' . $config['srv'] . ';dbname=' . $config['db'] . ';charset=utf8';
        $this->user = $config['user'];
        $this->pass = $config['pass'];
    }

    private function connector(): \PDO
    {
        if (!$this->handler instanceof \PDO) {
            $this->handler = new \PDO($this->dsn, $this->user, $this->pass);
            $this->handler->query("set names 'utf8'");
        }

        return $this->handler;
    }

    function prepare(string $query)
    {
        return $this->connector()->prepare($query);
    }

    function getList(string $query, array $params = [])
    {
        $stmt = $this
                    ->connector()
                    ->prepare($query);
        $stmt->execute($params);

        return $stmt->fetchAll(\PDO::FETCH_ASSOC);
    }

    function getRow(string $query, array $params = [])
    {
        $stmt = $this
                    ->connector()
                    ->prepare($query);
        $stmt->execute($params);

        return $stmt->fetch(\PDO::FETCH_ASSOC);
    }

    function getValue(string $query, array $params = [])
    {
        $stmt = $this
                    ->connector()
                    ->prepare($query);
        $stmt->execute($params);

        $result = $stmt->fetch(\PDO::FETCH_NUM);

        if ($result) {
            return $result[0];
        }

        return false;
    }

    function insertData(string $query, array $params = [])
    {
        $stmt = $this
                    ->connector()
                    ->prepare($query);

        if ($stmt->execute($params)) {

            return $this
                        ->connector()
                        ->lastInsertId();
        } else {
            $this->errInfo = $stmt->errorInfo();

            return -1;
        }
    }

    function updateData($query, $params = [])
    {
        $stmt = $this
                    ->connector()
                    ->prepare($query);

        if ($stmt->execute($params)) {

            return $stmt->rowCount();
        } else {
            $this->errInfo = $stmt->errorInfo();

            return -1;
        }
    }

    function beginTransaction(): void
    {
        $this->connector()->beginTransaction();
    }

    function rollBack(): void
    {
        $this->connector()->rollBack();
    }

    function commit(): void
    {
        $this->connector()->commit();
    }
}

