-- phpMyAdmin SQL Dump
-- version 4.7.4
-- https://www.phpmyadmin.net/
--
-- Host: 127.0.0.1
-- Generation Time: Jul 06, 2018 at 12:27 PM
-- Server version: 10.1.30-MariaDB
-- PHP Version: 5.6.33

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `serum`
--

-- --------------------------------------------------------

--
-- Table structure for table `article`
--

CREATE TABLE `article` (
  `id` int(11) NOT NULL,
  `views` int(11) DEFAULT NULL,
  `status` int(1) DEFAULT NULL,
  `hot` int(1) DEFAULT NULL,
  `weight` int(11) DEFAULT NULL,
  `author` int(11) DEFAULT NULL,
  `type` int(11) DEFAULT NULL,
  `name` varchar(500) NOT NULL,
  `summary` varchar(500) NOT NULL,
  `content` text NOT NULL,
  `link` varchar(500) DEFAULT NULL,
  `title` varchar(300) DEFAULT NULL,
  `keywords` varchar(300) DEFAULT NULL,
  `description` varchar(300) DEFAULT NULL,
  `cate` int(11) NOT NULL,
  `time` varchar(500) NOT NULL,
  `img` varchar(500) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `article`
--

INSERT INTO `article` (`id`, `views`, `status`, `hot`, `weight`, `author`, `type`, `name`, `summary`, `content`, `link`, `title`, `keywords`, `description`, `cate`, `time`, `img`) VALUES
(59, NULL, 1, 1, 0, 1, 2, 'Lịch sử bao bì', 'Bao bì là công nghệ bao bọc hoặc bảo vệ các sản phẩm để phân phối, lưu trữ, bán và sử dụng. Bao bì cũng đề cập đến quá trình thiết kế, đánh giá và sản xuất bao bì', '<p style=\"text-align:justify\">Bao bì là công nghệ bao bọc hoặc bảo vệ các sản phẩm để phân phối, lưu trữ, bán và sử dụng. Bao bì cũng đề cập đến quá trình thiết kế, đánh giá và sản xuất <a href=\"http://inbaobiquoctien.com\"><strong>in bao bì</strong></a>. Bao bì có thể được mô tả như là một hệ thống phối hợp chuẩn bị hàng hoá cho vận chuyển, lưu kho, hậu cần, bán, và sử dụng cuối cùng. Bao bì có chứa, bảo vệ, bảo quản, vận chuyển, thông tin và bán.&nbsp;Tại nhiều quốc gia, nó được lồng ghép hoàn toàn vào chính phủ, kinh doanh, thể chế, công nghiệp và cá nhân sử dụng. Hãy cùng <a href=\"http://inbaobiquoctien.com\"><strong>In Bao Bì Quốc Tiến</strong></a> cùng nhìn lại lịch sử của bao bì đã trải qua và phát triển như thế nào nhé!</p>\n\n<h4 style=\"text-align:justify\">Thời cổ đại&nbsp;</h4>\n\n<p style=\"text-align:center\"><img alt=\"In Bao Bì Quốc Tiên - Đồ đựng rượu vang bằng đồng từ thế kỷ 19 tcn\" src=\"http://inbaobiquoctien.com/uploads/Images/tin-tuc/15-april-2018/inbaobiquoctien-do-dung-ruou-vang-bang-dong-the-ky-9-tcn.png\" /></p>\n\n<p style=\"text-align:center\">Đồ đựng rượu vang bằng đồng từ thế kỷ thứ 9 trước Công nguyên.</p>\n\n<p style=\"text-align:justify\">Các gói đầu tiên sử dụng các vật liệu tự nhiên sẵn vào thời điểm đó: giỏ lau sậy, wineskins (Bota túi ), hộp gỗ, gốm bình hoa, gốm amphorae , gỗ thùng, túi dệt, ... vật liệu xử lý được sử dụng để tạo thành các gói như đã được thiết kế: Ví dụ, thủy tinh sớm và tàu đồng. Nghiên cứu về các gói cũ là một khía cạnh quan trọng của khảo cổ học.</p>\n\n<p style=\"text-align:justify\">Việc sử dụng giấy đã được sử dụng sớm nhất cho bao bì bắt đầu từ năm 1035, khi một khách du lịch người Ba lan thăm các thị trường ở Cairo ghi nhận rằng rau, gia vị và phần cứng đã được bọc trong giấy cho khách hàng sau khi được bán.</p>\n\n<h4 style=\"text-align:justify\">Kỷ nguyên hiện đại</h4>\n\n<h5 style=\"text-align:justify\">Tinning</h5>\n\n<p style=\"text-align:justify\">Việc sử dụng tinplate để đóng gói có từ thế kỷ 18. Việc sản xuất tinplate đã là một sự độc quyền của Bohemia; Năm 1667 Andrew Yarranton, một kỹ sư người Anh, và Ambrose Crowley đã đưa phương pháp này đến Anh nơi nó được cải tiến bởi các thợ sắt bao gồm Philip Foley . Năm 1697, John Hanbury đã có một nhà máy cán ở Pontypool để sản xuất \"Pontypoole Plates\". Phương pháp tiên phong đó là cán tấm sắt bằng phương pháp xi-lanh kích hoạt tấm đen đồng đều hơn được sản xuất hơn là có thể với thực tiễn cựu của búa.</p>\n\n<p style=\"text-align:justify\">Các hộp thiếc đã bắt đầu được bán từ các cảng trong Kênh Bristol năm 1725. Thép đạn được vận chuyển từ Newport, Monmouthshire. [Đến năm 1805, đã có 80.000 hộp và 50.000 chiếc xuất khẩu. Các nhà sản xuất thuốc độc ở London đã bắt đầu đóng gói thuốc lá trong hộp kim mạ từ năm 1760 trở đi].</p>\n\n<h5 style=\"text-align:justify\">Canning</h5>\n\n<p style=\"text-align:justify\">1914 tạp chí quảng cáo cho dụng cụ nấu ăn với hướng dẫn về nhà đóng hộp.</p>\n\n<p style=\"text-align:justify\">Với việc khám phá ra tầm quan trọng của container kín để bảo quản thực phẩm bởi nhà phát minh người Pháp Nicolas Appert. Sau khi nhận được bằng sáng chế, Durand không tự theo dõi với thực phẩm đóng hộp. Ông đã bán bằng sáng chế vào năm 1812 cho hai người Anh khác, Bryan Donkin và John Hall, người đã tinh chế quá trình và sản phẩm và thành lập nhà máy đóng hộp thương mại đầu tiên trên thế giới tại Southwark Park Road, London. Đến năm 1813, họ sản xuất hàng hoá đóng hộp đầu tiên cho Hải quân Hoàng gia .</p>\n\n<p style=\"text-align:justify\">Sự cải tiến tiến bộ trong ngành chế biến đồ hộp đã kích thích sáng chế năm 1855 của dụng cụ mở hộp. Robert Yeates, nhà chế tạo dụng cụ phẫu thuật và dụng cụ phẫu thuật của Trafalgar Place West, Hackney Road, Middlesex, Anh, đã phát minh ra dụng cụ mở hộp bằng móng có sử dụng một dụng cụ cầm tay chạy trên đầu hộp kim loại. Năm 1858, một đòn bẩy kiểu mở của một hình dạng phức tạp hơn đã được cấp bằng sáng chế tại Hoa Kỳ bởi Ezra Warner của Waterbury, Connecticut .</p>\n\n<h5 style=\"text-align:justify\">Đóng gói bằng giấy&nbsp;</h5>\n\n<p style=\"text-align:center\"><img alt=\"In Bao Bì Quốc Tiến - Đóng gói bao bì muối\" src=\"http://inbaobiquoctien.com/uploads/Images/tin-tuc/15-april-2018/inbaobiquoctien-dong-goi-bao-bi-muoi.jpg\" /></p>\n\n<p style=\"text-align:center\">Đóng gói bao bì muối</p>\n\n<p style=\"text-align:justify\">Hộp set-up được sử dụng lần đầu tiên vào thế kỷ 16 và các hộp gấp hiện đại có từ năm 1839. Hộp sóng đầu tiên được sản xuất thương mại vào năm 1817 tại Anh. Tính tính chốt tính chốt tại Bãi thuận tính Bãi Theo Bãi thuận BiigiAme thuận thuận Bãi Wolme Theo Fed. Robert Gair, người Scotland, đã phát minh ra hộp giấy đã được cắt sẵn trong những miếng bằng phẳng được sản xuất với số lượng lớn vào năm 1890. Phát minh của Gair đã xuất hiện như là kết quả của một tai nạn: như một Brooklyn. Máy in và máy làm túi giấy trong những năm 1870, ông đã in một bộ túi hạt giống, và người cai trị bằng kim loại, thường dùng để nhão túi xách, dịch chuyển sang vị trí và cắt chúng.a Mỹ đã cấp bằng sáng chế cho một máy làm túi tự động vào năm 1852.</p>\n\n<h4 style=\"text-align:justify\">Thế kỷ 20</h4>\n\n<p style=\"text-align:justify\">Các tiến bộ về bao bì trong đầu thế kỷ 20 bao gồm việc đóng cửa Bakelite lên chai, hộp giấy bóng láng trong suốt và các tấm trên thùng carton. Những đổi mới này làm gia tăng hiệu quả chế biến và cải thiện an toàn thực phẩm. Khi các vật liệu bổ sung như nhôm và một số loại nhựa đã được phát triển, chúng được kết hợp thành các gói để cải thiện hiệu suất và tính năng.</p>\n\n<p style=\"text-align:center\"><img alt=\"In Bao Bì Quốc Tiến - Chai Heroin và carton, đầu thế kỷ 20\" src=\"http://inbaobiquoctien.com/uploads/Images/tin-tuc/15-april-2018/inbaobiquoctien-chai-heroin-va-carton-tk20.JPG\" /></p>\n\n<p style=\"text-align:center\">Chai Heroin và carton, đầu thế kỷ 20.</p>\n\n<p style=\"text-align:justify\">Năm 1952, Đại học Michigan State trở thành trường đại học đầu tiên trên thế giới cung cấp bằng về Kỹ thuật Bao bì .</p>\n\n<p style=\"text-align:justify\">Việc tái chế trong nhà máy từ lâu đã trở nên phổ biến trong việc sản xuất vật liệu bao bì. Việc tái chế các sản phẩm nhôm và các sản phẩm bằng giấy đã qua sử dụng đã được tiết kiệm trong nhiều năm: kể từ những năm 1980, tái chế sau khi tiêu dùng đã tăng lên do tái chế lề đường, nhận thức về người tiêu dùng và áp lực pháp lý.</p>\n\n<p style=\"text-align:center\"><img alt=\"In Bao Bì Quốc Tiến - Một hộp thuốc làm từ polyethylene vào năm 1936\" src=\"http://inbaobiquoctien.com/uploads/Images/tin-tuc/15-april-2018/inbaobiquoctien-mot-hop-thuoc-lam-tu-polyethylene.JPG\" /></p>\n\n<p style=\"text-align:center\">Một hộp thuốc làm từ polyethylene vào năm 1936</p>\n\n<p style=\"text-align:justify\">Nhiều đổi mới nổi bật trong ngành bao bì đã được phát triển trước tiên cho mục đích sử dụng quân sự. Một số vật tư quân sự được đóng gói trong cùng một bao bì thương mại được sử dụng cho ngành công nghiệp nói chung. Bao bì quân sự khác phải vận chuyển vật liệu, vật tư, thực phẩm, vv trong điều kiện phân phối và lưu trữ nghiêm ngặt. Các vấn đề về đóng gói gặp phải trong Chiến tranh thế giới lần thứ hai đã dẫn tới các quy định quân sự hay \"mil spec\" được áp dụng cho bao bì, sau đó được gọi là \"bao bì kỹ thuật quân sự\". Là một khái niệm nổi bật trong quân đội, gói phần mềm mil đã chính thức xuất hiện vào khoảng năm 1941, do các hoạt động ở Iceland. Trải qua những tổn thất nghiêm trọng, cuối cùng là do bao bì xấu. Trong hầu hết các trường hợp, các giải pháp đóng gói bao bì mil (như vật liệu rào chắn, khẩu phần ăn, túi chống tĩnh điện và các thùng vận chuyển khác nhau) tương tự như các vật liệu đóng gói bằng cấp thương mại, nhưng phải tuân thủ các yêu cầu về chất lượng và hiệu suất nghiêm ngặt.</p>\n\n<p style=\"text-align:justify\">Tính đến năm 2003, ngành đóng gói chiếm khoảng hai phần trăm tổng sản phẩm quốc gia ở các nước phát triển. Khoảng một nửa thị trường này liên quan đến bao bì thực phẩm.</p>\n\n<p style=\"text-align:justify\">&nbsp;</p>\n', 'lich-su-bao-bi', 'Lịch sử bao bì', 'in bao bì, in bao bì giá rẻ, in bao bì số lượng ít, in bao bì nilon, in bao bi túi xốp, in bao bì túi hột xoài,', 'Bao bì là công nghệ bao bọc hoặc bảo vệ các sản phẩm để phân phối, lưu trữ, bán và sử dụng. Bao bì cũng đề cập đến quá trình thiết kế, đánh giá và sản xuất bao bì', 0, '1524326012', 'uploads/san-pham/lich-su-bao-bi-YaH.jpg'),
(60, NULL, 1, 1, 0, 1, 2, 'Bao bì màng ghép phức hợp là gì?', 'Màng nhựa phức hợp hay còn gọi là màng ghép là một loại vật liệu nhiều lớp mà ưu điểm là nhận được những tính chất tốt của các loại vật liệu thành phần.', '<p style=\"text-align:justify\">Màng nhựa phức hợp hay còn gọi là màng ghép là một loại vật liệu nhiều lớp mà ưu điểm là nhận được những tính chất tốt của các loại vật liệu thành phần.</p>\n\n<p style=\"text-align:justify\">- Người ta đã sử dụng cùng lúc (ghép) các loại vật liệu khác nhau để có được một loại vật liệu ghép với các tính năng được cải thiện nhằm đáp ứng các yêu cầu <a href=\"http://inbaobiquoctien.com\"><strong>in bao bì</strong></a>. Khi đó chỉ một tấm vật liệu vẫn có thể cung cấp đầy đủ tất cả các tính chất như: tính cản khí, hơi ẩm, độ cứng, tính chất in tốt, tính năng chế tạo dễ dàng, tính hàn tốt… như yêu cầu đã đặt ra.</p>\n\n<p style=\"text-align:center\"><img alt=\"Inbaobiquoctien-Bao-bi-mang-ghep-phuc-hop-la-gi\" src=\"http://inbaobiquoctien.com/uploads/Images/tin-tuc/inbaobiquoctien-bao-bi-mang-ghep-phuc-hop-la-gi.jpg\" /></p>\n\n<p style=\"text-align:justify\">- Về mặt kỹ thuật vật liệu ghép được ứng dụng thường xuyên, chúng đạt được các yêu cầu kỹ thuật, các yêu cầu về tính kinh tế, tính tiện dụng thích hợp cho từng loại bao bì, giữ gìn chất lượng sản phẩm bên trong bao bì, giá thành rẻ, vô hại ….</p>\n\n<p style=\"text-align:justify\">- Cấu trúc bao bì có màng ghép phức hợp:</p>\n\n<p style=\"text-align:justify\">&nbsp; + Các polymer khác nhau được sử dụng tùy thuộc vào vai trò của chúng như là lớp cấu trúc, lớp liên kết, lớp cản, lớp hàn.</p>\n\n<p style=\"text-align:justify\">&nbsp; + Lớp cấu trúc: đảm bảo các tính chất cơ học cần thiết, tính chất in dễ dàng và thường có cả tính chống ẩm.</p>\n\n<p style=\"text-align:justify\">&nbsp; + Các lớp liên kết: là những lớp keo nhiệt dẻo (ở dạng đùn) được sử dụng để kết hợp các loại vật liệu có bản chất khác nhau.</p>\n\n<p style=\"text-align:justify\">&nbsp; + Các lớp cản: được sử dụng để có được những yêu cầu đặc biệt về khả năng cản khí và giữ mùi : PET, PA, AL, MCPP, MPET.</p>\n\n<p style=\"text-align:justify\">&nbsp; + Các lớp vật liệu hàn: thường dùng là PE và hỗn hợp LLDPE.</p>\n\n<p style=\"text-align:center\"><img alt=\"Inbaobiquoctien-Bao-bi-mang-ghep-phuc-hop-la-gi-1\" src=\"http://inbaobiquoctien.com/uploads/Images/tin-tuc/inbaobiquoctien-bao-bi-mang-ghep-phuc-hop-la-gi-1.jpg\" /></p>\n\n<p style=\"text-align:justify\">&nbsp;- Nguyên liệu sử dụng:</p>\n\n<p style=\"text-align:justify\">&nbsp;Màng OPP, PET, PA, CPP, LLDPE, AL (nhôm), MCPP, MPET, ...</p>\n\n<p style=\"text-align:justify\">Trong đó :</p>\n\n<p style=\"text-align:justify\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;+ Chất liệu màng in được là : OPP, PET, PA, CPP, ...</p>\n\n<p style=\"text-align:justify\">&nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp; &nbsp;+ Chất liệu màng để ghép bên trong là CPP, LLDPE, AL (nhôm), MCPP, MPET</p>\n\n<p style=\"text-align:justify\">&nbsp;</p>\n', 'bao-bi-mang-ghep-phuc-hop-la-gi', 'Inbaobiquoctien-Bao-bi-mang-ghep-phuc-hop-la-gi', 'in bao bì màng ghép, in bao bì, in túi xốp, in túi pe, in túi thời trang, in bao bì số lượng ít', 'Màng nhựa phức hợp hay còn gọi là màng ghép là một loại vật liệu nhiều lớp mà ưu điểm là nhận được những tính chất tốt của các loại vật liệu thành phần.', 0, '1524325906', 'uploads/san-pham/bao-bi-mang-ghep-phuc-hop-la-gi-Rgy.jpg'),
(61, NULL, 1, 1, 0, 6, 2, 'Phương pháp in bao bì nilon giá rẻ', 'Bằng phương pháp in lưới (in lụa), là phương pháp in ấn ra đời sớm nhất trong công nghiệp in túi nilon (kể cả túi giấy)', '<p>Hãy cùng <a href=\"http://inbaobiquoctien.com\"><strong>In Bao Bì Quốc Tiến</strong></a> tìm hiểu phương pháp in lưới được thực hiện như thế nào. vì sao lại có giá thành rẻ và tối ưu cho các shop và cửa hàng nhỏ.</p>\n\n<h4>- In lưới (in lụa) là gì ?</h4>\n\n<p>Là phương pháp in ấn ra đời sớm nhất trong công nghiệp <a href=\"http://inbaobiquoctien.com\"><strong>in túi nilon</strong></a> (kể cả túi giấy). Tên gọi của phương pháp in này do các thợ in đặt ra khi bản in được làm từ tơ lụa. Cho tới ngày nay, khi bản in được thay thế bằng các chất liệu khác và bắt đầu gọi là in lưới.&nbsp;</p>\n\n<p>Đây là phương thức in quảng cáo trên túi&nbsp;nilon (<a href=\"http://inbaobiquoctien.com\"><strong>in túi xốp</strong></a>) cũng như xây dựng thương hiệu phổ biến trong ngành quảng cáo trên&nbsp;bao bì. Toàn bộ quy trình đều thực hiện thủ công, trừ khâu thiết kế hình ảnh và maket.</p>\n\n<p style=\"text-align:center\"><img alt=\"Inbaobiquoctien - Kỹ thuật in lụa giá rẻ trên túi nilon\" src=\"http://inbaobiquoctien.com/uploads/Images/tin-tuc/inbaobiquoctien-ky-thuat-in-luoi-gia-re.jpg\" /></p>\n\n<h4>- Quy trình in lưới thủ công trên các loại túi và các thiết bị</h4>\n\n<p>Như hình bên trên, có thể thấy rõ thiết bị để in lụa là rất đơn giản, gồm 4 thành phần chính. Từ 1 tới 4 : Bàn in - khuôn in - tay gạt - Chất nhuộn màu và hồ in.</p>\n\n<p>Hình ảnh&nbsp;(A) là bản maket thiết kế được đặt bên trên bản in, sau mỗi lần tay gạt mực, hình ảnh đó sẽ được in xuống bề mặt túi nilon đặt sẵn bên dưới (B). Các túi nilon sau khi in sẽ phải được phơi khô trong một khoảng thời gian nhất định (thường là rất nhanh).</p>\n\n<p>Ưu điểm của phương pháp in lụa khi in túi ni lông:<br />\n- Phương pháp <a href=\"http://inbaobiquoctien.com\"><strong>in bao bì&nbsp;nilon</strong></a> chi phí thấp.<br />\n- Thích hợp với số lượng in túi nilon ít hoặc nhỏ (khoảng vài trăm, vài nghìn chiếc).<br />\n- Có thể in đầy đủ thông tin cửa hàng và shop thời trang lên hai mặt của&nbsp;túi.<br />\n- Cũng có thể in được nhiều màu sắc, logo.<br />\n- Thời gian in nhanh chóng.<br />\n- Chất lượng in túi đẹp.</p>\n\n<p>&nbsp;</p>\n', 'phuong-phap-in-bao-bi-nilon-gia-re', 'Phương pháp in bao bì nilon giá rẻ', 'in bao bì nilon giá rẻ, in bao bi ni lông, in bao bì cà phê, in bao bì số lượng ít, in bao bì sản phẩm, in bao bì ni lông tphcm', 'Bằng phương pháp in lưới (in lụa), là phương pháp in ấn ra đời sớm nhất trong công nghiệp in túi nilon (kể cả túi giấy)', 0, '1527870065', 'uploads/san-pham/phuong-phap-in-bao-bi-nilon-gia-re-mUI.jpg'),
(62, NULL, 1, 1, 0, 1, 2, 'In trục ống đồng', 'Kỹ thuật in ống đồng hiện nay được xem là phương pháp in hiện đại áp dụng cho các công nghệ in bao bì, in bao nhựa, in túi nilon…', '<p style=\"text-align:justify\">Kỹ thuật <a href=\"http://inbaobiquoctien.com\"><strong>in ống đồng</strong></a> hiện nay được xem là phương pháp in hiện đại áp dụng cho các công nghệ in bao bì, in bao nhựa, <a href=\"http://inbaobiquoctien.com\"><strong>in túi nilon</strong></a>… Máy in ống đồng có thể trên mọi chất liệu màng, tráng ghép phức hợp, cung cấp đến quý khách hàng những sản phẩm cao cấp.</p>\n\n<p style=\"text-align:justify\">In ống đồng về nguyên lý nó là phương pháp in lõm, tức là trên khuôn in, hình ảnh hay chữ viết (gọi là phần tử in) được khắc lõm vào bề mặt kim lọai. Khi in sẽ có 2 quá trình: Mực (dạng lỏng) được cấp lên bề mặt khuôn in, dĩ nhiên mực cũng sẽ tràn vào các chỗ lõm của phần tử in, sau đó một thiết bị gọi là dao gạt sẽ gạt mực thừa ra khỏi bề mặt khuôn in, và khi ép in mực trong các chỗ lõm dưới áp lực in sẽ truyền sang bề mặt vật liệu.</p>\n\n<p style=\"text-align:center\"><img alt=\"In Bao Bì Quốc Tiến - In trục ống đồng.\" src=\"http://inbaobiquoctien.com/uploads/Images/san-pham/inbaobiquoctien-in-truc-ong-dong.jpg\" /></p>\n\n<p style=\"text-align:justify\">Mực ở phần tử không in được gạt sạch bởi dao gạt mực, khi đó mực chỉ còn chứa trong các lỗ (phần tử in), và mực từ các lỗ này truyền vào bề mặt vật liệu in nhờ áp lực in cao và bám vào vật liệu. Vì mực in ống đồng có độ nhớt thấp (khoảng 0,1 Pa.s), nên sau mỗi đơn vị in đều có đơn vị sấy</p>\n\n<p style=\"text-align:justify\">Để tái tạo tầng thứ, các lỗ trên trục có các dạng sau: Độ sâu lỗ thay đổi nhưng diện tích lỗ không đổi (phương pháp ăn mòn hoá học), độ sâu và diện tích lỗ đều thay đổi (khắc điện tử) – phương pháp này cho phép phục chế hình ảnh chất lượng rất cao.</p>\n\n<p style=\"text-align:justify\">Khả năng phục chế ở phương pháp in ống đồng lớn hơn, có độ chính xác cao hơn so với phương pháp in typo và offset.</p>\n\n<p style=\"text-align:justify\">Độ bền của trục in lớn (nếu bảo quản tốt có thể sử dụng để in tái bản), giá thành của trục in cao vì thế nó đòi hỏi phải có số lượng in rất lớn (từ 500.000 vòng tua trở lên). Với các máy in ống đồng hiện đại, tốc độ in đạt trên 200m/phút</p>\n\n<p style=\"text-align:justify\">&nbsp;</p>\n', 'in-truc-ong-dong', 'In trục ống đồng', 'in trục ống đồng, in bao bì nilon, in bao bì xốp, kỹ thuật in trục ống đồng, in bao bì giá rẻ, in túi xốp thời trang', 'Kỹ thuật in ống đồng hiện nay được xem là phương pháp in hiện đại áp dụng cho các công nghệ in bao bì, in bao nhựa, in túi nilon…', 0, '1524325841', 'uploads/san-pham/in-truc-ong-dong-3-qjS.jpg'),
(63, NULL, 1, 1, 0, 6, 1, 'Giới thiệu', 'Công ty In Bao Bì Quốc Tiến là nơi có nhiều kinh nghiệm trong lĩnh vực in ấn: In túi xốp, in túi nilon, túi xốp ngân hàng, in túi xốp siêu thị, bao bì thời trang, bao bì thực phẩm, túi giấy, hộp giấy...\nHiện nay công ty chúng tôi còn mở rộng nhận dịch vụ in gia công trên mọi chất liệu như: Hộp nhưa, vali,...\nĐồng thời chuyên cung cấp các loại bao chất liệu HD, PE, PP, OPP, bao tráng màng PP, PE... bao phân bón, thức ăn thủy hải sản...\nMục tiêu mà công ty chúng tôi hướng tới để phục vụ quý khách ', '<p style=\"text-align:justify\"><strong>Công ty TNHH SX In Ấn Bao Bì Quốc Tiến</strong> xin cảm ơn Quý khách hàng trong suốt thời gian qua đã giành chút thời gian để tham khảo, góp ý kiến để công ty chúng tôi mỗi ngày phát triển hơn và cũng như tin dùng và đặt hàng sản phẩm của công ty chúng tôi.</p>\n\n<p style=\"text-align:justify\">Đối với thị trường phát triển hiện nay thì nhu cầu <a href=\"http://inbaobiquoctien.com\"><strong>in bao bì</strong></a> là một nhu cầu rất thiết yếu, in bao bì hiện nay không còn đơn thuần là một sản phẩm dùng để chứa đựng hàng hóa, vật dụng, sản phẩm hay vận chuyển hàng hóa, mà nó còn có một vai trò quan trọng hơn trong việc truyền tải, cung cấp thông tin sản phẩm, tiếp thị và quảng bá thương hiệu của công ty bạn đến cộng đồng người tiêu dùng một cách nhanh chóng và&nbsp;hiệu quả với chi phí thấp. Điều này cũng là một chiến lược marketing hiệu quả giúp công ty của quý khách hàng tạo ra một lượng khách hàng vô cùng lớn.</p>\n\n<p style=\"text-align:justify\">Các mảng hoạt động chính mà công ty <strong>In Ấn Bao Bì Quốc Tiến</strong>:</p>\n\n<ul style=\"margin-left:40px\">\n	<li style=\"text-align:justify\"><a href=\"http://inbaobiquoctien.com/in-tui-xop-thoi-trang.html\"><strong>In túi xốp thời trang</strong></a></li>\n	<li style=\"text-align:justify\"><a href=\"http://inbaobiquoctien.com/in-tui-xop-ngan-hang.html\"><strong>In túi xốp ngân hàng</strong></a></li>\n	<li style=\"text-align:justify\"><a href=\"http://inbaobiquoctien.com/in-tui-dung-my-pham.html\"><strong>In túi đựng mỹ phẩm</strong></a></li>\n	<li style=\"text-align:justify\"><a href=\"http://inbaobiquoctien.com/in-tui-xop-sieu-thi.html\"><strong>In túi xốp siêu thị</strong></a></li>\n	<li style=\"text-align:justify\"><a href=\"http://inbaobiquoctien.com/in-tui-dung-cafe.html\"><strong>In túi đựng cà phê</strong></a></li>\n	<li style=\"text-align:justify\"><a href=\"http://inbaobiquoctien.com/in-tui-zipper-mang-ghep.html\"><strong>In túi zipper màng ghép</strong></a></li>\n	<li style=\"text-align:justify\"><a href=\"http://inbaobiquoctien.com/in-tui-uom-cay.html\"><strong>In túi ươm cây</strong></a></li>\n	<li style=\"text-align:justify\"><a href=\"http://inbaobiquoctien.com/in-tui-pe.html\"><strong>In túi PE</strong></a></li>\n	<li style=\"text-align:justify\"><a href=\"http://inbaobiquoctien.com/in-gia-cong-tren-nhieu-chat-lieu.html\"><strong>In gia công trên nhiều chất liệu</strong></a></li>\n	<li style=\"text-align:justify\"><strong>Cung cấp và phân phối túi nilon (túi xốp)</strong></li>\n</ul>\n\n<p style=\"text-align:justify\">Đến với <strong>Công ty TNHH SX In Ấn Bao Bì Quốc Tiến</strong> chúng tôi quý khách hàng sẽ được:</p>\n\n<ul style=\"margin-left:40px\">\n	<li style=\"text-align:justify\"><span style=\"font-size:14px\"><span style=\"font-family:arial,helvetica,sans-serif\"><span style=\"color:#FF0000\"><strong><em>Tư vấn tận tình</em></strong></span> </span></span></li>\n	<li style=\"text-align:justify\"><span style=\"font-size:14px\"><span style=\"font-family:arial,helvetica,sans-serif\"><span style=\"color:#FF0000\"><em><strong>Thiết kế miễn phí</strong></em></span></span></span></li>\n	<li style=\"text-align:justify\"><span style=\"font-size:14px\"><span style=\"font-family:arial,helvetica,sans-serif\"><em><strong><span style=\"color:#FF0000\">Hỗ trợ giao hàng tận nơi</span></strong></em></span></span></li>\n	<li style=\"text-align:justify\"><span style=\"font-size:14px\"><span style=\"font-family:arial,helvetica,sans-serif\"><em><strong><span style=\"color:#FF0000\">Thời gian giao hàng sớm theo nhu cầu khách hàng</span></strong></em></span></span></li>\n</ul>\n\n<p style=\"text-align:justify\"><br />\nVới <strong>chữ Tín</strong> đặt lên hàng đầu cùng với phong cách tư vấn phục vụ tận tình với khách hàng thì <strong>Công ty TNHH SX In Ấn Bao Bì Quốc Tiến</strong> tin rằng sẽ đem đến sự tin tưởng và nhận được sự hài lòng nhất của khách hàng dành cho công ty.</p>\n\n<p>&nbsp;</p>\n', 'gioi-thieu', 'Giới thiệu - In Bao Bì Quốc Tiến', 'In Bao Bì Quốc Tiến, in bao bì, in túi xốp, in túi xốp giá rẻ, in túi nilon giá rẻ, in bao bì giá rẻ,', 'Công ty In Bao Bì Quốc Tiến là nơi có nhiều kinh nghiệm trong lĩnh vực in ấn: In túi xốp, in túi nilon, túi xốp ngân hàng, in túi xốp siêu thị, bao bì thời trang, bao bì thực phẩm, túi giấy, hộp giấy...', 0, '1528213111', 'uploads/san-pham/gioi-thieu-H2z.jpg'),
(64, NULL, 0, 1, 0, 1, 3, 'Dịch vụ 1', '', '<p>Updating...</p>\n', 'dich-vu-1', NULL, '', '', 0, '1522721499', '0'),
(67, NULL, 1, 1, 0, 1, 2, 'Công dụng của in túi nilon trong cuộc sống', 'Túi nylon là một loại túi nhựa rất bền, dẻo, mỏng, nhẹ và tiện dụng. Ngày nay, in túi nilon được dùng rất nhiều để đóng gói thực phẩm, bột giặt, bảo quản nước đá,...', '<p style=\"text-align:justify\">Cũng thật dễ dàng để bỏ qua những ưu điểm của bao bì do có một số quan niệm rằng chúng không thân thiện với môi trường. Nhưng thực tế thì bao bì rất quan trọng quanh ta. Ngoài những ảnh hưởng tới hệ sinh thái thì nó mang lại nhiều lợi ích cho các siêu thị, nhà bán lẻ, người tiêu dùng thậm chí là môi trường.</p>\n\n<p style=\"text-align:justify\"><strong>Túi nylon</strong> là một loại túi nhựa rất bền, dẻo, mỏng, nhẹ và tiện dụng. Ngày nay, nó được dùng rất nhiều để đóng gói thực phẩm, bột giặt, bảo quản nước đá, các loại chế phẩm hoá học hay đựng những phế liệu nhỏ, rác thải,...</p>\n\n<p style=\"text-align:center\"><img alt=\"In Bao Bì Quốc Tiên - Công dụng của in túi nilon trong cuộc sống\" src=\"http://inbaobiquoctien.com/uploads/Images/tin-tuc/20-april-2018/inbaobiquoctien-cong-dung-cua-tui-nilon.jpg\" /></p>\n\n<p style=\"text-align:justify\">Do tính tiện lợi, túi ni lông đã trở thành một loại bao bì được ưa chuộng ở nhiều nước và cả ở Việt Nam. Giờ đây, khi mua bất kỳ đồ vật gì, người mua luôn được phục vụ túi ni lông để bọc, gói, đựng, lót. Mua cá mua rau túi ni lông; mua sách, vở túi ni lông; Mua bánh trái, quà cáp, thuốc men túi ni lông... Túi ni lông còn được dùng đựng canh, đựng nước mía, đựng dưa muối, cà muối, đựng các loại thực phẩm dạng lỏng để mang đi xa. Cuộc sống có vẻ sẽ khó khăn nếu như một ngày nào đó không còn túi ni lông.</p>\n\n<h4 style=\"text-align:justify\">Ưu điểm của túi nilon đối với các cửa hàng, tạp hóa, siêu thị</h4>\n\n<p style=\"text-align:justify\">Các nhà bán lẻ đã ủng hộ túi nhựa từ khi chúng ra đời khoảng 50 năm trước. Các ưu điểm chính của các túi nhựa đem lại là chi phí rẻ, dễ sử dụng, và thuận tiện cho lưu trữ và&nbsp;đóng gói.</p>\n\n<p style=\"text-align:justify\">Giá bán túi nilon rẻ hơn, khiến chúng ta có thể mua được số lượng lớn với chi phí rất thấp. Ngược lại, giá bán túi giấy thường cao hơn rất nhiều. Còn với túi vải tái chế, thân thiện với môi trường thành một mối quan tâm rộng rãi hơn, nhưng chi phí khá là đắt đỏ. Với khối lượng lớn, giá thành rẻ là ưu điểm rõ ràng nhất mà <strong>túi nilon</strong> mang lại cho các cửa hàng, tạp hóa, siêu thị,... và lợi nhuận của họ.</p>\n\n<p style=\"text-align:center\"><img alt=\"In Bao Bì Quốc Tiên - Công dụng của in túi nilon trong cuộc sống 1\" src=\"http://inbaobiquoctien.com/uploads/Images/tin-tuc/20-april-2018/inbaobiquoctien-cong-dung-cua-tui-nilon-1.jpg\" /></p>\n\n<p style=\"text-align:justify\">Ngoài ra, túi nilon sẽ dễ dàng đóng gói hơn so với túi giấy, dù là không đáng kể. Túi ni lông cũng đòi hỏi không gian ít hơn so với túi giấy, cả trong kho lưu trữ và tại các quầy thu ngân. Ngoài ra, túi nhựa có trọng lượng nhẹ hơn túi giấy cỡ mười lần hoặc hơn, nên việc vận chuyển sẽ dễ dàng hơn. Túi tái sử dụng sẽ chiếm nhiều không gian nhất, và&nbsp;trọng lượng của chúng thường nặng hơn đáng kể hơn so với túi nhựa hoặc giấy.</p>\n\n<h4 style=\"text-align:justify\">Ưu điểm của túi nilon đối với người tiêu dùng</h4>\n\n<p style=\"text-align:justify\">Cũng giống như các nhà bán lẻ đã tìm thấy túi nhựa là một lựa chọn tốt hơn so với túi giấy, do đó <strong>túi nilông</strong> cũng được nhiều người tiêu dùng. Dù vẫn có một số tác hại tới môi trường thì túi nilon vẫn đem lại nhiều lợi ích thiết thực:</p>\n\n<ul>\n	<li style=\"text-align:justify\">Túi nilon có độ bền cao hơn so với túi giấy, có thể chống thấm, dễ dàng vận chuyển, nhất là trong trời mưa.</li>\n	<li style=\"text-align:justify\"><a href=\"http://inbaobiquoctien.com\"><strong>In túi nilon</strong></a>&nbsp;được sử dụng cho nhiều mục đích khác nhau, với nhiều người sử dụng chúng như lót thùng đựng rác hoặc để đóng gói và lưu trữ các đồ dùng linh tinh. Bao bì túi nhựa có thể tái sử dụng, có thể rửa sạch, không như túi giấy.</li>\n	<li style=\"text-align:justify\">Túi nhựa nói chung có nhiều chủng loại, mẫu mã đa dạng, phù hợp với rất nhiều mục đích sử dụng.</li>\n	<li style=\"text-align:justify\">Giá thành rẻ và dễ sử dụng.</li>\n</ul>\n\n<p style=\"text-align:justify\">Không phải ngẫu nhiên mà hàng năm ngành sản xuất túi nilon tăng nhanh với số lượng cực lớn, rất nhiều chủng loại, mẫu mã đa dạng và phong phú.</p>\n\n<h4 style=\"text-align:justify\">Ưu điểm của túi nilon đối với&nbsp;môi trường.</h4>\n\n<p style=\"text-align:justify\">Tuy túi nilon cũng mang lại nhiều tác hại lớn đối với môi trường xung quanh chúng ta. Nhưng nếu con người có ý thức hơn thì túi nylon vẫn có lợi cho môi trường ví dụ như: túi nilon có thể đựng rác, các chất thải không gây có mùi,… Túi nylon được thu gom tái chế lại không thải ra môi trường thì cũng không ảnh hưởng gì.</p>\n\n<p style=\"text-align:center\"><img alt=\"In Bao Bì Quốc Tiên - Công dụng của in túi nilon trong cuộc sống 2\" src=\"http://inbaobiquoctien.com/uploads/Images/tin-tuc/20-april-2018/inbaobiquoctien-cong-dung-cua-tui-nilon-2.jpg\" /></p>\n\n<p style=\"text-align:justify\">Có thể nói, hiện nay túi nilon đã được sử dụng rất rộng rãi ngoài thị trường, túi mua sắm trong các siêu thị hay trung tâm thương mại, túi nilon đựng hàng hoá thực phẩm trong các khu chợ, túi nilon đựng bảo quản thức ăn trong gia đình...Hay thậm chí, các công ty còn cho <a href=\"http://inbaobiquoctien.com\"><strong>in&nbsp;túi nilon</strong></a> để thực hiện những chiến dịch marketing, quảng bá thương hiệu cho công ty mình.</p>\n\n<p style=\"text-align:justify\">&nbsp;</p>\n', 'cong-dung-cua-in-tui-nilon-trong-cuoc-song', 'Công dụng của in túi nilon trong cuộc sống', 'in túi nilon, in bao bì xốp, in túi xốp thời trang, in túi ni lông, in túi nilong giá rẻ, in túi nilon số lượng ít,', 'Túi nylon là một loại túi nhựa rất bền, dẻo, mỏng, nhẹ và tiện dụng. Ngày nay, in túi nilon được dùng rất nhiều để đóng gói thực phẩm, bột giặt, bảo quản nước đá,...', 0, '1524325664', 'uploads/san-pham/cong-dung-cua-in-tui-nilon-trong-cuoc-song-pWR.jpg'),
(65, NULL, 1, 1, 0, 1, 2, 'Túi OPP so với túi PP', '\"Túi OPP khác túi PP ở điểm gì?\" là một trong những thắc mắc thường gặp của nhiều khách hàng trước khi chọn mua. In Bao Bì Quốc Tiến xin câu trả lời chi tiết để các bạn có thể tham khảo.', '<p style=\"text-align:justify\">Túi OPP khác túi PP ở điểm gì?&nbsp;là một trong những thắc mắc thường gặp của nhiều khách hàng trước khi chọn mua. <a href=\"http://inbaobiquoctien.com\"><strong>In Bao Bì Quốc Tiến</strong></a>&nbsp;xin câu trả lời chi tiết để các bạn có thể tham khảo.</p>\n\n<h3 style=\"text-align:justify\">Khác biệt về nguyên liệu sản xuất túi OPP và PP</h3>\n\n<h4 style=\"text-align:justify\">- Túi PP (Tên tiếng Anh: Polypropylene)</h4>\n\n<p>&nbsp;</p>\n\n<p style=\"text-align:center\"><img alt=\"In Bao Bì Quốc Tiến - Túi PP trong.\" src=\"http://inbaobiquoctien.com/uploads/Images/tin-tuc/14-april-2018/inbaobiquoctien-tui-pp-trong.jpg\" style=\"opacity:0.9; text-align:justify\" /></p>\n\n<p style=\"text-align:justify\">Là loại túi được sản xuất túi màng PP với mật độ Hạt nhựa PP thường chỉ có 0.91 g / cm3 (nhỏ hơn nước) cùng với các loại hạt phụ gia khác, túi PP khá dẻo có sức chịu nhiệt tốt hơn, có khả năng chịu mài mòn tốt. Nhược điểm của túi PP là dễ gây ra sự ô nhiễm quá trình tái sử dụng, đồng thời dễ bị lão hóa, dễ bị biến dạng.</p>\n\n<h4 style=\"text-align:justify\">- Túi OPP (Tên tiếng Anh: Oriented PolyPropylene)</h4>\n\n<p>&nbsp;</p>\n\n<p style=\"text-align:center\"><img alt=\"In Bao Bì Quốc Tiến - Túi PP trong 1\" src=\"http://inbaobiquoctien.com/uploads/Images/tin-tuc/14-april-2018/inbaobiquoctien-tui-nilon-pp-1.jpg\" /></p>\n\n<p style=\"text-align:justify\">Loại túi cấu tạo từ 2 lớp màng PolyPropylene có định hướng thằng nhờ đó tạo ra được lớp màng nilon với lực kéo cao, sắc nét nhưng khá cứng và giòn. Ứng dụng sản xuất màng OPP với phạm vi sử dụng rộng, không độc hại, không mùi vị, và an toàn với môi trường.</p>\n\n<h4 style=\"text-align:justify\">Về tính vật lý, túi OPP khác túi PP:</h4>\n\n<p style=\"text-align:justify\">Một đặc điểm dễ nhận thấy màng PP có độ mềm dẻo tốt hơn OPP. Vì vậy, túi PP thường dùng làm túi đựng đường, bánh kẹo thực phẩm - đựng link kiện hoặc làm lót trong bao bì công nghiệp - lót trong các thùng cartron hay nhựa.</p>\n\n<p style=\"text-align:justify\">&nbsp;</p>\n\n<p style=\"text-align:center\"><img alt=\"In Bao Bì Quốc Tiến - Túi OPP\" src=\"http://inbaobiquoctien.com/uploads/Images/tin-tuc/14-april-2018/inbaobiquoctien-tui-opp.jpg\" /></p>\n\n<p style=\"text-align:justify\">Ngược lại, túi OPP cứng cáp hơn, chịu được lực co giãn tốt hơn nên rất khó bị rách hỏng. Cũng vì vậy, túi OPP được sử dụng trong nhiều lĩnh vực hơn, phù hợp đựng nhiều loại hàng hoá hơn : túi OPP thường thấy đựng quần áo - màng ghép hộp giấy,...</p>\n\n<p style=\"text-align:justify\">&nbsp;</p>\n\n<p style=\"text-align:center\"><img alt=\"In Bao Bì Quốc Tiến - Túi OPP 1\" src=\"http://inbaobiquoctien.com/uploads/Images/tin-tuc/14-april-2018/inbaobiquoctien-tui-opp-1.jpg\" /></p>\n\n<p style=\"text-align:justify\">Tiếp theo, túi OPP trong suốt và có độ bóng đẹp hơn túi PP rất nhiều. Chính vì vậy, khi cần in túi OPP sẽ cho độ sắc nét cao hơn nhiều so với PP. Túi OPP trong suốt nên thường dùng làm túi đựng tài liệu, túi đựng quần áo,... Trong công nghiệp, túi OPP hay dùng để đựng túi, văn phòng phẩm,...</p>\n\n<p style=\"text-align:justify\">&nbsp;</p>\n', 'tui-opp-so-voi-tui-pp', '', 'in túi PP, in túi OPP, in túi PE, in túi xốp, in túi PP giá rẻ, in túi OPP giá rẻ, in túi xốp giá rẻ,', '\"Túi OPP khác túi PP ở điểm gì?\" là một trong những thắc mắc thường gặp của nhiều khách hàng trước khi chọn mua. In Bao Bì Quốc Tiến xin câu trả lời chi tiết để các bạn có thể tham khảo.', 0, '1524325810', 'uploads/san-pham/tui-opp-so-voi-tui-pp-qtv.jpg'),
(66, NULL, 1, 1, 0, 1, 2, 'Các loại túi nilon phổ biến trên thị trường hiện nay', 'Bao bì xốp hay túi nilon (túi ni lông) là vật dụng không thể thiếu trong cuộc sống. Túi nilon hiện này rất đa dạng nhiều chủng loại, có tên gọi và công dụng khác nhau', '<p style=\"text-align:justify\"><strong>Bao bì</strong>&nbsp;hay <strong>túi nilon</strong> (túi ni lông) là vật dụng không thể thiếu trong cuộc sống. Túi nilon hiện này rất đa dạng nhiều chủng loại, có tên gọi và công dụng khác nhau. Bạn đang sở hữu một shop thời trang, bạn cần một túi nilon đẳng cấp đựng sản phẩm, hay bán đang kinh doanh trà sữa cần một túi đựng đẹp và tiện lợi, hay ít nhất là mang thương hiệu của cửa hàng bạn trên đó,… <a href=\"http://inbaobiquoctien.com\"><strong>in túi nilon</strong></a> rất đa dạng có thể giúp bạn giải quyết vấn đề này với chi phí marketing thấp.<br />\n<strong>Túi nilon</strong> được làm từ sợi nhựa tổng hợp có tính chất dẻo, mỏng, nhẹ, và rất bền, có thể tái chế được. Các loại túi nilon thường gặp nhất : túi xốp, túi t-shirt, túi roll , túi Zipper, túi die-cut,&nbsp; túi HDPE, túi LDPE, túi PP, túi OPP,…<br />\nĐể nhận dạng <u><strong>túi nilon</strong></u> người ta thường chia làm 2 loại nhận dạng. Đó là nhận dạng theo đặc điểm và nhận dạng theo công dụng cấu tạo.</p>\n\n<h3 style=\"text-align:justify\">I. Nhận dạng theo đặc điểm.</h3>\n\n<p style=\"text-align:justify\">Có 3 loại thường gặp : túi trơn , túi Die-cut, túi T-shirt (hay còn gọi là túi shopping – túi siêu thị), túi Roll cuộn, và túi zipper.</p>\n\n<h4 style=\"text-align:justify\">1. Túi nilon Die-cut:</h4>\n\n<p style=\"text-align:center\"><img alt=\"In Bao Bì Quốc Tiến - Các loại túi nilon phổ biết trên thị trường hiện nay\" src=\"http://inbaobiquoctien.com/uploads/Images/tin-tuc/19-april-2018/tui-nilon-die-cut.jpg\" /></p>\n\n<p style=\"text-align:justify\">Đây là loại túi thường gặp tại các cửa hàng bán sỉ lẻ, siêu thị… thường gọi là túi trơn (túi phẳng) có đục lỗ (die-cut bag) để dễ dàng cho việc cầm nắm xách sản phẩm. Ngoài ra còn loại túi không có quai, miệng bằng, mỏng, dùng nhiêu trong chợ như đựng (chè, thực phẩm,&nbsp; bánh kẹo…), túi PE trong,….</p>\n\n<h4 style=\"text-align:justify\">2. Túi nilon T-shirt</h4>\n\n<p style=\"text-align:center\"><img alt=\"In Bao Bì Quốc Tiến - Các loại túi nilon phổ biết trên thị trường hiện nay 1\" src=\"http://inbaobiquoctien.com/uploads/Images/tin-tuc/19-april-2018/tui-nilon-co-quai.jpg\" /></p>\n\n<p style=\"text-align:justify\">Đúng với tên gọi chiếc túi này giống như chiếc ao dây, có 2 quai còn được gọi là túi siêu thị, túi chủ yếu làm từ chất liệu HDPE và LDPE. Thường sử dụng trong các siêu thị và được in quảng cáo một mặt. Túi nilon nhiều màu thường được sử dụng nhiều để che sản phẩm bên trong.</p>\n\n<h4 style=\"text-align:justify\">3. Túi nilon dạng roll cuộn</h4>\n\n<p style=\"text-align:center\"><img alt=\"In bao bì Quốc Tiên - Túi nilon dạng roll cuộn\" src=\"http://inbaobiquoctien.com/uploads/Images/tin-tuc/19-april-2018/tui-nilon-roll.jpg\" /></p>\n\n<p style=\"text-align:justify\">Túi này này thường được cuộn lại từng cuộn có lõi to nhỏ tùy vào kích cỡ. Thường dùng để đựng rác, đựng thực phẩm trong các quầy đông lạnh, trung tâm thương mại. Túi có 2 loại: túi miệng phẳng và túi có 2 quai.</p>\n\n<h4 style=\"text-align:justify\">4. Túi zipper&nbsp;</h4>\n\n<p style=\"text-align:center\"><img alt=\"In bao bì Quốc Tiên - Túi zipper\" src=\"http://inbaobiquoctien.com/uploads/Images/tin-tuc/19-april-2018/tui-zipper.jpg\" /></p>\n\n<p style=\"text-align:justify\">Là loại túi có khóa kéo (vuốt mép). Có ưu điểm, kín khí, an toàn, sản phẩm bên trong khó rớt ra. Loại túi này thường được làm bằng nhựa PE với độ bên cao, nên thường sử dụng để đựng linh kiện điện tử, thuốc trong y tế… hay túi đựng trà sữa,…</p>\n\n<h3 style=\"text-align:justify\">II. Nhận dạng theo chất liệu cấu tạo</h3>\n\n<p style=\"text-align:justify\">Theo vật liệu cấu tạo mà có thể chia làm nhiều loại túi, nhưng thường gặp các loại sau:</p>\n\n<h4 style=\"text-align:justify\">1. Túi nilon HDPE và LDPE:</h4>\n\n<p style=\"text-align:justify\">Túi nilon làm từ 2 chất liệu này có đặc điểm chung như: có độ trong suốt, độ bóng mịn bề mặt, chống thấm nước, nhưng chống thấm thấu khi kém.</p>\n\n<p style=\"text-align:justify\">– Túi HDPE( High Density Polyethylene) hay túi xốp:</p>\n\n<p style=\"text-align:justify\">Túi HD in thương hiệu Túi HDPE hay túi HD có độ trong, độ bóng bề mặt ở mức độ trung bình. Độ mềm dẻo kém, có độ cứng nhất định, đễ gập nếp, tạo ra tiếng động xột xoạt rõ rang khi cọ xát (nên thường gọi là túi xốp). Túi xốp HDPE thường gặp là túi đựng rác, túi hàng chợ, túi siêu thị và cửa hàng nhỏ.</p>\n\n<p style=\"text-align:justify\">– Túi LDPE (Low Density Polyethylene):</p>\n\n<p style=\"text-align:justify\">Túi nhựa làm từ LDPE hay túi PE có độ trong, bề mặt mịn, bóng hơn so với túi HD. Nhờ độ dẻo dai, mịn màng hơn, nên giá thành sản xuất túi đắt hơn so với túi HD, nhưng chất lượng túi nilon sẽ cao cấp hơn. Túi PE thường gặp là các túi in quảng cáo sản phẩm, túi in logo, thương thiệu cho các doanh nghiệp.</p>\n\n<h4 style=\"text-align:justify\">2. Túi PP (Polypropylen)</h4>\n\n<p style=\"text-align:justify\">Túi làm từ nhựa PP có độ bền cơ học cao hơn, khá cứng, nên không mềm dẻo, khó bị kéo giãn dọc như nhựa HD hay PE. Đặc biệt, túi PP có độ mịn, bóng bề mặt cao, sức bền cơ lý tốt hơn.<br />\nNgoài ra, vật liệu PP có khả năng chống thấm khí, thấm nước, nên thường dùng làm túi đựng thực phẩm, bảo quản hàng hoá, hoặc màng chít pallet bọc hàng hoá – thực phẩm.</p>\n\n<h4 style=\"text-align:justify\">3. Túi OPP</h4>\n\n<p style=\"text-align:justify\">Túi OPP là gì? Loại túi ép, cấu tạo từ 2 lớp màng polypropylene, có độ co giãn cơ lý tốt, độ nét cao, chống ẩm tuyệt vời. Vì vậy túi OPP là loại túi cao cấp, độ bề, chống ẩm tốt, dùng để đựng hàng hoá đặc biệt, hoặc in túi nilon cho quảng cáo marketing. Thích hợp đóng gói các thực phẩm: bánh kẹo, trái cây khô, các loại gia vị, thảo dược, các loại hạt, hay vật tư y tế,...</p>\n\n<p style=\"text-align:justify\">&nbsp;</p>\n', 'cac-loai-tui-nilon-pho-bien-tren-thi-truong-hien-nay', '', 'in túi nilon, in túi ni lông, in túi xốp, in túi xốp giá rẻ, in túi nilon giá rẻ, in túi nilon giá sỉ,', 'Bao bì xốp hay túi nilon (túi ni lông) là vật dụng không thể thiếu trong cuộc sống. Túi nilon hiện này rất đa dạng nhiều chủng loại, có tên gọi và công dụng khác nhau', 0, '1524325738', 'uploads/san-pham/cac-loai-tui-nilon-pho-bien-tren-thi-truong-hien-nay-0ow.jpg'),
(68, NULL, 1, 1, 0, 1, 2, 'Các loại túi Nilon và những thắc mắc thường nhật trong cuộc sống chúng ta', 'Bao bì ni lông hay còn được gọi là túi nilon (túi ni lông) được làm từ nhựa PP có độ bền cơ học cao hơn, khá cứng, nên không mềm dẻo, khó bị kéo giãn dọc như nhựa HDPE hay LDPE. ', '<p style=\"text-align:justify\"><strong>Bao bì ni lông</strong> hay còn gọi <strong>túi nilon</strong> (túi ni lông)&nbsp;làm từ nhựa PP có độ bền cơ học cao hơn, khá cứng, nên không mềm dẻo, khó bị kéo giãn dọc như nhựa HDPE hay LDPE. Đặc biệt, túi PP có độ mịn, bóng bề mặt cao, sức bền cơ lý tốt hơn.</p>\n\n<p style=\"text-align:justify\"><strong>Túi nilon</strong> hay bao bì nilon là một loại túi nhựa rất bền, dẻo, mỏng, nhẹ và tiện dụng. Ngày nay, nó được dùng rất nhiều để đóng gói thực phẩm, bột giặt, bảo quản nước đá, các loại chế phẩm hoá học hay đựng những phế liệu nhỏ, rác thải,...</p>\n\n<p style=\"text-align:center\"><img alt=\"In Bao Bì Quốc Tiến - Các loại túi nilon trong cuộc sống\" src=\"http://inbaobiquoctien.com/uploads/Images/tin-tuc/20-april-2018/inbaobiquoctien-cac-loai-tui-nilon.jpg\" /></p>\n\n<p style=\"text-align:justify\">Hy vọng bài viết này giúp bạn đọc hiểu rõ hơn về thành phần hóa học, tính chất, tác hại và cách sử dụng túi nilon như thế nào để giảm thiểu tác hại của nó đối với sức khỏe và môi trường.</p>\n\n<h4 style=\"text-align:justify\">1. Túi nilon được làm từ nguyên liệu nào, đặc tính của nó như thế nào?</h4>\n\n<p style=\"text-align:justify\"><strong>Túi nilon</strong> được làm từ các nguyên liệu khác nhau nhưng chủ yếu được sản xuất từ hạt nhựa polyetilen (PE) và polypropilen (PP) có nguồn gốc từ dầu mỏ cùng với một số hóa chất phụ gia khác. Nhựa polyetylen dùng để sản xuất túi nilon thường có hai loại: Polyetylen tỷ trọng thấp (Low Density Polyethylene-LDPE) và polyetylen tỷ trọng cao (High Density Polyethylene-HDPE). Túi nilon có các đặc tính như: độ bền cơ học tốt, trong suốt, bề mặt bóng mịn, chống thấm nước nhưng chống thẩm thấu khí kém.</p>\n\n<p style=\"text-align:justify\">HDPE thường dùng để sản xuất loại túi nilon có độ trong, độ bóng bề mặt ở mức độ trung bình, độ mềm dẻo kém, có độ cứng nhất định, đễ gập nếp, tạo ra tiếng động xột xoạt rõ ràng khi cọ xát (nên thường gọi là túi xốp). Túi xốp HDPE thường gặp là túi đựng rác, túi nilon đựng hàng chợ, túi siêu thị và cửa hàng nhỏ. Túi nilon làm màng LDPE có độ trong, bề mặt mịn, bóng hơn so với túi xốp HDPE.</p>\n\n<p style=\"text-align:center\"><img alt=\"In Bao Bì Quốc Tiến - Ứng dụng túi nilon trong siêu thị\" src=\"http://inbaobiquoctien.com/uploads/Images/tin-tuc/20-april-2018/inbaobiquoctien-cac-loai-tui-nilon-2.jpg\" /></p>\n\n<p style=\"text-align:justify\">Nhờ độ dẻo dai, mịn màng hơn, nên giá thành sản xuất túi cao hơn so với túi HDPE, nhưng chất lượng túi nilon sẽ tốt hơn. Túi LDPE thường gặp là các loại túi PE khổ lớn, dùng để đựng hàng hoá có trọng lượng tương đối, thường in quảng cáo sản phẩm, in logo, thương thiệu cho các doanh nghiệp hay còn gọi là <a href=\"http://inbaobiquoctien.com\"><strong>in túi nilon</strong></a> (in túi ni lông).</p>\n\n<p style=\"text-align:justify\">Túi nilon làm từ nhựa PP có độ bền cơ học cao hơn, khá cứng, nên không mềm dẻo, khó bị kéo giãn dọc như nhựa HDPE hay LDPE. Đặc biệt, túi PP có độ mịn, bóng bề mặt cao, sức bền cơ lý tốt hơn. Ngoài ra, vật liệu PP có khả năng chống thấm khí, thấm nước, nên thường dùng làm túi đựng thực phẩm, bảo quản hàng hoá, hoặc màng chít pallet bọc hàng hoá - thực phẩm.</p>\n\n<h4 style=\"text-align:justify\">2. Trong cuộc sống sinh hoạt và sản xuất hiện nay, con người ngày càng sử dụng nhiều tới túi nilon, vậy điều đó có ảnh hưởng như thế nào tới sức khỏe và môi trường sống của chúng ta?</h4>\n\n<p style=\"text-align:justify\">Khi sản xuất <strong>túi nilon</strong>, người ta phải sử dụng các hóa chất phụ gia như phẩm màu, kim loại nặng (chì, cadimi,..), chất hóa dẻo, ....đều là những chất gây nguy hiểm tới sức khỏe của con người. Ở nhiệt độ 70 - 80<sup>o</sup>C, phụ gia độc hại chứa trong túi nilon sẽ hòa tan vào thực phẩm. Trong đó, một số chất hóa dẻo có thể làm tổn thương và thoái hóa thần kinh ngoại biên và tủy sống,&nbsp;gây độc cho tinh hoàn và gây một số dị tật bẩm sinh nếu thường xuyên tiếp xúc với chúng.</p>\n\n<p style=\"text-align:justify\">Nếu sử dụng <strong>túi nilon</strong> để đựng các thực phẩm có tính axit như dưa muối, cà muối, thực phẩm nóng, các chất hóa dẻo trong túi nilon sẽ tách khỏi thành phần nhựa và gây độc cho thực phẩm. Khi ngấm vào dưa chua, axit lactic ở trong dưa, cà sẽ hòa tan một số kim loại tạo chất có thể gây ung thư.</p>\n\n<p style=\"text-align:justify\">Bên cạnh đó, <strong>túi nilon</strong> được sản xuất từ PE và PP đều là những vật liệu rất khó bị phân hủy trong điều kiện chôn lấp bình thường (khoảng hàng trăm năm mới bị phân huỷ hoàn toàn) nên việc sử dụng túi nilon sẽ ảnh xấu đến môi trường sống của con người. Sự tồn tại của túi nilon trong môi trường sẽ gây ảnh hưởng nghiêm trọng tới đất và nước bởi túi nilon lẫn vào đất sẽ ngăn cản ôxi đi qua đất, gây xói mòn đất, làm cho đất bạc màu, không tơi xốp, kém chất dinh dưỡng, từ đó làm cho cây trồng chậm tăng trưởng.</p>\n\n<p style=\"text-align:center\"><img alt=\"In Bao Bì Quốc Tiến - Rác thải với túi nilon\" src=\"http://inbaobiquoctien.com/uploads/Images/tin-tuc/20-april-2018/inbaobiquoctien-cac-loai-tui-nilon-3.jpg\" /></p>\n\n<p style=\"text-align:justify\"><strong>Túi nilon</strong> kẹt sâu trong cống rãnh, kênh rạch còn làm tắc nghẽn gây ứ đọng nước thải và ngập úng.</p>\n\n<p style=\"text-align:justify\">Các điểm ứ đọng nước thải sẽ là nơi sản sinh ra nhiều vi khuẩn gây bệnh. Bên cạnh đó, rác thải từ túi nilon còn làm mất mỹ quan tới cảnh quan môi truờng.</p>\n\n<h4 style=\"text-align:justify\">3. Tiêu hủy túi nilon như thế nào là đúng cách? Nếu tiêu hủy sai cách thì có hậu quả ra sao?</h4>\n\n<p style=\"text-align:justify\">Người tiêu dùng cần phân loại rác thải là túi nilon ngay sau khi sử dụng để công ty môi truờng thu gom và tiêu huỷ hoặc tái sản xuất để đảm bảo an toàn về môi truờng. Không được tự ý chôn lấp vì sẽ gây ô nhiễm đất và nguồn nuớc, cũng không được đem đốt vì khi đốt cháy nilon sẽ tạo thành khí cacbonic, metan là những chất gây hiệu ứng nhà kính và thậm chí sinh ra dioxin (có trong chất độc màu da cam) là chất cực độc gây ảnh hưởng nghiệm trọng tới sức khoẻ và môi trường sống của con người.</p>\n\n<h4 style=\"text-align:justify\">4. Lời khuyên nào cho người sử dụng túi nilon để giảm thiểu tối đa tác hại mà nó mang lại?</h4>\n\n<p style=\"text-align:justify\">Để giảm thiểu tối đa tác hại của túi nilon nguời sử dụng cần hạn chế sử dụng túi nilon thông thuờng bằng cách sử dụng túi dùng nhiều lần và có khả năng phân huỷ sinh học khi đi mua hàng; không nên dùng túi nilon rẻ tiền, có màu để đựng thực phẩm, đặc biệt là không được dùng để đựng thực phẩm nóng, có vị chua.</p>\n\n<p style=\"text-align:justify\">Sau khi sử dụng xong không được tự ý đốt hay chôn lấp mà phải phân loại riêng túi nilon để công ty môi truờng thu gom và tiêu huỷ theo quy định.</p>\n\n<p style=\"text-align:right\"><em>(PGS.TS. Lê Đức Giang - Khoa Hoá học, Trường ĐH Vinh)</em></p>\n\n<p style=\"text-align:justify\">&nbsp;</p>\n', 'cac-loai-tui-nilon-va-nhung-thac-mac-thuong-nhat-trong-cuoc-song-chung-ta', '', 'in túi nilon, in túi ni lông, in túi xốp thời trang, in túi xốp siêu thị, in túi nilon thời trang, in túi nilon siêu thị, ', 'Bao bì ni lông hay còn được gọi là túi nilon (túi ni lông) được làm từ nhựa PP có độ bền cơ học cao hơn, khá cứng, nên không mềm dẻo, khó bị kéo giãn dọc như nhựa HDPE hay LDPE. ', 0, '1524325589', 'uploads/san-pham/cac-loai-tui-nilon-va-nhung-thac-mac-thuong-nhat-trong-cuoc-song-chung-ta-yES.jpg');
INSERT INTO `article` (`id`, `views`, `status`, `hot`, `weight`, `author`, `type`, `name`, `summary`, `content`, `link`, `title`, `keywords`, `description`, `cate`, `time`, `img`) VALUES
(69, NULL, 1, 1, 0, 1, 2, 'Túi màng ghép là gì?', 'Túi màng ghép hay còn gọi là túi hàn ba biên (hay túi hút chân không) là màng nhựa phức hợp hay còn gọi là màng ghép là một loại vật liệu nhiều lớp mà ưu điểm của nó', '<p style=\"text-align:justify\"><strong>Túi màng ghép</strong> hay còn gọi là túi hàn ba biên (hay túi hút chân không) là&nbsp;màng nhựa phức hợp hay còn gọi là màng ghép là một loại vật liệu nhiều lớp mà ưu điểm của nó&nbsp;là nhận được những tính chất tốt của các loại vật liệu thành phần.</p>\n\n<p style=\"text-align:justify\"><strong>Xem thêm</strong> <a href=\"http://inbaobiquoctien.com/in-tui-zipper-mang-ghep.html\"><strong>in túi zipper mang ghép</strong></a></p>\n\n<p style=\"text-align:center\"><img alt=\"In Bao Bì Quốc Tiến - Túi màng ghép là gì?\" src=\"http://inbaobiquoctien.com/uploads/Images/san-pham/tui-mang-ghep/inbaobiquoctien-tui-zipper-day-dung-mang-nhom.jpg\" style=\"opacity:0.9; text-align:justify\" /></p>\n\n<p style=\"text-align:justify\">– Người ta đã sử dụng cùng lúc (ghép) các loại vật liệu khác nhau để có được một loại vật liệu ghép với các tính năng được cải thiện nhằm đáp ứng các yêu cầu bao bì. Khi đó chỉ một tấm vật liệu vẫn có thể cung cấp đầy đủ tất cả các tính chất như: tính cản khí, hơi ẩm, độ cứng, tính chất in tốt, tính năng chế tạo dễ dàng, tính hàn tốt,… đúng&nbsp;như yêu cầu đã đặt ra.</p>\n\n<p style=\"text-align:justify\">– Về mặt kỹ thuật vật liệu ghép được ứng dụng thường xuyên, chúng đạt được các yêu cầu kỹ thuật, các yêu cầu về tính kinh tế, tính tiện dụng thích hợp cho từng loại bao bì, giữ gìn chất lượng sản phẩm bên trong bao bì, giá thành rẻ, vô hại,….</p>\n\n<p style=\"text-align:center\"><img alt=\"In Bao Bì Quốc Tiến - Túi màng ghép là gì 1?\" src=\"http://inbaobiquoctien.com/uploads/Images/san-pham/tui-mang-ghep/inbaobiquoctien-tui-zipper-day-dung-mang-nhom-1.jpg\" /></p>\n\n<p style=\"text-align:justify\">– Cấu trúc túi hàn ba biên có màng ghép phức hợp:</p>\n\n<ul style=\"margin-left:40px\">\n	<li style=\"text-align:justify\">Các polymer khác nhau được sử dụng tùy thuộc vào vai trò của chúng như là các&nbsp;lớp cấu trúc, lớp liên kết, lớp cản, lớp hàn.</li>\n	<li style=\"text-align:justify\">Lớp cấu trúc: đảm bảo các tính chất cơ học cần thiết, tính chất in dễ dàng và thường có cả tính chống ẩm.</li>\n	<li style=\"text-align:justify\">Các lớp liên kết: là những lớp keo nhiệt dẻo (ở dạng đùn) được sử dụng để kết hợp các loại vật liệu có bản chất khác nhau.</li>\n	<li style=\"text-align:justify\">Các lớp cản: được sử dụng để có được những yêu cầu đặc biệt về khả năng cản khí và giữ mùi : PET, PA, AL, MCPP, MPET.</li>\n	<li style=\"text-align:justify\">Các lớp vật liệu hàn: thường dùng là PE và hỗn hợp LLDPE.</li>\n</ul>\n\n<p style=\"text-align:justify\"><br />\n– Nguyên liệu sử dụng túi hàn ba biên (Túi hút chân không): Màng OPP, PET, PA, CPP, LLDPE, AL (nhôm), MCPP, MPET, …</p>\n\n<p style=\"text-align:justify\">Trong đó :</p>\n\n<ul style=\"margin-left:40px\">\n	<li style=\"text-align:justify\">Chất liệu màng in được là : OPP, PET, PA, CPP, …</li>\n	<li style=\"text-align:justify\">Chất liệu màng để ghép bên trong là CPP, LLDPE, AL (nhôm), MCPP, MPET.</li>\n</ul>\n\n<p style=\"text-align:justify\">&nbsp;</p>\n', 'tui-mang-ghep-la-gi', '', 'in túi màng ghép, in túi cafe, in túi trà, in túi nilon, in túi xốp tphcm, in túi xốp zipper,', 'Túi màng ghép hay còn gọi là túi hàn ba biên (hay túi hút chân không) là màng nhựa phức hợp hay còn gọi là màng ghép là một loại vật liệu nhiều lớp mà ưu điểm của nó', 0, '1524325533', 'uploads/san-pham/tui-mang-ghep-la-gi-h8b.jpg'),
(70, NULL, 1, 1, 0, 1, 2, 'Túi PE là gì?', 'Túi PE trong suốt, hơi có ánh mờ, có bề mặt bong loáng, mềm dẻo, chống thấm nước và hơi nước rất tốt. Túi mềm dẻo nhưng vẫn đảm bảo độ cứng và đứng túi khi sử dụng.', '<p style=\"text-align:justify\"><strong>Túi PE</strong> hay còn gọi là&nbsp;túi nilon&nbsp;(túi ni lông) hay túi nhựa đã trở nên thân thuộc trong cuộc sống của chúng ta hiện nay. Túi nilon&nbsp;hiện nay có rất nhiều loại,&nbsp;có tên gọi&nbsp;và công dụng khác nhau. Chúng ta có&nbsp;những loại túi nilon thường gặp trong cuộc sống hàng ngày: túi xốp, túi T-shirt, túi HD, <strong><em><u>túi PE</u></em></strong>, túi Roll&nbsp;cuộn,… trong đó, túi PE là một loại túi được sử dụng rất phổ biến hiện nay.</p>\n\n<h3 style=\"text-align:justify\">Phân loại&nbsp;và cách sử dụng các loại túi PE</h3>\n\n<p style=\"text-align:justify\"><strong>Đặc điểm chung:</strong> túi PE trong suốt, hơi có ánh mờ, có bề mặt bong loáng, mềm dẻo, chống thấm nước và hơi nước rất tốt. Túi PE thường được đục lỗ thay cho quai cầm. Túi mềm dẻo nhưng vẫn đảm bảo độ cứng và đứng túi khi sử dụng.</p>\n\n<h3 style=\"text-align:justify\">Túi PE có nhiều loại với công dụng khác nhau</h3>\n\n<h4>1/ Túi PE trong</h4>\n\n<p style=\"text-align:justify\">Túi PE trong có bề mặt bóng mịn, bền dẻo. Sản xuất bao PE khổ lớn dùng trong công nghiệp – nông nghiệp hoặc đựng hàng bán lẻ (bu-lông…), đựng thực phẩm (chè xanh, ô mai ngâm…) , hoặc trong ngành&nbsp; y tế…<br />\n– Chất liệu LDPE trong<br />\n– Kích thước: nhỏ nhất: 10×15 cm<br />\n– Độ dày theo yêu cầu (từ 10mic đến 200mic)</p>\n\n<p style=\"text-align:center\"><img alt=\"In Bao Bì Quốc Tiên - Túi PE trong\" src=\"http://inbaobiquoctien.com/uploads/Images/tin-tuc/20-april-2018/inbaobiquoctien-tui-pe-trong.jpg\" /></p>\n\n<h4 style=\"text-align:justify\">2/ Túi PE chống tĩnh điện</h4>\n\n<p style=\"text-align:justify\">Túi PE chống tĩnh điện có màu đen với khả năng giải phóng tĩnh điện tốt, không chỉ có khả năng dẫn điện ổn định mà còn cản sáng tốt, nó có thể bảo vệ&nbsp;các thiết bị và linh kiện điện tử nhạy cảm một cách hiệu quả khỏi tác hại của sóng điện từ và tĩnh điện, thông qua việc giảm tác hại của tĩnh điện sinh ra do ma sát trong quá trình sản xuất và vận chuyển và chống lại các tĩnh điện bên ngoài.</p>\n\n<p style=\"text-align:justify\">Chất liệu và cấu tạo của túi PE tĩnh điện: Túi PE chống tĩnh điện màu đen, và không trong suốt, được làm từ LDPE, sợi carbon dẫn điện mầu đen với quá trình thổi khuôn. Điện trở bề mặt có thể lên tới 103 – 105Ω.</p>\n\n<p style=\"text-align:justify\">Chức năng: Túi PE chống tĩnh điện chủ yếu được dùng để đóng gói các sản phẩm quân sự, hàng không, sản phẩm mạng viễn thông, vật liệu nhạy cảm, nhạc cụ, điện tử, bảng mạch tích hợp, chip, điện tử chính xác,…</p>\n\n<p style=\"text-align:center\"><img alt=\"In Bao Bì Quốc Tiên - Túi PE chống điện\" src=\"http://inbaobiquoctien.com/uploads/Images/tin-tuc/20-april-2018/inbaobiquoctien-tui-pe-chong-tinh-dien.jpg\" /></p>\n\n<h4 style=\"text-align:justify\">3/ Túi PE hút chân không</h4>\n\n<p style=\"text-align:justify\">Toàn bộ túi làm bằng Nilon dày và dai sử dụng nhiều lần và đã được xử lý không ôi nhiễm với thực phẩm bảo quản. Khe nắp túi và van hút chân không làm bằng Silicon tăng khả năng đàn hồi và kín khí.</p>\n\n<p style=\"text-align:justify\"><strong>Công dụng:</strong>&nbsp; dùng để&nbsp; lưu giữ những vật dụng cồng kềnh, giữ quần áo mùa đông tránh những bụi bẩn, ẩm mốc, ngăn chặn sự ẩm ướt của đồ vật trong không khí. Ngoài ra, túi chân không còn dùng trong công nghệ đóng gói thực phẩm và phi thực phẩm khác như: lưu các tập tin, giấy tờ quan trọng, Album gia đình, đĩa DVD, đồ trang sức bạc…</p>\n\n<p style=\"text-align:justify\">Đóng gói chân không được phổ biến trong ngành công nghiệp do các ứng dụng rộng, không chỉ về thức ăn mà còn cho sự bảo hộ của một loạt các sản phẩm được kín bụi, khí hoặc ăn mòn trong y tế, quang học và dược phẩm trong ngành công nghiệp và nhiều người khác.</p>\n\n<p style=\"text-align:center\"><img alt=\"In Bao Bì Quốc Tiến - Túi PE hút chân không\" src=\"http://inbaobiquoctien.com/uploads/Images/tin-tuc/20-april-2018/inbaobiquoctien-tui-pe-hut-chan-khong.jpg\" /></p>\n\n<p style=\"text-align:justify\">Trong công nghiệp, cũng như trong đời sống hằng ngày, ngoài túi PE, thì người ta còn có các sản phẩm khác để bảo vệ sản phẩm như: <strong>túi xốp&nbsp;HD</strong>, <a href=\"http://inbaobiquoctien.com/tui-mang-ghep-la-gi.html\"><strong>túi màng ghép</strong></a>,...</p>\n', 'tui-pe-la-gi', '', 'in túi pe, in túi xốp, in túi t-shirt, in túi xốp HD,\nin túi xốp PE, in túi nilon,', 'Túi PE trong suốt, hơi có ánh mờ, có bề mặt bong loáng, mềm dẻo, chống thấm nước và hơi nước rất tốt. Túi mềm dẻo nhưng vẫn đảm bảo độ cứng và đứng túi khi sử dụng.', 0, '1524813177', 'uploads/san-pham/tui-pe-la-gi-cey.jpg'),
(71, NULL, 1, 1, 0, 6, 2, 'Các loại túi nilon đựng hàng thịnh hành trên thị trường', 'Túi nilon là một loại bao bì nhựa đựng hàng hoá phổ biến nhất hiện nay. ', '<h3 style=\"text-align:justify\">Vì sao có nhiều loại túi nilon?</h3>\n\n<p style=\"text-align:justify\">Túi nilon là một loại bao bì nhựa đựng hàng hoá phổ biến nhất hiện nay. Được sản xuất từ vật liệu chính là các loại hạt nhựa (chế phẩm của dầu mỏ) cùng với các phụ gia tuỳ theo đặc tính riêng. Ưu điểm của túi nilon là giá thành rẻ và tiện lợi khi sử dụng để đóng gói các loại hàng hoá.</p>\n\n<p style=\"text-align:justify\">Như đã giới thiệu trong Quy tính sản xuất, nhờ quá trình thổi màng - tạo cuộn, <a href=\"http://inbaobiquoctien.com\"><strong>In Bao Bì Quốc Tiến</strong></a>&nbsp;có thể tạo ra các loại túi nilon khác nhau, từ túi ni lông màng mỏng tới túi màng ngọc - màng ghép phức hợp.</p>\n\n<p style=\"text-align:center\"><img alt=\"In Bao Bì Quốc Tiến - Các loại bao bì nilon hiện nay\" src=\"http://inbaobiquoctien.com/uploads/Images/tin-tuc/21-april-2018/inbaobiquoctien-cac-loai-tui-nilon-1.jpg\" style=\"height:269px; width:600px\" /></p>\n\n<h3 style=\"text-align:justify\">Các loại túi nilon theo chất liệu:</h3>\n\n<h4 style=\"text-align:justify\">Túi HD giá rẻ</h4>\n\n<p style=\"text-align:center\"><img alt=\"In Bao Bì Quốc Tiến - Túi HD giá rẻ\" src=\"http://inbaobiquoctien.com/uploads/Images/tin-tuc/21-april-2018/inbaobiquoctien-tui-hd-gia-re.jpg\" /></p>\n\n<p style=\"text-align:justify\">Làm từ màng HDPE (High Density Polyethylene) phổ biến nhất để sản xuất túi nilon. Túi HDPE có nhiều đặc tính tốt và quan trọng nhất đó là giá rẻ nhất trong các chất liệu làm túi đựng hàng hoá trong các nhà hàng, cửa hàng tiện lợi, cửa hàng tạp hóa. Túi HD cũng được sử dụng để sản xuất túi đựng rác, túi bọc quần áo tiệm giặt là, với giá thành tốt nhất .</p>\n\n<h4 style=\"text-align:justify\">Túi PE cao cấp</h4>\n\n<p style=\"text-align:center\"><img alt=\"In Bao Bì Quốc Tiến - Túi PE cao cấp\" src=\"http://inbaobiquoctien.com/uploads/Images/tin-tuc/21-april-2018/inbaobiquoctien-tui-pe-cao-cap.jpg\" style=\"height:406px; width:600px\" /></p>\n\n<p style=\"text-align:justify\">Tên gọi đầy đủ là Low Density Polyethylene (LDPE) - loại túi nilon cao cấp với các tính chất vật lý tốt hơn túi HDPE: khả năng kéo dãn, kéo căng, bền dai hơn&nbsp; tốt hơn. Túi PE còn có bề mặt bóng mịn hơn nên thích hợp để in ấn cho cửa hàng - công ty cho chi tiết sắc nét và hình ảnh rất đẹp. Túi PE cũng được ưu tiên hơn trong việc sản xuất bao bì đựng thực phẩm.</p>\n\n<h4 style=\"text-align:justify\">Túi PP</h4>\n\n<p style=\"text-align:center\"><img alt=\"In Bao Bì Quốc Tiến - Túi PP trong hút chân không đựng thực phẩm an toàn\" src=\"http://inbaobiquoctien.com/uploads/Images/tin-tuc/21-april-2018/inbaobiquoctien-tui-pp-trong-hut-chan-khong.jpg\" style=\"height:500px; width:600px\" /></p>\n\n<p style=\"text-align:justify\">Được làm từ chất liệu Polypropylene (PP) loại túi nilon này được đặc trưng bởi độ bền cao và khả năng chịu ảnh hưởng yếu tố thời tiết rất tốt. Không giống như các túi khác, túi PP lý tưởng cho các cửa hàng bán lẻ do thời hạn sử dụng lâu hơn của chúng khi để đóng gói thực phẩm, trong đó các mặt hàng như bánh kẹo, các loại hoa quả, các loại thảo mộc, túi PP&nbsp;đựng đường kính... có thể được lưu trữ dễ dàng. Đây là vật liệu sản xuất túi đựng thực phẩm an toàn.</p>\n\n<h4 style=\"text-align:justify\">Túi bóng kính OPP</h4>\n\n<p style=\"text-align:center\"><img alt=\"In Bao Bì Quốc Tiến - In túi OPP túi bóng kính đựng quần áo\" src=\"http://inbaobiquoctien.com/uploads/Images/tin-tuc/21-april-2018/inbaobiquoctien-tui-opp-keo.jpg\" style=\"height:330px; width:660px\" /></p>\n\n<p style=\"text-align:justify\">Làm từ màng OPP (viết tắt của Oriented Polypropylene) rất mỏng nhẹ, có độ bền cao, khả năng kéo dãn tốt. Đặc điểm của túi OPP là độ trong suốt (nên gọi là túi bóng kính), bề mặt bóng mịn và khó trầy xước. Quan trọng hơn màng OPP có khả năng chống thấm nước và thẩm thấu khí... rất lý tưởng cho việc đóng gói sản phẩm khô như đựng bánh kẹo, quần áo, tài liệu...</p>\n\n<h4 style=\"text-align:justify\">Các loại túi nilon đặc biệt</h4>\n\n<p style=\"text-align:justify\">Đây là các loại túi dùng để đựng hàng hoá với các yêu cầu đặc biệt. Có thể kể tới như túi PA có khả năng hút chân không, các loại túi màng phức hợp, túi màng ghép...</p>\n\n<p style=\"text-align:justify\">Túi PA/PE (hút chân không), túi PE, túi nhôm: đóng gói hàng đông lạnh, trái cây sấy,mứt, bánh kẹo,...</p>\n\n<p style=\"text-align:justify\">Túi OPP/PE, OPP/CPP, PET/PE: đóng gói quần áo, bút viết, muỗng đũa,....</p>\n\n<p style=\"text-align:justify\">Túi Ziper đáy đứng: đựng sữa, thức uống, trái cây có vỏ...</p>\n\n<p style=\"text-align:justify\">Màng ghép metalize hoặc túi: đóng gói dầu gội, sữa tắm, phân bón,....</p>\n\n<h3 style=\"text-align:justify\">Túi nilon theo mục đích đựng hàng hoá:</h3>\n\n<h4 style=\"text-align:justify\">Túi xốp hàng chợ</h4>\n\n<p style=\"text-align:center\"><img alt=\"In Bao Bì Quốc Tiến - Túi xốp đựng hàng chợ\" src=\"http://inbaobiquoctien.com/uploads/Images/tin-tuc/21-april-2018/inbaobiquoctien-tui-xop-cho.jpg\" /></p>\n\n<p style=\"text-align:justify\">Là loại túi ni lông hai quai, xốp, mỏng nhẹ và có nhiều kích cỡ từ đựng 0,5kg tới 20kg. Túi xốp đựng hàng chợ giá rẻ hơn các loại túi ni lông khác và cũng có nhiều loại:</p>\n\n<p style=\"text-align:justify\">- Túi xốp các màu đựng hàng chợ - hàng loại 2 - các cỡ thông thường từ đựng 2kg trở lên<br />\n- Túi xốp đựng hàng đại lý và tạp hóa, là hàng loại 1 ( xốp zin 1 ) thường không mùi ( kể cả túi xốp trong và các màu) đủ cỡ từ 0,5kg trở lên và dai hơn</p>\n\n<p style=\"text-align:justify\">Hinh túi xốp hàng chợ giá rẻ</p>\n\n<p style=\"text-align:justify\">- Túi xốp đen dùng để đựng rác (lót trong thùng đựng rác) - loại túi giá rẻ nhất<br />\n- Túi siêu thị : là hàng loại 1, nhưng thường có in trên 1 hoặc 2 mặt túi nilon. Đa số túi nilon siêu thị thường làm nhám trên bề mặt</p>\n\n<h4 style=\"text-align:justify\">Túi nilon siêu thị:</h4>\n\n<p style=\"text-align:center\"><img alt=\"In Bao Bì Quốc Tiến - Túi nilon siêu thị và cửa hàng\" src=\"http://inbaobiquoctien.com/uploads/Images/tin-tuc/21-april-2018/inbaobiquoctien-tui-sieu-thi.jpg\" style=\"height:739px; width:600px\" /></p>\n\n<p style=\"text-align:justify\">Loại túi ni lông cao cấp, thường là loại hai quai, nhưng được sản xuất đặc biệt để bền dai hơn, có thể nhiều hàng hoá khi đi mua sắm.</p>\n\n<h4 style=\"text-align:justify\">Túi cho cửa hàng</h4>\n\n<p style=\"text-align:center\"><img alt=\"In Bao Bì Quốc Tiến - Túi nilon cho cửa hàng có quai đục lỗ\" src=\"http://inbaobiquoctien.com/uploads/Images/tin-tuc/21-april-2018/inbaobiquoctien-tui-cho-cua-hang.jpg\" style=\"height:489px; width:600px\" /></p>\n\n<p style=\"text-align:justify\">Loại túi nilon có đục lỗ hột xoài để làm tay cầm. Có nhiều kiểu túi phù hợp cho các cửa hàng và shop bán lẻ.<br />\n- Túi nilon đựng quần áo: thường là loại túi HD nhiều màu , cao cấp hơn là túi PE nhưng giá không rẻ.</p>\n\n<p style=\"text-align:center\"><img alt=\"In Bao Bì Quốc Tiến - Túi nilon HDPE đựng quần áo cho cửa hàng\" src=\"http://inbaobiquoctien.com/uploads/Images/tin-tuc/21-april-2018/inbaobiquoctien-tui-nilon-hdpe-cho-cua-hang.jpg\" style=\"height:400px; width:600px\" /></p>\n\n<p style=\"text-align:justify\">- Túi nilon đựng mỹ phẩm: Nếu là shop bán đồ làm đẹp, thì bạn có thể mua túi nilon trong suốt đựng mỹ phẩm rất đẹp và sang trọng<br />\n- Túi đựng bánh mỳ, bánh ngọt: túi xốp hai quai, rộng khoảng 10-11cm, còn chiều dài đa dạng, dùng đựng bánh mỳ dài. Loại túi bóng này còn dùng đựng cố nước mía nên có người gọi là túi đựng cốc.</p>\n\n<h4 style=\"text-align:justify\">Túi nilon in hình sẵn</h4>\n\n<p style=\"text-align:center\"><img alt=\"In Bao Bì Quốc Tiến - Túi nilon in hoa văn sẵn.\" src=\"http://inbaobiquoctien.com/uploads/Images/tin-tuc/21-april-2018/inbaobiquoctien-tui-nilon-in-hoa-van-san.jpg\" style=\"height:442px; width:600px\" /></p>\n\n<p style=\"text-align:justify\">Là loại túi nilon HD đục quai có in sẵn các hình hoạt hình ngộ nghĩnh : mèo kitty - chuột mickey - hoặc các hoa văn rất đẹp cho các cửa hàng trẻ em và shop thời trang, quần áo mỹ phẩm</p>\n\n<h4 style=\"text-align:justify\">Túi đựng trà sữa, nước ngọt - Zipper, túi chữ T</h4>\n\n<p style=\"text-align:center\"><img alt=\"In Bao Bì Quốc Tiến - Túi zipper đựng trà sữa\" src=\"http://inbaobiquoctien.com/uploads/Images/tin-tuc/21-april-2018/inbaobiquoctien-tui-zipper-tien-dung.jpg\" style=\"height:341px; width:600px\" /></p>\n\n<p style=\"text-align:justify\">Rất nhiều cửa hàng bán đồ uống, nước ngọt, giải khát đã đặt mua loại túi này bởi rất tiện dụng để bảo quản và mang theo được. Đây là loại túi đựng thức uống tiện lợi, cũng có thể in ấn đẹp mắt. Hai loại thường dùng là :<br />\n- Túi zipper : các loại túi zip có khoá miệng hoặc bấm miệng có in ấn đẹp mặt Hoặc đơn giản là loại túi zipper trong suốt sẽ giá rẻ hơn, phù hợp với bán hàng rong.<br />\n- Túi chữ T đựng ly trà sữa - cốc nước giải khát tiện lợi.</p>\n\n<h4 style=\"text-align:justify\">Túi đựng thực phẩm</h4>\n\n<p style=\"text-align:justify\">Loại túi nilon này cũng được nhiều người quan tâm. Các cửa hàng kinh doanh thịt, cá nhập khẩu, các công ty đóng gói thức ăn đông lạnh...</p>\n\n<p style=\"text-align:justify\">Ngoài ra còn nhiều loại túi nilon màng ngọc, màng ghép phức hợp khác dùng cho các ngành công nghiệp - may mặc - bánh kẹo riêng. Chúng tôi chuyên <a href=\"http://inbaobiquoctien.com\"><strong>in&nbsp;túi ni lông</strong></a> theo kích thước, chất liệu, mẫu mã và màu sắc&nbsp;riêng với mọi yêu cầu của bạn. Nếu bạn quan tâm, vui lòng liên hệ với <a href=\"http://inbaobiquoctien.com\"><strong>In Bao Bì Quốc Tiến</strong></a>&nbsp;qua số Hotline <strong>097.197.0076 </strong>nhé</p>\n\n<p style=\"text-align:justify\">&nbsp;</p>\n', 'cac-loai-tui-nilon-dung-hang-thinh-hanh-tren-thi-truong', 'Các loại túi nilon đựng hàng thịnh hành trên thị trường', 'in túi xốp PE, in túi nilon PE, in túi xốp thời trang, in túi xốp siêu thị, in túi nilon siêu thị, in túi nilon ngân hàng,', 'Hãy cùng In Bao Bì Quốc Tiến điểm qua các loại túi nilon đựng hàng thịnh hành trên thị trường hiện nay nhé!', 0, '1524903921', 'uploads/san-pham/cac-loai-tui-nilon-dung-hang-thinh-hanh-tren-thi-truong-mdY.jpg'),
(72, NULL, 1, 1, 0, 6, 2, 'Những ưu điểm khi in túi nilon', 'Túi nilon là loại bao bì đóng gói phổ biến trên thị trường, nếu được thiết kế in túi nilon một cách sáng tạo và độc đáo sẽ là một kênh quảng cáo marketing tuyệt vời và miễn phí.', '<p style=\"text-align:justify\">Khi được thiết kế in ấn độc đáo thì túi nilon (túi ni lông hoặc túi xốp)&nbsp;sẽ là một kênh quảng cáo tuyệt vời mà lại hoàn toàn miễn phí. Có thể nói, việc in quảng cáo trên túi nilon đã quá quen thuộc với mọi cửa hàng, mini shop, shop thời trang, siêu thị hay các&nbsp;doanh nghiệp. Túi nilon là loại bao bì đóng gói phổ biến trên thị trường, nếu được thiết kế <a href=\"http://inbaobiquoctien.com\"><strong>in túi nilon</strong></a> một cách sáng tạo và độc đáo sẽ là một kênh quảng cáo marketing&nbsp;tuyệt vời và miễn phí.</p>\n\n<h4 style=\"text-align:justify\">In túi nilon tạo sự khác biệt</h4>\n\n<p style=\"text-align:center\"><img alt=\"In Bao Bì Quốc Tiến - Những ưu điểm khi in túi nilon\" src=\"http://inbaobiquoctien.com/uploads/Images/tin-tuc/27-april-2018/inbaobiquoctien-nhung-uu-diem-khi-in-tui-nilon-1.jpg\" /></p>\n\n<p style=\"text-align:justify\">Như bạn thấy, so với túi nilon thông thường, việc in quảng cáo trên túi nilon tạo sự khác biệt&nbsp;rõ ràng.&nbsp;Các thông tin được in trên túi nilon như tên công ty - doanh nghiệp, logo, slogan, địa chỉ, số điện&nbsp;thoại, email... khiến túi nilon như là một chiếc card visit đa năng và được người sử dụng quảng cáo miễn phí.</p>\n\n<h4 style=\"text-align:justify\">Có thể in \"mọi thứ\" trên túi nilon&nbsp;</h4>\n\n<p style=\"text-align:center\"><img alt=\"In Bao Bì Quốc Tiên - Những ưu điểm khi in túi nilon\" src=\"http://inbaobiquoctien.com/uploads/Images/tin-tuc/27-april-2018/inbaobiquoctien-nhung-uu-diem-khi-in-tui-nilon-2.jpg\" /></p>\n\n<p style=\"text-align:justify\">Với các công nghệ in ngày nay (in ống đồng), các công ty sản xuất túi nilon có thể giúp bạn thực hiện mọi ý tưởng để tạo sự khác biệt cho thương hiệu doanh nghiệp. Đây là một trong những ưu điểm lớn nhất của<a href=\"http://inbaobiquoctien.com\"> <strong>in túi nilon</strong></a>.</p>\n\n<h4 style=\"text-align:justify\">In bao bì nilon khẳng định giá trị thương hiệu</h4>\n\n<p style=\"text-align:justify\">Chẳng phải ngẫu nhiên mà rất nhiều công ty sẵn sàng&nbsp;chi hàng đống tiền&nbsp;cho việc marketing trong đó có&nbsp;in ấn và thiết kế quảng cáo trên túi nilon. Có thể nói, bao bì sẽ thể hiện bộ mặt của công ty và khẳng định giá trị của doanh nghiệp.&nbsp;</p>\n\n<p style=\"text-align:center\"><img alt=\"In Bao Bì Quốc Tiến - Những ưu điểm khi in túi nilon 4\" src=\"http://inbaobiquoctien.com/uploads/Images/tin-tuc/27-april-2018/inbaobiquoctien-nhung-uu-diem-khi-in-tui-nilon-4.jpg\" /></p>\n\n<h4 style=\"text-align:justify\">Khả năng tiếp cận và lan truyền</h4>\n\n<p style=\"text-align:justify\">Mục đích của việc thiết kế <strong>in túi nilon</strong> là gây ấn tượng tới khách hàng. Một chiếc túi được in ấn độc đáo và đẹp mắt sẽ không chỉ tiếp cận tới 1 khách hàng, mà sẽ tạo \"hiệu ứng lan truyền\" tới hàng triệu người tiêu dùng. Bởi vậy, <strong><a href=\"http://inbaobiquoctien.com\">in túi xốp</a>&nbsp;</strong>là kênh quảng cáo miễn phí và hiệu quả.</p>\n\n<p style=\"text-align:justify\">Với tất cả lợi ích có thể mang lại, việc in quảng cáo trên túi nilon là rất cần thiết để doanh nghiệp của bạn tiếp cận tới khách hàng và quảng cáo thương hiệu nhanh chóng.&nbsp;&nbsp;<br />\nHãy liên hệ với <a href=\"http://inbaobiquoctien.com\"><strong>In Bao Bì Quốc Tiến</strong></a>&nbsp;để được tư vấn miễn&nbsp;phí và báo giá dịch vụ <strong>in túi nilon</strong> tốt nhất với chi phí tiết kiệm nhất.</p>\n\n<p style=\"text-align:justify\">&nbsp;</p>\n', 'nhung-uu-diem-khi-in-tui-nilon', '', 'in túi nilon, in túi nilon giá rẻ, in túi nilon số lượng ít, in túi xốp, in túi xốp giá rẻ, in túi xốp hcm,', 'Túi nilon là loại bao bì đóng gói phổ biến trên thị trường, nếu được thiết kế in túi nilon một cách sáng tạo và độc đáo sẽ là một kênh quảng cáo tuyệt vời và miễn phí.', 0, '1524836167', 'uploads/san-pham/nhung-uu-diem-khi-in-tui-nilon-om.jpg'),
(73, NULL, 1, 1, 0, 6, 2, 'Tại sao doanh nghiệp nên in túi nilon?', 'Việc đánh trúng vào tâm lý và thị hiếu của người tiêu dùng sẽ giúp tăng thị phần bán hàng của doanh nghiệp, đồng thời thương hiệu được quảng bá nhanh chóng. ', '<p style=\"text-align:justify\">Hiện nay tâm lý tiêu dùng của khách hàng đều được&nbsp;các cửa hàng, doanh nghiệp quan tâm hàng đầu,&nbsp;bởi sự cạnh tranh ngày một khốc liệt giữa các mặt hàng, các dịch vụ giữa các doanh nghiệp với nhau. Việc đánh trúng vào tâm lý và thị hiếu của người tiêu dùng sẽ giúp tăng thị phần bán hàng của doanh nghiệp. Đồng thời thương hiệu được quảng bá nhanh chóng. Và đặc biệt <a href=\"http://inbaobiquoctien.com\"><strong>in túi nilon</strong></a> là một phần rất quan trọng trong khâu marketing, bán hàng, và được các cửa hàng, doanh nghiệp đặc biệt&nbsp;quan tâm.</p>\n\n<p style=\"text-align:center\"><img alt=\"In Bao Bì Quốc Tiến - Tại sao doanh nghiệp nên in túi nilon\" src=\"http://inbaobiquoctien.com/uploads/Images/tin-tuc/27-april-2018/inbaobiquoctien-tai-sao-doanh-nghiep-nen-in-tui-nilon.jpg\" /></p>\n\n<p style=\"text-align:justify\">Việc <strong>in túi nilon</strong>&nbsp;(túi xốp) cũng là cách thức tiếp cận khách hàng nhanh nhất, những chiếc túi với thiết kế hình ảnh sinh động, bắt mắt&nbsp;sẽ khiến khách hàng cảm thấy thích thú hơn khi mua hàng. Và có thể&nbsp;quyết định mua hàng cho những lần tiếp theo sau khi sử dụng sản phẩm mà khách hàng cảm thấy hài lòng.</p>\n\n<p style=\"text-align:justify\">Việc in ấn logo, slogan hay&nbsp;thông tin quảng cáo của công ty lên túi nilon là một hình thức quảng cáo rất phổ biến đã hình thành từ rất lâu và trở nên ngày càng phổ biến và nó được các doanh nghiệp coi đây là một hình thức marketing truyền thống góp phần định vị thương hiệu. Một phần giúp khách hàng có thể nhớ đến cửa hàng hoặc công ty của mình trong tương lai, phần còn lại là chức năng đựng sản phẩm của cửa hàng và là một mảng marketing gần như hoàn toàn miễn phí.</p>\n\n<p style=\"text-align: center;\"><img alt=\"In Bao Bì Quốc Tiến - Tại sao doanh nên in túi nilon 1\" src=\"http://inbaobiquoctien.com/uploads/Images/tin-tuc/27-april-2018/inbaobiquoctien-tai-sao-doanh-nghiep-nen-in-tui-nilon-1.jpg\" /></p>\n\n<p style=\"text-align:justify\">Luôn luôn song hành cùng sản phẩm và tác dụng bậc nhất trong việc định vị sản phẩm, thương hiệu sản phẩm và&nbsp;doanh nghiệp trên thị trường. Dịch vụ<strong> <a href=\"http://inbaobiquoctien.com\">in túi ni lông giá rẻ</a></strong> tại <a href=\"http://inbaobiquoctien.com\"><strong>In Bao Bì Quốc Tiến</strong></a>&nbsp;với nhiều&nbsp;năm kinh nghiệm in ấn, kết hợp với công nghệ hiện đại, góp phần làm tôn thêm chất lượng sản phẩm, làm cho sản phẩm đẹp hơn, bắt mắt hơn cho Quý công ty, doanh nghiệp. Ngoài ra <strong>bao bì nilon</strong> còn thể hiện cá tính của sản phẩm, của công ty, doanh nghiệp&nbsp;so với các sản phẩm cùng loại khác trên thị trường.</p>\n\n<p style=\"text-align:justify\">Nếu công ty, doanh nghiệp bạn có nhu cầu in túi nilon với giá rẻ nhất, chất lượng in tối ưu nhất. Vui lòng liên hệ với chúng tôi để được tư vấn miễn phí.</p>\n', 'tai-sao-doanh-nghiep-nen-in-tui-nilon', '', 'in túi nilon, in túi nilon giá rẻ, in túi xốp giá rẻ, in túi xốp số lượng ít, in túi xốp tphcm, in bao bì túi xốp, ', 'In túi nilon là một phần rất quan trọng trong khâu marketing, bán hàng, và được các cửa hàng, doanh nghiệp đặc biệt quan tâm.', 0, '1524837862', 'uploads/san-pham/tai-sao-doanh-nghiep-nen-in-tui-nilon-Co8.jpg'),
(74, NULL, 1, 1, 0, 6, 2, 'Vì sao nên in túi xốp thời trang', 'Những mẫu in túi xốp giá rẻ nhưng chất lượng này không những có công dụng giúp cho khách hàng cầm nắm sản phẩm trên tay một cách dễ dàng.', '<p style=\"text-align:justify\">Hiện nay, với số lượng dân số trong độ tuổi lao động&nbsp;tuổi trẻ cao, nhu cầu chăm chút, làm đẹp&nbsp;cho bản thân và thể hiện cá tính hay style độc đáo của riêng mình là một trong những nhu cầu thiết thực. Nên những cửa hàng thời trang mọc lên như nấm sau mưa và phải cạnh tranh nhau từng khách hàng.</p>\n\n<p style=\"text-align:center\"><img alt=\"In Bao Bì Quốc Tiến - Vì sao nên in túi xốp thời trang\" src=\"http://inbaobiquoctien.com/uploads/Images/tin-tuc/03-may-2018/inbaobiquoctien-vi-sao-nen-in-tui-xop-thoi-trang.jpg\" /></p>\n\n<p style=\"text-align:justify\">Chính vì những lý do trên mà thị trường <a href=\"http://inbaobiquoctien.com\"><strong>in túi xốp thời trang</strong></a>&nbsp;để phục vụ cho nhu cầu chứa đựng hàng hóa cho khách hàng của những thương hiệu thời trang lớn, các cửa hàng, shop thời trang kinh doanh nhỏ lẻ. Tất cả đều có sự xuất hiện của những mẫu <strong>in túi xốp đựng quần áo</strong> và trở thành những vật dụng không thể thiếu trong suốt quá trình kinh doanh buôn bán&nbsp;và phục vụ cho khách hàng.</p>\n\n<h4 style=\"text-align:justify\">Lợi ích khi in túi xốp đựng quần áo</h4>\n\n<p style=\"text-align:justify\">Chính những nhu cầu thiết thực và rất lớn của thị trường túi xốp thời trang, các cơ sở sản xuất và <strong>in túi xốp thời trang</strong>&nbsp;luôn nâng cao chất lượng của trang thiết bị máy móc&nbsp;hiện đại hơn&nbsp;với mục đích sản xuất ra những sản phẩm <strong>túi xốp thời trang</strong>&nbsp;chất lượng nhất cung cấp cho thị trường và phục vụ khách hàng một cách chu đáo nhất có thể.</p>\n\n<p style=\"text-align:center\"><img alt=\"In Bao Bì Quốc Tiến - Vì sao nên in túi xốp thời trang 1\" src=\"http://inbaobiquoctien.com/uploads/Images/tin-tuc/03-may-2018/inbaobiquoctien-vi-sao-nen-in-tui-xop-thoi-trang-1.jpg\" /></p>\n\n<p style=\"text-align:justify\">Các sản phẩm túi xốp đựng quần áo với độ bền cơ học cao, dẻo và dai hơn những chất liệu khác rất nhiều, phù hợp với việc đựng những sản phẩm thời trang cho khách hàng, bảo vệ sản phẩm khỏi những va đập và nhàu nhĩ. Các sản phẩm <strong>túi xốp đựng quần áo</strong>&nbsp;được các cơ sở sản xuất cũng như những shop thời trang, cửa hàng buôn bán nhỏ lẻ thiết kế và in ấn với màu sắc, họa tiết độc đáo và thu hút người nhìn vào, nhất là khách hàng.&nbsp;Khi nhìn vào sẽ để lại ấn tượng và sự ghi nhớ tới cửa hàng của mình hơn. Là cơ hội cho cửa&nbsp;hàng thu hút khách quay lại vào những lần mua sắm tiếp theo.</p>\n\n<h4 style=\"text-align:justify\">Công dụng của túi xốp đựng quần áo</h4>\n\n<p style=\"text-align:justify\">Những mẫu <a href=\"http://inbaobiquoctien.com\"><strong>in túi xốp giá rẻ</strong></a>&nbsp;nhưng chất lượng này không những có công dụng giúp cho khách hàng cầm nắm sản phẩm trên tay một cách dễ dàng. Giúp bảo vệ sản phẩm khỏi những tác động từ bên ngoài&nbsp;trong suốt quá trình di chuyển của khách hàng. Ngoài ra, những chiếc túi xốp này còn có thể là phương tiện để marketing quảng bá hình ảnh&nbsp;thương hiệu của cửa hàng đến với đông đảo người tiêu dùng thông qua logo, tên thương hiệu và những họa tiết dược in ấn cẩn thẩn trên&nbsp;thân túi nilon.</p>\n\n<p style=\"text-align:center\"><img alt=\"In Bao Bì Quốc Tiến - Vì sao nên in túi xốp thời trang 2\" src=\"http://inbaobiquoctien.com/uploads/Images/tin-tuc/03-may-2018/inbaobiquoctien-vi-sao-nen-in-tui-xop-thoi-trang-2.jpg\" /></p>\n\n<p style=\"text-align:justify\">Với giá thành <a href=\"http://inbaobiquoctien.com/in-tui-xop-thoi-trang.html\"><strong>in túi xốp thời trang</strong></a>&nbsp;rẻ, chất lượng và có độ bền cao. Bên cạnh đó in túi xốp thời trang lại giúp quảng bá thương hiệu của cửa hàng, sản phẩm thì túi xốp đựng quần áo là một sự lựa chọn tuyệt vời cho những cửa&nbsp;hàng, shop kinh doanh quần áo, thời trang.</p>\n\n<p style=\"text-align:justify\">Hãy liên hệ ngay với <a href=\"http://inbaobiquoctien.com\"><strong>In Bao Bì Quốc Tiến</strong></a> để được tư vấn miễn phí để có những túi nilon thời trang với chi phí cực rẻ nhé!</p>\n\n<p>&nbsp;</p>\n', 'vi-sao-nen-in-tui-xop-thoi-trang', '', 'in túi xốp thời trang, in túi nilon thời trang, in túi xốp giá rẻ, in túi nilon giá rẻ, in túi xốp hcm, in túi nilon hcm,', 'Những mẫu in túi xốp giá rẻ nhưng chất lượng này không những có công dụng giúp cho khách hàng cầm nắm sản phẩm trên tay một cách dễ dàng.', 0, '1525362813', 'uploads/san-pham/vi-sao-nen-in-tui-xop-thoi-trang-7C1.jpg'),
(75, NULL, 1, 1, 0, 6, 2, 'In túi xốp ngân hàng giá rẻ', 'In túi xốp ngân hàng là một trong những sản phẩm túi xốp (túi nilon) ta có thể thấy được thường xuyên ở các ngân hàng khi đi giao dịch tiền bạc.', '<p style=\"text-align:justify\"><a href=\"http://inbaobiquoctien.com/in-tui-ngan-hang.html\"><strong>In túi xốp ngân hàng</strong></a> là một trong những sản phẩm túi xốp (túi nilon)&nbsp;ta có thể thấy được thường xuyên ở các ngân hàng khi đi giao dịch tiền bạc. Với đặc điểm của các loại túi nilon là chắc chắn, độ bền cao và chịu được các lực tác động bên ngoài cao, độ dẻo dai của túi&nbsp;và cả những thiết kế bắt mắt là những yếu tố quyết định đến sự tin dùng của các đơn vị ngân hàng khi sử dụng sản phẩm túi xốp in.</p>\n\n<h4 style=\"text-align:justify\">Yêu cầu của mẫu in túi xốp ngân hàng</h4>\n\n<p style=\"text-align:center\"><img alt=\"In Bao Bì Quốc Tiến - In túi xốp ngân hàng giá rẻ\" src=\"http://inbaobiquoctien.com/uploads/Images/tin-tuc/04-may-2018/inbaobiquoctien-in-tui-xop-ngan-hang-gia-re.jpg\" /></p>\n\n<p style=\"text-align:justify\">Với đặc điểm là sản phẩm túi xốp được dùng để đựng tiền trong quá trình giao dịch giữa ngân hàng với khách hàng. Chính vì vậy đòi hỏi những chiếc túi xốp phải được làm từ những chất liệu tốt nhất và có độ bền cao, không bị bung đáy&nbsp;hay bị đứt quai, rách túi… Các sản phẩm <a href=\"http://inbaobiquoctien.com/in-tui-ngan-hang.html\"><strong>in túi nilon ngân hàng&nbsp;giá rẻ</strong></a>&nbsp;được in ấn với nhiều loại màu sắc khác nhau tùy thuộc vào các đơn vị&nbsp; ngân hàng khác nhau. Các đơn vị có logo màu gì thì thường sẽ đặt in túi xốp cùng màu với logo đơn vị ngân hàng đó&nbsp;để dễ dàng nhận biết và phân biệt giữa các ngân hàng khác nhau và cũng chính là phương thức marketing của ngân hàng đó.</p>\n\n<p style=\"text-align:center\"><img alt=\"In Bao Bì Quốc Tiến - In túi xốp ngân hàng giá rẻ 1\" src=\"http://inbaobiquoctien.com/uploads/Images/tin-tuc/04-may-2018/inbaobiquoctien-in-tui-xop-ngan-hang-gia-re-1.jpg\" /></p>\n\n<p style=\"text-align:justify\"><a href=\"http://inbaobiquoctien.com\"><strong>In túi xốp ngân hàng</strong></a> là một tong những loại túi xốp phổ biến, bởi mỗi ngày trên các phiên giao dịch giữa các ngân hàng với khách hàng là rất đông, số lượng túi xốp ngân hàng được sử dụng rất nhiều trong quá trình giao dịch để đựng tiền, giấy tờ, sổ sách cho khách hàng thực hiện giao dịch. Những nhu cầu thiết thực đó được các cơ sở sản xuất, in ấn sản phẩm túi xốp ngân hàng nắm bắt và có nhứng phương án đáp ứng nhu cầu hiệu quả nhất.</p>\n\n<h4 style=\"text-align:justify\">In túi xốp ngân hàng như thế nào?</h4>\n\n<p style=\"text-align:justify\">Các cơ sở in ấn, kinh doanh các loại túi xốp luôn chịu khó cập nhật công nghệ, máy móc và trang bị các thiết bị hiện đại nhất với mục đích sản xuất ra những chiếc túi nilon chất lượng nhất, mẫu mã đẹp nhất để phục vụ cho nhu cầu của khách hàng về các loại túi xốp. Về mẫu mã và thiết kế, có một đội ngũ sáng tạo luôn lên ý tưởng, cập nhật các xu hướng mới nhất, nổi bật nhất để áp dụng vào các mẫu mã sản phẩm để mang đến cho người tiêu dùng, khách hàng những mẫu mã sản phẩm ấn tượng, hài lòng nhất&nbsp;và với chi phí thấp nhất có thể.</p>\n\n<p style=\"text-align:center\"><img alt=\"In Bao Bì Quốc Tiến - In túi xốp ngân hàng giá rẻ 2\" src=\"http://inbaobiquoctien.com/uploads/Images/tin-tuc/04-may-2018/inbaobiquoctien-in-tui-xop-ngan-hang-gia-re-2.jpg\" /></p>\n\n<p style=\"text-align:justify\">Những mẫu <strong>in túi xốp ngân hàng</strong> cao cấp được sản xuất với chất lượng tốt nhất, mẫu mã&nbsp;bắt mắt, cuốn hút&nbsp;và tạo ấn tượng cho người dùng. Ngoài ra, trên từng chiếc túi xốp ngân hàng, tên đơn vị ngân hàng,&nbsp;logo và câu slogan&nbsp;của đơn vị luôn là những chi tiết được đầu tư và in ấn ở những vị trí đẹp mắt nhất, nổi bật nhất và thu hút được người nhìn nhất. Những thông tin được in trên thân túi xốp là cách, là&nbsp;phương pháp marketing,&nbsp;giới thiệu dịch vụ, sản phẩm và thương hiệu của đơn vị ngân hàng đến gần hơn với người tiêu dùng, khách hàng hơn.</p>\n\n<p style=\"text-align:justify\">Khi có nhu cầu đặt <strong>in túi xốp ngân hàng</strong> của mình thì hãy liên hệ với <a href=\"http://inbaobiquoctien.com\"><strong>In Bao Bì Quốc Tiến</strong></a> để các nhân viên tư vấn cho quý khách và sẽ có nhiều ưu đãi khi quý khách đặt in với số lượng lớn. Bên cạnh việc <strong>in túi ngân hàng</strong>, chúng tôi&nbsp;còn cung cấp các sản phẩm in ấn&nbsp;khác như: in túi zipper đáy đứng, in túi xốp quai ép, in túi OPP, in túi PE… để phục vụ đa dạng cho nhu cầu quý khách.</p>\n', 'in-tui-xop-ngan-hang-gia-re', '', 'in túi xốp ngân hàng, in túi xốp ngân hàng giá rẻ, in túi nilon ngân hàng, in túi xốp hcm, in túi nilon hcm, in túi nilon giá rẻ, in túi xốp giá rẻ,', 'In túi xốp ngân hàng là một trong những sản phẩm túi xốp (túi nilon) ta có thể thấy được thường xuyên ở các ngân hàng khi đi giao dịch tiền bạc.', 0, '1525403564', 'uploads/san-pham/in-tui-xop-ngan-hang-gia-re-r39.jpg'),
(76, NULL, 1, 1, 0, 6, 2, 'Hồn của sản phầm nằm trên bao bì', 'In túi nilon (túi ni lông) hay còn gọi là in túi xốp là một nghệ thuật tô nên nét đẹp của sản phẩm bao bì. In bao bì giúp cho ta có thể truyền đạt những tâm tư, tình cảm vào sản phẩm tâm đắc của mình.', '<p style=\"text-align:justify\"><strong><a href=\"http://inbaobiquoctien.com\">In túi nilon</a> (túi ni lông)</strong>&nbsp;hay còn gọi là <a href=\"http://inbaobiquoctien.com\"><strong>in túi xốp</strong></a>&nbsp;là một nghệ thuật tô nên nét đẹp của sản phẩm bao bì. <strong>In bao bì</strong> giúp cho ta có thể truyền đạt những tâm tư, tình cảm vào sản phẩm tâm đắc của mình.</p>\n\n<p style=\"text-align:center\"><img alt=\"In Bao Bì Quốc Tiến - Hồn của sản phẩm nằm trên bao bì\" src=\"http://inbaobiquoctien.com/uploads/Images/tin-tuc/09-may-2018/inbaobiquoctien-hon-cua-san-pham-nam-tren-bao-bi.jpg\" /></p>\n\n<p style=\"text-align:justify\">Nếu để một sản phẩm riêng lẻ thì chúng ta ít chú ý đến bao bì. Mỗi sản phẩm phải chứng minh \"nhan sắc\" của mình qua bao bì. Bao bì là phần dễ nhìn thấy nhất của sản phẩm mang khả năng kích thích người mua khi đi qua một sản phẩm với <strong>in bao bì</strong> bắt mắt.</p>\n\n<p style=\"text-align:justify\">Người mua hàng muốn gì ở bao bì? Trước hết là yếu tố thẩm mỹ và&nbsp;\"bắt mắt\". Trước nhiều sản phẩm có thương hiệu xa lạ, chưa dùng bao giờ, thì sản phẩm có bao bì với kiểu dáng đẹp, có hình ảnh, kiểu chữ trình bày gây ấn tượng sẽ là yếu tố quyết định đến hành động mua hàng của khách hàng.</p>\n\n<p style=\"text-align:center\"><img alt=\"In Bao Bì Quốc Tiến - Hồn của sản phẩm nằm trên bao bì 1\" src=\"http://inbaobiquoctien.com/uploads/Images/tin-tuc/09-may-2018/inbaobiquoctien-hon-cua-san-pham-nam-tren-bao-bi-1.jpg\" /></p>\n\n<p style=\"text-align:justify\">Thứ đến là thông tin trên bao bì. Ở mức tối thiểu, bao bì phải có những thông tin như tên nhãn hiệu, đơn vị sản xuất, thành phần, số lượng, cách sử dụng, thời gian bảo hành (đối với các sản phẩm có thời gian bảo hành), thông tin liên hệ... Cuối cùng là sự tiện dụng: phải dễ sử dụng, dễ mở,&nbsp;dễ cất trữ và có thể tái sử dụng.</p>\n\n<p style=\"text-align:justify\">Người bán lẻ, nhìn bao bì sản phẩm dưới một khía cạnh khác: họ muốn hàng hóa đựng trong bao bì (túi xốp, túi nilon, thùng giấy, hộp kim loại...) phải dễ bốc xếp, bảo quản, hàng bên trong phải đúng số lượng ghi trong bao bì. Kiểu dáng bao bì phải tiện lợi cho việc trưng bày, có thể xếp chồng lên nhau trên kệ hàng. Và người bán cũng cần những thông tin trên bao bì để giải thích cho khách hàng khi khách hàng chỉ hỏi sơ qua mặt hàng nào đó mà chưa quyết định.</p>\n\n<p style=\"text-align:center\"><img alt=\"In Bao Bì Quốc Tiến - Hồn của sản phẩm nằm trên bao bì 2\" src=\"http://inbaobiquoctien.com/uploads/Images/tin-tuc/09-may-2018/inbaobiquoctien-hon-cua-san-pham-nam-tren-bao-bi-2.jpg\" /></p>\n\n<p style=\"text-align:justify\">Đối với một doanh nghiệp kinh doanh chuyên nghiệp, thì bao bì sản phẩm không chỉ là yếu tố thẩm mỹ. Việc thiết kế <a href=\"http://inbaobiquoctien.com\"><strong>in ấn&nbsp;bao bì</strong></a> nằm trong định hướng của chiến lược tiếp thị sản phẩm. Trong một thời gian theo định kỳ, nhà sản xuất phải đánh giá lại mẫu bao bì, đo lường tác dụng đối với người mua và thay đổi bao bì nếu thấy cần thiết. Thường quyết định thay đổi bao bì diễn ra trong những tình huống sau:</p>\n\n<ul style=\"margin-left:40px\">\n	<li style=\"text-align:justify\">Thay đổi bao bì trong một chiến dịch tiếp thị mới.</li>\n	<li style=\"text-align:justify\">Thay đổi vì bao bì hiện tại tỏ ra ít hấp dẫn so với sản phẩm cùng loại.</li>\n	<li style=\"text-align:justify\">&nbsp;Tạo một hình ảnh mới về thương hiệu.</li>\n	<li style=\"text-align:justify\">&nbsp;Phát huy giá trị sản phẩm đã được \"nâng cấp\" về chất lượng.</li>\n	<li style=\"text-align:justify\">&nbsp;Sử dụng được nguyên liệu để làm bao bì tốt hơn so với bao bì cũ.</li>\n</ul>\n\n<p style=\"text-align:justify\">Thực tế cho thấy có những thương hiệu sản phẩm nổi tiếng và thành công, nhà sản xuất vẫn quyết định thay đổi bao bì, tạo hình ảnh mới về sản phẩm và làm người mua không nhàm chán.</p>\n', 'hon-cua-san-pham-nam-tren-bao-bi', '', 'in bao bì, in ấn bao bì, in túi xốp, in túi nilon, in túi xốp giá rẻ, in túi nilon giá rẻ, in túi xốp tphcm,', 'In túi nilon (túi ni lông) hay còn gọi là in túi xốp là một nghệ thuật tô nên nét đẹp của sản phẩm bao bì. In bao bì giúp cho ta có thể truyền đạt những tâm tư, tình cảm', 0, '1525866515', 'uploads/san-pham/hon-cua-san-pham-nam-tren-bao-bi-SCB.jpg'),
(77, NULL, 1, 1, 0, 6, 2, 'Sử dụng túi nilon đúng cách hơn', 'Túi nilon (túi ni lông) như chúng ta đã biết, ngoài những ưu điểm và lợi ích mà nó mang lại cho cuộc sống, thì sự ảnh hưởng tới môi trường là điều không thể phủ nhận.', '<p style=\"text-align:justify\">Túi nilon (túi ni lông) như chúng ta đã biết, ngoài những ưu điểm và lợi ích mà nó mang lại cho cuộc sống, thì sự ảnh hưởng tới môi trường là điều không thể phủ nhận. Vậy làm thế nào để giảm bớt đi sức ảnh hưởng đó? Câu trả lời, trước hết, nằm ở cách sử dụng túi nilon một cách \"thông thái” từ phía người sử dụng.</p>\n\n<p style=\"text-align:center\"><img alt=\"In Bao Bì Quốc Tiến - Sử dụng túi nilon đúng cách hơn\" src=\"http://inbaobiquoctien.com/uploads/Images/tin-tuc/13-may-2018/inbaobiquoctien-su-dung-tui-nilon-dung-cach-hon.jpg\" /></p>\n\n<h3 style=\"text-align:justify\">Có thể làm gì với túi nilon?</h3>\n\n<p style=\"text-align:justify\">Có một điều mà tôi tin rằng chúng ta đều có thể làm được đó là tái sử dụng những chiếc túi nilon. Tại sao những chiếc túi nilon chỉ được sử dụng một lần sau khi mua sắm tại các cửa hàng rồi bị vứt ngay vào thùng rác, trong khi chúng có thể được dùng cho nhiều mục đích khác nữa? Việc tái sử dụng túi nilon là một biện pháp giảm thiểu rác thải và tiết kiệm chi phí hàng ngày. Nếu bạn chưa có ý tưởng nào thì dưới đây là một vài gợi ý:</p>\n\n<p style=\"text-align:justify\">Xem thêm:</p>\n\n<ul style=\"margin-left:40px\">\n	<li style=\"text-align:justify\"><a href=\"http://inbaobiquoctien.com/in-tui-xop-thoi-trang.html\">In túi xốp thời trang</a></li>\n	<li style=\"text-align:justify\"><a href=\"http://inbaobiquoctien.com/in-tui-xop-sieu-thi.html\">In túi xốp siêu thị</a></li>\n	<li style=\"text-align:justify\"><a href=\"http://inbaobiquoctien.com/in-tui-xop-ngan-hang.html\">In túi xốp ngân hàng</a></li>\n	<li style=\"text-align:justify\"><a href=\"http://inbaobiquoctien.com/in-tui-dung-cafe.html\">In túi đựng cafe</a></li>\n	<li style=\"text-align:justify\"><a href=\"http://inbaobiquoctien.com/in-tui-zipper-mang-ghep.html\">In túi zipper màng ghép</a></li>\n</ul>\n\n<h4 style=\"text-align:justify\">1. Túi đựng thực phẩm thừa</h4>\n\n<p style=\"text-align:center\"><img alt=\"In Bao Bì Quốc Tiến - Sử dụng túi nilon đúng cách hơn 2\" src=\"http://inbaobiquoctien.com/uploads/Images/tin-tuc/13-may-2018/inbaobiquoctien-su-dung-tui-nilon-dung-cach-hon-2.jpg\" /></p>\n\n<p style=\"text-align:justify\">Đôi khi gia đình bạn có một lượng lớn thức ăn thừa (sau những bữa tiệc) thì những chiếc túi nilon giá rẻ là cách tuyệt vời&nbsp;để bạn bảo quản số thực phẩm đó, tránh lãng phí, để có thể dùng được cho bữa ăn tiếp theo. Sử dụng túi nilon đựng thực phẩm sẽ chiếm ít không gian của tủ lạnh hơn là sử dụng các hộp chứa.</p>\n\n<h4 style=\"text-align:justify\">2. Túi đựng rác</h4>\n\n<p style=\"text-align:justify\">Chúng ta luôn tìm cách để tiết kiệm tiền, nhưng&nbsp;trong khi hầu hết chúng ta đều dễ dàng chi một khoản để mua túi lót thùng rác. Tại sao không giữ lại số tiền đó và tái sử dụng những túi nilon sau khi mua sắm hoặc đã sử dụng? Có thể tái sử dụng những chiếc túi nilon làm túi đựng rác gia đình, công ty hay cho chính ôtô của bạn.</p>\n\n<h4 style=\"text-align:justify\">3. Lưu trữ giấy tờ</h4>\n\n<p style=\"text-align:justify\">Túi nilon có thể cách li với môi trường bên ngoài, chống ẩm thấp, bụi bẩn và côn trùng. Chúng ta hoàn toàn có thể tái sử dụng túi nilon cho mục đích&nbsp;lưu giữ giấy tờ thay vì phải mua sắm thùng chứa. Đó cũng là cách để bạn tiết kiệm một khoản chi phí để làm việc đó.</p>\n\n<h4 style=\"text-align:justify\">4. Đóng gói đồ đạc, giữ chúng kho ráo trong mùa mưa</h4>\n\n<p style=\"text-align:center\"><img alt=\"In Bao Bì Quốc Tiến - Sử dụng túi nilon đúng cách hơn 1\" src=\"http://inbaobiquoctien.com/uploads/Images/tin-tuc/13-may-2018/inbaobiquoctien-su-dung-tui-nilon-dung-cach-hon-1.jpg\" /></p>\n\n<p style=\"text-align:justify\">Trong mỗi gia đình đều có những đồ đạc chỉ sử dụng theo mùa hoặc theo giai đoạn nào đó, và bạn lại lo lắng cách cất giữ chúng an toàn trong những mùa còn lại. Lúc này, túi nilon sẽ phát huy những ưu điểm tuyệt vời&nbsp;của nó. Đóng gói đồ dùng trong túi nilon để không sợ ẩm ướt, bụi bẩn hay oxy hoá…</p>\n\n<h4 style=\"text-align:justify\">5. Như một găng tay bảo bộ</h4>\n\n<p style=\"text-align:justify\">Công việc dọn dẹp nhà cửa, hay làm vườn… bạn có thể tận dụng những chiếc túi nilon như một bộ găng tay bảo hộ. Nó sẽ giúp bạn tránh tiếp xúc trực tiếp với bụi bẩn, dọn phân súc vật, đất vườn, hay những hoá chất độc hại như thuốc diệt cỏ…</p>\n\n<p style=\"text-align:justify\">Và vẫn còn rất nhiều cách dể bạn có thể tái sử dụng những chiếc túi nilon sau khi mua sắm. Đó không chỉ là biện pháp giúp bạn tiết kiệm chi tiêu, mà còn góp phần giảm thiểu số lượng rác thải nilon ra môi trường cũng như bảo vệ môi trường.</p>\n', 'su-dung-tui-nilon-dung-cach-hon', '', 'in túi nilon, in túi xốp, cách sử dụng túi nilon, túi nilon với môi trường, in túi xốp giá rẻ, in túi nilon giá rẻ,', 'Túi nilon (túi ni lông) như chúng ta đã biết, ngoài những ưu điểm và lợi ích mà nó mang lại cho cuộc sống, thì sự ảnh hưởng tới môi trường là điều không thể phủ nhận.', 0, '1526194762', 'uploads/san-pham/su-dung-tui-nilon-dung-cach-hon-T7.jpg'),
(78, NULL, 1, 1, 0, 6, 2, 'Xây dựng chiến lược marketing bằng in túi nilon', 'Ngoài các chiến lược marketing như: quảng cáo google, quảng cáo facebook, email marketing,… thì chúng ta còn một phương pháp khác đó là in bao bì, in túi nilon, in túi xốp', '<p style=\"text-align:justify\">Marketing là một trong những hoạt động&nbsp;không thể thiếu cho các công ty, doanh nghiệp. Bởi nó sẽ giúp công ty tăng thêm lượng khách hàng, tăng thêm&nbsp;doanh số kinh doanh, và đẩy nhanh tốc độ phát triển của công ty lớn manh hơn. Nhưng một câu hỏi đặt ra là làm thế nào để chúng ta có được một chiến lược marketing hiệu quả và tiết kiệm chi phí.</p>\n\n<p style=\"text-align:center\"><img alt=\"In Bao Bì Quốc Tiến - Xây dựng chiến lược marketing bằng in túi nilon 1\" src=\"http://inbaobiquoctien.com/uploads/Images/tin-tuc/18-may-2018/inbaobiquoctien-xay-dung-chien-luoc-marketing-bang-in-tui-nilon-1.jpg\" /></p>\n\n<p style=\"text-align:justify\">Ngoài các chiến lược marketing phổ biến hiện nay như: quảng cáo google, quảng cáo facebook, email marketing, sms marketing… thì chúng ta còn một phương pháp khác đó là in bao bì, <a href=\"http://inbaobiquoctien.com\"><strong>in túi nilon</strong></a> (<strong>in túi xốp</strong>).</p>\n\n<p style=\"text-align:justify\">Các sản phẩm của in bao bì, <strong>in túi nilon</strong> có thể giúp chúng ta quảng bá thương hiệu, sản phẩm của công ty một cách hiệu quả và tiết kiệm được rất nhiều chi phí.</p>\n\n<p style=\"text-align:center\"><img alt=\"In Bao Bì Quốc Tiến - Xây dựng chiến lược marketing bằng in túi nilon 3\" src=\"http://inbaobiquoctien.com/uploads/Images/tin-tuc/18-may-2018/inbaobiquoctien-xay-dung-chien-luoc-marketing-bang-in-tui-nilon-3.jpg\" /></p>\n\n<p style=\"text-align:justify\">Chúng ta có thể in trực tiếp logo, thông tin công ty (như địa chỉ, số điện thoại...),&nbsp;sản phẩn hay dịch vụ của công ty lên trên bao bì sẽ giúp người tiêu dùng có thể dễ dàng nhận ra thương hiệu, sản phẩm, dịch vụ&nbsp;của công ty, doanh nghiệp&nbsp;bạn.</p>\n\n<p style=\"text-align:center\"><img alt=\"In Bao Bì Quốc Tiến - Xây dựng chiến lược marketing bằng in túi nilon 4\" src=\"http://inbaobiquoctien.com/uploads/Images/tin-tuc/18-may-2018/inbaobiquoctien-xay-dung-chien-luoc-marketing-bang-in-tui-nilon-4.jpg\" /></p>\n\n<p style=\"text-align:justify\">Chúng tôi, <a href=\"http://inbaobiquoctien.com\"><strong>In Bao Bì Quốc Tiến</strong></a>&nbsp;– chuyên cung cấp và in bao bì, <strong>in túi nilon, <a href=\"http://inbaobiquoctien.com\">in túi xốp</a></strong>&nbsp;các loại như: túi nilon HD, PE, <a href=\"http://inbaobiquoctien.com/in-tui-xop-sieu-thi.html\"><strong>in túi xốp siêu thị</strong></a>, túi xốp ngân hàng,&nbsp;túi trà sữa, túi zipper, túi X quang, túi đựng gạo,…. Đến với chúng tôi, Quý khách được tư vấn một cách chu đáo và&nbsp;tận tình, được thiết kế mẫu miễn phí và giao hàng tận nơi trong nội thành Tp.Hồ Chí Minh.</p>\n', 'xay-dung-chien-luoc-marketing-bang-in-tui-nilon', '', 'in túi nilon, in túi xốp, in túi nilon giá rẻ, in túi xốp giá rẻ, in túi nilon hcm, in túi xốp hcm, in bao bì xốp,', 'Ngoài các chiến lược marketing như: quảng cáo google, quảng cáo facebook, email marketing,… thì chúng ta còn một phương pháp khác đó là in bao bì, in túi nilon, in túi xốp', 0, '1526650247', 'uploads/san-pham/xay-dung-chien-luoc-marketing-bang-in-tui-nilon-bWF.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `banner`
--

CREATE TABLE `banner` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `link` varchar(500) NOT NULL,
  `time` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  `img` varchar(500) NOT NULL,
  `type` int(11) NOT NULL,
  `hot` int(11) NOT NULL,
  `name_link` varchar(500) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

--
-- Dumping data for table `banner`
--

INSERT INTO `banner` (`id`, `name`, `link`, `time`, `status`, `weight`, `img`, `type`, `hot`, `name_link`) VALUES
(1, 'Đối tác panasonic', '', 1524207492, 1, 0, 'uploads/san-pham/uiWTb8cXiVRjLoqijwcjolQj0SLL1j5IlgwRwb1OUDki1FIzs.png', 2, 0, 'doi-tac-panasonic'),
(6, 'Banner trang chu', '', 1530847939, 1, 0, 'uploads/san-pham/jkUdb3lBNOLlWzAxUdsarpFStTz2zwfgatDdp76lwZiI3o01DS.jpg', 1, 1, 'banner-trang-chu'),
(8, 'Đối tác Dokodoc', '', 1524207507, 1, 0, 'uploads/san-pham/2GwcWWJoSioD6ix8FVhXUYUymZZzlmEeoyyZg3YgLTnJ4BPZS.png', 2, 1, 'doi-tac-dokodoc'),
(9, 'Đối tác fpt telecom', '', 1524207518, 1, 0, 'uploads/san-pham/bTuHzFqmoAdugveMtBdHVkq14clcmusCFCTv3VlOPkVA3IUf3n.png', 2, 1, 'doi-tac-fpt-telecom'),
(10, 'Đối tác I Love Pho', '', 1524207533, 1, 0, 'uploads/san-pham/6g6BaYsxtllMZsFnmPV50hN5eHR8PCnqZFOahog1LGDkbDTAPI.png', 2, 1, 'doi-tac-i-love-pho'),
(11, 'Đối tác Sacombank', '', 1524207545, 1, 0, 'uploads/san-pham/mNO1riwgWAldAFBmoNkTP8Y1qhbREIomcndKhsb44LdinEtJ8I.png', 2, 1, 'doi-tac-sacombank'),
(13, 'Ngân hàng Sacombank', '', 1525752763, 1, 2, 'uploads/san-pham/ZwvMfDQfRUzCg9LMTHk4l1F0pAzTxGSuVehhS97y7fDbU6d8Wx.jpg', 3, 1, 'ngan-hang-sacombank'),
(14, 'FPT Asia Pacific', '', 1524528813, 1, 0, 'uploads/san-pham/5wLC0FFM7MPiHTUez3A9Tk9PM0r1OlCF3MLTYM7ThE6wrbtoTi.jpg', 3, 1, 'fpt-asia-pacific'),
(15, 'X70 Shop', '', 1524528824, 1, 0, 'uploads/san-pham/2hPRWY47IINR2gTmXWwcDwayVUEO95nuQTgJPH2pcJw5T36ZhP.jpg', 3, 1, 'x70-shop'),
(16, 'I Love Phở', '', 1524528839, 1, 0, 'uploads/san-pham/mFwyvH5ULImhMsbWSwNwCSc8mBLqrtmQE5bcUD8liaZVVAmQnd.jpg', 3, 1, 'i-love-pho'),
(17, 'Polly Kitchen', '', 1524528868, 1, 0, 'uploads/san-pham/JDC7STYvCXul7CDY4A7fsRZCAULJcjZjZ9sMhDWmLU1YUyFvry.jpg', 3, 1, 'polly-kitchen'),
(18, 'SM Smaker', '', 1524528893, 1, 0, 'uploads/san-pham/G0AVDK4gXIATW9IyfW9U6XjfAclnklzkVZLxoWXy9zA6W5od.jpg', 3, 1, 'sm-smaker'),
(19, 'Phong Cách Mới Fashion', '', 1524528924, 1, 0, 'uploads/san-pham/U2TPlYNYy7dviONniS8g1imuFS1AVKOEZknYtUvva3w0Wx5.jpg', 3, 1, 'phong-cach-moi-fashion'),
(23, 'Đối tác Thế Giới Đèn Gỗ', '', 1524207938, 1, 0, 'uploads/san-pham/ygkT0oISzjZe7xtywXHYASC4CGGMkWudt54S7g625t4NNoAl.png', 2, 0, 'doi-tac-the-gioi-den-go'),
(24, 'Đối tác X70 Shop', '', 1524208205, 1, 0, 'uploads/san-pham/A5mTSJFQrArIHy0uWiczBPjJvQfBc5a8boh8Y5MYaXdczwnfF.png', 2, 1, 'doi-tac-x70-shop'),
(25, 'Đối tác Erayba shop', '', 1524208726, 1, 0, 'uploads/san-pham/frXRg19LawuSXRFpw2ZkoiWNwr0vVdPRHC09kV3HpWjqiwweeF.png', 2, 1, 'doi-tac-erayba-shop'),
(26, 'Đối tác Việt Tin Bank', '', 1524209974, 1, 0, 'uploads/san-pham/NElBPdveokiqhL6fIZxYKqRok8qWMCg2cWa16bQZKdYekwoI.png', 2, 1, 'doi-tac-viet-tin-bank'),
(27, 'QUICSEAL', '', 1525419272, 1, 0, 'uploads/san-pham/M8e9LBc9H2L2rH0cc6E547mNo5JRGJFK77A8Ezk5Vu1wjW.jpg', 3, 1, 'quicseal'),
(28, 'Shop Da Da', '', 1525419760, 1, 0, 'uploads/san-pham/XlWxuJ34WiHVSSyrnbtX3cyCubuoNHwXcT2CYBEJ5FCalsWj97.jpg', 3, 1, 'shop-da-da');

-- --------------------------------------------------------

--
-- Table structure for table `category`
--

CREATE TABLE `category` (
  `id` int(11) NOT NULL,
  `weight` int(11) DEFAULT NULL,
  `time` int(11) DEFAULT NULL,
  `time1` int(11) DEFAULT NULL,
  `status` tinyint(1) DEFAULT NULL,
  `top` int(11) DEFAULT NULL,
  `author` int(11) DEFAULT NULL,
  `type` int(11) NOT NULL,
  `img` varchar(300) DEFAULT NULL,
  `hot` int(11) DEFAULT NULL,
  `name` varchar(500) DEFAULT NULL,
  `link` varchar(500) DEFAULT NULL,
  `keywords` varchar(300) DEFAULT NULL,
  `title` varchar(300) DEFAULT NULL,
  `description` varchar(300) DEFAULT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8 ROW_FORMAT=DYNAMIC;

--
-- Dumping data for table `category`
--

INSERT INTO `category` (`id`, `weight`, `time`, `time1`, `status`, `top`, `author`, `type`, `img`, `hot`, `name`, `link`, `keywords`, `title`, `description`) VALUES
(37, 0, 1530851320, NULL, 1, 0, NULL, 2, NULL, 0, 'Hoạt Động Bán Hàng', 'hoat-dong-ban-hang', 'Hoạt Động Bán Hàng', 'Hoạt Động Bán Hàng', 'Hoạt Động Bán Hàng'),
(36, 0, 1530846596, NULL, 1, 35, NULL, 2, NULL, 0, 'Bí Quyết Làm Đẹp 1', 'bi-quyet-lam-dep-1', 'Bí Quyết Làm Đẹp 1', 'Bí Quyết Làm Đẹp 1', 'Bí Quyết Làm Đẹp 1'),
(35, 0, 1530846446, NULL, 1, 0, NULL, 2, NULL, 0, 'Bí Quyết Làm Đẹp', 'bi-quyet-lam-dep', 'Bí Quyết Làm Đẹp', 'Bí Quyết Làm Đẹp', 'Bí Quyết Làm Đẹp');

-- --------------------------------------------------------

--
-- Table structure for table `ci_sessions`
--

CREATE TABLE `ci_sessions` (
  `session_id` varchar(40) NOT NULL DEFAULT '0',
  `ip_address` varchar(45) NOT NULL DEFAULT '0',
  `user_agent` varchar(120) NOT NULL,
  `last_activity` int(10) UNSIGNED NOT NULL DEFAULT '0',
  `user_data` text NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `ci_sessions`
--

INSERT INTO `ci_sessions` (`session_id`, `ip_address`, `user_agent`, `last_activity`, `user_data`) VALUES
('895f8287fdacefe1cd8d9a47c33db2af', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 1530851865, ''),
('bdf3f13ae9c44516793127ae24b40c04', '::1', 'Mozilla/5.0 (Windows NT 6.1; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/67.0.3396.99 Safari/537.36', 1530847900, '');

-- --------------------------------------------------------

--
-- Table structure for table `company`
--

CREATE TABLE `company` (
  `id` int(11) NOT NULL,
  `name` varchar(300) DEFAULT NULL,
  `keywords` varchar(300) DEFAULT NULL,
  `description` varchar(300) DEFAULT NULL,
  `phone` varchar(500) DEFAULT NULL,
  `mobile` varchar(500) DEFAULT NULL,
  `fax` varchar(100) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `logo` varchar(200) DEFAULT NULL,
  `map` text,
  `face` varchar(300) NOT NULL,
  `youtube` varchar(300) NOT NULL,
  `address` varchar(1000) DEFAULT NULL,
  `contact` text,
  `sitemap` varchar(500) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL,
  `footer` text,
  `analytic` varchar(1000) NOT NULL,
  `twitter` varchar(400) NOT NULL,
  `gg` varchar(400) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `company`
--

INSERT INTO `company` (`id`, `name`, `keywords`, `description`, `phone`, `mobile`, `fax`, `email`, `logo`, `map`, `face`, `youtube`, `address`, `contact`, `sitemap`, `footer`, `analytic`, `twitter`, `gg`) VALUES
(1, 'SERUM DƯỠNG TRẮNG DA WICBE - CHẤT LƯỢNG HÀNG ĐẦU', 'SERUM DƯỠNG TRẮNG DA WICBE - CHẤT LƯỢNG HÀNG ĐẦU', 'SERUM DƯỠNG TRẮNG DA WICBE - CHẤT LƯỢNG HÀNG ĐẦU', '0971970076', ' 0918582277', '(04) 2321 2118', ' info@hoangtran.com.vn', 'uploads/san-pham/d8rZ1W4I36FAtMPocuHimqawOpIzEhKHcVivPam8zPz3Uw0Z.png', 'www.chatdotcongnghiep.com', 'https://www.facebook.com/Inbaobiquoctien/', '', '', '<p><strong>CÔNG TY CỔ PHẦN SOSENCO</strong></p>\r\n\r\n<p>SĐT: 0932.98.18.98</p>\r\n\r\n<p>Địa chỉ: A8/6Q, Đường 1A, Ấp 1A,Vĩnh Lộc, Bình Chánh, HCM&nbsp;</p>\r\n\r\n<p>Email : phantandong86@gmail.com</p>\r\n', '0', '<p><strong>CÔNG TY CỔ PHẦN SOSENCO</strong></p>\r\n\r\n<p>SĐT: 0932.98.18.98</p>\r\n\r\n<p>Địa chỉ: A8/6Q, Đường 1A, Ấp 1A,Vĩnh Lộc, Bình Chánh, HCM&nbsp;</p>\r\n\r\n<p>Email :&nbsp;phantandong86@gmail.com</p>\r\n', '', '', '');

-- --------------------------------------------------------

--
-- Table structure for table `contact`
--

CREATE TABLE `contact` (
  `id` int(11) NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `phone` varchar(250) DEFAULT NULL,
  `note` text,
  `date_reseive` datetime DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `id_product` int(11) NOT NULL DEFAULT '0',
  `type` int(11) NOT NULL,
  `address` varchar(300) NOT NULL,
  `soluong` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `contact`
--

INSERT INTO `contact` (`id`, `name`, `email`, `phone`, `note`, `date_reseive`, `status`, `id_product`, `type`, `address`, `soluong`) VALUES
(82, NULL, 'huynhkimngadtu@gmail.com', NULL, NULL, '2018-04-20 12:07:23', 0, 0, 4, '', 0),
(81, NULL, 'huynhkimngadtu@gmail.com', NULL, NULL, '2018-04-20 12:00:36', 0, 0, 4, '', 0),
(80, NULL, 'huynhkimngadtu@gmail.com', NULL, NULL, '2018-04-20 11:59:46', 0, 0, 4, '', 0),
(79, NULL, 'huynhkimngadtu@gmail.com', NULL, NULL, '2018-04-20 11:59:34', 0, 0, 4, '', 0),
(83, NULL, 'hanh02468@gmail.com', NULL, NULL, '2018-05-24 08:44:24', 0, 0, 4, '', 0),
(84, NULL, 'ochuy1992@gmail.com', NULL, NULL, '2018-06-09 00:10:56', 0, 0, 4, '', 0),
(85, NULL, 'phuongthao301pt@gmail.com', NULL, NULL, '2018-07-04 23:11:59', 0, 0, 4, '', 0);

-- --------------------------------------------------------

--
-- Table structure for table `country`
--

CREATE TABLE `country` (
  `id` int(11) NOT NULL,
  `name` varchar(5) NOT NULL,
  `unit` varchar(20) NOT NULL,
  `status` int(1) NOT NULL DEFAULT '1',
  `picture` varchar(30) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `country`
--

INSERT INTO `country` (`id`, `name`, `unit`, `status`, `picture`) VALUES
(1, 'vn', 'đ', 1, 'vn.png'),
(2, 'en', 'usd', 0, 'en.png'),
(3, 'jp', '', 0, 'jp.png');

-- --------------------------------------------------------

--
-- Table structure for table `item`
--

CREATE TABLE `item` (
  `id` int(11) NOT NULL,
  `name` varchar(500) NOT NULL,
  `code` varchar(300) NOT NULL,
  `link` varchar(500) NOT NULL,
  `keywords` varchar(500) NOT NULL,
  `description` varchar(500) NOT NULL,
  `title` varchar(500) NOT NULL,
  `content` text NOT NULL,
  `content1` text NOT NULL,
  `img` varchar(500) NOT NULL,
  `cate` int(11) NOT NULL,
  `weight` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `type` int(11) NOT NULL,
  `hot` int(11) NOT NULL,
  `summary` varchar(1000) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `other_img`
--

CREATE TABLE `other_img` (
  `id_item` int(11) NOT NULL,
  `img` varchar(500) CHARACTER SET utf8 NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `other_img`
--

INSERT INTO `other_img` (`id_item`, `img`) VALUES
(28, 'in-tui-xop-thoi-trang-l8w.jpg'),
(28, 'in-tui-xop-thoi-trang-oDZ.jpg'),
(30, 'in-tui-cafe-9ed.jpg'),
(30, 'in-tui-cafe-Ngq.jpg'),
(31, 'in-tui-zipper-mang-ghep-cfs.jpg'),
(31, 'in-tui-zipper-mang-ghep-UdO.jpg'),
(31, 'in-tui-zipper-mang-ghep-fgW.jpg'),
(30, 'tui-cafe-VWG.jpg'),
(33, 'in-hop-giay-EbY.jpg'),
(33, 'in-hop-giay-Rb4.jpg'),
(33, 'in-hop-giay-BSo.jpg'),
(37, 'in-bao-thu-Srd.jpg'),
(37, 'in-bao-thu-kow.jpg'),
(37, 'in-bao-thu-Aw3.jpg'),
(38, 'carton-SW.jpg'),
(38, 'carton-36O.jpg'),
(38, 'carton-cZH.jpg'),
(36, 'in-tui-dung-phim-x-quang-Y7C.jpg'),
(30, 'in-tui-dung-cafe-l3g.jpg'),
(28, 'in-tui-xop-thoi-trang-F89.jpg'),
(39, 'in-tui-ngan-hang-XBK.jpg'),
(39, 'in-tui-ngan-hang-3GU.jpg'),
(43, 'in-lich-HB.jpg'),
(43, 'in-lich-wXQ.jpg'),
(43, 'in-lich-qHD.jpg'),
(40, 'in-tui-pe-pp-opp-v7w.jpg'),
(34, 'in-gia-cong-tren-nhieu-chat-lieu-DSg.jpg'),
(41, 'in-tui-dung-my-pham-WEl.jpg'),
(41, 'in-tui-dung-my-pham-Jua.jpg'),
(41, 'in-tui-dung-my-pham-HA.jpg'),
(41, 'in-tui-dung-my-pham-5zM.jpg'),
(41, 'in-tui-dung-my-pham-vuA.jpg'),
(39, 'in-tui-xop-ngan-hang-uXw.jpg'),
(39, 'in-tui-xop-ngan-hang-hU6.jpg'),
(39, 'in-tui-xop-ngan-hang-yd.jpg'),
(42, 'in-tui-xop-sieu-thi-4GK.jpg'),
(42, 'in-tui-xop-sieu-thi-Tdf.jpg'),
(42, 'in-tui-xop-sieu-thi-jgY.jpg'),
(42, 'in-tui-xop-sieu-thi-eUQ.jpg'),
(28, 'in-tui-xop-thoi-trang-q7R.jpg'),
(28, 'in-tui-xop-thoi-trang-eaD.jpg'),
(28, 'in-tui-xop-thoi-trang-8S8.jpg'),
(44, 'tui-uom-cay-Y5Y.jpg'),
(36, 'in-tui-dung-phim-x-quang-aEX.jpg'),
(45, 'in-tui-quai-ep-zVf.jpg'),
(45, 'in-tui-quai-ep-GfO.jpg'),
(45, 'in-tui-quai-ep-mkF.jpg'),
(46, 'in-tui-hot-xoai-pp-pe-trong-oAX.jpg'),
(46, 'in-tui-hot-xoai-pp-pe-trong-K8g.jpg');

-- --------------------------------------------------------

--
-- Table structure for table `question`
--

CREATE TABLE `question` (
  `id` int(11) NOT NULL,
  `name` varchar(250) DEFAULT NULL,
  `email` varchar(250) DEFAULT NULL,
  `note` text,
  `created_date` datetime DEFAULT NULL,
  `status` tinyint(1) NOT NULL DEFAULT '0',
  `question` int(1) NOT NULL DEFAULT '0',
  `answer` int(1) NOT NULL DEFAULT '0',
  `id_question` int(11) NOT NULL DEFAULT '0',
  `id_country` int(1) NOT NULL DEFAULT '1'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `question`
--

INSERT INTO `question` (`id`, `name`, `email`, `note`, `created_date`, `status`, `question`, `answer`, `id_question`, `id_country`) VALUES
(1, 'admin', 'sales@avitrade.net', '<p>asdasd</p>', '2013-11-28 09:37:25', 1, 1, 0, 0, 2);

-- --------------------------------------------------------

--
-- Table structure for table `tags`
--

CREATE TABLE `tags` (
  `id` int(11) NOT NULL,
  `name` varchar(300) DEFAULT NULL,
  `title` varchar(300) NOT NULL,
  `keywords` varchar(300) NOT NULL,
  `description` varchar(300) NOT NULL,
  `link` varchar(300) DEFAULT NULL,
  `weight` int(11) NOT NULL,
  `time` int(11) NOT NULL,
  `status` int(11) NOT NULL,
  `content` text NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tags_id`
--

CREATE TABLE `tags_id` (
  `id_tags` int(11) NOT NULL,
  `id` int(11) NOT NULL,
  `type` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_group`
--

CREATE TABLE `tbl_group` (
  `gr_id` int(11) NOT NULL,
  `gr_name` varchar(100) NOT NULL DEFAULT '-1',
  `gr_des` text
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- --------------------------------------------------------

--
-- Table structure for table `tbl_user`
--

CREATE TABLE `tbl_user` (
  `user_id` int(11) NOT NULL,
  `user_loginname` varchar(50) NOT NULL DEFAULT '-1',
  `user_password` varchar(100) NOT NULL DEFAULT '-1',
  `user_name` varchar(100) NOT NULL DEFAULT '-1',
  `user_birthday` date DEFAULT NULL,
  `user_note` text NOT NULL,
  `user_status` tinyint(1) NOT NULL DEFAULT '0',
  `user_date` datetime DEFAULT NULL,
  `user_modify` datetime DEFAULT NULL,
  `per` varchar(500) DEFAULT NULL,
  `group` int(11) NOT NULL DEFAULT '2',
  `phone` varchar(300) CHARACTER SET utf8 COLLATE utf8_unicode_ci NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `tbl_user`
--

INSERT INTO `tbl_user` (`user_id`, `user_loginname`, `user_password`, `user_name`, `user_birthday`, `user_note`, `user_status`, `user_date`, `user_modify`, `per`, `group`, `phone`) VALUES
(1, 'spadmin', '9f48495bb4b98ac37a1a72c7e6490c7a', 'Super Admin', '1988-09-02', '', 1, '2012-10-13 09:10:11', '2012-10-13 09:10:12', 'a:1:{i:0;s:4:\"full\";}', 1, ''),
(6, 'admin', 'b06541fdfea30bca8ea70290e7893028', 'admin', NULL, '', 1, NULL, '2014-04-15 18:20:38', 'a:1:{i:0;s:4:\"full\";}', 1, ''),
(12, 'huynhkimnga', 'd41d8cd98f00b204e9800998ecf8427e', 'Huỳnh Kim Nga', NULL, 'huynhkimngadtu@gmail.com', 0, NULL, '2015-09-21 17:31:49', NULL, 2, '');

-- --------------------------------------------------------

--
-- Table structure for table `truycap`
--

CREATE TABLE `truycap` (
  `dem` int(11) NOT NULL,
  `id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- Dumping data for table `truycap`
--

INSERT INTO `truycap` (`dem`, `id`) VALUES
(8725, 1);

-- --------------------------------------------------------

--
-- Table structure for table `user_admin`
--

CREATE TABLE `user_admin` (
  `id` int(11) NOT NULL,
  `id_user` int(11) NOT NULL,
  `web` int(11) NOT NULL,
  `thongtin` int(11) NOT NULL,
  `huongdan` int(11) NOT NULL,
  `banner` int(11) NOT NULL,
  `quangcao` int(11) NOT NULL,
  `size` int(11) NOT NULL,
  `color` int(11) NOT NULL,
  `suutap` int(11) NOT NULL,
  `cate` int(11) NOT NULL,
  `sanpham` int(11) NOT NULL,
  `comment_1` int(11) NOT NULL,
  `comment_2` int(11) NOT NULL,
  `thoitrang` int(11) NOT NULL,
  `nganhang` int(11) NOT NULL,
  `user` int(11) NOT NULL,
  `donhang` int(11) NOT NULL,
  `lienhe` int(11) NOT NULL,
  `hethong` int(11) NOT NULL,
  `tintuc` int(11) NOT NULL,
  `video` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_admin`
--

INSERT INTO `user_admin` (`id`, `id_user`, `web`, `thongtin`, `huongdan`, `banner`, `quangcao`, `size`, `color`, `suutap`, `cate`, `sanpham`, `comment_1`, `comment_2`, `thoitrang`, `nganhang`, `user`, `donhang`, `lienhe`, `hethong`, `tintuc`, `video`) VALUES
(2, 12, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0, 1, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_customer`
--

CREATE TABLE `user_customer` (
  `id` int(11) NOT NULL,
  `name` varchar(200) DEFAULT NULL,
  `address` varchar(500) DEFAULT NULL,
  `email` varchar(200) DEFAULT NULL,
  `mobile` varchar(50) DEFAULT NULL,
  `note` text,
  `points` int(11) NOT NULL DEFAULT '0',
  `status` int(11) NOT NULL,
  `code` varchar(300) NOT NULL,
  `password` varchar(100) NOT NULL,
  `general` int(1) NOT NULL DEFAULT '1',
  `birthday` int(11) DEFAULT NULL,
  `id_province` int(11) NOT NULL DEFAULT '0',
  `id_agent` int(11) NOT NULL DEFAULT '0'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

--
-- Dumping data for table `user_customer`
--

INSERT INTO `user_customer` (`id`, `name`, `address`, `email`, `mobile`, `note`, `points`, `status`, `code`, `password`, `general`, `birthday`, `id_province`, `id_agent`) VALUES
(23, 'test', 'test', 'test@gmail.com', 'test', NULL, 0, 1, 'kOMJGgzBxIVOT2JUI8yBjs1ISHitFZap_13-2015', 'c4ca4238a0b923820dcc509a6f75849b', 0, 0, 0, 0),
(24, 'test', '', 'test@gmail.com', 'test', '', 0, 0, '', 'e10adc3949ba59abbe56e057f20f883e', 1, NULL, 0, 0),
(25, 'fsdf', 'dsfsdf', 'dsf@gmail.com', 'dsfsdf', NULL, 0, 1, '0', 'c4ca4238a0b923820dcc509a6f75849b', 0, 0, 0, 0),
(26, 'THÂN ĐỨC HÒA', 'HCM', 'info@thanduchoa.org', '0915786039', NULL, 0, 1, '0', '2ed5f7a484d9c00b5d6057f71310b3c5', 0, 0, 0, 0);

-- --------------------------------------------------------

--
-- Table structure for table `user_online`
--

CREATE TABLE `user_online` (
  `session` char(100) NOT NULL DEFAULT '',
  `time` int(11) NOT NULL DEFAULT '0',
  `time1` int(11) NOT NULL
) ENGINE=MyISAM DEFAULT CHARSET=latin1;

--
-- Dumping data for table `user_online`
--

INSERT INTO `user_online` (`session`, `time`, `time1`) VALUES
('e4704cbd70868731a08fa723a98d5717', 1442144402, 0),
('65a2124cd58d2e0b84525881ad3e1c54', 1442144363, 0);

-- --------------------------------------------------------

--
-- Table structure for table `yahoo`
--

CREATE TABLE `yahoo` (
  `id` int(11) NOT NULL,
  `name` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `nick` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `status` int(1) NOT NULL,
  `weight` int(11) NOT NULL,
  `date_create` datetime NOT NULL,
  `author` int(11) NOT NULL,
  `type` int(1) NOT NULL DEFAULT '0',
  `phone` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `name_en` varchar(100) COLLATE utf8_unicode_ci NOT NULL,
  `skype` varchar(100) COLLATE utf8_unicode_ci NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8 COLLATE=utf8_unicode_ci;

--
-- Indexes for dumped tables
--

--
-- Indexes for table `article`
--
ALTER TABLE `article`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `banner`
--
ALTER TABLE `banner`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `category`
--
ALTER TABLE `category`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `ci_sessions`
--
ALTER TABLE `ci_sessions`
  ADD PRIMARY KEY (`session_id`),
  ADD KEY `last_activity_idx` (`last_activity`);

--
-- Indexes for table `company`
--
ALTER TABLE `company`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `contact`
--
ALTER TABLE `contact`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `country`
--
ALTER TABLE `country`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `item`
--
ALTER TABLE `item`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `question`
--
ALTER TABLE `question`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tags`
--
ALTER TABLE `tags`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `tbl_group`
--
ALTER TABLE `tbl_group`
  ADD PRIMARY KEY (`gr_id`);

--
-- Indexes for table `tbl_user`
--
ALTER TABLE `tbl_user`
  ADD PRIMARY KEY (`user_id`);

--
-- Indexes for table `user_admin`
--
ALTER TABLE `user_admin`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `user_customer`
--
ALTER TABLE `user_customer`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `yahoo`
--
ALTER TABLE `yahoo`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `article`
--
ALTER TABLE `article`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=79;

--
-- AUTO_INCREMENT for table `banner`
--
ALTER TABLE `banner`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=29;

--
-- AUTO_INCREMENT for table `category`
--
ALTER TABLE `category`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=38;

--
-- AUTO_INCREMENT for table `company`
--
ALTER TABLE `company`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=5;

--
-- AUTO_INCREMENT for table `contact`
--
ALTER TABLE `contact`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `country`
--
ALTER TABLE `country`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

--
-- AUTO_INCREMENT for table `item`
--
ALTER TABLE `item`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `question`
--
ALTER TABLE `question`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `tags`
--
ALTER TABLE `tags`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_group`
--
ALTER TABLE `tbl_group`
  MODIFY `gr_id` int(11) NOT NULL AUTO_INCREMENT;

--
-- AUTO_INCREMENT for table `tbl_user`
--
ALTER TABLE `tbl_user`
  MODIFY `user_id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=13;

--
-- AUTO_INCREMENT for table `user_admin`
--
ALTER TABLE `user_admin`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

--
-- AUTO_INCREMENT for table `user_customer`
--
ALTER TABLE `user_customer`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=27;

--
-- AUTO_INCREMENT for table `yahoo`
--
ALTER TABLE `yahoo`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
