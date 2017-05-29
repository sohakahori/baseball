@extends('layouts.app')
@section('content')

<h2>投手編集</h2>
<br><br>
<form class='form-horizontal' method="POST" action="{{url('/admin/editpicher', $playerInfo->id)}}" enctype="multipart/form-data">
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
    <div class="form-group">
        <label class="control-label col-sm-2">登録選手名</label>
        <div class="col-sm-10">
            <input type="text" name="name" id="name" class="form-control" value="{{ old('name', $playerInfo->name) }}">
        </div>
    </div>
    <!--背番号-->
    <div class="form-group">
        <label class="control-label col-sm-2">背番号</label>
        <div class="col-sm-10">
            <input type="text" name="number" id="number" class="form-control" value="{{ old('number', $playerInfo->number) }}">
        </div>
    </div>
    <!--所属チーム-->
    <div class="form-group">
        <label class="control-label col-sm-2">所属チーム</label>
        <div class="col-sm-10">
            <select name="club" id="club" class="form-control">
                <option value="">所属チームの選択</option>
                <option value="1" @if(old('club', $playerInfo->club) == '1') selected @endif>日本ハムファイターズ</option>
                <option value="2" @if(old('club', $playerInfo->club) == '2') selected @endif>東北楽天ゴールデンイーグルス</option>
                <option value="3" @if(old('club', $playerInfo->club) == '3') selected @endif>千葉ロッテマーリンズ</option>
                <option value="4" @if(old('club', $playerInfo->club) == '4') selected @endif>埼玉西武来ライオンズ</option>
                <option value="5" @if(old('club', $playerInfo->club) == '5') selected @endif>オリックスバッファローズ</option>
                <option value="6" @if(old('club', $playerInfo->club) == '6') selected @endif>福岡ソフトバンクホークス</option>
                <option value="7" @if(old('club', $playerInfo->club) == '7') selected @endif>東京読売ジャイアンツ</option>
                <option value="8" @if(old('club', $playerInfo->club) == '8') selected @endif>東京ヤクルトスワローズ</option>
                <option value="9" @if(old('club', $playerInfo->club) == '9') selected @endif>横浜DeNAベイスターズ</option>
                <option value="10" @if(old('club', $playerInfo->club) == '10') selected @endif>中日ドラゴンズ</option>
                <option value="11" @if(old('club', $playerInfo->club) == '11') selected @endif>阪神タイガース</option>
                <option value="12" @if(old('club', $playerInfo->club) == '12') selected @endif>中日ドラゴンズ</option>
            </select>
        </div>
    </div>
    <!--守備位置-->
    <div class="form-group">
        <label class="control-label col-sm-2">守備位置</label>
        <div class="col-sm-10">
            <select name="position" id="position" class="form-control">
                <option value="">守備位置の選択</option>
                <option value="投" @if(old('position', $playerInfo->position) == '投') selected @endif>投</option>
            </select>
        </div>
    </div>
    <!--選手画像-->
    <!--
    <div class="form-group">
        <label class="control-label col-sm-2">選手画像</label>
        <div class="col-sm-10">
            <input type="file" name="image" id="image" class="form-control">
        </div>
    </div>
    -->
    <!--球速-->
    <div class="form-group">
        <label class="control-label col-sm-2">球速</label>
        <div class="col-sm-10">
            <input type="text" name="speed" id="speed" class="form-control" value="{{ old('speed', $detail->speed) }}">
        </div>
    </div>
    <!--コントロール-->
    <div class="form-group">
        <label class="control-label col-sm-2">コントロール</label>
        <div class="col-sm-10">
            <select name="control" id="control" class="form-control">
                <option value="">コントロールの選択</option>
                <option value="A" @if(old('control', $detail->control) == 'A') selected @endif>A</option>
                <option value="B" @if(old('control', $detail->control) == 'B') selected @endif>B</option>
                <option value="C" @if(old('control', $detail->control) == 'C') selected @endif>C</option>
                <option value="D" @if(old('control', $detail->control) == 'D') selected @endif>D</option>
                <option value="E" @if(old('control', $detail->control) == 'E') selected @endif>E</option>
                <option value="F" @if(old('control', $detail->control) == 'F') selected @endif>F</option>
                <option value="G" @if(old('control', $detail->control) == 'G') selected @endif>G</option>
            </select>
        </div>
    </div>
    <!--スタミナー-->
    <div class="form-group">
        <label class="control-label col-sm-2">スタミナ</label>
        <div class="col-sm-10">
            <select name="stamina" id="stamina" class="form-control">
                <option value="">スタミナの選択</option>
                <option value="A" @if(old('stamina', $detail->stamina) == 'A') selected @endif>A</option>
                <option value="B" @if(old('stamina', $detail->stamina) == 'B') selected @endif>B</option>
                <option value="C" @if(old('stamina', $detail->stamina) == 'C') selected @endif>C</option>
                <option value="D" @if(old('stamina', $detail->stamina) == 'D') selected @endif>D</option>
                <option value="E" @if(old('stamina', $detail->stamina) == 'E') selected @endif>E</option>
                <option value="F" @if(old('stamina', $detail->stamina) == 'F') selected @endif>F</option>
                <option value="G" @if(old('stamina', $detail->stamina) == 'G') selected @endif>G</option>
            </select>
        </div>
    </div>
    <!--変化球-->
    <div class="form-group">
        <label class="control-label col-sm-2">変化球</label>
        <div class="col-sm-10">
            <textarea name="breaking_ball" id="breaking_ball" class="form-control" style="height:100px;">{{old('breaking_ball', $detail->breaking_ball)}}</textarea>
        </div>
    </div>
    <!--特殊能力-->
    <div class="form-group">
        <label class="control-label col-sm-2">特殊能力</label>
        <div class="col-sm-10">
            <textarea name="special_ability" id="special_ability" class="form-control" style="height:100px;">{{old('special_ability', $detail->special_ability)}}</textarea>
        </div>
    </div>
    
    <!--ボタン-->
    <button class="btn btn-lg btn-primary btn-block" type="submit">送信</button>
</form>

@endsection
