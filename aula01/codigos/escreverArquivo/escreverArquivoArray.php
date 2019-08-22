<?php

	function escreverArquivoArray($arr) {
//abre o arquivo e permite a leitura
		$fp = fopen('pessoas.txt', 'a+');

  //verifica se arquivo existe
		if ($fp) {
      //vai verificar os indices do vetor
			foreach($arr as $cpf => $dados) {
				if(!empty($dados)) {
					$linha = $cpf." - ".$dados['nome']." - ".$dados['endereco']." - ".$dados['telefone'];
					//escreve no arquivo efaz uma quebra de linha
          fputs($fp, "$linha\n");
				}
			}
//fecha depois de percorrer
			fclose($fp);
		}
//mostra essa mensagem de ok
		echo "[OK] Dados escritos com Sucesso!";
	}
?>
