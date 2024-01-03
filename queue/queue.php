<?php
/**
 * Classe que representa a estrutura de dados do tipo fila 
 * na qual o primeiro item a entrar é o primeiro a sair, sob 
 * conceito de FIFO (first-in first-out). 
 */ 
class Queue {
  private array $queue; 
  private int $size;

  public function __construct() {
    $this->queue = [];
    $this->size = 0;
  }

  public function addAtTheEnd(string $name): void {
    $this->queue[] = $name;
    $this->size ++;
  }

  public function showWhoIsInTheQueue(): void {
    foreach($this->queue as $item) {
      print_r("Nome da pessoa = " . $item . "\n");
    }
  }

  public function quantityOfPeople(): int {
    return $this->size;
  }

  public function removeOnInit(): void {
    array_shift($this->queue); 
    $this->size --;
  }
}

$queue = new Queue();
$queue->addAtTheEnd("Antônio");
$queue->addAtTheEnd("João");
$queue->addAtTheEnd("Maria");
$queue->addAtTheEnd("Francisco");
$queue->addAtTheEnd("Claudia");
$queue->showWhoIsInTheQueue();

print_r("Quantidade de pessoas = " . $queue->quantityOfPeople() . "\n");

$queue->removeOnInit();
$queue->removeOnInit();
$queue->showWhoIsInTheQueue();

print_r("Quantidade de pessoas = " . $queue->quantityOfPeople() . "\n");
?>