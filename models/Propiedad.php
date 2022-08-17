<?php

namespace Model;

class Propiedad extends ActiveRecord {
    protected static $tabla = 'propiedades';
    protected static $columnasDB = ['id', 'titulo', 'precio', 'imagen', 'descripcion', 
    'habitciones', 'wc', 'estacionamiento', 'creado', 'vendedorId']; 

       
    public $id;
    public $titulo;
    public $precio;
    public $imagen;
    public $descripcion;
    public $habitciones;
    public $wc;
    public $estacionamiento;
    public $creado;
    public $vendedorId;

       
    public function __construct($args = [])
    {
        $this->id = $args['id'] ?? null;
        $this->titulo = $args['titulo'] ?? '';
        $this->precio = $args['precio'] ?? '';
        $this->imagen = $args['imagen'] ?? '';
        $this->descripcion = $args['descripcion'] ?? '';
        $this->habitciones = $args['habitciones'] ?? '';
        $this->wc = $args['wc'] ?? '';
        $this->estacionamiento = $args['estacionamiento'] ?? '';
        $this->creado = date('Y/m/d');
        $this->vendedorId = $args['vendedorId'] ?? '';
    }

    public function validar() {
   
        if(!$this->titulo) {
            self::$errores[] = "Debes anadir un titulo";
        }

        if(!$this->precio) {
            self::$errores[] = 'El Precio es Obligatorio';
        }

        if( strlen( $this->descripcion ) < 50 ) {
            self::$errores[] = 'La descripcion es obligatoria y debe tener al menos 50 caracteres';
        }

        if(!$this->habitciones) {
            self::$errores[] = 'El numero de habitaciones es obligatorio';
        } 

        if (!$this->wc) {
            self::$errores[] = 'EL numero de banos es obligatorio';
        }

        if(!$this->estacionamiento) {
            self::$errores[] = 'El numero de estacionamientos es obligatorio';
        }

        if(!$this->vendedorId) {
            self::$errores[] = 'Elige un vendedor';
        }

        if(!$this->imagen ) {
           self::$errores[] = 'La imagen de la propiedad es obligatoria';
        }

        return self::$errores;
    }
 
}
