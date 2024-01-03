<?php

include("knot.php");

/**
 * Classe que representa a estrutura de dados do tipo lista 
 * ligada (ou encadeada), que consiste no conceito de que um 
 * elemento da lista sempre irá apontar para o seu sucessor.
 */
class linkedLists
{
  private ?Knot $first;
  private ?Knot $last;
  private int $size;

  public function __construct()
  {
    $this->size = 0;
    $this->last = null;
    $this->first = null;
  }
  public function quantityOfKNots(): int
  {
    return $this->size;
  }

  public function showWhoIsInTheQueue(): void
  {
    $knot = $this->first;
    while ($knot !== null) {
      print_r("nome do nó = {$knot->getName()} \n");
      $knot = $knot->getNext();
    }
  }

  public function addOnFinal(string $knotName): void
  {
    if ($this->size == 0) {
      $this->addOnInit($knotName);
      return;
    }

    $newKnot = new Knot($knotName);
    $this->last->setNext($newKnot);
    $this->last = $newKnot;
    $this->size++;
  }

  public function addByPosition(string $knotName, int $index): void
  {
    $newKnot = new Knot($knotName);
    $actualKnot = $this->first;
    $nextKnot = $this->first->getNext();

    for ($i = 1; $i <= $this->size; $i++) {
      if ($i == $index) {
        $newKnot->setNext($nextKnot);
        $actualKnot->setNext($newKnot);
        return;
      }

      $actualKnot = $nextKnot;
      $nextKnot = $nextKnot->getNext();
    }
  }

  public function addOnInit(string $knotName): void
  {
    $newKnot = new Knot($knotName);
    $newKnot->setNext($this->first);

    if ($this->size == 0) {
      $this->last = $newKnot;
    }
    $this->first = $newKnot;
    $this->size++;
  }

  public function removeByPosition(int $index): void
  {
    if ($this->size == 0) {
      return;
    }
    if ($this->size == 1) {
      $this->removeFromInit();
    }

    $actualKnot = $this->first;
    $nextKnot = $this->first->getNext();
    for ($i = 1; $i <= $this->size; $i++) {
      if ($i == $index) {
        $actualKnot->setNext($nextKnot->getNext());
        $nextKnot->setNext(null);
        return;
      }

      $actualKnot = $nextKnot;
      $nextKnot = $nextKnot->getNext();
    }
  }

  public function removeFromInit(): void
  {
    if ($this->size == 0) {
      return;
    }

    $this->first = $this->first->getNext();
    $this->size--;
  }
}

$lista = new linkedLists();

$lista->addOnFinal("Thiago Silva");
$lista->addOnFinal("Avenida Marcelo");
$lista->addOnInit("Chorão");
$lista->addByPosition("Casa Grande", 2);

$lista->showWhoIsInTheQueue();
print_r("\n\n");

$lista->removeFromInit();
$lista->removeByPosition(1);
$lista->addOnFinal("Menino Ney");

$lista->showWhoIsInTheQueue();
print_r("\n\n");
