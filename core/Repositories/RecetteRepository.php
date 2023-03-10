<?php

namespace Repositories;

use Attributes\Table;
use Attributes\TargetEntity;
use Entity\Recette;

#[TargetEntity(entityName: Recette::class)]
class RecetteRepository extends AbstractRepository
{
    public function newRecette(object $addRecette){

        $sql="INSERT INTO `$this->tableName`(`titre`, `typeRecette`, `recette`,`date`,`heure`,`image`,`user_id`) VALUES (:titre,:typeRecette,:recette,:date,:heure,:image,:user_id)";
        $requette=$this->pdo->prepare($sql);
        $requette->execute([
            "titre"=>$addRecette->getTitre(),
            "typeRecette"=>$addRecette->getTypeRecette(),
            "recette"=>$addRecette->getRecette(),
            "date"=>$addRecette->getDate(),
            "heure"=>$addRecette->getHeure(),
            "image"=>$addRecette->getImage(),
            "user_id"=>$addRecette->getUserId()
        ]);

        return $requette;
    }
    public function update(int $id, string $titre,string $typeRecette,string $recette){
        $sql="UPDATE `$this->tableName` SET `titre`=:titre,`typeRecette`=:typeRecette,`recette`=:recette WHERE id=:id";
        $requette=$this->pdo->prepare($sql);
        $requette->execute([
            "id"=>$id,
            "titre"=>$titre,
            "typeRecette"=>$typeRecette,
            "recette"=>$recette
        ]);
        return $requette;
    }
    public function avis(int $id,int $compteurLike){

        $sql="UPDATE `$this->tableName` SET `compteurLike`=:compteurLike WHERE id=:id";
        $requette=$this->pdo->prepare($sql);
        $requette->execute([
            "id"=>$id,
            "compteurLike"=>$compteurLike
        ]);

        return $requette;
    }
}