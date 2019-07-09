<?php

require_once 'models/MainModel.php';

class MainController
{
    public function actionMain()
    {
        require_once 'views/main/main.phtml';
        return true;
    }

    public function actionQuery($number)
    {
        switch ($number) {
            case 1:
                print MainModel::SQL_QUERY_1;
                break;
            case 2:
                print MainModel::SQL_QUERY_2;
                break;
            default:
                print '0';
                break;
        }
        return true;
    }

    public function actionResult($number)
    {
        switch ($number) {
            case 1:
                print json_encode(MainModel::query(MainModel::SQL_QUERY_1));
                break;
            case 2:
                print json_encode(MainModel::query(MainModel::SQL_QUERY_2));
                break;
            default:
                print '0';
                break;
        }
        return true;
    }
}