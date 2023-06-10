<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use Firebase\JWT\SignatureInvalidException;

use SPME\Shared\Service\ServiceRequest;
use SPME\Shared\Persistence\Repository\CnfDbApiRepository;
use SPME\Shared\Persistence\Repository\LaravelRepository;
use SPME\System\Account\Service\AuthenticationService;
use Illuminate\Support\Facades\Http;


class AuthenticationController extends Controller
{

    /**
     * Shows the login form
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function auth_login(Request $request) {
       if (session()->has('token')){
            $val=$this->validate_token();
            if(is_int($val['us'])&&$numb = (int)$val['us']>=1) {
                return redirect()->route('home');
            }
            else{
               return redirect()->route('logout');
            }
        }
        /*
        //return view('general.home', ['body_class' => 'form']);
        //return var_dump($request->input('jwt'));
        return var_dump($request->header(),$jwt);*/
       return view('account.login', ['body_class' => 'form']);
       
    }

    
    /**
     * Valid the data to authenticate the user
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function authenticate(Request $request) {
        $user         = $request->input('user');
        $password     = $request->input('password');
        $repository   = $this->getRepository();
        $dependencias = [
            'repository' => $repository,
            'ip'         => $request->ip(),
            'auth_url'   => env('AUTH_URL'),
            'jwt_key'    => env('JWT_KEY'),
            'FB_JWT'     => JWT::class,
            'FB_JWT_Key' => Key::class,
        ];

        $result = AuthenticationService::execute('authenticate', new ServiceRequest($request->input(), $dependencias, $request->header()));
        
        if ( $result->success() ) {
            //return $result->getResponse('jwt');
            //return var_dump($result->getResponse('jwt'));  
            //return var_dump($request->header());
            //return redirect()->route('ingresar')->with(['user' =>$user, 'jwt' => $result->getResponse('jwt')]);
            //return var_dump(route('login'),$user,$result->getResponse('jwt'));
            //return var_dump($result->getResponse()); // la respuesta
            $cadena=$result->getResponse();
            //Auth::login($cadena,false);
            session(['token' => $cadena['jwt']]);
            session()->regenerate();
            return redirect()->route('home');
            
        }
        else
        if ( !$result->success() ) {
            return redirect()->route('ingresar')->with(['status' =>'error', 's_msg' => $result->getMsg(), 's_response' => $result->getResponse()]);
        }
        return redirect()->route('ingresar'); //no debe llegar aqui
    }



    /**
     * Valiud the token
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function validate_token() {
        // return auth()->user()->name;
        // $token        = $request->bearerToken();
        $token        = session('token');
        $repository   = $this->getRepository();
        $dependencias = [
            'repository' => $repository,
            'jwt_key'    => env('JWT_KEY'),
            'FB_JWT'     => JWT::class,
            'FB_JWT_Key' => Key::class,
            'TOKEN_TIME' => env('TOKEN_TIME'),
        ];

        $result = AuthenticationService::execute('validToken', new ServiceRequest(['token' => $token], $dependencias) );

        if ( !$result->success() ) {
            echo $result->getMsg();
            //return false;

            if ( !empty($result->getResponse()) ) {
                var_dump($result->getResponse());
            }
        }

        else {
            if (is_null($result->getResponse('us'))){
                echo 'Token válido';
            }
             else {
                return $result->getResponse('us');
             }
        }
    }

    public function cerrar () {
        session()->invalidate();
        session()->regenerateToken();
        return redirect()->route('ingresar'); 
    }




    /**
     * Genera la conexión a la base de datos
     * 
     * @return \SPME\Shared\Persistence\Repository\Repository
     */
    private function getRepository() {
        if ( env('DB_REPOSITORY') == 'Local' ) {
            return LaravelRepository::getRepository(['db_facade' => "Illuminate\Support\Facades\DB", 'connection' => 'mysql']);
        }

        else {
            return CnfDbApiRepository::getRepository(['url' => env('DB_HOST'), 'ephylone' => env('DB_DATABASE')]);
        }
    }

}
