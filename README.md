
File Structure:

```
src
└── app
   ├── Board.php
   ├── Game.php
   └── Console
       ├── Commands
           └── SlotCommand.php
```

How to Use:

```
git clone https://github.com/HerculesT/Lumen_SlotGame.git
```
```
cd Lumen_slotGame_Master
```
Run Command:
```
php artisan slot:spin
```

should get an array like: 

```
{
    "slotBoard": [
        "K",
        "K",
        "K",
        "9",
        "bird",
        "J",
        "K",
        "9",
        "cat",
        "A",
        "cat",
        "dog",
        "9",
        "A",
        "9"
    ],
    "paylines": [],
    "bet_amount": 100,
    "total_win": 0
}
```
