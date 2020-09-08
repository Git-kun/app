<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>


<h1 align="left">ECサイト</h1>
<p align="center">
  <img src="https://user-images.githubusercontent.com/56929408/91583534-550f9800-e98c-11ea-8bd3-971b94fb77d9.png">
</p>
<br>

##  App URL

### **http://laravelshopsite.obearda.com/**
【ログイン】テストユーザー
- メールアドレス：test@com
- パスワード：111111

##  開発環境
- 開発言語　　　　　：PHP（7.3）
- データベース　　　：MySQL（5.7）
- 環境構築　　　　　：Docker(Laradock）
- バージョン管理　　：GitHub
- テキストエディター：VSCode（Visual Studio Code）

---

# DB設計
## usersテーブル
- 登録会員ユーザー

|Column|Type|Options|
|------|----|-------|
|id|int|primary_key|
|name|varchar||
|email|varchar||
|email_verified_at|timestamp||
|password|varchar||
|remember_token|varchar||
|created_at|timestamp||
|updated_at|timestamp||

## stocksテーブル
- 商品

|Column|Type|Options|
|------|----|-------|
|id|int|primary_key|
|created_at|timestamp||
|updated_at|timestamp||
|name|varchar||
|fee|int||
|imgpath|varchar||

## cartsテーブル
- カートの中

|Column|Type|Options|
|------|----|-------|
|id|int|primary_key|
|stock_id|int||
|user_id|int||
|created_at|timestamp||
|updated_at|timestamp||