<?php
/**
 * Created by PhpStorm.
 * User: alunoces
 * Date: 16/04/2019
 * Time: 21:32
 */

include_once "estrutura/Template.php";
require_once "db/avaliacaoDAO.php";
require_once "db/turmaDAO.php";
require_once "db/alunoDAO.php";
require_once "classes/avaliacao.php";

$template = new Template();
$object = new avaliacaoDAO();

$template->header();
$template->sidebar();
$template->navbar();


// Verificar se foi enviando dados via POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id = (isset($_POST["id"]) && $_POST["id"] != null) ? $_POST["id"] : "";
    $turma = (isset($_POST["turma"]) && $_POST["turma"] != null) ? $_POST["turma"] : "";
    $aluno = (isset($_POST["aluno"]) && $_POST["aluno"] != null) ? $_POST["aluno"] : "";
    $nota1 = (isset($_POST["nota1"]) && $_POST["nota1"] != null) ? $_POST["nota1"] : "";
    $nota2 = (isset($_POST["nota2"]) && $_POST["nota2"] != null) ? $_POST["nota2"] : "";
    $nota3 = (isset($_POST["nota3"]) && $_POST["nota3"] != null) ? $_POST["nota3"] : "";
    $nota4 = (isset($_POST["nota4"]) && $_POST["nota4"] != null) ? $_POST["nota4"] : "";
} else if (!isset($id)) {
    // Se não se não foi setado nenhum valor para variável $id
    $id = (isset($_GET["id"]) && $_GET["id"] != null) ? $_GET["id"] : "";
    $turma = NULL;
    $aluno = NULL;
    $nota1 = NULL;
    $nota2 = NULL;
    $nota3 = NULL;
    $nota4 = NULL;
}

if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "upd" && $id != "") {

    $avaliacao = new avaliacao($id,'','','','','','','','');
    $resultado = $object->atualizar($avaliacao);
    $turma = $resultado->getTurmaIdTurma();
    $aluno = $resultado->getAlunoIdAluno();
    $nota1 = $resultado->getNota1();
    $nota2 = $resultado->getNota2();
    $nota3 = $resultado->getNota3();
    $nota4 = $resultado->getNota4();
}

if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "save" && $turma != "" && $aluno != "" && $nota1 != "" && $nota2 != "" && $nota3 != "" && $nota4 != "") {
    $notaFinal = ($nota1 + $nota2 + $nota3 + $nota4) / 4;
    if ($notaFinal >= 7) {
        $situacao = 'Aprovado';
    } else if ($notaFinal < 4){
        $situacao = 'Reprovado';
    }
    $avaliacao = new avaliacao($id, $turma, $aluno, $nota1, $nota2, $nota3, $nota4, $notaFinal,$situacao);
    $msg = $object->salvar($avaliacao);
    $id = NULL;
    $turma = NULL;
    $aluno = NULL;
    $nota1 = NULL;
    $nota2 = NULL;
    $nota3 = NULL;
    $nota4 = NULL;
}

if (isset($_REQUEST["act"]) && $_REQUEST["act"] == "del" && $id != "") {
    $avaliacao = new avaliacao($id,'','','','','','','','');
    $msg = $object->remover($avaliacao);
    $id = null;
}

?>

<div class='content' xmlns="http://www.w3.org/1999/html">
    <div class='container-fluid'>
        <div class='row'>
            <div class='col-md-12'>
                <div class='card'>
                    <div class='header'>
                        <h4 class='title'>Avaliações</h4>
                        <p class='category'>Lista de avaliações do sistema</p>

                    </div>
                    <div class='content table-responsive'>

                        <form action="?act=save&id=" method="POST" name="form1">
                            <hr>
                            <i class="ti-save"></i>
                            <input type="hidden" name="id" value="<?php
                            // Preenche o id no campo id com um valor "value"
                            echo (isset($id) && ($id != null || $id != "")) ? $id : '';
                            ?>"/>
                            <br>
                            Turma:
                            <select name="turma" class="form-control">
                                <option value="" selected disabled hidden >Selecione a Turma</option>
                                <?php
                                $turmaDAO = new turmaDAO();
                                $turmas = $turmaDAO->buscarTodos();
                                foreach($turmas as $turmaa){
                                    if( !empty($turma) && $turmaa->getIdTurma() == $turma){
                                        ?>
                                        <option value="<?php echo $turmaa->getIdTurma() ?>" selected><?php echo $turmaa->getNome()?></option>
                                        <?php
                                    }else{ ?>
                                        <option value="<?php echo $turmaa->getIdTurma() ?>"><?php echo $turmaa->getNome()?></option>
                                    <?php }} ?>
                            </select>
                            Aluno:
                            <select name="aluno" class="form-control">
                                <option value="" selected disabled hidden >Selecione a Turma</option>
                                <?php
                                $alunoDAO = new alunoDAO();
                                $alunos = $alunoDAO->buscarTodos();
                                foreach($alunos as $alunoo){
                                    if( !empty($aluno) && $alunoo->getIdAluno() == $aluno){
                                        ?>
                                        <option value="<?php echo $alunoo->getIdAluno() ?>" selected><?php echo $alunoo->getNome()?></option>
                                        <?php
                                    }else{ ?>
                                        <option value="<?php echo $alunoo->getIdAluno() ?>"><?php echo $alunoo->getNome()?></option>
                                    <?php }} ?>
                            </select>
                            Nota 01:
                            <input type="number" size="2" name="nota1" value="<?php
                            // Preenche o sigla no campo sigla com um valor "value"
                            echo (isset($nota1) && ($nota1 != null || $nota1 != "")) ? $nota1 : '';
                            ?>"/>
                            Nota 02:
                            <input type="number" size="2" name="nota2" value="<?php
                            // Preenche o sigla no campo sigla com um valor "value"
                            echo (isset($nota2) && ($nota2 != null || $nota2 != "")) ? $nota2 : '';
                            ?>"/>
                            Nota 03:
                            <input type="number" size="2" name="nota3" value="<?php
                            // Preenche o sigla no campo sigla com um valor "value"
                            echo (isset($nota3) && ($nota3 != null || $nota3 != "")) ? $nota3 : '';
                            ?>"/>
                            Nota 04:
                            <input type="number" size="2" name="nota4" value="<?php
                            // Preenche o sigla no campo sigla com um valor "value"
                            echo (isset($nota4) && ($nota4 != null || $nota4 != "")) ? $nota4 : '';
                            ?>"/>
                            <input type="submit" VALUE="Cadastrar"/>
                            <hr>
                        </form>
                        <?php

                        echo (isset($msg) && ($msg != null || $msg != "")) ? $msg : '';

                        //chamada a paginação
                        $object->tabelapaginada();

                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<?php
$template->footer();
?>
