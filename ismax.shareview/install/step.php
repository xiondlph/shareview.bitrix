<?
if (!check_bitrix_sessid()) return;
IncludeModuleLangFile(__FILE__);
echo CAdminMessage::ShowNote(GetMessage("SHAREVIEW_INSTALL_MODULE"));
?>
<form action="<?echo $APPLICATION->GetCurPage()?>">
	<input type="hidden" name="lang" value="<?echo LANG?>">
	<input type="submit" name="" value="<?echo GetMessage("MOD_BACK")?>">
</form>
