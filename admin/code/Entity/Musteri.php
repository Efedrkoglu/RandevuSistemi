<?php 
    class Musteri {
        public $id;
        public $isim;
        public $email;
        public $tel_no;

        public function __construct($id, $isim, $email, $tel_no) {
            $this->id = $id;
            $this->isim = $isim;
            $this->email = $email;
            $this->tel_no = $tel_no;
        }

        public function setIsim($isim) {
            $this->isim = $isim;
        }

        public function setEmail($email) {
            $this->email = $email;
        }

        public function setTelNo($tel_no) {
            $this->tel_no = $tel_no;
        }
    }
?>