AdminLTE-Laravel 5.5
============

**AdminLTE-Laravel** -- La integración del framework Laravel en su versión 5.5 y la plantilla adminLTE 2.4.2 para iniciar un desarrollo rápido sin necesidad de realizar configuración a gran escala.  

**Laravel 5.5** -- Versión actual incluida en este paquete

**AdminLTE 2.4.2** -- Versión actual incluida en este paquete


 

### Componentes listos
**Incluye todos los componentes de la plantilla original listos para ser usados independientemente de la plantilla plantilla base inicial, solo necesita agregar las etiquetas que desea usar**

### Agregar Componentes de la plantilla AdminLTE
Para incluir los demás componentes de la plantilla AdminLTE recuerde agregar tanto CSS como JS en el `head.blade.php` y `script.blade.php`, utiliza la misma estructura que la plantilla original [AdminLTE.IO](https://adminlte.io):

        <link rel="stylesheet" href="{{ asset('bower_components/Ionicons/css/ionicons.min.css')}}">

### Sin registro de usuarios nuevos
El desarrollo está pensado en ser una plataforma para administradores por lo cual no cuenta con el registro de usuarios, aunque usted puede activar las rutas ya que los controladores de registro no se han eliminado

### Instalación
Ejecute los comandos con una base de datos configurada en el archivo .env:

    >   composer update
        php artisan migrate --seed  
        
### Roles y avatar incluido
La tabla `users` ya incluye la relación con 3 roles los cuales puede utilizar según su necesidad, al igual que incluye los campos para guardar los datos de sesión de Facebook, por ejemplo el avatar.      

### Plugins incluidos
En el archivo `composer.json` encontramos:

    >   "laravel/socialite": "^3.0",
        "laravelcollective/html": "^5.4.0",
        "maatwebsite/excel": "~2.1.0",
        "nesbot/carbon": "^1.22",
        "barryvdh/laravel-dompdf": "^0.8.0"

### Configurar Socialite
En el archivo `services.php` ubicado en `\config` configúrelo con sus datos:

        'facebook' => [
        'client_id' => 'your-github-app-id',
        'client_secret' => 'your-github-app-secret',
        'redirect' => 'http://your-callback-url',
        
El controlador de autenticación de Socialite ya se encuentra configurado en el archivo `LoginController.php` ubicado en `\app\Http\Controllers\Auth`:

      public function __construct()
      {
        $this->middleware('guest')->except('logout');
      }
      
      public function handleProviderCallback($provider)
      {
        try
        {
            $user = Socialite::driver($provider)->user();
        }
        catch(\Exception $e)
        {
            session()->flash('message', 'Cuenta no existe');
            return redirect('login');
        }
         $socialuser = User::where('email',$user->getEmail())->first();

         if($socialuser == NULL){
           session()->flash('message', 'Cuenta no existe');
           return redirect('login');
         }else{
           User::where('email',$user->getEmail())
                     ->update([
                       'social_name' => $user->getName(),
                       'email' => $user->getEmail(),
                       'social_id' => $user->getId(),
                       'avatar' => $user->getAvatar(),
                     ]);

           auth()->login($socialuser);
           return redirect()->To('home');
         }
        }

### Carbon como Provider
Se configuro nesbot/carbon para que esté disponible en todas las vistas, un ejemplo de uso:  

        {{$carbon->format('Y-m-d')}}
        //otro ejemplo
        {{$user->created_at->diffForHumans()}}
        
### Menú
Ejemplo de utilización del menú  

        <li <?php echo current_page('home') ? "class='active'" : "";?>>
          <a href="{{ url('home')}}"><i class="fa fa-link">
        </i> <span>Home</span></a></li>
         





