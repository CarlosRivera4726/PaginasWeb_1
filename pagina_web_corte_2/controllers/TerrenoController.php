<?php
include 'dao/TerrenoDao.php';
include_once 'database/connection.php';
class TerrenoController
{
    private $terrenoDAO;
    public function __construct()
    {
        $this->terrenoDAO = new TerrenoDao(new connection());
    }

    public function guardar($terreno = Terreno)
    {
        return $this->terrenoDAO->guardar($terreno);
    }

    public function listar_terrenos()
    {
        return $this->terrenoDAO->listar_terrenos();
    }

    public function eliminar($id){
        return $this->terrenoDAO->eliminar($id);
    }
}
?>