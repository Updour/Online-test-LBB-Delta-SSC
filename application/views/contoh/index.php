<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="utf-8">
<title>Dashboard - Aplikasi Ujian Online</title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no">
<meta name="apple-mobile-web-app-capable" content="yes">
<link href="{base}/___/css/bootstrap.css" rel="stylesheet">
<link href="{base}/___/css/style.css" rel="stylesheet"> 
<script src="{base}/___/js/jquery-1.11.3.min.js"></script>
</head>
<script src="{base}/___/js/bootstrap.min.js"></script>
</head>
<body>

       
     
    
<nav class="navbar navbar-findcond navbar-fixed-top">
    <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar">
        <span class="sr-only">Toggle navigation</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand">Aplikasi Ujian Online</a>
    </div>
    <div class="collapse navbar-collapse" id="navbar">
      <ul class="nav navbar-nav navbar-right">
        <li class="dropdown">
          <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false">
            <?php echo $this->session->userdata('admin_nama')." (".$this->session->userdata('admin_user').")"; ?> 
            <span class="caret"></span></a>
          <ul class="dropdown-menu" role="menu">
            <li><a href="#" onclick="return rubah_password();">Ubah Password</a></li>
            <li><a href="<?php echo base_url(); ?>adm/logout" onclick="return confirm('keluar..?');">Logout</a></li>
          </ul>
        </li>
      </ul>
      <!--
      <form class="navbar-form navbar-right search-form" role="search">
        <input type="text" class="form-control" placeholder="Search" />
      </form>
      -->
    </div>
  </div>
</nav>

<?php 
$sess_level = $this->session->userdata('admin_level');
$uri2 = $this->uri->segment(2);

$menu = array();

if ($sess_level == "guru") {
  $menu = array(
            array("icon"=>"dashboard", "url"=>"", "text"=>"Dashboard"),
            array("icon"=>"list-alt", "url"=>"m_soal", "text"=>"Soal"),
            array("icon"=>"file", "url"=>"m_ujian", "text"=>"Ujian"),
            array("icon"=>"file", "url"=>"h_ujian", "text"=>"Hasil Ujian"),
          );
} else if ($sess_level == "siswa") {
  $menu = array(
            array("icon"=>"dashboard", "url"=>"", "text"=>"Dashboard"),
            array("icon"=>"file", "url"=>"ikuti_ujian", "text"=>"Ujian"),
            array('icon' =>"download", "url" => "unduh", "text"=> "Download Soal"),
          );
} else if ($sess_level == "admin") {
  $menu = array(
            array("icon"=>"dashboard",    "url"=>"", "text"=>"Dashboard"),
            array("icon"=>"user",         "url"=>"m_siswa", "text"=>"Data Siswa"),
            array("icon"=>"th-list",      "url"=>"m_guru",  "text"=>"Data Guru/Dosen"),
            array("icon"=>"tasks",        "url"=>"m_mapel", "text"=>"Data Mapel"),
            array("icon"=>"folder-open",  "url"=>"m_soal",  "text"=>"Soal"),
            array("icon"=>"file",         "url"=>"h_ujian", "text"=>"Hasil Ujian"),
            array("icon"=>"euro",         "url"=>"m_spp", "text"=>"Data Administrasi"),
            array("icon"=>"upload",       "url"=>"m_upload",  "text"=>"Upload Soal"),
            array("icon"=>"book",         "url"=>"m_absensi", "text"=>"Data Absensi"),
          );
} else {
  $menu = array(
            array("icon"=>"dashboard", "url"=>"", "text"=>"Dashboard")
          );
}

?>


<div class="container" style="margin-top: 70px">

<div class="col-lg-12 row">
  <div class="panel panel-default">
    <div class="panel-body">
    <?php 
    foreach ($menu as $m) {
        if ($uri2 == $m['url']) {
          echo '<a href="'.base_url().'adm/'.$m['url'].'" class="btn btn-sq btn-info">
            <i class="glyphicon glyphicon-'.$m['icon'].' g3x"></i><br><br/>'.$m['text'].' </a>';
        } else {
          echo '<a href="'.base_url().'adm/'.$m['url'].'" class="btn btn-sq btn-primary">
            <i class="glyphicon glyphicon-'.$m['icon'].' g3x"></i><br><br/>'.$m['text'].' </a>';
        }
    }
    ?>
    </div>
  </div>
</div>
 <hr/>
        <div class="content">
            <div class="container">
                {content}
            </div>
        </div>

<div class="col-md-12" style="border-top: solid 4px #ddd; text-align: center; padding-top: 10px; margin-top: 50px; margin-bottom: 20px">
  &copy; 2015 <a href="">Aplikasi Ujian Online</a>. 
</div>



</body>
</html>
