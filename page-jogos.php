<?php 

/*
    template name: elenco
*/


get_header(); ?>
    <div class="container d-flex">
    <div class="conteudo-flex col-md-9 col-sm-12">
        <section class="secao">
            <div class="row titulo-site">
                <h1>
                    <span class="titulo-pagina">Paulista Segunda Divisão Sub-23</span>
                </h1>
            </div>
        </section>
        <section class="secao">               
            <div class="col-12 colunas-secao d-flex align-items-center">
                <div id="accordion" class="col-12">
                    <?php query_posts( array(
                                'post_type' => array( 'jogos', ),
                                'posts_per_page' => -1                                                                
                            ) );  
                          $id = get_the_ID();   
                    ?>
                        <?php if(have_posts()): while(have_posts()): the_post(); ?> 
                        <div class="card">
                            <div class="card-header" id="headingOne">                                    
                                <a class="btn btn-link" data-toggle="collapse" data-target="#collapse<?php echo $id?>" aria-expanded="false" aria-controls="collapseOne" style="width:100%">  
                                    <div class="d-flex">  
                                        <div class="placar">                                            
                                            <img class="escudo" src="<?php the_field('escudo_da_casa'); ?>" />
                                            <span class="texto-card"><?php the_field('time_da_casa'); ?></span>
                                            <span class="texto-card-info"><?php the_field('estadio'); ?></span>
                                        </div>
                                        <div class="placar">
                                            <span class="texto-card-placar"><?php the_field('resultado_da_casa'); ?> x <?php the_field('resultado_visitante'); ?></span>
                                        </div>
                                        <div class="placar">
                                            <img class="escudo" src="<?php the_field('escudo_do_visitante'); ?>" />
                                            <span class="texto-card"><?php the_field('time_visitante'); ?></span>
                                            <span class="texto-card-info"><?php the_field('horario'); ?></span>
                                        </div>
                                    </div>    
                                    
                                </a>                                     
                            </div>                                  
                            <div id="collapse<?php echo $id?>" class="collapse" aria-labelledby="headingOne" data-parent="#accordion">
                                <div class="card-body d-flex flex-column align-items-center">
                                    <a class="text-center" target="_blank" href="<?php the_field('sumula'); ?>">Súmula</a></br>
                                    <iframe width="560" height="315" src="<?php the_field('video'); ?>" frameborder="0" allow="accelerometer; autoplay; encrypted-media; gyroscope; picture-in-picture" allowfullscreen></iframe>
                                </div>
                            </div>
                        </div>
                        <?php endwhile; ?>    
                        <?php else : ?>
                            Não há jogos cadastrados
                        <?php endif; ?>
                    <?php wp_reset_query();?>
                </div>    
            </div>
        </section>                
    </div>
        <?php get_sidebar(); ?>

</div>
<?php get_footer(); ?>
