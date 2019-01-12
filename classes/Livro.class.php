<?php

	/**
	 * 
	 */
	class Livro{
		
		private $nome;
        private $isbn;
        private $arrayPalavras;
		private $arrayEditoras;
		private $arrayAutores;
		private $edicao;
		private $volume;
        private $idAreaConhecimento;

		/**
		 * Get the value of nome
		 */ 
		public function getNome()
		{
				return $this->nome;
		}

		/**
		 * Set the value of nome
		 *
		 * @return  self
		 */ 
		public function setNome($nome)
		{
				$this->nome = $nome;
		}

        /**
         * Get the value of isbn
         */ 
        public function getIsbn()
        {
                return $this->isbn;
        }

        /**s
         * Set the value of isbn
         *
         * @return  self
         */ 
        public function setIsbn($isbn)
        {
                $this->isbn = $isbn;

        }

        /**
         * Get the value of arrayPalavras
         */ 
        public function getArrayPalavras()
        {
                return $this->arrayPalavras;
        }

        /**
         * Set the value of arrayPalavras
         *
         * @return  self
         */ 
        public function setArrayPalavras($arrayPalavras)
        {
                $this->arrayPalavras = $arrayPalavras;

        }

		/**
		 * Get the value of arrayEditoras
		 */ 
		public function getArrayEditoras()
		{
				return $this->arrayEditoras;
		}

		/**
		 * Set the value of arrayEditoras
		 *
		 * @return  self
		 */ 
		public function setArrayEditoras($arrayEditoras)
		{
				$this->arrayEditoras = $arrayEditoras;

		}

        /**
         * Get the value of arrayAutores
         */ 
        public function getArrayAutores()
        {
                return $this->arrayAutores;
        }

        /**
         * Set the value of arrayAutores
         *
         * @return  self
         */ 
        public function setArrayAutores($arrayAutores)
        {
                $this->arrayAutores = $arrayAutores;

        }

        /**
         * Get the value of idAreaConhecimento
         */ 
        public function getIdAreaConhecimento()
        {
                return $this->idAreaConhecimento;
        }

        /**
         * Set the value of idAreaConhecimento
         *
         * @return  self
         */ 
        public function setIdAreaConhecimento($idAreaConhecimento)
        {
                $this->idAreaConhecimento = $idAreaConhecimento;

        }

		/**
		 * Get the value of edicao
		 */ 
		public function getEdicao()
		{
				return $this->edicao;
		}

		/**
		 * Set the value of edicao
		 *
		 * @return  self
		 */ 
		public function setEdicao($edicao)
		{
				$this->edicao = $edicao;
		}

		/**
		 * Get the value of volume
		 */ 
		public function getVolume()
		{
				return $this->volume;
		}

		/**
		 * Set the value of volume
		 *
		 * @return  self
		 */ 
		public function setVolume($volume)
		{
				$this->volume = $volume;
		}
    }
?>