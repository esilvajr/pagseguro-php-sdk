Testes unitários para o SDK PagSeguro PHP
========================================================================

Descrição
---------
O projeto de teste unitário foi desenvolvido utilizando PHPUnit, PhantomJS e Fake e tem como objetivo realizar os testes de conexão e respostas entre o SDK e o ambiente Sandbox do PagSeguro. A recomendação é que este projeto seja executado e evoluído a cada alteração ou nova funcionalidade implementada no SDK. Os testes cobrem as seguintes funcionalidades implementadas no SDK:
 - Criar [requisições de pagamentos]
 
 Requisitos
 ----------
  - PHP 5.4.27
  - PHPUnit 6.1.1
  - PhantomJS 1.3.0
  - Faker 1.6.0
 
 Configuração
 ------------
 
 Transactions (test/Configurable.php)
 ----------
 
 Informar as credenciais nas propriedades da classe:
 
 - $email;
 - $tokenSandbox 
 
 Changelog
 ---------
 1.0.0
   - Criar requisições de pagamentos.
   
Contribuições
-------------
   
Achou e corrigiu um bug ou tem alguma feature em mente e deseja contribuir?

* Faça um fork
* Adicione sua feature ou correção de bug (git checkout -b my-new-feature)
* Commit suas mudanças (git commit -am 'Added some feature')
* Rode um push para o branch (git push origin my-new-feature)
* Envie um Pull Request para a branch de desenvolvimento
* Obs.: Adicione exemplos para sua nova feature. Se seu Pull Request for relacionado a uma versão específica, o Pull Request não deve ser enviado para o branch master e sim para o branch correspondente a versão.
* Obs2: Não serão aceitos PR's na branch master. Utilizar a branch de desenvolvimento.

 [requisições de assinaturas]: http://download.uol.com.br/pagseguro/docs/pagseguro-assinatura-automatica.pdf
 [assinaturas]: http://download.uol.com.br/pagseguro/docs/pagseguro-assinatura-automatica.pdf
 [requisições de pagamentos]: https://pagseguro.uol.com.br/v2/guia-de-integracao/api-de-pagamentos.html
 [notificações]: https://pagseguro.uol.com.br/v3/guia-de-integracao/api-de-notificacoes.html
 [Checkout Transparente]: https://pagseguro.uol.com.br/receba-pagamentos.jhtml#checkout-transparent
 [transações por código]: https://pagseguro.uol.com.br/v3/guia-de-integracao/consulta-de-transacoes-por-codigo.html
 [transações por intervalo de datas]: https://pagseguro.uol.com.br/v2/guia-de-integracao/consulta-de-transacoes-por-intervalo-de-datas.html
 [transações abandonadas]: https://pagseguro.uol.com.br/v2/guia-de-integracao/consulta-de-transacoes-abandonadas.html
