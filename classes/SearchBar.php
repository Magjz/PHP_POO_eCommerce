<?php

class SearchBar {

    protected $keyword;
    protected $search;
    protected $db; 
    
    public function __construct($db, Product $search)
    {
        $this->db = $db; 
        $this->keyword = $search->getData('search');
        $this->search = $search;
    }

    public function displaySearch()
    {
        if($_SERVER['REQUEST_METHOD'] == 'POST')
        {
            $this->searchProduct();
        }
    }
    public function searchProduct()
    { 
        $q_base = $this->db->prepare("SELECT * FROM products where name like '%{$this->keyword}%'"); 

        $q_base->execute(); 

        $result = $q_base->fetchAll();
        $list = "";
        if($result != NULL){
            foreach ($result as $value){
                echo '<div class="col s12 m12 l4">
                <div class="card">
                    <div class="card-image">
                        <img src= class="responsive-img">
                    </div>
                    <div class="card-content">
                        <h2>' . $value['name'] .  '</h2>
                        <p>' . $value['description']. '</p>
                        <p>' . $value['price'].' €</p>
                    </div>
                    <div class="card-action">
                         <a href="#">Commander</a>
                    </div>
                </div>
                 </div>';
            }
          return true;
        }else{
            $q_base->closeCursor();

            $q_base = $this->db->prepare("SELECT * FROM categories 
            WHERE name LIKE '%{$this->keyword}%'");
            $q_base->execute(); 
    
            $result = $q_base->fetchAll();
          
            if($result != NULL){
                foreach ($result as $value){
                   echo '
                   <div class="col s12 m12 l4">
                    <div class="card">
                        <div class="card-image">
                            <img src= class="responsive-img">
                        </div>
                        <div class="card-content">
                            <h2>'. $value['name'] . '</h2>
                            <p>' . $value['description']. '</p>
                        </div>
                        <div class="card-action">
                            <a href="#">Voir la catégorie</a>
                        </div>
                    </div>
                </div>';
                }
                
                return true; 
            }
            echo '<p class="grey-text text-darken-3 lighten-3">
            Aucun produit ne correspond à votre recherche ! </p>';
        }
        $q_base->closeCursor();     
    }
}