<?php
/**
 *  Defines Mypages Const class.
 */

final class MypageConst {
    public static $SQL_SERVER = array (
        'URL' => 'https://toratoracrm.com:47624/crm/mypage/sqlserver/agent.php',
        'PASSWORD' => '303pittst'
    );

    public static $CRM_MYSQL = array (
        'URL' => 'https://toratoracrm.com:47624/crm/mypage/mail/mailagent.php',
        'PASSWORD' => '303pittst',
        'CIPHER' => 'G7yPl1sC'
    );

    public static $LIST_MYSQL = array (
            'URL' => 'https://toratoracrm.com:47624/crm/mypage/staff/mailagent.php',
            'PASSWORD' => '303pittst',
            'CIPHER' => 'G7yPl1sC'
    );

    public static $MYPAGE_SCREEN_ID = array (
            'ログイン' => 1,
            'ログイン成功' => 2,
            'ログイン失敗' => 3,
            'トップメニュー' => 4,
            'サイドメニュー' => 5,
            'パンくずリスト' => 6,
            'ダッシュボード' => 7,
            'お客様情報検索' => 8,
            'お客様情報検索結果' => 9,
            'お客様情報詳細' => 10,
            'お客様関連ファイル' => 11,
            'セミナー情報検索' => 12,
            'セミナー情報検索結果' => 13,
            'セミナー情報詳細' => 14,
            'つながり履歴一覧' => 15,
            'ログインできない方' => 16,
            'パスワード忘れ' => 17,
            'ログインID忘れ' => 18,
            'その他' => 19,
            'つながり入力' => 20,
            'つながり入力完了' => 21,
            'つながり返信' => 22,
            'つながり返信完了' => 23,
            'つながり削除確認' => 24,
            'つながり削除完了' => 25,
            'パスワード変更' => 26,
            'パスワード変更完了' => 27,
            'パスワード更新失敗' => 28,
            'お客様メモ入力' => 29,
            'お客様メモ入力完了' => 30,
            'お客様メモ削除確認' => 31,
            'お客様メモ削除完了' => 32,
            '保険契約VISA情報選択' => 33,
            'ファイルアップロード' => 34,
            'アップロード成功' => 35,
            '参加者メモ入力' => 36,
            '参加者メモ入力完了' => 37,
            '参加者メモ削除確認' => 38,
            '参加者メモ削除完了' => 39,
            'ログアウト' => 40,
            'パスワードリセット完了' => 41,
            '連絡先閲覧' => 42,
            'パスワードリセット失敗' => 43,
            'セミナー日程提案' => 44,
            'セミナー日程登録' => 45,
            'セミナー日程送信' => 46,
            'JavaScript' => 99
    );

    public static $OFFICE_ADDRESS = array(
            'tokyo' => '東京都新宿区西新宿1-3-3 品川ステーションビル新宿5階　507',
            'osaka' => '大阪市北区梅田1-11-4-500　大阪駅前第4ビル5階 19-1号室',
            'nagoya' => '名古屋市中村区名駅2-45-19　桑山ビル８階Ａ号室',
            'fukuoka' => '福岡市中央区渡辺通4-6-20　星野ビル6階1号室',
            'okinawa' => '沖縄県浦添市宮城2-39-5花水木ビル1F '
    );

    public static $OFFICE_ACCESS = array(
            'tokyo' => 'http://www.jawhm.or.jp/event/map/mob.php?p=tokyo',
            'osaka' => 'http://www.jawhm.or.jp/event/map/mob.php?p=osaka',
            'nagoya' => 'http://www.jawhm.or.jp/event/map/mob.php?p=nagoya',
            'fukuoka' => 'http://www.jawhm.or.jp/event/map/mob.php?p=fukuoka',
            'okinawa' => 'http://www.jawhm.or.jp/event/map/mob.php?p=okinawa'
    );

    public static $STEP_CHART = array(
            'join_seminar',
            'counseling',
            'register_visa',
            'reserve_flight',
            'join_step1',
            'join_step2',
            'go_abroad',
            'seminar_beginner',
            'seminar_planning',
            'seminar_info',
            'seminar_discussion',
            'seminar_school',
            'decide_country',
            'decide_period',
            'decide_school',
            'decide_accomodation',
            'register_school',
    );

    public static $CLIENT_STATUS = array (
            'article' => '約款',
            'agreement' => '同意書',
            'deposit_finish' => '支払日',
            'deposit' => '見積',
            'bill' => '請求書',
            'receipt' => '受領書',
            'passport' => 'パスポート',
            'application' => '願書',
            'homestay' => 'ホームステイ',
            'flight' => 'フライト情報',
            'insurance' => '保険契約情報',
            'visa' => 'ビザ情報',
            'loa' => '入学許可書'
    );
}