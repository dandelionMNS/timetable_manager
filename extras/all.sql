INSERT INTO `batches` (`id`, `intake`, `semester`) VALUES
(1, '2023/Q1', NULL),
(2, '2023/Q3', 4),
(3, '2024/Q1', 3),
(4, '2024/Q3', 2),
(6, '2025/Q1', 1);

INSERT INTO `classrooms` (`id`, `name`) VALUES
(23, 'Kelas 1'),
(24, 'Kelas 2'),
(25, 'Kelas 3'),
(26, 'Makmal Komputer'),
(27, 'Dewan Seminar'),
(28, 'Makmal Sains'),
(29, 'Makmal Kimia'),
(30, 'Makmal Fizik'),
(31, 'Bilik Seni'),
(32, 'Bilik Muzik'),
(33, 'Makmal Biologi');

INSERT INTO `courses` (`id`, `code`, `semester`) VALUES
(1, 'SS1', '1'),
(2, 'S1', '1'),
(3, 'AAG1', '1'),
(4, 'AAG2', '2'),
(5, 'S2', '2'),
(6, 'SS2', '2'),
(7, 'AAG3', '3'),
(8, 'SS3', '3');

INSERT INTO `users` (`id`, `name`, `email`, `email_verified_at`, `user_type`, `password`, `remember_token`, `created_at`, `updated_at`, `matric_no`, `phone_no`, `batch_id`, `course_id`) VALUES
(1, 'admin', 'admin@gmail.com', NULL, 'admin', '$2y$12$qDaQlkk14q7mS0UGKzJ/O.PvRNiEzEPXoNAe.PQ2RcVxOQY2f92Va', NULL, '2024-06-10 21:54:48', '2024-06-10 21:54:48', NULL, NULL, NULL, NULL),
(2, 'stud1', 'stud1@gmail.com', NULL, 'student', '$2y$12$TY5laWKZUMbfnKSqQV8L1OYbzzBEgXROW3SQO.pEjJFaov5xJywhi', NULL, '2024-06-10 21:55:45', '2024-06-10 21:59:51', 'S001', NULL, NULL, NULL),
(3, 'stud2', 'stud2@gmail.com', NULL, 'student', '$2y$12$rob7CHvSpMWKIduwnD8M7O3JlhDb0sollaVygJcE3rSLYTo7vC/26', NULL, '2024-06-10 21:57:58', '2024-06-10 22:00:04', 'S002', NULL, NULL, NULL),
(4, 'stud3', 'stud3@gmail.com', NULL, 'student', '$2y$12$RZ3mfx02Xt.NnYi/qY1FAuADnpgyziggg.0yBwOE6Wpnph0ZmL9Ve', NULL, '2024-06-10 21:58:19', '2024-06-10 22:00:12', 'S003', NULL, NULL, NULL),
(5, 'teach1', 'teach1@gmail.com', NULL, 'teacher', '$2y$12$21En4oR/YkcGUwuyY4LcyeKihcCxgtIFnKLLe25H2OApnyKtYIXAK', NULL, '2024-06-10 21:58:41', '2024-06-10 22:00:20', 'T001', NULL, NULL, NULL),
(6, 'teach2', 'teach2@gmail.com', NULL, 'teacher', '$2y$12$EYkFXV4ORNZ/L4X9m48NJum3sH4Uf.zkK84a5XnouwxZpw0uOnbFq', NULL, '2024-06-10 21:58:59', '2024-06-10 22:00:31', 'T002', NULL, NULL, NULL),
(7, 'teach3', 'teach3@gmail.com', NULL, 'teacher', '$2y$12$rAYKMEaxyOTreciba764k.coHB.Y9A.DT..kYA9WHmPgEWYe47r7i', NULL, '2024-06-10 21:59:17', '2024-06-10 22:00:40', 'T003', NULL, NULL, NULL);

INSERT INTO `subjects` (`id`, `name`, `code`, `credit_hour`) VALUES
(1, 'Sejarah', 'SEJ', 2),
(8, 'Bahasa Malaysia', 'BM', 3),
(9, 'English Language', 'ENG', 3),
(10, 'Mathematics', 'MAT', 3),
(11, 'Additional Mathematics', 'AMT', 3),
(12, 'Calculus - I', 'CAL-I', 3),
(13, 'Physics', 'PHY', 3),
(14, 'Biology', 'BIO', 3),
(18, 'Chemistry', 'CHM', 3),
(19, 'Calculus II', 'CAL-II', 3);