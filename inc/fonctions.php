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
    public function addDec($numA,$numD,$nbs,$ns_p_s,$dateD,$pu)
    {
        $sql="insert into cabinet.decision (n_assure,n_decision,nbr_s,nb_s_sem,dat_deb,pu)
                                    values ('$numA','$numD','$nbs','$ns_p_s','$dateD','$pu')";
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
        $sql="insert into cabinet.facture (annee,n_decision,n_fac,datee,date_premier,date_fin,pu,total_ht,tva,mnt_tva,total_ttc,ttc_lettre)
                                   values ('$year','$numD','$numF',NOW(),'$date_p','$date_fin','$pu','$tot_ht','$tva','$mtva','$tot_ttc','$ttc_lettre')";
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
    public function getDec($numA,$numD=null)
    {
        if($numD!=null)
        {
            $sql="select * from cabinet.decision where n_assure = '$numA' and n_decision='$numD'";
        }
        else
        {
            $sql="select * from cabinet.decision where n_assure = '$numA'";
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
        $sql ="update cabinet.consultation set nom_jour = '$nom_jour',date_jour = '$date_jour',date_premier = '$date_premier' where n_decision  = '$numD' and indice ='$indice'";
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
        $sql= "select * from cabinet.facture where n_decision='$id'";
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
}