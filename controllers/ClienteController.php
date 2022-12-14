<?php
    // Creamos la class.
    class ClienteController{
        
        public function validarCliente(){
            // Mientras no se pasen los datos del formulario mostraremos el else
            if (isset($_POST["correo"]) && isset($_POST["password"])) {
                require_once("models/cliente.php"); 
                $validar = new Cliente();
                $validar->setCorreoCliente($_POST["correo"]);
                $validar->setPassword(md5($_POST["password"]));
                $validarRow = $validar->validarCliente();

                if (isset($validarRow[0]->nombre)){
                    //Una vez validado se genera la session del cliente
                    $_SESSION["Cliente"] =$validarRow[0]->nombre;
                    header('Location:index.php?controller=Cliente&action=home'); 
                }else{
                    echo "<h1> Nombre o contraseña incorrectos </h1>";
                    require_once ("views/cliente/login.php");
                }
                //Una vez terminado recoger los datos, validarlos los pasaremos a la vista y dependiendo los datos se mostrará una cosa u otra.
            } else {
                header("index.php");
            }
        }

        public function registrarCliente(){
            // Mientras no se pasen los datos del formulario mostraremos el else
            if (isset($_POST["correo"]) && isset($_POST["password"])) {
                require_once("models/cliente.php"); 
                $validar = new Cliente();

                $validar->setNombre($_POST["nombre"]);
                $validar->setApellido($_POST["apellido"]);
                $validar->setCorreoCliente($_POST["correo"]);
                $validar->setCalle($_POST["calle"]);
                $validar->setNumero($_POST["numeroCalle"]);
                $validar->setDni($_POST["dni"]);
                $validar->setPassword(md5($_POST["password"]));
                $validar->setCodigoPostal($_POST["codigo"]);
            
            
                if ( $validar->registrarCliente()==1){

                    $_SESSION["Cliente"] = $_POST["nombre"];
                    header('Location:index.php?controller=Cliente&action=home'); 

                }else{
                    echo "<h1>Correo ya registrado</h1>";
                    require_once ("views/cliente/registrar.php");
                }
                //Una vez terminado recoger los datos, validarlos los pasaremos a la vista y dependiendo los datos se mostrará una cosa u otra.
            } else {
                header("index.php");
            }
        }

        public function registrar(){
            require_once "views/cliente/registrar.php";
        }

        public function login(){
            require_once "views/cliente/login.php";
        }

        public function home(){
            require_once "models/producto.php";
            $producto =  new Producto();
            $lista = $producto->listadoProductosDestacados();
            require_once "views/cliente/home.php";
           
        }

    }