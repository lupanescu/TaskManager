<?php
include("../include/dbconnect.php");

?>
<!doctype html>
<html lang="en">
<?php
include("../include/html_head.php");
?>
<body>
<?php
include("../include/header.php");
?>
<div class="container-xxl mt-4">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-center">
                <h4 class="font-size-18">Inregistrare</h4>

            </div>
        </div>
    </div>

    <div class="row justify-content-center">
        <div class="col-12 col-sm-10 col-md-8 col-lg-8 col-xl-6">
            <div class="card">
                <div class="card-body">
                    <form id="formularAdaugareUtilizator">
                        <input type="hidden" name="actiune" value="adaugare">
                        <fieldset>
                            <div class="form-group">
                                <label for="name">Nume</label>
                                <input id="name" required minlength="3" maxlength="100" class="form-control" type="text" name="nume">
                            </div>

                            <div class="form-group">
                                <label for="email">Email</label>
                                <input id="email" minlength="5" required maxlength="50" class="form-control" type="email" name="email">
                            </div>

                            <div class="form-group">
                                <label for="parola">Parola</label>
                                <input id="parola" minlength="5" required maxlength="50" class="form-control" type="password" name="parola">
                            </div>


                        </fieldset>
                        <div class="mt-2 text-end">
                            <button type="submit" class="btn btn-primary">Salvare</button>
                        </div>

                    </form>


                </div> <!-- end card body-->
            </div> <!-- end card -->
        </div><!-- end col-->
    </div>

</div>
<?php
include("../include/footer.php");
?>

<script>
    $("#formularAdaugareUtilizator").submit(function(event) {
        event.preventDefault();

        $.post("actions.php", $("#formularAdaugareUtilizator").serialize(), function(response) {
            var result = JSON.parse(response);
            if(!result.success) {
                Swal.fire({
                    icon: 'error',
                    text: result.error,
                })
            }
            else {
                location.href = "/utilizatori";
            }
        })
    });
</script>

</body>
</html>