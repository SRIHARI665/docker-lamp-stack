<?php

class Response
{
    public function toJson(array $output): void
    {
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($output);
    }
}