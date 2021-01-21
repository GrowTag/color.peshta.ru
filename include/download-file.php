<?require_once($_SERVER['DOCUMENT_ROOT']. "/bitrix/modules/main/include/prolog_before.php");

if($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES) && !empty($_FILES))
{
    // Сохраняем и регистрируем файл макета
    move_uploaded_file($_FILES['file']['tmp_name'], $_SERVER["DOCUMENT_ROOT"].'/upload/tmp/'.$_FILES['file']['name']);
    if(isset($_FILES['file']) && file_exists($_SERVER["DOCUMENT_ROOT"].'/upload/tmp/'.$_FILES['file']['name'])){
        $arFile = CFile::MakeFileArray($_SERVER["DOCUMENT_ROOT"].'/upload/tmp/'.$_FILES['file']['name']);
        $file = CFile::SaveFile($arFile, "orders");
    }
    print json_encode($file);
}
