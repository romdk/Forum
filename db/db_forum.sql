-- --------------------------------------------------------
-- Hôte:                         127.0.0.1
-- Version du serveur:           5.7.33 - MySQL Community Server (GPL)
-- SE du serveur:                Win64
-- HeidiSQL Version:             11.2.0.6213
-- --------------------------------------------------------

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET NAMES utf8 */;
/*!50503 SET NAMES utf8mb4 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;


-- Listage de la structure de la base pour forum_roman
CREATE DATABASE IF NOT EXISTS `forum_roman` /*!40100 DEFAULT CHARACTER SET latin1 */;
USE `forum_roman`;

-- Listage de la structure de la table forum_roman. categorie
CREATE TABLE IF NOT EXISTS `categorie` (
  `id_categorie` int(11) NOT NULL AUTO_INCREMENT,
  `nomCategorie` varchar(50) NOT NULL,
  PRIMARY KEY (`id_categorie`)
) ENGINE=InnoDB AUTO_INCREMENT=5 DEFAULT CHARSET=latin1;

-- Listage des données de la table forum_roman.categorie : ~4 rows (environ)
/*!40000 ALTER TABLE `categorie` DISABLE KEYS */;
INSERT INTO `categorie` (`id_categorie`, `nomCategorie`) VALUES
	(1, 'Infos'),
	(2, 'Aide'),
	(3, 'Discussion'),
	(4, 'Annonces');
/*!40000 ALTER TABLE `categorie` ENABLE KEYS */;

-- Listage de la structure de la table forum_roman. message
CREATE TABLE IF NOT EXISTS `message` (
  `id_message` int(11) NOT NULL AUTO_INCREMENT,
  `visiteur_id` int(11) NOT NULL,
  `sujet_id` int(11) NOT NULL,
  `message` text NOT NULL,
  `dateCreation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `nbVote` int(11) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_message`),
  KEY `FK_message_visiteur` (`visiteur_id`),
  KEY `FK_message_sujet` (`sujet_id`),
  CONSTRAINT `FK_message_sujet` FOREIGN KEY (`sujet_id`) REFERENCES `sujet` (`id_sujet`),
  CONSTRAINT `FK_message_visiteur` FOREIGN KEY (`visiteur_id`) REFERENCES `visiteur` (`id_visiteur`)
) ENGINE=InnoDB AUTO_INCREMENT=96 DEFAULT CHARSET=latin1;

-- Listage des données de la table forum_roman.message : ~14 rows (environ)
/*!40000 ALTER TABLE `message` DISABLE KEYS */;
INSERT INTO `message` (`id_message`, `visiteur_id`, `sujet_id`, `message`, `dateCreation`, `nbVote`) VALUES
	(63, 20, 64, 'Is it possible to order when the data is come from many select and union it together? Such as&#13;&#10;&#13;&#10;Select id,name,age&#13;&#10;From Student&#13;&#10;Where age &#60; 15&#13;&#10;Union&#13;&#10;Select id,name,age&#13;&#10;From Student&#13;&#10;Where Name like &#34;%a%&#34;&#13;&#10;How can I order this query by name?', '2022-12-09 17:19:58', 0),
	(64, 24, 64, 'Yes. That orders the the results of the subselect. That does NOT order the results of the select statement referencing that subselect. Per the SQL Standard, the order of results is undefined barring an explicit order by clause. That first select in your example probably returns its results in the order returned by the subselect, but it is not guaranteed.', '2022-12-09 17:21:12', 0),
	(65, 24, 65, 'In my database I have two tables and want to select highest 5 values from table but I only get first highest value cannot get more than one value.', '2022-12-09 17:21:54', 0),
	(66, 25, 64, 'As other answers stated, ORDER BY after the last UNION should apply to both datasets joined by union.&#13;&#10;&#13;&#10;I had two datasets using different tables but the same columns. ORDER BY after the last UNION still didn&#39;t work.&#13;&#10;Using an alias for the column used in the ORDER BY clause did the trick.', '2022-12-09 17:22:51', 0),
	(67, 25, 65, 'Not sure but I would go for a IN statement instead of your = in your first query. From here it seems that your subquery return more than one value. Anyway I&#39;m not certain your query works since there are 2 field on the returned sub query.', '2022-12-09 17:23:23', 0),
	(68, 25, 66, 'Sql query is valid or not. i have been asked this in an interview?', '2022-12-09 17:25:19', 0),
	(69, 26, 66, 'This is a valid query - it produces a cartesian product of the two tables. It is equivalent to this query in the ANSI SQL syntax:&#13;&#10;&#13;&#10;select *&#13;&#10;from table1&#13;&#10;join table2 on 1=1&#13;&#10;The usefulness of this query is highly debatable, though.', '2022-12-09 17:26:14', 0),
	(70, 26, 67, 'Now, this is fine, but I need a particular type of order at the top of the list, which is orders that are both &#34;order status&#34; in progress and &#34;discount status&#34; pending approval. The rest of the list should follow the order described above.&#13;&#10;&#13;&#10;I know I can use cases to pull that information to the top, but how can I do this without disrupting the rest of the preferred order? Thanks!', '2022-12-09 17:27:21', 0),
	(71, 26, 68, 'I&#39;m trying to combine fullcalendar.io and xarrows to create dependent events.&#13;&#10;When dragging the event I would like the arrow to remain connected to the previous event as per xarrows demo: https://lwwwp.csb.app/CustomizeArrow&#13;&#10;&#13;&#10;When using full calendar events that is not happening.', '2022-12-09 17:29:53', 0),
	(72, 26, 69, '&#13;&#10;&#13;&#10;The bounty expires in 2 hours. Answers to this question are eligible for a +50 reputation bounty. stats_noob is looking for an answer from a reputable source.&#13;&#10;I found this Regex code (in R) that can recognize the following &#34;class&#34; of pattern: &#34;LETTER-NUMBER-LETTER NUMBER-LETTER-NUMBER&#34; in a set of strings:&#13;&#10;&#13;&#10;apply(my_string, 1, function(x) gsub(&#39;(([A-Z] ?[0-9]){3})|.&#39;, &#39;\\1&#39;, toString(x)))&#13;&#10;Based on the above code, it appears that the corresponding Regex &#34;class&#34; for &#34;LETTER-NUMBER-LETTER NUMBER-LETTER-NUMBER&#34; is &#34;(([A-Z] ?[0-9]){3})|.&#34;&#13;&#10;&#13;&#10;This leads me to my question:&#13;&#10;&#13;&#10;Suppose I had the following input in R:&#13;&#10;&#13;&#10;input = &#34;A1B 2C3&#34;&#13;&#10;Is there some way I can determine what &#34;class&#34; of Regex is contained within this string? For example, does such a function exist?', '2022-12-09 17:30:44', 0),
	(73, 26, 70, '1&#13;&#10;&#13;&#10;&#13;&#10;I have a datafrmae lke this&#13;&#10;&#13;&#10;df_crossplot &#13;&#10;&#13;&#10;the index is 1A22, 10A22,11A22,2A22,21A22&#13;&#10;        value&#13;&#10;1A22    10&#13;&#10;10A22   12&#13;&#10;11A22   11&#13;&#10;2A22    15&#13;&#10;12A22    21&#13;&#10;3A22    25&#13;&#10;&#13;&#10;What I like to do is sort index based on the number before A, like this&#13;&#10;&#13;&#10;        value&#13;&#10;1A22    10&#13;&#10;2A22    15&#13;&#10;3A22    25&#13;&#10;10A22   12&#13;&#10;11A22   11&#13;&#10;12A22    21&#13;&#10;&#13;&#10;The one I do is this with an error&#13;&#10;&#13;&#10;&#13;&#10;df_crossplot=df_crossplot.sort_index(key=lambda x: float(x.str.split(&#39;A&#39;)[0]))&#13;&#10;&#13;&#10;&#13;&#10;TypeError: float() argument must be a string or a number, not &#39;list&#39;&#13;&#10;&#13;&#10;seem like x inside lambda function is a list instead of each individual component of a series,&#13;&#10;&#13;&#10;How to do it? Thanks', '2022-12-09 17:31:35', 0),
	(74, 27, 68, 'Did you try to use import Draggable from &#39;react-draggable&#39;;', '2022-12-09 17:32:21', 0),
	(75, 27, 71, 'LinkedHashMap is the Java implementation of a Hashtable like data structure (dict in Python) with predictable iteration order. That means that during a traversal over all keys, they are ordered by insertion. This is done by an additional linked list maintaining the insertion order.&#13;&#10;&#13;&#10;Is there an equivalent to that in Python?', '2022-12-09 17:32:58', 0),
	(76, 27, 72, 'How would I perform the following using raw SQL in views.py?&#13;&#10;What would this results function look like?', '2022-12-09 17:33:52', 0),
	(78, 27, 74, 'I have a progress bar and i have some code in C# that defines classes &#34;Lessons&#34; &#34;Courses&#34;. I want the progress bar to increase every time that the user completes a lesson in a course by pressing a button. I know that your able to control it with Javascript however i dont know that language and i wanted to know if A. If its even possible ? B. how to do it if so?', '2022-12-09 17:41:06', 0),
	(79, 27, 75, ' am returning data from AWS Secrets Manager and using the aws-sdk to do so. Earlier I asked a question about how to correctly return the data and export it since the exported object never had the data resolved by the time the export was imported somewhere else. This caused me to get a bunch of undefined.&#13;&#10;&#13;&#10;After solving that problem it was determined that the way to handle this was to wrap the aws-sdk function in a promise, then call the promise in another file with async await. This causes me issues.', '2022-12-09 17:42:24', 0),
	(80, 28, 75, 'Because the needed data is gotten asynchronously, there&#39;s no way around making everything that depends on it (somehow) asynchronous as well. With asynchronicity involved, one possibility is to usually export functions that can be called on demand, rather than exporting objects:&#13;&#10;&#13;&#10;an object that depends on the asynchronous data can&#39;t be meaningfully exported before the data comes back&#13;&#10;if you export functions rather than objects, you can ensure that control flow starts from your single entry point and heads downstream, rather than every module initializing itself at once (which can be problematic when some modules depend on others to be initialized properly, as you&#39;re seeing)&#13;&#10;On another note, note that if you have a single Promise that needs to resolve, it&#39;s probably easier to call .then on it than use an async function.', '2022-12-09 17:48:14', 0),
	(81, 28, 67, 'This can be done by setting the style of the progress bar to this&#13;&#10;&#13;&#10;&#60;div class=&#34;Progress-Bar&#34; Style=&#34;width: @Percentage%&#34;&#62;&#60;/div&#62;&#13;&#10;&#13;&#10;And then you can Add a code block in the view at the top like this&#13;&#10;&#13;&#10;@{ Code goes here }&#13;&#10;&#13;&#10;Then inside the Code block you can write the code to work out the percentage if you haven&#39;t worked it out already.&#13;&#10;&#13;&#10;A tip, the @ symbol allows you to import Variables from the code.', '2022-12-09 17:48:41', 0),
	(82, 28, 71, 'I don&#39;t think so; you&#39;d have to use a dict plus a list. But you could pretty easily wrap that in a class, and define keys, __getitem__, __setitem__, etc. to make it work the way you want.', '2022-12-09 17:49:40', 0),
	(83, 28, 76, 'Can you call a trait static method implemented by types from another trait static method implemented in the trait?', '2022-12-09 17:50:21', 0),
	(84, 28, 77, 'I&#39;m looking for any alternatives to the below for creating a JavaScript array containing 1 through to N where N is only known at runtime.', '2022-12-09 17:50:54', 0),
	(85, 28, 78, '0&#13;&#10;&#13;&#10;&#13;&#10;I have a log file with lines like :&#13;&#10;&#13;&#10;Insert request received from system 1&#13;&#10;Modify request received from system 2&#13;&#10;I want to get the text after &#34;received from&#34; from the log. The equivalent grep and cut command would be (if it supported multiple character delimiter)&#13;&#10;&#13;&#10;grep &#34;received from&#34; mylogfile.log | cut -d&#34;received from&#34; -f1&#13;&#10;&#13;&#10;How can I recreate this with awk', '2022-12-09 17:51:30', 0),
	(86, 28, 74, 'You could pass a ViewModel to your View that contains the progress in percentage as an integer. Then in the progress bar you use the value from the ViewModel for the &#34;aria-valuenow&#34;', '2022-12-09 17:51:55', 0),
	(87, 20, 79, 'I am trying to select multiple emails from on outlook inbox folder via mapi addressing and want to move a copy of these emails to another folder in the same inbox.&#13;&#10;&#13;&#10;Unfortunately my script seems to do whatever it wants, sometimes copying 6 emails before stopping with following failure, sometimes stopping right with the first email.', '2022-12-09 17:54:46', 0),
	(88, 20, 80, 'All browsers I&#39;ve come to work with allow accessing an element with id=&#34;myDiv&#34; by simply writing:&#13;&#10;&#13;&#10;myDiv&#13;&#10;See here: http://jsfiddle.net/L91q54Lt/&#13;&#10;&#13;&#10;Anyway, this method seems to be quite poorly documented, and in fact, the sources I come across don&#39;t even give it a mention and instead assume that one would use&#13;&#10;&#13;&#10;document.getElementById(&#34;myDiv&#34;)&#13;&#10;or maybe&#13;&#10;&#13;&#10;document.querySelector(&#34;#myDiv&#34;)&#13;&#10;to access a DOM element even when its ID is known in advance', '2022-12-09 18:01:34', 0),
	(89, 20, 81, 'I have files in a Google Cloud Storage bucket that I need to move to a customers GCS bucket. They provided HMAC keys (access id and secret). I&#39;m familiar with using the c# API libraries but they require a JSON or p12 file to authenticate. I&#39;m not sure how to use the HMAC keys. From my research it looks like I may need to use the GSC XML API. Does anyone know how to authenticate using HMAC keys?', '2022-12-09 18:02:37', 0),
	(90, 20, 82, 'I&#39;m working at the moment on an implementation of webauthn on a project. The main point is to give the possibility to user to use FaceId or fingerprint scan on their mobile on the website.&#13;&#10;&#13;&#10;I tried the djoser version of webauthn but I wanted to give the possibility to user that already have an account so I took the implementation of webauthn of djoser and I updated it to make it working with already created account.&#13;&#10;&#13;&#10;I can ask for the signup request of a webauthn token and create the webauthn token with the front (Angular) where I use @simplewebauthn/browser (&#34;@simplewebauthn/browser&#34;: &#34;^6.3.0-alpha.1&#34;) . Everything is working fine there.&#13;&#10;&#13;&#10;I use the latest version of djoser by pulling git and the version of webauthn is 0.4.7 linked to djoser.&#13;&#10;&#13;&#10;', '2022-12-09 18:03:33', 0),
	(91, 29, 79, 'I also had this issue with processing emails on Outlook. My overall scheme is to process emails folder by folder. I traced the issue to the Emails.getNext() function. My completely uneducated guess is it has something to do with parallel processing of Emails and how it grabs them in ForEach() and getNext(). The problem went away by using the getLast().&#13;&#10;&#13;&#10;Note in the following code it will just move all read emails to archive folder and then some unread emails to corporate dump folder and most unread emails to the unread folder. This is itself just a mutation on the .p0r email script. There is a &#62; $null at the end of the function block is where I originally had it on the ForEach loop and it worked as one would expect, but it does not work on the While loop blocking function. Instead that had to be moved to the location in the move unread section. Still a lot of room for improvement, getting some strange com errors but it will process through an inbox so long as GetLast() email is moved out of the folder.&#13;&#10;&#13;&#10;As for my rationale on the root cause, I noticed that the failure to read a whole inbox is dependent on the size of the inbox. So each run my go through 2/3 of the remaining emails in the inbox.', '2022-12-09 18:04:33', 0),
	(92, 29, 81, 'Ask the customer for a service account JSON key. Since both the source and destination bucket are in Google Cloud Storage, this is the best solution.', '2022-12-09 18:05:26', 0),
	(93, 29, 83, 'The bounty expires in 4 hours. Answers to this question are eligible for a +50 reputation bounty. Norhther is looking for an answer from a reputable source.&#13;&#10;I&#39;m deploying a okd cluster in openstack, and I&#39;m having the following problem when installing the bootstrap/workers/cp machines:&#13;&#10;&#13;&#10;enter image description here&#13;&#10;&#13;&#10;I followed the steps of this video, however, I configured the install-config.yaml with your the pull-secret {&#34;auths&#34;:{&#34;fake&#34;:{&#34;auth&#34;:&#34;aWQ6cGFzcwo=&#34;}}} instead, as documented in the OKD documentation and the ssh public key of the machine.', '2022-12-09 18:06:44', 0),
	(94, 29, 84, 'When I click a menu Item I want to load my div with the value &#34;abc&#60;TranslationsList /&#62;&#34;. &#34;abc&#34; is displayed but the custom component &#34;TranslationsList&#34; is not and I guess this is normal as the TranslationsList tag is not a HTML tag. But how could I load my component?&#13;&#10;&#13;&#10;I could use links instead of buttons but in this case the question is how could I update the div content with a specific link?', '2022-12-09 18:07:22', 0),
	(95, 29, 85, 'So for this application (Windows, Web) I have 2 requirements:&#13;&#10;&#13;&#10;User can drag around widgets on the screen (drag and drop) to any location.&#13;&#10;The app must scale to screen/window size&#13;&#10;For (1) I used this answer. For (2) I used this solution.&#13;&#10;&#13;&#10;As mentioned in the code comment below I can&#39;t have both:&#13;&#10;&#13;&#10;If I set logicWidth and logicHeight dynamically depending on the window size, the dragging works fine but the draggable widgets won&#39;t scale but instead stay the same size regardless of the window size.', '2022-12-09 18:08:05', 0);
/*!40000 ALTER TABLE `message` ENABLE KEYS */;

-- Listage de la structure de la table forum_roman. sujet
CREATE TABLE IF NOT EXISTS `sujet` (
  `id_sujet` int(11) NOT NULL AUTO_INCREMENT,
  `visiteur_id` int(11) NOT NULL,
  `categorie_id` int(11) NOT NULL,
  `titre` varchar(100) NOT NULL,
  `dateCreation` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `statut` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_sujet`),
  KEY `FK_sujet_visiteur` (`visiteur_id`),
  KEY `FK_sujet_categorie` (`categorie_id`),
  CONSTRAINT `FK_sujet_categorie` FOREIGN KEY (`categorie_id`) REFERENCES `categorie` (`id_categorie`),
  CONSTRAINT `FK_sujet_visiteur` FOREIGN KEY (`visiteur_id`) REFERENCES `visiteur` (`id_visiteur`)
) ENGINE=InnoDB AUTO_INCREMENT=86 DEFAULT CHARSET=latin1;

-- Listage des données de la table forum_roman.sujet : ~8 rows (environ)
/*!40000 ALTER TABLE `sujet` DISABLE KEYS */;
INSERT INTO `sujet` (`id_sujet`, `visiteur_id`, `categorie_id`, `titre`, `dateCreation`, `statut`) VALUES
	(64, 20, 2, 'How to order by with union in SQL?', '2022-12-09 17:19:58', 0),
	(65, 24, 2, 'SQL How to select Max 5 values from table?', '2022-12-09 17:21:54', 0),
	(66, 25, 2, 'Is Select * from table 1,table 2 a valid query?', '2022-12-09 17:25:19', 0),
	(67, 26, 2, 'ORDER BY with multiple conditions?', '2022-12-09 17:27:21', 1),
	(68, 26, 4, 'Combine React Full Calendar and Xarrows', '2022-12-09 17:29:53', 0),
	(69, 26, 3, 'Reverse Engineering Regex in R?', '2022-12-09 17:30:44', 0),
	(70, 26, 1, 'sort index using lambda function with string split', '2022-12-09 17:31:35', 0),
	(71, 27, 4, 'Equivalent for LinkedHashMap in Python', '2022-12-09 17:32:58', 0),
	(72, 27, 3, 'Raw SQL queries in Django views', '2022-12-09 17:33:52', 0),
	(74, 27, 1, 'Are you able to control a progress bar through C# ? (That isnt constantly running in the background)', '2022-12-09 17:41:06', 0),
	(75, 27, 2, 'Returning asynchronous data then exporting it synchronously in Node.js', '2022-12-09 17:42:24', 1),
	(76, 28, 4, 'Calling trait static method from another static method (rust)', '2022-12-09 17:50:21', 0),
	(77, 28, 3, 'How to create an array containing 1...N', '2022-12-09 17:50:54', 0),
	(78, 28, 1, 'How to use awk for multiple character delimiter?', '2022-12-09 17:51:30', 0),
	(79, 20, 4, 'Issue with moving multiple items from one outlook folder to another - Powershell', '2022-12-09 17:54:46', 1),
	(80, 20, 2, 'Why don&#39;t we just use element IDs as identifiers in JavaScript?', '2022-12-09 18:01:34', 0),
	(81, 20, 3, 'Upload file to Google Cloud Storage using HMAC key in c#', '2022-12-09 18:02:37', 1),
	(82, 20, 1, 'Problem of signature with webauthn on django with djoser', '2022-12-09 18:03:33', 0),
	(83, 29, 4, 'okd gpg error: can&#39;t check signature no public key', '2022-12-09 18:06:44', 0),
	(84, 29, 3, 'Load specific DIV with a react component without reloading the whole page', '2022-12-09 18:07:22', 0),
	(85, 29, 1, 'Flutter - Draggable AND Scaling Widgets', '2022-12-09 18:08:05', 0);
/*!40000 ALTER TABLE `sujet` ENABLE KEYS */;

-- Listage de la structure de la table forum_roman. visiteur
CREATE TABLE IF NOT EXISTS `visiteur` (
  `id_visiteur` int(11) NOT NULL AUTO_INCREMENT,
  `mail` varchar(50) NOT NULL,
  `pseudonyme` varchar(16) NOT NULL,
  `motDePasse` varchar(255) NOT NULL,
  `dateInscription` datetime NOT NULL DEFAULT CURRENT_TIMESTAMP,
  `role` varchar(50) NOT NULL DEFAULT 'User',
  `statut` tinyint(4) NOT NULL DEFAULT '0',
  PRIMARY KEY (`id_visiteur`),
  UNIQUE KEY `pseudonyme` (`mail`) USING BTREE
) ENGINE=InnoDB AUTO_INCREMENT=33 DEFAULT CHARSET=latin1;

-- Listage des données de la table forum_roman.visiteur : ~10 rows (environ)
/*!40000 ALTER TABLE `visiteur` DISABLE KEYS */;
INSERT INTO `visiteur` (`id_visiteur`, `mail`, `pseudonyme`, `motDePasse`, `dateInscription`, `role`, `statut`) VALUES
	(20, 'test@test.fr', 'Roman', '$2y$10$LA2wXr6x/xg2Wjhxy141gOI0xZsSIsXu2Ml6EsGv4kZsF9PxTcRfS', '2022-12-07 18:13:32', 'Admin', 0),
	(24, 'BoisBannana@test.fr', 'BoisBannana', '$2y$10$5TUF5L79MZu2JU2tdyM5PuTbAz9Js4Hu09ECgQ.5gP9VX/IUvEx96', '2022-12-09 17:12:54', 'User', 0),
	(25, 'PepitoCloud@test.fr', 'PepitoCloud', '$2y$10$pLzHKCVjr30dnP6EgXbdduqZl1axp6qC566Jisj8N9aePpnWFLob6', '2022-12-09 17:13:20', 'User', 0),
	(26, 'BraveSushi@test.fr', 'BraveSushi', '$2y$10$5oqIlmulUitvO0PRb0IixuxYDxSNcT5ZjI.CoRNIcS03QdN60klA.', '2022-12-09 17:13:33', 'User', 0),
	(27, 'Mr.Moon@test.fr', 'Mr.Moon', '$2y$10$X6lyme1GhTODBJKG7eTtTuxcWwkDBFUxfyfwFK9wV7r4K9QV5bLFi', '2022-12-09 17:14:01', 'User', 0),
	(28, 'PoneyCheat@test.fr', 'PoneyCheat', '$2y$10$vplxeXLvTXQ.pBFS4Xx.KeywCY6eeCrL4wvzJy0R6UGAfW3TBXOLe', '2022-12-09 17:14:22', 'User', 0),
	(29, 'CaptainCovid@test.fr', 'CaptainCovid', '$2y$10$t//AGHhidmNmIs2G25ObYuZfPirnl4Fu29BDvlWxL24sZcx1ZCInW', '2022-12-09 17:15:04', 'User', 1),
	(30, 'ShoqapikSol@test.fr', 'ShoqapikSol', '$2y$10$zdwAVFpHGPQhIR7Nqfpym.U4pqQqNPrBSs9r85ZyaJmL3D7TrX51O', '2022-12-09 17:17:40', 'User', 0),
	(31, 'BronzeBear@test.fr', 'BronzeBear', '$2y$10$ZpA6pqFQBixNaBAMKJaWber7GYPl1fCUHY/PnAifctbERUjyiW/7a', '2022-12-09 17:17:52', 'User', 0),
	(32, 'PotatoCraby@test.fr', 'PotatoCraby', '$2y$10$v9ToD2fqv4HHJvlx4si2ceD.lSIJI3HG08wWfXwW4VQB5Ug1XmRfO', '2022-12-09 17:18:10', 'User', 1);
/*!40000 ALTER TABLE `visiteur` ENABLE KEYS */;

/*!40101 SET SQL_MODE=IFNULL(@OLD_SQL_MODE, '') */;
/*!40014 SET FOREIGN_KEY_CHECKS=IFNULL(@OLD_FOREIGN_KEY_CHECKS, 1) */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40111 SET SQL_NOTES=IFNULL(@OLD_SQL_NOTES, 1) */;
