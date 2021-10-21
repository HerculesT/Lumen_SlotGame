<?php

namespace App\Models;

class SlotBoard
{

    protected $columns = 5;
    protected $rows = 3;
    private $paylines; 

    /**Board symbols, better retrieved from DB */
    const symbols = ['9', '10', 'J', 'Q', 'K', 'A', 'cat', 'dog', 'monkey', 'bird'];

    protected function getBoardLength(): int
    {
        return $this->rows * $this->columns;
    }

    /* Generate board randomly */
    protected function getSymbol(): array
    {
        $slotBoard = [];
        $shuffleArr = static::symbols;

        for ($i = 0; $i < $this->getBoardLength(); $i++) {
            array_push($slotBoard, $shuffleArr[rand(0,9)]);
        }
        return $slotBoard;
    }

    /*build through slotCommand Hanlder*/
    public function buildBoard(): array
    {
        return $this->getSymbol();
    }
}