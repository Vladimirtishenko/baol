インストール
============

## Composer パッケージを取得する

このエクステンションをインストールするのに推奨される方法は [composer](http://getcomposer.org/download/) によるものです。

下記のコマンドを実行してください。

```
php composer.phar require --prefer-dist yiisoft/yii2-debug
```

または、あなたの `composer.json` ファイルの `require` セクションに、下記を追加してください。

```
"yiisoft/yii2-debug": "~2.0.0"
```


## アプリケーションを構成する

エクステンションを有効にするためには、構成情報ファイルに以下の行を追加してデバッグモジュールを有効にします。

```php
'bootstrap' => ['debug'],
'modules' => [
    'debug' => 'yii\debug\Module',
]
```

デフォルトでは、デバッグモジュールはウェブサイトをローカルホストから閲覧した場合にだけ動作します。
これをリモートサーバ (ステージングサーバ) で使いたい場合は、パラメータ `allowedIPs` を構成情報に追加して、あなたの IP をホワイトリストに加えてください。

```php
'bootstrap' => ['debug'],
'modules' => [
    'debug' => [
        'class' => 'yii\debug\Module',
        'allowedIPs' => ['1.2.3.4', '127.0.0.1', '::1']
    ]
]
```

URL マネージャで `enableStrictParsing` オプションを使っている場合は、`rules` に次の行を追加してください。

```php
'urlManager' => [
    'enableStrictParsing' => true,
    'rules' => [
        // ...
        'debug/<controller>/<action>' => 'debug/<controller>/<action>',
    ],
],
```

> Note|注意: デバッガは各リクエストに関する情報を `@runtime/debug` ディレクトリに保存します。
> デバッガを使用するのに問題が生じたとき、例えば、デバッガを使おうとするとおかしなエラーメッセージが出たり、ツールバーが表示されなかったり、リクエストの情報が何も表示されなかったりしたときは、ウェブサーバがこのディレクトリとその中に置かれるファイルに対して十分なアクセス権限を持っているかどうかを確認してください。


### ロギングとプロファイリングのための追加の構成

ロギングとプロファイリングは、フレームワークとアプリケーションの両方の実行フローを理解するのを助けてくれる、単純ながら強力なツールです。これらのツールは、開発環境でも本番環境でも役に立ちます。

本番環境では、[ロギング](https://github.com/yiisoft/yii2/blob/master/docs/guide-ja/runtime-logging.md) のガイドの節で説明されているように、著しく重要なメッセージを手動でログに取るだけにとどめるべきです。
本番環境で全てのメッセージをログに取り続けるのは、パフォーマンスへの損害が大きすぎます。

開発環境では、ログは多く取れば取るほど良いでしょう。とりわけ、実行トレースの記録は有用です。

フレームワークのフードの下で何が起っているかを理解する手助けとなるトレースメッセージを見るためには、構成情報ファイルでトレースレベルを設定する必要があります。

```php
return [
    // ...
    'components' => [
        'log' => [
            'traceLevel' => YII_DEBUG ? 3 : 0, // <-- ここ
```

デフォルトでは、Yii がデバッグモードで走っている場合のトレースレベルは自動的に `3` に設定されます。
デバッグモードは `index.php` ファイルに次の行が存在することによって決定されます。

```php
defined('YII_DEBUG') or define('YII_DEBUG', true);
```

> Note|注意: デバッグモードはパフォーマンスに著しい悪影響を及ぼし得ますので、本番環境では必ずデバッグモードを無効にしてください。
更に、デバッグモードは公開すべきでない情報をエンドユーザに曝露することがあり得ます。
