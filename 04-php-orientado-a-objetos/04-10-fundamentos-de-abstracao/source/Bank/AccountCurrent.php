<?php

namespace Source\Bank;

use Source\App\Trigger;
use Source\App\User;

class AccountCurrent extends Account
{
    private $limit;
    public function __construct($branch, $account, User $client, $balance, $limit)
    {
        parent::__construct($branch, $account, $client, $balance);
        $this->limit = $limit;
    }

    final public function deposit($value)
    {
        $this->balance += $value;
        Trigger::show("Depósito de R$ {$this->toBrl($value)} realizado com sucesso", Trigger::ACCEPT);
    }

    final public function withdrawal($value)
    {
        if ($value <= $this->balance + $this->limit){
            $this->balance -= abs($value);
            Trigger::show("Saque de R$ {$this->toBrl($value)} efetuado com sucesso", Trigger::ERROR);
            if ($this->balance < 0) {
                $tax = abs($this->balance) * 0.006;
                $this->balance -= $tax;
                Trigger::show("Tax de uso de limite: {$this->toBrl($tax)}", Trigger::WARNING);
            }
        }else{
            $saving = $this->balance + $this->limit;
            Trigger::show("Saldo insuficiente, você tem R$ {$this->toBrl($value)} disponível para saque.!", Trigger::WARNING);
        }
    }

}