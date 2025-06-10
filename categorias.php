<?php
// include dos arquivos
include_once   '../include/logado.php';
include_once   '../include/conexao.php';
 
// captura a acao dos dados
$acao = $_GET['acao'];
$categoriaid = $_GET['categoriaid'];
 
// validacao
switch ($acao) {
    case 'salvar':
        $nome = $_POST['nome'];
        
 
        if (empty($cargoid)) {
            $sql_include = "INSERT INTO categorias (Nome)
            VALUES('{$nome}')";
 
            if (mysqli_query($conn, $sql_include)) {
                header('Location: http://localhost:8080/sistema/lista-categorias.php');
            }
        }
        else {
            $sql_alterate = "UPDATE categorias SET nome = '$nome' WHERE CategoriaID = $categoriaid";
 
            if (mysqli_query($conn, $sql_alterate)) {
                header("Location: http://localhost:8080/sistema/lista-categorias.php");
                   }
                }
        break;
 
        case 'delete':
            $sql_delete = 'DELETE FROM categorias WHERE CategoriaID ='.$categoriaid;
 
            if (mysqli_query($conn, $sql_delete)) {
                header ('Location: ../lista-categorias.php');
            }
           
            break;
 
        case 'update':
   
            $nome = $_POST['nome'];
            
   
            $sql_update = "UPDATE categorias SET Nome = '{$nome}' WHERE CategoriaID = {$categoriaid}";
            exit($sql_update);
           
            if (mysqli_query($conn, $sql_update)) {
                header ('Location: ../lista-categorias.php');
            }
            break;
    default:
        # code...
        break;
}
?>
 