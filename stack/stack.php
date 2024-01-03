<?php 
/**
 * Classe que representa a estrutura de dados do tipo pilha
 * na qual o último item a entrar é o primeiro a sair, sob 
 * conceito de LIFO (last-int first-out). 
 */
class Stack {
  private array $stack;
  private int $size; 

  public function __construct(){
    $this->stack = [];
    $this->size = 0;
  }

  public function addOnInit(string $itemName): void{
    array_unshift($this->stack, $itemName);
    $this->size ++;
  }

  public function showItens(): void {
    foreach($this->stack as $item) {
      print_r("Nome do item = " . $item . "\n");
    }
  }

  public function quantityOfItems(): int {
    return $this->size;
  }

  public function removeOnInit(): void {
    array_shift($this->stack); 
    $this->size --;
  }
}

$stack = new Stack();

$stack->addOnInit("Livro");
$stack->addOnInit("Revista");
$stack->addOnInit("Palavras cruzadas");
$stack->addOnInit("Caça palavras");
$stack->showItens();

print_r("Quantidade de itens = " . $stack->quantityOfItems() . "\n");

$stack->removeOnInit();
$stack->removeOnInit();
$stack->showItens();

print_r("Quantidade de itens = " . $stack->quantityOfItems() . "\n");
?>