<?php 
    include 'dao/UserDao.php';
    include_once 'database/connection.php';

    class UserController {
        private $userDao;

        public function __construct(){ $this->userDao = new UserDao(new connection()); }

        //guarda un usuario en la base de datos
        public function guardar($usuario = User){
            return $this->userDao->guardar($usuario);
        }
    }

?>