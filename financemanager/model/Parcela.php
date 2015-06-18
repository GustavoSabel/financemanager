<?php
  class Parcela {
    private $idParcela;
    private $valor;
    private $dataPagamento;
    private $dataVencimento;
    private $pago;
    private $idTransacao;
    
    public static $TABELA               = "parcela";
    public static $CAMPO_IDPARCELA      = "idparcela";
    public static $CAMPO_VALOR          = "valor";
    public static $CAMPO_DATAPAGAMENTO  = "datapagamento";
    public static $CAMPO_DATAVENCIMENTO = "datavencimento";
    public static $CAMPO_PAGO           = "pago";
    public static $CAMPO_IDTRANSACAO    = "idtransacao";
    
    function __construct($idParcela, $valor, $dataPagamento, $dataVencimento, $pago, $idTransacao) {
      $this->idParcela      = $idParcela;
      $this->valor          = $valor;
      $this->dataPagamento  = $dataPagamento;
      $this->dataVencimento = $dataVencimento;
      $this->pago           = $pago;
      $this->idTransacao    = $idTransacao;
    }
    
    
    public function getIdParcela() {
      return $this->idParcela;
    }
    
    public function getValor() {
      return $this->valor;
    }
    
    public function getDataPagamento() {
      return $this->dataPagamento;
    }

    public function getDataVencimento() {
      return $this->dataVencimento;
    }

    public function getPago() {
      return $this->pago;
    }

    public function getIdTransacao() {
      return $this->idTransacao;
    }

    public function setIdParcela($idParcela) {
      $this->idParcela = $idParcela;
    }
    
    public function setValor($valor) {
      $this->valor = $valor;
    }
    
    public function setDataPagamento($dataPagamento) {
      $this->dataPagamento = $dataPagamento;
    }

    public function setDataVencimento($dataVencimento) {
      $this->dataVencimento = $dataVencimento;
    }

    public function setPago($pago) {
      $this->pago = $pago;
    }

    public function setIdTransacao($idTransacao) {
      $this->idTransacao = $idTransacao;
    }
    
    public function __tostring() {
      return "ID: ".$this->getIdParcela()."</br>".
             "Valor: ".$this->getValor()."</br>".
             "Data de pagamento: ".$this->getDataPagamento()."</br>".
             "Data de vencimento: ".$this->getDataVencimento()."</br>".
             "Pago? ".$this->getPago()."</br>".
             "Transação: ".$this->getIdTransacao();
    }
  }
?>