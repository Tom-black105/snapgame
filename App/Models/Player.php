<?php
/**
 * Created by PhpStorm.
 * User: tblai
 * Date: 18/07/2020
 * Time: 14:52
 */

namespace App\Models;

class Player
{
    public $name;
    public $hand = [];

    /**
     * Player constructor.
     * @param string $name
     */
    public function __construct($name)
    {
        $this->name = $name;
    }

    public function acceptCard(array $card) {
        array_push($this->hand, $card);
    }

    public function resetHand() {
        $this->hand = [];
    }
}