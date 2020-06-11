<?php

/**
 * template name: campeonatos
 */

get_header();

query_posts([
    'post_type' => ['campeonatos'],
    'posts_per_page' => -1,
    'orderby' => 'posicao',
    'order' => 'asc'
]);
?>

<div class="container container-top">
    <section class="inicio-secao">
        <?php if (have_posts()) : ?>
            <?php while (have_posts()) : the_post(); ?>
              <div class="row titulo-site">
                <div class="row titulo-site">
                    <h1>
                        <span class="titulo-pagina"><?php the_title(); ?></span>
                    </h1>
                </div>
                  <article class="texto">
                    <div class="conteudo-campeonato">
                        <h2 class="titulo-campeonato">Título teste 1</h2>
                        <p class="sobre-campeonato">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce imperdiet ipsum ligula, nec malesuada tellus tristique nec. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Fusce pellentesque imperdiet magna, ut pharetra ligula aliquet quis. Etiam dapibus vehicula neque, quis molestie ante posuere in. Sed tincidunt felis sed nunc tincidunt, non ultricies elit dapibus. Etiam luctus justo faucibus, maximus nunc in, egestas justo. Fusce nec sodales magna. Sed efficitur, mauris vel consectetur cursus, velit felis dapibus odio, nec ornare purus arcu in neque. Phasellus elementum mauris lectus, at consectetur nisi lacinia at. Sed mauris elit, gravida vel massa ac, mollis sodales velit. Nunc pharetra laoreet ipsum. Suspendisse quis pharetra dolor, vitae gravida sem. Aenean vulputate congue egestas.</p>
                    </div>
                    <div class="conteudo-campeonato">
                        <h2 class="titulo-campeonato">Título teste 2</h2>
                        <p class="sobre-campeonato">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce imperdiet ipsum ligula, nec malesuada tellus tristique nec. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Fusce pellentesque imperdiet magna, ut pharetra ligula aliquet quis. Etiam dapibus vehicula neque, quis molestie ante posuere in. Sed tincidunt felis sed nunc tincidunt, non ultricies elit dapibus. Etiam luctus justo faucibus, maximus nunc in, egestas justo. Fusce nec sodales magna. Sed efficitur, mauris vel consectetur cursus, velit felis dapibus odio, nec ornare purus arcu in neque. Phasellus elementum mauris lectus, at consectetur nisi lacinia at. Sed mauris elit, gravida vel massa ac, mollis sodales velit. Nunc pharetra laoreet ipsum. Suspendisse quis pharetra dolor, vitae gravida sem. Aenean vulputate congue egestas.</p>
                    </div>
                    <div class="conteudo-campeonato">
                        <h2 class="titulo-campeonato">Título teste 3</h2>
                        <p class="sobre-campeonato">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Fusce imperdiet ipsum ligula, nec malesuada tellus tristique nec. Orci varius natoque penatibus et magnis dis parturient montes, nascetur ridiculus mus. Fusce pellentesque imperdiet magna, ut pharetra ligula aliquet quis. Etiam dapibus vehicula neque, quis molestie ante posuere in. Sed tincidunt felis sed nunc tincidunt, non ultricies elit dapibus. Etiam luctus justo faucibus, maximus nunc in, egestas justo. Fusce nec sodales magna. Sed efficitur, mauris vel consectetur cursus, velit felis dapibus odio, nec ornare purus arcu in neque. Phasellus elementum mauris lectus, at consectetur nisi lacinia at. Sed mauris elit, gravida vel massa ac, mollis sodales velit. Nunc pharetra laoreet ipsum. Suspendisse quis pharetra dolor, vitae gravida sem. Aenean vulputate congue egestas.</p>
                    </div>
                </article>
              </div>
            <?php endwhile; ?>
        <?php else : ?>
            O clube não está em campeonatos no momento.
        <?php endif; ?>
        <?php wp_reset_query(); ?>
    </section>
</div>

<?php get_footer(); ?>