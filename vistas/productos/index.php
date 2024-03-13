  <!-- Begin Page Content -->
  <div class="container-fluid">

<!-- Page Heading -->



<!-- DataTales Example -->
<div class="card shadow mb-4">
    <div class="card-header py-3">
        <h6 class="m-0 font-weight-bold text-primary">Productos</h6>
    </div>
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>NOMBRE</th>
                        <th>MARCA</th>
                        <th>PRECIO</th>
                        <th>CANTIDAD</th>
                        <th>ACCIONES</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach ($this->modelo->listar() as $row): ?>
                    <tr>
                        <td><?php echo $row->pro_id; ?></td>
                        <td><?php echo $row->pro_nombre; ?></td>
                        <td><?php echo $row->pro_marca; ?></td>
                        <td><?php echo $row->pro_precio; ?></td>
                        <td><?php echo $row->pro_cantidad; ?></td>
                        <td>
                        <a href="?c=productos&a=FormCrear&id=<?=$row->pro_id?>" class="btn btn-info btn-flat"><i class="fas fa-sync-alt"></i></a>
                        <a href="#" onclick="confirmarEliminar(<?=$row->pro_id?>)" class="btn btn-danger"><i class="fas fa-trash-alt"></i></a>



                        </td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>