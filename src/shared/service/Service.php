<?php
/**
 * Service
 * 
 * This classs base for services
 * 
 * @author Arturo Ruvalcaba, <arturo.ruvalcaba@conafor.gob.mx>
 * @version 1.0
 */

declare(strict_types=1);

namespace SPME\Shared\Service;


abstract class Service {


    /**
     * Execute the command / service.
     * 
     * @param String $command
     * @param ?ServiceRequest $request
     * @return ServiceResponse
     */
    public static function execute(String $command, ?ServiceRequest $request): ServiceResponse {
        $service = new static();

        if ( !method_exists($service,$command) ) {
            throw new ServiceException('commandNotDefinedException');
        }

        if ( !is_null($request) ) {
            return $service->$command($request);
        }

        return $service->$command();
    }


    /**
     * Returns a serviceResponse
     * 
     * @param Mixed $response
     * @param Int $status
     * @param String $msg
     * @return ServiceResponse
     */
    public function response(Mixed $response = true, Int $status = 200, String $msg = ''): ServiceResponse {
        return new ServiceResponse($response, $status, $msg);
    }


    /**
     * Returns a serviceResponse as an error
     * 
     * @param String $msg
     * @param Int $status
     * @param Mixed $response
     * @return ServiceResponse
     */
    public function error(String $msg = '', Int $status = 400, Mixed $response = false): ServiceResponse {
        return new ServiceResponse($response, $status, $msg);
    }

}