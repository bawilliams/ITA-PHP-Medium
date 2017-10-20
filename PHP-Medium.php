<?php
/*MEDIUM:
Let’s bring in the deck code from the past example (your normal challenge).
Create a function that will create a deck of cards, randomize it and then return the deck.
We will now create a function to deal these cards to each user. Modify this function so that 
it returns the number of cards specified for the user. Also, it must modify the deck so that 
those cards are no longer available to be distributed.*/

class Deck {
  private $suits = array ("clubs", "diamonds", "hearts", "spades"); 
  private $faces = array ("ace", "two", "three", "four", "five", "six", "seven", "eight", "nine", "ten", "jack", "queen", "king");

  private $deck = array();
  private $dealtCards = array();

  // When a new Deck is created, immediately build the deck of cards and shuffle it
  public function __construct() {
    $this->createDeck();
    $this->shuffleDeck();
  }

  // Loops through the suits and faces arrays to create a card deck by filling the deck array with card objects
  public function createDeck() {
    foreach ($this->faces as $face) {
      foreach ($this->suits as $suit) {
        $this->deck[] = new Card($face, $suit);
      }    
    }
  }

  public function shuffleDeck() {
    shuffle($this->deck);
  }

  // Deals the number of cards specified by the user, adding the cards to dealtCards and removing from the remaining deck
  public function dealCards($number) {
    for ($i = 0; $i < $number; $i++) {
      $this->dealtCards[] = $this->deck[$i];
      unset($this->deck[$i]);
    }
  }

  public function getDeck() {
    return $this->deck;
  }

  public function getDealtCards() {
    return $this->dealtCards;    
  }
}

class Card {
  private $value;
  private $suit;
  private $face;
  private $name;

  // Immediately after creating a new Card class, set all four values based on inputed values
  public function __construct($face, $suit) {
    $this->face = $face;
    $this->suit = $suit;
    $this->name = $face . ' of ' . $suit;

    switch($face) {
      case 'ace':
        $this->value = 11;
        break;
      case 'two':
        $this->value = 2;
        break;
      case 'three':
        $this->value = 3;
        break;
      case 'four':
        $this->value = 4;
        break;
      case 'five':
        $this->value = 5;
        break;
      case 'six':
        $this->value = 6;
        break;
      case 'seven':
        $this->value = 7;
        break;
      case 'eight':
        $this->value = 8;
        break;
      case 'nine':
        $this->value = 9;
        break;
      case 'ten':
        $this->value = 10;
        break;
      case 'jack':
        $this->value = 10;
        break;
      case 'queen':
        $this->value = 10;
        break;
      case 'king':
        $this->value = 10;
        break;
    }
  }
}

$deck1 = new Deck();
$deckprint = $deck1->getDeck();

$deckprint = $deck1->dealCards(7);
$deckprint = $deck1->getDealtCards();
var_dump($deckprint);
echo "\n<br />\n<br />";

// Show that the dealt cards have been removed from the deck
$deckprint = $deck1->getDeck();
var_dump($deckprint);

?>