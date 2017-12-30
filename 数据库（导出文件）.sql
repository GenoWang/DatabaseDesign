SET SQL_MODE = "NO_AUTO_VALUE_ON_ZERO";
SET AUTOCOMMIT = 0;
START TRANSACTION;

/*!40101 SET @OLD_CHARACTER_SET_CLIENT=@@CHARACTER_SET_CLIENT */;
/*!40101 SET @OLD_CHARACTER_SET_RESULTS=@@CHARACTER_SET_RESULTS */;
/*!40101 SET @OLD_COLLATION_CONNECTION=@@COLLATION_CONNECTION */;
/*!40101 SET NAMES utf8mb4 */;


CREATE TABLE actor (
  actor_id int(11) NOT NULL,
  actor_name char(20) NOT NULL,
  info varchar(300) DEFAULT NULL,
  picture varchar(20) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO actor (actor_id, actor_name, info, picture) VALUES
(1, '塔伦·埃格顿', '塔伦·埃哲顿（Taron Egerton），1989年11月10日出生于英国威尔士，英国演员。\r\n2007年，在由唐·瑞德和 Bill Anderson执导的《督察刘易斯》中饰 Liam Jay 一角。2014年，在由马修·沃恩执导的《王牌特工：特工学院》中饰埃格西，该片2015年2月13日在美国上映。\r\n2015年1月，塔伦被评为英国《GQ》杂志50多位最佳西装穿搭英国男人之一。', './talun.jpg'),
(2, '科林·费尔斯', '科林·费尔斯（ColinFirth），1960年9月10日出生于英格兰汉普郡，英国男演员、编剧、制作人。\r\n2010年，凭借《单身男人》获得奥斯卡最佳男演员提名以及第66届威尼斯电影节最佳男主角奖。2011年，凭借《国王的演讲》获得第68届美国金球奖电影剧情类最佳男主角奖和第83届奥斯卡金像奖最佳男主角奖。2015年，主演的电影《王牌特工：特工学院》上映，并于3月23日到北京参加中国新闻发布会和首映。', './kl.jpg'),
(3, '马克·斯特朗', '马克·斯特朗（原名：马科·基斯普·赛卢梭利亚（Marco Giuseppe Salussolia），1963年8月5日出生于英国伦敦，英国影视演员。\r\n斯特朗早年主要从事戏剧和电视表演，他在1994年英国BBC2台的迷你连续剧《我们北方的朋友们》中扮演的托斯克·考克斯，一时名声大振。2003年以《第十二夜》提名劳伦斯·奥利弗奖最佳男配角。2015年出演8分特工片《王牌特工：特工学院》中教官梅林。2016年主演《王牌贱谍：格林姆斯比》。', './mark.jpg'),
(4, '朱丽安·摩尔', NULL, NULL),
(5, '埃尔顿·约翰', NULL, NULL),
(12, '塞缪尔·杰克逊', NULL, NULL),
(13, '迈克尔·凯恩', NULL, NULL);
DELIMITER $$
CREATE TRIGGER `picture_default2` AFTER INSERT ON `actor` FOR EACH ROW BEGIN 
  UPDATE actor SET picture = './default.jpg' WHERE picture = NULL;
end
$$
DELIMITER ;

CREATE TABLE Admin (
  name varchar(10) NOT NULL,
  pwd varchar(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO Admin (`name`, pwd) VALUES
('admin', 'admin');

CREATE TABLE director (
  director_Id int(11) NOT NULL,
  director_Name char(20) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO director (director_Id, director_Name) VALUES
(2, '弗兰克·德拉邦特'),
(1, '马修·沃恩');

CREATE TABLE film_actor (
  film_id int(11) NOT NULL,
  actor_id int(11) NOT NULL,
  is_leading tinyint(4) DEFAULT '0'
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO film_actor (film_id, actor_id, is_leading) VALUES
(1, 1, 1),
(1, 2, 1),
(1, 3, 1),
(1, 4, 1),
(1, 5, 1),
(2, 1, 1),
(2, 2, 1),
(2, 3, 1),
(2, 12, 1),
(2, 13, 1);

CREATE TABLE film_info (
  film_id int(11) NOT NULL,
  film_name char(20) NOT NULL,
  film_date date DEFAULT NULL,
  info varchar(600) DEFAULT NULL,
  director_Id int(11) DEFAULT NULL,
  picture varchar(30) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO film_info (film_id, film_name, film_date, info, director_Id, picture) VALUES
(1, '王牌特工2', '2017-10-20', '时光飞逝，一转眼，艾格西（塔伦·埃格顿 Taron Egerton 饰）已经成长为了一名出色而又可靠的特工，他和蒂尔德公主（汉娜·阿尔斯托姆 Hanna Alström 饰）之间的感情也愈演愈浓，两人眼看着就要携手步入婚姻的殿堂。就在这个节骨眼上，前特工查理（爱德华·霍尔克罗夫特 Edward Holcroft 饰）杀了回来，如今的他效力于一个名为“黄金圈”的贩毒组织，组织头目波比（朱丽安·摩尔 Julianne Moore 饰）是一个邪恶而又野心勃勃的女人。 \r\n　　查理查出了金士曼的所有据点，用导弹将它们全部摧毁。幸存的艾格西和梅林（马克·斯特朗 Mark Strong 饰）千里迢迢远赴美国，向潜伏在那里的联邦特工寻求帮助。波比种植了一种含有毒素的大麻，将它们输送往世界各地，当瘾君子们体内的毒素渐渐发作后，波比以此为筹码，正式向政府宣战。', 1, './wangpai2.jpg'),
(2, '王牌特工：特工学院', '2015-03-27', '哈里（科林·费斯 Colin Firth 饰）是英国秘密特工组织金士曼中的一员，某次行动中，他的战友不幸牺牲，哈里将一枚徽章和一个电话号码交给了战友年幼的小儿子艾格西（亚历克斯·尼科洛夫 Alex Nikolov 饰），叮嘱他将来如果遇到了什么麻烦可以拨打这个号码，然而，这样的机会只能使用一次。 \r\n　　一晃眼十七年过去，破碎的家庭让艾格西（塔伦·埃格顿 Taron Egerton 饰）成长为了一个整日无所事事的小混混，某日，因为违反交通规则而遭到逮捕的艾格西使用了手中珍贵的号码，赶来的哈里在艾格西玩世不恭的外表之下发现了他善良的本质和极高的天赋，于是，哈里决定将艾格西培养成为新一代金士曼，他们需要共同面对的是强大而又邪恶的亿万富翁瓦伦丁（塞缪尔·杰克逊 Samuel L. Jackson 饰）。', 1, './wangpai.jpg'),
(3, '肖申克的救赎', '1994-09-10', '20世纪40年代末，小有成就的青年银行家安迪（蒂姆·罗宾斯 Tim Robbins 饰）因涉嫌杀害妻子及她的情人而锒铛入狱。在这座名为肖申克的监狱内，希望似乎虚无缥缈，终身监禁的惩罚无疑注定了安迪接下来灰暗绝望的人生。未过多久，安迪尝试接近囚犯中颇有声望的瑞德（摩根·弗里曼 Morgan Freeman 饰），请求对方帮自己搞来小锤子。以此为契机，二人逐渐熟稔，安迪也仿佛在鱼龙混杂、罪恶横生、黑白混淆的牢狱中找到属于自己的求生之道。他利用自身的专业知识，帮助监狱管理层逃税、洗黑钱，同时凭借与瑞德的交往在犯人中间也渐渐受到礼遇。表面看来，他已如瑞德那样对那堵高墙从憎恨转变为处之泰然，但是对自由的渴望仍促使他朝着心中的希望和目标前进。而关于其罪行的真相，似乎更使这一切朝前推进了一步…… \r\n　　本片根据著名作家斯蒂芬·金（Stephen Edwin King）的原著改编。', 2, './Shawshankost.jpg');
DELIMITER $$
CREATE TRIGGER `picture_default` AFTER INSERT ON `film_info` FOR EACH ROW BEGIN 
  UPDATE film_info SET picture = './default.jpg' WHERE picture = NULL;
end
$$
DELIMITER ;

CREATE TABLE film_theme (
  film_id int(11) NOT NULL,
  theme_id int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO film_theme (film_id, theme_id) VALUES
(1, 1),
(1, 2),
(1, 3),
(3, 4),
(3, 12);

CREATE TABLE judgement (
  judge_id int(11) NOT NULL,
  film_id int(11) NOT NULL,
  judge_time datetime DEFAULT NULL,
  info varchar(240) CHARACTER SET utf8mb4 DEFAULT NULL,
  user_id int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO judgement (judge_id, film_id, judge_time, info, user_id) VALUES
(15, 1, '2017-12-26 16:07:47', '好期待好期待，想看', 5),
(35, 1, '2017-12-26 16:24:47', '棒！', 5),
(38, 1, '2017-12-27 12:00:16', '想看+1', 14),
(39, 1, '2017-12-27 12:08:14', '想看+2', 15);

CREATE TABLE posts (
  posts_id int(11) NOT NULL,
  user_id int(11) NOT NULL,
  topic char(40) NOT NULL,
  info varchar(200) DEFAULT NULL,
  release_time datetime NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO posts (posts_id, user_id, topic, info, release_time) VALUES
(1, 5, '谁知道黄金3什么时候出', '有没有知道的dalao给个信啊，刚看完2', '2017-12-07 11:43:30'),
(16, 5, '有人需要优惠券吗', ' 如题', '2017-12-27 12:01:54'),
(32, 11, '123', ' 123123123', '2017-12-29 11:10:11');
DELIMITER $$
CREATE TRIGGER `D_Post_info` BEFORE DELETE ON `posts` FOR EACH ROW BEGIN DELETE FROM posts_info WHERE posts_info.post_id = old.posts_id; 
end
$$
DELIMITER ;

CREATE TABLE posts_info (
  post_id int(11) NOT NULL,
  respond_idx int(11) NOT NULL,
  respond_time datetime DEFAULT NULL,
  user_id int(11) NOT NULL,
  respond_info char(120) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO posts_info (post_id, respond_idx, respond_time, user_id, respond_info) VALUES
(1, 1, '2017-12-15 10:08:00', 5, '不知道啊'),
(1, 2, '2017-12-26 17:05:37', 5, '等吧'),
(1, 3, '2017-12-26 23:53:00', 5, '有小伙伴知道吗'),
(1, 5, '2017-12-27 12:00:50', 14, '应该快了'),
(16, 6, '2017-12-27 12:02:07', 5, '需要的私信'),
(1, 7, '2017-12-27 12:09:13', 5, '嗯嗯');

CREATE TABLE theme (
  theme_id int(11) NOT NULL,
  theme_name char(5) DEFAULT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO theme (theme_id, theme_name) VALUES
(3, '冒险'),
(4, '剧情'),
(2, '动作'),
(7, '动画'),
(10, '历史'),
(17, '古装'),
(1, '喜剧'),
(13, '奇幻'),
(9, '恐怖'),
(8, '悬疑'),
(11, '战争'),
(16, '武侠'),
(15, '灾难'),
(5, '爱情'),
(12, '犯罪'),
(6, '科幻');

CREATE TABLE user_actor (
  user_id int(11) NOT NULL,
  actor_id int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO user_actor (user_id, actor_id) VALUES
(5, 1),
(6, 4),
(6, 12);

CREATE TABLE user_director (
  user_id int(11) NOT NULL,
  director_id int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO user_director (user_id, director_id) VALUES
(5, 2),
(6, 2);

CREATE TABLE user_list (
  user_id int(11) NOT NULL,
  phone_num decimal(11,0) DEFAULT NULL,
  pwd char(20) NOT NULL,
  nick_name char(20) DEFAULT NULL,
  mail char(30) DEFAULT NULL,
  user_name varchar(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO user_list (user_id, phone_num, pwd, nick_name, mail, user_name) VALUES
(5, 1234, '1234', 'keke', '1234', 'keenan'),
(6, 123, '123', 'awhs', '123', 'william'),
(11, 0, 'qwe', 'qwe', 'qew', 'qwe'),
(12, 6, '3', '2', '5', '1'),
(14, 136, '12345', 'helloworld', '22@qq.com', '15231089'),
(15, 188, '1234', 'good', '2@qq.com', 'hello');
DELIMITER $$
CREATE TRIGGER `D_user_info` BEFORE DELETE ON `user_list` FOR EACH ROW BEGIN 
DELETE FROM judgement WHERE judgement.user_id = old.user_id; 
DELETE FROM posts WHERE posts.user_id = old.user_id; 
DELETE FROM posts_info WHERE posts_info.user_id = old.user_id; 
DELETE FROM user_actor WHERE user_actor.user_id = old.user_id; 
DELETE FROM user_director WHERE user_director.user_id = old.user_id; 
DELETE FROM user_theme WHERE user_theme.user_id = old.user_id; 
end
$$
DELIMITER ;

CREATE TABLE user_theme (
  user_id int(11) NOT NULL,
  theme_id int(11) NOT NULL
) ENGINE=InnoDB DEFAULT CHARSET=utf8;

INSERT INTO user_theme (user_id, theme_id) VALUES
(5, 3),
(6, 2),
(6, 6),
(6, 7),
(6, 8),
(6, 9),
(6, 10),
(6, 12),
(14, 3),
(15, 3);


ALTER TABLE actor
  ADD PRIMARY KEY (actor_id),
  ADD UNIQUE KEY actor_name (actor_name);

ALTER TABLE Admin
  ADD PRIMARY KEY (name),
  ADD UNIQUE KEY name (name);

ALTER TABLE director
  ADD PRIMARY KEY (director_Id),
  ADD UNIQUE KEY director_Name (director_Name);

ALTER TABLE film_actor
  ADD PRIMARY KEY (film_id,actor_id),
  ADD KEY actor_id (actor_id);

ALTER TABLE film_info
  ADD PRIMARY KEY (film_id),
  ADD UNIQUE KEY film_name (film_name),
  ADD KEY director_Id (director_Id);

ALTER TABLE film_theme
  ADD PRIMARY KEY (film_id,theme_id),
  ADD KEY theme_id (theme_id);

ALTER TABLE judgement
  ADD PRIMARY KEY (judge_id),
  ADD KEY film_id (film_id),
  ADD KEY user_id (user_id);

ALTER TABLE posts
  ADD PRIMARY KEY (posts_id),
  ADD KEY user_id (user_id);

ALTER TABLE posts_info
  ADD PRIMARY KEY (respond_idx),
  ADD KEY post_id (post_id),
  ADD KEY user_id (user_id);

ALTER TABLE theme
  ADD PRIMARY KEY (theme_id),
  ADD UNIQUE KEY theme_name (theme_name);

ALTER TABLE user_actor
  ADD PRIMARY KEY (user_id,actor_id),
  ADD KEY actor_id (actor_id);

ALTER TABLE user_director
  ADD PRIMARY KEY (user_id,director_id),
  ADD KEY director_id (director_id);

ALTER TABLE user_list
  ADD PRIMARY KEY (user_id),
  ADD UNIQUE KEY user_name (user_name);

ALTER TABLE user_theme
  ADD PRIMARY KEY (user_id,theme_id),
  ADD KEY theme_id (theme_id);


ALTER TABLE actor
  MODIFY actor_id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=15;

ALTER TABLE director
  MODIFY director_Id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=3;

ALTER TABLE film_info
  MODIFY film_id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=4;

ALTER TABLE judgement
  MODIFY judge_id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=40;

ALTER TABLE posts
  MODIFY posts_id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=33;

ALTER TABLE posts_info
  MODIFY respond_idx int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=9;

ALTER TABLE theme
  MODIFY theme_id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=18;

ALTER TABLE user_list
  MODIFY user_id int(11) NOT NULL AUTO_INCREMENT, AUTO_INCREMENT=16;


ALTER TABLE film_actor
  ADD CONSTRAINT film_actor_ibfk_1 FOREIGN KEY (film_id) REFERENCES film_info (film_id),
  ADD CONSTRAINT film_actor_ibfk_2 FOREIGN KEY (actor_id) REFERENCES actor (actor_id);

ALTER TABLE film_info
  ADD CONSTRAINT film_info_ibfk_1 FOREIGN KEY (director_Id) REFERENCES director (director_Id);

ALTER TABLE film_theme
  ADD CONSTRAINT film_theme_ibfk_1 FOREIGN KEY (film_id) REFERENCES film_info (film_id),
  ADD CONSTRAINT film_theme_ibfk_2 FOREIGN KEY (theme_id) REFERENCES theme (theme_id);

ALTER TABLE judgement
  ADD CONSTRAINT judgement_ibfk_1 FOREIGN KEY (film_id) REFERENCES film_info (film_id),
  ADD CONSTRAINT judgement_ibfk_2 FOREIGN KEY (user_id) REFERENCES user_list (user_id);

ALTER TABLE posts
  ADD CONSTRAINT posts_ibfk_1 FOREIGN KEY (user_id) REFERENCES user_list (user_id);

ALTER TABLE posts_info
  ADD CONSTRAINT posts_info_ibfk_1 FOREIGN KEY (post_id) REFERENCES posts (posts_id),
  ADD CONSTRAINT posts_info_ibfk_2 FOREIGN KEY (user_id) REFERENCES user_list (user_id);

ALTER TABLE user_actor
  ADD CONSTRAINT user_actor_ibfk_1 FOREIGN KEY (user_id) REFERENCES user_list (user_id),
  ADD CONSTRAINT user_actor_ibfk_2 FOREIGN KEY (actor_id) REFERENCES actor (actor_id);

ALTER TABLE user_director
  ADD CONSTRAINT user_director_ibfk_1 FOREIGN KEY (user_id) REFERENCES user_list (user_id),
  ADD CONSTRAINT user_director_ibfk_2 FOREIGN KEY (director_id) REFERENCES director (director_Id);

ALTER TABLE user_theme
  ADD CONSTRAINT user_theme_ibfk_1 FOREIGN KEY (user_id) REFERENCES user_list (user_id),
  ADD CONSTRAINT user_theme_ibfk_2 FOREIGN KEY (theme_id) REFERENCES theme (theme_id);
COMMIT;

/*!40101 SET CHARACTER_SET_CLIENT=@OLD_CHARACTER_SET_CLIENT */;
/*!40101 SET CHARACTER_SET_RESULTS=@OLD_CHARACTER_SET_RESULTS */;
/*!40101 SET COLLATION_CONNECTION=@OLD_COLLATION_CONNECTION */;
