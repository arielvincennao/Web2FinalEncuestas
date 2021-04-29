<?php

function getEncuestaByTitulo($titulo){
      $sentence = $this->db->prepare( "SELECT * from encuesta where $titulo=?");
      $sentence->execute(array($titulo));
      return $sentence->fetchAll(PDO::FETCH_ASSOC);
}

function getMultipleById($id){
      $sentence = $this->db->prepare( "SELECT multiple from encuesta where $id=?");
      $sentence->execute(array($id));
      return $sentence->fetchAll(PDO::FETCH_ASSOC);
}