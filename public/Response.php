<?php

class Response
{
    public function toJson(array $output): void
    {
        http_response_code(200);
        header('Content-Type: application/json; charset=utf-8');
        echo json_encode($output);
    }
}