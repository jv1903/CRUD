<?php
// include dos arquivos
include_once './include/logado.php';
include_once './include/conexao.php';
include_once './include/header.php';
 
// Verifica se o ID foi passado para edição
$id = isset($_GET['id']) ? $_GET['id'] : null;
 
// Se o formulário for enviado, processa a inclusão ou edição
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Captura os dados do formulário
    $nome = $_POST['nome'];
    $Descricao = $_POST['descricao'];
 
    // Verifica se é uma edição ou uma nova inserção
    if ($id) {
        // Edição - Atualiza o cargo
        $sql = "UPDATE categorias SET Nome = '$nome', Descricao = '$Descricao' WHERE CategoriaID = $id";
    } else {
        // Inserção - Cria um novo cargo
        $sql = "INSERT INTO categorias (Nome, Descricao) VALUES ('$nome', '$Descricao')";
    }
 
    // Executa a consulta
    if ($conn->query($sql)) {
        // Se a operação for bem-sucedida, redireciona para a lista de cargos
        header("Location: lista-categorias.php");
        exit();
    } else {
        echo "Erro ao salvar categoria: " . $conn->error;
    }
}
 
// Se for para editar, recupera os dados do cargo
if ($id) {
    $sql = "SELECT * FROM categorias WHERE CategoriaID = $id";
    $resultado = $conn->query($sql);
    $categorias = $resultado->fetch_assoc();
}
?>
 
<main>
   <!-- Telas CRUD -->
   <div id="categoriaID" class="tela">
    <form class="crud-form" method="post" action="">
      <h2><?php echo $id ? 'Editar Categoria' : 'Cadastro de Categoria'; ?></h2>
     
      <!-- Campos do formulário -->
      <input type="text" name="nome" placeholder="Nome da categoria" value="<?php echo $id ? $cargo['Nome'] : ''; ?>" required>
      <input type="text" name="descricao" placeholder="descricao" value="<?php echo $id ? $cargo['Descricao'] : ''; ?>" required>
     
      <button type="submit"><?php echo $id ? 'Atualizar' : 'Salvar'; ?></button>
    </form>
  </div>
</main>
 
<?php
// include dos arquivos
include_once './include/footer.php';
?>
 
 