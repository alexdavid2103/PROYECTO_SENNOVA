<?php
class empresa_model
{
    // Función para agregar información de una empresa a la base de datos
    public static function add($data)
    {
        $obj = new connection();
        $c = $obj->getConnection();
        
        // Consulta SQL para insertar datos en la tabla empresa
        $sql = "INSERT INTO empresa (
                                    emp_nombre,
                                    emp_telefono,
                                    emp_ceo)
                                    VALUES (?,?,?)";

        $st = $c->prepare($sql);

        $v = array(
            $data["nombre"],         // Valor para emp_nombre
            $data["telefono"],       // Valor para emp_telefono
            $data["ceo"]             // Valor para emp_ceo
        );
        return $st->execute($v); // Ejecutar la consulta y retornar el resultado
    }

    // Función para editar la información de una empresa en la base de datos
    public static function edit($data)
    {
        $obj = new connection();
        $c = $obj->getConnection();
        
        // Consulta SQL para actualizar datos en la tabla empresa
        $sql = "UPDATE empresa SET 
                                    emp_nombre = ?,
                                    emp_telefono = ?,
                                    emp_ceo = ?
                                    WHERE emp_id = ?";

        $st = $c->prepare($sql);
        $v = array(
            $data["nombre"],        // Valor para emp_nombre
            $data["telefono"],      // Valor para emp_telefono
            $data["ceo"],           // Valor para emp_ceo
            $data["id"]             // Valor para emp_id (ubicar el registro a actualizar)
        );

        return $st->execute($v); // Ejecutar la consulta y retornar el resultado
    }

    // Función para eliminar información de una empresa de la base de datos
    public static function delete($id)
    {
        $obj = new connection();
        $c = $obj->getConnection();
        
        // Consulta SQL para eliminar un registro de la tabla empresa
        $sql = "DELETE FROM empresa WHERE emp_id = ?";
        $st = $c->prepare($sql);
        $v = array($id); // Valor para emp_id (ubicar el registro a eliminar)
        return $st->execute($v); // Ejecutar la consulta y retornar el resultado
    }

    // Función para obtener una lista de todos los registros de empresas
    public static function listarEmpresas()
    {
        $obj = new connection();
        $c = $obj->getConnection();
        
        // Consulta SQL para seleccionar todos los registros de la tabla empresa
        $sql = "SELECT * FROM empresas";
        $st = $c->prepare($sql);
        $st->execute();
        return $st->fetchAll(); // Retornar todos los registros como un arreglo
    }

    // Función para obtener información de una empresa por su ID
    public static function findById($id)
    {
        $obj = new connection();
        $c = $obj->getConnection();
        
        // Consulta SQL para seleccionar un registro de la tabla empresa por su emp_id
        $sql = "SELECT * FROM empresa WHERE emp_id = ?";
        $st = $c->prepare($sql);
        $v = array($id); // Valor para emp_id
        return $st->execute($v); // Ejecutar la consulta y retornar el resultado
    }

    // Función para validar las credenciales de una empresa
    public static function validar($data)
    {
        $obj = new connection();
        $c = $obj->getConnection();
        
        // Consulta SQL para verificar si existen las credenciales en la tabla tecnico
        $sql = "SELECT * FROM empresas WHERE emp_id = ? AND emp_contrasena = ?";
        $st = $c->prepare($sql);
        $v = array($data["id"], sha1($data["password"])); // Valores para tec_id y tec_contraseña
        $st->execute($v);
        return $st->fetch(); // Retornar el primer resultado de la consulta
    }
}
?>
