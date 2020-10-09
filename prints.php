<?php

    session_start();
if (isset($_SESSION["cin"])) {

} else {
    header("location:login.php");
}
    include "inc/fonctions.php";
    $use=new fonctions();
    $fac=$use->getFact($_GET['n_decision']);
    $pat=$use->getPatient($_GET['n_assure']);
    $dec=$use->getDec($_GET['n_assure'],$_GET['n_decision']);
    $u=$use->getKine($_SESSION['cin']);
    foreach ($u as $t)
    {


    foreach ($fac as $f)
    {
        foreach ($pat as $p)
        {
            foreach ($dec as $d)
            {
                $conD=$use->getCon($_GET['n_decision'],'1');
                $conF=$use->getCon($_GET['n_decision'],$d["nbr_s"]);
                foreach ($conD as $cd)
                {
                    foreach ($conF as $cf)
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
        <hr>
        <h6 class="text-center "> <?php echo $t["adresse"]?></h6>
        <table width="100%" class="text-center">
            <tr>
                <td width="50%;"><h7>Tel/GSM</h7></td>
                <td><h7><?php echo $t["mobile"]?></h7></td>
            </tr>

        </table>
    </div>
    <div class="col-2 mt-4"><img src="images/icon/kine.jpg" width="100%" alt=""> </div>
    <div style="border: 1px solid black; border-radius: 25px;" class="col-4">
        <table width="100%" style="margin-top:10% "  >
            <tr>
                <td><h6>Patient</h6></td>
                <td><h6><?php echo $p["nom"].' '.$p["prenom"];?></h6></td>
            </tr>
            <tr>
                <td><h6>Qualité</h6></td>
                <td><h6><?php echo $p["qualite"];?></h6></td>
            </tr>
            <tr>
                <td><h6>N° Assuré :</h6></td>
                <td><h6><?php echo $_GET["n_assure"]?></h6></td>
            </tr>
            <tr>
                <td><h6>Prise en Charge N° :</h6></td>
                <td><h6><?php echo $_GET["n_decision"]?></h6></td>
            </tr>

        </table>
    </div>
</div>
<div class="mb-5" style="margin-top: 5%">
    <h3 class="text-center">MEMOIRE DE SIGNATURE</h3>
</div>
<div class="mb-5 ml-5 mr-5 text-center" style="margin-top: 10%">
    <table border="1px" width="100%" style="font-size: 22px;">
        <thead>
            <tr>
                <th width="15%">Séance N°</th>
                <th>Date</th>
                <th>Signature</th>
            </tr>
        </thead>
        <tbody>
        <?php
        for($i=1;$i<($d["nbr_s"]+1);$i++)
        {
            $seance=$use->getCon($_GET['n_decision'],$i);
            foreach ($seance as $sean)
            {?>
        <tr>
            <td><?php echo $i?></td>
            <td><?php echo $sean["date_jour"]?></td>
            <td></td>
        </tr>
            <?php }}?>
        </tbody>
    </table>
</div>

<?php }}}}}}?>
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
