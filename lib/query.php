<?php
class Query {
    
    protected $db;

    public function __construct() {
        // Connect to database
        $this->db = new PDO('sqlite:MyProfile.db');
    }

    public function getProfile($key,$type='basic') {
        // fetch profile information
        $tbl_profile = $this->db->query("SELECT * FROM profile WHERE key = '$key' AND type = '$type'");
        $profile = $tbl_profile->fetchObject();
        return $profile->value;
    }

    public function getIcon() {
        $tbl_profile = $this->db->query("SELECT * FROM profile WHERE key = 'icon'");
        $icons = $tbl_profile->fetchAll(PDO::FETCH_OBJ);
        return $icons;
    }

    public function getSkills() { 
        $tbl = $this->db->query("SELECT * FROM keahlian"); 
        $skills = $tbl->fetchAll(PDO::FETCH_OBJ);
        return $skills;
    }

    public function getBahasa() { 
        $tbl = $this->db->query("SELECT * FROM keahlian_bahasa"); 
        $bahasa = $tbl->fetchAll(PDO::FETCH_OBJ);
        return $bahasa;
    }

    public function getPengalaman() { 
        $tbl = $this->db->query("SELECT * FROM pengalaman"); 
        $pengalaman = $tbl->fetchAll(PDO::FETCH_OBJ);
        return $pengalaman;
    }

    public function getSekolah() { 
        $tbl = $this->db->query("SELECT * FROM sekolah"); 
        $sekolah = $tbl->fetchAll(PDO::FETCH_OBJ);
        return $sekolah;
    }
}
