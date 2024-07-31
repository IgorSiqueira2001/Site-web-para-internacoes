<?php
    namespace Modelo;

    use \Banco\Database;
    use \PDO;

    class Internacao{
        public $codigo;
        public $data;
        public $hora;
        public $motivo;
        public $qtdeDiarias;
        public $valorQuarto;
        public $nomePaciente;
        public $totalGasto;

        public function cadastrar(){
            $objDatabase = new Database('internacao');
            $codigo = $objDatabase->insert([
                'codigo' => $this->codigo,
                'data' => $this->data,
                'hora' => $this->hora,
                'motivo' => $this->motivo,
                'qtdeDiarias' => $this->qtdeDiarias,
                'valorQuarto' => $this->valorQuarto,
                'nomePaciente' => $this->nomePaciente,
                'totalGasto' => $this->totalGasto(),
            ]);
        }

        public function alterar(){
            return(new Database('internacao'))->update('codigo=' . $this->codigo, [
                'codigo' => $this->codigo,
                'data' => $this->data,
                'hora' => $this->hora,
                'motivo' => $this->motivo,
                'qtdeDiarias' => $this->qtdeDiarias,
                'valorQuarto' => $this->valorQuarto,
                'nomePaciente' => $this->nomePaciente,
                'totalGasto' => $this->totalGasto(),
            ]);
        }

        public function excluir(){
            return (new Database('internacao'))->delete('codigo=' . $this->codigo);
        }

        public function listar($where=null, $order=null, $limit=null){
            return(new Database('internacao'))->select($where, $order, $limit)
            ->fetchALL(PDO::FETCH_CLASS, self::class);
        }

        public static function getInternacaoCodigo($id){

            return (new Database('internacao'))->select('codigo=' . $id)
                ->fetchObject(self::class);
        }

        public function listagem(){
            return (new Database('internacao'))->select()
            ->fetchObject(self::class);
        }

        public function totalGasto(){
            $qtdDiarias = $this->qtdeDiarias;
            $valorQ = $this->valorQuarto;
            $valorTotal = $qtdDiarias * (float)$valorQ;
            return $valorTotal; 
        }

    }
?>
