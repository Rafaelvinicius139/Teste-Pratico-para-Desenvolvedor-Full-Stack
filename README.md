# Sistema de Gestão de Grupo Econômico

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





⚠️ **Login via email** – o usuário deve existir previamente na tabela `colaboradores`.  
Para criar um usuário manualmente:

```sql
INSERT INTO colaboradores (nome, email, cpf, unidade_id, created_at, updated_at)
VALUES ('Nome do Usuário', 'usuario@empresa.com', '12345678901', 1, NOW(), NOW());
