<?php

    namespace Alura\Banco\Model\Conta;

    abstract class Conta 
    {
        
        private $titular;
        protected $saldo = 0;
        private static $numeroDeContas = 0;

        public function __construct(Titular $titular)
        {
            $this->titular = $titular;         
            $this->saldo = 0;

            self::$numeroDeContas++;
        }

        public function __destruct()
        {
            if (self::$numeroDeContas > 2) {
                echo "Há mais de uma conta ativa";
            }
        }

        public function saca(float $valorASacar)
        {
            $tarifaSaque = $valorASacar * $this->percentualTarifa();
            $valorSaque = $valorASacar + $tarifaSaque;
            if ($valorSaque > $this->saldo) {
                echo "Saldo indisponível";
                return;
            }
    
            $this->saldo -= $valorSaque;
    
        }

        public function deposita(float $valorADepositar)
        {            
            if ($valorADepositar < 0 ) {
                echo "Valor precisa ser positivo";
                return;
            }
            $this->saldo += $valorADepositar;
        }

        public function recuperaSaldo(): float
        {
            return $this->saldo;
        }

        public function recuperaCpfTitular(): string
        {
            return $this->titular->recuperaCpf();
        }

        public function recuperaNomeTitular(): string
        {
            return $this->titular->recuperaNome();
        }

        public static function recuperaNumeroDeContas(): int
        {
            return self::$numeroDeContas;
        }

        abstract protected function percentualTarifa(): float;

    }