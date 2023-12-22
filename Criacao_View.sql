-- register_books.vw_relatorio_autores source

create or replace
algorithm = UNDEFINED view `register_books`.`vw_relatorio_autores` as
select
    `register_books`.`livros`.`Titulo` as `titulo`,
    group_concat(`register_books`.`autores`.`Nome` separator ', ') as `autores`,
    group_concat(`register_books`.`assuntos`.`Descricao` separator ', ') as `assuntos`
from
    ((((`register_books`.`livros`
left join `register_books`.`livro_autores` on
    ((`register_books`.`livros`.`Codl` = `register_books`.`livro_autores`.`Livro_Codl`)))
left join `register_books`.`autores` on
    ((`register_books`.`livro_autores`.`Autor_CodAu` = `register_books`.`autores`.`CodAu`)))
left join `register_books`.`livro_assuntos` on
    ((`register_books`.`livros`.`Codl` = `register_books`.`livro_assuntos`.`livro_codl`)))
left join `register_books`.`assuntos` on
    ((`register_books`.`livro_assuntos`.`Assunto_codAs` = `register_books`.`assuntos`.`codAs`)))
group by
    `register_books`.`livros`.`Codl`;