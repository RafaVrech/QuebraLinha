<html>
	<head>
		
		<title>Exercício de quebra de linhas</title>
	</head>
	<body>
		
		<body>
		 <?php
			function quebraLinha($string,$limite){ 				//Recebe a string e o limite de caracteres por linha.
				$texto = explode(" ", $string); 				//Divide a string de texto palavra por palavra e armazena em uma array $texto.
				
				foreach($texto as $key => $value){				//Adiciona os espaços novamente, retirados pelo explode.
					$texto[$key] = $value." ";
				}
				
				$carLinha = 0; 									//Definindo a varíavel que vai carregar quantos caracteres existem na linha e a inicializa em 0.
				foreach($texto as $palavra){ 					//Percorre todas as palavras, armazenando em $palavra cada uma delas quando em seu respectivo ciclo.
				
					if($carLinha + mb_strlen($palavra,'utf-8')-1 < $limite){		//Se o tamanho da palavra (menos o espaço) somado aos caracteres ja impressos na linha estiverem dentro do limite:
						$carLinha += mb_strlen($palavra,'utf-8');				//Soma aos caracteres da linha o tamanho da palavra,
						print($palavra);						//Imprime a palavra e adiciona um expaço.
						
					}else if($carLinha + mb_strlen($palavra,'utf-8')-1 == $limite){		//Se o tamanho da palavra (menos o espaço) somado aos caracteres ja impressos na linha for igual ao limite:
						print($palavra."<br>");								//Imprime a palavra e quebra a linha.
						$carLinha = 0;										//Limpa o numero de caracteres da linha.
						
					}else if($carLinha + mb_strlen($palavra,'utf-8')-1 > $limite) {		//Se a soma dos caracteres ultrapassar o limite:
						if(mb_strlen($palavra,'utf-8')-1 > $limite){							
																				//Se a palavra for maior que o limite:
							$linhasOcupadas = floor((mb_strlen($palavra,'utf-8')-1) / $limite);//Calcula quantas linhas a palavra vai ocupar.
							
							for($i = 0; $i <= $linhasOcupadas; $i++){			//Percorre as linhas que a palavra vai ocupar.
							
								if($i == $linhasOcupadas && mb_strlen(substr($palavra, ($limite * $i) - $carLinha, $limite-1),'utf-8') > $limite - $carLinha){	
																				//Se chegar na ultima linha e o tamanho do restante da palavra ultrapassar o quanto ainda cabe na linha:
									print("<br>".substr($palavra, ($limite * $i), $limite));	//Quebra a linha e printa a parte correspondente da palavra de acordo com a linha.
									$carLinha = mb_strlen(substr($palavra, ($limite * $i) , $limite),'utf-8'); //Salva quantos caracteres foram adicionados na linha.
									
								}else if($i == $linhasOcupadas && mb_strlen(substr($palavra, ($limite * $i) - $carLinha, $limite-1),'utf-8') < $limite - $carLinha){
																				//Se chegar na ultima linha e o tamanho do restante da palavra ainda couber na linha:
									print(substr($palavra, ($limite * $i), $limite));	//Imprime a parte da palavra correspondente,
									$carLinha = mb_strlen(substr($palavra, ($limite * $i) - $carLinha, $limite),'utf-8'); //Salva quantos caracteres tem na linha.
									
								}else if($i == $linhasOcupadas && mb_strlen(substr($palavra, $limite - $carLinha, $limite-1),'utf-8') == $limite){
																				//Se chegar na ultima linha e o tamanho do restante da palavra for igual ao limite:
									print(substr($palavra, ($limite * $i), $limite-1)."<br>");	//Imprime a parte da palavra correspondente, quebra a linha
									$carLinha = 0; 												// e salva que a linha esta agora vazia.
								}else{							//Conforme o for percorre as linhas em que a palavra vai ser impressa:
									if($carLinha-1 != 0 || $carLinha-1 != -1){				//Se algo ja estiver escrito na mesma linha:
										print("<br>".substr($palavra, ($limite * $i) , $limite));	//Pressupondo que a parte da palavra em questão já é maior que o limite, quebra a linha e 
										$carLinha = mb_strlen(substr($palavra, ($limite * $i) , $limite),'utf-8');		//Salva a quantidade de caracteres da linha.
										
									}else{							//Se não tiver nada escrito na linha:
										print(substr($palavra, ($limite * $i) , $limite)."<br>");	//Imprime a parte da palavra,
										$carLinha = 0; 												//Salva que a linha está vazia.
									}
								}
							}
						
						}else{	//Se a soma dos caracteres ultrapassar o limite, mas a palavra é menor que o limite não devemos quebra-la.
							
							print("<br>".$palavra);		//Quebra a linha e imprime a palavra.
							$carLinha = mb_strlen($palavra,'utf-8');	//Salva os caracteres ocupados pela palavra.
						}
					}
				}
			}

			quebraLinha("você pode colar o código de inserção do vídeo que deseja adicionar. Você também pode digitar uma palavra-chave para pesquisar online o vídeo mais adequado ao seu documento. Para dar ao documento uma aparência profissional, o Word fornece designs de cabeçalho, rodapé, folha de rosto e caixa de texto que se complementam entre si. Por exemplo, você pode adicionar uma folha de rosto, um cabeçalho e uma barra lateral correspondentes. Clique em Inserir e escolha os elementos desejados nas diferentes galerias. Temas e estilos também ajudam a manter seu documento coordenado. Quando você clica em Design e escolhe um novo tema, as imagens, gráficos e elementos gráficos SmartArt são alterados para corresponder ao novo tema. Quando você aplica estilos, os títulos são alterados para coincidir com o novo tema. Economize tempo no Word com novos botões que são mostrados no local em que você precisa deles. Para alterar a maneira como uma imagem se ajusta ao seu documento, clique nela e um botão de opções de layout será exibido ao lado. Ao trabalhar em uma tabela, clique no local onde deseja adicionar uma linha ou uma coluna e clique no sinal de adição. A leitura também é mais fácil no novo modo de exibição de Leitura. Você pode recolher partes do documento e colocar o foco no texto desejado. Se for preciso interromper a leitura antes de chegar ao fim dela, o Word lembrará em que ponto você parou - até mesmo em outro dispositivo.",50);
		?>
		</body>
		
	</body>
</html>