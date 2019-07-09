<?php

require_once 'components/Database.php';

class MainModel
{
    const SQL_QUERY_1 = "SELECT requests.id, 
                                offers.name, 
                                requests.price, 
                                requests.count, 
                                operators.name AS op FROM requests
                        LEFT JOIN offers ON requests.offer_id = offers.id
                        LEFT JOIN operators ON requests.operator_id = operators.id
                        WHERE requests.count > 2 AND (operators.id = 10 OR operators.id = 12)";

    const SQL_QUERY_2 = "SELECT offers.name, 
                                SUM(requests.price) AS price, 
                                SUM(requests.count) AS amount FROM requests
                        LEFT JOIN offers ON requests.offer_id = offers.id
                        GROUP BY offers.id";


    public static function query($sql)
    {
        $db = Database::getConnection();

        $stmt = $db->prepare($sql);
        $stmt->execute();
        $rows = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $rows;
    }


}