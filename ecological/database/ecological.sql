SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- 資料庫： `ecological`
--

-- --------------------------------------------------------

--
-- 資料表結構 `data`
--

CREATE TABLE `data` (
  `ID` bigint(20) UNSIGNED NOT NULL,
  `usual_name` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `classification` tinyint(4) DEFAULT NULL,
  `s_kingdom` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `s_kingdom_chinese` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `s_phylum` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `s_phylum_chinese` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `s_class` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `s_class_chinese` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `s_order` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `s_order_chinese` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `s_family` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `s_family_chinese` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `s_genus` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `s_genus_chinese` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `s_species` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `s_species_chinese` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `scientific_name` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `scientific_name_chinese` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `description` text CHARACTER SET utf8 COLLATE utf8_unicode_ci,
  `acting_scope` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `habit` varchar(200) CHARACTER SET utf8 COLLATE utf8_unicode_ci DEFAULT NULL,
  `image` text CHARACTER SET utf8 COLLATE utf8_unicode_ci
) ENGINE=InnoDB DEFAULT CHARSET=latin1;

--
-- 資料表的匯出資料 `data`
--

INSERT INTO `data` (`ID`, `usual_name`, `classification`, `s_kingdom`, `s_kingdom_chinese`, `s_phylum`, `s_phylum_chinese`, `s_class`, `s_class_chinese`, `s_order`, `s_order_chinese`, `s_family`, `s_family_chinese`, `s_genus`, `s_genus_chinese`, `s_species`, `s_species_chinese`, `scientific_name`, `scientific_name_chinese`, `description`, `acting_scope`, `habit`, `image`) VALUES
(1, '阿根廷角蛙', 1, 'Animalia', '動物界', 'Chordata', '脊索動物門', 'Amphibia', '兩棲綱', 'Anura', '無尾目', 'Hyloidea', '雨蛙總科', 'Ceratophrys', '角花蟾屬', 'C. ornata', '', 'Ceratophrys ornata', '', '有鮮明的體色，大部份皆為深綠色且帶有深紅色線條，但也有因地區的不同而呈紅色的個體，全身布滿了不規則斑塊，腹部周圍為黃色，臉部呈一條條的粗線（可由此特 徵與美南角蛙作為區別），身體呈矮胖狀，眼上突起短。喜將半身藏於土中。體色會因 環境的不同而有所改變。', '分布在巴西南部、烏拉圭、阿根廷等地。', '飼育時有因貪食，而導致死亡的現象。', 'uploads/frog.jpg'),
(2, '寬尾鳳蝶', 2, 'Animalia', '動物界', 'Arthropoda', '節肢動物門', 'Insecta', '昆蟲綱', 'Lepidoptera', '鱗翅目', 'Papilionidae', '鳳蝶科', 'Papilionini', '寬尾鳳蝶屬', 'Agehana maraho', '台灣寬尾鳳蝶', 'Agehana maraho', '', '寬尾鳳蝶成蟲展翅9.5－10公分，為大型鳳蝶；前翅底色為黑褐色，後翅中室及周邊有一片白色斑紋，外緣各有七個成排的紅色弦月紋；雌雄外型斑紋相同，但雌蝶體型較大；寬尾鳳蝶與其他鳳蝶最大的差異是尾狀突起特別寬大，內部由兩條紅色的第三、四翅脈貫穿，故因此得名。','主要分布地區是新竹縣與苗栗縣交界的觀霧與宜蘭縣太平山、明池一帶。','', 'uploads/butterfly.jpg'),
(3, '海南蝴蝶蘭', 3, 'Plantae', '植物界', 'Magnoliophyta', '被子植物門', 'Liliopsida', '單子葉植物綱', 'Asparagales', '天門冬目', 'Orchidaceae', '蘭科', 'Phalaenopsis', '蝴蝶蘭屬', 'P. hainanensis', '海南蝴蝶蘭', 'Phalaenopsis hainanensis', '', '', '', '', '');

--
-- 已匯出資料表的索引
--

--
-- 資料表索引 `data`
--
ALTER TABLE `data`
  ADD UNIQUE KEY `ID` (`ID`);

--
-- 在匯出的資料表使用 AUTO_INCREMENT
--

--
-- 使用資料表 AUTO_INCREMENT `data`
--
ALTER TABLE `data`
  MODIFY `ID` bigint(20) UNSIGNED NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
