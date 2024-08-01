<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DetalleOrden extends Model
{
    use HasFactory;

    protected $table = "detalle_ordenes";

    //relacion inversa de detalle_orden
    public function Orden(){
       return  $this->belongsTo(Orden::class); 
    }

    public function producto()
    {
        return $this->belongsTo(Producto::class);
    }
    
}
