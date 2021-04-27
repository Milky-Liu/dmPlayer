<?php
if (isset($_GET['act']) && $_GET['act'] == 'reset' ) {

    $bac = 'data_backup'; //旧目录
    $data = 'data.php'; //新目录
    copy($bac, $data); //拷贝到新目录
    exit;
}
if (isset($_GET['act']) && $_GET['act'] == 'setting' && isset($_POST['edit']) && $_POST['edit'] == 1 ) {
    $datas = $_POST;
    $data = $datas['yzm'];

    if (file_put_contents('data.php', "<?php\n \$yzm =  ".var_export($data, true).";\n?>")) {
        echo "{code:1,msg:保存成功}";
    } else {
        echo "{code:1,msg:修改失败！可能是文件权限问题，请给予data.php写入权限！}";
    }
    $yzm = $data;
}
