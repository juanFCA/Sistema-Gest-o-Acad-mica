<?php
/**
 * Created by PhpStorm.
 * User: alunoces
 * Date: 16/04/2019
 * Time: 21:33
 */

class avaliacao
{
    private $idAvaliacao;
    private $Turma_idTurma;
    private $Aluno_idAluno;
    private $Nota1;
    private $Nota2;
    private $Nota3;
    private $Nota4;
    private $NotaFinal;
    private $Situacao;

    /**
     * avaliacao constructor.
     * @param $idAvaliacao
     * @param $Turma_idTurma
     * @param $Aluno_idAluno
     * @param $Nota1
     * @param $Nota2
     * @param $Nota3
     * @param $Nota4
     * @param $NotaFinal
     * @param $Situacao
     */
    public function __construct($idAvaliacao, $Turma_idTurma, $Aluno_idAluno, $Nota1, $Nota2, $Nota3, $Nota4, $NotaFinal, $Situacao)
    {
        $this->idAvaliacao = $idAvaliacao;
        $this->Turma_idTurma = $Turma_idTurma;
        $this->Aluno_idAluno = $Aluno_idAluno;
        $this->Nota1 = $Nota1;
        $this->Nota2 = $Nota2;
        $this->Nota3 = $Nota3;
        $this->Nota4 = $Nota4;
        $this->NotaFinal = $NotaFinal;
        $this->Situacao = $Situacao;
    }

    /**
     * @return mixed
     */
    public function getIdAvaliacao()
    {
        return $this->idAvaliacao;
    }

    /**
     * @param mixed $idAvaliacao
     */
    public function setIdAvaliacao($idAvaliacao)
    {
        $this->idAvaliacao = $idAvaliacao;
    }

    /**
     * @return mixed
     */
    public function getTurmaIdTurma()
    {
        return $this->Turma_idTurma;
    }

    /**
     * @param mixed $Turma_idTurma
     */
    public function setTurmaIdTurma($Turma_idTurma)
    {
        $this->Turma_idTurma = $Turma_idTurma;
    }

    /**
     * @return mixed
     */
    public function getAlunoIdAluno()
    {
        return $this->Aluno_idAluno;
    }

    /**
     * @param mixed $Aluno_idAluno
     */
    public function setAlunoIdAluno($Aluno_idAluno)
    {
        $this->Aluno_idAluno = $Aluno_idAluno;
    }

    /**
     * @return mixed
     */
    public function getNota1()
    {
        return $this->Nota1;
    }

    /**
     * @param mixed $Nota1
     */
    public function setNota1($Nota1)
    {
        $this->Nota1 = $Nota1;
    }

    /**
     * @return mixed
     */
    public function getNota2()
    {
        return $this->Nota2;
    }

    /**
     * @param mixed $Nota2
     */
    public function setNota2($Nota2)
    {
        $this->Nota2 = $Nota2;
    }

    /**
     * @return mixed
     */
    public function getNota3()
    {
        return $this->Nota3;
    }

    /**
     * @param mixed $Nota3
     */
    public function setNota3($Nota3)
    {
        $this->Nota3 = $Nota3;
    }

    /**
     * @return mixed
     */
    public function getNota4()
    {
        return $this->Nota4;
    }

    /**
     * @param mixed $Nota4
     */
    public function setNota4($Nota4)
    {
        $this->Nota4 = $Nota4;
    }

    /**
     * @return mixed
     */
    public function getNotaFinal()
    {
        return $this->NotaFinal;
    }

    /**
     * @param mixed $NotaFinal
     */
    public function setNotaFinal($NotaFinal)
    {
        $this->NotaFinal = $NotaFinal;
    }

    /**
     * @return mixed
     */
    public function getSituacao()
    {
        return $this->Situacao;
    }

    /**
     * @param mixed $Situacao
     */
    public function setSituacao($Situacao)
    {
        $this->Situacao = $Situacao;
    }

}