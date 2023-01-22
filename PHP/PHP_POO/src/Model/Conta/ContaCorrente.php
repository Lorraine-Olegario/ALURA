<?php

    namespace Alura\Banco\Model\Conta;

    use Alura\Banco\Model\Conta\Conta;

    class ContaCorrente extends Conta
    {
        protected function percentualTarifa(): float
        {
            return 0.05;
        }

        public function transfere(Conta $contaDestino, float $valorATransferir)
        {
            if ($valorATransferir > $this->saldo ) {
                echo "Saldo indisponivel";
                return;
            }
            $this->saca($valorATransferir);
            $contaDestino->deposita($valorATransferir);
        }
    }