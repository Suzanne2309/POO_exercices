<?php

Class voiture{
    //On crée l'attribut ($_attribut) après avoir défini sa visibilité. Ici étant en private, seul dans la classe on aura accés et donc possibilité de modifier l'attribut 
    private $_marque;
    private $_modele;
    private $_nbPortes;
    private $_statut = 0; //On définit un état initial de 0 qui pourra ensuite être modifié avec les méthodes 
    private $_vitesseActuelle = 0; //On définit un état initial de 0 qui pourra ensuite être modifié avec les méthodes 

    //Même si l'ordre des différentes function n'a pas d'importance, par question de bonnes pratique il est mieux de commencer par le constructor, puis les getter/setter et on fini sur les méthodes (fonction des actions)
    //On crée la fonction du constructor (__construct) pour viser les attributs que l'on souhaite modifier ($attribut1, attribut2, attributn, ...) à chaque nouvelle voiture crée dans l'instance vehicul. On va ouvrir l'accés de la fonction en le statuant sur Public pour y avoir accés en-dehors de notre class
    public function __construct($marque, $modele, $nbPortes, $vitesseActuelle) {
        $this->_marque = $marque;
        $this->_modele = $modele;
        $this->_nbPortes = $nbPortes;
        $this->_vitesseActuelle = $vitesseActuelle;
    }

    //On arrive aux getter et setter, on va ici faire un getter et un setter par attribut
    /* Marque */
    public function getMarque(){
        return $this->_marque;
    }
    public function setMarque($marque) {
        $this->_marque = $marque;
    }
    /* Modèle */
    public function getModele(){
        return $this->_modele;
    }
    public function setModele($modele) {
        $this->_modele = $modele;
    }
    /* Nombres de portes */
    public function getNbPortes(){
        return $this->_nbPortes;
    }
    public function setNbPortes($nbPortes) {
        $this->_nbPortes = $nbPortes;
    }
    /* Vitesse Actuelle */ //On crée aussi le getter et setter de la vitesse pour pouvoir interdire les chiffres négatifs
    public function getVitesseActuelle(){
        return $this->_vitesseActuelle;
    }
    public function setVitesseActuelle($vitesseActuelle) {
        if ($vitesseActuelle >= 0) { //SI la nouvelle valeur de vitesse est supérieur ou égale à 0 alors on peut la modifier (si elle est inférieur, la modification se fera pas, cela éviter le résultat négatif)
            $this->_vitesseActuelle = $vitesseActuelle;
        };
    }

    //On va crée les méthodes en dernier, donc une focntion qui grâce à la variable pré-définie $this va pouvoir modifier la valeur de l'attribut statut pour chaque new voiture que l'on demandera
    public function demarrer() { //On utilise une fonction if car on veut d'abord vérifier que le statut est bien = à 0
        if ($this->_statut === 0) {
            $this->_statut = 1;
            echo $this->_marque . " démarre.";
        } else {
            echo $this->_marque . " est déjà démarrée.";
        };
    }

    public function accelerer($kmh) {
        if ($kmh > 0) {
            $this->_vitesseActuelle += $kmh; //$this va cibler l'attribut _vitesseActuelle de la voiture dont on veut modifier la vitesse, pour ajouter la nouvelle valeur à la place de l'existante
        };
        echo $this->_marque . " accélère. Vitesse actuelle : " . $this->_vitesseActuelle . " km/h.<br>"; //L"echo permet d'afficher la phrase indiquant l'accélération et sa vitesse
    }

    public function stopper() { 
        if ($this->_statut === 1) {
            $this->_statut = 0;
            echo $this->_marque . " s'arrête.";
        } else {
            echo $this->_marque . " est déjà arrêtée.";
        };
    }

    public function afficherInfos() {
        echo "Nom et modèle du véhicule : " . $this->_marque . " " . $this->_modele . "<br>";
        echo "Nombre de portes : " . $this->_nbPortes . "<br>";
        echo "Le véhicule " . $this->_marque . " est " . ($this->_statut ? "démarré" : "arrêté") . "<br>";
        echo "Sa vitesse actuelle est de :" . $this->_vitesseActuelle . "km/h <br>";
    }

};

$vehicule1 = new voiture("Peugeot", "408", 5, 0); //On crée ici la variable véhicule qui est l'instance contenant donc toutes les nouvelles classes voitures qui seront crée
$vehicule2 = new voiture("Citroën", "C4", 3, 0);

$vehicule1->afficherInfos();
echo "<br>";
$vehicule2->afficherInfos();

