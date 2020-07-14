<?php
include 'inc/header.php';
$pat=$f->getPatient($_GET["n_ass"]);
$dec=$f->getDec($_GET["n_ass"]);

foreach ($pat as $p){
?>

    <div class="main-content" >
        <div class=" section__content--p30">
            <div class="container-fluid">
                <div class="row">
                    <div class="col-10 offset-1">
                        <div class="au-card ">
                            <a href="patients.php"><i style="background: #7aca2a; border-radius: 10px; padding: 10px; color: white" class="zmdi zmdi-arrow-left"></i></a> Retour vers patients
                            <h3 class="text-center text-capitalize text-success mb-5"><?php echo $p["nom"].' '.$p["prenom"] ?></h3>
                            <div class="row m-b-10">
                                <div class="col-4">
                                    <p class="text-center"><strong class="text-secondary">Numèro Assuré :</strong><p class="text-center" ><?php echo '  '.$p["n_assure"] ?></p></p>
                                </div>
                                <div class="col-4">
                                    <p class="text-center"><strong class="text-secondary">Qualité :</strong><p class="text-center" ><?php echo '  '.$p["qualite"] ?></span></p>
                                </div>
                                <div class="col-4">
                                    <p class="text-center"><strong class="text-secondary">Nom Prenom Assuré :</strong><p  class="text-capitalize text-center"><?php echo ' '.$p["nom_ass"].' '.$p["pre_ass"] ?></span></p>
                                </div>

                            </div>
                            <hr>
                            <div class="row mb-5 mt-5">
                                <div class="offset-1 col-3">
                                    <h3>Liste Prises En Charge</h3>
                                </div>
                                <div class="col-3 offset-5">
                                    <button type="button" class="au-btn au-btn-icon au-btn--green au-btn--small" data-toggle="modal" data-target="#addPEC" >
                                    <i class="zmdi zmdi-plus"></i>Ajouter PEC</button>
                                </div>
                                <div class="modal fade" id="addPEC" tabindex="1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
                                <div class="modal-dialog modal-lg " role="document">
                                    <div class="modal-content">
                                        <div class="modal-header text-center">
                                            <h4 class="modal-title w-100 font-weight-bold">Nouvelle Prise En Charge</h4>
                                        </div>
                                        <form action="inc/forms.php" method="post" onsubmit="return submit_form(this);">

                                            <div class="modal-body mx-3">
                                                <h5 class="text-center mb-3" >Decision</h5>
                                                <div class="container-fluid">
                                                    <div class="row mb-1">
                                                        <div class="form-group col-4 offset-4">
                                                            <div style="text-align: center;"><label for="num_dec" class="control-label mb-1">Numèro Decision</label></div>
                                                            <input id="num_dec" name="num_dec" type="text" class="form-control text-center" value="" placeholder="XX/XXXX/XXXX" maxlength="" onkeyup="checkAvD(this)" required>
                                                            <span id="num_dec_r"></span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-1">
                                                        <div class="col-4 ">
                                                            <div class="form-group">
                                                                <div style="text-align: center;"><label for="nbs" class="control-label mb-1">Nb seance</label></div>
                                                                <input id="nbs" name="nbs" type="text" class="form-control text-center" minlength="1"  value="" placeholder="" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="form-group">
                                                                <div style="text-align: center;"><label for="nb_p_s" class="control-label mb-1">nb seance/sem</label></div>
                                                                <select id="nb_p_s" name="nb_p_s" class="form-control">
                                                                    <option value="1">1</option>
                                                                    <option value="2">2</option>
                                                                    <option value="3" selected>3</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-4 ">
                                                            <div class="form-group">
                                                                <div style="text-align: center;"><label for="date_deb" class="control-label mb-1">date debut</label></div>
                                                                <input  id="date_deb" name="date_deb" type="date" class="form-control text-center" value="" placeholder="" onchange="handler(event);" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-1">
                                                        <div class="col-4 offset-4">
                                                            <div class="form-group">
                                                                <div style="text-align: center;"><label for="pu" class="control-label mb-1">Prix Unitaire</label></div>
                                                                <input  id="pu" name="pu" type="text" class="form-control text-center" value="11.5" placeholder="">

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <h5 class="text-center" >Jours</h5>
                                                <div class="row mt-5">
                                                    <div class="col-4">
                                                        <table class="table text-center">
                                                            <tr><td><label class="text-danger"  for="jr1">1 . </label><input style="width: 80%;" class="text-center" name="jr1"  id="jr1"  type="text" value="" required></td></tr>
                                                            <tr><td><label class="text-danger"  for="jr4">4 . </label><input style="width: 80%;" class="text-center" name="jr4"  id="jr4"  type="text" value=""></td></tr>
                                                            <tr><td><label class="text-danger"  for="jr7">7 . </label><input style="width: 80%;" class="text-center" name="jr7"  id="jr7"  type="text" value=""></td></tr>
                                                            <tr><td><label class="text-danger" for="jr10">10 . </label><input style="width: 80%;" class="text-center" name="jr10" id="jr10" type="text" value=""></td></tr>
                                                            <tr><td><label class="text-danger" for="jr13">13 . </label><input style="width: 80%;" class="text-center" name="jr13" id="jr13" type="text" value=""></td></tr>
                                                            <tr><td><label class="text-danger" for="jr16">16 . </label><input style="width: 80%;" class="text-center" name="jr16" id="jr16" type="text" value=""></td></tr>
                                                            <tr><td><label class="text-danger" for="jr19">19 . </label><input style="width: 80%;" class="text-center" name="jr19" id="jr19" type="text" value=""></td></tr>
                                                            <tr><td><label class="text-danger" for="jr22">22 . </label><input style="width: 80%;" class="text-center" name="jr22" id="jr22" type="text" value=""></td></tr>
                                                            <tr><td><label class="text-danger" for="jr25">25 . </label><input style="width: 80%;" class="text-center" name="jr25" id="jr25" type="text" value=""></td></tr>
                                                            <tr><td><label class="text-danger" for="jr28">28 . </label><input style="width: 80%;" class="text-center" name="jr28" id="jr28" type="text" value=""></td></tr>
                                                            <tr><td><label class="text-danger" for="jr31">31 . </label><input style="width: 80%;" class="text-center" name="jr31" id="jr31" type="text" value=""></td></tr>
                                                            <tr><td><label class="text-danger" for="jr34">34 . </label><input style="width: 80%;" class="text-center" name="jr34" id="jr34" type="text" value=""></td></tr>

                                                        </table>
                                                    </div>
                                                    <div class="col-4">
                                                        <table class="table text-center">
                                                            <tr><td><label class="text-danger"  for="jr2">2 . </label><input style="width: 80%;" class="text-center" name="jr2"  id="jr2"  type="text" value=""></td></tr>
                                                            <tr><td><label class="text-danger"  for="jr5">5 . </label><input style="width: 80%;" class="text-center" name="jr5"  id="jr5"  type="text" value=""></td></tr>
                                                            <tr><td><label class="text-danger"  for="jr8">8 . </label><input style="width: 80%;" class="text-center" name="jr8"  id="jr8"  type="text" value=""></td></tr>
                                                            <tr><td><label class="text-danger"  for="jr11">11 . </label><input style="width: 80%;" class="text-center" name="jr11" id="jr11" type="text" value=""></td></tr>
                                                            <tr><td><label class="text-danger"  for="jr14">14 . </label><input style="width: 80%;" class="text-center" name="jr14" id="jr14" type="text" value=""></td></tr>
                                                            <tr><td><label class="text-danger"  for="jr17">17 . </label><input style="width: 80%;" class="text-center" name="jr17" id="jr17" type="text" value=""></td></tr>
                                                            <tr><td><label class="text-danger"  for="jr20">20 . </label><input style="width: 80%;" class="text-center" name="jr20" id="jr20" type="text" value=""></td></tr>
                                                            <tr><td><label class="text-danger"  for="jr23">23 . </label><input style="width: 80%;" class="text-center" name="jr23" id="jr23" type="text" value=""></td></tr>
                                                            <tr><td><label class="text-danger"  for="jr26">26 . </label><input style="width: 80%;" class="text-center" name="jr26" id="jr26" type="text" value=""></td></tr>
                                                            <tr><td><label class="text-danger"  for="jr29">29 . </label><input style="width: 80%;" class="text-center" name="jr29" id="jr29" type="text" value=""></td></tr>
                                                            <tr><td><label class="text-danger"  for="jr32">32 . </label><input style="width: 80%;" class="text-center" name="jr32" id="jr32" type="text" value=""></td></tr>
                                                            <tr><td><label class="text-danger"  for="jr35">35 . </label><input style="width: 80%;" class="text-center" name="jr35" id="jr35" type="text" value=""></td></tr>
                                                        </table>
                                                    </div>
                                                    <div class="col-4">
                                                        <table class="table text-center">
                                                            <tr><td><label class="text-danger"  for="jr3">3 .</label><input style="width: 80%;" class="text-center" name="jr3"  id="jr3"  type="text" value=""></td></tr>
                                                            <tr><td><label class="text-danger"  for="jr6">6 .</label><input style="width: 80%;" class="text-center" name="jr6"  id="jr6"  type="text" value=""></td></tr>
                                                            <tr><td><label class="text-danger"  for="jr9">9 .</label><input style="width: 80%;" class="text-center" name="jr9"  id="jr9"  type="text" value=""></td></tr>
                                                            <tr><td><label class="text-danger"  for="jr12">12 .</label><input style="width: 80%;" class="text-center" name="jr12" id="jr12" type="text" value=""></td></tr>
                                                            <tr><td><label class="text-danger"  for="jr15">15 .</label><input style="width: 80%;" class="text-center" name="jr15" id="jr15" type="text" value=""></td></tr>
                                                            <tr><td><label class="text-danger"  for="jr18">18 .</label><input style="width: 80%;" class="text-center" name="jr18" id="jr18" type="text" value=""></td></tr>
                                                            <tr><td><label class="text-danger"  for="jr21">21 .</label><input style="width: 80%;" class="text-center" name="jr21" id="jr21" type="text" value=""></td></tr>
                                                            <tr><td><label class="text-danger"  for="jr24">24 .</label><input style="width: 80%;" class="text-center" name="jr24" id="jr24" type="text" value=""></td></tr>
                                                            <tr><td><label class="text-danger"  for="jr27">27 .</label><input style="width: 80%;" class="text-center" name="jr27" id="jr27" type="text" value=""></td></tr>
                                                            <tr><td><label class="text-danger"  for="jr30">30 .</label><input style="width: 80%;" class="text-center" name="jr30" id="jr30" type="text" value=""></td></tr>
                                                            <tr><td><label class="text-danger"  for="jr33">33 .</label><input style="width: 80%;" class="text-center" name="jr33" id="jr33" type="text" value=""></td></tr>
                                                            <tr><td><label class="text-danger"  for="jr36">36 .</label><input style="width: 80%;" class="text-center" name="jr36" id="jr36" type="text" value=""></td></tr>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer d-flex justify-content-center">
                                                <input type="hidden" name="num_ass" value="<?php echo $_GET["n_ass"]?>">
                                                <input type="hidden" name="form" value="addPEC">
                                                <input type="button" class="btn btn-outline-danger" data-dismiss="modal" aria-label="Close"  value="Cancel">
                                                <input type="submit" class="btn btn-outline-success" value="Ajouter">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            </div>
                            <div class="table-responsive table-responsive-data2">
                            <table id="example" class="table table-data2 text-center">
                                <thead>
                                <tr>
                                    <th>
                                        <label class="au-checkbox">
                                            <input type="checkbox">
                                            <span class="au-checkmark"></span>
                                        </label>
                                    </th>
                                    <th>Num° Assuré</th>
                                    <th>Num° Decision</th>
                                    <th>Nombre Seance</th>
                                    <th>Nombre Seance/Semaine</th>
                                    <th>Date Debut</th>
                                    <th>Prix Unitaire</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $x=1;
                                foreach ($dec as $d)
                                {   $facture=$f->getFact($d["n_decision"]);
                                    foreach ($facture as $fac){ $id=$fac["id"];}
                                    echo'
                                <tr';if ($d["bord"]=="0"){echo ' style="background: rgb(255,255,255);background: linear-gradient(180deg, rgba(255,255,255,0.3) 0%, rgba(122,202,42,0.3) 10%, rgba(122,202,42,0.3) 50%, rgba(122,202,42,0.3) 90%, rgba(255,255,255,0.3) 100%)" ';}else{echo' style="background: rgb(255,255,255);background: linear-gradient(180deg, rgba(255,255,255,0.3) 0%, rgba(255,193,7,0.3) 10%, rgba(255,193,7,0.3) 50%, rgba(255,193,7,0.3) 90%, rgba(255,255,255,0.3) 100%)" ';} echo 'class="tr-shadow">
                                    <td>
                                        <label class="au-checkbox">
                                            <input type="checkbox">
                                            <span class="au-checkmark"></span>
                                        </label>
                                    </td>
                                    <td>'.$d["n_assure"].'</td>
                                    <td>'.$d["n_decision"].'</td>
                                    <td>'.$d["nbr_s"].'</td>
                                    <td>'.$d["nb_s_sem"].'</td>
                                    <td>'.$d["dat_deb"].'</td>
                                    <td>'.$d["pu"].'</td>
                                    <td>
                                        <div class="table-data-feature">
                                            <button class="item" data-toggle="modal" data-target="#edit'.$x.'" data-placement="top" title="Edit">
                                                <i class="zmdi zmdi-edit"></i>
                                            </button>
                                            <div class="modal fade" id="edit'.$x.'" tabindex="1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
                                <div class="modal-dialog modal-lg " role="document">
                                    <div class="modal-content">
                                        <div class="modal-header text-center">
                                            <h4 class="modal-title w-100 font-weight-bold">Modifier Prise En Charge</h4>
                                        </div>
                                        <form action="inc/forms.php" method="post">

                                            <div class="modal-body mx-3">
                                                <h5 class="text-center mb-3" >Decision</h5>
                                                <div class="container-fluid">
                                                    <div class="row mb-1">
                                                        <div class="form-group col-4 offset-4">
                                                            <div style="text-align: center;"><label for="num_dec'.$x.'" class="control-label mb-1">Numèro Decision</label></div>
                                                            <input id="num_dec'.$x.'" name="num_dec" type="text" class="form-control text-center" value="'.$d["n_decision"].'" placeholder="XX/XXXX/XXXX" maxlength="15">
                                                        </div>
                                                    </div>
                                                    <div class="row mb-1">
                                                        <div class="col-4 ">
                                                            <div class="form-group">
                                                                <div style="text-align: center;"><label for="nbs'.$x.'" class="control-label mb-1">Nb seance</label></div>
                                                                <input id="nbs'.$x.'" name="nbs" type="text" class="form-control text-center" value="'.$d["nbr_s"].'" placeholder="">
                                                            </div>
                                                        </div>
                                                        <div class="col-4">
                                                            <div class="form-group">
                                                                <div style="text-align: center;"><label for="nb_p_s'.$x.'" class="control-label mb-1">nb seance/sem</label></div>
                                                                <select id="nb_p_s'.$x.'" name="nb_p_s" class="form-control text-center">
                                                                    <option value="1" ';if($d["nb_s_sem"]=="1"){echo " selected ";};echo'>1</option>
                                                                    <option value="2" ';if($d["nb_s_sem"]=="2"){echo " selected ";};echo'>2</option>
                                                                    <option value="3" ';if($d["nb_s_sem"]=="3"){echo " selected ";};echo'>3</option>
                                                                </select>
                                                            </div>
                                                        </div>
                                                        <div class="col-4 ">
                                                            <div class="form-group">
                                                                <div style="text-align: center;"><label for="date_deb'.$x.'" class="control-label mb-1">date debut</label></div>
                                                                <input  id="date_deb'.$x.'" name="date_deb" type="date" class="form-control text-center" value="'.$d["dat_deb"].'" placeholder="" onchange="handler(event,'.$x.');">
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-1">
                                                        <div class="col-4 offset-4">
                                                            <div class="form-group">
                                                                <div style="text-align: center;"><label for="pu'.$x.'" class="control-label mb-1">Prix Unitaire</label></div>
                                                                <input  id="pu'.$x.'" name="pu" type="text" class="form-control text-center" value="11.5" placeholder="">

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <h5 class="text-center" >Jours</h5>
                                                <div class="row mt-5">
                                                    <div class="col-4">
                                                        <table class="table text-center">
                                                            <tr><td><label class="text-danger"  for="j'.$x.'r1">1 . </label><input style="width: 80%;" class="text-center" name="jr1"  id="j'.$x.'r1"  type="text" value="';if($cons=$f->getCon($d["n_decision"],1)) { foreach ($cons as $c) { echo $c["date_jour"];}} echo'"></td></tr>
                                                            <tr><td><label class="text-danger"  for="j'.$x.'r4">4 . </label><input style="width: 80%;" class="text-center" name="jr4"  id="j'.$x.'r4"  type="text" value="'; $cons=$f->getCon($d["n_decision"],4); foreach ($cons as $c) { echo $c["date_jour"];} echo'"></td></tr>
                                                            <tr><td><label class="text-danger"  for="j'.$x.'r7">7 . </label><input style="width: 80%;" class="text-center" name="jr7"  id="j'.$x.'r7"  type="text" value="'; $cons=$f->getCon($d["n_decision"],7); foreach ($cons as $c) { echo $c["date_jour"];} echo'"></td></tr>
                                                            <tr><td><label class="text-danger" for="j'.$x.'r10">10 . </label><input style="width: 80%;" class="text-center" name="jr10" id="j'.$x.'r10" type="text" value="'; $cons=$f->getCon($d["n_decision"],10); foreach ($cons as $c) { echo $c["date_jour"];} echo'"></td></tr>
                                                            <tr><td><label class="text-danger" for="j'.$x.'r13">13 . </label><input style="width: 80%;" class="text-center" name="jr13" id="j'.$x.'r13" type="text" value="'; $cons=$f->getCon($d["n_decision"],13); foreach ($cons as $c) { echo $c["date_jour"];} echo'"></td></tr>
                                                            <tr><td><label class="text-danger" for="j'.$x.'r16">16 . </label><input style="width: 80%;" class="text-center" name="jr16" id="j'.$x.'r16" type="text" value="'; $cons=$f->getCon($d["n_decision"],16); foreach ($cons as $c) { echo $c["date_jour"];} echo'"></td></tr>
                                                            <tr><td><label class="text-danger" for="j'.$x.'r19">19 . </label><input style="width: 80%;" class="text-center" name="jr19" id="j'.$x.'r19" type="text" value="'; $cons=$f->getCon($d["n_decision"],19); foreach ($cons as $c) { echo $c["date_jour"];} echo'"></td></tr>
                                                            <tr><td><label class="text-danger" for="j'.$x.'r22">22 . </label><input style="width: 80%;" class="text-center" name="jr22" id="j'.$x.'r22" type="text" value="'; $cons=$f->getCon($d["n_decision"],22); foreach ($cons as $c) { echo $c["date_jour"];} echo'"></td></tr>
                                                            <tr><td><label class="text-danger" for="j'.$x.'r25">25 . </label><input style="width: 80%;" class="text-center" name="jr25" id="j'.$x.'r25" type="text" value="'; $cons=$f->getCon($d["n_decision"],25); foreach ($cons as $c) { echo $c["date_jour"];} echo'"></td></tr>
                                                            <tr><td><label class="text-danger" for="j'.$x.'r28">28 . </label><input style="width: 80%;" class="text-center" name="jr28" id="j'.$x.'r28" type="text" value="'; $cons=$f->getCon($d["n_decision"],28); foreach ($cons as $c) { echo $c["date_jour"];} echo'"></td></tr>
                                                            <tr><td><label class="text-danger" for="j'.$x.'r31">31 . </label><input style="width: 80%;" class="text-center" name="jr31" id="j'.$x.'r31" type="text" value="'; $cons=$f->getCon($d["n_decision"],31); foreach ($cons as $c) { echo $c["date_jour"];} echo'"></td></tr>
                                                            <tr><td><label class="text-danger" for="j'.$x.'r34">34 . </label><input style="width: 80%;" class="text-center" name="jr34" id="j'.$x.'r34" type="text" value="'; $cons=$f->getCon($d["n_decision"],34); foreach ($cons as $c) { echo $c["date_jour"];} echo'"></td></tr>

                                                        </table>
                                                    </div>
                                                    <div class="col-4">
                                                        <table class="table text-center">
                                                            <tr><td><label class="text-danger"  for="j'.$x.'r2">2 . </label><input style="width: 80%;" class="text-center" name="jr2"  id="j'.$x.'r2"  type="text" value="'; $cons=$f->getCon($d["n_decision"],2); foreach ($cons as $c) { echo $c["date_jour"];} echo'"></td></tr>
                                                            <tr><td><label class="text-danger"  for="j'.$x.'r5">5 . </label><input style="width: 80%;" class="text-center" name="jr5"  id="j'.$x.'r5"  type="text" value="'; $cons=$f->getCon($d["n_decision"],5); foreach ($cons as $c) { echo $c["date_jour"];} echo'"></td></tr>
                                                            <tr><td><label class="text-danger"  for="j'.$x.'r8">8 . </label><input style="width: 80%;" class="text-center" name="jr8"  id="j'.$x.'r8"  type="text" value="'; $cons=$f->getCon($d["n_decision"],8); foreach ($cons as $c) { echo $c["date_jour"];} echo'"></td></tr>
                                                            <tr><td><label class="text-danger"  for="j'.$x.'r11">11 . </label><input style="width: 80%;" class="text-center" name="jr11" id="j'.$x.'r11" type="text" value="'; $cons=$f->getCon($d["n_decision"],11); foreach ($cons as $c) { echo $c["date_jour"];} echo'"></td></tr>
                                                            <tr><td><label class="text-danger"  for="j'.$x.'r14">14 . </label><input style="width: 80%;" class="text-center" name="jr14" id="j'.$x.'r14" type="text" value="'; $cons=$f->getCon($d["n_decision"],14); foreach ($cons as $c) { echo $c["date_jour"];} echo'"></td></tr>
                                                            <tr><td><label class="text-danger"  for="j'.$x.'r17">17 . </label><input style="width: 80%;" class="text-center" name="jr17" id="j'.$x.'r17" type="text" value="'; $cons=$f->getCon($d["n_decision"],17); foreach ($cons as $c) { echo $c["date_jour"];} echo'"></td></tr>
                                                            <tr><td><label class="text-danger"  for="j'.$x.'r20">20 . </label><input style="width: 80%;" class="text-center" name="jr20" id="j'.$x.'r20" type="text" value="'; $cons=$f->getCon($d["n_decision"],20); foreach ($cons as $c) { echo $c["date_jour"];} echo'"></td></tr>
                                                            <tr><td><label class="text-danger"  for="j'.$x.'r23">23 . </label><input style="width: 80%;" class="text-center" name="jr23" id="j'.$x.'r23" type="text" value="'; $cons=$f->getCon($d["n_decision"],23); foreach ($cons as $c) { echo $c["date_jour"];} echo'"></td></tr>
                                                            <tr><td><label class="text-danger"  for="j'.$x.'r26">26 . </label><input style="width: 80%;" class="text-center" name="jr26" id="j'.$x.'r26" type="text" value="'; $cons=$f->getCon($d["n_decision"],26); foreach ($cons as $c) { echo $c["date_jour"];} echo'"></td></tr>
                                                            <tr><td><label class="text-danger"  for="j'.$x.'r29">29 . </label><input style="width: 80%;" class="text-center" name="jr29" id="j'.$x.'r29" type="text" value="'; $cons=$f->getCon($d["n_decision"],29); foreach ($cons as $c) { echo $c["date_jour"];} echo'"></td></tr>
                                                            <tr><td><label class="text-danger"  for="j'.$x.'r32">32 . </label><input style="width: 80%;" class="text-center" name="jr32" id="j'.$x.'r32" type="text" value="'; $cons=$f->getCon($d["n_decision"],32); foreach ($cons as $c) { echo $c["date_jour"];} echo'"></td></tr>
                                                            <tr><td><label class="text-danger"  for="j'.$x.'r35">35 . </label><input style="width: 80%;" class="text-center" name="jr35" id="j'.$x.'r35" type="text" value="'; $cons=$f->getCon($d["n_decision"],35); foreach ($cons as $c) { echo $c["date_jour"];} echo'"></td></tr>
                                                        </table>
                                                    </div>
                                                    <div class="col-4">
                                                        <table class="table text-center">
                                                            <tr><td><label class="text-danger"  for="j'.$x.'r3">3 .</label><input style="width: 80%;" class="text-center" name="jr3"  id="j'.$x.'r3"  type="text" value="'; $cons=$f->getCon($d["n_decision"],3); foreach ($cons as $c) { echo $c["date_jour"];} echo'"></td></tr>
                                                            <tr><td><label class="text-danger"  for="j'.$x.'r6">6 .</label><input style="width: 80%;" class="text-center" name="jr6"  id="j'.$x.'r6"  type="text" value="'; $cons=$f->getCon($d["n_decision"],6); foreach ($cons as $c) { echo $c["date_jour"];} echo'"></td></tr>
                                                            <tr><td><label class="text-danger"  for="j'.$x.'r9">9 .</label><input style="width: 80%;" class="text-center" name="jr9"  id="j'.$x.'r9"  type="text" value="'; $cons=$f->getCon($d["n_decision"],9); foreach ($cons as $c) { echo $c["date_jour"];} echo'"></td></tr>
                                                            <tr><td><label class="text-danger"  for="j'.$x.'r12">12 .</label><input style="width: 80%;" class="text-center" name="jr12" id="j'.$x.'r12" type="text" value="'; $cons=$f->getCon($d["n_decision"],12); foreach ($cons as $c) { echo $c["date_jour"];} echo'"></td></tr>
                                                            <tr><td><label class="text-danger"  for="j'.$x.'r15">15 .</label><input style="width: 80%;" class="text-center" name="jr15" id="j'.$x.'r15" type="text" value="'; $cons=$f->getCon($d["n_decision"],15); foreach ($cons as $c) { echo $c["date_jour"];} echo'"></td></tr>
                                                            <tr><td><label class="text-danger"  for="j'.$x.'r18">18 .</label><input style="width: 80%;" class="text-center" name="jr18" id="j'.$x.'r18" type="text" value="'; $cons=$f->getCon($d["n_decision"],18); foreach ($cons as $c) { echo $c["date_jour"];} echo'"></td></tr>
                                                            <tr><td><label class="text-danger"  for="j'.$x.'r21">21 .</label><input style="width: 80%;" class="text-center" name="jr21" id="j'.$x.'r21" type="text" value="'; $cons=$f->getCon($d["n_decision"],21); foreach ($cons as $c) { echo $c["date_jour"];} echo'"></td></tr>
                                                            <tr><td><label class="text-danger"  for="j'.$x.'r24">24 .</label><input style="width: 80%;" class="text-center" name="jr24" id="j'.$x.'r24" type="text" value="'; $cons=$f->getCon($d["n_decision"],24); foreach ($cons as $c) { echo $c["date_jour"];} echo'"></td></tr>
                                                            <tr><td><label class="text-danger"  for="j'.$x.'r27">27 .</label><input style="width: 80%;" class="text-center" name="jr27" id="j'.$x.'r27" type="text" value="'; $cons=$f->getCon($d["n_decision"],27); foreach ($cons as $c) { echo $c["date_jour"];} echo'"></td></tr>
                                                            <tr><td><label class="text-danger"  for="j'.$x.'r30">30 .</label><input style="width: 80%;" class="text-center" name="jr30" id="j'.$x.'r30" type="text" value="'; $cons=$f->getCon($d["n_decision"],30); foreach ($cons as $c) { echo $c["date_jour"];} echo'"></td></tr>
                                                            <tr><td><label class="text-danger"  for="j'.$x.'r33">33 .</label><input style="width: 80%;" class="text-center" name="jr33" id="j'.$x.'r33" type="text" value="'; $cons=$f->getCon($d["n_decision"],33); foreach ($cons as $c) { echo $c["date_jour"];} echo'"></td></tr>
                                                            <tr><td><label class="text-danger"  for="j'.$x.'r36">36 .</label><input style="width: 80%;" class="text-center" name="jr36" id="j'.$x.'r36" type="text" value="'; if($cons=$f->getCon($d["n_decision"],36)) {foreach ($cons as $c) { echo $c["date_jour"];}} echo'"></td></tr>
                                                        </table>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer d-flex justify-content-center">
                                                <input type="hidden" name="num_ass" value="'.$_GET["n_ass"].'">
                                                <input type="hidden" name="id" value="'.$id.'">
                                                <input type="hidden" name="form" value="editPEC">
                                                <input type="button" class="btn btn-outline-danger" data-dismiss="modal" aria-label="Close"  value="Cancel">
                                                <input type="submit" class="btn btn-outline-success" value="Ajouter">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                                            <button class="item" data-toggle="modal" data-target="#del'.$x.'" data-placement="top" title="Delete">
                                                <i class="zmdi zmdi-delete"></i>
                                            </button>
                                            <div class="modal fade" id="del'.$x.'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
                                                  <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                      <div class="modal-header text-center">
                                                        <h4 class="modal-title w-100 font-weight-bold">Supprimer Decision</h4>
                                                      </div>
                                                      <form action="inc/forms.php" method="post">
                                                        <div class="modal-body mx-3">
                                                            <div class="md-form mb-5">
                                                              <p class="text-center"> Numero Assuré </p>
                                                              <input type="text" id="orangeForm-name" name="" class="form-control validate text-center" value="'.$d["n_assure"].'" disabled>
                                                            </div>
                                                            <div class="md-form mb-5">
                                                              <p class="text-center"> Numero Decision </p>
                                                              <input type="text" id="orangeForm-name" name="" class="form-control validate text-center" value="'.$d["n_decision"].'" disabled>
                                                            </div>
                                                            <div class="md-form mb-5">
                                                              <p class="text-center text-danger">Voulez-vous vraiment supprimer cette decision?</p>
                                                            </div>
                                                            <input type="hidden" name="num_ass" value="'.$d["n_assure"].'">
                                                            <input type="hidden" name="num_dec" value="'.$d["n_decision"].'">
                                                            <input type="hidden" name="form" value="deletePEC">
                                                        </div>
                                                        <div class="modal-footer d-flex justify-content-center">
                                                            <input type="button" class="btn btn-outline-success" data-dismiss="modal" aria-label="Close" value="Cancel">
                                                            <input type="submit" class="btn btn-outline-danger" value="Confirm">
                                                        </div>
                                                      </form>
                                                    </div>
                                                  </div>
                                            </div>
                                            <button class="item" data-toggle="tooltip" data-placement="top" title="Imprimer Facture">
                                                <a target="_blank" href="print.php?n_assure='.$d["n_assure"].'&n_decision='.$d["n_decision"].'"><i class="zmdi zmdi-print"></i></a>
                                            </button>
                                            <button class="item" data-toggle="tooltip" data-placement="top" title="Imprimer Page Seances">
                                                <a target="_blank" href="prints.php?n_assure='.$d["n_assure"].'&n_decision='.$d["n_decision"].'"><i class="zmdi zmdi-print"></i></a>
                                            </button>
                                        </div>
                                    </td>
                                </tr>';
                                    $x++;
                                }?>
                                </tbody>
                            </table>
                        </div>


                        </div>
                    </div><!-- .col -->
                </div>
            </div>
        </div>
    </div>

<?php } include 'inc/footer.php' ;?>