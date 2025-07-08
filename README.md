# Ami個人履歷

## 目前已有網頁技能

### UI/UX
- 使用過Figma初版設計
### 前端
#### Vue
- 熟練Vue.js(Vue3主要、Vue2僅維護過)
- 熟練Tailwind css(v3、v4)
- 熟悉Vue Router、Pinia
- 熟悉Reka-ui/shadcn-vue/tanstack-table
- 熟悉axios
#### 其他
- 熟練HTML/JS/TS/CSS
- 熟悉Bootstrap/Quasar
- 熟練jQuery
- 熟悉Razor
- 使用過Konva.js
- 熟練RESTful API
- 使用過SASS/SCSS
- 使用過d3.js
### 後端
- 熟悉Laravel
- 熟悉Express/Node.js
- 熟悉MySQL/MSSQL
- 熟悉asp.net
- 使用過HyperX/VM/K8s
- 簡易操作nginx/IIS

### 開發專案經驗
- codecity-官網(全端)
- codecity-citybot(前端)
- codecity-數位名片網站(全端)
- hciot-lrp(全端-維護)
- hciot-lrp-new(全端開發中)
- hciot-床頭卡(全端+uiux)

## 其他非網頁技能

- 熟悉Unity/C#
- 接觸過UNREAL4/5
- 寫過Shader/OpenGL
- 使用LrC

## 安裝教學

以下將會引導你如何安裝此專案到你的電腦上。

- Node.js 版本建議為：20.12.1 以上...
- Composer 版本建議為：2.8.4 以上...
- php 版本建議為：8.4 以上...
- MySQL 版本建議為：5.7 以上...

### 取得專案

```bash
git clone https://github.com/cococafe123/Ami-s-project.git
```

### 移動到專案內

```bash
cd Ami-s-project
```

### 切換分支

- web-各式RWD網頁及konva.js測試
- card-線上名片網站

```bash
git checkout 分支名稱
```

### 安裝套件

```bash
npm install
composer install
```

### 環境變數設定

請在終端機輸入 `cp .env.example .env` 來複製 .env.example 檔案，並依據 `.env` 內容調整相關欄位。

### 生成App Key

```bash
php artisan key:generate
```

### 生成storage link

```bash
php artisan storage:link
```

### 生成資料庫

``` bash
php artisan migrate
```

### 運行專案

請開啟兩個terminal分別輸入

```bash
npm run dev
php artisan serve
```

### 開啟專案

在瀏覽器網址列輸入以下即可看到畫面(請根據自行調整的替換ip和port)

```bash
http://127.0.0.1:8000/
```

## 環境變數說明

```env
DB_CONNECTION=mysql  #資料庫方式
DB_HOST=127.0.0.1    #資料庫IP
DB_PORT=3306         #資料庫Port
DB_DATABASE=CardCity #資料庫Name
...
```

## 已經上線網站(以下皆由個人實作開發)

```bash
https://codecity.com.tw/ #codecity官網
```
