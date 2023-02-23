<?php
declare(strict_types = 1);
require_once 'Controllers/CustomerController.php';
require_once 'Models/CustomerModels.php';
require_once 'MySQLDatabase.php';
require_once 'Response.php';
require_once 'Request.php';

class ObjectContainer
{
    public static function response(): Response
    {
        return new Response();
    }

    public static function request(): Request
    {
        return new Request();
    }

    public static function mysqlDB(): MySQLDatabase
    {
        return new MySQLDatabase();
    }

    public static function customerModel(): CustomerModel
    {
        return new CustomerModel();
    }

    public static function customerController(): CustomerController
    {
        return new CustomerController();
    }
}
