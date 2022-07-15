<?php 
include_once "class/genero.class.php";
include_once "class/condicao.class.php";
include_once "class/livro.class.php";
include_once "class/autor.class.php";
include_once "class/editora.class.php";

$livro = new Livro(1,"asda","alksjdlkjad",0,0,0,0);
echo $livro;
echo "<br/>";

$genero = new Genero(1,"lajdkajs","asjdhaljsd");
echo $genero;
echo "<br/>";

$condicao = new Condicao(1,"aksjdka","asijda");
echo $condicao;
echo "<br/>";

$autor = new Autor(1,"Felipe Greghi");
echo $autor;
echo "<br/>";

$editora = new Editora(1,"mundial","000000","16991609156");
echo $editora;
echo "<br/>";
?>