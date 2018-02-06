<?php
$data ['datemenu'] = $this->cic_auth->getMenu ();
?>
<div class="menu_section">
	<h3>General</h3>
	<ul class="nav side-menu">
		<li><a href="<?php echo base_url('admin.php/dashboard');?>"><i
				class="fa fa-home"></i> Accueil</a></li>
	 <?php
		$test = "";
		foreach ( $data ['datemenu'] as $val ) {
			if ($val ['voir'] == 'Unchecked') {
				$test = 'style=display:none';
			} else {
				$test = 'style=display:block';
			}
			?>
			
	 <li <?php echo $test;?>><a><i class="<?php echo $val['iconmenu']; ?>"></i> <?php echo $val['alias_menu']; ?><span
				class="fa fa-chevron-down"></span></a>
		<?php
			if (is_array ( unserialize ( $val ['sous_menu'] ) )) {
				// ?>
			<ul class="nav child_menu"> 
			<?php
				foreach ( unserialize ( $val ['sous_menu'] ) as $data ) {
					if ($data ['url'] != "#" || $data ['nomMenu']) {
						if(!isset($data['sousNomMenu'])){
						?>								
						<li><a href="<?php  echo base_url('admin.php/'.$data['url']) ?>"><?php  echo $data['nomMenu']?>	</a></li>				
				<?php
						}
				//sous
					}
				}
				?>
			</ul>
		<?php
			}
			?>
		</li> 
	 <?php  }?>		
		
	</ul>
</div>



