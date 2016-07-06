<?
$module_id = "shareview";
$CAT_RIGHT = $APPLICATION->GetGroupRight($module_id); ?>
<? if ($CAT_RIGHT >= "R") : ?>

<?	IncludeModuleLangFile(__FILE__);
	if (!CModule::IncludeModule($module_id)) {
		$APPLICATION->AuthForm(GetMessage("ACCESS_DENIED"));
	}

	$save = false;
	if($_SERVER["REQUEST_METHOD"] == "POST")
	{
		CUtil::JSPostUnescape();

		if(strlen($key) <= 0) $key = '';
		$save = COption::SetOptionString("shareview", "key", $key);
	}

	$APPLICATION->SetTitle(GetMessage("SHAREVIEW_TITLE"));

	$aTabs = array(
		array("DIV" => "edit1", "TAB" => GetMessage("SHAREVIEW_TAB"), "ICON"=>"main_user_edit", "TITLE"=>GetMessage("SHAREVIEW_TAB")),
	);
	$tabControl = new CAdminTabControl("tabControl", $aTabs, true, true); ?>

	<form method="POST" action="<?echo $APPLICATION->GetCurPage()?>?mid=<?=htmlspecialcharsbx($mid)?>&lang=<?echo htmlspecialcharsbx(LANG)?>" name="shareview">
<?	$tabControl->Begin();
	$tabControl->BeginNextTab();

	if($save) {
		CAdminMessage::ShowMessage(array(
			"MESSAGE"=>GetMessage("SHAREVIEW_COMPLETE"),
			"HTML"=>true,
			"TYPE"=>"OK",			
		));			
	}	

	$key = COption::GetOptionString("shareview", "key", '');
	if(strlen($key) <= 0) $key = ''; ?>
		<p><?echo GetMessage("SHAREVIEW_DESC")?></p>
		<tr>
			<td><?echo GetMessage("SHAREVIEW_KEY")?></td>
			<td><input type="text" name="key" id="key" size="32" value="<?echo $key;?>"></td>
		</tr>
<?	$tabControl->Buttons(); ?>
		<input type="submit"  name="Update" value="<?php echo GetMessage("SHAREVIEW_BUTTON")?>"> 
<?	$tabControl->End(); ?>
	</form>
<? else: ?>
<?	$APPLICATION->AuthForm(GetMessage("ACCESS_DENIED")); ?>
<? endif; ?>

	