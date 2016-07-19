<?
class ismax_shareview extends CModule {
	var $MODULE_ID = "ismax.shareview";
	var $MODULE_VERSION;
	var $MODULE_VERSION_DATE;
	var $MODULE_NAME;
	var $MODULE_DESCRIPTION;

	function ismax_shareview() {
		IncludeModuleLangFile(__FILE__);
		$arModuleVersion = array();

		$path = str_replace("\\", "/", __FILE__);
		$path = substr($path, 0, strlen($path) - strlen("/index.php"));
		include($path."/version.php");

		$this->MODULE_VERSION 		= $arModuleVersion["VERSION"];
		$this->MODULE_VERSION_DATE 	= $arModuleVersion["VERSION_DATE"];

        $this->PARTNER_NAME 		= GetMessage("SHAREVIEW_PARTNER_NAME");
        $this->PARTNER_URI 			= GetMessage("SHAREVIEW_PARTNER_URI");

		$this->MODULE_NAME 			= GetMessage("SHAREVIEW_MODULE_NAME");
		$this->MODULE_DESCRIPTION 	= GetMessage("SHAREVIEW_MODULE_DESCRIPTION");

	}

	function InstallFiles() {
		return CopyDirFiles(
			$_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/{$this->MODULE_ID}/install/components",
			$_SERVER["DOCUMENT_ROOT"]."/bitrix/components",
			true, true);
	}

	function UnInstallFiles() {
		return DeleteDirFilesEx("/bitrix/components/ismax/shareview/");
	}

	function DoInstall() {
		global $APPLICATION;

		if ($this->InstallFiles()) {
			RegisterModule($this->MODULE_ID);
		}
		$APPLICATION->IncludeAdminFile(GetMessage("SHAREVIEW_INSTALL_TITLE"), $_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/shareview/install/step.php");
	}

	function DoUninstall() {
		global $APPLICATION;

		$this->UnInstallFiles();
		UnRegisterModule($this->MODULE_ID);

		$APPLICATION->IncludeAdminFile(GetMessage("SHAREVIEW_UNINSTALL_TITLE"), $_SERVER["DOCUMENT_ROOT"]."/bitrix/modules/shareview/install/unstep.php");
	}
}

?>