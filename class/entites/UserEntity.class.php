<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

class User extends Entite {

    public $id;
    public $nom;
    public $prenom;
    public $pseudo;
    public $mail;
    public $mdp;
    public $avatar;
    public $droit;

    public function __construct($nom=null,$prenom=null,$pseudo=null,$mail=null,$mdp=null,$avatar=null,$droit=0,$id=null) {
        parent::__construct('users',__CLASS__);
		$this->nom=$nom;
		$this->prenom=$prenom;
		$this->pseudo=$pseudo;
		$this->mail=$mail;
		$this->mdp=$mdp;
		$this->avatar=$avatar;
		$this->droit=$droit;
		$this->id=$id;
    }


    public function getId() {
        return $this->id;
    }

    public function getNom() {
        return $this->nom;
    }

    public function getPrenom() {
        return $this->prenom;
    }

    public function getMail() {
        return $this->mail;
    }

    public function getMdp() {
        return $this->mdp;
    }

    public function getAdresse() {
        return $this->adresse;
    }

    public function getCp() {
        return $this->cp;
    }

    public function getVille() {
        return $this->ville;
    }

    public function getDroit() {
        return $this->droit;
    }

    public function getToken() {
        return $this->token;
    }

    public function setId() {
        $sql = "SELECT max(id) as id FROM users";
        $database = Database::getInstance();
        $req = $database->prepare($sql);
        $req->execute();
        $id = $req->fetch();
        $this->id = intval($id['id']) + 1;
    }

    public function setNom($nom) {
        $this->nom = $nom;
    }

    public function setPrenom($prenom) {
        $this->prenom = $prenom;
    }

    public function setMail($mail) {
        $this->mail = $mail;
    }

    public function setMdp($mdp) {
        $this->mdp = $mdp;
    }

    public function setAdresse($adresse) {
        $this->adresse = $adresse;
    }

    public function setCp($cp) {
        $this->cp = $cp;
    }

    public function setVille($ville) {
        $this->ville = $ville;
    }

    public function setDroit($droit) {
        $this->droit = $droit;
    }

    public function setToken($token) {
        $this->token = $token;
    }
	
	public function getCurrentUser(){
		return $this->getBy('id',$_SESSION['user']->id);
	}

}
