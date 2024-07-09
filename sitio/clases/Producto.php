<?php 


require_once __DIR__ . '/Conexion.php';

class Producto {
    
    protected int $producto_id;
    protected string $nombre; 
    protected string $categoria_id; 
    protected string $descripcion;
    protected float $precio;
    protected bool $disponibilidad; 
    protected ?string $imagen = null;
    protected ?string $cuerpo = null;
    protected ?int $usuario_fk = null;


    public function asignarDatos (array $data): void {
        $this->producto_id = $data['producto_id'];
        $this->nombre = $data['nombre'];
        $this->categoria_id = $data['categoria_id'];
        $this->descripcion = $data['descripcion'];
        $this->precio = $data['precio'];
        $this->disponibilidad = $data['disponibilidad'];
        $this->imagen = $data['imagen'];
        $this->cuerpo = $data['cuerpo'];
        $this->usuario_fk = $data['usuario_fk'];

    }
    /** 
    *@return self[]
    */ 


    public function productosTodos(): array {
        $conn = (new Conexion)->obtenerConexion();
        $consulta = "SELECT * FROM producto";
        $stmt = $conn->prepare($consulta);
        $stmt->setFetchMode(PDO::FETCH_CLASS, self::class);
        $stmt->execute();   
    
        $productosTodos = $stmt->fetchAll();
        return $productosTodos;

    }


    public function productoPorId(int $producto_id): ?self {
        $conn = (new Conexion)->obtenerConexion();

        $consulta = "SELECT * FROM producto
                    WHERE producto_id = ?";  //holder

        $stmt = $conn->prepare($consulta);
        $stmt->execute([$producto_id]);
        $stmt->setFetchMode(PDO::FETCH_CLASS, self::class);
        $producto = $stmt->fetch();

        if (!$producto){
            return null;
        }
        return $producto;
        
    }

     //Crea y guarda el producto en bd
     public function crear(array $data){
        $conn = (new Conexion)->obtenerConexion();
        $consulta = "INSERT INTO producto (nombre, 
                                            descripcion, 
                                            cuerpo, 
                                            precio, 
                                            categoria_id, 
                                            imagen, 
                                            usuario_fk)
                    VALUES (:nombre, 
                            :descripcion, 
                            :cuerpo, 
                            :precio, 
                            :categoria_id, 
                            :imagen, 
                            :usuario_fk) ";
         
        $stmt = $conn->prepare($consulta);
        $stmt->execute([
            'nombre'        => $data['nombre'],
            'descripcion'   => $data['descripcion'],
            'cuerpo'        => $data['cuerpo'],
            'precio'        => $data['precio'],
            'categoria_id'  => $data['categoria_id'],
            'imagen'        => $data['imagen'],
            'usuario_fk'    => $data['usuario_fk']
        ]);
    }



    public function actualizar() {
        $conn = (new Conexion)->obtenerConexion();
        
        $consulta = "UPDATE productos 
                    SET 
                        nombre      = :nombre, 
                        descripcion = :descripcion, 
                        cuerpo      = :cuerpo, 
                        precio      = :precio, 
                        disponibilidad = :disponibilidad, 
                        categoria_id = :categoria_id,
                        imagen      = :imagen
                    WHERE producto_id = :producto_id";

        $stmt = $conn->prepare($consulta);
        $stmt->execute(
            [
                'nombre'        => $this->nombre,
                'descripcion'   => $this->descripcion,
                'cuerpo'        => $this->cuerpo, 
                'precio'        => $this->precio, 
                'disponibilidad'=> $this->disponibilidad, 
                'categoria_id'  => $this->categoria_id,
                'imagen'        => $this->imagen

            ]
        );
    }

    //Eliminar de la base de datos esta instancia
    public function eliminar() {
        $conn = (new Conexion)->obtenerConexion();

        $consulta = "DELETE FROM producto
                    WHERE producto_id = ?"; 

        $stmt = $conn->prepare($consulta);
        $stmt->execute([$this->producto_id]);
    }

    /**
     * Get the value of producto_id
     */ 
    public function getProducto_id()
    {
        return $this->producto_id;
    }

    /**
     * Set the value of producto_id
     *
     * @return  self
     */ 
    public function setProducto_id($producto_id)
    {
        $this->producto_id = $producto_id;

        return $this;
    }

    /**
     * Get the value of nombre
     */ 
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Set the value of nombre
     *
     * @return  self
     */ 
    public function setNombre($nombre)
    {
        $this->nombre = $nombre;

        return $this;
    }

    /**
     * Get the value of categoria_id
     */ 
    public function getCategoria_id()
    {
        return $this->categoria_id;
    }

    /**
     * Set the value of categoria_id
     *
     * @return  self
     */ 
    public function setCategoria_id($categoria_id)
    {
        $this->categoria_id = $categoria_id;

        return $this;
    }

    /**
     * Get the value of descripcion
     */ 
    public function getDescripcion()
    {
        return $this->descripcion;
    }

    /**
     * Set the value of descripcion
     *
     * @return  self
     */ 
    public function setDescripcion($descripcion)
    {
        $this->descripcion = $descripcion;

        return $this;
    }

    /**
     * Get the value of precio
     */ 
    public function getPrecio()
    {
        return $this->precio;
    }

    /**
     * Set the value of precio
     *
     * @return  self
     */ 
    public function setPrecio($precio)
    {
        $this->precio = $precio;

        return $this;
    }

    /**
     * Get the value of disponibilidad
     */ 
    public function getDisponibilidad()
    {
        return $this->disponibilidad;
    }

    /**
     * Set the value of disponibilidad
     *
     * @return  self
     */ 
    public function setDisponibilidad($disponibilidad)
    {
        $this->disponibilidad = $disponibilidad;

        return $this;
    }

    /**
     * Get the value of imagen
     */ 
    public function getImagen()
    {
        return $this->imagen;
    }

    /**
     * Set the value of imagen
     *
     * @return  self
     */ 
    public function setImagen($imagen)
    {
        $this->imagen = $imagen;

        return $this;
    }

    /**
     * Get the value of cuerpo
     */ 
    public function getCuerpo()
    {
        return $this->cuerpo;
    }

    /**
     * Set the value of cuerpo
     *
     * @return  self
     */ 
    public function setCuerpo($cuerpo)
    {
        $this->cuerpo = $cuerpo;

        return $this;
    }

    /**
     * Get the value of usuario_fk
     */ 
    public function getUsuario_fk()
    {
        return $this->usuario_fk;
    }

    /**
     * Set the value of usuario_fk
     *
     * @return  self
     */ 
    public function setUsuario_fk($usuario_fk)
    {
        $this->usuario_fk = $usuario_fk;

        return $this;
    }
}
?>


