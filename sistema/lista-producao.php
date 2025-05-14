<?php 
// include dos arquivos
include_once './include/logado.php';
include_once './include/conexao.php';
include_once './include/header.php';

$sql = "SELECT pc.ProducaoID, pd.Nome AS ducNome, pc.DataProducao AS DProd, pc.ClienteID, c.Nome AS CN, f.Nome AS FNome, pc.DataEntrega AS DataEn 
FROM producao AS pc 
INNER JOIN produtos AS pd ON pc.ProdutoID = pd.ProdutoID
INNER JOIN clientes AS c ON pc.ClienteID = c.ClienteID
INNER JOIN funcionarios AS f ON pc.FuncionarioID = f.FuncionarioID";


$resultado = $conn->query($sql);
?>

<main>
  <div class="container">
    <h1>Lista de Produções</h1>
    <a href="./salvar-producao.php" class="btn btn-add">Incluir</a> 
    <table>
      <thead>
        <tr>
          <th>ID</th>
          <th>Produto</th>
          <th>Data</th>
          <th>Clientes</th>
          <th>Funcionarios</th>
          <th>Data Entrega</th>
          <th>Ações</th>
        </tr>
      </thead>
      <tbody>
        <?php while ($dado = mysqli_fetch_assoc($resultado)) { ?>
        <tr>
          <td><?php echo $dado['ProducaoID']; ?></td>
          <td><?php echo $dado['ducNome']; ?></td>
          <td><?php echo $dado['DProd']; ?></td>
          <td><?php echo $dado['CN']; ?></td>
          <td><?php echo $dado['FNome']; ?></td>
          <td><?php echo $dado['DataEn']; ?></td>
          <td>
            <a href="editar-producao.php?id=<?php echo $dado['ProducaoID']; ?>" class="btn btn-edit">Editar</a>
            <a href="excluir-producao.php?id=<?php echo $dado['ProducaoID']; ?>" class="btn btn-delete">Excluir</a>
          </td>
        </tr>
        <?php } ?>
      </tbody>
    </table>
  </div>
</main>

<?php 
// include dos arquivos
include_once './include/footer.php';
?>
