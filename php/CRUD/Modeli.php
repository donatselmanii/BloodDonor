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
private $password;
private $numri;
private $dbConn;
public function __construct($id='', $nrleternjoftimit='', $emri='', $mbiemri='', $datelindja='', $grupi='', $adresa='', $semundjet='',$pershkrimi='',$aksesi='',$email='',$password='',$numri='', $dbConn='') {
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
    $this->password=$password;
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
public function getPassword(){
    return $password;
}
public function setPassword($password){
    $this->password=$password;
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
    $sql = "INSERT INTO Donator(nrleternjoftimit,emri,mbiemri,datelindja,numri,email,passwordi,adresa) value(?,?,?,?,?,?,?,?)";
    $stm = $this->dbcon->prepare($sql);
    $stm->execute([$this->nrleternjoftimit, $this->emri, $this->mbiemri,$this->datelindja,$this->numri,$this->email,$this->passwordi, $this->datelindja, $this->adresa]);
    echo "<script>
    alert('te dhenat jane regjistruar me sukses');
    </script>";
    $_SESSION['regMeSukses'] = true;
}
    catch(Exception $e){
    return $e->getMessage();
        }
}
// Inserto te dhenat tjera pas te dhenave te para 
public function insertotherData($grupi, $semundjet,$pershkrimi){
    try{
    $sql = "UPDATE Donator SET grupi = ?, semundjet = ?, pershkrimi = ? WHERE nrleternjoftimit = ?";
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
            $sql = 'SELECT * from Donator WHERE email = ?, nrleternjoftimit=?';
            $stm = $this->dbcon->prepare($sql);
            $stm->execute([$this->email,$this->nrleternjoftimit]);

            return $stm->fetch();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    
    
    public function kontrolloLlogarin()
    {
        try {
            $sql = 'SELECT * from Donator WHERE email = ? and password = ?';
            $stm = $this->dbcon->prepare($sql);
            $stm->execute([$this->email, $this->password]);

            return $stm->fetch();
        } catch (Exception $e) {
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
//Metoda per Perditsim ose Editim (UPDATE)
public function edito(){
try{
$sqlStm = "UPDATE Donator SET grupi=?, semundjet=?,
pershkrimi=?where id=?";
$stm = $this->dbcon->prepare($sqlStm);
$stm->execute([$this->grupi, $this->semundjet,$this->pershkrimi, $this->id]);
echo "<script>
alert('dhenat jane Perditsuar me sukses');
document.location='displayDhenat.php';</script>";
}
catch(Exception $e){
return $e->getMessage();
}
}
//Metoda per fshirjen e te dhenave (DELETE)
public function delete(){
try{
$sql = "DELETE FROM Studenti where id=?";
$stm = $this->dbConn->prepare($sql);
$stm->execute([$this->id]);
$dhenat = $stm->fetchAll();
return $dhenat;
}
catch(Exception $e){
return $e->getMessage();
}
}



}
?>