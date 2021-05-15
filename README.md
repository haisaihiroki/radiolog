# radiolog
PC/スマホで気軽に簡単に交信Logが記録できるようにをモットーに開発してます。
不具合報告・機能追加・bugfixはIssueとPull requestで受け付けます。

## 機能
* 交信Logの記録
* 交信Logの一覧表示
* 交信Logの更新

## RUN
Build and run your computer
```
docker build . -t radiolog
docker run -p 8080:80 -t radiolog
```

(Debug時はこんな感じもあり)
```
docker run  -p 8080:80 -v `PWD`:/radiolog -t radiolog
```
Access your browser http://localhost:8080

