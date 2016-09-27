<?php
    interface IHandler //handlery (beda uzupełniac poszczeg  elementy Encji dla CHain Of Responsibility
    {
        public function Handle(IRefTypeStrategy &$strategy);
    }

    interface IRefTypeStrategy
    {

    }

    interface IChorHandler   //logika zbiera zbiór handlerów
    {
        public function Run();
    }
