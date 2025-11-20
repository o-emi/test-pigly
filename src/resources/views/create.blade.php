<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>管理画面 - 体重ログ</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/page/create.css') }}">
</head>
<body>
    <h1>WeightLogを追加</h1>
    <a href="#weightLogModal" class="add-data-button">データ追加</a>
    <p>既存の体重ログデータテーブルなどがここに表示されます。</p>

    <div id="weightLogModal" class="modal-window">
      <a href="#" class="modal-overlay"></a>

      <div class="modal-content">
        <div class="modal-header">
          <h2>Weight Logを追加</h2>
        </div>
        <div class="modal-body">
          <form id="weightLogForm" method="POST" action="{{ route('weight.store') }}">
            @csrf

            <div class="form-group required">
              <label for="date">日付 必須</label>
              <input type="date" id="date" name="date" value="{{ date('Y-m-d') }}" required>
            </div>

            <div class="form-group required">
              <label for="weight">体重 必須</label>
              <div class="input-with-unit">
                <input type="number" id="weight" name="weight" value="50.0" step="0.1" required>
                <span>kg</span>
              </div>
            </div>

            <div class="form-group required">
              <label for="calorie">摂取カロリー 必須</label>
              <div class="input-with-unit">
                <input type="number" id="calorie" name="calorie" value="1200" required>
                <span>cal</span>
              </div>
            </div>

            <div class="form-group required">
              <label for="exerciseTime">運動時間 必須</label>
              <input type="time" id="exerciseTime" name="exerciseTime" value="00:00" step="60" required>
            </div>

            <div class="form-group">
              <label for="exerciseContent">運動内容</label>
              <textarea id="exerciseContent" name="exerciseContent" placeholder="運動内容を追加"></textarea>
            </div>

            <div class="modal-actions">
              <a href="#" class="btn btn-secondary">戻る</a>
              <button type="submit" class="btn btn-primary">登録</button>
            </div>
          </form>
        </div>
      </div>
    </div>

</body>
</html>