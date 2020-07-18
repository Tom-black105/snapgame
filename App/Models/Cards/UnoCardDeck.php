<?php
/**
 * Created by PhpStorm.
 * User: tblai
 * Date: 18/07/2020
 * Time: 14:25
 */

namespace App\Models\Cards;


abstract class UnoCardDeck extends BaseCardDeck
{
    public $cards = [
        [
            'number' => 'One',
            'suite' => 'Green'
        ],
        [
            'number' => 'Two',
            'suite' => 'Green'
        ],
        [
            'number' => 'Three',
            'suite' => 'Green'
        ],
        [
            'number' => 'Four',
            'suite' => 'Green'
        ],
       // ...  etc...
    ];

    public function cardAbility($dealtCard)
    {
        switch ($dealtCard) {

        }
        // return ...
    }
}