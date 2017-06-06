//削除処理確認メッセージ
function deleteList(id)
{
    var msg = confirm('削除してよろしいですか？');
    if(msg == true){
        location.href = 'http://localhost/baseball/public/admin/delete/' + id; //変更の必要あり
    }
}

//CSV出力
function getCSV(obj)
{
    
    var id = obj.id;
    if(id == 'search'){
        document.getElementById("output_form").action = '/baseball/public/admin/list';
    }else{
        document.getElementById("output_form").action = '/baseball/public/admin/outputcsv';
    }
    
    document.getElementById("output_form").submit();
}