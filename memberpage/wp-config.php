<?php

/**

 * WordPress の基本設定

 *

 * このファイルは、MySQL、テーブル接頭辞、秘密鍵、ABSPATH の設定を含みます。

 * より詳しい情報は {@link http://wpdocs.sourceforge.jp/wp-config.php_%E3%81%AE%E7%B7%A8%E9%9B%86 

 * wp-config.php の編集} を参照してください。MySQL の設定情報はホスティング先より入手できます。

 *

 * このファイルはインストール時に wp-config.php 作成ウィザードが利用します。

 * ウィザードを介さず、このファイルを "wp-config.php" という名前でコピーして直接編集し値を

 * 入力してもかまいません。

 *

 * @package WordPress

 */



// 注意: 

// Windows の "メモ帳" でこのファイルを編集しないでください !

// 問題なく使えるテキストエディタ

// (http://wpdocs.sourceforge.jp/Codex:%E8%AB%87%E8%A9%B1%E5%AE%A4 参照)

// を使用し、必ず UTF-8 の BOM なし (UTF-8N) で保存してください。



// ** MySQL 設定 - この情報はホスティング先から入手してください。 ** //

/** WordPress のためのデータベース名 */

define('DB_NAME', '');


/** MySQL データベースのユーザー名 */

define('DB_USER', '');


/** MySQL データベースのパスワード */

define('DB_PASSWORD', '');


/** MySQL のホスト名 */

define('DB_HOST', 'localhost');


/** データベースのテーブルを作成する際のデータベースの文字セット */

define('DB_CHARSET', 'utf8mb4');


/** データベースの照合順序 (ほとんどの場合変更する必要はありません) */

define('DB_COLLATE', '');



/**#@+

 * 認証用ユニークキー

 *

 * それぞれを異なるユニーク (一意) な文字列に変更してください。

 * {@link https://api.wordpress.org/secret-key/1.1/salt/ WordPress.org の秘密鍵サービス} で自動生成することもできます。

 * 後でいつでも変更して、既存のすべての cookie を無効にできます。これにより、すべてのユーザーを強制的に再ログインさせることになります。

 *

 * @since 2.6.0

 */

define('AUTH_KEY',         '.tuh4|]]QO[#A]RX7>*LuHgw8Ue|;vs-tkk}%Ku -m7w*t?@ !__mg!`A/Pk1`w]');
define('SECURE_AUTH_KEY',  ' /24i@./K$3K# ;X|(|u:nbe:q5t3n:-Qqyn{Wkg*AWnRjo&cKgGhEOV)hqt;k%?');
define('LOGGED_IN_KEY',    'YH)^LIjXpqwEH^?s|7{SxT J^l3,_+:2^@GBq(@:=$Z>S72c({cY/y8>k2kMC J3');
define('NONCE_KEY',        'i[n{S+5=]F+*xagxH<PRgisQt8+87*CAA>ke{f_Dni)Lj[8^S+#-5^/]WMqidP@O');
define('AUTH_SALT',        'a[oi@@g/TPS{m*xO/!.u_i3Y2i=HkIO-n1Z*+&gg9j:Mp?3@lfU>dQe?U4g._%9~');
define('SECURE_AUTH_SALT', 'rcUz+l[H^:$|Y[?`zpDjIJkr^cjDS]7AN+l70@17)-NuPeE.|UJV$Zk5pm|[p?M@');
define('LOGGED_IN_SALT',   '2>r^Mli;MttbQ=j7_ Q-AHq|--0-=+y,a}hX[Z-kI[~$1*[Vj,KP&/#T+T*A^`,6');
define('NONCE_SALT',       '!b4I%*aHlvS!^dnNyU?px<}M&,vT,BYeK3!wipvZZPO}qNM3:a/nw.):~/y.@EG$');


/**#@-*/



/**

 * WordPress データベーステーブルの接頭辞

 *

 * それぞれにユニーク (一意) な接頭辞を与えることで一つのデータベースに複数の WordPress を

 * インストールすることができます。半角英数字と下線のみを使用してください。

 */

$table_prefix  = 'wp_';


/**

 * 開発者へ: WordPress デバッグモード

 *

 * この値を true にすると、開発中に注意 (notice) を表示します。

 * テーマおよびプラグインの開発者には、その開発環境においてこの WP_DEBUG を使用することを強く推奨します。

 */

define('WP_DEBUG', false);



/* 編集が必要なのはここまでです ! WordPress でブログをお楽しみください。 */



/** Absolute path to the WordPress directory. */

if ( !defined('ABSPATH') )

	define('ABSPATH', dirname(__FILE__) . '/');



/** Sets up WordPress vars and included files. */

require_once(ABSPATH . 'wp-settings.php');
