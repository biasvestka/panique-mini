<?php

namespace Mini\Controller;

use Mini\Model\Cadastro;

class CadastroController
{
    public function index()
    {
        $Cadastro = new Cadastro();
        $cadastros = $Cadastro->getAllCadastros();
        $amount_of_cadastros = $Cadastro->getAmountOfCadastros();

        require APP . 'view/_templates/header.php';
        require APP . 'view/cadastros/index.php';
        require APP . 'view/_templates/footer.php';
    }


    function validaCPF($cpf) {

        $cpf = preg_replace( '/[^0-9]/is', '', $cpf );

        if (strlen($cpf) != 11) {
            return false;
        }

        if (preg_match('/(\d)\1{10}/', $cpf)) {
            return false;
        }

        for ($t = 9; $t < 11; $t++) {
            for ($d = 0, $c = 0; $c < $t; $c++) {
                $d += $cpf[$c] * (($t + 1) - $c);
            }
            $d = ((10 * $d) % 11) % 10;
            if ($cpf[$c] != $d) {
                return false;
            }
        }
        return true;

    }
    public function addCadastro()
    {
        if (isset($_POST["submit_add_cadastro"])) {
            $nome = $_POST["nome"];
            $email = $_POST["email"];
            $cpf = $_POST["CPF"];

            if ($this->validaCPF($cpf)) {
          
                $Cadastro = new Cadastro();
              
                $Cadastro->addCadastro($nome, $email, $cpf);

                header('location: ' . URL . 'cadastro/index');
            } else {

                echo "CPF inválido!";
            }
            }}
    /**
     * @param int $cadastro_id 
     */
    public function deleteCadastro($cadastro_id)
    {

        if (isset($cadastro_id)) {
         
            $Cadastro = new Cadastro();
          
            $Cadastro->deleteCadastro($cadastro_id);
        }

        
        header('location: ' . URL . 'cadastro/index');
    }

     /**
     * @param int $cadastro_id 
     */
    public function editCadastro($cadastro_id)
    {
        if (isset($cadastro_id)) {
          
            $Cadastro = new Cadastro();
        
            $cadastro = $Cadastro->getCadastro($cadastro_id);

            require APP . 'view/_templates/header.php';
            require APP . 'view/cadastros/edit.php';
            require APP . 'view/_templates/footer.php';
        } else {
            header('location: ' . URL . 'cadastro/index');
        }
    }

 
    public function updateCadastro()
    {
    
        if (isset($_POST["submit_update_cadastro"])) {
            $nome = $_POST["nome"];
            $email = $_POST["email"];
            $cpf = $_POST["CPF"];

            if ($this->validaCPF($cpf)) {
          
                $Cadastro = new Cadastro();
              
                $Cadastro->updateCadastro($_POST["nome"],$_POST["email"],$_POST["CPF"], $_POST["cadastro_id"]);

                header('location: ' . URL . 'cadastro/index');
            } else {

                echo "CPF inválido!";
            }
            }}

 
    public function ajaxGetStats()
    {
        
        $Cadastro= new Cadastro();
        $amount_of_cadastros = $Cadastro->getAmountOfCadastros();

        echo $amount_of_cadastros;
    }

}
