class T {
	constructor() {
		this.page_title = "Votômetro";
		this.qa_modal_title = "FAQ";
		this.qa_modal_body = '<h4></h4>\
					<p></p>\
\
					<h4>Quem somos nós?</h4>\
					<p>Somos um grupo de amigos que pretende fornecer uma ferramenta complementar para te ajudar a conhecer os candidatos e decidir o seu voto.</p>\
\
					<h4>Como pretendemos fazer isso?</h4>\
					<p>Selecionamos alguns pontos que consideramos fundamentais na agenda política desse ano. Com eles, você poderá ver o quanto os candidatos pensam como você. Destacamos que as perguntas aqui analisadas não pretendem cobrir todos os assuntos importantes a respeito das eleições, e acreditamos que mais pesquisas sobre os candidatos são fundamentais.\
					</p>\
					<p></p>\
\
					<h4>Onde foram obtidas as informações sobre os candidatos?</h4>\
					<p>As informações sobre as posições dos candidatos foram retiradas de seus programas, entrevistas dos próprios candidatos divulgadas na mídia e informações sobre as votações do partido do candidato em votações no Congresso Nacional. Além disso, este Quiz foi baseado em outra iniciativa semelhante, o https://oiceberg.com.br.</p>\
\
					<h4>Como os pontos são calculados?</h4>\
					<p> Suas respostas serão comparadas com as posições dos presidenciáveis.</p>\
					<ul>\
						<li>    Se sua resposta for a mesma do candidato, ele ganha 2 pontos;</li>\
						<li>Se a resposta for diferente, mas não contrária (no caso da posição de um ser "neutra" e de outro "aprovação" ou "rejeição"), é um ponto para o candidato;</li>\
						<li>Se as respostas forem opostas, não há pontos. As questões que você pular não serão pontuadas.\
						</li>\
					</ul>\
					<p>Uma pergunta em que você selecionar dobrar importância é ponderada duas vezes, garantindo uma pontuação dupla (seja 0, 2 ou 4, dependendo da sua posição e do candidato).</p>\
					<p></p>\
\
					<h4>Minhas respostas serão salvas?</h4>\
					<p>Não, nada do que você responder será salvo.</p>\
\
					<h4>Eu encontrei um erro de conteúdo!</h4>\
					<p>Por favor, nos envie um e-mail para gussabbag@gmail.com.</p>\
\
					<h4>Quem programou o Votômetro?</h4>\
					<p>Está \
						<a href="https://github.com/rmatschke/-Vot-metro">aqui</a>.</p>\
\
					<h4>Eu encontrei um erro de programação!</h4>\
					<p>Oh não! Se você reportar o erro, ele pode ser corrigido.\
						<a href="https://github.com/rmatschke/-Vot-metro"></a></p>';
		this.btn_qa_modal_close = "Fechar";
		this.swype_info_message_text = "Deslize para alternar manualmente entre as teses";
		this.btn_swype_info_ok = "Ta Bom";

		this.start_subtitle = "O Votômetro é uma ferramenta para identificar a correspondência entre suas ideias e as dos candidatos.";
		this.start_explanatory_text = "<p> Ele compara suas posições quanto a assuntos importantes da agenda política com as opiniões dos principais candidatos à presidente de 2018.\
					</p>\
					<p></p>";
		this.btn_start = "começar";
		this.btn_start_show_qa = "FAQ";
		this.btn_toggle_thesis_more_text = "O que é Dobrar Importância?";
		this.btn_important = "contar o dobro";
		this.btn_yes_text = "concordo";
		this.btn_neutral_text = "neutro";
		this.btn_no_text = "discordo";
		this.btn_skip_text = "ignore";
		this.btn_mahlowat_show_start = "voltar para a home page";
		this.btn_mahlowat_show_qa = "FAQ";
		this.btn_mahlowat_skip_remaining_theses = "Ignore todas as teses restantes e avalie o status atual";
		this.title_results = "";
		this.title_results_summary = "Resultados";
		this.text_result_below_summary = '<small>Não ficou satisfeito com o resultado?\
				<button class="btn btn-sm btn-light" onclick="showMahlowatFirstThesis()">Altere as respostas ou a ponderação!</button>\
			</small>';
		this.title_results_details = "";
		this.btn_results_show_start = "voltar para a home page";
		this.btn_results_show_qa = "FAQ";

	}


	thesis_number(number) { return "" ; }
	get btn_make_thesis_double_weight() { return "Clique aqui para Dobrar Importância"; }
	get btn_thesis_has_double_weight() { return "Tese contada em dobro"; }
	get label_your_choice() { return "Sua escolha"; }
	achieved_points_text(pointsForList, maxAchievablePoints) { return '' + Math.round((pointsForList/maxAchievablePoints)*100) + '%'; }
	get default_text_no_statement() { return "<small class='text-muted'></small>"; }
	get error_loading_config_file() {
		return '<b>Fehler</b> Die Konfigurationsdatei <a href="config/data.json"><tt>config/data.json</tt></a> konnte nicht geladen\
		werden. Existiert sie und enthält keine Syntaxfehler?';
	}
}
