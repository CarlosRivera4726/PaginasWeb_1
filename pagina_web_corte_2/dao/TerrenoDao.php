<?php
include 'models/TerrenoModel.php';
class TerrenoDao
{

    private $connection;
    private $table = "TERRENO";
    public function __construct($connection)
    {
        $this->connection = $connection;
    }

    public function guardar($terreno = Terreno)
    {
        try {
            $query = "INSERT INTO " . $this->table . " (ID_VENDEDOR, LOCALIZACION, DESCRIPCION, PRECIO) VALUES (:Id_vendedor, :Localizacion, :Descripcion, :Precio)";
            $stmt = $this->connection->prepare($query);

            $Id_vendedor = $terreno->getIdVendedor();
            $stmt->bindParam(':Id_vendedor', $Id_vendedor);

            $Localizacion = $terreno->getLocalizacion();
            $stmt->bindParam(':Localizacion', $Localizacion);

            $Descripcion = $terreno->getDescripcion();
            $stmt->bindParam(':Descripcion', $Descripcion);

            $Precio = $terreno->getPrecio();
            $stmt->bindParam(':Precio', $Precio);

            $stmt->execute();
            return true;
        } catch (PDOException $ex) {
            return $ex->getMessage()."por";
        }
    }

    public function listar_terrenos()
    {
        try {
            $query = "SELECT * FROM " . $this->table;
            $stmt = $this->connection->prepare($query);
            $stmt->execute();
            $resultSet = $stmt->fetchAll(PDO::FETCH_ASSOC);

            if (count($resultSet) > 0) {
                $terrenos = array();
                foreach ($resultSet as $row) {
                    $terreno = new Terreno(
                        $row["ID_VENDEDOR"],
                        $row["LOCALIZACION"],
                        $row["DESCRIPCION"],
                        $row["PRECIO"]
                    );
                    $terrenos[] = $terreno;
                }
                return $terrenos;
            } else {
                return "No se encontraron terrenos!";
            }
        } catch (PDOException $ex) {
            return $ex->getMessage();
        }
    }
}

?>