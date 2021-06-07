<?php
/**
 * Auth: SINHNGUYEN
 * Email: sinhnguyen193@gmail.com
 */

class Api
{
    public static $httpStatuses = array(
        100 => 'Continue',
        101 => 'Switching Protocols',
        102 => 'Processing',
        118 => 'Connection timed out',
        200 => 'OK',
        201 => 'Created',
        202 => 'Accepted',
        203 => 'Non-Authoritative',
        204 => 'No Content',
        205 => 'Reset Content',
        206 => 'Partial Content',
        207 => 'Multi-Status',
        208 => 'Already Reported',
        210 => 'Content Different',
        226 => 'IM Used',
        300 => 'Multiple Choices',
        301 => 'Moved Permanently',
        302 => 'Found',
        303 => 'See Other',
        304 => 'Not Modified',
        305 => 'Use Proxy',
        306 => 'Reserved',
        307 => 'Temporary Redirect',
        308 => 'Permanent Redirect',
        310 => 'Too many Redirect',
        400 => 'Bad Request',
        401 => 'Unauthorized',
        402 => 'Payment Required',
        403 => 'Forbidden',
        404 => 'Not Found',
        405 => 'Method Not Allowed',
        406 => 'Not Acceptable',
        407 => 'Proxy Authentication Required',
        408 => 'Request Time-out',
        409 => 'Conflict',
        410 => 'Gone',
        411 => 'Length Required',
        412 => 'Precondition Failed',
        413 => 'Request Entity Too Large',
        414 => 'Request-URI Too Long',
        415 => 'Unsupported Media Type',
        416 => 'Requested range unsatisfiable',
        417 => 'Expectation failed',
        418 => 'I\'m a teapot',
        422 => 'Unprocessable entity',
        423 => 'Locked',
        424 => 'Method failure',
        425 => 'Unordered Collection',
        426 => 'Upgrade Required',
        428 => 'Precondition Required',
        429 => 'Too Many Requests',
        431 => 'Request Header Fields Too Large',
        449 => 'Retry With',
        450 => 'Blocked by Windows Parental Controls',
        500 => 'Internal Server Error',
        501 => 'Not Implemented',
        502 => 'Bad Gateway or Proxy Error',
        503 => 'Service Unavailable',
        504 => 'Gateway Time-out',
        505 => 'HTTP Version not supported',
        507 => 'Insufficient storage',
        508 => 'Loop Detected',
        509 => 'Bandwidth Limit Exceeded',
        510 => 'Not Extended',
        511 => 'Network Authentication Required',
    );

    public $version;

    private $_statusCode = 200;

    public $statusText = 'OK';

    public $charset = 'UTF-8';
    public $formaters = array(
        'json' => 'application/json',
        'xml'  => 'application/xml'
    );

    public $format = 'json';


    public function __construct()
    {
        if ($this->version === null) {
            if (isset($_SERVER['SERVER_PROTOCOL']) && $_SERVER['SERVER_PROTOCOL'] === 'HTTP/1.0') {
                $this->version = '1.0';
            } else {
                $this->version = '1.1';
            }
        }
    }

    public function setStatusCode($value, $text = null)
    {
        if ($value === null) {
            $value = 200;
        }

        $this->_statusCode = (int) $value;

        if ($this->getIsInvalid()) {
            throw new InvalidArgumentException("The HTTP status code is invalid: $value");
        }

        if ($text === null) {
            $this->statusText = isset(self::$httpStatuses[$this->_statusCode]) ? self::$httpStatuses[$this->_statusCode] : '';
        } else {
            $this->statusText = $text;
        }
    }

    public function getStatusCode()
    {
        return $this->_statusCode;
    }

    public function getIsInvalid()
    {
        return $this->getStatusCode() < 100 || $this->getStatusCode() >= 600;
    }

    public function getIsSuccessful()
    {
        return $this->getStatusCode() >= 200 && $this->getStatusCode() < 300;
    }

    private function defaultResponse()
    {
        return array(
            'success' => ($this->getIsSuccessful() ? true : false),
            'data' => null,
            'message' => $this->statusText
        );
    }
    protected function sendHeaders()
    {
        if (headers_sent()) {
            return;
        }
        $statusCode = $this->getStatusCode();
        header("HTTP/{$this->version} {$statusCode} {$this->statusText}");
        header("Content-Type: {$this->formaters[$this->format]}; charset={$this->charset}");
    }

    public function sendResponse(array $data, $statusCode = 200, $statusText = null, $format = 'json')
    {
        if (!isset($this->formaters[$format])) {
            throw new InvalidArgumentException("The format is invalid : $format");
        }
        $this->format = $format;
        $this->setStatusCode($statusCode, $statusText);
        $this->sendHeaders();
        echo $this->responseFormat($data);
    }

    private function responseFormat(array $data)
    {
        if (array_key_exists('data', $data)) {
            $data = array_merge($this->defaultResponse(), $data);
        } else {
            $defautResponse = $this->defaultResponse();
            $defautResponse['data'] = $data;
            $data = $defautResponse;
            unset($defautResponse);
        }
        switch ($this->format) {
            case 'xml' :
                    $xml = new SimpleXMLElement("<?xml version=\"1.0\"?><response></response>");
                    return $this->arrayToXML($data, $xml);
                break;
            case 'json':
            default:
                    return json_encode($data);
                break;
        }
    }

    public function arrayToXML(array $data, SimpleXMLElement &$xml)
    {
        foreach ($data as $key => $item) {
            if (is_array($item)) {
                if (is_array($item)) {
                    if (!is_numeric($key)) {
                        $subNode = $xml->addChild("$key");
                        $this->arrayToXML($item, $subNode);
                    } else {
                        $subNode = $xml->addChild("item_$key");
                        $this->arrayToXML($item, $subNode);
                    }
                } else {
                    $xml->addChild("$key", htmlspecialchars("$item"));
                }
            } else {
                $xml->addChild("$key", htmlspecialchars("$item"));
            }
        }
        return $xml->saveXML();
    }
}