# SimpleBoard2
## 파일 구성
<img width="882" alt="캡처2" src="https://user-images.githubusercontent.com/58197075/96426222-e9cd9e00-1237-11eb-8391-b404b6c3c491.PNG">

### 게시물 페이징
참고 : https://lkg3796.tistory.com/62

### 부트스트랩
반응형 웹페이지 개발을 위한 HTML , CSS, js 프레임워크 

## 세션과 쿠키
### 세션

- 동작과정
1. 웹사이트 처음 요청 시, 세션 ID를 발급받아 헤더와 함께 응답 
2. 클라이언트는 세션 ID에 대해 쿠키로 저장
3. 이후, 서버 요청 시 세션 ID를 통해 서버에 있는 사용자 정보 데이터를 가져옴

- 사용 예 :
로그인(보안)

### 쿠키

- 동작과정
1. 클라이언트가 페이지 요청 시, 서버에서 쿠키를 생성해 헤더와 함께 응답
2. 브라우저가 종료되어도 쿠키 만료 기간이 있으면 보관
3. 같은 요청 시, 헤더에 쿠키와 함께 요청
4. 서버에서 쿠키를 읽어 변경사항이 있을 때 쿠키 업데이트 후 헤더와 함께 응답

- 사용 예 :
자동로그인,
팝업창(오늘 더 이상 이 창을 보지 않음 체크),
쇼핑몰 장바구니

## TELNET, SSH / FTP,SFTP

### TELNET

TCP/IP 기반의 네트워크 프로토콜로 원격지 시스템(서버)를 자신의 시스템처럼 사용할 수 있는 원격 터미널 접속 서비스, 23번 포트를 사용하여 연결 

터미널 에뮬레이션 프로토콜로 NVT(Network Virtual Terminal), 가상 터미널 사용
- NVT : 원격지 시스템과 로컬 시스템의 버전이 상이할 경우 데이터 형식을 변환해 원활한 통신을 하게 하는 가상장치, 기본적인 터미널 제어 문자를 정의함

- 접속과정 
접속 시도 -> 원격지 시스템 배너정보 리턴 -> 접속 계정 요구 -> Telnet용 계정 입력 -> Password 요구

- 동작과정
1. 클라이언트는 원격 로그인을 통해 원격지 시스템에 23번 포트를 이용해 TCP연결
2. 원격지 시스템은 연결된 클라이언트에게 가상의 터미널 제공
3. 클라이언트는 가상의 터미널로 명령어 실행
4. 원격지 시스템은 클라이언트의 명령을 수행해 결과를 응답
- 취약점 : 데이터 전송 시, 정보나 명령어 등이 그대로 노출됌 -> 보안성이 떨어짐

### SSH
Secure Shell, 암호화 기법을 사용해 통신, 포트 22번 사용

- 대칭키 방식, 비대칭키 방식을 사용해 인증 및 암호화 진행

비대칭키 방식 : Public Key, Private Key 를 사용해 서버 및 사용자 인증 과정을 거침 

- 서버 인증 과정
1. SSH 첫 구동 시, 내부적으로 비대칭키 생성
2. 클라이언트는 난수값에 대한 해시값을 생성해 저장
3. 난수값을 Public Key로 암호화해 서버에 전송
4. 서버에서 Private Key로 받은 난수값을 복호화하여 해시값으로 만들어 클라이언트에 전송
5. 클라이언트는 원래의 해시값과 전송받은 해시값을 비교하여 정상 서버인지 확인 

- 사용자 인증 과정
1. 클라이언트에서 비대칭키를 생성해 Public Key는 서버에, Private key는 사용자가 갖게 됌 
2. 서버는 난수를 생성해 해시값에 저장후 난수값을 Public Key로 암호화하여 클라이언트에 전송
3. 클라이언트는 서버에게 받은 난수값을 자신이 가지고 있는 Private Key로 복호화하여 해시값을 생성해 다시 서버로 전송
4. 서버는 받은 해시값과 원래의 해시값을 비교하여 정상 사용자인지 확인 

=> 서버, 사용자 인증 완료 이후에는 통신 되는 모든 데이터는 대칭키를 통해 암호화가 이루어짐

=> 통신 종료 시, 대칭키 사용 불가 

대칭키 방식 : 동일한 키 값으로 데이터를 암호화, 복호화

### FTP
File Transfer Protocol 서버와 클라이언트 사이의 파일 전송 프로토콜

제어 채널(21번)과 전송 채널(20번)로 나누어져 있음

동작방식

- FTP Active mode
1. 클라이언트가 서버의 21번 포트로 접속 -> 서버 ACK 응답
2. 서버는 20번 포트를 이용해 클라이언트로 접속 -> 클라이언트 ACK 응답
=> 서버가 클라이언트에 접속을 시도하기 때문에 접속이 허용되어 있지 않으면 (방화벽 등) 오류 발생 

- FTP Passive mode 
1. 클라이언트가 서버의 21번 포트로 접속 -> 서버 ACK 응답, 클라이언트에게 Data 포트를 알려줌
2. 클라이언트는 Data 포트를 통해 서버로 접속 -> 서버 ACK 응답
=> 전송 채널 20번 포트를 이용하지 않고 동적 포트를 랜덤을 사용, 보안상의 문제  

### SFTP
SSH의 파일 전송 프로토콜, 22번 포트
FTP의 암호화 버전  

## 서버 연동

### Xshell
서버 연결 방법

-새 새션 등록

-사용자 인증에서 인증 방법을 Public Key로 변경 후 사용자 키에 부여받은 Public key /pem 파일 넣기 

-이름, 호스트(부여받은IP정보), 사용자이름
->연결 

개발 환경 구축

-sudo yum update // 업데이트

-sudo yum install httpd -y //아파치 설치

-sudo yum install php -y //php 설치

-sudo yum install php-mysql //php와 mysql 연동 설치 

-service httpd status/start/stop/restart //아파치상태확인/시작/종료/재시작
멤초 

-sudo -s //root계정으로 돌아감

-CentOS 7에서 MySQL 5.7 설치 
https://cherrypick.co.kr/how-to-install-mysql5-7-in-centos7/

-php.ini 환경설정
1. short_open_tag = On
2. data.timezone =Asia/Seoul 
=> /var/www/html 안에 index.php 파일 생성 후, 간단한 코드로 서버 연동확인 (ip주소/index.php)

-httpd.conf 환경설정
1. <IfModule dir_module>
    DirectoryIndex index.html 
  </IfModule>
  => 안에 index.php 추가

### WinSCP 
- advanced 에서 SSH -> Authentication
에서 Private key file (압축 푼거) .pem 파일 가져오기 
- hostname : 부여받은IP정보 , User name
->로그인 

### Visual Studio Code에서 FTP 이용 원격 개발

1. ftp-simple 설치
2. >ftp-simple:Config 입력 후 선택
3. "name", "host", "privateKey"(key파일의 위치) 설정하기 
4. >ftp-simple:Remote directory open to workspace 입력 후 선택
5. 방금 만든 서버 클릭
6. 워크스페이스로 쓸 디렉토리 선택
7. 연결 해제 >ftp-simple:Close all FTP connections 를 실행

참고 : https://www.manualfactory.net/10964

## MySQL

-데이터베이스 생성

CREATE DATABASE testdb default character SET UTF8;

-testdb 테이블 생성 

CREATE TABLE testdb (UserNumber int primary key auto_increment, Title varchar(100) not null, Content varchar(100) not null, 
  Company varchar(30) not null, UserName varchar(30) not null, Id varchar(30) not null, Date datetime, Hit int not null default '0');
    
-users 테이블 생성

CREATE TABLE usersdb(UserNumber int primary key auto_increment, Id varchar(30) not null, Password varchar(30) not null,
  UserName varchar(30) not null, Company varchar(30) not null);

## 서버 연동 중, 발생 오류

- PHP Fatal error:  Call to a member function query() on a non-object
=> include "파일경로"; : 파일 경로 수정, 원격 서버에서의 파일 경로로

- PHP Fatal error:  Class 'mysqli' not found
=> php, mysqli의 버전 차이

$yum list installed | grep php
php.x86_64                         5.4.16-48.el7              @base             
php-cli.x86_64                     5.4.16-48.el7              @base             
php-common.x86_64                  5.4.16-48.el7              @base             
php-mysql.x86_64                   5.4.16-48.el7              @base             
php-pdo.x86_64                     5.4.16-48.el7              @base  
=> 모두 삭제 후, 재 설치

### 수정해야 할 부분
#yum install php
#php -i | grep 'Client API'
#php -r 'new mysqli();'
#systemctl restart httpd -> 아파치 재시작
#chcon -R -t httpd_sys_rw_content_t /var/www/html/simpleboard -> 
