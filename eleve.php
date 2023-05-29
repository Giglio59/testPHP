<?php
class eleve {
    private $id;
    private $nom;
    private $prenom;
    private $dateDeNaissance;

    function __construct($id, $nom, $prenom, $dateDeNaissance){ 
        $this->id = $id;
        $this->nom = $nom;
        $this->prenom = $prenom;
        $this->dateDeNaissance = $dateDeNaissance;
    }

    function getId(){
        return $this->id;
    }

    function getNom(){
        return $this->nom;
    }

    function setNom($nom){
        $this->nom = $nom;
    }

    function getPrenom(){
        return $this->prenom;
    }

    function setPrenom($prenom){
        $this->prenom = $prenom;
    }

    function getDatedeNaissance(){
        return $this->dateDeNaissance;
    }

    function setDatedeNaissance($dateDeNaissance){
        $this->dateDeNaissance = $dateDeNaissance;
    }

    static function getEleveById($id){
        $bdd = new PDO('mysql:dbname=eleves;host=127.0.0.1','root', '');
        $query = $bdd->query( "SELECT * FROM `eleves`;");
        $unEleve =$query->fetch();
        return new eleve($unEleve['id'],$unEleve['nom'],$unEleve['prenom'],$unEleve['dateDeNaissance']);
    }

    static function updateEleve($eleve){
        $bdd = new PDO('mysql:dbname=eleves;host=127.0.0.1','root', '');
        $query = $bdd->prepare( 'UPDATE eleve SET nom =:nom, prenom =:prenom, DatedeNaissance =:dateDeNaissance WHERE id =:id');
        $query->execute(array('nom'=>$eleve->getNom(),'prenom'=>$eleve->getPrenom(),'dateDeNaissance'=>$eleve->getDatedeNaissance(),'id'=>$eleve->getId()));
    }
}

?>
