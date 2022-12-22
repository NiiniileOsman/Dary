
<style>
	.text-right img{
		height: 30px;
	}
</style>
<main class="app-content-footer" id="footer-height">
	    
		<div class="app-title-footer">
		    
			<div>

			<p style="font: 12px 'century gothic'; font-weight:bold"><span style="font-size: 11px; fonr-weight:bold;"><?php echo $_SESSION["footerCaption"]; ?></span><br><span style="color: #e60073; font-size: 11px;"><?php echo $_SESSION["systemVersion"]; ?></span></p>
			</div>
			
			<ul class="app-breadcrumb breadcrumb">
				<!-- <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
				<li class="breadcrumb-item"><a href="dashboard">Dashboard</a></li> -->
				<p class="text-right">
					<a href="https://tusmotech.com" target="_blank">
						<img src="img/tusmoLogo.png"/>
					</a>
				</p>
			</ul>
			
		</div>
   
	
		
	</main>
<script type="text/javascript">
	
	let currentMenu = window.location.href.split("/")[4];
	let allSubmenus = document.querySelectorAll(".treeview-menu");

	allSubmenus.forEach( (menu) => {
			
			Array.from(menu.children).forEach( (submenu) => {
				if(currentMenu == submenu.children[0].attributes[1].nodeValue){
					submenu.children[0].style.backgroundColor = "#1f292e"
					submenu.children[0].style.color = "#FFF"
					console.log("child",submenu.children[0].style.backgroundColor = "#313e44");
					submenu.parentElement.parentElement.classList= "treeview is-expanded"
				}
				
			})
	})


</script>