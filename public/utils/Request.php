<?php

class Request
{
    private string $requestType;
    private string $host;
    private string $platform;
    private string $acceptingDataType;
    private string $serverName;
    private string $serverAddress;
    private string $serverPort;
    private string $clientAddress;
    private string $webProtocol;
    private string $queryString;
    private array $queryParams;
    private array $requestBody;
    private string $requestPath;

    public function __construct()
    {
        $serverGlobalVariable = $_SERVER;
        $json = file_get_contents('php://input');
        $requestBody =  (array)json_decode($json);

        $this->requestType = $serverGlobalVariable['REQUEST_METHOD'];
        $this->host = $serverGlobalVariable['HTTP_HOST'];
        $this->platform = isset($serverGlobalVariable['HTTP_SEC_CH_UA_PLATFORM']) ? $serverGlobalVariable['HTTP_SEC_CH_UA_PLATFORM'] : '';
        $this->acceptingDataType = $serverGlobalVariable['HTTP_ACCEPT'];
        $this->serverName = $serverGlobalVariable['SERVER_NAME'];
        $this->serverAddress = $serverGlobalVariable['SERVER_ADDR'];
        $this->serverPort = $serverGlobalVariable['SERVER_PORT'];
        $this->clientAddress = $serverGlobalVariable['REMOTE_ADDR'];
        $this->webProtocol = $serverGlobalVariable['REQUEST_SCHEME'];
        $this->queryString = $serverGlobalVariable['QUERY_STRING'];
        $this->queryParams = $_GET;
        $this->requestBody = $requestBody;
        $this->requestPath = isset($_SERVER['PATH_INFO']) ? $_SERVER['PATH_INFO'] : '';
    }

    /**
     * @return string
     */
    public function getRequestPath(): string
    {
        return $this->requestPath;
    }

    /**
     * @param string $requestPath
     * @return Request
     */
    public function setRequestPath(string $requestPath): Request
    {
        $this->requestPath = $requestPath;
        return $this;
    }

    /**
     * @return string
     */
    public function getRequestType(): string
    {
        return $this->requestType;
    }

    /**
     * @param string $requestType
     * @return Request
     */
    public function setRequestType(string $requestType): Request
    {
        $this->requestType = $requestType;
        return $this;
    }

    /**
     * @return string
     */
    public function getHost(): string
    {
        return $this->host;
    }

    /**
     * @param string $host
     * @return Request
     */
    public function setHost(string $host): Request
    {
        $this->host = $host;
        return $this;
    }

    /**
     * @return string
     */
    public function getPlatform(): string
    {
        return $this->platform;
    }

    /**
     * @param string $platform
     * @return Request
     */
    public function setPlatform(string $platform): Request
    {
        $this->platform = $platform;
        return $this;
    }

    /**
     * @return string
     */
    public function getAcceptingDataType(): string
    {
        return $this->acceptingDataType;
    }

    /**
     * @param string $acceptingDataType
     * @return Request
     */
    public function setAcceptingDataType(string $acceptingDataType): Request
    {
        $this->acceptingDataType = $acceptingDataType;
        return $this;
    }

    /**
     * @return string
     */
    public function getServerName(): string
    {
        return $this->serverName;
    }

    /**
     * @param string $serverName
     * @return Request
     */
    public function setServerName(string $serverName): Request
    {
        $this->serverName = $serverName;
        return $this;
    }

    /**
     * @return string
     */
    public function getServerAddress(): string
    {
        return $this->serverAddress;
    }

    /**
     * @param string $serverAddress
     * @return Request
     */
    public function setServerAddress(string $serverAddress): Request
    {
        $this->serverAddress = $serverAddress;
        return $this;
    }

    /**
     * @return string
     */
    public function getServerPort(): string
    {
        return $this->serverPort;
    }

    /**
     * @param string $serverPort
     * @return Request
     */
    public function setServerPort(string $serverPort): Request
    {
        $this->serverPort = $serverPort;
        return $this;
    }

    /**
     * @return string
     */
    public function getClientAddress(): string
    {
        return $this->clientAddress;
    }

    /**
     * @param string $clientAddress
     * @return Request
     */
    public function setClientAddress(string $clientAddress): Request
    {
        $this->clientAddress = $clientAddress;
        return $this;
    }

    /**
     * @return string
     */
    public function getWebProtocol(): string
    {
        return $this->webProtocol;
    }

    /**
     * @param string $webProtocol
     * @return Request
     */
    public function setWebProtocol(string $webProtocol): Request
    {
        $this->webProtocol = $webProtocol;
        return $this;
    }

    /**
     * @return string
     */
    public function getQueryString(): string
    {
        return $this->queryString;
    }

    /**
     * @param string $queryString
     * @return Request
     */
    public function setQueryString(string $queryString): Request
    {
        $this->queryString = $queryString;
        return $this;
    }

    /**
     * @return array
     */
    public function getQueryParams(): array
    {
        return $this->queryParams;
    }

    /**
     * @param array $queryParams
     * @return Request
     */
    public function setQueryParams(array $queryParams): Request
    {
        $this->queryParams = $queryParams;
        return $this;
    }

    /**
     * @return array
     */
    public function getRequestBody(): array
    {
        return $this->requestBody;
    }

    /**
     * @param array $requestBody
     * @return Request
     */
    public function setRequestBody(array $requestBody): Request
    {
        $this->requestBody = $requestBody;
        return $this;
    }
}