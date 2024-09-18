<?php
class Usuario {

    private $api_url;
    private $userData;

    public function __construct($api_url = 'https://randomuser.me/api/') {
        $this->api_url = $api_url;
    }

    public function fetchUserData() {
        $response = file_get_contents($this->api_url);
        $this->userData = json_decode($response, true);
        if (!isset($this->userData['results'][0])) {
            die('Erro ao decodificar os dados JSON.');
        }
    }

    public function getData($key) {
        return $this->userData['results'][0][$key];
    }

    public function getFoto() {
        return $this->getData('picture')['large'];
    }

    public function getNome() {
        return ucfirst($this->getData('name')['first']) . ' ' . ucfirst($this->getData('name')['last']);
    }

    public function getEmail() {
        return $this->getData('email');
    }

    public function getTelefone() {
        return $this->getData('phone');
    }

}
?>
