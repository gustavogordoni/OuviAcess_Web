<h1 align="center">OuviAcess</h1>
<h3 align="center">Sistema de Ouvidoria para a garantia de ambientes acessíveis</h3>
<br>
<h2>1 - INTRODUÇÃO</h2>
<p>No Brasil, foram aprovadas leis, decretos, portarias e resoluções, nas esferas: federal, estaduais e municipais, buscando reforçar a Declaração dos Direitos das Pessoas Deficientes
da ONU. Apesar de todo esse aparato jurídico para regulamentar formas de integração da pessoa portadora de deficiência no contexto socioeconômico e cultural, garantindo o pleno
exercício dos direitos decorrentes da Constituição, na prática esses direitos ainda não são garantidos em sua totalidade (KEPPE JUNIOR, 2007).</p>
<p>A falta de acessibilidade em ambientes públicos e privados é um problema que afeta a vida de muitas pessoas, especialmente aqueles com deficiências físicas. A falta de rampas
de acesso, calçadas deterioradas, falta de corrimãos e outros obstáculos, tornam a locomoção dessas pessoas extremamente difícil, limitando sua independência e qualidade de vida.
Diante disso, o desenvolvimento de um sistema de ouvidoria voltado para denúncias e sugestões de ambientes acessíveis pode ser uma solução para ajudar a melhorar a
acessibilidade em nossas cidades.</p>

<h3>1.1 OBJETIVO GERAL</h3>
<p>O objetivo deste projeto integrador é desenvolver um sistema de ouvidoria voltado para denúncias e sugestões de ambientes acessíveis, como rampas de acessibilidade e calçadas
deterioradas. O sistema terá como principal objetivo facilitar a solicitação de manutenção desses espaços, permitindo que as pessoas denunciem obstáculos e sugiram melhorias para
tornar a circulação nesses ambientes mais acessíveis para todos.</p>

<h3> 1.2 OBJETIVO ESPECÍFICO </h3>
• Realizar um estudo aprofundado sobre o funcionamento dos sistemas de ouvidorias;
• Realizar um estudo de ferramentas colaborativas para um melhor desenvolvimento de
páginas Web, como o framework Bootstrap;
• Elaborar um Diagrama de Entidade Relacionamento;
• Elaborar um Diagrama de Caso de Uso;
• Desenvolver um módulo de cadastro do usuário;
• Desenvolver um módulo de cadastro de requisições;
• Desenvolver um módulo de cadastro do administrador.

<h3>1.3 JUSTIFICATIVA</h3>
<p>A criação de um sistema de ouvidoria voltado para denúncias e sugestões de
ambientes acessíveis é extremamente relevante para a sociedade. Além de ajudar a melhorar a
qualidade de vida das pessoas com deficiência física, podendo contribuir para a criação de
uma cultura de acessibilidade em nossas cidades, estimulando o cuidado e manutenção dos
espaços públicos e privados. Além disso, esse sistema pode facilitar a comunicação entre os
usuários e os responsáveis pela manutenção dos espaços, permitindo que as solicitações sejam
recebidas e tratadas de forma mais rápida e eficiente.</p>
<p>Por fim, a criação de um sistema de ouvidoria pode ajudar a promover a inclusão
social, permitindo que pessoas com deficiência física tenham maior acesso aos espaços
públicos e possam desfrutar da cidade de forma mais livre e autônoma.</p>

<h2> 2 LEVANTAMENTO DE REQUISITOS DE SOFTWARE </h2>
<h3>2.1 DESCRIÇÃO DOS OBJETIVOS DO SISTEMA</h3>
<p>O sistema terá, como objetivo principal, o registro de denúncias e sugestões, realizadas pelos usuários, relacionadas aos problemas que dificultam ou impedem a garantia
de ambientes acessíveis, que serão geridas por um grupo de administradores. O usuário poderá ter acesso ao sistema de ouvidoria por meio de uma interface Web,
que possibilitará o cadastro e login do mesmo. Para o cadastro, o usuário pode informar o nome completo, DDD, telefone, e-mail e uma senha para acesso ao sistema (a mesma deve ser
confirmada). Para o login, o usuário deve informar seu e-mail para identificação e a senha cadastrada.</p>
<p>Para realizar uma requisição, o usuário pode escolher não se identificar (“modo anônimo”), e, em seguida, escolher entre as opções de denúncia ou sugestão (pré-definidas pelo sistema), 
um título, o endereço (cidade, CEP, bairro e logradouro), uma descrição (com um número de caracteres mínimo), e poderá, caso queira, anexar uma imagem que diz respeito ao local em discussão.</p>
<p>Com relação ao administrador em seu sistema Desktop, é necessário que ele realize seu cadastro no sistema informando o nome, CPF, RG, DDD e telefone para contato, e-mail e uma senha para acessar ao sistema (a mesma deve ser confirmada). Para o login, o administrador deve informar seu e-mail.</p>
<p>Com o login realizado, o administrador terá acesso aos requerimentos realizados pelos usuários. Para cada requisição, é necessário que ele atualize a situação dos requerimentos, podendo defini-las como em andamento, informações incompletas, recusado, concluído. Além disso, é preciso que ele retorne uma resposta à requisição do usuário, informando o motivo/justificativa pelo qual a situação foi determinada.</p>

<h3>2.2 DESCRIÇÃO DOS PRINCIPAIS PROBLEMAS</h3>
<p>Um dos maiores problemas está relacionado à existência de espaços públicos não
acessíveis, o que reflete a falta de consideração sobre as necessidades das pessoas, sobretudo
com deficiência física ou mobilidade reduzida, na concepção e construção de edifícios e
espaços urbanos. Deste modo, podemos encontrar diversos obstáculos que interfiram no
direito dessas pessoas de ir e vir, seja pela não implementação de elementos, como rampas,
corrimãos e pisos táteis, ou pela falta de conservação dessas estruturas (falta de manutenção).</p>
<p>Com base nisso, um sistema de ouvidoria seria uma ferramenta útil para que a
população forneça um feedback sobre os vários ambientes públicos, realizado através de6
requerimentos que abrangem denúncias ou sugestões, contribuindo, desta forma, para a
organização e agilidade das respostas aos problemas e propostas realizados.</p>

<h2>3. TRABALHOS FUTUROS</h2>
<p>Futuramente, planejamos continuar o desenvolvimento desse sistema, expandindo-o
para além de uma ouvidoria, implementando, possivelmente, um fórum aberto para debates
e/ou simples perguntas e respostas entre os usuários, enquanto mantemos a proposta
primordial do sistema: a garantia de ambientes mais acessíveis para todos. Além disso,
gostaríamos de ampliar as ferramentas e linguagens utilizadas nesse projeto, considerando a
possibilidade de utilizar o Laravel (um framework PHP livre e open-source) e a biblioteca
front-end voltada para JavaScript chamada React.</p>
