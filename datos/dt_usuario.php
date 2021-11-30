<?php
include_once("conexion.php");

class Dt_usuario extends Conexion
{
    private $myCon;
    public function listUsuario()
    {
        try {
            $this->myCon = parent::conectar();
            $result = array();
            $querySQL = "SELECT * FROM dbkermesse.tbl_usuario WHERE estado <> 3;";

            $stm = $this->myCon->prepare($querySQL);
            $stm->execute();

            foreach ($stm->fetchAll(PDO::FETCH_OBJ) as $r) {
                $user = new Usuario();
                $user->_SET('id_usuario', $r->id_usuario);
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
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function RegistrarUsers(Usuario $us)
    {
        try {
            $this->myCon = parent::conectar();
            $sql = "INSERT INTO dbkermesse.tbl_usuario (usuario,pwd,nombres,apellidos,email,estado)
            VALUES(?,?,?,?,?,?);";

            $this->myCon->prepare($sql)
             ->execute(array(
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

    public function editUser(Usuario $us)
    {
        try {
            $this->myCon = parent::conectar();
            $sql = "UPDATE dbkermesse.tbl_usuario SET
            usuario = ?,
            pwd = ?,
            nombres = ?,
            apellidos = ?,
            email = ?,
            estado = ?
            WHERE id_usuario = ?;";

            $this->myCon->prepare($sql)
                ->execute(
                    array(
                        $us->_GET('usuario'),
                        $us->_GET('pwd'),
                        $us->_GET('nombres'),
                        $us->_GET('apellidos'),
                        $us->_GET('email'),
                        $us->_GET('estado'),
                        $us->_GET('id_usuario')
                    )
                );
            $this->myCon = parent::desconectar();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function obtenerUser($id)
    {
        try {
            $this->myCon = parent::conectar();
            $querySQL = "SELECT * FROM dbkermesse.tbl_usuario WHERE id_usuario = ?;";
            $stm = $this->myCon->prepare($querySQL);
            $stm->execute(array($id));

            $r = $stm->fetch(PDO::FETCH_OBJ);

            $us = new Usuario();

            $us->_SET('id_usuario', $r->id_usuario);
            $us->_SET('usuario', $r->usuario);
            $us->_SET('pwd', $r->pwd);
            $us->_SET('nombres', $r->nombres);
            $us->_SET('apellidos', $r->apellidos);
            $us->_SET('email', $r->email);
            $us->_SET('estado', $r->estado);

            $this->myCon = parent::desconectar();
            return $us;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function deleteUser($idU)
    {
        try {
            $this->myCon = parent::conectar();
            $querySQL = "UPDATE dbkermesse.tbl_usuario SET estado = 3 WHERE id_usuario = ?;";
            $stm = $this->myCon->prepare($querySQL);
            $stm->execute(array($idU));

            $this->myCon = parent::desconectar();
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }

    public function ObtenerUsuario($user)
    {
        try {
            $this->myCon = parent::conectar();
            $querySQL = "SELECT * FROM dbkermesse.tbl_usuario WHERE usuario = ?";
            $stm = $this->myCon->prepare($querySQL);
            $stm->execute(array($user));

            $r = $stm->fetch(PDO::FETCH_OBJ);

            $us = new Usuario();

            //_SET(CAMPOBD, atributoEntidad)			
            $us->_SET('id_usuario', $r->id_usuario);
            $us->_SET('usuario', $r->usuario);
            $us->_SET('nombres', $r->nombres);
            $us->_SET('apellidos', $r->apellidos);
            $us->_SET('email', $r->email);
            $us->_SET('estado', $r->estado);


            $this->myCon = parent::desconectar();
            return $us;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
    public function validarUser($user, $pwd)
    {
        try {
            $this->myCon = parent::conectar();

            $querySQL = "SELECT * FROM dbkermesse.tbl_usuario WHERE usuario=? AND pwd=? AND estado<>3;";

            $stm = $this->myCon->prepare($querySQL);
            $stm->execute(array($user, $pwd));

            $resultado = $stm->fetchAll(PDO::FETCH_CLASS, "Usuario");

            $this->myCon = parent::desconectar();
            return $resultado;
        } catch (Exception $e) {
            die($e->getMessage());
        }
    }
}
