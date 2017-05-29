//削除処理確認メッセージ
function deleteList(id)
{
    var msg = confirm('削除してよろしいですか？');
    if(msg == true){
        location.href = 'http://localhost/baseball/public/admin/delete/' + id; //変更の必要あり
    }
}

//CSV出力
function getCSV()
{
    var formUrl = '/baseball/public/admin/csv'
    document.getElementById("output_form").action = formUrl;
    document.getElementById("output_form").submit();  
}