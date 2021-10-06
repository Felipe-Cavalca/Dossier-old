php artisan list


$usuarios = Usuario::all();
foreach($usuarios as $usuario){
    echo $usuario->email;
}