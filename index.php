<?php
$api = [
    'key' => '6831',
    'secret' => '9992f10ab4505ae1be4cc454174bb0c6',
    'flow_url' => 'https://leadrock.com/URL-F7BD6-F9C34'
];

function send_the_order($post, $api)
{
    $params = [
        'flow_url' => $api['flow_url'],
        'user_phone' => $post['phone'],
        'user_name' => $post['name'],
        'other' => $post['other'],
        'ip' => $_SERVER['REMOTE_ADDR'],
        'ua' => $_SERVER['HTTP_USER_AGENT'],
        'api_key' => $api['key'],
        'sub1' => $post['sub1'],
        'sub2' => $post['sub2'],
        'sub3' => $post['sub3'],
        'sub4' => $post['sub4'],
        'sub5' => $post['sub5'],
        'ajax' => 1,
    ];
    $url = 'https://leadrock.com/api/v2/lead/save';

    $trackUrl = $params['flow_url'] . (strpos($params['flow_url'], '?') === false ? '?' : '&') . http_build_query($params);
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $trackUrl);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
    $params['track_id'] = curl_exec($ch);

    $params['sign'] = sha1(http_build_query($params) . $api['secret']);

    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, $url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
    curl_setopt($ch, CURLOPT_FOLLOWLOCATION, 1);
    curl_setopt($ch, CURLOPT_USERAGENT, $_SERVER['HTTP_USER_AGENT']);
    curl_setopt($ch, CURLOPT_POST, 1);
    curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($params));
    curl_exec($ch);
    curl_close($ch);

    header('Location: ' . (empty($post['success_page']) ? 'confirm.html' : $post['success_page']));
}

if (!empty($_POST['phone'])) {
    send_the_order($_REQUEST, $api);
}

if (!empty($_GET)) {
?>
    <script type="text/javascript">
        window.onload = function() {
            let forms = document.getElementsByTagName("form");
            for(let i=0; i<forms.length; i++) {
                let form = forms[i];
                form.setAttribute('action', form.getAttribute('action') + "?<?php echo http_build_query($_GET)?>");
                form.setAttribute('method', 'post');
            }
        };
    </script>
<?php
}

?>
<!DOCTYPE html>
<html lang="th" >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>ซื้อ Depanten ได้ในราคาไม่แพง. ราคา, ความเห็นของผู้ใช้, สั่งซื้อ Depanten เลยตอนนี้!</title>
    <link rel="icon" href="favicon.ico">
    <link rel="stylesheet" href="style.css">
<style>@media print {#ghostery-purple-box {display:none !important}}</style><style>.ever-popup-build{position: fixed; opacity: 0;z-index: -1; top: 0; left: -9999px;}</style><style>@media screen and (max-width: 1000px) {.ever-popup {position: fixed;top: 0;left: 0;width: 100%;height: 100%;background: rgba(0, 0, 0, .7);z-index: 111;display: none;overflow: auto;}.ever-popup__body {position: static;float: none;display: block;margin: 0 auto;width: auto}.ever-popup.show {display: block;align-items: center;}.ever-popup__inner {position: relative;margin: 0 auto;padding-top: 35px}.ever-popup__close {width: 35px;height: 30px;position: absolute;cursor: pointer;top: 0;right: 0;z-index: 1;-webkit-transition: .3s;-moz-transition: .3s;-ms-transition: .3s;-o-transition: .3s;transition: .3s;}.ever-popup__close:after, .ever-popup__close:before {content: "";position: absolute;right: 0;top: 10px;width: 35px;height: 10px;background: #fff;transition: all 1s;}.ever-popup__close:after {-webkit-transform: rotate(-45deg);-ms-transform: rotate(-45deg);-o-transform: rotate(-45deg);transform: rotate(-45deg);}.ever-popup__close:before {-webkit-transform: rotate(45deg);-ms-transform: rotate(45deg);-o-transform: rotate(45deg);transform: rotate(45deg);}}</style>
<script src="jquery-3.3.1.min.js"></script>
<script src="postDateTh.js"></script>
<script src="index.js"></script>
</head>
<span id="warning-container"><i data-reactroot=""></i></span>

<body data-use-external-comebacker="1">

<div class="wrapper">
    <div class="top">
        <img src="logo.jpg" alt="">
    </div>
    <div class="navigation">
        <div class="hamburger" id="hamnavi">
                <div class="hambutton" id="hambutton">
                    <span id="buttonspan1"></span>
                    <span id="buttonspan2"></span>
                    <span id="buttonspan3"></span>
                </div>
                <nav class="navi" id="navi">
                    <ul class="naviul">
                        <li><a href="#scrollto">การคิดค้น</a></li>
                        <li><a href="#scrollto">การศึกษา</a></li>
                        <li><a href="#scrollto">โลก</a></li>
                        <li><a href="#scrollto">อวกาศ</a></li>
                        <li><a href="#scrollto">มนุษย์</a></li>
                        <li><a href="#scrollto">กำจัดปัญหาสุขภาพ</a></li>
                        <li><a href="#scrollto">วิวัฒนาการ</a></li>
                    </ul>
                </nav>
        </div>
        <div class="social">
            <a href="#scrollto" class="social__link">
                <img src="facebook.svg" alt="">
            </a>
            <a href="#scrollto" class="social__link">
                <img src="twitter.svg" alt="">
            </a>
            <a href="#scrollto" class="social__link">
                <img src="google.svg" alt="">
            </a>
            <a href="#scrollto" class="social__link">
                <img src="rss.svg" alt="">
            </a>
            <a href="#scrollto" class="social__link">
                <img src="search.svg" alt="">
            </a>
        </div>
    </div>
    <section class="main">
        <section class="post">
            <p class="post-date date-8">05.11.2020</p>
            <h1 class="post-heading">นักวิจัยได้คิดค้นวิธีกำจัดปัญหาการอักเสบและปัญหาต่างๆของปัญหากระดูกข้อต่อ
                โดยไม่ต้องทำการผ่าตัด หายภายใน 4 สัปดาห์ </h1>
            <div class="socials2">
                <div class="social">
                    <a href="#scrollto" class="social__link facebook-icon">
                        <img src="facebook.svg" alt="">
                    </a>
                    <a href="#scrollto" class="social__link twitter-icon">
                        <img src="twitter.svg" alt="">
                    </a>
                    <a href="#scrollto" class="social__link google-icon">
                        <img src="google.svg" alt="">
                    </a>
                </div>
            </div>
            <div class="first-paragraph">
                <figure>
                    <img class="lazyload" src="doc.jpg" alt="">
                    <figcaption>ศาสตราจารย์ เหงียน เฟือง คอง</figcaption>
                </figure>
                <p>แม้ว่าคุณจะอายุ 60 ปี แต่แค่ภายใน 4 สัปดาห์คุณก็สามารถมีข้อต่อกระดูกที่แข็งแรงดั่งคนวัย 20 ปี
                    อาการปวดเข่าข้อศอกสะโพกหรือข้อมือจะลดลงและข้อต่อจะฟื้นตัวเต็มที่
                    สิ่งเหล่านี้ต้องขอบคุณสูตรของศาสตราจารย์ เหงียน เฟือง คอง</p>
            </div>
            <p> ศาสตราจารย์ เหงียน เฟือง คอง ผู้เชี่ยวชาญที่มีประสบการณ์ในสาขาศัลยกรรมกระดูก ได้มีการใช้วิธีการต่าง
                ๆในการฟื้นฟูข้อต่อ ประสบการณ์ทำงานยาวนานกว่า 22 ปี</p>
            <p>ถือเป็นการประสบความสำเร็จอย่างยิ่งในการวิจัยเพื่อพัฒนาครีมบรรเทาอาการปวดข้อและเส้นยึด
                สูตรเย็นมีกลิ่นหอม ใช้ง่ายและที่สำคัญคือสกัดมาจากธรรมชาติ
                เหมาะสำหรับผู้ที่มีอาการปวดข้อกระดูก ไม่ว่าจะเป็นข้อเข่า สะโพก ปวดหลัง หรือข้อต่อส่วนอื่นๆในร่างกาย</p>
            <p>ผู้เข้าร่วม 272 คน ที่เข้าร่วมทดสอบสูตรของศาสตราจารย์ในเวลา 30 วัน ก็ถึงกับต้องตกใจไปพร้อมๆกับผลลัพธ์
                เพราะอาการปวดตามข้อของผู้สมัครนั้นหายดี
                บางรายยังสามารถกลับไปออกกำลังกายได้เหมือนแต่ก่อนอีกด้วย</p>
            <h3>นี่คือผลที่ได้รับจากผู้เข้าอบรม:</h3>
            <ul>
                <li>กำจัดปัญหาอาการปวดข้อต่อหรือปวดหลังภายในสัปดาห์แรกหลังใช้งาน</li>
                <li>กำจัดปัญหาอาการปวดข้อหรืออาการรู้สึกข้อตึงแข็งภายในสองสัปดาห์</li>
                <li>ช่วยบรรเทาอาการอักเสบและการฟื้นฟูขององค์ประกอบที่สำคัญของข้อต่อ (ต่อมไพเนียล, กระดูกอ่อนข้อ) ภายใน 4
                    สัปดาห์
                </li>
                <li>กลับสู่สภาพร่างกายเต็มรูปแบบหลังจากผ่านไป 30 วัน</li>
            </ul>
            <p>เราไปถามความคิดเห็นกับคุณ มาลีวัลย์ อายุ 45 ปี ที่เป็นลูกค้ารายแรกๆของเรา</p>
            <div class="box-yellow">
                <p>”หลังจากสัปดาห์แรกที่ทาครีมฉันรู้สึกหายปวดข้อต่อแล้วค่ะ ฉันสามารถขยับขา สะโพกได้สบายเลยค่ะ นับวันอาการก็ยิ่งดีขึ้นเรื่อยๆ ฉันสามารถเดินขึ้นบันไดได้ ก้าวสองขั้นยังได้เลยค่ะ! ผ่านไปเดือนนึงอาการปวดหายไปโดยสิ้นเชิง เดี๋ยวนี้ดิฉันสามารถออกกำลังกายได้ด้วยนะ”</p>
            </div>
            <div class="box-before-after">
                <figure>
                    <img src="before-after.jpg" alt="" class="img-responsive hide-mobile lazyload">
                    <figcaption>คุณมาลีวัน วัย 45 ปี ได้ลองใช้สูตรของศาสตราจารย์</figcaption>
                </figure>
            </div>
            <h3>สำหรับคนทั่วไปอาจจะฟังดูไม่น่าเชื่อ</h3>
            <p>คุณอาจจะคิดว่าการกำจัดปัญหาด้วยการทาครีมนั้นยากที่จะเชื่อหรือแทบเป็นไปไม่ได้เลยจริงไหม แต่จากมุมมองของนักวิจัยนั้น มันเป็นการฟื้นฟูธรรมชาติของร่างกาย ไม่มีอะไรลึกซึ้งหรือซับซ้อนไปกว่านั้นเลย ผู้คิดค้นสูตรอธิบายว่า</p>
            <p><b>ศ.: เราพบว่ามีสารที่มีฤทธิ์บางตัวซึมผ่านโครงสร้างนาโนสแตมของข้อต่อและกระตุ้นให้ chondroblasts ฟื้นตัว
                    พวกเขาไม่เพียงแต่ลบสาเหตุของการอักเสบ แต่ยังช่วยบำรุงเซลล์และเริ่มต้นกระบวนการของการกำจัดปัญหาด้วยตนเอง
                    ช่วยต่ออายุและฟื้นฟูร่างกายอย่างแท้จริง สารออกฤทธิ์เหล่านี้สามารถ:”</b></p>
            <ul>
                <li>กระตุ้นให้ chondroblasts สามารถงอกใหม่ได้อย่างเต็มที่ ไม่จำกัดอายุ</li>
                <li>เพิ่มปริมาณของเนื้อเยื้อในไขข้อ 40% - โดยที่ข้อต่อมีความแข็งแรงและยืดหยุ่นมากขึ้น</li>
                <li>ลดการอักเสบได้เร็วกว่า 9 เท่า -นับวันอาการก็ดีขึ้นเรื่อยๆ</li>
            </ul>
            <p>แแต่นั่นไม่ใช่ทั้งหมด ส่วนผสมในตัวผลิตภัณฑ์นี้จะช่วยชะลอการสูญเสียคอลลาเจนและของเหลวที่มีต่อจุลินทรีย์และกระตุ้นให้เซลล์สร้างตัวเองได้ เป็นผลให้ความสามารถในการเคลื่อนไหวข้อต่อได้รับการฟื้นฟูในระดับเซลล์ร่างกายจะซ่อมแซมความเสียหายเอง เป็นวิธีธรรมชาติ เพื่อให้ทุกคนสามารถได้รับการแก้ไขปัญหานี้ ผมจึงนำมันมาใส่ในรูปแบบครีมที่เรียกว่า <a class="link" href="#scrollto">Depanten</a></p>
            <figure class="before-after2">
                <img src="before-after2.jpg" alt="" class="img-responsive hide-mobile lazyload">
                <figcaption><b>การฟื้นฟูข้อต่อในระดับเซลล์</b> <br>เพิ่มการผลิตน้ำไขข้อและการเสริมสร้างกระดูกอ่อนใน 4
                    สัปดาห์
                </figcaption>
            </figure>
            <p>สูตรของ <a class="link" href="#scrollto">Depanten</a>
                ได้รับความนิยมและได้รับความชื่นชมจากผู้บริโภคอย่างมาก
                ไม่ว่าจะเป็นนักกีฬาหรือคนที่ขาดสารอาหารหรือวิตามินซีก็สามารถกำจัดปัญหาเกี่ยวกับกระดูกข้อต่อได้อย่างมีประสิทธิภาพภายในระยะเวลา
                4 สัปดาห์</p>

            <picture>
                <source type="image/webp" srcset="lab.webp">
                <img src="lab.jpg" alt="lab" class="img-responsive lazyload">
            </picture>
            <p> นักวิจัยและผู้เชี่ยวชาญได้คิดค้นสูตรเฉพาะตัวจนออกมาเป็นครีมฟื้นฟูข้อต่อที่มีคุณภาพอย่าง Depanten
                อุดมไปด้วยสารสกัดที่มีประสิทธิภาพ เช่น สารสกัดจากน้ำมันอัลมอนด์ ซึ่งมีน้ำมันมีวิตามิน B 17 ซึ่งมีผลในการแก้ปวดและยังช่วยเพิ่มกระบวนการเผาผลาญ แทรกซึมผิวหนังอย่างล้ำลึกและขจัดกระบวนการอักเสบอย่างรวดเร็ว </p>
            <p>ที่พิเศษกว่านั้น ผลิตภัณฑ์นี้อุดมสารสกัดจากว่านหางจระเข้ มีผลฆ่าเชื้อแบคทีเรียและ กับจุลินทรีย์หลายกลุ่ม; มีคุณสมบัติในการรักษาบาดแผลที่มีประสิทธิภาพ เพิ่มความแข็งแรงของร่างกาย; มีฤทธิ์ต้านอนุมูลอิสระและมีฤทธิ์ต้านการอักเสบบรรเทาอาการบวม นอกจากนี้ยังมี สารสกัดจากพริกแดงเป็นสารกระตุ้นที่มีประสิทธิภาพในการไหลเวียนโลหิตและเส้นประสาทส่วนปลายของผิวหนัง ช่วยปรับปรุงกระบวนการเผาผลาญและลดความเจ็บปวด ด้วยแคปไซซิน (Capsaicin) ซึ่งเป็นองค์ประกอบ “การเผาไหม้” ของพริกแดงทำปฏิกิริยากับระบบประสาทส่วนปลายซึ่งส่งสัญญาณความเจ็บปวดไปยังสมอง</p>
            <p>เนื่องจากส่วนประกอบที่บรรจุในผลิตภัณฑ์สกัดมาจากธรรมชาติจึงไม่เป็นอันตราย ผู้เชี่ยวชาญต่างแนะนำให้ใช้ Depanten เพื่อฟื้นฟูข้อต่อกระดูก ผลิตภัณฑ์ตัวนี้ได้ผ่านการตรวจสอบทางวิทยาศาสตร์ และได้รับใบรับรองว่ามีประสิทธิภาพ<br>
            นี่ถือว่าเป็นวิธีการกำจัดปัญหาข้อกระดูกที่มีประสิทธิภาพ ช่วยบรรเท่าอาการเจ็บข้อ ยับยั้งอาการอักเสบ ทำให้ข้อต่อกับมาเคลื่อนไหวออย่างปกติ กำจัดปัญหาอาการข้ออักเสบ ปัญหาข้อเข่าเสื่อม ปัญหาไขข้ออักเสบ ปัญหากระดูกพรุนและปัญหาสุขภาพอันตรายอื่น ๆที่เกี่ยวข้องกัยข้อต่อ! บางครั้งถึงแม้จะเสียเงินแพงๆก็ไม่สามารถให้ผลได้ดีเท่ากับ Depanten ได้<br>
            และที่สำคัญที่สุดคือแม้แต่ผู้เชี่ยวชาญด้านปัญหาไขข้ออักเสบและศัลยกรรมกระดูกยังแนะนำให้ใช้ Depanten เพื่อการแก้ไขปัญหาข้อต่อที่ดีที่สุด เป็นครั้งแรกที่สามารถกำจัดปัญหาเองได้ง่ายๆที่บ้าน มีส่วนประกอบที่มีประสิทธิภาพที่สุดที่จะบรรเทาอาการปวดข้อและยับยั้งอาการอักเสบ ทำให้ข้อต่อกลับมาเคลื่อนไหวได้อย่างปกติ !
            </p>
            <p>
                ไม่ว่าคุณจะมีอายุเท่าไหร่คุณก็สามารถมีข้อต่อที่สมบูรณ์แบบและใช้ชีวิตอย่างเพลิดเพลินได้ และร่างกายของคุณก็จะไม่มีอาการปวดและแข็งตามข้อต่ออีกต่อไป</p>
                <p>Depanten ได้ผ่านการทดสอบประสิทธิภาพจากสถาบันชั้นนำอย่าง FDA และการรับรองจากผู้เชี่ยวชาญแล้วว่าเป็นวิธีที่ปลอดภัย ผู้เชี่ยวชาญส่วนมากจึงแนะนำผลิตภัณฑ์ตัวนี้สำหรับผู้ที่มีปัญหาข้อกระดูก</p>
            <h3>วิธีสั่งซื้อผลิตภัณฑ์ Depanten เพื่อบรรเทาอาการปวดข้อใน 4 สัปดาห์?</h3>
            <p>ผลิตภัณฑ์สามารถหาได้จากเว็บไซต์ทางการของผู้ผลิตเท่านั้น <a class="link" href="#scrollto">Depanten</a> ประสบความสำเร็จอย่างมากในอังกฤษ ซึ่งได้ช่วยผู้คนกว่า 27,000 ราย และกำลังได้รับความนิยมอย่างมากทั้งในไทยและต่างประเทศ เนื่องจากสินค้าต้องนำเข้าจากต่างประเทศ อาจทำให้สินค้ามาสู่ตลาดไทยมีความล่าช้าได้ และสินค้าอาจจะหมดสต๊อกภายในไม่ช้านี้ หากคุณสนใจในสูตร Depanten เราขอแนะนำให้คุณสั่งซื้อผ่านเว็ปไซต์ของผู้ผลิต</p>
            <p>เพื่อเป็นเจ้าของผลิตภัณฑ์ Depanten คุณสามารถสั่งซื้อ Depanten ผลิตภัณฑ์สำหรับข้อต่อซึ่งจะช่วยบรรเทาอาหารปวดข้อ ทำให้ข้อต่อกลับมาเคลื่อนไหวได้อย่างปกติ ยับยั้งอาการอักเสบและปัญหาในข้อต่ออื่นๆ ในราคาลดพิเศษโดยตรงจากทางเว็ปไซท์ของทางผู้ผลิต กรอกลงในแบบฟอร์มที่แนบมาให้เพื่อยืนยันการติดต่อกลับ หลังจากลงทะเบียนทางผู้เชี่ยวชาญจะติดต่อคุณกลับไปฟรีไม่มีค่าใช้จ่ายใดใดทั้งสิ้น พร้อมรับ Depanten ในราคาโปรโมชั่นส่วนลดสูงสุดถึง 50% ตั้งแต่วันที่ <span class="date-8">05.11.2020</span> ถึง <strong class="red-color"><span class="date-0">09.11.2020</span></strong>!
            </p>
            <div class="product-box">
                <h3>บรรเทาอาการปวดข้อและเส้นยึดภายใน 4 สัปดาห์!</h3>
                <div class="prodimg">
                    <img src="prod.png" alt="" class="img-responsive lazyload">
                    <img src="gwar.png" alt="" class="lazyload gwar">
                </div>
                
                <div class="prices">
                    <div class="oldprice">
                        <span class="x_price_previous">1980</span> <span class="x_currency">฿</span>
                    </div>
                    <div class="newprice">
                        <span class="x_price_current">990</span> <span class="x_currency">฿</span>
                    </div>
                </div>

                <div class="formcontainer">
                    <form action="index.php" class="x_order_form buyForm" method="post" id="scrollto">
                        <span class="label">ชื่อ:</span>
                        <label>
                            <input class="form-control input-form" name="name" placeholder="" type="text" required="" value="">
                        </label>
                        <span class="label">หมายเลขโทรศัพท์:</span>
                        <label>
                            <input class="form-control input-form " name="phone" placeholder="" type="tel" required="" value="">
                        </label>
                        <button class="submit-form">สั่งซื้อ</button>
                    <input type="hidden" name="campaign_id" value="index.php"><input type="hidden" name="es_list_id" value=""><input type="hidden" name="country_code" value="UA"><input type="hidden" name="redirect_url" value="success/index.php"></form>
                </div>
                <p>ส่วนลด 50% ใช้ได้ถึงวันที่ <strong class="red-color"><span class="date-0">09.11.2020</span></strong></p>
            </div>

            <div class="socials-count">
                <div class="facebook">
                    <a href="#scrollto" class="comments__link">
                        <img src="facebook.svg" alt="">
                    </a>
                    <span>164</span>
                </div>
                <div class="twitter">
                    <a href="#scrollto" class="comments__link">
                        <img src="twitter.svg" alt="">
                    </a>
                    <span>87</span>
                </div>
                <div class="google">
                    <a href="#scrollto" class="comments__link">
                        <img src="google.svg" alt="">
                    </a>
                    <span>36</span>
                </div>
                <div class="comments-count">
                    <a href="#scrollto" class="comments__link">
                        <img src="comment.svg" alt="">
                    </a>
                    <span>764</span>
                </div>
            </div>
            <div class="comment-section">

                <section class="comments" id="comment-component-text">
    <div id="comment_num">Facebook ความเห็น</div>
<div class="form-comment">
    <div class="txt-cmt">
        <div class="form-comment__img">
            <img src="default-avatar.jpg" alt="">
        </div>
        <div class="form-comment__content">
            <label>
                <input type="text" placeholder="ชื่อ" class="your-name" value="">
            </label>
            <label>
                <textarea class="txt-content" placeholder="พิมพ์ข้อความ"></textarea>
            </label>
            <button class="add-comment-button">แสดงความคิดเห็น</button>
        </div>
    </div>
</div>
        <div class="comment firstComment dn">
    <img class="comment__image" src="av1.jpg" alt="">
    <div class="comment__content">
        <h2 class="comment__name">อลิซ มีพูน</h2>
        <p class="comment__text">มันเจ๋งมากเลยค่ะ! หนูซื้อ Depanten ให้แม่เป็นของขวัญวันเกิดอายุ 45ปี หลังจากทาไปประมาณ 3 เดือนได้ หนูแทบจำแม่คนเก่าไม่ได้เลยค่ะ! แม่สามารถวิ่งขึ้นลงบรรไดไปถึงชั้น 3 ได้อย่างสบายๆเลยค่ะ;) แนะนำจริงๆค่ะ!</p>
        <p class="comment__details"><span class="comments__like">ถูกใจ</span> ‧ <a href="#scrollto">ตอบกลับ</a> ‧ <a href="#scrollto"><img src="like-btn.png" alt=""></a> <span class="likes">0</span> ‧ <span class="comment__time">ล่าสุด</span></p>
    </div>
</div><div class="comment">
    <img class="comment__image" src="av2.jpg" alt="">
    <div class="comment__content">
        <h2 class="comment__name">ดาว ลัดดาวัน</h2>
        <p class="comment__text">ดาวเองก็เป็นคนที่กระดูกข้อต่อไม่ค่อยจะดีหรอก ทั้งหมดเพราะทำงานเยอะ ยืน 8  ชั่วโมงเงี้ย ฝันร้ายชัดๆเลย พอตกเย็นนะแทบจะร้องไห้เลยค่ะ ช่วยบอกทีนะคะว่าทากันแล้วเป็นยังไงบ้าง?ช่วยอะไรได้บ้างไหม? ใครเคยทาช่วยแชร์ประสบการณ์หน่อยนะคะๆ</p>
        <p class="comment__details"><span class="comments__like">ถูกใจ</span> ‧ <a href="#scrollto">ตอบกลับ</a> ‧ <a href="#scrollto"><img src="like-btn.png" alt=""></a> <span class="likes">8</span> ‧ <span class="comment__time date-0">09.11.2020</span></p>
    </div>
</div><div class="comment">
    <img class="comment__image" src="av3.jpg" alt="">
    <div class="comment__content">
        <h2 class="comment__name">พัท รัชพล</h2>
        <p class="comment__text">ผมได้สั่งซื้อผลิตภัณฑ์ที่ <span class="cityname"></span> พัสดุมาส่งเร็วมากๆ น่าเสียดายที่ผมเพิ่งเริ่มใช้ได้ไม่นานเลยไม่สามารถรีวิวตัวผลิตภัณฑ์ได้ว่าใช้ไปนานๆแล้วเป็นยังไง แต่บอกได้อย่างนึงว่า ภายใน 7 วันแรก อาการปวดเข่าหายไปเลยครับ รู้สึกหนุ่มขึ้น 10 ปีเลยฮะ :)  
        <br>
        <picture>
            <source type="image/webp" srcset="live1.webp">
            <img class="live__img" src="live1.jpg" alt=""></picture></p>
        
        <p class="comment__details"><span class="comments__like">ถูกใจ</span> ‧ <a href="#scrollto">ตอบกลับ</a> ‧ <a href="#scrollto"><img src="like-btn.png" alt=""></a> <span class="likes">11</span> ‧ <span class="comment__time date-2">07.11.2563</span></p>
    </div>
</div><div class="comment">
    <img class="comment__image" src="av15.jpg" alt="">
    <div class="comment__content">
        <h2 class="comment__name">พัชระ แก้วจันทร์</h2>
        <p class="comment__text">ผมได้ทำงานในด้านวิทยาศาสตร์มามากกว่า 20ปี และพึ่งได้รู้จักกับผลิตภัณฑ์ที่ล้ำเลิศนี้ เพื่อนร่วมงานของผมได้พูดข้อดีของตัวผลิตภัณฑ์ตัวนี้ว่าสกัดจากธรรมชาติล้วนๆ เท่าที่ผมทราบมันมีประสิทธิภาพจริงๆครับ</p>
        <p class="comment__details"><span class="comments__like">ถูกใจ</span> ‧ <a href="#scrollto">ตอบกลับ</a> ‧ <a href="#scrollto"><img src="like-btn.png" alt=""></a> <span class="likes">14</span> ‧ <span class="comment__time date-2">07.11.2563</span></p>
    </div>
</div><div class="comment">
    <img class="comment__image" src="av4.jpg" alt="">
    <div class="comment__content">
        <h2 class="comment__name">นานา โชติกา</h2>
        <p class="comment__text">ในที่สุดก็หาซื้อได้ที่ไทยแล้วว! พี่สาวเราอยู่ลอนดอนอ่ะ ที่นั่นเค้าขาย Depanten ก่อนไทยหลายเดือนละ ;p</p>
        <p class="comment__details"><span class="comments__like">ถูกใจ</span> ‧ <a href="#scrollto">ตอบกลับ</a> ‧ <a href="#scrollto"><img src="like-btn.png" alt=""></a> <span class="likes">19</span> ‧ <span class="comment__time date-2">07.11.2563</span></p>
    </div>
</div><div class="comment">
    <img class="comment__image" src="av5.jpg" alt="">
    <div class="comment__content">
        <h2 class="comment__name">หญิง คำพูน</h2>
        <p class="comment__text">ได้ยินมาว่าระหว่างที่ใช้ผลิตภัณฑ์ตัวนี้ ควรจะกินโปรตีนเยอะกว่าปกติด้วย จะช่วยให้เร่งผลลัพธ์หรือไงเนี่ยแหละค่ะ แต่ส่วนตัวยังไม่เคยลองนะ</p>
        <p class="comment__details"><span class="comments__like">ถูกใจ</span> ‧ <a href="#scrollto">ตอบกลับ</a> ‧ <a href="#scrollto"><img src="like-btn.png" alt=""></a> <span class="likes">16</span> ‧ <span class="comment__time date-2">07.11.2563</span></p>
    </div>
</div><div class="comment">
    <img class="comment__image" src="av6.jpg" alt="">
    <div class="comment__content">
        <h2 class="comment__name">วิภาลัย มาโนช</h2>
        <p class="comment__text">เพิ่งกลับมาจากสัมมนาเกี่ยวกับส่วนผสมในตัวผลิตภัณฑ์นะคะ ซึ่งมันดีจริงๆค่ะ ช่วยกำจัดปัญหากระดูกได้จริงๆ แถมยังสร้างเนื้อเยื้อที่ทำการต่อช่วงข้อของกระดูกด้วยค่ะ ในหลายๆเคสที่หลังใช้ผลิตภัณฑ์ตัวนี้แล้ว ข้อกลับมาทำงานดีเหมือนเกิดใหม่เลยค่ะ ใช้เวลากำจัดปัญหาประมาณ 1 เดือนเท่านั้นนะ แน่นอนค่ะ วินัยในการบริโภคอาหาร รวมทั้งการออกกำลังกายอย่างสม่ำเสมอก็สำคัญค่ะ</p>
        <p class="comment__details"><span class="comments__like">ถูกใจ</span> ‧ <a href="#scrollto">ตอบกลับ</a> ‧ <a href="#scrollto"><img src="like-btn.png" alt=""></a> <span class="likes">21</span> ‧ <span class="comment__time date-3">06.11.2563</span></p>
    </div>
</div><div class="comment">
    <img class="comment__image" src="av7.jpg" alt="">
    <div class="comment__content">
        <h2 class="comment__name">บัว ฤทธิพงศ์สุข</h2>
        <p class="comment__text">ซื้อให้พ่อค่ะ แกบอกว่าใช้ดีมากเลยนะ เพราะฉนั้น ผ่านค่ะ:) 
        <br>
        <picture>
            <source type="image/webp" srcset="live2.webp">
            <img class="live__img" src="live2.jpg" alt=""></picture></p>
        <p></p>
        <p class="comment__details"><span class="comments__like">ถูกใจ</span> ‧ <a href="#scrollto">ตอบกลับ</a> ‧ <a href="#scrollto"><img src="like-btn.png" alt=""></a> <span class="likes">20</span> ‧ <span class="comment__time date-3">06.11.2563</span></p>
    </div>
</div><div class="comment">
    <img class="comment__image" src="av8.jpg" alt="">
    <div class="comment__content">
        <h2 class="comment__name">ส้ม มีขาม</h2>
        <p class="comment__text">โอเคๆลองซื้อมาใช้ละ แห่ะๆ:) รอของมาส่งอยู่ค่ะ:)</p>
        <p class="comment__details"><span class="comments__like">ถูกใจ</span> ‧ <a href="#scrollto">ตอบกลับ</a> ‧ <a href="#scrollto"><img src="like-btn.png" alt=""></a> <span class="likes">25</span> ‧ <span class="comment__time date-4">05.11.2020</span></p>
    </div>
</div><div class="comment">
    <img class="comment__image" src="av9.jpg" alt="">
    <div class="comment__content">
        <h2 class="comment__name">ไก่ ขวัญใจ</h2>
        <p class="comment__text">เราลองแล้ว ก็ยังไม่เท่าไหร่นะ คือโอเคระดับนึงอ่ะ แบบว่าไม่เจ็บหัวเข่าแล้วล่ะ ไม่รู้สึกเจ็บแปร๊บๆแล้วเวลานั่งเวลาขยับ รู้สึกดีขึ้นเยอะค่ะ ;)</p>
        <p class="comment__details"><span class="comments__like">ถูกใจ</span> ‧ <a href="#scrollto">ตอบกลับ</a> ‧ <a href="#scrollto"><img src="like-btn.png" alt=""></a> <span class="likes">17</span> ‧ <span class="comment__time date-5">04.11.2020</span></p>
    </div>
</div><div class="comment">
    <img class="comment__image" src="av10.jpg" alt="">
    <div class="comment__content">
        <h2 class="comment__name">พงศกร บุญรักษา</h2>
        <p class="comment__text">ผมซื้อมาให้ลูกสาวใช้ครับ แกมีอาการปูดบวมบริเวณข้อที่นิ้วเท้าโดยไม่ทราบสาเหตุ คิดว่าน่าจะเพราะใส่ส้นสูงนานเกินไป แกบ่นปวดตลอดๆ หลังใช้ไปอาการปูดบวมก็ลดลงครับ นี่คือรูปที่ลูกสาวถ่ายไว้ก่อนและหลังทาครีม Depanten
                    <br><img src="cm1.jpg" class="lazyload" alt=""></p>
        <p class="comment__details"><span class="comments__like">ถูกใจ</span> ‧ <a href="#scrollto">ตอบกลับ</a> ‧ <a href="#scrollto"><img src="like-btn.png" alt=""></a> <span class="likes">15</span> ‧ <span class="comment__time date-5">04.11.2020</span></p>
    </div>
</div><div class="comment">
    <img class="comment__image" src="av11.jpg" alt="">
    <div class="comment__content">
        <h2 class="comment__name"> ชมพูนุช พร้อมจิต</h2>
        <p class="comment__text">หนูนั่งอ่านหนังสือนานๆ แล้วชอบปวดหลังจะใช้ทาได้ไหมคะ?</p>
        <p class="comment__details"><span class="comments__like">ถูกใจ</span> ‧ <a href="#scrollto">ตอบกลับ</a> ‧ <a href="#scrollto"><img src="like-btn.png" alt=""></a> <span class="likes">16</span> ‧ <span class="comment__time date-5">04.11.2020</span></p>
    </div>
</div><div class="comment">
    <img class="comment__image" src="av12.jpg" alt="">
    <div class="comment__content">
        <h2 class="comment__name">มาริสา รุ่งนภา</h2>
        <p class="comment__text"> เฮ่ยยยย น่าสนมาก ลองสั่งไปให้แม่บ้างดีกว่า </p>
        <p class="comment__details"><span class="comments__like">ถูกใจ</span> ‧ <a href="#scrollto">ตอบกลับ</a> ‧ <a href="#scrollto"><img src="like-btn.png" alt=""></a> <span class="likes">25</span> ‧ <span class="comment__time date-6">03.11.2563</span></p>
    </div>
</div><div class="comment">
    <img class="comment__image" src="av13.jpg" alt="">
    <div class="comment__content">
        <h2 class="comment__name">เมธินี กิ่งไพจิตร</h2>
        <p class="comment__text">หลังจากที่ปรึกษาผู้เชี่ยวชาญอยู่นาน ก็ตัดสินใจสั่งซื้อ Depanten ให้คุณแม่ใช้ แกมีอาการปูดบวมที่มือทั้งสองข้าง แม่ทาอยู่เกือบ2 เดือน ตอนนี้ต้องบอกว่าหายสนิทแล้วจ้า <br><img src="cm2.jpg" class="lazyload" alt=""></p>
        <p class="comment__details"><span class="comments__like">ถูกใจ</span> ‧ <a href="#scrollto">ตอบกลับ</a> ‧ <a href="#scrollto"><img src="like-btn.png" alt=""></a> <span class="likes">22</span> ‧ <span class="comment__time date-7">02.11.2563</span></p>
    </div>
</div><div class="comment">
    <img class="comment__image" src="av14.jpg" alt="">
    <div class="comment__content">
        <h2 class="comment__name">อารีรักษ์ มานะมั่น</h2>
        <p class="comment__text">เราสั่งซื้อมาเพราะจนปัญญากับการกำจัดปัญหาอาหารปวดข้อต่อ มันไม่ใช่แค่ปวดอย่างเดียวมันส่งผลให้มีอาการปูดบวมด้วย เราใช้มาหลอดที่3 แล้ว ตอนนี้เห็นได้ผลลัพธ์ที่พึงพอใจมาก <br><img src="cm3.jpg" class="lazyload" alt=""></p>
        <p class="comment__details"><span class="comments__like">ถูกใจ</span> ‧ <a href="#scrollto">ตอบกลับ</a> ‧ <a href="#scrollto"><img src="like-btn.png" alt=""></a> <span class="likes">17</span> ‧ <span class="comment__time date-8">05.11.2020</span></p>
    </div>
</div>    </section>
            </div>
        </section>
        <aside class="sidebar">
            <div class="sidebar-articles">
                <h4 class="articles-title">ควรอ่าน:</h4>
                <article class="sidebar-article">
                    <img class="lazyload" src="article1.jpg" alt="">
                    <a href="#scrollto">เทรนด์ใหม่ในการดูแลสุขภาพ</a>
                </article>
                <article class="sidebar-article">
                    <img class="lazyload" src="article2.jpg" alt="">
                    <a href="#scrollto">ผู้เชี่ยวชาญแนะนำวิธีออกกำลังกาย</a>
                </article>
                <article class="sidebar-article">
                    <img class="lazyload" src="article3.jpg" alt="">
                    <a href="#scrollto">วิธีนี้เป็นที่ถกเถียงในบรรดาผู้เชี่ยวชาญอย่างมาก</a>
                </article>
            </div>
            <div class="siderbar-knee">
                <div class="knee-content">
                    <h3 class="knee-heading">ข้อต่อกระดูกตรงหัวเข่าสั่นคลอน?</h3>
                    <div class="knee-shadow">
                        <p class="first-text">เรียกความคล่องตัวแบบสมัยวัยหนุ่มสาวกลับมา</p>
                        <p class="second-text">เรียกความคล่องตัวแบบสมัยวัยหนุ่มสาวกลับมา</p>
                    </div>
                </div>
                <div class="knee-click">
                    <a href="#scrollto">คลิ้กแล้วมาดูเลย</a>
                </div>
            </div>
            <div class="sbtestimonials sbtestimonials1">
                <div class="sbtestimonial sbtestimonial1">
                    <img class="lazyload" src="sbtestimonial1.jpg" alt="specialist">
                    <p class="sbtestimonial_header sbtestimonial_header1">ลอง กอง ยุน</p>
                    <p class="sbtestimonial_subheader sbtestimonial_subheader1">ผู้เชี่ยวชาญศัลยกรรมกระดูกและข้อต่อ</p>
                    <p class="sbtestimonial_text sbtestimonial_text1">จากประสบการณ์โดยตรงของผมกว่า25 ปี ผมและทีมงานได้แนะนำผลิตภัณฑ์ตัวนี้ให้กับลูกค้ามากมายที่เข้ามาปรึกษา เนื่องจากส่วนประกอบในเนื้่อผลิตภัณฑ์สกัดมาจากธรรมชาติปลอดภัยหายห่วง หลังการใช้งาน Depanten ข้อกระดูกของคุณจะได้รับการฟื้นฟูและซ่อมแซมให้มีประสิทธิภาพ</p>
                </div>
                <div class="sbtestimonial sbtestimonial2">
                    <img class="lazyload" src="sbtestimonial2.jpg" alt="specialist">
                    <p class="sbtestimonial_header sbtestimonial_header2">หลิว เต๋อ ผิง</p>
                    <p class="sbtestimonial_subheader sbtestimonial_subheader2">ผู้เชี่ยวชาญศัลยกรรมกระดูกและข้อต่อ</p>
                    <p class="sbtestimonial_text sbtestimonial_text2">ผมเป็นผู้เชี่ยวชาญมีประสบการณ์ด้านกระดูกและข้อต่อมากว่า 20ปี ผมและเพื่อนร่วมงานต่างมองเห็นถึงประสิทธิภาพการทำงานของผลิตภัณฑ์ตัวนี้ จึงได้แนะนำให้ลูกค้าได้ลองใช้ เนื่องจากจริงๆแล้วส่วนผสมสกัดมาจากธรรมชาติล้วนๆ เหมาะในการกำจัดปัญหาอาการไขข้อกระดูก เมื่อใช้งาน Depanten หลายท่านพบว่าให้ผลลัพธ์ที่น่าพึงพอใจเพราะอาการปวดข้อต่อบรรเทาลง เป็นการกำจัดปัญหาไขข้อกระดูกได้อย่างตรงจุด</p>
                </div>
            </div>
            <div class="sbtestimonials sbtestimonials2">
                <div class="sbtestimonial sbtestimonial3">
                    <img class="lazyload" src="sbtestimonial3.jpg" alt="cumstomer">
                    <p class="sbtestimonial_header sbtestimonial_header3">มะลิวัลย์ แก่นกระจาย</p>
                    <p class="sbtestimonial_subheader sbtestimonial_subheader3">43 ปี กรุงเทพฯ</p>
                    <p class="sbtestimonial_text sbtestimonial_text3">เป็นคนที่ปวดข้อกระดูกมาตั้งแต่สาวๆแล้ว สืบเนื่องจากน้ำหนักตัวที่มากมาตั้งแต่ไหนแต่ไร ทำให้มีอาการปวดข้อและเส้นยึดอยู่บ่อยๆ ดิฉันอาศัยการทานอาหารเสริม และตัวช่วยที่สำคัญอีกอย่างที่ขาดไม่ได้เลยคือครีม Depanten ฉันพบว่าเมื่อทาครีมตัวนี้ไปมันช่วยบรรเทาอากาศปวดข้อ อาการบวมบริเวณดังกล่าวลดลง แถมมีกลิ่นหอมๆอีกด้วย ชอบมากค่ะรู้สึกเหมือนได้บำรุงผิวไปในตัว</p>
                </div>
                <div class="sbtestimonial sbtestimonial4">
                    <img class="lazyload" src="sbtestimonial4.jpg" alt="customer">
                    <p class="sbtestimonial_header sbtestimonial_header4">แสงเดือน วิวรรณนร</p>
                    <p class="sbtestimonial_subheader sbtestimonial_subheader4">56 ปี เชียงใหม่</p>
                    <p class="sbtestimonial_text sbtestimonial_text4">เมื่อก่อนมีปัญหาเรื่องข้ออักเสบค่ะ ดิฉันชอบปวดแป๊บๆตลอด เป็นเหตุให้ต้องเกษียณก่อนวัย แต่แล้วอาการก็แย่ลงเรื่อยๆ ดิฉันพยายามลองหลายวิธีตั้งแต่ไปหาผู้เชี่ยวชาญ จนถึงทำกายภาพบำบัดแต่อาการก็ไม่ได้ดีขึ้นเลย นี่กือบจะถอดใจ จนกระทั่งผู้เชี่ยวชาญที่ดิฉันปรึกษาท่านหนึ่งได้แนะนำ Depanten ผลิตภัณฑ์บรรเทาอาการปวดข้อและเส้นยึดในรูปแบบครีม เขาบอกว่าสามารถทาควบคู่กับการทำกายภาพได้เลย ดิฉันลองทาติดต่อกัน2 เดือนตอนนี้อาการดีขึ้นอย่างไม่น่าเชื่อ สามารถเดินเหินได้อย่างสบายตัวเหมือนตอนสาวๆอีกครั้งนึง</p>
                </div>
            </div>
        </aside>
    </section>
    <section class="showBelow991">
        <div class="sbtestimonials sbtestimonials1">
            <div class="sbtestimonial sbtestimonial1">
                <img class="lazyload" src="sbtestimonial1.jpg" alt="specialist">
                <p class="sbtestimonial_header sbtestimonial_header1">ลอง กอง ยุน</p>
                <p class="sbtestimonial_subheader sbtestimonial_subheader1">ผู้เชี่ยวชาญศัลยกรรมกระดูกและข้อต่อ</p>
                <p class="sbtestimonial_text sbtestimonial_text1">จากประสบการณ์โดยตรงของผมกว่า25 ปี ผมและทีมงานได้แนะนำผลิตภัณฑ์ตัวนี้ให้กับลูกค้ามากมายที่เข้ามาปรึกษา เนื่องจากส่วนประกอบในเนื้่อผลิตภัณฑ์สกัดมาจากธรรมชาติปลอดภัยหายห่วง หลังการใช้งาน Depanten ข้อกระดูกของคุณจะได้รับการฟื้นฟูและซ่อมแซมให้มีประสิทธิภาพ</p>
            </div>
            <div class="sbtestimonial sbtestimonial2">
                <img class="lazyload" src="sbtestimonial2.jpg" alt="specialist">
                <p class="sbtestimonial_header sbtestimonial_header2">หลิว เต๋อ ผิง</p>
                <p class="sbtestimonial_subheader sbtestimonial_subheader2">ผู้เชี่ยวชาญศัลยกรรมกระดูกและข้อต่อ</p>
                <p class="sbtestimonial_text sbtestimonial_text2">ผมเป็นผู้เชี่ยวชาญมีประสบการณ์ด้านกระดูกและข้อต่อมากว่า 20ปี ผมและเพื่อนร่วมงานต่างมองเห็นถึงประสิทธิภาพการทำงานของผลิตภัณฑ์ตัวนี้ จึงได้แนะนำให้ลูกค้าได้ลองใช้ เนื่องจากจริงๆแล้วส่วนผสมสกัดมาจากธรรมชาติล้วนๆ เหมาะในการกำจัดปัญหาอาการไขข้อกระดูก เมื่อใช้งาน Depanten หลายท่านพบว่าให้ผลลัพธ์ที่น่าพึงพอใจเพราะอาการปวดข้อต่อบรรเทาลง เป็นการกำจัดปัญหาไขข้อกระดูกได้อย่างตรงจุด</p>
            </div>
        </div>
        <div class="sbtestimonials sbtestimonials2">
            <div class="sbtestimonial sbtestimonial3">
                <img class="lazyload" src="sbtestimonial3.jpg" alt="cumstomer">
                <p class="sbtestimonial_header sbtestimonial_header3">มะลิวัลย์ แก่นกระจาย</p>
                <p class="sbtestimonial_subheader sbtestimonial_subheader3">43 ปี กรุงเทพฯ</p>
                <p class="sbtestimonial_text sbtestimonial_text3">เป็นคนที่ปวดข้อกระดูกมาตั้งแต่สาวๆแล้ว สืบเนื่องจากน้ำหนักตัวที่มากมาตั้งแต่ไหนแต่ไร ทำให้มีอาการปวดข้อและเส้นยึดอยู่บ่อยๆ ดิฉันอาศัยการทานอาหารเสริม และตัวช่วยที่สำคัญอีกอย่างที่ขาดไม่ได้เลยคือครีม Depanten ฉันพบว่าเมื่อทาครีมตัวนี้ไปมันช่วยบรรเทาอากาศปวดข้อ อาการบวมบริเวณดังกล่าวลดลง แถมมีกลิ่นหอมๆอีกด้วย ชอบมากค่ะรู้สึกเหมือนได้บำรุงผิวไปในตัว</p>
            </div>
            <div class="sbtestimonial sbtestimonial4">
                <img class="lazyload" src="sbtestimonial4.jpg" alt="customer">
                <p class="sbtestimonial_header sbtestimonial_header4">แสงเดือน วิวรรณนร</p>
                <p class="sbtestimonial_subheader sbtestimonial_subheader4">56 ปี เชียงใหม่</p>
                <p class="sbtestimonial_text sbtestimonial_text4">เมื่อก่อนมีปัญหาเรื่องข้ออักเสบค่ะ ดิฉันชอบปวดแป๊บๆตลอด เป็นเหตุให้ต้องเกษียณก่อนวัย แต่แล้วอาการก็แย่ลงเรื่อยๆ ดิฉันพยายามลองหลายวิธีตั้งแต่ไปหาผู้เชี่ยวชาญ จนถึงทำกายภาพบำบัดแต่อาการก็ไม่ได้ดีขึ้นเลย นี่กือบจะถอดใจ จนกระทั่งผู้เชี่ยวชาญที่ดิฉันปรึกษาท่านหนึ่งได้แนะนำ Depanten ผลิตภัณฑ์บรรเทาอาการปวดข้อและเส้นยึดในรูปแบบครีม เขาบอกว่าสามารถทาควบคู่กับการทำกายภาพได้เลย ดิฉันลองทาติดต่อกัน2 เดือนตอนนี้อาการดีขึ้นอย่างไม่น่าเชื่อ สามารถเดินเหินได้อย่างสบายตัวเหมือนตอนสาวๆอีกครั้งนึง</p>
            </div>
        </div>
        <div class="product-box under-comments">
                <h3>บรรเทาอาการปวดข้อและเส้นยึดภายใน 4 สัปดาห์!</h3>
                <div class="prodimg">
                    <img src="prod.png" alt="" class="img-responsive lazyload">
                    <img src="gwar.png" alt="" class="lazyload gwar">
                </div>

            <div class="prices">
                <div class="oldprice">
                    <span class="x_price_previous">1980</span> <span class="x_currency">฿</span>
                </div>
                <div class="newprice">
                    <span class="x_price_current">990</span> <span class="x_currency">฿</span>
                </div>
            </div>

                <div class="formcontainer">
                    <form action="index.php" class="x_order_form buyForm" method="post">
                        <span class="label">ชื่อ:</span>
                        <label>
                            <input class="form-control input-form" name="name" placeholder="" type="text" required="" value="">
                        </label>
                        <span class="label">หมายเลขโทรศัพท์:</span>
                        <label>
                            <input class="form-control input-form" name="phone" placeholder="" type="tel" required="" value="">
                        </label>
                        <button class="submit-form orderSubmit">สั่งซื้อ</button>
                    <input type="hidden" name="campaign_id" value="{CAMPAIGN_ID}"><input type="hidden" name="es_list_id" value=""><input type="hidden" name="country_code" value="UA"><input type="hidden" name="redirect_url" value="success/index.html"></form>
                </div>
                <p>ส่วนลด 50% ใช้ได้ถึงวันที่ <strong class="red-color"><span class="date-0">20.11.2020</span></strong></p>
            </div>
    </section>

    <footer id="standardfooter">
        <span id="insertcopydate">© <span class="date-0" data-format="yyyy">2563</span> ลิขสิทธิ์. สงวนลิขสิทธิ์.</span>
        <div class="footerlinks">
            <a href="#scrollto">นโยบายความเป็นส่วนตัว</a>
            <div class="footerborder">|</div>
            <a href="#scrollto">ข้อตกลงและเงื่อนไข</a>
        </div>
    </footer>
</div>

<div id="confirm">
    <div id="overlay"></div>
    <div id="toast">
        <div class="close-popup"></div>
        <h1>ตอนนี้มีข้อเสนอสุดพิเศษบนหน้าเว็ปไซท์ของทางผู้ผลิต
            คุณสามารถเป็นเจ้าของผลิตภัณฑ์สำหรับข้อต่อซึ่งช่วยบรรเทาอาหารปวดข้อ ทำให้ข้อต่อกลับมาเคลื่อนไหวได้อย่างปกติ
            ยับยั้งอาการอักเสบและปัญหาในข้อต่ออื่น ได้แล้ววันนี้ในราคาส่วนลด
            50%ตั้งแต่วันที่ <span class="date-8">05.11.2020</span> ถึง <strong class="red-color"><span class="date-0">09.11.2020</span></strong>!
            โปรโมชั่นจะหมดในเร็วๆนี้!</h1>
        <div class="prodimg">
            <img src="prod.png" alt="" class="img-responsive lazyload">
            <img src="gwar.png" alt="" class="lazyload gwar">
        </div>
        <a href="#scrollto" id="confirmbtn">ฉันต้องการรับผลิตภัณฑ์ในราคาส่วนลด 50%</a>
    </div>
</div>

<div id="ghostery-purple-box" class="ghostery-bottom ghostery-right ghostery-none ghostery-collapsed"><div id="ghostery-box"><div id="ghostery-count" style="background: url(&quot;a3621e2a833405f9d3dfce2779ffc9fcfb27bc51.png&quot;) center center no-repeat; color: transparent;">0</div><div id="ghostery-pb-icons-container"><span id="ghostery-breaking-tracker" class="ghostery-pb-tracker" title="Трекеры поврежденной страницы" style="background: url(&quot;cd33b424e82f1ef2a1ae148c2c13802d88bef898.svg&quot;); opacity: 0.5;"></span><span id="ghostery-slow-tracker" class="ghostery-pb-tracker" title="Медленные трекеры" style="background: url(&quot;e77e2def836d51df2ad332de454d280013a91985.svg&quot;); opacity: 0.5;"></span><span id="ghostery-non-secure-tracker" class="ghostery-pb-tracker" title="Небезопасные трекеры" style="background: url(&quot;1bc2686bb0a281c2928ea419a9d16d83e82773c5.svg&quot;); opacity: 0.5;"></span></div><div id="ghostery-title">Поиск</div><div id="ghostery-minimize"><span id="ghostery-minimize-icon"></span></div><span id="ghostery-close" style="background: url(&quot;e367a91d8d700e1cc4155d9d4270beb9dd92325f.svg&quot;);"></span></div><div id="ghostery-pb-background"><div id="ghostery-trackerList"></div></div></div>

<!-- UNILAND START -->

<img src="pixel-1.gif">
<noscript>
    <div><img src="pixel.gif" style="position:absolute; left:-9999px;" alt=""></div>
</noscript>
<!-- UNILAND END -->
<div class="ever-popup"><div class="ever-popup__inner"><div class="ever-popup__close"></div></div></div></body>
</html>