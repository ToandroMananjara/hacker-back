-- phpMyAdmin SQL Dump
-- version 5.2.1
-- https://www.phpmyadmin.net/
--
-- Hôte : localhost
-- Généré le : ven. 22 nov. 2024 à 06:59
-- Version du serveur : 10.4.28-MariaDB
-- Version de PHP : 8.2.4

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Base de données : `nouvelle_teckher`
--

-- --------------------------------------------------------

--
-- Structure de la table `about`
--

CREATE TABLE `about` (
  `user_id` int(11) NOT NULL,
  `description` text DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `about`
--

INSERT INTO `about` (`user_id`, `description`) VALUES
(1, 'Salut tout le monde, moi c’est Nadia ! 😊 Eh! bien!, c\'est comme ça que ChatGpt me voit😂 Une passionnée par la technologie et les aventures épiques 🌟. Quand je ne suis pas en train de coder des projets complexes ou de bidouiller des configurations serveurs, je plonge tête première dans mes passions 🎉. Mes Projets Techniques 💻 Je vis et respire l’informatique 👨‍💻. Entre la gestion des bases de données 🗄️, la création de sites web dynamiques 🌐, et la programmation en C++, je ne m’ennuie jamais. Python et Selenium ? Ce sont mes partenaires de crime pour le web scraping, même quand un CAPTCHA essaie de me barrer la route 🤖🛑. Mon terrain de jeu préféré ? Ubuntu 22.04 LTS 🐧, un système fiable pour mes idées ambitieuses. Et puis, il y a la création vidéo 🎬 – l’art de transformer des souvenirs en diaporamas magiques 🎶✨. La qualité doit toujours être au rendez-vous, surtout pour que mes vidéos soient parfaites sur Facebook et ailleurs 📱🔍. Mes Passions Secrètes 🎌 Mon grand amour ? One Piece 🏴‍☠️⚓ ! L’histoire de Luffy et son équipage me fait vibrer comme rien d\'autre. Le rêve du One Piece, les batailles épiques, l’aventure sur les mers, et les liens d’amitié qui traversent toutes les tempêtes 🌊🌈. Chaque épisode est un voyage rempli d\'émotions et de surprises 💥😭. J’ai un faible pour le courage de Luffy, la loyauté de Zoro, et le rire contagieux de l’équipage 🤩😂. La volonté du D est une inspiration – moi aussi, je suis prêt à tout pour atteindre mes rêves et aider les autres à le faire 🚀✨. Mon Caractère 😄 Je suis curieuse et passionnée, toujours prête à découvrir de nouvelles choses 🧐. J’aime creuser profondément dans mes projets et ne lâche jamais avant de trouver la solution parfaite 💡. Un brin perfectionniste, j’accorde beaucoup d’importance aux détails ✨. J’adore aussi rigoler et partager des moments créatifs avec des amis ou des collègues 😆👥. Mais attention, quand il s’agit de coder ou de bosser sur un projet, je deviens sérieuse et concentrée comme une pirate en quête de trésor 🔎💪. Et bien sûr, j\'ai un côté joueur, j\'aime m\'amuser avec des personnages, que ce soit Jinx qui amène du chaos ou Vi avec sa force inébranlable 🔥🟦.'),
(2, 'Euh... Bonjour, je m\'appelle Mai Nekota, mais on me connaît surtout sous le nom de Nekonya ! 😸 Je suis en deuxième année à l\'académie pour filles Ôarai et je suis la chef de char et l\'opératrice radio de l\'équipe Fourmilier. Notre char, le Type 3 Chi-Nu, demande beaucoup de coordination, mais c\'est un défi que j\'aime relever. 😅\n\nJe suis plutôt timide et introvertie, et j\'ai toujours cette posture un peu affaissée... 🙈 J\'adore jouer à des jeux en ligne, surtout ceux qui impliquent des tanks, c\'est là que j\'ai rencontré mes amies et coéquipières Piyotan et Momoga 🎮. C\'est tellement plus facile de parler à des gens en ligne sans avoir à les regarder dans les yeux... 😳\n\nQuand je ne suis pas sur le champ de bataille ou devant mon ordinateur, j\'aime analyser des stratégies de bataille et m\'entraîner à charger des obus (oui, je suis plus forte qu\'on pourrait le croire ! 💪). Mon tank préféré en dehors de nos sessions est le Leopard 2, et j\'espère pouvoir le piloter un jour... ✨\n\nVoilà... je pense que c\'est tout ce qu\'il y a à savoir sur moi... 😸 ajuste ses oreilles de chat et baisse la tête timidement.'),
(3, 'Hey!!...You get Jinxed!!!, et mes passions, tu vois... c\'est tout ce qui fait BOOM et KABOOM 💣 ! J\'adore les explosions, les fusées, les canons, les grenades, et même les pétards 🧨. Un monde sans bruits fracassants, ça serait... ennuyeux 😒 ! Pourquoi faire dans la subtilité quand on peut tout faire péter et que ça brille comme des étoiles filantes ? 🌠 Côté caractère ? Oh, laisse-moi te dire, je suis complètement décalée 🤪. J’ai ce petit côté fou, tu sais, celui qui peut exploser de rire à n’importe quel moment, mais aussi plonger dans une folie totale sans prévenir. Si tu me dis que quelque chose est impossible... tu m’incites juste à le faire exploser 💥 ! J’ai cette énergie qui déborde, qui bouillonne sous ma peau, un peu comme un cocktail de poudre et d’étincelles. L’entourage ? Ah, c’est là que ça devient intéressant 🤭... Vi, ma chère grande sœur, elle pense toujours pouvoir m\'arrêter. Elle croit que je suis la petite fille qu’elle a laissée derrière, mais elle se trompe... Je suis libérée, imprévisible, et prête à tout pour semer le chaos 😜 ! Et puis, il y a des tas d\'autres joueurs dans ce monde de fous qui sont soit mes alliés, soit mes cibles... Qui sait ? 😏 Mais, au fond, tu sais, tout ça, ça cache une petite fille qui a juste voulu s\'amuser et être vue... avant que tout parte en vrille et que la seule manière de briller soit avec des explosions. 🎆 Alors, tu vois, je suis la folie incarnée, et rien ni personne ne pourra m\'arrêter. C’est un vrai feu d’artifice dans ma tête, et tout ce que je veux, c’est faire BOOM tout autour de moi 😈🔥.'),
(4, 'Here comes Vi!!\n Pas de surnoms ici, on garde les choses simples et directes. Les poings 🥊 – c’est mon truc, tu vois ? Je ne me laisse pas abattre, même quand tout va mal 😤. J’ai dû me battre pour tout ce que j’ai 💪, et je continue, toujours prête à encaisser, à me relever et à avancer 🚶‍♀️. Je crois en l’action, pas les paroles 💥. Quand je veux quelque chose, je vais chercher, je l\'obtiens 🔥. Et si ça ne passe pas par la porte 🚪, je fais une entrée fracassante par la fenêtre 🪟. Boom 💣, mais cette fois, c’est dans un autre genre.\n\nJ’ai grandi dans les bas-fonds de Zaun 🏙️, un endroit où la loi n’a jamais eu son mot à dire ⚖️. Mais moi, j\'avais cette conviction, ce besoin de justice ⚔️ qui m’a poussée à prendre les choses en main. C’est là que je suis devenue une combattante 🥋. Quand Jinx... bah, quand Jinx est apparue dans ma vie, je l’ai vue comme une petite sœur à protéger 👭, même si je savais qu’on n’était plus vraiment celles que nous étions. Elle a changé 😈, et moi aussi. Je me bats encore pour elle 💥, mais ce n\'est pas facile, tu sais.\n\nCôté caractère ? Je suis têtue 🐂. Quand je crois en quelque chose, je n\'abandonne pas 💯, même si ça veut dire que je dois tout sacrifier 🙅‍♀️. Le plus important pour moi, c’est la loyauté et la protection de ceux que j\'aime ❤️. Surtout ma sœur. Parce que peu importe tout ce qu’elle fait, c’est ma sœur 👭, et je ne vais jamais la laisser tomber 🛡️. Même si je ne suis pas toujours d’accord avec elle 🤦‍♀️, même si elle me fait sortir de mes gonds 😤, je suis là.\n\nMon entourage ? Eh bien, je n’ai pas toujours eu une équipe avec moi, mais j\'ai des alliés 👫... et aussi des ennemis 👊. Beaucoup. On me reconnaît souvent comme la \"flic de Piltover\" 🚔 ou la \"justicière\" 🦸‍♀️, et ça me va. J’ai un boulot à faire 💼, et parfois c’est à moi de rétablir l’ordre ⚖️, même si ce n’est pas facile avec tout ce qui se passe autour de moi 🌪️. Mais, la famille, c\'est ce qui compte le plus pour moi 👨‍👩‍👧‍👦. Jinx, même si elle a sa propre folie 🤪, reste ma priorité.\n\nBref, je suis Vi 💥. Une force brute 💪, une protection 🛡️, une tempête de justice ⚖️. Et peu importe ce qui m\'attend, je vais toujours me battre pour ce que je crois 🥊🔥.\n\nEt maintenant, prépare-toi... ce n’est pas parce que je parle moins fort que je frappe moins fort 💥👊.'),
(8, 'test update description');

-- --------------------------------------------------------

--
-- Structure de la table `auth_tokens`
--

CREATE TABLE `auth_tokens` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `token` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `expires_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

-- --------------------------------------------------------

--
-- Structure de la table `comments`
--

CREATE TABLE `comments` (
  `id` int(11) NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `comments`
--

INSERT INTO `comments` (`id`, `post_id`, `user_id`, `content`, `created_at`) VALUES
(91, 91, 1, 'My first love and my only one!!', '2024-11-02 14:10:58'),
(94, 140, 2, 'Just right!! :D', '2024-11-07 05:40:38'),
(95, 137, 2, 'Woke up like this! *^^*', '2024-11-07 05:41:42'),
(96, 141, 2, 'Love you sweetie!!', '2024-11-07 05:42:25'),
(98, 97, 2, 'My girls', '2024-11-08 12:40:23'),
(99, 107, 2, 'Cool!!!', '2024-11-09 11:40:06'),
(100, 107, 1, 'You\\\'re amazing girl!!', '2024-11-09 11:41:34'),
(101, 126, 2, 'Wanna visit it!!', '2024-11-09 12:23:26'),
(102, 95, 2, 'Sunny day!!', '2024-11-09 12:25:35'),
(103, 145, 4, 'Hi! cupcake!', '2024-11-10 12:00:37'),
(104, 126, 1, 'I like it!!', '2024-11-10 12:04:57'),
(105, 141, 3, 'Good vibe!!', '2024-11-10 17:54:59'),
(106, 146, 2, 'I like your style! Crazy!!', '2024-11-13 18:51:02'),
(107, 145, 3, 'Lila!! My color!', '2024-11-13 19:14:24'),
(108, 107, 2, 'Cool!', '2024-11-20 08:31:09');

-- --------------------------------------------------------

--
-- Structure de la table `comment_reactions`
--

CREATE TABLE `comment_reactions` (
  `id` int(11) NOT NULL,
  `comment_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `reaction_type` enum('like','dislike') NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `comment_reactions`
--

INSERT INTO `comment_reactions` (`id`, `comment_id`, `user_id`, `reaction_type`, `created_at`) VALUES
(6, 91, 1, 'like', '2024-11-02 14:11:06'),
(7, 91, 2, 'like', '2024-11-07 05:28:26'),
(8, 96, 3, 'like', '2024-11-09 15:35:35'),
(9, 103, 3, 'like', '2024-11-10 17:55:43'),
(10, 105, 1, 'like', '2024-11-10 17:58:07'),
(11, 105, 4, 'like', '2024-11-10 19:43:01');

-- --------------------------------------------------------

--
-- Structure de la table `cover_photo`
--

CREATE TABLE `cover_photo` (
  `photo_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `photo_path` varchar(255) DEFAULT NULL,
  `uploaded_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `cover_photo`
--

INSERT INTO `cover_photo` (`photo_id`, `user_id`, `photo_path`, `uploaded_at`) VALUES
(1, 2, 'http://localhost/Devoi_socila_media/src/backend/uploads/cover_photos/67239a6a74325_Anteater.Team.full.2361473.jpg', '2024-10-31 14:55:38'),
(2, 3, 'http://localhost/Devoi_socila_media/src/backend/uploads/cover_photos/672397c8a4fa9_18br-jinx-arcane-loadingscreen-1920x1080-2.jpg', '2024-10-31 14:44:24'),
(3, 1, 'http://localhost/Devoi_socila_media/src/backend/uploads/cover_photos/6723997c671d3_my_cover_photo.jpeg', '2024-10-31 14:51:40'),
(4, 4, 'http://localhost/Devoi_socila_media/src/backend/uploads/cover_photos/67239a440f352_vi_arcane___league_of_legends_by_zasinlow_deu6xc0-pre.jpg', '2024-10-31 14:55:00'),
(5, 8, 'http://localhost/Devoi_socila_media/src/backend/uploads/cover_photos/673b787bc8912_annoyed-oreki-houtarou-d4zz62qofltldvxz.jpg', '2024-11-18 17:25:16');

-- --------------------------------------------------------

--
-- Structure de la table `followers`
--

CREATE TABLE `followers` (
  `follower_id` int(11) NOT NULL,
  `followed_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `followers`
--

INSERT INTO `followers` (`follower_id`, `followed_id`) VALUES
(1, 2),
(1, 3),
(1, 4),
(2, 1),
(2, 3),
(2, 4),
(2, 6),
(3, 1),
(3, 2),
(4, 1),
(6, 1);

-- --------------------------------------------------------

--
-- Structure de la table `forum_messages`
--

CREATE TABLE `forum_messages` (
  `id` int(11) NOT NULL,
  `sender_id` int(11) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `sent_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `forum_messages`
--

INSERT INTO `forum_messages` (`id`, `sender_id`, `content`, `sent_at`) VALUES
(1, 2, 'Hey! everybody!', '2024-11-15 06:11:04'),
(2, 3, 'Hi! It\'s me!!! Jinx', '2024-11-15 06:11:37'),
(3, 1, 'Hi! Guys!!', '2024-11-15 06:28:00'),
(4, 2, 'cc', '2024-11-20 04:59:51'),
(5, 2, 'hey', '2024-11-20 05:00:05'),
(6, 2, 'kuku', '2024-11-20 05:06:34'),
(7, 2, 'test', '2024-11-20 05:09:05'),
(8, 2, 'test 1', '2024-11-20 05:10:09'),
(9, 2, 'lulu', '2024-11-20 05:11:37'),
(10, 2, 'lili', '2024-11-20 05:12:55'),
(11, 2, 'I\'m tired', '2024-11-20 08:18:32'),
(12, 1, 'You can do it girl!', '2024-11-20 08:58:20'),
(13, 2, 'Slut Oreki', '2024-11-21 08:10:00');

-- --------------------------------------------------------

--
-- Structure de la table `location`
--

CREATE TABLE `location` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `country` varchar(100) NOT NULL,
  `city` varchar(100) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `location`
--

INSERT INTO `location` (`id`, `user_id`, `country`, `city`) VALUES
(1, 1, 'Japan', 'Himeji'),
(2, 2, 'Japan', 'Hokota'),
(3, 3, 'Valoran', 'Zaun'),
(4, 4, 'Valoran', 'Zaun'),
(5, 8, 'Japan', 'Kamitani');

-- --------------------------------------------------------

--
-- Structure de la table `notifications`
--

CREATE TABLE `notifications` (
  `id` int(11) NOT NULL,
  `actor_id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `type` enum('follow','reaction','comment','comment_reaction','new_post','signalement') NOT NULL,
  `is_read` tinyint(1) DEFAULT 0,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `notifications`
--

INSERT INTO `notifications` (`id`, `actor_id`, `user_id`, `type`, `is_read`, `created_at`) VALUES
(1, 3, 1, 'reaction', 1, '2024-11-10 17:54:28'),
(2, 3, 1, 'comment', 1, '2024-11-10 17:54:59'),
(3, 3, 1, 'reaction', 1, '2024-11-10 17:55:09'),
(4, 3, 4, 'comment_reaction', 1, '2024-11-10 17:55:43'),
(5, 3, 1, 'new_post', 1, '2024-11-10 17:56:18'),
(6, 3, 2, 'new_post', 1, '2024-11-10 17:56:18'),
(7, 3, 2, 'follow', 1, '2024-11-10 17:57:06'),
(8, 1, 3, 'comment_reaction', 1, '2024-11-10 17:58:07'),
(9, 4, 3, 'comment_reaction', 1, '2024-11-10 19:43:01'),
(10, 1, 2, 'follow', 1, '2024-11-11 08:14:27'),
(11, 1, 6, 'follow', 0, '2024-11-11 08:14:53'),
(12, 2, 3, 'reaction', 1, '2024-11-11 09:12:43'),
(13, 2, 3, 'comment', 1, '2024-11-13 18:51:02'),
(14, 3, 2, 'reaction', 1, '2024-11-13 18:52:05'),
(15, 2, 3, 'reaction', 1, '2024-11-13 18:55:08'),
(16, 2, 3, 'reaction', 1, '2024-11-13 18:55:22'),
(17, 3, 1, 'comment', 1, '2024-11-13 19:14:24'),
(18, 2, 1, 'follow', 1, '2024-11-15 10:39:50'),
(19, 2, 1, 'new_post', 1, '2024-11-16 20:25:45'),
(20, 2, 3, 'new_post', 0, '2024-11-16 20:25:45'),
(21, 2, 1, 'new_post', 1, '2024-11-18 07:44:21'),
(22, 2, 3, 'new_post', 0, '2024-11-18 07:44:21'),
(23, 2, 1, 'new_post', 1, '2024-11-18 07:48:14'),
(24, 2, 3, 'new_post', 0, '2024-11-18 07:48:14'),
(25, 2, 1, 'new_post', 1, '2024-11-18 08:53:42'),
(26, 2, 3, 'new_post', 0, '2024-11-18 08:53:42'),
(27, 2, 1, 'new_post', 1, '2024-11-18 08:58:36'),
(28, 2, 3, 'new_post', 0, '2024-11-18 08:58:36'),
(29, 2, 1, 'new_post', 1, '2024-11-18 10:27:22'),
(30, 2, 3, 'new_post', 0, '2024-11-18 10:27:22'),
(31, 2, 8, 'signalement', 1, '2024-11-18 19:33:19'),
(32, 2, 8, 'signalement', 1, '2024-11-18 19:35:19'),
(33, 2, 8, 'signalement', 1, '2024-11-18 19:35:43'),
(34, 2, 8, 'signalement', 1, '2024-11-18 19:37:45'),
(35, 2, 8, 'signalement', 1, '2024-11-18 19:38:07'),
(36, 2, 8, 'signalement', 1, '2024-11-18 19:51:53'),
(37, 2, 8, 'signalement', 1, '2024-11-18 20:01:13'),
(38, 2, 8, 'signalement', 1, '2024-11-19 11:59:00'),
(39, 2, 8, 'signalement', 1, '2024-11-19 11:59:02'),
(40, 2, 8, 'signalement', 1, '2024-11-20 04:55:02'),
(41, 2, 8, 'signalement', 1, '2024-11-20 08:26:52'),
(42, 2, 2, 'reaction', 1, '2024-11-20 08:30:57'),
(43, 2, 2, 'comment', 1, '2024-11-20 08:31:09'),
(44, 2, 4, 'follow', 0, '2024-11-21 08:10:52'),
(45, 2, 8, 'signalement', 1, '2024-11-21 08:14:01'),
(46, 2, 8, 'signalement', 1, '2024-11-21 08:14:04'),
(47, 2, 8, 'signalement', 1, '2024-11-21 08:14:13');

-- --------------------------------------------------------

--
-- Structure de la table `posts`
--

CREATE TABLE `posts` (
  `id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `content` text NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `comment_count` int(11) DEFAULT 0,
  `doc_type` enum('photo','video','pdf') DEFAULT NULL,
  `doc_url` varchar(255) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `posts`
--

INSERT INTO `posts` (`id`, `user_id`, `content`, `created_at`, `comment_count`, `doc_type`, `doc_url`) VALUES
(91, 1, 'The word of my man!! :)', '2024-11-02 14:10:27', 1, 'photo', 'http://localhost/Devoi_socila_media/public/documents/photos/95eda73aa9cd11ed27acc28a210c6d73.jpg'),
(92, 1, 'Bonne lecture!!', '2024-11-02 14:11:54', 0, 'pdf', 'http://localhost/Devoi_socila_media/public/documents/pdfs/transport.pdf'),
(93, 1, 'With the right boy!! XD', '2024-11-02 14:13:35', 0, 'video', 'http://localhost/Devoi_socila_media/public/documents/videos/Boa.mp4'),
(95, 1, 'Beautiful me!', '2024-11-02 14:51:16', 1, 'photo', 'http://localhost/Devoi_socila_media/public/documents/photos/beautiful.jpeg'),
(96, 1, 'Ito ilay pdf', '2024-11-02 14:53:11', 0, 'pdf', 'http://localhost/Devoi_socila_media/public/documents/pdfs/Ralaikoto_Mamilalao_Sitraka_Nadia.pdf'),
(97, 2, '\"Quand tes coéquipières te rappellent qu’il faut manger autre chose que des pixels 🍒🍉📲… Merci les filles, vous êtes les meilleures ! Mais, attendez juste que je finisse ce niveau, c’est super important, ok ? 😼🎮\"', '2024-11-02 15:29:25', 1, 'photo', 'http://localhost/Devoi_socila_media/public/documents/photos/Anteater.Team.full.2361473.jpg'),
(98, 2, '\"Quand tu es coincée entre le monde réel et le monde du jeu, mais que tu préfères avoir ta manette à la main plutôt que de parler aux gens… 🎮😅 Pourquoi affronter la réalité quand je peux conquérir des niveaux dans mes jeux préférés ? Parfois, un peu de solitude est exactement ce qu\'il me faut pour me ressourcer. Allez, Nekota, tu peux le faire ! Une aventure à la fois ! 🌟\"', '2024-11-02 15:39:19', 0, 'photo', 'http://localhost/Devoi_socila_media/public/documents/photos/d9bv30q-be6160b2-37ee-4cb0-83c0-6f1ad0a6f7e1.png'),
(99, 2, '\"Prêtes pour l’affrontement ! 💥🌤️ Que ce soit sur le champ de bataille ou dans le monde virtuel, rien ne peut nous arrêter quand on est ensemble. 💪🎮 Que les jeux commencent, et que la meilleure équipe gagne ! Aucune timidité ici, juste l’esprit de compétition et beaucoup de rires ! 😄✨\"', '2024-11-02 15:42:25', 0, 'photo', 'http://localhost/Devoi_socila_media/public/documents/photos/girls_und_panzer-10-nekota-momoga-piyotan-nekonya-world_of_tanks-nekomimi-glasses-eye_patch-peach-freckles.jpg'),
(100, 2, '\"Quand le défi est de taille, je ne recule jamais ! 💪🌟 Que ce soit sur le champ de bataille ou sur le terrain de sport, je suis toujours prête à me battre et à me dépasser. 🏃‍♀️🎉 Dans Girls und Panzer, j’aime non seulement piloter mon char, mais aussi faire du sport avec mes amies. Chaque entraînement nous renforce et nous unit davantage ! Que l\'on soit en plein combat de chars ou en train de marquer un but, je donne tout ce que j’ai ! 🏆🎮\"', '2024-11-02 15:44:49', 0, 'photo', 'http://localhost/Devoi_socila_media/public/documents/photos/hq720.jpg'),
(101, 2, '\"On est prêtes à faire du bruit dans le monde du gaming ! 🎮🔥 Avec ma crew, le style est aussi important que le jeu. On vit pour ces moments de compétition et de fun, et rien ne nous arrête ! Let’s roll, les jeux nous attendent ! 😎✨\"', '2024-11-02 15:49:08', 0, 'photo', 'http://localhost/Devoi_socila_media/public/documents/photos/GuP-Game-PSV-Ann.jpg'),
(103, 2, '\"Aujourd\'hui, je partage avec vous ma présentation sur les stratégies de jeu dans World of Tanks! 🚀💥 Chaque bataille est une nouvelle opportunité d\'apprendre et de s\'améliorer, et je suis impatiente de vous montrer comment j\'optimise mes compétences pour tirer le meilleur parti de chaque match. 🔍🎮 Cliquez sur le lien pour télécharger le fichier PDF contenant mes conseils et méthodes : [stratégies_gaming_world_of_tanks.pdf] Ensemble, explorons cet univers passionnant et devenons des pros du gaming ! 💪✨\"_ Je suis impatiente de connaître vos retours et vos propres astuces de jeu !', '2024-11-02 16:00:59', 0, 'pdf', 'http://localhost/Devoi_socila_media/public/documents/pdfs/strategies_gaming_world_of_tanks.pdf'),
(107, 2, '\"En plein combat avec mes amis dans Girl und Panzer ! 💣🚗💨 Give it all for the fun and the adrenaline! Let’s go! 🌟💪🎮\"', '2024-11-02 16:44:51', 3, 'video', 'http://localhost/Devoi_socila_media/public/documents/videos/Girls und Panzer der Film[Chi-nu reload].mp4'),
(108, 2, '\"私のプレゼンテーションをぜひご覧ください！🌟 このPDFでは、私が誰であるか、私の情熱、そして私がゲームの大ファンである理由を共有しています。 🎮💖 私の世界を覗いてみて、感想を教えてください！あなたのフィードバックはいつでも大歓迎です！😊✨\r\n\r\nこちらからダウンロード： [Presentation_Nekota_Personnalite_Passions.pdf]\r\n\r\n冒険に飛び込む準備はできましたか？行こう！🚀\"_', '2024-11-02 16:49:58', 0, 'pdf', 'http://localhost/Devoi_socila_media/public/documents/pdfs/Nekonya.pdf'),
(111, 3, '“Watch out, Piltover! Jinx is in the house, and she’s ready to rock your world!” 💣🔥', '2024-11-02 17:20:15', 0, 'photo', 'http://localhost/Devoi_socila_media/public/documents/photos/download.jpeg'),
(112, 3, '💥💥 It’s Me! 💥💥', '2024-11-02 17:22:11', 0, 'photo', 'http://localhost/Devoi_socila_media/public/documents/photos/download (2).jpeg'),
(115, 3, '💣💥 Jinx Was Here! 💥💣', '2024-11-02 17:26:26', 0, 'photo', 'http://localhost/Devoi_socila_media/public/documents/photos/download (6).jpeg'),
(116, 3, '💥💥 BOOM, BABY! 💥💥', '2024-11-02 17:26:51', 0, 'photo', 'http://localhost/Devoi_socila_media/public/documents/photos/download (3).jpeg'),
(117, 3, '💥💥 Welcome to the Chaos! 💥💥', '2024-11-02 17:30:38', 0, 'photo', 'http://localhost/Devoi_socila_media/public/documents/photos/c7ba56182385331.Y3JvcCwxMzgwLDEwODAsMjcwLDA.png'),
(118, 3, '💥💥 Let\'s play! Boom!! 💥💥', '2024-11-02 17:31:28', 0, 'photo', 'http://localhost/Devoi_socila_media/public/documents/photos/Fortnite-Jinx.jpg'),
(119, 3, '👑💥 All Hail the Queen of Chaos! 💥👑\r\n\r\nBow down, my chaotic minions! It’s me, Jinx, the one and only Queen of Chaos! 🎉💣\r\n\r\nWith a flick of my wrist and a mischievous grin, I reign over the wildest pandemonium! Every explosion is my royal decree, every laugh a note in my chaotic symphony!\r\n\r\nWhy follow the rules when you can create your own? I say let’s throw a party with fireworks, confetti, and a whole lot of mayhem! 🎆✨\r\n\r\nSo, remember, when chaos calls, I’m there to answer! You better believe it: the Queen of Chaos is always ready to stir things up!\r\n\r\nKeep your eyes peeled, because with me on the throne, life is never dull!\r\n\r\nLong live chaos, and may the explosions be ever in your favor!', '2024-11-02 17:33:03', 0, 'pdf', 'http://localhost/Devoi_socila_media/public/documents/pdfs/What!?.pdf'),
(120, 3, '💥💣 I Jinx Everything! 💣💥\r\n\r\nYou thought things were going smoothly? Think again! When Jinx is in the house, chaos isn’t just a possibility—it’s a guarantee! 🎉✨\r\n\r\nEvery plan I touch turns into an adventure of mayhem! Whether it’s a simple heist or just trying to enjoy a nice day out, you better believe I’m bringing the chaos along for the ride!\r\n\r\n“Oops!” I chuckle as things go haywire. It’s like I have this magical touch that turns the ordinary into the explosive! Who needs a boring life when you can have a little pandemonium sprinkled in?\r\n\r\nSo, if you see me around, brace yourselves! I jinx everything, and it’s going to be one wild ride! Hold on tight, because with me in the mix, it’s never just a casual day—it’s an all-out explosion of fun!\r\n\r\nWelcome to my world, where everything is chaos, and I’m the queen of the ride!', '2024-11-02 17:34:35', 0, 'pdf', 'http://localhost/Devoi_socila_media/public/documents/pdfs/Chaos!!!.pdf'),
(121, 3, '💥💣 Hey there, chaos lovers! 💣💥\r\n\r\nBOOM! It’s me, Jinx, dropping in to say hi! 🎉✨ If you thought today was going to be boring, you’re in for a wild ride!', '2024-11-02 17:36:26', 0, 'video', 'http://localhost/Devoi_socila_media/public/documents/videos/BORING! __ Arcane - Jinx Edit __ Beautiful is Boring - BONES UK.mp4'),
(123, 3, '💥💣 Let’s turn up the chaos and make some noise! 💣💥', '2024-11-02 17:39:12', 0, 'video', 'http://localhost/Devoi_socila_media/public/documents/videos/Jinx is so 😩 #jinx #arcane #edit #viral #trending.mp4'),
(124, 3, '💥🎶 “Get Jinx” 🎶💥', '2024-11-02 17:41:14', 0, 'video', 'http://localhost/Devoi_socila_media/public/documents/videos/JINX LISTENING TO GET JINXED LULW  _ ARCANE #shorts #arcane #leagueoflegends.mp4'),
(125, 3, '“Hey, Vi! Ready to dance in the chaos and show the world how wild we can be?”', '2024-11-02 17:42:14', 0, NULL, NULL),
(126, 3, '💣🎉 “Step right up to Jinx’s Chaos Emporium, where every item is a blast! Get your hands on explosive goodies that’ll blow your mind and bring a little mayhem to your life! Shop now and embrace the madness!” 🎉💣', '2024-11-02 17:43:41', 2, 'video', 'http://localhost/Devoi_socila_media/public/documents/videos/Jinx_boutique.mp4'),
(127, 4, 'Jinx, you\'re my sister and nothing will gonna change that.', '2024-11-02 18:08:11', 0, 'pdf', 'http://localhost/Devoi_socila_media/public/documents/pdfs/letter_to_my_sister.pdf'),
(128, 4, 'All of you!, hear me now!', '2024-11-02 18:11:12', 0, 'pdf', 'http://localhost/Devoi_socila_media/public/documents/pdfs/Hear_me_now.pdf'),
(133, 4, 'She is making marketing now! hahahh', '2024-11-02 18:29:20', 0, 'video', 'http://localhost/Devoi_socila_media/public/documents/videos/Jinx_boutique.mp4'),
(134, 4, 'Hi!Piltover!', '2024-11-02 18:30:19', 0, 'photo', 'http://localhost/Devoi_socila_media/public/documents/photos/violet-arcane-ezv7a3xm79h1i6io.jpg'),
(135, 4, 'Love you Pow-Pow! :)', '2024-11-02 18:31:34', 0, 'photo', 'http://localhost/Devoi_socila_media/public/documents/photos/images (1).jpeg'),
(136, 4, 'Huhh!! Such a joke!', '2024-11-02 18:32:16', 0, 'photo', 'http://localhost/Devoi_socila_media/public/documents/photos/violet-arcane.jpg'),
(137, 1, 'woke_up', '2024-11-02 19:07:38', 1, 'video', 'http://localhost/Devoi_socila_media/public/documents/videos/woke_up.mp4'),
(140, 1, 'Just right', '2024-11-02 19:10:39', 1, 'video', 'http://localhost/Devoi_socila_media/public/documents/videos/just_right.mp4'),
(141, 1, 'Katseye', '2024-11-02 19:11:24', 2, 'video', 'http://localhost/Devoi_socila_media/public/documents/videos/katseye.mp4'),
(145, 1, 'Hey! Guys!!', '2024-11-09 12:44:38', 2, 'photo', 'http://localhost/Devoi_socila_media/public/documents/photos/lila.jpg'),
(146, 3, 'It\'s coming!!', '2024-11-10 17:56:18', 1, NULL, NULL),
(148, 2, 'Abus verbal', '2024-11-18 07:44:21', 0, 'video', 'http://localhost/Devoi_socila_media/public/documents/videos/recorded-video.mp4'),
(149, 2, 'Harcelement', '2024-11-18 07:48:14', 0, 'pdf', 'http://localhost/Devoi_socila_media/public/documents/pdfs/transport.pdf'),
(150, 2, 'Harcelement', '2024-11-18 08:53:42', 0, 'pdf', 'http://localhost/Devoi_socila_media/public/documents/pdfs/transport.pdf'),
(151, 2, 'Harcelement', '2024-11-18 08:58:36', 0, 'pdf', 'http://localhost/Devoi_socila_media/public/documents/pdfs/transport.pdf'),
(152, 2, 'Harcelement', '2024-11-18 10:27:22', 0, 'pdf', 'http://localhost/Devoi_socila_media/public/documents/pdfs/transport.pdf');

-- --------------------------------------------------------

--
-- Structure de la table `post_reactions`
--

CREATE TABLE `post_reactions` (
  `id` int(11) NOT NULL,
  `post_id` int(11) DEFAULT NULL,
  `user_id` int(11) DEFAULT NULL,
  `reaction_type` enum('like','love','haha','sad','angry') NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `post_reactions`
--

INSERT INTO `post_reactions` (`id`, `post_id`, `user_id`, `reaction_type`, `created_at`) VALUES
(28, 91, 1, 'love', '2024-11-02 14:10:35'),
(29, 92, 1, 'like', '2024-11-02 14:12:00'),
(30, 93, 1, 'love', '2024-11-02 14:13:43'),
(31, 95, 1, 'love', '2024-11-02 14:51:24'),
(32, 96, 1, 'like', '2024-11-02 14:53:21'),
(33, 97, 2, 'love', '2024-11-02 15:29:41'),
(34, 98, 2, 'love', '2024-11-02 15:39:31'),
(35, 99, 2, 'like', '2024-11-02 15:42:38'),
(36, 103, 2, 'like', '2024-11-02 16:01:08'),
(38, 111, 3, 'like', '2024-11-02 17:20:27'),
(39, 112, 3, 'like', '2024-11-02 17:22:18'),
(42, 117, 3, 'love', '2024-11-02 17:30:49'),
(43, 118, 3, 'love', '2024-11-02 17:31:37'),
(44, 127, 4, 'love', '2024-11-02 18:08:19'),
(45, 128, 4, 'love', '2024-11-02 18:11:26'),
(46, 134, 4, 'like', '2024-11-02 18:30:28'),
(47, 135, 4, 'love', '2024-11-02 18:31:41'),
(48, 136, 4, 'haha', '2024-11-02 18:32:24'),
(49, 137, 1, 'love', '2024-11-02 19:07:54'),
(50, 140, 1, 'love', '2024-11-02 19:10:58'),
(51, 141, 2, 'love', '2024-11-07 05:34:15'),
(52, 140, 2, 'love', '2024-11-07 05:36:57'),
(53, 137, 2, 'like', '2024-11-07 05:40:49'),
(54, 96, 2, 'haha', '2024-11-07 05:41:56'),
(55, 95, 2, 'love', '2024-11-07 05:42:07'),
(56, 93, 2, 'haha', '2024-11-07 05:42:36'),
(57, 92, 2, 'like', '2024-11-07 05:42:48'),
(58, 91, 2, 'love', '2024-11-07 05:42:58'),
(59, 126, 2, 'like', '2024-11-09 12:59:38'),
(60, 126, 1, 'love', '2024-11-09 12:53:44'),
(61, 125, 2, 'haha', '2024-11-09 15:55:34'),
(62, 145, 2, 'love', '2024-11-09 18:56:00'),
(63, 145, 4, 'love', '2024-11-09 21:28:05'),
(64, 125, 1, 'haha', '2024-11-10 12:05:10'),
(65, 141, 3, 'love', '2024-11-10 17:54:28'),
(66, 145, 3, 'love', '2024-11-10 17:55:09'),
(67, 146, 2, 'like', '2024-11-11 09:12:43'),
(68, 107, 3, 'love', '2024-11-13 18:52:05'),
(69, 123, 2, 'love', '2024-11-13 18:55:08'),
(70, 115, 2, 'like', '2024-11-13 18:55:22'),
(71, 107, 2, 'love', '2024-11-20 08:30:57');

-- --------------------------------------------------------

--
-- Structure de la table `private_messages`
--

CREATE TABLE `private_messages` (
  `id` int(11) NOT NULL,
  `sender_id` int(11) DEFAULT NULL,
  `receiver_id` int(11) DEFAULT NULL,
  `content` text DEFAULT NULL,
  `sent_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `private_messages`
--

INSERT INTO `private_messages` (`id`, `sender_id`, `receiver_id`, `content`, `sent_at`) VALUES
(1, 1, 2, 'Coucou neko!!', '2024-11-15 10:08:10'),
(2, 1, 2, 'Coucou neko', '2024-11-15 10:08:26'),
(3, 2, 1, 'Ah!!, Coucou Nadia!', '2024-11-15 10:40:42'),
(4, 2, 1, 'What\'up today?', '2024-11-15 12:12:46'),
(5, 1, 2, 'Still busy, I wanna go to the beach. Hahahh! ', '2024-11-15 13:08:47'),
(6, 2, 1, 'Busy to playing video games hihiihh!!', '2024-11-15 13:11:19'),
(7, 2, 1, 'So!?', '2024-11-15 13:22:48'),
(8, NULL, NULL, NULL, '2024-11-15 13:22:48'),
(9, 2, 1, 'So', '2024-11-15 13:23:08'),
(10, 2, 1, 'That\'s okay', '2024-11-15 13:23:29'),
(11, 2, 1, 'Salut!, nadia', '2024-11-18 18:25:42'),
(12, 2, 1, 'Coucou', '2024-11-20 05:17:09'),
(13, 1, 2, 'Salut!, Neko.', '2024-11-20 08:20:32');

-- --------------------------------------------------------

--
-- Structure de la table `profile_photo`
--

CREATE TABLE `profile_photo` (
  `photo_id` int(11) NOT NULL,
  `user_id` int(11) DEFAULT NULL,
  `photo_path` varchar(255) DEFAULT NULL,
  `uploaded_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `profile_photo`
--

INSERT INTO `profile_photo` (`photo_id`, `user_id`, `photo_path`, `uploaded_at`) VALUES
(1, 1, 'http://localhost/Devoi_socila_media/src/backend/uploads/profile_photos/6723b61feb280_profile.png', '2024-10-31 16:53:51'),
(2, 3, 'http://localhost/Devoi_socila_media/src/backend/uploads/profile_photos/6723c6e59516c_4003a0164037349.Y3JvcCw4NzEsNjgyLDQwMyww.png', '2024-10-31 18:05:25'),
(3, 4, 'http://localhost/Devoi_socila_media/src/backend/uploads/profile_photos/6723cdacdf7df_73671120146532-2.jpeg', '2024-10-31 18:34:20'),
(4, 2, 'http://localhost/Devoi_socila_media/src/backend/uploads/profile_photos/6726434938717_zU1SBSa2_400x400.jpg', '2024-11-02 15:20:41'),
(5, 8, 'http://localhost/Devoi_socila_media/src/backend/uploads/profile_photos/673b789285f86_Oreki.jpg', '2024-11-18 17:25:38');

-- --------------------------------------------------------

--
-- Structure de la table `security_complaints`
--

CREATE TABLE `security_complaints` (
  `id` int(11) NOT NULL,
  `signalement_id` int(11) NOT NULL COMMENT 'Référence au signalement',
  `responsible_service` varchar(255) NOT NULL COMMENT 'Nom du service responsable',
  `next_step` varchar(255) DEFAULT NULL COMMENT 'Prochaine étape prévue',
  `next_date` date DEFAULT NULL COMMENT 'Date prévue pour la prochaine étape',
  `current_status` varchar(255) NOT NULL COMMENT 'Statut actuel de l’affaire',
  `service_comments` varchar(255) DEFAULT NULL COMMENT 'Commentaires sur le service',
  `created_at` timestamp NULL DEFAULT current_timestamp() COMMENT 'Date de création de l’enregistrement',
  `updated_at` timestamp NULL DEFAULT current_timestamp() ON UPDATE current_timestamp() COMMENT 'Date de mise à jour de l’enregistrement',
  `priority` enum('haute','moyenne','faible') DEFAULT 'moyenne'
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `security_complaints`
--

INSERT INTO `security_complaints` (`id`, `signalement_id`, `responsible_service`, `next_step`, `next_date`, `current_status`, `service_comments`, `created_at`, `updated_at`, `priority`) VALUES
(1, 4, 'Oreki', 'enquete', '2024-11-19', 'Assigné', 'On va fournir des nouvelles prochainement.', '2024-11-19 05:11:29', '2024-11-19 05:56:50', 'haute'),
(2, 3, 'Oreki', 'interview', '2024-11-20', 'En attente de résolution', 'Toujours en attente de nouvelles.', '2024-11-19 05:15:12', '2024-11-19 05:15:12', 'moyenne'),
(3, 2, 'Oreki', 'audience', '2024-11-21', 'En appel', 'Votre présence est requise lors de l\'audience.', '2024-11-19 05:17:13', '2024-11-19 05:17:13', 'moyenne'),
(4, 1, 'Oreki', 'cloture_enquete', '2024-11-22', 'Clôturé', 'Merci je de nous avoir remis votre confiance.', '2024-11-19 05:18:47', '2024-11-19 05:18:47', 'moyenne'),
(5, 6, 'Oreki', 'enquete', '2024-11-23', 'Reçu', 'Ajouter des preuves', '2024-11-19 12:03:48', '2024-11-19 12:03:48', 'haute'),
(6, 8, 'Oreki', 'enquete', '2024-12-31', 'Reçu', 'En attente de preuves', '2024-11-20 08:28:23', '2024-11-20 08:28:23', 'haute'),
(7, 5, 'Oreki', 'appel_a_temoin', '2023-12-24', 'En appel', 'En attente du temoins', '2024-11-20 11:18:39', '2024-11-20 11:18:39', 'moyenne'),
(8, 7, 'Oreki', 'appel_a_temoin', '2023-04-07', 'Clôturé', 'Aucune signalement de violence.', '2024-11-20 11:20:04', '2024-11-20 11:20:04', 'faible'),
(9, 11, 'Oreki', 'audience', '2024-12-31', 'En attente de résolution', 'En attente des preuves.', '2024-11-21 08:17:35', '2024-11-21 08:17:35', 'moyenne');

-- --------------------------------------------------------

--
-- Structure de la table `signalements`
--

CREATE TABLE `signalements` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `receiver_id` int(11) NOT NULL,
  `full_name` varchar(255) NOT NULL,
  `date` date NOT NULL,
  `hour` time NOT NULL,
  `location` varchar(255) NOT NULL,
  `description` text NOT NULL,
  `file_path` varchar(255) DEFAULT NULL,
  `signature_path` varchar(255) DEFAULT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `signalements`
--

INSERT INTO `signalements` (`id`, `user_id`, `receiver_id`, `full_name`, `date`, `hour`, `location`, `description`, `file_path`, `signature_path`, `created_at`) VALUES
(1, 2, 8, 'Rasoa', '2024-11-22', '12:22:00', 'Andoharanofotsy', 'Abus', NULL, NULL, '2024-11-18 19:37:45'),
(2, 2, 8, 'Rasoa', '2024-11-22', '12:22:00', 'ankadimbahoaka', 'Abus', 'http://localhost/Devoi_socila_media/src/backend/api/uploads/files/673b979f83f1f.pdf', 'http://localhost/Devoi_socila_media/src/backend/api/uploads/signatures/673b979f839a3.jpg', '2024-11-18 19:38:07'),
(3, 2, 8, 'Rasoa', '2024-12-11', '23:23:00', 'analakely', 'Abus', 'http://localhost/Devoi_socila_media/src/backend/api/uploads/files/673b9ad95b2a6.pdf', 'http://localhost/Devoi_socila_media/src/backend/api/uploads/signatures/673b9ad95ae26.jpg', '2024-11-18 19:51:53'),
(4, 2, 8, 'Rasoa', '2024-11-23', '12:34:00', 'ankatso', 'Abus', 'http://localhost/Devoi_socila_media/src/backend/api/uploads/files/673b9d094b492.pdf', 'http://localhost/Devoi_socila_media/src/backend/api/uploads/signatures/673b9d094aed3.png', '2024-11-18 20:01:13'),
(5, 2, 8, 'Sandra', '2024-11-22', '23:22:00', 'ampasapito', 'Abus', 'http://localhost/Devoi_socila_media/src/backend/api/uploads/files/673c7d841f15d.pdf', 'http://localhost/Devoi_socila_media/src/backend/api/uploads/signatures/673c7d841eee4.png', '2024-11-19 11:59:00'),
(6, 2, 8, 'Sandra', '2024-11-22', '23:22:00', 'Andoharanofotsy', 'Abus', 'http://localhost/Devoi_socila_media/src/backend/api/uploads/files/673c7d861583b.pdf', 'http://localhost/Devoi_socila_media/src/backend/api/uploads/signatures/673c7d861563e.png', '2024-11-19 11:59:02'),
(7, 2, 8, 'Raoa', '2024-11-12', '23:23:00', 'Andoharanofotsy', 'Abus', 'http://localhost/Devoi_socila_media/src/backend/api/uploads/files/673d6ba6c317d.pdf', 'http://localhost/Devoi_socila_media/src/backend/api/uploads/signatures/673d6ba6c310d.jpg', '2024-11-20 04:55:02'),
(8, 2, 8, 'Raketaka', '2024-11-22', '23:23:00', 'anosy', 'Abus', 'http://localhost/Devoi_socila_media/src/backend/api/uploads/files/673d9d4cdbdf6.pdf', NULL, '2024-11-20 08:26:52'),
(9, 2, 8, 'Anjara', '2024-12-04', '23:45:00', 'Antsirabe', 'Harcelement', 'http://localhost/Devoi_socila_media/src/backend/api/uploads/files/673eebc9ad784.pdf', 'http://localhost/Devoi_socila_media/src/backend/api/uploads/signatures/673eebc9ad594.jpg', '2024-11-21 08:14:01'),
(10, 2, 8, 'Anjara', '2024-12-04', '23:45:00', 'Antsirabe', 'Harcelement', 'http://localhost/Devoi_socila_media/src/backend/api/uploads/files/673eebcc449fe.pdf', 'http://localhost/Devoi_socila_media/src/backend/api/uploads/signatures/673eebcc449a5.jpg', '2024-11-21 08:14:04'),
(11, 2, 8, 'Anjara', '2024-12-04', '23:45:00', 'Antsirabe', 'Harcelement', 'http://localhost/Devoi_socila_media/src/backend/api/uploads/files/673eebd5a44d2.pdf', 'http://localhost/Devoi_socila_media/src/backend/api/uploads/signatures/673eebd5a442c.jpg', '2024-11-21 08:14:13');

-- --------------------------------------------------------

--
-- Structure de la table `uploaded_documents`
--

CREATE TABLE `uploaded_documents` (
  `id` int(11) NOT NULL,
  `user_id` int(11) NOT NULL,
  `doc_type` enum('photo','video','pdf') NOT NULL,
  `doc_url` varchar(255) NOT NULL,
  `upload_date` datetime DEFAULT current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `uploaded_documents`
--

INSERT INTO `uploaded_documents` (`id`, `user_id`, `doc_type`, `doc_url`, `upload_date`) VALUES
(17, 1, 'photo', 'http://localhost/Devoi_socila_media/public/documents/photos/95eda73aa9cd11ed27acc28a210c6d73.jpg', '2024-11-02 17:10:27'),
(19, 1, 'video', 'http://localhost/Devoi_socila_media/public/documents/videos/Boa.mp4', '2024-11-02 17:13:35'),
(21, 1, 'photo', 'http://localhost/Devoi_socila_media/public/documents/photos/beautiful.jpeg', '2024-11-02 17:51:16'),
(22, 1, 'pdf', 'http://localhost/Devoi_socila_media/public/documents/pdfs/Ralaikoto_Mamilalao_Sitraka_Nadia.pdf', '2024-11-02 17:53:11'),
(23, 2, 'photo', 'http://localhost/Devoi_socila_media/public/documents/photos/Anteater.Team.full.2361473.jpg', '2024-11-02 18:29:25'),
(24, 2, 'photo', 'http://localhost/Devoi_socila_media/public/documents/photos/d9bv30q-be6160b2-37ee-4cb0-83c0-6f1ad0a6f7e1.png', '2024-11-02 18:39:19'),
(25, 2, 'photo', 'http://localhost/Devoi_socila_media/public/documents/photos/girls_und_panzer-10-nekota-momoga-piyotan-nekonya-world_of_tanks-nekomimi-glasses-eye_patch-peach-freckles.jpg', '2024-11-02 18:42:25'),
(26, 2, 'photo', 'http://localhost/Devoi_socila_media/public/documents/photos/hq720.jpg', '2024-11-02 18:44:49'),
(27, 2, 'photo', 'http://localhost/Devoi_socila_media/public/documents/photos/GuP-Game-PSV-Ann.jpg', '2024-11-02 18:49:08'),
(29, 2, 'pdf', 'http://localhost/Devoi_socila_media/public/documents/pdfs/strategies_gaming_world_of_tanks.pdf', '2024-11-02 19:00:59'),
(31, 2, 'video', 'http://localhost/Devoi_socila_media/public/documents/videos/Girls und Panzer der Film[Chi-nu reload].mp4', '2024-11-02 19:44:51'),
(32, 2, 'pdf', 'http://localhost/Devoi_socila_media/public/documents/pdfs/Nekonya.pdf', '2024-11-02 19:49:58'),
(35, 3, 'photo', 'http://localhost/Devoi_socila_media/public/documents/photos/download.jpeg', '2024-11-02 20:20:15'),
(36, 3, 'photo', 'http://localhost/Devoi_socila_media/public/documents/photos/download (2).jpeg', '2024-11-02 20:22:11'),
(39, 3, 'photo', 'http://localhost/Devoi_socila_media/public/documents/photos/download (6).jpeg', '2024-11-02 20:26:26'),
(40, 3, 'photo', 'http://localhost/Devoi_socila_media/public/documents/photos/download (3).jpeg', '2024-11-02 20:26:51'),
(41, 3, 'photo', 'http://localhost/Devoi_socila_media/public/documents/photos/c7ba56182385331.Y3JvcCwxMzgwLDEwODAsMjcwLDA.png', '2024-11-02 20:30:38'),
(42, 3, 'photo', 'http://localhost/Devoi_socila_media/public/documents/photos/Fortnite-Jinx.jpg', '2024-11-02 20:31:28'),
(43, 3, 'pdf', 'http://localhost/Devoi_socila_media/public/documents/pdfs/What!?.pdf', '2024-11-02 20:33:03'),
(44, 3, 'pdf', 'http://localhost/Devoi_socila_media/public/documents/pdfs/Chaos!!!.pdf', '2024-11-02 20:34:35'),
(45, 3, 'video', 'http://localhost/Devoi_socila_media/public/documents/videos/BORING! __ Arcane - Jinx Edit __ Beautiful is Boring - BONES UK.mp4', '2024-11-02 20:36:26'),
(47, 3, 'video', 'http://localhost/Devoi_socila_media/public/documents/videos/Jinx is so 😩 #jinx #arcane #edit #viral #trending.mp4', '2024-11-02 20:39:12'),
(48, 3, 'video', 'http://localhost/Devoi_socila_media/public/documents/videos/JINX LISTENING TO GET JINXED LULW  _ ARCANE #shorts #arcane #leagueoflegends.mp4', '2024-11-02 20:41:14'),
(49, 3, 'video', 'http://localhost/Devoi_socila_media/public/documents/videos/Jinx_boutique.mp4', '2024-11-02 20:43:41'),
(50, 4, 'pdf', 'http://localhost/Devoi_socila_media/public/documents/pdfs/letter_to_my_sister.pdf', '2024-11-02 21:08:11'),
(51, 4, 'pdf', 'http://localhost/Devoi_socila_media/public/documents/pdfs/Hear_me_now.pdf', '2024-11-02 21:11:12'),
(52, 4, 'video', 'http://localhost/Devoi_socila_media/public/documents/videos/Jinx_boutique.mp4', '2024-11-02 21:29:20'),
(53, 4, 'photo', 'http://localhost/Devoi_socila_media/public/documents/photos/violet-arcane-ezv7a3xm79h1i6io.jpg', '2024-11-02 21:30:19'),
(54, 4, 'photo', 'http://localhost/Devoi_socila_media/public/documents/photos/images (1).jpeg', '2024-11-02 21:31:34'),
(55, 4, 'photo', 'http://localhost/Devoi_socila_media/public/documents/photos/violet-arcane.jpg', '2024-11-02 21:32:16'),
(56, 1, 'video', 'http://localhost/Devoi_socila_media/public/documents/videos/woke_up.mp4', '2024-11-02 22:07:38'),
(57, 1, 'video', 'http://localhost/Devoi_socila_media/public/documents/videos/just_right.mp4', '2024-11-02 22:10:40'),
(58, 1, 'video', 'http://localhost/Devoi_socila_media/public/documents/videos/katseye.mp4', '2024-11-02 22:11:24'),
(59, 1, 'photo', 'http://localhost/Devoi_socila_media/public/documents/photos/lila.jpg', '2024-11-09 15:44:38'),
(61, 2, 'video', 'http://localhost/Devoi_socila_media/public/documents/videos/recorded-video.mp4', '2024-11-18 10:44:21'),
(62, 2, 'pdf', 'http://localhost/Devoi_socila_media/public/documents/pdfs/transport.pdf', '2024-11-18 10:48:14'),
(63, 2, 'pdf', 'http://localhost/Devoi_socila_media/public/documents/pdfs/transport.pdf', '2024-11-18 11:53:42'),
(64, 2, 'pdf', 'http://localhost/Devoi_socila_media/public/documents/pdfs/transport.pdf', '2024-11-18 11:58:36'),
(65, 2, 'pdf', 'http://localhost/Devoi_socila_media/public/documents/pdfs/transport.pdf', '2024-11-18 13:27:22');

-- --------------------------------------------------------

--
-- Structure de la table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT current_timestamp(),
  `role` varchar(100) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Déchargement des données de la table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `created_at`, `role`) VALUES
(1, 'Nadia', 'ralaikotonadia@gmail.com', '$2y$10$VlqnL3L6z3RMn0ZrK4nmn.jTTQ7l3gfFa4APUy0KpI37JvvdlqK.m', '2024-09-28 14:52:05', 'utilisateur'),
(2, 'Nekonya', 'annahbelle@gmail.com', '$2y$10$sOCBr3U0boMQYtoSXNYvc.vOEXsrWmYabZcEV6YYXjdDQIZJdEn6u', '2024-09-28 16:02:23', 'utilisateur'),
(3, 'Jinx', 'jinxpowder@gmail.com', '$2y$10$bMHNvLCf74vWRe58IbaBwOuaCfcTkdJqNddZs77y4rAjwH5QGi6z.', '2024-09-29 09:56:26', 'utilisateur'),
(4, 'Violet', 'violetpowder@gmail.com', '$2y$10$o.RxEHsjJOv1QPo9ulustuMYtdrQ3LPDZU5dC3K8PMIBGHpl6UX.2', '2024-09-29 13:42:00', 'utilisateur'),
(6, 'Toa', 'toarey@gmail.com', '$2y$10$BEkeZEM6Sh1U6ptZ2LDgTeZJlz5phIbCI2WygNMbLNXjJXmDj9YhO', '2024-10-29 12:07:47', 'utilisateur'),
(8, 'oreki', 'outarooreki@gmail.com', '$2y$10$d6sk/wHJ.iuGRaHu/Ats8.rrCahKqa3QNB50Etp5PR5idSXKxI29.', '2024-11-18 16:41:44', 'securite'),
(9, 'rambola', 'rambola@gmail.com', '123456\r\n', '2024-11-21 20:42:11', NULL),
(10, 'rambola', 'rambolakely@gmail.com', '123456', '2024-11-21 21:11:32', NULL),
(11, 'tonton', 'tonton@gmail.com', '123456', '2024-11-21 21:21:51', 'utilisateur'),
(12, 'papi', 'papi@gmail.com', '123456', '2024-11-21 21:22:41', 'utilisateur');

--
-- Index pour les tables déchargées
--

--
-- Index pour la table `about`
--
ALTER TABLE `about`
  ADD PRIMARY KEY (`user_id`);

--
-- Index pour la table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `token` (`token`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `comments`
--
ALTER TABLE `comments`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_post_comment` (`post_id`),
  ADD KEY `fk_user_comment` (`user_id`);

--
-- Index pour la table `comment_reactions`
--
ALTER TABLE `comment_reactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `fk_comment_reaction` (`comment_id`);

--
-- Index pour la table `cover_photo`
--
ALTER TABLE `cover_photo`
  ADD PRIMARY KEY (`photo_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `followers`
--
ALTER TABLE `followers`
  ADD PRIMARY KEY (`follower_id`,`followed_id`),
  ADD KEY `followed_id` (`followed_id`);

--
-- Index pour la table `forum_messages`
--
ALTER TABLE `forum_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sender_id` (`sender_id`);

--
-- Index pour la table `location`
--
ALTER TABLE `location`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `notifications`
--
ALTER TABLE `notifications`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `posts`
--
ALTER TABLE `posts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `fk_user_post` (`user_id`);

--
-- Index pour la table `post_reactions`
--
ALTER TABLE `post_reactions`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `fk_post_reaction` (`post_id`);

--
-- Index pour la table `private_messages`
--
ALTER TABLE `private_messages`
  ADD PRIMARY KEY (`id`),
  ADD KEY `sender_id` (`sender_id`),
  ADD KEY `receiver_id` (`receiver_id`);

--
-- Index pour la table `profile_photo`
--
ALTER TABLE `profile_photo`
  ADD PRIMARY KEY (`photo_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `security_complaints`
--
ALTER TABLE `security_complaints`
  ADD PRIMARY KEY (`id`),
  ADD KEY `signalement_id` (`signalement_id`);

--
-- Index pour la table `signalements`
--
ALTER TABLE `signalements`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`),
  ADD KEY `receiver_id` (`receiver_id`);

--
-- Index pour la table `uploaded_documents`
--
ALTER TABLE `uploaded_documents`
  ADD PRIMARY KEY (`id`),
  ADD KEY `user_id` (`user_id`);

--
-- Index pour la table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT pour les tables déchargées
--

--
-- AUTO_INCREMENT pour la table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT pour la table `comments`
--
ALTER TABLE `comments`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=109;

--
-- AUTO_INCREMENT pour la table `comment_reactions`
--
ALTER TABLE `comment_reactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `cover_photo`
--
ALTER TABLE `cover_photo`
  MODIFY `photo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `forum_messages`
--
ALTER TABLE `forum_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `location`
--
ALTER TABLE `location`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `notifications`
--
ALTER TABLE `notifications`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=48;

--
-- AUTO_INCREMENT pour la table `posts`
--
ALTER TABLE `posts`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=153;

--
-- AUTO_INCREMENT pour la table `post_reactions`
--
ALTER TABLE `post_reactions`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=72;

--
-- AUTO_INCREMENT pour la table `private_messages`
--
ALTER TABLE `private_messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=14;

--
-- AUTO_INCREMENT pour la table `profile_photo`
--
ALTER TABLE `profile_photo`
  MODIFY `photo_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=6;

--
-- AUTO_INCREMENT pour la table `security_complaints`
--
ALTER TABLE `security_complaints`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=10;

--
-- AUTO_INCREMENT pour la table `signalements`
--
ALTER TABLE `signalements`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=12;

--
-- AUTO_INCREMENT pour la table `uploaded_documents`
--
ALTER TABLE `uploaded_documents`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=66;

--
-- AUTO_INCREMENT pour la table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- Contraintes pour les tables déchargées
--

--
-- Contraintes pour la table `about`
--
ALTER TABLE `about`
  ADD CONSTRAINT `about_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `auth_tokens`
--
ALTER TABLE `auth_tokens`
  ADD CONSTRAINT `auth_tokens_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `comments`
--
ALTER TABLE `comments`
  ADD CONSTRAINT `comments_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`),
  ADD CONSTRAINT `comments_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `fk_post_comment` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `fk_user_comment` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `comment_reactions`
--
ALTER TABLE `comment_reactions`
  ADD CONSTRAINT `comment_reactions_ibfk_1` FOREIGN KEY (`comment_id`) REFERENCES `comments` (`id`),
  ADD CONSTRAINT `comment_reactions_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `fk_comment_reaction` FOREIGN KEY (`comment_id`) REFERENCES `comments` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Contraintes pour la table `cover_photo`
--
ALTER TABLE `cover_photo`
  ADD CONSTRAINT `cover_photo_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `followers`
--
ALTER TABLE `followers`
  ADD CONSTRAINT `followers_ibfk_1` FOREIGN KEY (`follower_id`) REFERENCES `users` (`id`) ON DELETE CASCADE,
  ADD CONSTRAINT `followers_ibfk_2` FOREIGN KEY (`followed_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `forum_messages`
--
ALTER TABLE `forum_messages`
  ADD CONSTRAINT `forum_messages_ibfk_1` FOREIGN KEY (`sender_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `location`
--
ALTER TABLE `location`
  ADD CONSTRAINT `location_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `notifications`
--
ALTER TABLE `notifications`
  ADD CONSTRAINT `notifications_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `posts`
--
ALTER TABLE `posts`
  ADD CONSTRAINT `fk_user_post` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `posts_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `post_reactions`
--
ALTER TABLE `post_reactions`
  ADD CONSTRAINT `fk_post_reaction` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `post_reactions_ibfk_1` FOREIGN KEY (`post_id`) REFERENCES `posts` (`id`),
  ADD CONSTRAINT `post_reactions_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `private_messages`
--
ALTER TABLE `private_messages`
  ADD CONSTRAINT `private_messages_ibfk_1` FOREIGN KEY (`sender_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `private_messages_ibfk_2` FOREIGN KEY (`receiver_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `profile_photo`
--
ALTER TABLE `profile_photo`
  ADD CONSTRAINT `profile_photo_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `security_complaints`
--
ALTER TABLE `security_complaints`
  ADD CONSTRAINT `security_complaints_ibfk_1` FOREIGN KEY (`signalement_id`) REFERENCES `signalements` (`id`) ON DELETE CASCADE;

--
-- Contraintes pour la table `signalements`
--
ALTER TABLE `signalements`
  ADD CONSTRAINT `signalements_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `signalements_ibfk_2` FOREIGN KEY (`receiver_id`) REFERENCES `users` (`id`);

--
-- Contraintes pour la table `uploaded_documents`
--
ALTER TABLE `uploaded_documents`
  ADD CONSTRAINT `uploaded_documents_ibfk_1` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`) ON DELETE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
