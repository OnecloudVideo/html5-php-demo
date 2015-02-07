<?php header("Content-Type:text/html; charset=utf8")?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=uft-8">
<title>上传文件到亦云视频</title>
<link type="text/css" rel="stylesheet" href="static/css/default.css" />
<link type="text/css" rel="stylesheet" href="static/css/videoupload.css" />
</head>
<body>
<div class="con_box">
  <h1>亦云视频 HTML5 上传 DEMO <a href="index.php" class="btn_back fr">返回</a></h1>
  <p class="line"></p>
  <h2>DEMO操作说明</h2>
  <p>这个 DEMO 演示如何不通过您的服务器，在您的网页上直接将文件上传到“亦云视频”。请参照以下步骤操作：</p>
  <p>1、点击“选择上传文件”按钮。</p>
  <p>2、在弹出的窗口选择文件。</p>
  <p>3、完成之后上传列表中会显示出选择的文件和当前上传的状态，同时有进度条表明当前上传的进度。</p>
  <p>4、上传完成的文件在提示完上传完成之后会在上传列表中显示。</p>
  <p>5、请访问亦云视频来查看你上传的视频文件。</p>
  <h2>DEMO演示</h2>
  <select name="catalogId" class="select_long">
  </select>
  <input type="file" id="uploadFile" name="file" />
  <button type="button" id="upload" class=" but_add txt_right">开始上传</button>
  <span class="txt_right mar10">已上传 <span id="uploadFileNumber">0</span> 个文件</span>
  <table width="100%" border="0" cellspacing="0" cellpadding="0" class="table2">
    <thead>
      <tr>
        <th>文件</th>
        <th width="25%">大小</th>
        <th width="25%">状态</th>
      </tr>
    </thead>
    <tbody id="fileQueue">
    </tbody>
  </table>
  <br />
  <div class="con_box_logo"></div>
</div>
<!-- 本例子的代码基于 jquery 框架 --> 
<script type="text/javascript" src="static/js/jquery-1.11.1.min.js"></script> 
<!-- 本例子代码的依赖包，该包是用来计算MD5值 --> 
<script type="text/javascript" src="static/js/spark-md5.min.js"></script> 
<!-- 通用上传的 js --> 
<script type="text/javascript" src="static/js/restful-video-upload.js"></script> 
<!-- 本页面的一些 js --> 
<script type="text/javascript" src="static/js/upload.js"></script>
</body>
</html>