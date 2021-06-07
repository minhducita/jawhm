/**
 * 
 */
function createXmlHttpRequest() {
    var xmlhttp = false;
    if( window.XMLHttpRequest) {
        xmlhttp = new XMLHttpRequest();
    } else if(window.ActiveXObject) {
        try {
            xmlhttp = new ActiveXObject("Msxml2.XMLHTTP");
        } catch(e) {
            xmlhttp = new ActiveXObject("Microsoft.XMLHTTP");
        }
    }
    return xmlhttp;
}

var xmlhttp = 0;
var sg = null;

function initSuggest(suggest_obj) {
    sg = suggest_obj;

    //区切り文字を変更
    sg.delim = '、';

    //検索ロジックを上書きして、何もしないように変更
    sg._search = function (text) { return 0; };

    //検索時のフック関数を指定
    sg.hookBeforeSearch = getList;
}

//HTTP通信
function stateChange() {
    if (xmlhttp.readyState == 4 && xmlhttp.status == 200) {
        var rst = xmlhttp.responseText;

        //受け取ったデータを配列に変換し、格納
        sg.candidateList = ｅval(rst);

        //データ件数取得
        var list_count = sg.candidateList.length;

        //候補リストインデックスを一旦削除
        sg.suggestIndexList = [];

        //検索結果が取得できている場合
        if (list_count != 0) {
            //インデックスを作成する
            for (var i = 0; i < list_count; i++){
                sg.suggestIndexList.push(i);
            }

            //リストの表示
            sg.createSuggestArea(sg.candidateList);
        }
    }
}

function getList (text) {
    if (sg == null){
        return [];
    }

    sg.candidateList = [];
    if (! xmlhttp) xmlhttp = createXmlHttpRequest();

    if (! xmlhttp || xmlhttp.readyState == 1 || 
        xmlhttp.readyState == 2 || xmlhttp.readyState == 3){
        return [];

    }

    var query = encodeURI(text);

    //webサーバへ問い合わせ
    xmlhttp.open("GET", "suggestion" + query, true);
    xmlhttp.onreadystatechange = stateChange;
    xmlhttp.send(null);
}