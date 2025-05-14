<?php 
// include dos arquivox
include_once './include/logado.php';
include_once './include/conexao.php';
include_once './include/header.php';
$sql = "SELECT * FROM produtos";
$resultado = $conn->query($sql);
?>

<main>

  <div class="container">
      <h1>Lista de Produtos</h1>
      <a href="./salvar-produtos.php" class="btn btn-add">Incluir</a> 
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Categoria</th>
            <th>Preço</th>
            <th>Ações</th>
          </tr>
        </thead>
        <tbody>
        <?php
          
          while ($dado = $resultado->fetch_assoc()){
          ?>
<tr>
<td><?php echo $dado['ProdutoID']; ?></td>
<td><?php echo $dado['Nome']; ?></td>
<td><?php echo $dado['CategoriaID']; ?></td>
<td>R$ <?php echo number_format($dado ['Preco'],2,',','.'); ?></td>

<td>

<a href="editar-produto.php?id=<?php echo $dado['ProdutoID']; ?>" class="btn btn-edit">Editar</a>

<a href="excluir-produto.php?id=<?php echo $dado['ProdutoID']; ?>" class="btn btn-delete">Excluir</a>
</td>
</tr>
<?php
          }
          ?>

        </tbody>
      </table>
    </div>

<?php 
  // include dos arquivox
  include_once './include/footer.php';
  ?>