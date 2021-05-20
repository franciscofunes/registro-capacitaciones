<?php
    $title = 'Ver regisros';
    require_once 'includes/header.php';
    require_once 'includes/auth_check.php';
    require_once 'db/conn.php';
    

    $results = $crud->getAttendees();
?>
<div class="container">
    <div class="table-responsive mt-5 mb-2">
        <table class="table table-hover table-stripe">
            <thead >
                    <tr>
                        <th>#</th>
                        <th>Nombre</th>
                        <th>Apellido</th>
                        <th>Nacimiento</th>
                        <th>Correo Electrónico</th>
                        <th>Empresa</th>
                        <th>Acciones</th>
                    </tr>
            </thead>
        <?php while($r = $results->fetch(PDO::FETCH_ASSOC)) { ?>
                <tbody>     
                    <tr>
                        <td class="align-middle"><?php echo $r['attendee_id']?></td>
                        <td class="align-middle"><?php echo $r['firstname']?></td>
                        <td class="align-middle"><?php echo $r['lastname']?></td>
                        <td class="align-middle"><?php echo $r['dateofbirth']?></td>
                        <td class="align-middle"><?php echo $r['emailaddress']?></td>
                        <td class="align-middle"><?php echo $r['name']?></td>
                        <td>
                            <a href="view.php?id=<?php echo $r['attendee_id']?>" class="btn btn-primary btn-block">Ver</a>
                            <a href="edit.php?id=<?php echo $r['attendee_id']?>" class="btn btn-warning btn-block">Editar</a>
                            <a onclick="return confirm('¿Está seguro de eliminar este registro?');"
                            href="delete.php?id=<?php echo $r['attendee_id']?>" class="btn btn-danger btn-block">Eliminar</a>
                        </td>
                    </tr>
                </tbody>
            <?php } ?>
        </table>
    </div>
</div>
<?php require_once 'includes/footer.php'; ?>