<?php
/**
 * Created by PhpStorm.
 * User: alunoces
 * Date: 16/04/2019
 * Time: 21:02
 */

class professor
{
    private $idProfessor;
    private $nome;
    private $cargo;

    public function __construct($idProfessor, $nome, $cargo)
    {
        $this->idProfessor = $idProfessor;
        $this->nome = $nome;
        $this->cargo = $cargo;
    }

    /**
     * @param mixed $idProfessor
     */
    public function setIdProfessor($idProfessor)
    {
        $this->idProfessor = $idProfessor;
    }

    /**
     * @return mixed
     */
    public function getIdProfessor()
    {
        return $this->idProfessor;
    }

    /**
     * @param mixed $nome
     */
    public function setNome($nome)
    {
        $this->nome = $nome;
    }

    /**
     * @return mixed
     */
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * @param mixed $cargo
     */
    public function setCargo($cargo)
    {
        $this->cargo = $cargo;
    }

    /**
     * @return mixed
     */
    public function getCargo()
    {
        return $this->cargo;
    }
}