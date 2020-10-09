<?php
include 'inc/header.php'
?>
<!-- PAGE CONTENT-->

<div class="main-content" >
        <div class="section__content section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col">
                        <div class="au-card">
                            <h3>Ajouter Des Jours Fériés </h3>
                            <form action="inc/forms.php" method="post">
                                <div class="row mt-5">
                                    <div class="col-4 offset-2">
                                        <label class="mr-5" for="dated">Date Debut</label>
                                        <input type="date" id="dated" name="dated" required>
                                    </div>
                                    <div class="col-4 offset-2">
                                        <label class="mr-5" for="datef">Date Fin</label>
                                        <input type="date" id="datef" name="datef" required>
                                    </div>
                                </div>
                                <div class="row mt-5">
                                    <div class="col-2 offset-10">
                                        <input type="submit" class="btn btn-outline-success" value="Ajouter">
                                        <input type="hidden" name="form" value="jrf">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div><!-- .col -->
                </div>
            </div>
            <div class="container-fluid mt-5">
                <div class="row">
                    <div class="col">
                        <div class="au-card">
                            <h3>Supprimer Un Jour Férié </h3>
                            <form action="inc/forms.php" method="post">
                                <div class="row mt-5">
                                    <div class="col-4 offset-2">
                                        <label class="mr-5" for="dates">Date a Supprimer</label>
                                        <input type="date" id="dates" name="dates" required>
                                    </div>
                                </div>
                                <div class="row mt-5">
                                    <div class="col-2 offset-10">
                                        <input type="submit" class="btn btn-outline-success" value="Supprimer">
                                        <input type="hidden" name="form" value="sjrf">
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div><!-- .col -->
                </div>
            </div>
            <div class="container-fluid mt-5">
                <div class="row">
                    <div class="col">
                        <div class="au-card">
                            <div id="calendar"></div>
                        </div>
                    </div><!-- .col -->
                </div>
            </div>
    </div>
</div>
<?php include 'inc/footer.php'?>
