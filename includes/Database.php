<?php
class Database
{
    private $serverName = "localhost";
    private $username = "sweetc6664_root";
    //private $password = "";
    private $password = 'R%Mmy28X#pXB';
    //private $dbName = "sweetcasa";

    private $dbName = 'sweetc6664_main';

    public function ServerName(){return $this->serverName;}

    public function UserName(){return $this->username;}

    public function Password(){return $this->password;}

    public function DatabaseName(){return $this->dbName;}

    public function test_input($data) {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }

#Hash the password
    public function HashPassword($password){
        $salt = "dradfsvdRTYzxcfsoeuurdjdueyreriysdsjdbsdsdsdsdsdsdsyyyksj1234dbasjhskdgthsasgshdmwqtewpoiudnzmsmmakjlmnbvOPiudkfuieyuioekdksghdyetaTYHsdOPHGsdndn";
        return hash_hmac('sha256', $password, $salt);
    }

    public function crypto_rand_secure($min, $max)
    {
        $range = $max - $min;
        if ($range < 1) return $min; // not so random...
        $log = ceil(log($range, 2));
        $bytes = (int) ($log / 8) + 1; // length in bytes
        $bits = (int) $log + 1; // length in bits
        $filter = (int) (1 << $bits) - 1; // set all lower bits to 1
        do {
            $rnd = hexdec(bin2hex(openssl_random_pseudo_bytes($bytes)));
            $rnd = $rnd & $filter; // discard irrelevant bits
        } while ($rnd > $range);
        return $min + $rnd;
    }

    public function getToken($length)
    {
        $token = "";
        $codeAlphabet = "ABCDEFGHIJKLMNOPQRSTUVWXYZblackpikintheSCIENTIST";
        $codeAlphabet.= "abcdefghijklmnopqrstuvwxyzTHEWEBSITENAMEdsdkjsdvqkggweudqudnccsbcachqqwqw";
        $codeAlphabet.= "0123456789";
        $max = strlen($codeAlphabet); // edited

        for ($i=0; $i < $length; $i++) {
            $token .= $codeAlphabet[$this->crypto_rand_secure(0, $max-1)];
        }

        return $token;
    }

}

