Тестовое задание:

Необходимо создать  HTML страницу, содержащую неограниченное количество вариантов закрытых опросов (с исчерпывающими списками ответов по каждому опросу)
При этом:
1.       Вопросы вместе с вариантами ответов, а также результатами опросов, должны храниться в БД MySQL
2.       Для ответов должна быть привязка к доменному имени (логину) пользователя, отвечающего на вопрос
3.       Должны быть предусмотрены два варианта опросов – с множественным выбором, и с выбором единственного значения
4.       Результат действия пользователя должен сохраняться в БД либо сразу, либо по кнопке в конце списка (в зависимости от типа опроса)
5.       При отображении списка вопросов, по каждому вопросу должно отображаться среднее по всем, уже сделанным, ответам на этот вопрос, но только при условии, что пользователь хотя бы один ответ по этому вопросу дал – иначе пусто.
6.       SQL операторы, необходимые для создания таблиц для этого задания, должны быть приведены в отдельном файле
