-- phpMyAdmin SQL Dump
-- version 5.2.2
-- https://www.phpmyadmin.net/
--
-- Host: localhost:3306
-- Generation Time: Oct 18, 2025 at 12:13 PM
-- Server version: 8.4.3
-- PHP Version: 8.2.28

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `cms`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `id` int NOT NULL,
  `title` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `content` text CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `published_at` datetime DEFAULT NULL,
  `image_file` varchar(200) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id`, `title`, `content`, `published_at`, `image_file`) VALUES
(1, 'How AI is Changing the Future of Work', 'Artificial Intelligence is transforming the workplace faster than ever. From automated customer service to predictive maintenance, AI tools are helping businesses operate smarter. Tasks that once required long manual effort are now done in seconds. This change allows professionals to focus more on creativity, strategy, and innovation.\r\n\r\nUmar Farooq, a Software Engineer and CEO with over seven years of industry experience, shares how he has seen AI reshape workflows across organizations in the GCC. He has implemented AI-based automation in HR and ERP systems that reduced manual work and improved accuracy. According to him, AI is not here to replace people but to make them more productive and data-driven.\r\n\r\nAs businesses continue to adopt machine learning, natural language processing, and computer vision, the key will be balance — using AI ethically and responsibly while maintaining the human touch. The future workplace will belong to teams that can combine AI intelligence with human creativity.\r\n\r\nUmarpak995@gmail.com\r\n#Umar444\r\nlinkedin.com/in/umar444\r\nGithub umar-444', '2025-10-18 00:00:00', '1.jpg'),
(2, 'Top 5 Web Development Trends in 2025', 'The web development landscape is changing rapidly. Developers are no longer building simple static websites. In 2025, the focus has shifted to performance, security, and AI-powered user experience. Businesses expect fast, scalable, and intelligent applications that work seamlessly across all devices.\r\n\r\nUmar Farooq, an experienced Laravel developer and software engineer, highlights the top five web development trends to follow: Serverless architecture, Progressive Web Apps (PWAs), Headless CMS, WebAssembly, and AI chatbots. He has worked on multiple enterprise-grade systems where integrating these technologies improved user engagement and scalability.\r\n\r\nUmar advises new developers to focus on clean code, modular design, and strong backend integration. The demand for real-time data, API-driven systems, and personalization will continue to grow. Staying updated with these trends will keep developers relevant and valuable in this evolving tech era.\r\n\r\nUmarpak995@gmail.com\r\nUmar444\r\nlinkedin.com/in/umar444\r\nGithub umar-444', '2025-10-18 00:00:00', '2.jpg'),
(3, 'Why Cybersecurity is Every Company’s Priority', 'In today’s connected world, cybersecurity has become the first line of defense for every organization. Data breaches, phishing attacks, and ransomware are increasing in both frequency and sophistication. Even one small vulnerability can result in massive financial loss and reputation damage.\r\n\r\nUmar Farooq, who has managed large-scale software systems for over seven years, emphasizes that prevention is better than recovery. He recommends enforcing secure coding practices, regular system audits, and employee awareness programs. Many companies fail because they underestimate simple practices like using strong passwords or updating software regularly.\r\n\r\nAs digital transformation accelerates, cybersecurity must be built into every process — from development to deployment. Organizations that invest in strong protection today will build trust and stability for tomorrow’s business environment.\r\n\r\nUmarpak995@gmail.com\r\nUmar444\r\nlinkedin.com/in/umar444\r\nGithub umar-444', '2025-10-18 00:00:00', '3.jpg'),
(4, 'Understanding Cloud Computing for Beginners', 'Cloud computing is one of the biggest technology revolutions of our time. It allows companies to store data, run applications, and scale resources without managing physical servers. From startups to enterprises, everyone is moving to the cloud for flexibility and cost efficiency.\r\n\r\nUmar Farooq, an experienced software engineer and CEO, has worked on several cloud-based ERP integrations across GCC countries. He explains that the cloud enables remote teams to collaborate better and reduces downtime during updates or maintenance. Whether using AWS, Azure, or Google Cloud, choosing the right setup — public, private, or hybrid — depends on security and business needs.\r\n\r\nUmar believes the future belongs to cloud-driven ecosystems where data, AI, and automation work together. For developers, learning cloud deployment and architecture design is now an essential skill for any career path in IT.\r\n\r\nUmarpak995@gmail.com\r\nUmar444\r\nlinkedin.com/in/umar444\r\nGithub umar-444', '2025-10-18 00:00:00', '4.jpg'),
(5, 'The Power of Data Science in Decision Making', 'Data Science is redefining how companies make decisions. Instead of guessing or relying on limited reports, leaders can now use real-time analytics and machine learning models to predict outcomes. It is not about collecting more data — it is about using it effectively.\r\n\r\nUmar Farooq, a CEO and Software Engineer with a passion for data-driven development, explains that organizations using data science see faster growth and smarter strategies. In his ERP projects, data insights have helped reduce costs, improve employee productivity, and identify performance gaps. He encourages engineers to learn Python, SQL, and visualization tools like Power BI or Tableau to translate data into business impact.\r\n\r\nData Science is not limited to big corporations. Even small businesses can use it to understand customer behavior, forecast demand, and personalize services. The future of decision-making will belong to those who can turn numbers into action.\r\n\r\nUmarpak995@gmail.com\r\nUmar444\r\nlinkedin.com/in/umar444\r\nGithub umar-444', '2025-10-18 00:00:00', '5.jpg'),
(6, 'Exploring Blockchain Beyond Cryptocurrency', 'Blockchain is often linked only to Bitcoin, but its real potential goes far beyond digital currency. It offers transparency, security, and trust in systems where multiple parties share data. Industries like supply chain, healthcare, and real estate are adopting blockchain to ensure data integrity and reduce fraud.\r\n\r\nUmar Farooq, a Software Engineer and CEO with seven years of experience in enterprise systems, believes blockchain will transform business transactions just like the internet transformed communication. He explains that smart contracts can automate agreements, removing the need for middlemen. In his view, understanding blockchain is becoming essential for modern developers and IT professionals.\r\n\r\nAs global demand for transparency grows, blockchain adoption will continue to rise. Its combination of decentralization and security makes it a cornerstone for the future of digital trust.\r\n\r\nUmarpak995@gmail.com\r\nUmar444\r\nlinkedin.com/in/umar444\r\nGithub umar-444', '2025-10-18 00:00:00', '4.jpg'),
(7, 'How the Internet of Things is Reshaping Everyday Life', 'The Internet of Things (IoT) connects physical devices to the internet, allowing them to communicate and share data. From smart homes to connected factories, IoT is improving efficiency, safety, and convenience in everyday life.\r\n\r\nUmar Farooq, a Software Engineer and CEO, has worked on systems that integrate IoT sensors for production monitoring in industrial settings. He notes that real-time data from connected devices helps managers detect issues before they occur, saving both time and cost. He also points out that IoT development requires strong security practices to prevent unauthorized access to connected systems.\r\n\r\nAs more devices become intelligent and interconnected, IoT will redefine how humans interact with technology. The future will be built on systems that sense, think, and act seamlessly.\r\n\r\nUmarpak995@gmail.com\r\nUmar444\r\nlinkedin.com/in/umar444\r\nGithub umar-444', '2025-10-18 00:00:00', '4.jpg'),
(8, 'Mastering Mobile App Development in 2025', 'Mobile applications are now the core of digital engagement. From e-commerce to education, every business depends on mobile technology to reach customers effectively. The competition is high, and user expectations continue to grow.\r\n\r\nUmar Farooq, an experienced Laravel and mobile app developer, highlights that hybrid frameworks like Flutter and React Native have simplified multi-platform development. He advises new developers to focus on performance optimization, UI design, and security. With the rise of AI-powered mobile experiences, personalization and smart notifications are becoming essential.\r\n\r\nMobile development is no longer about coding an app; it is about creating a complete user journey that delivers value, performance, and trust.\r\n\r\nUmarpak995@gmail.com\r\nUmar444\r\nlinkedin.com/in/umar444\r\nGithub umar-444', '2025-10-18 00:00:00', '1.jpg'),
(9, 'The Rise of DevOps and Continuous Integration', 'DevOps has changed how software is built, tested, and deployed. It bridges the gap between developers and operations teams, ensuring faster delivery and fewer errors. Continuous Integration (CI) and Continuous Deployment (CD) pipelines have become the backbone of modern software workflows.\r\n\r\nUmar Farooq, who has led software engineering teams across multiple projects, explains that implementing DevOps practices improved collaboration and reduced downtime in his development cycles. He stresses that automation tools like Jenkins, Docker, and GitHub Actions are now must-have skills for developers aiming for efficiency.\r\n\r\nDevOps is not just a process; it is a culture of collaboration and accountability. Businesses that embrace it achieve greater stability, innovation, and customer satisfaction.\r\n\r\nUmarpak995@gmail.com\r\nUmar444\r\nlinkedin.com/in/umar444\r\nGithub umar-444', '2025-10-18 00:00:00', '2.jpg'),
(10, 'Emerging Tech Innovations to Watch in 2025', 'Technology is advancing at an unmatched pace. Every year brings new ideas that redefine industries and create new opportunities. In 2025, key innovations like AI-driven automation, quantum computing, and edge processing are making headlines.\r\n\r\nUmar Farooq, a Software Engineer and CEO passionate about future technologies, shares his insights on how these trends will shape the next decade. He believes professionals should not fear automation but learn how to work alongside it. In his experience managing ERP and MIS systems, adopting innovation early always gave his teams a competitive advantage.\r\n\r\nThe coming years will reward those who adapt quickly, learn continuously, and build solutions for real human problems using the power of technology.\r\n\r\nUmarpak995@gmail.com\r\nUmar444\r\nlinkedin.com/in/umar444\r\nGithub umar-444', '2025-10-18 00:00:00', '5.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `article_category`
--

CREATE TABLE `article_category` (
  `article_id` int NOT NULL,
  `category_id` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `article_category`
--

INSERT INTO `article_category` (`article_id`, `category_id`) VALUES
(1, 1),
(9, 2),
(3, 3),
(4, 4),
(5, 5),
(6, 6),
(7, 7),
(2, 8),
(8, 9),
(10, 10);

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int NOT NULL,
  `name` varchar(128) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `name`) VALUES
(1, 'Artificial Intelligence'),
(6, 'Blockchain Technology'),
(4, 'Cloud Computing'),
(3, 'Cybersecurity'),
(5, 'Data Science'),
(7, 'Internet of Things'),
(9, 'Mobile App Development'),
(2, 'Software Development'),
(10, 'Tech News & Innovations'),
(8, 'Web Development');

-- --------------------------------------------------------

--
-- Table structure for table `user`
--

CREATE TABLE `user` (
  `id` int NOT NULL,
  `username` varchar(20) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL,
  `password` varchar(255) CHARACTER SET utf8mb4 COLLATE utf8mb4_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4 COLLATE=utf8mb4_unicode_ci;

--
-- Dumping data for table `user`
--

INSERT INTO `user` (`id`, `username`, `password`) VALUES
(4, 'gemini_user', '$2y$10$x4lBRP9bEsYuHu2pP09ikuMjjTrpTnNLc4YTJF.AIgkdiQpvISmGe');

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`),
  ADD KEY `title` (`title`);

--
-- Indexes for table `article_category`
--
ALTER TABLE `article_category`
  ADD PRIMARY KEY (`article_id`,`category_id`),
  ADD KEY `category_id` (`category_id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`),
  ADD KEY `name` (`name`);

--
-- Indexes for table `user`
--
ALTER TABLE `user`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=11;

--
-- AUTO_INCREMENT for table `user`
--
ALTER TABLE `user`
  MODIFY `id` int NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `article_category`
--
ALTER TABLE `article_category`
  ADD CONSTRAINT `article_category_ibfk_1` FOREIGN KEY (`article_id`) REFERENCES `article` (`id`) ON DELETE CASCADE ON UPDATE CASCADE,
  ADD CONSTRAINT `article_category_ibfk_2` FOREIGN KEY (`category_id`) REFERENCES `category` (`id`) ON DELETE CASCADE ON UPDATE CASCADE;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
