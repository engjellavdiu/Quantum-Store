-- phpMyAdmin SQL Dump
-- version 5.0.4
-- https://www.phpmyadmin.net/
--
-- Host: localhost
-- Generation Time: Feb 14, 2021 at 07:29 PM
-- Server version: 10.4.11-MariaDB
-- PHP Version: 7.4.5

SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
START TRANSACTION;
SET time_zone = "+00:00";


/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;

--
-- Database: `quantum`
--

-- --------------------------------------------------------

--
-- Table structure for table `brands`
--

CREATE TABLE `brands` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `brands`
--

INSERT INTO `brands` (`id`, `image`) VALUES
(10, '../images/brendet/apple-logo.svg'),
(11, '../images/brendet/ps5-logo.png'),
(12, '../images/brendet/asus-logo.png'),
(13, '../images/brendet/xbox-logo.svg'),
(14, '../images/brendet/razer-logo.png'),
(15, '../images/brendet/hyper-x-logo.png');

-- --------------------------------------------------------

--
-- Table structure for table `cart`
--

CREATE TABLE `cart` (
  `user_id` int(11) NOT NULL,
  `product_id` int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `cart`
--

INSERT INTO `cart` (`user_id`, `product_id`) VALUES
(74, 75),
(74, 78);

-- --------------------------------------------------------

--
-- Table structure for table `categories`
--

CREATE TABLE `categories` (
  `emri` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `categories`
--

INSERT INTO `categories` (`emri`) VALUES
('Konzola'),
('Kufje'),
('Laptop'),
('Monitor'),
('Ora digjitale'),
('PC'),
('Tablet'),
('Të tjera'),
('Telefona'),
('TV');

-- --------------------------------------------------------

--
-- Table structure for table `messages`
--

CREATE TABLE `messages` (
  `id` int(11) NOT NULL,
  `emri` varchar(255) NOT NULL,
  `mbiemri` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `msg` text NOT NULL,
  `is_read` smallint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `messages`
--

INSERT INTO `messages` (`id`, `emri`, `mbiemri`, `email`, `msg`, `is_read`) VALUES
(13, 'Erjon', 'Januzi', 'ej47937@ubt-uni.net', 'Pershendetje, \r\n\r\nky eshte nje test i kontakt formes', 0),
(14, 'Engjell', 'Avdiu', 'ea47219@ubt-uni.net', 'Pershendetje, \r\n\r\nky eshte nje test tjeter\r\n\r\nme respekt\r\nengji boy', 1),
(15, 'User', 'Demo', 'userdemo@quantum.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent rhoncus fermentum quam. Nulla id velit eleifend, mattis massa vitae, faucibus justo. In vehicula ullamcorper vehicula. Quisque pretium ligula felis, et tristique lacus imperdiet nec. Phasellus at orci non eros faucibus viverra. Suspendisse vel mauris tellus. Praesent malesuada laoreet tempus. Mauris fringilla iaculis erat, sit amet maximus ipsum lacinia non.', 1),
(16, 'User', 'Demo', 'userdemo2@quantum.com', 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Praesent rhoncus fermentum quam. Nulla id velit eleifend, mattis massa vitae, faucibus justo. In vehicula ullamcorper vehicula. Quisque pretium ligula felis, et tristique lacus imperdiet nec. Phasellus at orci non eros faucibus viverra. Suspendisse vel mauris tellus. Praesent malesuada laoreet tempus. Mauris fringilla iaculis erat, sit amet maximus ipsum lacinia non.', 0);

-- --------------------------------------------------------

--
-- Table structure for table `products`
--

CREATE TABLE `products` (
  `id` int(11) NOT NULL,
  `emri` varchar(255) NOT NULL,
  `cmimi` float NOT NULL,
  `pershkrimi` text NOT NULL,
  `sasia` int(11) NOT NULL,
  `kategoria` varchar(255) DEFAULT NULL,
  `image` varchar(255) NOT NULL,
  `admin_id` int(11) NOT NULL,
  `prodhuesi` varchar(255) DEFAULT NULL,
  `is_promoted` smallint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `products`
--

INSERT INTO `products` (`id`, `emri`, `cmimi`, `pershkrimi`, `sasia`, `kategoria`, `image`, `admin_id`, `prodhuesi`, `is_promoted`) VALUES
(30, 'Playstation 5', 499.95, 'Një konzolë novatore me performancë të lartë. Për të rritur fuqinë kompjuterike, konzola përdor një zgjidhje të dizajnuar me porosi NVME SSD me arkitekturë Sony PS, e cila ka një ndikim të rëndësishëm në zvogëlimin e shpejtësisë së ngarkimit të skedarëve të lojërave dhe ndërrimin e shpejtë të lojërave.\r\nKonzola bën përshtypje me deri në 120 FPS, e cila kontribuon në \"butësinë\" e lojërave dhe ndihmon për të përjetuar përmbajtjen e lojës edhe më realisht.\r\nMbështet video 4K dhe deri në 8K video output përmes HDMI 2.1. Shijoni lojëra të panumërta me PS5.', 5, 'Konzola', '../images/produktet/ps5-productCard.png', 70, 'Sony', 1),
(31, 'Xbox Series X', 549.99, 'Për të rritur fuqinë kompjuterike, konzola përdor një zgjidhje të dizajnuar me porosi NVME SSD me arkitekturë Xbox Velocity, e cila ka një ndikim të rëndësishëm në zvogëlimin e shpejtësisë së ngarkimit të skedarëve të lojërave dhe ndërrimin e shpejtë të lojërave.\r\nKonzola bën përshtypje me deri në 120 korniza në sekondë, e cila kontribuon në \"butësinë\" e lojërave dhe ndihmon për të përjetuar përmbajtjen e lojës edhe më realisht.\r\nNë \"S\" të ri do të shijoni më shumë se 100 lojëra në cilësi të shkëlqyera, të cilat janë akorduar në mënyrë të përsosur për të.Xbox Serie S përmban një pajisje të fuqishme që jo vetëm kap deri në 120 korniza në sekondë në 1440p, por gjithashtu ofron pamje të lë pa frymë me gjurmimin e rrezeve DirectX dhe Shading të Shkallës së Ndryshueshme.', 10, 'Konzola', '../images/produktet/xboxseries-productCard.png', 72, 'Microsoft', 1),
(32, 'Xbox Series S', 320, 'Një konzolë novatore me performancë të lartë që bën përshtypje me trupin e saj kompakt, ndër të tjera - është madje pothuajse 60 për qind më e vogël se vëllai i tij më i fuqishëm, Xbox Series X. Për të rritur fuqinë kompjuterike, konzola përdor një zgjidhje të dizajnuar me porosi NVME SSD me arkitekturë Xbox Velocity, e cila ka një ndikim të rëndësishëm në zvogëlimin e shpejtësisë së ngarkimit të skedarëve të lojërave dhe ndërrimin e shpejtë të lojërave.\r\nKonzola bën përshtypje me deri në 120 korniza në sekondë, e cila kontribuon në \"butësinë\" e lojërave dhe ndihmon për të përjetuar përmbajtjen e lojës edhe më realisht.\r\nNë \"S\" të ri do të shijoni më shumë se 100 lojëra në cilësi të shkëlqyera, të cilat janë akorduar në mënyrë të përsosur për të.Xbox Serie S përmban një pajisje të fuqishme që jo vetëm kap deri në 120 korniza në sekondë në 1440p, por gjithashtu ofron pamje të lë pa frymë me gjurmimin e rrezeve DirectX dhe Shading të Shkallës së Ndryshueshme.\r\n\r\nRritja 4K mbështetet në lojëra, të cilat do t\'i vlerësoni kur avulloni në ekranet e mëdha të sheshta. Videot mund të transmetohen gjithashtu në 4K.', 10, 'Konzola', '../images/produktet/xbox-seriesS.jpg', 70, 'Microsoft', 0),
(33, 'Nintento Switch', 426.7, 'Kjo konzolë ofron një varg veçorish të përsosura për argëtimin tuaj. Ka 32GB memorie të brendshme si dhe ekran 6.2 inç me rezolucion 1280 x 720 pikselë. Ka vecori të lojërave portable si dhe mund të lidhet edhe me TV dhe te luhen lojerat përmes joycons.', 3, 'Konzola', '../images/produktet/switch-productCard.png', 72, 'Nintendo', 0),
(34, 'Acer Swift 3', 915.85, 'Ky laptop është i pajisur me karakteristika të shkëlqyeshme. Ai mundësohet nga një procesor 4- core Intel Core i5 1135G7 që funksionon me një frekuencë 2.4 GHz deri në 4.2 GHz. Procesori plotësohet me 16 GB RAM LPDDR4 (në pllakë). Hard disku 512 GB SSD M.2 PCIe / NVMe (slot) shërben për të dhënat. Disku optik mungon. Të dhënat për ekranin 14 \" IPS me rezolucion 1920 x 1080 (Full HD) sigurohen nga kartela grafike Intel Iris Xe Graphics. Prej ndërfaqeve laptopi ka HDMI, mbështetje DisplayPort, mbështetje Power Delivery, 1 port USB 2.0 Type-A, 1 port USB 3.0 / 3.1 / 3.2 Gen 1 Type-A dhe 1 port USB 3.1 / 3.2 Gen 2 Type-C. Laptopi mbështet Bluetooth 5.0 dhe standardet Wi-Fi a / b / g / n / ac / ax. Lloji i kartës së rrjetit WLAN. Ndër karakteristikat e tjera laptopi ka një tastierë me ndriçim dhe me taste numerike. Ekziston gjithashtu një lexues i gjurmëve të gishtërinjëve. Bateri e laptopit ka një kapacitet prej 4-cell, 56Wh me një jetëgjatësi maksimale prej 16 orë. Laptopi vjen me sistemin operativ Windows 10 Home.', 0, 'Laptop', '../images/produktet/acerswift.png', 70, 'Acer', 0),
(35, 'Acer Nitro 5', 1199.5, 'Laptopët e serisë Acer Nitro 5 vijnë si një alternativë e përballueshme për lojrat. Ata ju ofrojnë performancë të fuqishme për zgjidhje të qetë Full HD ndërsa ruajnë një etiketë çmimesh të përballueshme. Ata do të mbështesin përvojën me zë të shkëlqyeshëm dhe dizajni i tyre nuk do ta mohojë fokusin veçanërisht si laptopët e lojrave dhe multimedia. Luaj dhe argëtohu me Acer Nitro 5. Me ekranin Full HD dhe teknologjinë IPS, do të përjetoni argëtim realist me ngjyra dhe imazhe të qarta nga pothuajse çdo kënd. Kështu që ju mund të ndani ato që janë në ekranin tuaj me miqtë tuaj. Përjetoni prodhimin themelor të audios me Waves MaxxAudio dhe Acer TrueHarmony. Me Acer Nitro 5, ju merrni një mjet të sofistikuar të lojërave dhe multimedial me pamje të shkëlqyeshme dhe performancë të shkëlqyeshme të tingullit. Duke qenë një pajisje e lëvizshme, lidhja wireless e siguruar nga Wi-Fi do të ofrojë shpejtësi edhe më të shpejtë dhe reagim wireless. Sigurisht që ekzistojnë specifikimet e porteve USB 3.0 / 3.1 / 3.2 Gen 1 ose edhe USB-C 3.1 / 3.2. Ekziston edhe një HDMI dhe një lidhje e shpejtë Gigabit Ethernet. Ky model i laptopit Acer Nitro 5 (AN515-54) përdorë procesorin 6-bërthamësh Intel Core i7-9750H, i cili ka teknologji HyperThreading për shumëfishim të qetë me aftësinë për të trajtuar deri në 2 procese njëkohësisht në një bërthamë dhe funksionon me një frekuencë prej 2.6 GHz deri në 4.5 GHz me teknologjinë TurboBoost. Procesori plotësohet gjithashtu me 16 GB memorie DDR4 (1 modul / 2 slote). Të dhënat e imazhit për ekranin 15.6 \" 120Hz IPS Full HD sigurohen nga kartela grafike NVIDIA GeForce GTX 1660 Ti me 6 GB memorie GDDR6. Disku 1 TB SSD M.2 PCIe NVMe (+ një slot i lirë 2.5\") është gati për të dhënat e përdoruesit. Sigurisht që ekzistojnë një numër ndërfaqesh duke përfshirë Wi-Fi ax, Gigabit Ethernet dhe Bluetooth 5.0, ose mjaft lidhës USB (2x 3.0 / 3.1 / 3.2 Gen 1, 1x 2.0 dhe 1x USB-C 3.1 / 3.2 Gen 1). Ekziston edhe një kamerë HD dhe një tastierë me ndriçim. Bateria 4-qelizore 55Wh përdoret për furnizimin me energji. Laptopi përdorë Windows 10 Home si sistemin operativ.', 5, 'Laptop', '../images/produktet/acerswift5.png', 72, 'Acer', 0),
(36, 'Asus ROG Strix G17', 2199.5, 'Laptopët e lojërave ROG Strix G17 mishërojnë fuqinë që mund të mbështesë performancën e çdo lojtari të sporteve elektronike. Ata ofrojnë një përvojë të shkëlqyeshme të lojrave dhe janë të disponueshëm në shumë konfigurime, kështu që gjithmonë zgjidhni atë optimal. Bëhuni një yll i ndeshjeve me multiplayer (shumë lojtarë) me laptopin ROG Strix G17. Përjetoni imazhe të mprehta me ngjyra të përsosura falë teknologjive inovative nga punëtoritë ASUS dhe paneleve të përdorura të nivelit IPS Full HD me kënde të gjera të shikimit, të cilat sigurohen me një shtresë që parandalon reflektimet e pakëndshme. Me mbulim të gjerë të hapësirës me ngjyra, do të përjetoni një riprodhim të vërtetë të ngjyrave, dhe mbështetja për ritmet e rifreskimit 120 Hz, 144 Hz ose 240 Hz (në varësi të konfigurimit) do të sigurojë një imazh të përkryer të butë. Sistemi inteligjent i ftohjes ka një numër karakteristikash që ndihmojnë ROG Strix G17 të përfitojë plotësisht nga performanca e GPU dhe CPU', 10, 'Laptop', '../images/produktet/asusrog-productCard.png', 70, 'Asus', 0),
(37, 'Asus ZenBook Duo', 1199.5, 'Ky laptop është i pajisur me karakteristika të shkëlqyeshme. Ai mundësohet nga një procesor 4-core Intel Core i7 - 10510U që funksionon me një frekuencë 1.8 GHz deri në 4.9GHz. Procesori plotësohet me 8GB RAM LPDDR3 (në pllakë). Hard disku 512GB SSD M.2 PCIe NVMe shërben për të dhënat. Disku optik mungon. Të dhënat e figurës për ekranin me prekje 14 \" IPS me rezolucion Full HD prej 1920 x 1080 piksel janë siguruar nga kartela grafike NVIDIA GeForce MX250', 10, 'Laptop', '../images/produktet/asuszenbook.png', 72, 'Asus', 0),
(38, 'Dell XPS 13', 1985.75, 'Ky model i Dell XPS 13 (9310) përmban një procesor 4-bërthamor Intel Core i7-1165G7 me teknologjinë HyperThreading. Procesori operon në një frekuencë prej 2.8 GHz me mundësinë e rritjes në modalitetin turbo deri në 4.7 GHz dhe plotësohet më tej me 16 GB memorie LPDDR4X (në bord/pa slote). Ekrani i këtij modeli vjen me diagonale prej 13,4\" IPS Full HD++ (1920 x 1200 piksel, 500 njësi, 100% sRGB) në kombinim me grafikën Intel Iris Xe. Ka një hardisk 1 TB SSD M.2 PCIe NVMe për të dhënat e përdoruesit dhe aplikacione', 3, 'Laptop', '../images/produktet/dellxps13.png', 70, 'Dell', 0),
(39, 'Dell XPS 15', 2085.65, 'Ky laptop është i pajisur me karakteristika të shkëlqyeshme. Ai mundësohet nga një procesor 4-core Intel Core i5 - 10300H që funksionon me një frekuencë 2.5 GHz deri në 4.5 GHz. Procesori plotësohet me 8GB RAM DDR4 SODIMM (slot). Hard disku 512 GB SSD M.2 PCIe NVMe shërben për të dhënat. Disku optik mungon. Të dhënat e figurës për ekranin 15.6 \" me rezolucion Full HD + prej 1920 x 1200 piksel janë siguruar nga kartela grafike NVIDIA GeForce GTX 1650 Ti. Prej ndërfaqeve laptopi ka mbështetje Power Delivery, mbështetje DisplayPort, Thunderbolt, 1 port USB 3.1 / 3.2 Gen 1 Type-C dhe 2 porte USB 3.1 / 3.2 Gen 2 Type-C. Laptopi mbështet standardet Wi-Fi a / b / g / n / ac / ax dhe Bluetooth 5.0.', 5, 'Laptop', '../images/produktet/dellxps15.png', 72, 'Dell', 0),
(40, 'Apple Airpods (2019)', 159.5, 'AirPod është një koncept i ri i dëgjueseve wireless, meqë mund thjesht t\'i nxjerrni nga kutia e tyre dhe t\'i përdorni menjëherë me iPhone, Apple Watch, iPad ose Mac. Ato mund të ndalen dhe të ndizen automatikisht, e dallojnë kur janë në veshët tuaj dhe ndalen menjëherë nëse ju i largoni ato nga veshët. Ato janë më të shpejta për 1.5 herë në thirrjet telefonike, 30% me pak vonesë në reagim gjatë gamingut dhe zgjasin diku 5 orë më shumë se sa versionet e kaluara. Kanë zë të cilësisë së lartë, çasje në Siri, dhe karikohen shpejt në kuti përmes konektorit Lightning.', 5, 'Kufje', '../images/produktet/airpods.png', 70, 'Apple', 0),
(41, 'Apple Airpods Pro', 239.5, 'Produkti në fjalë paraqet kufje Apple AirPods Pro të kualitetit mëse të lartë nga kompania e njohur Apple. Ky produkt dallohet me një cilësi dhe qëndrueshmëri tejet të lartë si edhe me një dizajn të bukur dhe elegant. Ofron zërim të shkëlqyer dhe po ashtu funksionalitet maksimal. Jetëgjatësia e baterisë është mëse e mjaftueshme duke ofruar kështu një kohëzgjatje prej 5 orësh.', 5, 'Kufje', '../images/produktet/airpodspro.png', 72, 'Apple', 0),
(42, 'Dell Alienware Aurora R11', 2098.99, 'Ky kompjuter i bardhë ndërrthurr një varg tiparesh të përkryera teknologjike për performancë të shkëlqyeshme. Është i pajisur me procesor të fuqishëm me 6 bërthama Intel Core i5 10600KF dhe ka frekuencë veprimi 4.1 GHz - 4.8 GHz. Ofron memorie 32 GB ndërsa për të dhëna dhe aplikacione ka në dispozicion 1TB SSD. Përpunimi i imazheve bëhet përmes kartelës grafike NVIDIA GeForce RTX 2080 Super. Lidhet me pajisje përmes konektorëve USB. Ka sistem operues Windows 10 Home.', 0, 'PC', '../images/produktet/alienware-aurora.png', 70, 'Dell', 0),
(43, 'Apple Watch Series 6 44mm', 479.5, 'Orë nga marka Apple e cila përmban një varg tiparesh të përsosura teknologjike dhe fizike për performancë të jashtëzakonshme. Korniza ka gjerësi 40 mm dhe përbëhet prej aluminit ndërsa rripi përbëhet nga goma sintetike me ngjyrë të kuqe. Ekrani është me prekje përmes së cilit mund të kontrolloni funksionet si matjen e vlerave të zemrës, monitorimin e gjumit, pranimin e mesazheve dhe thirrjeve, planifikimin e aktiviteteve sportive si ecje/fitnes, vrapim, çiklizëm, not, skijim dhe golf. Ekrani Retina është 2.5 herë më i ndritshëm që ju mundëson t’i shihni informacionet edhe në dritë të diellit. Përmban edhe butona kontrolli. Ndër sensorë përfshin altimetër, akselerometër, gjiroskop, oksimetër, busullë dhe ECG. Përmes oksimetrit matni vlerat e sakta të saturimit të oksigjenit në gjak manualisht përmes aplikacionit Blood Oxygen si dhe në mënyrë automatike ditë e natë', 6, 'Ora digjitale', '../images/produktet/appleseries6-productCard.png', 72, 'Apple', 1),
(44, 'Apple Watch SE 40mm', 345.95, 'Orë nga marka Apple e cila përmban një varg tiparesh të përsosura teknologjike dhe fizike për performancë të jashtëzakonshme. Korniza ka gjerësi 44 mm dhe përbëhet prej aluminit me ngjyrë të artë ndërsa rripi përbëhet nga goma sintetike me ngjyrë rozë. Ekrani është me prekje përmes së cilit mund të kontrolloni funksionet si matjen e vlerave të zemrës, monitorimin e gjumit, pranimin e mesazheve dhe thirrjeve, planifikimin e aktiviteteve sportive si ecje/fitnes, vrapim, çiklizëm, not, skijim dhe golf. Përmban edhe butona kontrolli. Ndër sensorë përfshin altimetër, akselerometër, gjiroskop, oksimetër dhe busullë. Të pranishëm janë edhe naviguesit si GPS dhe Glonass. Përputhet me sistem iOS. Memoria e brendshme ka kapacitet 32GB. Është rezistente ndaj thellësisë ujore 50 metra. Poashtu, mbështet funksionet NFC, WiFi, Bluetooth 5.0. Sistemi operativ është watchOS.', 4, 'Ora digjitale', '../images/produktet/applewatch.png', 70, 'Apple', 0),
(45, 'ASUS TUF Gaming 27\'\'', 496.65, 'Asus TUF Gaming VG27BQ 27 \" është një monitor i lojrave me panel TN, rezolucion WQHD 2560 x 1440 piksel, mat. Ai ka një shkëlqim prej 350 cd / m2, kënde shikimi 170 ° në horizontale dhe 160 ° vertikale, raport aspekt 16: 9, kohë përgjigje 0.4 ms, shkalla e rifreskimit 165 Hz, lidhësit përfshijnë 2x HDMI (v2.0), 1x DisplayPort 1.2, altoparlantë 2x 2 W. Dimensionet përfshirë mbajtësen janë 620 x 377-507 x 211 mm. Duke përdorur teknologjinë NVIDIA G-SYNC, shkalla e rifreskimit të ekranit mund të sinkronizohet me kartën grafike. Kjo minimizon bllokimin, ngrirjen e imazhit dhe vonesat. Rezultati është një përvojë e qetë e lojrave, natyraliteti dhe mprehtësia e objekteve të lojës. Monitori ofron disa teknologji interesante të lojës. Njëra është Shadow Boost duke ndriçuar zona të errëta, tjetra është Extreme Low Motion Blur, e cila eliminon turbullimin dhe shqyerjen e objektit. ASUS GameVisual ofron 7 modalitete të paracaktuar ekrani dhe kontroll të shpejtë përmes tastit të integruar GamePlus.', 7, 'Monitor', '../images/produktet/asusmonitor.png', 70, 'Asus', 0),
(46, 'CZC PC Knight GC114', 990.15, 'Bëhuni fituesi i çdo ngjarje me kompjuterin e lojrave CZC Knight! Përfitoni plotësisht nga fuqia e procesorit të gjeneratës së 10-të Intel Core i5 dhe grafika e lojrave GeForce GTX 1660 Super për lojëra pa ndërprerje Full HD me FPS të lartë. Gëzoni drejtimin e shpejtë dhe jini një nga lojtarët profesionistë me kompjuterin CZC Knight GC114.\r\n\r\nKartela grafike ASUS ROG-STRIX-GTX1660S-O6G GAMING\r\n\r\nMe një performancë pak më të ulët se GeForce GTX 1660 Ti, është një zgjidhje e përballueshme për lojërat Full HD të lojërave më të njohura dhe farat më të fundit me detaje të larta. Është deri në 20% më shpejt se GTX 1660 origjinale dhe deri në 1.5 herë më shpejt se gjenerata e mëparshme GTX 1060 6GB. GeForce GTX 1660 Super është ndërtuar me performancën novatore grafike të arkitekturës vlerësuar me çmime NVIDIA Turing. Megjithëse është i privuar nga funksionet në kohë reale të gjurmimit të rrezeve, padyshim që nuk i mungon performanca e optimizuar Turing.', 6, 'PC', '../images/produktet/asustufpc.png', 70, 'Asus', 0),
(47, 'Beats By Dre Headphones', 250, 'Dëgjueset Beats By Dre janë zgjidhja e duhur për dëgjim të muzikës nga celulari i juaj në kualitetin më të lartë. Në pako me dëgjueset përfshihen 4 lloje të ndryshme të gomave standarde të veshit. Dëgjueset kanë ngjyrë te kuqe.', 5, 'Kufje', '../images/produktet/beats-productCard.png', 70, 'Apple', 0),
(48, 'Dell UltraSharp U3818DW 38\'\'', 1246.55, 'Monitori 37.5 \" i lakuar Dell UltraSharp U3818DW ofron pamje fantastike. Ky monitor IPS ofron një rezolucion të shkëlqyer prej 3840 x 1600 pix me raport të pamjes 21: 9, ndriçim 300 cd / m2, 5ms kohë përgjigjjeje dhe raport kontrasti 1000: 1. Këndi është 178 ° horizontalisht dhe vertikalisht dhe lidhja mundësohet nga porte 1 x DP 1.2, 2 x HDMI 2.0, 1x USB Tipi-C dhe 4x USB 3.0, duke përfshirë 432.0 ~ 547.0 x 226.4 x 894.0 mm.', 6, 'Monitor', '../images/produktet/dell38inchmonitor.png', 70, 'Dell', 0),
(49, 'Dell UltraSharp U2719D', 389.5, 'Monitor me performancë të lartë, me madhësi të ekranit 27 \"QHD me rezolucion 2560 x 1440 piksel dhe panel IPS. Monitori ofron anti-reflektim, kënde shikimi 178 ° për raport vertikal dhe horizontal me 1000: 1, koha e përgjigjes 8 deri 5 ms dhe ndriçimi i zakonshëm i 350 cd / m2, lidhja e monitorit nëpërmjet HDMI, porte ekrani dhe 2 x USB 3.0, 2 dalje USB 3.0 me mundësi ngarkimi, lidhje USB 3.0 për PC dhe dalje analoge audio. Mbajtëset e monitorit janë V 390.2 612.2 xwx H 180 mm dhe peshon prej 3.92 kg. Monitori vjen në ngjyrë të zezë / argjendtë.', 7, 'Monitor', '../images/produktet/dellmonitor.png', 72, 'Dell', 0),
(50, 'Dell UltraSharp U4919DW', 1253.28, 'Monitor i cilësisë së lartë, me performancë tejet të mirë që do ju jap një eksperiencë të jashtëzakonshme të shikimit të filmave dhe programeve tuaja të parapëlqyera, por edhe të lojërave. Vjen me ekran 49\" IPS me rezolucion 5120 x 1440 (DQHD) që funksionon në frekuencën 60 Hz dhe ka shpejtësi të reagimit prej 8 ms. Ofron port për HDMI dhe Display port, USB HUB 3.0 si dhe vjen me ngjyrë të zezë dhe argjendi.', 10, 'Monitor', '../images/produktet/dellultrawidemonitor.png', 70, 'Dell', 0),
(51, 'GoPro HERO9', 549.99, 'Kompania GoPro sjell në treg kamerën e saj të veprimit që mban emrin HERO9 Black, duke shpërthyer me tipare dhe teknologji të përparuara. Video mahnitëse 5K me mbështetje me rezolucion më të ulët dhe kapje ekrani deri në 14.7 MP. Regjistroni një video mahnitëse në rezolucionin 5K që ruan detajet e jashtëzakonshme të videos, edhe kur zmadhoni. Kështu që ju mund të merrni një pamje të ekranit deri në 14.7 MP nga videoja. Sigurisht që ka video në 4K, 2.7K, 1440p dhe 1080p. Kapni foto të mprehta, profesionale 20MP dhe përdorni SuperPhoto për foton më të përsosur. Falë ekranit të ri në pjesën e përparme, ju keni një vrojtim të drejtpërdrejtë të imazhit dhe e bën shumë të lehtë marrjen e selfie. Ekrani më i madh i përparmë lejon funksionim edhe më intuitiv. HyperSmooth 3.0 përmban një veçori të kyçjes së horizontit. Gëzoni pamje veprimi me stabilizimin më të përparuar të videos ndonjëherë. Regjistroni me deri në 240 korniza në sekondë, duke ju lejuar të shkrepni lëvizje të ngadaltë që të lë pa frymë. Regjistroni video magjepsëse me TimeWarp 3.0.', 9, 'Të tjera', '../images/produktet/gopro.png', 70, 'GoPro', 0),
(52, 'Huawei MateBook X Pro', 1599.5, 'Laptopi Premium MateBook X Pro, i cili krenohet me parametrat më të lartë dhe mjeshtërinë ekskluzive. Është një makinë kompakte, e lehtë por jashtëzakonisht e fuqishme me një ekran 3K me korniza minimale dhe mundësinë e kontrollit të prekjes për përdoruesit më të kërkuar që nuk janë të kënaqur me kompromiset. Laptopi është shoqëruesi ideal i udhëtimit falë modelit të tij të hollë me një trashësi prej vetëm 14.6 mm, peshë të ulët afërsisht 1.33 kg dhe një ndërtim të përgjithshëm kompakt dhe të qëndrueshëm. Ka një stil të bukurisë natyrore të një trupi metalik, skajet e të cilit janë përpunuar duke përdorur një bluarje të veçantë diamanti, e cila i jep pajisjes një pamje moderne premium që do t\'ju shoqërojë në çdo hap të rrugës. Gjithashtu befasuese është jeta e baterisë deri në 13 orë kur luani video lokale me cilësi 1080p. Kështu që ai mund të bëjë punë gjatë gjithë ditës pa ndonjë problem dhe mbetet akoma energji për t’u argëtuar. Kur energjia mbaron, fillon një funksion i shpejtë i ngarkimit, me të cilin mund të rimbushni shpejt baterinë (jeta aktuale e baterisë varet nga përdorimi, aplikacionet dhe cilësimet e menaxhimit të energjisë). ', 7, 'Laptop', '../images/produktet/huawei-xpro.png', 70, 'Huawei', 0),
(53, 'HyperX Cloud Alpha', 99.25, 'Kufjet HyperX Cloud Alpha janë të dizajnuara për t\'ju sjellur kualitetit të lartë të përcjelljes së zërit dhe eliminimin e zhurmës së ambientit. Dy hapësirat e ndara në qendër ofrojnë konfigurim të mirë për zë më të pastër. Kufjet janë të pajisura me transmetuesit me madhësi 50 mm që funksionojnë nën frekuencat 13 Hz deri në 27 kHz, kanë 65 ohm impendancë dhe 98 dB ndjeshmëri, mund të lidhet me pajisje të tjera nëpërmjet konektorit 3.5mm audio jack që gjindet në fund të kabllos me gjatësi 1.3 metra si dhe vijnë me ngjyrë të zezë.', 7, 'Kufje', '../images/produktet/hyperx-cloud2.png', 72, 'HyperX', 0),
(54, 'Apple iMac 27\"', 2399, 'iMac vazhdon të evoluojë, dhe tani ju mund të bëni më shumë punë dhe argëtim me të si kurrë më parë. Performancë e shkëlqyer në një dizajn klasik elegant me teknologji të lehtë për t’u përdorur. Saktësisht çfarë prisni nga një iMac i ri.\r\n\r\nEkrani Apple iMac 27 5K Retina (2020) AiO ka një diagonale 27 \" dhe ka një rezolucion 5K prej 5120 × 2880 piksele. Performanca llogaritëse sigurohet nga një procesor 8-core Intel Core i7 me një frekuencë prej 3.8 GHz, ose deri në 5 GHz në modalitetin TurboBoost, i kompletuar me 8 GB RAM DDR4. Imazhi i prodhimit sigurohet nga një kartë grafike AMD Radeon RX 5500 XT 8 gigabajt GDDR6. Për sistemin, të dhënat dhe aplikacionet shërben hard disku 512 gigabajt SSD. Mbi ekran është integruar kamera FaceTime HD 1080p dhe komunikimi mundësohet nga wireless WiFi ac dhe Gigabit Ethernet me kabllo. Ju do ta vlerësoni Bluetooth 5.0 nga pajisjet e tjera. 2x Thunderbolt 3, 4x USB 3.0 / 3.1 / 3.2 Gen 1, slot për kartat e memories dhe prizë për kufjeve 3.5 mm. Sistemi operativ MacOS catalina. Tastiera Apple Magic dhe mausi Apple Magic Mouse 2 janë përfshirë me kompjuter.', 8, 'PC', '../images/produktet/imac.png', 70, 'Apple', 0),
(55, 'Apple iPad Air 2020', 579.5, 'Tablet nga marka Apple që përmban një varg veçorish të përkryera teknologjike dhe fizike për performancë të shkëlqyeshme. Është i pajisur me procesor të fuqishëm Apple A14 Bionic.\r\n\r\nDiagonalja e ekranit Retina është 10.9 inç dhe ofron pamje fantastike me rezolucion prej 2360 x 1640 pikselë. Memoria e brendshme ka kapacitet 64GB. Sa i përket komunikimit, tableti mbështet WiFi, Bluetooth 5.0, GPS si dhe ka ueb-kamerë. Bateria qëndron deri në 10 orë. Ofron output USB tipi C.\r\n\r\nNdër veçori të avancuara përfshin lexues të shenjave të gishtërinjëve dhe GLONASS. Ndër sensorë keni në dispozicion sensor të lëvizjes, të dritës, barometër, gjiroskop dhe sensor magnetik apo busullë digjitale. Mund të shkrepni fotografi përmes kamerës së pasme me rezolucion 12 MPX dhe kamerës së përparme 7 MPX. Sistemi operativ është Apple iOS.', 10, 'Tablet', '../images/produktet/ipadair.png', 70, 'Apple', 0),
(56, 'Apple iPad Mini', 406.55, 'Apple iPad Mini është shoqëruesi ideal i udhëtimit me performancë të jashtëzakonshme.\r\n\r\nDy kamera të mrekullueshme\r\n\r\nTableta është e pajisur me një kamerë të pasme me një sensor të përmirësuar 8MP dhe një lente f / 2.4, e cila së bashku me një procesor të fuqishëm, ju lejon të përdorni veçori të avancuara siç janë fokusi i klikimit, panorama, video FullHD, video slow motion 120fps, time-lapse video ose self-timer. Pjesa e përparme është e pajisur me një kamerë FaceTime HD e cila ka sensor 7MP për performancë më të mirë të dritës së ulët.', 7, 'Tablet', '../images/produktet/ipadmini.png', 70, 'Apple', 0),
(57, 'Apple iPad Pro Wi-Fi (2020)', 949.95, 'Tableti i ri Apple iPad Pro 12.9 \"Wi-Fi (2020) përmban një ekran RETINA 12.9\" dhe me rezolucion 2732 x 2048 piksele si dhe kënde të gjera të shikimit. Fuqia jepet nga procesori A12Z Bionic me arkitekturë prej 64 bitësh. Poashtu, një memorie 128GB e brendshme është në dispozicion për sistemin, të dhënat dhe aplikimet. Ekzistojnë gjithashtu teknologji të identifikimit të fytyrës dhe sigurisht që ka kamera - e pasme 12MP + 10MP dhe e përparme 7MP. Përveç kësaj, iPad Pro përmban lidhje USB Type-C, konektor Smart dhe lidhës magnetik. Mbështet teknologjinë Bluetooth 5.0 dhe lidhja e Internetit bëhet përmes WiFi. Për më tepër, pajisja ka një sistem të ri operativ iPadOS të instaluar.', 10, 'Tablet', '../images/produktet/ipadpro.png', 72, 'Apple', 0),
(58, 'iPhone 11', 825, 'IPhone 11 i ri bazohet në modelet e shkëlqyera të gjeneratës së mëparshme iPhone X dhe sjell një numër risish që mund të gjenden edhe në modelet e fundit 11 Pro. Mbi të gjitha, është performanca e pakompromistë e çipit A13 Bionic, karakteristika të shkëlqyera kamerash për fotografi, video dhe selfie, jetëgjatësi të zgjatur të baterisë, dhe më shumë.\r\n\r\nIPhone 11 vjen me një kamerë të dyfishtë të përmirësuar, në të cilin lentja XS telephoto është zëvendësuar nga një lente ultra-wide-angle. Me një këndvështrim të gjerë, ju mund të kapni gjithçka në fotografinë tuaj. Kamerat mund të punojnë së bashku, dhe me inteligjencën artificiale të procesorit A13 Bionic, ato gjithmonë krijojnë pamjen më të mirë.', 7, 'Telefona', '../images/produktet/iphone11-productCard.png', 70, 'Apple', 0),
(59, 'iPhone 11 Pro', 1419, 'Performancë e madhe, jashtëzakonisht elegant dhe akoma i thjeshtë. Mahnituni me imazhet nga kamera e re e trefishtë dhe kënaquni me jetën e zgjatur të baterisë.\r\n\r\nKamera e re e trefishtë rrit krijimtarinë tuaj në nivelin e profesionistëve, nëse jeni duke fotografuar ose duke xhiruar video. Një set i tre lenteve për të shtëna të zakonshme, ultra-wide dhe zoomed, është ideal për çdo situatë. Portrete, peizazhe, arkitekturë, sport, natyrë, detaje, thjesht gjithçka që mund të mendoni. Kamerat mund të punojnë së bashku, dhe me inteligjencën artificiale të procesorit A13 Bionic, ato gjithmonë krijojnë pamjen më të mirë.\r\n\r\nShijoni edhe më shumë argëtim me kamerën e përmirësuar selfie TrueDepth. Provoni selfie Full HD slow-motion në 120 fps dhe argëtohuni. Sensori i lenteve 12MP f / 2.2 kap selfie më të mira nga iPhone dhe ofron portrete të ngjashme me ato të kamerës kryesore. Dhe veçoritë e tjera argëtuese si Animoji dhe Memoji gjithashtu do të ofrojnë argëtim të shkëlqyeshëm.', 8, 'Telefona', '../images/produktet/iphone11pro-productCard.png', 70, 'Apple', 0),
(60, 'iPhone 12 64GB', 1315.99, 'iPhone 12 vjen edhe më mirë se kurrë. Ju mund të zgjidhni nga katër modele. Nëse dëshironi një zgjidhje të vogël, merrni 12 mini, klasikja do të jetë 12 dhe për më të kërkuarit ka 12 Pro dhe Pro Max. Ju gjithmonë merrni atë që ju përshtatet më shumë.\r\n\r\nApple iPhone 12 është mundësuar nga një çip i fuqishëm A14 Bionic me motorin Neural Engine të gjeneratës së fundit dhe performancë më të lartë të të mësuarit të makinës. Memorie e brendshme me kapacitet prej 256 GB është e gatshme për sistemin, të dhënat dhe aplikacionet.\r\n\r\n', 6, 'Telefona', '../images/produktet/iphone12-productCard.png', 70, 'Apple', 0),
(61, 'iPhone 12 Pro', 1450, 'iPhone 12 vjen edhe më mirë se kurrë. Ju mund të zgjidhni nga katër modele. Nëse dëshironi një zgjidhje të vogël, merrni 12 mini, klasikja do të jetë 12 dhe për ata që kërkojnë më shumë ka 12 Pro dhe Pro Max. Ju gjithmonë merrni atë që ju përshtatet më shumë.\r\n\r\nApple iPhone 12 Pro Max është mundësuar nga një çip i fuqishëm A14 Bionic me motorin Neural Engine të gjeneratës së fundit dhe performancë më të lartë të të mësuarit të makinës. Memoria e brendshme me kapacitet prej 128 GB është e gatshme për sistemin, të dhënat dhe aplikacionet.', 7, 'Telefona', '../images/produktet/iphone12pro-productCard.png', 70, 'Apple', 0),
(62, 'iPhone X 32GB', 650, 'Apple iPhone X është mundësuar nga një çip i fuqishëm A14 Bionic me motorin Neural të gjeneratës së fundit dhe performancë më të lartë të të mësuarit të makinës. Memoria e brendshme me kapacitet prej 128 GB është e gatshme për sistemin, të dhënat dhe aplikacionet.', 10, 'Telefona', '../images/produktet/iphonex-productCard.png', 72, 'Apple', 0),
(63, 'iPhone XR 32GB', 350, 'Ekrani 5.4 \" Super Retina XDR me teknologji OLED dhe TrueTone ka një rezolucion prej 2340 × 1080 px me një përsosuri prej 476 ppi. iPhone 12 ka një kamerë të dyfishtë të pasme: 12MP me një lente ultra të gjerë dhe me kënd të gjerë me hapje të gjerë f / 1.6, ultra të gjerë f / 2.4 dhe stabilizim optik të imazhit. Për selfie mund të përdoret kamera e përparme 12MP TrueDepth me qasje përmes Face ID.', 10, 'Telefona', '../images/produktet/iphonexr-productCard.png', 70, 'Apple', 0),
(64, 'JBL CLUB 700BT', 165, 'Kufjet JBL CLUB 700BT jane të dizajnuara posaçërisht për adhuruesit e muzikës të cilët dëshirojnë që të shijojnë dhe përjetojnë gjithçka deri në maksimum. Këto kufje kanë dizajn tejet të qëndrueshëm dhe janë të pajisura me sistem të lartë zërimi, që mundëson prodhimin e zërit me kualitet superior, të qartë dhe kumbues. JBL CLUB 700BT janë tejet të rehatshme edhe pas orëve të gjata të bartjes, altoparlantët janë të mbështjellur me sfungjer të butë dhe kanë përmasa tejet kompakte. Kufjet, poashtu, kanë një mikrofon të integruar dhe taste komanduese në pjesën anësore për kontrollimin e funksioneve mediale. JBL mbështet teknologjinë Bluetooth v5.0, ka frekuencë 16 Hz-22 kHz, dhe impedancë 32ohm.', 5, 'Kufje', '../images/produktet/jbl-productCard.png', 70, 'JBL', 0),
(65, 'Dell Inspiron 13 (7306) Touch', 1105.45, 'Ky model i Dell Inspiron 13 (7306) bazohet në procesorin 4-bërthamor Intel Core i5-1135G7, i cili operon me frekuencë prej 2.4 GHz ose deri në 4.2 GHz në modalitetin turbo, dhe përmban teknologjinë HyperThreading. Procesori plotësohet me 8 GB memorie LPDDR4X (në pllakë / pa slot). Kartela grafike Intel Iris Xe Graphicsgraphics ofron pamjet në ekranin me diagonale prej 13.3 \" dhe rezolucion Full HD (1920 x 1080 px, 270 nits, 100% sRGB). Një hard disk 512 GB SSD M.2 PCIe NVMe me një memorie buffer 32 GB Intel Optane H10 është krijuar për të dhënat e përdoruesit. Nga ndërfaqet, laptopi përfshin Wi-Fi ax dhe Bluetooth 5.0.', 5, 'Laptop', '../images/produktet/laptopdell3.png', 70, 'Dell', 0),
(66, 'Tablet Lenovo TAB M10', 139.55, 'Lenovo Tab M10 HD (Gjenerata 2) përdor një procesor 8-bërthamë MediaTek Helio P22T që mbështetet nga 4 GB memorje. Ekrani është me prekje dhe ka diagonale prej 10 \" dhe një rezolucion prej 1280 x 800 px. Sistemi, të dhënat dhe aplikacionet përdorin memorien e brendshme me kapacitet prej 64 GB, të cilën mund ta zgjeroni duke përdorur karta memorie microSD. Tableti posedon dy kamera që ju mundësojn të komunikoni në internet me miq ose bëni fotografi dhe video (kamera e përparme 5 MP dhe e pasme 8 MP). Sigurisht që tableti posedon edhe një lidhje wireless WiFi ac dhe LTE, e cila siguron që të jeni vazhdimisht në kontakt.', 6, 'Tablet', '../images/produktet/lenovotablet.png', 70, 'Lenovo', 0),
(67, 'Laptop Apple MacBook Air 13', 1699, 'Apple MacBook Air 13 është dizajnuar që të përshtatet për të gjitha kërkesat tuaja specifike. Laptopi mban performancë të lartë, karakteristika shumë praktike dhe është më i lehtë dhe më i hollë sesa paraardhësit e tij. Punoni me efiçiencë dhe argëtohuni maksimalisht me këtë seri të laptopëve.\r\n\r\nVjen i pajisur me procesorin 8 bërthamësh Apple M1 i cili kombinohet me 16GB RAM memorie të llojit LPDDR4X, ekranin me madhësi 13.3\'\', dhe rezolucion prej 2560 × 1600 piksela.', 5, 'Laptop', '../images/produktet/macbookair.png', 70, 'Apple', 1),
(68, 'Laptop Apple MacBook Pro 13', 1960, 'Apple MacBook Pro 13 (Touch Bar) është dizajnuar që të përshtatet për të gjitha kërkesat tuaja specifike. Laptopi mban performancë të lartë, karakteristika shumë praktike dhe është më i lehtë dhe më i hollë sesa paraardhësit e tij. Punoni me efiçiencë dhe argëtohuni maksimalisht me këtë seri të laptopëve. Vjen i pajisur me procesorin 8 bërthamësh Apple M1 i cili kombinohet me 8GB RAM memorie të llojit DDR4, ekranin me madhësi 13.3\'\', kualitet WQXGA dhe rezolucion prej 2560 × 1600 piksela. Pos kësaj, laptopi mban 1TB SSD për ruajtjen e të dhënave, mban një mori portesh USB për lidhje me pajisje të tjera periferike, DisplayPort, Thunderbolt si dhe funksionon me sistemin operativ Apple Mac OS Big Sur', 5, 'Laptop', '../images/produktet/macbookpro-productCard.png', 70, 'Apple', 0),
(69, 'Apple Mac mini M1', 780, 'Me çipin e ri Apple M1, opsionet e Apple Mac mini po shkojnë në një nivel shumë më të lartë. Me të, ju mund të trajtoni edhe punën me video të cilësisë së lartë si dhe me aplikacione tjera t sfiduese profesionale. Ky model Apple Mac mini (M1, 2020) është ndërtuar në një procesor 8-bërthamësh Apple M1 me një GPU 8-bërthamor dhe një motor 16-bërthamor Neural Engine. Procesori gjithashtu përfshin 16 GB memorie. Një hard disk 512 GB SSD është krijuar për sistemin, aplikacionet dhe të dhënat e përdoruesit. Nga pajisjet për lidhje, ju keni 2x Thunderbolt / USB 4, 2x USB 3.0 / 3.1 / 3.2 Gen 1, HDMI 2.0, Gigabit Ethernet dhe portë 3.5 mm për kufje. Lidhja wireless ofrohet nga WiFi ax dhe Bluetooth 5.0. Sistemi operativ i instaluar është macOS Big Sur.', 2, 'PC', '../images/produktet/macmini.png', 70, 'Apple', 0),
(70, 'MSI GF65 Thin 9SD', 999.99, 'MSI GF65 është dizajnuar që të përshtatet për të gjitha kërkesat tuaja specifike, e sidomos për lojtarët e apasionuar. Laptopi mban performancë të lartë, karakteristika shumë praktike.\r\n\r\nLaptopi vjen i pajisur me procesorin Intel Core i7-9750H, i cili operon në frekuencë 2.6GHz, i kombinuar me 8GB RAM memorie të llojit DDR4, ekranin me madhësi 15.6\'\', me kualitet Full HD dhe rezolucion prej 1920 x 1080 piksela, si dhe kartelën grafike NVIDIA® GeForce® GTX 1660 Ti për t\'ju mundësuar që të shihni imazhe të pastërta dhe të detajizuara si dhe performancë të shpejtë kompjuterike.', 5, 'Laptop', '../images/produktet/msilaptop.png', 70, 'MSI', 0),
(71, 'Monitor MSI Gaming Optix', 352.99, 'Monitor lojrash me diagonale prej 31.5 \", rezolucion Full HD prej 1920 x 1080 px, një kohë përgjigjeje prej 1 ms (MPRT) dhe një normë rifreskimi prej 180 Hz. Monitori është i pajisur me një numër teknologjish për imazh të përsosur dhe lojëra kompjuterike. Për këtë qëllim, monitori është i pajisur me teknologjitë FreeSync, Anti-Flicker dhe Blue Light. Monitori ka shkëlqim prej 300 cd / m2 dhe kontrast 3000: 1. Prej ndërfaqeve ofron: 2 x HDMI 2.0, Display Port 1.2, 1 x USB të llojit C, 2 x USB 2.0 të llojit A, 1 x USB 2.0 të llojit B dhe dalje audio për kufje. Monitori mbështet standardin VESA.', 3, 'Monitor', '../images/produktet/msimonitor.png', 70, 'MSI', 0),
(72, 'Laptop MSI GE66 Raider', 1945, 'Laptopi mban performancë të lartë, karakteristika shumë praktike dhe është më i lehtë dhe më i hollë sesa paraardhësit e tij. Punoni me efiçiencë dhe argëtohuni maksimalisht me këtë seri të laptopëve. Vjen i pajisur me procesorin 8 bërthamësh Intel Core i7-10875H i cili kombinohet me 16GB RAM memorie të llojit DDR4, ekranin me madhësi 15.6\'\', kualitet Full HD dhe rezolucion prej 1920 x 1080 piksela si dhe kartelën grafike NVIDIA GeForce RTX 2070 për t\'ju mundësuar që të shihni imazhe të pastërta dhe të detajizuara si dhe performancë të shpejtë kompjuterike. Pos kësaj, laptopi mban 1TB SSD për ruajtjen e të dhënave, mban një mori portesh USB për lidhje me pajisje të tjera periferike, HDMI, RJ45, mini DisplayPort si dhe funksionon me sistemin operativ Windows 10 Pro.', 3, 'Laptop', '../images/produktet/msiraider.png', 70, 'MSI', 0),
(73, 'OMEN by HP 30L', 1699.5, 'OMEN by HP 30L GT13-0036nc është kompjuter kompakt dhe i lehtë i cili ju plotëson të gjitha kërkesat me performancën e tij të lartë dhe në të njëjtën kohë nuk ju zë shumë vend. Kompjuteri vjen i pajisur me procesorin 8 bërthamësh Intel Core i7-10700F i cili kombinohet me 16GB RAM memorie të llojit DDR4 si dhe kartelën grafike NVIDIA GeForce RTX 3070 për t\'ju mundësuar që të shihni imazhe të pastërta dhe të detajizuara si dhe të hapni të gjitha aplikacionet dhe programet që ju nevojiten. Përpos kësaj, kompjuteri mban 1TB SSD për ruajtjen e të dhënave, ka një mori portesh USB për lidhjen e pajisjeve periferike si dhe portet DisplayPort, RJ45, HDMI. Për më tepër, kompjuteri funksionon me sistemin operativ Windows 10 Home.', 10, 'PC', '../images/produktet/omenpc.png', 70, 'HP', 0),
(74, 'PC Origin i9', 2199, 'Ky është një kompjuter i pasjiur me karakteristika të shkëlqyera. Ai mundësohet nga një procesor 6-core AMD Ryzen 5 3600 i cili operon në një frekuencë prej 3.6GHz deri në 4.2GHz. Procesori plotësohet me 16GB RAM DDR4 (slot). Hard disqet 250GB SSD dhe 1TB HDD shërbejnë për të dhënat. Përpunimi i shfaqjes në ekran mundësohet nga kartela grafike NVIDIA GeForce RTX 2060. Ky kompjuter përdor sistemin operativ Windows 10 Home.', 5, 'PC', '../images/produktet/originpc-productCard.png', 70, 'Origin', 0),
(75, 'Kufje Razer Kraken', 121.95, 'Razer Kraken janë kufje për gamera që do ju sjellin përcjellje të zërit të detajizuar dhe plotësisht të pastërt në mënyrë që të fitoni në çdo betejë. Kufjet vijnë me transmetuesit me madhësi 50 mm që funksionojnë nën frekuencat 12 Hz deri në 28 kHz, kanë 32 ohm impendancë dhe 109 dB - SPL ndjeshmëri, mund të lidhet me pajisje të tjera nëpërmjet konektorit 3.5mm (TRRS) që gjindet në fund të kabllos me gjatësi 1.3 metra si dhe vijnë me ngjyrë të gjelbërt të zbukuruar me llogon e kompanisë për të komplementuar veshjen tuaj dhe sistemin kompjuterik.', 4, 'Kufje', '../images/produktet/razerkraken-productCard.png', 70, 'Razer', 0),
(76, 'Samsung Galaxy S21+', 1059.5, 'Galaxy S21+ 5G ofrojn nivelin më të lartë të certifikimit të sigurisë, me Samsung Knox që e siguron telefonin tuaj nga niveli i çipit dhe Knox Vault që enkripton të dhënat tuaja të vërtetimit biometrik. Dhe me një sensor më të madh ultrasonik të gjurmës së gishtit me vonesë më të ulët, mund të zhbllokoni edhe më shpejt - edhe nëse gishti juaj është i thatë.', 6, 'Telefona', '../images/produktet/samsung-galaxyS21.png', 70, 'Samsung', 0),
(77, 'Samsung Galaxy A71', 369.5, 'Duke u bazuar në modelet e njohura nga viti i kaluar, Samsung Galaxy A71 i ri sjell risi të mëtutjeshme për të përmirësuar veçoritë, nevojat e komunikimit, ndarjen, fotografinë dhe shikimin e përmbajtjes në internet. Në krahasim me A51, ai jep një ekran më të madh, performancë më të lartë, rezolucion më të lartë kamerash dhe një bateri më të madhe me karikim më të shpejtë. Zbuloni një pamje të gjerë të një ekrani 6.7 \" me trup të plotë Infinity-O Super AMOLED. Përjetoni kënaqësi të madhe me një rezolucion më të gjerë prej 2400 x 1080 piksel, i cili jep një hap të këndshëm prej 393 ppi. Ju mund të shijoni një imazh me kontrast të lartë dhe shkëlqim, ekran i shkëlqyeshëm me ngjyra dhe kënde të gjera të shikimit. Kamera e re me katër lente ju lejon të kapni dhe shkëmbeni fotografi në një mënyrë revolucionare. Me katër kamera të nivelit të lartë, Galaxy A71 është krijuar për të kapur momentet e jetës që kanë rëndësi.', 6, 'Telefona', '../images/produktet/samsung-galaxyCel.png', 70, 'Samsung', 0),
(78, 'Samsung Galaxy Watch 3', 460, 'Orë e mençur elegante me dizajn premium. Madhësia e saj është 45 mm. Ekrani është Super AMOLED 1.4 ” (34 mm). Ora është bërë prej çeliku inox, rripi prej lëkure dhe korniza është e rrotullueshme. Disa nga funksionet e kësaj ore të mençur janë: matja e saktë e rrahjeve të zemrës, matja e cilësisë së gjumit dhe niveleve të stresit, zbulimi i rënies, oksigjenimit të gjakut, etj. Ora ka 1 GB memorie RAM dhe 8 GB memorie të brendshme. Prej senzorëve ka: senzor të rrahjeve të zemrës, përshpejtues, xhiroskop, barometër dhe senzor të dritës. Jetëgjatësia e baterisë është deri në 56 orë. Kjo orë ka dizajn të fortë, është rezistente ndaj ujit deri në 5 ATM, si dhe plotëson standardet e mbrojtes IP68 / standardet ushtarake MIL-STD-810G.', 5, 'Ora digjitale', '../images/produktet/samsung-galaxyWatch3.png', 70, 'Samsung', 0),
(79, 'Samsung Galaxy TAB 7', 590, 'hytuni në përmbajtjen tuaj të preferuar audiovizive me tabletin elegant Galaxy Tab A7, i cili përmban një dizajn të hollë dhe performancë të lartë. Do të bëhet shoqëruesi juaj i besueshëm për punën dhe aktivitetet e kohës së lirë.\r\n\r\nDizajni i Galaxy Tab A7 bazohet në minimalizëm, simetri dhe mjeshtëri premium. Trupi i tabletit është vetëm 7 mm i hollë dhe metalik, kështu që ofron qëndrueshmëri dhe ergonomi më të madhe. Ju mund të zgjidhni nga disa trajtime origjinale me ngjyra.\r\n\r\nSot, ai ofron një bollëk platformash dhe aplikacionesh transmetimi për të parë shfaqjet dhe filmat tuaj të preferuar. Për t’i shijuar vërtet ato, Galaxy Tab A7 është i pajisur me një ekran dinamik të gjerë 10.4 \" dhe tingull rrethues Dolby Atmos, i cili vjen nga katër altoparlantë AKG dhe ju gllabëron plotësisht.', 7, 'Tablet', '../images/produktet/samsungtab7.png', 70, 'Samsung', 0),
(80, 'Samsung , 65\'\'', 895.5, 'Televizori Samsung UE65TU7002KXXH vjen me ekran 65” (165 cm) me kualitet 4K dhe rezolucion 3840 x 2160 piksel. Ky televizor posedon altoparlantë të integruar me fuqi 20 W të cilët prodhojnë zë kumbues dhe tejet të qartë, si dhe marrës të llojit DVB-C, DVB-S2, DVB-T2 (HEVC).\r\n\r\nTë veçantat e këtij televizori janë mundësitë e incizimit të programeve dhe filmave tuaj të preferuara përmes memorieve USB, të shfletoni online, zmadhoni apo zvogëloni imazhet sipas dëshirës, hapni aplikacione të ndryshme dhe të përdoni Youtube. Poashtu, Samsung mundëson përdorimin e teknologjive si HDR10+, LED, Smart, të cilat përmisojnë dhe shfaqin imazhe sikurse të ishin reale. Si pjesë përbërëse, Samsung ka dy porte HDMI, porte USB, LAN, CI+, port audio për kufje, dhe port për lidhje me satelit.', 4, 'TV', '../images/produktet/samsungtv.png', 72, 'Samsung', 0),
(81, 'Monitor Samsung 34\'\'', 396, 'Samsung S34J550 ka një rezolucion të shkëlqyer UW-QHD prej 3440 x 1440 piksel, që ka një dendësi më të lartë të pikselëve sesa rezolucioni konvencional Full HD. Si rezultat, ju mund të shfaqni shumë më tepër dritare pune, dokumente, faqe uebi, e të tjera në monitorin tuaj sesa në monitorët e rregullt. Ky monitor ka llojin e panelit VA, kohën e përgjigjes 4 ms, raportin e aspektit 21: 9, shkallën e rifreskimit 75 Hz, ndriçim prej 300 cd / m2, raport kontrasti 3000: 1. Poashtu ka teknologji Samsung MagicBright dhe modalitet Eye Saver. Prej porteve ka 2x HDMI, DisplayPort.', 10, 'Monitor', '../images/produktet/samsungultrawide.png', 70, 'Samsung', 0),
(82, 'Sony TV KD 75\'\'', 3196.15, 'Televizor i mençur me diagonale prej 75 \" (189 cm) dhe rezolucion 4K UHD (3840 x 2160 px). I jashtëzakonshëm dhe i fuqishëm - ky është një televizor i mençur nga Sony, i cili, falë një numri funksionesh unike, do t\'ju lejojë të shijoni argëtimin me cilësi të studios, menjëherë në shtëpinë tuaj. Teknologji e cilësisë së lartë dhe procesor i fuqishëm Për të bërë çdo gjë të funksionojë si një orë, ky televizor është i pajisur me një procesor të shkëlqyer Sony X1 Ultimate. Ky procesor analizon të dhënat dhe përmirëson ngjyrën dhe kontrastin, duke plotësuar imazhin 4K me detaje. Për më tepër, procesori punon me teknologjitë 4K X-Reality Pro dhe një bazë të dhënash 4K, falë të cilave mund të rrisë nivelin e imazhit edhe në shkrepjet e realizuara në rezolucion Full HD ose 2K. Rezolucioni i objektit është optimizuar më pas me teknologjinë Object-based Super Resolution, që riprodhon cilësi të vërteta. Full Array LED për detaje të shkëlqyera Duke theksuar detaje të shkëlqyera, TV zbulon se sa realiste mund të jetë fotografia.', 3, 'TV', '../images/produktet/sonytv.png', 70, 'Sony', 0),
(83, 'Sony 4K UHD 65\'\'', 965.5, 'I jashtëzakonshëm dhe i fuqishëm - ky është një televizor SMART nga Sony, i cili, falë një numri funksionesh unike, ju lejon të shijoni argëtimin me cilësi të studios në shtëpinë tuaj. Procesori 4K HDR Processor X1 është një procesor i fuqishëm që përdor algoritme të përparuar për të zvogëluar zhurmën dhe për të nxjerrë në pah detajet. Ngjyrat e shfaqura janë të qarta, me shkëlqim të lartë dhe pa asnjë papërsosuri. Ditët e imazheve bardhë e zi, por edhe ngjyra, imazheve të paqarta dhe të mëzitshme janë zhdukur prej kohësh! Sot, ju mund të kënaqeni me një imazh të plotë me detaje dhe struktura të plotësuara me ngjyra të vërteta me një shtypje të vetme mbi kontrolluesin - e gjithë kjo është kujdesur nga procesori i fuqishëm 4K HDR Processor X1.', 15, 'TV', '../images/produktet/sonytvishtrejt.png', 70, 'Sony', 0),
(84, 'Apple Pro Display XDR', 3999.99, 'Pro Display XDR vazhdon të evoluojë, dhe tani ju mund të bëni me të më shumë punë dhe argëtim se kurrë më parë. Ai ju ofron performancë të shkëlqyer në një dizajn klasik elegant me teknologji të lehtë për t’u përdorur. Kjo është saktësisht çfarë prisni nga një iMac i ri. Ekrani i kompjuterit gjithçka-në-një Apple iMac 21.5 4K Retina (2020) ka një diagonale prej 21.5 \" dhe rezolucion 4K prej 4096 × 2304 px. Fuqia informatike sigurohet nga një procesor 6-bërthamor Intel Core i5, që punon me një frekuencë prej 3 GHz, ose deri në 4.1 GHz në modalitetin TurboBoost, i plotësuar me 8 GB memorie operative DDR4. Imazhi është prodhuar nga kartela grafike AMD Radeon Pro 560x me 4GB memorie GDDR5. Një hard disk 256 GB SSD është i gatshëm për sistemin, të dhënat dhe aplikacionet. ', 1, 'Monitor', '../images/produktet/xdr-prodisplay.png', 70, 'Apple', 0),
(85, 'Mouse ZOWIE Ec1 ', 90.5, 'Mausi ZOWIE ka senzor optik me një kohë maksimale të përgjigjes prej 1 milisekondë. Aktivizimi i tij i menjëhershëm eleminon kërcimet dhe klikimet e paqëllimta, duke ju dhënë kontroll të plotë gjatë lojës. Ka ndjeshmëri 3200 DPI dhe peshon vetëm 97 g. Kjo lejon lëvizje më shpejtë, më të kontrolluar dhe rrit shpejtësinë e reagimit tuaj në lojë. Mausi është i pajisur me 5 butona të programueshëm dhe një rrotë lëvizëse. Është i përshtatshëm për djathtakë.', 7, 'Të tjera', '../images/produktet/zowieec2.png', 72, 'Benq', 0);

-- --------------------------------------------------------

--
-- Table structure for table `rrethnesh`
--

CREATE TABLE `rrethnesh` (
  `id` int(11) NOT NULL,
  `text` mediumtext NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `rrethnesh`
--

INSERT INTO `rrethnesh` (`id`, `text`) VALUES
(1, '                                    Mirësevini në <b>Quantum Store</b>, burimi juaj numër një për të gjitha paisjet teknologjike. Ne jemi të dedikuar t\'ju shërbejmë produktet teknologjike më të kërkuara në treg dhe nga brendet më të njohura ndërkombëtare, me një theksim të shtuar në kërkesat e klientit, kualitetin e produkteve si dhe shërbim të shpejtë dhe të sigurt. \r\n<br>\r\n<br>\r\nE themeluar në vitin 2015, Quantum Store ka arritur shumë që kur u hap si lokacion fizik në Prishtinë dhe tani edhe si dyqan online. Kjo kompani u themelua me qëllimin e inovimit të tregut të teknologjisë, duke ofruar cmime kompetitive, kualitet të padiskutueshëm si dhe shërbime të fokusuara ndaj klientëve pasionantë pas paisjeve teknologjike.\r\n<br>\r\n<br>\r\nNe shpresojmë që të ndaheni të kënaqur me produktet tona aq sa ne jemi të kënaqur që t\'ua ofrojmë juve ato. Për cdo pyetje apo koment, ju lutemi të mos hezitoni të na kontaktoni përmes email-it apo faqes së kontaktit.\r\n<br>\r\n<br>\r\nMe respekt,\r\n<br>\r\n<br>\r\nQuantumStore                                ');

-- --------------------------------------------------------

--
-- Table structure for table `slider`
--

CREATE TABLE `slider` (
  `id` int(11) NOT NULL,
  `image` varchar(255) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `slider`
--

INSERT INTO `slider` (`id`, `image`) VALUES
(16, '../images/slider/slider1.png'),
(17, '../images/slider/xbox-slider.png'),
(18, '../images/slider/macbook-slider.png');

-- --------------------------------------------------------

--
-- Table structure for table `users`
--

CREATE TABLE `users` (
  `id` int(11) NOT NULL,
  `first_name` varchar(255) NOT NULL,
  `last_name` varchar(255) NOT NULL,
  `email` varchar(255) NOT NULL,
  `password` varchar(255) NOT NULL,
  `time_created` timestamp NOT NULL DEFAULT current_timestamp() ON UPDATE current_timestamp(),
  `is_admin` smallint(1) NOT NULL DEFAULT 0
) ENGINE=InnoDB DEFAULT CHARSET=utf8mb4;

--
-- Dumping data for table `users`
--

INSERT INTO `users` (`id`, `first_name`, `last_name`, `email`, `password`, `time_created`, `is_admin`) VALUES
(70, 'Erjon', 'Januzi', 'erjon@quantum.com', '$2y$10$QW6GcPxDlJGlQ.EiYOY.iedLCnCFfOeE1IdTMnR5V/ISNlYPHJUFO', '2021-02-14 18:28:14', 1),
(72, 'Engjell', 'Avdiu', 'engjell@quantum.com', '$2y$10$dYP5eD0OsYJxjgX7bDV.G.kZRaak0ftiBTEQFOk825r0LHLtdlGlO', '2021-02-14 13:17:13', 1),
(73, 'Admin', 'Admin', 'admin@quantum.com', '$2y$10$8wBr7DFkqoT4q4dedzAfs.5eiPjnT7msOBsW4kO1mjGR3SswGcUre', '2021-02-14 13:19:04', 1),
(74, 'Albin', 'Beqiri', 'albin@gmail.com', '$2y$10$0no8w5wnPfLR8.1dJAgsTOsc9dSAqmc8rh1lOLlQggPz.BDIU7PjW', '2021-02-14 13:29:07', 0),
(75, 'User', 'Demo', 'user@gmail.com', '$2y$10$iTozPgWWQCjKsiUStZt9.uqElqSO7CnPLj3WcbndZzcq4F2EWbtJW', '2021-02-14 13:30:46', 0);

--
-- Indexes for dumped tables
--

--
-- Indexes for table `brands`
--
ALTER TABLE `brands`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `cart`
--
ALTER TABLE `cart`
  ADD PRIMARY KEY (`user_id`,`product_id`),
  ADD KEY `product_id` (`product_id`),
  ADD KEY `user_id` (`user_id`);

--
-- Indexes for table `categories`
--
ALTER TABLE `categories`
  ADD PRIMARY KEY (`emri`);

--
-- Indexes for table `messages`
--
ALTER TABLE `messages`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `products`
--
ALTER TABLE `products`
  ADD PRIMARY KEY (`id`),
  ADD KEY `kategoria` (`kategoria`);

--
-- Indexes for table `rrethnesh`
--
ALTER TABLE `rrethnesh`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `slider`
--
ALTER TABLE `slider`
  ADD PRIMARY KEY (`id`);

--
-- Indexes for table `users`
--
ALTER TABLE `users`
  ADD PRIMARY KEY (`id`);

--
-- AUTO_INCREMENT for dumped tables
--

--
-- AUTO_INCREMENT for table `brands`
--
ALTER TABLE `brands`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `messages`
--
ALTER TABLE `messages`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=17;

--
-- AUTO_INCREMENT for table `products`
--
ALTER TABLE `products`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=86;

--
-- AUTO_INCREMENT for table `rrethnesh`
--
ALTER TABLE `rrethnesh`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=2;

--
-- AUTO_INCREMENT for table `slider`
--
ALTER TABLE `slider`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=19;

--
-- AUTO_INCREMENT for table `users`
--
ALTER TABLE `users`
  MODIFY `id` int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=76;

--
-- Constraints for dumped tables
--

--
-- Constraints for table `cart`
--
ALTER TABLE `cart`
  ADD CONSTRAINT `cart_ibfk_1` FOREIGN KEY (`product_id`) REFERENCES `products` (`id`),
  ADD CONSTRAINT `cart_ibfk_2` FOREIGN KEY (`user_id`) REFERENCES `users` (`id`);

--
-- Constraints for table `products`
--
ALTER TABLE `products`
  ADD CONSTRAINT `products_ibfk_1` FOREIGN KEY (`kategoria`) REFERENCES `categories` (`emri`);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
