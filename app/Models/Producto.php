<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Producto extends Model
{
    use HasFactory;

    //creando  la relacion inversa siendo producto N
    // la funcion se escribe en singular y lleva el nombre de quien envia los datos
    
    public function marca(){
        return $this->belongsTo(Marca::class);
     }
 
     public function modelo(){
          return $this-> belongsTo(Modelo::class);
     }
 
     public function detalle_ordenes(){
        return $this->hasMany(DetalleOrden::class);
     }    

}
