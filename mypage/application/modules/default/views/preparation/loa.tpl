{if $issmp == 1}
    <html lang="ja">
    <head>
      <base href="{$base}">
      <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
      <link rel="stylesheet" type="text/css" href="{$base}/mypage/themes/css/mypage-user.css" media="all" />
      <link rel="stylesheet" type="text/css" href="{$base}/mypage/themes/css/common.css" media="all" />
      <link rel="icon" href="themes/images/favicon.ico" type="image/x-icon" />
      <title>{$title}</title>
    </head>

    <body>
    {foreach item=img from=$jpg}
        <img src="{$img}" alt="file" class="image-view"><br />
    {/foreach}
    <div class="iphone-notice">
        スマートフォンをお使いで上記書類を保存する方は、<br />
        iPhoneの場合は、画像をロングタップ(一定時間タッチし続ける) すると表示される<br />
        「画像を保存」をタップするとカメラロールに保存されます。<br />
        Androidの場合は、画像をロングタップするとメニューが表示されるので<br />
        「画像を保存」を選択するとギャラリーの中の<br />
        Downloadというアルバムの中に画像が保存されます。
    </div>
    </body>
    </html>
{/if}