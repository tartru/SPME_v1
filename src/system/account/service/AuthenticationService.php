<?php
/**
 * AuthenticationService
 * 
 * Service for user
 * 
 * @author Arturo Ruvalcaba, <arturo.ruvalcaba@conafor.gob.mx>
 * @version 1.0
 */

declare(strict_types=1);

namespace SPME\System\Account\Service;

use SPME\Shared\Service\Service;
use SPME\Shared\Service\ServiceRequest;
use SPME\Shared\Service\ServiceResponse;
use SPME\Shared\Service\ServiceException;
use SPME\System\Shared\Entity\User\User;

use DateTime;


class AuthenticationService extends Service {

    //---------------------------  Parámeters  ---------------------------

        /**
         * url
         * 
         * @var String
         * @access private
         */
        private String $url = '';

    //---------------------------  Parámeters  ---------------------------




    public function __construct() {}


    
    /**
     * Valid and authenticate the user by naem and password
     * 
     * @param ServiceRequest $request
     * @return ServiceResponse
     */
    public function authenticate(ServiceRequest $request): ServiceResponse {
        //Valida que existan parámetros y dependencias
            if ( empty($request->getParameters()) ) {
                throw new ServiceException('paramMissingException');
            }

            $request->validateDependencies(['repository','ip','auth_url','jwt_key','FB_JWT','FB_JWT_Key']);
            extract($request->getDependencies());
            $this->url = $auth_url;
        //Valida que existan parámetros y dependencias



        //Validaciones de parámetros del usuario
            $vResult = $request->validate([
                'user'     => 'required|max:100',
                'password' => 'required|max:255',
            ]);

            if ( !$vResult ) {
                return $this->error('Ocurrieron algunos errores.', response: $request->getErrors());
            }
        //Validaciones de parámetros del usuario



        $restClient = new \RestClient([
            'base_url' => $this->url,
        ]);

        $respuesta = $restClient->post('autorizacion',[
            'usuario'  => $request->getParameters('user'),
            'password' => $request->getParameters('password'),
        ]);

        if ( !empty($respuesta) && $respuesta->info->http_code >= 200 && $respuesta->info->http_code <= 299 ) {
            $response = json_decode($respuesta->response);

            if ( $response->status && $response->status >= 200 && $response->status <= 299 ) {
                //Busca al usuario en la base de datos
                    $user = User::getByName($response->data->usuario, $repository);
                //Busca al usuario en la base de datos

                //No existe en la base de datos
                    if ( empty($user) ) {
                        $data = [
                            'name'      => $response->data->usuario,
                            'email'     => $response->data->email,
                            'full_name' => $response->data->nombre_completo,
                            'puesto'    => $response->data->puesto,
                            'area'      => $response->data->coordinacion,
                            'last_ip'   => $ip,
                        ];
                        $user = User::saveEntity($data, $repository);

                        if ( empty($user) ) {
                            return $this->error("No se pudo guardar al usuario");
                        }
                    }
                //No existe en la base de datos
                
                $t_time  = time();
                $payload = [
                    'sub'  => $user->value('id'),
                    'name' => $user->value('name'),
                    'role' => 0,
                    'iat'  => $t_time,
                    'nbf'  => $t_time,
                ];

                $jwt = $FB_JWT::encode($payload, $jwt_key, 'HS256');

                return $this->response(['jwt' => $jwt], 200);
            }
        }


        return $this->error("No autorizado", 401);
    }





    /**
     * Valid authentication by jwt
     * 
     * $this->validToken(new ServiceRequest(['token' => $jwt], ['repository' => $repository, 'jwt_key' => $jwt_key, 'FB_JWT' => $FB_JWT, 'FB_JWT_Key' => $FB_JWT_Key]));
     * 
     * @param ServiceRequest $request
     * @return ServiceResponse
     */
    public function validToken(ServiceRequest $request): ServiceResponse {
        //Valida que existan parámetros y dependencias
            if ( empty($request->getParameters()) ) {
                throw new ServiceException('paramMissingException');
            }

            $request->validateDependencies(['repository','jwt_key','FB_JWT','FB_JWT_Key','TOKEN_TIME']);
            extract($request->getDependencies());
        //Valida que existan parámetros y dependencias


        //Validaciones de parámetros del usuario
            $vResult = $request->validate([
                'token' => 'required|min:15|max:255',
            ]);

            if ( !$vResult ) {
                return $this->error('Ocurrieron algunos errores.', response: $request->getErrors());
            }
        //Validaciones de parámetros del usuario


        //Decodifica el token
            try {
                $decoded = $FB_JWT::decode($request->getParameters('token'), new $FB_JWT_Key($jwt_key, 'HS256'));
            } catch ( \Firebase\JWT\SignatureInvalidException $e ) {
                return $this->error("No autorizado", 401);
            }
        //Decodifica el token


        //Valida el tiempo del token
            $created_at = date_timestamp_set(date_create(), $decoded->iat);
            $today      = date_create();

            if ( empty($created_at) || empty($today) ) {
                return $this->error("No pudo comparar fecha de creación del token", 400);
            }

            $diff = $created_at->diff($today);

            if ( $diff->h > $TOKEN_TIME ) {
                return $this->error("El token expiró", 401);
            }
        //Valida el tiempo del token


        //Busca al usuario en la base de datos
            $user = User::getByName($decoded->name, $repository);
        //Busca al usuario en la base de datos


        if ( !empty($user) && $user->bloqued->equals(false) && $user->active->equals(true) ) {
            return $this->response(['us' =>  $user->value('id')]);
        }


        return $this->error("No autorizado", 401);
    }

}