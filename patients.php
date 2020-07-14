<?php include 'inc/header.php';
$pat=$f->getPatient();
?>
<div class="main-content" >
    <div class=" section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-10 offset-1">
                    <div class="au-card">
                        <div class="table-data__tool">
                            <div class="table-data__tool-left">
                                <h3>Liste Patients</h3>
                            </div>
                            <div class="table-data__tool-right">
                                <button type="button" class="au-btn au-btn-icon au-btn--green au-btn--small" data-toggle="modal" data-target="#addPat" >
                                    <i class="zmdi zmdi-plus"></i>Ajouter Patient</button>
                            </div>
                            <div class="modal fade" id="addPat" tabindex="1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header text-center">
                                            <h4 class="modal-title w-100 font-weight-bold">Nouveau Patient</h4>
                                        </div>
                                        <form id="addP" action="inc/forms.php" onsubmit="return submit_form(this)" method="post">

                                            <div class="modal-body mx-3">
                                                <h5 class="text-center mb-3" >Assuré</h5>
                                                <div class="container-fluid">
                                                    <div class="row mb-1">
                                                        <div class="form-group col-6 offset-3">
                                                            <div style="text-align: center;"><label for="num_ass" class="control-label mb-1">Numèro Assuré</label></div>
                                                            <input id="num_ass" name="num_ass" type="text" class="form-control text-center " value="" placeholder="XXXXXXXX/XX" onkeyup="checkAv(this)" maxlength="15" minlength="6" required>
                                                            <span id="num_ass_r"></span>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-1">
                                                        <div class="col-5 offset-1">
                                                            <div class="form-group">
                                                                <div style="text-align: center;"><label for="nom_ass" class="control-label mb-1">Nom Assuré</label></div>
                                                                <input id="nom_ass" name="nom_ass" type="text" onkeyup="validate(this);document.getElementById('nom').value=this.value;" class="form-control" value="" placeholder="" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-5">
                                                            <div class="form-group">
                                                                <div style="text-align: center;"><label for="pre_ass" class="control-label mb-1">Prènom Assuré</label></div>
                                                                <input id="pre_ass" name="pre_ass" type="text" class="form-control" value="" placeholder="" onkeyup="validate(this);document.getElementById('pre').value=this.value;" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-1">
                                                        <div class="col-8 offset-2">
                                                            <div class="form-group">
                                                                <div style="text-align: center;"><label for="qualite" class="control-label mb-1">Qualite</label></div>
                                                                <select id="qualite" name="qualite" class="form-control ">
                                                                    <option value="Assure lui meme">Assuré lui même</option>
                                                                    <option value="Conjoint">Conjoint</option>
                                                                    <option value="Enfant">Enfant</option>
                                                                    <option value="Mere">Mere</option>
                                                                    <option value="Pere">Pere</option>
                                                                </select>

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <hr>
                                                <h5 class="text-center" >Patient</h5>
                                                <div class="container-fluid">
                                                    <div class="row mb-1">
                                                        <div class="col-5 offset-1">
                                                            <div class="form-group">
                                                                <div style="text-align: center;"><label for="nom" class="control-label mb-1">Nom</label></div>
                                                                <input id="nom" name="nom" type="text" class="form-control" value="" placeholder="" onkeyup="validate(this)" required>
                                                            </div>
                                                        </div>
                                                        <div class="col-5">
                                                            <div class="form-group">
                                                                <div style="text-align: center;"><label for="pre_ass" class="control-label mb-1">Prènom</label></div>
                                                                <input id="pre" name="pre" type="text" class="form-control" value="" placeholder="" onkeyup="validate(this)" required>
                                                            </div>
                                                        </div>
                                                    </div>
                                                    <div class="row mb-1">
                                                        <div class="form-group col-4 offset-4">
                                                            <div style="text-align: center;"><label for="tel" class="control-label mb-1">Numèro Telephone</label></div>
                                                            <input id="tel" name="tel" type="text" class="form-control text-center" value="" placeholder="XX XXX XXX" maxlength="11" >
                                                        </div>
                                                    </div>
                                                    <div class="row mb-1">
                                                        <div class="form-group col-8 offset-2">
                                                            <div style="text-align: center;"><label for="diag" class="control-label mb-1">Diagnostique</label></div>
                                                            <input id="diag" name="diag" type="text" class="form-control text-center" value="" placeholder="" maxlength="" onkeyup="validate(this)">
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal-footer d-flex justify-content-center">
                                                <input type="hidden" name="cin_kine" value="<?php echo $_SESSION["cin"]?>">
                                                <input type="hidden" name="form" value="addP">
                                                <input type="button" class="btn btn-outline-danger" data-dismiss="modal" aria-label="Close"  value="Cancel">
                                                <input type="submit" class="btn btn-outline-success" value="Ajouter">
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="table-responsive table-responsive-data2">
                            <table id="example" class="table table-data2">
                                <thead>
                                <tr>
                                    <th>
                                        <label class="au-checkbox">
                                            <input type="checkbox">
                                            <span class="au-checkmark"></span>
                                        </label>
                                    </th>
                                    <th>Num° Assuré</th>
                                    <th>Qualité</th>
                                    <th>nom</th>
                                    <th>prenom</th>
                                    <th>Mobile</th>
                                    <th>Diagnostique</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $x=1;
                                foreach ($pat as $p)
                                {echo'
                                <tr style="background: rgb(255,255,255);background: linear-gradient(180deg, rgba(255,255,255,0.3) 0%, rgba(122,202,42,0.3) 10%, rgba(122,202,42,0.3) 50%, rgba(122,202,42,0.3) 90%, rgba(255,255,255,0.3) 100%);" class="tr-shadow ">
                                    <td>
                                        <label class="au-checkbox">
                                            <input type="checkbox">
                                            <span class="au-checkmark"></span>
                                        </label>
                                    </td>
                                    <td>'.$p["n_assure"].'</td>
                                    <td>'.$p["qualite"].'</td>
                                    <td>'.$p["nom"].'</td>
                                    <td>'.$p["prenom"].'</td>
                                    <td>'.$p["tel"].'</td>
                                    <td class="desc">'.$p["diagnostique"].'</td>
                                    <td>
                                        <div class="table-data-feature">
                                            <button class="item" data-toggle="modal" data-target="#edit'.$x.'" data-placement="top" title="Edit">
                                                <i class="zmdi zmdi-edit"></i>
                                            </button>
                                            <div class="modal fade" id="edit'.$x.'" tabindex="1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
                                                <div class="modal-dialog modal-lg" role="document">
                                                    <div class="modal-content">
                                                        <div class="modal-header text-center">
                                                            <h4 class="modal-title w-100 font-weight-bold">Modifier Patient</h4>
                                                        </div>
                                                            <form action="inc/forms.php" method="post">
                                                                <div class="modal-body mx-3">
                                                                    <h5 class="text-center mb-3" >Assuré</h5>
                                                                    <div class="container-fluid">
                                                                        <div class="row mb-1">
                                                                            <div class="form-group col-4 offset-4">
                                                                                <div style="text-align: center;"><label for="num_ass" class="control-label mb-1">Numèro Assuré</label></div>
                                                                                <input id="" name="" type="text" class="form-control text-center" value="'.$p["n_assure"].'" placeholder="XXXXXXXX/XX" maxlength="11" disabled>
                                                                                <input id="num_ass" name="num_ass" type="hidden" class="form-control text-center" value="'.$p["n_assure"].'">
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mb-1">
                                                                            <div class="col-5 offset-1">
                                                                                <div class="form-group">
                                                                                    <div style="text-align: center;"><label for="nom_ass" class="control-label mb-1">Nom Assuré</label></div>
                                                                                    <input id="nom_ass" name="nom_ass" type="text" class="form-control" value="'.$p["nom_ass"].'" onkeyup="validate(this)" placeholder="">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-5">
                                                                                <div class="form-group">
                                                                                    <div style="text-align: center;"><label for="pre_ass" class="control-label mb-1">Prènom Assuré</label></div>
                                                                                    <input id="pre_ass" name="pre_ass" type="text" class="form-control" value="'.$p["pre_ass"].'" onkeyup="validate(this)" placeholder="">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mb-1">
                                                                            <div class="col-8 offset-2">
                                                                                <div class="form-group">
                                                                                    <div style="text-align: center;"><label for="qualite" class="control-label mb-1">Qualite</label></div>
                                                                                    <select id="qualite" name="qualite" class="form-control">
                                                                                        <option ';if($p["qualite"]=="Assure lui meme"){echo " selected ";} echo' value="Assure lui meme">Assuré lui même</option>
                                                                                        <option ';if($p["qualite"]=="Conjoint"){echo " selected ";} echo' value="Conjoint">Conjoint</option>
                                                                                        <option ';if($p["qualite"]=="Enfant"){echo " selected ";} echo' value="Enfant">Enfant</option>
                                                                                        <option ';if($p["qualite"]=="Mere"){echo " selected ";} echo' value="Mere">Mere</option>
                                                                                        <option ';if($p["qualite"]=="Pere"){echo " selected ";} echo' value="Pere">Pere</option>
                                                                                    </select>
                    
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                    <hr>
                                                                    <h5 class="text-center" >Patient</h5>
                                                                    <div class="container-fluid">
                                                                        <div class="row mb-1">
                                                                            <div class="col-5 offset-1">
                                                                                <div class="form-group">
                                                                                    <div style="text-align: center;"><label for="nom" class="control-label mb-1">Nom</label></div>
                                                                                    <input id="nom" name="nom" type="text" class="form-control" value="'.$p["nom"].'" onkeyup="validate(this)" placeholder="">
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-5">
                                                                                <div class="form-group">
                                                                                    <div style="text-align: center;"><label for="pre_ass" class="control-label mb-1">Prènom</label></div>
                                                                                    <input id="pre" name="pre" type="text" class="form-control" value="'.$p["prenom"].'" onkeyup="validate(this)" placeholder="">
                                                                                </div>
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mb-1">
                                                                            <div class="form-group col-4 offset-4">
                                                                                <div style="text-align: center;"><label for="tel" class="control-label mb-1">Numèro Telephone</label></div>
                                                                                <input id="tel" name="tel" type="text" class="form-control text-center" value="'.$p["tel"].'" onkeyup="validate(this)" placeholder="XX XXX XXX" maxlength="11">
                                                                            </div>
                                                                        </div>
                                                                        <div class="row mb-1">
                                                                            <div class="form-group col-8 offset-2">
                                                                                <div style="text-align: center;"><label for="diag" class="control-label mb-1">Diagnostique</label></div>
                                                                                <input id="diag" name="diag" type="text" class="form-control text-center" value="'.$p["diagnostique"].'" onkeyup="validate(this)" placeholder="" maxlength="">
                                                                            </div>
                                                                        </div>
                                                                    </div>
                                                                </div>
                                                                <div class="modal-footer d-flex justify-content-center">
                                                                    <input type="hidden" name="form" value="editP">
                                                                    <input type="button" class="btn btn-outline-danger" data-dismiss="modal" aria-label="Close" value="Cancel">
                                                                    <input type="submit" class="btn btn-outline-success" value="Modifier">
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
                                            <h4 class="modal-title w-100 font-weight-bold">Supprimer Patient</h4>
                                          </div>
                                          <form action="inc/forms.php" method="post">
                                            <div class="modal-body mx-3">
                                            <div class="md-form mb-5">
                                              <p class="text-center"> Numero Assuré </p>
                                              <input type="text" id="orangeForm-name" name="" class="form-control validate text-center" value="'.$p["n_assure"].'" disabled>
                                            </div>
                                            <div class="md-form mb-5">
                                              <p class="text-center text-danger">Voulez-vous vraiment supprimer ce patient?</p>
                                            </div>
                                            <input type="hidden" name="num_ass" value="'.$p["n_assure"].'">
                                            <input type="hidden" name="form" value="deleteP">
                                          </div>
                                          <div class="modal-footer d-flex justify-content-center">
                                            <input type="button" class="btn btn-outline-success" data-dismiss="modal" aria-label="Close" value="Cancel">
                                            <input type="submit" class="btn btn-outline-danger" value="Confirm">

                                          </div>
                                          </form>
                                        </div>
                                      </div>
                                    </div>
                                            <button class="item" data-toggle="tooltip" data-placement="top" title="More">
                                                <a href="pec.php?n_ass='.$p["n_assure"].'"><i class="zmdi zmdi-more"></i></a>
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
<?php include 'inc/footer.php'; ?>
