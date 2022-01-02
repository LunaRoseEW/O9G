-- MySQL dump 10.13  Distrib 8.0.27, for Linux (x86_64)
--
-- Host: localhost    Database: O9G
-- ------------------------------------------------------
-- Server version	8.0.27

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8mb4 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `card`
--

DROP TABLE IF EXISTS `card`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `card` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `rarity` varchar(255) DEFAULT NULL,
  `set` varchar(255) DEFAULT NULL,
  `set_number` int DEFAULT NULL,
  `page_type` varchar(20) DEFAULT NULL,
  `spellbook_limit` int DEFAULT '10',
  `aura_type` varchar(20) DEFAULT NULL,
  `total_aura_cost` varchar(40) DEFAULT NULL,
  `text` varchar(600) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `card`
--

LOCK TABLES `card` WRITE;
/*!40000 ALTER TABLE `card` DISABLE KEYS */;
INSERT INTO `card` VALUES (1,'TestCard','Rare','TestSet',1,'Beastie',3,'Holy','3holy2','This is a test beastie');
/*!40000 ALTER TABLE `card` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `deck`
--

DROP TABLE IF EXISTS `deck`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `deck` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `deck_type` enum('User','Top') DEFAULT 'User',
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=4 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `deck`
--

LOCK TABLES `deck` WRITE;
/*!40000 ALTER TABLE `deck` DISABLE KEYS */;
INSERT INTO `deck` VALUES (1,'Mothman Test 1st Place Deck','Top','2021-12-02 05:15:10','2021-12-02 05:15:10'),(2,'Chessie Test 2nd Place Deck','Top','2021-12-02 05:15:10','2021-12-02 05:15:10'),(3,'Little Timmy Test Deck','User','2021-12-02 05:15:10','2021-12-02 05:15:10');
/*!40000 ALTER TABLE `deck` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `deck_card`
--

DROP TABLE IF EXISTS `deck_card`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `deck_card` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `deck$id` int unsigned NOT NULL,
  `card$id` int unsigned NOT NULL,
  `qty` int DEFAULT NULL,
  PRIMARY KEY (`id`),
  KEY `deck$id` (`deck$id`),
  KEY `card$id` (`card$id`),
  CONSTRAINT `deck_card_ibfk_1` FOREIGN KEY (`deck$id`) REFERENCES `deck` (`id`),
  CONSTRAINT `deck_card_ibfk_2` FOREIGN KEY (`card$id`) REFERENCES `card` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `deck_card`
--

LOCK TABLES `deck_card` WRITE;
/*!40000 ALTER TABLE `deck_card` DISABLE KEYS */;
INSERT INTO `deck_card` VALUES (1,1,1,3);
/*!40000 ALTER TABLE `deck_card` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `event`
--

DROP TABLE IF EXISTS `event`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `event` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) DEFAULT NULL,
  `location` varchar(255) DEFAULT NULL,
  `time` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `event`
--

LOCK TABLES `event` WRITE;
/*!40000 ALTER TABLE `event` DISABLE KEYS */;
/*!40000 ALTER TABLE `event` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `event_deck`
--

DROP TABLE IF EXISTS `event_deck`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `event_deck` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `event$id` int unsigned NOT NULL,
  `deck$id` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `event$id` (`event$id`),
  KEY `deck$id` (`deck$id`),
  CONSTRAINT `event_deck_ibfk_1` FOREIGN KEY (`event$id`) REFERENCES `event` (`id`),
  CONSTRAINT `event_deck_ibfk_2` FOREIGN KEY (`deck$id`) REFERENCES `deck` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `event_deck`
--

LOCK TABLES `event_deck` WRITE;
/*!40000 ALTER TABLE `event_deck` DISABLE KEYS */;
/*!40000 ALTER TABLE `event_deck` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `post`
--

DROP TABLE IF EXISTS `post`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `post` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `user$id` int unsigned DEFAULT NULL,
  `title` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  `views` int NOT NULL DEFAULT '0',
  `image` varchar(255) NOT NULL,
  `body` text NOT NULL,
  `published` tinyint(1) NOT NULL,
  `created_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  `updated_at` timestamp NOT NULL DEFAULT CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`),
  KEY `user$id` (`user$id`),
  CONSTRAINT `post_ibfk_1` FOREIGN KEY (`user$id`) REFERENCES `user` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=6 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post`
--

LOCK TABLES `post` WRITE;
/*!40000 ALTER TABLE `post` DISABLE KEYS */;
INSERT INTO `post` VALUES (1,4,'a','a',0,'','<p>aaaaaaaa</p>\r\n',1,'2022-01-01 01:01:32','2022-01-01 01:01:32'),(2,4,'aaaaaa','aaaaaa',0,'pizza.jpg','&lt;p&gt;aaaaaaaaaaaaaaa&lt;/p&gt;\r\n',1,'2021-12-31 12:20:26','2021-12-31 12:20:26'),(3,4,'dfaf','dfaf',0,'hotdog.jpeg','&lt;p&gt;fasfgagG&lt;/p&gt;\r\n',1,'2021-12-31 12:20:35','2021-12-31 12:20:35'),(4,4,'Critter Sligh','critter-sligh',0,'pizza.jpg','&lt;p&gt;&lt;strong&gt;Quetzalcoatlus, Chessie, Napa Rebobs, Loveland Frogman.&amp;nbsp; These are the beasties who&amp;rsquo;s spellbooks define the current metagame.&amp;nbsp; Each of these beasties is extremely powerful, enough so that they can mostly win you the game on their own.&amp;nbsp; What if I told you there was a very different way to win?&amp;nbsp; What if I told you there&amp;rsquo;s a list that doesn&amp;rsquo;t rely on any one page to win, but instead relies on having a critical mass of lower power-level beasties to take control of the board?&amp;nbsp; Allow me to introduce you to my personal favorite spellbook: Fearsome Critters.&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;[Decklist]&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Fearsome Critters utilizes a large amount of low aura cost fearsome critter beasties that have the tribal boost effect.&amp;nbsp; This effect increases each of their LP and damage by ten for each fearsome critter in play.&amp;nbsp; The strategy is generally to flood the board with beasties before your opponent has the chance to get set up.&amp;nbsp; Your opponent&amp;#39;s Chessie isn&amp;rsquo;t going to matter nearly as much if you have six beasties out before they even have the chance to play it.&amp;nbsp;&amp;nbsp;&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Upsides&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;ul&gt;\r\n	&lt;li&gt;\r\n	&lt;p&gt;&lt;strong&gt;High power level&lt;/strong&gt;&lt;/p&gt;\r\n	&lt;/li&gt;\r\n	&lt;li&gt;\r\n	&lt;p&gt;&lt;strong&gt;Not reliant on any one page&lt;/strong&gt;&lt;/p&gt;\r\n	&lt;/li&gt;\r\n	&lt;li&gt;\r\n	&lt;p&gt;&lt;strong&gt;Frequently overwhelms opponents before they even get a chance to play&lt;/strong&gt;&lt;/p&gt;\r\n	&lt;/li&gt;\r\n	&lt;li&gt;\r\n	&lt;p&gt;&lt;strong&gt;Mostly even matchups across the board&lt;/strong&gt;&lt;/p&gt;\r\n	&lt;/li&gt;\r\n	&lt;li&gt;\r\n	&lt;p&gt;&lt;strong&gt;Can play a low amount of auras&lt;/strong&gt;&lt;/p&gt;\r\n	&lt;/li&gt;\r\n	&lt;li&gt;\r\n	&lt;p&gt;&lt;strong&gt;Frequently makes New Beginnings/New Years New Beginnings bad for your opponent&lt;/strong&gt;&lt;/p&gt;\r\n	&lt;/li&gt;\r\n	&lt;li&gt;\r\n	&lt;p&gt;&lt;strong&gt;Budget friendly&lt;/strong&gt;&lt;/p&gt;\r\n	&lt;/li&gt;\r\n&lt;/ul&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Downsides&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;ul&gt;\r\n	&lt;li&gt;\r\n	&lt;p&gt;&lt;strong&gt;Reliant on drawing a critical mass of tribal boost beasties&lt;/strong&gt;&lt;/p&gt;\r\n	&lt;/li&gt;\r\n	&lt;li&gt;\r\n	&lt;p&gt;&lt;strong&gt;Can struggle if your opponents manages to stabilize in time&lt;/strong&gt;&lt;/p&gt;\r\n	&lt;/li&gt;\r\n	&lt;li&gt;\r\n	&lt;p&gt;&lt;strong&gt;Weak to board wipes(Flood the Earth)&lt;/strong&gt;&lt;/p&gt;\r\n	&lt;/li&gt;\r\n	&lt;li&gt;\r\n	&lt;p&gt;&lt;strong&gt;Loses to fire&lt;/strong&gt;&lt;/p&gt;\r\n	&lt;/li&gt;\r\n&lt;/ul&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;[Gumerboo, Roperite, Axehandle Hound, Squonk]&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Gumerboo is a large part of the reason this spellbook is so strong.&amp;nbsp; Gumerboo&amp;rsquo;s strength is twofold: Gumerboo takes no combat damage, and Gumerboo can bounce whatever it deals damage to.&amp;nbsp; What this means is that you have an essentially indestructible beastie, that can deal with problems you otherwise might not be able to immediately kill.&amp;nbsp; This can be used to temporarily deal with high LP beasties like Chessie by returning it to your opponent&amp;#39;s hand and forcing them to replay it fatigued every turn.&amp;nbsp; The bounce effect is also optional, which allows you to deal damage to something larger than Gumerboo without taking damage in return.&amp;nbsp; You can use this strategy in order to kill something like Quetzalcoatlus if you also happen to have Roperite in play.&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Roperite has a ton going for it.&amp;nbsp; It costs one, it can remove flight from a beastie, and it can be fatigued to generate one aura thanks to the convert trait.&amp;nbsp; Removing the flight trait can be game changing in certain matchups.&amp;nbsp; This allows you to kill things like Quetzalcoatlus, which this deck would otherwise have no way of doing.&amp;nbsp; The convert trait is part of the reason this spellbook gets away with playing so few auras.&amp;nbsp; I have kept many single-aura chapters, and always felt like the hand was playable.&amp;nbsp;&amp;nbsp;&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;The final two beasties are mostly there for the tribal boost synergy, and ensuring we can hit the critical mass of beasties that we need.&amp;nbsp; Squonk has a high base damage attack compared to the rest of our options, but is sadly limited to one copy and therefore can&amp;rsquo;t be relied upon.&amp;nbsp; Axehandle Hound just happens to be better than the other options available to us, as it&amp;rsquo;s effect is sometimes relevant.&amp;nbsp;&amp;nbsp;&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;[Growth, Bookmark, Exquisite Stew]&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Next up is our card advantage suite.&amp;nbsp; We tend to be able to empty our chapter very quickly with this list, sometimes as early as turn two.&amp;nbsp; It&amp;rsquo;s important that we have ways of refilling our chapter so that we have enough resources to close out the game.&amp;nbsp; Bookmark is a staple of the format and sees play across virtually every archetype.&amp;nbsp; Card advantage for a single aura cost is incredible, and you would need a very good reason not to play it.&amp;nbsp; Exquisite Stew is a bit less exciting, but essentially allows us to get away with playing 38 pages instead of 40.&amp;nbsp; The life loss and burn will rarely matter, as we generally are trying to win before it can present a problem.&amp;nbsp; Growth is sort of the pi&amp;egrave;ces de r&amp;eacute;sistance of this archetype.&amp;nbsp; Getting access to five new pages after you&amp;rsquo;ve already played the rest of your chapter is just too good, as it drowns your opponent in an amount of card advantage they likely won&amp;rsquo;t be able to come back from.&amp;nbsp;&amp;nbsp;&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;[New Beginnings, New Years New Beginnings]&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Every spellbook should have one of these, the question is which one should you choose?&amp;nbsp; Some lists can get away with either or, some lists need to save certain resources for later by shuffling them back with New Beginnings, and some would simply rather use New Years New Beginnings to try to discard key pieces from your opponent.&amp;nbsp; I&amp;rsquo;ve gone with New Years New Beginnings for this list for several reasons.&amp;nbsp;&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;ol&gt;\r\n	&lt;li&gt;\r\n	&lt;p&gt;&lt;strong&gt;It can help deal with problem cards(Flood the Earth, Tribe Tirade, etc.) before your opponent can get the chance to play them.&amp;nbsp;&amp;nbsp;&lt;/strong&gt;&lt;/p&gt;\r\n	&lt;/li&gt;\r\n	&lt;li&gt;\r\n	&lt;p&gt;&lt;strong&gt;This list is largely redundant, and doesn&amp;rsquo;t rely on any one card to function.&amp;nbsp; As such, we don&amp;rsquo;t mind losing access to a card by discarding it early on.&amp;nbsp;&amp;nbsp;&lt;/strong&gt;&lt;/p&gt;\r\n	&lt;/li&gt;\r\n	&lt;li&gt;\r\n	&lt;p&gt;&lt;strong&gt;This list frequently isn&amp;rsquo;t discarding anything to New Year New Beginnings anyway, as we empty our chapter so quickly.&lt;/strong&gt;&lt;/p&gt;\r\n	&lt;/li&gt;\r\n&lt;/ol&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;If you only have access to New Beginnings, I wouldn&amp;rsquo;t sweat it. Either is a fine choice for this list, and the differences will only matter a small portion of the time.&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;[Forest Aura, Chaos Crystal, Forest God&amp;rsquo;s Amber]&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;The aura count of this list is kept extremely low for a couple of reasons.&amp;nbsp; For one, most of our pages only cost one.&amp;nbsp; For two,&amp;nbsp; we don&amp;rsquo;t want to draw too many auras as it would inhibit our ability to spam beasties onto the board.&amp;nbsp; While Chaos Crystal and Forest God&amp;rsquo;s Amber enter fatigued, they help enable us to play this low aura count and keep chapters that other archetypes would have to mulligan.&amp;nbsp;&amp;nbsp;&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;[Absorb Aura, Powerup Red, Lightning in a Bottle, First Anniversary Celebration]&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Absorb Aura is an interesting page that has a variety of uses.&amp;nbsp; We can use it to destroy our opponents aura artifacts for essentially free, or we can use it to sacrifice our own in order to accelerate our game plan.&amp;nbsp; Playing Absorb Aura is also sort of like decreasing our spellbook size by a few pages, at the cost of it sometimes being unplayable.&amp;nbsp;&amp;nbsp;&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Powerup Red is a staple of the format and sees play in almost every spellbook.&amp;nbsp; +100 LP and damage is a huge stat boost, and it&amp;rsquo;s hard to justify not playing it.&amp;nbsp; That being said, I could see an argument for cutting it in this list specifically because it costs three and we have such a low aura count.&amp;nbsp;&amp;nbsp;&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Lightning in a Bottle is another one of those pages you see in almost everything, and for good reason.&amp;nbsp; Not only can you use it to attack on the same turn you play a new beastie, you can use it to attack with the same beastie multiple times.&amp;nbsp; This can result in a ton of damage for Fearsome Critters because our beasties are getting such large stat boosts from the tribal boost effect.&amp;nbsp; It also pairs beautifully with Powerup Red to create game ending turns out of nowhere.&amp;nbsp;&amp;nbsp;&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;First Anniversary Celebration is a much more interesting choice than the pages listed above.&amp;nbsp; While it isn&amp;rsquo;t the most aggressive option, it does allow us to beat certain problematic traits such as spirit and flight.&amp;nbsp;&amp;nbsp;&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;[Distraction, Boost Aura, Feign Death]&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Sideboarding with this list is a bit tricky, because we have to be very careful to keep our beastie count high enough.&amp;nbsp; This means that we typically don&amp;rsquo;t want to bring in more than a few pages most of the time.&amp;nbsp; As a result, the sideboard consists of low amounts of various pages, instead of playing the maximum amount of certain options.&amp;nbsp; In sideboarding, we are generally only looking to side out things that aren&amp;rsquo;t necessarily super important to our main game plan.&amp;nbsp; The only real options are Absorb Aura, Lightning in a Bottle, Powerup Red, and First Anniversary Celebration.&amp;nbsp; Specifics on what you want to bring out are going to vary from matchup to matchup, and I plan to go more in depth in a future article.&amp;nbsp; You usually won&amp;rsquo;t want to side out all copies of Absorb Aura or Lightning in a Bottle, as they almost always have uses.&amp;nbsp;&amp;nbsp;&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Distraction is sort of a generic way for us to deal with problematic threats for a turn, until we can attack and kill them.&amp;nbsp; If it was a one cost I would likely be playing more copies, but having to hold up two aura in this list can be very bad for us in the early portions of the game. Boost Aura is an option that I had in the main spellbook for a while, but ultimately relegated to the sideboard.&amp;nbsp; The card is very powerful, but we are usually trying to end games before it really becomes useful.&amp;nbsp; It&amp;rsquo;s perfect for matchups that are likely to drag out a bit, or for the mirror match where we just need a way to overpower their beasties.&amp;nbsp; Feign Death is a page that comes in a decent amount of the time.&amp;nbsp; Against archetypes that like to kill our beasties, we can use Feign Death as extra copies to try and get the last bit of damage through.&amp;nbsp; It&amp;rsquo;s also quite strong in any matchup where we have a blocking advantage, as the opponent has to use multiple attacks to kill our beastie only for us to bring it back.&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;Destroy Terra and Mistletoe have fairly obvious uses, and aren&amp;rsquo;t really all that exciting.&amp;nbsp; I&amp;rsquo;m not 100% sold on the potion package, but bubbling brew is good in the mirror match, as well as against Dingbelle.&amp;nbsp; Unlucky Potion has some uses against a few different lists.&amp;nbsp; Potion seller is very interesting, as it buys back bubbling brew which is devastating in certain matchups, as well as exquisite stew which is always good for card advantage.&amp;nbsp;&amp;nbsp;&lt;/strong&gt;&lt;/p&gt;\r\n\r\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;\r\n\r\n&lt;p&gt;&lt;strong&gt;I think that&amp;#39;s going to be all for this week, but make sure to stop by in the following weeks to see the follow up article about matchups and sideboarding as well as other strategy articles.&amp;nbsp; Once the site is a little more established, I plan to do a series where I take decks built by readers and improve them while going through my thought processes.&amp;nbsp;&amp;nbsp;&lt;/strong&gt;&lt;/p&gt;\r\n',1,'2021-12-31 12:36:14','2021-12-31 12:36:14'),(5,4,'sda','sda',0,'hotdog.jpeg','&lt;p&gt;aaa&lt;/p&gt;\r\n\r\n&lt;p&gt;\\r\\n&lt;/p&gt;\r\n',0,'2022-01-01 02:39:41','2022-01-01 02:39:41');
/*!40000 ALTER TABLE `post` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `post_topic`
--

DROP TABLE IF EXISTS `post_topic`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `post_topic` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `post$id` int unsigned DEFAULT NULL,
  `topic$id` int unsigned DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `post$id` (`post$id`),
  KEY `topic$id` (`topic$id`),
  CONSTRAINT `post_topic_ibfk_1` FOREIGN KEY (`post$id`) REFERENCES `post` (`id`),
  CONSTRAINT `post_topic_ibfk_2` FOREIGN KEY (`topic$id`) REFERENCES `topic` (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `post_topic`
--

LOCK TABLES `post_topic` WRITE;
/*!40000 ALTER TABLE `post_topic` DISABLE KEYS */;
INSERT INTO `post_topic` VALUES (1,1,2),(2,2,1),(3,3,3),(4,4,1),(8,5,1);
/*!40000 ALTER TABLE `post_topic` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `topic`
--

DROP TABLE IF EXISTS `topic`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `topic` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `name` varchar(255) NOT NULL,
  `slug` varchar(255) NOT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `slug` (`slug`)
) ENGINE=InnoDB AUTO_INCREMENT=8 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `topic`
--

LOCK TABLES `topic` WRITE;
/*!40000 ALTER TABLE `topic` DISABLE KEYS */;
INSERT INTO `topic` VALUES (1,'Strategy','strategy'),(2,'Lore','lore'),(3,'Finance','finance'),(4,'test','test'),(6,'test2','test2'),(7,'test3','test3');
/*!40000 ALTER TABLE `topic` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user`
--

DROP TABLE IF EXISTS `user`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `username` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `role` enum('Author','Admin') DEFAULT NULL,
  `password` varchar(255) NOT NULL,
  `created_at` timestamp NULL DEFAULT CURRENT_TIMESTAMP,
  `updated_at` timestamp NULL DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=7 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user`
--

LOCK TABLES `user` WRITE;
/*!40000 ALTER TABLE `user` DISABLE KEYS */;
INSERT INTO `user` VALUES (3,'christianh82995','christianh82995@gmail.com',NULL,'9bdff11f7675312c97dccad1cffdef84','2021-12-30 23:22:13','2021-12-30 23:22:13'),(4,'ranestav','ranestav@gmail.com','Admin','9bdff11f7675312c97dccad1cffdef84','2021-12-30 23:59:51','2021-12-30 23:59:51'),(5,'jimmy','jimmy@jimmy.com','Author','9bdff11f7675312c97dccad1cffdef84','2021-12-31 12:21:15','2021-12-31 12:21:15'),(6,'jeff','jeff@jeff.com','Admin','9bdff11f7675312c97dccad1cffdef84','2022-01-01 02:39:23','2022-01-01 02:39:23');
/*!40000 ALTER TABLE `user` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `user_deck`
--

DROP TABLE IF EXISTS `user_deck`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `user_deck` (
  `id` int unsigned NOT NULL AUTO_INCREMENT,
  `user$id` int unsigned NOT NULL,
  `deck$id` int unsigned NOT NULL,
  PRIMARY KEY (`id`),
  KEY `user$id` (`user$id`),
  KEY `deck$id` (`deck$id`),
  CONSTRAINT `user_deck_ibfk_1` FOREIGN KEY (`user$id`) REFERENCES `user` (`id`),
  CONSTRAINT `user_deck_ibfk_2` FOREIGN KEY (`deck$id`) REFERENCES `deck` (`id`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `user_deck`
--

LOCK TABLES `user_deck` WRITE;
/*!40000 ALTER TABLE `user_deck` DISABLE KEYS */;
/*!40000 ALTER TABLE `user_deck` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-12-31 20:56:35
