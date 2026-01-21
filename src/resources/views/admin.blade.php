<!DOCTYPE html>
<html lang="ja">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - FashionablyLate</title>
    <link rel="stylesheet" href="{{ asset('css/sanitize.css') }}">
    <link rel="stylesheet" href="{{ asset('css/admin.css') }}">
</head>
<body>
    <header class="header">
        <div class="header__inner">
            <h1 class="header__logo">FashionablyLate</h1>
            <nav>
                <form action="/logout" method="post">
                    @csrf
                    <button class="header__link">logout</button>
                </form>
            </nav>
        </div>
    </header>

    <main>
        <div class="admin__content">
            <div class="admin__heading">
                <h2>Admin</h2>
            </div>

            <div class="search-form">
                <form action="/admin" method="get" class="search-form__inner">
                    <input type="text" name="keyword" class="search-form__item-input" placeholder="名前やメールアドレスを入力してください" value="{{ request('keyword')}}">
                    
                    <select name="gender" class="search-form__item-select">
                        <option value="all" {{request('gender') == 'all' ? 'selected' : '' }}>性別</option>
                        <option value="all" {{request('gender') == 'all' ? 'selected' : '' }}>全て</option>
                        <option value="1" {{request('gender') == '1' ? 'selected' : '' }}>男性</option>
                        <option value="2" {{request('gender') == '2' ? 'selected' : '' }}>女性</option>
                        <option value="3" {{request('gender') == '3' ? 'selected' : '' }}>その他</option>
                    </select>

                    <select name="category_id" class="search-form__item-select--category">
                        <option value="">お問い合わせの種類</option>
                        @foreach($categories as $category)
                        <option value="{{ $category->id }}" {{request('category_id') == $category->id ? 'selected' : ''}}>{{ $category->content }}</option>
                        @endforeach
                    </select>

                    <input type="date" name="date" class="search-form__item-date" value="{{ request('date') }}">
                    
                    <button class="search-form__button-submit" type="submit">検索</button>
                    <button class="search-form__button-reset" type="submit" name="reset">リセット</button>
                </form>
            </div>

            <div class="admin-panel">
                <button class="admin-panel__export">エクスポート</button>
                <div class="pagination">
                    {{ $contacts->links() }}
                </div>
            </div>

            <table class="admin-table">
                <tr class="admin-table__row">
                    <th class="admin-table__header">お名前</th>
                    <th class="admin-table__header">性別</th>
                    <th class="admin-table__header">メールアドレス</th>
                    <th class="admin-table__header">お問い合わせの種類</th>
                    <th class="admin-table__header"></th>
                </tr>
                @foreach($contacts as $contact)
                <tr class="admin-table__row">
                    <td class="admin-table__text">{{ $contact->last_name }}{{ $contact->first_name }}</td>
                    <td class="admin-table__text">
                        @if($contact->gender == 1) 男性 @elseif($contact->gender == 2) 女性 @else その他 @endif
                    </td>
                    <td class="admin-table__text">{{ $contact->email }}</td>
                    <td class="admin-table__text">{{ $contact->category->content }}</td>
                    <td class="admin-table__text">
                        <button class="admin-table__detail-btn">詳細</button>
                    </td>
                </tr>
                @endforeach
            </table>
            <div id="detail-modal" class="modal">
    <div class="modal__inner">
        <button class="modal__close-btn" id="close-modal"></button>
        <div class="modal__content">
            <table class="modal-table">
                <tr>
                    <th>お名前</th>
                    <td id="modal-name"></td>
                </tr>
                <tr>
                    <th>性別</th>
                    <td id="modal-gender"></td>
                </tr>
                <tr>
                    <th>メールアドレス</th>
                    <td id="modal-email"></td>
                </tr>
                <tr>
                    <th>電話番号</th>
                    <td id="modal-tel"></td>
                </tr>
                <tr>
                    <th>住所</th>
                    <td id="modal-address"></td>
                </tr>
                <tr>
                    <th>建物名</th>
                    <td id="modal-building"></td>
                </tr>
                <tr>
                    <th>お問い合わせの種類</th>
                    <td id="modal-category"></td>
                </tr>
                <tr>
                    <th>お問い合わせ内容</th>
                    <td id="modal-detail"></td>
                </tr>
            </table>

            <form action="/admin/delete" method="POST" class="delete-form">
                @csrf
                <input type="hidden" name="id" id="delete-id">
                <button type="submit" class="delete-form__btn">削除</button>
            </form>
        </div>
    </div>
</div>
            </form>
        </div>
    </div>
</div>
        </div>
    </main>
</body>
</html>