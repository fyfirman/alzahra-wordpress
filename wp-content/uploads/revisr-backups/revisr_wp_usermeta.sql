
/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;
DROP TABLE IF EXISTS `wp_usermeta`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!40101 SET character_set_client = utf8 */;
CREATE TABLE `wp_usermeta` (
  `umeta_id` bigint(20) unsigned NOT NULL AUTO_INCREMENT,
  `user_id` bigint(20) unsigned NOT NULL DEFAULT '0',
  `meta_key` varchar(255) DEFAULT NULL,
  `meta_value` longtext,
  PRIMARY KEY (`umeta_id`),
  KEY `user_id` (`user_id`),
  KEY `meta_key` (`meta_key`(191))
) ENGINE=InnoDB AUTO_INCREMENT=87 DEFAULT CHARSET=utf8;
/*!40101 SET character_set_client = @saved_cs_client */;

LOCK TABLES `wp_usermeta` WRITE;
/*!40000 ALTER TABLE `wp_usermeta` DISABLE KEYS */;
INSERT INTO `wp_usermeta` VALUES (1,1,'nickname','Alzahra Islamic Centre'),(2,1,'first_name',''),(3,1,'last_name',''),(4,1,'description',''),(5,1,'rich_editing','true'),(6,1,'syntax_highlighting','true'),(7,1,'comment_shortcuts','false'),(8,1,'admin_color','fresh'),(9,1,'use_ssl','0'),(10,1,'show_admin_bar_front','true'),(11,1,'locale',''),(12,1,'wp_capabilities','a:1:{s:13:\"administrator\";b:1;}'),(13,1,'wp_user_level','10'),(14,1,'dismissed_wp_pointers','theme_editor_notice'),(15,1,'show_welcome_panel','1'),(17,1,'wp_dashboard_quick_press_last_post_id','2136'),(18,1,'community-events-location','a:1:{s:2:\"ip\";s:11:\"36.71.245.0\";}'),(19,2,'nickname','dilla'),(20,2,'first_name','Faradilla'),(21,2,'last_name','(Developer)'),(22,2,'description',''),(23,2,'rich_editing','true'),(24,2,'syntax_highlighting','true'),(25,2,'comment_shortcuts','false'),(26,2,'admin_color','fresh'),(27,2,'use_ssl','0'),(28,2,'show_admin_bar_front','true'),(29,2,'locale',''),(30,2,'wp_capabilities','a:1:{s:13:\"administrator\";b:1;}'),(31,2,'wp_user_level','10'),(32,2,'dismissed_wp_pointers','theme_editor_notice'),(47,2,'session_tokens','a:1:{s:64:\"04d433e895493ea47b50f26b9da2684cc25f8a12d2cb10575276997b322d88a5\";a:4:{s:10:\"expiration\";i:1634042196;s:2:\"ip\";s:11:\"103.147.9.5\";s:2:\"ua\";s:114:\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/93.0.4577.82 Safari/537.36\";s:5:\"login\";i:1632832596;}}'),(48,2,'wp_dashboard_quick_press_last_post_id','2105'),(49,2,'community-events-location','a:1:{s:2:\"ip\";s:11:\"103.147.9.0\";}'),(50,1,'managenav-menuscolumnshidden','a:5:{i:0;s:11:\"link-target\";i:1;s:11:\"css-classes\";i:2;s:3:\"xfn\";i:3;s:11:\"description\";i:4;s:15:\"title-attribute\";}'),(51,1,'metaboxhidden_nav-menus','a:1:{i:0;s:12:\"add-post_tag\";}'),(52,2,'managenav-menuscolumnshidden','a:5:{i:0;s:11:\"link-target\";i:1;s:11:\"css-classes\";i:2;s:3:\"xfn\";i:3;s:11:\"description\";i:4;s:15:\"title-attribute\";}'),(53,2,'metaboxhidden_nav-menus','a:1:{i:0;s:12:\"add-post_tag\";}'),(54,2,'elementor_introduction','a:2:{s:19:\"colorPickerDropping\";b:1;s:10:\"rightClick\";b:1;}'),(55,2,'nav_menu_recently_edited','2'),(56,2,'wp_elementor_connect_common_data','a:0:{}'),(57,2,'meta-box-order_dashboard','a:4:{s:6:\"normal\";s:99:\"e-dashboard-overview,dashboard_php_nag,dashboard_site_health,dashboard_right_now,dashboard_activity\";s:4:\"side\";s:39:\"dashboard_quick_press,dashboard_primary\";s:7:\"column3\";s:0:\"\";s:7:\"column4\";s:0:\"\";}'),(58,2,'wp_user-settings','libraryContent=browse'),(59,2,'wp_user-settings-time','1629735185'),(60,1,'elementor_introduction','a:2:{s:19:\"colorPickerDropping\";b:1;s:10:\"rightClick\";b:1;}'),(63,1,'session_tokens','a:1:{s:64:\"6835ea8147c2ae129ccfbf361d2500bb8e81c7280ab393d5579c09b751664f42\";a:4:{s:10:\"expiration\";i:1635491913;s:2:\"ip\";s:14:\"172.70.147.178\";s:2:\"ua\";s:105:\"Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/92.0.4515.159 Safari/537.36\";s:5:\"login\";i:1635319113;}}'),(64,1,'wp_user-settings','libraryContent=browse&mfold=o&editor=html'),(65,1,'wp_user-settings-time','1635316080'),(66,1,'nav_menu_recently_edited','2'),(67,4,'nickname','zhra.creative'),(68,4,'first_name','ZHRA'),(69,4,'last_name','Creative'),(70,4,'description',''),(71,4,'rich_editing','true'),(72,4,'syntax_highlighting','true'),(73,4,'comment_shortcuts','false'),(74,4,'admin_color','fresh'),(75,4,'use_ssl','0'),(76,4,'show_admin_bar_front','true'),(77,4,'locale',''),(78,4,'wp_capabilities','a:1:{s:13:\"administrator\";b:1;}'),(79,4,'wp_user_level','10'),(80,4,'dismissed_wp_pointers',''),(81,4,'session_tokens','a:2:{s:64:\"d3bbcdc1475a1f17c0da01b85c2cd970eafaf7cfe8f20943b28f76e2d0f3e39c\";a:4:{s:10:\"expiration\";i:1636459748;s:2:\"ip\";s:13:\"172.70.188.94\";s:2:\"ua\";s:114:\"Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36\";s:5:\"login\";i:1636286948;}s:64:\"935fe5fdda24c54f6c68fb2037357c3d61303ba8eb589453a4cb69741dab3441\";a:4:{s:10:\"expiration\";i:1636460903;s:2:\"ip\";s:13:\"172.70.147.20\";s:2:\"ua\";s:104:\"Mozilla/5.0 (X11; Linux x86_64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/95.0.4638.69 Safari/537.36\";s:5:\"login\";i:1636288103;}}'),(82,4,'wp_dashboard_quick_press_last_post_id','2429'),(83,4,'community-events-location','a:1:{s:2:\"ip\";s:13:\"180.244.136.0\";}'),(84,4,'wp_user-settings','libraryContent=upload'),(85,4,'wp_user-settings-time','1635666777'),(86,4,'elementor_introduction','a:2:{s:19:\"colorPickerDropping\";b:1;s:10:\"rightClick\";b:1;}');
/*!40000 ALTER TABLE `wp_usermeta` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

