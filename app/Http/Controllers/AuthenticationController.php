<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Response;
use Illuminate\Support\Facades\DB;
use Firebase\JWT\JWT;
use Firebase\JWT\Key;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class AuthenticationController extends Controller
{
    //---------------------------  Parámeters  ---------------------------
        /**
         * url
         * 
         * @var String
         * @access private
         */
        private String $url = '';
        protected $usu;
    
        public function __construct(User $usu) {
            $this->usu = $usu;
        }
    //---------------------------  Parámeters  ---------------------------

     /**
     * Shows the login form
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function auth_login() {
       if (session()->has('us')){
            return redirect()->route('home');
        }
       return view('account.login', ['body_class' => 'form']);
    }

    
    /* 
    Valid the data to authenticate the user
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function authenticate(Request $request) {
        //Validaciones de parámetros del usuario
            $vResult = $request->validate([
                'user'     => 'required|min:3|max:100',
                'password' => 'required|min:3|max:255',
            ]);

            if ( !$vResult ) {
                return $this->with('message', response: $request->getErrors());
            }
        //Validaciones de parámetros del usuario

        $dependencias = [
            'usuario'    => $request->input('user'),
            'password'   => $request->input('password'),
            'ip'         => $request->ip(),
            'auth_url'   => env('AUTH_URL'),
            'jwt_key'    => env('JWT_KEY'),
            'FB_JWT'     => JWT::class,
            'FB_JWT_Key' => Key::class,
        ];

        $result = $this->authentication($dependencias);
        //return var_dump($result);  

        if (isset($result['status']) && $result['status'] == 200) {
            //$cadena=$result->all();
            //return var_dump($cadena);
            session()->regenerate();
            session(['token' => $result['jwt'],'us'=>$result['id']]);
            return redirect()->route('home');
            
        }
        if (isset($result['status']) && $result['status'] != 200) {
            return view('account.login')->with(['message' =>$result['message']]);
        }

        return  view('account.login')->with(['message' =>"Problemas de Inicio - Contacte a Soporte"]);
    }


    /**
     * Valida si un usuario existe en dominio y lo agrega a la base
     * 
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function authentication($request) {
    
            extract($request);
            $this->url = $auth_url;

        $restClient = new \RestClient([
            'base_url' => $this->url,
        ]);

        //consulta al dominio con usuario y contraseña y retorna informacion de usuario encontrado
        $respuesta = $restClient->post('autorizacion',[
            'usuario'  => $usuario,
            'password' => $password,
        ]);

        //return var_dump($respuesta);  
        
        //valida la respuesta 
        if ( !empty($respuesta) && $respuesta->info->http_code >= 200 && $respuesta->info->http_code <= 299 ) {
            $response = json_decode($respuesta->response);

            if ( $response->status && $response->status >= 200 && $response->status <= 299 ) {
                    //$user = usu->getByName($response->data->usuario);
                    $user = $this->usu->getByName($response->data->usuario);
                    //return var_dump($user);  
                //No existe en la base de datos, lo crea y guarda
                    if (isset($user['status'])&&$user['status']!=200) {
                        $data = [
                            'name'      => $response->data->usuario,
                            'password' => Hash::make($password),
                            'email'     => $response->data->email,
                            'full_name' => $response->data->nombre_completo,
                            'puesto'    => $response->data->puesto,
                            'area'      => $response->data->coordinacion,
                            'last_ip'   => $ip,
                            'type'      => "Conafor"
                        ];
                        $user = ['status'=>200,'usuario'=>$this->usu::create($data)];
                        
                        if (empty($user['usuario']) ) {
                            return (['status' => 400,'message' => "No se pudo guardar al usuario"]);
                        }
                        Auth::login($user['usuario']);
                    }
                //No existe en la base de datos, lo crea y guarda
                //return var_dump($user);
                $t_time  = time();
                $payload = [
                    'sub'  => $user['usuario']->value('id'),
                    'name' => $user['usuario']->value('name'),
                    'role' => 0,
                    'iat'  => $t_time,
                    'nbf'  => $t_time,
                ];

                $jwt = $FB_JWT::encode($payload, $jwt_key, 'HS256');

                if (!empty($user)&&($user['status']==200)) {
                    
                    if (!Auth::check()) { 
                        $credentials = ([
                            'name'=>(string) $user['usuario']->value('name'),
                            'password'=>(string) $password,
                        ]);
                        //return var_dump($credentials);
                        Auth::attempt($credentials, false);
                        //return var_dump(Auth::attempt($credentials, false));
                    }
                    return (['status' => 200,'jwt' => $jwt,'id'=>$user['usuario']->value('id')]);
                }
            }
            else {
                return (['status' => 401,'message' => "Fallo la respuesta del servidor"]);
            }

        }
        return (['status' => 401,'message' => "No autorizado"]);
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


    //Logout de sesiones
    public function logout () {
        Auth::logout();
        session()->invalidate();
        session()->regenerateToken();
        return redirect()->route('login'); 
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
