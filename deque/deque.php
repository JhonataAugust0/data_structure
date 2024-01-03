<?php 
/**
 * Classe que representa a estrutura de dados do tipo fila
 * duplamente terminada (DEQUE), na qual é possível inserir 
 * e remover tanto no início quanto no fim. 
 */
class Deque {
  private array $deque;
  private int $size; 

  public function __construct(){
    $this->deque = [];
    $this->size = 0;
  }

  public function addOnInit(string $itemName): void{
    array_unshift($this->deque, $itemName);
    $this->size ++;
  }

  public function addAtTheEnd(string $name): void {
    $this->deque[] = $name;
    $this->size ++;
  }

  public function removeOnInit(): void {
    array_shift($this->deque); 
    $this->size --;
  }

  public function removeOnFinal(): void {
    array_pop($this->deque); 
    $this->size --;
  }

  public function showItens(): void {
    foreach($this->deque as $item) {
      print_r("Nome do item = " . $item . "\n");
    }
  }
}

$deque = new Deque();

$deque->addOnInit("Piracicaba");
$deque->addOnInit("Nova Iguaçu");
$deque->addOnInit("Diadema");
$deque->showItens();

$deque->removeOnInit();
$deque->removeOnFinal();

$deque->showItens();
?>