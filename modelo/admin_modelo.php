<?php
class admin_modelo
{
    // Función para agregar un administrador a la base de datos
    public static function add($data)
    {
        $obj = new connection();
        $c = $obj->getConnection();
        
        // Consulta SQL para insertar datos en la tabla administrador
        $sql = "INSERT INTO administrador (
                                        adm_id, 
                                        adm_nombre, 
                                        adm_contraseña
                                        )
		                            VALUES (?, ?, ?)";
        
        $st = $c->prepare($sql);
        $v = array(
            $data["id"],                 // Valor para adm_id
            $data["nombre"],             // Valor para adm_nombre
            sha1($data["password"])      // Valor encriptado para adm_contraseña
        );
        return $st->execute($v); // Ejecutar la consulta y retornar el resultado
    }

    // Función para editar los datos de un administrador en la base de datos
    public static function edit($data)
    {
        $obj = new connection();
        $c = $obj->getConnection();
        
        // Consulta SQL para actualizar los datos en la tabla administrador
        $sql = "UPDATE administrador SET  
                                    adm_nombre = ?,
                                    adm_contraseña = ?
                                    WHERE adm_id = ?";
        
        $st = $c->prepare($sql);
        $v = array(
            $data["nombre"],             // Nuevo valor para adm_nombre
            $data["contraseña"],         // Nuevo valor para adm_contraseña
            $data["id"]                  // Valor para ubicar el registro a actualizar (adm_id)
        );

        return $st->execute($v); // Ejecutar la consulta y retornar el resultado
    }

    // Función para eliminar un administrador de la base de datos
    public static function delete($id)
    {
        $obj = new connection();
        $c = $obj->getConnection();
        
        // Consulta SQL para eliminar un registro de la tabla administrador
        $sql = "DELETE FROM administrador WHERE adm_id = ?";
        $st = $c->prepare($sql);
        $v = array($id); // Valor para ubicar el registro a eliminar (adm_id)
        return $st->execute($v); // Ejecutar la consulta y retornar el resultado
    }

    // Función para obtener una lista de todos los administradores
    public static function listar()
    {
        $obj = new connection();
        $c = $obj->getConnection();
        
        // Consulta SQL para seleccionar todos los registros de la tabla administrador
        $sql = "SELECT * FROM administrador ";
        $st = $c->prepare($sql);
        $st->execute();
        return $st->fetchAll(); // Retornar todos los registros como un arreglo
    }

    // Función para validar las credenciales de un administrador
    public static function validar($data)
    {
        $obj = new connection();
        $c = $obj->getConnection();
        
        // Consulta SQL para verificar si existen las credenciales en la tabla administrador
        $sql = "SELECT * FROM administrador WHERE adm_id = ? AND adm_contraseña = ?";
        $st = $c->prepare($sql);
        $v = array($data["id"], sha1($data["password"])); // Valores para adm_id y adm_contraseña
        $st->execute($v);
        return $st->fetch(); // Retornar el primer resultado de la consulta
    }
}
?>
