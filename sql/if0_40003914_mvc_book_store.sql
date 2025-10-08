-- phpMyAdmin SQL Dump
-- version 4.9.0.1
-- https://www.phpmyadmin.net/
--
-- Host: sql312.infinityfree.com
-- Generation Time: Oct 08, 2025 at 03:08 PM
-- Server version: 11.4.7-MariaDB
-- PHP Version: 7.2.22

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `if0_40003914_mvc_book_store`
--

-- --------------------------------------------------------

--
-- Table structure for table `books`
--

CREATE TABLE `books` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `author` varchar(100) NOT NULL,
  `publisher` varchar(100) NOT NULL,
  `pages` int(11) NOT NULL DEFAULT 0,
  `category_id` int(10) UNSIGNED DEFAULT NULL,
  `description` text DEFAULT NULL,
  `price` decimal(12,2) NOT NULL DEFAULT 0.00,
  `quantity` int(11) NOT NULL DEFAULT 0,
  `status` tinyint(4) NOT NULL,
  `cover` text DEFAULT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `books`
--

INSERT INTO `books` (`id`, `name`, `author`, `publisher`, `pages`, `category_id`, `description`, `price`, `quantity`, `status`, `cover`, `created_at`, `updated_at`) VALUES
(1, 'Crime ', 'Fyodor', 'a', 0, 2, 'a', '1000000.00', 0, 0, '415SkSLLrzL20250926162534.jpg', '2025-09-25 16:35:50', '2025-09-28 07:28:29'),
(13, 'Kafka On The Shore', 'Haruki Murakami', 'Vintage Classics', 654, 1, '\"Kafka on the Shore\" is a novel by Haruki Murakami that intertwines the stories of a teenage boy named Kafka Tamura and an elderly man named Satoru Nakata, exploring themes of fate, memory, and the subconscious.\r\nOverview\r\nPublished in 2002, \"Kafka on the Shore\" (海辺のカフカ, Umibe no Kafuka) is a critically acclaimed novel by Japanese author Haruki Murakami. The book has received numerous accolades, including the World Fantasy Award in 2006 and was listed among \"The 10 Best Books of 2005\" by The New York Times. \r\nWikipedia\r\nPlot Summary\r\nThe narrative follows two main characters: Kafka Tamura, a 15-year-old boy who runs away from home to escape an Oedipal curse and search for his long-lost sister and mother, and Satoru Nakata, an elderly man who lost his memory and intellect in a childhood accident but possesses the ability to communicate with cats. Their stories unfold in parallel, with Kafka\'s journey leading him to a library where he meets enigmatic characters, including a librarian named Miss Saeki and a young assistant named Oshima.', '350000.00', 12, 1, 'kafka_on_the_shore20251006124814.jpg', '2025-09-26 07:39:01', '2025-10-06 16:48:14'),
(14, 'The Castle', 'Franz Kafka', 'Penguin Classics', 454, 1, 'The Castle (German: Das Schloss, also spelled Das Schloß [das ˈʃlɔs]) is the last novel by Franz Kafka, first published in 1926. In it a protagonist known only as \"K.\" arrives in a village and struggles to gain access to the mysterious authorities who govern it from a castle supposedly owned by Graf Westwest.\r\n\r\nKafka died before he could finish the work and the novel was posthumously published against his wishes. Dark and at times surreal, The Castle is often understood to be about alienation, unresponsive bureaucracy, the frustration of trying to conduct business with non-transparent, seemingly arbitrary controlling systems, and the futile pursuit of an unobtainable goal.', '400000.00', 1, 1, 'the_castle20251006124831.jpg', '2025-09-26 07:40:40', '2025-10-06 16:48:31'),
(30, 'The Brothers Karamazov', 'Fyodor Dostoeyvsky', 'Penguin Classics', 1238, 1, 'Although Dostoevsky began his first notes for The Brothers Karamazov in April 1878, the novel incorporated elements and themes from an earlier unfinished project he had begun in 1869 entitled The Life of a Great Sinner.[3] Another unfinished project, Drama in Tobolsk (Драма в Тобольске), is considered to be the first draft of the first chapter of The Brothers Karamazov. Dated 13 September 1874, it tells of a fictional murder in Staraya Russa committed by a praporshchik named Dmitry Ilynskov (based on a real soldier from Omsk), who is thought to have murdered his father. It goes on to note that the father\'s body was suddenly discovered in a pit under a house.[4] The similarly unfinished Sorokoviny (Сороковины), dated 1 August 1875, is reflected in book IX, chapters 3–5 and book XI, chapter nine.[5]\r\n\r\nIn the October 1877 Writer\'s Diary article \"To the Reader\", Dostoevsky mentions a \"literary work that has imperceptibly and involuntarily been taking shape within me over these two years of publishing the Diary.\" The Diary covered a multitude of themes and issues, some of which would be explored in greater depth in The Brothers Karamazov. These include patricide, law and order, and a variety of social problems.[6]\r\n\r\nThe writing of The Brothers Karamazov was altered by a personal tragedy: in May 1878, Dostoevsky\'s three-year-old son Alyosha died of epilepsy,[7] a condition inherited from his father. The novelist\'s grief is apparent throughout the book. Dostoevsky named the hero Alyosha, and imbued him with qualities that he sought and most admired. His loss is also reflected in the story of Captain Snegiryov and his young son Ilyusha.\r\n\r\nThe death of his son brought Dostoevsky to the Optina Monastery later that year. There he found inspiration for several aspects of The Brothers Karamazov, though at the time he intended to write a novel about childhood instead. Parts of the biographical section of Zosima\'s life are based on \"The Life of the Elder Leonid\", a text he found at Optina.[8]\r\n\r\nMajor characters\r\nFyodor Pavlovich Karamazov\r\nMain article: Fyodor Pavlovich Karamazov\r\nFyodor Pavlovich, a 55-year-old sensualist and compulsive liar, is the father of three sons—Dmitri, Ivan and Alexei—from two marriages. He is rumored to have also fathered an illegitimate son, Pavel Fyodorovich Smerdyakov, whom he employs as his servant. Fyodor Pavlovich takes no interest in any of his sons at their birth, who are, as a result, raised apart from each other and their father. The relationship between Fyodor and his adult sons drives much of the plot in the novel.', '350000.00', 10, 1, 'the_brother_karamazov20251006124842.jpg', '2025-09-26 21:49:20', '2025-10-06 16:48:42'),
(31, 'Crime and punishment', 'Fyodor Dostoeyvsky', 'Penguin Classics', 878, 1, 'Fyodor Dostoyevsky’s seminal classic, now in a beautiful clothbound edition designed by Coralie Bickford-Smith.\r\n\r\nNominated as one of America’s best-loved novels by PBS’s The Great American Read\r\n\r\nRaskolnikov, a destitute and desperate former student, wanders through the slums of St Petersburg and commits a random murder without remorse or regret. He imagines himself to be a great man, a Napoleon: acting for a higher purpose beyond conventional moral law. But as he embarks on a dangerous game of cat and mouse with a suspicious police investigator, Raskolnikov is pursued by the growing voice of his conscience and finds the noose of his own guilt tightening around his neck. Only Sonya, a downtrodden prostitute, can offer the chance of redemption.\r\n\r\nDavid McDuff’s vivid translation has been acclaimed as the most accessible version of Dostoyevsky’s great novel, rendering its dialogue with a unique force and naturalism. This edition of Crime and Punishment also includes a new chronology of Dostoyevsky’s life and work.\r\n\r\nPenguin Classics is the leading publisher of classic literature in the English-speaking world, representing a global bookshelf of the best works throughout history and across genres and disciplines. Readers trust the series to provide authoritative texts enhanced by introductions and notes by distinguished scholars and contemporary authors, as well as up-to-date translations by award-winning translators.', '347000.00', 23, 1, 'crime_and_punishment_penguin20251006124901.jpg', '2025-10-03 12:43:23', '2025-10-06 16:49:01'),
(32, 'The Trial ', 'Franz Kafka', 'Penguin Classics', 570, 1, 'Praise for The Trial:\r\n\r\n\"Breon Mitchell\'s translation of the restored text is an accomplishment of the highest order -- one that will honor Kafka, perhaps the most singular and compelling writer of our time, far into the twenty-first century.\"\r\n-- Walter Abish, author of How German Is It\r\n\r\nPraise for The Castle:\r\ntranslated by Mark Harman from the restored text\r\n\r\n\"The new Schocken edition of The Castle represents a major and long-awaited event in English- language publishing. It is a wonderful piece of news for all Kafka readers who, for more than half a century, have had to rely on flawed, superannuated editions. Mark Harman is to be commended for his success in capturing the fresh, fluid, almost breathless style of Kafka\'s original manuscript.\"\r\n-- Mark M. Anderson, Columbia University\r\n\r\n\"Semantically accurate to an admirable degree, faithful to Kafka\'s nuances, responsive to the tempo of his sentences and to the larger music of his paragraph construction. For the general reader or for the student, it will be the translation of preference for some time to come.\"\r\n-- J. M. Coetzee, The New York Review of Books\r\n\r\n\"There is a great deal to applaud in Harman\'s translation. It gives us a much better sense of Kafka\'s uncompromising and disturbing originality as a prose master than we have heretofore had in English.\"\r\n--Robert Alter, The New Republic', '407000.00', 23, 1, '31P8+TIyYKL20251003103740.jpg', '2025-10-03 14:37:40', '2025-10-03 14:37:40'),
(33, 'A Brief History of Time', 'Stephen Hawking', 'Bantam', 256, 3, 'Stephen Hawking offers a lucid tour of modern cosmology—from the birth of the universe in the Big Bang to black holes, quantum mechanics, and the arrow of time. He explains how general relativity and quantum theory collide at extreme scales, why singularities matter, and what it means to ask whether time has a beginning. Written for curious readers, it balances rigor with wit and memorable thought ', '165000.00', 24, 1, '519XJDItIDL20251006124045.jpg', '2025-10-04 14:03:24', '2025-10-06 16:40:45'),
(34, 'The Selfish Gene', 'Richard Dawkins', 'Oxford University Press', 360, 3, 'Richard Dawkins reframes evolution through the perspective of genes, showing how complex behaviors can arise from differential gene survival. He introduces concepts such as replicators, memes, and evolutionary stable strategies to explain altruism, cooperation, and competition in nature. The result is a clear, provocative account of how natural selection works.', '179000.00', 18, 1, '415SkSLLrzL20251006124117.jpg', '2025-10-04 14:05:51', '2025-10-06 16:41:17'),
(35, 'Cosmos', 'Carl Sagan', 'Ballantine Books', 396, 3, 'Carl Sagan tells the grand story of the universe, weaving astronomy with the history and philosophy of science. From ancient observatories to modern spacecraft, he shows how our understanding grew—and why skepticism and wonder are essential companions. Lyrical, evidence‑driven writing invites readers to see Earth as part of a vast cosmic shore.', '210000.00', 30, 1, '710C5x4MzwL20251006124957.jpg', '2025-10-04 14:09:25', '2025-10-06 16:49:57'),
(36, 'The Gene: An Intimate History', 'Siddhartha Mukherjee', 'Scribner', 608, 3, 'Siddhartha Mukherjee chronicles the scientific quest to understand heredity, from Mendel’s peas to the Human Genome Project and CRISPR gene editing. Blending biography, case studies, and ethics, he explores how genes shape identity, illness, and possibility. It’s both a sweeping history of genetics and a meditation on what we should do with this power.', '235000.00', 16, 1, '71fUSEiDTbL20251006125049.jpg', '2025-10-04 14:13:35', '2025-10-06 16:50:49'),
(37, 'The Elegant Universe', 'Brian Greene', 'W. W. Norton & Company', 448, 3, 'Brian Greene introduces string theory—the idea that fundamental particles are tiny vibrating strings—and explains its promise to unify gravity with quantum mechanics. Along the way he demystifies extra dimensions, branes, and the fabric of space‑time. The book captures both the mathematics and the imagination behind cutting‑edge physics.', '199000.00', 22, 1, '009928992X20251004112850.png', '2025-10-04 14:15:33', '2025-10-04 15:28:50'),
(38, 'Surely You\'re Joking, Mr. Feynman!', 'Richard P. Feynman', 'W. W. Norton & Company', 352, 3, 'Nobel laureate Richard Feynman recounts capers from safe‑cracking at Los Alamos to teaching, drumming, and curiosity‑driven tinkering. The anecdotes reveal a scientist’s mindset: playful skepticism, relentless questioning, and joy in figuring things out. It’s part memoir, part celebration of the art of learning by doing.', '175000.00', 14, 1, '978009917331120251004112621.png', '2025-10-04 14:17:40', '2025-10-04 15:26:21'),
(39, 'The Double Helix', 'James D. Watson', 'Scribner', 256, 3, 'James D. Watson’s candid memoir of the race to decipher DNA’s structure captures the personalities, rivalries, and intuition behind a transformative discovery. He describes model building, Rosalind Franklin’s crucial X‑ray data, and the leap to the double helix. A frontline view of how science actually progresses—messy, competitive, and exhilarating.', '165000.00', 12, 1, '6133tL1gwAL20251006125141.jpg', '2025-10-04 14:59:37', '2025-10-06 16:51:41'),
(40, 'The Immortal Life of Henrietta Lacks', 'Rebecca Skloot', 'Crown', 381, 3, 'Rebecca Skloot traces the life of Henrietta Lacks, whose cancer cells—taken without consent—became the first immortal human cell line, HeLa. The narrative braids medical breakthroughs with a family’s search for recognition and justice, probing race, consent, and profit in biomedicine. It’s investigative journalism and human story in equal measure.', '195000.00', 20, 1, '41DYQ34Jt3L20251006125224.webp', '2025-10-04 15:01:31', '2025-10-06 16:52:24'),
(41, 'Guns, Germs, and Steel', 'Jared Diamond', 'W. W. Norton & Company', 480, 3, 'Jared Diamond argues that geography and ecology—not innate differences—explain why societies developed unevenly. Domesticable plants and animals, continental axes, and disease shaped the diffusion of technology and state power. A cross‑disciplinary synthesis that challenges simple explanations of global history.', '225000.00', 28, 1, '71V66uULZqL20251006125311.jpg', '2025-10-04 15:03:06', '2025-10-06 16:53:11'),
(42, 'The Emperor of All Maladies', 'Siddhartha Mukherjee', 'Scribner', 592, 3, 'Mukherjee offers a sweeping “biography” of cancer, following physicians, patients, and scientists across centuries. He examines the evolution of treatments—from surgery and radiation to chemotherapy and targeted therapies—while confronting hype and hope. Deeply researched and compassionate, it illuminates why defeating cancer is a marathon of many intertwined races.', '239000.00', 17, 1, 'R (1)20251004110431.jpg', '2025-10-04 15:04:31', '2025-10-04 15:04:31'),
(43, 'Silent Spring', 'Rachel Carson', 'Houghton Mifflin', 368, 3, 'Rachel Carson exposes the ecological harm of indiscriminate pesticide use, especially DDT, through meticulous science and clear prose. She explains bioaccumulation, food‑web effects, and the consequences for birds and human health. The book galvanized environmental policy and helped launch modern conservation movements.', '169000.00', 21, 1, '713whyrI00L20251006125408.jpg', '2025-10-04 15:05:32', '2025-10-06 16:54:08'),
(44, 'Chaos: Making a New Science', 'James Gleick', 'Viking', 352, 3, 'James Gleick traces the birth of chaos theory, where simple deterministic rules yield unpredictable, fractal patterns. From Lorenz’s weather simulations to Feigenbaum’s constants and Mandelbrot’s geometry, he shows a revolution in how scientists see complexity. A compelling primer on nonlinear thinking across physics, biology, and beyond.', '185000.00', 15, 1, '91ErIwnnlSL20251006125506.jpg', '2025-10-04 15:07:50', '2025-10-06 16:55:06'),
(45, 'Thinking, Fast and Slow', 'Daniel Kahneman', 'Farrar, Straus and Giroux', 512, 3, 'Nobel laureate Daniel Kahneman explains the two modes of thought—fast, intuitive System 1 and slow, deliberative System 2—and how their interplay shapes judgment. He surveys decades of experiments revealing biases such as anchoring, loss aversion, and overconfidence. Practical insights help readers make better decisions in finance, policy, and everyday life.', '235000.00', 25, 1, '61fdrEuPJwL20251006125606.jpg', '2025-10-04 15:09:02', '2025-10-06 16:56:06'),
(46, 'Astrophysics for People in a Hurry', 'Neil deGrasse Tyson', 'W. W. Norton & Company', 224, 3, 'Neil deGrasse Tyson distills core ideas of astrophysics—dark matter, dark energy, cosmic microwave background, and element formation—into brisk, digestible chapters. He connects abstract concepts to familiar experiences and the human drive to explore. A concise field guide to the universe for readers short on time.', '149000.00', 32, 1, '71c46ivy5xL20251006125646.jpg', '2025-10-04 15:10:01', '2025-10-06 16:56:46'),
(47, 'The Fabric of Reality', 'David Deutsch', 'Penguin', 390, 3, 'David Deutsch proposes a unified worldview built on four strands: the multiverse interpretation of quantum mechanics, Popperian epistemology, the theory of computation, and Darwinian evolution. He argues that knowledge creation and good explanations are central to progress. Ambitious and thought‑provoking, it invites readers to rethink what is real.', '205000.00', 13, 1, '81-U74ULsML20251006125735.jpg', '2025-10-04 15:11:04', '2025-10-06 16:57:35'),
(48, 'Why We Sleep', 'Matthew Walker', 'Scribner', 368, 3, 'Neuroscientist Matthew Walker surveys what sleep does for memory, immunity, emotion regulation, and longevity. He explains sleep stages, circadian rhythms, and how caffeine, alcohol, and screens disrupt them. Evidence‑based tips show how to reclaim healthy rest in a chronically underslept world.', '189000.00', 26, 1, '91sclAONMfL20251006125825.jpg', '2025-10-04 15:19:58', '2025-10-06 16:58:25'),
(49, 'The Demon-Haunted World', 'Carl Sagan', 'Ballantine Books', 480, 3, 'Carl Sagan champions the scientific method as a candle in the dark against pseudoscience and superstition. He offers tools for skeptical thinking—the “baloney detection kit”—and stories showing why evidence and doubt matter. An enduring guide to critical reasoning in public life.', '215000.00', 19, 1, '81EKphyfEnL20251006125858.jpg', '2025-10-04 15:20:59', '2025-10-06 16:58:58'),
(51, 'The Blind Watchmaker', 'Richard Dawkins', 'W. W. Norton & Company', 360, 3, 'Dawkins explains how cumulative natural selection can craft complex adaptations without any foresight or designer. Through lucid analogies and computer simulations, he dismantles common misunderstandings about evolution. A persuasive, engaging defense of Darwin’s central idea.', '179000.00', 18, 1, '81+VzX1UphL20251006125944.jpg', '2025-10-04 15:21:54', '2025-10-06 16:59:44'),
(52, 'On the Origin of Species', 'Charles Darwin', 'Penguin Classics', 576, 3, 'Charles Darwin’s landmark work lays out the evidence and logic for natural selection, drawing on observations from geology, biogeography, and breeding. He shows how small variations, filtered by environmental pressures, produce diversity over deep time. A foundational text that continues to shape biology and the way we think about life.', '199000.00', 20, 1, '71z2XfoLFfL20251006130035.jpg', '2025-10-04 15:22:50', '2025-10-06 17:00:35'),
(53, 'A Short History of Nearly Everything', 'Bill Bryson', 'Broadway Books', 544, 3, 'Bill Bryson takes readers on a witty, curiosity‑fueled tour from the Big Bang to the rise of civilization. He explains major scientific breakthroughs and the quirky people behind them, translating complex ideas into lively stories. A delightful crash course in how we came to know what we know.', '225000.00', 27, 1, '71xiJ4Iw0VL20251006130158.jpg', '2025-10-04 15:24:09', '2025-10-06 17:01:59'),
(54, 'Sapiens: A Brief History of Humankind', 'Yuval Noah Harari', 'Harper', 512, 2, 'A sweeping narrative of human history from Stone Age foragers to the modern globalized world. Harari links biology, anthropology, and economics to show how shared myths and institutions enabled large‑scale cooperation. Clear, provocative chapters challenge assumptions about progress and happiness.', '239000.00', 28, 1, '811PTyrckTL20251006130239.jpg', '2025-10-04 15:35:29', '2025-10-06 17:02:40'),
(55, 'The Silk Roads: A New History of the World', 'Peter Frankopan', 'Bloomsbury', 656, 2, 'Recenters world history on the trade arteries of Eurasia where empires, ideas, and religions collided. Frankopan shows how wealth and power repeatedly shifted along these routes, shaping everything from crusades to oil politics. A panoramic, revisionist view that decouples history from a Eurocentric lens.', '259000.00', 22, 1, '91A1-6ny+pL20251006130359.jpg', '2025-10-04 15:36:46', '2025-10-06 17:04:00'),
(56, 'The Guns of August', 'Barbara W. Tuchman', 'Random House', 608, 2, 'A gripping account of the opening month of World War I, when miscalculation and momentum set Europe ablaze. Tuchman narrates diplomatic blunders, war plans, and personalities with novelistic clarity. It shows how decisions made in days shaped years of catastrophe.', '215000.00', 18, 1, '91A1-6ny+pL20251006130509.jpg', '2025-10-04 15:37:48', '2025-10-06 17:05:10'),
(57, '1491: New Revelations of the Americas Before Columbus', 'Charles C. Mann', 'Vintage', 541, 2, 'Synthesizes archaeology, ecology, and anthropology to reveal populous, sophisticated American societies before European contact. Mann challenges myths of empty wilderness and static cultures. Vivid case studies—from the Amazon to Cahokia—reshape how we see the pre‑Columbian world.', '225000.00', 26, 1, '713whyrI00L20251006130639.jpg', '2025-10-04 15:38:41', '2025-10-06 17:06:39'),
(58, '1493: Uncovering the New World Columbus Created', 'Charles C. Mann', 'Vintage', 720, 2, 'Explores the Columbian Exchange and its global cascades—diseases, crops, silver, and labor systems that rewired economies and ecologies. Mann traces how sweet potatoes altered China, silver fueled Spain, and malaria reshaped the Americas. A world‑spanning sequel to 1491.', '239000.00', 20, 1, '81oARME8+XL20251006131244.jpg', '2025-10-04 15:39:51', '2025-10-06 17:12:44'),
(59, 'The Rise and Fall of the Third Reich', 'William L. Shirer', 'Simon & Schuster', 1248, 2, 'A monumental narrative drawing on captured documents and firsthand reporting to chart Nazi Germany from origins to collapse. Shirer dissects ideology, propaganda, and the machinery of dictatorship. Essential reading for understanding how a modern society slid into catastrophe.', '299000.00', 16, 1, '51LkIF73JtL20251006132843.jpg', '2025-10-04 15:52:24', '2025-10-06 17:28:43'),
(60, 'Postwar: A History of Europe Since 1945', 'Tony Judt', 'Penguin', 960, 2, 'A comprehensive history of Europe’s reconstruction, Cold War divides, and democratic transformations. Judt blends politics, culture, and memory to explain integration, decolonization, and the fall of communism. Erudite and humane, it captures the continent’s turbulent reinvention.', '279000.00', 14, 1, '81KBdI+7e7L20251006132941.jpg', '2025-10-04 15:55:14', '2025-10-06 17:29:41'),
(61, 'Genghis Khan and the Making of the Modern World', 'Jack Weatherford', 'Crown', 352, 2, 'Reassesses the Mongol Empire as a force for connectivity and innovation rather than pure destruction. Weatherford shows how steppe governance, trade, and tolerance accelerated exchanges across Eurasia. A lively corrective to centuries of myth.', '209000.00', 24, 1, '51LkIF73JtL20251006133015.jpg', '2025-10-04 15:56:12', '2025-10-06 17:30:15'),
(62, 'SPQR: A History of Ancient Rome', 'Mary Beard', 'Liveright', 608, 2, 'Mary Beard charts Rome’s rise from village to empire while foregrounding ordinary voices alongside elites. Institutions, slavery, and citizenship are unpacked with wit and scholarship. A fresh, humane portrait of a society that still shapes our politics and law.', '235000.00', 21, 1, '81Ar4riKVxL20251006133046.jpg', '2025-10-04 15:57:25', '2025-10-06 17:30:46'),
(63, 'A People\'s History of the United States', 'Howard Zinn', 'Harper Perennial', 752, 2, 'US history told from the perspectives of workers, women, enslaved people, and dissenters rather than presidents and generals. Zinn links social movements to legal and political change. A provocative counter‑narrative that invites readers to reconsider national myths.', '249000.00', 25, 1, 'R (52)20251004115849.png', '2025-10-04 15:58:49', '2025-10-04 15:58:49'),
(64, 'The Making of the Atomic Bomb', 'Richard Rhodes', 'Simon & Schuster', 784, 2, 'An epic history of the scientific breakthroughs and wartime mobilization that produced nuclear weapons. Rhodes blends physics, biography, and geopolitics—from European labs to Los Alamos and Hiroshima. Both a triumph of ingenuity and a cautionary tale.', '269000.00', 17, 1, '71A9GWWQDxL20251006134908.jpg', '2025-10-04 16:20:20', '2025-10-06 17:49:08'),
(65, 'The Crusades: The Authoritative History of the War for the Holy Land', 'Thomas Asbridge', 'Ecco', 784, 2, 'A balanced, source‑rich narrative of the medieval wars for Jerusalem seen from both Latin Christian and Muslim viewpoints. Asbridge reconstructs campaigns, diplomacy, and myth‑making over two centuries. Clear storytelling replaces legend with context.', '255000.00', 19, 1, '91g4ysjS9aL20251006135006.jpg', '2025-10-04 16:21:07', '2025-10-06 17:50:06'),
(66, 'The Warmth of Other Suns', 'Isabel Wilkerson', 'Vintage', 640, 2, 'Documents the Great Migration of African Americans from the Jim Crow South to northern and western cities. Through three intertwined life stories, Wilkerson shows how this movement reshaped American culture and politics. Intimate narrative meets sweeping social history.', '239000.00', 23, 1, 'R (20251004122205.png', '2025-10-04 16:22:05', '2025-10-04 16:22:05'),
(67, 'Team of Rivals: The Political Genius of Abraham Lincoln', 'Doris Kearns Goodwin', 'Simon & Schuster', 944, 2, 'Explores how Lincoln forged a cabinet from political opponents and led the Union through civil war. Goodwin reveals strategy, empathy, and coalition‑building behind landmark decisions. A masterclass in leadership and democratic resilience.', '279000.00', 15, 1, '713whyrI00L20251006135024.jpg', '2025-10-04 16:22:54', '2025-10-06 17:50:24'),
(68, 'The Great Game: The Struggle for Empire in Central Asia', 'Peter Hopkirk', 'Kodansha', 592, 2, 'A fast‑paced history of 19th‑century espionage and rivalry between the British and Russian empires. Hopkirk follows explorers and agents across deserts and mountains where maps were still blank. Geopolitics told as high adventure.', '229000.00', 20, 1, '411QHxZ1U9L20251006135103.jpg', '2025-10-04 16:23:36', '2025-10-06 17:51:03'),
(69, 'The Path Between the Seas', 'David McCullough', 'Simon & Schuster', 698, 2, 'The dramatic saga of building the Panama Canal—engineering feats, disease, finance, and diplomacy. McCullough humanizes grand projects through vivid portraits of workers and leaders. A study in ambition and the costs of remaking geography.', '259000.00', 18, 1, '71Biqiy+neL20251006135958.jpg', '2025-10-04 16:24:34', '2025-10-06 17:59:58'),
(70, 'The Peloponnesian War', 'Thucydides', 'Penguin Classics', 648, 2, 'A foundational work of analytical history that dissects power politics between Athens and Sparta. Thucydides examines causes, strategy, and human nature with unsparing realism. His insights into fear, honor, and interest still inform statecraft.', '199000.00', 27, 1, '81z4rkwcBdL20251006141129.jpg', '2025-10-04 16:27:01', '2025-10-06 18:11:28'),
(71, 'The Second World War', 'Antony Beevor', 'Back Bay Books', 880, 2, 'A single‑volume history that integrates European and Pacific theaters, strategy, and civilian experience. Beevor synthesizes archives and memoirs into a clear, humane narrative. Balanced coverage helps readers see the global scale of the conflict.', '275000.00', 22, 1, '91SwMUCYijL20251006141226.jpg', '2025-10-04 16:28:16', '2025-10-06 18:12:26'),
(72, 'The Splendid and the Vile', 'Erik Larson', 'Crown', 608, 2, 'A close‑up portrait of Churchill’s leadership during the Blitz, built from diaries, letters, and archives. Larson reveals the domestic rhythms behind public speeches and strategy. Intimate storytelling illuminates a nation under bombardment.', '245000.00', 24, 1, 'OIP (s2)20251004122927.png', '2025-10-04 16:29:27', '2025-10-04 16:29:27'),
(73, 'The Age of Revolution: 1789–1848', 'Eric Hobsbawm', 'Vintage', 368, 2, 'Charts the twin upheavals of industry and politics that remade Europe and the Atlantic world. Hobsbawm explains how capitalism, class, and nationhood emerged from revolutionary decades. A classic synthesis from a master historian.', '189000.00', 30, 1, '71Ue+2PcIhL20251006141307.jpg', '2025-10-04 16:30:42', '2025-10-06 18:13:07'),
(74, 'Don Quixote – Miguel de Cervantes', 'Miguel de Cervantes Saavedra', 'Ecco Press', 992, 1, 'Don Quixote, first published in two parts in 1605 and 1615, is widely considered the first modern novel and one of the greatest works of Western literature. The story follows Alonso Quixano, a middle-aged gentleman from La Mancha, Spain. After reading too many books about chivalry, knights, and heroic quests, Quixano loses his grip on reality and decides to become a knight-errant himself under the name Don Quixote de la Mancha.\r\n\r\nHe dons an old suit of armor, renames an old farm horse Rocinante, and chooses a local peasant woman, Aldonza Lorenzo, as his lady love, renaming her Dulcinea del Toboso. Although she has no idea about his devotion, Don Quixote idealizes her as the perfect lady every knight must serve.\r\n\r\nAt the beginning of his journey, Don Quixote convinces a simple, loyal farmer named Sancho Panza to be his squire by promising him wealth and the governorship of an island. Sancho, though uneducated and practical, becomes Quixote’s faithful companion, providing a humorous and often wise contrast to his master’s delusions.\r\n\r\nThroughout their travels, the pair encounter ordinary people, whom Don Quixote misinterprets as villains, magicians, or noble figures from his books. One of the most famous scenes in literature occurs when Don Quixote attacks a set of windmills, believing them to be giants. This “tilting at windmills” becomes a lasting metaphor for chasing impossible dreams or fighting imaginary enemies.\r\n\r\nAs the story progresses, Don Quixote and Sancho experience many misadventures — they are beaten, mocked, and deceived by those who see Don Quixote’s madness as entertainment. However, Cervantes also presents Don Quixote not merely as a fool, but as a tragic, noble dreamer. Despite his delusions, Don Quixote’s commitment to ideals of justice, honor, and compassion make him an enduring symbol of the conflict between reality and idealism.\r\n\r\nIn the second part of the novel, published ten years later, the tone grows more reflective and self-aware. Don Quixote becomes famous within the story, as people have read the first part of his adventures. Many characters he meets pretend to play along with his fantasies for their amusement, further blurring the line between fiction and reality. Sancho Panza, meanwhile, grows wiser and more independent, showing that even the most humble person can display deep humanity and understanding.\r\n\r\nToward the end, Don Quixote returns home, exhausted and disillusioned. He regains his sanity, recognizes the foolishness of his past, and renounces the world of knight-errantry. Shortly afterward, he falls ill and dies peacefully, surrounded by his friends — a poignant conclusion that contrasts sharply with the wild adventures of his earlier days.\r\n\r\n💡 Themes and Significance\r\n\r\nCervantes uses Don Quixote to explore profound ideas about:\r\n\r\nReality vs. illusion – the tension between how things are and how we imagine them to be.\r\n\r\nIdealism vs. practicality – embodied in Don Quixote and Sancho Panza.\r\n\r\nThe power of imagination – how stories and beliefs can both inspire and deceive us.\r\n\r\nThe nature of heroism and humanity – showing that dignity can exist even in madness.\r\n\r\nDespite its humor, Don Quixote is ultimately a meditation on human hope, courage, and the struggle to live meaningfully in an imperfect world.', '720000.00', 20, 1, 'Ảnh chụp màn hình 2025-10-04 23465720251004124716.png', '2025-10-04 16:47:16', '2025-10-04 16:47:43'),
(75, 'Pride And Prejudice – Jane Austen', 'Jane Austen', 'NXB Văn Học (ấn bản bìa mềm phổ biến)', 568, 1, 'Pride and Prejudice, first published in 1813, is one of the most beloved novels in English literature. It portrays the romantic and social life of the English gentry at the beginning of the 19th century, focusing on Elizabeth Bennet, an intelligent, witty, and independent young woman, and her evolving relationship with the wealthy but seemingly proud Mr. Fitzwilliam Darcy.\r\n\r\nThe novel opens in the small countryside village of Longbourn, where Mrs. Bennet, the mother of five unmarried daughters, is desperate to see them all married well. When a wealthy bachelor, Mr. Charles Bingley, moves into a nearby estate (Netherfield Park), Mrs. Bennet is thrilled and hopes that he will fall in love with her eldest daughter, Jane Bennet. Bingley is indeed attracted to Jane, but his friend, Mr. Darcy, initially finds Elizabeth “tolerable, but not handsome enough to tempt me,” displaying the pride that defines his character early in the story.\r\n\r\nElizabeth, in turn, judges Darcy as arrogant and cold, while Darcy secretly begins to admire Elizabeth’s intelligence and spirit. Their relationship is marked by misunderstandings, social class differences, and personal prejudices. Meanwhile, Elizabeth must also navigate other relationships — her foolish mother, her pompous cousin Mr. Collins, who proposes to her and is rejected; and the charming but deceitful Mr. Wickham, whose lies almost ruin Darcy’s reputation.\r\n\r\nAs the story unfolds, both Elizabeth and Darcy undergo significant personal growth. Darcy’s pride softens as he learns humility and self-awareness, while Elizabeth recognizes her own prejudice and errors in judgment. When Darcy quietly intervenes to help Elizabeth’s family — saving her youngest sister Lydia from disgrace — Elizabeth realizes his true character and her feelings of love for him. In the end, Darcy proposes again, and this time, Elizabeth accepts. The novel closes with both couples — Elizabeth & Darcy, and Jane & Bingley — happily married.', '268000.00', 0, 0, 'Ảnh chụp màn hình 2025-10-04 23503220251004125045.png', '2025-10-04 16:50:45', '2025-10-04 16:50:45'),
(76, 'To Kill A Mockingbird – Harper Lee', 'Harper Lee', 'Nhà Xuất Bản Văn Học; Nhã Nam phát hành', 420, 1, 'To Kill a Mockingbird, first published in 1960, is a Pulitzer Prize-winning novel set in the small, fictional town of Maycomb, Alabama, during the Great Depression. The story is narrated by Jean Louise “Scout” Finch, a young girl who recounts events from her childhood that profoundly shaped her understanding of morality, justice, and human nature.\r\n\r\nScout lives with her brother Jem Finch and their widowed father, Atticus Finch, a respected lawyer known for his strong moral principles. The siblings spend their summers playing with a boy named Dill, and they are fascinated by their mysterious neighbor, Boo Radley, who never leaves his house. The children create stories and dares about him, imagining him as a ghostly figure, though he will later prove to be one of the most compassionate characters in the novel.\r\n\r\nThe central plot revolves around Atticus’s decision to defend Tom Robinson, a Black man falsely accused of raping a white woman, Mayella Ewell. Despite overwhelming evidence of Tom’s innocence, the racist society of Maycomb condemns him simply because of his race. Through this trial, Scout and Jem witness the harsh realities of racial prejudice, social injustice, and moral hypocrisy in their community.\r\n\r\nAlthough Atticus presents a powerful and logical defense, the all-white jury convicts Tom Robinson. Later, Tom is killed while trying to escape prison — an event that devastates the Finch family and shows the deep injustice of the world they live in. Meanwhile, Boo Radley, once feared and mocked, secretly protects Scout and Jem, ultimately saving them from an attack by Bob Ewell, Mayella’s vengeful father. Boo’s quiet heroism teaches Scout a lasting lesson about empathy and understanding others beyond rumor and fear.', '108000.00', 45, 1, '81aY1lxk+9L20251006141353.jpg', '2025-10-04 16:52:47', '2025-10-06 18:13:53'),
(77, 'One Hundred Years of Solitude – Gabriel García Márquez', 'Gabriel García Márquez', 'NXB Văn Học; phát hành bởi Nhã Nam', 496, 1, '“One Hundred Years of Solitude” (Trăm Năm Cô Đơn) by Gabriel García Márquez is a masterpiece of magical realism, telling the story of the Buendía family over seven generations in the fictional town of Macondo. The book blends reality with magical elements, exploring themes such as love, solitude, destiny, and the cycles of history.Márquez\'s writing style is poetic, lyrical, and rich in imagery, making each page feel like a vivid painting. The work is not only a symbol of Latin American literature but also one of the most influential books of the 20th century, earning the author the Nobel Prize in Literature in 1982. “One Hundred Years of Solitude” is an unmissable reading experience, where readers will find both enchantment and profound melancholy.', '199000.00', 55, 1, 'One Hundred Years of Solitude20251004144246.jpg', '2025-10-04 16:56:56', '2025-10-04 18:42:46'),
(79, 'The Great Gatsby', 'F. Scott Fitzgerald', 'Hội Nhà Văn', 294, 1, 'F. Scott Fitzgerald\'s \"The Great Gatsby\" is a symbol of the American Dream and the vanity of the Jazz Age. The story tells of Jay Gatsby, a wealthy and mysterious man, and his efforts to win back the love of Daisy Buchanan against the backdrop of New York\'s upper-class society in the 1920s. Through the perspective of Nick Carraway, Fitzgerald paints a picture that is both dazzling and tragic, depicting ambition, love, and destruction.Fitzgerald\'s writing style is poetic, rich in imagery, and full of lyricism, making \"The Great Gatsby\" one of the most powerful short novels in American literature. The book is not only a story about love but also a warning about the emptiness of materialism, which still resonates today.', '224000.00', 20, 1, '61uYYec8joL20251006141536.jpg', '2025-10-04 17:03:14', '2025-10-06 18:15:36'),
(80, 'Les Misérables', 'Victor Hugo', 'NXB Văn Học, bản dịch: Huỳnh Lý ‒ Vũ Đình Liên ‒ Lê Trí Viễn ‒ Đỗ Đức Hiểu', 1670, 1, '“Les Misérables” by Victor Hugo is a grand epic about compassion, forgiveness, and the human struggle in an unjust society. The book follows Jean Valjean, a former prisoner seeking redemption, along with other characters such as Fantine, Cosette, and Inspector Javert against the backdrop of post-Revolutionary France. It is a story of love, sacrifice, and hope amid the darkness of poverty and oppression.With its vast scope and richness in detail, “Les Misérables” is not just a novel but also a long poem about humanity. Hugo skillfully blends history, philosophy, and emotion to create an immortal work that has been adapted into countless musicals and films, yet the original remains an unsurpassed pinnacle.', '424000.00', 10, 1, '81uEecGiHDL20251006141617.jpg', '2025-10-04 17:06:48', '2025-10-06 18:16:17'),
(81, 'The Catcher in the Rye', 'J. D. Salinger', 'NXB Văn Học', 234, 1, '“The Catcher in the Rye” by J.D. Salinger is the voice of rebellious youth and alienation from the adult world. The book recounts three days in the life of Holden Caulfield, a teenager who has just been expelled from school, as he wanders around New York, struggling with the hypocrisy of society and his own pain.Salinger\'s unique writing style – honest, intimate, and full of character – has turned Holden into a symbol for a disaffected generation. “The Catcher in the Rye” is not only a story about adolescence but also a profound inquiry into the meaning of growing up and the loss of innocence. The book continues to hold strong appeal, especially for those who have ever felt lost in life.', '250000.00', 50, 1, '71c46ivy5xL20251006144027.jpg', '2025-10-04 17:08:27', '2025-10-06 18:40:27'),
(82, 'Anna Karenina', 'Lev Nikolayevich Tolstoy', 'Nhà xuất bản Hội Nhà Văn', 628, 1, 'Lev Tolstoy\'s \"Anna Karenina\" is a masterpiece about love, family, and 19th-century Russian society. The book tells the story of Anna, a noblewoman who abandons an unhappy marriage to pursue love with Count Vronsky, leading to tragic consequences. Parallel to this is the story of Levin, a landowner seeking the meaning of life through work and love.Tolstoy created a vast world with hundreds of characters, each depicted with astonishing psychological depth. \"Anna Karenina\" is not only a love story but also a panoramic depiction of society, religion, and morality. With the famous opening line: \"All happy families are alike; each unhappy family is unhappy in its own way,\" the book has affirmed its status as one of the greatest novels of all time.', '157000.00', 22, 1, '61MIr0esuRL20251006144053.jpg', '2025-10-04 17:10:11', '2025-10-06 18:40:53'),
(83, 'The Song of Achilles ', 'Madeline Miller', 'Ecco Press (HarperCollins)', 416, 1, '“The Song of Achilles” by Madeline Miller is an emotionally rich retelling of the Iliad through the perspective of Patroclus, the companion and lover of Achilles. The book narrates the friendship that blossoms into love between these two characters, from peaceful days to the tragedy of the Trojan War.Miller skillfully blends modern language with a mythological breath, creating a story that is both romantic and tragic. “The Song of Achilles” is not only a novel about love but also a tribute to human sacrifice and helplessness in the face of fate. Although it is a newer work compared to other classics on the list, it quickly gained recognition as a modern masterpiece, winning the Orange Prize in 2012 and captivating millions of readers worldwide.', '300000.00', 12, 1, 'Ảnh chụp màn hình 2025-10-05 00105720251004131150.png', '2025-10-04 17:11:50', '2025-10-04 17:11:50'),
(84, 'The Midnight Library', 'Matt Haig', 'Viking / Penguin Random House', 304, 1, 'The Midnight Library tells the story of Nora Seed, who finds herself in a state between life and death, and is able to live in the \'Midnight Library\' where each book represents a different life she could choose. She is allowed to try living according to different decisions she once wished she had made — for example, if she had continued playing music, if she had accepted a different job, if she had married a certain person… But through each life, she realizes that no life is perfect, and sometimes the most important thing is not avoiding mistakes but learning to accept yourself and finding meaning in the present.', '330000.00', 11, 1, '61fdrEuPJwL20251006144123.jpg', '2025-10-04 17:18:03', '2025-10-06 18:41:23'),
(85, 'Circe', 'Madeline Miller', 'Little, Brown and Company', 400, 1, 'Circe is a story told from the perspective of the goddess/witch Circe in Greek mythology. Born as the daughter of the sun god Helios, Circe was considered weaker than other goddesses. When banished to the deserted island of Aiaia, she discovers her own witchcraft powers — turning anyone who opposes her into animals. Throughout her journey, Circe encounters Odysseus, has a child, struggles with the gods and fate. She is independent, enduring, and ultimately finds a path to living as a normal human — with love, a child, and freedom. The work emphasizes themes of power, exception, destiny, and women in mythology.', '244000.00', 55, 1, '91A1-6ny+pL20251006144150.jpg', '2025-10-04 17:19:23', '2025-10-06 18:41:50'),
(86, 'A Feast for Crows', 'George R. R. Martin', 'Bantam', 784, 1, 'A Feast for Crows là cuốn thứ 4 trong loạt A Song of Ice and Fire. Trong khi chiến tranh giữa các gia tộc vẫn tiếp diễn, nhiều nhân vật chính bị để ngỏ, nhiều vương quốc hỗn loạn và quyền lực đổi thay. Cuốn này tập trung phần lớn vào những vùng chưa được nhiều chú ý (Dorne, vùng Sông Trắng, vùng biển), các âm mưu hoàng tộc, chiến lược chính trị và những nhân vật đứng trong bóng tối. Bởi vì có rất nhiều tuyến nhân vật, Martin chia nhỏ các mạch truyện để khắc họa sự phức tạp của thế giới Westeros sau các cuộc chiến lớn.', '210000.00', 0, 0, 'Ảnh chụp màn hình 2025-10-05 00213220251004132142.png', '2025-10-04 17:21:42', '2025-10-04 17:21:42'),
(87, 'Where Sleeping Girls Lie', 'Faridah Àbíké-Íyímídé', 'Henry Holt and Co', 320, 1, 'Where Sleeping Girls Lie is a psychological thriller centered around two young people – Kora and Kendal – childhood friends. After the mysterious death of their classmate Alison, Kora returns to her old home to confront the past and its mysteries. She discovers that all her former classmates have dark secrets — and her return is not only to uncover that incident but also to free herself from old memories. As the truths gradually unfold, Kora wonders: can she tell who is real and who is deceitful?', '239000.00', 11, 1, 'Ảnh chụp màn hình 2025-10-05 00230120251004132315.png', '2025-10-04 17:23:15', '2025-10-04 17:23:15'),
(88, 'The Women', 'The Women', 'The Women', 432, 1, 'The Women tells the story of three women — Tru, Noel, and Reese — during the Vietnam War. When Reese loses her husband, she turns to Noel and her daughter Tru for help in raising her children, while also reopening the journal her husband had written. Memories from the battlefield, lost loves, sacrifices, and tested loyalties — all come together to portray the strength of friendship, courage, and how the wounds of war affect women often overlooked. Kristin Hannah explores the theme of war from a woman\'s perspective — resilience, loss, and the longing for healing.', '417000.00', 22, 1, 'Ảnh chụp màn hình 2025-10-05 00242720251004132446.png', '2025-10-04 17:24:46', '2025-10-04 17:24:46'),
(89, 'Shadow and Bone', 'Shadow and Bone', 'Henry Holt & Company / Imprint Flatiron Books', 337, 1, 'Shadow and Bone is the first installment in the Grishaverse series, telling the story of Alina Starkov – an orphaned young woman and childhood friend of someone – who discovers that she has a special power: a type of magic strong enough to destroy the Darkness that divides the country. When pursued by enemies, she is taken to a special training place for the Grisha – people with magical abilities – to learn how to control her power and understand her destiny. At the same time, Alina must figure out who is a friend and who is an enemy in an environment full of power schemes, ambitions, and secrets. The work combines fantasy, action, and elements of self-discovery.', '249000.00', 88, 1, '71c46ivy5xL20251006144214.jpg', '2025-10-04 17:26:22', '2025-10-06 18:42:14'),
(90, 'Wishtree', 'Katherine Applegate', 'Feiwel & Friends (imprint of Macmillan)', 304, 1, 'Wishtree is a story told from the perspective of the ancient tree “Wishtree” – an old oak in the neighborhood. This tree is a place where people often hang their wishes written on paper. During a season of bridging community divides marked by racial tensions and prejudice, a boy named Red – a squirrel – and Wishtree step in to act as a bridge of kindness and understanding. The work is gentle and full of humanity, speaking about diversity, kindness, and how a small community can change through small actions and through empathy and connection between people.', '260000.00', 15, 1, 'Ảnh chụp màn hình 2025-10-05 00270820251004132727.png', '2025-10-04 17:27:27', '2025-10-04 17:27:27'),
(91, 'Wuthering Heights', 'Emily Brontë', 'Penguin Classics', 416, 1, 'Wuthering Heights is a gothic novel about the intense but tragic love between Heathcliff and Catherine Earnshaw. Heathcliff is adopted by Catherine\'s father, but there are differences between them in social status and behavior. When Catherine chooses to marry Edgar Linton for social advantage, Heathcliff returns with a desire for revenge, gradually destroying the lives of those around him. The work explores themes of love, hatred, ego, and how negative memories and emotions can haunt multiple generations.', '80000.00', 4, 1, 'Ảnh chụp màn hình 2025-10-05 00294820251004133011.png', '2025-10-04 17:30:11', '2025-10-04 17:30:11'),
(92, 'The Witches', 'The Witches', 'Puffin Books hoặc publisher bản gốc như William Collins', 208, 1, '\'The Witches\' is a children\'s story that blends whimsical and humorous elements by Roald Dahl. The story follows a boy (who is unnamed) living with his grandmother, an expert on witches. They live in a world where witches truly exist—but they disguise themselves cleverly to blend into the human world. When the boy discovers a witches\' convention plotting to turn all children into mice, he and his grandmother must find a way to stop the plan. The story is both thrilling and metaphorical, illustrating the fight against evil and the protection of the innocent.', '200000.00', 11, 1, 'Ảnh chụp màn hình 2025-10-05 00310620251004133131.png', '2025-10-04 17:31:31', '2025-10-04 17:31:31'),
(93, 'Beautiful World, Where Are You', 'Sally Rooney', 'Farrar', 304, 1, 'Beautiful World, Where Are You tells the story of four young friends — Alice, Eileen, Felix, and Simon — who are trying to find meaning in modern life: love, career, fame, and the fragility of belief. Alice is a novelist, Eileen works at a publishing company; they exchange letters and confidences about literature, friends, relationships, and ways of living in the digital age. The story explores the conflicts between the desire to connect with others and the need for privacy; between ideals and reality — when everything in the world seems beautiful yet harbors concerns about morality, society, and the individual.', '350000.00', 0, 0, 'Ảnh chụp màn hình 2025-10-05 00321920251004133248.png', '2025-10-04 17:32:48', '2025-10-04 17:32:48'),
(94, 'Educated ', 'Tara Westover', 'Random House / Penguin Books', 253, 4, '\'Educated\' is a memoir about the life of Tara Westover, who grew up in an extreme Mormon family in Idaho, where her mother treated illnesses with herbal remedies, her father was suspicious of the government, and children were not sent to formal schools. Tara did not have a birth certificate until adulthood and knew almost nothing about history or the world beyond her home. As an adult, she self-studied to gain admission to universities – first Brigham Young University, then Cambridge, and Harvard. She had to overcome psychological barriers, family conflicts, and personal beliefs to explore herself, knowledge, and freedom. Her journey is a struggle between family and education; between tradition and change; between lies and truth. The book is not just about learning but about reclaiming knowledge, identity, and control over one’s own life.', '279000.00', 12, 1, 'Ảnh chụp màn hình 2025-10-05 00381020251004133835.png', '2025-10-04 17:38:35', '2025-10-05 02:39:59');
INSERT INTO `books` (`id`, `name`, `author`, `publisher`, `pages`, `category_id`, `description`, `price`, `quantity`, `status`, `cover`, `created_at`, `updated_at`) VALUES
(95, 'Atomic Habits ', 'ames Clear', 'Avery (một imprint của Penguin Random House)', 320, 4, 'Atomic Habits presents how small habits (atomic habits), when implemented correctly, can create significant changes over time. Clear divides the book into practical guidance sections: how to form new habits more easily, eliminate bad habits, design an environment that supports habits, measure progress, overcome failures, and maintain perseverance. He uses numerous psychological and biological studies, as well as real-life examples to illustrate his points. The book is suitable for anyone who wants to change themselves – in health, work, or studies – through small but systematic steps.', '450000.00', 0, 0, 'Ảnh chụp màn hình 2025-10-05 00393020251004133955.png', '2025-10-04 17:39:55', '2025-10-05 02:39:28'),
(96, 'Why Nations Fail', 'Daron Acemoglu & James A. Robinson', 'Crown Publishing Group / Profile Books', 544, 4, 'The book investigates what makes a nation rich or poor: the authors argue that it is not geography, culture, or natural resources that are decisive, but institutions – the way power is distributed, laws are enforced, property rights and political participation are ensured. They distinguish between \'inclusive institutions,\' where people are allowed to participate, have property rights, and opportunities; and \'extractive institutions,\' where power is concentrated, stifling initiative. Through numerous historical examples from Africa, Asia, Latin America, to Europe, they demonstrate that good institutions lead to economic development and stability, while bad institutions lead to poverty, injustice, and stagnation.', '396000.00', 33, 1, '81-U74ULsML20251006144242.jpg', '2025-10-05 02:41:55', '2025-10-06 18:42:42'),
(97, 'Antifragile', 'Nassim Nicholas Taleb', 'Random House / Penguin', 544, 4, 'Taleb develops the concept of \'antifragility\' – not just \'not being destroyed under pressure\' (resilience), but \'improving when exposed to stress or disorder\' (thriving under disorder). He examines how systems – biological, social, economic – can be designed not only to withstand volatility but also to leverage it for growth. Examples include financial markets, ecosystems, and personal habits. Taleb combines philosophy, mathematics, history, and personal experience to show that many people pursue safety to the extent of missing opportunities, while the best outcomes often come from the ability to endure and adapt. The book challenges traditional ways of thinking about risk.', '500000.00', 65, 1, '81uEecGiHDL20251006144300.jpg', '2025-10-05 02:43:47', '2025-10-06 18:43:00'),
(98, 'A History of Natural Resources in Asia: The Wealth of Nature', 'abc', 'xyz', 444, 4, 'The book surveys the history and usage of natural resources in Asia – land, minerals, forests, water – and the interaction between humans and nature. It discusses extraction, conservation, policies affecting resources, the rights of indigenous people, and how resources are regarded as \'soft power\' and sources of inequality. The structure can be divided by region – South Asia, East Asia, Southeast Asia – and by topics such as climate change, mining, and sustainable forestry.', '100000.00', 0, 0, '71xiJ4Iw0VL20251006144315.jpg', '2025-10-05 02:46:27', '2025-10-06 18:43:15'),
(104, 'The Power of Habit ', '— Charles Duhigg', 'Random House', 416, 4, 'Duhigg analyzes the structure of the \'habit loop\' (cue–routine–reward) and how it can be used to change behavior in individuals, businesses, and society. Through case studies (from Starbucks to labor movements), the author points out that identifying cues and rewards is key to designing new routines. The book provides a practical framework for organizational management and personal development.', '200000.00', 22, 1, 'Ảnh chụp màn hình 2025-10-05 10040920251004230423.png', '2025-10-05 03:04:23', '2025-10-05 03:04:23'),
(105, 'The Black Swan ', 'Nassim Nicholas Taleb', 'Random House', 444, 4, 'Taleb talks about \"Black Swan\" events — rare, unpredictable, but with extreme impact (for example: economic crises, major inventions). He points out that traditional cognitive frameworks and statistical models often fail to foresee these events. The book encourages humble thinking in forecasting and designing \"antifragile\" systems to withstand major risks.', '300000.00', 11, 1, 'Ảnh chụp màn hình 2025-10-05 10055220251004230607.png', '2025-10-05 03:06:07', '2025-10-05 03:06:07'),
(106, 'Bad Blood: Secrets and Lies in a Silicon Valley Startup ', 'John Carreyrou', 'Knopf / Vintage', 400, 4, 'The investigation into Theranos and Elizabeth Holmes — the story of a fast-growing startup built on scientific lies, false technological claims, and personal ambition. Carreyrou draws on records, interviews, and internal documents to illustrate how the VC ecosystem, the media, and Silicon Valley culture were at times blinded by the legend. The book serves as a moral lesson and a warning to the technology and investment sectors.', '300000.00', 123, 1, 'Ảnh chụp màn hình 2025-10-05 10072220251004230732.png', '2025-10-05 03:07:32', '2025-10-05 03:07:32'),
(107, 'Unbroken ', ' Laura Hillenbrand', 'Random House', 473, 4, 'A memoir/biography recounting the life of Louis Zamperini — an Olympic athlete turned WWII soldier — who survived a plane crash, drifted for 47 days on the ocean, and endured harsh imprisonment in Japan. The book celebrates courage, perseverance, forgiveness, and the process of recovery from psychological trauma. Hillenbrand details both the historical context and the character\'s inner experiences.', '250000.00', 33, 1, 'Ảnh chụp màn hình 2025-10-05 10083820251004230854.png', '2025-10-05 03:08:54', '2025-10-05 03:08:54'),
(108, 'The Sixth Extinction ', '— Elizabeth Kolbert', 'Henry Holt', 336, 4, 'Kolbert examines scientific evidence showing that the Earth is experiencing its sixth mass extinction — caused by human activities: climate change, environmental destruction, and invasive species. Through field trips and interviews with scientists, the author describes species rapidly losing biodiversity and the long-term consequences for ecosystems and humanity.', '280000.00', 25, 1, 'Ảnh chụp màn hình 2025-10-05 10095820251004231012.png', '2025-10-05 03:10:12', '2025-10-05 03:10:12'),
(109, 'Guns, Germs, and Steel ', ' Jared Diamond', 'W. W. Norton', 537, 4, 'Diamond explains why societies in Europe and Eurasia developed weapons, diseases, and technology faster than other societies: not because of genetics, but due to geography, the domestication of plants and animals, and favorable environments. The book combines history, ecology, and anthropology to illuminate the origins of global inequality.', '345000.00', 14, 1, 'Ảnh chụp màn hình 2025-10-05 10112220251004231131.png', '2025-10-05 03:11:31', '2025-10-05 03:11:31'),
(110, 'Man’s Search for Meaning ', ' Viktor E. Frankl', 'Beacon Press', 200, 4, 'Frankl – a psychiatrist and concentration camp prisoner – recounts his experiences and develops \"logotherapy\": the idea that humans seek meaning in suffering. The book combines memoir and therapeutic reasoning to show that finding meaning is the key to survival and mental recovery, even in the most extreme conditions of suffering.', '150000.00', 23, 1, 'Ảnh chụp màn hình 2025-10-05 10122620251004231237.png', '2025-10-05 03:12:37', '2025-10-05 03:12:37'),
(111, 'Quiet: The Power of Introverts in a World That Can’t Stop Talking ', ' Susan Cain', 'Crown Publishing', 352, 4, 'Susan Cain affirms the value of introverts — deep qualities such as independent thinking, focus, and listening — in a modern world that prioritizes loud communication and teamwork. Through scientific research and real-life stories, she proposes ways for organizations (schools, workplaces) to respect both personality types in order to leverage different strengths.', '220000.00', 32, 1, 'Ảnh chụp màn hình 2025-10-05 10133920251004231351.png', '2025-10-05 03:13:51', '2025-10-05 03:13:51'),
(112, 'Invisible Women: Data Bias in a World Designed for Men ', 'Caroline Criado Perez', 'Abrams Press / Penguin', 321, 4, 'Perez collects data showing that many systems (healthcare, transportation, products, policies) are designed with the default of \"male users,\" causing women to be disadvantaged in terms of health, safety, and opportunities. The book is a thorough data analysis, accompanied by specific examples, calling for fairer design.', '333000.00', 28, 1, 'Ảnh chụp màn hình 2025-10-05 10145320251004231502.png', '2025-10-05 03:15:02', '2025-10-05 03:15:02'),
(113, 'Outliers: The Story of Success ', ' Malcolm Gladwell', 'Little, Brown and Company', 320, 4, 'Gladwell analyzes the factors that contribute to success, showing that it is not only personal talent but also circumstances, culture, opportunities, and \'10,000 hours of practice.\' Through real-life stories (the Beatles, Bill Gates, etc.), he highlights the importance of initial conditions and social connections in personal achievements.', '456000.00', 23, 1, 'Ảnh chụp màn hình 2025-10-05 10154120251004231633.png', '2025-10-05 03:16:33', '2025-10-05 03:16:33');

-- --------------------------------------------------------

--
-- Table structure for table `carts`
--

CREATE TABLE `carts` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `book_id` int(10) UNSIGNED DEFAULT NULL,
  `price` decimal(12,2) NOT NULL DEFAULT 0.00,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `carts`
--

INSERT INTO `carts` (`id`, `user_id`, `book_id`, `price`, `quantity`, `created_at`, `updated_at`) VALUES
(8, 46, 1, '1200000.00', 1, '2025-10-01 18:57:31', '2025-10-01 18:57:31'),
(14, NULL, 30, '420000.00', 1, '2025-10-03 10:51:36', '2025-10-03 10:51:36'),
(15, NULL, 14, '480000.00', 1, '2025-10-03 11:21:25', '2025-10-03 11:21:25'),
(17, NULL, 14, '480000.00', 1, '2025-10-03 11:42:28', '2025-10-03 11:42:28'),
(18, NULL, 13, '1.20', 1, '2025-10-03 11:45:59', '2025-10-03 11:45:59'),
(19, NULL, 13, '1.20', 1, '2025-10-03 11:46:32', '2025-10-03 11:46:32'),
(23, NULL, 30, '420000.00', 1, '2025-10-03 14:08:02', '2025-10-03 14:08:02'),
(24, NULL, 95, '540000.00', 1, '2025-10-04 18:39:22', '2025-10-04 18:39:22'),
(25, 46, 81, '300000.00', 1, '2025-10-04 18:48:13', '2025-10-04 18:48:13');

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `id` int(10) UNSIGNED NOT NULL,
  `name` varchar(255) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`id`, `name`, `created_at`, `updated_at`) VALUES
(1, 'Fiction', '2025-09-25 16:35:06', '2025-09-29 07:00:42'),
(2, 'History', '2025-09-28 05:17:47', '2025-09-28 05:17:47'),
(3, 'Science', '2025-09-28 07:30:35', '2025-09-28 07:30:35'),
(4, 'Non-Fiction', '2025-09-28 07:31:04', '2025-09-28 07:31:04'),
(10, 'Self-Help', '2025-09-29 05:31:07', '2025-09-29 05:49:20'),
(17, 'Education', '2025-09-29 07:02:31', '2025-09-29 07:02:31'),
(18, 'Fantasy', '2025-09-29 07:03:00', '2025-09-29 07:03:00'),
(19, 'Horror', '2025-09-29 07:03:08', '2025-09-29 07:03:08'),
(20, 'Classics', '2025-09-29 07:03:25', '2025-09-29 07:03:25');

-- --------------------------------------------------------

--
-- Table structure for table `orderdetails`
--

CREATE TABLE `orderdetails` (
  `id` int(10) UNSIGNED NOT NULL,
  `order_id` int(10) UNSIGNED DEFAULT NULL,
  `book_id` int(10) UNSIGNED DEFAULT NULL,
  `price` decimal(12,2) NOT NULL DEFAULT 0.00,
  `quantity` int(11) NOT NULL DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orderdetails`
--

INSERT INTO `orderdetails` (`id`, `order_id`, `book_id`, `price`, `quantity`, `created_at`, `updated_at`) VALUES
(1, 1, 30, '2222220.00', 1, '2025-09-28 15:53:05', '2025-09-28 15:53:05'),
(2, 2, 1, '1200000.00', 1, '2025-10-01 14:50:48', '2025-10-01 14:50:48'),
(3, 3, 14, '1.20', 1, '2025-10-01 14:51:25', '2025-10-01 14:51:25'),
(4, 4, 30, '420000.00', 1, '2025-10-01 14:51:27', '2025-10-01 14:51:27'),
(5, 5, 13, '1.20', 1, '2025-10-01 15:00:30', '2025-10-01 15:00:30'),
(6, 6, 30, '420000.00', 1, '2025-10-01 15:01:10', '2025-10-01 15:01:10'),
(7, 7, 30, '420000.00', 1, '2025-10-01 15:55:48', '2025-10-01 15:55:48'),
(8, 8, 30, '420000.00', 1, '2025-10-01 15:57:24', '2025-10-01 15:57:24'),
(9, 9, 30, '420000.00', 1, '2025-10-01 16:10:44', '2025-10-01 16:10:44'),
(10, 10, 30, '420000.00', 1, '2025-10-01 16:15:48', '2025-10-01 16:15:48'),
(11, 11, 30, '420000.00', 1, '2025-10-01 16:16:50', '2025-10-01 16:16:50'),
(12, 12, 30, '420000.00', 1, '2025-10-01 16:17:11', '2025-10-01 16:17:11'),
(13, 15, 30, '300000.00', 1, '2025-10-01 16:38:47', '2025-10-01 16:38:47'),
(14, 16, 30, '300000.00', 1, '2025-10-01 16:42:08', '2025-10-01 16:42:08'),
(15, 17, 30, '300000.00', 1, '2025-10-01 16:44:36', '2025-10-01 16:44:36'),
(16, 18, 30, '300000.00', 1, '2025-10-01 16:47:23', '2025-10-01 16:47:23'),
(17, 19, 30, '300000.00', 1, '2025-10-01 16:49:27', '2025-10-01 16:49:27'),
(18, 20, 30, '300000.00', 1, '2025-10-01 16:49:32', '2025-10-01 16:49:32'),
(19, 21, 30, '300000.00', 2, '2025-10-01 16:50:48', '2025-10-01 16:50:48'),
(20, 22, 30, '300000.00', 2, '2025-10-01 16:50:57', '2025-10-01 16:50:57'),
(21, 23, 30, '300000.00', 2, '2025-10-01 16:53:28', '2025-10-01 16:53:28'),
(22, 24, 30, '300000.00', 3, '2025-10-01 16:54:25', '2025-10-01 16:54:25'),
(23, 25, 30, '300000.00', 1, '2025-10-01 17:07:35', '2025-10-01 17:07:35'),
(24, 26, 30, '300000.00', 5, '2025-10-01 17:14:59', '2025-10-01 17:14:59'),
(25, 27, 30, '300000.00', 3, '2025-10-01 17:17:08', '2025-10-01 17:17:08'),
(26, 28, 30, '420000.00', 2, '2025-10-02 14:03:26', '2025-10-02 14:03:26'),
(27, 29, 30, '420000.00', 1, '2025-10-02 14:09:52', '2025-10-02 14:09:52'),
(28, 30, 30, '420000.00', 3, '2025-10-02 14:15:44', '2025-10-02 14:15:44'),
(29, 31, 30, '420000.00', 4, '2025-10-02 17:55:57', '2025-10-02 17:55:57'),
(30, 32, 30, '420000.00', 1, '2025-10-02 17:59:43', '2025-10-02 17:59:43'),
(31, 33, 30, '420000.00', 1, '2025-10-02 18:00:18', '2025-10-02 18:00:18'),
(32, 34, 30, '420000.00', 1, '2025-10-02 18:00:48', '2025-10-02 18:00:48'),
(33, 35, 30, '420000.00', 1, '2025-10-02 18:03:12', '2025-10-02 18:03:12'),
(34, 36, 30, '420000.00', 1, '2025-10-02 18:05:20', '2025-10-02 18:05:20'),
(35, 37, 30, '420000.00', 1, '2025-10-02 18:06:33', '2025-10-02 18:06:33'),
(37, 39, 30, '420000.00', 1, '2025-10-02 18:08:12', '2025-10-02 18:08:12'),
(38, 40, 30, '420000.00', 1, '2025-10-02 18:09:18', '2025-10-02 18:09:18'),
(39, 41, 30, '420000.00', 1, '2025-10-02 18:10:49', '2025-10-02 18:10:49'),
(40, 43, 30, '420000.00', 1, '2025-10-02 18:19:53', '2025-10-02 18:19:53'),
(42, 45, 30, '420000.00', 1, '2025-10-02 18:25:08', '2025-10-02 18:25:08'),
(43, 46, 13, '1.20', 1, '2025-10-02 18:25:53', '2025-10-02 18:25:53'),
(44, 47, 13, '1.20', 1, '2025-10-02 18:28:03', '2025-10-02 18:28:03'),
(45, 48, 13, '1.20', 2, '2025-10-02 18:31:16', '2025-10-02 18:31:16'),
(46, 49, 13, '1.20', 2, '2025-10-02 18:32:35', '2025-10-02 18:32:35'),
(47, 50, 13, '1.20', 2, '2025-10-02 18:32:45', '2025-10-02 18:32:45'),
(49, 52, 13, '1.20', 1, '2025-10-02 18:43:13', '2025-10-02 18:43:13'),
(50, 53, 30, '420000.00', 1, '2025-10-02 18:43:54', '2025-10-02 18:43:54'),
(51, 54, 14, '1.20', 1, '2025-10-02 18:45:24', '2025-10-02 18:45:24'),
(52, 55, 30, '420000.00', 1, '2025-10-02 18:49:01', '2025-10-02 18:49:01'),
(53, 56, 30, '420000.00', 1, '2025-10-02 18:51:01', '2025-10-02 18:51:01'),
(54, 57, 30, '420000.00', 1, '2025-10-02 18:54:32', '2025-10-02 18:54:32'),
(55, 58, 14, '480000.00', 1, '2025-10-03 06:15:44', '2025-10-03 06:15:44'),
(56, 59, 30, '420000.00', 1, '2025-10-03 07:14:27', '2025-10-03 07:14:27'),
(57, 60, 30, '420000.00', 1, '2025-10-03 07:14:33', '2025-10-03 07:14:33'),
(58, 61, 30, '420000.00', 1, '2025-10-03 07:16:24', '2025-10-03 07:16:24'),
(59, 62, 30, '420000.00', 1, '2025-10-03 07:16:30', '2025-10-03 07:16:30'),
(60, 63, 30, '420000.00', 1, '2025-10-03 07:18:03', '2025-10-03 07:18:03'),
(61, 64, 30, '300000.00', 1, '2025-10-03 07:18:12', '2025-10-03 07:18:12'),
(62, 65, 1, '1200000.00', 1, '2025-10-03 07:18:26', '2025-10-03 07:18:26'),
(63, 66, 14, '480000.00', 1, '2025-10-03 11:35:50', '2025-10-03 11:35:50'),
(64, 67, 13, '1.20', 1, '2025-10-03 11:37:03', '2025-10-03 11:37:03'),
(65, 68, 14, '480000.00', 1, '2025-10-03 11:38:49', '2025-10-03 11:38:49'),
(66, 69, 13, '1.20', 1, '2025-10-03 11:52:03', '2025-10-03 11:52:03'),
(68, 76, 1, '1200000.00', 1, '2025-10-03 12:32:23', '2025-10-03 12:32:23'),
(69, 77, 77, '199000.00', 1, '2025-10-04 18:39:49', '2025-10-04 18:39:49'),
(70, 78, 94, '334800.00', 1, '2025-10-04 18:40:30', '2025-10-04 18:40:30'),
(71, 79, 88, '500400.00', 1, '2025-10-04 18:43:59', '2025-10-04 18:43:59'),
(72, 80, 72, '245000.00', 1, '2025-10-04 18:44:13', '2025-10-04 18:44:13'),
(73, 81, 75, '268000.00', 1, '2025-10-04 18:47:23', '2025-10-04 18:47:23'),
(74, 82, 38, '210000.00', 1, '2025-10-04 18:47:51', '2025-10-04 18:47:51'),
(75, 83, 66, '286800.00', 4, '2025-10-04 18:48:07', '2025-10-04 18:48:07'),
(76, 84, 91, '96000.00', 1, '2025-10-04 18:48:29', '2025-10-04 18:48:29');

-- --------------------------------------------------------

--
-- Table structure for table `orders`
--

CREATE TABLE `orders` (
  `id` int(10) UNSIGNED NOT NULL,
  `user_id` int(10) UNSIGNED DEFAULT NULL,
  `status` tinyint(4) NOT NULL DEFAULT 0,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_general_ci;

--
-- Dumping data for table `orders`
--

INSERT INTO `orders` (`id`, `user_id`, `status`, `created_at`, `updated_at`) VALUES
(1, 46, 2, '2025-09-28 15:52:28', '2025-10-03 06:39:15'),
(2, 46, 2, '2025-08-01 14:50:48', '2025-10-03 06:43:01'),
(3, 46, 0, '2025-10-01 14:51:25', '2025-10-01 14:51:25'),
(4, 46, 0, '2025-10-01 14:51:27', '2025-10-01 14:51:27'),
(5, 46, 0, '2025-10-01 15:00:30', '2025-10-01 15:00:30'),
(6, 46, 2, '2025-07-01 15:01:10', '2025-10-03 06:43:24'),
(7, 46, 0, '2025-10-01 15:55:48', '2025-10-01 15:55:48'),
(8, 46, 0, '2025-10-01 15:57:24', '2025-10-01 15:57:24'),
(9, 48, 0, '2025-10-01 16:10:44', '2025-10-01 16:10:44'),
(10, 49, 0, '2025-10-01 16:15:48', '2025-10-01 16:15:48'),
(11, 46, 0, '2025-10-01 16:16:50', '2025-10-01 16:16:50'),
(12, 50, 0, '2025-10-01 16:17:11', '2025-10-01 16:17:11'),
(13, 46, 0, '2025-10-01 16:37:26', '2025-10-01 16:37:26'),
(14, 46, 0, '2025-10-01 16:37:44', '2025-10-01 16:37:44'),
(15, 46, 0, '2025-10-01 16:38:47', '2025-10-01 16:38:47'),
(16, 46, 0, '2025-10-01 16:42:08', '2025-10-01 16:42:08'),
(17, 46, 0, '2025-10-01 16:44:36', '2025-10-01 16:44:36'),
(18, 46, 0, '2025-10-01 16:47:23', '2025-10-01 16:47:23'),
(19, 46, 0, '2025-10-01 16:49:27', '2025-10-01 16:49:27'),
(20, 46, 0, '2025-10-01 16:49:32', '2025-10-01 16:49:32'),
(21, 46, 0, '2025-10-01 16:50:48', '2025-10-01 16:50:48'),
(22, 46, 0, '2025-10-01 16:50:57', '2025-10-01 16:50:57'),
(23, 46, 0, '2025-10-01 16:53:28', '2025-10-01 16:53:28'),
(24, 46, 0, '2025-10-01 16:54:25', '2025-10-01 16:54:25'),
(25, 46, 0, '2025-10-01 17:07:35', '2025-10-01 17:07:35'),
(26, 46, 0, '2025-10-01 17:14:59', '2025-10-01 17:14:59'),
(27, 46, 0, '2025-10-01 17:17:08', '2025-10-01 17:17:08'),
(28, 46, 0, '2025-10-02 14:03:26', '2025-10-02 14:03:26'),
(29, 46, 2, '2025-10-02 14:09:52', '2025-10-02 15:36:56'),
(30, 46, 0, '2025-10-02 14:15:44', '2025-10-02 14:15:44'),
(31, 46, 0, '2025-10-02 17:55:57', '2025-10-02 17:55:57'),
(32, 46, 0, '2025-10-02 17:59:42', '2025-10-02 17:59:42'),
(33, 46, 0, '2025-10-02 18:00:18', '2025-10-02 18:00:18'),
(34, 46, 0, '2025-10-02 18:00:48', '2025-10-02 18:00:48'),
(35, 46, 2, '2025-10-02 18:03:12', '2025-10-03 06:41:13'),
(36, 46, 2, '2025-10-02 18:05:20', '2025-10-03 06:42:14'),
(37, 46, 0, '2025-10-02 18:06:33', '2025-10-02 18:06:33'),
(39, 46, 0, '2025-10-02 18:08:12', '2025-10-02 18:08:12'),
(40, 51, 2, '2025-10-02 18:09:18', '2025-10-03 07:05:13'),
(41, 46, 0, '2025-10-02 18:10:49', '2025-10-02 18:10:49'),
(42, 46, 0, '2025-10-02 18:17:56', '2025-10-02 18:17:56'),
(43, 46, 2, '2025-10-02 18:19:53', '2025-10-03 07:05:09'),
(45, NULL, 0, '2025-10-02 18:25:08', '2025-10-02 18:25:08'),
(46, NULL, 0, '2025-10-02 18:25:53', '2025-10-02 18:25:53'),
(47, NULL, 0, '2025-10-02 18:28:03', '2025-10-02 18:28:03'),
(48, NULL, 0, '2025-10-02 18:31:16', '2025-10-02 18:31:16'),
(49, NULL, 0, '2025-10-02 18:32:35', '2025-10-02 18:32:35'),
(50, NULL, 0, '2025-10-02 18:32:45', '2025-10-02 18:32:45'),
(52, NULL, 0, '2025-10-02 18:43:13', '2025-10-02 18:43:13'),
(53, NULL, 0, '2025-10-02 18:43:54', '2025-10-02 18:43:54'),
(54, NULL, 0, '2025-10-02 18:45:24', '2025-10-02 18:45:24'),
(55, NULL, 0, '2025-10-02 18:49:01', '2025-10-02 18:49:01'),
(56, NULL, 0, '2025-10-02 18:51:01', '2025-10-02 18:51:01'),
(57, 46, 2, '2025-10-02 18:54:32', '2025-10-03 05:01:40'),
(58, 57, 1, '2025-10-03 06:15:44', '2025-10-03 07:03:59'),
(59, 46, 0, '2025-10-03 07:14:27', '2025-10-03 07:14:27'),
(60, 46, 0, '2025-10-03 07:14:33', '2025-10-03 07:14:33'),
(61, 46, 0, '2025-10-03 07:16:24', '2025-10-03 07:16:24'),
(62, 46, 0, '2025-10-03 07:16:29', '2025-10-03 07:16:29'),
(63, 46, 0, '2025-10-03 07:18:03', '2025-10-03 07:18:03'),
(64, 46, 0, '2025-10-03 07:18:12', '2025-10-03 07:18:12'),
(65, 46, 0, '2025-10-03 07:18:26', '2025-10-03 07:18:26'),
(66, 46, 0, '2025-10-03 11:35:50', '2025-10-03 11:35:50'),
(67, 46, 0, '2025-10-03 11:37:03', '2025-10-03 11:37:03'),
(68, 46, 0, '2025-10-03 11:38:49', '2025-10-03 11:38:49'),
(69, 46, 0, '2025-10-03 11:52:03', '2025-10-03 11:52:03'),
(70, 46, 0, '2025-10-03 12:21:15', '2025-10-03 12:21:15'),
(71, 46, 0, '2025-10-03 12:27:13', '2025-10-03 12:27:13'),
(72, 46, 0, '2025-10-03 12:27:26', '2025-10-03 12:27:26'),
(73, 46, 0, '2025-10-03 12:27:41', '2025-10-03 12:27:41'),
(74, 46, 0, '2025-10-03 12:27:45', '2025-10-03 12:27:45'),
(76, 46, 1, '2025-10-03 12:32:23', '2025-10-05 16:43:50'),
(77, 46, 2, '2025-10-04 18:39:49', '2025-10-04 18:40:51'),
(78, 46, 2, '2025-10-04 18:40:30', '2025-10-04 18:40:50'),
(79, 46, 2, '2025-10-04 18:43:59', '2025-10-04 18:44:29'),
(80, 46, 2, '2025-10-04 18:44:13', '2025-10-04 18:44:28'),
(81, 46, 2, '2025-10-04 18:47:23', '2025-10-04 18:47:37'),
(82, 46, 2, '2025-10-04 18:47:51', '2025-10-04 18:48:43'),
(83, 46, 2, '2025-10-04 18:48:07', '2025-10-04 18:48:41'),
(84, 46, 2, '2025-10-04 18:48:29', '2025-10-04 18:48:38');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(10) UNSIGNED NOT NULL,
  `username` varchar(100) NOT NULL,
  `email` varchar(100) NOT NULL,
  `password` varchar(255) NOT NULL,
  `address` varchar(255) DEFAULT NULL,
  `role` tinyint(4) DEFAULT 1,
  `created_at` timestamp NOT NULL DEFAULT current_timestamp(),
  `updated_at` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp()
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `username`, `email`, `password`, `address`, `role`, `created_at`, `updated_at`) VALUES
(19, 'Hoa rơi cửa phật', 'phamdinhthai312322222@abc.com', '$2y$10$iGB2VH4xFNfwHhafgmVh1.LnZs16h1lcIoHI7FJw864Vth8fQEOWO', 'Bac Ninh', 1, '2025-09-23 07:27:55', '2025-09-23 07:27:55'),
(20, '1234', 'phamdinhtha22@abc.com', '$2y$10$NaoAXKbKnVCyJKcJ0V2d0OVENFDYlVxBtzo.n1VxTpAGZtm.EMrXK', 'Bac Ninh', 1, '2025-09-23 07:28:57', '2025-09-23 07:28:57'),
(21, '1234', 'phamdinhth2a22@abc.com', '$2y$10$m3VYlQpni2JGRigTuAHFguXd0yndWecws2JcoUPxr/D3H5zCuu1sy', 'Bac Ninh', 1, '2025-09-23 07:29:22', '2025-09-23 07:29:22'),
(23, '1234', 'phamdi22222@abc.com', '$2y$10$ivmQehEy2GK47Tq5LZANi.Lh1Guu7Fr.757IR367hFjk5TqcCbklS', 'Bac Ninh', 1, '2025-09-23 07:31:28', '2025-09-23 07:31:28'),
(31, 'Th43', 'phamdinhthai@mail.com', '$2y$10$70hEl44iLYwUN0Wq.9BME.qUyUhIFZ2cQzcvqOfE5JkeWjqbM7LS6', 'Hà Nội', 1, '2025-09-25 05:20:37', '2025-09-25 05:20:49'),
(33, 'Thái', 'phamdinhthai@12321323mail.com', '$2y$10$0CYr2.ZpFyjn1YGbLDXdz.G8vy8IM9bQnDdETU.lVdTwP5U4pjuhy', 'Hà Nội', 2, '2025-09-25 05:55:51', '2025-09-25 05:55:59'),
(35, 'Nguyễn Văn A', 'ngvana@12321323mail.com', '$2y$10$zEP73.tDxPfJzERonbNSzubxRCHX49ywPBX6E4Cq1QZmKoVVa3F4W', 'Hà Nội', 1, '2025-09-25 06:11:26', '2025-09-25 06:11:26'),
(37, '10 Điểm Toán', 'mathematics123@12321323mail.com', '$2y$10$8.Cp3ZUQXLJK3FEeXCODWuBj381K9zh5x3Hxt8undDgyh3iRlKwK2', 'Hà Nội', 1, '2025-09-26 18:37:28', '2025-09-26 18:37:28'),
(38, 'avvv', 'mathematics1234@12321323mail.com', '$2y$10$bY602R1pLf5EOJifHS6VXeXvfKegEpVfAyMT1YBpUMOo0s1WHEAae', 'Hà Nội', 1, '2025-09-26 18:37:45', '2025-09-26 18:37:45'),
(40, 'avvv222', 'abcd@mail123.com', '$2y$10$C.eebBnRUlkpy7Hm/AabEOy04gn8O1/REdJ8fkxHpuKbaOkZKC8za', 'Hà Nội', 1, '2025-09-26 18:38:26', '2025-09-26 18:38:26'),
(41, 'avvv222', '123aada@mail.com', '$2y$10$o6MDMyVP/fRuYW6Cg9rQFeMFta9DNnDArZi2cHsKKOiKFgUif/zWS', 'Hà Nội', 1, '2025-09-26 18:38:42', '2025-09-26 18:38:42'),
(42, 'avvv222', '123@mail1234.com', '$2y$10$pt5hoz7YBMF5he2kQc7a.OmThOIMBAzYqD/0/Cv9dktpoIh0RU4Jm', 'Hà Nội', 1, '2025-09-26 18:38:59', '2025-09-26 18:38:59'),
(43, 'avvv222222', 'am@mail.com', '$2y$10$2iLCYXcUSPaM/eZ8zE3n9.a3mE/qnen4sdFj9gjM81s5iWmWE2J8K', 'Hà Nội', 1, '2025-09-26 18:39:19', '2025-09-26 18:39:19'),
(44, '12345', 'johnneoson123222222@abc.com', '$2y$10$mNyN1kYWTAeunVXeDY4UoOD4pFTX6z7ZbUJKeob1Gn1PBZEZOnIEe', 'Bac Ninh', 1, '2025-09-27 09:48:41', '2025-09-27 09:48:41'),
(45, 'Phạm Đình Thái', 'phamdinhthai1324@mail.com', '$2y$10$ItFCRxSPcfR9sInMWp4r3Of.6TuY.2cxPtzkKgZYHqGQfYAQuqt4m', '12/123 Hoàn kiếm, Hà Nội', 1, '2025-09-27 14:48:39', '2025-09-27 14:48:39'),
(46, 'Th41', 'Th42@abc.com', '$2y$10$xTZPVHNfhxBxo1yDQvXoAOjH9goYT18nUM3i2mAd5Dw.MW0ef.ZcW', '12/123 Hoàn kiếm, Hà Nội', 3, '2025-09-28 03:49:19', '2025-09-28 03:49:34'),
(47, 'Th412', 'phamdinhthai@a1234.com', '$2y$10$I4G3PfGjGEsAMQ17ldyoJeoxCbqSG/piIiaGd5yiwIKY.dxv.g4Ga', '13123123', 1, '2025-09-28 17:05:22', '2025-09-28 17:05:22'),
(48, 'pham dinh thai', 'thai@a123.com', '$2y$10$WquNTXJ5QV77AsrStKRdae/2QoUvammPKMIH0Fbc8uXwFwwp1./Pq', 'HCM', 0, '2025-10-01 16:10:44', '2025-10-01 16:10:44'),
(49, 'pham dinh thai', 'thai@a1234.com', '$2y$10$.Z3NqS3b6.U8xo5OI1gJeOurIMSs2FBUZgB6BE.Yq1OVq5t7YXheW', 'HCM', 0, '2025-10-01 16:15:48', '2025-10-01 16:15:48'),
(50, 'pham dinh thai', 'thai@a12345.com', '$2y$10$i4dBK83BLNG7jZI4d/SX.u2AudOs0s30ibe8TpvF8xvo2CS8T.HQO', 'Hà Nội', 0, '2025-10-01 16:17:11', '2025-10-01 16:17:11'),
(51, 'pham dinh thai', 'thai@a1232245.com', '$2y$10$mkRuIC/cIedVsh1WP3VYKeF5oR8NmovErJ1fuCdWJZIRrVJEAPBHu', 'Hà Nội', 0, '2025-10-02 18:09:18', '2025-10-02 18:09:18'),
(57, 'luctungthungractimxacemyeu', 'phamdinhthai123@123.com', '$2y$10$9T1rDNhj.kxfhQyWItnUQuAiz3ClTv89LiKtJ4fQMO7ygYBfN5gFa', 'Số nhà 11 ngõ 11 thành phố 11', 0, '2025-10-03 06:15:44', '2025-10-03 06:15:44'),
(58, 'Vuxx', 'vux@xyz.com', '$2y$10$jnU1hvRUkbkJZ3oLL68FKOlj6J453Kn8UGhnvNbwE1Hoj/GWa7h46', 'hn', 1, '2025-10-04 17:35:09', '2025-10-04 17:35:09');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `books`
--
ALTER TABLE `books`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK01_books` (`category_id`);

--
-- Indexes for table `carts`
--
ALTER TABLE `carts`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK01_carts` (`user_id`),
  ADD KEY `FK02_carts` (`book_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK02_orderDetails` (`book_id`),
  ADD KEY `FK03_orderDetails` (`order_id`);

--
-- Indexes for table `orders`
--
ALTER TABLE `orders`
  ADD PRIMARY KEY (`id`),
  ADD KEY `FK01_orders` (`user_id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`),
  ADD UNIQUE KEY `email` (`email`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `books`
--
ALTER TABLE `books`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=114;

--
-- AUTO_INCREMENT for table `carts`
--
ALTER TABLE `carts`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=26;

--
-- AUTO_INCREMENT for table `categories`
--
ALTER TABLE `categories`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=21;

--
-- AUTO_INCREMENT for table `orderdetails`
--
ALTER TABLE `orderdetails`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=77;

--
-- AUTO_INCREMENT for table `orders`
--
ALTER TABLE `orders`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=85;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(10) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=59;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `books`
--
ALTER TABLE `books`
  ADD CONSTRAINT `FK01_books` FOREIGN KEY (`category_id`) REFERENCES `categories` (`id`) ON UPDATE CASCADE;

--
-- Constraints for table `carts`
--
ALTER TABLE `carts`
  ADD CONSTRAINT `FK01_carts` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`),
  ADD CONSTRAINT `FK02_carts` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`);

--
-- Constraints for table `orderdetails`
--
ALTER TABLE `orderdetails`
  ADD CONSTRAINT `FK02_orderDetails` FOREIGN KEY (`book_id`) REFERENCES `books` (`id`),
  ADD CONSTRAINT `FK03_orderDetails` FOREIGN KEY (`order_id`) REFERENCES `orders` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;

--
-- Constraints for table `orders`
--
ALTER TABLE `orders`
  ADD CONSTRAINT `FK01_orders` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
