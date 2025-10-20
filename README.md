# Teste Prático para Desenvolvedor Full Stack

## Descrição
Sistema de gestão para grupos econômicos, permitindo administrar **Grupos, Bandeiras, Unidades e Colaboradores**, gerar relatórios e auditoria.  
Front-end: **Bootstrap 5** | Back-end: **Laravel 10** | Banco: **MySQL**.


 Observação: As rotas ainda **não estão protegidas**, portanto qualquer usuário que acessar as URLs poderá ver as páginas.


 

## Funcionalidades Principais

✅ **CRUD completo**
- Grupos Econômicos  
- Bandeiras  
- Unidades  
- Colaboradores (registra inclusão, edição e exclusão)  

✅ **Relatórios**
- Filtro de colaboradores por unidade, bandeira e grupo  
- Exportação de auditoria para Excel  

✅ **Auditoria**
- Registra alterações feitas nas entidades  

✅ **Front-end**
- Layout com Bootstrap 5  
- Mensagens de sucesso/erro  
- Confirmação via JS ao excluir  

---

## Pontos Importantes

⚠️ **Rotas não estão protegidas** – qualquer usuário pode acessar as URLs.  

pode registra o usuario e fazer o login 
ou colocar INSERT INTO colaboradores (nome, email, cpf, unidade_id, created_at, updated_at)
VALUES ('Nome do Usuário', 'usuario@empresa.com', '12345678901', 1, NOW(), NOW()); no mysql 

Gostaria de agradecer pela oportunidade de desenvolver o sistema. Dentro da semana que tivemos, consegui implementar cerca de 80% das funcionalidades. Com um prazo um pouco maior, tenho certeza de que consigo concluir o restante e ainda otimizar algumas partes do código.

Foi um projeto que me envolveu bastante, e eu realmente gostaria de continuar, caso exista essa possibilidade. Estou disposto a finalizar e aprimorar o sistema para deixá-lo totalmente funcional.

Agradeço pela confiança e pela experiência de trabalhar com Laravel em um projeto real — foi um aprendizado muito valioso.





⚠️ **Login via email** – o usuário deve existir previamente na tabela `colaboradores`.  
Para criar um usuário manualmente:

```sql
INSERT INTO colaboradores (nome, email, cpf, unidade_id, created_at, updated_at)
VALUES ('Nome do Usuário', 'usuario@empresa.com', '12345678901', 1, NOW(), NOW());
