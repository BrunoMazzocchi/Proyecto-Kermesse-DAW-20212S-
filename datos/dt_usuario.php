<?php
include_once("conexion.php");

class Dt_usuario extends Conexion{
    private $myCon;
    public function listUsuario(){
        try
        {
            $this->myCon = parent::conectar();
            $result = array();
            $querySQL = "SELECT * FROM dbkermesse.tbl_usuario;";

            $stm = $this->myCon->prepare($querySQL);
            $stm->execute();

            foreach($stm->fetchAll(PDO::FETCH_OBJ) as $r)  {
                $user = new Usuario();
                $user->_SET('id_usuario',$r->id_usuario);
                $user->_SET('usuario', $r->usuario);
                $user->_SET('pwd', $r->pwd);
                $user->_SET('nombres', $r->nombres);
                $user->_SET('apellidos', $r->apellidos);
                $user->_SET('email', $r->email);
                $user->_SET('estado', $r->estado);
                $result[] = $user;
            }
            $this->myCon = parent::desconectar();
            return $result;
        }
        catch (Exception $e)
        {
            die($e->getMessage());
        }
    }

    public function RegistrarUsers(Usuario $us){
        try
        {
            $this->myCon = parent::conectar();
            $sql = "INSERT INTO dbkermesse.tbl_usuario (id_usuario,usuario,pwd,nombres,apellidos,email,estado)
            VALUES(?,?,?,?,?,?,?);";

            $this->myCon->prepare($sql)
             ->execute(array(
                $us->_GET('id_usuario'),
                $us->_GET('usuario'),
                $us->_GET('pwd'),
                $us->_GET('nombres'),
                $us->_GET('apellidos'),
                $us->_GET('email'),
                $us->_GET('estado'),
             ));

             $this->myCon = parent::desconectar();
        }
        catch (Exception $e)
        {
            die($e->getMessage());
        }

    }
}