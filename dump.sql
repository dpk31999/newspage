-- MySQL dump 10.13  Distrib 8.0.21, for Win64 (x86_64)
--
-- Host: localhost    Database: newspage
-- ------------------------------------------------------
-- Server version	8.0.21

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!50503 SET NAMES utf8 */;
/*!40103 SET @OLD_TIME_ZONE=@@TIME_ZONE */;
/*!40103 SET TIME_ZONE='+00:00' */;
/*!40014 SET @OLD_UNIQUE_CHECKS=@@UNIQUE_CHECKS, UNIQUE_CHECKS=0 */;
/*!40014 SET @OLD_FOREIGN_KEY_CHECKS=@@FOREIGN_KEY_CHECKS, FOREIGN_KEY_CHECKS=0 */;
/*!40101 SET @OLD_SQL_MODE=@@SQL_MODE, SQL_MODE='NO_AUTO_VALUE_ON_ZERO' */;
/*!40111 SET @OLD_SQL_NOTES=@@SQL_NOTES, SQL_NOTES=0 */;

--
-- Table structure for table `accounts`
--

DROP TABLE IF EXISTS `accounts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `accounts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `username` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `password` varchar(32) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `name` varchar(50) CHARACTER SET utf8 COLLATE utf8_general_ci NOT NULL,
  `email` text CHARACTER SET utf8 COLLATE utf8_general_ci,
  `position` int NOT NULL,
  `status` int NOT NULL,
  `date_created` datetime NOT NULL,
  `phone` varchar(40) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `url_avatar` text CHARACTER SET utf8 COLLATE utf8_general_ci,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=6 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `accounts`
--

LOCK TABLES `accounts` WRITE;
/*!40000 ALTER TABLE `accounts` DISABLE KEYS */;
INSERT INTO `accounts` VALUES (1,'admin','6201161aeabf95940ee7330bbe64f519','Huynh Dong Nè','d01295306466@gmail.com',1,0,'2019-12-03 00:00:00','1232131321','avatar/1598284059.jfif'),(2,'dongpro','6201161aeabf95940ee7330bbe64f519','DONG PRO','d01295306466@gmail.com',0,0,'2019-12-03 14:03:35','2147483647','avatar/user.jpg'),(3,'dong123','6201161aeabf95940ee7330bbe64f519','DPK3','d01295306466@gmail.com',0,0,'2020-03-08 10:16:44','2147483647','avatar/user.jpg');
/*!40000 ALTER TABLE `accounts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `categories`
--

DROP TABLE IF EXISTS `categories`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `categories` (
  `id_cate` int NOT NULL AUTO_INCREMENT,
  `label` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `url` varchar(100) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `date_created` datetime NOT NULL,
  PRIMARY KEY (`id_cate`)
) ENGINE=InnoDB AUTO_INCREMENT=9 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `categories`
--

LOCK TABLES `categories` WRITE;
/*!40000 ALTER TABLE `categories` DISABLE KEYS */;
INSERT INTO `categories` VALUES (8,'y tế','y-te','2020-08-04 10:04:06');
/*!40000 ALTER TABLE `categories` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `images`
--

DROP TABLE IF EXISTS `images`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `images` (
  `id_img` int NOT NULL AUTO_INCREMENT,
  `url` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `type` varchar(5) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `size` int NOT NULL,
  `date_uploaded` datetime NOT NULL,
  PRIMARY KEY (`id_img`)
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `images`
--

LOCK TABLES `images` WRITE;
/*!40000 ALTER TABLE `images` DISABLE KEYS */;
/*!40000 ALTER TABLE `images` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `posts`
--

DROP TABLE IF EXISTS `posts`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `posts` (
  `id` int NOT NULL AUTO_INCREMENT,
  `title` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `descr` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `url_thumb` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `slug` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `keywords` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `body` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `cate_id` int NOT NULL,
  `author_id` int NOT NULL,
  `status` int NOT NULL,
  `view` int NOT NULL,
  `date_created` datetime NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=12 DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `posts`
--

LOCK TABLES `posts` WRITE;
/*!40000 ALTER TABLE `posts` DISABLE KEYS */;
INSERT INTO `posts` VALUES (4,'Việt Nam xuất hiện ca nhiễm COVID-19 thứ 18','Việt Nam xuất hiện ca nhiễm COVID-19 thứ 181','1598507494.jpg','viet-nam-xuat-hien-ca-nhiem-covid-19-thu-181','covid-19, vietnam','<h2><strong>TTO - Ca nhiễm COVID-19 thứ 18 vừa được Bộ Y tế xác nhận là N.V.T, 27 tuổi, trở về Việt Nam trên chuyến bay VJ981 từ Busan, Hàn Quốc về Vân Đồn ngày 4-3.</strong></h2>\r\n\r\n<p>Bộ Y tế cho biết bệnh nhân là nam giới, quê Thái Bình, sau khi trở về Việt Nam đã được cách ly tập trung, kết quả xét nghiệm vừa được Viện Vệ sinh dịch tễ trung ương công bố chiều nay 7-3 cho kết quả dương tính với virus corona chủng mới.</p>\r\n\r\n<p>Theo thông tin từ Bộ Y tế, tháng 2 vừa qua bệnh nhân có ở Daegu, vùng tâm dịch của Hàn Quốc, đến 29-2 có dấu hiệu rát họng, ho nhưng không sốt. Bệnh nhân tự theo dõi tại nhà và đến 4-3 cùng em gái từ Hàn Quốc về Việt Nam trên chuyến bay VJ981 từ Busan đến Vân Đồn.</p>\r\n\r\n<p>Ngay sau khi về Việt Nam, bệnh nhân đã được đưa về tập trung cách ly tại Trường quân sự của Quân đoàn 1, phường Tân Bình, TP Tam Điệp, Ninh Bình, sau đó được đưa vào khu cách ly dành cho người có nguy cơ cao.</p>\r\n\r\n<p>Từ trưa 7-3, bệnh nhân được điều trị tại Bệnh viện đa khoa tỉnh Ninh Bình.</p>\r\n\r\n<p>Đây là&nbsp;<a href=\"https://tuoitre.vn/benh-nhan-thu-18.html\" target=\"_blank\">bệnh nhân thứ 18</a>&nbsp;nhiễm COVID-19 của Việt Nam, 16 người bệnh của lô bệnh nhân thứ nhất đã ra viện từ ngày 26-2 trở về trước.</p>\r\n\r\n<p>Trong 2 ngày 6 và 7-3, Bộ Y tế xác nhận 2 ca nhiễm mới:</p>\r\n\r\n<p>1- N.H.N, nữ, 26 tuổi, sống ở Hà Nội, có đi du lịch Anh, Ý, Pháp và về nước ngày 2-3.</p>\r\n\r\n<p>2- N.V.T, 27 tuổi, nam, từ Hàn Quốc về Việt Nam ngày 4-3.</p>\r\n\r\n<p>Số tỉnh đã ghi nhận bệnh nhân tăng lên 6: Khánh Hòa (bệnh nhân đã ra viện), Thanh Hóa (bệnh nhân đã ra viện), Vĩnh Phúc (toàn bộ bệnh nhân đã ra viện), TP.HCM (toàn bộ bệnh nhân đã ra viện), Hà Nội 1 bệnh nhân và Ninh Bình 1 bệnh nhân.</p>\r\n\r\n<p>Như vậy, đến nay Việt Nam đã có 18&nbsp;<a href=\"https://tuoitre.vn/ca-nhiem.html\" target=\"_blank\">ca nhiễm</a>&nbsp;COVID-19, trong đó có 16/18 ca bệnh được chữa khỏi hoàn toàn</p>\r\n\r\n<p><a href=\"https://tuoitre.vn/benh-nhan-thu-18.html\" target=\"_blank\"><img alt=\"\" src=\"https://cdn.tuoitre.vn/2020/3/7/do-hoa-bo-y-te-1583570377835183960913.jpg\" /></a></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n',8,1,0,0,'2020-03-07 16:57:20'),(5,'Cài Android lên iPhone được đó, mà bạn có muốn cài không?','TTO - Hãng bảo mật mạng Corellium ngày 4-3 công bố sản phẩm đang ở giai đoạn beta có tên Project Sandcastle có khả năng cài đặt hệ điều hành Android lên một số mẫu iPhone.','1598507494.jpg','cai-android-len-iphone-duoc-do-ma-ban-co-muon-cai-khong','iphone,android','<h2>TTO - Hãng bảo mật mạng Corellium ngày 4-3 công bố sản phẩm đang ở giai đoạn beta có tên Project Sandcastle có khả năng cài đặt hệ điều hành Android lên một số mẫu iPhone.</h2>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p><img alt=\"Cài Android lên iPhone được đó, mà bạn có muốn cài không? - Ảnh 1.\" src=\"https://cdn.tuoitre.vn/thumb_w/586/2020/3/5/cai-dat-android-len-iphone-forbes-1583424084150328757283.jpg\" /></p>\r\n\r\n<p>Theo tạp chí&nbsp;<em>Forbes</em>, từ 10 năm trước, ông David Wang (thuộc công ty Corellium) đã chứng tỏ việc có thể cài đặt hệ điều hành Android trên mẫu điện thoại iPhone thế hệ đầu tiên.</p>\r\n\r\n<p>Và nay, ông này cùng các cộng sự tại hãng bảo mật mạng Corellium lặp lại việc đó với một dự án phần mềm có tên rất &quot;hoành tráng&quot; là Project Sandcastle.</p>\r\n\r\n<p>Thời điểm Corellium công bố sự việc rất đáng chú ý này, họ vẫn đang bị Apple kiện vì tội vi phạm bản quyền. Tháng 8 năm ngoái, Apple khởi kiện Corellium vì đã tạo ra các phiên bản phần mềm của iPhone để thử nghiệm.</p>\r\n\r\n<p>Bất chấp việc kiện tụng, công ty Corellium cho biết phần mềm phiên bản beta Project Sandcastle của họ sẽ chứng minh các mẫu điện thoại iPhone của Apple mặc dù được bảo vệ phần cứng và bảo mật phần mềm rất kỹ lưỡng song vẫn có thể bị tháo gỡ và thay thế bằng phần mềm khác.</p>\r\n\r\n<p>Công ty Corellium cho rằng người dùng sở hữu chiếc điện thoại thì họ có thể được quyền sử dụng nó theo cách họ muốn.</p>\r\n\r\n<p>Còn theo ông David Hecht, luật sư của công ty Corellium, thì &quot;trong nhiều năm Apple đã cố ý giữ bí mật iPhone và iPad dưới lớp vỏ an ninh, nhưng trên thực tế là loại trừ cạnh tranh&quot;.</p>\r\n\r\n<p>Ông Hecht cho rằng với cách bảo vệ này, Apple có thể lợi dụng vị thế của họ để quyết định mọi yếu tố thị trường, từ các ứng dụng cho tới khoản tiền họ tính với các nhà phát triển.</p>\r\n\r\n<p>Theo đó luật sư này cho rằng &quot;giải pháp của công ty Corellium giúp chạy Android trên iPhone rốt cuộc sẽ giúp người dùng có thêm một lựa chọn thay thế khả thi cho App Store về iOS của Apple&quot;.</p>\r\n\r\n<p>Tuy nhiên phần mềm Project Sandcastle hiện mới giới hạn sử dụng được với một số thiết bị gồm iPhone 7, iPhone 7 Plus và iPod Touch.</p>\r\n\r\n<p>Ông Chris Wade, đồng sáng lập công ty Corellium, cho biết nó sẽ sớm hỗ trợ thêm các sản phẩm khác của Apple, song có thể chưa hoạt động được trên các mẫu iPhone ra trước mẫu 5S và các mẫu mới hơn iPhone X.</p>\r\n\r\n<p>Đó là bởi Project Sandcastle sử dụng công cụ jailbreak Checkra1n tận dụng lỗ hổng bảo mật liên quan đến bộ nhớ ROM, mà công cụ này không hoạt động trên mẫu iPhone 11 trở đi.</p>\r\n\r\n<p>Với những ai muốn trải nghiệm phần mềm Project Sandcastle, hãy truy cập vào trang ProjectSandcastle.org và làm theo hướng dẫn.</p>\r\n\r\n<p>&nbsp;</p>\r\n',8,1,0,0,'2020-03-07 17:26:56'),(6,'Việt Nam có ca COVID-19 thứ 21, cũng liên quan ca thứ 17','Sáng nay 8-3, Bộ Y tế thông báo ca COVID-19 thứ 21 của Việt Nam. Bệnh nhân là người ngồi gần hàng ghế trên chuyến bay với bệnh nhân N.H.N, 26 tuổi về Hà Nội.','1598507494.jpg','viet-nam-co-ca-covid-19-thu-21-cung-lien-quan-ca-thu-17','covid-19, vietnam','<h2>Sáng nay 8-3, Bộ Y tế thông báo ca COVID-19 thứ 21 của Việt Nam. Bệnh nhân là người ngồi gần hàng ghế trên chuyến bay với bệnh nhân N.H.N, 26 tuổi về Hà Nội.</h2>\r\n\r\n<p><img alt=\"Việt Nam có ca COVID-19 thứ 21, cũng liên quan ca thứ 17 - Ảnh 1.\" src=\"https://cdn.tuoitre.vn/thumb_w/586/2020/3/8/photo-1-1583630288433776014734.jpg\" /></p>\r\n\r\n<p>Bộ Y tế vừa công bố bệnh nhân&nbsp;<a href=\"https://tuoitre.vn/covid--19.html\" target=\"_blank\">COVID-19</a>&nbsp;thứ&nbsp;21 là ông N.Q.T, 61 tuổi ở Trúc Bạch, Ba Đình, Hà Nội. Ông T. từ Anh về Việt Nam trên chuyến bay VN0054 rạng sáng 2-3, trên máy bay ông T. ngồi ghế 5A, tương đối gần bệnh nhân số 17 N.H.N. (ghế 5K).</p>\r\n\r\n<p>Tối 6-3, sau khi điều tra dịch tễ bệnh nhân N.H.N, cơ quan chức năng đã ghi nhận ông T. cũng có dấu hiệu nghi ngờ mắc bệnh nên đã chuyển mẫu tới Viện Vệ sinh dịch tễ trung ương để xét nghiệm.&nbsp;</p>\r\n\r\n<p>Ông T. được đưa tới Bệnh viện Bệnh Nhiệt đới trung ương cơ sở 2. Những người có tiếp xúc gần được đưa đi cách ly từ sáng sớm 8-3.</p>\r\n\r\n<p>Đây là bệnh nhân thứ 21 ở Việt Nam và là bệnh nhân thứ 4 của Hà Nội. Trước mắt ghi nhận cả 4 ca bệnh đều liên quan đến bệnh nhân 17.</p>\r\n\r\n<p>Bộ Y tế cho biết bệnh nhân đi công tác tại Anh, trở về trên chuyến bay VN0054 của Vietnam Airlines (cùng chuyến và ngồi gần với bệnh nhân N.H.N), về đến Hà Nội lúc 4h30, được lái xe riêng đón về nhà.</p>\r\n\r\n<p>Ngày 6-3, bệnh nhân có dấu hiệu mệt mỏi và ho khan, chưa điều trị gì. 10h sáng 7-3, bệnh nhân được Trung tâm Kiểm soát bệnh tật Hà Nội lấy mẫu xét nghiệm và chuyển sang Bệnh viện Nhiệt đới trung ương cơ sở 2 bằng xe riêng. Kết quả xét nghiệm dương tính với virus SARS-CoV-2.</p>\r\n\r\n<p>Ban chỉ đạo phòng chống dịch bệnh COVID-19 Hà Nội đã chỉ đạo Trung tâm Kiểm soát bệnh tật Hà Nội phối hợp với các đơn vị liên quan, tiến hành điều tra dịch tễ tại chỗ ở, nơi làm việc và các địa điểm liên quan khác, tiến hành lấy mẫu xét nghiệm chẩn đoán tác nhân gây bệnh và chuyển bệnh nhân đến cách ly điều trị tại Bệnh viện Bệnh Nhiệt đới trung ương cơ sở 2.</p>\r\n\r\n<p>Kết quả điều tra dịch tễ cho thấy tổng số người tiếp xúc gần với bệnh nhân (F1) là 26 người, trong đó tại nơi ở có 2 người (vợ, lái xe) đã được cách ly, tại nơi làm việc hiện đã xác định được 24 người, đang tiếp tục xác minh.&nbsp;</p>\r\n\r\n<p>Tổng số người tiếp xúc gần với người tiếp xúc gần của bệnh nhân (F2) là 23 người.&nbsp;Tổng số người tiếp xúc gần với các đối tượng F2 (F3) đã xác định được là 29 người.</p>\r\n\r\n<p>Cơ quan chức năng đã phun khử khuẩn bằng Cloramin B tại khu vực nhà bệnh nhân, thực hiện cách ly y tế đối với 50 người, trong đó tại nơi ở là 9 người, tại bệnh viện 41 người. Đồng thời lấy 15 mẫu bệnh phẩm (vợ và 14 người tiếp xúc gần với lái xe) để xét nghiệm chẩn đoán tác nhân gây bệnh.</p>\r\n\r\n<p>Bộ Y tế cho biết Hà Nội sẽ tiếp tục rà soát những người có liên quan, tiếp xúc với bệnh nhân và những người tiếp xúc gần với những người tiếp xúc gần với bệnh nhân để cách ly theo dõi sức khỏe.</p>\r\n\r\n<div class=\"eJOY__extension_root_class\" id=\"eJOY__extension_root\" style=\"all: unset;\">&nbsp;</div>\r\n',8,3,0,0,'2020-03-08 10:18:09'),(7,'Việt Nam xuất hiện ca nhiễm COVID-19 thứ 18','Việt Nam xuất hiện ca nhiễm COVID-19 thứ 182','1598507494.jpg','viet-nam-xuat-hien-ca-nhiem-covid-19-thu-182','covid-19, vietnam','<h2><strong>TTO - Ca nhiễm COVID-19 thứ 18 vừa được Bộ Y tế xác nhận là N.V.T, 27 tuổi, trở về Việt Nam trên chuyến bay VJ981 từ Busan, Hàn Quốc về Vân Đồn ngày 4-3.</strong></h2>\r\n\r\n<p>Bộ Y tế cho biết bệnh nhân là nam giới, quê Thái Bình, sau khi trở về Việt Nam đã được cách ly tập trung, kết quả xét nghiệm vừa được Viện Vệ sinh dịch tễ trung ương công bố chiều nay 7-3 cho kết quả dương tính với virus corona chủng mới.</p>\r\n\r\n<p>Theo thông tin từ Bộ Y tế, tháng 2 vừa qua bệnh nhân có ở Daegu, vùng tâm dịch của Hàn Quốc, đến 29-2 có dấu hiệu rát họng, ho nhưng không sốt. Bệnh nhân tự theo dõi tại nhà và đến 4-3 cùng em gái từ Hàn Quốc về Việt Nam trên chuyến bay VJ981 từ Busan đến Vân Đồn.</p>\r\n\r\n<p>Ngay sau khi về Việt Nam, bệnh nhân đã được đưa về tập trung cách ly tại Trường quân sự của Quân đoàn 1, phường Tân Bình, TP Tam Điệp, Ninh Bình, sau đó được đưa vào khu cách ly dành cho người có nguy cơ cao.</p>\r\n\r\n<p>Từ trưa 7-3, bệnh nhân được điều trị tại Bệnh viện đa khoa tỉnh Ninh Bình.</p>\r\n\r\n<p>Đây là&nbsp;<a href=\"https://tuoitre.vn/benh-nhan-thu-18.html\" target=\"_blank\">bệnh nhân thứ 18</a>&nbsp;nhiễm COVID-19 của Việt Nam, 16 người bệnh của lô bệnh nhân thứ nhất đã ra viện từ ngày 26-2 trở về trước.</p>\r\n\r\n<p>Trong 2 ngày 6 và 7-3, Bộ Y tế xác nhận 2 ca nhiễm mới:</p>\r\n\r\n<p>1- N.H.N, nữ, 26 tuổi, sống ở Hà Nội, có đi du lịch Anh, Ý, Pháp và về nước ngày 2-3.</p>\r\n\r\n<p>2- N.V.T, 27 tuổi, nam, từ Hàn Quốc về Việt Nam ngày 4-3.</p>\r\n\r\n<p>Số tỉnh đã ghi nhận bệnh nhân tăng lên 6: Khánh Hòa (bệnh nhân đã ra viện), Thanh Hóa (bệnh nhân đã ra viện), Vĩnh Phúc (toàn bộ bệnh nhân đã ra viện), TP.HCM (toàn bộ bệnh nhân đã ra viện), Hà Nội 1 bệnh nhân và Ninh Bình 1 bệnh nhân.</p>\r\n\r\n<p>Như vậy, đến nay Việt Nam đã có 18&nbsp;<a href=\"https://tuoitre.vn/ca-nhiem.html\" target=\"_blank\">ca nhiễm</a>&nbsp;COVID-19, trong đó có 16/18 ca bệnh được chữa khỏi hoàn toàn</p>\r\n\r\n<p><a href=\"https://tuoitre.vn/benh-nhan-thu-18.html\" target=\"_blank\"><img alt=\"\" src=\"https://cdn.tuoitre.vn/2020/3/7/do-hoa-bo-y-te-1583570377835183960913.jpg\" /></a></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<div class=\"eJOY__extension_root_class\" id=\"eJOY__extension_root\" style=\"all: unset;\">&nbsp;</div>\r\n',8,1,0,0,'2020-03-07 16:57:20'),(8,'Việt Nam xuất hiện ca nhiễm COVID-19 thứ 18','Việt Nam xuất hiện ca nhiễm COVID-19 thứ 183','1598507494.jpg','viet-nam-xuat-hien-ca-nhiem-covid-19-thu-183','covid-19, vietnam','<h2><strong>TTO - Ca nhiễm COVID-19 thứ 18 vừa được Bộ Y tế xác nhận là N.V.T, 27 tuổi, trở về Việt Nam trên chuyến bay VJ981 từ Busan, Hàn Quốc về Vân Đồn ngày 4-3.</strong></h2>\r\n\r\n<p>Bộ Y tế cho biết bệnh nhân là nam giới, quê Thái Bình, sau khi trở về Việt Nam đã được cách ly tập trung, kết quả xét nghiệm vừa được Viện Vệ sinh dịch tễ trung ương công bố chiều nay 7-3 cho kết quả dương tính với virus corona chủng mới.</p>\r\n\r\n<p>Theo thông tin từ Bộ Y tế, tháng 2 vừa qua bệnh nhân có ở Daegu, vùng tâm dịch của Hàn Quốc, đến 29-2 có dấu hiệu rát họng, ho nhưng không sốt. Bệnh nhân tự theo dõi tại nhà và đến 4-3 cùng em gái từ Hàn Quốc về Việt Nam trên chuyến bay VJ981 từ Busan đến Vân Đồn.</p>\r\n\r\n<p>Ngay sau khi về Việt Nam, bệnh nhân đã được đưa về tập trung cách ly tại Trường quân sự của Quân đoàn 1, phường Tân Bình, TP Tam Điệp, Ninh Bình, sau đó được đưa vào khu cách ly dành cho người có nguy cơ cao.</p>\r\n\r\n<p>Từ trưa 7-3, bệnh nhân được điều trị tại Bệnh viện đa khoa tỉnh Ninh Bình.</p>\r\n\r\n<p>Đây là&nbsp;<a href=\"https://tuoitre.vn/benh-nhan-thu-18.html\" target=\"_blank\">bệnh nhân thứ 18</a>&nbsp;nhiễm COVID-19 của Việt Nam, 16 người bệnh của lô bệnh nhân thứ nhất đã ra viện từ ngày 26-2 trở về trước.</p>\r\n\r\n<p>Trong 2 ngày 6 và 7-3, Bộ Y tế xác nhận 2 ca nhiễm mới:</p>\r\n\r\n<p>1- N.H.N, nữ, 26 tuổi, sống ở Hà Nội, có đi du lịch Anh, Ý, Pháp và về nước ngày 2-3.</p>\r\n\r\n<p>2- N.V.T, 27 tuổi, nam, từ Hàn Quốc về Việt Nam ngày 4-3.</p>\r\n\r\n<p>Số tỉnh đã ghi nhận bệnh nhân tăng lên 6: Khánh Hòa (bệnh nhân đã ra viện), Thanh Hóa (bệnh nhân đã ra viện), Vĩnh Phúc (toàn bộ bệnh nhân đã ra viện), TP.HCM (toàn bộ bệnh nhân đã ra viện), Hà Nội 1 bệnh nhân và Ninh Bình 1 bệnh nhân.</p>\r\n\r\n<p>Như vậy, đến nay Việt Nam đã có 18&nbsp;<a href=\"https://tuoitre.vn/ca-nhiem.html\" target=\"_blank\">ca nhiễm</a>&nbsp;COVID-19, trong đó có 16/18 ca bệnh được chữa khỏi hoàn toàn</p>\r\n\r\n<p><a href=\"https://tuoitre.vn/benh-nhan-thu-18.html\" target=\"_blank\"><img alt=\"\" src=\"https://cdn.tuoitre.vn/2020/3/7/do-hoa-bo-y-te-1583570377835183960913.jpg\" /></a></p>\r\n\r\n<p>&nbsp;</p>\r\n',8,1,0,0,'2020-03-07 16:57:20'),(9,'Việt Nam xuất hiện ca nhiễm COVID-19 thứ 18','Việt Nam xuất hiện ca nhiễm COVID-19 thứ 184','1598507494.jpg','viet-nam-xuat-hien-ca-nhiem-covid-19-thu-184','covid-19, vietnam','<h2><strong>TTO - Ca nhiễm COVID-19 thứ 18 vừa được Bộ Y tế xác nhận là N.V.T, 27 tuổi, trở về Việt Nam trên chuyến bay VJ981 từ Busan, Hàn Quốc về Vân Đồn ngày 4-3.</strong></h2>\r\n\r\n<p>Bộ Y tế cho biết bệnh nhân là nam giới, quê Thái Bình, sau khi trở về Việt Nam đã được cách ly tập trung, kết quả xét nghiệm vừa được Viện Vệ sinh dịch tễ trung ương công bố chiều nay 7-3 cho kết quả dương tính với virus corona chủng mới.</p>\r\n\r\n<p>Theo thông tin từ Bộ Y tế, tháng 2 vừa qua bệnh nhân có ở Daegu, vùng tâm dịch của Hàn Quốc, đến 29-2 có dấu hiệu rát họng, ho nhưng không sốt. Bệnh nhân tự theo dõi tại nhà và đến 4-3 cùng em gái từ Hàn Quốc về Việt Nam trên chuyến bay VJ981 từ Busan đến Vân Đồn.</p>\r\n\r\n<p>Ngay sau khi về Việt Nam, bệnh nhân đã được đưa về tập trung cách ly tại Trường quân sự của Quân đoàn 1, phường Tân Bình, TP Tam Điệp, Ninh Bình, sau đó được đưa vào khu cách ly dành cho người có nguy cơ cao.</p>\r\n\r\n<p>Từ trưa 7-3, bệnh nhân được điều trị tại Bệnh viện đa khoa tỉnh Ninh Bình.</p>\r\n\r\n<p>Đây là&nbsp;<a href=\"https://tuoitre.vn/benh-nhan-thu-18.html\" target=\"_blank\">bệnh nhân thứ 18</a>&nbsp;nhiễm COVID-19 của Việt Nam, 16 người bệnh của lô bệnh nhân thứ nhất đã ra viện từ ngày 26-2 trở về trước.</p>\r\n\r\n<p>Trong 2 ngày 6 và 7-3, Bộ Y tế xác nhận 2 ca nhiễm mới:</p>\r\n\r\n<p>1- N.H.N, nữ, 26 tuổi, sống ở Hà Nội, có đi du lịch Anh, Ý, Pháp và về nước ngày 2-3.</p>\r\n\r\n<p>2- N.V.T, 27 tuổi, nam, từ Hàn Quốc về Việt Nam ngày 4-3.</p>\r\n\r\n<p>Số tỉnh đã ghi nhận bệnh nhân tăng lên 6: Khánh Hòa (bệnh nhân đã ra viện), Thanh Hóa (bệnh nhân đã ra viện), Vĩnh Phúc (toàn bộ bệnh nhân đã ra viện), TP.HCM (toàn bộ bệnh nhân đã ra viện), Hà Nội 1 bệnh nhân và Ninh Bình 1 bệnh nhân.</p>\r\n\r\n<p>Như vậy, đến nay Việt Nam đã có 18&nbsp;<a href=\"https://tuoitre.vn/ca-nhiem.html\" target=\"_blank\">ca nhiễm</a>&nbsp;COVID-19, trong đó có 16/18 ca bệnh được chữa khỏi hoàn toàn</p>\r\n\r\n<p><a href=\"https://tuoitre.vn/benh-nhan-thu-18.html\" target=\"_blank\"><img alt=\"\" src=\"https://cdn.tuoitre.vn/2020/3/7/do-hoa-bo-y-te-1583570377835183960913.jpg\" /></a></p>\r\n\r\n<p>&nbsp;</p>\r\n',8,1,0,0,'2020-03-07 16:57:20'),(10,'Việt Nam xuất hiện ca nhiễm COVID-19 thứ 18','Việt Nam xuất hiện ca nhiễm COVID-19 thứ 185','1598507494.jpg','viet-nam-xuat-hien-ca-nhiem-covid-19-thu-185','covid-19, vietnam','&lt;h2&gt;&lt;strong&gt;TTO - Ca nhiễm COVID-19 thứ 18 vừa được Bộ Y tế xác nhận là N.V.T, 27 tuổi, trở về Việt Nam trên chuyến bay VJ981 từ Busan, Hàn Quốc về Vân Đồn ngày 4-3.&lt;/strong&gt;&lt;/h2&gt;\n\n&lt;p&gt;Bộ Y tế cho biết bệnh nhân là nam giới, quê Thái Bình, sau khi trở về Việt Nam đã được cách ly tập trung, kết quả xét nghiệm vừa được Viện Vệ sinh dịch tễ trung ương công bố chiều nay 7-3 cho kết quả dương tính với virus corona chủng mới.&lt;/p&gt;\n\n&lt;p&gt;Theo thông tin từ Bộ Y tế, tháng 2 vừa qua bệnh nhân có ở Daegu, vùng tâm dịch của Hàn Quốc, đến 29-2 có dấu hiệu rát họng, ho nhưng không sốt. Bệnh nhân tự theo dõi tại nhà và đến 4-3 cùng em gái từ Hàn Quốc về Việt Nam trên chuyến bay VJ981 từ Busan đến Vân Đồn.&lt;/p&gt;\n\n&lt;p&gt;Ngay sau khi về Việt Nam, bệnh nhân đã được đưa về tập trung cách ly tại Trường quân sự của Quân đoàn 1, phường Tân Bình, TP Tam Điệp, Ninh Bình, sau đó được đưa vào khu cách ly dành cho người có nguy cơ cao.&lt;/p&gt;\n\n&lt;p&gt;Từ trưa 7-3, bệnh nhân được điều trị tại Bệnh viện đa khoa tỉnh Ninh Bình.&lt;/p&gt;\n\n&lt;p&gt;Đây là&amp;nbsp;&lt;a href=&quot;https://tuoitre.vn/benh-nhan-thu-18.html&quot; target=&quot;_blank&quot;&gt;bệnh nhân thứ 18&lt;/a&gt;&amp;nbsp;nhiễm COVID-19 của Việt Nam, 16 người bệnh của lô bệnh nhân thứ nhất đã ra viện từ ngày 26-2 trở về trước.&lt;/p&gt;\n\n&lt;p&gt;Trong 2 ngày 6 và 7-3, Bộ Y tế xác nhận 2 ca nhiễm mới:&lt;/p&gt;\n\n&lt;p&gt;1- N.H.N, nữ, 26 tuổi, sống ở Hà Nội, có đi du lịch Anh, Ý, Pháp và về nước ngày 2-3.&lt;/p&gt;\n\n&lt;p&gt;2- N.V.T, 27 tuổi, nam, từ Hàn Quốc về Việt Nam ngày 4-3.&lt;/p&gt;\n\n&lt;p&gt;Số tỉnh đã ghi nhận bệnh nhân tăng lên 6: Khánh Hòa (bệnh nhân đã ra viện), Thanh Hóa (bệnh nhân đã ra viện), Vĩnh Phúc (toàn bộ bệnh nhân đã ra viện), TP.HCM (toàn bộ bệnh nhân đã ra viện), Hà Nội 1 bệnh nhân và Ninh Bình 1 bệnh nhân.&lt;/p&gt;\n\n&lt;p&gt;Như vậy, đến nay Việt Nam đã có 18&amp;nbsp;&lt;a href=&quot;https://tuoitre.vn/ca-nhiem.html&quot; target=&quot;_blank&quot;&gt;ca nhiễm&lt;/a&gt;&amp;nbsp;COVID-19, trong đó có 16/18 ca bệnh được chữa khỏi hoàn toàn&lt;/p&gt;\n\n&lt;p&gt;&lt;a href=&quot;https://tuoitre.vn/benh-nhan-thu-18.html&quot; target=&quot;_blank&quot;&gt;&lt;img alt=&quot;&quot; src=&quot;https://cdn.tuoitre.vn/2020/3/7/do-hoa-bo-y-te-1583570377835183960913.jpg&quot; /&gt;&lt;/a&gt;&lt;/p&gt;\n\n&lt;p&gt;&amp;nbsp;&lt;/p&gt;',8,1,1,0,'2020-03-07 16:57:20'),(11,'Việt Nam xuất hiện ca nhiễm COVID-19 thứ 18','Việt Nam xuất hiện ca nhiễm COVID-19 thứ 186','1598507494.jpg','viet-nam-xuat-hien-ca-nhiem-covid-19-thu-186','covid-19, vietnam','<h2><strong>TTO - Ca nhiễm COVID-19 thứ 18 vừa được Bộ Y tế xác nhận là N.V.T, 27 tuổi, trở về Việt Nam trên chuyến bay VJ981 từ Busan, Hàn Quốc về Vân Đồn ngày 4-3.</strong></h2>\r\n\r\n<p>Bộ Y tế cho biết bệnh nhân là nam giới, quê Thái Bình, sau khi trở về Việt Nam đã được cách ly tập trung, kết quả xét nghiệm vừa được Viện Vệ sinh dịch tễ trung ương công bố chiều nay 7-3 cho kết quả dương tính với virus corona chủng mới.</p>\r\n\r\n<p>Theo thông tin từ Bộ Y tế, tháng 2 vừa qua bệnh nhân có ở Daegu, vùng tâm dịch của Hàn Quốc, đến 29-2 có dấu hiệu rát họng, ho nhưng không sốt. Bệnh nhân tự theo dõi tại nhà và đến 4-3 cùng em gái từ Hàn Quốc về Việt Nam trên chuyến bay VJ981 từ Busan đến Vân Đồn.</p>\r\n\r\n<p>Ngay sau khi về Việt Nam, bệnh nhân đã được đưa về tập trung cách ly tại Trường quân sự của Quân đoàn 1, phường Tân Bình, TP Tam Điệp, Ninh Bình, sau đó được đưa vào khu cách ly dành cho người có nguy cơ cao.</p>\r\n\r\n<p>Từ trưa 7-3, bệnh nhân được điều trị tại Bệnh viện đa khoa tỉnh Ninh Bình.</p>\r\n\r\n<p>Đây là&nbsp;<a href=\"https://tuoitre.vn/benh-nhan-thu-18.html\" target=\"_blank\">bệnh nhân thứ 18</a>&nbsp;nhiễm COVID-19 của Việt Nam, 16 người bệnh của lô bệnh nhân thứ nhất đã ra viện từ ngày 26-2 trở về trước.</p>\r\n\r\n<p>Trong 2 ngày 6 và 7-3, Bộ Y tế xác nhận 2 ca nhiễm mới:</p>\r\n\r\n<p>1- N.H.N, nữ, 26 tuổi, sống ở Hà Nội, có đi du lịch Anh, Ý, Pháp và về nước ngày 2-3.</p>\r\n\r\n<p>2- N.V.T, 27 tuổi, nam, từ Hàn Quốc về Việt Nam ngày 4-3.</p>\r\n\r\n<p>Số tỉnh đã ghi nhận bệnh nhân tăng lên 6: Khánh Hòa (bệnh nhân đã ra viện), Thanh Hóa (bệnh nhân đã ra viện), Vĩnh Phúc (toàn bộ bệnh nhân đã ra viện), TP.HCM (toàn bộ bệnh nhân đã ra viện), Hà Nội 1 bệnh nhân và Ninh Bình 1 bệnh nhân.</p>\r\n\r\n<p>Như vậy, đến nay Việt Nam đã có 18&nbsp;<a href=\"https://tuoitre.vn/ca-nhiem.html\" target=\"_blank\">ca nhiễm</a>&nbsp;COVID-19, trong đó có 16/18 ca bệnh được chữa khỏi hoàn toàn</p>\r\n\r\n<p><a href=\"https://tuoitre.vn/benh-nhan-thu-18.html\" target=\"_blank\"><img alt=\"\" src=\"https://cdn.tuoitre.vn/2020/3/7/do-hoa-bo-y-te-1583570377835183960913.jpg\" /></a></p>\r\n\r\n<p>&nbsp;</p>\r\n\r\n<div class=\"eJOY__extension_root_class\" id=\"eJOY__extension_root\" style=\"all: unset;\">&nbsp;</div>\r\n',8,1,1,0,'2020-03-07 16:57:20');
/*!40000 ALTER TABLE `posts` ENABLE KEYS */;
UNLOCK TABLES;

--
-- Table structure for table `website`
--

DROP TABLE IF EXISTS `website`;
/*!40101 SET @saved_cs_client     = @@character_set_client */;
/*!50503 SET character_set_client = utf8mb4 */;
CREATE TABLE `website` (
  `title` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `descr` longtext CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `keywords` text CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `status` int NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;
/*!40101 SET character_set_client = @saved_cs_client */;

--
-- Dumping data for table `website`
--

LOCK TABLES `website` WRITE;
/*!40000 ALTER TABLE `website` DISABLE KEYS */;
/*!40000 ALTER TABLE `website` ENABLE KEYS */;
UNLOCK TABLES;
/*!40103 SET TIME_ZONE=@OLD_TIME_ZONE */;

/*!40101 SET SQL_MODE=@OLD_SQL_MODE */;
/*!40014 SET FOREIGN_KEY_CHECKS=@OLD_FOREIGN_KEY_CHECKS */;
/*!40014 SET UNIQUE_CHECKS=@OLD_UNIQUE_CHECKS */;
/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
/*!40111 SET SQL_NOTES=@OLD_SQL_NOTES */;

-- Dump completed on 2021-05-30 14:27:54
