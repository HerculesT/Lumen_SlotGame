<?php

namespace App\Models;

class SlotMachine
{
    /*amount user is betting*/
    private $bet_amount;


    protected $PayRules = [
        3 => 0.2,   /* 3 symbols returns: 20% of the bet.*/
        4 => 20,    /* 4 symbols returns: 200% of the bet.*/
        5 => 10     /* 5 symbols returns: 1000% of the bet.*/
    ];

    const paylines = [
        [0, 3, 6, 9, 12],
        [1, 4, 7, 10, 13],
        [2, 5, 8, 11, 14],
        [0, 4, 8, 10, 12],
        [2, 4, 6, 10, 14]
    ];
    
    /*declare Board*/
    private $slotBoard;

    public function __construct($slotBoard, $bet_amount)
    {
        $this->slotBoard = $slotBoard;
        (string)$this->paylineInfo();
		$this->bet_amount = $bet_amount;
    }

    /**retrieve the amount a user bets from handler */
	public function getBetAmount()
	{
		return $this->bet_amount;
	}

    protected $totalWinAmount = 0;
    protected $payline = [];

    /**Count and  validate if current board wins*/
    protected function paylineInfo()
    {
        foreach (static::paylines as $payline) {
            $matchedSymbol = [];
            $counter = 0;
            foreach ($payline as $index) {
                $symbol = $this->slotBoard [$index];
                $length = sizeof($matchedSymbol);
                if ($length > 0 && $symbol !== $matchedSymbol[$length - 1]) {
                    break;
                }
                $counter++;
                $matchedSymbol[] = $symbol;
            }
            if (in_array($counter, array_keys($this->PayRules))) {
                
                $this->totalWinAmount += (100 * $this->PayRules[$counter]);
                $this->payline[] = [implode(', ', $payline) => $counter];
               
            }
        }
        
    }
    
    public function getBoard(){
        return $this->slotBoard;
    }

    public function getTotalWin(){
        return $this->totalWinAmount;
    }

    public function getPayout(){
        return $this->payline;
    }
    
    public function __toString()
    {
        $output = [
            'slotBoard' => $this->getBoard(),
            'paylines' => $this->getPayout(),
            'bet_amount' => $this->getBetAmount(),
            'total_win' => $this->getTotalWin()
        ];
        return json_encode($output, JSON_PRETTY_PRINT);
    }
}