<h1>Projeto interdisciplinar</h1><br/>
<h2>Arquivos</h2><br/>
	<!--<br/>
		falta documentar <br/>
			classe coordenador<br/>
			páginas de login front e back end<br/>
			verificação de usuário logado <br/>
			sql<br/>
	--><br/>
	<h3>classes/Coordenador.php</h3><br/>
	<h3>cadastro_coord.php</h3><br/>
		inicia a sessão<br/>
		verifica se o cadastro inserido é existente em caso da variável de sessão Cadastro_existe existir<br/>
		destrói a variável de sessão Cadastro_existe <br/>
		exibe um formulário que envia para cadastroCoordenador.php que recebe:<br/>
			nome do coordenador<br/>
			data de nascimento<br/>
			email<br/>
			senha<br/>
			botão de enviar<br/>
	<h3>cadastroCoordenador.php</h3><br/>
		inicia a sessão <br/>
		requisita os arquivos coordenador.php, conexao.php<br/>
		verifica se recebeu todos os dados do formulário de cadastro do coordenador, <br/>
			caso algum dado esteja faltando, envia o usuário de volta a cadastro_coord.php<br/>
		inicializa as variáveis do cadastro com os valores recebidos pelo formulário<br/>
		instancia  a classe de coordenador<br/>
		realiza o cadastro do coordenador usando o método de cadastro da classe coordenador<br/>
		em caso do cadastro ser bem sucedido<br/>
			envia o usuário para a página index.php<br/>
		em caso de o cadastro ser mal sucedido<br/>
			cria-se a variável de sessão Cadastro_existe e é atribuído o valor true<br/>
			o usuário é enviado novamente a página de cadastro<br/>
	<h3>conexao.php</h3><br/>
		define as constantes de conexão ao banco de dados <br/>
		realiza a conexão pelo método mysqli_connect<br/>
	<h3>editar_cadastro_coordenador.php</h3><br/>
		requisita os arquivos coordenador.php, conexao.php, verifica_login.php<br/>
		visualiza o cadastro do coordenador que está logado informando o id dele e a conexão com o banco de dados<br/>
		salva os dados do perfil em um array<br/>
		requisita o arquivo links.php<br/>
		exibe um formulário em forma de tabela, com campos de nome e data de nascimento<br/>
		os valores padrões são aqueles informados no cadastro do usuário<br/>
		os novos valores são inseridos e enviados para a página editarCoordenador.php<br/>
	<h3>editarCoordenador.php</h3><br/>
		inicia se a sessão<br/>
		requisita os arquivos coordenador.php, conexao.php<br/>
		verifica se recebeu todos os dados do formulário de edição do coordenador, <br/>
			caso algum dado esteja faltando, envia o usuário de volta a editar_cadastro_coordenador.php<br/>
		inicializa as variáveis da edição com os valores recebidos pelo formulário<br/>
		instancia a classe coordenador<br/>
		edita o cadastro<br/>
			em caso bem sucedido envia o usuario para index<br/>
			em caso mal sucedido, envia o usuario de volta a página de edição do coordenador e informa um erro<br/>
	<h3>index.php</h3><br/>
		página inicial<br/>
		inicia uma sessão<br/>
		requisita o arquivo links.php<br/>
		executa um var dump na super global session<br/>
	<h3>links.php</h3><br/>
		os links de todas as páginas no site em formato html para ser apenas requerido pelas outras páginas quando necessário<br/>
	<h3>login_coord.php</h3><br/>
		inicia a sessão<br/>
		verifica se a variável de sessão 'nao_autenticado' já existe <br/>
			em, caso positivo, emite uma mensagem de erro<br/>
		exclui a variável de sessão 'nao_autenticado'<br/>
		exibe um formulário ao usuario que pede o email e senha do coordenador, e envia para loginCoordenador.php<br/>
	<h3>loginCoordenador.php</h3><br/>
		inicia sessão<br/>
		requisita os arquivos Coordenador.php, conexao.php<br/>
		verifica se recebeu todos os dados do formulário de login do coordenador, <br/>
			caso algum dado esteja faltando, envia o usuário de volta a login_coord.php<br/>
		inicializa as variáveis de login com os valores recebidos pelo formulário<br/>
		instancia a classe coordenador<br/>
		realiza o login<br/>
		verifica o resultado do login<br/>
			em caso positivo<br/>
				o id do coordenador é salvo numa variável de sessão<br/>
				o valor true é informado para variável 'logado'<br/>
				o usuário é enviado de volta a index<br/>
			em caso negativo<br/>
				a variável de sessão 'nao_autenticado' recebe o valor true<br/>
				o usuario é enviado de volta a página login_coord.php<br/>
	<h3>logout.php</h3><br/>
		inicia a sessão<br/>
		destrói todas as sessões<br/>
		manda o usuário de volta para index.php<br/>
	<h3>perfil.php</h3><br/>
		requisita os arquivos coordenador.php, conexao.php e verifica_login.php<br/>
		instancia a  classe coordenador<br/>
		visualiza e salva na variável 'dados_perfil' o cadastro do coordenador informando a conexão com o banco e a ID do coordenador<br/>
		requisita o arquivo links.php<br/>
		cria uma tabela que contém a seguinte iteração<br/>
		itera sobre o array 'dados_perfil' salvando os nomes e valor do campo em variáveis durante o loop, para serem exibidas posteriormente<br/>
			dentro da iteração verifica se o campo atual é 'fk_tipo_usuario'<br/>
				caso positivo: <br/>
					executa uma query sql que retorna o nome tipo de usuário correspondente ao id da fk_tipo_usuario<br/>
					exibe 'tipo de usuário' e nome do tipo de usuário<br/>
				caso negativo:<br/>
				exibe o nome e valor do campo atual<br/>
	<h3>sql.sql</h3><br/>
		é criado o banco de dados enadinho<br/>
		é criada a tabela de tipos de usuário<br/>
		é criada a tabela de coordenadores<br/>
		é criada a tabela de professores<br/>
		é criada a tabela de alunos<br/>
		é criada a tabela de cursos<br/>
		é criada a tabela de disciplinas<br/>
		é criada a tabela de enunciados<br/>
		é criada a tabela de questões<br/>
		é criada a tabela de feedbacks<br/>
		é criada a tabela de partidas multiplayer<br/>
		é criada a tabela de partidas singleplayer<br/>
		é criada a tabela de disciplinas alocadas ao professor<br/>
		é criada a tabela de disciplinas que o aluno se inscreveu<br/>
		é criada a tabela de enunciados das partidas multiplayer<br/>
		é criada a tabela de enunciados das partidas singleplayer<br/>
		é criada a tabela de questões das partidas multiplayer<br/>
		é criada a tabela de questões das partidas singleplayer<br/>
		é criada a tabela de questões das partidas multiplayer<br/>
		é criada a tabelas de respostas da partida singleplayer<br/>
	<h3>verifica_login.php</h3><br/>
		inicia sessão, <br/>
			em caso de a variável de sessão 'logado' estiver com o valor false<br/>
				envia o usuario para index.php<br/>
				encerra a execução<br/>
<h2>Classes</h2><br/>
<h2>Métodos</h2><br/>
<h2>Atributos</h2><br/>
<h2>Variáveis</h2><br/>
<h2>Padrões de projeto</h2>