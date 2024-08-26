-- phpMyAdmin SQL Dump
-- version 5.2.0
-- https://www.phpmyadmin.net/
--
-- Хост: 127.0.0.1:3306
-- Время создания: Авг 26 2024 г., 12:18
-- Версия сервера: 5.7.39
-- Версия PHP: 7.2.34

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- База данных: `fitness`
--

-- --------------------------------------------------------

--
-- Структура таблицы `exercises`
--

CREATE TABLE `exercises` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL,
  `group_id` int(11) NOT NULL,
  `description` text,
  `video` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `exercises`
--

INSERT INTO `exercises` (`id`, `title`, `group_id`, `description`, `video`) VALUES
(1, 'Приседания', 7, NULL, NULL),
(2, 'Выпады', 7, NULL, NULL),
(3, 'Тяга на прямых ногах', 7, NULL, NULL),
(4, 'Жим ногами', 7, NULL, NULL),
(5, 'Становая тяга', 7, NULL, NULL),
(6, 'Приведение ног в тренажёре', 7, NULL, NULL),
(7, 'Отведение ног в тренажёре', 7, NULL, NULL),
(8, 'Жим Штанги лёжа', 5, NULL, NULL),
(9, 'Жим штанги на наклонной скамье', 5, NULL, NULL),
(10, 'Сведение рук в кроссовере', 5, NULL, NULL),
(11, 'Жим сидя в тренажёре', 5, NULL, NULL),
(12, 'Сгибание предплечий со штангой', 2, NULL, NULL),
(13, 'Сгибание предплечий с гантелями - нейтральный хват', 2, NULL, NULL),
(14, 'Разгибание предплечий в кроссовере', 3, NULL, NULL),
(15, 'Жим штанги узким хватом', 3, NULL, NULL),
(16, 'Отжимания от брусьев', 3, NULL, NULL),
(17, 'Французкий жим', 3, NULL, NULL),
(18, 'Подтягивания на перекладине', 6, NULL, NULL),
(19, 'Вертикальная тяга', 6, NULL, NULL),
(20, 'Фронтальная тяга', 6, NULL, NULL),
(21, 'Пулл-овер в кроссовере', 6, NULL, NULL),
(22, 'Тяга штанги к поясу', 6, 'описание', NULL),
(23, 'test', 4, '12werewgferwg', NULL);

-- --------------------------------------------------------

--
-- Структура таблицы `muscle_group`
--

CREATE TABLE `muscle_group` (
  `id` int(11) NOT NULL,
  `category` varchar(50) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `muscle_group`
--

INSERT INTO `muscle_group` (`id`, `category`) VALUES
(2, 'Бицепс'),
(3, 'Трицепс'),
(4, 'Дельты'),
(5, 'Грудь'),
(6, 'Спина'),
(7, 'Ноги');

-- --------------------------------------------------------

--
-- Структура таблицы `program_exercise`
--

CREATE TABLE `program_exercise` (
  `id` int(11) NOT NULL,
  `id_workout` int(11) NOT NULL,
  `exercise_id` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  `set_count` int(11) NOT NULL,
  `repeat_count` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `program_exercise`
--

INSERT INTO `program_exercise` (`id`, `id_workout`, `exercise_id`, `weight`, `set_count`, `repeat_count`) VALUES
(46, 6, 1, 50, 4, 10),
(47, 6, 4, 50, 4, 12),
(48, 6, 3, 40, 3, 15),
(49, 6, 6, 45, 3, 12);

-- --------------------------------------------------------

--
-- Структура таблицы `training_history`
--

CREATE TABLE `training_history` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_program` int(11) NOT NULL,
  `id_exercise` int(11) NOT NULL,
  `weight` tinyint(128) NOT NULL,
  `repeat_count` tinyint(128) NOT NULL,
  `training_time` time NOT NULL,
  `date` date NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `training_history`
--

INSERT INTO `training_history` (`id`, `id_user`, `id_program`, `id_exercise`, `weight`, `repeat_count`, `training_time`, `date`) VALUES
(30, 3, 6, 1, 50, 10, '00:22:00', '2024-08-23'),
(31, 3, 6, 1, 50, 10, '00:22:00', '2024-08-23'),
(32, 3, 6, 1, 50, 10, '00:22:00', '2024-08-23'),
(33, 3, 6, 1, 45, 10, '00:22:00', '2024-08-23'),
(34, 3, 6, 4, 50, 12, '00:22:00', '2024-08-23'),
(35, 3, 6, 4, 50, 12, '00:22:00', '2024-08-23'),
(36, 3, 6, 4, 50, 12, '00:22:00', '2024-08-23'),
(37, 3, 6, 4, 50, 12, '00:22:00', '2024-08-23'),
(38, 3, 6, 3, 40, 15, '00:22:00', '2024-08-23'),
(39, 3, 6, 3, 40, 15, '00:22:00', '2024-08-23'),
(40, 3, 6, 3, 40, 15, '00:22:00', '2024-08-23'),
(41, 3, 6, 6, 45, 12, '00:22:00', '2024-08-23'),
(42, 3, 6, 6, 45, 12, '00:22:00', '2024-08-23'),
(43, 3, 6, 6, 45, 12, '00:22:00', '2024-08-23');

-- --------------------------------------------------------

--
-- Структура таблицы `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `role` int(11) NOT NULL DEFAULT '2',
  `login` varchar(128) NOT NULL,
  `forename` varchar(128) NOT NULL,
  `surname` varchar(128) NOT NULL,
  `password` varchar(256) NOT NULL,
  `photo` varchar(128) NOT NULL,
  `call_number` varchar(128) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `users`
--

INSERT INTO `users` (`id`, `role`, `login`, `forename`, `surname`, `password`, `photo`, `call_number`) VALUES
(1, 1, 'alex01', 'Александр', 'Мишин', 'qwerty123', '', '79200432979'),
(2, 2, 'sveta01', 'Светлана', 'Золотухина', 'qwerty123', '', ''),
(3, 2, 'nastya01', 'Анастасия', 'Захарова', 'qwerty12345', '', ''),
(4, 2, 'mash01', 'Мария', 'Беляева', 'test123', '', ''),
(6, 2, 'sinichka', 'Екатерина', 'Синицкая', '3fc0a7acf087f549ac2b266baf94b8b1', '', ''),
(7, 2, 'dolgashov1', 'Артём', 'Долгашов', '3fc0a7acf087f549ac2b266baf94b8b1', '', '');

-- --------------------------------------------------------

--
-- Структура таблицы `user_program`
--

CREATE TABLE `user_program` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `id_program` int(11) NOT NULL,
  `date` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `user_program`
--

INSERT INTO `user_program` (`id`, `id_user`, `id_program`, `date`) VALUES
(3, 3, 6, '2024-08-23 20:24:49');

-- --------------------------------------------------------

--
-- Структура таблицы `workouts`
--

CREATE TABLE `workouts` (
  `id` int(11) NOT NULL,
  `title` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Дамп данных таблицы `workouts`
--

INSERT INTO `workouts` (`id`, `title`) VALUES
(6, 'Тренировка ног Захарова А.'),
(7, 'Тренировка верх Синицкая Е.');

--
-- Индексы сохранённых таблиц
--

--
-- Индексы таблицы `exercises`
--
ALTER TABLE `exercises`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`),
  ADD KEY `group_id` (`group_id`);

--
-- Индексы таблицы `muscle_group`
--
ALTER TABLE `muscle_group`
  ADD PRIMARY KEY (`id`);

--
-- Индексы таблицы `program_exercise`
--
ALTER TABLE `program_exercise`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_program` (`id_workout`),
  ADD KEY `exercise_id` (`exercise_id`);

--
-- Индексы таблицы `training_history`
--
ALTER TABLE `training_history`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_program` (`id_program`),
  ADD KEY `id_exercise` (`id_exercise`);

--
-- Индексы таблицы `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD KEY `login` (`login`);

--
-- Индексы таблицы `user_program`
--
ALTER TABLE `user_program`
  ADD PRIMARY KEY (`id`),
  ADD KEY `id_user` (`id_user`),
  ADD KEY `id_program` (`id_program`);

--
-- Индексы таблицы `workouts`
--
ALTER TABLE `workouts`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `id` (`id`);

--
-- AUTO_INCREMENT для сохранённых таблиц
--

--
-- AUTO_INCREMENT для таблицы `exercises`
--
ALTER TABLE `exercises`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=24;

--
-- AUTO_INCREMENT для таблицы `muscle_group`
--
ALTER TABLE `muscle_group`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `program_exercise`
--
ALTER TABLE `program_exercise`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=50;

--
-- AUTO_INCREMENT для таблицы `training_history`
--
ALTER TABLE `training_history`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=44;

--
-- AUTO_INCREMENT для таблицы `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- AUTO_INCREMENT для таблицы `user_program`
--
ALTER TABLE `user_program`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT для таблицы `workouts`
--
ALTER TABLE `workouts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=8;

--
-- Ограничения внешнего ключа сохраненных таблиц
--

--
-- Ограничения внешнего ключа таблицы `exercises`
--
ALTER TABLE `exercises`
  ADD CONSTRAINT `exercises_ibfk_1` FOREIGN KEY (`group_id`) REFERENCES `muscle_group` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `program_exercise`
--
ALTER TABLE `program_exercise`
  ADD CONSTRAINT `program_exercise_ibfk_1` FOREIGN KEY (`id_workout`) REFERENCES `workouts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `program_exercise_ibfk_2` FOREIGN KEY (`exercise_id`) REFERENCES `exercises` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `training_history`
--
ALTER TABLE `training_history`
  ADD CONSTRAINT `training_history_ibfk_1` FOREIGN KEY (`id_program`) REFERENCES `workouts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `training_history_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `training_history_ibfk_3` FOREIGN KEY (`id_exercise`) REFERENCES `exercises` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Ограничения внешнего ключа таблицы `user_program`
--
ALTER TABLE `user_program`
  ADD CONSTRAINT `user_program_ibfk_2` FOREIGN KEY (`id_user`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `user_program_ibfk_3` FOREIGN KEY (`id_program`) REFERENCES `workouts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
