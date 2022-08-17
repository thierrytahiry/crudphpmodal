<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRUD POO PHP</title>
    <link rel="stylesheet" href="css/bootstrap.min.css">
    <script src="js/bootstrap.bundle.min.js"></script>


</head>

<body>
    <!--Ajout etudiant-->
    <div class="modal fade" id="etudiantAddModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Ajout etudiant</h5>
                    <button class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="saveEtudiant">
                    <div class="modal-body">

                        <div id="errorMessage" class="alert alert-warning d-none"></div>
                        <div class="mb-3">
                            <label for="">Nom</label>
                            <input type="text" name="nom" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">Email</label>
                            <input type="email" name="email" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">Téléphone</label>
                            <input type="text" name="telephone" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">Cours</label>
                            <input type="text" name="cours" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Ajouter</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--Modification etudiant-->
    <div class="modal fade" id="etudiantEditModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Modification etudiant</h5>
                    <button class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <form id="updateEtudiant">
                    <div class="modal-body">

                        <div id="errorMessageEdit" class="alert alert-warning d-none"></div>

                        <input type="hidden" name="etudiant_id" id="etudiant_id">

                        <div class="mb-3">
                            <label for="">Nom</label>
                            <input type="text" name="nom" id="nom" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">Email</label>
                            <input type="email" name="email" id="email" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">Téléphone</label>
                            <input type="text" name="telephone" id="telephone" class="form-control">
                        </div>
                        <div class="mb-3">
                            <label for="">Cours</label>
                            <input type="text" name="cours" id="cours" class="form-control">
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-primary">Modifier</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!--Détails d'information etudiant-->
    <div class="modal fade" id="etudiantViewModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Détails etudiant</h5>
                    <button class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">


                    <div class="mb-3">
                        <label for="">Nom</label>
                        <p id="view_nom" class="form-control"></p>
                    </div>
                    <div class="mb-3">
                        <label for="">Email</label>
                        <p id="view_email" class="form-control"></p>
                    </div>
                    <div class="mb-3">
                        <label for="">Téléphone</label>
                        <p id="view_telephone" class="form-control"></p>
                    </div>
                    <div class="mb-3">
                        <label for="">Cours</label>
                        <p id="view_cours" class="form-control"></p>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                </div>
            </div>
        </div>
    </div>

    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="card-header">
                    <h2 class="text-center text-info">CRUD DE PHP avec modal
                        <button type="button" class="btn btn-primary float-end" data-bs-toggle="modal" data-bs-target="#etudiantAddModal">
                            Add etudiants
                        </button>
                    </h2>
                </div>
                <div class="card-body">

                    <table id="myTable" class="table table-bordered table-striped">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nom</th>
                                <th>Email</th>
                                <th>Télephone</th>
                                <th>Cours</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            require 'dbcon.php';
                            $query = "SELECT * FROM etudiants";
                            $query_run = mysqli_query($con, $query);

                            if (mysqli_num_rows($query_run) > 0) {
                                foreach ($query_run as $etudiant) {
                            ?>
                                    <tr>
                                        <td><?= $etudiant['id'] ?></td>
                                        <td><?= $etudiant['nom'] ?></td>
                                        <td><?= $etudiant['email'] ?></td>
                                        <td><?= $etudiant['telephone'] ?></td>
                                        <td><?= $etudiant['cours'] ?></td>
                                        <td>
                                            <button type="button" value="<?= $etudiant['id']; ?>" class="viewEtudiantBtn btn btn-info">Details</button>
                                            <button type="button" value="<?= $etudiant['id']; ?>" class="editEtudiantBtn btn btn-success">Edit</button>
                                            <button type="button" value="<?= $etudiant['id']; ?>" class="deleteEtudiantBtn btn btn-danger">Supprimer</button>
                                        </td>
                                    </tr>
                            <?php
                                }
                            }
                            ?>

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <script src="jquery/jquery.min.js"></script>
    <script>
        $(document).on('submit', '#saveEtudiant', function(e) {
            e.preventDefault();

            var formData = new FormData(this);
            formData.append("save_etudiant", true);

            $.ajax({
                type: "POST",
                url: "code.php",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {

                    var res = jQuery.parseJSON(response);
                    if (res.status == 422) {
                        $('#errorMessage').removeClass('d-none');
                        $('#errorMessage').text(res.message);
                    } else if (res.status == 200) {

                        $('#errorMessage').addClass('d-none');
                        $('#etudiantAddModal').modal('hide');
                        $('#saveEtudiant')[0].reset();

                        $('#myTable').load(location.href + " #myTable");
                    }
                }
            });
        });

        $(document).on('click', '.editEtudiantBtn', function() {
            var etudiant_id = $(this).val();
            // alert(etudiant_id);
            $.ajax({
                type: "POST",
                url: "code.php?etudiant_id=" + etudiant_id,
                success: function(response) {

                    var res = jQuery.parseJSON(response);
                    if (res.status == 422) {
                        alert(res.message);
                    } else if (res.status == 200) {

                        $('#etudiant_id').val(res.data.id);
                        $('#nom').val(res.data.nom);
                        $('#email').val(res.data.email);
                        $('#telephone').val(res.data.telephone);
                        $('#cours').val(res.data.cours);

                        $('#etudiantEditModal').modal('show');
                    }
                }
            });
        });

        $(document).on('submit', '#updateEtudiant', function(e) {
            e.preventDefault();

            var formData = new FormData(this);
            formData.append("update_etudiant", true);

            $.ajax({
                type: "POST",
                url: "code.php",
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {

                    var res = jQuery.parseJSON(response);
                    if (res.status == 422) {
                        $('#errorMessageEdit').removeClass('d-none');
                        $('#errorMessageEdit').text(res.message);
                    } else if (res.status == 200) {

                        $('#errorMessageEdit').addClass('d-none');
                        $('#etudiantEditModal').modal('hide');
                        $('#updateEtudiant')[0].reset();

                        $('#myTable').load(location.href + " #myTable");
                    }
                }
            });
        });

        $(document).on('click', '.viewEtudiantBtn', function() {
            var etudiant_id = $(this).val();
            // alert(etudiant_id);
            $.ajax({
                type: "POST",
                url: "code.php?etudiant_id=" + etudiant_id,
                success: function(response) {

                    var res = jQuery.parseJSON(response);
                    if (res.status == 422) {
                        alert(res.message);
                    } else if (res.status == 200) {

                        $('#view_nom').text(res.data.nom);
                        $('#view_email').text(res.data.email);
                        $('#view_telephone').text(res.data.telephone);
                        $('#view_cours').text(res.data.cours);

                        $('#etudiantViewModal').modal('show');
                    }
                }
            });
        });

        $(document).on('click', '.deleteEtudiantBtn', function(e){
            e.preventDefault();

            if(confirm('Vous êtes sur de supprimer le données ??'))
            {
                var etudiant_id = $(this).val();
                $.ajax({
                type: "POST",
                url: "code.php",
                data: {
                    'delete_etudiant': true,
                    'etudiant_id': etudiant_id
                },
                success: function(response) {

                    var res = jQuery.parseJSON(response);
                    if(res.status == 500){
                        alert(res.message);
                    }else{
                        alert(res.message);
                        $('#myTable').load(location.href + " #myTable");
                    }
                }
            });
            }
        }); 
    </script>
</body>

</html>