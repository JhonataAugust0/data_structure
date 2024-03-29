<?php 
  class Knot {
    private string $name;
    private ?self $next;

    public function __construct(string $name) {
      $this->name = $name;
      $this->next = null;
    }

    public function getName(): string {
      return $this->name;
    }

    public function setName(string $name): void {
      $this->name = $name;
    }

    public function getNext(): ?self {
      return $this->next;
    }

    public function setNext( ?self $next): void {
      $this->next = $next;
    }
  }
?>