<?php
require_once('../db/dbcon.php');
if (!isset($_SESSION)) {
    session_start();
}

Class Modeli extends dbcon{
private $id;
private $nrleternjoftimit;
private $emri;
private $mbiemri;
private $datelindja;
private $grupi;
private $adresa;
private $semundjet;
private $pershkrimi;
private $aksesi; 
private $email;
private $passwordi;
private $numri;
private $dbConn;
public function __construct($id='', $nrleternjoftimit='', $emri='', $mbiemri='', $datelindja='', $grupi='', $adresa='', $semundjet='',$pershkrimi='',$aksesi='',$email='',$passwordi='',$numri='', $dbConn='') {
    $this->id = $id;
    $this->nrleternjoftimit = $nrleternjoftimit;
    $this->emri = $emri;
    $this->mbiemri = $mbiemri;
    $this->datelindja = $datelindja;
    $this->grupi = $grupi;
    $this->adresa = $adresa;
    $this->semundjet = $semundjet;
    $this->pershkrimi=$pershkrimi;
    $this->aksesi=$aksesi;
    $this->email=$email;
    $this->passwordi=$passwordi;
    $this->numri=$numri;
    $this->dbcon = $this->connDB();
}
//Seters and geters
public function getId() {
    return $this->id;
} 

public function setId($id) {
    $this->id = $id;
}

public function getNrleternjoftimit() {
    return $this->nrleternjoftimit;
}

public function setNrleternjoftimit($nrleternjoftimit) {
    $this->nrleternjoftimit = $nrleternjoftimit;
}

public function getEmri() {
    return $this->emri;
}

public function setEmri($emri) {
    $this->emri = $emri;
}

public function getMbiemri() {
    return $this->mbiemri;
}

public function setMbiemri($mbiemri) {
    $this->mbiemri = $mbiemri;
}

public function getDatelindja() {
    return $this->datelindja;
}

public function setDatelindja($datelindja) {
    $this->datelindja = $datelindja;
}

public function getGrupi() {
    return $this->grupi;
}

public function setGrupi($grupi) {
    $this->grupi = $grupi;
}

public function getAdresa() {
    return $this->adresa;
}

public function setAdresa($adresa) {
    $this->adresa = $adresa;
}

public function getSemundjet() {
    return $this->semundjet;
}

public function setSemundjet($semundjet) {
    $this->semundjet = $semundjet;
}
public function getPershkrimi(){
    return $pershkrimi;
}
public function setPershkrimi($pershkrimi){
    $this->pershkrimi=$pershkrimi;
}
public function getAksesi(){
    return $aksesi;
}
public function setAksesi($aksesi){
    $this->aksesi=$aksesi;
}
public function getEmail(){
    return $email;
}
public function setEmail($email){
    $this->email=$email;
}
public function getPasswordi(){
    return $passwordi;
}
public function setPasswordi($passwordi){
    $this->passwordi=$passwordi;
}
public function getNumri(){
    return $numri;
}
public function setNumri($numri){
    $this->numri=$numri;
}



//Metoda per insertim Dhenave
public function insertoDhenat(){
try{
    $sql = "INSERT INTO `donator` (`nrleternjoftimit`,`emri`,`mbiemri`,`numri`,`adresa`,`passwordi`) VALUES(?,?,?,?,?,? )";
    $stm = $this->dbcon->prepare($sql);
    $stm->execute([$this->nrleternjoftimit, $this->emri, $this->mbiemri,$this->numri, $this->adresa, $this->passwordi]);
    
    $_SESSION['regMeSukses'] = true;
}
    catch(Exception $e){
    return $e->getMessage();
        }
}

// Inserto te dhenat tjera pas te dhenave te para 
public function insertotherData($grupi, $semundjet,$pershkrimi){
    try{
    $sql = "UPDATE donator SET grupi = ?, semundjet = ?, pershkrimi = ? WHERE nrleternjoftimit = ?";
    $stm = $this->dbcon->prepare($sql);
    $stm->execute([$grupi, $semundjet, $pershkrimi, $this->nrleternjoftimit]);
    echo "<script>
    alert('te dhenat jane perditesuar me sukses');
    document.location='displayDhenat.php';</script>";
    }
    catch(Exception $e){
    return $e->getMessage();
    }
    }
    

    
    
    public function kontrollo(){
        try {
            $sql = "SELECT * from `donator` WHERE `nrleternjoftimit` = ?";
            $stm = $this->dbcon->prepare($sql);
            $stm->execute([$this->nrleternjoftimit]);

            return $stm->fetch();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    
    public function kontrolloLlogarin(){
        try {
            $sql = 'SELECT * from donator WHERE nrleternjoftimit = ? and passwordi = ?';
            $stm = $this->dbcon->prepare($sql);
            $stm->execute([$this->nrleternjoftimit, $this->passwordi]);

            return $stm->fetch();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    public function kontrolloDonator(){
        try{
            $sql='SELECT grupi, semundjet, pershkrimi, email from donator where id=? and `grupi` is null and `semundjet` is null and `pershkrimi` is null and `email` is null ';
            $stm = $this->dbcon->prepare($sql);
            $stm->execute([$this->id]);
            return $stm->fetch();
        }
         catch (Exception $e) {
            return $e->getMessage();
        }
    }

//Metoda per shfaqjen e te gjithe te dhenave te studentit
    public function shfaqDhenat(){
        try{
            //$sql = "SELECT * FROM Studenti";
            $sql = "CALL GetAllStudnetet()";
            $stm = $this->dbConn->prepare($sql);
            $stm->execute();
            $dhenat = $stm->fetchAll();
            return $dhenat;
        }
    catch(Exception $e){
        return $e->getMessage();
    }
}
//Metoda per shfaqjen e te gjithe te dhenave te studentit
    public function shfaqSipasIDs(){
        try{
            $sql = "SELECT * FROM Donator where id=?";
            $stm = $this->dbcon->prepare($sql);
            $stm->execute([$this->id]);
            $dhenat = $stm->fetchAll();
            return $dhenat;
        }
    catch(Exception $e){
        return $e->getMessage();
    }
}
public function shfaqTeGjithePerdoruesit(){
        try {
            $sql = 'SELECT * from donator';
            $stm = $this->dbcon->prepare($sql);
            $stm->execute();

            return $stm->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }


}
?>