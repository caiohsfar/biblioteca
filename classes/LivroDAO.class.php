<?php
    require_once('Database.class.php');
    require_once('Livro.class.php');


    class LivroDAO{
        function inserirLivro($livro){
            $db = new Db();
            $link = $db->conecta_mysql();

            $query = "INSERT INTO titulo_livro (isbn, nome, edicao, volume, id_area) 
            VALUES ('".$livro->getIsbn()."','".$livro->getNome()."', '".$livro->getEdicao()."','".$livro->getVolume()."','".$livro->getIdAreaConhecimento()."' )";


            if (mysqli_query($link,$query)){
                return true;
                
			}
			else{
			    return false;
			}

        }

        function inserirPulicacao($livro){
            $db = new Db();
            $link = $db->conecta_mysql();

            $editoras = $livro->getArrayEditoras();
            //$query = "INSERT INTO publicacao(isbn_livro,id_editora) values (".$livro->getIsbn().", ".$id_editora.");";

            foreach ($editoras as $i => $id_editora) {
                $query = "INSERT INTO publicacao (isbn_livro,id_editora) values ('".$livro->getIsbn()."', '".$id_editora."');";
                if(!mysqli_query($link,$query, MYSQLI_ASSOC)){
                    return false;
                }

            }
            return true;


        }

        function inserirEscritura($livro){
            $db = new Db();
            $link = $db->conecta_mysql();

            $autores = $livro->getArrayAutores();
            //$query = "INSERT INTO escrito(isbn_livro,id_autor) values (".$livro->getIsbn().", ".$id_autor.");";
            
            foreach ($autores as $i => $id_autor) {
                $query = "INSERT INTO escrito (isbn_livro,id_autor) values ('".$livro->getIsbn()."', '".$id_autor."');";
                if(!mysqli_query($link,$query, MYSQLI_ASSOC)){
                    return false;
                }

            }
            return true;
        }

        function inserirAssociacaoPalavra($livro){
            $db = new Db();
            $link = $db->conecta_mysql();

            $palavras = $livro->getArrayPalavras();
            
            foreach ($palavras as $i => $id_palavra) {
                $query = "INSERT INTO livro_palavra (isbn_livro,id_palavra) values ('".$livro->getIsbn()."', '".$id_palavra."');";
                if(!mysqli_query($link,$query, MYSQLI_ASSOC)){
                    return false;
                }
            }
            return true;
        }

        function existeLivro($isbn){
            $db = new Db();
            $link = $db->conecta_mysql();

			$sql = "SELECT isbn FROM titulo_livro WHERE isbn = '$isbn'";
			$resultado_busca = mysqli_query($link,$sql);

			if($resultado_busca){
				$dados_livro = mysqli_fetch_array($resultado_busca,MYSQLI_ASSOC);
				if($dados_livro['isbn']!=""){
					return true;
				}
				return false;
				

			}	
		}




        
    }

?>