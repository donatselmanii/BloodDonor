<?php
require_once('../db/dbcon.php');

if (!isset($_SESSION)) {
    session_start();
}
Class DonationCRUD extends dbcon{
    private $donationID;
    private $titulli;
    private $pershkrimi;
    private $fotorequest;
    private $kategoriaqytetit;
    private $kategoriagrupit;
    private $datainsertimit;
    private $dbConn;

    public function __construct($donationID='', $titulli='', $pershkrimi='', $fotorequest='', $kategoriaqytetit='', $kategoriagrupit='', $datainsertimit='', $dbConn='') {
      $this->donationID = $donationID;
      $this->titulli = $titulli;
      $this->pershkrimi = $pershkrimi;
      $this->fotorequest = $fotorequest;
      $this->kategoriaqytetit = $kategoriaqytetit;
      $this->kategoriagrupit = $kategoriagrupit;
      $this->datainsertimit = $datainsertimit;
      $this->dbcon = $this->connDB();
  }

  public function getDonationID() {
      return $this->donationID;
  }

  public function setDonationID($donationID) {
      $this->donationID = $donationID;
  }
  
  public function getTitulli() {
      return $this->titulli;
  }

  public function setTitulli($titulli) {
      $this->titulli = $titulli;
  }

  public function getPershkrimi() {
      return $this->pershkrimi;
  }

  public function setPershkrimi($pershkrimi) {
      $this->pershkrimi = $pershkrimi;
  }

  public function getFotorequest() {
      return $this->fotorequest;
  }

  public function setFotorequest($fotorequest) {
      $this->fotorequest = $fotorequest;
  }

  public function getkategoriaqytetit() {
      return $this->kategoriaqytetit;
  }

  public function setKategoriaqytetit($kategoriaqytetit) {
      $this->kategoriaqytetit = $kategoriaqytetit;
  }

  public function getkategoriagrupit() {
      return $this->kategoriagrupit;
  }

  public function setKategoriagrupit($kategoriagrupit) {
      $this->kategoriagrupit = $kategoriagrupit;
  }

  public function getDatainsertimit() {
      return $this->datainsertimit;
  }

  public function setDatainsertimit($datainsertimit) {
      $this->datainsertimit = $datainsertimit;
  }
      
    
      //Metoda per regjistrimin e lajmeve ne databaze
      public function InsertDonation(){
        try {     
          $this->barteFotonNeFolder();
            
            $sql = "INSERT INTO `donation`(`titulli`, `pershkrimi`,`fotorequest`,`kategoriaqytetit`, `kategoriagrupit`) VALUES (?,?,?,?,?)";
            $stm = $this->dbcon->prepare($sql);
            $stm->execute([$this->titulli,$this->pershkrimi,$this->fotorequest,$this->kategoriaqytetit, $this->kategoriagrupit]);
            
            
            
            $_SESSION['DonationUinsertua'] = true;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
     //Metoda e cila i shfaq te gjitha lajmet e regjistruara ne databaze
    public function shfaqiDonations(){
      try {
          $sql = "SELECT * FROM `donation`";
          $stm = $this->dbcon->prepare($sql);
          $stm->execute();

          return $stm->fetchAll();
    
      } catch (Exception $e) {
          return $e->getMessage();
      }
     }

     //Metoda e cila shfaq Lajmin sipas ID te marrur nga SESSIONI
     public function shfaqDonationSipasID()
    {
        try {
            $sql = "SELECT * FROM donation WHERE donationID = ?";
            $stm = $this->dbcon->prepare($sql);
            $stm->execute([$this->donationID]);

            return $stm->fetch();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function barteFotonNeFolder()
    {
        try {
            $foto = $_SESSION['fotorequest'];
            $emriFotos = $foto['name'];
            $emeriTempIFotes = $foto['tmp_name'];
            $errorFoto = $foto['error'];

            $fileExt = explode('.', $emriFotos);
            $fileActualExt = strtolower(end($fileExt));

            $teLejuara = array('jpg', 'jpeg', 'png', 'svg');

            if (in_array($fileActualExt, $teLejuara)) {
                if ($errorFoto === 0) {
                    $emriUnikFotosDonation = uniqid('', true) . "." . $fileActualExt;
                    $destinacioniFotos = '../../img/donation/' . $emriUnikFotosDonation;
                    move_uploaded_file($emeriTempIFotes, $destinacioniFotos);

                    $this->setFotorequest($emriUnikFotosDonation);
                } else {
                    $_SESSION['problemNeBartje'] = true;
                }
            } else {
                $_SESSION['fileNukSuportohet'] = true;
            }
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    public function shfaq4LajmetEFundit(){
        try {
            $sql = "SELECT * FROM (SELECT * FROM `donation` ORDER BY `donationID` DESC LIMIT 4) AS donacionetEFundit ORDER BY DonacionetEFundit.donationID DESC";
            $stm = $this->dbcon->prepare($sql);
            $stm->execute();

            return $stm->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    public function fshijDonationSipasID(){
        try {
            $fotorequest = $this->shfaqDonationSipasID();
            unlink('../../img/donation/' . $donacioni['fotorequest']);

            $sql = "DELETE FROM donation WHERE donationID = ?";
            $stm = $this->dbcon->prepare($sql);
            $stm->execute([$this->donationID]);

            $_SESSION['mesazhiFshirjesMeSukses'] = true;
            echo '<script>document.location="../admin/adminDonation.php"</script>';
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
    
    }


?>