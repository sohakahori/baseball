@extends('layouts.app')
@section('content')

@if(!empty(session('msg')))
<center>
    <div style="color:red; margin-bottom:50px">
       {{session('msg')}}
    </div>
</center>
@endif

<form class='form-horizontal' method="GET" action="{{url('/admin/list')}}" enctype="multipart/form-data">
    <input type="hidden" name="_token" value="{{csrf_token()}}">
    
    <!--エラーメッセージ-->
    @if($errors->any())
    <center>
        <div class=""alert alert-dange>
            <div>
                @foreach($errors->all() as $value)
                    <div class="text-danger">{{$value}}</div>
                @endforeach
            </div>
        </div>
    </center>
    <br>
    <br>
    @endif
    

    <!--登録選手名-->
    @if($listFlg == 0) <!--検索処理未実行時の検索フォーム-->
    <div class="form-group">
        <label class="control-label col-sm-2">登録選手名</label>
        <div class="col-sm-10">
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name') }}">
        </div>
    </div>
    <!--背番号-->
    <div class="form-group">
        <label class="control-label col-sm-2">背番号</label>
        <div class="col-sm-10">
            <input type="text" name="number" id="number" class="form-control" value="{{ old('number') }}">
        </div>
    </div>
    <!--所属チーム-->
    <div class="form-group">
        <label class="control-label col-sm-2">所属チーム（必須）</label>
        <div class="col-sm-10">
            <select name="club" id="club" class="form-control">
                <option value="">所属チームの選択</option>
                <option value="1" @if(old('club') == '1') selected @endif>日本ハムファイターズ</option>
                <option value="2" @if(old('club') == '2') selected @endif>東北楽天ゴールデンイーグルス</option>
                <option value="3" @if(old('club') == '3') selected @endif>千葉ロッテマーリンズ</option>
                <option value="4" @if(old('club') == '4') selected @endif>埼玉西武来ライオンズ</option>
                <option value="5" @if(old('club') == '5') selected @endif>オリックスバッファローズ</option>
                <option value="6" @if(old('club') == '6') selected @endif>福岡ソフトバンクホークス</option>
                <option value="7" @if(old('club') == '7') selected @endif>東京読売ジャイアンツ</option>
                <option value="8" @if(old('club') == '8') selected @endif>東京ヤクルトスワローズ</option>
                <option value="9" @if(old('club') == '9') selected @endif>横浜DeNAベイスターズ</option>
                <option value="10" @if(old('club') == '10') selected @endif>中日ドラゴンズ</option>
                <option value="11" @if(old('club') == '11') selected @endif>阪神タイガース</option>
                <option value="12" @if(old('club') == '12') selected @endif>中日ドラゴンズ</option>
            </select>
        </div>
    </div>
    
    @elseif($listFlg == 1)<!--検索処理実行時の検索フォーム-->
    <div class="form-group">
        <label class="control-label col-sm-2">登録選手名</label>
        <div class="col-sm-10">
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $inpVal['name']) }}">
        </div>
    </div>
    <!--背番号-->
    <div class="form-group">
        <label class="control-label col-sm-2">背番号</label>
        <div class="col-sm-10">
            <input type="text" name="number" id="number" class="form-control" value="{{ old('number', $inpVal['number']) }}">
        </div>
    </div>
    <!--所属チーム-->
    <div class="form-group">
        <label class="control-label col-sm-2">所属チーム（必須）</label>
        <div class="col-sm-10">
            <select name="club" id="club" class="form-control">
                <option value="">所属チームの選択</option>
                <option value="1" @if(old('club', $inpVal['club']) == '1') selected @endif>日本ハムファイターズ</option>
                <option value="2" @if(old('club', $inpVal['club']) == '2') selected @endif>東北楽天ゴールデンイーグルス</option>
                <option value="3" @if(old('club', $inpVal['club']) == '3') selected @endif>千葉ロッテマーリンズ</option>
                <option value="4" @if(old('club', $inpVal['club']) == '4') selected @endif>埼玉西武来ライオンズ</option>
                <option value="5" @if(old('club', $inpVal['club']) == '5') selected @endif>オリックスバッファローズ</option>
                <option value="6" @if(old('club', $inpVal['club']) == '6') selected @endif>福岡ソフトバンクホークス</option>
                <option value="7" @if(old('club', $inpVal['club']) == '7') selected @endif>東京読売ジャイアンツ</option>
                <option value="8" @if(old('club', $inpVal['club']) == '8') selected @endif>東京ヤクルトスワローズ</option>
                <option value="9" @if(old('club', $inpVal['club']) == '9') selected @endif>横浜DeNAベイスターズ</option>
                <option value="10" @if(old('club', $inpVal['club']) == '10') selected @endif>中日ドラゴンズ</option>
                <option value="11" @if(old('club', $inpVal['club']) == '11') selected @endif>阪神タイガース</option>
                <option value="12" @if(old('club', $inpVal['club']) == '12') selected @endif>中日ドラゴンズ</option>
            </select>
        </div>
    </div>
    @endif
    <!--ボタン-->
    <button class="btn btn-lg btn-primary btn-block" type="submit">検索</button>
</form>

<!--一覧表示-->

@if($listFlg == 1)
    <table class="table table-striped" style='margin-top:200px;'>
        <tr>
            <th>登録選手名</th>
            <th>背番号</th>
            <th>所属チーム</th>
            <th>編集</th>
            <th>削除</th>
        </tr>
        @foreach($formatList as $value)
            <tr>
                <td>
                    <a href="{{ action('AdminBaseballController@getDetail', $value->id) }}">{{$value->name}}</a>
                </td>
                <td>{{$value->number}}</td>
                <td>{{$value->club}}</td>
                <td>
                    @if($value->status == 1)
                        <a href='{{ action('AdminBaseballController@getEdit', $value->id) }}' class="btn btn-primary btn-sm">編集</a>
                    @else
                        <div class="btn btn-primary btn-sm" disabled>編集</a>
                    @endif
                </td>
                <td>
                    @if($value->status == 1)
                        <a href='#' onclick="deleteList({{$value->id}})" class="btn btn-danger btn-sm">削除</a>
                    @else
                        <div class="btn btn-danger btn-sm" disabled>削除</div>
                    @endif
                </td>
            </tr>
        @endforeach
    </table>
    
    <!--ページング-->
    <div class="pagenate">
        {{$formatList->appends(Request::only('name', 'number', 'club'))->links()}}
    </div>
@endif
@endsection