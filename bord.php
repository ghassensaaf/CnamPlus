<?php include 'inc/header.php';
$dec=$f->getDec();
;?>
<div class="main-content" >
    <div class=" section__content--p30">
        <div class="container-fluid">
            <div class="row">
                <div class="col-10 offset-1">
                    <div class="au-card">
                        <div class="table-data__tool">
                            <div class="table-data__tool-left">
                                <h3>Liste Bordereaux</h3>
                            </div>
                            <div class="table-data__tool-right">
                                <button type="button" class="au-btn au-btn-icon au-btn--green au-btn--small" data-toggle="modal" data-target="#addPat" >
                                    <i class="zmdi zmdi-plus"></i>Créer Bordereau</button>
                            </div>
                            <div class="modal fade" id="addPat" tabindex="1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
                                <div class="modal-dialog modal-lg" role="document">
                                    <div class="modal-content">
                                        <div class="modal-header text-center">
                                            <h4 class="modal-title w-100 font-weight-bold">Nouveau Bordereau</h4>
                                        </div>
                                        <h4 class="mt-5 ml-5">Total <span id="total" style="color: #7aca2a;"> 0 </span> DT</h4>
                                        <form id="addP" action="inc/forms.php" onsubmit="return submit_form()" method="post">
                                            <div class="container mt-5">
                                                <div class="row">
                                                    <?php
                                                    $x=1;
                                                    if($dec->rowCount()==0)
                                                    {
                                                        echo '<div class="col-8 offset-2 mb-5" ><h4 class="text-center text-warning">il n ya pas de decision qui n\'appartient pas a un bordereau</h4></div>';
                                                    }
                                                    foreach ($dec as $d)
                                                    {
                                                        $ass=$f->getPatient($d["n_assure"]);
                                                        $fac=$f->getFact($d["n_decision"]);
                                                        foreach ($ass as $a)
                                                        {
                                                            foreach ($fac as $fa)
                                                            {
                                                                echo '
                                                                <div class="col-4 text-center">
                                                                        <div class="card-wrapper mb-5">
                                                                            <input name ="n_dec[]" class="c-card" type="checkbox" id="'.$x.'" value="'.$d["n_decision"].'" data-valuetwo="'.$fa["total_ttc"].'" hidden>
                                                                            <div class="card-content">
                                                                                <div class="card-state-icon"></div>
                                                                                <label for="'.$x.'">
                                                                                    <h4>'.$a["nom"].' '.$a["prenom"].'</h4>
                                                                                    <h6>N° Decision &bull; '.$d["n_decision"].'</h6>
                                                                                    <p style="font-size: 12px" class="small-meta dim">Date Début &bull; '.$d["dat_deb"].'</p>
                                                                                    <p style="font-size: 12px" class="small-meta dim">Date Fin &bull; '.$fa["date_fin"].'</p>
                                                                                    <p class="small-meta dim">Nb Séances &bull; '.$d["nbr_s"].'</p>
                                                                                    <p class="small-meta dim">Total TTC &bull; '.$fa["total_ttc"].' DT </p>
                                                                                </label>
                                                                            </div>
                                                                        </div>
                                                                </div>';
                                                                $x++;
                                                            }
                                                        }
                                                    }
                                                    ?>
                                                </div>
                                            </div>
                                            <div class="modal-footer d-flex justify-content-center">
                                                <input type="hidden" name="cin_kine" value="<?php echo $_SESSION["cin"]?>">
                                                <input type="hidden" name="form" value="creatBord">
                                                <input type="button" class="btn btn-outline-danger" data-dismiss="modal" aria-label="Close"  value="Annuler">
                                                <input type="submit" class="btn btn-outline-success" value="Créer">
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
                                    <th>Numero Bordereau</th>
                                    <th>Nombre des decison/Bord</th>
                                    <th>Date Bordereau</th>
                                    <th>Total TTC</th>
                                    <th></th>
                                </tr>
                                </thead>
                                <tbody>
                                <?php
                                $x=1;
                                $bord=$f->getBord();
                                $ss=0;
                                foreach ($bord as $b)
                                {
                                    $nF=$f->nbF($b["n_bord"]);

                                    foreach ($nF as $zlebya)
                                    {
                                        $ss++;
                                    }
                                        echo'
                                        <tr style="background: rgb(255,255,255);background: linear-gradient(180deg, rgba(255,255,255,0.3) 0%, rgba(122,202,42,0.3) 10%, rgba(122,202,42,0.3) 50%, rgba(122,202,42,0.3) 90%, rgba(255,255,255,0.3) 100%);" class="tr-shadow ">
                                            <td>
                                                <label class="au-checkbox">
                                                    <input type="checkbox">
                                                    <span class="au-checkmark"></span>
                                                </label>
                                            </td>
                                            <td>'.$b["n_bord"].'</td>
                                            <td>'.$ss.'</td>
                                            <td>'.$b["datee"].'</td>
                                            <td>'.$b["total_ttc"].'</td>
                                            <td>
                                                <div class="table-data-feature">
                                                    <button class="item" data-toggle="tooltip" data-placement="top" title="Imprimer Bordereau">
                                                        <a target="_blank" href="printB.php?n_bord='.$b["n_bord"].'"><i class="zmdi zmdi-print"></i></a>
                                                    </button>
                                                    <button class="item" data-toggle="tooltip" data-placement="top" title="Telecharger fichier echange">
                                                        <a target="_blank" href="b/bordereau-'.substr($b["n_bord"],0,3).'-'.substr($b["datee"],6).'.txt" download><i class="zmdi zmdi-download" ></i></a>
                                                    </button>
                                                    <button class="item" data-toggle="modal" data-target="#del'.$x.'" data-placement="top" title="Delete">
                                                        <i class="zmdi zmdi-delete"></i>
                                                    </button>
                                                    <div class="modal fade" id="del'.$x.'" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="false">
                                                      <div class="modal-dialog" role="document">
                                                        <div class="modal-content">
                                                          <div class="modal-header text-center">
                                                            <h4 class="modal-title w-100 font-weight-bold">Supprimer Bordereau</h4>
                                                          </div>
                                                          <form action="inc/forms.php" method="post">
                                                            <div class="modal-body mx-3">
                                                            <div class="md-form mb-5">
                                                              <p class="text-center"> Numero Bordereau </p>
                                                              <input type="text" id="orangeForm-name" name="" class="form-control validate text-center" value="'.$b["n_bord"].'" disabled>
                                                            </div>
                                                            <div class="md-form mb-5">
                                                              <p class="text-center text-danger">Voulez-vous vraiment supprimer ce bordereau?</p>
                                                            </div>
                                                            <input type="hidden" name="num_bor" value="'.$b["n_bord"].'">
                                                            <input type="hidden" name="form" value="deleteB">
                                                          </div>
                                                          <div class="modal-footer d-flex justify-content-center">
                                                            <input type="button" class="btn btn-outline-success" data-dismiss="modal" aria-label="Close" value="Cancel">
                                                            <input type="submit" class="btn btn-outline-danger" value="Confirm">
                
                                                          </div>
                                                          </form>
                                                        </div>
                                                      </div>
                                                    </div>
                                                </div>
                                            </td>
                                        </tr>
                                        ';


                                }
                                $x++;
                                ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div><!-- .col -->
            </div>
        </div>
    </div>
</div>
<?php include 'inc/footer.php';?>
