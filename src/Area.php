<?php
/**
 * 地区助手类
 *
 * @author Janson
 * @create 2017-07-14
 */

namespace EC\Utils;

use EC\Utils\AreaData;

class Area {
    /**
     * 省份
     */
    protected static $provinces = [
        110000 => "北京市", 120000 => "天津市", 310000 => "上海市", 500000 => "重庆市", 130000 => "河北省", 140000 => "山西省",
        150000 => "内蒙古自治区", 210000 => "辽宁省", 220000 => "吉林省", 230000 => "黑龙江省", 320000 => "江苏省", 330000 => "浙江省",
        340000 => "安徽省", 350000 => "福建省", 360000 => "江西省", 370000 => "山东省", 410000 => "河南省", 420000 => "湖北省",
        430000 => "湖南省", 440000 => "广东省", 450000 => "广西壮族自治区", 460000 => "海南省", 510000 => "四川省", 520000 => "贵州省",
        530000 => "云南省", 540000 => "西藏自治区", 610000 => "陕西省", 620000 => "甘肃省", 630000 => "青海省", 640000 => "宁夏回族自治区",
        650000 => "新疆维吾尔自治区", 710000 => "台湾省", 810000 => "香港特别行政区", 820000 => "澳门特别行政区"
    ];

    /**
     * 市、区、州、县
     */
    protected static $cities = [
        //北京市
        110101 => "东城区", 110102 => "西城区", 110103 => "崇文区", 110104 => "宣武区", 110105 => "朝阳区", 110106 => "丰台区",
        110107 => "石景山区", 110108 => "海淀区", 110109 => "门头沟区", 110111 => "房山区", 110112 => "通州区", 110113 => "顺义区",
        110114 => "昌平区", 110115 => "大兴区", 110116 => "怀柔区", 110117 => "平谷区", 110228 => "密云县", 110229 => "延庆县",

        //天津市
        120101 => "和平区", 120102 => "河东区", 120103 => "河西区", 120104 => "南开区", 120105 => "河北区", 120106 => "红桥区",
        120107 => "塘沽区", 120108 => "汉沽区", 120109 => "大港区", 120110 => "东丽区", 120111 => "西青区", 120112 => "津南区",
        120113 => "北辰区", 120114 => "武清区", 120115 => "宝坻区", 120221 => "宁河县", 120223 => "静海县", 120225 => "蓟县",

        //上海市
        310101 => "黄浦区", 310103 => "卢湾区", 310104 => "徐汇区", 310105 => "长宁区", 310106 => "静安区", 310107 => "普陀区",
        310108 => "闸北区", 310109 => "虹口区", 310110 => "杨浦区", 310112 => "闵行区", 310113 => "宝山区", 310114 => "嘉定区",
        310115 => "浦东新区", 310116 => "金山区", 310117 => "松江区", 310118 => "青浦区", 310119 => "南汇区", 310120 => "奉贤区",
        310230 => "崇明县",

        //重庆市
        500101 => "万州区", 500102 => "涪陵区", 500103 => "渝中区", 500104 => "大渡口区", 500105 => "江北区", 500106 => "沙坪坝区",
        500107 => "九龙坡区", 500108 => "南岸区", 500109 => "北碚区", 500110 => "万盛区", 500111 => "双桥区", 500112 => "渝北区",
        500113 => "巴南区", 500114 => "黔江区", 500115 => "长寿区", 500381 => "江津市", 500382 => "合川市", 500383 => "永川市",
        500384 => "南川市", 500222 => "綦江县", 500223 => "潼南县", 500224 => "铜梁县", 500225 => "大足县", 500226 => "荣昌县",
        500227 => "璧山县", 500228 => "梁平县", 500229 => "城口县", 500230 => "丰都县", 500231 => "垫江县", 500232 => "武隆县",
        500233 => "忠县", 500234 => "开县", 500235 => "云阳县", 500236 => "奉节县", 500237 => "巫山县", 500238 => "巫溪县",
        500240 => "石柱土家族自治县", 500241 => "秀山土家族苗族自治县", 500242 => "酉阳土家族苗族自治县", 500243 => "彭水苗族土家族自治县",

        //河北省
        130100 => "石家庄市", 130200 => "唐山市", 130300 => "秦皇岛市", 130400 => "邯郸市", 130500 => "邢台市", 130600 => "保定市",
        130700 => "张家口市", 130800 => "承德市", 130900 => "沧州市", 131000 => "廊坊市", 131100 => "衡水市",

        //山西省
        140100 => "太原市", 140200 => "大同市", 140300 => "阳泉市", 140400 => "长治市", 140500 => "晋城市", 140600 => "朔州市",
        140700 => "晋中市", 140800 => "运城市", 140900 => "忻州市", 141000 => "临汾市", 141100 => "吕梁市",

        //内蒙古自治区
        150100 => "呼和浩特市", 150200 => "包头市", 150300 => "乌海市", 150400 => "赤峰市", 150500 => "通辽市", 150600 => "鄂尔多斯市",
        150700 => "呼伦贝尔市", 150800 => "巴彦淖尔市", 150900 => "乌兰察布市", 152200 => "兴安盟", 152500 => "锡林郭勒盟", 152900 => "阿拉善盟",

        //辽宁省
        210100 => "沈阳市", 210200 => "大连市", 210300 => "鞍山市", 210400 => "抚顺市", 210500 => "本溪市", 210600 => "丹东市",
        210700 => "锦州市", 210800 => "营口市", 210900 => "阜新市", 211000 => "辽阳市", 211100 => "盘锦市", 211200 => "铁岭市",
        211300 => "朝阳市", 211400 => "葫芦岛市",

        //吉林省
        220100 => "长春市", 220200 => "吉林市", 220300 => "四平市", 220400 => "辽源市", 220500 => "通化市", 220600 => "白山市",
        220700 => "松原市", 220800 => "白城市", 222400 => "延边朝鲜族自治州",

        //黑龙江省
        230100 => "哈尔滨市", 230200 => "齐齐哈尔市", 230300 => "鸡西市", 230400 => "鹤岗市", 230500 => "双鸭山市", 230600 => "大庆市",
        230700 => "伊春市", 230800 => "佳木斯市", 230900 => "七台河市", 231000 => "牡丹江市", 231100 => "黑河市", 231200 => "绥化市",
        232700 => "大兴安岭地区",

        //江苏省
        320100 => "南京市", 320200 => "无锡市", 320300 => "徐州市", 320400 => "常州市", 320500 => "苏州市", 320600 => "南通市",
        320700 => "连云港市", 320800 => "淮安市", 320900 => "盐城市", 321000 => "扬州市", 321100 => "镇江市", 321200 => "泰州市",
        321300 => "宿迁市",

        //浙江省
        330100 => "杭州市", 330200 => "宁波市", 330300 => "温州市", 330400 => "嘉兴市", 330500 => "湖州市", 330600 => "绍兴市",
        330700 => "金华市", 330800 => "衢州市", 330900 => "舟山市", 331000 => "台州市", 331100 => "丽水市",

        //安徽省
        340100 => "合肥市", 340200 => "芜湖市", 340300 => "蚌埠市", 340400 => "淮南市", 340500 => "马鞍山市", 340600 => "淮北市",
        340700 => "铜陵市", 340800 => "安庆市", 341000 => "黄山市", 341100 => "滁州市", 341200 => "阜阳市", 341300 => "宿州市",
        341400 => "巢湖市", 341500 => "六安市", 341600 => "亳州市", 341700 => "池州市", 341800 => "宣城市",

        //福建省
        350100 => "福州市", 350200 => "厦门市", 350300 => "莆田市", 350400 => "三明市", 350500 => "泉州市", 350600 => "漳州市",
        350700 => "南平市", 350800 => "龙岩市", 350900 => "宁德市",

        //江西省
        360100 => "南昌市", 360200 => "景德镇市", 360300 => "萍乡市", 360400 => "九江市", 360500 => "新余市", 360600 => "鹰潭市",
        360700 => "赣州市", 360800 => "吉安市", 360900 => "宜春市", 361000 => "抚州市", 361100 => "上饶市",

        //山东省
        370100 => "济南市", 370200 => "青岛市", 370300 => "淄博市", 370400 => "枣庄市", 370500 => "东营市", 370600 => "烟台市",
        370700 => "潍坊市", 370800 => "济宁市", 370900 => "泰安市", 371000 => "威海市", 371100 => "日照市", 371200 => "莱芜市",
        371300 => "临沂市", 371400 => "德州市", 371500 => "聊城市", 371600 => "滨州市", 371700 => "菏泽市",

        //河南省
        410100 => "郑州市", 410200 => "开封市", 410300 => "洛阳市", 410400 => "平顶山市", 410500 => "安阳市", 410600 => "鹤壁市",
        410700 => "新乡市", 410800 => "焦作市", 410900 => "濮阳市", 411000 => "许昌市", 411100 => "漯河市", 411200 => "三门峡市",
        411300 => "南阳市", 411400 => "商丘市", 411500 => "信阳市", 411600 => "周口市", 411700 => "驻马店市",

        //湖北省
        420100 => "武汉市", 420200 => "黄石市", 420300 => "十堰市", 420500 => "宜昌市", 420600 => "襄阳市", 420700 => "鄂州市",
        420800 => "荆门市", 420900 => "孝感市", 421000 => "荆州市", 421100 => "黄冈市", 421200 => "咸宁市", 421300 => "随州市",
        422800 => "恩施土家族苗族自治州", 429004 => "仙桃市", 429005 => "潜江市", 429006 => "天门市", 429021 => "神农架林区",

        //湖南省
        430100 => "长沙市", 430200 => "株洲市", 430300 => "湘潭市", 430400 => "衡阳市", 430500 => "邵阳市", 430600 => "岳阳市",
        430700 => "常德市", 430800 => "张家界市", 430900 => "益阳市", 431000 => "郴州市", 431100 => "永州市", 431200 => "怀化市",
        431300 => "娄底市", 433100 => "湘西土家族苗族自治州",

        //广东省
        440100 => "广州市", 440200 => "韶关市", 440300 => "深圳市", 440400 => "珠海市", 440500 => "汕头市", 440600 => "佛山市",
        440700 => "江门市", 440800 => "湛江市", 440900 => "茂名市", 441200 => "肇庆市", 441300 => "惠州市", 441400 => "梅州市",
        441500 => "汕尾市", 441600 => "河源市", 441700 => "阳江市", 441800 => "清远市", 441900 => "东莞市", 442000 => "中山市",
        445100 => "潮州市", 445200 => "揭阳市", 445300 => "云浮市",

        //广西壮族自治区
        450100 => "南宁市", 450200 => "柳州市", 450300 => "桂林市", 450400 => "梧州市", 450500 => "北海市", 450600 => "防城港市",
        450700 => "钦州市", 450800 => "贵港市", 450900 => "玉林市", 451000 => "百色市", 451100 => "贺州市", 451200 => "河池市",
        451300 => "来宾市", 451400 => "崇左市",

        //海南省
        460100 => "海口市", 460200 => "三亚市", 469001 => "五指山市", 469002 => "琼海市", 469003 => "儋州市", 469005 => "文昌市",
        469006 => "万宁市", 469007 => "东方市", 469025 => "定安县", 469026 => "屯昌县", 469027 => "澄迈县", 469028 => "临高县",
        469030 => "白沙黎族自治县", 469031 => "昌江黎族自治县", 469033 => "乐东黎族自治县", 469034 => "陵水黎族自治县", 469035 => "保亭黎族苗族自治县",
        469036 => "琼中黎族苗族自治县", 469037 => "西沙群岛", 469038 => "南沙群岛", 469039 => "中沙群岛的岛礁及其海域",

        //四川省
        510100 => "成都市", 510300 => "自贡市", 510400 => "攀枝花市", 510500 => "泸州市", 510600 => "德阳市", 510700 => "绵阳市",
        510800 => "广元市", 510900 => "遂宁市", 511000 => "内江市", 511100 => "乐山市", 511300 => "南充市", 511400 => "眉山市",
        511500 => "宜宾市", 511600 => "广安市", 511700 => "达州市", 511800 => "雅安市", 511900 => "巴中市", 512000 => "资阳市",
        513200 => "阿坝藏族羌族自治州", 513300 => "甘孜藏族自治州", 513400 => "凉山彝族自治州",

        //贵州省
        520100 => "贵阳市", 520200 => "六盘水市", 520300 => "遵义市", 520400 => "安顺市", 522200 => "铜仁地区", 522300 => "黔西南布依族苗族自治州",
        522400 => "毕节地区", 522600 => "黔东南苗族侗族自治州", 522700 => "黔南布依族苗族自治州",

        //云南省
        530100 => "昆明市", 530300 => "曲靖市", 530400 => "玉溪市", 530500 => "保山市", 530600 => "昭通市", 530700 => "丽江市",
        530800 => "思茅市", 530900 => "临沧市", 532300 => "楚雄彝族自治州", 532500 => "红河哈尼族彝族自治州", 532600 => "文山壮族苗族自治州",
        532800 => "西双版纳傣族自治州", 532900 => "大理白族自治州", 533100 => "德宏傣族景颇族自治州", 533300 => "怒江傈僳族自治州",
        533400 => "迪庆藏族自治州",

        //西藏自治区
        540100 => "拉萨市", 542100 => "昌都地区", 542200 => "山南地区", 542300 => "日喀则地区", 542400 => "那曲地区",
        542500 => "阿里地区", 542600 => "林芝地区",

        //陕西省
        610100 => "西安市", 610200 => "铜川市", 610300 => "宝鸡市", 610400 => "咸阳市", 610500 => "渭南市", 610600 => "延安市",
        610700 => "汉中市", 610800 => "榆林市", 610900 => "安康市", 611000 => "商洛市",

        //甘肃省
        620100 => "兰州市", 620200 => "嘉峪关市", 620300 => "金昌市", 620400 => "白银市", 620500 => "天水市", 620600 => "武威市",
        620700 => "张掖市", 620800 => "平凉市", 620900 => "酒泉市", 621000 => "庆阳市", 621100 => "定西市", 621200 => "陇南市",
        622900 => "临夏回族自治州", 623000 => "甘南藏族自治州",

        //青海省
        630100 => "西宁市", 632100 => "海东地区", 632200 => "海北藏族自治州", 632300 => "黄南藏族自治州", 632500 => "海南藏族自治州",
        632600 => "果洛藏族自治州", 632700 => "玉树藏族自治州", 632800 => "海西蒙古族藏族自治州",

        //宁夏回族自治区
        640100 => "银川市", 640200 => "石嘴山市", 640300 => "吴忠市", 640400 => "固原市", 640500 => "中卫市",

        //新疆维吾尔自治区
        650100 => "乌鲁木齐市", 650200 => "克拉玛依市", 652100 => "吐鲁番地区", 652200 => "哈密地区", 652300 => "昌吉回族自治州",
        652700 => "博尔塔拉蒙古自治州", 652800 => "巴音郭楞蒙古自治州", 652900 => "阿克苏地区", 653000 => "克孜勒苏柯尔克孜自治州",
        653100 => "喀什地区", 653200 => "和田地区", 654000 => "伊犁哈萨克自治州", 654200 => "塔城地区", 654300 => "阿勒泰地区",
        659001 => "石河子市", 659002 => "阿拉尔市", 659003 => "图木舒克市", 659004 => "五家渠市",

        //台湾省
        710100 => "台北市", 710200 => "高雄市", 710300 => "基隆市", 710400 => "台中市", 710500 => "台南市", 710600 => "新竹市",
        710700 => "嘉义市", 710800 => "台北县", 710900 => "宜兰县", 711000 => "桃园县", 711100 => "新竹县", 711200 => "苗栗县",
        711300 => "台中县", 711400 => "彰化县", 711500 => "南投县", 711600 => "云林县", 711700 => "嘉义县", 711800 => "台南县",
        711900 => "高雄县", 712000 => "屏东县", 712100 => "澎湖县", 712200 => "台东县", 712300 => "花莲县",

        //香港特别行政区
        810000 => "香港",

        //澳门特别行政区
        820000 => "澳门"
    ];

    /**
     * 区号
     */
    protected static $area_codes = [
        "010" => "北京市", "021" => "上海市", "022" => "天津市", "023" => "重庆市",

        //河北省
        "0310" => "邯郸市", "0311" => "石家庄市", "0312" => "保定市", "0313" => "张家口市", "0314" => "承德市", "0315" => "唐山市",
        "0316" => "廊坊市", "0317" => "沧州市", "0318" => "衡水市", "0319" => "邢台市", "0335" => "秦皇岛市",

        //山西省
        "0349" => "朔州市", "0350" => "忻州市", "0351" => "太原市", "0352" => "大同市", "0353" => "阳泉市", "0354" => "晋中市",
        "0355" => "长治市", "0356" => "晋城市", "0357" => "临汾市", "0358" => "吕梁市", "0359" => "运城市",

        //河南省
        "0370" => "商丘市", "0371" => "郑州市", "0372" => "安阳市", "0373" => "新乡市", "0374" => "许昌市", "0375" => "平顶山市",
        "0376" => "信阳市", "0377" => "南阳市", "0378" => "开封市", "0379" => "洛阳市", "0391" => "焦作市", "0392" => "鹤壁市",
        "0393" => "濮阳市", "0394" => "周口市", "0395" => "漯河市", "0396" => "驻马店市", "0398" => "三门峡市",

        //辽宁省
        "024" => "沈阳市", "0410" => "铁岭市", "0411" => "大连市", "0412" => "鞍山市", "0413" => "抚顺市", "0414" => "本溪市",
        "0415" => "丹东市", "0416" => "锦州市", "0417" => "营口市", "0418" => "阜新市", "0419" => "辽阳市", "0421" => "朝阳市",
        "0427" => "盘锦市", "0429" => "葫芦岛市",

        //吉林省
        "0431" => "长春市", "0432" => "吉林市", "0433" => "延边朝鲜族自治州", "0434" => "四平市", "0435" => "通化市",
        "0436" => "白城市", "0437" => "辽源市", "0438" => "松原市", "0439" => "白山市",

        //黑龙江省
        "0451" => "哈尔滨市", "0452" => "齐齐哈尔市", "0453" => "牡丹江市", "0454" => "佳木斯市", "0455" => "绥化市",
        "0456" => "黑河市", "0457" => "大兴安岭地区", "0458" => "伊春市", "0459" => "大庆市", "0464" => "七台河市",
        "0467" => "鸡西市", "0468" => "鹤岗市", "0469" => "双鸭山市",

        //内蒙古自治区
        "0470" => "呼伦贝尔市", "0471" => "呼和浩特市", "0472" => "包头市", "0473" => "乌海市", "0474" => "乌兰察布市",
        "0475" => "通辽市", "0476" => "赤峰市", "0477" => "鄂尔多斯市", "0478" => "巴彦淖尔市", "0479" => "锡林郭勒盟",
        "0482" => "兴安盟", "0483" => "阿拉善盟",

        //江苏省
        "025" => "南京市", "0510" => "无锡市", "0511" => "镇江市", "0512" => "苏州市", "0513" => "南通市", "0514" => "扬州市",
        "0515" => "盐城市", "0516" => "徐州市", "0517" => "淮安市", "0518" => "连云港市", "0519" => "常州市", "0523" => "泰州市",
        "0527" => "宿迁市",

        //山东省
        "0530" => "菏泽市", "0531" => "济南市", "0532" => "青岛市", "0533" => "淄博市", "0534" => "德州市", "0535" => "烟台市",
        "0536" => "潍坊市", "0537" => "济宁市", "0538" => "泰安市", "0539" => "临沂市", "0543" => "滨州市", "0546" => "东营市",
        "0631" => "威海市", "0632" => "枣庄市", "0633" => "日照市", "0634" => "莱芜市", "0635" => "聊城市",

        //安徽省
        "0550" => "滁州市", "0551" => "合肥市", "0552" => "蚌埠市", "0553" => "芜湖市", "0554" => "淮南市", "0555" => "马鞍山市",
        "0556" => "安庆市", "0557" => "宿州市", "0558" => "阜阳市", "0559" => "黄山市", "0561" => "淮北市", "0562" => "铜陵市",
        "0563" => "宣城市", "0564" => "六安市", "0565" => "巢湖市", "0566" => "池州市", "0567" => "亳州市",

        //浙江省
        "0570" => "衢州市", "0571" => "杭州市", "0572" => "湖州市", "0573" => "嘉兴市", "0574" => "宁波市", "0575" => "绍兴市",
        "0576" => "台州市", "0577" => "温州市", "0578" => "丽水市", "0579" => "金华市", "0580" => "舟山市",

        //福建省
        "0591" => "福州市", "0592" => "厦门市", "0593" => "宁德市", "0594" => "莆田市", "0595" => "泉州市", "0596" => "漳州市",
        "0597" => "龙岩市", "0598" => "三明市", "0599" => "南平市",

        //湖北省
        "027" => "武汉市", "0710" => "襄樊市", "0711" => "鄂州市", "0712" => "孝感市", "0713" => "黄冈市", "0714" => "黄石市",
        "0715" => "咸宁市", "0716" => "荆州市", "0717" => "宜昌市", "0718" => "恩施土家族苗族自治州", "0719" => ["十堰市", "神农架林区"],
        "0722" => "随州市", "0724" => "荆门市", "0728" => ["仙桃市", "潜江市", "天门市"],

        //湖南省
        "0730" => "岳阳市", "0731" => ["长沙市", "湘潭市", "株洲市"], "0734" => "衡阳市", "0735" => "郴州市", "0736" => "常德市",
        "0737" => "益阳市", "0738" => "娄底市", "0739" => "邵阳市", "0743" => "湘西土家族苗族自治州", "0744" => "张家界市",
        "0745" => "怀化市", "0746" => "永州市",

        //广东省
        "020" => "广州市", "0660" => "汕尾市", "0662" => "阳江市", "0663" => "揭阳市", "0668" => "茂名市", "0750" => "江门市",
        "0751" => "韶关市", "0752" => "惠州市", "0753" => "梅州市", "0754" => "汕头市", "0755" => "深圳市", "0756" => "珠海市",
        "0757" => "佛山市", "0758" => "肇庆市", "0759" => "湛江市", "0760" => "中山市", "0762" => "河源市", "0763" => "清远市",
        "0766" => "云浮市", "0768" => "潮州市", "0769" => "东莞市",

        //广西壮族自治区
        "0770" => "防城港市", "0771" => ["南宁市", "崇左市"], "0772" => ["柳州市", "来宾市"], "0773" => "桂林市",
        "0774" => ["梧州市", "贺州市"], "0775" => ["玉林市", "贵港市"], "0776" => "百色市", "0777" => "钦州市",
        "0778" => "河池市", "0779" => "北海市",

        //江西省
        "0701" => "鹰潭市", "0790" => "新余市", "0791" => "南昌市", "0792" => "九江市", "0793" => "上饶市", "0794" => "抚州市",
        "0795" => "宜春市", "0796" => "吉安市", "0797" => "赣州市", "0798" => "景德镇市", "0799" => "萍乡市",

        //四川省
        "028" => "成都市", "0812" => "攀枝花市", "0813" => "自贡市", "0816" => "绵阳市", "0817" => "南充市", "0818" => "达州市",
        "0825" => "遂宁市", "0826" => "广安市", "0827" => "巴中市", "0830" => "泸州市", "0831" => "宜宾市",
        "0832" => ["内江市", "资阳市"], "0833" => ["乐山市", "眉山市", "沐川县"], "0834" => "凉山彝族自治州", "0835" => "雅安市",
        "0836" => "甘孜藏族自治州", "0837" => "阿坝藏族羌族自治州", "0838" => "德阳市", "0839" => "广元市",

        //贵州省
        "0851" => "贵阳市", "0852" => "遵义市", "0853" => "安顺市", "0854" => "黔南布依族苗族自治州", "0855" => "黔东南苗族侗族自治州",
        "0856" => "铜仁地区", "0857" => "毕节地区", "0858" => "六盘水市", "0859" => "黔西南布依族苗族自治州",

        //云南省
        "0691" => "西双版纳傣族自治州", "0692" => "德宏傣族景颇族自治州", "0870" => "昭通市", "0871" => "昆明市", "0872" => "大理白族自治州",
        "0873" => "红河哈尼族彝族自治州", "0874" => "曲靖市", "0875" => "保山市", "0876" => "文山壮族苗族自治州", "0877" => "玉溪市",
        "0878" => "楚雄彝族自治州", "0879" => "普洱市", "0883" => "临沧市", "0886" => "怒江傈僳族自治州", "0887" => "迪庆藏族自治州",
        "0888" => "丽江市",

        //西藏自治区
        "0891" => "拉萨市", "0892" => "日喀则地区", "0893" => "山南地区", "0894" => "林芝地区", "0895" => "昌都地区",
        "0896" => "那曲地区", "0897" => "阿里地区",

        //海南省
        "0898" => ["海口市", "三亚市"],

        //陕西省
        "029" => "西安市", "0911" => "延安市", "0912" => "榆林市", "0913" => "渭南市", "0914" => "商洛市", "0915" => "安康市",
        "0916" => "汉中市", "0917" => "宝鸡市", "0919" => "铜川市",

        //甘肃省
        "0930" => "临夏回族自治州", "0931" => "兰州市", "0932" => "定西市", "0933" => "平凉市", "0934" => "庆阳市",
        "0935" => ["金昌市", "武威市"], "0936" => "张掖市", "0937" => ["嘉峪关市", "酒泉市"], "0938" => "天水市", "0939" => "陇南市",
        "0941" => "甘南藏族自治州", "0943" => "白银市",

        //宁夏回族自治区
        "0951" => "银川市", "0952" => "石嘴山市", "0953" => "吴忠市", "0954" => "固原市", "0955" => "中卫市",

        //青海省
        "0970" => "海北藏族自治州", "0971" => "西宁市", "0972" => "海东地区", "0973" => "黄南藏族自治州", "0974" => "海南藏族自治州",
        "0975" => "果洛藏族自治州", "0976" => "玉树藏族自治州", "0977" => ["德令哈市", "乌兰县", "都兰县", "天峻县"], "0979" => "格尔木市",

        //新疆维吾尔自治区
        "0901" => "塔城地区", "0902" => "哈密地区", "0903" => "和田地区", "0906" => "阿勒泰地区", "0908" => "克孜勒苏柯尔克孜自治州",
        "0909" => "博尔塔拉蒙古自治州", "0990" => "克拉玛依市", "0991" => "乌鲁木齐市", "0992" => "奎屯市",  "0993" => "石河子市",
        "0994" => ["昌吉回族自治州", "五家渠市"], "0995" => "吐鲁番地区", "0996" => "巴音郭楞蒙古自治州", "0997" => ["阿克苏地区", "阿拉尔市"],
        "0998" => ["喀什地区", "图木舒克市"], "0999" => "伊犁哈萨克自治州"
    ];

    /**
     * 地区数组
     * f_id,f_name,f_pid,f_code,f_pinyin,f_level
     * @var array
     */
    private static $areas = [];

    /**
     * 读取地区配置
     * @return array
     */
    private static function setAreas() {
        if (!empty(self::$areas)) {
            return [];
        }
        $data = AreaData::getAreas();
        if (empty($data)) {
            return [];
        }
        foreach ($data as $val) {
            self::$areas[$val['id']] = $val;
        }
        return self::$areas;
    }

    /**
     * 获取地区数组
     *
     * @return array
     */
    public static function getAreas() {
        self::setAreas();
        return self::$areas;
    }


    /**
     * 根据ID获取地区名称
     *
     * @param $id
     * @return string
     */
    public static function getAreaNameByID($id) {
        self::setAreas();
        if ($id && isset(self::$areas[$id])) {
            return self::$areas[$id]['name'];
        }
        return '';
    }

    /**
     * 获取省份及城市
     *
     * @return array
     */
    public static function getProvinceWithCities() {
        $provinces = [];

        foreach (self::$cities as $id => $city) {
            $pid = intval($id / 10000) * 10000;

            if (!isset($provinces[$pid])) {
                $provinces[$pid] = ['id' => $pid, 'name' => self::$provinces[$pid]];
            }

            $provinces[$pid]['cities'][] = ['id' => $id, 'name' => $city];
        }

        return array_values($provinces);
    }

    /**
     * 获取地区区号汇总
     *
     * @return array
     */
    public static function getAreaCodes() {
        $data = [];

        foreach (self::$area_codes as $code => $area) {
            $data[] = ['code' => $code, 'area' => $area];
        }

        return $data;
    }

    /**
     * 获取省份
     *
     * @param int $id
     * @return string
     */
    public static function getProvince($id) {
        return isset(self::$provinces[$id]) ? self::$provinces[$id] : '';
    }

    /**
     * 获取城市所在省份
     *
     * @param int $id
     * @return string
     */
    public static function getProvinceByCity($id) {
        if (isset(self::$cities[$id])) {
            $pid = intval($id / 10000) * 10000;

            if (isset(self::$provinces[$pid])) {
                return self::$provinces[$pid];
            }
        }

        return '';
    }

    /**
     * 获取城市
     *
     * @param int $id
     * @return string
     */
    public static function getCity($id) {
        return isset(self::$cities[$id]) ? self::$cities[$id] : '';
    }

    /**
     * 区号过滤
     *
     * @param string $code
     * @return string|bool
     */
    public static function filterCode($code) {
        $code = self::formatCode($code);

        if ($code && isset(self::$area_codes[$code])) {
            return $code;
        }

        return false;
    }

    /**
     * 获取区号归属
     *
     * @param string $code
     * @return string|array
     */
    public static function getAreaByCode($code) {
        $code = self::formatCode($code);

        return isset(self::$area_codes[$code]) ? self::$area_codes[$code] : '';
    }

    /**
     * 获取地区区号
     *
     * @param string $area 最少2个字，采取包含获取 如：
     *                     1. 玉树、玉树藏族、玉树藏族自治州 => 玉树藏族自治州
     *                     2. 深圳、深圳市、广东省深圳市 => 深圳市
     * @return string
     */
    public static function getCodeByArea($area) {
        if (empty($area) || mb_strlen($area) < 2) {
            return '';
        }

        $code = '';
        foreach (self::$area_codes as $code => $item) {
            $item = is_array($item) ? $item : [$item];

            foreach ($item as $value) {
                if ($value == $area || strpos($value, $area) !== false
                    || strpos($area, str_replace(['市', '地区', '自治州'], '', $value)) !== false) {

                    return $code;
                }
            }
        }

        return $code;
    }

    /**
     * 转换区号，前补0
     *
     * @param string $code
     * @return string
     */
    public static function formatCode($code) {
        if (empty($code)) {
            return '';
        }

        return strpos($code, '0') === 0 ? $code : '0' . $code;
    }

    /**
     * 根据新旧数据获取最新的城市ID
     * @param $area
     * @return array
     */
    public static function getNewAreaId($area) {
        if (!isset($area['province']) || !isset($area['city'])) {
            return ['country' => 0, 'province' => 0, 'city' => 0, 'region' => 0];
        }
        $area['country'] = isset($area['country']) ? $area['country'] : '0';
        $area['region'] = isset($area['region']) ? $area['region'] : '0';
        if ($area['province'] && strlen($area['province']) == 6) {
            $area['country'] = 100000;
        }
        //北京市 天津市 上海市 重庆市
        if (in_array($area['province'], [110000, 120000, 310000, 500000])) {
            if ($area['city']) {
                $area['region'] = $area['city'];
                $area['city'] = substr($area['province'], 0, 3) . '100';
            }
        }
        return $area;
    }
}
