<?php
include_once ("conexion.php");
include_once("../entidades/productos.php");
include_once("../entidades/vw_productos_comunidad_categoriaproducto.php");

class Dt_Productos extends Conexion {

private $myCon;
public function listProducto(){
    try {
        $this->myCon = parent::conectar(); 
        $result = array(); 
        $querySQL = "SELECT * FROM dbkermesse.vw_productos_comunidad_categoriaproducto; ";  
        
        $stm = $this->myCon->prepare($querySQL);
        $stm->execute(); 

        foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r){
            $p = new Productos(); 

            $p->__SET('id_producto', $r->id_producto);
            $p->__SET('id_comunidad', $r->id_comunidad);
            $p->__SET('id_categoria_producto', $r->id_categoria_producto);
            $p->__SET('nombreProducto', $r->nombreProducto);
            $p->__SET('nombreComunidad', $r->nombreComunidad);
            $p->__SET('nombreCategoria', $r->nombreCategoria);
            $p->__SET('descripcion', $r->descripcion); 
            $p->__SET('cantidad', $r->cantidad);
            $p->__SET('preciov_sugerido', $r->preciov_sugerido); 
            $p->__SET('estado', $r->estado); 

            $result[] = $p; 
        }

        $this->myCon = parent::desconectar(); 
        return $result; 

    }catch(Exception $e){
        die($e->getMessage()); 
    }

    

}
public function regProducto(Productos $p)
    {
        try {
            $this->myCon = parent::conectar();
            $sql = "INSERT INTO dbkermesse.tbl_productos (id_producto, id_comunidad, id_categoria_producto,
                                              nombre, descripcion, cantidad, preciov_sugerido, estado)
            VALUES (?,?,?,?,?,?,?,?)";
            $this->myCon->prepare($sql)
                ->execute(array(
                  
                    $p->__SET('id_producto'),
                    $p->__SET('id_comunidad'),
                    $p->__SET('id_categoria_producto'),
                    $p->__SET('nombre'),
                    $p->__SET('descripcion'), 
                    $p->__SET('cantidad'),
                    $p->__SET('preciov_sugerido'),
                    $p->__SET('estado'),
            
                ));

            $this->myCon = parent::desconectar();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

public function obtenerProducto($id)
{
    try {
        $this->myCon = parent::conectar();
        $querySQL = "SELECT * FROM dbkermesse.vw_productos_comunidad_categoriaproducto WHERE id_producto = ?";
        $stm = $this->myCon->prepare($querySQL);
        $stm->execute(array($id));

        $r = $stm->fetch(PDO::FETCH_OBJ);
        $op = new Productos();

        $op->__SET('id_producto', $r->id_producto);
        $op->__SET('id_comunidad', $r->id_comunidad);
        $op->__SET('id_categoria_producto', $r->id_categoria_producto);
        $op->__SET('nombreProducto', $r->nombreProducto);
        $op->__SET('nombreComunidad', $r->nombreComunidad);
        $op->__SET('nombreCategoria', $r->nombreCategoria);
        $op->__SET('descripcion', $r->descripcion); 
        $op->__SET('cantidad', $r->cantidad);
        $op->__SET('preciov_sugerido', $r->preciov_sugerido);
        $op->__SET('estado', $r->estado);

        $this->myCon = parent::desconectar();
        return $op;
    } catch (Exception $e) {
        die($e->getMessage());
    }

    
}


    public function editProducto(Productos $p)
    {
        try{
            $this->myCon = parent::conectar();
            $sql = "UPDATE dbkermesse.tbl_productos SET
    
            id_comunidad = ?,
            id_categoria_producto = ?,
            nombre = ?,
            descripcion = ?,
            cantidad = ?, 
            preciov_sugerido = ?, 
            estado = ?, WHERE id_producto = ?";
            $this->myCon->prepare($sql)
                ->execute(array(
              
                    $p->__SET('id_comunidad'),
                    $p->__SET('id_categoria_producto'),
                    $p->__SET('nombre'),
                    $p->__SET('descripcion'), 
                    $p->__SET('cantidad'),
                    $p->__SET('preciov_sugerido'),
                    $p->__SET('estado'),
                    $p->__SET('id_producto'),
        
                ));
        }
        catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function deleteProducto($idP)
    {
        try
        {
            $this->myCon = parent::conectar();
            $querySQL = "UPDATE FROM dbkermesse.tbl_productos WHERE id_producto = ?;";
            $stm = $this->myCon->prepare($querySQL);
            $stm->execute(array($idP));
            $this->myCon = parent::desconectar();
        }
        catch (Exception $e) {
            die($e->getMessage());
        }
    }
}