<?php
require_once('../db/dbcon.php');

if (!isset($_SESSION)) {
    session_start();
}
Class NewsCRUD extends dbcon{
    private $lajmiID;
    private $tituli;
    private $pershkrimi;
    private $fotolajmit;
    private $contentfoto;
    private $content;
    private $kategorialajmit;
    private $datainsertimit;
    private $dbConn;

    public function __construct($lajmiID='',$titulli='',$pershkrimi='',$fotolajmit='',$contentfoto='',$content='',$kategorialajmit='',$datainsertimit='',$dbConn=''){
        $this->lajmiID=$lajmiID;
        $this->titulli=$titulli;
        $this->pershkrimi=$pershkrimi;
        $this->fotolajmit=$fotolajmit;
        $this->contentfoto=$contentfoto;
        $this->content=$content;
        $this->kategorialajmit=$kategorialajmit;
        $this->datainsertimit=$datainsertimit;
        $this->dbcon = $this->connDB();
        
    }

    public function getLajmiID(){
        return $this->lajmiId;
    }
    public function setLajmiID($lajmiID){
        $this->lajmiID=$lajmiID;
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
    
      public function getFotolajmit() {
        return $this->fotolajmit;
      }
    
      public function setFotolajmit($fotolajmit) {
        $this->fotolajmit = $fotolajmit;
      }
    
      public function getContentfoto() {
        return $this->contentfoto;
      }
    
      public function setContentfoto($contentfoto) {
        $this->contentfoto = $contentfoto;
      }
    
      public function getContent() {
        return $this->content;
      }
    
      public function setContent($content) {
        $this->content = $content;
      }
      public function getKategorialajmit() {
        return $this->kategorialajmit;
      }
    
      public function setKategorialajmit($kategorialajmit) {
        $this->kategorialajmit = $kategorialajmit;
      }
      public function getDatainsertimit() {
        return $this->datainsertimit;
      }
    
      public function setDatainsertimit($datainsertimit) {
        $this->datainsertimit = $datainsertimit;
      }
      
    
      //Metoda per regjistrimin e lajmeve ne databaze
      public function InsertLajmin(){
        try {
            $this->setTitulli($_SESSION['titulli']);
            $this->setPershkrimi($_SESSION['pershkrimi']);
            $this->setContentfoto($_SESSION['fotolajmit']);
            $this->setContent($_SESSION['content']);
            $this->setContentfoto($_SESSION['contentfoto']);
            

            $sql = "INSERT INTO `lajmi`(`titulli`, `pershkrimi`,`fotolajmit`,`content`, `contentfoto`) VALUES (?,?,?,?,?)";
            $stm = $this->dbcon->prepare($sql);
            $stm->execute([$this->titulli,$this->pershkrimi,$this->fotolajmit,$this->content, $this->contentfoto]);

            $_SESSION['LajmiUinsertua'] = true;
            
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
     //Metoda e cila i shfaq te gjitha lajmet e regjistruara ne databaze
    public function shfaqiLajmet(){
      try {
          $sql = "SELECT * FROM `lajmi`";
          $stm = $this->dbConn->prepare($sql);
          $stm->execute();

          return $stm->fetchAll();
    
      } catch (Exception $e) {
          return $e->getMessage();
      }
     }

     //Metoda e cila shfaq Lajmin sipas ID te marrur nga SESSIONI
     public function shfaqLajminSipasID()
    {
        try {
            $sql = "SELECT * FROM lajmi WHERE lajmiID = ?";
            $stm = $this->dbConn->prepare($sql);
            $stm->execute([$this->produktiID]);

            return $stm->fetch();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function barteFotonNeFolder()
    {
        try {
            $foto = $_SESSION['FotoLajmit'];
            $emriFotos = $foto['name'];
            $emeriTempIFotes = $foto['tmp_name'];
            $errorFoto = $foto['error'];

            $fileExt = explode('.', $emriFotos);
            $fileActualExt = strtolower(end($fileExt));

            $teLejuara = array('jpg', 'jpeg', 'png');

            if (in_array($fileActualExt, $teLejuara)) {
                if ($errorFoto === 0) {
                    $_SESSION['emriUnikFotos'] = uniqid('', true) . "." . $fileActualExt;
                    $destinacioniFotos = '../../img/products/' . $_SESSION['emriUnikFotos'];
                    move_uploaded_file($emeriTempIFotes, $destinacioniFotos);

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
    
    }


?>