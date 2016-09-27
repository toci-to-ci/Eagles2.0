<?php

/*
 * mamy encje które sa złożone,
 * user: lisata banków do kt user nalezy
 * UserBanks ..jakies dodatkowe pola
 *
 * w ten spos Uzupełniamy fragmenty encji
 */

    class User implements IRefTypeStrategy  //parametr kt bedziemy wstrzykiwac w Chain of Responiibility
    {
        public $name;
        public $age;
        public $sex;

        public $banks;

            public function __construct()
            {
                $this->banks = array(
                UserBanks::MBANK => new UserBanks(),
                UserBanks::ING => new UserBanks(),
                UserBanks::XYZ => new UserBanks(),
                );

            }


    }


    class UserBanks implements  IRefTypeStrategy
    {
        const MBANK = 'MBank';
        const ING = 'ING';
        const XYZ = 'STARABank';

        public $userName;
        public $moneyAmount;
        public $accountNumber;
    }

