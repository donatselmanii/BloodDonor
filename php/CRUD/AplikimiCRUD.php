<?php
require_once('../db/dbcon.php');

if (!isset($_SESSION)) {
    session_start();
}
Class AplikimiCRUD extends dbcon{
    private $aplikmiID;
    private $donatoriID;
    private $dataAplikimit;
    private $kategoriaqytetit;
    private $statusiTerminit;

    public function __construct($aplikmiID='',$donatoriID='',$dataAplikimit='',$kategoriaqytetit='',$statusiTerminit=''){
        $this->aplikimiID=$aplikimiID;
        $this->donatoriID=$donatoriID;
        $this->dataAplikimit=$dataAplikimit;
        $this->kategoriaqytetit=$kategoriaqytetit;
        $this->statusiTerminit=$statusiTerminit;
        $this->dbcon = $this->connDB();
    }
    public function getaplikimiID(){
        return $this->aplikimiID;
    }
    public function setaplikimiID($aplikimiID){
        $this->aplikimiID=$aplikimiID;
    }
    public function getDonatoriID() {
        return $this->donatoriID;
      }
    
      public function setDonatoriID($donatoriID) {
        $this->donatoriID = $donatoriID;
      }
    
      public function getDataterminit() {
        return $this->dataTerminit;
      }
    
      public function setDataterminit($dataTerminit) {
        $this->dataTerminit = $dataTerminit;
      }
    
      public function getKategoriaqytetit() {
        return $this->kategoriaqytetit;
      }
    
      public function setKategoriaqytetit($kategoriaqytetit) {
        $this->kategoriaqytetit = $kategoriaqytetit;
      }
      public function getStatusiTerminit() {
        return $this->statusiTerminit;
      }
    
      public function setStausiTerminit($statusiTerminit) {
        $this->statusiTerminit = $statusiTerminit;
      }

    public function InsertTerminin()
    {
        try {

            $sql = "INSERT INTO `termini`(`donatoriID`, `dataTerminit`, `kategoriaqytetit`) VALUES (?,?,?)";
            $stm = $this->dbcon->prepare($sql);
            $stm->execute([$this->donatoriID, $this->dataTerminit, $this->kategoriaqytetit]);

            
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    
      
    
     public function shfaqiTerminat(){
        try {
            $sql = "SELECT * from termini t inner join donator d on t.donatoriID = d.id";
            $stm = $this->dbcon->prepare($sql);
            $stm->execute();
  
            return $stm->fetchAll();
      
        } catch (Exception $e) {
            return $e->getMessage();
        }
       }

     public function shfaqTermininSipasID()
    {
        try {
            $sql = "SELECT * FROM termini WHERE aplikimiID = ?";
            $stm = $this->dbcon->prepare($sql);
            $stm->execute([$this->aplikimiID]);

            return $stm->fetch();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    public function konfirmoMesazhin()
    {
        try {
            $sql = "UPDATE termini set statusiTerminit = 'Termini juaj eshte venodsur dhe aprovuar' where aplikimiID = ?";
            $stm = $this->dbcon->prepare($sql);
            $stm->execute([$this->aplikimiID]);

            $_SESSION['mezashiUKonfirmua'] = true;
            echo '<script>document.location="../admin/terminet.php"</script>';
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    public function konfirmoMesazhinUKRY()
    {
        try {
            $sql = "UPDATE termini set statusiTerminit = 'Eshte kryer dhurimi i gjakut' where aplikimiID = ?";
            $stm = $this->dbcon->prepare($sql);
            $stm->execute([$this->aplikimiID]);

            $_SESSION['mezashiUKonfirmua'] = true;
            echo '<script>document.location="../admin/terminet.php"</script>';
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    public function fshijTermininSipasID(){
        try {

            $sql = "DELETE FROM termini WHERE aplikimiID = ?";
            $stm = $this->dbcon->prepare($sql);
            $stm->execute([$this->aplikimiID]);

            $_SESSION['mesazhiFshirjesMeSukses'] = true;
            echo '<script>document.location="../admin/terminet.php"</script>';
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    public function kontrolloterminin(){
        try {
        $sql = "SELECT * FROM termini WHERE  donatoriID=? and statusiTerminit !='i perfunduar'";
        $stm = $this->dbcon->prepare($sql);
        $stm->execute([ $this->donatoriID]);  
        return $stm->fetch();
    } catch (Exception $e) {
        return $e->getMessage();
    }
    }

}

?>