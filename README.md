# TITLE
Book-Review

# INGENUITY
- AWSへのデプロイ、httpsドメイン取得
- Dockerを用いた開発
- Vue.jsを用いたいいね・フォローの非同期化
- Googleアカウントでのユーザー新規登録・ログイン

# OVERVIEW
- 新規登録、ログイン
- 画像投稿
- 投稿一覧
- いいね機能
- フォロー、フォローワー機能
- タグ機能
- タグ一覧
- Googleアカウントでの新規登録・ログイン機能

# ID
- https://book-new.work/

# PRODUCTION BACKGROUND
- 読んだ本、読みんで見たい本について内容や感想を共有できるアプリケーション

# DEMO
- トップページ
  ![image](https://user-images.githubusercontent.com/60598010/81406033-ca542480-9173-11ea-8a55-377f9f90de7f.png)
  <br>
  <br>
  <br>
  <br>
- タグ一覧画面
  ![image](https://user-images.githubusercontent.com/60598010/81406534-b9f07980-9174-11ea-949e-091b7cf13b92.png)
  <br>
  <br>
  <br>
  <br>
- マイページ
  ![image](https://user-images.githubusercontent.com/60598010/81406657-f02df900-9174-11ea-9399-e57a7707ac20.png)

# 今後実装したい機能
- コメント機能
- 投稿検索機能
- AMAZONなどへのリンク設定



## usersテーブル
|Column|Type|Options|
|------|----|-------|
|name|string|null: false|
|email|string|null: false|
|password|string|null: false|
### Association
- has_many :articles
- has_many :tags
- has_many :favorites


## articlesテーブル
|Column|Type|Options|
|------|----|-------|
|title|text||
|body|text||
|image|string||
|user|references|foreign_key: true|
### Association
- belongs_to :user

## likesテーブル
|Column|Type|Options|
|------|----|-------|
|user_id|integer|null: false, foreign_key: true|
|article_id|integer|null: false, foreign_key: true|
### Association
- belongs_to :article
- belongs_to :user

## article_tagテーブル
|Column|Type|Options|
|------|----|-------|
|article_id|integer||
|tag_id|integer||
### Association
- belongs_to :article
- belongs_to :tag

## tagsテーブル
|Column|Type|Options|
|------|----|-------|
|name|string||
### Association
- belongs_to :article_tag
