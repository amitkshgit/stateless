--
-- Table structure for table `admin`
--

DROP TABLE IF EXISTS `admin`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `admin` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `username` varchar(30) DEFAULT NULL,
  `passcode` varchar(255) DEFAULT NULL,
  PRIMARY KEY (`id`),
  UNIQUE KEY `username` (`username`)
) ENGINE=InnoDB AUTO_INCREMENT=2 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `admin`
--

LOCK TABLES `admin` WRITE;
/*!40000 ALTER TABLE `admin` DISABLE KEYS */;
INSERT INTO `admin` VALUES (1,'admin1',password('admin123'));
/*!40000 ALTER TABLE `admin` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `elb`
--

DROP TABLE IF EXISTS `elb`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `elb` (
  `count` int(11) NOT NULL,
  `elbname` varchar(100) DEFAULT NULL,
  `dnsname` varchar(100) DEFAULT NULL,
  `az` varchar(100) DEFAULT NULL,
  `proto` varchar(100) DEFAULT NULL,
  `region` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`count`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;


-- Table structure for table `instances`
--

DROP TABLE IF EXISTS `instances`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `instances` (
  `count` int(11) NOT NULL,
  `instanceid` varchar(100) DEFAULT NULL,
  `ami` varchar(100) DEFAULT NULL,
  `state` varchar(100) DEFAULT NULL,
  `type` varchar(100) DEFAULT NULL,
  `az` varchar(100) DEFAULT NULL,
  `privatedns` varchar(100) DEFAULT NULL,
  `privateip` varchar(100) DEFAULT NULL,
  `dnsname` varchar(100) DEFAULT NULL,
  `publicip` varchar(100) DEFAULT NULL,
  `keyname` varchar(100) DEFAULT NULL,
  `securitygroup` varchar(100) DEFAULT NULL,
  `subnetid` varchar(100) DEFAULT NULL,
  `vpcid` varchar(100) DEFAULT NULL,
  `rootdevicetype` varchar(100) DEFAULT NULL,
  `rootdevicename` varchar(100) DEFAULT NULL,
  `ebsvolumesattached` varchar(100) DEFAULT NULL,
  `dummy` varchar(100) DEFAULT NULL,
  `elbname` varchar(100) DEFAULT NULL,
  `elbhealthcheck` varchar(100) DEFAULT NULL,
  `reason` varchar(100) DEFAULT NULL,
  `region` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`count`)
) ENGINE=InnoDB DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Table structure for table `volumes`
--

DROP TABLE IF EXISTS `volumes`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `volumes` (
  `count` int(11) NOT NULL AUTO_INCREMENT,
  `volumeid` varchar(100) DEFAULT NULL,
  `size` varchar(100) DEFAULT NULL,
  `snapshotid` varchar(100) DEFAULT NULL,
  `az` varchar(100) DEFAULT NULL,
  `status` varchar(100) DEFAULT NULL,
  `attachdetails` varchar(100) DEFAULT NULL,
  `instanceid` varchar(100) DEFAULT NULL,
  `device` varchar(100) DEFAULT NULL,
  `dummy` varchar(100) DEFAULT NULL,
  `region` varchar(100) DEFAULT NULL,
  PRIMARY KEY (`count`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=latin1;
/*!40101 SET character_set_client = @saved_cs_client */;

/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

