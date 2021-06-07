{if $ispdf != 2 || ($ispdf == 2 && $issmp == 1)}
<!DOCTYPE HTML>
<html lang="ja">
<head>
<base href="{$base}/mypage/">
<meta name="viewport" content="width=device-width, initial-scale=0.3, minimum-scale=0.1, maximum-scale=1, user-scalable=yes">
<meta http-equiv="Content-Type" content="text/html" charset="utf-8">
<link rel="stylesheet" type="text/css" href="themes/css/mypage-user.css"
        media="all" />
<link rel="stylesheet" type="text/css" href="themes/css/common.css"
        media="all" />
<link rel="icon" href="themes/images/favicon.ico" type="image/x-icon" />
<link rel="stylesheet" href="themes/css/jquery.signaturepad.css">
<title>{$title}</title>
</head>

<body>
    {if $ispdf == 2 && $issmp == 1}
        <img src="{$jpg}" alt="同意書" class="image-view">
        <br />
        <div class="iphone-notice">
            スマートフォンをお使いで上記書類を保存する方は、<br /> iPhoneの場合は、画像をロングタップ(一定時間タッチし続ける)
            すると表示される<br /> 「画像を保存」をタップするとカメラロールに保存されます。<br />
            Androidの場合は、画像をロングタップするとメニューが表示されるので<br /> 「画像を保存」を選択するとギャラリーの中の<br />
            Downloadというアルバムの中に画像が保存されます。
        </div>

    {else}
        <div id="window-container">
            {if $ispdf == 0}
                <span class="span-center text-red">同意書にご署名される時点で<a href="application/getfile?file_no=6" target="_blank">約款</a>をご確認・同意されているものとします。</span><br />
            {/if}
            <h2 class="text-center">
                <span class="text-bold text-under span-center">留学プログラム申し込みの重要事項確認及び同意書</span><br />
            </h2>
            <table border="1" class="agreement table-center">
                <thead class="agreement">
                    <tr class="agreement">
                        <th class="agreement" style="width: 40px;">確認</th>
                        <th class="agreement">重要事項</th>
                    </tr>
                </thead>
                <tbody class="agreement" id="container">
                    <tr class="agreement">
                        <td class="agreement text-center">
                            <input type="checkbox" name="check1" value="サンプル"{if $agreement == 1} checked="checked"{/if}>
                        </td>
                        <td class="agreement">当協会はお客様の希望する留学先及びその内容を考慮の上、お客様が希望する留学先・滞在先の手続き代行を行いますが、お客様が希望する資格の取得、試験の合格、その後の留学先への合格など、留学プログラム期間中及び終了後のお客様に対し、何ら保証を行うものではありません。（基本約款：第４条）</td>
                    </tr>
                    <tr class="agreement" id="container">
                        <td class="agreement text-center"><input type="checkbox" name="check2" value="サンプル" {if $agreement==1}checked="checked"{/if}></td>
                            <td class="agreement">当協会からお客様に提供される情報は、提供時点でのものであり、その後、予告なく変更される可能性もあります。その変更に気付かず行ったお客様のいかなる行動も当協会では責任を負いかねます。（基本約款：第４条（１０））</td>
                    </tr>
                    <tr class="agreement" id="container">
                        <td class="agreement text-center"><input type="checkbox" name="check3" value="サンプル"{if $agreement== 1} checked="checked"{/if}></td>
                        <td class="agreement">当協会が留学プログラムの実施に障害があると判断した場合、当協会はお客様の申し込みを拒否又は解約することがあります。（お客様の虚偽申告・既往症、官公庁・公的機関からの命令・勧告など）（基本約款：第３条及び第４条（４））</td>
                    </tr>
                    <tr class="agreement" id="container">
                        <td class="agreement text-center"><input type="checkbox" name="check4" value="サンプル"{if $agreement== 1} checked="checked"{/if}></td>
                        <td class="agreement">申込済み留学プログラムの変更及び解約の際は、手数料等が発生します。（基本約款：第８条、第９条、第１０条）</td>
                    </tr>
                    <tr class="agreement" id="container">
                        <td class="agreement text-center"><input type="checkbox" name="check5" value="サンプル"{if $agreement == 1} checked="checked"{/if}></td>
                        <td class="agreement">留学先学校の判断により、コース未開講又は、その内容・条件が変更される場合があります。その場合、他キャンパス、他コースへの振替や返金の対応を致します。（基本約款：第１３条（１）（２））</td>
                    </tr>
                    <tr class="agreement" id="container">
                        <td class="agreement text-center"><input type="checkbox" name="check6" value="サンプル"{if $agreement == 1} checked="checked"{/if}></td>
                        <td class="agreement">現地サポートは、国や都市によって内容や条件が異なり、別途費用が発生する場合があります。（基本約款：第４条（３）</td>
                    </tr>
                    <tr class="agreement" id="container">
                        <td class="agreement text-center"><input type="checkbox" name="check7" value="サンプル"{if $agreement == 1} checked="checked"{/if}></td>
                        <td class="agreement">渡航中に発生した問題は、当協会及び各受入機関は、相談及びその問題解決に可能な限りサポートしますが、まずは、お客様との直接関係による解決を試みてください。特にホームステイ先での家庭内のトラブルが多くあります。ホームステイの心得を出発前に確認してください。（基本約款：第４条（５）（９）</td>
                    </tr>
                    <tr class="agreement" id="container">
                        <td class="agreement text-center"><input type="checkbox" name="check8" value="サンプル"{if $agreement == 1} checked="checked"{/if}></td>
                        <td class="agreement">ホームステイや寮等の滞在先を手配する場合、滞在先の場所や設備などの希望をお伺いしますが、あくまでも希望であり、その希望に添えない場合があります。（基本約款：第４条（８））</td>
                    </tr>
                    <tr class="agreement" id="container">
                        <td class="agreement text-center"><input type="checkbox" name="check9" value="サンプル"{if $agreement == 1} checked="checked"{/if}></td>
                        <td class="agreement">当協会から旅行会社、保険会社、クレジットカード会社等を紹介する場合がありますが、必ずの利用をお願いするものではありません。また、当協会が代理店業務を行う場合であっても留学プログラムの契約とは別契約であり、留学プログラムの変更・解約を行った場合でも、それらの契約内容に変更はありません。（基本約款：第１３条)</td>
                    </tr>
                </tbody>
            </table>
            <br /> <br />
            {if $ispdf == 0 && $issmp == 0}
                <div class="agreement-centerize pdf-font-smaller">
            {elseif $ispdf == 0 && $issmp == 1}
                <div class="agreement-smp">
            {elseif $ispdf == 1}
                <div class="agreement-pdf">
            {/if}
            <h2 class="text-center">同意書</h2>
            <p class="agreement">一般社団法人 日本ワーキングホリデー協会 殿<br /></p>
            <p class="agreement">
                私は、留学プログラム基本約款を受領し、<br />
                上記重要事項と共に内容に関して担当者による説明を受けこれらを十分に理解した上で、<br />
                留学プログラムの申し込みを行います。
            </p>
            <br />
            {if $agreement == 0}
                <p>記入日 {$smarty.now|date_format:"%G年%m月%d日"}</p>
                <form id="agree" class="sigPad agreement-indent">
                    <p class="drawItDesc">手書きでのご署名をお願いします。</p>
                    <ul class="sigNav">
                        <li class="drawIt"><a href="#draw-it">手書き入力</a></li>
                        <li class="clearButton"><a href="#clear">クリア</a></li>
                    </ul>
                    <div class="sig sigWrapper">
                        <div class="typed"></div>
                        <canvas class="pad" width="350" height="90"></canvas>
                        <input type="hidden" name="output" class="output"> <input type="hidden" name="token" value="{$token}"> <input type="hidden" name="action_tag" value="agreement">
                    </div>
                    <input type="hidden" id="type" value="new">
                    <button type="button" id="agree-submit" class="agreement-button">メンバー規約に同意します。</button>
                </form>
                {if $ispdf == 0 || $ispdf == 1}
                    </div>
                {/if}
                <!--[if lt IE 9]><script src="themes/js/flashcanvas.js"></script><![endif]-->
                <script type="text/javascript" src="themes/js/jquery-1.11.1.min.js"></script>
                <script src="themes/js/jquery.signaturepad.min.js"></script>
                <script src="themes/js/json2.min.js"></script>
                <script src="themes/js/append.js"></script>
                <script type="text/javascript" src="themes/js/common.js"></script>
                <script type="text/javascript" src="themes/js/mypage-user.js"></script>
            {else}
                記入日 {$agreement_date|date_format:"%G年%m月%d日"}<br /> <img src="{$signature}" alt="署名" class="bottom-up" />
            {/if}
            </div>
        </div>
    {/if}
</body>
</html>
{/if}
