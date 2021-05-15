<?php
    $title = 'Editar Registros';

    require_once 'includes/header.php';
    require_once 'includes/auth_check.php';
    require_once 'db/conn.php';

    $results = $crud->getSpecialties();

    if(!isset($_GET['id'])){
        //echo 'error';
        include 'includes/errormessage.php';
        header("Location: viewrecords.php");        
    } 
    else{
        $id =$_GET['id'];
        $attendee = $crud->getAttendeeDetails($id);
    
    
?>

<div class="container mt-5 mb-2">
    <h1 class="text-center">Editar registros</h1>

    <form method="post" action="editpost.php">
        <input type="hidden" name="id" value="<?php echo $attendee['attendee_id']?>" />
        <div class="form-group">
            <label for="firstname">Nombre</label>
            <input type="text" class="form-control" value="<?php echo $attendee['firstname']?>" id="firstname" name="firstname">
        </div>
        <div class="form-group">
            <label for="lastname">Apellido</label>
            <input type="text" class="form-control" value="<?php echo $attendee['lastname']?>" id="lastname" name="lastname">
        </div>
        <div class="form-group">
            <label for="dob">Fecha de nacimiento</label>
            <input type="text" class="form-control" value="<?php echo $attendee['dateofbirth']?>" id="dob" name="dob">
        </div>
        <div class="form-group">
            <label for="specialty">Empresa donde trabajas</label>
            <select class="form-control" id="specialty" name="specialty">
                <?php while($r = $results->fetch(PDO::FETCH_ASSOC)){ ?>
                    <option value="<?php echo $r['specialty_id']?>" <?php if($r ['specialty_id'] == $attendee['specialty_id']) echo 'selected' ?>>
                        <?php echo $r['name']; ?>
                    </option>
                <?php } ?>    
            </select>
        </div>
        <div class="form-group">
            <label for="email">Correo Electrónico</label>
            <input type="email" class="form-control" value="<?php echo $attendee['emailaddress']?>" id="email" aria-describedby="emailHelp" name="email">
            <small id="emailHelp" class="form-text text-muted">Nunca compartiremos tu email con ninguna otra persona u entidad.</small>
        </div>
        <div class="form-group">
            <label for="phone">Número telefónico</label>
            <input type="text" class="form-control" value="<?php echo $attendee['contactnumber']?>" id="phone" aria-describedby="phoneHelp" name="phone">
            <small id="phoneHelp" class="form-text text-muted">Nunca compartiremos tu télefono con ninguna otra persona u entidad.</small>
        </div>
        <button type="submit" name="submit" class="btn btn-success">Guardar cambios</button>
        <a href="viewrecords.php" class="btn btn-info">Volver</a>
    </form>
    <?php }?>
</div>


<?php require_once 'includes/footer.php'; ?>