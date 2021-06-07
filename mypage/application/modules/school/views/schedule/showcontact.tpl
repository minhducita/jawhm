{if $issmp == 1}
    <html lang="ja">
    <head>
      <base href="{$base}">
      <meta http-equiv="Content-Type" content="text/html" charset="utf-8">
      <link rel="stylesheet" type="text/css" href="{$base}/mypage/themes/css/user.css" media="all" />
      <link rel="stylesheet" type="text/css" href="{$base}/mypage/themes/css/common.css" media="all" />
      <link rel="icon" href="{$base}/mypage/themes/images/favicon.ico" type="image/x-icon" />
      <title>{$title}</title>
    </head>

    <body>
    <img src="{$jpg}" alt="file" class="image-view"><br />
    <div class="iphone-notice">
        {$msg[0].message}<br />
        {$msg[1].message}<br />
        {$msg[2].message}<br />
        {$msg[3].message}<br />
        {$msg[4].message}<br />
        {$msg[5].message}
    </div>
    </body>
    </html>
{/if}