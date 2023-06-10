<?php
/**
 * ServiceResponse
 * 
 * This classs helps to send the response from the service to the controller
 * 
 * '100' => 'Continue',
 * '101' => 'Switching Protocols',
 * '102' => 'Processing (WebDAV; RFC 2518)',
 * '103' => 'Early Hints (RFC 8297)*

 * '200' => 'OK',
 * '201' => 'Created',
 * '202' => 'Accepted',
 * '203' => 'Non-Authoritative Information (since HTTP/1.1)',
 * '204' => 'No Content',
 * '205' => 'Reset Content',
 * '206' => 'Partial Content (RFC 7233)',
 * '207' => 'Multi-Status (WebDAV; RFC 4918)',
 * '208' => 'Already Reported (WebDAV; RFC 5842)',
 * '226' => 'IM Used (RFC 3229)',
 * 
 * '300' => 'Multiple Choices',
 * '301' => 'Moved Permanently',
 * '302' => 'Found (Previously "Moved temporarily")',
 * '303' => 'See Other (since HTTP/1.1)',
 * '304' => 'Not Modified (RFC 7232)',
 * '305' => 'Use Proxy (since HTTP/1.1)',
 * '306' => 'Switch Proxy',
 * '307' => 'Temporary Redirect (since HTTP/1.1)',
 * '308' => 'Permanent Redirect (RFC 7538)',
 * 
 * '400' => 'Bad Request',
 * '401' => 'Unauthorized (RFC 7235)',
 * '402' => 'Payment Required',
 * '403' => 'Forbidden',
 * '404' => 'Not Found',
 * '405' => 'Method Not Allowed',
 * '406' => 'Not Acceptable',
 * '407' => 'Proxy Authentication Required (RFC 7235)',
 * '408' => 'Request Timeout',
 * '409' => 'Conflict',
 * '410' => 'Gone',
 * '411' => 'Length Required',
 * '412' => 'Precondition Failed (RFC 7232)',
 * '413' => 'Payload Too Large (RFC 7231)',
 * '414' => 'URI Too Long (RFC 7231)',
 * '415' => 'Unsupported Media Type (RFC 7231)',
 * '416' => 'Range Not Satisfiable (RFC 7233)',
 * '417' => 'Expectation Failed',
 * '418' => "I'm a teapot",
 * '421' => 'Misdirected Request (RFC 7540)',
 * '422' => 'Unprocessable Entity (WebDAV; RFC 4918)',
 * '423' => 'Locked (WebDAV; RFC 4918)',
 * '424' => 'Failed Dependency (WebDAV; RFC 4918)',
 * '425' => 'Too Early (RFC 8470)',
 * '426' => 'Upgrade Required',
 * '428' => 'Precondition Required (RFC 6585)',
 * '429' => 'Too Many Requests (RFC 6585)',
 * '431' => 'Request Header Fields Too Large (RFC 6585)',
 * '451' => 'Unavailable For Legal Reasons (RFC 7725)*

 * '500' => 'Internal Server Error',
 * '501' => 'Not Implemented',
 * '502' => 'Bad Gateway',
 * '503' => 'Service Unavailable',
 * '504' => 'Gateway Timeout',
 * '505' => 'HTTP Version Not Supported',
 * '506' => 'Variant Also Negotiates (RFC 2295)',
 * '507' => 'Insufficient Storage (WebDAV; RFC 4918)',
 * '508' => 'Loop Detected (WebDAV; RFC 5842)',
 * '510' => 'Not Extended (RFC 2774)',
 * '511' => 'Network Authentication Required (RFC 6585)',
 * 
 * @author Arturo Ruvalcaba, <arturo.ruvalcaba@conafor.gob.mx>
 * @version 1.0
 */

declare(strict_types=1);

namespace SPME\Shared\Service;

class ServiceResponse {

    /**
     * http status
     * 
     * @var Int
     * @access private
     */
    private Int $status;


    /**
     * String that contains the message (error or success)
     * 
     * @var String
     * @access private
     */
    private String $msg;


    /**
     * The response
     * 
     * @var Mixed
     * @access private
     */
    private $response;


    /**
     * Flag that shows the success or error
     * 
     * @var Bool
     * @access private
     */
    private Bool $success;


    /**
     * Respuestas http
     * 
     * @link https://en.wikipedia.org/wiki/List_of_HTTP_status_codes
     * @var Array
     * @access private
     */
    private $http_response = [
        '100' => 'Continue',
        '101' => 'Switching Protocols',
        '102' => 'Processing (WebDAV; RFC 2518)',
        '103' => 'Early Hints (RFC 8297)',

        '200' => 'OK',
        '201' => 'Created',
        '202' => 'Accepted',
        '203' => 'Non-Authoritative Information (since HTTP/1.1)',
        '204' => 'No Content',
        '205' => 'Reset Content',
        '206' => 'Partial Content (RFC 7233)',
        '207' => 'Multi-Status (WebDAV; RFC 4918)',
        '208' => 'Already Reported (WebDAV; RFC 5842)',
        '226' => 'IM Used (RFC 3229)',
        
        '300' => 'Multiple Choices',
        '301' => 'Moved Permanently',
        '302' => 'Found (Previously "Moved temporarily")',
        '303' => 'See Other (since HTTP/1.1)',
        '304' => 'Not Modified (RFC 7232)',
        '305' => 'Use Proxy (since HTTP/1.1)',
        '306' => 'Switch Proxy',
        '307' => 'Temporary Redirect (since HTTP/1.1)',
        '308' => 'Permanent Redirect (RFC 7538)',
        
        '400' => 'Bad Request',
        '401' => 'Unauthorized (RFC 7235)',
        '402' => 'Payment Required',
        '403' => 'Forbidden',
        '404' => 'Not Found',
        '405' => 'Method Not Allowed',
        '406' => 'Not Acceptable',
        '407' => 'Proxy Authentication Required (RFC 7235)',
        '408' => 'Request Timeout',
        '409' => 'Conflict',
        '410' => 'Gone',
        '411' => 'Length Required',
        '412' => 'Precondition Failed (RFC 7232)',
        '413' => 'Payload Too Large (RFC 7231)',
        '414' => 'URI Too Long (RFC 7231)',
        '415' => 'Unsupported Media Type (RFC 7231)',
        '416' => 'Range Not Satisfiable (RFC 7233)',
        '417' => 'Expectation Failed',
        '418' => "I'm a teapot",
        '421' => 'Misdirected Request (RFC 7540)',
        '422' => 'Unprocessable Entity (WebDAV; RFC 4918)',
        '423' => 'Locked (WebDAV; RFC 4918)',
        '424' => 'Failed Dependency (WebDAV; RFC 4918)',
        '425' => 'Too Early (RFC 8470)',
        '426' => 'Upgrade Required',
        '428' => 'Precondition Required (RFC 6585)',
        '429' => 'Too Many Requests (RFC 6585)',
        '431' => 'Request Header Fields Too Large (RFC 6585)',
        '451' => 'Unavailable For Legal Reasons (RFC 7725)',

        '500' => 'Internal Server Error',
        '501' => 'Not Implemented',
        '502' => 'Bad Gateway',
        '503' => 'Service Unavailable',
        '504' => 'Gateway Timeout',
        '505' => 'HTTP Version Not Supported',
        '506' => 'Variant Also Negotiates (RFC 2295)',
        '507' => 'Insufficient Storage (WebDAV; RFC 4918)',
        '508' => 'Loop Detected (WebDAV; RFC 5842)',
        '510' => 'Not Extended (RFC 2774)',
        '511' => 'Network Authentication Required (RFC 6585)',
    ];



    /**
     * Constructor
     * 
     * @param Mixed $newResponse
     * @param Int $newStatus
     * @param String $newMsg
     */
    public function __construct(Mixed $newResponse = true, Int $newStatus = 200, String $newMsg = '') {
        $this->setStatus($newStatus);
        $this->setMsg($newMsg);
        $this->setResponse($newResponse);
    }



    /**
     * Set the status var
     * 
     * @param Int $newStatus
     * @return Void
     */
    private function setStatus(Int $newStatus): void {
        $this->success = ( $newStatus >= 200 && $newStatus <= 299 ) ? true : false;
        $this->status  = $newStatus;
    }


    /**
     * Set the message
     * 
     * @param String $newMsg
     * @return Void
     */
    private function setMsg(String $newMsg): void {
        $this->msg = $newMsg;
    }


    /**
     * Set the response
     * 
     * @param Mixed $newResponse
     * @return Void
     */
    private function setResponse(Mixed $newResponse): void {
        $this->response = $newResponse;
    }


    /**
     * Returns the status value
     * 
     * @return Int
     */
    public function getStatus(): Int {
        return $this->status;
    }


    /**
     * Returns the status message
     * 
     * @return String
     */
    public function getStatusMessage(): String {
        return $this->http_response[$this->status];
    }


    /**
     * Indicates if the service was a success
     * 
     * @return Bool
     */
    public function success(): bool {
        return $this->success;
    }


    /**
     * Returns the message
     * 
     * @return String
     */
    public function getMsg(): String {
        return $this->msg;
    }


    /**
     * Returns the response
     * 
     * @return Mixed
     */
    public function getResponse(): Mixed {
        return $this->response;
    }


    /**
     * Returns the response as Json
     * 
     * @return String
     */
    public function getResponseAsJson(): String {
        return json_encode($this->getResponse());
    }


    /**
     * Returns the response as Array
     * 
     * @return Array
     */
    public function getResponseAsArray(): Array {
        return (!is_array($this->response)) ? (Array)$this->getResponse() : $this->getResponse();
    }


    /**
     * Return the full response as array
     * 
     * @return Array
     */
    public function getAsArray(): Array {
        return [
            'status'         => $this->getStatus(),
            'status_message' => $this->getStatusMessage(),
            'success'        => $this->success(),
            'msg'            => $this->getMsg(),
            'response'       => $this->getResponse(),
        ];
    }


    /**
     * Return the full response as JSON
     * 
     * @return String
     */
    public function getAsJson(): String {
        return json_encode($this->getAsArray());
    }


    //---------------------------  Transformers  ---------------------------

        /**
         * Transform the response to json
         * 
         * @return Self
         */
        public function withResponseAsJson(): Self {
            return new self(
                $this->getResponseAsJson(),
                $this->getStatus(),
                $this->getMsg()
            );
        }


        /**
         * Transform the response to array
         * 
         * @return Self
         */
        public function withResponseAsArray(): Self {
            return new self(
                $this->getResponseAsArray(),
                $this->getStatus(),
                $this->getMsg()
            );
        }

    //---------------------------  Transformers  ---------------------------


    //---------------------------  Sobrecarga  ---------------------------

        /**
         * Acomoda el objeto para imprimir su información
         * 
         * @return String
         */
        public function __toString(): String {
            $theStatus        = $this->getStatus();
            $theStatusMessage = $this->getStatusMessage();
            $theSuccess       = $this->success();
            $theMsg           = $this->getMsg();
            $theResponse      = $this->getResponse();
            $responseType     = gettype($theResponse);

            $return = get_class($this) . " => { \n";
            $return .= "status => int({$theStatus}) , \n";
            $return .= "status_message => string(" . strlen($theStatusMessage) . ") \"{$theStatusMessage}\" , \n";
            $return .= "success => bool(" . (($theSuccess) ? 'true' : 'false') . ") , \n";
            $return .= "msg => string(" . strlen($theMsg) . ") \"{$theMsg}\" , \n";
            $return .= "response => ";

            if ( $responseType == 'string' ) {
                $return .= "string(" . strlen($theResponse) . ") \"{$theResponse}\" \n";
            }
            elseif ( $responseType == 'boolean' ) {
                $return .= "boolean(" . (($theResponse) ? 'true' : 'false') . ") \n";
            }
            elseif ( is_iterable($theResponse) ) {
                $return .= print_r($theResponse,true) . " \n";
            }
            elseif ( is_null($theResponse) ) {
                $return .= "NULL \n";
            }
            elseif ( is_scalar($theResponse) || ($responseType == 'object' && method_exists($theResponse , '__toString')) ) {
                $return .= "{$responseType}({$theResponse}) \n";
            }
            else {
                $return .= "$responseType \n";
            }

            $return .= "}";

            return $return;
        }

    //---------------------------  Sobrecarga  ---------------------------

}