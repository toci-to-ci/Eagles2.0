<?php


//handler usera
    class UserHandler implements IHandler
    {
        public function Handle(IRefTypeStrategy &$strategy) //metoda handle kt uzupełnia Usera
        {
            //Typu User
            $strategy->name = 'Piotrek';
            $strategy->age = '32';
            $strategy->sex = 'male';
        }

    }

//handler banku
    class BanksHandler implements IHandler
    {
        public function Handle(IRefTypeStrategy &$strategy) //metoda handle kt dodaje parametry konta bankowego do tej encji
        {
            $strategy->banks[UserBanks::MBANK]->  userName = 'Piotrek potrawiak z BankHandler';
            $strategy->banks[UserBanks::MBANK] -> moneyAmount = '666';
            $strategy->banks[UserBanks::MBANK] -> accountNumber = '10114098758934758947';

            $strategy->banks[UserBanks::XYZ]->  userName = 'Wdowa po piotrek';
            $strategy->banks[UserBanks::XYZ] -> moneyAmount = '999';
            $strategy->banks[UserBanks::XYZ] -> accountNumber = '1221114098758934758947';

            $strategy = null; //nic sie nie stanie bo strategia jest przekazana jako typ referencyjny przez WARTOŚC, gdyby byla przez referencje &$strategy, by sie wyzerowało

            //operacja na całym obiekcie jest niewidoczna, jeżeli typ jest przekazywany jako referencyjny przez WARTOŚC, w tym momencie całego typu nie mozna zlikwidować, można operowac tylko na jego wnętrzu
        }

    }

    abstract class ChorHandler implements IChorHandler
    {
        protected $handlers = array();
        protected $strategy;



        public function __construct($handlersArray, $strategy) //przez konstruktor wczytujemy liste handlerow kt maja bbyc uruchamiane
        {
            $this->handlers = $handlersArray;
            $this->strategy = $strategy;  //stratergia czyli nasz user zostanie przez konstruktor wstrzykniety do naszego handlera,
            //i zostanie tymi handlerami potraktowana, i te Handlery uzupełnia nam w swojej logice te fragmenty:
            //     class BanksHandler implements IHandler
        }

        public function Run()
        {
            foreach ($this->handlers as $handler)
            {
                $handler->Handle($this->strategy); //ponieważ tu musi być parametr należy dodac jego obsługe
            }

            return $this ->strategy;

        }

    }

    //dzieki abstr class bazoej ChorHandler, UserChorhandler wystarczy ze wywoła konstruktor bazowy
    class UserChorHandler extends ChorHandler
    {
//        public function Run()
//        {
//            $user = new User(); //tworzy nowego usera i przymieża go do dwóch powyższych handlerów
//        }



//ta logika powoduje ze handlery user i banks - zostanba uruchomione w metodzie handle funkcji metody Run
    public function __construct()
    {
        $user = new User(); //tworzy nowego usera i przymieża go do dwóch powyższych handlerów
        $handlers = array (
            new UserHandler(),
            new BanksHandler(),
        );

        // parent::__construct($handlersArray, $strategy); //pochodzi z met Run z klasy bazowej
        parent::__construct($handlers, $user); //pochodzi z met Run z klasy bazowej
    }


    }