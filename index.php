<?php
    $title = 'Inicio';
    require_once 'includes/header.php';
    require_once 'db/conn.php';

    $results = $crud->getSpecialties();
?>
<div class="container">
    <div class="container">
        <h1 class="text-center mt-5">Registro de Capacitación </h1>
    </div>
    <form method="post" action="success.php" enctype="multipart/form-data">
        <div class="form-group">
            <label for="firstname">Nombre</label>
            <input required type="text" class="form-control" id="firstname" name="firstname">
        </div>
        <div class="form-group">
            <label for="lastname">Apellido</label>
            <input  required type="text" class="form-control" id="lastname" name="lastname">
        </div>
        <div class="form-group">
            <label for="dob">Fecha de nacimiento</label>
            <input required type="text" class="form-control" id="dob" name="dob">
        </div>
        <div class="form-group">
            <label for="specialty">Empresa donde trabajas</label>
            <select class="form-control" id="specialty" name="specialty">
                <?php while($r = $results->fetch(PDO::FETCH_ASSOC)){ ?>
                    <option value="<?php echo $r['specialty_id']?>"><?php echo $r['name']; ?></option>
                <?php } ?>    
            </select>
        </div>
        <div class="form-group">
            <label for="email">Correo Electrónico</label>
            <input required type="email" class="form-control" id="email" aria-describedby="emailHelp" name="email">
            <small id="emailHelp" class="form-text text-muted">Nunca compartiremos tu email con ninguna otra persona u entidad.</small>
        </div>
        <div class="form-group">
            <label for="phone">Número telefónico</label>
            <input required type="text" class="form-control" id="phone" aria-describedby="phoneHelp" name="phone">
            <small id="phoneHelp" class="form-text text-muted">Nunca compartiremos tu télefono con ninguna otra persona u entidad.</small>
        </div>
        <div class="custom-file">
            <input type="file" accept="image/" class="custom-file-input" id="avatar" name="avatar">  
            <label class="custom-file-label" for="avatar">Elegir archivo... </label>
            <small id="avatar" class="form-text text-danger">Subir una imagen es opcional</small>      
        </div>
        
        <button type="submit" name="submit" class="btn btn btn-primary btn-block mt-2">Enviar</button>
    </form>
</div>
<br><br><br><br><br>


<?php require_once 'includes/footer.php'; ?>