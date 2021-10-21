<?php 
namespace App\Console\Commands;
use Illuminate\Console\Command;
use Symfony\Component\Console\Input\InputOption;
use App\Models\SlotBoard;
use App\Models\SlotMachine;

class SlotCommand extends Command {

    /**Slot execution Command */
    protected $name = 'slot:spin';
    
    /**Slot handlers */
    public function handle()
    {
        $slotBoard = new SlotBoard();
        $this->info(new SlotMachine($slotBoard->buildBoard(), 100));
    }
}