# お問い合わせフォーム

## 環境構築

1. Dockerビルド・起動

プロジェクトのルートディレクトリで以下のコマンドを実行します。
```bash
$docker compose build
$docker compose up -d
```

2. PHPコンテナに入る
```bash
$docker compose exec php bash
```

3. Composerパッケージのインストール
```bash
$composer install
```

4. .envファイルの設定

5. アプリケーションキー

6. マイグレーションの実行

7. シーディングの実行

8. アプリケーションへのアクセス


## 使用技術（実行環境）
- PHP 8.5.5
- Laravel 8.83.29
- MySQL 8.0.26
- Nginx
- Docker 28.1.1
- Docker Compose v2.35.1

## ER図
![ER図](./docs/ER_diagram.png)

## URL

開発環境：http://localhost/