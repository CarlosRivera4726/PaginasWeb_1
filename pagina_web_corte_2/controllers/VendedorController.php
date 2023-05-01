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

    public function listar_vendedor_usuario($id)
    {
        return $this->vendedorDao->listar_vendedor_usuario($id);
    }
    public function listar_ultimo_vendedor_id_usuario($id)
    {
        return $this->vendedorDao->listar_ultimo_vendedor_id_usuario($id);
    }
    public function listar_vendedor($id)
    {
        return $this->vendedorDao->listar_vendedor($id);
    }
}

?>