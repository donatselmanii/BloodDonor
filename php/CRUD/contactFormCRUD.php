<?php
require_once('../db/dbcon.php');

if (!isset($_SESSION)) {
    session_start();
}

class contactFormCRUD extends dbcon
{
    private $IDmesazhi;
    private $emri;
    private $email;
    private $phone;
    private $msg;
    private $statusi;
    private $dbConn;

    public function __construct($IDmesazhi = '', $emri = '', $email = '',$phone='', $msg = '', $statusi = '')
    {
        $this->IDmesazhi = $IDmesazhi;
        $this->emri = $emri;
        $this->email = $email;
        $this->phone=$phone;
        $this->msg = $msg;
        $this->statusi = $statusi;
        $this->dbcon = $this->connDB();
    }

    public function getEmri()
    {
        return $this->emri;
    }

    public function setEmri($emri)
    {
        $this->emri = $emri;
    }

    public function getEmail()
    {
        return $this->email;
    }

    public function setEmail($email)
    {
        $this->email = $email;
    }
    public function getPhone()
    {
        return $this->phone;
    }

    public function setPhone($phone)
    {
        $this->phone = $phone;
    }

    public function getMsg()
    {
        return $this->msg;
    }

    public function setMsg($msg)
    {
        $this->msg = $msg;
    }
    public function getStatusi()
    {
        return $this->statusi;
    }

    public function setStatusi($statusi)
    {
        $this->statusi = $statusi;
    }
    public function getIDmesazhi()
    {
        return $this->IDmesazhi;
    }

    public function setIDmesazhi($IDmesazhi)
    {
        $this->IDmesazhi = $IDmesazhi;
    }

    public function insertoMesazhin()
    {
        try {
            $sql = "INSERT INTO `contactform`(`emri`, `email`, `phone`, `mesazhi`) VALUES (?,?,?,?)";
            $stm = $this->dbcon->prepare($sql);
            $stm->execute([$this->emri, $this->email, $this->phone, $this->msg]);

            $_SESSION['mesazhiMeSukses'] = true;
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }


    public function shfaqMesazhet()
    {
        try {
            $sql = "SELECT * FROM contactform";
            $stm = $this->dbcon->prepare($sql);
            $stm->execute();

            return $stm->fetchAll();
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }

    public function konfirmoMesazhin()
    {
        try {
            $sql = "UPDATE contactform set statusi = 'Mesazhi eshte Pranuar dhe eshte Pergjigjur ne email' where IDmesazhi = ?";
            $stm = $this->dbcon->prepare($sql);
            $stm->execute([$this->IDmesazhi]);

            $_SESSION['mezashiUKonfirmua'] = true;
            echo '<script>document.location="../admin/shfaqMesazhet.php"</script>';
        } catch (Exception $e) {
            return $e->getMessage();
        }
    }
}



?>