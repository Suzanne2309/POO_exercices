<?php

Class voiture{
    //On crée l'attribut ($_attribut) après avoir défini sa visibilité. Ici étant en private, seul dans la classe on aura accés et donc possibilité de modifier l'attribut 
    private $_marque;
    private $_modele;
    private $_nbPortes;
    private $_statut = 0; //On définit un état initial de 0 qui pourra ensuite être modifié avec les méthodes 
    private $_vitesseActuelle = 0; //On définit un état initial de 0 qui pourra ensuite être modifié avec les méthodes 

    //Même si l'ordre des différentes function n'a pas d'importance pour fonctionner, par question de bonnes pratique il est mieux de commencer par le constructor, puis les getter/setter et on fini sur les méthodes (fonction des actions)
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
        return "Sa vitesse actuelle est de : " . $this->_vitesseActuelle . "km/h <br>";
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
        if ($kmh > 0 && $this->_statut === 1) {
            $this->_vitesseActuelle += $kmh; //$this va cibler l'attribut _vitesseActuelle de la voiture dont on veut modifier la vitesse, pour ajouter la nouvelle valeur à la place de l'existante
            return $this->_marque . " accélère. Vitesse actuelle : " . $this->_vitesseActuelle . " km/h.<br>"; //L"echo permet d'afficher la phrase indiquant l'accélération et sa vitesse
        } else{
           return "Pour accérer le véhicule doit demarrer";
        }
    }

    public function decelerer($kmh) {
        if ($kmh > 1 && $this->_statut === 1) {
            $this->_vitesseActuelle -= $kmh; //$this va cibler l'attribut _vitesseActuelle de la voiture dont on veut modifier la vitesse, pour ajouter la nouvelle valeur à la place de l'existante
            return $this->_marque . " freine. Vitesse actuelle : " . $this->_vitesseActuelle . " km/h.<br>"; //L"echo permet d'afficher la phrase indiquant l'accélération et sa vitesse
        } else {
           return "Pour freiner le véhicule doit être demarrer ET avoir de la vitesse";
        }

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
        echo "Sa vitesse actuelle est de : " . $this->_vitesseActuelle . "km/h <br>";
    }


    //Méthode magique to string
    public function __toString() {
        return $this->_marque;
    }

};

$vehicule1 = new voiture("Peugeot", "408", 5, 0); //On crée ici la variable véhicule qui est l'instance contenant donc toutes les nouvelles classes voitures qui seront crée
$vehicule2 = new voiture("Citroën", "C4", 3, 0);

$vehicule1->demarrer();
echo "<br>";
$vehicule1->accelerer(50);
echo "<br>";
$vehicule2->demarrer();
echo "<br>";
$vehicule2->stopper();
echo "<br>";
$vehicule2->accelerer(20);
echo "<br>";

echo $vehicule1->getvitesseActuelle();
echo $vehicule1->decelerer(20);
echo $vehicule1->getvitesseActuelle();
echo "<br>";


echo $vehicule2->getvitesseActuelle();
echo "<br>";

$vehicule1->afficherInfos();
echo "<br>";
$vehicule2->afficherInfos();
echo "<br>";

echo $vehicule1;


//Exemple du métabolisme : la classe = cellule. La cellule contient l'adn (la recette de l'object) qui contient les inforamtions des caractéristiques physiques (attribut et methodes).
    // Pour cloner un être humain (objet), on utilise la cellule dont on va utiliser l'adn pour créer l'enveloppe corporelle et on peut modifier les chromosomes (attributs et methodes) de l'adn pour donner aux clones des yeux bleux et cheveux blonds

//classe : Une entité qui contient la structure générale pour créer des instances par la suite (donc les attributs et les méthodes) 

//objet : C'est l'instance de la classe / le résultat de l'instanciation d'une classe (instanciation = se servir de la classe pour créer l'objet)

//encapsulation : C'est ce qui permet de donner un niveau de visibilité / d'accès aux éléments de la classe (attributs et méthodes) 

//méthode magique : Ce sont des méthodes prédéfinies par php, qu'il faut définir dans notre class pour les appeler sans erreurs par la suite, ce sont les seules méthodes avec double underscore