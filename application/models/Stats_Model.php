<?php
    class Stats_Model extends CI_Model {
        public function __construct() {
            parent::__construct();
            $this->load->database();
        }

        public function getData() {
            $query = $this->db->get("Song");
            return $query->result();
        }

        public function getSong($index) {
            $song = $this->db->get("Song");
            return $song->result()[$index - 1];
        }
    }