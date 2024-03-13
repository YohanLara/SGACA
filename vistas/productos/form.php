<div class="container-fluid">
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h3 mb-0 text-gray-800">Panel de Administración</h1>
        <a href="?c=productos" class="btn btn-primary">Regresar</a>
    </div>
  
    <div class="col-lg-6 m-auto">
        <div class="card">
            <div class="card-header bg-primary text-white">
                <?=$titulo?> Producto
            </div>
            <div class="card-body">
                <form action="?c=productos&a=Guardar" method="post" autocomplete="off">
                    <div class="form-group">
                        <input type="hidden" name="pro_id" id="pro_id" value="<?=$p->getPro_id()?>" required>
                    </div>
                    <div class="form-group">
                        <label for="pro_nombre">Nombre</label>
                        <input type="text" class="form-control" name="pro_nombre" id="pro_nombre" value="<?=$p->getPro_nombre()?>" required>
                    </div>
                    <div class="form-group">
                        <label for="pro_marca">Marca</label>
                        <input type="text" class="form-control" name="pro_marca" id="marca" value="<?=$p->getPro_marca()?>" required>
                    </div>
                    <div class="form-group">
                        <label for="pro_precio">Precio</label>
                        <input type="number" class="form-control" name="pro_precio" id="pro_precio" value="<?=$p->getPro_precio()?>" required>
                    </div>
                    <div class="form-group">
                        <label for="pro_cantidad">Cantidad</label>
                        <input type="number" class="form-control" name="pro_cantidad" id="pro_cantidad" value="<?=$p->getPro_cantidad()?>" required>
                    </div>
                    <input type="submit" value="Guardar producto" class="btn btn-primary">

                </form>
            </div>
        </div>
    </div>
</div>
