<?php
defined('BASEPATH') OR exit('No direct script access allowed');

    class Stats_Controller extends CI_Controller {
        public function __construct(){
            parent::__construct();
            $this->load->model("Stats_Model");
        }

        public function index() {
            $data['query'] = $this->Stats_Model->getData();
            $this->load->view("index", $data);
        }

        public function songData($index) {
            $song['query'] = $this->Stats_Model->getSong($index);
            $data = $this->load->view("song-data", $song, TRUE);
            echo $data;
        }
    }