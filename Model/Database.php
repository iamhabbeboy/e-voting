<?php
namespace Abiodun\Model;

use Abiodun\Exception\NotAvailableException;

require __DIR__.'/../config.php';


class Database
{
    public $connector;

    public function __construct()
    {
        $dbParams = "mysql:host=". DB_HOST;
        $dbParams .= ";dbname=".DB_NAME;
        $this->connector = new \PDO($dbParams, DB_USER, DB_PWD);
    }

    public function all()
    {
        return $this->connector->query("SELECT * FROM {$this->table}");
    }

    public function where($column, $value)
    {
        return $this->connector->query("SELECT * FROM {$this->table} WHERE {$column}='{$value}'");
    }

    public function create($requests)
    {
        if (!is_object($requests) && !is_array($requests)) {
            throw new NotAvailableException("Variable type is not an array !");
        }

        $request = $this->convertToArray($requests);
   
        $keys = implode(',', array_keys($request));
        $questionMark = $this->columnMarker($request);
        $values = array_values($request);
     
        $query = $this->connector->prepare("INSERT INTO {$this->table}($keys) VALUES($questionMark)");
        $query->execute($values);
        if ($query->rowCount() < 1) {
            throw new NotAvailableException("Error occured while processing data");
        }
        $lastId = (int) $this->connector->lastInsertId();
        return $this->lastRow($lastId);
    }

    /**
     * Undocumented function
     *
     * @param object $request
     * @return void
     */
    private function convertToArray(object $request)
    {
        $response = json_decode(json_encode($request), true);
        $response['created_at'] = date('d-m-y H:ia');
        unset($response['rel']);
        unset($response['method']);
        return $response;
    }

    /**
     * Undocumented function
     *
     * @param integer $id
     * @return void
     */
    private function lastRow(int $id)
    {
        $response = $this->where('id', $id)->fetch();
        $keys = array_keys($response);
        foreach ($keys as $key) {
            if (preg_match('/\d+/', $key)) {
                unset($response[$key]);
            }
        }
        return $response;
    }

    private function columnMarker($requests)
    {
        if (!count($requests)) {
            return;
        }
        $questionMark = '';
        foreach ($requests as $request) {
            $questionMark .= '?,';
        }
        return substr($questionMark, 0, strlen($questionMark) -1);
    }
}
