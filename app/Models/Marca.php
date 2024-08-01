<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Marca extends Model
{
    use HasFactory;

    //:: asignacion o manda a lammar a algo
    //nombre de la funcion en este caso referencia ala clase a la que esta mandando a los datos
    //hasmany envio de datos a otra tablas
    //cuando envia  datos es en plural
    public function productos(){
        return $this-> hasMany(Producto::class);
       }
}
