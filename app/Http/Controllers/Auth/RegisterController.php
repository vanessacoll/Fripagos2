<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Pagos;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;
use App\Traits\Controllers\ChangeImageTrait;
use App\Models\Model_has_roles;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;
    use ChangeImageTrait;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest',['except' => ['logout' ,'register2', 'index','edit','store','destroy','update','imagen','password','inactivar']]);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            //'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            //'name' => $data['name'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
            'image_path' => 'default_profile.png',
        ]);
    }


    public function index()
    {

        $tienda =  Auth::user()->id_tienda;

        if($tienda){
       // $users = User::where('id',Auth::User()->id)->get();
        
        $users = DB::table('users')
        ->join('model_has_roles','users.id','model_has_roles.model_id')
        ->join('status','users.id_status','status.id_status')
        ->select(DB::raw('users.*'),'status.des_status')
        ->where('users.id_tienda', Auth::user()->id_tienda) 
        ->where('model_has_roles.role_id', 2)      
        ->get();
        
        return view('usuarios.usuario_index',compact('users'));

        }else{

        $status = 'error';
        $content = 'Usuario no Posee Tienda Registrada';

    return redirect()->route("home")->with('process_result',[
                'status' => $status,
                'content' => $content,
           ]); 
        }
    }

     public function register2()
    {
     
     return view('usuarios.usuario_create');

    }


    public function store(Request $request){


    $user = new User ($request->input());
    $user->email = $request->email;
    $user->password = Hash::make($request->password);
    $user->id_tienda = Auth::user()->id_tienda;
    $user->name_user = $request->name_user;
    $user->ape_user = $request->ape_user;
    $user->image_path = Auth::user()->image_path;
    $user->first_login = true;
    $user->saveOrFail();

    $user->assignRole('Cajero');

    $status = 'success';
    $content = 'Cajero Registrado Exitosamente';

    return redirect()->route("usuarios")->with('process_result',[
                'status' => $status,
                'content' => $content,
           ]);
    
    }


     /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Plan  $plan
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
     
        return view("usuarios.usuario_edit", ['user' => $user]);
    }


 /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Remota  $remota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {
        
        
        $user->email     = $request->email;
        $user->name_user = $request->name_user;
        $user->ape_user  = $request->ape_user;
        $user->password  = Hash::make($request->password);
        $user->saveOrFail();

    $status = 'success';
    $content = 'Cajero Actualizado Exitosamente';

    return redirect()->route("usuarios")->with('process_result',[
                'status' => $status,
                'content' => $content,
           ]);
    
    }


    public function inactivar(User $user)
    {
        
        
        $user->id_status = 4;
        $user->saveOrFail();

    $status = 'success';
    $content = 'Cajero Inactivado Exitosamente';

    return redirect()->route("usuarios")->with('process_result',[
                'status' => $status,
                'content' => $content,
           ]);
    
    }


     /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Remota  $remota
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {

        $pagos = Pagos::where('id_usuario',$user->id)->first();

        if(!$pagos){

        $data = Model_has_roles::where('model_id',$user->id)->first();
        $role = Role::where('id',$data->role_id)->first();

        $user->removeRole($role->name);

        $user->delete();
        
    $status = 'success';
    $content = 'Cajero Eliminado Exitosamente';

        }else{

    $status = 'error';
    $content = 'El usuario posee pagos Registrados';

        }

    return redirect()->route("usuarios")->with('process_result',[
                'status' => $status,
                'content' => $content,
           ]);
    }


     public function password(Request $request)
    {

         $validator = \Validator::make($request->all(), [
    'password_actual' => 'required|string|min:6',
    'nueva_password' => 'required|string|min:6|different:password_actual',
    'confirmar_password' => 'required|same:nueva_password|string|min:6',

        ]);
        
        if ($validator->fails())
        {
            return response()->json(['errors'=>$validator->errors()->all()]);
        }

    if (Hash::check($request->password_actual, Auth::user()->password)) {
       
         $password = Hash::make($request->nueva_password);
        

        $Update = User::where('id_cuenta', Auth::user()->id_cuenta)->update(['password' => $password ]);
       

      return response()->json(['success'=>'Contraseña Cambiada Exitosamente']);

        
        }else{
       

          
    return response()->json(['errors'=>['password_actual' => 'La Contraseña Ingresada es Distinta a la Contraseña Actual']]);  
          
         }
    }
}
