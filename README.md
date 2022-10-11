

## Sistema de anúncio de imovéis feito em laravel 9 e php 8.x


## O que você encontrará aqui até o momento?
- exemplos de routes, controllers, models, migrations...
- proteção das rotas usando o sanctum para autenticar nossos usuários
- relacionamentos 1 para 1, 1 para n e n para n na model usando o eloquent
- validação de tudo que chega nos meus endpoints por meio do request
- exceções para informar erros ao usuário
- crud das entidades
- trait para a model ganhar uma nova funcionalidade que se repete em outras models
- exemplos de accessors e mutators para vc modificar um dado antes de ele ser gravado no banco, por exemplo
- configuração do stripe como meu meio de pagamento (assinatura mensal, trimestral e semestral)
- gerar uuid para algumas tabelas por meio de uma trait no método booted()
- camada de repository
- resource para formatar a informação que irá para o front
- factory/seeders para gerar alguns usuário já no banco
- webhook da stripe atualiza a situação do usuário assinante (expirou, criou uma nova assinatura)

## o que eu farei ainda?
- reset de senha via email
- cachear algumas rotas quando necessárias
- email de boas vindas
- terminar de criar as entidades (model, rotas, controllers, migrations...)
- criar jobs para dispar os emails que não precisam ser imeditos e usar o redis para isso
- upload de imagens (possível que eu uso o cloudinary)
- não tô lembrando de outras coisas a serem feitas no momento, rs





