/*
Navicat MySQL Data Transfer

Source Server         : 线下
Source Server Version : 50714
Source Host           : localhost:3306
Source Database       : shopp

Target Server Type    : MYSQL
Target Server Version : 50714
File Encoding         : 65001

Date: 2018-07-09 20:44:39
*/

SET FOREIGN_KEY_CHECKS=0;

-- ----------------------------
-- Table structure for sh_article
-- ----------------------------
DROP TABLE IF EXISTS `sh_article`;
CREATE TABLE `sh_article` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT '文章id',
  `article_title` varchar(255) DEFAULT NULL COMMENT '栏目名称',
  `keywords` varchar(255) DEFAULT NULL COMMENT '文章关键词',
  `description` varchar(255) DEFAULT NULL COMMENT '文章描述',
  `author` varchar(100) DEFAULT NULL COMMENT '文章作者',
  `email` varchar(50) DEFAULT NULL COMMENT '作者邮箱',
  `link_url` varchar(255) DEFAULT NULL COMMENT '外链',
  `thumb` varchar(255) DEFAULT NULL COMMENT '缩略图地址',
  `content` longtext COMMENT '文章内容',
  `cate_id` smallint(8) DEFAULT NULL COMMENT '栏目id',
  `show_top` smallint(1) DEFAULT '0' COMMENT '是否置顶(1.是 0.否)',
  `show_status` mediumint(1) DEFAULT '1' COMMENT '显示状态（1.是 0.否）',
  `addtime` varchar(30) DEFAULT NULL COMMENT '添加时间',
  `edittime` varchar(30) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=41 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sh_article
-- ----------------------------
INSERT INTO `sh_article` VALUES ('1', '配送与支付', '魅族商城购物配送说明', '魅族商城购物配送说明', 'admin', '1096728445@qq.com', '', 'article/20171115\\bdf0b697c16e9f533bb8fbc7f000473e.jpg', '<p>&nbsp; &nbsp;	</p><h1>魅族商城购物配送说明</h1><p>一、配送方式&nbsp;:<br/>魅族商城由魅族发货的商品默认选择顺丰速运配送，提供送货上门服务。</p><p>二、配送范围&nbsp;:<br/>支持全国大部分地区配送（仅支持大陆地区配送，不支持港澳台及海外地区）。<br/>顺丰无法到达的地区，待快件到达距离客户最近的顺丰网点后，安排转寄其他快递。</p><p>三、配送时效&nbsp;:<br/>魅族商城支持百城速达服务，15个城市当日送达，105个城市次日送达。具体服务内容可参见百城速达服务介绍。全国大部分地区一般1至3天送达，部分偏远地区配送时效稍长，具体以物流公司网站查询结果为准。</p><p>四、配送物流信息查询 &nbsp;:<br/>订单发货后，我们会将发货信息发送至您的收件预留手机，您可登陆魅族商城（https://store.meizu.com），在“我的订单”中选择对应订单，查询快递单号和跟踪配送进度。也可拨打顺丰客服专线95338和登录顺丰官网（www.sf-express.com）进行查询。</p><p>五、配送服务其它说明 &nbsp;:<br/> 1、魅族商城购物全场包邮。如需修改收件信息，请在产生物流信息前完成；如产生物流信息后进行修改，物流公司会收取额外配送费用。<br/>2、顺丰不到地区由顺丰转寄第三方物流，不收取转寄费用，如有物流公司或者个人向您索取额外费用，请联系我们进行投诉（400-788-3333）。<br/> 3、签收商品后，请您拆开包装检查配件是否齐全，确认机器是否正常，如有异常请在24小时内联系我们，我们会及时跟进处理。</p><p><br/></p>', '5', '0', '1', '1509866848', '1510732232');
INSERT INTO `sh_article` VALUES ('2', '保外服务', '保外服务', '保外服务', 'admin', '10962558@qq.com', '', 'article/20171105\\e20c059095dd6f9c0638404b760bea2a.jpg', '<p><br/></p><h2>手机类产品售后政策</h2><p><br/></p><h3>保外服务</h3><p><br/></p><p><br/></p><p>自您购机之日起，若属于下列原因中的任何一种而导致设备出现故障或损坏的，魅族公司有权根据国家&quot;三包&quot;有关规定，不按照&quot;三包&quot;承诺条款的内容提供服务，但您可以选择有偿服务:</p><p><br/></p><p>1)整机及部件已经超过退换货或维修有效期的；</p><p><br/></p><p>2)无&quot;三包&quot;凭证及有效发票，但能够证明该移动电话机商品在三包有效期内的除外；</p><p><br/></p><p>3)&quot;三包&quot;凭证上的内容与商品实物标识不符或者涂改的；</p><p><br/></p><p>4)未按产品使用说明书要求使用、维护、保养而造成损坏的；</p><p><br/></p><p>5)私自拆动造成损坏，非经魅族公司认可方维修和改装的；</p><p><br/></p><p>6)进液、受潮或发霉的；</p><p><br/></p><p>7)因不可抗力造成损坏的；</p><p><br/></p><p>8)除国家三包规定所列的设备主要部件之外，设备的辅助部件和其他部件出现故障的。</p><p><br/></p><p><br/></p><p><br/></p>', '10', '0', '1', '1509866956', '1510568266');
INSERT INTO `sh_article` VALUES ('16', '联系方式', '联系方式', '联系方式', 'admin', 'admin', '', null, '<h3 style=\"margin: 80px 0px 34px; padding: 0px 0px 0px 30px; font-size: 26px; border: 0px; list-style: none; line-height: 26px; height: 26px; color: rgb(51, 51, 51); font-family: 微软雅黑, &quot;Microsoft Yahei&quot;, Arial, Helvetica, sans-serif, 宋体; white-space: normal; background-color: rgb(247, 247, 247);\">联系方式</h3><p><br/></p>', '25', '0', '1', '1525315133', null);
INSERT INTO `sh_article` VALUES ('17', '选机咨询', '选机咨询', '选机咨询', 'admin', 'admin', '', null, '<p class=\"tips\" style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; box-sizing: content-box; color: rgb(146, 146, 146); font-family: Helvetica, Tahoma, Arial, &quot;Hiragino Sans GB&quot;, &quot;Microsoft YaHei&quot;, SimSun, Heiti, sans-serif; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);\"><span class=\"bold\" style=\"margin: 0px; padding: 0px;\">温馨提示：</span></p><p><br style=\"margin: 0px; padding: 0px; color: rgb(146, 146, 146); font-family: Helvetica, Tahoma, Arial, &quot;Hiragino Sans GB&quot;, &quot;Microsoft YaHei&quot;, SimSun, Heiti, sans-serif; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);\"/></p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; box-sizing: content-box; color: rgb(146, 146, 146); font-family: Helvetica, Tahoma, Arial, &quot;Hiragino Sans GB&quot;, &quot;Microsoft YaHei&quot;, SimSun, Heiti, sans-serif; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);\">1.	仅支持魅族商城及授权渠道所售魅族产品的真伪查询服务；</p><p><br style=\"margin: 0px; padding: 0px; color: rgb(146, 146, 146); font-family: Helvetica, Tahoma, Arial, &quot;Hiragino Sans GB&quot;, &quot;Microsoft YaHei&quot;, SimSun, Heiti, sans-serif; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);\"/></p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; box-sizing: content-box; color: rgb(146, 146, 146); font-family: Helvetica, Tahoma, Arial, &quot;Hiragino Sans GB&quot;, &quot;Microsoft YaHei&quot;, SimSun, Heiti, sans-serif; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);\">2.	如何查看所购买的魅族商品SN / IMEI号？</p><p><br style=\"margin: 0px; padding: 0px; color: rgb(146, 146, 146); font-family: Helvetica, Tahoma, Arial, &quot;Hiragino Sans GB&quot;, &quot;Microsoft YaHei&quot;, SimSun, Heiti, sans-serif; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);\"/></p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; box-sizing: content-box; color: rgb(146, 146, 146); font-family: Helvetica, Tahoma, Arial, &quot;Hiragino Sans GB&quot;, &quot;Microsoft YaHei&quot;, SimSun, Heiti, sans-serif; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);\">手机产品可以进入“设置-关于手机”界面查看，或通过手机包装彩盒后的条码贴纸查看SN / IMEI 号。</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px; box-sizing: content-box; color: rgb(146, 146, 146); font-family: Helvetica, Tahoma, Arial, &quot;Hiragino Sans GB&quot;, &quot;Microsoft YaHei&quot;, SimSun, Heiti, sans-serif; font-size: 14px; white-space: normal; background-color: rgb(255, 255, 255);\">配件产品可通过查看产品包装上的条码贴纸或标签来获取SN号。</p><p><br/></p>', '25', '0', '1', '1525315786', null);
INSERT INTO `sh_article` VALUES ('18', '投诉与建议', '投诉与建议', '投诉与建议', 'admin', 'admin', '', null, '<p><span style=\"color: rgb(81, 81, 81); font-family: Helvetica, Tahoma, Arial, &quot;Hiragino Sans GB&quot;, &quot;Microsoft YaHei&quot;, SimSun, Heiti, sans-serif; background-color: rgb(255, 255, 255);\">魅族社区的各项抽奖活动为魅友们带来更多获得魅族产品、周边的机会，自推出以来一直受到广大魅友们的欢迎。在活动不断丰富，参与用户越来越多的同时，恶意刷奖行为不得不引起我们的重视：在多个活动中，屡次出现大量注册马甲恶意抽奖的行为，甚至通过刷奖，在其他*台将奖品高价卖出。</span><br style=\"word-wrap: break-word; word-break: break-all; color: rgb(81, 81, 81); font-family: Helvetica, Tahoma, Arial, &quot;Hiragino Sans GB&quot;, &quot;Microsoft YaHei&quot;, SimSun, Heiti, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\"/><br style=\"word-wrap: break-word; word-break: break-all; color: rgb(81, 81, 81); font-family: Helvetica, Tahoma, Arial, &quot;Hiragino Sans GB&quot;, &quot;Microsoft YaHei&quot;, SimSun, Heiti, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\"/><span style=\"color: rgb(81, 81, 81); font-family: Helvetica, Tahoma, Arial, &quot;Hiragino Sans GB&quot;, &quot;Microsoft YaHei&quot;, SimSun, Heiti, sans-serif; background-color: rgb(255, 255, 255);\">　　违规刷奖行为不仅影响了魅友们获取福利的机会，也严重打消了大家参与活动的积极性。为此，魅族社区正式推出活动防刷系统，还魅友们更多福利。</span><br style=\"word-wrap: break-word; word-break: break-all; color: rgb(81, 81, 81); font-family: Helvetica, Tahoma, Arial, &quot;Hiragino Sans GB&quot;, &quot;Microsoft YaHei&quot;, SimSun, Heiti, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\"/><br style=\"word-wrap: break-word; word-break: break-all; color: rgb(81, 81, 81); font-family: Helvetica, Tahoma, Arial, &quot;Hiragino Sans GB&quot;, &quot;Microsoft YaHei&quot;, SimSun, Heiti, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\"/><span style=\"color:#ff0000;word-wrap: break-word; word-break: break-all; font-family: Helvetica, Tahoma, Arial, &quot;Hiragino Sans GB&quot;, &quot;Microsoft YaHei&quot;, SimSun, Heiti, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\"><span style=\"word-wrap: break-word; word-break: break-all; font-weight: 700;\">详细规则：</span><br style=\"word-wrap: break-word; word-break: break-all;\"/>1.所有魅族社区抽奖活动，必须使用已绑定手机号的 Flyme 账号参加；<br style=\"word-wrap: break-word; word-break: break-all;\"/>2.获得实物奖品后，会对绑定的手机号发送验证码，验证通过方可填写收件信息；<br style=\"word-wrap: break-word; word-break: break-all;\"/>3.填写收件信息时，已绑定的手机号即为收件号码，不可更改；<br style=\"word-wrap: break-word; word-break: break-all;\"/>4.如需修改绑定手机号，需在抽奖前操作，中奖后修改绑定号码将导致无法收到验证码；<br style=\"word-wrap: break-word; word-break: break-all;\"/>5.防刷系统涉及范围包括但不限于：幸运 3+2、直播抽奖、节日抽奖活动、兑换商城等。</span><br style=\"word-wrap: break-word; word-break: break-all; color: rgb(81, 81, 81); font-family: Helvetica, Tahoma, Arial, &quot;Hiragino Sans GB&quot;, &quot;Microsoft YaHei&quot;, SimSun, Heiti, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\"/><br style=\"word-wrap: break-word; word-break: break-all; color: rgb(81, 81, 81); font-family: Helvetica, Tahoma, Arial, &quot;Hiragino Sans GB&quot;, &quot;Microsoft YaHei&quot;, SimSun, Heiti, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\"/><span style=\"color: rgb(81, 81, 81); font-family: Helvetica, Tahoma, Arial, &quot;Hiragino Sans GB&quot;, &quot;Microsoft YaHei&quot;, SimSun, Heiti, sans-serif; background-color: rgb(255, 255, 255);\">　　防刷系统的上线给魅友们的操作也带来一些不便，希望大家谅解。保障广大魅友的利益，我们一直在努力。</span><br style=\"word-wrap: break-word; word-break: break-all; color: rgb(81, 81, 81); font-family: Helvetica, Tahoma, Arial, &quot;Hiragino Sans GB&quot;, &quot;Microsoft YaHei&quot;, SimSun, Heiti, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\"/><br style=\"word-wrap: break-word; word-break: break-all; color: rgb(81, 81, 81); font-family: Helvetica, Tahoma, Arial, &quot;Hiragino Sans GB&quot;, &quot;Microsoft YaHei&quot;, SimSun, Heiti, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\"/><span style=\"color: rgb(81, 81, 81); font-family: Helvetica, Tahoma, Arial, &quot;Hiragino Sans GB&quot;, &quot;Microsoft YaHei&quot;, SimSun, Heiti, sans-serif; background-color: rgb(255, 255, 255);\">　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　　魅族社区</span><br style=\"word-wrap: break-word; word-break: break-all; color: rgb(81, 81, 81); font-family: Helvetica, Tahoma, Arial, &quot;Hiragino Sans GB&quot;, &quot;Microsoft YaHei&quot;, SimSun, Heiti, sans-serif; white-space: normal; background-color: rgb(255, 255, 255);\"/><span style=\"color: rgb(81, 81, 81); font-family: Helvetica, Tahoma, Arial, &quot;Hiragino Sans GB&quot;, &quot;Microsoft YaHei&quot;, SimSun, Heiti, sans-serif; background-color: rgb(255, 255, 255);\">　　　　　　　　　　　　　　　　　　　　　　　　　　　　　2017 年 8 月 10 日</span></p>', '25', '0', '1', '1525315900', null);
INSERT INTO `sh_article` VALUES ('19', '售后流程', '售后流程', '售后流程', 'admin', 'admin', '', null, '<h2 style=\"margin: 0px; padding: 0px; font-size: 18px; font-weight: normal; font-family: 微软雅黑, &quot;Microsoft Yahei&quot;, Arial, Helvetica, sans-serif, 宋体; white-space: normal; background-color: rgb(255, 255, 255);\">手机类产品售后政策</h2><h3 style=\"margin: 40px 0px 0px; padding: 0px; font-size: 16px; font-weight: normal; height: 22px; font-family: 微软雅黑, &quot;Microsoft Yahei&quot;, Arial, Helvetica, sans-serif, 宋体; white-space: normal; background-color: rgb(255, 255, 255);\">15日免费换货</h3><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px;\">自收货之日起15日内（含），如果手机主机出现符合三包规定的性能故障，并经魅族厂家或官方授权服务点检测确定手机主机出现符合三包规定的性能故障，您可以选择修理或者免费更换同型号同规格的手机主机。办理换货时需提供发票（开具电子发票的订单售后处理时无需提供发票）及填写完整的保修卡等有效购买凭证。</p><p><br/></p>', '4', '0', '1', '1525315959', null);
INSERT INTO `sh_article` VALUES ('20', '购物流程', '购物流程', '购物流程', 'admin', 'admin', '', null, '<h2 style=\"margin: 0px; padding: 0px; font-size: 18px; font-weight: normal; font-family: 微软雅黑, &quot;Microsoft Yahei&quot;, Arial, Helvetica, sans-serif, 宋体; white-space: normal; background-color: rgb(255, 255, 255);\">手机类产品售后政策</h2><h3 style=\"margin: 40px 0px 0px; padding: 0px; font-size: 16px; font-weight: normal; height: 22px; font-family: 微软雅黑, &quot;Microsoft Yahei&quot;, Arial, Helvetica, sans-serif, 宋体; white-space: normal; background-color: rgb(255, 255, 255);\">7日免费退货</h3><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px;\">1) 魅族在线商店销售的手机产品自收货之日起7日内（含），在商品完好的情况下，可申请七日无理由退货，七日无理由退货所产生的运费需消费者承担。</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px;\">2) 自收货之日起7日内（含），手机主机出现国家规定的《移动电话机商品性能故障表》所列出的性能故障，并经魅族厂家或官方授权服务点检测确定手机主机出现符合三包规定的性能故障，您可以选择维修、更换同型号同规格的手机主机或退货；如果您选择退货，请您携带主机及其全部配件到销售商所在地，按照购买价格（以魅族公司公布的市场零售价格为准）一次性退清货款。退货及退款由销售商负责。</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px;\">3) 退货需保持商品包装、主机、配件及发票完好齐全。</p><p><br/></p>', '4', '0', '1', '1525316010', null);
INSERT INTO `sh_article` VALUES ('21', '订购方式', '订购方式', '订购方式', 'admin', 'admin', '', null, '<h3 style=\"margin: 40px 0px 0px; padding: 0px; font-size: 16px; font-weight: normal; height: 22px; font-family: 微软雅黑, &quot;Microsoft Yahei&quot;, Arial, Helvetica, sans-serif, 宋体; white-space: normal; background-color: rgb(255, 255, 255);\">保外服务</h3><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px;\">自您购机之日起，若属于下列原因中的任何一种而导致设备出现故障或损坏的，魅族公司有权根据国家&quot;三包&quot;有关规定，不按照&quot;三包&quot;承诺条款的内容提供服务，但您可以选择有偿服务:</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px;\">1)整机及部件已经超过退换货或维修有效期的；</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px;\">2)无&quot;三包&quot;凭证及有效发票，但能够证明该移动电话机商品在三包有效期内的除外；</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px;\">3)&quot;三包&quot;凭证上的内容与商品实物标识不符或者涂改的；</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px;\">4)未按产品使用说明书要求使用、维护、保养而造成损坏的；</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px;\">5)私自拆动造成损坏，非经魅族公司认可方维修和改装的；</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px;\">6)进液、受潮或发霉的；</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px;\">7)因不可抗力造成损坏的；</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px;\">8)除国家三包规定所列的设备主要部件之外，设备的辅助部件和其他部件出现故障的。</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px;\"><a href=\"http://service.meizu.com/repair_quotation.html\" target=\"_self\" style=\"margin: 0px; padding: 0px; text-decoration-line: none; color: rgb(81, 81, 81); outline: none;\">点击查询手机配件价格表</a></p><p><br/></p>', '4', '0', '1', '1525316084', null);
INSERT INTO `sh_article` VALUES ('22', '货到付款区域', '货到付款区域', '货到付款区域', 'admin', 'admin', '', null, '<p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px 0px 30px; font-size: 14px; line-height: 22px; color: rgb(81, 81, 81); font-family: 微软雅黑, &quot;Microsoft Yahei&quot;, Arial, Helvetica, sans-serif, 宋体; white-space: normal; background-color: rgb(255, 255, 255);\">一、配送方式&nbsp;:<br style=\"margin: 0px; padding: 0px;\"/>魅族商城由魅族发货的商品默认选择顺丰速运配送，提供送货上门服务。</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px 0px 30px; font-size: 14px; line-height: 22px; color: rgb(81, 81, 81); font-family: 微软雅黑, &quot;Microsoft Yahei&quot;, Arial, Helvetica, sans-serif, 宋体; white-space: normal; background-color: rgb(255, 255, 255);\">二、配送范围&nbsp;:<br style=\"margin: 0px; padding: 0px;\"/>支持全国大部分地区配送（仅支持大陆地区配送，不支持港澳台及海外地区）。<br style=\"margin: 0px; padding: 0px;\"/>顺丰无法到达的地区，待快件到达距离客户最近的顺丰网点后，安排转寄其他快递。</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px 0px 30px; font-size: 14px; line-height: 22px; color: rgb(81, 81, 81); font-family: 微软雅黑, &quot;Microsoft Yahei&quot;, Arial, Helvetica, sans-serif, 宋体; white-space: normal; background-color: rgb(255, 255, 255);\">三、配送时效&nbsp;:<br style=\"margin: 0px; padding: 0px;\"/>魅族商城支持百城速达服务，15个城市当日送达，105个城市次日送达。具体服务内容可参见百城速达服务介绍。全国大部分地区一般1至3天送达，部分偏远地区配送时效稍长，具体以物流公司网站查询结果为准。</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px 0px 30px; font-size: 14px; line-height: 22px; color: rgb(81, 81, 81); font-family: 微软雅黑, &quot;Microsoft Yahei&quot;, Arial, Helvetica, sans-serif, 宋体; white-space: normal; background-color: rgb(255, 255, 255);\">四、配送物流信息查询 :<br style=\"margin: 0px; padding: 0px;\"/>订单发货后，我们会将发货信息发送至您的收件预留手机，您可登陆魅族商城（https://store.meizu.com），在“我的订单”中选择对应订单，查询快递单号和跟踪配送进度。也可拨打顺丰客服专线95338和登录顺丰官网（www.sf-express.com）进行查询。</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px 0px 30px; font-size: 14px; line-height: 22px; color: rgb(81, 81, 81); font-family: 微软雅黑, &quot;Microsoft Yahei&quot;, Arial, Helvetica, sans-serif, 宋体; white-space: normal; background-color: rgb(255, 255, 255);\">五、配送服务其它说明 :<br style=\"margin: 0px; padding: 0px;\"/>1、魅族商城购物全场包邮。如需修改收件信息，请在产生物流信息前完成；如产生物流信息后进行修改，物流公司会收取额外配送费用。<br style=\"margin: 0px; padding: 0px;\"/>2、顺丰不到地区由顺丰转寄第三方物流，不收取转寄费用，如有物流公司或者个人向您索取额外费用，请联系我们进行投诉（400-788-3333）。<br style=\"margin: 0px; padding: 0px;\"/>3、签收商品后，请您拆开包装检查配件是否齐全，确认机器是否正常，如有异常请在24小时内联系我们，我们会及时跟进处理。</p><p><br/></p>', '5', '0', '1', '1525316151', null);
INSERT INTO `sh_article` VALUES ('23', '配送支付智能查询', '配送支付智能查询', '配送支付智能查询', 'admin', 'admin', '', null, '<ol class=\"mod-ulist list-paddingleft-2\" style=\"list-style-type: none;\"><li><p>a. 12 个城市支持当日送达，107 个城市支持次日送达，派送实现仅限市区，服务范围&nbsp;<a href=\"https://hd.mall.meizu.com/rules/marrive.html\" style=\"background-color: transparent; text-decoration-line: none; outline: 0px; color: rgb(0, 119, 204);\">请点击 &gt;</a></p></li><li><p>b. 百城速达服务具体以购买商品付款后提示信息为准。</p></li><li><p>c. 由于业务发展变化、行政区域更名等因素，百城速达配送区域可能会不时有扩大、变更或调整，具体区域请以网站中公布信息为准。</p></li><li><p>d. 非魅族发货商品暂不支持百城速达服务。</p></li></ol><p class=\"mod-notice\" style=\"margin-top: 35px; margin-bottom: 0px; padding: 0px; list-style: none; font-size: 14px; line-height: 2; color: rgb(81, 81, 81); font-family: &quot;PingFang SC&quot;, 微软雅黑, &quot;Microsoft Yahei&quot;, Arial, Helvetica, sans-serif, 宋体; white-space: normal; background-color: rgb(246, 246, 246);\">*注意事项<br/>如遇交通管制、大雨雪、洪涝、冰灾、地震、节假日、618、双十一活动、停电等因素，<br/>不可预料延时派送除外，由于客户原因地址不详、电话不准确、申请退款等均不在百城速达服务范围内。</p><p><br/></p>', '5', '0', '1', '1525316201', null);
INSERT INTO `sh_article` VALUES ('24', '我的订单', '我的订单', '我的订单', 'admin', 'admin', '', null, '<p>https://www.meizu.com/</p>', '9', '0', '1', '1525316296', null);
INSERT INTO `sh_article` VALUES ('25', '我的收藏', '我的收藏', '我的收藏', 'admin', 'admin', '', null, '<p>https://www.meizu.com/</p>', '9', '0', '1', '1525316330', null);
INSERT INTO `sh_article` VALUES ('26', '资金管理', '资金管理', '资金管理', '资金管理', 'admin', '', null, '<ul style=\"list-style-type: none;\" class=\" list-paddingleft-2\"><li><p><a href=\"http://localhost/shopp/public/index#\" style=\"padding: 0px; margin: 0px; text-decoration-line: none; color: rgb(244, 36, 36); font-size: 14px;\">资金管理</a></p></li></ul><p><br/></p>', '9', '0', '1', '1525316355', null);
INSERT INTO `sh_article` VALUES ('27', '退换货原则', '退换货原则', '退换货原则', 'admin', 'admin', '', null, '<h3 style=\"margin: 40px 0px 0px; padding: 0px; font-size: 16px; font-weight: normal; height: 22px; font-family: 微软雅黑, &quot;Microsoft Yahei&quot;, Arial, Helvetica, sans-serif, 宋体; white-space: normal; background-color: rgb(255, 255, 255);\">保外服务</h3><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px;\">自您购机之日起，若属于下列原因中的任何一种而导致设备出现故障或损坏的，魅族公司有权根据国家&quot;三包&quot;有关规定，不按照&quot;三包&quot;承诺条款的内容提供服务，但您可以选择有偿服务:</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px;\">1)整机及部件已经超过退换货或维修有效期的；</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px;\">2)无&quot;三包&quot;凭证及有效发票，但能够证明该移动电话机商品在三包有效期内的除外；</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px;\">3)&quot;三包&quot;凭证上的内容与商品实物标识不符或者涂改的；</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px;\">4)未按产品使用说明书要求使用、维护、保养而造成损坏的；</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px;\">5)私自拆动造成损坏，非经魅族公司认可方维修和改装的；</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px;\">6)进液、受潮或发霉的；</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px;\">7)因不可抗力造成损坏的；</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px;\">8)除国家三包规定所列的设备主要部件之外，设备的辅助部件和其他部件出现故障的。</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px;\"><a href=\"http://service.meizu.com/repair_quotation.html\" target=\"_self\" style=\"margin: 0px; padding: 0px; text-decoration-line: none; color: rgb(81, 81, 81); outline: none;\">点击查询手机配件价格表</a></p><p><br/></p>', '10', '0', '1', '1525316428', null);
INSERT INTO `sh_article` VALUES ('28', '售后服务保证', '售后服务保证', '售后服务保证', 'admin', 'admin', '', null, '<h3 style=\"margin: 40px 0px 0px; padding: 0px; font-size: 16px; font-weight: normal; height: 22px; font-family: 微软雅黑, &quot;Microsoft Yahei&quot;, Arial, Helvetica, sans-serif, 宋体; white-space: normal; background-color: rgb(255, 255, 255);\">一年免费保修</h3><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px;\">1）自购买之日起后一年内（含），如果手机主机出现国家三包规定中所列非人为性能故障，并经魅族授权的维修、服务网点检测确定，检测确认手机主机出现符合国家三包规定的非人为性能故障，您可以选择免费维修。</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px;\">2）上述故障经两次维修，仍不能正常使用的，用户可凭三包凭证中修理者提供的修理记录，由销售商负责免费更换同型号同规格的手机主机。</p><p style=\"margin-top: 0px; margin-bottom: 0px; padding: 0px;\">3）若符合换货条件，并且销售商有同型号、同规格的机器，消费者不愿意调换而要求退货的，可按购机价格每天0.5%比例收取折旧费后给予退机。&nbsp;<br style=\"margin: 0px; padding: 0px;\"/>退款=购机价—购机价*使用天数*0.5%</p><p><br/></p>', '10', '0', '1', '1525316460', null);
INSERT INTO `sh_article` VALUES ('32', ' 免责条款', '\r\n免责条款', '\r\n免责条款', 'admin', 'admin', 'http://', null, '<p><span style=\"color: rgb(255, 255, 255); font-family: &quot;microsoft yahei&quot;; font-weight: 700; background-color: rgb(38, 38, 38);\">免责条款</span><span style=\"color: rgb(255, 255, 255); font-family: &quot;microsoft yahei&quot;; font-weight: 700; background-color: rgb(38, 38, 38);\">免责条款</span><span style=\"color: rgb(255, 255, 255); font-family: &quot;microsoft yahei&quot;; font-weight: 700; background-color: rgb(38, 38, 38);\">免责条款</span></p>', '3', '0', '1', '1525494840', null);
INSERT INTO `sh_article` VALUES ('29', 'IOS下载', 'IOS下载', 'IOS下载', 'admin', 'admin', '', null, '<p>https://www.baidu.com/link?url=CusUJI15_hJl2kospdpl73K0eByW3cPclVaLgycFzUL5ctl6NpHmHSqffyPbpyJegC8l9a_M9pDmPu0iL6tkMa&amp;wd=&amp;eqid=e76fe4d200010ab5000000035aea7868</p>', '29', '0', '1', '1525327209', null);
INSERT INTO `sh_article` VALUES ('30', 'Android下载', 'Android下载', 'Android下载', 'Android下载', 'admin', '', null, '<p>Android下载</p>', '29', '0', '1', '1525327269', null);
INSERT INTO `sh_article` VALUES ('31', ' 隐私保护', ' 隐私保护', ' 隐私保护', 'admin', 'admin', 'http://', null, '<p><span style=\"color: rgb(68, 68, 68); font-family: &quot;Open Sans&quot;, &quot;Segoe UI&quot;; font-size: 13px; background-color: rgb(255, 255, 255);\">&nbsp;隐私保护</span></p>', '3', '0', '1', '1525494813', null);
INSERT INTO `sh_article` VALUES ('33', ' 公司简介', '\r\n公司简介', '\r\n公司简介', 'admin', 'admin', 'http://', null, '<p><span style=\"color: rgb(255, 255, 255); font-family: &quot;microsoft yahei&quot;; font-weight: 700; background-color: rgb(38, 38, 38);\">公司简介</span></p>', '3', '0', '1', '1525494858', null);
INSERT INTO `sh_article` VALUES ('34', ' 意见反馈', '\r\n意见反馈', '\r\n意见反馈', 'admin', 'admin', 'http://', null, '<p><span style=\"color: rgb(255, 255, 255); font-family: &quot;microsoft yahei&quot;; font-weight: 700; background-color: rgb(38, 38, 38);\">意见反馈</span><span style=\"color: rgb(255, 255, 255); font-family: &quot;microsoft yahei&quot;; font-weight: 700; background-color: rgb(38, 38, 38);\">意见反馈</span><span style=\"color: rgb(255, 255, 255); font-family: &quot;microsoft yahei&quot;; font-weight: 700; background-color: rgb(38, 38, 38);\">意见反馈</span><span style=\"color: rgb(255, 255, 255); font-family: &quot;microsoft yahei&quot;; font-weight: 700; background-color: rgb(38, 38, 38);\">意见反馈</span></p>', '3', '0', '1', '1525494878', null);
INSERT INTO `sh_article` VALUES ('35', '服务店突破2000多家', '服务店突破2000多家', '服务店突破2000多家', 'admin', '1096728112@qq.com', 'http://1096728112@qq.com', null, '<p><a href=\"http://localhost/shopp/index.php/article.php?id=63\" target=\"_blank\">服务店突破2000多家</a></p>', '31', '0', '1', '1526749368', '1530278466');
INSERT INTO `sh_article` VALUES ('36', '我们成为中国最大家电零售B2', '我们成为中国最大家电零售B2', '我们成为中国最大家电零售B2', 'admin', '1096728112@qq.com', 'http://', null, '<p><a href=\"http://localhost/shopp/index.php/article.php?id=62\" target=\"_blank\">我们成为中国最大家电零售B2</a></p>', '31', '0', '1', '1526749403', null);
INSERT INTO `sh_article` VALUES ('37', '三大国际腕表品牌签约', '三大国际腕表品牌签约', '三大国际腕表品牌签约', 'admin', '1096728112@qq.com', 'http://', null, '<p><a href=\"http://localhost/shopp/index.php/article.php?id=61\" target=\"_blank\">三大国际腕表品牌签约</a></p>', '31', '0', '1', '1526749428', null);
INSERT INTO `sh_article` VALUES ('38', '春季家装季，家电买一送一', '春季家装季，家电买一送一', '春季家装季，家电买一送一', 'admin', '1096728112@qq.com', 'http://', null, '<p><a href=\"http://localhost/shopp/index.php/article.php?id=60\" target=\"_blank\">春季家装季，家电买一送一</a></p>', '38', '0', '1', '1526749461', null);
INSERT INTO `sh_article` VALUES ('39', '抢百元优惠券，享4.22%活期', '抢百元优惠券，享4.22%活期', '抢百元优惠券，享4.22%活期', 'admin', '1096728112@qq.com', 'http://', null, '<p><a href=\"http://localhost/shopp/index.php/article.php?id=59\" target=\"_blank\">抢百元优惠券，享4.22%活期</a></p>', '38', '0', '1', '1526749480', null);
INSERT INTO `sh_article` VALUES ('40', 'Macbook最高返50000消费豆', 'Macbook最高返50000消费豆', 'Macbook最高返50000消费豆', 'admin', '1096728112@qq.com', 'http://', null, '<p><a href=\"http://localhost/shopp/index.php/article.php?id=58\" target=\"_blank\">Macbook最高返50000消费豆</a></p>', '38', '0', '1', '1526749500', null);

-- ----------------------------
-- Table structure for sh_brand
-- ----------------------------
DROP TABLE IF EXISTS `sh_brand`;
CREATE TABLE `sh_brand` (
  `brand_id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '品牌id',
  `brand_name` varchar(255) DEFAULT NULL COMMENT '品牌的名称·',
  `brand_url` varchar(255) DEFAULT NULL COMMENT '品牌官网地址',
  `brand_describe` text COMMENT '品牌的描述',
  `brand_sort` smallint(50) DEFAULT '50' COMMENT '品牌的排序',
  `brand_status` tinyint(1) DEFAULT '1' COMMENT '品牌的状态(1.显示 0.不显示)',
  `thumb` varchar(255) DEFAULT NULL COMMENT '品牌logo',
  `addtime` varchar(20) DEFAULT NULL COMMENT '添加时间',
  PRIMARY KEY (`brand_id`)
) ENGINE=MyISAM AUTO_INCREMENT=31 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sh_brand
-- ----------------------------
INSERT INTO `sh_brand` VALUES ('4', '魅族', 'https://www.meizu.com/?rc=bdpz&bt', '魅族官网提供魅族 PRO 系列、MX 系列和魅蓝(Note)系列产品的预约和购买。提供最新魅族产品资讯、完善的售后服务、社区在线交流、手机固件/应用下载。', '50', '1', 'logo/20171102\\d7b425002bffd6a288017f419157fb62.jpg', null);
INSERT INTO `sh_brand` VALUES ('5', '京东', 'https://www.jd.com/', '京东JD.COM-专业综合网上购物商城，销售超数万品牌、4020万种商品，囊括家电、手机、电脑、服装、居家、母婴、个护、食品、旅游等13大品类。京东PLUS会员，免费体验30天。秉承客户为先的理念，京东所售商品100％正品行货、全国联保、机打发票。提供专业配送、售后服务！', '50', '0', 'logo/20171102\\4ce0dd9170a37cf46bb5ee20ac43a8f9.jpg', null);
INSERT INTO `sh_brand` VALUES ('23', 'Canon', 'http://localhost/shopp/brandn.php?id=195', '1490075385239594909.jpg', '50', '1', 'logo/20180520\\da94812ae31311a5083dbdccffbe78f6.jpg', '1526781047');
INSERT INTO `sh_brand` VALUES ('24', 'TaTa', 'http://localhost/shopp/brandn.php?id=73', '1490072329183966195.jpg', '50', '1', 'logo/20180520\\ffb56c39e4157e774b8089e25e79331a.jpg', '1526781073');
INSERT INTO `sh_brand` VALUES ('25', '金利来', 'http://localhost/shopp/brandn.php?id=76', '1490072373278367315.jpg', '50', '1', 'logo/20180520\\a558540966f16688c46ce3cd74a08fde.jpg', '1526781117');
INSERT INTO `sh_brand` VALUES ('19', '华为', 'http://https://www.vmall.com/', '公司介绍\r\n\r\n华为是全球领先的信息与通信解决方案供应商。我们围绕客户的需求持续创新，与合作伙伴开放合作，在电信网络、企业网络、消费者和云计算等领域构筑了端到端的解决方案优势。我们致力于为电信运营商、企业和消费者等提供有竞争力的 ICT 解决方案和服务，持续提升客户体验，为客户创造最大价值。目前，华为的产品和解决方案已经应用于 140 多个国家，服务全球 1/3的人口。\r\n', '50', '1', 'logo/20171105\\3209a7d75d70042813013ff1f89b3cbe.jpg', '1509867549');
INSERT INTO `sh_brand` VALUES ('22', '康顺', 'http://localhost/shopp/brandn.php?id=204', '1490039286075654490.jpg', '50', '1', 'logo/20180520\\7dad72f08c2e89ef9bd122bdd1a49c36.jpg', '1526781014');
INSERT INTO `sh_brand` VALUES ('20', '以纯', 'http://localhost/shopp/public/admin/brand/brandadd.html', '黑寡妇的话', '50', '1', 'logo/20180307\\3a80993b4226cfb15c226745d15f41de.jpg', '1520397024');
INSERT INTO `sh_brand` VALUES ('26', 'Justyle', 'http://localhost/shopp/brandn.php?id=79', '1490072677495061584.jpg', '50', '1', 'logo/20180520\\d8bafaba02b650594a05d2bf2dbf2ec0.jpg', '1526781151');
INSERT INTO `sh_brand` VALUES ('27', '李宁', 'http://localhost/shopp/brandn.php?id=82', '1490072694695600078.jpg', '50', '1', 'logo/20180520\\9bfe3cd353080591dd57d51d804d11a7.jpg', '1526781174');
INSERT INTO `sh_brand` VALUES ('28', '戴尔', 'http://localhost/shopp/brandn.php?id=126', '1490072756032175204.jpg', '50', '1', 'logo/20180520\\640835c742809f1949d53f8602a5f9b9.jpg', '1526781197');
INSERT INTO `sh_brand` VALUES ('29', 'LG', 'http://localhost/shopp/brandn.php?id=113', '1490074043963552715.jpg', '50', '1', 'logo/20180520\\083fd936b9af615249c7b3eb3e486fc0.jpg', '1526781218');

-- ----------------------------
-- Table structure for sh_brand_spread
-- ----------------------------
DROP TABLE IF EXISTS `sh_brand_spread`;
CREATE TABLE `sh_brand_spread` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '推广id',
  `brand_id` varchar(30) DEFAULT NULL COMMENT '品牌id',
  `brand_img` varchar(255) DEFAULT NULL COMMENT '品牌图片',
  `brand_url` varchar(255) DEFAULT NULL COMMENT '品牌路径',
  `category_id` int(11) DEFAULT NULL COMMENT '对应的分类id',
  `sort` tinyint(4) DEFAULT '50' COMMENT '排序',
  `addtime` int(12) DEFAULT NULL,
  `status` tinyint(1) DEFAULT '1' COMMENT '广告状态（1.显示 2.关闭）',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=10 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sh_brand_spread
-- ----------------------------
INSERT INTO `sh_brand_spread` VALUES ('6', '4,20', 'spread/20180509\\ad1d830c3ca47b599b1e2698785f88d9.jpg', '', '1', '45', null, '1');
INSERT INTO `sh_brand_spread` VALUES ('7', '20', 'spread/20180509\\dc2cc8acd3ae4137caf488aaf4850466.jpg', '', '21', '50', '1525860312', '1');
INSERT INTO `sh_brand_spread` VALUES ('3', '4,19,20', 'spread/20180508\\2d9580481f97c5a259eee527711bc567.jpg', 'http://localhost/shopp/index.php/admin/brandspread/bssave.html', '11', '65', null, '1');

-- ----------------------------
-- Table structure for sh_broadcast
-- ----------------------------
DROP TABLE IF EXISTS `sh_broadcast`;
CREATE TABLE `sh_broadcast` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `title` varchar(60) DEFAULT NULL COMMENT '图片标题',
  `thumb` varchar(150) DEFAULT NULL COMMENT '图片路径',
  `link_url` varchar(150) DEFAULT NULL COMMENT '链接地址',
  `sort` smallint(3) DEFAULT '50' COMMENT '排序',
  `status` smallint(1) DEFAULT '1' COMMENT '状态（1.显示 0.隐藏）',
  `addtime` varchar(12) DEFAULT NULL,
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=37 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sh_broadcast
-- ----------------------------
INSERT INTO `sh_broadcast` VALUES ('33', '轮播1', 'broadcast/20180624/8af6125815bb6dd860806a705d58bf24.jpg', 'http://xcvf', '1', '1', '1529839391');
INSERT INTO `sh_broadcast` VALUES ('34', '轮播2', 'broadcast/20180624/edc45c2905921cc76d6c63893b1cad64.jpg', 'http://dfsdfs', '2', '1', '1529839442');
INSERT INTO `sh_broadcast` VALUES ('35', '轮播3', 'broadcast/20180624/4cfd6e08798561a1be25a02cbbee5062.jpg', 'http://dfsdfs', '3', '1', '1529839468');

-- ----------------------------
-- Table structure for sh_cate
-- ----------------------------
DROP TABLE IF EXISTS `sh_cate`;
CREATE TABLE `sh_cate` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '栏目id',
  `cate_name` varchar(50) DEFAULT NULL COMMENT '栏目名称',
  `cate_type` tinyint(1) DEFAULT '5' COMMENT '分类（1.系统分类 2.帮助分类 3.网店帮助 4.网店信息 5.普通分类）',
  `keywords` varchar(255) DEFAULT NULL COMMENT '分类关键词',
  `description` varchar(255) DEFAULT NULL COMMENT '栏目描述',
  `show_nav` tinyint(1) DEFAULT '0' COMMENT '是否显示导航（1.显示导航栏 0.不显示）',
  `pid` smallint(10) DEFAULT '0' COMMENT '父级id',
  `sort` smallint(2) DEFAULT '50' COMMENT '排序',
  `allow_son` tinyint(1) DEFAULT '1' COMMENT '是否允许添加子栏目（1.是 0.否）',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=39 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sh_cate
-- ----------------------------
INSERT INTO `sh_cate` VALUES ('1', '系统', '1', '系统', '系统', '0', '0', '1', '0');
INSERT INTO `sh_cate` VALUES ('2', '网店帮助分类', '2', '网店帮助分类', '网店帮助分类', '0', '1', '2', '1');
INSERT INTO `sh_cate` VALUES ('3', '网店信息', '4', '网店信息', '网店信息', '0', '1', '1', '0');
INSERT INTO `sh_cate` VALUES ('4', '新手上路', '3', '新手上路', '新手上路', '1', '2', '51', '0');
INSERT INTO `sh_cate` VALUES ('5', '配送与支付', '3', '配送与支付 ', '配送与支付 ', '1', '2', '52', '0');
INSERT INTO `sh_cate` VALUES ('9', '会员中心', '3', '会员中心', '会员中心', '0', '2', '53', '0');
INSERT INTO `sh_cate` VALUES ('10', '服务保证 ', '3', '服务保证 ', '服务保证 ', '0', '2', '54', '0');
INSERT INTO `sh_cate` VALUES ('25', '联系我们', '3', '联系我们', '联系我们', '0', '2', '55', '1');
INSERT INTO `sh_cate` VALUES ('26', '4G咨询', '5', '4G咨询', '4G咨询', '0', '0', '50', '1');
INSERT INTO `sh_cate` VALUES ('27', '站内快讯', '5', '站内快讯', '站内快讯', '0', '0', '50', '1');
INSERT INTO `sh_cate` VALUES ('28', '商城公告', '5', '商城公告', '商城公告', '0', '0', '50', '1');
INSERT INTO `sh_cate` VALUES ('29', 'APP', '5', 'APP', 'APP', '0', '0', '50', '1');
INSERT INTO `sh_cate` VALUES ('30', '发票问题', '5', '发票问题', '发票问题', '0', '0', '50', '1');
INSERT INTO `sh_cate` VALUES ('31', '公告', '5', '公告', '公告', '0', '0', '50', '1');
INSERT INTO `sh_cate` VALUES ('32', 'IOS下载', '5', 'IOS下载', 'IOS下载', '0', '29', '51', '1');
INSERT INTO `sh_cate` VALUES ('33', '安卓下载', '5', '安卓下载', '安卓下载', '0', '29', '50', '1');
INSERT INTO `sh_cate` VALUES ('38', '促销', '5', '促销', '促销', '1', '0', '50', '1');

-- ----------------------------
-- Table structure for sh_category_ad
-- ----------------------------
DROP TABLE IF EXISTS `sh_category_ad`;
CREATE TABLE `sh_category_ad` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT,
  `img_url` varchar(255) DEFAULT NULL COMMENT '推荐商品图片',
  `link_url` varchar(255) DEFAULT NULL COMMENT '链接地址',
  `position` char(1) DEFAULT NULL COMMENT '位置(a.左侧 b.上 c.下)',
  `category_id` smallint(6) DEFAULT NULL COMMENT '商品分类id',
  `status` smallint(1) DEFAULT NULL COMMENT '状态（1.显示 0.不显示）',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=12 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sh_category_ad
-- ----------------------------
INSERT INTO `sh_category_ad` VALUES ('6', 'categoryad/20180519\\90bf388971a5d48461b6c4a771f2d223.jpg', 'http://localhost/shopp/index.php/', 'A', '21', '1');
INSERT INTO `sh_category_ad` VALUES ('7', 'categoryad/20180519\\08697e6580ed2eb4f8e01863903170b9.jpg', 'http://localhost/shopp/index.php/', 'A', '21', '1');
INSERT INTO `sh_category_ad` VALUES ('8', 'categoryad/20180519\\5cd2c46a7c7f071d6f1683d318ec5224.jpg', 'http://localhost/shopp/index.php/', 'A', '21', '1');
INSERT INTO `sh_category_ad` VALUES ('9', 'categoryad/20180519\\bd692428f06d7efe2102d7769f5f34d4.jpg', 'http://localhost/shopp/index.php/', 'B', '21', '1');
INSERT INTO `sh_category_ad` VALUES ('10', 'categoryad/20180519\\cde5b6a8d39d5a0f8bc406272ce5452b.jpg', 'http://localhost/shopp/index.php/', 'B', '21', '1');
INSERT INTO `sh_category_ad` VALUES ('11', 'categoryad/20180519\\4f10891cd63a82bd267284b0b4606142.jpg', 'http://localhost/shopp/index.php/admin/category_ad/adsave/id/0.html', 'C', '21', '1');

-- ----------------------------
-- Table structure for sh_category_words
-- ----------------------------
DROP TABLE IF EXISTS `sh_category_words`;
CREATE TABLE `sh_category_words` (
  `id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `category_id` smallint(6) DEFAULT NULL COMMENT '商品分类id',
  `words` varchar(60) DEFAULT NULL COMMENT '关键词',
  `link_url` varchar(255) DEFAULT NULL COMMENT '链接地址',
  `sort` smallint(6) DEFAULT '50' COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sh_category_words
-- ----------------------------
INSERT INTO `sh_category_words` VALUES ('1', '11', '品牌', 'http://localhost/shopp/index.php/article/19.html', '31');
INSERT INTO `sh_category_words` VALUES ('2', '11', '风扇', 'http://localhost/shopp/index.php/index/category/category/id/17.html', '32');
INSERT INTO `sh_category_words` VALUES ('4', '11', '智能生活馆', 'http://localhost/shopp/index.php/index/category/category/id/18.html', '50');

-- ----------------------------
-- Table structure for sh_conf
-- ----------------------------
DROP TABLE IF EXISTS `sh_conf`;
CREATE TABLE `sh_conf` (
  `conf_id` int(11) unsigned NOT NULL AUTO_INCREMENT COMMENT '配置id',
  `conf_ename` varchar(40) NOT NULL COMMENT '英文名称',
  `conf_cname` varchar(40) NOT NULL COMMENT '中文名称',
  `form_stype` varchar(20) NOT NULL DEFAULT 'input' COMMENT '表单类型',
  `conf_stype` tinyint(1) NOT NULL DEFAULT '1' COMMENT '配置类型：1.网站配置 2.商品配置',
  `values` varchar(60) NOT NULL COMMENT '可选值',
  `value` varchar(255) NOT NULL COMMENT '默认值',
  `addtime` varchar(20) DEFAULT NULL COMMENT '添加时间',
  `sort` tinyint(3) DEFAULT '50' COMMENT '排序',
  PRIMARY KEY (`conf_id`)
) ENGINE=MyISAM AUTO_INCREMENT=21 DEFAULT CHARSET=utf8 COMMENT='配置';

-- ----------------------------
-- Records of sh_conf
-- ----------------------------
INSERT INTO `sh_conf` VALUES ('1', 'sitename', '站点名称', 'input', '1', '', '首页', null, '7');
INSERT INTO `sh_conf` VALUES ('2', 'site_describe', '站点描述', 'textarea', '2', '', 'gdfgd1', null, '6');
INSERT INTO `sh_conf` VALUES ('5', 'site_keywords', '站点关键词', 'input', '1', '', '首页', null, '5');
INSERT INTO `sh_conf` VALUES ('6', 'close_site', '关闭站点', 'redio', '1', '是,否', '是', null, '4');
INSERT INTO `sh_conf` VALUES ('7', 'Logo', '网站logo', 'file', '1', '', '20180212\\28d27ad981b116226bb75beba3519d7d.jpg', null, '3');
INSERT INTO `sh_conf` VALUES ('8', 'reg', '会员注册', 'select', '1', '开启,关闭', '', null, '2');
INSERT INTO `sh_conf` VALUES ('15', 'ewm', '二维码', 'file', '1', '', '20180212\\e6d24ba91c28fa8152805f638b424eac.jpg', '1518362415', '3');
INSERT INTO `sh_conf` VALUES ('14', 'dfgd', '梵蒂冈地方', 'checkbox', '1', '梵蒂冈地方1,梵蒂冈地方2', '梵蒂冈地方1', '1518274975', '50');
INSERT INTO `sh_conf` VALUES ('16', 'foods', '食品商店', 'input', '2', '牛肉，羊肉，鸡肉', '大范甘迪、', '1518443304', '1');
INSERT INTO `sh_conf` VALUES ('18', 'top_search', '头部搜索', 'textarea', '1', '', '周大福,内衣,Five,Plus,手机', '1525492213', '50');
INSERT INTO `sh_conf` VALUES ('19', 'cache', '开启缓存', 'redio', '1', '是,否', '是', '1530277744', '50');
INSERT INTO `sh_conf` VALUES ('20', 'cache_time', '缓存时间', 'input', '1', '', '300', '1530277872', '50');

-- ----------------------------
-- Table structure for sh_goods
-- ----------------------------
DROP TABLE IF EXISTS `sh_goods`;
CREATE TABLE `sh_goods` (
  `goods_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '商品id',
  `goodsclass_id` int(11) DEFAULT NULL COMMENT '商品分类id',
  `goodstype_id` int(11) DEFAULT NULL COMMENT '商品类型地',
  `brand_id` int(11) DEFAULT NULL COMMENT '商品品牌id',
  `goods_name` varchar(100) DEFAULT NULL COMMENT '商品名称',
  `goods_code` varchar(20) DEFAULT NULL COMMENT '商品编号',
  `og_thumb` varchar(255) DEFAULT NULL COMMENT '商品原图',
  `big_thumb` varchar(255) DEFAULT NULL COMMENT '商品大图',
  `sm_thumb` varchar(255) DEFAULT NULL COMMENT '商品小图',
  `md_thumb` varchar(255) DEFAULT NULL COMMENT '商品中图',
  `markte_price` decimal(10,2) DEFAULT NULL COMMENT '市场价格',
  `shop_price` decimal(10,2) DEFAULT NULL COMMENT '出售价格',
  `on_sale` smallint(1) DEFAULT '1' COMMENT '是否在售（1.是 0,.否）',
  `goods_desc` varchar(255) DEFAULT NULL COMMENT '商品描述',
  `goods_weight` double(10,2) DEFAULT NULL COMMENT '商品重量',
  `weight_unit` varchar(5) DEFAULT 'kg' COMMENT '商品单位',
  `goods_stock` smallint(6) DEFAULT NULL COMMENT '商品库存',
  `addtime` varchar(15) DEFAULT NULL COMMENT '发布时间',
  `uptime` varchar(15) DEFAULT NULL COMMENT '商品更新时间',
  PRIMARY KEY (`goods_id`),
  KEY `goodsclass_id` (`goodsclass_id`),
  KEY `goodstype_id` (`goodstype_id`),
  KEY `brand_id` (`brand_id`)
) ENGINE=MyISAM AUTO_INCREMENT=66 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sh_goods
-- ----------------------------
INSERT INTO `sh_goods` VALUES ('56', '33', '1', '4', '新品HYC 2k显示器32寸电脑显示器无边框HDMI液晶显示器IPS显示屏 2K高清屏IPS 超薄 厚6mm 无边框', '1526741814973931', '20180519\\51bad014ba8e60d10a148b321a59b39d.jpg', '20180519\\big_51bad014ba8e60d10a148b321a59b39d.jpg', '20180519\\sm_51bad014ba8e60d10a148b321a59b39d.jpg', '20180519\\mid_51bad014ba8e60d10a148b321a59b39d.jpg', '5999.00', '5999.00', '1', '<p>0_thumb_G_1489098265067.jpg</p>', '20.00', 'kg', null, '1526741814', null);
INSERT INTO `sh_goods` VALUES ('54', '21', '5', '20', '迷你短裙', '1526123174366265', '20180512\\00ebfd154a8b1fe0110b30cd5627e930.jpg', '20180512\\big_00ebfd154a8b1fe0110b30cd5627e930.jpg', '20180512\\sm_00ebfd154a8b1fe0110b30cd5627e930.jpg', '20180512\\mid_00ebfd154a8b1fe0110b30cd5627e930.jpg', '320.00', '320.00', '1', '<p>性感<br/></p>', '12.00', 'kg', null, '1526123174', '1526224643');
INSERT INTO `sh_goods` VALUES ('55', '21', '5', '20', '蕾丝上衣', '1526123247507785', '20180512\\564c01e7225a658101e66360ad29f381.jpg', '20180512\\big_564c01e7225a658101e66360ad29f381.jpg', '20180512\\sm_564c01e7225a658101e66360ad29f381.jpg', '20180512\\mid_564c01e7225a658101e66360ad29f381.jpg', '120.00', '120.00', '1', '<p>性感好看<br/></p>', '1.00', 'kg', null, '1526123247', '1526224636');
INSERT INTO `sh_goods` VALUES ('49', '1', '5', '20', 'YOHO有货潮牌LAL/数字贴布连', '1525590561523817', '20180506\\50010b62209ff77c4b657b88fb833c47.jpg', '20180506\\big_50010b62209ff77c4b657b88fb833c47.jpg', '20180506\\sm_50010b62209ff77c4b657b88fb833c47.jpg', '20180506\\mid_50010b62209ff77c4b657b88fb833c47.jpg', '130.00', '130.00', '1', '<p>发的黑寡妇的话<br/></p>', '1.00', 'kg', null, '1525590561', '1526224669');
INSERT INTO `sh_goods` VALUES ('48', '21', '5', '20', '贝妍夏季薄款女士睡衣性感V领', '1525589194642171', '20180506\\4050221bc3f9b9107fd23d02b88534ba.jpg', '20180506\\big_4050221bc3f9b9107fd23d02b88534ba.jpg', '20180506\\sm_4050221bc3f9b9107fd23d02b88534ba.jpg', '20180506\\mid_4050221bc3f9b9107fd23d02b88534ba.jpg', '233.00', '233.00', '1', '<p>123<br/></p>', '1.00', 'kg', null, '1525589194', '1526224675');
INSERT INTO `sh_goods` VALUES ('52', '17', '0', '5', '电动按摩椅', '1526122938595920', '20180512\\5e0aa609f9a071eed76cecb8bd32eff2.jpg', '20180512\\big_5e0aa609f9a071eed76cecb8bd32eff2.jpg', '20180512\\sm_5e0aa609f9a071eed76cecb8bd32eff2.jpg', '20180512\\mid_5e0aa609f9a071eed76cecb8bd32eff2.jpg', '1899.00', '1899.00', '1', '<p>耐用<br/></p>', '20.00', 'kg', null, '1526122938', '1526224662');
INSERT INTO `sh_goods` VALUES ('53', '11', '5', '5', '台式咖啡机', '1526123092218560', '20180512\\f4caf0a44df338ceb296bf04bd46b242.jpg', '20180512\\big_f4caf0a44df338ceb296bf04bd46b242.jpg', '20180512\\sm_f4caf0a44df338ceb296bf04bd46b242.jpg', '20180512\\mid_f4caf0a44df338ceb296bf04bd46b242.jpg', '1599.00', '1599.00', '1', '<p>好用<br/></p>', '12.00', 'kg', null, '1526123092', '1526224655');
INSERT INTO `sh_goods` VALUES ('57', '34', '1', '19', '三星C24F396FH曲面显示器23.5英寸电脑显示器24液晶显示屏幕超22', '1526741981603434', '20180519\\5c28b9ce01a98a72ef281ead43fa6790.jpg', '20180519\\big_5c28b9ce01a98a72ef281ead43fa6790.jpg', '20180519\\sm_5c28b9ce01a98a72ef281ead43fa6790.jpg', '20180519\\mid_5c28b9ce01a98a72ef281ead43fa6790.jpg', '8999.00', '8999.00', '1', '<p>三星C24F396FH曲面显示器23.5英寸电脑显示器24液晶显示屏幕超22</p>', '20.00', 'kg', null, '1526741981', null);
INSERT INTO `sh_goods` VALUES ('58', '34', '1', '5', 'Apple/苹果 27” Retina 5K显示屏 iMac:3.3GHz处理器2TB存储', '1526742195387830', '20180519\\498a987be1195bef4c59fbf534832403.jpg', '20180519\\big_498a987be1195bef4c59fbf534832403.jpg', '20180519\\sm_498a987be1195bef4c59fbf534832403.jpg', '20180519\\mid_498a987be1195bef4c59fbf534832403.jpg', '7999.00', '7999.00', '1', '<p>Apple/苹果 27” Retina 5K显示屏 iMac:3.3GHz处理器2TB存储</p>', '78.00', 'kg', null, '1526742195', null);
INSERT INTO `sh_goods` VALUES ('59', '35', '1', '4', '名龙堂i7 6700升7700 GTX1060 6G台式电脑主机DIY游戏组装整机 升6GB独显 送正版WIN10 一年上门', '1526742299740342', '20180519\\0b0005d0c44d73caa8ca07775a888df9.jpg', '20180519\\big_0b0005d0c44d73caa8ca07775a888df9.jpg', '20180519\\sm_0b0005d0c44d73caa8ca07775a888df9.jpg', '20180519\\mid_0b0005d0c44d73caa8ca07775a888df9.jpg', '8999.00', '7888.00', '1', '<p>名龙堂i7 6700升7700 GTX1060 6G台式电脑主机DIY游戏组装整机 升6GB独显 送正版WIN10 一年上门</p>', '30.00', 'kg', null, '1526742299', null);
INSERT INTO `sh_goods` VALUES ('60', '28', '5', '20', '秋季新款男士套头卫衣印花外套韩版简约百搭潮流男生上衣服', '1526742376643364', '20180519\\d853be0bcbdc48c1f8b5b77b4201f307.jpg', '20180519\\big_d853be0bcbdc48c1f8b5b77b4201f307.jpg', '20180519\\sm_d853be0bcbdc48c1f8b5b77b4201f307.jpg', '20180519\\mid_d853be0bcbdc48c1f8b5b77b4201f307.jpg', '455.00', '455.00', '1', '<p>秋季新款男士套头卫衣印花外套韩版简约百搭潮流男生上衣服</p>', '1.00', 'kg', null, '1526742376', null);
INSERT INTO `sh_goods` VALUES ('61', '41', '5', '20', '2017春装新款男士卫衣套头圆领韩版潮流时尚男生休闲外套', '1526742473281087', '20180519\\559c2ed0673c438a84cb31327e568e61.jpg', '20180519\\big_559c2ed0673c438a84cb31327e568e61.jpg', '20180519\\sm_559c2ed0673c438a84cb31327e568e61.jpg', '20180519\\mid_559c2ed0673c438a84cb31327e568e61.jpg', '233.00', '233.00', '1', '<p>2017春装新款男士卫衣套头圆领韩版潮流时尚男生休闲外套</p>', '2.00', 'kg', null, '1526742473', null);
INSERT INTO `sh_goods` VALUES ('62', '21', '5', '19', '新款学院风韩版时尚太空棉宽松长袖印花圆领卫衣女', '1526742548612277', '20180519\\cfcfd977b8ad51c4a845e25e7193e382.jpg', '20180519\\big_cfcfd977b8ad51c4a845e25e7193e382.jpg', '20180519\\sm_cfcfd977b8ad51c4a845e25e7193e382.jpg', '20180519\\mid_cfcfd977b8ad51c4a845e25e7193e382.jpg', '122.00', '122.00', '1', '<p>新款学院风韩版时尚太空棉宽松长袖印花圆领卫衣女</p>', '1.00', 'kg', null, '1526742548', null);
INSERT INTO `sh_goods` VALUES ('63', '21', '5', '5', '新款韩版chic学生宽松短款外套上衣字母长袖连帽套头卫衣女潮', '1526742620294379', '20180519\\d9f810db78d5c1657a5b3c16902e3772.jpg', '20180519\\big_d9f810db78d5c1657a5b3c16902e3772.jpg', '20180519\\sm_d9f810db78d5c1657a5b3c16902e3772.jpg', '20180519\\mid_d9f810db78d5c1657a5b3c16902e3772.jpg', '233.00', '233.00', '1', '<p>新款韩版chic学生宽松短款外套上衣字母长袖连帽套头卫衣女潮</p>', '1.00', 'kg', null, '1526742620', null);
INSERT INTO `sh_goods` VALUES ('64', '21', '5', '20', '韩都衣舍2017韩版女装新款黑白拼接插肩棒球服春季短外套HH5597妠 朴信惠同款 黑白拼接 插肩袖 棒球服', '1526742708142578', '20180519\\f93031c2e40d29a101d4ba7be26df7ef.jpg', '20180519\\big_f93031c2e40d29a101d4ba7be26df7ef.jpg', '20180519\\sm_f93031c2e40d29a101d4ba7be26df7ef.jpg', '20180519\\mid_f93031c2e40d29a101d4ba7be26df7ef.jpg', '322.00', '322.00', '1', '<p>韩都衣舍2017韩版女装新款黑白拼接插肩棒球服春季短外套HH5597妠 朴信惠同款 黑白拼接 插肩袖 棒球服</p>', '1.00', 'kg', null, '1526742708', null);
INSERT INTO `sh_goods` VALUES ('65', '21', '5', '20', 'The Face Shop 水光无瑕气垫CC霜 裸妆隔离保湿补水持久遮瑕强 韩式裸妆 打造水嫩遮瑕 光润亮彩', '1526742784594563', '20180519\\8d28d7a5356d719d97bc80a137a62b7b.jpg', '20180519\\big_8d28d7a5356d719d97bc80a137a62b7b.jpg', '20180519\\sm_8d28d7a5356d719d97bc80a137a62b7b.jpg', '20180519\\mid_8d28d7a5356d719d97bc80a137a62b7b.jpg', '122.00', '122.00', '1', '<p>The Face Shop 水光无瑕气垫CC霜 裸妆隔离保湿补水持久遮瑕强 韩式裸妆 打造水嫩遮瑕 光润亮彩</p>', '1.00', 'kg', null, '1526742784', null);

-- ----------------------------
-- Table structure for sh_goodsattr
-- ----------------------------
DROP TABLE IF EXISTS `sh_goodsattr`;
CREATE TABLE `sh_goodsattr` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '商品属性id',
  `attr_name` varchar(50) DEFAULT NULL COMMENT '属性名称',
  `attr_type` varchar(255) DEFAULT NULL COMMENT '属性类型(1.单选属性 2.唯一属性)',
  `atrr_values` varchar(255) DEFAULT NULL COMMENT '属性值',
  `type_id` smallint(6) NOT NULL COMMENT '商品类型id',
  PRIMARY KEY (`id`),
  KEY `type_id` (`type_id`)
) ENGINE=MyISAM AUTO_INCREMENT=17 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sh_goodsattr
-- ----------------------------
INSERT INTO `sh_goodsattr` VALUES ('1', '颜色', '1', '红色,月银色,黑色', '1');
INSERT INTO `sh_goodsattr` VALUES ('2', '尺寸', '1', '12,14', '4');
INSERT INTO `sh_goodsattr` VALUES ('4', '尺寸', '1', '13寸,14寸,15寸', '1');
INSERT INTO `sh_goodsattr` VALUES ('5', '厂家', '2', '', '1');
INSERT INTO `sh_goodsattr` VALUES ('6', 'CPU', '2', 'Internet,奔腾', '1');
INSERT INTO `sh_goodsattr` VALUES ('7', '码数', '1', 'S,M,L,XL,XXL', '5');
INSERT INTO `sh_goodsattr` VALUES ('8', '衣长', '1', '90,94,96,98', '5');
INSERT INTO `sh_goodsattr` VALUES ('9', '内存', '1', '32G,64G,128G', '6');
INSERT INTO `sh_goodsattr` VALUES ('10', '颜色', '1', '曜黑色,红色,银色', '6');
INSERT INTO `sh_goodsattr` VALUES ('11', '尺寸', '1', '5.0寸,5.2寸,5.5寸', '6');
INSERT INTO `sh_goodsattr` VALUES ('12', '厂家', '2', '', '5');
INSERT INTO `sh_goodsattr` VALUES ('13', '布料', '2', '涤纶,麻布,丝绸', '5');
INSERT INTO `sh_goodsattr` VALUES ('14', '厂家', '2', '', '6');
INSERT INTO `sh_goodsattr` VALUES ('15', 'CPU', '2', '晓龙,高通,三星', '6');

-- ----------------------------
-- Table structure for sh_goodsclass
-- ----------------------------
DROP TABLE IF EXISTS `sh_goodsclass`;
CREATE TABLE `sh_goodsclass` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT '商品分类id',
  `class_name` varchar(255) DEFAULT NULL COMMENT '商品名称',
  `thumb` varchar(255) DEFAULT NULL COMMENT '商品图片',
  `pid` smallint(6) DEFAULT NULL COMMENT '父级id',
  `sort` smallint(6) DEFAULT '50' COMMENT '商品排序',
  `keywords` varchar(255) DEFAULT NULL COMMENT '关键词',
  `show_nav` smallint(1) DEFAULT NULL COMMENT '是否显示(1.显示 0.隐藏）',
  `description` varchar(255) DEFAULT NULL COMMENT '分类描述',
  `allow_son` tinyint(1) DEFAULT '1' COMMENT '是否允许添加子栏目（1.是 0.否）',
  `addtime` varchar(20) DEFAULT NULL COMMENT '添加时间',
  `iconfont` varchar(50) DEFAULT NULL COMMENT '分类图标',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=42 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sh_goodsclass
-- ----------------------------
INSERT INTO `sh_goodsclass` VALUES ('1', '男装', 'goodsclass/20180217\\786a362b7e1ec16575241ab707ab72cd.jpg', '0', '1', '男装', '1', '男装', '1', null, 'icon-ele');
INSERT INTO `sh_goodsclass` VALUES ('19', '榨汁机', null, '18', '50', '榨汁机', '1', '榨汁机', '1', '1518879558', null);
INSERT INTO `sh_goodsclass` VALUES ('11', '家用电器', 'goodsclass/20180216\\3d45ab864631ef7d25dff77bed490fce.jpg', '0', '2', '家用电器', '0', '家用电器', '1', '1518771024', null);
INSERT INTO `sh_goodsclass` VALUES ('28', ' T恤', null, '1', '50', 'T 恤', '0', 'T 恤', '1', '1525575498', null);
INSERT INTO `sh_goodsclass` VALUES ('17', '生活电器', 'goodsclass/20180217\\0feaa157bed39fd3995f5f60b9e6d3d0.jpg', '11', '50', '生活电器', '0', '生活电器', '1', '1518875380', null);
INSERT INTO `sh_goodsclass` VALUES ('18', ' 厨房电器', 'goodsclass/20180217\\2e123de432c30d404841df9ec7c7f032.jpg', '11', '50', ' 厨房电器', '0', ' 厨房电器', '1', '1518875406', null);
INSERT INTO `sh_goodsclass` VALUES ('20', '手机', null, '0', '50', '手机，数码', '1', '数码产品', '1', '1520349458', null);
INSERT INTO `sh_goodsclass` VALUES ('21', '女装', null, '0', '50', '女装', '0', '女装', '1', '1525522973', null);
INSERT INTO `sh_goodsclass` VALUES ('40', '衬衫 ', null, '1', '50', '衬衫 ', '0', '衬衫 ', '1', '1525593723', null);
INSERT INTO `sh_goodsclass` VALUES ('31', '个人护理', null, '11', '50', '个人护理', '0', '个人护理', '1', '1525593226', null);
INSERT INTO `sh_goodsclass` VALUES ('32', ' 电饭煲', null, '17', '50', ' 电饭煲', '0', '\r\n电饭煲', '1', '1525593277', null);
INSERT INTO `sh_goodsclass` VALUES ('33', ' 电火锅', null, '17', '50', ' 电饭煲电饭煲电饭煲', '0', ' 电饭煲电饭煲电饭煲', '1', '1525593314', null);
INSERT INTO `sh_goodsclass` VALUES ('34', '净水器 ', null, '17', '50', ' 电饭煲电饭煲电饭煲 电火锅 料理机 ', '0', ' 电饭煲电饭煲电饭煲 电火锅 料理机 ', '1', '1525593350', null);
INSERT INTO `sh_goodsclass` VALUES ('35', '咖啡机', null, '18', '50', '咖啡机', '0', '咖啡机', '1', '1525593409', null);
INSERT INTO `sh_goodsclass` VALUES ('36', '豆浆机', null, '18', '50', '豆浆机', '0', '豆浆机', '1', '1525593435', null);
INSERT INTO `sh_goodsclass` VALUES ('37', '电动沙发椅', null, '31', '50', '电动沙发椅', '0', '电动沙发椅', '1', '1525593572', null);
INSERT INTO `sh_goodsclass` VALUES ('38', '剃须刀', null, '31', '50', '剃须刀', '0', '剃须刀', '1', '1525593628', null);
INSERT INTO `sh_goodsclass` VALUES ('39', '吹风机', null, '31', '50', '吹风机', '0', '吹风机', '1', '1525593647', null);
INSERT INTO `sh_goodsclass` VALUES ('41', '卫衣', null, '1', '50', '卫衣', '0', '卫衣', '1', '1525593741', null);

-- ----------------------------
-- Table structure for sh_goodstype
-- ----------------------------
DROP TABLE IF EXISTS `sh_goodstype`;
CREATE TABLE `sh_goodstype` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '商品类型id',
  `type_name` varchar(100) DEFAULT NULL COMMENT '商品类型名称',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=7 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sh_goodstype
-- ----------------------------
INSERT INTO `sh_goodstype` VALUES ('1', '笔记本');
INSERT INTO `sh_goodstype` VALUES ('4', '书本');
INSERT INTO `sh_goodstype` VALUES ('5', '衣服');
INSERT INTO `sh_goodstype` VALUES ('6', '手机');

-- ----------------------------
-- Table structure for sh_goods_attrs
-- ----------------------------
DROP TABLE IF EXISTS `sh_goods_attrs`;
CREATE TABLE `sh_goods_attrs` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '该商品属性id',
  `goods_id` int(11) DEFAULT NULL COMMENT '商品id',
  `attr_id` int(11) DEFAULT NULL COMMENT '属性id',
  `attr_values` varchar(60) DEFAULT NULL COMMENT '属性值',
  `price` decimal(10,0) DEFAULT '0' COMMENT '不同属性的价格',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=251 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sh_goods_attrs
-- ----------------------------
INSERT INTO `sh_goods_attrs` VALUES ('207', '56', '4', '13寸', '4999');
INSERT INTO `sh_goods_attrs` VALUES ('206', '56', '1', '月银色', '5999');
INSERT INTO `sh_goods_attrs` VALUES ('205', '56', '1', '红色', '5999');
INSERT INTO `sh_goods_attrs` VALUES ('204', '53', '13', '涤纶', '0');
INSERT INTO `sh_goods_attrs` VALUES ('188', '54', '7', 'M', '320');
INSERT INTO `sh_goods_attrs` VALUES ('182', '49', '7', 'L', '130');
INSERT INTO `sh_goods_attrs` VALUES ('183', '49', '8', '94', '130');
INSERT INTO `sh_goods_attrs` VALUES ('184', '49', '8', '96', '130');
INSERT INTO `sh_goods_attrs` VALUES ('185', '49', '12', '以纯', '0');
INSERT INTO `sh_goods_attrs` VALUES ('186', '49', '13', '丝绸', '0');
INSERT INTO `sh_goods_attrs` VALUES ('187', '54', '7', 'S', '320');
INSERT INTO `sh_goods_attrs` VALUES ('181', '49', '7', 'L', '130');
INSERT INTO `sh_goods_attrs` VALUES ('180', '48', '13', '丝绸', '0');
INSERT INTO `sh_goods_attrs` VALUES ('179', '48', '12', '以纯', '0');
INSERT INTO `sh_goods_attrs` VALUES ('197', '53', '7', 'M', '111');
INSERT INTO `sh_goods_attrs` VALUES ('214', '57', '6', 'Internet', '0');
INSERT INTO `sh_goods_attrs` VALUES ('203', '53', '12', 'cvbv', '0');
INSERT INTO `sh_goods_attrs` VALUES ('202', '53', '8', '94', '111');
INSERT INTO `sh_goods_attrs` VALUES ('201', '53', '7', 'M', '111');
INSERT INTO `sh_goods_attrs` VALUES ('200', '53', '13', '涤纶', '0');
INSERT INTO `sh_goods_attrs` VALUES ('199', '53', '12', '涤纶', '0');
INSERT INTO `sh_goods_attrs` VALUES ('196', '55', '13', '涤纶', '0');
INSERT INTO `sh_goods_attrs` VALUES ('195', '55', '12', '以纯', '0');
INSERT INTO `sh_goods_attrs` VALUES ('194', '55', '8', '94', '120');
INSERT INTO `sh_goods_attrs` VALUES ('193', '55', '7', 'M', '120');
INSERT INTO `sh_goods_attrs` VALUES ('192', '55', '7', 'S', '120');
INSERT INTO `sh_goods_attrs` VALUES ('189', '54', '8', '94', '320');
INSERT INTO `sh_goods_attrs` VALUES ('190', '54', '12', '以纯', '0');
INSERT INTO `sh_goods_attrs` VALUES ('191', '54', '13', '涤纶', '0');
INSERT INTO `sh_goods_attrs` VALUES ('213', '57', '5', '华为', '0');
INSERT INTO `sh_goods_attrs` VALUES ('212', '57', '4', '14寸', '8999');
INSERT INTO `sh_goods_attrs` VALUES ('211', '57', '1', '月银色', '8999');
INSERT INTO `sh_goods_attrs` VALUES ('210', '56', '6', 'Internet', '0');
INSERT INTO `sh_goods_attrs` VALUES ('209', '56', '5', '京东', '0');
INSERT INTO `sh_goods_attrs` VALUES ('208', '56', '4', '14寸', '4999');
INSERT INTO `sh_goods_attrs` VALUES ('198', '53', '8', '94', '111');
INSERT INTO `sh_goods_attrs` VALUES ('178', '48', '8', '94', '233');
INSERT INTO `sh_goods_attrs` VALUES ('177', '48', '7', 'S', '233');
INSERT INTO `sh_goods_attrs` VALUES ('215', '58', '1', '月银色', '7999');
INSERT INTO `sh_goods_attrs` VALUES ('216', '58', '4', '15寸', '7999');
INSERT INTO `sh_goods_attrs` VALUES ('217', '58', '5', '京东', '0');
INSERT INTO `sh_goods_attrs` VALUES ('218', '58', '6', 'Internet', '0');
INSERT INTO `sh_goods_attrs` VALUES ('219', '59', '1', '红色', '7999');
INSERT INTO `sh_goods_attrs` VALUES ('220', '59', '4', '14寸', '7999');
INSERT INTO `sh_goods_attrs` VALUES ('221', '59', '5', '京东', '0');
INSERT INTO `sh_goods_attrs` VALUES ('222', '59', '6', 'Internet', '0');
INSERT INTO `sh_goods_attrs` VALUES ('223', '60', '7', 'M', '455');
INSERT INTO `sh_goods_attrs` VALUES ('224', '60', '8', '94', '455');
INSERT INTO `sh_goods_attrs` VALUES ('225', '60', '12', '以纯', '0');
INSERT INTO `sh_goods_attrs` VALUES ('226', '60', '13', '涤纶', '0');
INSERT INTO `sh_goods_attrs` VALUES ('227', '61', '7', 'M', '233');
INSERT INTO `sh_goods_attrs` VALUES ('228', '61', '8', '96', '233');
INSERT INTO `sh_goods_attrs` VALUES ('229', '61', '12', '以纯', '0');
INSERT INTO `sh_goods_attrs` VALUES ('230', '61', '13', '麻布', '0');
INSERT INTO `sh_goods_attrs` VALUES ('231', '62', '7', 'S', '122');
INSERT INTO `sh_goods_attrs` VALUES ('232', '62', '8', '96', '122');
INSERT INTO `sh_goods_attrs` VALUES ('233', '62', '12', '海澜之家', '0');
INSERT INTO `sh_goods_attrs` VALUES ('234', '62', '13', '麻布', '0');
INSERT INTO `sh_goods_attrs` VALUES ('235', '63', '7', 'L', '233');
INSERT INTO `sh_goods_attrs` VALUES ('236', '63', '7', 'S', '233');
INSERT INTO `sh_goods_attrs` VALUES ('237', '63', '8', '90', '233');
INSERT INTO `sh_goods_attrs` VALUES ('238', '63', '8', '96', '233');
INSERT INTO `sh_goods_attrs` VALUES ('239', '63', '12', '海澜之家', '0');
INSERT INTO `sh_goods_attrs` VALUES ('240', '63', '13', '涤纶', '0');
INSERT INTO `sh_goods_attrs` VALUES ('241', '64', '7', 'S', '322');
INSERT INTO `sh_goods_attrs` VALUES ('242', '64', '7', 'L', '322');
INSERT INTO `sh_goods_attrs` VALUES ('243', '64', '8', '94', '322');
INSERT INTO `sh_goods_attrs` VALUES ('244', '64', '8', '96', '322');
INSERT INTO `sh_goods_attrs` VALUES ('245', '64', '12', '以纯', '0');
INSERT INTO `sh_goods_attrs` VALUES ('246', '64', '13', '麻布', '0');
INSERT INTO `sh_goods_attrs` VALUES ('247', '65', '7', 'S', '122');
INSERT INTO `sh_goods_attrs` VALUES ('248', '65', '8', '94', '122');
INSERT INTO `sh_goods_attrs` VALUES ('249', '65', '12', '以纯', '0');
INSERT INTO `sh_goods_attrs` VALUES ('250', '65', '13', '涤纶', '0');

-- ----------------------------
-- Table structure for sh_goods_photos
-- ----------------------------
DROP TABLE IF EXISTS `sh_goods_photos`;
CREATE TABLE `sh_goods_photos` (
  `photo_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '商品相册id',
  `sm_photo` varchar(255) DEFAULT NULL COMMENT '商品小图',
  `mb_photo` varchar(255) DEFAULT NULL COMMENT '商品中图',
  `big_photo` varchar(255) DEFAULT NULL COMMENT '商品大图',
  `goods_id` smallint(6) DEFAULT NULL COMMENT '商品id',
  `og_photo` varchar(255) DEFAULT NULL COMMENT '商品原图',
  PRIMARY KEY (`photo_id`)
) ENGINE=MyISAM AUTO_INCREMENT=45 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sh_goods_photos
-- ----------------------------
INSERT INTO `sh_goods_photos` VALUES ('35', '20180519\\sm_865cbd7fa64ff2a5428524f5421b5e94.jpg', '20180519\\mid_865cbd7fa64ff2a5428524f5421b5e94.jpg', '20180519\\big_865cbd7fa64ff2a5428524f5421b5e94.jpg', '56', '20180519\\865cbd7fa64ff2a5428524f5421b5e94.jpg');
INSERT INTO `sh_goods_photos` VALUES ('32', '20180512\\sm_eb3e12f1aa00d3a5e55a608d433ab767.jpg', '20180512\\mid_eb3e12f1aa00d3a5e55a608d433ab767.jpg', '20180512\\big_eb3e12f1aa00d3a5e55a608d433ab767.jpg', '53', '20180512\\eb3e12f1aa00d3a5e55a608d433ab767.jpg');
INSERT INTO `sh_goods_photos` VALUES ('33', '20180512\\sm_2b79a108c5bdb3bdc7655b7234c413ac.jpg', '20180512\\mid_2b79a108c5bdb3bdc7655b7234c413ac.jpg', '20180512\\big_2b79a108c5bdb3bdc7655b7234c413ac.jpg', '54', '20180512\\2b79a108c5bdb3bdc7655b7234c413ac.jpg');
INSERT INTO `sh_goods_photos` VALUES ('34', '20180512\\sm_67ea7ffdd267b6c6dfa0a26b1577f3c0.jpg', '20180512\\mid_67ea7ffdd267b6c6dfa0a26b1577f3c0.jpg', '20180512\\big_67ea7ffdd267b6c6dfa0a26b1577f3c0.jpg', '55', '20180512\\67ea7ffdd267b6c6dfa0a26b1577f3c0.jpg');
INSERT INTO `sh_goods_photos` VALUES ('29', '20180506\\sm_3e5a79bab620bf1f915e981026153f6f.jpg', '20180506\\mid_3e5a79bab620bf1f915e981026153f6f.jpg', '20180506\\big_3e5a79bab620bf1f915e981026153f6f.jpg', '48', '20180506\\3e5a79bab620bf1f915e981026153f6f.jpg');
INSERT INTO `sh_goods_photos` VALUES ('30', '20180506\\sm_801f925ad84817813d5b1a9feb2b1113.jpg', '20180506\\mid_801f925ad84817813d5b1a9feb2b1113.jpg', '20180506\\big_801f925ad84817813d5b1a9feb2b1113.jpg', '49', '20180506\\801f925ad84817813d5b1a9feb2b1113.jpg');
INSERT INTO `sh_goods_photos` VALUES ('31', '20180512\\sm_b5b347dcf3124dc54c4dc9b51d75b657.jpg', '20180512\\mid_b5b347dcf3124dc54c4dc9b51d75b657.jpg', '20180512\\big_b5b347dcf3124dc54c4dc9b51d75b657.jpg', '52', '20180512\\b5b347dcf3124dc54c4dc9b51d75b657.jpg');
INSERT INTO `sh_goods_photos` VALUES ('36', '20180519\\sm_34d48b8179fb8f24cc59bb273b81f316.jpg', '20180519\\mid_34d48b8179fb8f24cc59bb273b81f316.jpg', '20180519\\big_34d48b8179fb8f24cc59bb273b81f316.jpg', '57', '20180519\\34d48b8179fb8f24cc59bb273b81f316.jpg');
INSERT INTO `sh_goods_photos` VALUES ('37', '20180519\\sm_1e12735dee8e01fe2c7e82081015868f.jpg', '20180519\\mid_1e12735dee8e01fe2c7e82081015868f.jpg', '20180519\\big_1e12735dee8e01fe2c7e82081015868f.jpg', '58', '20180519\\1e12735dee8e01fe2c7e82081015868f.jpg');
INSERT INTO `sh_goods_photos` VALUES ('38', '20180519\\sm_d75b19869cdfcac2e8a4a2924f2b4fe6.jpg', '20180519\\mid_d75b19869cdfcac2e8a4a2924f2b4fe6.jpg', '20180519\\big_d75b19869cdfcac2e8a4a2924f2b4fe6.jpg', '59', '20180519\\d75b19869cdfcac2e8a4a2924f2b4fe6.jpg');
INSERT INTO `sh_goods_photos` VALUES ('39', '20180519\\sm_4fa3dc0dc938ceafa6ac8bca577407cd.jpg', '20180519\\mid_4fa3dc0dc938ceafa6ac8bca577407cd.jpg', '20180519\\big_4fa3dc0dc938ceafa6ac8bca577407cd.jpg', '60', '20180519\\4fa3dc0dc938ceafa6ac8bca577407cd.jpg');
INSERT INTO `sh_goods_photos` VALUES ('40', '20180519\\sm_791701042369ca9baba0dc82e62010eb.jpg', '20180519\\mid_791701042369ca9baba0dc82e62010eb.jpg', '20180519\\big_791701042369ca9baba0dc82e62010eb.jpg', '61', '20180519\\791701042369ca9baba0dc82e62010eb.jpg');
INSERT INTO `sh_goods_photos` VALUES ('41', '20180519\\sm_11496b837675b7bababff236c6e54cf6.jpg', '20180519\\mid_11496b837675b7bababff236c6e54cf6.jpg', '20180519\\big_11496b837675b7bababff236c6e54cf6.jpg', '62', '20180519\\11496b837675b7bababff236c6e54cf6.jpg');
INSERT INTO `sh_goods_photos` VALUES ('42', '20180519\\sm_13e0b2ef0a2c253de992ff0091bae246.jpg', '20180519\\mid_13e0b2ef0a2c253de992ff0091bae246.jpg', '20180519\\big_13e0b2ef0a2c253de992ff0091bae246.jpg', '63', '20180519\\13e0b2ef0a2c253de992ff0091bae246.jpg');
INSERT INTO `sh_goods_photos` VALUES ('43', '20180519\\sm_3a67f76fcb4267e5476062ab55fef699.jpg', '20180519\\mid_3a67f76fcb4267e5476062ab55fef699.jpg', '20180519\\big_3a67f76fcb4267e5476062ab55fef699.jpg', '64', '20180519\\3a67f76fcb4267e5476062ab55fef699.jpg');
INSERT INTO `sh_goods_photos` VALUES ('44', '20180519\\sm_eab709b67aca56e77c5e7572a6b814ea.jpg', '20180519\\mid_eab709b67aca56e77c5e7572a6b814ea.jpg', '20180519\\big_eab709b67aca56e77c5e7572a6b814ea.jpg', '65', '20180519\\eab709b67aca56e77c5e7572a6b814ea.jpg');

-- ----------------------------
-- Table structure for sh_goods_stock
-- ----------------------------
DROP TABLE IF EXISTS `sh_goods_stock`;
CREATE TABLE `sh_goods_stock` (
  `id` mediumint(8) unsigned NOT NULL AUTO_INCREMENT COMMENT '商品属性库存id',
  `goods_id` mediumint(9) DEFAULT NULL COMMENT '商品id',
  `goods_number` int(11) DEFAULT NULL COMMENT '商品库存数量',
  `goods_attr` varchar(30) DEFAULT NULL COMMENT '商品的属性',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=26 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sh_goods_stock
-- ----------------------------
INSERT INTO `sh_goods_stock` VALUES ('25', '34', '444', '101,103');
INSERT INTO `sh_goods_stock` VALUES ('24', '34', '444', '101,103');
INSERT INTO `sh_goods_stock` VALUES ('23', '34', '222', '101,103');
INSERT INTO `sh_goods_stock` VALUES ('14', '35', '20', '106,109');
INSERT INTO `sh_goods_stock` VALUES ('15', '35', '40', '108,111');
INSERT INTO `sh_goods_stock` VALUES ('16', '35', '30', '107,110');
INSERT INTO `sh_goods_stock` VALUES ('22', '34', '333', '100,102');

-- ----------------------------
-- Table structure for sh_link
-- ----------------------------
DROP TABLE IF EXISTS `sh_link`;
CREATE TABLE `sh_link` (
  `id` smallint(5) unsigned NOT NULL AUTO_INCREMENT COMMENT '友情链接id',
  `link_title` varchar(100) DEFAULT NULL COMMENT '链接标题',
  `link_desc` varchar(255) DEFAULT NULL COMMENT '链接描述',
  `link_type` tinyint(1) DEFAULT '1' COMMENT '链接类型（1.文字链接 2.图片链接）',
  `link_status` tinyint(1) DEFAULT '1' COMMENT '链接状态（0.启用 1.禁止）',
  `thumb` varchar(255) DEFAULT NULL COMMENT '链接logo',
  `addtime` varchar(20) DEFAULT NULL COMMENT '添加时间',
  `link_url` varchar(255) DEFAULT NULL COMMENT '友情链接',
  `sort` tinyint(2) DEFAULT '50' COMMENT '排序',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=4 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sh_link
-- ----------------------------
INSERT INTO `sh_link` VALUES ('1', '魅族', '魅族', '1', '0', 'linklogo/20171119\\72cbd199aff27555431f91d7b4f0ac46.jpg', '1511085347', 'http://www.meizu.com', '1');

-- ----------------------------
-- Table structure for sh_member_level
-- ----------------------------
DROP TABLE IF EXISTS `sh_member_level`;
CREATE TABLE `sh_member_level` (
  `level_id` smallint(6) NOT NULL AUTO_INCREMENT COMMENT '会员等级id',
  `level_name` varchar(30) NOT NULL COMMENT '等级名称',
  `bom_point` int(11) NOT NULL COMMENT '下限积分',
  `top_point` int(11) NOT NULL COMMENT '上限积分',
  `addtime` varchar(20) NOT NULL COMMENT '添加时间',
  `rates` tinyint(4) DEFAULT '100',
  PRIMARY KEY (`level_id`)
) ENGINE=MyISAM AUTO_INCREMENT=20 DEFAULT CHARSET=utf8 COMMENT='会员等级表';

-- ----------------------------
-- Records of sh_member_level
-- ----------------------------
INSERT INTO `sh_member_level` VALUES ('1', '注册会员', '0', '3000', '1519057584', '100');
INSERT INTO `sh_member_level` VALUES ('19', '高级VIP会员', '12001', '15000', '1519529901', '80');
INSERT INTO `sh_member_level` VALUES ('3', '白银会员', '3001', '6000', '1519058415', '95');
INSERT INTO `sh_member_level` VALUES ('4', '白金会员', '6001', '9000', '1519058579', '90');
INSERT INTO `sh_member_level` VALUES ('5', '黄金会员', '9001', '12000', '1519058622', '85');

-- ----------------------------
-- Table structure for sh_member_price
-- ----------------------------
DROP TABLE IF EXISTS `sh_member_price`;
CREATE TABLE `sh_member_price` (
  `id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '会员价格id',
  `member_price` decimal(10,2) DEFAULT NULL COMMENT '会员价格',
  `mlevel_id` smallint(6) DEFAULT NULL COMMENT '会员等级id',
  `goods_id` smallint(6) DEFAULT NULL COMMENT '商品id',
  PRIMARY KEY (`id`)
) ENGINE=MyISAM AUTO_INCREMENT=386 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sh_member_price
-- ----------------------------
INSERT INTO `sh_member_price` VALUES ('315', '320.00', '19', '54');
INSERT INTO `sh_member_price` VALUES ('330', '130.00', '19', '49');
INSERT INTO `sh_member_price` VALUES ('329', '130.00', '5', '49');
INSERT INTO `sh_member_price` VALUES ('328', '130.00', '4', '49');
INSERT INTO `sh_member_price` VALUES ('320', '1599.00', '19', '53');
INSERT INTO `sh_member_price` VALUES ('319', '1599.00', '5', '53');
INSERT INTO `sh_member_price` VALUES ('318', '1599.00', '4', '53');
INSERT INTO `sh_member_price` VALUES ('325', '1899.00', '19', '52');
INSERT INTO `sh_member_price` VALUES ('340', '5999.00', '19', '56');
INSERT INTO `sh_member_price` VALUES ('317', '1599.00', '3', '53');
INSERT INTO `sh_member_price` VALUES ('316', '1599.00', '1', '53');
INSERT INTO `sh_member_price` VALUES ('310', '120.00', '19', '55');
INSERT INTO `sh_member_price` VALUES ('309', '120.00', '5', '55');
INSERT INTO `sh_member_price` VALUES ('308', '120.00', '4', '55');
INSERT INTO `sh_member_price` VALUES ('307', '120.00', '3', '55');
INSERT INTO `sh_member_price` VALUES ('306', '120.00', '1', '55');
INSERT INTO `sh_member_price` VALUES ('314', '320.00', '5', '54');
INSERT INTO `sh_member_price` VALUES ('313', '320.00', '4', '54');
INSERT INTO `sh_member_price` VALUES ('312', '320.00', '3', '54');
INSERT INTO `sh_member_price` VALUES ('311', '320.00', '1', '54');
INSERT INTO `sh_member_price` VALUES ('324', '1899.00', '5', '52');
INSERT INTO `sh_member_price` VALUES ('345', '8999.00', '19', '57');
INSERT INTO `sh_member_price` VALUES ('339', '5999.00', '5', '56');
INSERT INTO `sh_member_price` VALUES ('338', '5999.00', '4', '56');
INSERT INTO `sh_member_price` VALUES ('337', '5999.00', '3', '56');
INSERT INTO `sh_member_price` VALUES ('336', '5999.00', '1', '56');
INSERT INTO `sh_member_price` VALUES ('335', '233.00', '19', '48');
INSERT INTO `sh_member_price` VALUES ('334', '233.00', '5', '48');
INSERT INTO `sh_member_price` VALUES ('323', '1899.00', '4', '52');
INSERT INTO `sh_member_price` VALUES ('322', '1899.00', '3', '52');
INSERT INTO `sh_member_price` VALUES ('321', '1899.00', '1', '52');
INSERT INTO `sh_member_price` VALUES ('333', '233.00', '4', '48');
INSERT INTO `sh_member_price` VALUES ('332', '233.00', '3', '48');
INSERT INTO `sh_member_price` VALUES ('331', '233.00', '1', '48');
INSERT INTO `sh_member_price` VALUES ('327', '130.00', '3', '49');
INSERT INTO `sh_member_price` VALUES ('326', '130.00', '1', '49');
INSERT INTO `sh_member_price` VALUES ('344', '8999.00', '5', '57');
INSERT INTO `sh_member_price` VALUES ('343', '8999.00', '4', '57');
INSERT INTO `sh_member_price` VALUES ('342', '8999.00', '3', '57');
INSERT INTO `sh_member_price` VALUES ('341', '8999.00', '1', '57');
INSERT INTO `sh_member_price` VALUES ('346', '7999.00', '1', '58');
INSERT INTO `sh_member_price` VALUES ('347', '7999.00', '3', '58');
INSERT INTO `sh_member_price` VALUES ('348', '7999.00', '4', '58');
INSERT INTO `sh_member_price` VALUES ('349', '7999.00', '5', '58');
INSERT INTO `sh_member_price` VALUES ('350', '7999.00', '19', '58');
INSERT INTO `sh_member_price` VALUES ('351', '7999.00', '1', '59');
INSERT INTO `sh_member_price` VALUES ('352', '7999.00', '3', '59');
INSERT INTO `sh_member_price` VALUES ('353', '7999.00', '4', '59');
INSERT INTO `sh_member_price` VALUES ('354', '7999.00', '5', '59');
INSERT INTO `sh_member_price` VALUES ('355', '7999.00', '19', '59');
INSERT INTO `sh_member_price` VALUES ('356', '455.00', '1', '60');
INSERT INTO `sh_member_price` VALUES ('357', '455.00', '3', '60');
INSERT INTO `sh_member_price` VALUES ('358', '455.00', '4', '60');
INSERT INTO `sh_member_price` VALUES ('359', '455.00', '5', '60');
INSERT INTO `sh_member_price` VALUES ('360', '455.00', '19', '60');
INSERT INTO `sh_member_price` VALUES ('361', '233.00', '1', '61');
INSERT INTO `sh_member_price` VALUES ('362', '233.00', '3', '61');
INSERT INTO `sh_member_price` VALUES ('363', '233.00', '4', '61');
INSERT INTO `sh_member_price` VALUES ('364', '233.00', '5', '61');
INSERT INTO `sh_member_price` VALUES ('365', '233.00', '19', '61');
INSERT INTO `sh_member_price` VALUES ('366', '122.00', '1', '62');
INSERT INTO `sh_member_price` VALUES ('367', '122.00', '3', '62');
INSERT INTO `sh_member_price` VALUES ('368', '122.00', '4', '62');
INSERT INTO `sh_member_price` VALUES ('369', '122.00', '5', '62');
INSERT INTO `sh_member_price` VALUES ('370', '222.00', '19', '62');
INSERT INTO `sh_member_price` VALUES ('371', '233.00', '1', '63');
INSERT INTO `sh_member_price` VALUES ('372', '233.00', '3', '63');
INSERT INTO `sh_member_price` VALUES ('373', '233.00', '4', '63');
INSERT INTO `sh_member_price` VALUES ('374', '233.00', '5', '63');
INSERT INTO `sh_member_price` VALUES ('375', '233.00', '19', '63');
INSERT INTO `sh_member_price` VALUES ('376', '322.00', '1', '64');
INSERT INTO `sh_member_price` VALUES ('377', '322.00', '3', '64');
INSERT INTO `sh_member_price` VALUES ('378', '322.00', '4', '64');
INSERT INTO `sh_member_price` VALUES ('379', '3223.00', '5', '64');
INSERT INTO `sh_member_price` VALUES ('380', '322.00', '19', '64');
INSERT INTO `sh_member_price` VALUES ('381', '122.00', '1', '65');
INSERT INTO `sh_member_price` VALUES ('382', '122.00', '3', '65');
INSERT INTO `sh_member_price` VALUES ('383', '122.00', '4', '65');
INSERT INTO `sh_member_price` VALUES ('384', '122.00', '5', '65');
INSERT INTO `sh_member_price` VALUES ('385', '122.00', '19', '65');

-- ----------------------------
-- Table structure for sh_nav
-- ----------------------------
DROP TABLE IF EXISTS `sh_nav`;
CREATE TABLE `sh_nav` (
  `nav_id` tinyint(3) unsigned NOT NULL AUTO_INCREMENT,
  `nav_name` varchar(50) DEFAULT NULL COMMENT '导航名称',
  `nav_url` varchar(100) DEFAULT NULL COMMENT '导航路径',
  `nav_open` tinyint(1) DEFAULT '1' COMMENT '是否打开新页面（1是 2.否）',
  `nav_pos` tinyint(1) DEFAULT NULL COMMENT '导航的位置（top顶部 中间：mid 底部：bottom）',
  `nav_sort` varchar(50) DEFAULT '50' COMMENT '导航排序',
  `addtime` int(12) DEFAULT NULL,
  PRIMARY KEY (`nav_id`)
) ENGINE=MyISAM AUTO_INCREMENT=75 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sh_nav
-- ----------------------------
INSERT INTO `sh_nav` VALUES ('2', '女人街', 'http://localhost/shopp/index.php/', '1', '2', '2', '1525410834');
INSERT INTO `sh_nav` VALUES ('3', '男人街', 'http://localhost/shopp/index.php/', '1', '2', '3', '1525436431');
INSERT INTO `sh_nav` VALUES ('4', '品牌专柜', 'http://localhost/shopp/index.php/', '2', '2', '4', '1525436437');
INSERT INTO `sh_nav` VALUES ('73', '我的收藏', 'http://localhost/shopp/index.php', '1', '1', '53', '1525436500');
INSERT INTO `sh_nav` VALUES ('69', '聚划算', 'http://localhost/shopp/index.php', '1', '2', '50', '1525436415');
INSERT INTO `sh_nav` VALUES ('70', '积分商城', 'http://localhost/shopp/index.php', '1', '2', '50', '1525436454');
INSERT INTO `sh_nav` VALUES ('71', '我的订单', 'http://localhost/shopp/index.php', '1', '1', '51', '1525436471');
INSERT INTO `sh_nav` VALUES ('72', '我的浏览', 'http://localhost/shopp/index.php', '1', '1', '52', '1525436484');
INSERT INTO `sh_nav` VALUES ('74', '客户服务', 'http://localhost/shopp/index.php', '1', '1', '54', '1525436513');

-- ----------------------------
-- Table structure for sh_recom
-- ----------------------------
DROP TABLE IF EXISTS `sh_recom`;
CREATE TABLE `sh_recom` (
  `rec_id` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '推荐管理id',
  `rec_name` varchar(60) DEFAULT NULL COMMENT '推荐位名称',
  `rec_type` tinyint(1) DEFAULT '1' COMMENT '推荐位类型（1.商品 2.商品类型）',
  PRIMARY KEY (`rec_id`)
) ENGINE=MyISAM AUTO_INCREMENT=14 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sh_recom
-- ----------------------------
INSERT INTO `sh_recom` VALUES ('1', '精品推荐', '1');
INSERT INTO `sh_recom` VALUES ('5', '服饰配件', '1');
INSERT INTO `sh_recom` VALUES ('4', '限时抢购', '1');
INSERT INTO `sh_recom` VALUES ('6', ' 女装', '2');
INSERT INTO `sh_recom` VALUES ('7', ' 男装', '2');
INSERT INTO `sh_recom` VALUES ('8', '内衣', '2');
INSERT INTO `sh_recom` VALUES ('9', ' 运动户外', '2');
INSERT INTO `sh_recom` VALUES ('10', ' 随手购', '1');
INSERT INTO `sh_recom` VALUES ('11', '首页推荐', '2');
INSERT INTO `sh_recom` VALUES ('12', '新品推荐', '1');
INSERT INTO `sh_recom` VALUES ('13', '首页商品', '1');

-- ----------------------------
-- Table structure for sh_rec_item
-- ----------------------------
DROP TABLE IF EXISTS `sh_rec_item`;
CREATE TABLE `sh_rec_item` (
  `rec_id` smallint(6) DEFAULT NULL COMMENT '推荐位id',
  `value_id` mediumint(9) DEFAULT NULL COMMENT '推荐商品或类型的id',
  `value_type` tinyint(1) DEFAULT '1' COMMENT '商品或者商品类型（1.商品 2.类型）'
) ENGINE=MyISAM DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sh_rec_item
-- ----------------------------
INSERT INTO `sh_rec_item` VALUES ('1', '55', '1');
INSERT INTO `sh_rec_item` VALUES ('1', '43', '1');
INSERT INTO `sh_rec_item` VALUES ('11', '11', '2');
INSERT INTO `sh_rec_item` VALUES ('11', '1', '2');
INSERT INTO `sh_rec_item` VALUES ('1', '54', '1');
INSERT INTO `sh_rec_item` VALUES ('1', '53', '1');
INSERT INTO `sh_rec_item` VALUES ('11', '21', '2');
INSERT INTO `sh_rec_item` VALUES ('10', '43', '1');
INSERT INTO `sh_rec_item` VALUES ('1', '49', '1');
INSERT INTO `sh_rec_item` VALUES ('1', '48', '1');
INSERT INTO `sh_rec_item` VALUES ('11', '18', '2');
INSERT INTO `sh_rec_item` VALUES ('11', '17', '2');
INSERT INTO `sh_rec_item` VALUES ('11', '40', '2');
INSERT INTO `sh_rec_item` VALUES ('11', '28', '2');
INSERT INTO `sh_rec_item` VALUES ('1', '52', '1');
INSERT INTO `sh_rec_item` VALUES ('12', '55', '1');
INSERT INTO `sh_rec_item` VALUES ('12', '54', '1');
INSERT INTO `sh_rec_item` VALUES ('12', '53', '1');
INSERT INTO `sh_rec_item` VALUES ('12', '52', '1');
INSERT INTO `sh_rec_item` VALUES ('12', '49', '1');
INSERT INTO `sh_rec_item` VALUES ('4', '48', '1');
INSERT INTO `sh_rec_item` VALUES ('12', '56', '1');
INSERT INTO `sh_rec_item` VALUES ('13', '56', '1');
INSERT INTO `sh_rec_item` VALUES ('12', '57', '1');
INSERT INTO `sh_rec_item` VALUES ('13', '57', '1');
INSERT INTO `sh_rec_item` VALUES ('12', '58', '1');
INSERT INTO `sh_rec_item` VALUES ('13', '58', '1');
INSERT INTO `sh_rec_item` VALUES ('12', '59', '1');
INSERT INTO `sh_rec_item` VALUES ('13', '59', '1');
INSERT INTO `sh_rec_item` VALUES ('12', '60', '1');
INSERT INTO `sh_rec_item` VALUES ('13', '60', '1');
INSERT INTO `sh_rec_item` VALUES ('12', '61', '1');
INSERT INTO `sh_rec_item` VALUES ('13', '61', '1');
INSERT INTO `sh_rec_item` VALUES ('12', '62', '1');
INSERT INTO `sh_rec_item` VALUES ('13', '62', '1');
INSERT INTO `sh_rec_item` VALUES ('12', '63', '1');
INSERT INTO `sh_rec_item` VALUES ('13', '63', '1');
INSERT INTO `sh_rec_item` VALUES ('12', '64', '1');
INSERT INTO `sh_rec_item` VALUES ('13', '64', '1');
INSERT INTO `sh_rec_item` VALUES ('12', '65', '1');
INSERT INTO `sh_rec_item` VALUES ('13', '65', '1');

-- ----------------------------
-- Table structure for sh_user
-- ----------------------------
DROP TABLE IF EXISTS `sh_user`;
CREATE TABLE `sh_user` (
  `uid` int(10) unsigned NOT NULL AUTO_INCREMENT COMMENT '用户id',
  `username` varchar(60) DEFAULT NULL COMMENT '用户名称',
  `password` varchar(40) DEFAULT NULL COMMENT '用户密码',
  `mobile_phone` varchar(11) DEFAULT NULL COMMENT '手机号码',
  `email` varchar(70) DEFAULT NULL COMMENT '邮箱',
  `reg_time` varchar(12) DEFAULT '0' COMMENT '账号验证状态（1.已验证 0.未验证）',
  `register_type` tinyint(1) DEFAULT NULL COMMENT '注册类型（1.手机 0.邮箱）',
  PRIMARY KEY (`uid`)
) ENGINE=MyISAM AUTO_INCREMENT=5 DEFAULT CHARSET=utf8;

-- ----------------------------
-- Records of sh_user
-- ----------------------------
INSERT INTO `sh_user` VALUES ('2', 'admin', 'e10adc3949ba59abbe56e057f20f883e', '13765625663', '', '1531018209', '1');
INSERT INTO `sh_user` VALUES ('3', 'admin1', 'e10adc3949ba59abbe56e057f20f883e', '13760615449', '', '1531018324', '1');
INSERT INTO `sh_user` VALUES ('4', 'admin2', 'e10adc3949ba59abbe56e057f20f883e', '', '1096728445@qq.com', '1531018392', '0');
