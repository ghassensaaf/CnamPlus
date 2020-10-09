<?php include "inc/fonctions.php";
$use=new fonctions();
$bord=$use->getBord($_GET["n_bord"]);
$detB=$use->nbF($_GET["n_bord"]);
session_start();
if (isset($_SESSION["cin"])) {

} else {
    header("location:login.php");
}
$u=$use->getKine($_SESSION['cin']);
foreach ($u as $t)
{

?>
<!DOCTYPE html>
<html lang="en" dir="ltr">
<head>
    <!-- Required meta tags-->
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="au theme template">
    <meta name="author" content="Hau Nguyen">
    <meta name="keywords" content="au theme template">

    <!-- Title Page-->
    <title>Cabinet <?php echo $t["nom"].' '.$t["prenom"]?> - Cnam</title>
    <!-- Fontfaces CSS-->
    <link href="../css/font-face.css" rel="stylesheet" media="all">
    <link href="../vendor/font-awesome-4.7/css/font-awesome.min.css" rel="stylesheet" media="all">
    <link href="../vendor/font-awesome-5/css/fontawesome-all.min.css" rel="stylesheet" media="all">
    <link href="../vendor/mdi-font/css/material-design-iconic-font.min.css" rel="stylesheet" media="all">

    <!-- Bootstrap CSS-->
    <link href="../vendor/bootstrap-4.1/bootstrap.min.css" rel="stylesheet" media="all">

    <!-- Vendor CSS-->
    <link href="../vendor/animsition/animsition.min.css" rel="stylesheet" media="all">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.1.3/css/bootstrap.css" media="all">
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/dataTables.bootstrap4.min.css" media="all">
    <link href="../vendor/bootstrap-progressbar/bootstrap-progressbar-3.3.4.min.css" rel="stylesheet" media="all">
    <link href="../vendor/wow/animate.css" rel="stylesheet" media="all">
    <link href="../vendor/css-hamburgers/hamburgers.min.css" rel="stylesheet" media="all">
    <link href="../vendor/slick/slick.css" rel="stylesheet" media="all">
    <link href="../vendor/select2/select2.min.css" rel="stylesheet" media="all">
    <link href="../vendor/perfect-scrollbar/perfect-scrollbar.css" rel="stylesheet" media="all">
    <!-- FullCalendar -->
    <link href='../vendor/fullcalendar-3.10.0/fullcalendar.css' rel='stylesheet' media="all" />

    <!-- Main CSS-->
    <link href="../css/theme.css" rel="stylesheet" media="all">

</head>
<body style="border: 3px solid black;height: 100vh;border-radius: 25px; font-family: 'Times New Roman';" class="animsition"onload="window.print();setTimeout(window.close, 0);">

<div class="row mt-5 mb-5" >
    <div style="border: 1px solid black;padding: 2%; border-radius: 25px;" class="col-4 offset-1">
        <h5 class="text-center"> <?php echo $t["nom"].' '.$t["prenom"]?></h5>
        <h5 class="text-center text-uppercase"> <?php echo $t["profeesion"]?></h5>
        <h6 class="text-center "> <?php echo $t["adresse"]?></h6>
        <table width="100%" class="text-center">
            <tr>
                <td width="50%;"><h7>Tel/GSM</h7></td>
                <td><h7><?php echo $t["mobile"]?></h7></td>
            </tr>
            <tr>
                <td width="50%;"><h7>Mat. Fiscal</h7></td>
                <td><h7><?php echo $t["mat_fisc"]?></h7></td>
            </tr>
            <tr>
                <td width="50%;"><h7>RIB</h7></td>
                <td><h7><?php echo $t["RIB"]?></h7></td>
            </tr>
        </table>
    </div>
    <div class="col-2 mt-4"><img src="images/icon/kine.jpg" width="100%" alt=""> </div>
    <div style="border: 1px solid black; border-radius: 25px;" class="col-4">
        <table width="100%"  style="margin-top:20% "  >
            <tr>
                <td><h6>Num° Employeur</h6></td>
                <td><h6>0/0</h6></td>
            </tr>
            <tr>
                <td><h6>Code Cnam</h6></td>
                <td><h6><?php echo $t["code"]?></h6></td>
            </tr>
        </table>
    </div>
</div>
<div class="mb-5" style="margin-top: 5%">
    <h3 class="text-center text-uppercase">Bordereau de trasmission N° <?php echo $_GET["n_bord"];?></h3>
</div>
<div class="mb-5 ml-5 mr-5" style="margin-top: 10%">
    <table border="1" class="text-center"  width="100%" style="font-size: 18px;">
        <thead>
            <th></th>
            <th>Nom Prenom Patient</th>
            <th>N° l'Assuré</th>
            <th>N°Décision</th>
            <th>N°Facture</th>
            <th>TTC</th>
        </thead>
        <tbody>
        <?php
        $x=1;
        foreach ($bord as $b)
        {
            foreach ($detB as $db)
            {
                $fac=$use->getFact($db['n_decision']);
                $dec=$use->getDec(null,$db['n_decision']);
                    foreach ($fac as $f)
                    {
                        foreach ($dec as $d)
                        {
                            $pat=$use->getPatient($d["id"]);
                            foreach ($pat as $pp)
                            {
                                echo '
                                <tr>
                                    <td>'.$x.'</td>
                                    <td class="text-capitalize">'.$pp["nom"].' '.$pp["prenom"].'</td>
                                    <td>'.$pp["n_assure"].'</td>
                                    <td>'.$db["n_decision"].'</td>
                                    <td>'.$f["n_fac"].'</td>
                                    <td>'.$f["total_ttc"].' DT</td>
                                </tr>
                                ';
                            }}}$x++;}}
        ?>
        </tbody>
    </table>
</div>
<?php $tot_ttc=$b["total_ttc"];$mnt_tva=($tot_ttc*6.542/100); ?>
<div class="row">
    <div class="mb-5 mr-5 col-3 offset-8" style="margin-top: 10%">
        <table border="1" class="text-center"  width="100%" style="font-size: 18px;">
            <tr>
                <td>Total HT</td>
                <td><?php echo number_format($tot_ttc-$mnt_tva, 3, '.', ' ').' DT' ?></td>
            </tr>
            <tr>
                <td>Montant TVA</td>
                <td><?php echo number_format($mnt_tva, 3, '.', ' ').' DT' ?></td>
            </tr>
            <tr>
                <td>Total TTC</td>
                <td><?php echo number_format($tot_ttc, 3, '.', ' ').' DT' ?></td>
            </tr>
        </table>
    </div>

</div>

<div class="row">
    <div class="col-8 offset-4">
        <h5>La somme est arreté a <?php echo $b["ttc_lettre"]?> dinars <?php $c=($tot_ttc-floor($tot_ttc)); echo " et ".round($c*1000)." millimes"; ?></h5>
    </div>
</div>
<?php } ?>
<script src="../vendor/jquery-3.2.1.min.js"></script>
<!-- Bootstrap JS-->
<script src="../vendor/bootstrap-4.1/popper.min.js"></script>
<script src="../vendor/bootstrap-4.1/bootstrap.min.js"></script>
<!-- Vendor JS       -->
<script src="../vendor/slick/slick.min.js">
</script>
<script src="../vendor/wow/wow.min.js"></script>
<script src="../vendor/animsition/animsition.min.js"></script>
<script src="../vendor/bootstrap-progressbar/bootstrap-progressbar.min.js">
</script>
<script src="../vendor/counter-up/jquery.waypoints.min.js"></script>
<script src="../vendor/counter-up/jquery.counterup.min.js">
</script>
<script src="../vendor/circle-progress/circle-progress.min.js"></script>
<script src="../vendor/perfect-scrollbar/perfect-scrollbar.js"></script>
<script src="../vendor/chartjs/Chart.bundle.min.js"></script>
<script src="../vendor/select2/select2.min.js">
</script>

<!-- full calendar requires moment along jquery which is included above -->
<script src="../vendor/fullcalendar-3.10.0/lib/moment.min.js"></script>
<script src="../vendor/fullcalendar-3.10.0/fullcalendar.js"></script>

<!-- Main JS-->
<script src="../js/main.js"></script>

<script type="text/javascript">
    $(function() {
        // for now, there is something adding a click handler to 'a'
        var tues = moment().day(2).hour(19);

        // build trival night events for example data
        var events = [
            {
                title: "Special Conference",
                start: moment().format('YYYY-MM-DD'),
                url: '#'
            },
            {
                title: "Doctor Appt",
                start: moment().hour(9).add(2, 'days').toISOString(),
                url: '#'
            }

        ];

        var trivia_nights = []

        for(var i = 1; i <= 4; i++) {
            var n = tues.clone().add(i, 'weeks');
            console.log("isoString: " + n.toISOString());
            trivia_nights.push({
                title: 'Trival Night @ Pub XYZ',
                start: n.toISOString(),
                allDay: false,
                url: '#'
            });
        }

        // setup a few events
        $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay,listWeek'
            },
            events: events.concat(trivia_nights)
        });
    });
</script>
</body>
</html>
