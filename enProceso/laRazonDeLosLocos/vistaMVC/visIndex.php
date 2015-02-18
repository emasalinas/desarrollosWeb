<?php
/*********************************************************************
* Codigo del archivo	: PHP_010_visIndex
* Nombre del archivo	: visIndex.php
* Objetivo del archivo	: Vista del Index
*
* Categoria				: PHP
* Paquete				: 010
* Autor:				: German Laso
* Version				: 0.9
*********************************************************************/

/********************************************************************
* Desarrollo del codigo HTML de la vista
*********************************************************************/

$this->entIndex->idView = 0;
if($this->entIndex->idView == 0){
?>

<div class="pageLayout">
<div id="pageContent" class="pageContent">
	<div class="titleCD"><img src="<?php echo $this->entIndex->titleCD; ?>" /></div>
    
    <div class="panelBottom">
    	<div class="downloadSector">
        	<a href="./download/" title="Descargar">
        		<img src="<?php echo $this->entIndex->buttonDownload; ?>" />
            </a>
        </div>
    	
        
        <div class="socialIcons">
    		<div class="iconSector">
        		<a href="http://www.facebook.com/larazondeloslocos" title="Facebook" target="_blank">
        			<img src="<?php echo $this->entIndex->iconFacebook; ?>" onmouseover="this.src='<?php echo $this->entIndex->iconFacebookOn; ?>'" onmouseout="this.src='<?php echo $this->entIndex->iconFacebook; ?>'" />
            	</a>
        	</div>
        	<div class="iconSector">
	        	<a href="https://twitter.com/razondeloslocos" title="Twitter" target="_blank">
        		<img src="<?php echo $this->entIndex->iconTwitter; ?>" onmouseover="this.src='<?php echo $this->entIndex->iconTwitterOn; ?>'" onmouseout="this.src='<?php echo $this->entIndex->iconTwitter; ?>'" />
            	</a>
			</div>
        	<div class="iconSector">
        		<a href="http://instagram.com/razondeloslocos" title="Instagram" target="_blank">
        		<img src="<?php echo $this->entIndex->iconInstagram; ?>" onmouseover="this.src='<?php echo $this->entIndex->iconInstagramOn; ?>'" onmouseout="this.src='<?php echo $this->entIndex->iconInstagram; ?>'" />
            	</a>
			</div>
        	<div class="iconSector">
	        	<a href="http://www.youtube.com/channel/UCWrHM7kIZ_5YdJkYnISx4hg" title="Youtube" target="_blank">
        			<img src="<?php echo $this->entIndex->iconYoutube; ?>" onmouseover="this.src='<?php echo $this->entIndex->iconYoutubeOn; ?>'" onmouseout="this.src='<?php echo $this->entIndex->iconYoutube; ?>'" />
            	</a>
			</div>
    	</div>
    	<div class="logotypeBand"><img src="<?php echo $this->entIndex->logotypeBand; ?>" /></div>
	</div>
</div>
</div>

<?php }else{ ?>

<div class="imageLeft" style="width:100%; height:100%; position:fixed; text-align: left;">
	
	<img src="./publicMVC/img/imageLeft.png" height="100%" >
	
    <div class="panelBottom">
    	<div class="downloadSector">
        	<a href="./download/" title="Descargar">
        		<img src="<?php echo $this->entIndex->buttonDownload; ?>" />
            </a>
        </div>
        
        <div class="socialIcons">
    		<div class="iconSector">
        		<a href="http://www.facebook.com/larazondeloslocos" title="Facebook" target="_blank">
        			<img src="<?php echo $this->entIndex->iconFacebook; ?>" onmouseover="this.src='<?php echo $this->entIndex->iconFacebookOn; ?>'" onmouseout="this.src='<?php echo $this->entIndex->iconFacebook; ?>'" />
            	</a>
        	</div>
        	<div class="iconSector">
	        	<a href="https://twitter.com/razondeloslocos" title="Twitter" target="_blank">
        		<img src="<?php echo $this->entIndex->iconTwitter; ?>" onmouseover="this.src='<?php echo $this->entIndex->iconTwitterOn; ?>'" onmouseout="this.src='<?php echo $this->entIndex->iconTwitter; ?>'" />
            	</a>
			</div>
        	<div class="iconSector">
        		<a href="http://instagram.com/razondeloslocos" title="Instagram" target="_blank">
        		<img src="<?php echo $this->entIndex->iconInstagram; ?>" onmouseover="this.src='<?php echo $this->entIndex->iconInstagramOn; ?>'" onmouseout="this.src='<?php echo $this->entIndex->iconInstagram; ?>'" />
            	</a>
			</div>
        	<div class="iconSector">
	        	<a href="http://www.youtube.com/channel/UCWrHM7kIZ_5YdJkYnISx4hg" title="Youtube" target="_blank">
        			<img src="<?php echo $this->entIndex->iconYoutube; ?>" onmouseover="this.src='<?php echo $this->entIndex->iconYoutubeOn; ?>'" onmouseout="this.src='<?php echo $this->entIndex->iconYoutube; ?>'" />
            	</a>
			</div>
    	</div>
	</div>
</div>

<?php } ?>