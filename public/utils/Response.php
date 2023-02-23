<?php
declare(strict_types = 1);

class Response
{
    private string $contentType;

    private int $responseCode;

    public function __construct()
    {
        $this->contentType = 'Content-Type: application/json; charset=utf-8';
        $this->responseCode = 200;
        $this->setResponseCode();
        $this->setHeader($this->contentType);
    }

    /**
     * @return string
     */
    public function getContentType(): string
    {
        return $this->contentType;
    }

    /**
     * @param string $contentType
     * @return Response
     */
    public function setContentType(string $contentType): Response
    {
        $this->contentType = $contentType;
        return $this;
    }

    /**
     * @return int
     */
    public function getResponseCode(): int
    {
        return $this->responseCode;
    }

    /**
     * @param int $responseCode
     * @return Response
     */
    public function setResponseCode(int $responseCode = 200): Response
    {
        $this->responseCode = $responseCode;
        http_response_code($this->responseCode);
        return $this;
    }

    public function setHeader(string $contentType)
    {
        header($contentType);
    }

    public function toJson(array $output): string
    {
        return json_encode($output);
        die;
    }
}