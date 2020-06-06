<?php

/**
 * template name: sobre-o-clube
 */

get_header();
?>

<div class="container d-flex">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div class="conteudo-flex col-md-9 col-sm-12">
                <section class="secao">
                    <div class="row titulo-site">
                        <h1>
                            <span class="titulo-pagina"><?php the_title(); ?></span>
                        </h1>
                    </div>
                    <article class="texto">
                        <div class="imagem-superior img-responsive">
                            <img class="imagem-superior img-responsive" src="<?php bloginfo("template_directory"); ?>/public/img/noticias/comemoracao-com-torcida.jpg">
                        </div>

                        <p class="texto-pagina">
                            O clube foi fundado em 1º de fevereiro de 1964 com o nome de Associação Desportiva Vila das
                            Palmeiras, em homenagem ao bairro onde foi fundado, e com as cores verde e branca. Antes de se
                            profissionalizar, o time da Vila das Palmeiras participou de diversas competições amadoras na
                            cidade, sendo um dos fundadores da Olimpíada Colegial Guarulhense e da Liga de Futebol de Salão
                            de
                            Guarulhos. Outros torneios da cidade como os Jogos da Primavera, organizados pela Prefeitura
                            Municipal, também tiveram a participação da equipe, que foi campeã destes torneios em três
                            oportunidades. Segundo alguns relatos históricos, o clube deu suas primeiras aparições nos
                            campos de
                            várzea da cidade no ano de 1957. Porém de 1964 a 1971, a equipe disputou diversos torneios de
                            várzeas no município conquistando assim o respeito do futebol local. No ano de 1972, mais
                            precisamente no dia 1° de dezembro, o clube enfim é registrado e tem sua ata de fundação,
                            podendo
                            assim disputar a Liga Municipal de Guarulhos, e passando a disputar o amadorismo de 1973 a 1980.
                        </p>

                        <p class="texto-pagina">
                            Em 1981, o clube se profissionalizou e começou a disputar as competições da Federação Paulista
                            de
                            Futebol. Sem apoio da cidade, e praticamente representando apenas um bairro, a equipe se
                            solidifica
                            e torna-se a mais consistente de Guarulhos a disputar o profissionalismo. No mesmo ano herdou a
                            vaga
                            da Associação Atlética Macêdo na FPF, ganhando o direito de disputar a Terceira Divisão (atual
                            Série
                            A3), obtendo em 25 jogos: 9 vitórias, 3 empates e 13 derrotas, terminando a competição no Grupo
                            Vermelho com 21 pontos ganhos. O autor do primeiro gol do Time da Cidade em competições
                            profissionais foi Abenaldo, na derrota por 2 a 1 diante do União Mogi, em jogo realizado no dia
                            14
                            de março de 1981 no Estádio Municipal Cícero Miranda. A primeira vitória em competições
                            profissionais ocorreu no dia 28 de março de 1981 no Cícero Miranda diante do Jacareí Atlético
                            Clube.
                        </p>

                        <p class="texto-pagina">
                            Em 1993, o clube mudou o nome para Associação Desportiva Guarulhos, mudança essa realizada pela
                            diretoria do clube com o objetivo de criar uma maior identificação com o município no qual a
                            agremiação está situada, porém ainda mantendo as cores verde e branca. No ano seguinte passou a
                            ostentar em sua camisa e escudo as cores da cidade: azul, vermelho e branco. A partir deste
                            momento,
                            as atenções da cidade se voltam para a equipe e ela passa a receber apoio oficial. Neste mesmo
                            ano,
                            realizou a melhor campanha em uma competição oficial ao chegar ao vice-campeonato da Série B1
                            (atual
                            Segunda Divisão, quarta divisão paulista). Desde então, disputou as divisões de acesso do
                            Campeonato
                            Paulista todos os anos.
                        </p>

                        <p class="texto-pagina">
                            Tudo isso só foi possível com o crescimento e o fortalecimento da até então Associação
                            Desportiva
                            Vila das Palmeiras, que atravessou ininterruptamente as décadas de 1980 e 1990, representando
                            condignamente o nome da grande cidade guarulhense. Em 2003, o clube pediu licença da Federação,
                            retornando em 2004 na quinta divisão. Com a extinção da quinta divisão, em 2005, o clube passou
                            automaticamente a disputar a Segunda Divisão do Campeonato Paulista, o equivalente à quarta
                            divisão.
                        </p>

                        <p class="texto-pagina">
                            O clube tem como alcunhas Time da Cidade, por carregar o nome e as cores do município no
                            estatuto,
                            uniformes e bandeiras, além de ser conhecido também como AD (siglas que significam Associação
                            Desportiva), O Mais Querido, por ser o preferido da cidade pela identidade que carrega com seus
                            moradores, e Guarulhão da Massa, que surgiu graças ao retorno do time na Copa São Paulo de
                            Futebol
                            Júnior de 2017, onde a equipe caiu no mesmo grupo que o rival Flamengo-SP e dividiu o mesmo
                            estádio,
                            o Antônio Soares de Oliveira, conhecido também como Tranquilão nos dias de jogos do Guarulhos. O
                            setor visitante, que fora destinados aos torcedores do clube foram todos ocupados nos seus três
                            jogos, com destaque para o clássico em que derrotou o rival por 2 a 1 de virada. Além do setor
                            visitante que toda torcida guarulhense ocupou, a área da torcida mista (arquibancada central)
                            foi
                            ocupada por 80% de torcedores que declararam apoio ao Guarulhos. Após o término dessa partida,
                            um
                            grupo de visitantes impressionados com a torcida guarulhense e o clube apelidou o time de
                            Guarulhão
                            da Massa.
                        </p>
                    </article>
                    <div class="imagem-inferior">
                        <img class="imagem-inferior" src="<?php bloginfo("template_directory"); ?>/public/img/noticias/evolucao-do-escudo.jpg">
                    </div>
                </section>
                <?php comments_template(); ?>
            </div>


        <?php endwhile; ?>
    <?php else : ?>
        <div class="artigo">
            <h2>Nada Encontrado</h2>
            <p>Erro 404</p>
            <p>Lamentamos mas não foram encontrados artigos.</p>
        </div>
    <?php endif; ?>
    <?php get_sidebar(); ?>

</div>

<?php get_footer(); ?>