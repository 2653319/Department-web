<?php
    include("style2.php");
    session_start();
    if(isset($_SESSION['email'])){
?>
<!doctype html>
<html lang="en">

    <?php
        head();
    ?>
        <body>

    <?php
        if($_SESSION['roleID'] == 3){
            navLogStudent(2);
        }else{
            navLogOut(2);
        }
    ?>

<!-- <script>
    document.getElementById("but").click();
</script> -->

<div style="background-image: linear-gradient(#a6c0fe 0%, #f68084 100%); height: 100%; ">
<form action="repairToSQL.php" method="post">
<label style="font-size:30px">*聯絡資訊 </label>
<div class="input-group flex-nowrap mb-3">
  <span class="input-group-text" id="addon-wrapping">申請人:</span>
  <input class="form-control form-control-lg" name="applicant" type="text" placeholder="" value="<?php echo $_SESSION['id']; ?>" aria-label=".form-control-lg example" hidden >
  <input type="text" class="form-control"  disabled value="<?php echo $_SESSION['id']; ?>" placeholder="申請人姓名" aria-label="Username"aria-describedby="addon-wrapping"  />
</div>

<div class="input-group flex-nowrap mb-3">
  <span class="input-group-text" id="addon-wrapping">申請單位:</span>
  <select name="department" id="cars">
    <option value="資訊電機學院">資訊電機學院</option>
    <option value="資訊工程學系">資訊工程學系</option>
    <option value="生物科技與醫學工程學系">生物科技與醫學工程學系</option>
    <option value="光電與通訊學系">光電與通訊學系</option>
</select>
</div>

<div class="input-group flex-nowrap mb-3">
  <span class="input-group-text" id="addon-wrapping">校內分機:</span>
  <input type="text" class="form-control" name="phoneExt" placeholder="申請人聯絡分機" aria-label="Username"aria-describedby="addon-wrapping" />
</div>

<div class="input-group flex-nowrap mb-3">
  <span class="input-group-text" id="addon-wrapping">E-mail：</span>
  <input class="form-control form-control-lg" name="email" type="text" placeholder="" value="<?php echo $_SESSION['email']; ?>" aria-label=".form-control-lg example" hidden >
  <input type="text" class="form-control"  disabled value="<?php echo $_SESSION['email']; ?>" placeholder="E-mail" aria-label="Username"aria-describedby="addon-wrapping" />
</div>

<label style="font-size:30px">*報修地點 </label>
<div class="input-group flex-nowrap mb-3">
  <span class="input-group-text" id="addon-wrapping">教室編號：</span>
  <input type="text" class="form-control" name="location" placeholder="Ex:H103" aria-label="Username"aria-describedby="addon-wrapping" />
</div>

<div class="input-group flex-nowrap mb-3">
  <span class="input-group-text" id="addon-wrapping">電腦編號：</span>
  <input type="text" class="form-control" name="computerSerialNO" placeholder="教室內電腦位子編號" aria-label="Username"aria-describedby="addon-wrapping" />
</div>

<div class="input-group flex-nowrap mb-3">
  <span class="input-group-text" id="addon-wrapping">設備名稱：</span>
  <input type="text" class="form-control" name="propertyName" placeholder="設備名稱" aria-label="Username"aria-describedby="addon-wrapping" />
</div>

<div class="input-group flex-nowrap mb-3">
  <span class="input-group-text" id="addon-wrapping">財產編號：</span>
  <input type="text" class="form-control" name="propertySerialNo" placeholder="故障設備財產編號" aria-label="Username"aria-describedby="addon-wrapping" />
</div>



<!-- Checked checkbox -->


<div  style="float:left; margin-right:50px; margin-left:0px; margin-top:0px;">
<label class="mb-3" style="font-size:30px;">*故障項目 </label>
<div class="gap-2 d-md-block " style="margin-bottom:30px;">
    <button type="button" class="btn btn-primary" onclick="checkboxHidTrue()">硬體</button>
    <button type="button" class="btn btn-success" onclick="checkboxHidFalse()">軟體</button>
</div>
<input type="text" class="form-control" hidden="true" id="problemKind" value="硬體" name="problemKind" placeholder="申請人聯絡分機" aria-label="Username"aria-describedby="addon-wrapping" />
    <ol id="olone">
        <li>    
            <input type="checkbox" id="vehicle1" name="problemItem[]" value="3">
            <label for="vehicle1">螢幕故障</label>
        </li>
        <li>    
            <input type="checkbox" id="vehicle2" name="problemItem[]" value="4">
            <label for="vehicle2">主機無法開機</label>
        </li>
        <li>    
            <input type="checkbox" id="vehicle3" name="problemItem[]" value="5">
            <label for="vehicle3">無法上網</label>
        </li>
        <li>    
            <input type="checkbox" id="vehicle4" name="problemItem[]" value="6">
            <label for="vehicle4">無法接收教學廣播</label>
        </li>
        <li>    
            <input type="checkbox" id="vehicle5" name="problemItem[]" value="7">
            <label for="vehicle5">鍵盤故障</label>
        </li>
        <li>    
            <input type="checkbox" id="vehicle6" name="problemItem[]" value="8">
            <label for="vehicle6">滑鼠故障</label>
        </li>
        <li>    
            <input type="checkbox" id="vehicle7" name="problemItem[]" value="9">
            <label for="vehicle7">硬碟故障</label>
        </li>
        <li>    
            <input type="checkbox" id="vehicle8" name="problemItem[]" value="10" onclick="myFunction()">
            <label for="vehicle8">其他狀況</label>
        </li>
    </ol>
</div>
<div  style="float:left; margin-right:40px; margin-top:125px;">
    <ol hidden="true" id="oltwo">
        <li>    
            <input type="checkbox" id="vehicle9" name="problemItem[]" value="11">
            <label for="vehicle9">作業系統故障</label>
        </li>
        <li>    
            <input type="checkbox" id="vehicle10" name="problemItem[]" value="12">
            <label for="vehicle10">作業系統認證過期</label>
        </li>
        <li>    
            <input type="checkbox" id="vehicle11" name="problemItem[]" value="13" onclick="myFunction()">
            <label for="vehicle11">軟體無法開啟</label>
        </li>
    </ol>
    </div>
    <div class="input-group flex-nowrap">
        <input type="text" class="form-control" id="textarea" name="problemText" disabled="true" placeholder="其他狀況" aria-label="Username"aria-describedby="addon-wrapping" />
    </div>

    <div class="form-outline">
        <label style="font-size:30px">*報修內容 </label>
        <textarea class="form-control" id="textAreaExample" name="problemMemo" rows="4" placeholder="具體描述"></textarea>
        <label class="form-label" for="textAreaExample"></label>
    </div>

	<ul class="list-inline fix-btn">
		<li>
		    <button type="submit" class="btn btn-primary btn-lg">送出申請</a>
		</li>
	</ul>
</form>
</div>

<script>
    function myFunction() {
        if(document.getElementById("textarea").disabled == false){
            document.getElementById("textarea").disabled = true;
            document.getElementById("textarea").value = "";
        }else{
            document.getElementById("textarea").disabled = false;
        }
    }

    function checkboxHidTrue(){
        document.getElementById("problemKind").value = "硬體";
        document.getElementById("olone").hidden = false;
        document.getElementById("oltwo").hidden = true;
        document.getElementById("vehicle9").checked = false;
        document.getElementById("vehicle10").checked = false;
        document.getElementById("vehicle11").checked = false;
        document.getElementById("textarea").disabled = true;
    }

    function checkboxHidFalse(){
        document.getElementById("problemKind").value = "軟體";
        document.getElementById("olone").hidden = true;
        document.getElementById("oltwo").hidden = false;
        document.getElementById("vehicle1").checked = false;
        document.getElementById("vehicle2").checked = false;
        document.getElementById("vehicle3").checked = false;
        document.getElementById("vehicle4").checked = false;
        document.getElementById("vehicle5").checked = false;
        document.getElementById("vehicle6").checked = false;
        document.getElementById("vehicle7").checked = false;
        document.getElementById("vehicle8").checked = false;
        document.getElementById("vehicle9").checked = false;
        document.getElementById("textarea").disabled = true;
    }



</script>

<?php
    footer();
?>
  </body>

<?php
}else{
    echo '<script>alert("please login")</script>';
    echo "<meta http-equiv='refresh' content='0;url=index.php'/>";  
}