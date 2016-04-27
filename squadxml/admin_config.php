<?php

// Generated e107 Plugin Admin Area 

require_once('../../class2.php');
if (!getperms('P')) 
{
	e107::redirect('admin');
	exit;
}

 e107::lan('squadxml',true);


class squadxml_adminArea extends e_admin_dispatcher
{

	protected $modes = array(	
	
		'main'	=> array(
			'controller' 	=> 'squadxml_exesystem_ui',
			'path' 			=> null,
			'ui' 			=> 'squadxml_exesystem_form_ui',
			'uipath' 		=> null
		),
		

	);	
	
	
	protected $adminMenu = array(

		'main/list'			=> array('caption'=> LAN_MANAGE, 'perm' => 'P'),
		'main/create'		=> array('caption'=> LAN_CREATE, 'perm' => 'P'),
		
		'main/prefs' 		=> array('caption'=> LAN_PREFS, 'perm' => 'P'),	

		// 'main/custom'		=> array('caption'=> 'Custom Page', 'perm' => 'P')
	);

	protected $adminMenuAliases = array(
		'main/edit'	=> 'main/list'				
	);	
	
	protected $menuTitle = 'SquadXML';
}




				
class squadxml_exesystem_ui extends e_admin_ui
{
			
		protected $pluginTitle		= 'SquadXML';
		protected $pluginName		= 'squadxml';
	//	protected $eventName		= 'squadxml-squadxml_exesystem'; // remove comment to enable event triggers in admin. 		
		protected $table			= 'squadxml_exesystem';
		protected $pid				= 'xml_id';
		protected $perPage			= 10; 
		protected $batchDelete		= true;
	//	protected $batchCopy		= true;		
	//	protected $sortField		= 'somefield_order';
	//	protected $orderStep		= 10;
	//	protected $tabs				= array('Tabl 1','Tab 2'); // Use 'tab'=>0  OR 'tab'=>1 in the $fields below to enable. 
		
	//	protected $listQry      	= "SELECT * FROM `#tableName` WHERE field != '' "; // Example Custom Query. LEFT JOINS allowed. Should be without any Order or Limit.
	
		protected $listOrder		= 'xml_id DESC';
	
		protected $fields 		= array (  'checkboxes' =>   array ( 'title' => '', 'type' => null, 'data' => null, 'width' => '5%', 'thclass' => 'center', 'forced' => '1', 'class' => 'center', 'toggle' => 'e-multiselect',  ),
		  'xml_id' =>   array ( 'title' => LAN_ID, 'data' => 'int', 'width' => '5%', 'help' => '', 'readParms' => '', 'writeParms' => '', 'class' => 'left', 'thclass' => 'left',  ),
		  'user_id' =>   array ( 'title' => LAN_XML_USERNAME, 'type' => 'dropdown', 'data' => 'int', 'width' => '5%', 'help' => '', 'readParms' => '', 'writeParms' => '', 'class' => 'left', 'thclass' => 'left',  ),
		  'arma_id' =>   array ( 'title' => LAN_XML_ARMAID, 'type' => 'text', 'data' => 'str', 'width' => '5%', 'help' => '', 'readParms' => '', 'writeParms' => '', 'class' => 'left', 'thclass' => 'left',  ),
		  'arma_remark' =>   array ( 'title' => LAN_XML_REMARK, 'type' => 'textarea', 'data' => 'str', 'width' => 'auto', 'help' => '', 'readParms' => '', 'writeParms' => '', 'class' => 'left', 'thclass' => 'left',  ),
		  'arma_icq' =>   array ( 'title' => LAN_XML_ICQ, 'type' => 'text', 'data' => 'str', 'width' => 'auto', 'help' => '', 'readParms' => '', 'writeParms' => '', 'class' => 'left', 'thclass' => 'left',  ),
		  //'u_class_id' =>   array ( 'title' => LAN_ID, 'type' => 'dropdown', 'data' => 'int', 'width' => '5%', 'help' => '', 'readParms' => '', 'writeParms' => '', 'class' => 'left', 'thclass' => 'left',  ),
		  'options' =>   array ( 'title' => LAN_OPTIONS, 'type' => null, 'data' => null, 'width' => '10%', 'thclass' => 'center last', 'class' => 'center last', 'forced' => '1',  ),
		);		
		
		
		protected $fieldpref = array('user_id','arma_id', 'arma_remark');
		

	//	protected $preftabs        = array('General', 'Other' );
		protected $prefs = array(
			'unitName'		=> array('title'=> 'Unit Name', 'tab'=>0, 'type'=>'text', 'data' => 'str', 'help'=>''),
			'unitTags'		=> array('title'=> 'Unit Tags', 'tab'=>0, 'type'=>'text', 'data' => 'str', 'help'=>''),
			'unitEmail'		=> array('title'=> 'Unit Email', 'tab'=>0, 'type'=>'text', 'data' => 'str', 'help'=>''),
			'unitWebsite'		=> array('title'=> 'Unit Website', 'tab'=>0, 'type'=>'url', 'data' => 'str', 'help'=>''),
			'unitPaa'		=> array('title'=> 'Unit JPG/PAA', 'tab'=>0, 'type'=>'text', 'data' => 'str', 'help'=>''),
			'unitTitle'		=> array('title'=> 'Unit Title', 'tab'=>0, 'type'=>'text', 'data' => 'str', 'help'=>''),
		); 

		
		public function init()
		{
			// Set drop-down values (if any). 
			//$this->fields['user_id']['writeParms']['optArray'] = array('user_id_0','user_id_1', 'user_id_2'); // Example Drop-down array. 
			
			$sql = e107::getDb();
			$this->user_id[0] = 'Select User';
			if($sql->select("user", "*")) { while ($row = $sql->fetch()) {
			$this->user_id[$row['user_id']] = $row['user_name']; } 	} 
        	$this->fields['user_id']['writeParms'] = $this->user_id;	 
	
		}

		
		// ------- Customize Create --------
		
		public function beforeCreate($new_data,$old_data)
		{
			return $new_data;
		}
	
		public function afterCreate($new_data, $old_data, $id)
		{
			// do something
		}

		public function onCreateError($new_data, $old_data)
		{
			// do something		
		}		
		
		
		// ------- Customize Update --------
		
		public function beforeUpdate($new_data, $old_data, $id)
		{
			return $new_data;
		}

		public function afterUpdate($new_data, $old_data, $id)
		{
			// do something	
		}
		
		public function onUpdateError($new_data, $old_data, $id)
		{
			// do something		
		}		
		
			
	/*	
		// optional - a custom page.  
		public function customPage()
		{
			$text = 'Hello World!';
			return $text;
			
		}
	*/
			
}
				


class squadxml_exesystem_form_ui extends e_admin_form_ui
{

}		
		
		
new squadxml_adminArea();

require_once(e_ADMIN."auth.php");
e107::getAdminUI()->runPage();

require_once(e_ADMIN."footer.php");
exit;

?>