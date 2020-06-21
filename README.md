# Tema "A.D. Clube" para Wordpress
Durante o acompanhamento do clube de futebol da série B1 pertencente ao campeonato paulista (última divisão do paulista), foi percebido que devido à falta de recursos à divulgação, o clube analisado mobilizava poucos torcedores que acompanhavam o trabalho com frequência, e por consequência pouco investimento por parte dos patrocinadores.
Pensando em otimizar a divulgação de clubes que possuem a mesma dificuldade, foi escolhido desenvolver um tema de clubes para o Wordpress que facilite este processo por meio da web.
Esse tema tem como objetivo facilitar que clubes tenham uma alternativa para a criação de sites por meio do Wordpress, já que este possui diversas ferramentas gratuitas para o desenvolvimento de sites, mas não possui temas brasileiros para clubes.
Desta forma, possibilitando um maior alcance por parte dos clubes com possíveis torcedores regionais, aumentando a identificação da região com o clube, visando maior investimentos por parte dos patrocinadores.


### CMS - My Club
A primeira funcionalidade foi a criação da página Meu Clube no menu CMS do Wordpress, para as configurações gerais do clube. A página é definida em quatro seções, conforme ilustrada na Figura 1.
Na primeira seção, Configurações do Clube, é possível definir o nome, abreviação, estádio, primeira cor, segunda cor e terceira cor do clube. As cores selecionadas dessa configuração impactam nas cores do site.
Na segunda seção, Redes Sociais, são definidas as redes sociais do clube. As redes sociais preenchidas com um link, serão exibidas no cabeçalho e no rodapé do site, redirecionando para as redes sociais conforme o link preenchido.
Na terceira seção, Rodapé, são definidos os textos que serão exibidos no campo Sobre o Clube e Contatos no rodapé da página.
Na quarta seção, Configurações Gerais, são configurações que habilitam ou desabilitam as funcionalidades personalizadas do tema.

![Figura 1](https://github.com/santanaluc94/adclube/blob/master/img/admin_meu_clube.png)

---
### CMS - Patrocinadores
Patrocinadores foi pensado para exibir o link dos patrocinadores do clube e redirecionar os usuários para o site destes. Os patrocinadores serão exibidos em todas as páginas antes da parte do rodapé. Esta funcionalidade já vem com duas páginas por padrão no CMS, Adicionar Patrocinador, conforme Figura 2, e Todos os Patrocinadores, conforme Figura 3.
A funcionalidade sponsor é um _post_ personalizável do Wordpress e pode ser habilitada pelos seguintes passos:
- Passo 1: Meu Clube (Página CMS)
- Passo 2: Na quarta seção, Configurações Gerais
- Passo 3: Habilitar Patrocinadores: Sim
- Passo 4: Salvar Alterações

Para adicionar um novo patrocinador deve ser inserido o Título (nome do patrocinador), Site (link que será utilizado para o redirecionamento quando clicado na imagem) e Imagem Destacada (imagem do patrocinador que será exibida no site).
![Figura 2](https://github.com/santanaluc94/adclube/blob/master/img/admin-adicionar-patrocinador.png)

A página Todos os Patrocinadores exibe todos os patrocinadores cadastrados. Possui as funcionalidades padrões de uma página com todos os post do Wordpress.
![Figura 3](https://github.com/santanaluc94/adclube/blob/master/img/admin-todos-patrocinadores.png)

---
### CMS - Atletas
Atletas foi pensado para exibir o elenco do clube. Os atletas serão exibidos na página de Atletas do site. Esta funcionalidade já vem com duas páginas por padrão no CMS, Adicionar Atleta, conforme a Figura 4, e Todos os Atletas, conforme Figura 5.
A funcionalidade Atletas é um _post_ personalizável do Wordpress e pode ser habilitada pelos seguintes passos:
- Passo 1: Meu Clube (Página CMS)
- Passo 2: Na quarta seção, Configurações Gerais
- Passo 3: Habilitar Atletas: Sim
- Passo 4: Salvar Alterações

Para adicionar um novo atleta deve ser inserido o nome e o nome completo nos seus campos. O _post_ apresenta os seguintes campos adicionais: altura, peso, função, data de nascimento e imagem destacada (foto do atleta).
![Figura 4](https://github.com/santanaluc94/adclube/blob/master/img/admin-adicionar-jogador.png)


A página Todos os Atletas exibe todos os atletas cadastrados. Possui as funcionalidades padrões de uma página com todos os _post_ do Wordpress.
![Figura 5](https://github.com/santanaluc94/adclube/blob/master/img/admin-todos-jogadores.png)

---
### CMS - Partidas
Partidas foi pensado para exibir as partidas do clube. As partidas serão exibidas na página de Partidas do site. Esta funcionalidade já vem com duas páginas por padrão no CMS, Adicionar Partidas, conforme a Figura 6, e Todas as Partidas, conforme a Figura 7. Também foi desenvolvido a funcionalidade de Campeonatos, que também terá uma página no site, com o mesmo nome da funcionalidade.
A funcionalidade partidas é um _post_ personalizável do Wordpress e pode ser habilitada pelos seguintes passos:
- Passo 1: Meu Clube (Página CMS)
- Passo 2: Na quarta seção, Configurações Gerais
- Passo 3: Habilitar Partidas: Sim
- Passo 4: Salvar Alterações

Para adicionar um nova partida deve ser inserida a data da partida, será verificada se a data é posterior à hoje, se for, não será possível editar o placar da partida), a hora, se o clube será o mandante ou visitante (preenchendo automaticamente pela sigla cadastrada na primeira seção, Configurações do Clube, da página Meu Clube no CMS, e caso o clube for o mandante, preencherá automaticamente o nome do estádio), o nome do time adversário, o placar do jogo, a qual campeonato pertence e a imagem destacada (foto do clube adversário).
![Figura 6](https://github.com/santanaluc94/adclube/blob/master/img/admin-adicionar-partida.png)

A página Todas as Partidas exibe todos as partidas cadastradas. Possui as funcionalidades padrões de uma página com todos os _post_ do Wordpress.
![Figura 7](https://github.com/santanaluc94/adclube/blob/master/img/admin-todas-partidas.png)

#### Campeonatos
Campeonatos foi pensado para exibir todos os campeonatos que o clube participará. Está funcionalidade já vem com uma página padrão, Campeonatos, conforme a Figura 8, que também terá uma página no site, com o mesmo nome da funcionalidade.
A funcionalidade Campeonatos é uma catgoria personalizável do Wordpress e é habilitada junto com a funcionalidade de partidas.
Para adicionar um novo campeonato deve ser inserido o nome do campeonato, o slug (palavra chave para identificação do Wordpress), a descrição e o ano que o campeonato será exibido.
A página Campeonatos exibe todos os campeonatos cadastrados e é possível adicionar novos. Possui as funcionalidades padrões de uma página category do Wordpress.
![Figura 8](https://github.com/santanaluc94/adclube/blob/master/img/admin-partidas-campeonatos.png)

---
###  Posts
Para que um _post_ seja exibido no banner da página inicial, o post deve ter a categoria Destaques selecionada, conforme a Figura 9.
![Figura 9](https://github.com/santanaluc94/adclube/blob/master/img/admin-post-highlights.png)

Para que um _post_ seja exibido nas últimas notícias da página inicial, o post deve ter a categoria Notícia selecionada, conforme a Figura 10.
![Figura 10](https://github.com/santanaluc94/adclube/blob/master/img/admin-post-notices.png)
