<?php
include 'dao/VendedorDao.php';
include_once 'database/connection.php';

class VendedorController
{
    private $vendedorDao;

    public function __construct()
    {
        $this->vendedorDao = new VendedorDao(new connection());
    }

    //guarda un usuario en la base de datos
    public function guardar($vendedor = Vendedor)
    {
        return $this->vendedorDao->guardar($vendedor);
    }
}

?>