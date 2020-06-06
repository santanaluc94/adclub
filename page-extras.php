<?php

/**
 * template name: extras
 */

get_header();
?>

<div class="container d-flex">
    <?php if (have_posts()) : while (have_posts()) : the_post(); ?>
            <div class="conteudo-flex col-md-9 col-sm-12">
                <section class="secao">
                    <article class="texto">
                        <article class="sub-texto">
                            <div class="row titulo-site">
                                <h1>
                                    <span class="titulo-pagina">Torcida Inferno Azul Guarulhos</span>
                                </h1>
                            </div>

                            <div class="imagem-torcida">
                                <img class="imagem-torcida" src="<?php bloginfo("template_directory"); ?>/public/img/TIAG.jpg">
                            </div>
                            <p class="texto-pagina">
                                Criada no inicio de 2018 no Vale dos Machados, a Torcida Inferno Azul é a mais próxima da
                                administração do presidente Ricardo Agea. Sempre presente no Estádio Tranquilão, possui
                                o
                                estilo
                                das grandes organizadas dos grandes clubes brasileiros, tendo a capacidade de mobilizar
                                torcedores do clube em suas caravanas. Na Segunda Fase da Copa São Paulo de Futebol
                                Júnior
                                de
                                2018, em jogo contra o Grêmio realizado no Estádio Municipal Francisco Ribeiro Nogueira
                                (o
                                Nogueirão), a organizada foi a grande responsável pela invasão histórica da torcida
                                guarulhense
                                em caravana de Guarulhos a Mogi das Cruzes.
                            </p>
                        </article>

                        <article class="sub-texto">
                            <div class="row titulo-site">
                                <h1>
                                    <span class="titulo-pagina">Força Jovem Antifascista AD Guarulhos</span>
                                </h1>
                            </div>
                            <div class="imagem-torcida">
                                <img class="imagem-torcida" src="<?php bloginfo("template_directory"); ?>/public/img/FJAAG.jpg">
                            </div>
                            <p class="texto-pagina">
                                Fundada por um grupo de amigos professores e estudantes no dia 7 de julho de 2007, a Força
                                Jovem
                                Antifascista AD Guarulhos é a mais antiga organizada do clube, conhecida também como FJAD.
                                Há
                                mais de uma década é responsável por manter viva a chama da torcida e de sua renovação,
                                sendo
                                responsáveis por criar a conta oficial do clube no Facebook e no Instagram no inicio da
                                década
                                de 2010. Uma torcida cujo lema é Paz entre as Torcidas e Guerra contra o Sistema, é pacífica
                                e
                                engajada nos assuntos políticos e sociais da cidade, do estado e do país.
                            </p>
                        </article>

                        <article class="sub-texto">

                            <div class="row titulo-site">
                                <h1>
                                    <span class="titulo-pagina">Hino</span>
                                </h1>
                            </div>
                            <iframe class="video-hino" src="https://www.youtube.com/embed/t12Hj0vvEaQ" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                            <p class="hino">
                                Eu sou AD Guarulhos <br />
                                O AD Guarulhos joga pra vencer <br />
                                A vitória é meu lema <br />
                                Nada poderá nos abater <br />
                            </p>
                            <p class="hino">
                                Trago no peito a paixão <br />
                                Mais verdadeira, <br />
                                Na camisa e na bandeira <br />
                                Todo o meu amor. <br />
                            </p>
                            <p class="hino">
                                Mostrando raça, força, <br />
                                Garra e juventude, é preciso <br />
                                Atitude pra lutar pra ter valor. <br />
                                Coragem na decisão pra gritar campeão. <br />
                            </p>
                            <p class="hino">
                                O coração no bico da <br />
                                Chuteira, no agito <br />
                                Da Galera, é uma <br />
                                Explosão de emoção <br />
                            </p>
                        </article>

                        <div class="imagem-inferior">
                            <img class="imagem-inferior" src="<?php bloginfo("template_directory"); ?>/public/img/noticias/evolucao-do-escudo.jpg">
                        </div>

                    </article>
                </section>
                <?php comments_template(); ?>
            </div>


        <?php endwhile;
    else : ?>
        <div class="artigo">
            <h2>Nada Encontrado</h2>
            <p>Erro 404</p>
            <p>Lamentamos mas não foram encontrados artigos.</p>
        </div>
    <?php endif; ?>
    <?php get_sidebar(); ?>

</div>

<?php get_footer(); ?>