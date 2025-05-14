<?php 
// include dos arquivox
include_once './include/logado.php';
include_once './include/conexao.php';
include_once './include/header.php';
$sql = "SELECT * FROM funcionarios";
$resultado = $conn->query($sql);
?>
<main>

  <div class="container">
      <h1>Lista de Funcionários</h1>
      <a href="./salvar-funcionarios.php" class="btn btn-add">Incluir</a> 
      <table>
        <thead>
          <tr>
            <th>ID</th>
            <th>Nome</th>
            <th>Cargo</th>
            <th>Setor</th>
            <th>Ações</th>
          </tr>
        </thead>
        <tbody>
        <?php
          
          while ($dado = $resultado->fetch_assoc()){
          ?>
<tr>
<td><?php echo $dado['FuncionarioID']; ?></td>
<td><?php echo $dado['Nome']; ?></td>
<td><?php echo $dado['CargoID']; ?></td>
<td><?php echo $dado['SetorID']; ?></td>

<td>

<a href="editar-setor.php?id=<?php echo $dado['SetorID']; ?>" class="btn btn-edit">Editar</a>

<a href="excluir-setor.php?id=<?php echo $dado['SetorID']; ?>" class="btn btn-delete">Excluir</a>
</td>
</tr>
<?php
          }
          ?>
          
        </tbody>
      </table>
    </div>
</main>

<?php 
  // include dos arquivox
  include_once './include/footer.php';
  ?>