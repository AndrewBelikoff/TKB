INSERT users VALUES (1,'Петя', 'petr1@mail.ru', md5('123'));
INSERT users VALUES (2,'Вася', 'vasil2@yandex.ru', md5('abc'));
INSERT users VALUES (3, 'admin', 'admin@tkbbank.ru', md5('admin'));

INSERT questions VALUES (1,'Дни недели', 'Какой ваш любимый день недели?', 'single');
INSERT questions VALUES (2,'Пальцы', 'Выберите любимые пальцы рук', 'multi');
INSERT questions VALUES (3,'ПДД', 'Кто должен проехать перекрёсток первым?', 'single');
INSERT questions VALUES (4, 'Глаза в небе', 'Укажите допустимый цвет глаз у пилота перед вылетом', 'multi');

INSERT options VALUES (1,1, 'понедельник');
INSERT options VALUES (2,1, 'вторник');
INSERT options VALUES (3,1, 'среда');
INSERT options VALUES (4,1, 'четверг');
INSERT options VALUES (5,1, 'пятница');

INSERT options VALUES (6,2, 'большой');
INSERT options VALUES (7,2, 'указательный');
INSERT options VALUES (8,2, 'средний');
INSERT options VALUES (9,2, 'безымянный');
INSERT options VALUES (10,2, 'мизинец');

INSERT options VALUES (11,3, 'сначала красивая машинка, остальные потом');
INSERT options VALUES (12,3, 'сначала красная машинка с белой полосочкой');
INSERT options VALUES (13,3, 'сначала девочки');

INSERT options VALUES (14,4, 'красный');
INSERT options VALUES (15,4, 'оранжевый');
INSERT options VALUES (16,4, 'желтый');
INSERT options VALUES (17,4, 'зеленый');
INSERT options VALUES (18,4, 'голубой');
INSERT options VALUES (19,4, 'синий');
INSERT options VALUES (20,4, 'фиолетовый в крапинку');
