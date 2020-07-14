<?php
include "config.php";
class fonctions
{
    public function Logedin($login,$pwd)
    {
        $req="select * from cabinet.kine where uname='$login' && pwd='$pwd'";
        $db = config::getConnexion();
        try
        {
            $rep=$db->query($req);
            return $rep->fetchAll();
        }
        catch (Exception $e)
        {
            die('Erreur: '.$e->getMessage());
        }

    }
    public function getKine($cin)
    {
        $sql="select * from cabinet.kine where cin='$cin'";
        $db = config::getConnexion();
        try
        {
            $u=$db->query($sql);
            return $u;
        }
        catch (Exception $e)
        {
            die('Erreur: '.$e->getMessage());
        }
    }
    public function addPatient($numA,$cinK,$nomA,$preA,$qua,$nom,$pre,$diag,$tel)
    {
        $sql="insert into cabinet.patient (n_assure,cin_kine,nom,prenom,qualite,nom_ass,pre_ass,diagnostique,tel)
                                    values('$numA','$cinK','$nom','$pre','$qua','$nomA','$preA','$diag','$tel')";
        $db = config::getConnexion();
        try
        {
            $db->query($sql);
        }
        catch (Exception $e)
        {
            die('Erreur: '.$e->getMessage());
        }
    }
    public function getPatient($nAss=null)
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $cin=$_SESSION["cin"];
        if($nAss==null)
        {
            $sql="select * from cabinet.patient where cin_kine = '$cin'";
        }
        else
        {
            $sql="select * from cabinet.patient where cin_kine = '$cin' and n_assure= '$nAss'";
        }
        $db = config::getConnexion();
        try
        {
            $u=$db->query($sql);
            return $u;
        }
        catch (Exception $e)
        {
            die('Erreur: '.$e->getMessage());
        }
    }
    public function deletePatient($numA)
    {
        if (session_status() == PHP_SESSION_NONE) {
            session_start();
        }
        $cin=$_SESSION["cin"];
        $sql="delete from cabinet.patient where cin_kine = '$cin' and n_assure = '$numA'";
        $db = config::getConnexion();
        try
        {
            $db->query($sql);

        }
        catch (Exception $e)
        {
            die('Erreur: '.$e->getMessage());
        }
    }
    public function editPatient($numA,$cinK,$nomA,$preA,$qua,$nom,$pre,$diag,$tel)
    {
        $sql="update cabinet.patient set nom='$nom',prenom='$pre',diagnostique='$diag',tel='$tel',qualite='$qua',nom_ass='$nomA',pre_ass='$preA' where cin_kine = '$cinK' and n_assure = '$numA'";
        $db = config::getConnexion();
        try
        {
            $db->query($sql);

        }
        catch (Exception $e)
        {
            die('Erreur: '.$e->getMessage());
        }
    }
    public function addDec($numA,$numD,$nbs,$ns_p_s,$dateD,$pu,$dateF)
    {
        $sql="insert into cabinet.decision (n_assure,n_decision,nbr_s,nb_s_sem,dat_deb,pu,date_fin)
                                    values ('$numA','$numD','$nbs','$ns_p_s','$dateD','$pu','$dateF')";
        $db = config::getConnexion();
        try
        {
            $db->query($sql);

        }
        catch (Exception $e)
        {
            die('Erreur: '.$e->getMessage());
        }
    }
    public function addFac($numD,$numF,$date_p,$date_fin,$pu,$tot_ht,$tva,$tot_ttc,$ttc_lettre,$mtva)
    {
        $year=date("Y");
        $m=date("m");
        $d=date("d");
        $daa=$d.'/'.$m.'/'.$year;
        $sql="insert into cabinet.facture (annee,n_decision,n_fac,datee,date_premier,date_fin,pu,total_ht,tva,mnt_tva,total_ttc,ttc_lettre)
                                   values ('$year','$numD','$numF','$daa','$date_p','$date_fin','$pu','$tot_ht','$tva','$mtva','$tot_ttc','$ttc_lettre')";
        $db = config::getConnexion();
        try
        {
            $db->query($sql);

        }
        catch (Exception $e)
        {
            die('Erreur: '.$e->getMessage());
        }
    }
    public function addCon($numD,$indice,$nom_jour,$date_jour,$date_premier)
    {
        $sql="insert into cabinet.consultation (n_decision,indice,nom_jour,date_jour,date_premier)
                                        values ('$numD','$indice','$nom_jour','$date_jour','$date_premier')";
        $db = config::getConnexion();
        try
        {
            $db->query($sql);

        }
        catch (Exception $e)
        {
            die('Erreur: '.$e->getMessage());
        }
    }
    public function nbrF($year)
    {
        $sql="select * from cabinet.facture where annee='$year'";
        $db = config::getConnexion();
        try
        {
            $d=$db->query($sql);
            return $d->rowCount();
        }
        catch (Exception $e)
        {
            die('Erreur: '.$e->getMessage());
        }
    }
    public function getDec($numA=null,$numD=null)
    {
        if(($numD!=null)&&(($numA!=null)))
        {
            $sql="select * from cabinet.decision where n_assure = '$numA' and n_decision='$numD'";
        }
        else if($numA!=null)
        {
            $sql="select * from cabinet.decision where n_assure = '$numA'";
        }
        else if($numD!=null)
        {
            $sql="select * from cabinet.decision where n_decision='$numD'";
        }
        else
        {
            $sql="select * from cabinet.decision where bord='0' order by dat_deb ASC";
        }
        $db = config::getConnexion();
        try
        {
            $res=$db->query($sql);
            return $res;
        }
        catch (Exception $e)
        {
            die('Erreur: '.$e->getMessage());
        }
    }
    public function getCon($numD,$id)
    {
        $sql="select * from cabinet.consultation where n_decision = '$numD' and indice='$id'";
        $db = config::getConnexion();
        try
        {
            return $db->query($sql);
        }
        catch (Exception $e)
        {
            die('Erreur: '.$e->getMessage());
        }
    }
    public function editDec($numA,$numD,$nbs,$ns_p_s,$dateD,$pu)
    {
        $sql="update cabinet.decision set nbr_s ='$nbs',nb_s_sem='$ns_p_s',dat_deb='$dateD',pu='$pu' where n_assure = '$numA' and n_decision='$numD'";
        $db = config::getConnexion();
        try
        {
            $db->query($sql);
        }
        catch (Exception $e)
        {
            die('Erreur: '.$e->getMessage());
        }
    }
    public function editFac($id,$date_p,$date_fin,$pu,$tot_ht,$tva,$tot_ttc,$ttc_lettre,$mtva)
    {
        $sql="update cabinet.facture set date_premier='$date_p',date_fin='$date_fin',pu='$pu',total_ht='$tot_ht',tva='$tva',total_ttc='$tot_ttc',ttc_lettre='$ttc_lettre',mnt_tva='$mtva' where id ='$id'";
        $db = config::getConnexion();
        try
        {
            $db->query($sql);
        }
        catch (Exception $e)
        {
            die('Erreur: '.$e->getMessage());
        }
    }
    public function editCon($numD,$indice,$nom_jour,$date_jour,$date_premier)
    {
        $sql="insert into cabinet.consultation (n_decision,indice,nom_jour,date_jour,date_premier)
                                        values ('$numD','$indice','$nom_jour','$date_jour','$date_premier')
                                        ON DUPLICATE KEY UPDATE 
                                        nom_jour = '$nom_jour',date_jour = '$date_jour',date_premier = '$date_premier'";
        $db = config::getConnexion();
        try
        {
            $db->query($sql);
        }
        catch (Exception $e)
        {
            die('Erreur: '.$e->getMessage());
        }
    }
    public function getFact($id)
    {
        $sql= "select * from cabinet.facture where n_decision='$id' order by date_premier DESC";
        $db = config::getConnexion();
        try
        {
            return $db->query($sql);
        }
        catch (Exception $e)
        {
            die('Erreur: '.$e->getMessage());
        }
    }
    public function deletePEC($numA,$numD)
    {
        $sql="delete from cabinet.decision where n_assure='$numA' and n_decision='$numD' ";
        $sql2="delete from cabinet.facture where n_decision='$numD'";
        $sql1="delete from cabinet.consultation where  n_decision='$numD' ";
        $db = config::getConnexion();
        try
        {
            $db->query($sql);
            $db->query($sql1);
            $db->query($sql2);
        }
        catch (Exception $e)
        {
            die('Erreur: '.$e->getMessage());
        }
    }
    public function check_num_ass_avalibility($nAss)
    {
        $sql="select * from cabinet.patient where n_assure ='$nAss'";
        $db = config::getConnexion();
        try
        {
            return $db->query($sql)->rowCount();
        }
        catch (Exception $e)
        {
            die('Erreur: '.$e->getMessage());
        }
    }
    public function check_num_dec_avalibility($nDec)
    {
        $sql="select * from cabinet.decision where n_decision ='$nDec'";
        $db = config::getConnexion();
        try
        {
            return $db->query($sql)->rowCount();
        }
        catch (Exception $e)
        {
            die('Erreur: '.$e->getMessage());
        }
    }
    public function nbrB($year)
    {
        $sql="select * from cabinet.bordereau where annee='$year'";
        $db = config::getConnexion();
        try
        {
            return $db->query($sql)->rowCount();
        }
        catch (Exception $e)
        {
            die('Erreur: '.$e->getMessage());
        }
    }
    public function addDetBor($numD,$nBor)
    {
        $sql="insert into cabinet.detail_bord (n_bord,n_decision)
                                        values('$nBor','$numD')";
        $db = config::getConnexion();
        try
        {
            $db->query($sql);
        }
        catch (Exception $e)
        {
            die('Erreur: '.$e->getMessage());
        }
    }
    public function edit_dec_bord($numD)
    {
        $sql="update cabinet.decision set bord='1' where n_decision = '$numD' ";
        $db = config::getConnexion();
        try
        {
            $db->query($sql);
        }
        catch (Exception $e)
        {
            die('Erreur: '.$e->getMessage());
        }
    }
    public function creatBord($nBor,$tot_ttc,$ttc_let)
    {
        $year=date("Y");
        $m=date("m");
        $d=date("d");
        $daa=$d.'/'.$m.'/'.$year;
        $sql="insert into cabinet.bordereau (annee,n_bord,datee,total_ttc,ttc_lettre)
                                      values('$year','$nBor','$daa','$tot_ttc','$ttc_let')";
        $db = config::getConnexion();
        try
        {
            $db->query($sql);
        }
        catch (Exception $e)
        {
            die('Erreur: '.$e->getMessage());
        }
    }
    public function getBord($nbor=null)
    {
        $sql="select * from cabinet.bordereau";
        if($nbor!=null)
        {
            $sql="select * from cabinet.bordereau where n_bord='$nbor'";
        }
        $db = config::getConnexion();
        try
        {
            return $db->query($sql);
        }
        catch (Exception $e)
        {
            die('Erreur: '.$e->getMessage());
        }

    }
    public function nbF($nBor)
    {
        $sql="select * from cabinet.detail_bord where n_bord='$nBor'";
        $db = config::getConnexion();
        try
        {
            return $db->query($sql);
        }
        catch (Exception $e)
        {
            die('Erreur: '.$e->getMessage());
        }
    }
    public function premierligne($nBor,$year,$nbFac,$tot)
    {
        $myfile = fopen('../b/bordereau-'.$nBor.'-'.$year.'.txt', "w");
        $tot=$tot*1000;
        while(strlen($tot)!=10)
        {
            $tot='0'.$tot;
        }
        while (strlen($nbFac)!=3)
        {
            $nbFac='0'.$nbFac;
        }
        $txt='1'.$year.$nBor.'010002734891'.'000000000000000000000000000000000000000000000000'.$nbFac.'0000000000000000'.$tot."00000000000000000000000000000000000000\r\n";
        fwrite($myfile, $txt);
        fclose($myfile);

    }
    public function lignefact($year,$nbor,$nfac,$ndec,$nass,$nbsps,$nbs,$datedeb,$datefin,$totttc,$totht,$tva,$mnttva,$datefac)
    {
        $myfile = fopen('../b/bordereau-'.$nbor.'-'.$year.'.txt', "a+");
        $pipi=substr($ndec,8);
        while(strlen($pipi)!=6)
        {
            $pipi='0'.$pipi;
        }
        $dec=substr($ndec,0,2).'75'.substr($ndec,3,4).$pipi;
        if(strlen($dec)!=14)
        {
            $dec='0'.$dec;
        }
        $i=0;
        $zlebiya='';
        while($nass[$i]!='/')
        {
            $zlebiya[$i]=$nass[$i];
            $i++;
        }
        while (strlen($zlebiya)!=10)
        {
            $zlebiya='0'.$zlebiya;
        }
        $koukou=substr($nass,$i+1);
        while(strlen($koukou)!=2)
        {
            $koukou='0'.$koukou;
        }
        $yd=substr($datedeb,0,4).substr($datedeb,5,2).substr($datedeb,8,2);
        $yf=substr($datefin,6,4).substr($datefin,3,2).substr($datefin,0,2);

        $totttc=$totttc*1000;
        $mnttva=floor($totttc*6.542/100);
        $mnttva=$mnttva+1;
        $totht=$totttc-$mnttva;
        while (strlen($totttc)!=10)
        {
            $totttc='0'.$totttc;
        }

        while (strlen($totht)!=10)
        {
            $totht='0'.$totht;
        }
        $tva=$tva*1000;
        while (strlen($tva)!=10)
        {
            $tva='0'.$tva;
        }

        while (strlen($mnttva)!=10)
        {
            $mnttva='0'.$mnttva;
        }
        while (strlen($nbsps)!=3)
        {
            $nbsps='0'.$nbsps;
        }
        while (strlen($nbs)!=3)
        {
            $nbs='0'.$nbs;
        }
        $daateef=substr($datefac,6,4).substr($datefac,3,2).substr($datefac,0,2);
        $txt='2'.$year.$nbor.'010002734891'.$year.'        '.$nfac.$dec.$zlebiya.$koukou.$nbsps.$nbs.$yd.$yf.$totttc.$totht.$tva.$mnttva.$daateef."\r\n";
        fwrite($myfile, $txt);
        fclose($myfile);
    }
    public function deletBord($nBor)
    {
        $sql1="select * from cabinet.detail_bord where n_bord='$nBor'";
        $db = config::getConnexion();
        try
        {
            $dd=$db->query($sql1);
            foreach ($dd as $d)
            {
                $q=$d["n_decision"];
                $sql="update cabinet.decision set bord='0' where n_decision='$q'";
                try {
                    $db->query($sql);
                }
                catch (Exception $e)
                {
                    die('Erreur: '.$e->getMessage());
                }

            }
        }
        catch (Exception $e)
        {
            die('Erreur: '.$e->getMessage());
        }
        $sql="delete from cabinet.detail_bord where n_bord='$nBor'";
        $sql1="delete from cabinet.bordereau where n_bord='$nBor'";
        try {
            $db->query($sql);
            $db->query($sql1);
        }
        catch (Exception $e)
        {
            die('Erreur: '.$e->getMessage());
        }

    }
    public function addjrf($dated,$datef)
    {
        $sql="insert into jour_non_aut   
              select a.Date 
                from (
                    select curdate() - INTERVAL (a.a + (10 * b.a) + (100 * c.a) + (1000 * d.a) ) DAY as Date
                    from (select 0 as a union all select 1 union all select 2 union all select 3 union all select 4 union all select 5 union all select 6 union all select 7 union all select 8 union all select 9) as a
                    cross join (select 0 as a union all select 1 union all select 2 union all select 3 union all select 4 union all select 5 union all select 6 union all select 7 union all select 8 union all select 9) as b
                    cross join (select 0 as a union all select 1 union all select 2 union all select 3 union all select 4 union all select 5 union all select 6 union all select 7 union all select 8 union all select 9) as c
                    cross join (select 0 as a union all select 1 union all select 2 union all select 3 union all select 4 union all select 5 union all select 6 union all select 7 union all select 8 union all select 9) as d
                ) a
                where a.Date between '$dated' and '$datef'";
        $db = config::getConnexion();
        try
        {
            $db->query($sql);
        }
        catch (Exception $e)
        {
            die('Erreur: '.$e->getMessage());
        }
    }
    public function getjrf()
    {
        $sql="select * from jour_non_aut ";
        $db = config::getConnexion();
        try
        {
            $u=$db->query($sql);
            return $u;
        }
        catch (Exception $e)
        {
            die('Erreur: '.$e->getMessage());
        }
    }
}