# acupoint_app_project
SQL檔案：
database名稱：
project
table名稱：
1. main_table：紀錄十四經絡和經外奇穴的穴位資訊。
A. column：
● acupoint（穴位名稱）
● international number（國際代碼，若沒有則為空白）
● nickname（別名，若沒有則為空白）
● meridian（經絡，參考 table meridian 之代碼。若沒有則為空白）
● place（穴位位置）
● symptom（可治療症狀）
● matchpoint（建議配穴）
● picture（穴位圖片）
● massage（按摩方式）
● massage_no（按摩注意事項）
● moxibustion（艾炙方式）
● moxibustion_no（艾炙注意事項）
● cupping（拔罐方式）
● cupping_no（拔罐注意事項）
● puncture（刺血方式）
● puncture_no（刺血注意事項）
● scratch（刮痧方式）
● scratch_no（刮痧注意事項）
B. 使用到此資料表的php：
a. acupic.php
b. advancetopic.php
c. acushow.php
d. meridian.php
#注意事項：可治療症狀裡的症狀太多古文了，app裡直接使用 match_table 的資料來做穴位對症狀的配對。
2. dong：紀錄董氏奇穴的穴位資訊。
A. column：
● acupoint（穴位名稱）
● international number（國際代碼）
● meridian（在董氏奇穴裡的哪個部位）
● place（穴位位置）
● symptom（可改善症狀）
● method（針灸方法）
● picture（穴位圖片）
● mp4（針灸影片）
B. 使用到此資料表的php：
a. acushow.php
#注意事項：因為針灸是外部侵入的療法，我們因擔心使用者亂操作會出事，因此針灸方法跟針灸影片並未收錄在app裡。
3. meridian：紀錄經絡資訊
A. column：
● name（名字）
● path（經絡流經路徑）
● symptom（經絡主要改善症狀）
● nickname（簡稱）
● picture（經絡圖片）
B. 使用到此資料表的php：
a. merpic.php
4. front：穴位在前面圖片中的x、y座標
A. column：
● acupoint（穴位名稱）
● x（x座標）
● y（y座標）
● meridian（穴位在哪個經絡）
B. 使用到此資料表的php：
a. acupic.php
b. advancetotext.php
c. advancetopic.php
5. back：穴位在後面圖片中的x、y座標
A. column：
● acupoint（穴位名稱）
● x（x座標）
● y（y座標）
● meridian（穴位在哪個經絡）
B. 使用到此資料表的php：
a. acupic.php
b. advancetotext.php
c. advancetopic.php
6. side：穴位在側面圖片中的x、y座標
A. column：
● acupoint（穴位名稱）
● x（x座標）
● y（y座標）
● meridian（穴位在哪個經絡）
B. 使用到此資料表的php：
a. acupic.php
b. advancetotext.php
c. advancetopic.php
7. season：節氣資訊
A. column：
● season_name（節氣名稱）
● season_time（節氣時間）
● introduction（節氣介紹）
● acupoint（節氣推薦穴位）
B. 使用到此資料表的php：
a. season.php
8. disease_id：紀錄所有症狀名稱
A. column：
● symptom（症狀名稱）
● habbit（可改善症狀之生活習慣）
B. 使用到此資料表的php：
a. disshow.php
b. disinsql.php
9. recipes_mix_final：紀錄可改善症狀的食譜
A. column：
● symptom（症狀名稱）
● name（食譜名稱，若沒有則為空白）
● recipe（食譜做法）
B. 使用到此資料表的php：
a. disshow.php
10. distancelike：紀錄症狀的推薦關聯症狀
A. column：
● symptom（症狀名稱）
● liketo（推薦關聯症狀）
B. 使用到此資料表的php：
a. search.php
b. advancetotext.php
c. advancetopic.php
11. match_table：一個穴位對應一個症狀的 table
A. column：
● acupoint（穴位名稱）
● symptom（症狀名稱）
● meridian（經絡名稱）
B. 使用到此資料表的php：
a. search.php
b. advancetotext.php
c. advancetopic.php
d. acushow.php
e. disshow.php
PHP檔案：
acushow.php：用來顯示穴位資訊的php
acupic.php：顯示圖片搜尋結果的php
advancetopic.php：進階圖片搜尋結果的php
advancetotext.php：進階文字搜尋結果的php
config.php：資料庫帳號密碼的php
disinsql.php：回應使用者文字輸入症狀在症狀資料表是否有一模一樣的症狀的php。若無，在此php將使用者輸入症狀與資料表內所有症狀做Jaccard Similarity並回應所有Jaccard Similarity大於0的症狀
disshow.php：用來顯示症狀資訊的php
merpic.php：顯示經絡資訊的php
search：顯示文字搜尋結果的php
season：顯示節氣資訊的php
html檔案：
index.html：顯示 sidebar 的 html
favorite.html：我的最愛的html
meridian.html：經絡介紹的html
page2.html：首頁的html
page4.html：文字搜尋結果的html
page5.html：顯示穴位資訊的html
page8.html：顯示症狀資訊的html
search.html：文字症狀搜尋的html
season.html：節氣介紹的html
teach.html：教學的html
touch.html：圖片搜尋的html
touchresult.html：圖片搜尋結果的html
sidebar.js:sidebar的js
disshow.js:症狀頁面js
favorite.js:我的最愛js
season.js:節氣js
main.js：首頁js
images檔案：
圖片搜尋所需圖片、經絡圖片、home鍵圖片
tutorial檔案：
教學所需圖片
HIN2Vec檔案：
做hin2vec的code，input請參照demo_data的格式再做一個
網頁轉app：
phonegap、webview 的方式，使用android studio軟體
