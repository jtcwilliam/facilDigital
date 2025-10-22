<?php



class Servicos
{



    private $conexao;
    private $dns;
    private $user;
    private $pwd;
    private $pdoConn;

    private $infoAtendente; //
    private $servicoHabilitado; //
    private $idCartaServico; //
    private $textoServicos; //
    private $categoria; //
    private $statusServico; //
    private $versaoCartaServico;

    function __construct()
    {
        include_once 'conecaoPDO.php';
        //criar uma instancia de conexao;
        $objConectar = new Conexao();

        //chamar o metdo conectar
        $objbanco = $objConectar->ConectarPDO();

        $this->setPdoConn($objbanco);
    }

    public function  servicosHabilitados($filtro = null)
    {
        try {


            $pdo = $this->getPdoConn();



            $sql = "select  * from linkCartaServico ";




            $stmt = $pdo->prepare($sql);


            $stmt->execute();

            //$user = $stmt->fetchAll();



            $retorno = array();

            $dados = array();

            $row = $stmt->fetchAll();

            foreach ($row as $key => $value) {
                $dados[] = $value;
            }


            if (!isset($dados)) {
                $retorno['condicao'] = false;
            }




            return $dados;
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }
    public function  trazerServicos($filtro = null)
    {
        try {


            $pdo = $this->getPdoConn();



            $sql = "select * from cartaServico where idLinkCarta = ".$filtro." ";

   

        

            $stmt = $pdo->prepare($sql);


            $stmt->execute();

            //$user = $stmt->fetchAll();



            $retorno = array();

            $dados = array();

            $row = $stmt->fetchAll();

            foreach ($row as $key => $value) {
                $dados[] = $value;
            }


            if (!isset($dados)) {
                $retorno['condicao'] = false;
            }




            return $dados;
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }

    public function  habilitarServicos()
    {
        try {

            $pdo = $this->getPdoConn();


            $idLinkCarta = $this->getIdCartaServico();
            $categoria = $this->getCategoria();
            $servicoHabilitado = $this->getServicoHabilitado();
            $infoAtendente = $this->getInfoAtendente();
            $statusServico = $this->getStatusServico();
            $textoCartaServico = $this->getTextoServicos();
            $versaoCartaServico = $this->getVersaoCartaServico();





            /*  $stmt = $pdo->prepare(" UPDATE `linkCartaServico` SET `servicoHabilitado` = ?,   
                `infoAtendente` = ? ,   `categoria` = ?,   textoCartaServico=?
           WHERE `idlinkCartaServico` = ?");*/



            $stmt = $pdo->prepare("
            INSERT INTO cartaServico(idLinkCarta, categoria,servicoHabilitado,infoAtendente,
            statusServico,textoCartaServico,versaoCartaServico) VALUES (?,?,?,?,?,?,?)");




            $stmt->bindValue(1, $idLinkCarta, PDO::PARAM_INT);
            $stmt->bindValue(2, $categoria, PDO::PARAM_INT);
            $stmt->bindValue(3, $servicoHabilitado, PDO::PARAM_INT);
            $stmt->bindValue(4, $infoAtendente, PDO::PARAM_STR);
            $stmt->bindValue(5, $statusServico, PDO::PARAM_INT);
            $stmt->bindValue(6, $textoCartaServico, PDO::PARAM_STR);
            $stmt->bindValue(7, $versaoCartaServico, PDO::PARAM_STR);

 





            if ($stmt->execute()) {

                return true;
            }
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }


      public function  desabilitarServico()
    {
        try {

            $pdo = $this->getPdoConn();

            $idLinkCarta = $this->getIdCartaServico();
            
            $stmt = $pdo->prepare("update cartaServico set statusServico = 0 where idLinkCarta = ?");
 
            $stmt->bindValue(1, $idLinkCarta, PDO::PARAM_INT);
           
            if ($stmt->execute()) {
                return true;
            }
        } catch (PDOException $e) {
            echo 'Error: ' . $e->getMessage();
        }
    }




    function getConexao()
    {
        return $this->conexao;
    }



    function setConexao($conexao)
    {
        $this->conexao = $conexao;
    }







    /**
     * Get the value of dns
     */
    public function getDns()
    {
        return $this->dns;
    }

    /**
     * Set the value of dns
     *
     * @return  self
     */
    public function setDns($dns)
    {
        $this->dns = $dns;

        return $this;
    }

    /**
     * Get the value of user
     */
    public function getUser()
    {
        return $this->user;
    }

    /**
     * Set the value of user
     *
     * @return  self
     */
    public function setUser($user)
    {
        $this->user = $user;

        return $this;
    }

    /**
     * Get the value of pwd
     */
    public function getPwd()
    {
        return $this->pwd;
    }

    /**
     * Set the value of pwd
     *
     * @return  self
     */
    public function setPwd($pwd)
    {
        $this->pwd = $pwd;

        return $this;
    }



    /**
     * Get the value of pdoConn
     */
    public function getPdoConn()
    {
        return $this->pdoConn;
    }

    /**
     * Set the value of pdoConn
     *
     * @return  self
     */
    public function setPdoConn($pdoConn)
    {
        $this->pdoConn = $pdoConn;

        return $this;
    }

    /**
     * Get the value of infoAtendente
     */
    public function getInfoAtendente()
    {
        return $this->infoAtendente;
    }

    /**
     * Set the value of infoAtendente
     *
     * @return  self
     */
    public function setInfoAtendente($infoAtendente)
    {
        $this->infoAtendente = $infoAtendente;

        return $this;
    }

    /**
     * Get the value of servicoHabilitado
     */
    public function getServicoHabilitado()
    {
        return $this->servicoHabilitado;
    }

    /**
     * Set the value of servicoHabilitado
     *
     * @return  self
     */
    public function setServicoHabilitado($servicoHabilitado)
    {
        $this->servicoHabilitado = $servicoHabilitado;

        return $this;
    }

    /**
     * Get the value of idCartaServico
     */
    public function getIdCartaServico()
    {
        return $this->idCartaServico;
    }

    /**
     * Set the value of idCartaServico
     *
     * @return  self
     */
    public function setIdCartaServico($idCartaServico)
    {
        $this->idCartaServico = $idCartaServico;

        return $this;
    }

    /**
     * Get the value of categoria
     */
    public function getCategoria()
    {
        return $this->categoria;
    }

    /**
     * Set the value of categoria
     *
     * @return  self
     */
    public function setCategoria($categoria)
    {
        $this->categoria = $categoria;

        return $this;
    }

    /**
     * Get the value of textoServicos
     */
    public function getTextoServicos()
    {
        return $this->textoServicos;
    }

    /**
     * Set the value of textoServicos
     *
     * @return  self
     */
    public function setTextoServicos($textoServicos)
    {
        $this->textoServicos = $textoServicos;

        return $this;
    }

    /**
     * Get the value of statusServico
     */
    public function getStatusServico()
    {
        return $this->statusServico;
    }

    /**
     * Set the value of statusServico
     *
     * @return  self
     */
    public function setStatusServico($statusServico)
    {
        $this->statusServico = $statusServico;

        return $this;
    }

    /**
     * Get the value of versaoCartaServico
     */
    public function getVersaoCartaServico()
    {
        return $this->versaoCartaServico;
    }

    /**
     * Set the value of versaoCartaServico
     *
     * @return  self
     */
    public function setVersaoCartaServico($versaoCartaServico)
    {
        $this->versaoCartaServico = $versaoCartaServico;

        return $this;
    }
}
