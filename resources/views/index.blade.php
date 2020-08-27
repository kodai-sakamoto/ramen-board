<!DOCTYPE html>
<html lang="ja">
    <head>
        <meta charset="utf-8">
        <title>ramen-board</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="{{ asset('css/style.css') }}">   
        <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
        

    </head>

    <body>
        
        @include('commons.navbar')
        <div class="menu row">
            <a href="/" class="rank col-sm-6">ランキング</a>
            <a href="#" class="user col-sm-6">ユーザ情報</a>
        </div>
        
        <menu>
            <div class="row">
                <select type="text" class="form-control col-sm-4" name="area">                          
                    @foreach(config('pref') as $key => $score)
                        <option value="{{ $score }}">{{ $score }}</option>
                    @endforeach
                </select>
                
                <select type="text" class="form-control col-sm-4" name="type">                          
                    @foreach(config('type') as $key => $type)
                        <option value="{{ $type }}">{{ $type }}</option>
                    @endforeach
                </select>
                
                <select type="text" class="form-control col-sm-4" name="turn">                          
                    @foreach(config('turn') as $key => $turn)
                        <option value="{{ $turn }}">{{ $turn }}</option>
                    @endforeach
                </select>
            </div>
            <div class="kensaku">
                <input type="button" value="検索する" class="modal-open btn btn-primery" style="background-color:#ff7f00;">
            </div>
        </menu>
        <main>
            <h1>投稿</h1>
            <input type="botton" value="投稿する" id="modal-open" class="modal-open btn btn-primery" style="background-color:#ff7f00;">
            
            
            <div class="modal-m" id="modal-m">
                <h2>投稿する</h2>
                <div class="modal-content">
                    <div class="row">
                        <select type="text" class="form-control" name="score">                          
                            @foreach(config('score') as $key => $score)
                                <option value="{{ $score }}">{{ $score }}</option>
                            @endforeach
                        </select>
                        <select type="text" class="form-control" name="area">                          
                            @foreach(config('pref') as $key => $pref)
                                <option value="{{ $pref }}">{{ $pref }}</option>
                            @endforeach
                        </select>
                        
                        <select type="text" class="form-control" name="type">                          
                            @foreach(config('type') as $key => $type)
                                <option value="{{ $type }}">{{ $type }}</option>
                            @endforeach
                        </select>
                        
                    </div>
                </div>
                <input type="botton" value="閉じる" id="modal-close" class="modal-close btn btn-danger" style="background-color:red;">
                <input type="botton" value="投稿する" id="toukou" class="toukou btn btn-primery" style="background-color:#ff7f00;">
                
            </div>
            <div class="mask" id="mask"></div>
        </main>
        
        
        <script src="{{ asset('/js/main.js') }}"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.7.2/js/all.js"></script>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.6/umd/popper.min.js"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.2.1/js/bootstrap.min.js"></script>
        <script defer src="https://use.fontawesome.com/releases/v5.7.2/js/all.js"></script>
    </body>
</html>