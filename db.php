<?php
    class Conexao{
        private $servername = "localhost";
        private $database   = "site-dinamico";
        private $username   = "root";
        private $password   = "";
        //private $password   = "PdZfQ!V(@j-w"; pedroL
        private $conn; 
        private $db;
        
        function __construct()
        {
            $this->setConn();
            $this->setDB();
        }
        //Create connection

        /*
        PARA TESTES ANTES DE PUBLICAR
        $conn = mysqli_connect($servername, $username, $password, $database) or die("\nErro na conexão com a base de dados: " . mysqli_connect_error());
        $db = mysqli_select_db($conn, $database) or die("\nErro na seleção da base de dados: ".mysqli_select_db_erro());
        */
        function setConn(){
            $this->conn = mysqli_connect($this->servername, $this->username, $this->password, $this->database) or die("\nErro na conexão com a base de dados. " . mysqli_connect_error());
       
        }

        function getConn(){
            $this->setConn();
            return $this->conn;
        }

        function setDB(){
            $this->db = mysqli_select_db($this->getConn(), $this->database) or die("\nErro na seleção da base de dados. ");
        }
    }