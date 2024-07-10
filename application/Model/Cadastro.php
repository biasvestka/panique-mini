<?php

namespace Mini\Model;

use Mini\Core\Model;

class Cadastro extends Model
{
   
    public function getAllCadastros()
    {
        $sql = "SELECT id, nome, email, CPF FROM cadastro";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetchAll();
    }

    /**
     * @param string $nome Nome
     * @param string  $email Email
     * @param string $CPF Cpf
     *
     */
    public function addCadastro($nome, $email, $CPF)
    {
        $sql = "INSERT INTO cadastro (nome, email, CPF) VALUES (:nome, :email, :CPF)";
        $query = $this->db->prepare($sql);
        $parameters = array(':nome' => $nome, ':email' => $email, ':CPF' => $CPF );

        $query->execute($parameters);
    }

    /**
   
     * @param int $cadastro_id 
     */
    public function deleteCadastro($cadastro_id)
    {
        $sql = "DELETE FROM cadastro WHERE id = :cadastro_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':cadastro_id' => $cadastro_id);

        $query->execute($parameters);
    }

    /**
    
     * @param integer $cadastro_id
     */
    public function getCadastro($cadastro_id)
    {
        $sql = "SELECT id, nome, email, CPF FROM cadastro WHERE id = :cadastro_id LIMIT 1";
        $query = $this->db->prepare($sql);
        $parameters = array(':cadastro_id' => $cadastro_id);


        $query->execute($parameters);

        return $query->fetch();
    }

    /**
     * @param string $nome Nome
     * @param int $cadastro_id
     * @param string $email
     * @param string $CPF
     */
    public function updateCadastro($nome, $email, $CPF, $cadastro_id)
    {
        $sql = "UPDATE cadastro SET nome = :nome, email = :email, CPF = :CPF WHERE id = :cadastro_id";
        $query = $this->db->prepare($sql);
        $parameters = array(':nome' => $nome, ':email' => $email, ':CPF' => $CPF, ':cadastro_id' => $cadastro_id);

        $query->execute($parameters);
    }

    public function getAmountOfCadastros()
    {
        $sql = "SELECT COUNT(id) AS amount_of_cadastros FROM cadastro";
        $query = $this->db->prepare($sql);
        $query->execute();

        return $query->fetch()->amount_of_cadastros;
    }
}
